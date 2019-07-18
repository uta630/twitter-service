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
            'user_id'      => 1,
            'account_id'   => 'Twitter',
            'created_at'   => Carbon::now(),
        ]);
    }
}
