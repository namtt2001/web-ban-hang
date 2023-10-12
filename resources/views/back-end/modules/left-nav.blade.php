<!-- left menu - menu ben  trai	 -->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li class="{!!  Request::is('admin') ? 'active' : '' !!}">
				<a href="{!!url('admin/')!!}"><svg class="glyph stroked dashboard-dial">
					<use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ
				</a>
			</li>
			@if (Auth::guard('admin')->user()->level ==1 || Auth::guard('admin')->user()->level ==2)
				<li class="{!! Request::is('admin/danhmuc') || Request::is('admin/danhmuc/*') ? 'active' : '' !!}" id="danhmuc">
					<a href="{!!url('admin/danhmuc')!!}"><svg class="glyph stroked clipboard with paper">
						<use xlink:href="#stroked-clipboard-with-paper"/></svg> Danh mục
					</a>
				</li>
			@endif
			@if (Auth::guard('admin')->user()->level ==1 || Auth::guard('admin')->user()->level ==2)
				<li class="{!!  Request::is('admin/sanpham/*') ? 'active' : '' !!}" id="sanpham">
					<a href="{!!url('admin/sanpham/all')!!}"><svg class="glyph stroked bag">
						<use xlink:href="#stroked-bag"></use></svg> Sản phẩm 
					</a>
				</li>
			@endif
			@if (Auth::guard('admin')->user()->level ==1 || Auth::guard('admin')->user()->level ==2)
				<li class="{!!  Request::is('admin/news/*') || Request::is('admin/news') ? 'active' : '' !!}">
					<a href="{!!url('admin/news')!!}"><span class="glyphicon glyphicon-file"></span> Tin tức
					</a>
				</li>
			@endif

			<li role="presentation" class="divider"></li>
			<li class="{!!  Request::is('admin/donhang') || Request::is('admin/donhang/*') ? 'active' : '' !!}" >
				<a href="{!!url('admin/donhang')!!}"><svg class="glyph stroked bag">
					<use xlink:href="#stroked-bag"></use></svg> Đơn đặt hàng
				</a>
			</li>

			<li class="{!!  Request::is('admin/khachhang') || Request::is('admin/khachhang/*') ? 'active' : '' !!}" >
				<a href="{!!url('admin/khachhang')!!}"><svg class="glyph stroked app-window">
					<use xlink:href="#stroked-line-graph"></use></svg>  Khách hàng
				</a>
			</li>
			@if (Auth::guard('admin')->user()->level ==1)
			<li class="{!!  Request::is('admin/nhanvien') || Request::is('admin/nhanvien/*') ? 'active' : '' !!}" >
				<a href="{!!url('admin/nhanvien')!!}"><svg class="glyph stroked female user">
					<use xlink:href="#stroked-female-user"></use></svg> Nhân Viên
				</a>
			</li>		
			@endif	
			<li role="presentation" class="divider"></li>
			@if (Auth::guard('admin')->user()->level ==1)
			<li class="{!!  Request::is('admin/thongke') || Request::is('admin/thongke/*') ? 'active' : '' !!}" >
				<a href="{!!url('admin/thongke/day')!!}"><svg class="glyph stroked female user">
					<use xlink:href="#stroked-female-user"></use></svg> Thống kê bán hàng
				</a>
			</li>
			@endif
			@if (Auth::guard('admin')->user()->level ==1 || Auth::guard('admin')->user()->level ==2)
				<li role="presentation" class="divider"></li>
				<li class="{!!  Request::is('admin/banners') || Request::is('admin/banners/*') ? 'active' : '' !!}">
					<a href="{!!url('admin/banners')!!}"><svg class="glyph stroked table">
						<use xlink:href="#stroked-table"/></svg> Banners - quảng cáo
					</a>
				</li>
			@endif
			@if (Auth::guard('admin')->user()->level ==1)
			<li class="{!!  Request::is('admin/settings') ? 'active' : '' !!}">
				<a href="{!!url('admin/settings')!!}"><svg class="glyph stroked table">
					<use xlink:href="#stroked-gear"/></svg> Cài đặt
				</a>
			</li>
			@endif

		</ul>

	</div><!--/.sidebar-->
<!-- /left menu - menu ben  trai	 -->