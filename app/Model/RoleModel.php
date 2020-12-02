<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class RoleModel extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'rolr_id';
    public $timestamps = false;

    public function getItems()
    {
    	//return $this->all();//SELECT * FROM users
    	//return $this->orderBy('id','DESC')->paginate(2);//2 ban ghi tren 1 trang,
    	return $this->all();
    }  
    
}
