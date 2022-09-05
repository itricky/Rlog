<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userSkill extends Model
{
    use HasFactory;
    protected $table = 'user_skill';
    protected $fillable = [
        'id',
        'user_id',
        'skill',
        'deleted_at',
    ];
}
