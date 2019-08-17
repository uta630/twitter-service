<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;

class TwitterController extends Controller
{

    // ログイン
    public function redirectToProvider(){
        return Socialite::driver('twitter')->redirect();
    }

    // コールバック
    public function handleProviderCallback(){
        try {
            $twitterUser = Socialite::driver('twitter')->user();
        } catch (\Exception $e) {
            return redirect('/account');
        }
        // 各自ログイン処理
        // 例
        // $user = User::where('auth_id', $twitterUser->id)->first();
        // if (!$user) {
        //     $user = User::create([
        //         'auth_id' => $twitterUser->id
        //   ]);
        // }
        // Auth::login($user);
        return redirect('/account');
    }

    // ログアウト
    public function logout(Request $request)
    {
        // 各自ログアウト処理
        // 例
        // Auth::logout();
        return redirect('/');
    }
}