<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CatModel;
use App\Http\Requests\CatRequest;
class AdminCatController extends Controller
{
	public function __construct(CatModel $catModel)
	{
		$this->catModel = $catModel;
	}
    public function index()
    {
        $itemsCat = $this->catModel->getItems();
        return view('admin.cat.index',compact('itemsCat'));
    }
    public function getEdit($id)
    {
        $cat1 = $this->catModel->cat1();
        $cat2 = $this->catModel->cat2();
        $itemCatOld = $this->catModel->getItem($id);
        return view('admin.cat.edit',compact('itemCatOld','cat1','cat2'));
    }
    public function postEdit($id, Request $request)
    {
        $nameCat = $request->nameCat;
        $idCat1 = $request->idCat1;
        if($idCat1 !=0)
            $parent_id = $idCat1;
        else
            $parent_id = 0;
        $result = $this->catModel->edit($id,$nameCat,$parent_id);
        if($result)
            return redirect()->route('admin.cat.index')->with('msg','Sửa thành công');
        else
            return redirect()->route('admin.cat.add')->with('msg','Đã có lỗi xảy ra');
    }
    public function getAdd()
    {
        $cat1 = $this->catModel->cat1();
        return view('admin.cat.add',compact('cat1'));
    }
    public function postAdd(CatRequest $request)
    {
        $nameCat = $request->nameCat;
        $idCat1 = $request->idCat1;
        if($idCat1 ==0)
            $parent_id = 0;
        else
            $parent_id = $idCat1;
        $result = $this->catModel->add($nameCat,$parent_id);
        if($result)
            return redirect()->route('admin.cat.index')->with('msg','Thêm thành công');
        else
            return redirect()->route('admin.cat.add')->with('msg','Đã có lỗi xảy ra');
    }
    public function del($id)
    {
        $itemCat = $this->catModel->getItem($id);
        $parent_id = $itemCat->parent_id;
        if($parent_id!=0)
            $result = $this->catModel->del($id);
        else
        {
            $result = $this->catModel->delParent($id);
            $result = $this->catModel->del($id);
        }
        if($result)
            return redirect()->route('admin.cat.index')->with('msg','Xóa thành công');
        else
            return redirect()->route('admin.cat.index')->with('msg','Đã có lỗi xảy ra');
    }
    public function postSearch(Request $request)
    {
        $nameSearch = $request->nameSearch;
        $itemsSearch = $this->catModel->search($nameSearch);
        return view('admin.cat.search',compact('itemsSearch'));
    }
}