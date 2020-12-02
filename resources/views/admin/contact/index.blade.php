@extends('templates.admin.master')
@section('content')
            <div class="col-md-10">

        <div class="content-box-large">
            @if(Session::has('msg'))
 {{Session::get('msg')}}
 @endif
            <div class="row">
                <div class="panel-heading">
                    <div class="panel-title ">Quản lý liên hệ</div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group form">
                        <input type="text" class="form-control" placeholder="Nhập từ tìm kiếm...">
                        <span class="input-group-btn">
                         <button class="btn btn-primary" type="button">Tìm kiếm</button>
                       </span>
                    </div>
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
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>SĐT</th>
                            <th>Nội dung</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($itemsCon as $item)
                            @php
                            $id = $item->contact_id;
                            $name = $item->name;
                            $email = $item->email;
                            $phone = $item->phone;
                            $content = $item->content;
                            @endphp
                            <tr class="odd gradeX">
                                <td>{{$id}}</td>
                                <td>{{$name}}</td>
                                <td>{{$email}}</td>
                                <td>{{$phone}}</td>
                                <td>{{$content}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <nav class="text-center" aria-label="...">
                        <ul class="pagination">
                        </ul>
                    </nav>
                    <!-- /.pagination -->

                </div>
            </div><!-- /.row -->
        </div><!-- /.content-box-large -->
    </div>
   @stop