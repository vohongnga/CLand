@extends('templates.admin.master')
@section('content')

            <div class="col-md-10">

        <div class="content-box-large">
@if(Session::has('msg'))
    {{Session::get('msg')}}
@endif
             <div class="row">
                <div class="panel-heading">
                    <div class="panel-title ">Quản lý danh mục</div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <a href="{{route('admin.cat.add')}}" class="btn btn-success">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Thêm
                    </a>
                </div>
                <div class="col-md-4">
                    <form action="{{route('admin.cat.search')}}" method="get">
                        {{csrf_field()}}                                            
                        <div class="input-group form">
                            <input type="text" class="form-control" placeholder="Nhập từ tìm kiếm" name = "nameSearch">
                            <span class="input-group-btn">
                         <input class="btn btn-primary" type="submit" name = "search" value = "Search">
                       </span>
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
                            <th>Tên danh mục</th>
                            <th>Là danh mục con của</th>
                            <th>Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                           @foreach($itemsCat as $item)
                           @php
                            $idCat = $item->cat_id;
                            $nameCat = $item->nameCat;
                            $parent_id = $item->parent_id;
                            $urlEdit = route('admin.cat.edit',$idCat);
                            $urlDel = route('admin.cat.del',$idCat);
                           @endphp
                           <tr class="odd gradeX">
                                <td>{{$idCat}}</td>
                                <td>{{$nameCat}}</td>
                                <td>{{$parent_id}}</td>
                                <td class="center text-center">
                                    <a href="{{$urlEdit}}" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-pencil "></span> Sửa
                                    </a>
                                    <a href="{{$urlDel}}" class="btn btn-danger">
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
                           {{$itemsCat->links()}}
                        </ul>
                    </nav>
                    <!-- /.pagination -->

                </div>
            </div><!-- /.row -->
        </div><!-- /.content-box-large -->
    </div>
    @stop

<!-- Footer -->
