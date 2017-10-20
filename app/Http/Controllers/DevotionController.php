<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevotionController extends Controller
{

 public function index(){
      return view('devotional');
   }

    public function store(Request $request)
    {
        // Validate the request...

        $devotion = new Devotion;
        //$devotion->title = $request->"title";
        //$devotion->body = $request->"body";
       // $devotion->date = $request->"date";
         $devotion->title = 'First Laravel Title'; 
         $devotion->body = 'This is my first laravel body'; 
         $devotion->date = 'date';
         $devotion->save();

    }
}
