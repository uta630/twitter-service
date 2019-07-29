<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    protected $table = 'account';
    use SoftDeletes;

    // 変更できるカラム
    protected $fillable = [
        'user_id',
        'account_id',
    ];

    // 変更できないカラム
    protected $guarded = [
        'id'
    ];
}
