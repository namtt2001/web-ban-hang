<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table ='products';// neu khong co ten bang nay thi no mac dinh cai model o tren no se lay ten bang cua model
    protected $guarded =[];

    public static $validators = array(
        'txtname'   => 'required|min:3',
        'sltCate'  => 'required',        
        'txtimg'  => 'required|image',
        'txtprice'  => 'required'
        );
    public static $edit_vld = array(
        'txtname'   => 'required|min:3',
        'sltCate'  => 'required',
        'txtprice'  => 'required'
        );
    public static $msg = array(
            'txtname.required'   => 'Vui lòng nhập tên sản phẩm.',
            'txtname.min'   => 'Vui lòng nhập độ dài tên phải lớn hơn 3 ký tự.',
            'sltCate.required'  => 'Vui lòng chọn danh mục cho sản phẩm',
            'txtimg.required'  => 'Vui lòng chọn hình ảnh',
            'txtimg.image'  => 'Vui lòng chọn đúng định dạng hình ảnh',
            'txtre_Intro.required'  => 'Vui lòng nhập đánh giá nhanh cho sản phẩm',
            'txtprice.required'  => 'Vui lòng nhập giá bán cho sản phẩm'
        );

	public function category()
	{
		return $this->belongsTo('App\Category','cat_id');
	}
	public function pro_details()
    {
        return $this->hasOne('App\Pro_details','pro_id');
    }
    public function detail_img()
    {
        return $this->hasMany('App\Detail_img','pro_id');
    }
    public function oders_detail()
    {
        return $this->hasOne('App\Oders_detail','pro_id');
    }
}
