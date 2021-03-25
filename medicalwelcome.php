<?php
   include('medicalsession.php');
?>
<html>
   
   <head>
      <title>Welcome</title>
   </head>
   
   <body>
      <h1>Welcome<?php echo $login_session; ?></h1> 
      <h2><a href = "medicallogout.php">Sign Out</a></h2>
   </body>
   
</html>