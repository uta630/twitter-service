<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /*
     * マイページ
     */
    public function index()
    {
        // サービスで使用するアカウントの一覧
        return view('account.index');
    }
    
    /*
     * 使用するアカウントの登録
     */
    public function register()
    {
        // サービスで使用するアカウントの登録ページ
        return view('account.register');
    }
    
    /*
     * 使用するアカウントのマイページ
     */
    public function user()
    {
        return view('account.user');
    }
    
    /*
     * 自動フォロー
     */
    public function follow()
    {
        // フォロー情報
        return view('account.follow');
    }
    public function followKeyword()
    {
        // フォローのキーワード設定
        return view('account.followKeyword');
    }
    public function followSearch()
    {
        // キーワードとかを使ってフォローする人を検索
        return view('account.followSearch');
    }
    public function followExecute()
    {
        // 自動フォローの実行
        return view('account.followExecute');
    }
    public function unFollow()
    {
        // アンフォロー
        return view('account.unFollow');
    }
    
    /*
     * 自動いいね
     */
    public function favorite()
    {
        // いいね情報
        return view('account.favorite');
    }
    public function favoriteExecute()
    {
        // 自動いいねの実行
        return view('account.favoriteExecute');
    }
    public function favoriteKeyword()
    {
        // いいねのキーワード設定
        return view('account.favoriteKeyword');
    }
    
    /*
     * 自動ツイート
     */
    public function tweet()
    {
        // ツイート履歴(予約を含む)
        return view('account.tweet');
    }
    public function tweetReservation()
    {
        // ツイート予約
        return view('account.tweetReservation');
    }
    public function tweetReservationEdit()
    {
        // ツイート予約の編集
        return view('account.tweetReservationEdit');
    }
}
