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
<body>
   <div class="banner-area">
   <div align="center">
      <div style="; border: solid 1px #333333; " align="left">
         <div style="width:300;background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
         <div style="margin:30px">
            <form action="medicallogin.php" method="post">
               <label>UserName :</label><input type="text" name="username" class="box" /><br /><br />
               <label>Password :</label><input type="password" name="password" class="box" /><br /><br >
               <select name="Color">
               <option value="managerlogin">Manager</option>
               <option value="employeelogin">Employee</option>
               </select>
               <input type="submit" name="submit" value="Submit" />
               <button><a href="index.php" style="text-decoration:none; color:black;">Go back</a></button> <br>
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
         
         if ($_POST['Color']=='managerlogin')
         {
            header("location:manager.php");
         }
         else{
            header('location:employee.php');
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
   
</body>
</html>