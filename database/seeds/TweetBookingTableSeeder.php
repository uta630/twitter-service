<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TweetBookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tweet_booking')->insert([
            [
                'user_id'    => 1,
                'twitter_id' => 1,
                'tweet'      => 'ツイートする内容がここに入ります。140文字以内などの制約をコントローラで守らせます。',
                'release'    => '2020-01-31',
                'status'     => false,
                'created_at' => Carbon::now(),
            ],
            [
                'user_id'    => 1,
                'twitter_id' => 2,
                'tweet'      => 'ツイートされた内容がここに入ります。140文字以内などの制約をコントローラで守らせます。',
                'release'    => '2019-01-31',
                'status'     => true,
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
