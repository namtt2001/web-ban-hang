<div id="media" style="padding-bottom:30px;">
	<div class="offers" style="margin:30px 50px">
	 <h3>Thiết Bị Thắp Sáng</h3>
	 </div>
    @foreach($den as $m)

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
					<span>Giá bán : </span>
					@if ($m->qty == 0) 
					<strong style="color: #e74c3c;"> Hết hàng </strong> 
					@else 
					<strong style="color: #e74c3c;"> {!! number_format($m->price) !!} đ</strong>
					@endif
				</div>
				@if ($m->qty != 0)
					<div class="item_cart">
						<a href="{!!url('gio-hang/them/'.$m->id)!!}" title="Thêm vào giỏ hàng"><button type="button" class="btn btn-success"> <i class="glyphicon glyphicon-shopping-cart"></i> </button></a>
					</div>
				@endif
			</div>
		</div>
	@endforeach
	<div class="clearfix"></div>
	<div class="offers" style="margin:30px 50px">
	 <h3>Dụng Cụ Trên Bàn</h3>
	 </div>
    @foreach($ban as $l)
		<div class="item_larger animated single-left col-xs-12 col-sm-6 col-md-3 no-padding" data-id="">
			<div class="item" id="{!! $l->id !!}" style="border: 1px solid;">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<a href="{!!url('chi-tiet/'.$l->id.'-'.$l->slug)!!}" class="head_item item_ajax btndetail" title="Nhấp xem chi tiết">
					<div class="dim">
							
					</div>
					<img src="{!!url('public/uploads/products/'.$l->images)!!}">
					<div class="clearfix" style="color: #000; padding: 5px; text-overflow: ellipsis;white-space: nowrap; overflow: hidden;">
						@if(!empty($l->features1))
							<i class="glyphicon glyphicon-heart-empty" style="color:#e74c3c;"></i> {!!$l->features1!!} <br>
						@endif
						@if(!empty($l->features2))
							<i class="glyphicon glyphicon-heart-empty" style="color:#e74c3c;"></i> {!!$l->features2!!} <br>
						@endif
					</div>
				</a>
				<a class="content_item" href="{!!url('chi-tiet/'.$l->id.'-'.$l->slug)!!}">
					<h3 style="color: #000; text-transform: uppercase;">{!!$l->name!!}</h3>					
				</a>
				<div class="item_info">
					<span>Giá bán : </span> @if ($l->qty == 0) <strong style="color: #e74c3c;"> Hết hàng </strong> @else <strong style="color: #e74c3c;">{!! number_format($l->price) !!} đ</strong> @endif
				</div>
				@if ($l->qty != 0)
					<div class="item_cart">
						<a href="{!!url('gio-hang/them/'.$l->id)!!}" title="Thêm vào giỏ hàng"><button type="button" class="btn btn-success"> <i class="glyphicon glyphicon-shopping-cart"></i> </button></a>
					</div>
				@endif
			</div>
		</div>
	@endforeach
 <div class="clearfix"></div>

	<div class="offers" style="margin:30px 50px">
		<h3>Trang Trí Nội Thất</h3>
	</div>
    @foreach($trangtri as $t)
		<div class="item_larger animated single-left col-xs-12 col-sm-6 col-md-3 no-padding" data-id="">
			<div class="item" id="{!! $t->id !!}" style="border: 1px solid;">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<a href="{!!url('chi-tiet/'.$t->id.'-'.$t->slug)!!}" class="head_item item_ajax btndetail" title="Nhấp xem chi tiết">
					<div class="dim">
							
					</div>
					<img src="{!!url('public/uploads/products/'.$t->images)!!}">
					<div class="clearfix" style="color: #000; padding: 5px; text-overflow: ellipsis;white-space: nowrap; overflow: hidden;">
						@if(!empty($t->features1))
							<i class="glyphicon glyphicon-heart-empty" style="color:#e74c3c;"></i> {!!$t->features1!!} <br>
						@endif
						@if(!empty($t->features2))
							<i class="glyphicon glyphicon-heart-empty" style="color:#e74c3c;"></i> {!!$t->features2!!} <br>
						@endif
					</div>
				</a>
				<a class="content_item" href="{!!url('chi-tiet/'.$t->id.'-'.$t->slug)!!}">
					<h3 style="color: #000; text-transform: uppercase;">{!!$t->name!!}</h3>					
				</a>
				<div class="item_info">
					<span>Giá bán : </span> @if ($t->qty == 0) <strong style="color: #e74c3c;"> Hết hàng </strong> @else <strong style="color: #e74c3c;">{!! number_format($t->price) !!} đ</strong> @endif
				</div>
				@if ($t->qty != 0)
					<div class="item_cart">
						<a href="{!!url('gio-hang/them/'.$t->id)!!}" title="Thêm vào giỏ hàng"><button type="button" class="btn btn-success"> <i class="glyphicon glyphicon-shopping-cart"></i> </button></a>
					</div>
				@endif
			</div>
		</div>
	@endforeach
</div>