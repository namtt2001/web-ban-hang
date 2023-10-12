<div class="alsolike">
<hr>
	<h3>Có thể bạn cũng quan tâm </h3>	
	<?php 
		$data = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','2')->select('products.*')
                ->take(3)->get();
	?>
	@foreach($data as $m)
		<div class="item_larger animated single-left col-xs-12 col-sm-6 col-md-4 no-padding" data-id="">
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
	@endforeach							
</div>