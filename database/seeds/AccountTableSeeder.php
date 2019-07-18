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
            'user_id'      => 1,
            'account_id'   => '____uta_____',
            'account_name' => 'うた＠ウェブカツ!!',
            'token'        => bcrypt('token'),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);
    }
}
