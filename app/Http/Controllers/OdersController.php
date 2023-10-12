<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oders;
use App\User;
use App\Oders_detail;
use DB,Auth;

class OdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
     public function getlist()
    {
    	$data = Oders::paginate(10);
        // dd($data);
    	return view('back-end.oders.list',['data'=>$data]);
    }

    public function getdetail($id)
    {
    	$oder = Oders::where('id',$id)->first();
    	$data = DB::table('oders_detail')
		 	->join('products', 'products.id', '=', 'oders_detail.pro_id')
		 	->groupBy('oders_detail.id')
		 	->where('o_id',$id)
		 	->get();
    	return view('back-end.oders.detail',['data'=>$data,'oder'=>$oder]);
    }
    public function postdetail($id, Request $rq)
    {
    	$oder = Oders::find($id);
        $oder->status = $rq->task;
    	$oder->a_id = Auth::guard('admin')->user()->id ;
    	$oder->save();
    	return redirect('admin/donhang')
      	->with(['flash_level'=>'result_msg','flash_massage'=>' Đã Thực hiện thành công thao tác !']);    	

    }
     public function getdel($id)
    {       
    	$oder = Oders::where('id',$id)->first();
        $us = User::where('id','=',$oder->c_id)->first();
    	if ($oder->status ==2) {
    		return redirect()->back()
    		->with(['flash_level'=>'result_msg','flash_massage'=>'Không thể xóa đơn hàng số: <strong>'.$id.'</strong> Của khách hàng : <strong>'.$us->name.'</strong>  vì đã giao hàng xong !']);
    	} else {
    		$oder = Oders::find($id);
        	$oder->delete();
        	return redirect('admin/donhang')
         	->with(['flash_level'=>'result_msg','flash_massage'=>'Đã hủy bỏ đơn hàng số:  '.$id.' !']);
     	}
    }
}
