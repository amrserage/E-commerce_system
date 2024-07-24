 @extends('website.layouts.master')

@section('title')
    {{$product->slug}}
@endsection


@section('content')



<input type="hidden" value="{{$product->qty}}" id="qty">
<section class="product">

<div class="products">

    <div class="img">
    <img src="{{Storage::url($product->image)}}"  alt="">
    </div>

<div class="details">

    <h4>{{$product->name}}</h4>
    <h2>Sale Price: {{$product->selling_price}} EGP</h2>
    <p>Normal Price:{{$product->price}} EGP</p>
    <p>Normal price apply on 0% interest offers.</p>
    <div class="pro">
    @foreach($product_image as $imagess)
    <img src="{{url($imagess->images)}}" style="width: 50px;
height:50px" alt="">
@endforeach
        <!-- <button>Black</button> <button>White</button> <button>Titanium</button> -->
    </div>
    <h3>@if($product->qty > 0)
        <small class="badge bg-success">In Stock</small>
    @else
        <small class="badge bg-danger">Out Of Stock</small>
    @endif
    </h3>
    <div class="col-3">
    @if($product->qty > 0)
        <h4 class="py-4">quantity</h4>
        <div class="input-group mb-3">
            <button class="input-group-text btn btn-outline-warning"
                    onclick="increaseQTY()">+
            </button>
            <input type="text" class="form-control text-center" id="qty_vlaue" readonly
            value="1">
            <button class="input-group-text btn btn-outline-warning"
            onclick="decreaseQTY()">-
        </button>
        </div>
        @endif
    </div>
    <div class="button">
                @if($product->qty > 0)
                <button class="btn1" onclick="addToCart()"><img src="{{asset('assets/icon5/proudect/Vector.png')}}" alt=""> Add TO Cart</button>
                <a href="#" onclick="addToCart()">buy now</a>
                <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                @endif
            </div>
    <img src="proudect/Rectangle 39.png" alt="">
            <p><img style="width: 2.7%;" src="{{asset('assets/icon5/proudect/delivery-truck 1.png')}}" alt="">  Home delivery as soon as Sunday 31, Jun 2024</p>
</div>
</div>
<div>

</div>

</section>

    <section class="Details">

<div class="title">
    <h1>Additional Details</h1>
</div>

<div class="accordion" id="accordionPanelsStayOpenExample">    
<div class="accordion-item">
    <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
        Product Specifications
    </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
    <div class="accordion-body">
        <div class="text1" style="margin: 25px;">
        <strong style="margin-right: 200px;">Weight</strong>1.7 kg
        </div>

        <div class="text2" style="margin: 25px;">
        <strong style="margin-right: 200px;">Color</strong>Black, Deep Purple, Gold, Silver
        </div>

        <div class="text1" style="margin: 25px;">
        <strong style="margin-right: 200px;">Model</strong>{{$product->description}}
        </div>

        <div class="text2" style="margin: 25px;">
        <strong style="margin-right: 150px;">Resolution </strong>{{$product->meta_description}}
        </div>

        <div class="text1" style="margin: 25px;">
        <strong style="margin-right: 240px;"></strong>{{$product->short_description}}
        </div>

        <div class="text2" style="margin: 25px;">
        <strong style="margin-right: 240px;"></strong>Apple A16 Bionic (4 nm)
        </div>

        <div class="text1" style="margin: 25px;">
        <strong style="margin-right: 240px;"></strong>iOS 16
        </div>

        <div class="text2" style="margin: 25px;">
        <strong style="margin-right: 240px;"></strong>Hexa-core (2×3.46 GHz Everest + 4×2.02 GHz Sawtooth)
        </div>

        <div class="text1" style="margin: 25px;">
        <strong style="margin-right: 240px;"></strong>Apple GPU (5-core graphics)
        </div>

        <div class="text2" style="margin: 25px;">
        <strong style="margin-right: 240px;"></strong>Face ID, accelerometer, gyro, proximity, compass, barometer
        </div>

    </div>
    </div>
</div>
<div class="accordion-item">
    <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        What’s in The Box?
    </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
    <div class="accordion-body">
        <strong>In the box, you will find the following items:</strong> 
        <li>Sim Pin</li>
        <li>Cabel</li>
    </div>
    </div>
</div>
</div>


</section>
@endsection
@section('js')

    <script>

        var qty = $('#qty').val();

        function increaseQTY() {
            var value = parseInt($('#qty_vlaue').val());

            value = isNaN(value) ? 0 : value;

            if (value < qty) {

                value++

                $('#qty_vlaue').val(value)
            }

        }

        function decreaseQTY() {
            var value = parseInt($('#qty_vlaue').val());

            value = isNaN(value) ? 0 : value;

            if (value > 1) {
                value --;
                $('#qty_vlaue').val(value)
            }

        }

        function addToCart(){
            var product_id = $('#product_id').val();
            var qty = $('#qty_vlaue').val();

            console.log('product id is : '+ product_id  + ' and qty is : ' + qty)
            $.ajax({
                
                method : 'POST',
                url : "{{route('product.addToCart')}}",
                
                data : {
                    "_token":"{{csrf_token()}}" ,
                    'product_id': product_id,
                    'qty': qty
                },
                success:function (res){
                    Swal.fire(res.msg)
                }
            })
            
        }
        function buyNow(){
            var product_id = $('#product_id').val();
            var qty = $('#qty_vlaue').val();

            console.log('product id is : '+ product_id  + ' and qty is : ' + qty)
            $.ajax({
                
                // method : 'POST',
                // url : "{{route('checkout.index')}}",
                
                // success:function (res){
                //     Swal.fire(res.msg)
                // }
            })
        }

</script> 

@endsection 


