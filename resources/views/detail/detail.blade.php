@extends('layouts.content')
@section('title')
	Chi tiết sản phẩm : {!!$data->name!!}
@stop
@section('content')
	<div class="content contentHome">
		<div class="container">
			<div class="row" style="padding:5px;">	
				<div class="col-md-12" style="border-bottom: 1px solid #2c3e50;">
					<h3 class="panel-title" style="margin-top: 8px; padding-bottom: 8px;">
      					<span class="glyphicon glyphicon-home"><a href="{!!url('/')!!}"> Home</a></span> 
     					<span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span><a href="{!!url('/mobile')!!}"> chi tiết</a>
      					<span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span> <a href="#" title="">{!!$data->name!!}</a>
    				</h3> 
				</div>	
				<div class="contentdownload">
					<div class="col-sm-9 no-padding">
						<div class="titledownload" style="padding-left: 25px;">
							<h3> Chi tiết:<strong style="color:#ed645c;"> {!! ucwords($data->name) !!}</strong></h3>
							<p>
								Cập nhật ngày: <span style="font-style:italic;color:#9BA0A5;padding-left:5px;">{!!$data->updated_at!!}</span> 
								<?php $t = str_replace(" ", "", $data->tag);
									$tags = explode ( "," , $t); ?>

								 - TAG : @foreach($tags as $itemtags)							
									<a href="{!!url('/tags/')!!}/{!!$itemtags !!}">{!!$itemtags !!}</a>,
								@endforeach
							</p>
							<hr>
						</div>
						<div class="imgdownload">	
							<div class="col-md-5 no-padding">								
								<div class="item mobile-detail">            
						            <img src="{!!url('public/uploads/products/'.$data->images)!!}">
						        </div>
						    </div>
						</div>
						<div class="col-md-7 no-padding">
							<div class="imagescnt">
								<strong style="color:#e74c3c;">{!!$data->name!!}</strong>  <br>
								<span class="label label-success">Đặc điểm:</span> <br>
								@if(!empty($data->features1))
									<i class="glyphicon glyphicon-star"></i> <span>{!!$data->features1!!}</span>  <br>
								@endif
								@if(!empty($data->features2))
									<i class="glyphicon glyphicon-star" ></i> <span >{!!$data->features2!!}</span>  <br>
								@endif
								@if(!empty($data->features3))
									<i class="glyphicon glyphicon-star"></i> <span>{!!$data->features3!!}</span>  <br>
								@endif
								<span class="label label-success">Chính sách - Bảo hành</span>
								<li><i class="glyphicon glyphicon-ok"></i> Bảo hành: {{$data->warranty}}</li>
								<li><i class="glyphicon glyphicon-ok"></i> Giao hàng trong vòng từ 2 - 5 ngày </li>
								<li>Tư vẫn mua hàng : <strong> 1800 1800 </strong> (7h30 - 21h)</li>
								<li><h3>Giá bán : <span class="label label-danger"> {!! number_format($data->price) !!} đ</span></h3></li>
								<hr>
								<div class="btn-down-like">																
									<a href="{!!url('gio-hang/them/'.$data->id)!!}" class="btndownload btn btn-warning" image-id="12">Đặt hàng <i class="glyphicon glyphicon-shopping-cart"></i> </a>
									<a href="javascript:void(0)" class="buttonlike2 btn btn-success" image-id="12"><i class="fa fa-heart"></i> Thích (<b id="id-12">200</b>)</a>
								</div>	
							</div>
						</div>
						<div class="clearfix"> </div>
						<div class="description">
							<div class="col-md-12 no-padding">
								<div class="table-responsive">
									 THÔNG TIN CHI TIẾT : <strong style="color:#e74c3c;">{!!$data->name!!}</strong>
									<table class="table table-bordered">
										<tbody>
											<tr>
												<td>Model : </td>
												<td>{!!$data->model!!}</td>
												<td>Hãng sản xuất : </td>
												<td>{!!$data->manufacturer!!}</td>
											</tr>	
											<tr>
												<td>Thiết kế : </td>
												<td>{!!$data->design!!}</td>
												<td>Xuất xứ : </td>
												<td>{!!$data->make_in!!}</td>
											</tr>										
											<tr>
												<td>Màu sắc : </td>
												<td>{!!$data->color!!}</td>
												<td>Kích thước : </td>
												<td>{!!$data->size!!}</td>
											</tr>	
											<tr>
												<td>Loại : </td>
												<td>{!!$data->type!!}</td>
												<td>Thời gian bảo hành : </td>
												<td>{!!$data->warranty!!}</td>												
											</tr>
											<tr>
												<td>Ứng dụng : </td>
												<td colspan="3">{!!$data->apply!!}</td>											
											</tr>
											<tr>
												<td>Đặc điểm: </td>
												<td colspan="3">
													<li>{!!$data->features1!!}</li>
													<li>{!!$data->features2!!}</li>
													<li>{!!$data->features3!!}</li>
													<li>{!!$data->features4!!}</li>
													
												</td>											
											</tr>	

										</tbody>
									</table>
								</div>
							</div>
							<h2> <small> Hình ảnh sản phẩm </small></h2>
							<div class="clearfix"></div>
							<div class="col-md-12 no-padding">
								<div class="item">            
						            <div >
						                <ul id="image-gallery" class="gallery list-unstyled cS-hidden" >
						                @foreach($img->detail_img as $img)
						                	<li class="sharedownload text-center" data-thumb="{!!url('public/uploads/products/details/'.$img->images_url)!!}">
						                        <img src="{!!url('public/uploads/products/details/'.$img->images_url )!!}" style="display: block; min-height: 100%;max-height: 400px; margin: 0 auto; padding: 0 auto;" />
						                    </li>
						                @endforeach						             
						                </ul>
						            </div>
						        </div>
						    </div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				                <h2> <small> Đánh giá chi tiết sản phẩm</small></h2>
				                <hr>
				                <div class="accordion-group">
				                 	<div class="full-review">
				                       	{!!$data->review!!}
				                    </div>				                    
				                </div>
			                </div>						
						</div>			
						<div class="clearfix"></div>		
							
						<div class="commentdownload" style="border-radius: 5px #FFF;">
							<div class="fb-comments" data-href="{!!Request::url()!!}" data-width="100%" data-numposts="5">
			                </div>
						</div>
						@include('modules.alsolike')
					</div>
					<div class="col-sm-3 no-padding" style="border-left:1px dotted #95a5a6;">				
						@include('modules.hot')
						<hr>
						@include('modules.pronew')
					</div>
				</div><!-- .contentdownload -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .contentHome -->

@stop