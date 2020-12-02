<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Directing Template">
    <meta name="keywords" content="Directing, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Zogin | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{$publicUrl}}css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{$publicUrl}}css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{$publicUrl}}css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{$publicUrl}}css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{$publicUrl}}css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="{{$publicUrl}}css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{$publicUrl}}css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{$publicUrl}}css/style.css" type="text/css">
    
    <script src="{{$publicUrl}}js/jquery-1.10.2.js"></script> 
    <script src="{{$publicUrl}}js/jquery-3.3.1.min.js"></script>
    <style>
        .rating {
  display: inline-block;
  position: relative;
  height: 50px;
  line-height: 50px;
  font-size: 50px;
}
.rating label {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  cursor: pointer;
}
.rating label:last-child {
  position: static;
}
.rating label:nth-child(1) {
  z-index: 5;
}
.rating label:nth-child(2) {
  z-index: 4;
}
.rating label:nth-child(3) {
  z-index: 3;
}
.rating label:nth-child(4) {
  z-index: 2;
}
.rating label:nth-child(5) {
  z-index: 1;
}
.rating label input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}
.rating label .icon {
  float: left;
  color: transparent;
}
.rating label:last-child .icon {
  color: #000;
}
.rating:not(:hover) label input:checked ~ .icon,
.rating:hover label:hover input ~ .icon {
  color: #09f;
}
.rating label input:focus:not(:checked) ~ .icon:last-child {
  color: #000;
  text-shadow: 0 0 5px #09f;
}
#rating-star{
  margin-bottom: 70px
    </style>
    
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu">
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="{{$publicUrl}}/img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__widget">
             
            <ul>
                <li>CALL US: + 1 800-567-8990</li>
                <li>WRITE US: OFFICE@EXAMPLE.COM</li>
                <li>OPENING TIMES: MON - FRI: 9:00 - 19:00</li>
            </ul>
        </div>
       
        <div class="offcanvas__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="header__logo">
                            <a href="./index.html"><img src="{{$publicUrl}}/img/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="header__top__widget">
                            @php
                if(Auth::check()){
                    $user = Auth::user();
                    $username = $user->username;
                    $link = route('auth.logoutPublic');
                    $text = "Đăng xuất";
                }
                else{
                    $username = "Khach";
                    $link = route('auth.loginPublic');
                    $text = "Đăng nhập";
                }
                @endphp
                            <ul>
                                <li>CALL US: + 1 800-567-8990</li>
                                <li>WRITE US: OFFICE@EXAMPLE.COM</li>
                                <li>OPENING TIMES: MON - FRI: 9:00 - 19:00</li>
                            </ul>
                            <p>Xin chào {{$username}}</p>
                            <a href="{{$link}}" class="primary-btn">{{$text}}</a>
                        </div>
                    </div>
                </div>
                <div class="canvas__open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </div>
        
        <div class="header__nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9">
                        <nav class="header__menu">
                            <ul>
                                <li><a href="{{route('cland.news.index')}}">Trang chủ</a></li>
                                <li><a href="#">Mua bán</a>
                                    <ul class="dropdown">
                                        @foreach($itemsCat as $itemCat)
                                        @php
                                        $idCat = $itemCat->cat_id;
                                        $nameCat = $itemCat->nameCat;
                                        $slug = str_slug($nameCat);
                                        $route = route('cland.news.cat',[$slug,$idCat]);
                                        @endphp
                                        <li><a href="{{$route}}">{{$nameCat}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="./contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="header__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Blog Hero Begin -->
    <section class="breadcrumb-option blog-hero set-bg" data-setbg="{{$publicPic}}/{{$item->picture}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__hero__text">
                        @php
                        $name = $item->name;
                        @endphp
                        <h2>{{$name}}</h2>
                        <ul>
                            @php
                            $gia = $item->gia;
                            if($gia==0){
                            $gia = 'Thương lượng';
                        
                    }
                            @endphp
                            <li>Gía: {{$gia}}</li>
                            <li>Diện tích:{{$item->dtich}}</li>
                            <li>{{$item->created_at}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>