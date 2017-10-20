<html>
   <body>
      
      <?php
         echo Form::open(array('url' => '/uploadfile','files'=>'true'));
         echo 'Title';
         echo Form::text('username');
         echo '<br/>';
         echo 'Description';
         echo Form::text('email');
         echo '<br/>';
         echo 'Select the Image to upload.';
         echo '<br/>';
         echo Form::file('image');
         echo '<br/>';
         echo 'Select the Audio to upload.';
         echo '<br/>';
         echo Form::file('featured_mp3');
         echo '<br/>';
      
         echo Form::submit('Upload ');
        
         echo Form::close();
      ?>
   
   </body>
</html>

