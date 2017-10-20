<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //creating a table public $table = 'other_tasks';
     protected $fillable = ['title','body','user_id'];
}
