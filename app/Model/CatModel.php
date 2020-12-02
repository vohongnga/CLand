<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class CatModel extends Model
{
    protected $table = 'cat';
    protected $primaryKey = 'cat_id';
    public $timestamps = false;

    public function getItems()
    {
    	//return $this->all();//SELECT * FROM users
    	//return $this->orderBy('id','DESC')->paginate(2);//2 ban ghi tren 1 trang,
    	return DB::table('cat')->orderBy('cat_id','DESC')->paginate(5);
    }  
    public function getItemsPublic()
    {
        return $this->all();
    } 
    public function getItem($id)
    {
        return DB::table('cat')->where('cat_id','=',$id)->first();
    }
   public function edit($id,$nameCat,$parent_id)
    {
        return DB::table('cat')->where('cat_id','=',$id)->update(['nameCat'=>$nameCat,'parent_id'=>$parent_id]);
    }
    public function add($nameCat,$parent_id)
    {
        return DB::table('cat')->insert(['nameCat'=>$nameCat,'parent_id'=>$parent_id]);
    }
   public function del($id)
    {
        return DB::table('cat')->where('cat_id','=',$id)->delete();
    }
    public function search($nameSearch)
    {
        return DB::table('cat')->where('nameCat','LIKE',"%$nameSearch%")->take(9)->paginate(2);
    }
    public function countAs()
    {
        return DB::table('cat')->count();
    }
    public function cat1()
    {
        return DB::table('cat')->where('parent_id','=',0)->get();
    }
    public function cat2()
    {
        return DB::table('cat')->where('parent_id','!=',0)->get();
    }
    public function delParent($idCat)
    {
        return DB::table('cat')->where('parent_id',$idCat)->delete();
    }
}
