<?php 
    $bn = DB::table('banners')
            ->join('banners_images', 'banners_images.bn_id', '=', 'banners.id')
            ->where('pos','=',2)
            ->where('status','=',1)
            ->select('banners_images.*')
            ->get();

?>
@if($bn !='')
<div class="fluid_container">            
  <div class="camera_violet_skin" id="camera_wrap_1">
    @foreach($bn as $row)
        <div class="img-responsive" data-thumb="{!!url('public/uploads/banners/'.$row->image_name)!!}" data-src="{!!url('public/uploads/banners/'.$row->image_name)!!}">
            <div class="camera_caption fadeFromBottom">
                
            </div>
        </div>
    @endforeach
  </div><!-- #camera_wrap_1 -->       
</div><!-- .fluid_container -->
@endif