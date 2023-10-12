<div class="mostlike">
	<h3> Sản phẩm mới nhất  </h3>
	<?php 
		$mobile = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->select('products.*','pro_details.features1','pro_details.features2','pro_details.features3','pro_details.features4')
                ->orderBy('products.created_at','DESC')
                ->take(3)->get();
	?>
	@foreach($mobile as $m)
		<div class="item_larger animated single-left col-xs-12 col-sm-12 col-md-12 no-padding" data-id="">
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
					<a href="#" title="Thêm vào giỏ hàng"><button type="button" class="btn btn-success"> <i class="glyphicon glyphicon-shopping-cart"></i> </button></a>
				</div>
			</div>
		</div>
	@endforeach
</div>