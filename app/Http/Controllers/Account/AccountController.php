<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Account;
use App\TweetBooking;

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
        // ユーザー情報
        $user = Auth::user();

        // サイドバー : アカウント一覧
        $accountList = Account::all()->where('user_id', $user->id);

        // サービスで使用するアカウントの一覧
        return $accountList->isEmpty() ? redirect()->route('account.register') : view('account.index', compact('accountList'));
    }
    public function register()
    {
        return view('account.register');
    }
    public function create(Request $request)
    {
        // バリデーション : account_idをユニークチェック
        //  -> 他のアカウントで実行されても困るので、account_id自体をユニークにする
        //  -> エラーメッセージで仕様を書いて不具合を回避する
        $request->validate([
            'account_id' => 'required|unique:account|string|max:255',
        ]);

        // 保存
        $account = new Account;
        $account->user_id = auth()->id();
        $account->fill($request->all())->save();

        //リダイレクト
        return redirect()->route('account.index');
    }
    public function user($id)
    {
        // ユーザー情報
        $user = Auth::user();

        Account::all()->find($id);

        // プライマリー : 表示するアカウント
        $account = DB::table('account')->find($id);
        $tweet = TweetBooking::firstOrNew(
            ['user_id' => $user->id, 'account_id' => $id, 'status' => 0]
        );

        // サイドバー : アカウント一覧
        $accountList = Account::all()->where('user_id', $user->id);

        return $account ? view('account.user', compact('id', 'user', 'account', 'tweet', 'accountList')) : redirect('account') ;
    }
    public function accountDelete($id)
    {
        // アカウント削除
        Account::find($id)->delete();

        return redirect()->route('account.index');
    }
}
