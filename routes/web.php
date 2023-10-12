<?php

// admin auth
Route::GET ('admin/login',['as'=> 'getlogin','uses'=> 'AdminAuth\LoginController@showLoginForm']);               
Route::POST('admin/login', ['as'=>'postlogin','uses'=>'AdminAuth\LoginController@login']);                      
Route::POST('admin/logout',['as'=>'adminlogout', 'uses'=>'AdminAuth\LoginController@logout']);      
Route::POST('admin/password/email', ['as'=>'sendmaillinkreset', 'uses'=>'AdminAuth\ForgotPasswordController@sendResetLinkEmail']);
Route::GET('admin/password/reset',  ['as'=>'getpasswordreset','uses'=>'AdminAuth\ForgotPasswordController@showLinkRequestForm']);
Route::POST('admin/password/reset', ['as'=>'postpasswordreset','uses'=>'AdminAuth\ResetPasswordController@reset']);           
Route::GET('admin/password/reset/{token} ', ['as'=>'getreset','uses'=>'AdminAuth\ResetPasswordController@showResetForm']);

//============================== front-end ==========================================
// home page
Route::get('/',['as'=>'index','uses'=>'PagesController@home']);
// category home pages
Route::get('/thap-sang',['as'=>'thapsangcat','uses'=>'PagesController@thapsangcat']);
Route::get('/ban',['as'=>'bancat','uses'=>'PagesController@bancat']);
Route::get('/trang-tri',['as'=>'trangtri','uses'=>'PagesController@trangtri']);
Route::get('/news',['as'=>'newscat','uses'=>'PagesController@newscat']);

Route::get('/moi-nhat',['as'=>'newscat','uses'=>'PagesController@lasted']);
// detail products
Route::get('/chi-tiet/{id}-{slug}',['as'=>'detail','uses'=>'PagesController@getdetail']);
// count 
Route::POST('/news/countview/{id}',['as'=>'count','uses'=>'PagesController@countview']);
Route::get('/news/{id}-{slug}',['as'=>'getnewsdetail','uses'=>'PagesController@getnewsdetail']);
// search
Route::POST('/tim-kiem',['as'=>'search','uses'=>'PagesController@search']);
Route::get('/tags/{tagsname}',['as'=>'search','uses'=>'PagesController@tags']);
Route::get('news/tags/{tagsname}',['as'=>'search','uses'=>'PagesController@newstags']);
// Xu ly gio hang
Route::get('gio-hang', ['as'  => 'getcart', 'uses' =>'PagesController@getcart']);

Route::get('gio-hang/them/{id}', ['as'  => 'getcartadd', 'uses' =>'PagesController@addcart']);
Route::get('gio-hang/capnhat/{id}/{qty}-{dk}', ['as'  => 'getupdatecart', 'uses' =>'PagesController@getupdatecart']);

Route::get('gio-hang/xoa/{id}', ['as'  => 'getdeletecart', 'uses' =>'PagesController@getdeletecart']);
Route::get('gio-hang/huy', ['as'  => 'getempty', 'uses' =>'PagesController@huy']);
// tien hanh dat hang
Route::get('dat-hang', ['as'  => 'getoder', 'uses' =>'CheckoutController@getoder']);
Route::post('dat-hang', ['as'  => 'postoder', 'uses' =>'CheckoutController@postoder']);

Auth::routes();

Route::get('/member', 'HomeController@index');

//============================== back-end ==========================================

Route::get('/admin',['as'=>'adminhome','uses'=>'AdminController@index']);

// -------------------- quan ly danh muc----------------------
Route::group(['prefix' => 'admin/danhmuc'], function() {
    Route::get('add',['as'        =>'getaddcat','uses' => 'CategoryController@getadd']);
    Route::post('add',['as'       =>'postaddcat','uses' => 'CategoryController@postadd']);

    Route::get('/',['as'       =>'getcat','uses' => 'CategoryController@getlist']);
    Route::get('del/{id}',['as'   =>'getdellcat','uses' => 'CategoryController@getdel'])->where('id','[0-9]+');
   
    Route::get('edit/{id}',['as'  =>'geteditcat','uses' => 'CategoryController@getedit'])->where('id','[0-9]+');
    Route::post('edit/{id}',['as' =>'posteditcat','uses' => 'CategoryController@postedit'])->where('id','[0-9]+');
	});
 // -------------------- quan ly san pham--------------------
