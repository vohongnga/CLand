<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UserModel;
use App\Model\RoleModel;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
class AdminUserController extends Controller
{
	public function __construct(UserModel $userModel,RoleModel $roleModel)
	{
		$this->userModel = $userModel;
		$this->roleModel = $roleModel;
	}
    public function index()
    {
        $itemsUser = $this->userModel->getItems();
        $user = Auth::user();
        $role = $user->role;
        return view('admin.user.index',compact('itemsUser','role'));
    }
    public function getEdit($id)
    {
    	$itemUser = $this->userModel->getItem($id);
    	$itemsRole = $this->roleModel->getItems();
    	return view('admin.user.edit',compact('itemUser','itemsRole'));
    }
    public function postedit(Request $request,$id)
    {
    	$fullname = $request->fullname;
    	$password = $request->password;
    	$role = $request->role;
    	$result = $this->userModel->editUser($id,$fullname,$password,$role);
    	if($result)
    		return redirect()->route('admin.user.index')->with('msg','Sửa thành công');
    	else
    		return redirect()->route('admin.user.edit')->with('msg','Đã có lỗi xảy ra');	
    }
    public function getAdd()
    {
    	$itemsRole = $this->roleModel->getItems();
    	return view('admin.user.add',compact('itemsRole'));
    }
    public function postAdd(UserRequest $request)
    {
    	$username = $request->username;
    	$fullname = $request->fullname;
    	$password = $request->password;
    	$role = $request->role;
    	$resultFind = $this->userModel->findUser($username);
    	if($resultFind)
    		return redirect()->route('admin.user.add')->with('msg','Username này đã tồn tại');
    	else{
    		$result =$this->userModel->addUser($username,$fullname,$password,$role);
    		if($result)
    			return redirect()->route('admin.user.index')->with('msg','Thêm thành công');
    		else
    			return redirect()->route('admin.user.index')->with('msg','Đã có lỗi xảy ra');
    	}
    	
    }
    public function del($id)
    {
    	$result = $this->userModel->delUser($id);
    	if($result)
    		return redirect()->route('admin.user.index')->with('msg','Xóa thành công');
    	else
    		return redirect()->route('admin.user.index')->with('msg','Đã có lỗi xảy ra');
    }
    public function postSearch(Request $request)
    {
        $nameSearch = $request->nameSearch;
        $itemsSearch = $this->userModel->search($nameSearch);
        return view('admin.user.search',compact('itemsSearch'));
    }
}