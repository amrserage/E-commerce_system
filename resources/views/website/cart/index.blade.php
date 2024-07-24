@extends('website.layouts.master')
@section('title')
cart
@endsection
@section('content')
<div class="cardText">
    <h1>My Cart</h1>
    <p>You have items in your cart</p>
</div>
@php
$total_price = 0;
$product_total=0;

@endphp


<input type="hidden" type>
<div class="card-payment">
        <div class="items">
        @forelse($cart_product as $product_cart)
        <div class="item">

                <div class="img">
                    <img src="{{Storage::url($product_cart->Product->image)}}" alt="">
                </div>        
                <div class="details">
                    <div class="txt">
                        <h4>{{$product_cart->Product->name}} with built in receiver</h4>
                        @php
                        $product_total = $product_cart->Product->selling_price *  $product_cart->qty; @endphp
                    <h3>{{$product_total}}EGP</h3>                  
                </div>
                <div class="qtr">
                    <p>Qty</p>
                        <br>
                        <div class="col-lg-3 col-xl-2 d-flex" >
                                <button class="btn btn-link px-2"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown(); updateCart({{$product_cart->id}})">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input id="form1" min="0" name="qty" value="{{$product_cart->qty}}" type="number"
                                        class="form-control form-control-sm qty_{{$product_cart->id}}" />
                                <button class="btn btn-link px-2"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp(); updateCart({{$product_cart->id}})">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                    </div>
                    <div class="col">
                        @include('website.includes.delete',['type'=>'cart','data'=>$product_cart,'routes'=>'cart.destroy'])
                    </div>

                </div>
            </div>
            <div class="photo">
                <img src="{{asset('assets/icon/Rectangle 39.png')}}" alt="">
            </div>
            @php 
         $total_price += $product_cart->Product->selling_price * $product_cart->qty ; @endphp
            @empty   
            <h6> There Are No Products</h6>
            @endforelse
        </div>
        <div class="Payment">
            <div class="PaymentCard">
                <h2>Payment Summary</h2>
                <div class="txt">

                    <h2>Subtotal</h2>
                    <h3>{{$total_price}} EGP</h3>
                </div>

                <div class="txt">
                    <h2>Shipping Fees</h2>
                    <h3>Calculated </h3>
                </div>

                <div class="btn">
                <a href="{{route('checkout.index')}}"><i class="fa-solid fa-wallet"></i> Proceed to Secure Checkout </a>
                </div>
            </div>
        </div>
    </div>
    <div class="btn">
            </div>  
<!-- <div class="card-payment">
    <div class="items">
            @forelse($cart_product as $product_cart)
            <div class="item">
                <div class="img">
                    <img src="{{Storage::url($product_cart->Product->image)}}" alt="">
                </div>
                
                <div class="details">
                    <h4>{{$product_cart->Product->name}} qled tv with built in receiver</h4>
                    @php
                     $product_total = $product_cart->Product->selling_price *  $product_cart->qty; @endphp
                    <h3>{{$product_total}}EGP</h3>
                </div>
                <div class="Qty">
                        <p>Qty</p>
                        <br>
                        <div class="col-lg-3 col-xl-2 d-flex" >
                                <button class="btn btn-link px-2"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown(); updateCart({{$product_cart->id}})">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input id="form1" min="0" name="qty" value="{{$product_cart->qty}}" type="number"
                                        class="form-control form-control-sm qty_{{$product_cart->id}}" />
                                <button class="btn btn-link px-2"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp(); updateCart({{$product_cart->id}})">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                </div>
           

            </div>
            @empty   
            <h6> There Are No Products</h6>
            @endforelse
        </div>
        <div class="Payment">
            <div class="PaymentCard">
                <h2>Payment Summary</h2>
                <div class="txt">
                    <h2>Subtotal</h2>
                    <h3>37,416 EGP</h3>
                </div>

                <div class="txt">
                    <h2>Shipping Fees</h2>
                    <h3>Calculated </h3>
                </div>

                <div class="btn">
                    <button>Proceed to Secure Checkout </button>
                </div>
            </div>
        </div>
    </div> -->
@endsection
@section('js')
    <script>
        function updateCart(id){
            var qty = $('.qty_'+id).val();

            $.ajax({
                method : 'POST',
                url : "{{route('cart.update')}}",
                dataType : 'json',
                data : {
                    "_token":"{{csrf_token()}}" ,
                    id  : id,
                    qty : qty
                },
                success : function (response){
                    console.log(response.msg)
                    $('#cart_div').load(location.href + " #cart_div");
                }
            })
        }
    </script>
@endsection

    