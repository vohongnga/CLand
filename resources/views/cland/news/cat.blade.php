@extends('templates.cland.master') 
                @section('content')
                <div class="col-lg-8 order-lg-2 order-1">
                    <div class="row">
                        @foreach($itemsNewsCat as $item)
                        @php
                        $id = $item->news_id;
                        $name = $item->name;
                        $content = $item->content;
                        $picture = $item->picture;
                        $slug = str_slug($name);
                        $counter = $item->counter;
                        $route = route('cland.news.detail',[$slug,$id]);
                        @endphp
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{$publicPic}}{{$picture}}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> May 4, 2019</li>
                                        <li><i class="fa fa-comment-o"></i> {{$counter}}</li>
                                    </ul>
                                    <h5><a href="{{$route}}">{{$name}}</a></h5>
                                    <p></p>
                                    <a href="{{$route}}" class="blog_read_more">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        <div class="col-lg-12">
                            <div >
                                {{$itemsNewsCat->links()}}
                            </div>
                        </div>
                    </div>
                </div>
                @stop
           
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    