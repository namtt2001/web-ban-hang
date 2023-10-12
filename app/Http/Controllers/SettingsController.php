<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use DB,datetime,Auth;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function getsettings()
    { 	
        if (Auth::guard('admin')->user()->level ==1) {
        	$count = Settings::count();
        	//default setting data
        	if ($count==0) {
        		$dt = new Settings();
        		$dt->sitename = 'Fshops';
        		$dt->headline = 'Fshops';
        		$dt->logo = 'fshop.png';
        		$dt->ggplus = 'Fshops';
        		$dt->facebook = 'vietdhtn';
        		$dt->twitter = 'vietdhtn';
        		$dt->gganalytic = 'vietdhtn';
        		$dt->created_at = new datetime;
        		$dt->save();
        	}
        	$data = Settings::first();
        	return view ('back-end.settings.update',['data'=>$data]);
        } else {
        echo '<script type="text/javascript">
                  alert("Bạn không phải quản trị hệ thống !");                
                  window.location = "';
                  echo route('adminhome');
                  echo '";
                </script>';
        }
    }
    public function postsettings(Request $rq)
    {
        if (Auth::guard('admin')->user()->level ==1) {
    	$dt = Settings::find(1);
		$dt->sitename = $rq->txtSitename;
		$dt->headline = $rq->txtHeadline;
		$dt->ggplus = $rq->txtGgplus;
		$dt->facebook = $rq->txtFacebook;
		$dt->twitter = $rq->txtTwitter;
		$dt->gganalytic = $rq->txtGganalytic;
		$dt->updated_at = new datetime;
		if ($rq->hasFile('Logo')) {
			$f = $rq->file('Logo')->getClientOriginalName();
        	$filename = time().'_'.$f;
        	$dt->logo = $filename;    	
        	$rq->file('Logo')->move('public/images/',$filename);
		}
    	$dt->save();
    	$data = Settings::find(1);
    	return redirect()->route('getupdate')
        ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã cập nhật thành công thông tin!','data'=>$data]);
    } else {
        echo '<script type="text/javascript">
                  alert("Bạn không phải quản trị hệ thống !");                
                  window.location = "';
                  echo route('adminhome');
                  echo '";
                </script>';
        }
    }
}
