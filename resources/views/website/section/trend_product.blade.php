<div class="title">
        <h1>New Arrivals</h1>
</div>

    <div class="owl-carousel trend_product owl-theme py-5">
            @foreach($products as $product)
                <div class="Categoriesss">
                    <a href="{{route('get_product_slug',[$product->category->slug,$product->slug])}}">
                    <div class="card my-5" style="width: 18rem;">
                        <img src="{{Storage::url($product->image)}}" class=" card-img-top"alt="Card image cap">
                        
                        <div class="cardtitle">
                            <h5>{{$product->meta_title}}
                    </h5>
                    {{$product->price}} <span style="flood-color: black;" > EGP</span></h5>
                    <div class="card-body">
                        <h5 class="card-title">
                        <a></a>                        
                        </div>
                        </div>
                    </div>
                </div>
                </a>
            @endforeach
        </div>
