@extends('templates.cland.master1') 
@section('content')
 
                <div class="col-lg-8 order-lg-2 order-1">
                    <div class="blog__details">
                        @php
                        $name = $item->name;
                        $id = $item->news_id;
                        $cont = $item->content;
                        $news_id = $item->news_id;
                        $arrCont = explode('/',$cont);
                        $slug = str_slug($name);
                        $route = "/{$slug}/{$id}";
                        echo $route;
                        @endphp
                        <div>
                            <ul>
                                @foreach($arrCont as $key)
                                <li>{{$key}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <br>
                    <hr>

 @if(Auth::check())
 @php
 $user = Auth::user();
 $user_id = $user->id;
 @endphp
        <span>Đánh giá: Có {{$countRate}} đánh giá</span>
        <div id="rating-star" >
            <form class="rating" id="form-star" data-route="{{route('cland.rate',[$slug,$id])}}">
                @csrf
                    @php
                        $check='';
                        for($i=1;$i<=5;$i++){
                            if($rate==$i)
                            {
                                $check='checked';
                            }
                            else{
                                $check='';
                            }
                    @endphp
                    <label>
                        <input {{$check}} type="radio" name="stars" value="{{$i}}" class = "stars"/>
                        @php
                            for($j=1;$j<=$i;$j++){
                            @endphp
                            <span class="icon">★</span>
                            @php
                        }
                        @endphp
                    </label>
                    @php
                    }
                    @endphp
                    </form>
                    {{$rate.'/5'}}
                    <div id="check-rate"></div>
        </div>
        <script>
         $(document).ready(function(){
            $(":radio").click(function (e) {
                var news_id = <?php echo $news_id; ?> ;
                var rate = $(this).val();
                var routeStars = $('#form-star').data('route');
                var user_id = <?php echo $user_id; ?>   
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: routeStars,
                    method: 'post',
                    data: {
                        srate:rate,
                        snews_id:news_id,
                        suser_id:user_id
                    },
                    success: function(result){
                       alert('Bạn đã đánh gía thành công')
                    }
                });              
            });
        });
     </script>
        @endif
                    <div class="blog__sidebar__comment">
                        
                        <h4>Bình luận ({{$countCom}})</h4>
                        @foreach($itemsComm as $itemCom)
                        @php
                        $date = $itemCom->created_at;
                        $username = $itemCom->username;
                        $content = $itemCom->content;
                        @endphp
                            <div class="classes__sidebar__comment">
                                <div class="classes__sidebar__comment__pic">
                                    <img src="{{$publicUrl}}/img/classes-details/comment-1.png" alt="">
                                </div>
                                <div class="classes__sidebar__comment__text">
                                    <span>{{$date}}</span>
                                    <h6>{{$username}}</h6>
                                    <p>{{$content}}</p>
                                </div>
                            </div>
                        @endforeach   
                            <div class = "add_comm">
                                
                            </div>
                       
                    </div>
                </div>

 @stop
 @section('comm')
 @if(Auth::check())
 @php
 $user = Auth::user();
 $user_id = $user->id;
 @endphp
 
   <div class="leave-comment spad">
        <div class="container">
            <ul>
                    @foreach ($errors->all() as $error)
                     <li style = "color:red">{{ $error }}</li>
                    @endforeach
                </ul>
                    <div class="leave__comment__text">
                        <div id = form_output></div>
                        <h2>Bình luận</h2>
                        <form method = "post" id = "commentform" class = "comment-form" data-route = "{{route('cland.comment',[$slug,$id])}}" action="javascript:void(0)">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <textarea placeholder="Your Comment" id = "content" name = "content" class = "commentcont"></textarea>
                                    <button type="submit" class="site-btn" id = "submit" name = "submit" value = "submit">Submit</button>
                                    <input type="hidden" name="comment_post_ID" value="1" id="comment_post_ID">
                                </div>
                            </div>
                        </form>
                    </div>  
                    <div class="cmt"></div>
        </div>
    </div>
<script>
         $(document).ready(function(){
            $("#submit").click(function (e) {
                var news_id = <?php echo $news_id; ?> ;
                var query = $('#content').val();
                var route = $('#commentform').data('route');
                var user_id = <?php echo $user_id; ?>   
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: route,
                    method: 'post',
                    data: {
                        aquery:query,
                        anews_id:news_id,
                        auser_id:user_id
                    },
                    success: function(result){
                       ('.cmt').html(result);
                    }
                });              
            });
        });
     </script>
    @endif
     

    @stop
 