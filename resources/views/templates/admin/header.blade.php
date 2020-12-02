
<!-- header -->
<!DOCTYPE html>
<html>
<head>
    <title>    Trang chủ Admin Cland
</title>
    <link rel="shortcut icon" type="image/ico" href="/resources/assets/templates/admin/img/icon-180x180.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="/resources/assets/templates/admin/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href ="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="/resources/assets/templates/admin/css/style1.css" rel="stylesheet">
    <script type ="text/javascript" src="/resources/assets/templates/admin/ckeditor/ckeditor.js"></script>
    <script type ="text/javascript" src="/resources/assets/templates/admin/ckfinder/ckfinder.js"></script>
    </head>
<body>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                    <h1><a href="index.php">VNE-Admin</a></h1>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-lg-12"></div>
                </div>
            </div>
            <div class="col-md-2">
                 @php
                if(Auth::check()){
                    $user = Auth::user();
                    $username = $user->username;
                    $link = route('auth.logout');
                    $text = "Logout";
                }
                else{
                    $username = "Khach";
                    $link = route('auth.login');
                    $text = "Đăng nhập";
                }
                @endphp
                    <div class="navbar navbar-inverse" role="banner">
                        <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                            <a class="nav navbar-nav"><span style = "color: white">Xin chào {{$username}}</span></a>
                            <br>
                            <a class="nav navbar-nav" href = "{{$link}}"><span style = "color: white">Log out</span></a>
                            </ul>
                        </nav>
                    </div>
                </div>
                    </div>
    </div>
</div><!-- /.header -->
