<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class ComModel extends Model
{
    protected $table = 'comm';
    protected $primaryKey = 'com_id';
    public $timestamps = false;
    protected $guarded = [];

    public function cmts($news_id){
        return DB::table('comm')->join('users', 'comm.user_id', 'users.id')
        ->where('news_id',$news_id)->get();
    }
    public function getItems()
    {
    	return $this->all();
    }  
    public function add($user_id, $news_id,$content)
    {
    	return DB::table('comm')->insert(['user_id'=>$user_id,'news_id'=>$news_id,'content'=>$content]);
    }
    public function countAs($news_id)
    {
        return DB::table('comm')->where('news_id',$news_id)->count();
    }
}
