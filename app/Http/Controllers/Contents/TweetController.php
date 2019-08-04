<?php

namespace App\Http\Controllers\Contents;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\TweetBooking;

class TweetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /*
     * 自動ツイート設定ページ
     */
    public function index($id)
    {
        $user = Auth::user();
        $account = DB::table('account')->find($id);

        // firstOrNew() : 予約情報を取得できなければ作成する
        $tweet = TweetBooking::firstOrNew(
            ['user_id' => $user->id, 'account_id' => $account->account_id, 'status' => 0]
        );
        
        return view('tweet.index', compact('id', 'account', 'tweet'));
    }
    /*
     * 自動ツイートの予約処理
     */
    public function reservation($id, Request $request)
    {
        $user = Auth::user();
        $account = DB::table('account')->find($id);
        
        $request->validate([
            'tweet' => 'required|string|max:140',
            'release' => 'required|string|date_format:Y-m-d H:i:s',
        ]);
        
        // updateOrCreate() : 予約情報に一致するモデルがなければ作成する
        TweetBooking::updateOrCreate(
            ['user_id' => $user->id, 'account_id' => $account->account_id, 'status' => 0],
            ['tweet' => $request->tweet, 'release' => $request->release]
        );

        session()->flash('status', '予約情報を更新しました。');
        
        return redirect()->route('tweet.index', $id);
    }
    /*
     * 自動ツイートを予約内容で実行
     */
    public function execute()
    {
        return view('tweet.execute');
    }
}
