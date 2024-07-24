@extends('website.layouts.master')

@section('title')
    {{$category->slug}}
@endsection

@section('css')

@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{Storage::url($category->image)}}" class="" style= "height: 200px; width: 70%;" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$category->name}}</h5>
                            <p class="card-text">{{$category->description}}</p>
                            <hr>
                            <p class="card-text">{{$category->meta_description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="gategories" id="gategories1">
            <div class="div1  ">
            @foreach($category->products as $product)
            
                <div class="card" style="width: 25rem;">
                <a href="{{route('get_product_slug',[$product->category->slug,$product->slug])}}">
                    <img class="card-img-top" src="{{Storage::url($product->image)}}" alt="Card image cap">
                    <div class="cardtitle">
                        <p>{{$product->meta_title}}</p>
                        <div class="card-body">
                            <h5 class="card-title">{{$product->selling_price}} <span style="font-size: 15px;">EGP</span> </h5>
                            <button class="btn" onclick="addToCart()"> Add TO Cart</button>
                            <!-- <a href="#"  class="btn btn-primary" onclick="addToCart()"> <img src="{{asset('assets/Categories/ion_cart (1).png')}}" alt=""> Add To Cart</a> -->
                        </div>
                    </div>
                </a>
                </div>
                @endforeach
                </div>
    </div>
        <!-- <div class="py-5">
        <div class="container">
        <h1 class="text-center">products</h1>
            <div class="row">
                @foreach($category->products as $product)
                    <div class="col-md-4">
                        <a href="{{route('get_product_slug',[$product->category->slug,$product->slug])}}">
                            <div class="card my-5" style="width: 18rem;">
                                <img src="{{Storage::url($product->image)}}" class=" card-img-top img-responsive" style= "  height: 250px; width: 100%;" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->meta_title}}</h5>
                                    <p class="card-text">{{$product->meta_description}}</p>
                                    <h5 class="card-title2">
                                    {{$product->price}}<span style="font-size: 15px;">EGP</span></h5>
                                    <span>
                                        <s>{{$product->selling_price}}</s>
                                    </span>
                                    
                                    <button class="btn" onclick="addToCart()"> Add TO Cart</button>
                                </div>
                            </div>
                            </a>
                    </div>
                @endforeach
            </div>

            </div>


    </div> -->


@endsection


@section('js')
<script>
        $('products').owlCarousel({
    loop:false,
    rtl:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})
</script>
@endsection
