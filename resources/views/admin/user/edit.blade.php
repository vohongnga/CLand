@extends('templates.admin.master')
@section('content')
@php
$username = $itemUser->username;
$fullname = $itemUser->fullname;
$idRoleOld = $itemUser->role;
@endphp
            <div class="col-md-10">

        <div class="row">
            <div class="col-md-12 panel-info">
@if(Session::has('msg'))
    {{Session::get('msg')}}
@endif
                <div class="content-box-header panel-heading">
                    <div class="panel-title ">Cập nhật người dùng</div>
                </div>
                                <form action="" method="POST">
                                    {{csrf_field()}}
                    <div class="content-box-large box-with-header">
                        <div>
                            <div class="row mb-10"></div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Tên đăng nhập</label>
                                        <input type="text" name="username" value="{{$username}}" class="form-control"
                                               placeholder="Nhập tên đăng nhập" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Họ tên</label>
                                        <input type="text" name="fullname" value="{{$fullname}}" class="form-control"
                                               placeholder="Nhập họ tên">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Mật khẩu</label>
                                        <input type="password" name="password" class="form-control"
                                               placeholder="Nhập mật khẩu">
                                    </div>
                                </div>
                            </div>
                            <div class = "row">
                                <div class = "col-sm-12">
                                    <div class="form-group">
                                        <label>Chức vụ</label>
                                        <select name="role" class="form-control">
                                            <option value = "0">Chọn chức vụ</option>
                                            $selected="";
                                            @foreach($itemsRole as $itemRole)
                                            @php
                                            $idRole = $itemRole->role_id;
                                            $nameRole = $itemRole->chucvu;
                                            if($idRoleOld==$idRole){
                                                $selected="selected='selected'";
                                            }else{
                                                $selected="";
                                            }
                                            @endphp
                                            <option {{$selected}} value="{{$idRole}}">{{$nameRole}}
                                            </option>  
                                            @endforeach                     
                                        </select>
                                    </div>
                                </div>
                                </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" value="Cập nhật" class="btn btn-success"/>
                                    <input type="reset" value="Nhập lại" class="btn btn-default"/>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.row col-size -->

    </div><!-- /.col-md-10 -->
@stop
