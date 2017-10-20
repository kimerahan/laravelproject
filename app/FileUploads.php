<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUploads extends Model
{
    protected $table = 'fileuploads';
     //rows in the table

     protected $fillable = ['name'];
}
