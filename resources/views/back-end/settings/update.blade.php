@extends('back-end.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Settings</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><small>Cài đặt trang Shop</small></h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">					
					<div class="panel-body">
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
					      		<label for="input-id">Tên shop của bạn</label>
					      		<input type="text" name="txtSitename" id="inputtxtSitename" class="form-control" value="{!! old('txtSitename',isset($data["sitename"]) ? $data["sitename"] : null) !!}" required="required">
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Tiêu đề trên head</label>
				      			<input type="text" name="txtHeadline" id="inputtxtHeadline" class="form-control" value="{!! old('txtHeadline',isset($data["headline"]) ? $data["headline"] : null) !!}" required="required">
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Logo trang</label>
				      			<input type="file" name="Logo" id="inputLogo" class="form-control" value="{!! old('Logo',isset($data["logo"]) ? $data["logo"] : null) !!}" accept="image/png">
				      			Logo cũ: <img src="{!!url('public/images/'.$data->logo)!!}" alt="{!!$data->logo!!}" width="80" height="60">
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">ID Google Plus (G+)</label>
				      			<input type="text" name="txtGgplus" id="inputtxtGgplus" class="form-control" value="{!! old('txtGgplus',isset($data["ggplus"]) ? $data["ggplus"] : null) !!}" required="required">
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">ID Facebook Shop</label>
				      			<input type="text" name="txtFacebook" id="inputtxtFacebook" class="form-control" value="{!! old('txtFacebook',isset($data["facebook"]) ? $data["facebook"] : null) !!}" required="required">
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">ID Twitter Shop</label>
				      			<input type="text" name="txtTwitter" id="inputtxtTwitter" class="form-control" value="{!! old('txtTwitter',isset($data["twitter"]) ? $data["twitter"] : null) !!}" required="required">
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id"> ID gganalytic</label>
				      			<input type="text" name="txtGganalytic" id="inputtxtGganalytic" class="form-control" value="{!! old('txtGganalytic',isset($data["gganalytic"]) ? $data["gganalytic"] : null) !!}" required="required">
				      		</div>
				      		<input type="submit" name="btnCateAdd" class="btn btn-primary" value="Cập nhật" class="button" />
				      	</form>			      	
					</div>
				</div>
			</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->
@endsection