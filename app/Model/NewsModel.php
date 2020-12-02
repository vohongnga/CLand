<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Model\CatModel;
class NewsModel extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'news_id';
    public $timestamps = false;
    public function getItems()
    {
    	return DB::table('news as n')->join('cat as c','n.cat_id','c.cat_id')->orderBy('n.news_id','desc')->paginate(4);
    }
    public function getItemsCat($id)
    {
        return DB::table('news as n')->join('cat as c','n.cat_id','c.cat_id')->orderBy('n.news_id','desc')->where('c.cat_id',$id)->paginate(4);
    } 
   public function getItem($id)
    {
        return DB::table('news as n')->join('cat as c','n.cat_id','c.cat_id')->where('n.news_id','=',$id)->first();
    } 
    public function recentNews()
    {
        return DB::table('news')->orderBy('news_id','desc')->limit(3)->get();
    }
    public function relatedNews($idNews,$idCat)
    {
        return DB::table('news')->where('cat_id',$idCat)->where('news_id','<>',$idNews)->orderBy('news_id','desc')->limit(3)->get();
    }
    public function addNews($idCat,$name,$picture,$content,$dtich,$city,$gia)
    {
        return DB::table('news')->insert(['cat_id'=>$idCat,'name'=>$name,'content'=>$content,'dtich'=>$dtich,'picture'=>$picture,'city'=>$city,'gia'=>$gia]);
    }
    public function editNews($idNews,$idCat,$name,$picture,$content,$dtich,$city,$gia)
    {
        if($picture=='')
            return DB::table('news')->where('news_id','=',$idNews)->update(['cat_id'=>$idCat,'name'=>$name,'content'=>$content,'dtich'=>$dtich,'city'=>$city,'gia'=>$gia]);
        else
             return DB::table('news')->where('news_id','=',$idNews)->update(['cat_id'=>$idCat,'name'=>$name,'content'=>$content,'dtich'=>$dtich,'city'=>$city,'gia'=>$gia,'picture'=>$picture]);
    }
    public function delNews($idNews)
    {
        return DB::table('news')->where('news_id','=',$idNews)->delete();
    }
    public function search($nameSearch)
    {
        return DB::table('news as n')->join('cat as c','n.cat_id','c.cat_id')->where('name','LIKE',"%$nameSearch%")->take(9)->paginate(3);
    }
    public function countAs()
    {
        return DB::table('news')->count();
    }
    public function searchPublic($nameSearch)
    {
        return DB::table('news as n')->join('cat as c','n.cat_id','c.cat_id')->where('name','LIKE',"%$nameSearch%")->orWhere('content','LIKE',"%$nameSearch%")->take(9)->paginate(3);
    }
    public function newsCat1($nameSearch,$idCat1)
    {
        return DB::table('news as n')->join('cat as c','n.cat_id','c.cat_id')->where('name','LIKE',"%$nameSearch%")->where('parent_id','=',$idCat1)->take(9)->paginate(4);
    }
    public function newsCat2($nameSearch,$idCat2)
    {
        return DB::table('news as n')->join('cat as c','n.cat_id','c.cat_id')->where('name','LIKE',"%$nameSearch%")->where('c.cat_id','=',$idCat2)->take(9)->paginate(4);
    }
}
