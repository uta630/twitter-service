<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account')->insert([
            [
                'user_id'      => 1,
                'twitter_id'   => '____uta_____',
                'twitter_user_id'   => '____uta_____',
                'oauth_token'   => '____uta_____',
                'oauth_token_secret'   => '____uta_____',
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
            [
                'user_id'      => 1,
                'twitter_id'   => 'official_something_1',
                'twitter_user_id'   => 'official_something_1',
                'oauth_token'   => 'official_something_1',
                'oauth_token_secret'   => 'official_something_1',
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
            [
                'user_id'      => 2,
                'twitter_id'   => 'twitter',
                'twitter_user_id'   => 'twitter',
                'oauth_token'   => 'twitter',
                'oauth_token_secret'   => 'twitter',
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
        ]);
    }
}
