<!DOCTYPE html>
<html lang="{{Config::get('app.locale')}}">
<head>
<meta charset="utf-8">
<meta name="viewport"content="width=device-width , intial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<meta name="csrf-token" content="{{ csrf_token() }}">

@include('website.layouts.head')

</head>
<body dir="{{(Config::get('app.locale') == 'ar'? 'rtl' : 'ltr')}}">


@include('website.layouts.navbar')

@yield('content')


@include('website.layouts.footer_scripts') 
@include('website.layouts.footer') 
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>
</html>
