<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth,DB;
use App\Products;
use App\Category;

class AdminController extends Controller
{
    public function __construct()
	{
		$this->middleware('admin');
	}
	public function index()
	{
		return view ('back-end.home');
	}
	public function getthongkeday(){
		if (Auth::guard('admin')->user()->level ==1) {
			$data = DB::table('oders')
				->join('users', 'users.id', '=', 'oders.c_id')
				->select('oders.*','users.name','users.email','users.address')
				->whereRaw('DAY( oders.created_at ) = DAY (CURRENT_DATE) and MONTH( oders.created_at ) = MONTH (CURRENT_DATE) ')
				->orderBy('oders.created_at','DESC')
				->get();
	        return view('back-end.statistical',['data'=>$data,'type'=>'day']);
	    } else {
	    	echo '<script type="text/javascript">
                  alert("Bạn không có quyền thực hiện thao tác này !");                
                  window.location = "';
                  echo route('adminhome');
                  echo '";
                </script>';
	    }
	}
	public function getthongkemonth(){
		if (Auth::guard('admin')->user()->level ==1) {
			$data = DB::table('oders')
				->join('users', 'users.id', '=', 'oders.c_id')
				->select('oders.*','users.name','users.email','users.address')
				->whereRaw('YEAR( oders.created_at ) = YEAR (CURRENT_DATE) and MONTH( oders.created_at ) = MONTH (CURRENT_DATE)')
				->orderBy('oders.created_at','DESC')
				->get();
	        return view('back-end.statistical',['data'=>$data,'type'=>'month']);
	    } else {
	    	echo '<script type="text/javascript">
                  alert("Bạn không có quyền thực hiện thao tác này !");                
                  window.location = "';
                  echo route('adminhome');
                  echo '";
                </script>';
	    }
	}
	public function getthongkepro(){
		if (Auth::guard('admin')->user()->level ==1) {
			$data = DB::table('oders_detail')
				->join('oders', 'oders.id', '=', 'oders_detail.o_id')
				->join('products', 'products.id', '=', 'oders_detail.pro_id')
				->join('category', 'category.id', '=', 'products.cat_id')
				->selectRaw('oders_detail.pro_id, COUNT(oders_detail.pro_id) as sl , products.name,products.model, products.price , products.images,category.name as cat_name')
				->whereRaw('YEAR( oders_detail.created_at ) = YEAR (CURRENT_DATE) and MONTH( oders_detail.created_at ) = MONTH (CURRENT_DATE) and oders.status=2')
				->groupBy('oders_detail.pro_id')
				->orderBy('sl','DESC')
				->get();
	        return view('back-end.pro-statistical',['data'=>$data,'type'=>'pro']);
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
