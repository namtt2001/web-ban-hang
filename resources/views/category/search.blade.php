@extends('layouts.content')
@section('title')
	Kết quả tìm kiếm
@stop
@section('content')
	<div class="content contentHome">
		<div class="container">
			<div class="row">				
				<div class="col-sm-12">
				<div class="col-md-12" style="border-bottom: 1px solid #2c3e50;">
					<h3 class="panel-title" style="margin-top: 8px; padding-bottom: 8px;">
      					<span class="glyphicon glyphicon-home"><a href="#" title=""> Home</a></span> 
     					<span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span><a href="#" title="">Tìm kiếm</a>      					
    				</h3> 
				</div>
					
					<div id="media">
					<div class="titledownload" style="padding-left: 25px;">
							<h3> Kết quả tìm kiếm với từ khóa :<strong style="color:#e85445;"> {!! ucwords($key) !!}</strong></h3>
							<hr>
						</div>
					    @foreach($data as $m)
					    <?php
					    	$type = DB::table('category')->where('id','=',$m->cat_id)->first();
					    	// dd($type);			    	
					     ?>
					     @if($type->parent_id == 1)
							<div class="item_larger animated single-left col-xs-12 col-sm-6 col-md-3 no-padding" data-id="">
								<div class="item" id="{!! $m->id !!}" style="border: 1px solid;">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<a href="{!!url('chi-tiet/'.$m->id.'-'.$m->slug)!!}" class="head_item item_ajax btndetail" title="Nhấp xem chi tiết">
										<div class="dim">
												
										</div>
										<img src="{!!url('public/uploads/products/'.$m->images)!!}">
										<div class="clearfix" style="color: #000; padding: 5px; text-overflow: ellipsis;white-space: nowrap; overflow: hidden;">
											@if(!empty($m->features1))
												<i class="glyphicon glyphicon-heart-empty" style="color:#e74c3c;"></i> {!!$m->features1!!} <br>
											@endif
											@if(!empty($m->features2))
												<i class="glyphicon glyphicon-heart-empty" style="color:#e74c3c;"></i> {!!$m->features2!!} <br>
											@endif
										</div>
									</a>
									<a class="content_item" href="{!!url('chi-tiet/'.$m->id.'-'.$m->slug)!!}">
										<h3 style="color: #000; text-transform: uppercase;">{!!$m->name!!}</h3>					
									</a>
									<div class="item_info">
										<span>Giá bán : </span><strong style="color: #e74c3c;">{!! number_format($m->price) !!} đ</strong>
									</div>
									<div class="item_cart">
										<a href="{!!url('gio-hang/them/'.$m->id)!!}" title="Thêm vào giỏ hàng"><button type="button" class="btn btn-success"> <i class="glyphicon glyphicon-shopping-cart"></i> </button></a>
									</div>
								</div>
							</div>
						@elseif($type->parent_id ==2)
							<div class="item_larger animated single-left col-xs-12 col-sm-6 col-md-3 no-padding" data-id="">
								<div class="item" id="{!! $m->id !!}" style="border: 1px solid;">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<a href="{!!url('chi-tiet/'.$m->id.'-'.$m->slug)!!}" class="head_item item_ajax btndetail" title="Nhấp xem chi tiết">
										<div class="dim">
												
										</div>
										<img src="{!!url('public/uploads/products/'.$m->images)!!}">
										<div class="clearfix" style="color: #000; padding: 5px; text-overflow: ellipsis;white-space: nowrap; overflow: hidden;">
											@if(!empty($m->features1))
												<i class="glyphicon glyphicon-heart-empty" style="color:#e74c3c;"></i> {!!$m->features1!!} <br>
											@endif
											@if(!empty($m->features2))
												<i class="glyphicon glyphicon-heart-empty" style="color:#e74c3c;"></i> {!!$m->features2!!} <br>
											@endif
										</div>
									</a>
									<a class="content_item" href="{!!url('chi-tiet/'.$m->id.'-'.$m->slug)!!}">
										<h3 style="color: #000; text-transform: uppercase;">{!!$m->name!!}</h3>					
									</a>
									<div class="item_info">
										<span>Giá bán : </span><strong style="color: #e74c3c;">{!! number_format($m->price) !!} đ</strong>
									</div>
									<div class="item_cart">
										<a href="{!!url('gio-hang/them/'.$m->id)!!}" title="Thêm vào giỏ hàng"><button type="button" class="btn btn-success"> <i class="glyphicon glyphicon-shopping-cart"></i> </button></a>
									</div>
								</div>
							</div>
						@elseif($type->parent_id ==19)
							<div class="item_larger animated single-left col-xs-12 col-sm-6 col-md-3 no-padding" data-id="">
								<div class="item" id="{!! $m->id !!}" style="border: 1px solid;">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<a href="{!!url('chi-tiet/'.$m->id.'-'.$m->slug)!!}" class="head_item item_ajax btndetail" title="Nhấp xem chi tiết">
										<div class="dim">
												
										</div>
										<img src="{!!url('public/uploads/products/'.$m->images)!!}">
										<div class="clearfix" style="color: #000; padding: 5px; text-overflow: ellipsis;white-space: nowrap; overflow: hidden;">
											@if(!empty($m->features1))
												<i class="glyphicon glyphicon-heart-empty" style="color:#e74c3c;"></i> {!!$m->features1!!} <br>
											@endif
											@if(!empty($m->features2))
												<i class="glyphicon glyphicon-heart-empty" style="color:#e74c3c;"></i> {!!$m->features2!!} <br>
											@endif
										</div>
									</a>
									<a class="content_item" href="{!!url('chi-tiet/'.$m->id.'-'.$m->slug)!!}">
										<h3 style="color: #000; text-transform: uppercase;">{!!$m->name!!}</h3>					
									</a>
									<div class="item_info">
										<span>Giá bán : </span><strong style="color: #e74c3c;">{!! number_format($m->price) !!} đ</strong>
									</div>
									<div class="item_cart">
										<a href="{!!url('gio-hang/them/'.$m->id)!!}" title="Thêm vào giỏ hàng"><button type="button" class="btn btn-success"> <i class="glyphicon glyphicon-shopping-cart"></i> </button></a>
									</div>
								</div>
							</div>
						@endif
					@endforeach
					<div class="clearfix"></div>
						<ul class="pagination">
							{!!$data->render()!!}
						</ul>
					</div>
					</div>	
				</div>
			</div>
		</div>
	</div>	
@stop