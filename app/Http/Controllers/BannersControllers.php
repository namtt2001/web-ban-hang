<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banners;
use App\Banners_images;
use Auth;
use DateTime,File,Input,DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class BannersControllers extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
  }
    public function getlist()
   {
   		$data = Banners::paginate(10);
    	return view('back-end.banners.list',['data'=>$data]);
   }
   public function getadd()
   {
    	return view('back-end.banners.add');
   }
   public function postadd(Request $rq)
   {
 		  $validator = Validator::make(
          $rq->only('name','sltpost', 'url_banner'),
          Banners::$validators,Banners::$msg
          );
      if ($validator->fails()) {
          return Redirect::back()->withInput()->withErrors($validator);
      } else {
        $bn = new Banners();
        $bn->name = $rq->name;
        $bn->url = $rq->url;       
        $bn->pos = $rq->sltpost;
        $bn->status = 1;
        $bn->user_id = Auth::guard('admin')->user()->id;
        $bn->created_at = new datetime;
        // xu ly hinh anh
        $f = $rq->file('url_banner')->getClientOriginalName();
        $filename = time().'_'.$f;
         $bn->url_banner = $filename;     
        $rq->file('url_banner')->move('public/uploads/banners/',$filename);       

        $bn->save();  

        $bn_id =$bn->id;

        // add images banners detail
        if ($rq->hasFile('bn_img')) {
          $df = $rq->file('bn_img');
          foreach ($df as $row) {
            $img = new Banners_images();
            if (isset($row)) {
              $name_img= time().'_'.$row->getClientOriginalName();

              $img->image_name = $name_img;
              $img->bn_id = $bn_id;
              $img->created_at = new datetime;

              $row->move('public/uploads/banners/',$name_img);
              // $row->move('public/uploads/banners/thumbs/',$name_img);
              $img->save();

            }
          }
        }
        return redirect('admin/banners')
          ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã thêm thành công !']);  
      }
   }
   public function getedit($id)
   {
      $data = Banners::where('id',$id)->first();
      return view('back-end.banners.edit',['data'=>$data]);
   }
   public function postedit(Request $rq, $id)
   {
   		if ($rq->hasFile('url_banner')) {
            $validator = Validator::make(
              $rq->only('name','sltpost', 'url_banner'),
              Banners::$validators,Banners::$msg
            );
        } else {
            $validator = Validator::make(
                $rq->only('name','sltpost'),
                Banners::$edit_vld,Banners::$msg
            );
        }
        if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            } else {

            $bn = Banners::find($id);

            $bn->name = $rq->name;
            $bn->url = $rq->url;             
            $bn->pos = $rq->sltpost;
            $bn->status = $rq->sltStatus;
            $bn->user_id = Auth::guard('admin')->user()->id;
            $bn->updated_at = new datetime;
            $file_path = public_path('uploads/banners/').$bn->url_banner;
            if ($rq->hasFile('url_banner')){
                // xoa anh cu 
              if (file_exists($file_path))
                {
                  // dd($file_path);
                    unlink($file_path);
                }
              // xu ly hinh anh
              $f = $rq->file('url_banner')->getClientOriginalName();
              $filename = time().'_'.$f;
              $bn->url_banner = $filename;     
              $rq->file('url_banner')->move('public/uploads/banners/',$filename);
            }
               
            $bn->save();                 

            if ($rq->hasFile('bn_img')) {
                $detail = Banners_images::where('bn_id',$id)->get();
                $df = $rq->file('bn_img');
                foreach ($detail as $row) {                
                     $dt = Banners_images::find($row->id);
                     $pt = public_path('uploads/banners/').$dt->image_name; 
                     // dd($pt);   
                      if (file_exists($pt))
                      {
                          unlink($pt);
                      }
                     $dt->delete();                              
                  }
                foreach ($df as $row) {
                      $img_detail = new Banners_images();
                      if (isset($row)) {
                          $name_img= time().'_'.$row->getClientOriginalName();
                          $img_detail->image_name = $name_img;
                          $img_detail->bn_id = $id;
                          $img_detail->created_at = new datetime;
                          $row->move('public/uploads/banners/',$name_img);
                          $img_detail->save();
                      }
                  }
            }
          return redirect('admin/banners')
          ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã lưu thành công !']);       
      }
   }
   public function getdel($id)
   {
      $detail = Banners_images::where('bn_id',$id)->get();
        foreach ($detail as $row) {                
               $dt = Banners_images::find($row->id);
               $pt = public_path('uploads/banners/').$dt->image_name;  
                if (file_exists($pt))
                {
                    unlink($pt);
                }
               $dt->delete();                              
            }
      $pro = Banners::find($id);
      $pro->delete();
      return redirect('admin/banners')
      ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã xóa thành công !']); 
   }
}
