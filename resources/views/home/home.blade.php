@extends('layouts.content')
@section('title')
	Trang chủ
@stop

@section('content')
	<div class="col-md-12" style="padding: 0 !important;">	
		@include('modules.home-slide') 
    </div> 
	<div class="content contentHome">
		<div class="container">
			<div class="row">				  
				<div class="col-sm-12">
					@include('modules.items')					
				</div>
			</div>
		</div>
	</div>	
@stop