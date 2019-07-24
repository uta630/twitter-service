<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FollowTargetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('follow_target')->insert([
            [
                'user_id'    => 1,
                'target_id'  => 'target_user',
                'created_at' => Carbon::now(),
            ],
            [
                'user_id'    => 1,
                'target_id'  => 'nishinoakihiro',
                'created_at' => Carbon::now(),
            ],
            [
                'user_id'    => 2,
                'target_id'  => 'ochyai',
                'created_at' => Carbon::now(),
            ],
            [
                'user_id'    => 1,
                'target_id'  => 'takapon_jp',
                'created_at' => Carbon::now(),
            ],
            [
                'user_id'    => 3,
                'target_id'  => 'ochyai',
                'created_at' => Carbon::now(),
            ]
        ]);
    }
}
