<?php

namespace App\Http\Controllers\Contents;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function index($id)
    {
        $user = Auth::user();
        $account = DB::table('account')->where('user_id', $user->id)->get()[$id-1];

        // ツイート履歴(予約を含む)
        return view('tweet.index', compact('id', 'account'));
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
