<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowTarget extends Model
{
    protected $table = 'follow_target';

    // 変更できるカラム
    protected $fillable = [
        'user_id',
        'target_id',
    ];

    // 変更できないカラム
    protected $guarded = [
        'id'
    ];
}
