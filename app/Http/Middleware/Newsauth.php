<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Model\UserModel;
use App\Model\NewsModel;
use Request;
use Closure;

class Newsauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function __construct(NewsModel $newsModel)
    {
        $this->newsModel = $newsModel;
    }
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $idUser = $user->id;
        $role = $user->role;
        $news_id = $request->id;
        $itemNews = $this->newsModel->getItem($news_id);
        $user_id = $itemNews->user_id;
        if($idUser!=$user_id&& $role !=1){
            return redirect()->route('admin.news.index')->with('msg','Ban khong co quyen them/xoa bai viet');
        }
        return $next($request);
    }
}
