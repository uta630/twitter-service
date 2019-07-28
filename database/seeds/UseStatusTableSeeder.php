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
            [
                'user_id'         => 1,
                'follow_status'   => false,
                'favorite_status' => false,
                'booking_status'  => false,
                'follow_at'       => null,
                'favorite_at'     => null,
                'booking_at'      => null,
            ],
            [
                'user_id'         => 2,
                'follow_status'   => true,
                'favorite_status' => false,
                'booking_status'  => true,
                'follow_at'       => '2020-4-21',
                'favorite_at'     => null,
                'booking_at'      => '2020-07-28',
            ],
            [
                'user_id'         => 3,
                'follow_status'   => false,
                'favorite_status' => false,
                'booking_status'  => false,
                'follow_at'       => null,
                'favorite_at'     => '2020-06-05',
                'booking_at'      => null,
            ]
        ]);
    }
}
