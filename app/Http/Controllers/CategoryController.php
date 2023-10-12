<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Category;
use DateTime,Auth;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function __construct()
   {
      $this->middleware('admin');
   }
   public function getlist()
   {
      if (Auth::guard('admin')->user()->level ==1 || Auth::guard('admin')->user()->level ==2) {
   		$data = Category::all();
   		return View ('back-end.category.cat-list',['data'=>$data]);
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
   		$data = Category::all();
   		return View ('back-end.category.add',['data'=>$data]);
      } else {
         echo '<script type="text/javascript">
                  alert("Bạn không có quyền thực hiện thao tác này !");                
                  window.location = "';
                  echo route('adminhome');
                  echo '";
                </script>';
      }
   }
   public function postadd(request $rq)
   {
		$cat = new Category();
      $cat->parent_id= $rq->sltCate;
      $cat->name= $rq->txtCateName;
      $cat->slug = str_slug($rq->txtCateName,'-');
         $cat->created_at = new DateTime;
      $cat->save();
      return redirect()->route('getcat')
      ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã thêm thành công !']);
         
   }
   public function getedit($id)   {
      if (Auth::guard('admin')->user()->level ==1 || Auth::guard('admin')->user()->level ==2) {
         $cat = Category::all();
         $data = Category::findOrFail($id)->toArray();
         return View ('back-end.category.edit',['cat'=>$cat,'data'=>$data]);
      } else {
         echo '<script type="text/javascript">
                  alert("Bạn không có quyền thực hiện thao tác này !");                
                  window.location = "';
                  echo route('adminhome');
                  echo '";
                </script>';
      }
   }
   public function postedit($id,request $request)
   {
      $cat = category::find($id);
      $cat->name = $request->txtCateName;
      $cat->slug = str_slug($request->txtCateName,'-');
      $cat->parent_id = $request->sltCate;
      $cat->updated_at = new DateTime;
      $cat->save();
      return redirect()->route('getcat')
      ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã sửa']);

   }
   public function getdel($id)
   {
      if (Auth::guard('admin')->user()->level ==1 || Auth::guard('admin')->user()->level ==2) {
         $parent_id = category::where('parent_id',$id)->count();
         if ($parent_id==0) {
            $category = category::find($id);
            $category->delete();
            return redirect()->route('getcat')
            ->with(['flash_level'=>'result_msg','flash_massage'=>'Đã xóa !']);
         } else{
            echo '<script type="text/javascript">
                     alert("Không thể xóa danh mục này !");                
                   window.location = "';
                   echo route('getcat');
               echo '";
            </script>';
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
}
