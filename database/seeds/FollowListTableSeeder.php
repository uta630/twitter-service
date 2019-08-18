<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FollowListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('follow_list')->insert([
            [
                'user_id'    => 1,
                'twitter_id' => 'Yahoo',
                'created_at' => Carbon::now(),
            ],
            [
                'user_id'    => 2,
                'twitter_id' => 'TwitterJP',
                'created_at' => Carbon::now(),
            ],
            [
                'user_id'    => 1,
                'twitter_id' => 'TwitterJP',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
