<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table ='news';
    protected $guarded =[];

    public static $validators = array(
        'txtTitle'   => 'required|min:3',
        'sltCate'  => 'required',
        'txtimg'  => 'required|image',
        'txtIntro'  => 'required|min:10'
        );
    public static $edit_vld = array(
        'txtTitle'   => 'required|min:3',
        'sltCate'  => 'required',        
        'txtIntro'  => 'required|min:10'
        );
    public static $msg = array(
    		'txtTitle.required'   => 'Vui lòng nhập tiêu đề.',
    		'txtTitle.min'   => 'Vui lòng nhập độ dài tiêu đề lớn hơn 3 ký tự.',
            'sltCate.required'  => 'Vui lòng chọn danh mục cho bản tin',
            'txtimg.required'  => 'Vui lòng chọn hình ảnh',
            'txtimg.image'  => 'Vui lòng chọn đúng định dạng hình ảnh',
            'txtIntro.required'  => 'Vui lòng nhập tóm tắt cho bản tin',
            'txtIntro.min'  => 'Vui lòng nhập tóm tắt cho bản tin lơn hơn 10 ký tự'
        );
	public function category()
	{
		return $this->belongsTo('App\Category','cat_id');
	}
}
