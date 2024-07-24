<!DOCTYPE html>
<html lang="en">
<head>
@section('title')
Teco - Technology
@endsection

    <title>Teco - Technology </title>
    <link rel="stylesheet" href="{{asset('assets/js/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/product.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/Gategories.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/category.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/cart.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/about.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slider.css')}}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="icon" href="{{asset('assets/logo/IMG_0205.PNG')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

</head>
<body>
    <header>
        <!------------------------------------------------------------- NavBar ------------------------------------------------------------ -->
        <nav class="nav1">
            <div class="container">
                <div class="logo">
                    <a href="#"><img src="{{asset('assets/icon/1709326167418 1.png')}}" alt=""></a>
                </div>
                <form action="{{route('searchprouduct')}}" method="POst">
                <div class="search">
                    @csrf
                    <input type="search" class="form-control" name="prouduct_name" placeholder="search prouduct" id="search_prouduct" aria-describedby="basic-addon1" aria-label="search prouduct">
                    <button type="submit" id="basic-addon1"><i class="fa fa-search"></i></button>
                    
                </div>
            </form>
                <div class="login">
                    @guest
                @if (Route::has('login'))
                    <div class="log">
                        <img src="{{asset('assets/icon/Vector.png')}}" alt="">
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </div>
                    @endif
                    @else
                    <div class="btn-group mb-1">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    </a>
                    <div class="dropdown-menu">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                    @endguest
                    </div>
                    
                    <div class="cardd" style="display: flex;">
                        <img src="{{asset('assets/icon/🦆 icon _shopping bag_.png')}}">
                        <a href="{{route('cart.index')}}"> Cart(1)</a>
                    </div>
                </div>
            </div>
        </nav>
            <nav class="navbar nav2 navbar-expand-lg navbar-light">
                <div class="container-fluid navv2">
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                
                                <a class="" aria-current="page" href="{{url('/')}}">Home</a>
                            </li>
                            <li class="">
                                <a class="" href="{{url('categories')}}">Categories</a>
                            </li>
                            <!-- <li class="">
                                <a class="" href="{{route('index')}}">Shop</a>
                            </li> -->
                            <li class="">
                                <a class="" href="{{route('about')}}">About Us</a>
                            </li>
                            <li class="">
                                <a class="" href="{{route('order_view')}}">last Order</a>
                            </li>
                        
                        </ul>
                    </div>
                </div>
            </nav>
    </header>
    <!------------------------------------------------------------- NavBar ------------------------------------------------------------ -->
    
    <!------------------------------------------------------------- carousel ------------------------------------------------------------ -->

    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
    var availableTags = [];
        $.ajax({
            method:"GET",
            url:"{{route('product_list')}}",
            success:function(response){
            console.log(response)
            // startAutoComplete(availableTags)
            }
        });
        function startAutoComplete(availableTags){

            $( "#search_prouduct" ).autocomplete({
                source: availableTags
            });
        }

</script>

<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
@yield('js')
</body>

</html>
