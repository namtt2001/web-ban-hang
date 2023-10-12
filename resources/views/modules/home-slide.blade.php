
<?php 

    $bn = DB::table('banners')
            ->join('banners_images', 'banners_images.bn_id', '=', 'banners.id')
            ->where('pos','=',1)
            ->where('status','=',1)
            ->select('banners_images.*')
            ->get();

?>

<div class="fluid_container hidden-xs">            
  <div class="camera_violet_skin" id="camera_wrap_2"  >
    @foreach($bn as $row)
        <div class="img-responsive" data-thumb="{!!url('public/uploads/banners/'.$row->image_name)!!}" data-src="{!!url('public/uploads/banners/'.$row->image_name)!!}">
             <div class="camera_caption fadeFromBottom">
               
            </div> 
        </div>
    @endforeach
  </div><!-- #camera_wrap_1 -->       
</div><!-- .fluid_container --> 