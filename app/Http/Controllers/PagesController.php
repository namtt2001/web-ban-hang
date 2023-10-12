<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Category;
use App\Banners;
use App\Banners_images;
use App\News;
use DB,Auth;
use Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class PagesController extends Controller
{
	public function home()
	{
        
        $den = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id') 
                 ->where('category.parent_id','=','1')               
                ->select('products.*','pro_details.features1','pro_details.features2','pro_details.features3','pro_details.features4')
                ->take(4)->get();
        $ban = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                 ->where('category.parent_id','=','2')
                ->select('products.*','pro_details.features1','pro_details.features2','pro_details.features3','pro_details.features4')
                ->take(4)->get();
        $trangtri = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                 ->where('category.parent_id','=','3')
                ->select('products.*','pro_details.features1','pro_details.features2','pro_details.features3','pro_details.features4')
                ->take(4)->get();        
		return view('home.home',['den'=>$den,'ban'=>$ban,'trangtri'=>$trangtri]);
	}
    // detail products
    public function getdetail($id ,$slug)
    {
        $detail = DB::table('products')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')                
                ->select('products.*','pro_details.features1','pro_details.features2','pro_details.features3','pro_details.features4')
                ->where('products.id',$id)
                ->first();   
        $img_detail = Products::where('id',$id)->first();  
        return view('detail.detail',['data'=>$detail,'img'=>$img_detail]);
    }
    public function thapsangcat()
    {
         $tscat = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','1')
                ->select('products.*','pro_details.features1','pro_details.features2','pro_details.features3','pro_details.features4')
                ->paginate(12);
        return view('category.thapsang',['data'=>$tscat]);
    }
    public function bancat($page = 0)
    {
        $bancat = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','2')
                ->select('products.*','pro_details.features1','pro_details.features2','pro_details.features3','pro_details.features4')
                ->paginate(12);

        return view('category.ban',['data'=>$bancat]);
    }
    public function trangtri()
    {
         $trangtri = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','3')
                ->select('products.*','pro_details.features1','pro_details.features2','pro_details.features3','pro_details.features4')
                ->paginate(12);
        return view('category.trangtri',['data'=>$trangtri]);
    }
    
    public function lasted()
    {
         $lasted = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->select('products.*','pro_details.features1','pro_details.features2','pro_details.features3','pro_details.features4')
                ->orderBy('products.created_at','DESC')
                ->take(15)->get(); 
        return view('category.lasted',['data'=>$lasted]);
    }
    public function newscat()
    {
        $data = DB::table('news')->where('status','=',1)->orderBy('views_count','DESC')->take(4)->get();

        $top = DB::table('news')->where('status','=',1)->orderBy('views_count','DESC')->first();

        $last = DB::table('news')->where('status','=',1)->where('cat_id','<>',10)
            ->orderBy('created_at','DESC')
            ->take(4)->get();

        $hot = DB::table('news')->where('status','=',1)->where('cat_id','=',10)
            ->orderBy('created_at','DESC')
            ->take(4)->get();

        $new = DB::table('news')->paginate(5);
        return view('category.news',['data'=>$data,'last'=>$last,'top'=>$top,'new'=>$new,'hot'=>$hot]);
    }

    public function getnewsdetail($id,$slug)
    {
         $last = DB::table('news')->where('status','=',1)
            ->orderBy('created_at','DESC')
            ->take(4)->get();
        $data = News::where('id','=',$id)->where('status','=',1)->first();
        $hot = DB::table('news')->where('status','=',1)->where('cat_id','=',10)
            ->orderBy('created_at','DESC')
            ->take(4)->get();
        return view('detail.news-detail',['data'=>$data,'last'=>$last,'hot'=>$hot]);
    }
    public function countview($id)
    {
        if(isset($_POST['id'])){            
            $id = intval($_POST['id']);
        }
        $new = News::find($id);
        $new->views_count = $new->views_count+1;
        $new->save();
        echo $new->views_count;
    }
    // chi tiet gio hang
    public function getcart()
    {   
        return view ('detail.giohang');
    }
    // them san pham vao gio
     public function addcart($id)
    {
        $pro = Products::where('id',$id)->first();
        Cart::add(['id' => $pro->id, 'name' => $pro->name, 'qty' => 1, 'price' => $pro->price,'options' => ['img' => $pro->images]]);
        return redirect()->route('getcart');
    }
    // cap nhat so luong
    public function getupdatecart($id,$qty,$dk)
    {
      if ($dk=='up') {
         $qt = $qty+1;
         Cart::update($id, $qt);
         return redirect()->route('getcart');
      } elseif ($dk=='down') {
         $qt = $qty-1;
         Cart::update($id, $qt);
         return redirect()->route('getcart');
      } else {
         return redirect()->route('getcart');
      }
    }
    // xoa san pham trong gio
    public function getdeletecart($id)
    {
     Cart::remove($id);
     return redirect()->route('getcart');
    }
    // huy gio hang
    public function huy()
    {
        Cart::destroy();   
        return redirect()->route('index');   
    }
    // tim kiem
    public function search(Request $rq)
    {
        $key = $rq->key;
        $validators = array(
        'key'   => 'required|min:3'
        );

        $msg = array(
            'key.required'   => 'Vui lòng nhập từ khóa.',
            'key.min'   => 'Vui lòng nhập hơn 3 ký tự.'
            
        );
        $validator = Validator::make(
            $rq->only('key', 'sltCate', 'txtimg', 'txtre_Intro','txtprice'),
                $validators,$msg
            );
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        } else{
            
            $data = DB::table('products')
                    ->join('category', 'products.cat_id', '=', 'category.id')
                    ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                    ->where('products.name', 'LIKE', '%'.$key.'%')
                    ->select('products.*','pro_details.features1','pro_details.features2','pro_details.features3','pro_details.features4')
                    ->paginate(12);
            return view ('category.search',['data'=>$data,'key'=>$key]);
        }
    }
    public function tags(Request $request, $tagname){
        $data = DB::table('products')
            ->join('category', 'products.cat_id', '=', 'category.id')
            ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
            ->where('products.tag', 'LIKE', '%'.$tagname.'%')
            ->select('products.*','pro_details.features1','pro_details.features2','pro_details.features3','pro_details.features4')
            ->orderBy('products.created_at','DESC')
                ->paginate(12);
        return view('category.tags',['data'=>$data]);
    }
    public function newstags(Request $request, $tagname){
         $last = DB::table('news')->where('status','=',1)
            ->orderBy('created_at','DESC')
            ->take(4)->get();
        $data = DB::table('news')
            ->where('tag', 'LIKE', '%'.$tagname.'%')
            ->paginate(12);
        return view('category.newstags',['data'=>$data,'last'=>$last]);
    }
    
}
