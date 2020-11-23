<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
//    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = ['title','content','start_time','end_time','user_id'];
}
