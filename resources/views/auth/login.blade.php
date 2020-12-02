
<!-- header -->
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="shortcut icon" type="image/ico" href="/resources/assets/templates/admin/img/icon-180x180.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="/resources/assets/templates/admin/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href ="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="/resources/assets/templates/admin/css/style1.css" rel="stylesheet">

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
                    </div>
    </div>
</div><!-- /.header -->
<div class="page-content container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-wrapper">
                
@php
if(Session::has('msg')){
    echo Session::get('msg');
}
@endphp
                <div class="box">
                    <div class="content-wrap">
                        <img width="100px" height="100px" class="img-circle"
                             src="/resources/assets/templates/admin/img/icon-180x180.png">
                        <h6>Đăng nhập</h6>
                             <form action="{{route('auth.login')}}" method="POST">
                                {{csrf_field()}}
                            
                            <div class="form-group">
                                <label class="text-left pull-left" for="username">Tên đăng nhập</label>
                                <input class="form-control" type="text" name="username" placeholder="Username">
                            </div>

                            <div class="form-group">
                                <label class="text-left pull-left" for="password">Mật khẩu</label>
                                <input class="form-control" name="password" type="password" placeholder="Password">
                            </div>

                            <div class="action">
                                <input class="btn btn-primary signup btn-block" type="submit" value="Đăng nhập">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="already">
                    <p>Don't have an account yet?</p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/resources/assets/templates/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="/resources/assets/templates/admin/js/custom.js"></script>
</body>
</html>