<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FavoriteKeywordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favorite_keyword')->insert([
            'user_id'    => 1,
            'keyword'    => 'どういたしまして',
            'created_at' => Carbon::now(),
        ]);
    }
}
