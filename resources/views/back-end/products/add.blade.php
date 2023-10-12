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
				<h1 class="page-header"><small>Thêm sản phẩm mới</small></h1>
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
					      				<?php MenuMulti($cat,0,$str='---| ',old('sltCate')); ?>
					      		</select>
				      		</div>
				      		<div class="row">
					      		<div class="form-group">
					      			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						      			<label for="input-id">Tên sản phẩm</label>
						      			<input type="text" name="txtname" id="inputTxtname" class="form-control" value="{{ old('txtname') }}"  required="required" >
					      			</div>
					      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					      				<label for="input-id">Nhà sản xuất</label>
					      				<input type="text" name="txtmanufacturer" id="inputtxtmanufacturer" class="form-control" value="{!! old('txtmanufacturer')!!}">
					      			</div>
					      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					      				<label for="input-id">Model sản phẩm</label>
					      				<input type="text" name="txtmodel" id="inputmodel" class="form-control" value="{{ old('txtmodel') }}">
					      			</div>
					      		</div>	
				      		</div>	      		
				      		
				      		<div class="form-group">				      			
				      			<div class="row">
					      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					      				Hình ảnh : <input type="file" name="txtimg" accept="image/png" id="inputtxtimg" value="{{ old('txtimg') }}" class="form-control" required="required">
					      			</div>
					      			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
					      				Giá bán : <input type="number" name="txtprice" id="inputtxtprice" class="form-control" value="{{ old('txtprice') }}" required="required">
					      			</div>
					      			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					      				Tag : <input type="text" name="txttag" id="inputtag" value="{{ old('txttag') }}" class="form-control">
					      			</div>
					      		</div>				      			
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id"> Chi tiết cấu hình sản phẩm</label>
				      			<div class="row">
					      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					      				Xuất xứ : <input type="text" name="txtmake_in" id="inputtxtCpu" value="{{ old('txtmake_in') }}" class="form-control" >
					      			</div>
					      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					      				Thiết kế : <input type="text" name="txtthietke" id="inputtxtthietke" value="{{ old('txtthietke') }}" class="form-control" >
					      			</div>
					      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					      				Kích thước : <input type="text" name="txtsize" id="inputtxtsize" value="{{ old('txtsize') }}" class="form-control" >
					      			</div>
					      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="padding-left: 0;">	
					      				màu sắc	<input type="text" name="txtcolor" id="inputtxtcolor" value="{{ old('txtcolor') }}" class="form-control">
					      			</div>
					      		</div>
					      		<div class="row">
					      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					      				Loại (loại bóng) : <input type="text" name="txttype" id="inputtxttype" value="{{ old('txttype') }}" class="form-control" >
					      			</div>
					      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					      				Ứng dụng : <input type="text" name="txtapp" id="inputtxtapp" value="{{ old('txtapp') }}" class="form-control">
					      			</div>
					      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					      				Thời gian bảo hành <input type="text" name="txtbaohanh" id="inputtxtbaohanh" value="{{ old('txtbaohanh') }}" class="form-control" >
					      			</div>
					      		</div>				      			
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Đặc điểm sản phẩm</label>
				      			<div class="row">
				      				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						      				Đặc điểm 1 : <input type="text" name="txtfeatures1" id="inputtxtfeatures1" value="{{ old('txtfeatures1') }}" class="form-control" >
						      		</div>
						      		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						      				Đặc điểm  2 : <input type="text" name="txtfeatures2" id="inputtxtfeatures2" value="{{ old('txtfeatures2') }}" class="form-control" >
						      		</div>
						      		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						      				Đặc điểm  3 : <input type="text" name="txtfeatures3" id="inputtxtfeatures3" value="{{ old('txtfeatures3') }}" class="form-control" >
						      		</div>
						      		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						      				Đặc điểm 4 : <input type="text" name="txtfeatures4" id="inputtxtfeatures4" value="{{ old('txtfeatures4') }}" class="form-control" >
						      		</div>					      			
					      		</div>				      			
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Hình ảnh chi tiết sản phẩm</label>
				      			<div class="row">
					      			@for( $i=1; $i<=8; $i++)
					      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					      				Hình ảnh {!!$i!!} : <input type="file" name="txtdetail_img[]" value="{{ old('txtdetail_img[]') }}" accept="image/*" id="inputtxtdetail_img" class="form-control">
					      			</div>
					      			@endfor
					      		</div>				      			
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Đánh giá chi tiết sản phẩm</label>
				      			<div class="row">					      			
					      			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					      				<label for="input-id">Bài đánh giá chi tiết</label>
					      				<textarea name="txtReview" id="inputtxtReview" class="form-control" rows="14" value="{{ old('txtReview') }}"></textarea>
					      			</div>
					      		</div>				      			
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Số lượng </label>
				      			<div class="row">
					      			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					      				<input type="number" name="txtsl" id="inputTxtsl" class="form-control" value="{!! old('txtsl') !!}" min="" max="1000" step="1">	
					      			</div>	
					      		</div>		      			
				      		</div> 	    
				      		<input type="submit" name="btnCateAdd" class="btn btn-primary" value="Thêm sản phẩm" class="button" />
				      	</form>			      	
					</div>
				</div>
			</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->
@endsection