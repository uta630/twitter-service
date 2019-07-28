<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TweetBooking extends Model
{
    protected $table = 'tweet_booking';

    // 変更できるカラム
    protected $fillable = [
        'user_id',
        'account_id',
        'tweet',
        'release',
        'status',
        'created_at',
    ];

    // 変更できないカラム
    protected $guarded = [
        'id'
    ];
}