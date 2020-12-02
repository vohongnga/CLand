           @extends('templates.admin.master')
           @section('content')
           
           <div class="col-md-10">

        <div class="content-box-large">
@if(Session::has('msg'))
 {{Session::get('msg')}}
 @endif
            <div class="row">
                <div class="panel-heading">
                    <div class="panel-title ">Kết quả tìm kiếm</div>
                </div>
            </div>
            <hr>
                        <div class="row">
                <div class="col-md-8">
                    <a href="{{route('admin.news.add')}}" class="btn btn-success">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Thêm
                    </a>
                </div> 
            </div>
            <br>
            <div class = "row">
                <form action="{{route('admin.news.search')}}" method="get">
                        {{csrf_field()}}  
                    <div class="col-md-4">    
                        <div class="input-group form">
                            <input type="text" class="form-control" placeholder="Nhập từ tìm kiếm" name = "nameSearch">
                        </div>
                    
                    </div>  
                    <div class="col-md-4">                  
                        <div class="input-group form">
                            <select name="idCat1" class="form-control">
                                <option value = "0">Chọn danh mục cấp 1</option>
                                    @foreach($cat1 as $itemCat)
                                    @php
                                        $idCat = $itemCat->cat_id;
                                        $nameCat = $itemCat->nameCat;
                                    @endphp
                                <option value="{{$idCat}}">{{$nameCat}}</option>          
                                    @endforeach                     
                            </select>
                        </div>
                    
                    </div> 
                    <div class="col-md-4">               
                        <div class="input-group form">
                            <select name="idCat2" class="form-control">
                                <option value = "0">Chọn danh mục cấp 2</option>
                                    @foreach($cat2 as $itemCat)
                                    @php
                                        $idCat = $itemCat->cat_id;
                                        $nameCat = $itemCat->nameCat;
                                    @endphp
                                <option value="{{$idCat}}">{{$nameCat}}</option>          
                                    @endforeach                     
                            </select>
                            <span class="input-group-btn">
                                <input class="btn btn-primary" type="submit" name = "search" value = "Search">
                            </span>
                        </div>  
                    </div>
                </form>
            </div>
        
            </div>
            <hr>
            <div class="row container">
                <div class="col-md-12">
                                    </div>
            </div>
            <div class="row">
                <div class="panel-body">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên tin</th>
                            <th>Ngày đăng</th>
                            <th>Danh mục</th>
                            <th>Hình ảnh</th>
                            <th>Diện tích</th>
                            <th>Địa chỉ</th>
                            <th>Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($itemsSearch as $itemNews)
                                @php
                                $name = $itemNews->name;
                                $dtich = $itemNews->dtich;
                                $city = $itemNews->city;
                                $picture = $itemNews->picture;
                                $created_at = $itemNews->created_at;
                                $news_id = $itemNews->news_id;
                                $nameCat = $itemNews->nameCat;
                                $urlEdit = route('admin.news.edit',$news_id);
                                $urlDel = route('admin.news.del',$news_id);
                                @endphp
                            <tr class="odd gradeX">
                                <td>{{$news_id}}</td>
                                <td>{{$name}}</td>
                                <td>{{$created_at}}</td>
                                <td>{{$nameCat}}</td>
                                <td>
                                    <img width="150px" src="/storage/app/files/{{$picture}}" alt="">
                                </td>
                                <td>{{$dtich}}</td>
                                <td>{{$city}}</td>
                                <td class="center text-center">
                                    <a href="{{$urlEdit}}" title="" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-pencil "></span> Sửa
                                    </a>
                                    <a href="{{$urlDel}}" title="" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span> Xóa
                                    </a>
                                </td>
                            </tr>
                             @endforeach                   
                         </tbody>
                    </table>

                    <!-- Pagination -->
                    <nav class="text-center" aria-label="...">
                        <ul class="pagination">
                            <ul class="pagination">
        
                               {{ $itemsSearch->appends(Request::all())->links() }}
                        </ul>
                    </nav>
                    <!-- /.pagination -->

                </div>
            </div><!-- /.row -->
        </div><!-- /.content-box-large -->
    </div>
@stop