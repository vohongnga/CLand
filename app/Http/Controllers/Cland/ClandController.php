<?php
namespace App\Http\Controllers\Cland;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CatModel;
use App\Model\NewsModel;
use App\Model\ContactModel;
use App\Model\ComModel;
use App\Model\RateModel;
use App\Http\Requests\ComRequest;
use Validator;
class ClandController extends Controller
{
	public function __construct(CatModel $catModel, NewsModel $newsModel,ContactModel $contactModel,ComModel $comModel,RateModel $rateModel)
	{
		$this->catModel     = $catModel;
		$this->newsModel    = $newsModel;
        $this->contactModel = $contactModel;
        $this->comModel     = $comModel;
        $this->rateModel    = $rateModel;
	}
    public function index()
    {
    	$itemsCat = $this->catModel->getItemsPublic();
    	$items = $this->newsModel->getItems();
    	return view('cland.news.index',compact('items','itemsCat'));
    }
    public function getNewsCat($slug,$idCat)
    {
        $name = "";
    	$itemsCat = $this->catModel->getItemsPublic();
    	$itemCat = $this->catModel->getItem($idCat);
        $parent_id = $itemCat->parent_id;
        if($parent_id ==0)
            $itemsNewsCat = $this->newsModel->newsCat1($name,$idCat);
        else
            $itemsNewsCat = $this->newsModel->getItemsCat($idCat);
    	//$itemRelated = $this->newsModel->relatedNews();
    	//dd($itemsCat);
    	return view('cland.news.cat',compact('itemsNewsCat','itemsCat'));
    }
    public function detail($slug,$idNews)
    {
    	$itemsCat = $this->catModel->getItemsPublic();
        $countCom = $this->comModel->countAs($idNews);
        $itemsComm = $this->comModel->cmts($idNews);
    	$item = $this->newsModel->getItem($idNews);
        $rate = $this->rateModel->avge($idNews);
        $rate = number_format($rate, 1);
        $rate = round($rate);
        $countRate = $this->rateModel->countAs($idNews);
    	//$itemRecent = $this->newsModel->recentNews();
    	//$itemRelated = $this->newsModel->relatedNews();
    	return view('cland.news.detail',compact('item','itemsCat','itemsComm','countCom','rate','countRate'));
    }
    public function contact()
    {
        $itemsCat = $this->catModel->getItemsPublic();
        return view('cland.contact',compact('itemsCat'));
    }
    public function postContact(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $content = $request->content;
        $result = $this->contactModel->add($name,$email,$phone,$content);
        if($result)
            return redirect()->route('cland.contact');
    }
    public function comment(Request $request){
        $query = $request->post('aquery');
        $news_id = $request->post('anews_id');
        $user_id = $request->post('auser_id');
        $resulAdd = $this->comModel->add($user_id,$news_id,$query);
        if($resulAdd)
            echo $query;
        else 
            echo 'b';
    }
    public function searchPublic(Request $request)
    {
        $nameSearch = $request->nameSearch;
        $itemsCat = $this->catModel->getItemsPublic();
        $resultSearch = $this->newsModel->searchPublic($nameSearch);
        //dd($resultSearch);
        return view('cland.news.search',compact('resultSearch','itemsCat'));
    }
    public function rate(Request $request)
    {
        $rate = $request->post('srate');
        $news_id = $request->post('snews_id');
        $user_id = $request->post('suser_id');
        $isFind = $this->rateModel->find($user_id,$news_id);
        if($isFind !=0)
            $resultRate = $this->rateModel->updateRate($user_id,$news_id,$rate);
        else
            $resultRate = $this->rateModel->addRate($user_id,$news_id,$rate);
        if($resultRate)
            echo "Thanh cong";
        else
            echo "That bai";
    }
}
