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
            'user_id'    => 1,
            'target_id'  => 'TwitterAPI',
            'created_at' => Carbon::now(),
        ]);
    }
}
