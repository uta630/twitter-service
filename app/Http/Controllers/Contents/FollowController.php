<?php

namespace App\Http\Controllers\Contents;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\FollowKeyword;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /*
     * 自動フォロー設定ページ
     */
    public function index($id)
    {
        $user = Auth::user();
        $account = DB::table('account')->find($id);

        return view('follow.index', compact('id', 'account'));
    }

    /*
     * 自動フォローのスタート
     */
    public function start()
    {
        return view('follow.start');
    }
    /*
     * 自動フォローのターゲットリストを生成
     */
    public function pick()
    {
        return view('follow.pick');
    }
    /*
     * 自動フォローするフォロワーをターゲットリストからソート
     */
    public function sort()
    {
        return view('follow.sort');
    }
    /*
     * 自動フォローの実行
     */
    public function execute()
    {
        return view('follow.execute');
    }

    /*
     * 自動フォローのキーワード一覧ページ
     */
    public function keywords()
    {
        $user = Auth::user();
        $followKeywords = DB::table('follow_keyword')->where('user_id', $user->id)->get();

        return view('follow.keywords', compact('id', 'user', 'followKeywords'));
    }
    /*
     * 自動フォローのキーワードの登録処理
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'keyword' => 'required|unique:follow_keyword,keyword,NULL,id,user_id,'.$user->id.'|string|max:255',
        ]);

        $followKeyword = new FollowKeyword;
        $followKeyword->user_id = auth()->id();
        $followKeyword->timestamps = false;
        $followKeyword->fill($request->all())->save();

        return redirect()->route('follow.keywords');
    }
    /*
     * 自動フォローのキーワードの削除処理
     */
    public function keywordDelete($id)
    {
        FollowKeyword::destroy($id);

        return redirect()->route('follow.keywords');
    }
}
