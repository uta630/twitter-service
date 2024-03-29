<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'account';

    // 変更できるカラム
    protected $fillable = [
        'user_id',
        'twitter_id',
    ];

    // 変更できないカラム
    protected $guarded = [
        'id'
    ];
}
