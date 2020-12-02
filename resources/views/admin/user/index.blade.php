@extends('templates.admin.master')
@section('content')
            <div class="col-md-10">

        <div class="content-box-large">
            @if(Session::has('msg'))
 {{Session::get('msg')}}
 @endif
            <div class="row">
                <div class="panel-heading">
                    <div class="panel-title ">Quản lý người dùng</div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <a href="{{route('admin.user.add')}}" class="btn btn-success">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Thêm
                    </a>
                </div>
                <div class="col-md-4">
                    <form action="{{route('admin.user.search')}}" method="get">
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
                            <th>Tên đăng nhập</th>
                            <th>Họ tên</th>
                            <th>Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($itemsUser as $itemUser)
                            @php
                            $id = $itemUser->id;
                            $username = $itemUser->username;
                            $fullname = $itemUser->fullname;
                            $roleUser = $itemUser->role;
                            $urlEdit = route('admin.user.edit',$id);
                            $urlDel = route('admin.user.del',$id);
                            @endphp
                            <tr class="odd gradeX">
                                <td>{{$id}}</td>
                                <td>{{$username}}</td>
                                <td>{{$fullname}}</td>
                                <td class="center text-center">
                                    @php
                                    if($role !=3){
                                        if($role==1||$roleUser !=1){
                                    @endphp
                                    <a href="{{$urlEdit}}" title="" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-pencil "></span> Sửa
                                    </a>
                                    @php
                                }
                            }
                            if($roleUser !=1 && $role!=3){
                                    @endphp
                                    <a href="{{$urlDel}}" title="" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-trash">
                                        </span> Xóa
                                    </a>
                                    @php
                                }
                                    @endphp
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <nav class="text-center" aria-label="...">
                        <ul class="pagination">
                            {{$itemsUser->links()}}
                        </ul>
                    </nav>
                    <!-- /.pagination -->

                </div>
            </div><!-- /.row -->
        </div><!-- /.content-box-large -->
    </div>
   @stop