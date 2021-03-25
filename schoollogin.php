<html>
<head>
   <title>Login Page</title>
   <link href="assets/css/main.css" rel="stylesheet"> 
   <style type="text/css">
      body {
         font-family: Arial, Helvetica, sans-serif;
         font-size: 14px;
      }
      label {
         font-weight: bold;
         width: 100px;
         font-size: 14px;
      }
      .box {
         border: #666666 solid 1px;
      }
   </style>

</head>
<body >
<div >
   <div align="center">
          <div class="col-md-9">
               <div  >
                   <div >
                         <div class="list d-flex align-items-center"> 
                           <div class="banner-area">
      <div style="; border: solid 1px #333333; " align="left">
         <div style="width=300;background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
         <div style="margin:30px">
            <form action="" method="post">
               <table align="center">
                  <tr>
               <td><label>UserName :</label></td><td><input type="text" name="username" class="box" /><br /><br /></td>
                  </tr>
                  <tr>
               <td><label>Password :</label></td><td><input type="password" name="password" class="box" /><br /><br /></td>
                  </tr>
               <tr><td colspan="2" align="center"><select name="Color">
               <option value="principallogin">Principal</option>
               <option value="teacherlogin">Teacher</option>
               <option value="studentlogin">Student</option>
               </select></td></tr>
               <tr><td colspan="2" align="center"> <input type="submit" name="submit" value="Submit" /></td></tr>
              <tr><td colspan="2" align="center"> <button><a href="index.php" style="text-decoration:none; color:black;">Go back</a></button> </td></tr>
               </form>
               <?php
                  $option='';
                  include("dbconnect.php");
                  session_start();
                  if(isset($_POST['submit'])){
                     $option = $_POST['Color'];  // Storing Selected Value In Variable
                     // echo "You have selected :" .$option;  // Displaying Selected Value
                     }
                  $error = '';
                if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $mydbname = mysqli_real_escape_string($db,$_POST['Color']); 
      $sql = "SELECT id FROM $mydbname WHERE username = '$myusername' AND passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      if (!$result) {
         printf("Error: %s\n", mysqli_error($db));
         exit();
     }
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
         // session_register("myusername")
         $_SESSION['myusername'] ='xxx';
         $_SESSION['login_user'] = $myusername;
         if ($_POST['Color']=='principallogin')
         {
            header("location:principaladminpanel.php");
         }
         else if ($_POST['Color']=='teacherlogin')
         {
            header("location:teacher.php");
         }
         else 
         {
            header("location:student.php");
         }
      }
      else 
      {
         $error = "Your Login Name or Password is invalid";
      }
   }
               ?>
            </form>
            <div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
         </div>
      </div>
   </div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>