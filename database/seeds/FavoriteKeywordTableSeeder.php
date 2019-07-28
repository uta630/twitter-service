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
            ],
            [
                'user_id'    => 1,
                'keyword'    => 'bbbbb',
            ],
            [
                'user_id'    => 2,
                'keyword'    => '2 + 2 = 4',
            ],
            [
                'user_id'    => 3,
                'keyword'    => 'qwertyuiop',
            ],
            [
                'user_id'    => 1,
                'keyword'    => 'ccccc',
            ],
        ]);
    }
}
