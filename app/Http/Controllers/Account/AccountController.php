<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function user($id)
    {
        // ユーザー情報
        $user = Auth::user();

        // サイドバー : アカウント一覧
        $accountList = DB::table('account')->where('user_id', $user->id)->get();

        // プライマリー : 表示するアカウント
        $account = DB::table('account')->where([['user_id', $user->id], ['id', $id]])->first();

        return $account ? view('account.user', compact('user', 'accountList', 'account')) : redirect('account') ;
    }
}
