<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order_item;
use App\Models\Orders;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function orders(){
        $data['carts']=Cart::all();
        $data['orders']=Orders::select('id','user_id','transeaction_id','total','created_at')->get();
        $item['order_items']=Order_item::select('orders_id','product_id','qty')->get();        
        return view('admin.order.order',$data,$item);
        // $order=Orders::all();
        // return view('admin.order.order',compact('order'));
    }
    public function vieworder($id){
        $order=Orders::where('id',$id)->first();
        return view('admin.order.view',compact('order'));

        
    }
    public function order_view(){
        $user = Auth::user(); // Assuming user authentication
        $orders = Orders::where('user_id', $user->id)->with(['orderItems.product'])->orderBy('created_at', 'desc')->get();
// dd($orders);
return view('website.last_order',compact('orders'));

}
}
