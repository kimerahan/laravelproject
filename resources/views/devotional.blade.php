<html>
   <body>
      
      <?php
         echo Form::open(array('url' => '/devotionalview','files'=>'true'));
         echo 'Title';
         echo Form::text('title');
         echo '<br/>';
         echo 'Description';
         echo Form::text('body');
         echo '<br/>';
         echo 'Date';
         echo Form::text('date');
         /*echo 'Select the Image to Upload.';
         echo '<br/>';
         echo Form::file('image');*/
         echo '<br/>';      
         echo Form::submit('Submit ');
        
         echo Form::close();
      ?>
   
   </body>
</html>

