<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devotion extends Model
{
    //table name
     protected $table = 'devotions';
     //rows in the table

     protected $fillable = ['title','body','date'];
  
}
