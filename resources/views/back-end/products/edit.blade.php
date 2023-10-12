@extends('back-end.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><small>Sửa sản phẩm </small></h1>
			</div>
		</div><!--/.row-->		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">					
					<div class="panel-body" style="background-color: #ecf0f1; color:#27ae60;">
					@if (count($errors) > 0)
				    	<div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
				    </div>
				    @elseif (Session()->has('flash_level'))
				    	<div class="alert alert-success">
					        <ul>
					            {!! Session::get('flash_massage') !!}	
					        </ul>
					    </div>
					@endif
					<form action="" method="POST" role="form" enctype="multipart/form-data">
				      		{{ csrf_field() }}
				      		<div class="form-group">
					      		<label for="input-id">Chọn danh mục</label>
					      		<select name="sltCate" id="inputSltCate" required class="form-control">
					      			<option value="">-- Lựa chọn chuyên mục --</option>					      			
					      				<?php MenuMulti($cat,0,$str='---| ', old('sltCate',isset($pro["cat_id"]) ? $pro["cat_id"] : 0)) ?>					      		
					      		</select>
				      		</div>
				      		<div class="row">
					      		<div class="form-group">
					      			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						      			<label for="input-id">Tên sản phẩm</label>
						      			<input type="text" name="txtname" id="inputTxtname" class="form-control" value="{!! old('txtname',isset($pro["name"]) ? $pro["name"] : null) !!}" required="required" >
					      			</div>
					      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					      				<label for="input-id">Nhà sản xuất</label>
					      				<input type="text" name="txtmanufacturer" id="inputtxtmanufacturer" class="form-control" value="{!! old('txtmanufacturer',isset($pro["manufacturer"]) ? $pro["manufacturer"] : null) !!}">
					      			</div>
					      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					      				<label for="input-id">Model sản phẩm</label>
					      				<input type="text" name="txtmodel" id="inputmodel" class="form-control" value="{!! old('txtname',isset($pro["model"]) ? $pro["model"] : null) !!}">
					      			</div>
					      		</div>	
				      		</div>	      		
				      		
				      		<div class="form-group">				      			
				      			<div class="row">
				      				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
				      					Hình ảnh cũ: <img src="{!! url('public/uploads/products/').'/'.$pro->images !!}" alt="img products" width="100" height="70">	
				      				</div>
					      			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
					      				Chọn hình ảnh mới : <input type="file" name="txtimg" accept="image/png" id="inputtxtimg" value="{{ old('txtimg') }}" class="form-control">
					      			</div>
					      			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
					      				Giá bán : <input type="number" name="txtprice" id="inputtxtprice" class="form-control" value="{!! old('txtname',isset($pro["price"]) ? $pro["price"] : null) !!}" required="required">
					      			</div>
					      			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					      				Tag : <input type="text" name="txttag" id="inputtag" value="{!! old('txtname',isset($pro["tag"]) ? $pro["tag"] : null) !!}" class="form-control">
					      			</div>
					      		</div>				      			
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id"> Chi tiết cấu hình sản phẩm</label>
				      			<div class="row">
					      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					      				Xuất xứ : <input type="text" name="txtmake_in" id="inputtxtCpu" value="{!! old('txtmake_in',isset($pro["make_in"]) ? $pro["make_in"] : null) !!}" class="form-control" >
					      			</div>
					      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					      				Thiết kế : <input type="text" name="txtthietke" id="inputtxtthietke" value="{!! old('txtthietke',isset($pro["	design"]) ? $pro["	design"] : null) !!}" class="form-control" >
					      			</div>
					      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					      				Kích thước : <input type="text" name="txtsize" id="inputtxtsize" value="{!! old('txtsize',isset($pro["size"]) ? $pro["size"] : null) !!}" class="form-control" >
					      			</div>
					      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="padding-left: 0;">	
					      				màu sắc	<input type="text" name="txtcolor" id="inputtxtcolor" value="{!! old('txtcolor',isset($pro["color"]) ? $pro["color"] : null) !!}" class="form-control">
					      			</div>
					      		</div>
					      		<div class="row">
					      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					      				Kiểu - loại bóng : <input type="text" name="txttype" id="inputtxttype" value="{!! old('txttype',isset($pro["type"]) ? $pro["type"] : null) !!}" class="form-control" >
					      			</div>
					      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					      				Ứng dụng : <input type="text" name="txtapp" id="inputtxtapp" value="{!! old('txtapp',isset($pro["apply"]) ? $pro["apply"] : null) !!}" class="form-control">
					      			</div>
					      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					      				Thời gian bảo hành <input type="text" name="txtbaohanh" id="inputtxtbaohanh" value="{!! old('txtbaohanh',isset($pro["warranty"]) ? $pro["warranty"] : null) !!}" class="form-control" >
					      			</div>
					      		</div>				      			
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Đặc điểm sản phẩm</label>
				      			<div class="row">
				      				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						      				Đặc điểm 1 : <input type="text" name="txtfeatures1" id="inputtxtfeatures1" value="{!! old('txtfeatures1',isset($pro->pro_details["features1"]) ? $pro->pro_details["features1"] : null) !!}" class="form-control" >
						      		</div>
						      		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						      				Đặc điểm  2 : <input type="text" name="txtfeatures2" id="inputtxtfeatures2" value="{!! old('txtfeatures2',isset($pro->pro_details["features2"]) ? $pro->pro_details["features2"] : null) !!}" class="form-control" >
						      		</div>
						      		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						      				Đặc điểm  3 : <input type="text" name="txtfeatures3" id="inputtxtfeatures3" value="{!! old('txtfeatures2',isset($pro->pro_details["features3"]) ? $pro->pro_details["features3"] : null) !!}" class="form-control" >
						      		</div>
						      		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						      				Đặc điểm 4 : <input type="text" name="txtfeatures4" id="inputtxtfeatures4" value="{!! old('txtfeatures2',isset($pro->pro_details["features4"]) ? $pro->pro_details["features4"] : null) !!}" class="form-control" >
						      		</div>					      			
					      		</div>				      			
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Hình ảnh chi tiết sản phẩm</label>
				      			<?php $stt=0; ?>
				      			<div class="row">
					      			@foreach($pro->detail_img as $row)
					      				<?php $stt++; ?>
					      				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">						 
						      				Ảnh cũ: {!!$stt!!}<img src="{!!url('public/uploads/products/details/'.$row->images_url)!!}" alt="{!!$row->images_url!!}" width="80" height="60">
						      			</div>
					      			@endforeach
					      		</div>
					      		<div class="row">
					      			@for( $i=1; $i<=12; $i++)
					      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					      				Hình ảnh mới {!!$i!!} : <input type="file" name="txtdetail_img[]" value="{{ old('txtdetail_img[]') }}" accept="image/*" id="inputtxtdetail_img" class="form-control">
					      			</div>
					      			@endfor
					      		</div>				      			
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Đánh giá chi tiết sản phẩm</label>
				      			<div class="row">					      			
					      			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					      				<label for="input-id">Bài đánh giá chi tiết</label>
					      				<textarea name="txtReview" id="inputtxtReview" class="form-control" rows="14"> 
					      					{!! old('txtReview',isset($pro["review"]) ? $pro["review"] : null) !!}
					      				</textarea>
					      			</div>
					      		</div>				      			
				      		</div>	 
				      		<div class="form-group">
				      			<label for="input-id">Số lượng </label>
				      			<div class="row">
					      			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					      				<input type="number" name="txtsl" id="inputTxtsl" class="form-control" value="{!! old('txtsl',isset($pro->qty) ? $pro->qty : null) !!}" min="" max="1000" step="1">	
					      			</div>	
					      		</div>		      			
				      		</div>   
				      		<input type="submit" name="btnCateAdd" class="btn btn-primary" value="Lưu Lại" class="button" />
				      	</form>						
					</div>
				</div>
			</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection