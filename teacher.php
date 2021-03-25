<?php
   include('schoolsession.php');
   echo "this is teacher";
   ?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h2><a href = "schoollogout.php">Sign Out</a></h2>
   </body>
   
</html>