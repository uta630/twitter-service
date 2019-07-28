<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Account;

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

        // 存在チェック
        $verify = DB::table('account')->where('user_id', $user->id)->exists();

        // サイドバー : アカウント一覧
        $accountList = DB::table('account')->where('user_id', $user->id)->get();

        // サービスで使用するアカウントの一覧
        return !$verify ? redirect()->route('account.register') : view('account.index', compact('accountList', 'verify'));
    }
    public function register()
    {
        return view('account.register');
    }
    public function create(Request $request)
    {
        // バリデーション
        $request->validate([
            'account_id'   => 'required|string|max:255',
            'account_name' => 'required|string|max:255',
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

        // サイドバー : アカウント一覧
        $accountList = DB::table('account')->where('user_id', $user->id)->get();

        // プライマリー : 表示するアカウント
        $account = DB::table('account')->where('user_id', $user->id)->get()[$id-1];

        return $account ? view('account.user', compact('id', 'user', 'accountList', 'account')) : redirect('account') ;
    }
}
