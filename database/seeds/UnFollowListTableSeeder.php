<?php

use Illuminate\Database\Seeder;

class UnFollowListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unfollow_list')->insert([
            'user_id'      => 1,
            'account_id'   => 'MomentsJapan',
        ]);
    }
}
