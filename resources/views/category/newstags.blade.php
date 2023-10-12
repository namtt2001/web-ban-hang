@extends('layouts.content')
@section('title')
	Tin tức
@stop
@section('content')
<div class="container"> 
    <div class="col-md-12" style="border-bottom: 1px solid #2c3e50;">
        <h3 class="panel-title" style="margin-top: 8px; padding-bottom: 8px;">
              <span class="glyphicon glyphicon-home"><a href="#" title=""> Home</a></span> 
            <span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span><a href="#" title=""> News</a>                
            <span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span><a href="#" title=""> tags</a>                
          </h3> 
    </div>              
    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 no-padding"> 
      <div class="titledownload" style="padding-left: 25px;">
        <h3> Danh sách bản tin theo tags</h3>
      </div>         
      <div class="row">
        <div class="row">
          @if($data->count() >0)
            @foreach($data as $row)
              <div class="col-lg-6 no-padding" >
                <div class="col-lg-12">
                  <h4 class="title-new"><a href="{!!url('/news/'.$row->id.'-'.$row->slug)!!}" class="view" news-id="{!! $row->id !!}" >{{$row->title}}</a></h4>
                  <div class="col-lg-9">
                    <p class="sum">
                      <a href="{!!url('/news/'.$row->id.'-'.$row->slug)!!}" class="view" news-id="{!! $row->id !!}" style="color:#FFFFFF;">
                        <small>{{$row->intro}}</small>
                      </a>
                    </p>
                  </div>
                  <div class="col-lg-3 no-padding">
                    <a href="{!!url('/news/'.$row->id.'-'.$row->slug)!!}" class="view" news-id="{!! $row->id !!}" title="">
                    <img class="img-rounded " src="{!!url('public/uploads/news/'.$row->images)!!}" alt="" width="80" height="55" style="padding-right:10px; padding-left: 0;"></a>
                  </div>
                </div>
              </div>
            @endforeach  
          @else
            <div class="col-lg-6 no-padding">
                <div class="col-lg-12">
                  <h4 class="title-new">Không có bản tin nào với tags này !</h4>
                </div>
              </div>
          @endif               
        </div>                                     
          <ul class="pagination text-center">
            {!!$data->render()!!}
          </ul>   
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
          <div class="col-lg-12 no-padding" >
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 no-padding">
              <a href="{!!url('/news/'.$item->id.'-'.$item->slug)!!}" class="view" news-id="{!! $item->id !!}"><img class="img-rounded" src="{!!url('public/uploads/news/'.$item->images)!!}" alt="news" width="99%" height="99%"> </a>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 no-padding">
             <a class="new-news" href="{!!url('/news/'.$item->id.'-'.$item->slug)!!}" class="view" news-id="{!! $item->id !!}"><span>{{$item->title}}</span></a>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </div>          
    <!-- panel  hot event-->          
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title text-center">Khuyễn mãi hấp dẫn</h3>
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