<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class RateModel extends Model
{
    protected $table = 'rate';
    protected $primaryKey = 'rate_id';
    public $timestamps = false;
    protected $guarded = [];

    public function avge($news_id)
    {
        return DB::table('rate')->where('news_id',$news_id)->avg('rate');
    }
    public function countAs($news_id)
    {
        return DB::table('rate')->where('news_id',$news_id)->count();
    }
    public function addRate($user_id,$news_id,$rate)
    {
        return DB::table('rate')->insert(['user_id'=>$user_id,'news_id'=>$news_id,'rate'=>$rate]);
    }
    public function updateRate($user_id,$news_id,$rate)
    {
        return DB::table('rate')->where('news_id','=',$news_id)->where('user_id','=',$user_id)->update(['rate'=>$rate]);
    }
    public function find($user_id,$news_id)
    {
        return DB::table('rate')->where('user_id',$user_id)->where('news_id',$news_id)->count();
    }
}
