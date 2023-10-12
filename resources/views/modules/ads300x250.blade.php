<?php 
	$bn = DB::table('banners')
            ->where('pos','=',3)
            ->where('status','=',1)
            ->first();
?>
@if($bn != '')
	<div class="ads300x250">
		<img src=" {!!url('public/uploads/banners/'.$bn->url_banner)!!}">
	</div>
@else
	<div class="ads300x250">
		<img src=" {!!url('public/images/ads300x250.png')!!}">
	</div>
@endif