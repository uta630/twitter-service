<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\FollowTarget;

class TargetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /*
     * ターゲットとなるアカウント
     */
    public function index()
    {
        // ユーザー情報
        $user = Auth::user();

        // ターゲット一覧
        $target = DB::table('follow_target')->where('user_id', $user->id)->get();

        return view('target.index', compact('user', 'target'));
    }
    public function register()
    {
        return view('target.register');
    }
    public function create(Request $request)
    {
        // バリデーション
        $request->validate([
            'target_id' => 'required|unique:follow_target|string|max:255',
        ]);

        // 保存
        $followTarget = new FollowTarget;
        $followTarget->user_id = auth()->id();
        $followTarget->timestamps = false;
        $followTarget->fill($request->all())->save();

        //リダイレクト
        return redirect()->route('target.index');
    }
    public function delete($id)
    {
        // target_idと同じ名前をdelete
        FollowTarget::destroy($id);

        return redirect()->route('target.index');
    }
}
