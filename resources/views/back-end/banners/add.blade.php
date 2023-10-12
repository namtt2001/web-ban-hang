@extends('back-end.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Banners</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><small>Thêm mới banners</small></h1>
            </div>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">                
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-2 control-label">Tên banner</label>

                                <div class="col-md-9">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

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
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-2 control-label">Địa chỉ URL: </label>
                                <div class="col-md-9">
                                    <input id="email" type="text" class="form-control" name="url" value="{{ old('url') }}">
                                    @if ($errors->has('url'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('url') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('url_banner') ? ' has-error' : '' }}">
                                <label  for="input-id" class="col-md-2 control-label"> Hình ảnh </label>
                                <div class="row">
                                    <div class="col-md-9">                                                                       
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                            <input type="file" name="url_banner" value="{{ old('url_banner[]') }}" accept="image" id="bn_img" class="form-control">
                                        </div>
                                    </div>
                                </div>                              
                            </div>
                            <div class="form-group {{ $errors->has('sltpost') ? ' has-error' : '' }}">
                                <label  for="input-id" class="col-md-2 control-label"> Vị trí đặt </label>
                                <div class="col-md-9">
                                    <select name="sltpost" id="sltpost" class="form-control">
                                        <option value="1">- Slide trang chủ --</option>    
                                        <option value="2">- Slide trang Tin tức --</option>       
                                        <option value="3">- Trang chi tiết --</option> 
                                        <option value="4">- Sản phẩm 1 trang chủ --</option>    
                                        <option value="5">- Sản phẩm 2 trang chủ --</option>        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('bn_img') ? ' has-error' : '' }}">
                                <label  for="input-id" class="col-md-2 control-label"> Hình ảnh </label>
                                <div class="row">
                                    <div class="col-md-9">
                                    @for( $i=1; $i<=6; $i++)                                    
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                            Hình ảnh {!!$i!!} : <input type="file" name="bn_img[]" value="{{ old('bn_img[]') }}" accept="image" id="bn_img" class="form-control"> <br>
                                            Thuyết minh về hình {!!$i!!} <input id="email" type="text" class="form-control" name="text_banner[]" value="{{ old('url') }}">
                                        </div>                                    
                                    @endfor
                                    </div>
                                </div>                              
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-1">
                                    <button type="submit" class="btn btn-primary">
                                        Thêm Banner
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/.row-->      
    </div>  <!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection