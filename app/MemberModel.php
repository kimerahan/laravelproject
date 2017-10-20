<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberModel extends Model
{
   
protected $table = 'churchmembers';
     protected $fillable = ['name','phone','email','occupation','age','sex'];
}
