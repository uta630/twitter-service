<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UseStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('use_status')->insert([
            'user_id'         => 1,
            'follow_status'   => false,
            'favorite_status' => false,
            'booking_status'  => false,
            'follow_at'       => null,
            'favorite_at'     => null,
            'booking_at'      => null,
        ]);
    }
}
