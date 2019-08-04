<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\FollowTarget;

class TargetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /*
     * ターゲットとなるTwitterアカウント一覧ページ
     */
    public function index()
    {
        $user = Auth::user();
        $target = DB::table('follow_target')->where('user_id', $user->id)->get();

        return view('target.index', compact('user', 'target'));
    }

    /*
     * ターゲットとなるTwitterアカウントの登録処理
     */
    public function register()
    {
        return view('target.register');
    }
    public function create(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'target_id' => 'required|unique:follow_target,target_id,NULL,id,user_id,'.$user->id.'|string|max:255',
        ]);

        $followTarget = new FollowTarget;
        $followTarget->user_id = auth()->id();
        $followTarget->timestamps = false;
        $followTarget->fill($request->all())->save();

        return redirect()->route('target.index');
    }
    /*
     * ターゲットとなるTwitterアカウントの削除処理
     */
    public function delete($id)
    {
        FollowTarget::destroy($id);

        return redirect()->route('target.index');
    }
}
