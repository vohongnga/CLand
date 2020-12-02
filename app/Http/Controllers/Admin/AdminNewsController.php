<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NewsModel;
use App\Model\CatModel;
use App\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\Auth;
class AdminNewsController extends Controller
{
	public function __construct(NewsModel $newsModel,CatModel $catModel)
	{
		$this->newsModel = $newsModel;
		$this->catModel = $catModel;
	}
    public function index()
    {
        $cat1 = $this->catModel->cat1();
        $cat2 = $this->catModel->cat2();
    	$itemsNews = $this->newsModel->getItems();
        $user = Auth::user();
    	return view('admin.news.index',compact('itemsNews','user','cat1','cat2'));
    }
    public function getAdd()
    {
    	$itemsCat = $this->catModel->getItemsPublic();
        return view('admin.news.add',compact('itemsCat'));
    }
    public function postAdd(NewsRequest $request)
    {
        $name = $request->name;
        $cat_id = $request->idCat;
        $content = $request->content;
        $dtich = $request->area;
        $city = $request->address;
        $gia = $request->cost;
        if($request->file('picture')==null)
            $picture = '';
        else{    
            $file = $request->file('picture')->store('files');  
            $file= explode('/', $file);
            $picture = end($file);
        }
          $result = $this->newsModel->addNews($cat_id,$name,$picture,$content,$dtich,$city,$gia);
        if($result)
            return redirect()->route('admin.news.index')->with('msg','Thêm thành công');
        else
            return redirect()->route('admin.news.add',$id)->with('msg','Đã có lỗi xảy ra');
    }
    public function getEdit($idNews)
    {
    	$itemNewsOld = $this->newsModel->getItem($idNews);
    	$itemsCat = $this->catModel->getItemsPublic();
    	return view('admin.news.edit',compact('itemNewsOld','itemsCat'));
    }
    public function postEdit(Request $request,$idNews)
    {
        $name = $request->name;
        $cat_id = $request->idCat;
        $content = $request->content;
        $dtich = $request->area;
        $city = $request->address;
        $gia = $request->cost;
        $delete_picture = $request->delete_picture;
        $item = $this->newsModel->getItem($idNews);
        if($request->file('picture')==null){
            $picture = '';
            echo $picture;
        }
        else{    
            $file = $request->file('picture')->store('files');  
            $file= explode('/', $file);
            $picture = end($file);
        }
        $result = $this->newsModel->editNews($idNews,$cat_id,$name,$picture,$content,$dtich,$city,$gia);
        if($result)
            return redirect()->route('admin.news.index')->with('msg','Sửa thành công');
        else
            return redirect()->route('admin.news.edit',$idNews)->with('msg','Đã có lỗi xảy ra');
    }
    public function delNews($idNews)
    {
        $item = $this->newsModel->getItem($idNews);
        $result = $this->newsModel->delNews($idNews);
        $picture = $item->picture;
        if($picture !=""){
            $path = "storage/app/files/{$picture}";
            unlink($path);
        }
        
        if($result)
            return redirect()->route('admin.news.index')->with('msg','Xóa thành công');
        else
            return redirect()->route('admin.news.index')->with('msg','Đã có lỗi xảy ra');
    }
    public function postSearch(Request $request)
    {
        $cat1 = $this->catModel->cat1();
        $cat2 = $this->catModel->cat2();
        $nameSearch = $request->nameSearch;
        $idCat1 = $request->idCat1;
        $idCat2 = $request->idCat2;
        if($idCat1 != 0 && $idCat2 !=0)
            $itemsSearch = $this->newsModel->newsCat2($nameSearch,$idCat2);
        else if($idCat1 !=0 && $idCat2 ==0)
            $itemsSearch = $this->newsModel->newsCat1($nameSearch,$idCat1);
        else if($idCat1 == 0 && $idCat2 !=0)
            $itemsSearch = $this->newsModel->newsCat2($nameSearch,$idCat2);
        else 
            $itemsSearch = $this->newsModel->search($nameSearch);
        return view('admin.news.search',compact('itemsSearch','cat1','cat2'));
    }
}
