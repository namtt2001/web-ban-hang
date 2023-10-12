@extends('layouts.content')
@section('title')
	Tin tức
@stop
@section('content')
<div class="container"> 
    <div class="col-md-12" style="border-bottom: 1px solid #2c3e50;">
        <h3 class="panel-title" style="margin-top: 8px; padding-bottom: 8px;">
              <span class="glyphicon glyphicon-home"><a href="#" title=""> Home</a></span> 
            <span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span><a href="#" title=""> Tin tức</a>                
          </h3> 
    </div>              
    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 no-padding"> 
        @include('modules.news-slide')             
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="panel panel-success">
            <div class="panel-body" style="color:#FFFFFF;">
              <div class="row">
                <div class="col-lg-6">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <img class="img-rounded img-thumbnail" src="{!!url('public/uploads/news/'.$top->images)!!}" alt="" height="200" width="100%">
                  <h3 class="title-h3"><a href="{!!url('/news/'.$top->id.'-'.$top->slug)!!}" class="view" news-id="{!! $top->id !!}" >{!!$top->title!!} </a></h3>
                  <p class="summary-content">
                    <a href="{!!url('/news/'.$top->id.'-'.$top->slug)!!}" class="view" news-id="{!! $top->id !!}" title="Detail">
                      {{$top->intro}}
                    </a>
                  </p>
                </div>
                <div class="col-lg-6 no-padding">
                  <div class="row">
                  @if ($data->count() >0)
                     @foreach($data as $row)
                      <div class="col-lg-12" style="margin-bottom: 10px;">
                        <h4 class="title-new"><a href="{!!url('/news/'.$row->id.'-'.$row->slug)!!}" class="view" news-id="{!! $row->id !!}" >{{$row->title}}</a></h4>
                        <div class="col-lg-9">
                          <p class="sum">
                            <a href="{!!url('/news/'.$row->id.'-'.$row->slug)!!}" class="view" news-id="{!! $row->id !!}" style="color:#000;">
                              <small>{{$row->intro}}</small>
                            </a>
                          </p>
                        </div>
                        <div class="col-lg-3 no-padding">
                          <a href="{!!url('/news/'.$row->id.'-'.$row->slug)!!}" class="view" news-id="{!! $row->id !!}" title="">
                          <img class="img-rounded " src="{!!url('public/uploads/news/'.$row->images)!!}" alt="" width="80" height="55" style="padding-right:10px; padding-left: 0;"></a>
                        </div>
                      </div>
                    @endforeach   
                  @endif              
                  </div>                                     
                </div>
              </div>

              <div class="row">
                @if ($new->count() >0)
                 @foreach($new as $row)
                  <div class="col-lg-12 col-md-12 no-padding">
                    <hr>
                    <div class="col-lg-3 col-md-3 no-padding">
                      <a href="{!!url('/news/'.$row->id.'-'.$row->slug)!!}" class="view" news-id="{!! $row->id !!}">
                        <img class="img-rounded img-thumbnail" src="{!!url('public/uploads/news/'.$row->images)!!}" alt="" width="90%" height="99%"></a>
                    </div>
                    <div class="col-lg-9 col-md-9 no-padding">
                      <h4><a href="{!!url('/news/'.$row->id.'-'.$row->slug)!!}" class="view" news-id="{!! $row->id !!}" title="{{$row->title}}">{{$row->title}}</a></h4>
                      <p style="font-size: 13px; color: #000"> 
                        {{$row->intro}}
                      </p>
                      <p style="font-size: 11px;color: #000"><strong style="color: blue"> Lúc :</strong> {!!$row->created_at!!}<strong>  &nbsp; Bởi :  &nbsp; </strong> <a href="#" title="admin">{{$row->author}}</a></p>
                    </div>
                  </div> 
                @endforeach
              @endif
              </div>
                <ul class="pagination text-center">
                  {!!$new->render()!!}
                </ul>
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
             <a class="new-news" href="{!!url('/news/'.$item->id.'-'.$item->slug)!!}" class="view" news-id="{!! $item->id !!}"><span>{{$item->title}}</span></a>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </div>          
    <!-- panel  hot event-->          
    <div class="panel panel-default hot">
      <div class="panel-heading">
        <h3 class="panel-title text-center">Khuyễn mãi hấp dẫn</h3>
      </div>
      <div class="panel-body no-padding">
        @foreach($hot as $item)
          <div class="col-lg-12 no-padding">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 no-padding">
              <a href="{!!url('/news/'.$item->id.'-'.$item->slug)!!}" class="view" news-id="{!! $item->id !!}"><img class="img-rounded" src="{!!url('public/uploads/news/'.$item->images)!!}" alt="news" width="99%" height="99%"> </a>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 no-padding">
             <a class="new-news" href="{!!url('/news/'.$item->id.'-'.$item->slug)!!}" class="view" news-id="{!! $item->id !!}"><span>{{$item->title}}</span></a>
            </div>
          </div>
        @endforeach
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