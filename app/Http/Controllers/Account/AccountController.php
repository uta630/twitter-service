<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
