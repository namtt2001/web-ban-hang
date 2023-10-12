<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Oders;

class UsersController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
  }
    public function getlist()
   {
   		$data = User::paginate(10);
    	return view('back-end.users.list',['data'=>$data]);
   }
   public function getkhedit($id)
   {
      $data = User::where('id',$id)->first();
      return view('back-end.users.edit',['data'=>$data]);
   }
   public function postkhedit($id)
   {
   		$data = User::where('id',$id)->first();
   		return view('back-end.users.edit',['data'=>$data]);
   }
   public function getdel($id)
   {
     $us = User::find($id);

     $o = Oders::where('c_id',$id)->count();

     if ($o == 0) {
        $us->delete();
        return redirect('admin/khachhang')
          ->with(['flash_level'=>'result_msg','flash_massage'=>'Đã xóa khách hàng thành công !']);  
     } else{
        return redirect('admin/khachhang')
          ->with(['flash_level'=>'result_msg','flash_massage'=>'Tồn tại đơn đặt hàng của khách hàng này không thế xóa !']); 
     }     
   }
}
