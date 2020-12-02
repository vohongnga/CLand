<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class ContactModel extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'contact_id';
    public $timestamps = false;

    public function getItems()
    {
    	//return $this->all();//SELECT * FROM users
    	//return $this->orderBy('id','DESC')->paginate(2);//2 ban ghi tren 1 trang,
    	return DB::table('contact')->orderBy('contact_id','DESC')->paginate(2);
    }  
    public function getItemsPublic()
    {
        return $this->all();
    } 
    public function add($name,$email,$phone,$content)
    {
        return DB::table('contact')->insert(['name'=>$name,'email'=>$email,'phone'=>$phone,'content'=>$content]);
    }
}
