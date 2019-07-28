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
            ],
            [
                'user_id'    => 1,
                'keyword'    => '22222',
            ],
            [
                'user_id'    => 2,
                'keyword'    => 'z = x + y',
            ],
            [
                'user_id'    => 3,
                'keyword'    => 'asdfghjkl',
            ],
            [
                'user_id'    => 1,
                'keyword'    => '33333',
            ],
        ]);
    }
}
