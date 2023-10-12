<?php

namespace App;

class Admin_users extends User
{
    protected $table ='admin_users';

    public static $validators = array(
        'name'   => 'required|min:3',
        'email'  => 'required|email|unique:admin_users',        
        'password'  => 'required|min:6|confirmed',
        'password_confirmation'  => 'required|min:6',
        'sltCate'  => 'required'
        );
    public static $validators_edit = array(
        'name'   => 'required|min:3',       
        'password'  => 'required|min:6|confirmed',
        'password_confirmation'  => 'required|min:6',
        'sltCate'  => 'required'
        );

    public static $msg = array(
            'name.required'   => 'Vui lòng nhập họ tên.',
            'name.min'   => 'Vui lòng nhập họ tên lớn hơn 3 ký tự.',
            'email.required'  => 'Vui lòng nhập email',
            'email.email'  => 'Vui lòng nhập đúng email',
            'email.unique'  => 'Email đã tồn tại',
            'password.required'  => 'Vui lòng nhập mật khẩu',
            'password.confirmed'  => 'Mật khẩu không khớp',
            'password_confirmation.required'  => 'Vui lòng nhập lại mật khẩu',
            'sltCate.required'  => 'Vui lòng chọn quyền cho tài khoản',
            'password.min'  => 'Mật khẩu phải lớn hơn 6 ký tự',
            'password_confirmation.min'  => 'Mật khẩu phải lớn hơn 6 ký tự'
        );
    public function oders()
    {
        return $this->belongsTo('App\Oders','a_id');
    }
}
