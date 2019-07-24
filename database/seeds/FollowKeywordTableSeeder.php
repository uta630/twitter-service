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
            [
                'user_id'    => 1,
                'keyword'    => '11111',
                'created_at' => Carbon::now(),
            ],
            [
                'user_id'    => 1,
                'keyword'    => '22222',
                'created_at' => Carbon::now(),
            ],
            [
                'user_id'    => 2,
                'keyword'    => 'z = x + y',
                'created_at' => Carbon::now(),
            ],
            [
                'user_id'    => 3,
                'keyword'    => 'asdfghjkl',
                'created_at' => Carbon::now(),
            ],
            [
                'user_id'    => 1,
                'keyword'    => '33333',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
