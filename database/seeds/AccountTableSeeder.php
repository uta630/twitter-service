<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account')->insert([
            [
                'user_id'      => 1,
                'account_id'   => '____uta_____',
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
            [
                'user_id'      => 1,
                'account_id'   => 'uta_mr_kiss',
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
            [
                'user_id'      => 2,
                'account_id'   => 'twitter',
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
        ]);
    }
}
