<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Account;

class TwitterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->api_key      = "ZCxYDJw7FcIJCMv29xS6neUDz";	// API Key
        $this->api_secret   = "ayLNWUREhXB1iA4luiGbxnM3EQZG81orcAOnpWvZqhwoyGQSSl";	// API Secret
        $this->callback_url = "http://127.0.0.1:8000/auth/twitter/callback";	// Callback URL (このプログラムのURLアドレス)
    }

    /*
     * リクエストトークンを取得して認証画面に遷移
     */
    public function redirectLinkPage()
    {
        /*** [手順1] リクエストトークンの取得 ***/
        $query = $this->getRequestToken();

        /*** [手順2] ユーザーを認証画面へ飛ばす ***/
        // ユーザーを認証画面へ飛ばす (毎回ボタンを押す場合)
        header( "Location: https://api.twitter.com/oauth/authorize?oauth_token=" . $query["oauth_token"] );
        // ユーザーを認証画面へ飛ばす (二回目以降は認証画面をスキップする場合)
        // header( "Location: https://api.twitter.com/oauth/authenticate?oauth_token=" . $query["oauth_token"] );
        exit;
    }

    /*
     * リクエストトークンを取得
     */
    public function getRequestToken()
    {
        $api_key      = $this->api_key;
        $api_secret   = $this->api_secret;
        $callback_url = $this->callback_url;

        // [アクセストークンシークレット] (まだ存在しないので「なし」)
        $access_token_secret = "";

        // エンドポイントURL
        $request_url = "https://api.twitter.com/oauth/request_token";

        // リクエストメソッド
        $request_method = "POST";

        // キーを作成する (URLエンコードする)
        $signature_key = rawurlencode( $api_secret ) . "&" . rawurlencode( $access_token_secret );

        // パラメータ([oauth_signature]を除く)を連想配列で指定
        $params = array(
            "oauth_callback" => $callback_url,
            "oauth_consumer_key" => $api_key,
            "oauth_signature_method" => "HMAC-SHA1",
            "oauth_timestamp" => time(),
            "oauth_nonce" => microtime(),
            "oauth_version" => "1.0",
        );

        // 各パラメータをURLエンコードする
        foreach( $params as $key => $value ){
            // コールバックURLはエンコードしない
            if( $key === "oauth_callback" ) continue ;

            // URLエンコード処理
            $params[ $key ] = rawurlencode( $value );
        }

        // リクエスト用のコンテキストを作成する
        $context = $this->createRequestContext($params, $request_method, $request_url, $signature_key);

        // cURLを使ってリクエスト
        $curl = $this->curlRequest($request_url,$context);
        $res1 = curl_exec( $curl );
        $res2 = curl_getinfo( $curl );
        curl_close( $curl );

        // 取得したデータ
        $response = substr( $res1, $res2["header_size"] );	// 取得したデータ(JSONなど)
        $header = substr( $res1, 0, $res2["header_size"] );	// レスポンスヘッダー (検証に利用したい場合にどうぞ)

        // リクエストトークンを取得できなかった場合
        if( !$response ){
            echo "<p>リクエストトークンを取得できませんでした…。$api_keyと$callback_url、そしてTwitterのアプリケーションに設定しているCallback URLを確認して下さい。</p>";
            exit;
        }

        // $responseの内容(文字列)を$query(配列)に直す
        $query = [];
        parse_str( $response, $query );

        // セッション[$_SESSION["oauth_token_secret"]]に[oauth_token_secret]を保存する
        session_start();
        session_regenerate_id( true );
        $_SESSION["oauth_token_secret"] = $query["oauth_token_secret"];

        return $query;
    }

    /*
     * 認証画面からユーザーが戻ってきた後の処理
     */
    public function handleCallback()
    {
        /*** [手順4] ユーザーが戻ってくる ***/
        if ( isset( $_GET['oauth_token'] ) || isset($_GET["oauth_verifier"]) ){
            // 許可
            $this->handleAllowCallback();
        } elseif ( isset( $_GET["denied"] ) ){
            // キャンセル
            $this->handleCancelCallback();
        } else {
            // その他
            return redirect()->route('account.register');
        }
    }

    /* 
     * 認証を許可したコールバック処理
     */
    public function handleAllowCallback()
    {
        // 認証画面から戻ってきた時 (認証OK)
        $api_key      = $this->api_key;
        $api_secret   = $this->api_secret;
        $callback_url = $this->callback_url;

        /*** [手順5] アクセストークンを取得する ***/

        // [リクエストトークン・シークレット]をセッションから呼び出す
        session_start();
        $request_token_secret = $_SESSION["oauth_token_secret"];

        // リクエストURL
        $request_url = "https://api.twitter.com/oauth/access_token";

        // リクエストメソッド
        $request_method = "POST";

        // キーを作成する
        $signature_key = rawurlencode( $api_secret ) . "&" . rawurlencode( $request_token_secret );

        // パラメータ([oauth_signature]を除く)を連想配列で指定
        $params = array(
            "oauth_consumer_key" => $api_key,
            "oauth_token" => $_GET["oauth_token"],
            "oauth_signature_method" => "HMAC-SHA1",
            "oauth_timestamp" => time(),
            "oauth_verifier" => $_GET["oauth_verifier"],
            "oauth_nonce" => microtime(),
            "oauth_version" => "1.0",
        );

        // 配列の各パラメータの値をURLエンコード
        foreach( $params as $key => $value ){
            $params[ $key ] = rawurlencode( $value );
        }

        // リクエスト用のコンテキストを作成する
        $context = $this->createRequestContext($params, $request_method, $request_url, $signature_key);

        // cURLを使ってリクエスト
        $curl = $this->curlRequest($request_url,$context);
        $res1 = curl_exec( $curl );
        $res2 = curl_getinfo( $curl );
        curl_close( $curl );

        // 取得したデータ
        $response = substr( $res1, $res2["header_size"] );	// 取得したデータ(JSONなど)
        $header = substr( $res1, 0, $res2["header_size"] ); // レスポンスヘッダー (検証に利用したい場合にどうぞ)

        // $responseの内容(文字列)を$query(配列)に直す
        $query = [];
        parse_str( $response, $query );

        // 連携したアカウントの情報をDBに登録
        $user    = Auth::user();
        $account = new Account;
        $account->user_id            = $user->id;
        $account->twitter_id         = $query["screen_name"];
        $account->twitter_user_id    = $query["user_id"];
        $account->oauth_token        = $query["oauth_token"];
        $account->oauth_token_secret = $query["oauth_token_secret"];
        $account->save();

        return redirect()->route('account.index');
    }

    /* 
     * 認証をキャンセルしたコールバック処理
     */
    public function handleCancelCallback()
    {
        return redirect()->route('account.index');
    }

    /* 
     * リクエスト用のコンテキストを作成する
     */
    public function createRequestContext($params, $request_method, $request_url, $signature_key)
    {
        // 連想配列をアルファベット順に並び替え
        ksort($params);

        // パラメータの連想配列を[キー=値&キー=値...]の文字列に変換
        $request_params = http_build_query( $params , "" , "&" );

        // 変換した文字列をURLエンコードする
        $request_params = rawurlencode($request_params);

        // リクエストメソッドをURLエンコードする
        $encoded_request_method = rawurlencode( $request_method );

        // リクエストURLをURLエンコードする
        $encoded_request_url = rawurlencode( $request_url );

        // リクエストメソッド、リクエストURL、パラメータを[&]で繋ぐ
        $signature_data = $encoded_request_method . "&" . $encoded_request_url . "&" . $request_params;

        // キー[$signature_key]とデータ[$signature_data]を利用して、HMAC-SHA1方式のハッシュ値に変換する
        $hash = hash_hmac( "sha1" , $signature_data , $signature_key , TRUE );

        // base64エンコードして、署名[$signature]が完成する
        $signature = base64_encode( $hash );

        // パラメータの連想配列、[$params]に、作成した署名を加える
        $params["oauth_signature"] = $signature;

        // パラメータの連想配列を[キー=値,キー=値,...]の文字列に変換する
        $header_params = http_build_query( $params, "", "," );

        return array(
            "http" => array(
                "method" => $request_method , // リクエストメソッド (POST)
                "header" => array(			  // カスタムヘッダー
                    "Authorization: OAuth " . $header_params,
                ),
            ),
        );
    }

    /* 
     * cURLを使ってリクエスト
     */
    public function curlRequest($request_url, $context)
    {
        $curl = curl_init();
        curl_setopt( $curl, CURLOPT_URL , $request_url );
        curl_setopt( $curl, CURLOPT_HEADER, true ); 
        curl_setopt( $curl, CURLOPT_CUSTOMREQUEST , $context["http"]["method"] );	// メソッド
        curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER , false );	// 証明書の検証を行わない
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER , true );	// curl_execの結果を文字列で返す
        curl_setopt( $curl, CURLOPT_HTTPHEADER , $context["http"]["header"] );	// ヘッダー
        curl_setopt( $curl, CURLOPT_TIMEOUT , 5 );	// タイムアウトの秒数

        return $curl;
    }
}