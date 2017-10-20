+++++++<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadFileController extends Controller
{
     public function index(){
      return view('uploadfile');
   public function showUploadFile(Request $request){
      $file = $request->file('image');

     // <img src="/public/uploads/{{ $file['image'] }}" height="30px" width="30px" />
   
      //Display File Name
      echo 'File Name: '.$file->getClientOriginalName();
      echo '<br>';
   
      //Display File Extension
      echo 'File Extension: '.$file->getClientOriginalExtension();
      echo '<br>';
   
      //Display File Real Path
      echo 'File Real Path: '.$file->getRealPath();
      echo '<br>';
   
      //Display File Size
      echo 'File Size: '.$file->getSize();
      echo '<br>';
   
      //Display File Mime Type
      echo 'File Mime Type: '.$file->getMimeType();
      //Move Uploaded File
      $destinationPath = public_path().'/uploads';
      $file->move($destinationPath,$file->getClientOriginalName());
       echo '<br>';
       echo '';
      $img = asset("uploads").'/'.$file->getClientOriginalName();
      echo ' <img src='.$img .' height =100px width = 100px />';


        /*$fileuploads = new FileUploads;
         $fileuploads->name = ''.$file->getClientOriginalName();
         $fileuploads->save();*/
   }
}
