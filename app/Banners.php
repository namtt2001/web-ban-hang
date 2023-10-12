<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    protected $table ='banners';

    // validate
    public static $validators = array(
        'name'   => 'required|min:3',
        'sltpost'  => 'required',        
        'url_banner'  => 'required|image'
        );
    public static $edit_vld = array(
        'name'   => 'required|min:3',
        'sltpost'  => 'required'
        );
    public static $msg = array(
            'name.required'   => 'Vui lòng nhập tên sản phẩm.',
            'name.min'   => 'Vui lòng nhập độ dài tên phải lớn hơn 3 ký tự.',
            'sltpost.required'  => 'Vui lòng chọn danh mục cho sản phẩm',
            'url_banner.required'  => 'Vui lòng chọn hình ảnh',
            'url_banner.image'  => 'Vui lòng chọn đúng định dạng hình ảnh'
        );

    public function banners_images()
    {
        return $this->hasMany('App\Banners_images','bn_id');
    }
}
