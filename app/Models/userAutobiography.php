<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userAutobiography extends Model
{
    use HasFactory;
    protected $table = 'user_autobiography';
    protected $fillable = [
        'id',
        'user_id',
        'autobiography',
    ];
}
