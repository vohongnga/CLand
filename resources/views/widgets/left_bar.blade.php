<div class="col-lg-4 order-lg-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search">
                                <button><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__categories">
                            <h4>Categories</h4>
                            <ul>
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
                        </div>
                        <div class="blog__sidebar__recent">
                            <h4>Mới nhất</h4>
                            @foreach($itemRecent as $itemRe)
                            @php
                            $idRe = $itemRe->news_id;
                            $nameRe = $itemRe->name;
                            $time = $itemRe->created_at;
                            $picture = $itemRe->picture;
                            $slug = str_slug($nameRe);
                            $route = route('cland.news.detail',[$slug,$idRe]);
                            @endphp
                            <div class="blog__recent__item">
                                <div class="blog__recent__item__pic">
                                    <a href = "{{$route}}"><img src="{{$publicPic}}/{{$picture}}" alt="" width = 89px heigh = 88px></a>
                                </div>
                                <div class="blog__recent__item__text">
                                    <a href = "{{$route}}"><h6>{{$nameRe}}</h6></a>
                                    <span>{{$time}}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="blog__sidebar__comment">
                            <h4>Bài viết liên quan</h4>
                            <div class="classes__sidebar__comment">
                                <div class="classes__sidebar__comment__pic">
                                    <img src="{{$publicUrl}}/img/classes-details/comment-1.png" alt="">
                                </div>
                                <div class="classes__sidebar__comment__text">
                                    <span>04 Mar 2018</span>
                                    <h6>Brandon Kelley</h6>
                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                        adipisci velit,</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>