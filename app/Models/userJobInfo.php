<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userJobInfo extends Model
{
    use HasFactory;
    protected $table = 'user_job_info';
    protected $fillable = [
        'id',
        'user_id',
        'companyName',
        'jobTitle',
        'jobStartDay',
        'jobEndDay',
        'jobStatus',
        'jobDescription',
        'deleted_at',
    ];
    protected $guarded = ['id'];
}
