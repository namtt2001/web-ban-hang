<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin_users;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class Admin_usersController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
  }
   public function getlist()
   {
      if (Auth::guard('admin')->user()->level ==1) {
     		$data = Admin_users::paginate(10);
      	return view('back-end.admin_mem.list',['data'=>$data]);
      } else {
        echo '<script type="text/javascript">
                  alert("Bạn không phải quản trị hệ thống !");                
                  window.location = "';
                  echo route('adminhome');
                  echo '";
                </script>';
      }
   }
   public function getadd()
   {
      if (Auth::guard('admin')->user()->level ==1) {
    	 return view('back-end.admin_mem.add');
      } else {
         echo '<script type="text/javascript">
                  alert("Bạn không phải quản trị hệ thống !");                
                  window.location = "';
                  echo route('adminhome');
                  echo '";
                </script>';
      }
   }
   public function postadd(Request $rq)
   {
   		$validator = Validator::make(
            $rq->only('name', 'email', 'password', 'password_confirmation','sltCate'),
            Admin_users::$validators,Admin_users::$msg
            );
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        } else{
          if (Auth::guard('admin')->user()->level ==1) {
              $us = new Admin_users();
              $us->name = $rq->name;
              $us->email = $rq->email;
              $us->password = bcrypt($rq->password);
              $us->level = $rq->sltCate;
              $us->save();
              return redirect()->route('getnv')
              ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã thêm thành công !']);
          } else {
              echo '<script type="text/javascript">
                  alert("Bạn không phải quản trị hệ thống !");                
                  window.location = "';
                  echo route('getnv');
                  echo '";
                </script>';
          }        	
        }    	
   }
   public function getedit($id)
   {

      if (Auth::guard('admin')->user()->level ==1) {
      //if ((Auth::user()->id != 1) && ($id == 1 || ($data["level"] == 2 && (Auth::user()->id != $id)))){
        
        $data = Admin_users::where('id',$id)->first();
        return view('back-end.admin_mem.edit',['data'=>$data]);
      } else {
        echo '<script type="text/javascript">
                  alert("Bạn không phải quản trị hệ thống !");                
                  window.location = "';
                  echo route('getnv');
                  echo '";
                </script>';
      }
   }
   public function postedit(Request$rq, $id)
   {
      $us = Admin_users::where('id',$id)->first();
      if ($rq->email != $us->email) {
        $validator = Validator::make(
        $rq->only('name', 'email', 'password', 'password_confirmation','sltCate'),
          Admin_users::$validators,Admin_users::$msg
        );
      } else {
          $validator = Validator::make(
          $rq->only('name', 'password', 'password_confirmation','sltCate'),
            Admin_users::$validators_edit,Admin_users::$msg
            );
      }      
      if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        } else{
          if (Auth::guard('admin')->user()->level ==1) {              
              $us->name = $rq->name;
              $us->email = $rq->email;
              $us->password = bcrypt($rq->password);
              $us->level = $rq->sltCate;
              $us->save();
              return redirect()->route('getnv')
              ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã cập nhật thành công !']);
          } else {
              echo '<script type="text/javascript">
                  alert("Bạn không phải quản trị hệ thống !");                
                  window.location = "';
                  echo route('getnv');
                  echo '";
                </script>';
          }         
        }  
   		
   }
   public function getdel($id)
   {
   		$per = Admin_users::findOrFail($id);
   		if (Auth::guard('admin')->user()->level ==1) {
	   			if ($per->level ==1) {
            echo '<script type="text/javascript">
                  alert("Không thể xóa tài khoản quản trị hệ thống !");                
                  window.location = "';
                  echo route('getnv');
                  echo '";
                </script>';
	   			} else {
	   			$del = Admin_users::findOrFail($id);
	   			$del->delete();
	   			return redirect()->route('getnv')
	          ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã xóa thành công !']);
	      		}
   		} else {
   			echo '<script type="text/javascript">
                  alert("Bạn không có quyền thực hiện thao tác này !");                
                window.location = "';
                echo route('getnv');
            echo '";
         </script>';
   		}
   }
}
