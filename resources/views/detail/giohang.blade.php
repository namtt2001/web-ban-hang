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
							<h3> Chi tiết giỏ hàng của bạn</h3>							
						</div>
						<div class="panel panel-success" style="min-height: 200px;">
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
					            <div class="panel-body">
					              <div class="table-responsive">
					                <table class="table table-bordered">
					                  <thead>
					                    <tr>
					                      <th>ID</th>
					                      <th>Hình ảnh</th>
					                      <th>Tên sản phẩm</th>
					                      <th>SL</th>
					                      <th>Action</th>
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
					                          @if (($row->qty) >1)
					                          <a href="{!!url('gio-hang/update/'.$row->rowId.'/'.$row->qty.'-down')!!}"><span class="glyphicon glyphicon-minus"></span></a> 
					                          @else
					                            <a href="#"><span class="glyphicon glyphicon-minus"></span></a> 
					                          @endif
					                          <input type="text" class="qty text-center" value=" {!!$row->qty!!}" style="width:30px; font-weight:bold; font-size:15px; color:blue;" readonly="readonly"> 
					                        <a href="{!!url('gio-hang/capnhat/'.$row->rowId.'/'.$row->qty.'-up')!!}"><span class="glyphicon glyphicon-plus-sign"></span></a>
					                      </td>
					                      <td><a href="{!!url('gio-hang/xoa/'.$row->rowId)!!}" onclick="return xacnhan('Xóa sản phẩm này ?')" ><span class="glyphicon glyphicon-remove" style="padding:5px; font-size:18px; color:red;"></span></a></td>
					                      <td>{!! number_format($row->price) !!} Vnd</td>
					                      <td>{!! number_format($row->qty * $row->price) !!} Vnd</td>
					                    </tr>
					                  @endforeach                    
					                    <tr>
					                      <td colspan="4"><strong>Tổng cộng :</strong> </td>
					                      <td>{!!Cart::count()!!}</td>
					                      <td colspan="2" style="color:red;">{!!Cart::subtotal()!!} Vnd</td>                      
					                    </tr>                    
					                  </tbody>
					                </table> 
					                @if(Cart::count() !=0)   
					                <a href="{!!url('/gio-hang/huy')!!}" onclick="return xacnhan('Bạn có chắc ?')" class="btn btn-warning ">Làm rỗng giỏ</a>
					                @endif    
					                <hr>       
					              </div>
					              <div class="col-xs-12 col-sm-12 col-md-12 no-paddng">
					              @if(Cart::count() !=0)					                
					                  <form action="{!!url('/dat-hang')!!}" method="get" accept-charset="utf-8">                    
					                    <div class="col-md-6">
						                	<div class="input-group">
						                      <select name="paymethod" id="inputPaymethod" class="form-control" required="required">
						                      	<option value="">Hãy chọn phương thức thanh toán</option> 
						                        <option value="cod">COD (thanh toán khi nhận hàng)</option>
{{-- 						                        <option value="paypal">Paypal (Thanh toán qua Paypal)</option>    --}}                   
						                      </select>
						                    </div>
						                </div>
						                <div class="col-md-6">
						                	<a href="{!!url('/')!!}" type="button" class="btn btn-large btn-primary"> Tiếp tục mua sắm</a> &nbsp;	
						                	 <button type="submit" class="btn btn-danger pull-right">Đặt hàng</button>			                  	
						                </div>					                      
					                  </form>
					              @endif
					              </div>
					              <hr>
					            </div>
					          </div>
						<div class="clearfix"> </div>																
							@include('modules.alsolike')													
						</div>
					<div class="col-sm-3 no-padding" style="border-left:1px dotted #95a5a6;">				
						@include('modules.hot')
						<div class="ads300x250">
							@include('modules.ads300x250')
						</div>
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