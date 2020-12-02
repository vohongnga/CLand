<div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <!-- Nav-bar -->
                 @php
            $uri = Request::fullUrl();
            $arLeft = array(
            'trangchu'=>'Trang chủ',
            'user'=>'Người dùng',
            'cat'=>'Danh mục',
            'news'=>'Tin tức',
            'contact'=>'Liên hệ'
            );
            @endphp
            <ul class="nav">
    <!-- Main menu -->
    
            @foreach($arLeft as $route=>$text)
                    @php
                    $check = strpos($uri,$route);
                    if($check !=false)
                    $active = 'style="color:red"';
                    else
                    $active = "";
                    @endphp
    <li class="current"><a href="{{route('admin.'.$route.'.index')}}"><i class="glyphicon glyphicon-home"></i><p {!!$active!!}>{{$text}}</p></a></li>
    @endforeach
            </div>
        </div>