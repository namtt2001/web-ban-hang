@extends('layouts.content')
@section('title')
	Chi tiết: 
@stop
@section('content')
	<div class="content contentHome">
		<div class="container">
			<div class="row">	
				<div class="col-md-12" style="border-bottom: 1px solid #2c3e50;">
					<h3 class="panel-title" style="margin-top: 8px; padding-bottom: 8px;">
      					<span class="glyphicon glyphicon-home"><a href="{!!url('/')!!}"> Home</a></span> 
     					<span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span><a href="{!!url('/laptop')!!}">Giỏ hàng</a>
    				</h3> 
				</div>	
				<div class="contentdownload">
					<div class="col-sm-9">
					<div class="titledownload" style="padding-left: 25px;">
							<h3> Xác nhận đặt hàng</h3>							
						</div>
						<div class="panel panel-success">
				            <div class="panel-body">   
				            <legend class="text-left">Xác nhận thông tin đơn hàng</legend> 
				              <div class="table-responsive">
				                <table class="table table-bordered">
				                  <thead>
				                    <tr>
				                      <th>ID</th>
				                      <th>Hình ảnh</th>
				                      <th>Tên sản phẩm</th>
				                      <th>SL</th>
				                      <th>Giá</th>
				                      <th>Thành tiền</th>
				                    </tr>
				                  </thead>
				                  <tbody>
				                  @foreach(Cart::content() as $row)
				                    <tr>
				                      <td>{!!$row->id!!}</td>
				                      <td><img src="{!!url('public/uploads/products/'.$row->options->img)!!}" alt="dell" width="80" height="50"></td>
				                      <td>{!!$row->name!!}</td>
				                      <td class="text-center">                        
				                          <span>{!!$row->qty!!}</span>
				                      </td>
				                      <td>{!! number_format($row->price) !!} đ</td>
				                      <td>{!!number_format($row->qty * $row->price)!!} đ</td>
				                    </tr>
				                  @endforeach                    
				                    <tr>
				                      <td colspan="3"><strong>Tổng cộng :</strong> </td>
				                      <td>{!!Cart::count()!!}</td>
				                      <td colspan="2" style="color:red;">{!!Cart::subtotal()!!} đ</td>                      
				                    </tr>                    
				                  </tbody>
				                </table> 
				                 @if(Cart::count() !=0)   
					                <a href="{!!url('/gio-hang/huy')!!}" onclick="return xacnhan('Bạn có chắc ?')" class="btn btn-danger ">Làm rỗng giỏ</a> 
					             @endif               
				              </div>
				              <hr>
				              {{-- form thong tin khach hang dat hang           --}}
				              @if ($_GET['paymethod'] =='cod' )
				              <form action="" method="POST" role="form" >
				                <legend class="text-left" >Xác nhận thông tin khách hàng</legend>
				                {{ csrf_field() }}
				                <div class="form-group">
				                  <label for="ten">
				                    Tên khách hàng : <strong style="color:#d35400;">{{ Auth::user()->name }} </strong>				                    
				                  </label>
				                </div>
				                <div class="form-group">
				                  <label for="ten">
				                    Điện thoại: <strong  style="color:#d35400;"> {{ Auth::user()->phone }}</strong> <br>
				                  </label>
				                </div>
				                <div class="form-group">
				                  <label for="ten">
				                    Địa chỉ nhận hàng: <strong  style="color:#d35400;"> {{ Auth::user()->address }}</strong>
				                  </label>
				                </div>               
				                <div class="form-group">
				                  <label for="">Các ghi chú khác</label>
				                  <textarea name="txtnote" id="" class="form-control text-left" rows="3" required="required">
				                                   
				                  </textarea>
				                </div>   
				                <div class="col-md-6 col-md-offset-3">
				                	<button type="submit" class="btn btn-success btn-block">Xác nhận</button> 
				                </div>  
				              </form>
				              @else 
				              <form action="{!!url('/payment')!!}" method="Post" accept-charset="utf-8">
				                <input type="hidden" name="_token" value="{{ csrf_token() }}">
				                <legend class="text-left" >Xác nhận thông tin khách hàng</legend>
				                <div class="form-group">
				                  <label for="ten">
				                    Tên khách hàng : <strong style="color:#d35400;">{{ Auth::user()->name }} </strong>				                    
				                  </label>
				                </div>
				                <div class="form-group">
				                  <label for="ten">
				                    Điện thoại: <strong  style="color:#d35400;"> {{ Auth::user()->phone }}</strong> <br>
				                  </label>
				                </div>
				                <div class="form-group">
				                  <label for="ten">
				                    Địa chỉ nhận hàng: <strong  style="color:#d35400;"> {{ Auth::user()->address }}</strong>
				                  </label>
				                </div>
				                  <br>                
				                <button type="submit" class="btn btn-danger pull-left"> Thanh toán qua Paypal </button> &nbsp;
				              </form>
				              @endif
				            </div>
				          </div>
						<div class="clearfix"> </div>																
							@include('modules.alsolike')													
						</div>
					<div class="col-sm-3">						
						@include('modules.hot')
						<hr>
						@include('modules.pronew')
					</div>
				</div><!-- .contentdownload -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .contentHome -->
	<!-- BEGIN JS FRAMEWORK -->
	<script type="text/javascript">
		$(document).ready(function () {
			$("iframe").contents().find(".FP").css("background", "blue");
		});
	</script>
@stop