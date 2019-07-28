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
        // ターゲット登録

        // 1. inputに入力されているかチェック
        // 2. 入力されていなければ同ページでエラーを表示
        // 3. 入力されていればバリデーション(項目/重複)
        // 4. バリデーション通過すれば登録してアカウント一覧ページに遷移

        return view('target.register');
    }
    public function create(Request $request)
    {
        // バリデーション
        $request->validate([
            'target_id' => 'required|string|max:255',
        ]);

        // 保存
        $followTarget = new FollowTarget;
        $followTarget->user_id = auth()->id();
        $followTarget->timestamps = false;
        $followTarget->fill($request->all())->save();

        //リダイレクト
        return redirect()->route('target.index');
    }
}
