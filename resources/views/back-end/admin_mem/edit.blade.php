@extends('back-end.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Nhân viên</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><small>Sửa thông tin nhân viên</small></h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">					
					<div class="panel-body">
						<form action="" method="POST" role="form">
				      		{{ csrf_field() }}
				      		<div class="form-group">
					      		<label for="input-id"> Chọn Quyền </label>
					      		<select name="sltCate" id="inputSltCate" class="form-control" >
					      			<option value="1"
					      			@if($data["level"] == 1)
                       				 checked="checked"
                   					@endif
                   					>-- Quản trị viên --</option> 	
					      			<option value="2"@if($data["level"] == 2)
                        checked="checked"
                    @endif>-- Nhân viên hệ thống --</option> 		
					      			<option value="3"
					      				@if($data["level"] == 3)
                        checked="checked"
                    @endif
					      			>-- Nhân viên bán hàng --</option> 		
					      		</select>
				      		</div>
				      		<div class="form-group">
            <label>Username</label>
            <input class="form-control" name="txtUser" value="{!! old('txtUser',isset($data) ? $data['level'] : null) !!}" disabled />
        </div>
				      		<div class="form-group">
				      			<label for="input-id">Họ tên</label>
				      			<input type="text" name="name" id="inputTxtName" class="form-control" value="{!! old('name', isset($data['name']) ? $data['name'] : null)!!}" required="required">
				      		</div>
				      		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">Địa chỉ E-Mail</label>

	                            <div>
	                                <input id="email" type="email" class="form-control" name="email" value="{!! old('email', isset($data['email']) ? $data['email'] : null)!!}">

	                                @if ($errors->has('email'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                            <label for="password" class="control-label">Mật khẩu</label>

	                            <div>
	                                <input id="password" type="password" class="form-control" name="password">

	                                @if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
	                            <label for="password-confirm" class="control-label">Xác nhận mật khẩu</label>

	                            <div>
	                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

	                                @if ($errors->has('password_confirmation'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
	                            <input type="submit" name="btnCateAdd" class="btn btn-primary" value="Lưu lại" class="button">
	                        </div>
				      		
				      	</form>					      	
					</div>
				</div>
			</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->
@endsection