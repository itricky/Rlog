<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userInfo extends Model
{
    use HasFactory;
    protected $table = 'user_info';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}

