<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getItems()
    {
        //return $this->all();//SELECT * FROM users
        //return $this->orderBy('id','DESC')->paginate(2);//2 ban ghi tren 1 trang,
        return DB::table('users')->orderBy('id','DESC')->paginate(3);
    } 
    public function getItem($id)
    {
        //return DB::table('users')->where('id',$id)->first();
        return $this->find($id);
    } 
    public function editUser($id,$fullname,$password,$role)
    {
        if($password=='')
            return DB::table('users')->where('id','=',$id)->update(['fullname'=>$fullname,'role'=>$role]);
        else
            return DB::table('users')->where('id','=',$id)->update(['fullname'=>$fullname,'password'=>bcrypt($password),'role'=>$role]);
    }
    public function delUser($id)
    {
        return DB::table('users')->where('id','=',$id)->delete();
    }
    public function addUser($username,$fullname,$password,$role)
    {
        //return $fullname;
        return DB::table('users')->insert(['username'=>$username,'fullname'=>$fullname,'password'=>bcrypt($password),'role'=>$role]);
    }
    public function search($nameSearch)
    {
        return DB::table('users')->where('username','LIKE',"%$nameSearch%")->take(9)->paginate(3);
    }
    public function countAs()
    {
        return DB::table('users')->count();
    }
    
}
