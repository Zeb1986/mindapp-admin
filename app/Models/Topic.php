<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $connection = 'pgsql_content';
    protected $table = 'topic';
    protected $fillable = [
        'topic_id',
    ];
}
