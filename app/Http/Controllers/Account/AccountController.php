<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Account;
use App\TweetBooking;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /*
     * Twitterアカウント一覧ページ
     */
    public function index()
    {
        $user = Auth::user();
        $accountList = Account::all()->where('user_id', $user->id);

        return $accountList->isEmpty() ? redirect()->route('account.register') : view('account.index', compact('accountList', 'user'));
    }
    /*
     * Twitterアカウントの登録ページ
     */
    public function register()
    {
        return view('account.register');
    }
    /*
     * Twitterアカウントの登録処理
     */
    public function create(Request $request)
    {
        $request->validate([
            'twitter_id' => 'required|unique:account|string|max:255', // ユニークのエラー文言は「他のユーザーが利用中です」で記載
        ]);

        $account = new Account;
        $account->user_id = auth()->id();
        $account->fill($request->all())->save();

        return redirect()->route('account.index');
    }
    /*
     * Twitterアカウントの個別ページ
     */
    public function user($id)
    {
        $user = Auth::user();

        Account::all()->find($id);

        // プライマリーエリア : 表示するアカウント
        $account = DB::table('account')->find($id);
        $tweet = TweetBooking::firstOrNew(
            ['user_id' => $user->id, 'twitter_id' => $id, 'status' => 0]
        );

        // サイドバーエリア : アカウント一覧
        $accountList = Account::all()->where('user_id', $user->id);

        return $account ? view('account.user', compact('id', 'user', 'account', 'tweet', 'accountList')) : redirect('account') ;
    }
    /*
     * Twitterアカウントの削除(物理削除)
     */
    public function accountDelete($id)
    {
        Account::find($id)->delete();

        return redirect()->route('account.index');
    }
    /*
     * ユーザー退会処理(ユーザーの論理削除)
     */
    public function unsubscribe()
    {
        User::find(Auth::user()->id)->delete();

        return redirect()->route('account.index');
    }
}
