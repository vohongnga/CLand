<div class="col-lg-4 order-lg-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="{{route('cland.searchPublic')}}" method = "get">
                                {{csrf_field()}}
                                <input type="text" placeholder="Search" name = "nameSearch">
                                <button><span class="icon_search"></span></button>
                            </form>
                        </div>
                        @php
       function showCat($arrCat, $parent_id =0, $char = '')
    {
        $cat_child = array();
        foreach($arrCat as $key=>$item){
            if($item['parent_id']== $parent_id)
            {
                $cat_child[] = $item;
                unset($arrCat[$key]);
            }
        }

        if($cat_child)
        {
            echo '<ul>';
            foreach($cat_child as $key=>$item)
            {
                $idCat = $item->cat_id;
                $nameCat = $item->nameCat;
                $slug = str_slug($nameCat);
                $route = route('cland.news.cat',[$slug,$idCat]);
                echo '<li><a href = "'.$route.'">'.$char.$item['nameCat'];
                showCat($arrCat,$item['cat_id'],$char.'-----');
                echo '</a></li>';
            }
            echo '</ul>';
        }
    }
    @endphp
        
                        <div class="blog__sidebar__categories">
                            <h4>Danh mục</h4>
                            @php
                            showCat($itemsCat,$parent_id =0,$char = '');
                            @endphp
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
                    </div>
</div>