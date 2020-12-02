@extends('templates.admin.master')
@section('content')
@if(Session::has('msg'))
 {{Session::get('msg')}}
 @endif
 
            <div class="col-md-10">
        <div class="row">
            <div class="col-md-12 panel-info">
                <ul>
    @foreach ($errors->all() as $error)
    <li style = "color:red">{{ $error }}</li>
    @endforeach
</ul>
                <div class="content-box-header panel-heading">
                    <div class="panel-title ">Thêm tin</div>
                </div>
                       <form action="" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}          
                    
                    <div class="content-box-large box-with-header">
                        <div>
                            <div class="row mb-10"></div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Tên tin</label>
                                        <input type="text" id = "name" name="name" class="form-control" placeholder="Nhập tên tin">
                                    </div>

                                    <div class="form-group">
                                        <label>Danh mục tin</label>
                                        <select name="idCat" class="form-control">
                                            <option value ="0">Chon danh muc</option>
                                            @foreach($itemsCat as $itemCat)
                                            @php
                                            $idCat = $itemCat->cat_id;
                                            $nameCat = $itemCat->nameCat;
                                            @endphp
                                         <option value="{{$idCat}}">{{$nameCat}}</option>
                                         @endforeach
                                </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Thêm hình ảnh</label>
                                        <input type="file" name="picture" class="btn btn-default" id="exampleInputFile1">
                                        <p class="help-block"><em>Định dạng: jpg, png, jpeg,...</em></p>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Diện tích</label>
                                        <input type="text" name="area" class="form-control" placeholder="Nhập diện tích">
                                    </div>
                                     <div class="form-group">
                                        <label for="name">Gía</label>
                                        <input type="text" name="cost" class="form-control" placeholder="Nhập giá tiền">
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <input type ="text" name="address" class="form-control" placeholder="Nhập địa chỉ" >
                                    </div>

                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea id = "editor1" name="content" class="form-control ckeditor" placeholder="Nhập mô tả" rows="3"></textarea>
                                        <script type = "text/javascript">
                                            CKEDITOR.replace( 'editor1',
                                            {
                                                filebrowserBrowseUrl: '/resources/assets/templates/admin/ckfinder/ckfinder.html',
                                                filebrowserImageBrowseUrl: '/resources/assets/templates/admin/ckfinder/ckfinder.html?type=Images',
                                                filebrowserUploadUrl: '/resources/assets/templates/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                                filebrowserImageUploadUrl: '/resources/assets/templates/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
                                            });
                                        </script>
                                    </div>

                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" value="Thêm" class="btn btn-success"/>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.row col-size -->

    </div><!-- /.col-md-10 -->
    </div><!-- /.row -->
</div><!-- /.page-content -->

<!-- Footer -->
@stop