<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FollowKeywordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('follow_keyword')->insert([
            'user_id'    => 1,
            'keyword'    => 'ありがとう',
            'created_at' => Carbon::now(),
        ]);
    }
}
