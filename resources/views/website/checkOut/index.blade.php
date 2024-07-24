@extends('website.layouts.master')
@section('title')
payment
@endsection
@section('content')
@php
$total_price = 0;
@endphp
<div class="title-payment">
        <a href="{{route('cart.index')}}"><i class="fa-sharp fa-solid fa-circle-chevron-right fa-flip-horizontal"></i> Back to Cart</a>
    </div>
<form action="{{url('checkout/place_order')}}"method="post">
{{csrf_field()}}
    <section class="Shipping">
        <div class="info">
            <h2>Shipping Info</h2>
            <div class="Contact">
                <input type="hidden"value="{{$user->id}}"name="user_id"id="user_id" >
                <h4>1. Contact Information</h4>
                <label for="">Email address * </label><br>
                <input type="email" value="{{$user->email}}" name="email" id="email" placeholder="Email address * ">
            </div>
            <input type="hidden" value="10101010" name="transeaction_id" id="transeaction_id">
            <h4>2. Shipping Address</h4>
            <div class="Address">
                <div>
                    <label for="">First name * </label><br>
                    <input type="text" value="{{$user->fname}}" name="firstname" id="firstname">
                </div>   
                <div>
                    <label for="">Last name * </label><br>
                    <input type="text"value="{{$user->lname}}"  name="lastname" id="lastname">
                </div>  
            </div>
            <input type="hidden" value="{{$user->id}}" name="User_id" id="id">
            <div class="Country">
                <label>Country / Region  * </label>
                <h3>Egypt</h3>
                
                <label for="">Your Address  * </label><br>
                <input type="text" value="{{$user->address1}}" name="address1" id="address1"><br>   
                
                <label for="">Governorate  * </label><br>
                <input type="text" value="{{$user->address2}}" name="address2" id="address2"><br>

                <label for="">Phone   * </label><br>
                <input type="phone" value="{{$user->phone}}" name="phone" id="phone"><br>
                <div>
                    </div>
                    <button type="submit"><i class="fa-solid fa-wallet"></i> Cash on delivery</button>
                    <div style="font:100 ;">or</div>
                    <div onclick="save()" id="paypal-button-container"></div>
            </div>
        </div>
        <div class="Payment">   
            @foreach($carts as $key=> $cart)
            @php
            $poducts[] = ["product_id"=>$cart->Product->id,"quantity"=>$cart->qty]
            @endphp
            @php
                  $product_total = $cart->Product->selling_price *  $cart->qty; @endphp
            @php
                $total_price += $cart->Product->selling_price * $cart->qty ; @endphp
            <div class="Productss">
                <h5>Products</h5>
                <p> {{$cart->qty}}in your Cart</p>
                <input type="hidden" value="{{$cart->Product->id}}" name="Product[{{$key}}][product_id]" class="productss" id="products">
                <input type="hidden" value="{{$cart->qty}}" name="Product[{{$key}}][quantity]" id="qty">
                <a href="#"><img src="{{Storage::url($cart->Product->image)}}" alt=""></a>
                <h5>{{$cart->product->selling_price}} EGP</h5>
            </div>
            @endforeach
            <div class="Payment-Summary">
                <h4>Payment Summary</h4>
                <div>
                    <h5 style="color: #9F9F9F;">Subtotal</h5>
                    <h5>{{$cart->product->selling_price }}</h5>
                </div>
                <img src="{{asset('assets/icon/Rectangle 39.png')}}" style="width: 100%;" alt="">
                <div>
                    <input type="hidden" value="{{$total_price}}" name="total_price" id="total_price">
                    <h5 style="color: #9F9F9F;">Total</h5>
                    <h5>{{$total_price}}EGP</h5>
                </div>
                
            </div>
        </div>
        
        </form>
        
    </section>

@endsection
@section('js')
<script>
   
    

</script>
<script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_CLEINT')}}&currency=USD"></script>
<script src="{{asset('assets/app.js')}}"></script>
<script>
paypal.Buttons({
              // Order is created on the server and the order id is returned
                createOrder: (data, actions) => {
                    return fetch("/api/orders", {
                    method: "post",
                    body:JSON.stringify({price:"{{$total_price}}"})
                    // use the "body" param to optionally pass additional order information
                    // like product ids or amount
                    })
                    .then((response) => response.json())
                    .then((order) => order.id);
                },
                // Finalize the transaction on the server after payer approval
                onApprove: (data, actions) => {
                    return fetch(`/api/orders/${data.orderID}/capture`, {
                    method: "post",
                    body:JSON.parse({
                        'email':localStorage.getItem('email'),
                        'firstname':localStorage.getItem('firstname'),
                        'lastname':localStorage.getItem('lastname'),
                        'address1':localStorage.getItem('address1'),
                        'address2':localStorage.getItem('address2'),
                        'phone':localStorage.getItem('phone'),
                    })
                    })
                    .then((response) => response.json())
                    .then((orderData) => {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    const transaction = orderData.purchase_units[0].payments.captures[0];
                    alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                    // When ready to go live, remove the alert and show a success message within this page. For example:
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                    });
                }
                }).render('#paypal-button-container');
    
    </script> 

@endsection

<script>
    function save(){
        let email = document.getElementById('email').value;
    let firstname = document.getElementById('firstname').value;
    let lastname = document.getElementById('lastname').value;
    let address1 = document.getElementById('address1').value;
    let address2 = document.getElementById('address2').value;
    let phone = document.getElementById('phone').value;
    let total_price = document.getElementById('total_price').value;
    let products = document.getElementsByClassName('productss');
    let arr =[];
    for (let i = 0; i < products.length; i++) {
        arr.push(products[i].value)
    }
    localStorage.setItem('email',email)
    localStorage.setItem('firstname',firstname)
    localStorage.setItem('lastname',lastname)
    localStorage.setItem('address1',address1)
    localStorage.setItem('address2',address2)
    localStorage.setItem('phone',phone)
    localStorage.setItem('total_price',total_price)
    localStorage.setItem('Product',arr)
    }
</script>