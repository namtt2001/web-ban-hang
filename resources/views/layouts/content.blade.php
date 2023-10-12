@extends('layouts.master')

@section('container')
<div class="row">
	<!-- BEGIN WIDGET -->
	<div class="col-md-12 col-sm-12">
		<div class="grid no-border">			
			@yield('content')
		</div>
	</div>
	<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>
</div>
@endsection