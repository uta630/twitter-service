<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
