@extends('website.layouts.master')
@section('title')
Teco - Technology
@endsection
@section('content')

@include('website.section.slider')
@include('website.section.slider3')
@include('website.section.trend_category')
@include('website.section.trend_product')


@include('website.section.slider2')

@endsection

    @section('css')
    <style>

        .owl-carousel .card{overflow: hidden;
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;}
            .owl-carousel .item{
                border: none;
            }
            .owl-carousel img{transition: all .2s ease-in-out;
            width: 10%;
            margin: 10px;
            background:#BCD2D3;
            border-radius: 35px;}
            .owl-carousel .item img{transition: all .2s ease-in-out;
            width: 5%;
            margin: 10px;
            background:#BCD2D3;
            border-radius: 25px;}
        .owl-carousel .item img:hover{transform: scale(1.1);}
        
</style>
    @endsection
@section('js')
<script>
        $('.trend_category').owlCarousel({
    loop:false,
    rtl:true,
    margin:50,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:2
        },
        1000:{
            items:5
        }
    }
})
</script>
<script>
        $('.trend_product').owlCarousel({
    loop:false,
    rtl:true,
    margin:50,
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
            items:5
        }
    }
})
</script>



@endsection