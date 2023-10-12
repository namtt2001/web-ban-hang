<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Category;
use App\Pro_details;
use App\Detail_img;
use Auth;
use DateTime,File,Input,DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
   public function getlist($id)
	{
        if (Auth::guard('admin')->user()->level ==1 || Auth::guard('admin')->user()->level ==2) {
            if ($id!='all') {

                $pro = Products::where('cat_id',$id)->paginate(12);
                $cat= Category::where('parent_id','<>',9)->where('id','<>',9)->get();
                return view('back-end.products.list',['data'=>$pro,'cat'=>$cat,'loai'=>$id]);                    
            } else {
                $pro = Products::OrderBy('cat_id','asc')->paginate(10);
                $cat= Category::all();
                return view('back-end.products.list',['data'=>$pro,'cat'=>$cat,'loai'=>0]);
            }	
        } else {
            echo '<script type="text/javascript">
                  alert("Bạn không có quyền thực hiện thao tác này !");                
                  window.location = "';
                  echo route('adminhome');
                  echo '";
                </script>';
        }	
	}
    public function getadd($loai)
    {
        if (Auth::guard('admin')->user()->level ==1 || Auth::guard('admin')->user()->level ==2) {
            if ($loai == 'new') {
                $cat= Category::where('parent_id','<>',9)->where('id','<>',9)->get();
                $pro = Products::all(); 
                return view('back-end.products.add',['data'=>$pro,'cat'=>$cat]);
            }	
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
        $validator = Validator::make(
            $rq->only('txtname', 'sltCate', 'txtimg','txtprice'),
            Products::$validators,Products::$msg
            );
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        } else{

        	$pro = new Products();

        	$pro->name = $rq->txtname;
        	$pro->slug = str_slug($rq->txtname,'-');
            $pro->model = $rq->txtmodel;
            $pro->manufacturer = $rq->txtmanufacturer;
            $pro->make_in = $rq->txtmake_in;
            $pro->design = $rq->txtthietke;
            $pro->size = $rq->txtsize;
            $pro->color = $rq->txtcolor;
            $pro->type = $rq->txttype;
            $pro->apply = $rq->txtapp;
            $pro->warranty = $rq->txtbaohanh;
            $pro->qty = $rq->txtsl;
 
        	$pro->review = $rq->txtReview;
        	$pro->tag = $rq->txttag;
        	$pro->price = $rq->txtprice;
        	$pro->cat_id = $rq->sltCate;

        	$pro->a_id = Auth::guard('admin')->user()->id;
        	$pro->created_at = new datetime;
        	$pro->status = '1';
        	$f = $rq->file('txtimg')->getClientOriginalName();
        	$filename = time().'_'.$f;
        	$pro->images = $filename;    	
        	$rq->file('txtimg')->move('public/uploads/products/',$filename);
        	$pro->save();    	
        	$pro_id =$pro->id;

            // add detail products
        	$detail = new Pro_details();

        	$detail->features1 = $rq->txtfeatures1;
        	$detail->features2 = $rq->txtfeatures2;
        	$detail->features3 = $rq->txtfeatures3;
        	$detail->features4 = $rq->txtfeatures4;

        	$detail->pro_id = $pro_id;
        	$detail->created_at = new datetime;
        	$detail->save();    	
            // add image slide products
        	if ($rq->hasFile('txtdetail_img')) {
        		$df = $rq->file('txtdetail_img');
        		foreach ($df as $row) {
        			$img_detail = new Detail_img();
        			if (isset($row)) {
        				$name_img= time().'_'.$row->getClientOriginalName();
        				$img_detail->images_url = $name_img;
        				$img_detail->pro_id = $pro_id;
        				$img_detail->created_at = new datetime;
        				$row->move('public/uploads/products/details/',$name_img);
        				$img_detail->save();
        			}
        		}
    		}
    	return redirect('admin/sanpham/all')
          ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã thêm sản phẩm thành công !']);    
        }	

    }
    public function getdel($id)
    {   
        if (Auth::guard('admin')->user()->level ==1 || Auth::guard('admin')->user()->level ==2) {
            $detail = Detail_img::where('pro_id',$id)->get();
            foreach ($detail as $row) {                
                   $dt = Detail_img::find($row->id);
                   $pt = public_path('uploads/products/details/').$dt->images_url;  
                    if (file_exists($pt))
                    {
                        unlink($pt);
                    }
                   $dt->delete();                              
                }
        	$pro = Products::find($id);
            $pro->delete();
            return redirect('admin/sanpham/all')
             ->with(['flash_level'=>'result_msg','flash_massage'=>'Đã xóa !']);
        } else {
            echo '<script type="text/javascript">
                  alert("Bạn không có quyền thực hiện thao tác này !");                
                  window.location = "';
                  echo route('adminhome');
                  echo '";
                </script>';
        }
    }
    public function getedit($id)
    {
        if (Auth::guard('admin')->user()->level ==1 || Auth::guard('admin')->user()->level ==2) {
            $dt = Products::where('id',$id)->first();
            $c_id= $dt->cat_id;
            $loai= Category::where('id',$c_id)->first();
            $p_id = $loai->parent_id;
            $cat= Category::where('parent_id','<>',9)->where('id','<>',9)->get();
            $pro = Products::where('id',$id)->first();
            return view('back-end.products.edit',['pro'=>$pro,'cat'=>$cat]);
        } else {
            echo '<script type="text/javascript">
                  alert("Bạn không có quyền thực hiện thao tác này !");                
                  window.location = "';
                  echo route('adminhome');
                  echo '";
                </script>';
        }     

    }
    public function postedit($id,Request $rq)
    {
        //kiem tra coi co ton tai file khong
        if ($rq->hasFile('txtimg')) {
            $validator = Validator::make(
                $rq->only('txtname', 'sltCate', 'txtimg', 'txtre_Intro','txtprice'),
                Products::$validators,Products::$msg
                );
        } else {
            $validator = Validator::make(
                $rq->only('txtname', 'sltCate', 'txtre_Intro','txtprice'),
                Products::$edit_vld,Products::$msg
                );
        }
        if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            } else{
        	$pro = Products::find($id);

            $pro->name = $rq->txtname;
            $pro->slug = str_slug($rq->txtname,'-');
            $pro->model = $rq->txtmodel;
            $pro->manufacturer = $rq->txtmanufacturer;
            $pro->make_in = $rq->txtmake_in;
            $pro->design = $rq->txtthietke;
            $pro->size = $rq->txtsize;
            $pro->color = $rq->txtcolor;
            $pro->type = $rq->txttype;
            $pro->apply = $rq->txtapp;
            $pro->warranty = $rq->txtbaohanh;
            $pro->qty = $rq->txtsl;
            
            $pro->review = $rq->txtReview;
            $pro->tag = $rq->txttag;
            $pro->price = $rq->txtprice;
            $pro->cat_id = $rq->sltCate;

            $pro->a_id = Auth::guard('admin')->user()->id;//lay  id cua user dang dang nhap admin
            $pro->updated_at = new datetime;
            $pro->status = '1';

            $file_path = public_path('uploads/products/').$pro->images;        
            if ($rq->hasFile('txtimg')) {
                if (file_exists($file_path))
                    {
                        unlink($file_path);
                    }
                
                $f = $rq->file('txtimg')->getClientOriginalName();
                $filename = time().'_'.$f;
                $pro->images = $filename;       
                $rq->file('txtimg')->move('public/uploads/products/',$filename);
            }       
            $pro->save();             

            $pro->pro_details->features1 = $rq->txtfeatures1;
            $pro->pro_details->features2 = $rq->txtfeatures2;
            $pro->pro_details->features3 = $rq->txtfeatures3;
            $pro->pro_details->features4 = $rq->txtfeatures4;
            $pro->pro_details->updated_at = new datetime;        

            if ($rq->hasFile('txtdetail_img')) {
                $detail = Detail_img::where('pro_id',$id)->get();
                $df = $rq->file('txtdetail_img');
                foreach ($detail as $row) {                
                   $dt = Detail_img::find($row->id);
                   $pt = public_path('uploads/products/details/').$dt->images_url; 
                   // dd($pt);   
                    if (file_exists($pt))
                    {
                        unlink($pt);
                    }
                   $dt->delete();                              
                }
                foreach ($df as $row) {
                    $img_detail = new Detail_img();
                    if (isset($row)) {
                        $name_img= time().'_'.$row->getClientOriginalName();
                        $img_detail->images_url = $name_img;
                        $img_detail->pro_id = $id;
                        $img_detail->created_at = new datetime;
                        $row->move('public/uploads/products/details/',$name_img);
                        $img_detail->save();
                    }
                }
            }
        $pro->pro_details->save();
        return redirect('admin/sanpham/all')
          ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã lưu !']);       
        }
    }
}
