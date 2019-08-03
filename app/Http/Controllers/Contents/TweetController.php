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
     * [ 自動ツイート ]
     * 1. index       : 予約情報
     * 2. reservation : 登録 / 更新
     * 3. execute     : 実行
     */
    public function index($id)
    {
        /*
         * 1. index : 予約情報
         */
        $user = Auth::user();
        $account = DB::table('account')->where('user_id', $user->id)->get()[$id-1]; // user_idを使ってアカウント一覧を取得し、配列からid-1番目のものを取得(id番目だと削除した時に順序が異なるため)

        // firstOrNew() : 予約情報を取得できなければ作成する
        $tweet = TweetBooking::firstOrNew(
            ['user_id' => $user->id, 'account_id' => $id, 'status' => 0]
        );
        
        return view('tweet.index', compact('id', 'account', 'tweet'));
    }
    public function reservation($id, Request $request)
    {
        /*
         * 2. reservation : 登録 / 更新
         */
        $user = Auth::user();
        
        // バリデーション
        $request->validate([
            'tweet' => 'required|string|max:140',
            'release' => 'required|string|max:140|date_format:Y-m-d H:i:s',
        ]);
        
        // updateOrCreate() : 予約情報に一致するモデルがなければ作成する
        TweetBooking::updateOrCreate(
            ['user_id' => $user->id, 'account_id' => $id, 'status' => 0],
            ['tweet' => $request->tweet, 'release' => $request->release]
        );

        session()->flash('status', '予約情報を更新しました。');
        
        return redirect()->route('tweet.index', $id);
    }
    public function execute()
    {
        /*
         * 3. execute : 実行
         */
        return view('tweet.execute');
    }
}
