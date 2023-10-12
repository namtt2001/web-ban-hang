@extends('back-end.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Banners - quảng cáo</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel-heading">
					Danh sách Banners - Quảng cáo	
					<a href="{!!url('admin/banners/add')!!}"class="btn btn-info pull-right">Thêm mới</a>				
				</div>
				<div class="panel panel-default">					
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
					<div class="panel-body" style="font-size: 13px;">

						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>										
										<th>ID</th>										
										<th>Tên Banner</th>
										<th>Vị trí</th>
										<th>Trạng thái</th>
										<th>Ngày tạo</th>										
										<th class="text-right" style="width: 200px;">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $row)
										<tr>
											<td>{!!$row->id!!}</td>
											<td>{!!$row->name!!}</td>
											<td>
												@if($row->pos ==1)
													<span style="color:#c0392b;">Slide Trang chủ</span>
												@elseif($row->pos == 2)
													<span style="color:#16a085;">Slide tin tức</span>
												@elseif($row->pos == 3)
													<span style="color:#2980b9;">Trang chi tiết SP</span>
												@elseif($row->pos == 4)
													<span style="color:#2980b9;">Sản phẩm HOME 1</span>
												@elseif($row->pos == 5)
													<span style="color:#2980b9;">Sản phẩm HOME 2</span>
												@endif
											</td>
											<td>
												@if($row->status ==1)
													<span style="color:#2980b9;">Hiển thị</span>
												@elseif($row->level == 0)
													<span style="color:#e74c3c;">Không hiển thị</span>
												@endif
											</td>										
											<td>{!!$row->created_at!!}</td>											
											<td class="text-right" style="width: 200px;">
											    <a href="{!!url('admin/banners/edit/'.$row->id)!!}" class="btn btn-success" title="sửa"> Cập nhật</a> &nbsp;
											    @if ($row->level !=100)
											    	<a href="{!!url('admin/banners/del/'.$row->id)!!}" class="btn btn-warning"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')">Xóa bỏ</a>
											    @endif
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