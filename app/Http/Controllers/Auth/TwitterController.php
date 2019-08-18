<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Account;
use Socialite;

class TwitterController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $twitterUser = Socialite::driver('twitter')->user();
        } catch (\Exception $e) {
            return redirect()->route('account.register');
        }

        // TODO : twitter id の重複チェック
        // $request->validate([
        //     'twitter_id' => 'required|unique:account|string|max:255', // ユニークのエラー文言は「登録済みのアカウントです」で記載
        // ]);

        $account = new Account;
        $account->user_id = Auth::user()->id;
        $account->twitter_id = $twitterUser->getNickname();
        $account->save();

        return redirect()->route('account.index');
    }

    public function logout()
    {
        // Auth::logout();
        return redirect()->route('account.index');
    }
}