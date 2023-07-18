<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplytoReply extends Model
{
    use HasFactory;


    protected $fillable = [

        'thread_id',
        'user_id',
        'body',
        'reply_id'

    ];


}
