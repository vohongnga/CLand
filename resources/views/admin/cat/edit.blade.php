@extends('templates.admin.master')
@section('content')
@php
$nameCat = $itemCatOld->nameCat; 
$parent_id =$itemCatOld->parent_id;
$idCatOld = $itemCatOld->cat_id;
$selected="";
$selected1="";
@endphp
<div class="col-md-10">

        <div class="row">
            <div class="col-md-12 panel-info">
                <div class="content-box-header panel-heading">
                    <div class="panel-title ">Sửa danh mục</div>
                </div>
                                <form action="" method="POST">
                    {{csrf_field()}}
                    <div class="content-box-large box-with-header">
                        <div>
                            <div class="row mb-10"></div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Tên danh mục</label>
                                        <input type="text" name="nameCat" value="{{$nameCat}}" class="form-control"
                                               placeholder="Nhập danh mục">
                                    </div>
                                </div>
                            </div>
                            <div class = "row">
                        <div class="col-sm-12">                  
                        <div class="form-group">
                            <select name="idCat1" class="form-control">
                                <option value = "0">Chọn danh mục cấp 1</option>

                                    @foreach($cat1 as $itemCat)
                                    @php
                                        $idCat = $itemCat->cat_id;
                                        $nameCat = $itemCat->nameCat;
                                       if($idCat==$parent_id ){
                                                $selected="selected='selected'";
                                            }else{
                                                $selected="";
                                            }
                                    @endphp
                                <option <?php echo $selected; ?>value="{{$idCat}}">{{$nameCat}}</option>          
                                    @endforeach                     
                            </select>
                        </div>
                    
                    </div> 
                </div>
                            <hr>
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" value="Cập nhật" class="btn btn-success"/>
                                     
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.row col-size -->

    </div><!-- /.col-md-10 -->
    @stop