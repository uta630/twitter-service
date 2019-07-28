<?php

namespace App\Http\Controllers\Contents;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /*
     * [ 自動フォロー ]
     * -  followStart   : 実行
     * 1. followerPick  : ターゲットリストからアカウントをピックアップ
     * 2. followerPick  : ピックアップしたアカウントのフォロワーを全取得
     * 3. followerSort  : フォロワーを精査してリスト化
     * 4. followExecute : 生成したリストを順にフォロー
     * 5. 1に戻る
     */
    public function index($id)
    {
        $user = Auth::user();
        $account = DB::table('account')->where('user_id', $user->id)->get()[$id-1];

        // フォロー情報の表示
        return view('follow.index', compact('id', 'account'));
    }
    public function start()
    {
        // - 自動フォローの実行
        return view('follow.start');
    }
    public function pick()
    {
        // 1. 2. アカウントのピックしてフォロワー取得
        return view('follow.pick');
    }
    public function sort()
    {
        // 3. 取得したフォロワーを精査
        return view('follow.sort');
    }
    public function execute()
    {
        // 4. 5. 自動フォローの実行
        return view('follow.execute');
    }
    public function keywords($id)
    {
        // ユーザー情報
        $user = Auth::user();

        // フォロー用キーワード一覧
        $followKeywords = DB::table('follow_keyword')->where('user_id', $user->id)->get();

        return view('follow.keywords', compact('id', 'user', 'followKeywords'));
    }
    public function keywordsRegister()
    {
        // フォロー用キーワード登録
        return redirect('follow.keywords');
    }
}
