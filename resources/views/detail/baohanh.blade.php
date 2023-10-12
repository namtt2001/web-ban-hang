@extends('layouts.content')
@section('title')
	{!!$data->title!!}
@stop
@section('content')
<div class="container"> 
    <div class="col-md-12" style="border-bottom: 1px solid #2c3e50;">
        <h3 class="panel-title" style="margin-top: 8px; padding-bottom: 8px;">
            <span class="glyphicon glyphicon-home"><a href="{!! url('/')!!}" title=""> Home</a></span> 
            <span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span><a href="{!! url('/news')!!}" > Tin tức </a>
            <span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span><a href="#" class="active" > {!!$data->slug!!}</a>
        </h3> 
    </div>              
    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 no-padding"> 
        <div class="row">          
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-success">
              <div class="panel-body" style="color:#FFFFFF;">
                <div class="row">
                  <div class="titledownload" style="padding-left: 25px;">
                    <h3><strong style="color:#FFFFFF;"> {!! ucwords($data->title) !!}</strong></h3>
                      Đăng ngày : <span style="font-style:italic;color:#9BA0A5;padding:2px;">{!!$data->created_at!!}</span>
                      <i class="glyphicon glyphicon-user"></i> : <a href="#" title="">{{$data->author}}</a>
                      &nbsp;<i class="glyphicon glyphicon-tags"></i>: <a href="#">{!!$data->tag!!} </a>
                      &nbsp;<i class="glyphicon glyphicon-eye-open"></i> <a href="#">{!!$data->views_count!!}</a>
                   <hr>
                  </div>
                  <div class="col-lg-12">
                    <div class="full-review" >                        
                        {!!$data->full!!}
                    </div>
                    <hr>
                    <span>Tác giả : <strong>{{$data->author}}</strong></span> - Nguồn: <strong>{{$data->source}}</strong>
                </div>
              </div>
            </div>   
          </div>
        </div>     
      </div>
    </div> 
    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 no-padding">  
     <!-- fan pages myweb -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Tin mới</h3>
      </div>
      <div class="panel-body">
      <div class="row">
       @foreach($last as $item)
          <div class="col-lg-12 no-padding">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 no-padding">
              <a href="{!!url('/news/'.$item->id.'-'.$item->slug)!!}" class="view" news-id="{!! $item->id !!}"><img class="img-rounded" src="{!!url('public/uploads/news/'.$item->images)!!}" alt="news" width="99%" height="99%"> </a>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 no-padding">
             <a class="new-news" href="{!!url('/news/'.$item->id.'-'.$item->slug)!!}" class="view" news-id="{!! $item->id !!}">{!!$item->title!!}</a>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </div>          
    <!-- panel  hot event-->          
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title text-center">Sự kiện HOT</h3>
      </div>
      <div class="panel-body no-padding">
        <a href="#" title=""><img src="{!!url('public/images/slides/thumbs/qc1.png')!!}" alt="" width="100%" height="100%"> </a> <br>
        <a href="#" title=""><img src="{!!url('public/images/slides/thumbs/qc2.png')!!}" alt="" width="100%" height="100%"> </a> <br>
        <a href="#" title=""><img src="{!!url('public/images/slides/thumbs/qc3.png')!!}" alt="" width="100%" height="100%"> </a>
        <a href="#" title=""><img src="{!!url('public/images/slides/thumbs/qc4.png')!!}" alt="" width="100%" height="100%"> </a>
        <a href="#" title=""><img src="{!!url('public/images/slides/thumbs/qc5.png')!!}" alt="" width="100%" height="100%"> </a>
      </div>
    </div> <!-- /panel info 2  quản cáo 1          -->       
  
     <!-- fan pages myweb -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Fans Pages</h3>
      </div>
      <div class="panel-body">
        Hãy <a href="#" title="">Like</a> facebook của Fshop để cập nhật tin mới nhất
      </div>
    </div> <!-- /fan pages myweb -->  
    @include('modules.ads300x250')      
  </div> 
</div>
<!-- ===================================================================================/news ============================== -->
@endsection