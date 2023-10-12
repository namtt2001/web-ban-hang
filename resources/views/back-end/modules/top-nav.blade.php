<!-- menu top  - menu phia tren cung-->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{!!url('/admin')!!}"><span>Trang Quản Trị</span> FSHOP </a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Login as: <strong style="color:red;">
							@if (isset(Auth::guard('admin')->user()->name) )
                                {!!Auth::guard('admin')->user()->name!!}
                            @endif </strong> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/admin/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div>
	</nav>
