<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    protected $fillable = [
    'room_id',
    'user_name',
    'body',
];
    use HasFactory;
}
