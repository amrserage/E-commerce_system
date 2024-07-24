<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\product_image;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\select;

class websiteController extends Controller
{
    public function index(){
        $data['products']=product_image::where('images');
        $data['categories'] = Category::where('is_popular',1)->select('id','meta_title','meta_description','image','slug')->get();
        $data['products'] = Product::where('trend',1)->select('id','meta_title','meta_description','price','selling_price','image','slug','category_id')->get();
        $data['sliders']=Slider::all();
        
        return view('website.index',$data);
    }
    public function getcategories(){
        $data['categories'] = Category::where('is_showing',1)->get();
        return view('website.categories',$data);
    }
    public function getCategoryBySlug($slug){
        if (Category::where('slug',$slug)->exists()){
            $data['route']='categories_page';
            $data['category'] = Category::with('products')->where('slug',$slug)->where('is_showing',1)->first();
            return view('website.category',$data);

        }else{
            return redirect('/')->with('error','there is wrong slug');
        }
    }
    public function getProductBySlug($category_product , $productcategory){
    //    dd($productcategory);
        // $product_image=product_image::all();
        $product_image=Product::where('slug',$productcategory)->first()->productImages()->get();

        if (Category::where('slug',$category_product)->exists()){
            if (Product::where('slug', $productcategory)->exists()){
                
                $data['product']=Product::with('category')-> where('slug',$productcategory)->first();
                return view('website.product', compact('product_image'),$data);
            }else{
                return redirect('/')->with('error','there is product');
            }
    }else{
        return redirect('/')->with('error','there is category');
    }
    }

    public function product_listajax(){
        $products=Product::select('name')->where('status','1')->get();
        
        $data=[];
        foreach($products as $item){
        $data[]=$item['name'];
        }
        return $data;
        // dd($data);
    }
    public function searchprouducts(Request $request){

        
    $searched_prouduct=$request->prouduct_name;

    if($searched_prouduct != ""){
        $product=Product::where("name","LIKE","%$searched_prouduct%")->first();
if($product){
    return redirect('category/'.$product->category->slug.'/'.$product->slug);
}else{
    return redirect()->back()->with('fail');
}


    }else{
        return redirect()->back();
    }
    }
}
