<div class="img-gatgory">
    @foreach ( $sliders as $slid)
    
    <img src="{{Storage::url($slid->slider_image)}}">
    <button>Buy Now</button>
</div>
    @endforeach