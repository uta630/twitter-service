<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TargetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /*
     * ターゲットとなるアカウント
     */
    public function index()
    {
        // ターゲット一覧
        return view('target.index');
    }
    public function register()
    {
        // ターゲット登録
        return view('target.register');
    }
}