Route::group(['prefix' => 'admin/sanpham'], function() {
   Route::get('/{loai}/add',['as'        =>'getaddpro','uses' => 'ProductsController@getadd']);
   Route::post('/{loai}/add',['as'       =>'postaddpro','uses' => 'ProductsController@postadd']);

   Route::get('/{loai}',['as'       =>'getpro','uses' => 'ProductsController@getlist']);
   Route::get('/del/{id}',['as'   =>'getdellpro','uses' => 'ProductsController@getdel'])->where('id','[0-9]+');
   
   Route::get('/edit/{id}',['as'  =>'geteditpro','uses' => 'ProductsController@getedit'])->where('id','[0-9]+');
   Route::post('/edit/{id}',['as' =>'posteditpro','uses' => 'ProductsController@postedit'])->where('id','[0-9]+');
});
// -------------------- quan ly danh muc-----------------------------
Route::group(['prefix' => 'admin/news'], function() {
   Route::get('/add',['as'        =>'getaddnews','uses' => 'NewsController@getadd']);
   Route::post('/add',['as'       =>'postaddnews','uses' => 'NewsController@postadd']);

   Route::get('/',['as'       =>'getnews','uses' => 'NewsController@getlist']);
   Route::get('/del/{id}',['as'   =>'getdellnews','uses' => 'NewsController@getdel'])->where('id','[0-9]+');
   
   Route::get('/edit/{id}',['as'  =>'geteditnews','uses' => 'NewsController@getedit'])->where('id','[0-9]+');
   Route::post('/edit/{id}',['as' =>'posteditnews','uses' => 'NewsController@postedit'])->where('id','[0-9]+');
});
// -------------------- quan ly đơn đặt hàng--------------------
Route::group(['prefix' => 'admin/donhang'], function() {

   Route::get('',['as'       =>'getpro','uses' => 'OdersController@getlist']);
   Route::get('/del/{id}',['as'   =>'getdeloder','uses' => 'OdersController@getdel'])->where('id','[0-9]+');
   
   Route::get('/detail/{id}',['as'  =>'getdetail','uses' => 'OdersController@getdetail'])->where('id','[0-9]+');
   Route::post('/detail/{id}',['as' =>'postdetail','uses' => 'OdersController@postdetail'])->where('id','[0-9]+');
});
// -------------------- quan ly thong tin khach hang--------------------
Route::group(['prefix' => 'admin/khachhang'], function() {

   Route::get('',['as'       =>'getmem','uses' => 'UsersController@getlist']);
   Route::get('/del/{id}',['as'   =>'getdelmem','uses' => 'UsersController@getdel'])->where('id','[0-9]+');
   
   Route::get('/edit/{id}',['as'  =>'geteditmem','uses' => 'UsersController@getkhedit'])->where('id','[0-9]+');
   Route::post('/edit/{id}',['as' =>'posteditmem','uses' => 'UsersController@postkhedit'])->where('id','[0-9]+');
});
// -------------------- quan ly thong nhan vien--------------------
Route::group(['prefix' => 'admin/nhanvien'], function() {

   Route::get('',['as'       =>'getnv','uses' => 'Admin_usersController@getlist']);

   Route::get('add',['as'=>'getadd','uses' => 'Admin_usersController@getadd']);
   Route::post('add',['as'=>'postadd','uses' => 'Admin_usersController@postadd']);

   Route::get('/del/{id}',['as'   =>'getdelnv','uses' => 'Admin_usersController@getdel'])->where('id','[0-9]+');
   
   Route::get('/edit/{id}',['as'  =>'geteditnv','uses' => 'Admin_usersController@getedit'])->where('id','[0-9]+');
   Route::post('/edit/{id}',['as' =>'posteditnv','uses' => 'Admin_usersController@postedit'])->where('id','[0-9]+');
});
// -------------------- thong ke ban hang--------------------
Route::group(['prefix' => 'admin/thongke'], function() {

   Route::get('day',['as'       =>'getthongkeday','uses' => 'AdminController@getthongkeday']);
   Route::get('month',['as'       =>'getthongkemonth','uses' => 'AdminController@getthongkemonth']);
   Route::get('pro',['as'       =>'getthongkepro','uses' => 'AdminController@getthongkepro']);
});
// ---------------cấu hình Shops ----------------------
Route::group(['prefix' => 'admin/settings'], function() {

   Route::get('',['as'=>'getupdate','uses' => 'SettingsController@getsettings']);
   Route::post('',['as'=>'postupdate','uses' => 'SettingsController@postsettings']);

});
// ---------------van de khac ----------------------
Route::group(['prefix' => 'admin/banners'], function() {

   Route::get('',['as'       =>'getbn','uses' => 'BannersControllers@getlist']);

   Route::get('add',['as'=>'getaddbanners','uses' => 'BannersControllers@getadd']);
   Route::post('add',['as'=>'postaddbanners','uses' => 'BannersControllers@postadd']);

   Route::get('/del/{id}',['as'   =>'getdelbanners','uses' => 'BannersControllers@getdel'])->where('id','[0-9]+');
   
   Route::get('/edit/{id}',['as'  =>'geteditbanners','uses' => 'BannersControllers@getedit'])->where('id','[0-9]+');
   Route::post('/edit/{id}',['as' =>'posteditbanners','uses' => 'BannersControllers@postedit'])->where('id','[0-9]+');
});