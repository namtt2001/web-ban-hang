<!DOCTYPE html>
<html lang="vi">
<head>
<?php
 	$settings = DB::table('settings')->first();
?>
	<meta charset="utf-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Thiết kế website laravel">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@if(isset($settings->sitename)) {{$settings->sitename }} @else Fshop Light @endif - @yield('title')</title>
	<link rel="icon" href="{!! url('public/img/banner/logo_1.png') !!}" type="image/x-icon">

	
	<!-- BEGIN CSS FRAMEWORK BOOTSTRAP -->

	<link rel="stylesheet" href="{!!url('public/front-end/plugins/bootstrap/css/bootstrap.min.css')!!}">
	<link rel="stylesheet" href="{!!url('public/front-end/css/pixel.css')!!}">
	<link rel="stylesheet" href="{!!url('public/front-end/plugins/font-awesome/css/font-awesome.min.css')!!}">
	<!-- END CSS FRAMEWORK -->	
	<!-- CUSTOM CSS -->
	<link rel="stylesheet" href="{!!url('public/front-end/css/style.css')!!}"> 
	<link rel="stylesheet" href="{!!url('public/front-end/css/c_style.css')!!}"> 
	<link href="{!!url('public/front-end/css/style_w.css')!!}" rel="stylesheet" type="text/css" media="all"/>

	<link rel="stylesheet" href="{!!url('public/front-end/css/memenu.css')!!}">
	<link rel="stylesheet" href="{!!url('public/front-end/js/memenu.js')!!}">
	
	<!-- END CUSTOM CSS -->
	
	<!-- BEGIN CSS TEMPLATE -->
	<link rel="stylesheet" href="{!!url('public/front-end/css/main.css')!!}">
	<!-- END CSS TEMPLATE -->

	<!-- BEGIN JS FRAMEWORK -->
	<script src="{!!url('public/front-end/plugins/jquery-2.1.0.min.js')!!}"></script>
	<script src="{!!url('public/front-end/plugins/bootstrap/js/bootstrap.min.js')!!}"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="{!!url('public/js/lightslider.js')!!}"></script> 

	<!-- END JS FRAMEWORK -->
	<!-- Custom styles for this template - slyde -->    
    <link rel='stylesheet' id='camera-css'  href="{!!url('public/css/camera.css')!!}" type='text/css' media='all'>
    {{-- slider --}}
    <link rel="stylesheet"  href="{!!url('public/css/lightslider.css')!!}">

    {{-- <link rel="stylesheet" href="{!!url('public/front-end/css/flexslider.css')!!}" media="screen"> --}}
    
    <script>

         $(document).ready(function() {
            $("#content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
            $('#image-gallery').lightSlider({
                gallery:false,
                item:1,
                thumbItem:6,
                slideMargin: 0,
                speed:1000,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });
        });

         jQuery(function(){
	
			jQuery('#camera_wrap_1').camera({
				
				height: '340',
				loader: 'bar',
		        alignment: 'center',
		        time: 3000,
				pagination: true,
				thumbnails: false
			});
		});
          jQuery(function(){
			jQuery('#camera_wrap_2').camera({
				
				height: '585',
				width: '100%',
				loader: 'bar',
		        alignment: 'center',
		        time: 2000,
				pagination: false,
				thumbnails: false
			});
		});
    </script>

</head>
<script>
	$(document).ready(function(){$(".memenu").memenu();});
</script>
<body>
<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=138284626640741";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<!-- BEGIN HEADER -->
	<div class="header">
		<div class="headerSocial">
			<div class="container">
				<div class="row headrow">	
					<p class="topHeadline">@if(isset($settings->headline)) {{$settings->headline }} @else Đồ Nội Thất Sang Trọng Mua Tại Đây @endif</p>				
					<ul class="socialTop social">
						<li><a href="{!!url('/moi-nhat')!!}" class="about hidden-xs"><i class="glyphicon glyphicon-flash"></i> Mới nhất</a></li>
						<li><a href="{!!url('/gio-hang')!!}" class="contact"><i class="glyphicon glyphicon-shopping-cart badge" style="font-size: 16px; font-weight: bold;">{!!Cart::count()!!}</i> Giỏ Hàng</a></li>
						<li class="social-btn"><a href="" class="socialIcon facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>						
						<li class="social-btn"><a href="" class="socialIcon" target="_blank"><i class="fa fa-twitter"></i></a></li>	
						@if(!Auth::check())					
							<li>&nbsp;<a href="{!!url('login')!!}">&nbsp;<i class="glyphicon glyphicon-lock"></i> Login</a></li>
						@else
							<li>&nbsp;Xin chào : <a href="{!!url('member')!!}" title="click để quản lý thông tin">{!! Auth::user()->name !!} </a></li>
							<li>&nbsp;
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();" title="đăng xuất">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
						@endif
					</ul>
				</div>
			</div>
		</div>
		
		<div class="header-bottom">
			<div class="container">
				<!--/.content-->
				<div class="content white">
					<nav class="navbar navbar-default" role="navigation">
					    <div class="navbar-header">
					        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
					        </button>
					        <h1 class="navbar-brandd "><a  href="{{url('/')}}"><img width="100%" height="50%" src=" @if(isset($settings->logo)) {{ url('public/images/'.$settings->logo) }} @else {!!url('public/images/logo_1.png')!!}  @endif " /></a></h1>
	    				</div>
	    <!--/.navbar-header-->
	
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					        <ul class="nav navbar-nav">
								<li><a href="{{ url('/') }}">Trang Chủ</a></li>

						        <li><a  href="{!!url('/thap-sang')!!}"> Thắp sáng</a>

						        <li><a  href="{!!url('/ban')!!}">Dụng Cụ Để Bàn</a></li>
											
								<li><a  href="{!!url('/trang-tri')!!}">Trang trí</a></li>
											
								<li><a  href="{!!url('/news')!!}">Tin tức</a></li>
						        
									
					        </ul>
					    </div>
	    			<!--/.navbar-collapse-->
					</nav>
						<!--/.navbar-->
				</div>

					<div class="search-box">
						<div id="sb-search" class="sb-search">
							<form  action="{!! url('tim-kiem')!!}" method="POST" role="form">
								<input type="hidden" name="_token" value="{{ csrf_token()  }}">
								<input class="sb-search-input" type="text" name="key" id="key" required placeholder="@if ($errors->count() ==0) Nhập tên sản phẩm muốn tìm... @else {!!$errors->first()!!} @endif">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"> </span>
							</form>

						</div>
					</div>		   
			
					<!-- search-scripts -->
					<script src="{!!url('public/front-end/js/classie.js')!!}"></script> 
					<script src="{!!url('public/front-end/js/uisearch.js')!!}"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>
					<!-- //search-scripts -->
					<div class="clearfix"></div>
					</div>
				</div>
			</div>
		
	


<!-- /header -->
	<section class="content">
		@yield('container')
	</section>


	<div class="offers">
		<div class="container">
			<h3>Giảm Giá</h3>
				<div class="offer-grids">
					<?php 
						$bn = DB::table('banners')
						    ->where('pos','=',4)
						    ->where('status','=',1)
						    ->first();
					?>
					@if (empty($bn))
						
						<div class="col-md-6 grid-left">
						 <a href="{!! url('/') !!}"><div class="offer-grid1">
							 <div class="ofr-pic">
								 <img src="{!! asset('public/front-end/img/ofr2.jpeg') !!}" class="img-responsive" alt="">
							 </div>
							 <div class="ofr-pic-info">
								 <h4> Đèn báo khẩn cấp</h4>
								 <span>GIẢM GIÁ TỚI 40%</span>
								 <p>Mua bây giờ</p>
							 </div>
							 <div class="clearfix"></div>
						 </div></a>
					</div>
					@else
					<div class="col-md-6 grid-left">
						 <a href="{!! url('/') !!}"><div class="offer-grid1">
							 <div class="ofr-pic">
								<img src="{!!url('public/uploads/banners/'.$bn->url_banner)!!}" alt="{!!$bn->name!!}" border="0" width="100%" height="150" /></a>
							 </div>
							 <div class="ofr-pic-info">
								 <h4> Đèn báo khẩn cấp</h4>
								 <span>GIẢM GIÁ TỚI 40%</span>
								 <p>Mua bây giờ</p>
							 </div>
							 <div class="clearfix"></div>
						 </div></a>
					</div>
					@endif
					<?php 
						$bn = DB::table('banners')
						    ->where('pos','=',5)
						    ->where('status','=',1)
						    ->first();
					?>
					@if (empty($bn))
					<div class="col-md-6 grid-right">
						 <a href="{!! url('/') !!}"><div class="offer-grid2">				 
							 <div class="ofr-pic-info2">
								 <h4>Giảm giá đèn ngủ mạnh</h4>
								 <span>GIẢM GIÁ TỚI 30%</span>
								 <h5>Đèn Ngoài Trời</h5>
								 <p>Mua bây giờ</p>
							 </div>
							 <div class="ofr-pic2">
								 <img src="{!! asset('public/front-end/img/ofr3.jpg') !!}" class="img-responsive" alt="" data-pin-nopin="true">
							 </div>
							 <div class="clearfix"></div>
						 </div></a>
					</div>
					@else
					<div class="col-md-6 grid-right">
						 <a href="{!! url('/') !!}"><div class="offer-grid1">
						 	<div class="ofr-pic-info2">
								 <h4>Giảm giá đèn ngủ mạnh</h4>
								 <span>GIẢM GIÁ TỚI 30%</span>
								 <h5>Đèn Ngoài Trời</h5>
								 <p>Mua bây giờ</p>
							</div>
							<div class="ofr-pic2">
								<img src="{!!url('public/uploads/banners/'.$bn->url_banner)!!}" alt="{!!$bn->name!!}" border="0" width="100%" height="150" /></a>
							 </div>
							 
							 <div class="clearfix"></div>
						 </div></a>
					</div>
					@endif
				<div class="clearfix"></div>
			</div>
	 	</div>
	</div>
	<!-- BEGIN FOOTER -->
	 @include('modules.gioithieu')


	<div class="copywrite">
		 <div class="container">
			 <div class="copy">
				 <p><a href="#">Group Ngọc Tiến</a> - Copyright <?= date("Y"); ?></p>
			 </div>
			 <div class="social-1">							
					<a href="#"><i class="facebook"></i></a>
					<a href="#"><i class="twitter"></i></a>
					<a href="#"><i class="dribble"></i></a>	
					<a href="#"><i class="google"></i></a>	
					<a href="#"><i class="youtube"></i></a>	
			 </div>
			 <div class="clearfix"></div>
		 </div>
	</div>
	

	<script>
		var rootpath = "{!!url('')!!}";
		// alert(rootpath);
	</script>
	<!-- END JS GLOBAL VARIABLE -->
	
	<script>
		$(document).ready(function(){
		    $("a.view").click(function() {		    			    	
				var id     = $(this).attr("news-id");
				var _token = $('input[name=_token]').val();			
				$.ajax
				({
					type: "POST",
					url: rootpath+"/news/countview/" + id,
					data: {id: id, _token: _token},
					success: function(msg)
					{	
						$('.view b#id'+id+'').html(msg);
					}
				});
			});
		});
	</script> 
	<!-- BEGIN JS TEMPLATE -->
	<script src="{{ url('public/front-end/js/main.js')}}"></script>

	<script src="{{ url('public/js/myscript.js')}}"></script>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	
	<script type="text/javascript" src="{{ url('public/front-end/js/tinymce/tinymce.min.js') }}"></script>

	{{--slide - gallery --}}
	<script type='text/javascript' src='{!!url('public/js/jquery.easing.1.3.js')!!}'></script>
    <script type='text/javascript' src='{!!url('public/js/camera.min.js')!!}'></script>
    <script type='text/javascript' src='{!!url('public/js/myscript.js')!!}'></script> 
     
    

	{{--end slide --}}
	{{-- validate --}}
    <script src="{!!url('public/js/validate/jquery.validate.min.js')!!}"></script>
    {{-- trinh soan thao bang js --}}
	<script type="text/javascript">
	    tinymce.init({
	        selector: "#description",
	        toolbar: "styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media | forecolor backcolor | code",
	        plugins: [
		         "advlist autolink link image code lists charmap print preview hr anchor pagebreak spellchecker code fullscreen",
		         "save table contextmenu directionality emoticons template paste textcolor code"
		   ],
		   menubar:false,
	    });
    </script>
	<!-- END JS TEMPLATE -->

	<!-- Google Analytics -->

	<?php if(isset($settings->gganalytic) && trim($settings->gganalytic) != ""): ?>
	  <script>
	    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	    ga('create', '<?= $settings->gganalytic ?>', 'auto');
	    ga('send', 'pageview');
	  </script>
	<?php endif; ?>

	<!-- End Google Analytics -->

</body>
</html>