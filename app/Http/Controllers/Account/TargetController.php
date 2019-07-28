<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TargetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /*
     * ターゲットとなるアカウント
     */
    public function index($id)
    {
        // ユーザー情報
        $user = Auth::user();

        // ターゲット一覧
        $target = DB::table('follow_target')->where('user_id', $user->id)->get();

        return view('target.index', compact('id', 'user', 'target'));
    }
    public function register()
    {
        // ターゲット登録
        return view('target.register');
    }
}
