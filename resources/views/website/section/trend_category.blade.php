<div class="title">
        <h1>Popular Category</h1>
    </div>
    <section class="section3">
    <div class="owl-carousel trend_category trend_product owl-theme py-5">
            @foreach($categories as $category)
                <div class="item">
                <a href="{{route('get_category_slug',$category->slug)}}">
                        <div class="card my-5" style=" width: 18rem;">
                            <img src="{{Storage::url($category->image)}}" class=" card-img-top img-responsive"
                                style="height: 200px; width: 70%;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$category->meta_title}}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>