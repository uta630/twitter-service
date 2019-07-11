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
     * アカウント系ページ
     */
    public function index()
    {
        // サービスで使用するアカウントの一覧
        return view('account.index');
    }
    public function register()
    {
        // サービスで使用するアカウントの登録ページ
        return view('account.register');
    }
    public function user()
    {
        return view('account.user');
    }
    
    /*
     * ターゲットとなるアカウント
     */
    public function target()
    {
        // ターゲット一覧
        return view('target.index');
    }
    public function targetRegister()
    {
        // ターゲット登録
        return view('target.register');
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
    public function follow()
    {
        // フォロー情報の表示
        return view('follow.index');
    }
    public function followStart()
    {
        // - 自動フォローの実行
        return view('follow.start');
    }
    public function followerPick()
    {
        // 1. 2. アカウントのピックしてフォロワー取得
        return view('follow.pick');
    }
    public function followerSort()
    {
        // 3. 取得したフォロワーを精査
        return view('follow.sort');
    }
    public function followExecute()
    {
        // 4. 5. 自動フォローの実行
        return view('follow.execute');
    }
    public function followKeywords()
    {
        // フォロー用キーワード一覧
        return view('follow.keywords');
    }
    public function followKeywordsRegister()
    {
        // フォロー用キーワード登録
        return view('follow.keywordsRegister');
    }
    
    /*
     * [ 自動いいね ]
     * -  favoriteStart  : 実行
     * 1. favoriteerSort : フォロワーを精査してリスト化
     * 2. followExecute  : 生成したリストを順にフォロー
     */
    public function favorite()
    {
        // いいね情報
        return view('favorite.index');
    }
    public function favoriteStart()
    {
        // - 自動いいねの実行
        return view('favorite.start');
    }
    public function favoriteerSort()
    {
        // 1. いいねの精査
        return view('favorite.sort');
    }
    public function favoriteExecute()
    {
        // 2. 自動いいねの実行
        return view('favorite.execute');
    }
    public function favoriteKeyword()
    {
        // いいね用キーワード一覧
        return view('favorite.keyword');
    }
    public function favoriteKeywordsRegister()
    {
        // いいね用キーワード登録
        return view('favorite.keywordsRegister');
    }
    
    /*
     * [ 自動ツイート ]
     * 1. tweetReservationEdit : 自動ツイートの編集
     * 2. tweetExecute         : 自動ツイートの実行
     */
    public function tweet()
    {
        // ツイート履歴(予約を含む)
        return view('tweet.index');
    }
    public function tweetReservation()
    {
        // ツイート予約の詳細
        return view('tweet.reservation');
    }
    public function tweetReservationEdit()
    {
        // 1. ツイート予約の編集
        return view('tweet.reservationEdit');
    }
    public function tweetExecute()
    {
        // 2. ツイート予約の実行
        return view('tweet.execute');
    }
}
