<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;
use App\Category;
use Auth;
use DateTime,File,Input,DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function getlist()
    {
        if (Auth::guard('admin')->user()->level ==1 || Auth::guard('admin')->user()->level ==2) {
        	$data = News::paginate(10);
        	return view('back-end.news.list',['data'=>$data]);
        } else {
            echo '<script type="text/javascript">
                  alert("Bạn không có quyền thực hiện thao tác này !");                
                  window.location = "';
                  echo route('adminhome');
                  echo '";
                </script>';
        }
    }
    public function getadd()
    {    	
        if (Auth::guard('admin')->user()->level ==1 || Auth::guard('admin')->user()->level ==2) {
    		$cat= Category::where('parent_id',9)->get();
        	return view('back-end.news.add',['cat'=>$cat]);
        } else {
            echo '<script type="text/javascript">
                  alert("Bạn không có quyền thực hiện thao tác này !");                
                  window.location = "';
                  echo route('adminhome');
                  echo '";
                </script>';
        }
    }
    public function postadd(Request $rq)
    {
        $validator  = Validator::make(
            $rq->only('txtTitle', 'sltCate', 'txtimg', 'txtIntro'),
            News::$validators, News::$msg

        );
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        } else{

    	$n = new News();
    	$n->title = $rq->txtTitle;
    	$n->slug = str_slug($rq->txtTitle,'-');
    	$n->author = $rq->txtAuth;
    	$n->tag = $rq->txttag;
    	$n->status = $rq->slstatus;
    	$n->source = $rq->txtSource;
    	$n->intro = $rq->txtIntro;
    	$n->full = $rq->txtFull;
    	$n->cat_id = $rq->sltCate;
    	$n->user_id = Auth::guard('admin')->user()->id;
    	$n->created_at = new datetime;

    	$f = $rq->file('txtimg')->getClientOriginalName();
    	$filename = time().'_'.$f;
    	$n->images = $filename;    	
    	$rq->file('txtimg')->move('public/uploads/news/',$filename);

    	$n->save();
    	return redirect('admin/news')
      	->with(['flash_level'=>'result_msg','flash_massage'=>' Đã thêm thành công !']);   
        } 	
    }
    public function getedit($id){	
        if (Auth::guard('admin')->user()->level ==1 || Auth::guard('admin')->user()->level ==2) {
            $cat= Category::where('parent_id',9)->get();
        	$n = News::where('id',$id)->first();
        	return view('back-end.news.edit',['data'=>$n,'cat'=>$cat]);
        } else {
            echo '<script type="text/javascript">
                  alert("Bạn không có quyền thực hiện thao tác này !");                
                  window.location = "';
                  echo route('adminhome');
                  echo '";
                </script>';
        }
    }
    public function postedit(Request $rq,$id)
    {
        if ($rq->hasFile('txtimg')) {
            $validator  = Validator::make(
                $rq->only('txtTitle', 'sltCate', 'txtimg', 'txtIntro'),
                News::$validators, News::$msg

            );
        } else {
            $validator  = Validator::make(
                $rq->only('txtTitle', 'sltCate', 'txtimg', 'txtIntro'),
                News::$edit_vld, News::$msg

            );
        }

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        } else{
        	$n = News::find($id);
        	$n->title = $rq->txtTitle;
        	$n->slug = str_slug($rq->txtTitle,'-');
        	$n->author = $rq->txtAuth;
        	$n->tag = $rq->txttag;
        	$n->status = $rq->slstatus;
        	$n->source = $rq->txtSource;
        	$n->intro = $rq->txtIntro;
        	$n->full = $rq->txtFull;
        	$n->cat_id = $rq->sltCate;
        	$n->user_id = Auth::guard('admin')->user()->id;
        	$n->created_at = new datetime;

        	$file_path = public_path('uploads/news/').$n->images;
        	 if ($rq->hasFile('txtimg')) {
                if (file_exists($file_path))
                    {
                        unlink($file_path);
                    }
                
                $f = $rq->file('txtimg')->getClientOriginalName();
                $filename = time().'_'.$f;
                $n->images = $filename;       
                $rq->file('txtimg')->move('public/uploads/news/',$filename);
            }

        	$n->save();
        	return redirect('admin/news')
          	->with(['flash_level'=>'result_msg','flash_massage'=>' Đã sửa thành công !']);
        }
    }
    public function getdel($id){
        if (Auth::guard('admin')->user()->level ==1 || Auth::guard('admin')->user()->level ==2) {
            $new = News::find($id);
            $file_path = public_path('uploads/news/').$new->images;             
                    if (file_exists($file_path))
                        {
                            unlink($file_path);
                        }
            $new->delete();
            return redirect('admin/news')
                ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã xóa thành công !']);
        } else {
        echo '<script type="text/javascript">
                  alert("Bạn không có quyền thực hiện thao tác này !");                
                  window.location = "';
                  echo route('adminhome');
                  echo '";
                </script>';
        }
    }
}
