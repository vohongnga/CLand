<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Directing Template">
    <meta name="keywords" content="Directing, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zogin | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet" type="text/css">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{$publicUrl}}css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{$publicUrl}}css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{$publicUrl}}css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{$publicUrl}}css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{$publicUrl}}css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="{{$publicUrl}}css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{$publicUrl}}css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{$publicUrl}}css/reset.css" type="text/css">
    <link rel="stylesheet" href="{{$publicUrl}}css/style.css" type="text/css">
    <script type ="text/javascript" src="{{$publicUrl}}js/jquery-1.10.2.js"></script>
    <script type ="text/javascript" src="{{$publicUrl}}js/jquery-3.3.1.min.js"></script>
    <script type ="text/javascript" src="{{$publicUrl}}js/jquery.validate.min.js"></script>
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
                <li>Hãy gọi: 0905 199 488</li>
                <li>Email: NGALAND@GMAIL.COM</li>
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
                                <li>Hãy gọi: 0905 199 488</li>
                                <li>Email: NGALAND@GMAIL.COM</li>
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

    <!-- Breadcrumb Begin -->
    <section class="breadcrumb-option set-bg" data-setbg="{{$publicUrl}}/img/3.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h2>Blog</h2>
                        <div class="breadcrumb__widget">
                            <a href="./index.html">Home</a>
                            <span>Blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>