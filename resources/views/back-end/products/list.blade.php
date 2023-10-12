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
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-12"><div class="form-group">
								<label for="inputLoai" class="control-label pull-left"><strong> Chọn sản phẩm </strong></label>
								<div class="col-md-4">
									<select name="sltCate" id="inputLoai" class="form-control">
						      			<option value="0">- CHỌN MỘT DANH MỤC --</option>
						      			<?php MenuMulti($cat,0,$str='---| ',$loai); ?>   		
						      		</select>
									<script>
									    document.getElementById("inputLoai").onchange = function() {
									        if (this.selectedIndex!==0) {
									            window.location.href = this.value;
									        }        
									    };
									</script>
								</div>
								<div class="col-md-2">
									<a href="{!!url('admin/sanpham/new/add')!!}" title=""><button type="button" class="btn btn-success btn-block">Thêm mới sản phẩm</button></a>
								</div>
							</div>
								
								
							</div>
							
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
						<div class="table-responsive">
							<table class="table table-hover table-bordered">
								<thead>
									<tr>									
										<th class="text-center">Stt</th>	
										<th class="text-center">Hình ảnh</th>
										<th class="text-center">Tên sản phẩm</th>										
										<th class="text-center">Loại sản phẩm</th>
										<th class="text-center">Giá bán</th>
										<th class="text-center">Trạng thái</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $stt =0 ;?>
									@foreach($data as $row)
									<?php $stt = $stt+1; ?>
										<tr>
											<td class="text-center"> {!!$stt!!} </td>
											<td> <img src="{!!url('public/uploads/products/'.$row->images)!!}" alt="iphone" width="40" height="30"></td>
											<td>{!!$row->name!!}</td>
											<td>{!!$row->category->name!!}</td>
											<td>{!! number_format($row->price)!!} <strong>đ</strong></td>
											<td class="text-center">
												@if($row->qty !=0)
													<span style="color:blue;"> <strong>Còn hàng</strong> </span>
												@else
													<strong style="color: red;">Tạm hết hàng</strong>
												@endif
											</td>
											<td class="text-center">
											    <a href="{!!url('admin/sanpham/edit/'.$row->id)!!}" title="Sửa"><span class="glyphicon glyphicon-edit">edit</span> </a>&nbsp;
											    <a href="{!!url('admin/sanpham/del/'.$row->id)!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">remove</span> </a>
											</td>
										</tr>
									@endforeach								
								</tbody>
							</table>
						</div>
						{!! $data->render() !!}
					</div>
				</div>
			</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection