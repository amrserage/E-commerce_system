<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\Orders;
use App\Models\Order_item;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CheckOutController extends Controller
{
    public function index(){

        $data ['carts']=Cart::where('user_id',Auth::id())->get();
        $data['user']=User::where('id',Auth::id())->first();
        $data['product']=Product::where('id',Auth::id())->get();
        return view(' website.checkOut.index',$data);
    }

    public function order(){
        $data['orders']=Orders::select('user_id','transeaction_id','total')->get();
        $item['order_items']=Order_item::select('orders_id','product_id','qty')->get(); 
            
        return view('admin.order.order',$data,$item);
    }

    public function place_order(Request $request){
        $Order=Orders::create([
            'user_id'=>$request->user_id,
            'transeaction_id'=>$request->transeaction_id,
            'total'=>$request->total_price,
            ]);
            
    foreach($request->Product as $item ){

        Order_item::create([
            'orders_id'=>$Order->id,
            'product_id'=>$item["product_id"],
            'qty'=>$item["quantity"] , 
            ]); 
        }
        $Cartitems=Cart::where('user_id',Auth::id())->get();
        Cart::destroy($Cartitems);
        return redirect()->route('index')->with('success',trans('messages_trans.success_save'));

        // Payment::create([
        //     'user_id'=>Auth::id(),
        //     'price'=>$request->total_price,
            
        // ]);
        // return redirect()->route('index')->with('success',trans('messages_trans.success_save'));
        
        }

    }
