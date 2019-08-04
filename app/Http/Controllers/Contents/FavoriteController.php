<?php

namespace App\Http\Controllers\Contents;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\FavoriteKeyword;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
     * 自動いいね設定ページ
     */
    public function index($id)
    {
        $user = Auth::user();
        $account = DB::table('account')->find($id);

        return view('favorite.index', compact('id', 'account'));
    }

    /*
     * 自動いいねのスタート
     */
    public function start()
    {
        return view('favorite.start');
    }
    /*
     * 自動いいねするツイートのソート
     */
    public function sort()
    {
        return view('favorite.sort');
    }
    /*
     * 自動いいねの実行
     */
    public function execute()
    {
        return view('favorite.execute');
    }

    /*
     * 自動いいねのキーワード一覧ページ
     */
    public function keywords()
    {
        $user = Auth::user();
        $favoriteKeywords = DB::table('favorite_keyword')->where('user_id', $user->id)->get();

        return view('favorite.keywords', compact('id', 'user', 'favoriteKeywords'));
    }
    /*
     * 自動いいねのキーワードの登録処理
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'keyword' => 'required|unique:favorite_keyword,keyword,NULL,id,user_id,'.$user->id.'|string|max:255',
        ]);

        $FavoriteKeyword = new FavoriteKeyword;
        $FavoriteKeyword->user_id = auth()->id();
        $FavoriteKeyword->timestamps = false;
        $FavoriteKeyword->fill($request->all())->save();

        return redirect()->route('favorite.keywords');
    }
    /*
     * 自動いいねのキーワードの削除処理
     */
    public function keywordDelete($id)
    {
        FavoriteKeyword::destroy($id);

        return redirect()->route('favorite.keywords');
    }
}
