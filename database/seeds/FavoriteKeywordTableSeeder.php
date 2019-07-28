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
            [
                'user_id'    => 1,
                'keyword'    => 'aaaaa',
                'created_at' => Carbon::now(),
            ],
            [
                'user_id'    => 1,
                'keyword'    => 'bbbbb',
                'created_at' => Carbon::now(),
            ],
            [
                'user_id'    => 2,
                'keyword'    => '2 + 2 = 4',
                'created_at' => Carbon::now(),
            ],
            [
                'user_id'    => 3,
                'keyword'    => 'qwertyuiop',
                'created_at' => Carbon::now(),
            ],
            [
                'user_id'    => 1,
                'keyword'    => 'ccccc',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
