<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteKeyword extends Model
{
    protected $table = 'favorite_keyword';

    // 変更できるカラム
    protected $fillable = [
        'user_id',
        'keyword',
    ];

    // 変更できないカラム
    protected $guarded = [
        'id'
    ];
}
