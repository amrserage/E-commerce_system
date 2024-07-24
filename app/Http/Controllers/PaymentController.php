<?php

namespace App\Http\Controllers;

use App\Models\Order_item;
use App\Models\Orders;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
public function create(Request $request)
{
    return $this->createOrder( $request);
}
public function capture(Request $request,$orderId)
{
    return  $this->capturePayment($request,$orderId);
}

private function createOrder( $request) {
    $price=$request->price;
    $accessToken = $this->generateAccessToken();
    $url = $this->getBaseUrl()."/v2/checkout/orders";
    $response =Http::withHeaders([
        'Authorization'=>"Bearer $accessToken",
        "Content-Type"=> "application/json",
    ])->withBody(json_encode([
        "intent"=> "CAPTURE",
        "purchase_units"=> [
            [
            "amount"=> [
                "currency_code"=> "USD",
                "value"=> "price",
            ],
        ],
        ],
    ]),'application/json')
    ->post($url);
    $data = $response->json();
    if($response->successful()){
    return response()->json($data, 200);
    }
    return response()->json($data, 500);//error
    }

    // use the orders api to capture payment for an order
private function capturePayment($request,$orderId) {

    $url = $this->getBaseUrl()."/v2/checkout/orders/$orderId/capture";
$accessToken = $this->generateAccessToken();
$response =Http::withHeaders([
    'Authorization'=>"Bearer $accessToken",
    "Content-Type"=> "application/json",
])->withBody('{}','application/json')
->post($url);
$data = $response->json();
if($response->successful()){
    // save in database
    $email = $request->email;
    $firstname = $request->firstname;
    $lastname = $request->lastname;
    $address1 = $request->address1;
    $address2 = $request->address2;
    $phone = $request->phone;
    $total_price = $request->total_price;

    $Order=Orders::create([
        'user_id'=>Auth::id(),
        'transeaction_id'=>null,
        'total'=>$total_price,
        ]);
foreach($request->Product as $item ){

    Order_item::create([
        'order_id'=>$Order->id,
        'product_id'=>$item["product_id"],
        'qty'=>$item["product_id"] , 
        ]); 
    }
    Payment::create([
        'user_id'=>Auth::id(),
        'currency'=>$data['purchase_units'][0]['payments']['cap
        tures'][0]['amount']['currency_code'],
        'payment_status'=>$data['status'],
        'amount'=>$data['purchase_units'][0]['payments']['captu
        res'][0]['amount']['value'],
        'payer_id'=>$data['payer']['payer_id'],
        'transaction_id'=>$data['id'],
        'type'=>'paypal',

        'transaction_at'=>now()->toDateTimeString()
        ]);
return response()->json($data, 200);
}
return response()->json($data, 500);//error
}
// generate an access token using client id and app secret
private function generateAccessToken() {

$auth =base64_encode(env('PAYPAL_CLEINT').":".env('PAYPAL_SECRET'));
$url=$this->getBaseUrl()."/v1/oauth2/token";
$response =Http::withHeaders([
    'Authorization'=>"Basic $auth"
])->asForm()
->post($url,[
    'grant_type'=>'client_credentials'
]);
$data =  $response->json();
if($response->successful()){
    return $data['access_token'];
}
return null;
}

private function getBaseUrl(){
    if(env('APP_ENV')=='production')
    return "https://api-m.paypal.com";

    return "https://api-m.sandbox.paypal.com";
}
}




