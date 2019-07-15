<?php

namespace App\Http\Controllers\Contents;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TweetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /*
     * [ 自動ツイート ]
     * 1. tweetReservationEdit : 自動ツイートの編集
     * 2. tweetExecute         : 自動ツイートの実行
     */
    public function index()
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
