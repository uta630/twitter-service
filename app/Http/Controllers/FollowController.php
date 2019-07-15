<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index()
    {
        // フォロー情報の表示
        return view('follow.index');
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
    public function keywords()
    {
        // フォロー用キーワード一覧
        return view('follow.keywords');
    }
    public function keywordsRegister()
    {
        // フォロー用キーワード登録
        return view('follow.keywordsRegister');
    }
}
