@extends('back-end.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Thống kế bán hàng</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-12"><div class="form-group">
								<label for="inputLoai" class="control-label pull-left"><strong> Chọn loại hình thống kê </strong></label>
								<div class="col-md-6">
									<select name="sltCate" id="inputLoai" class="form-control">
						      			<option value="0">- CHỌN MỘT LOẠI HÌNH THỐNG KÊ --</option>
						      			<option value="day" @if($type=='day') selected @endif> - Đơn hàng trong ngày</option> 		
						      			<option value="month" @if($type=='month') selected @endif> - Sản phẩm bán trong tháng</option>
						      			<option value="pro" @if($type=='pro') selected @endif> - Sản phẩm bán chạy nhất trong tháng</option>
						      		</select>
									<script>
									    document.getElementById("inputLoai").onchange = function() {
									        if (this.selectedIndex!==0) {
									            window.location.href = this.value;
									        }        
									    };
									</script>
								</div>
							</div>
							</div
						</div> 
						
					</div>
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
					<div class="panel-body" style="font-size: 12px;">
						@if ($type == 'day')
							<h4>DANH SÁCH CÁC ĐƠN ĐẶT HÀNG TRONG NGÀY </h4>
						@elseif($type == 'month')
							<h4>DANH SÁCH CÁC ĐƠN ĐẶT HÀNG TRONG THÁNG </h4>
						@endif
						<div class="table-responsive">
							<table class="table table-hover table-bordered">
								<thead>
									<tr>									
										<th class="text-center">Stt</th>	
										<th class="text-center">Tên khách hàng</th>
										<th class="text-center">Địa chỉ Email</th>
										<th class="text-center">Tổng số sản phẩm</th>
										<th class="text-center">Thành tiền</th>										
										<th class="text-center">Thời gian đặt hàng</th>										
										<th class="text-center">Trang thái đơn hàng</th>
									</tr>
								</thead>
								<tbody>
									<?php $stt =0 ; $tong =0;?>
									@foreach($data as $row)
									<?php 
										$stt = $stt+1; 
										$tong = $tong + $row->total;
									?>
										<tr>
											<td class="text-center"> {!!$stt!!} </td>											
											<td>{!!$row->name!!}</td>
											<td>{!!$row->email!!}</td>
											<td>{!!$row->qty!!}</td>
											<td>{!! number_format($row->total) !!} đ</td>	
											<td>{!!$row->created_at!!}</td>										
											<td class="text-center">
												@if($row->status ==0)
													<span style="color:#d35400;">Chưa xác nhận</span>
												@elseif($row->status ==1)
													<span style="color:#27ae60;"> Đang thực hiện</span>
												@elseif($row->status ==2)
													<span style="color:blue;"> Đã giao hàng</span>
												@else
													<span style="color:#27ae60;"> Đã hủy bỏ</span>
												@endif
											</td>
										</tr>
									@endforeach	
										<tr>
											<td colspan="4"></td>
											<td colspan="2" style="color:red;"> <strong>Tổng thành tiền</strong> : <strong>{!! number_format($tong) !!} đ</strong></td>
											<td></td>
										</tr>							
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection