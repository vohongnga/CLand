<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Model\UserModel;
use Request;
use Closure;

class Clandauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $role = $user->role;
        $add = "add";
        $edit = "edit";
        $del = "del";
        $uri = Request::fullUrl();
        $check1 = strpos($uri,$add);
        $check2 = strpos($uri,$edit);
        $check3 = strpos($uri,$del);
        if(!$check1){
        $id = $request->id;
        $itemUser = $this->userModel->getItem($id);
        $roleUser = $itemUser->role;
    }
        if($role!=1){
            if($check1){
            //in ra thong bao k co quyen
                return redirect()->route('admin.user.index')->with('msg','Ban khong co quyen them user');
            }
            if($check2){
                if($role ==3 || $roleUser ==1){
                    return redirect()->route('admin.user.index')->with('msg','Ban khong co quyen sua user');
                }
            }
            if($check3){
                if($role ==3 || $roleUser ==1){
                    return redirect()->route('admin.user.index')->with('msg','Ban khong co quyen xoa user');
                }
            }
        }
        
        return $next($request);
    }
}
