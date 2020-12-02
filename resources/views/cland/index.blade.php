@extends('templates.cland.master') 
@section('content')
@if(Session::has('msg'))
 {{Session::get('msg')}}
 @endif
                <div class="col-lg-8 order-lg-2 order-1">
                    <div class="row">
                        @foreach($items as $item)
                        @php
                        $name = $item->name;
                        $content = $item->content;
                        $picture = $item->picture;
                        @endphp
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{$publicPic}}{{$picture}}" alt=""> 
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> May 4, 2019</li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="#">{{$name}}</a></h5>
                                    <p></p>
                                    <a href="#" class="blog_read_more">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        <div class="col-lg-12">
                            <div >
                                {{$items->links()}}
                            </div>
                        </div>
                    </div>
                </div>
                @stop
           
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    