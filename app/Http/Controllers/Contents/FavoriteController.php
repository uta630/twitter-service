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
     * [ 自動いいね ]
     * -  favoriteStart  : 実行
     * 1. favoriteerSort : フォロワーを精査してリスト化
     * 2. followExecute  : 生成したリストを順にフォロー
     */
    public function index($id)
    {
        $user = Auth::user();
        $account = DB::table('account')->where('user_id', $user->id)->get()[$id-1];

        // いいね情報
        return view('favorite.index', compact('id', 'account'));
    }
    public function start()
    {
        // - 自動いいねの実行
        return view('favorite.start');
    }
    public function sort()
    {
        // 1. いいねの精査
        return view('favorite.sort');
    }
    public function execute()
    {
        // 2. 自動いいねの実行
        return view('favorite.execute');
    }
    public function keywords()
    {
        // ユーザー情報
        $user = Auth::user();

        // いいね用キーワード一覧
        $favoriteKeywords = DB::table('favorite_keyword')->where('user_id', $user->id)->get();

        return view('favorite.keywords', compact('id', 'user', 'favoriteKeywords'));
    }
    public function keywordsRegister()
    {
        // いいね用キーワード登録

        // 1. inputに入力されているかチェック
        // 2. 入力されていなければ同ページでエラーを表示
        // 3. 入力されていればバリデーション(項目/重複)
        // 4. バリデーション通過すれば登録してアカウント一覧ページに遷移

        return view('favorite.keywords');
    }
    public function create(Request $request)
    {
        // バリデーション
        $request->validate([
            'keyword' => 'required|unique:favorite_keyword|string|max:255',
        ]);

        // 保存
        $FavoriteKeyword = new FavoriteKeyword;
        $FavoriteKeyword->user_id = auth()->id();
        $FavoriteKeyword->timestamps = false;
        $FavoriteKeyword->fill($request->all())->save();

        //リダイレクト
        return redirect()->route('favorite.keywords');
    }
    public function keywordDelete($id)
    {
        // $idをdelete
        FavoriteKeyword::destroy($id);

        return redirect()->route('favorite.keywords');
    }
}
