<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index()
    {
        // いいね情報
        return view('favorite.index');
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
        // いいね用キーワード一覧
        return view('favorite.keywords');
    }
    public function keywordsRegister()
    {
        // いいね用キーワード登録
        return view('favorite.keywordsRegister');
    }
}
