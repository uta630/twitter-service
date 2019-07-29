<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowKeyword extends Model
{
    protected $table = 'follow_keyword';

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
