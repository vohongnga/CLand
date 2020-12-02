<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NewsModel;
use App\Model\CatModel;
use App\Model\UserModel;

class IndexController extends Controller
{
	public function __construct(NewsModel $newsModel, CatModel $catModel, UserModel $userModel)
	{
		$this->newsModel= $newsModel;
		$this->catModel = $catModel;
		$this->userModel = $userModel;
	}
    public function index()
    {
    	$countNews = $this->newsModel->countAs();
    	$countCat = $this->catModel->countAs();
    	$countUser = $this->userModel->countAs();
        //echo $countUser.'---'.$countCat.'---'.$countNews;
    	return view('admin.index',compact('countNews','countCat','countUser'));
    }
    public function contact()
    {
    	return view('cland.contact');
    }
}
