<?php 
    include('schoolsession.php');
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeacherAdminPanel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css" media="screen,projection" /> -->
    <link type="text/css" rel="stylesheet" href="assets/css/index.css" media="screen,projection" />
    <!-- <link href="assets/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" /> -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed:500,600,700" rel="stylesheet">
</head>

<body>
    <div class="row">
        <div class="col-md-3 side-navbar">
            <div id="profileColumn">
                <img id="profileImage" src="assets/images/profpic.jpg" class="d-flex" />
                <h2 id="heroName" class="center-align">Welcome Principal</h2>
                <h4 id="description" class="center-align"></h4>
                <div class="list d-flex align-items-center">
                    <ul>
                        <li> <a href="teachers.php">Add Teacher</a> </li>
                        <li> <a href="vteachers.php">View Teacher</a> </li>
                        <li> <a href="students.php">Add Student</a></li>
                        <li> <a href="vstudents.php">View Student</a></li>
                        <li> <a href="schoologout.php">Signout</a></li>
                        <li><a href="expense.php">Expense</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
           <div id="profileColumn">
                <div class="banner-area">
                <div class="list d-flex align-items-center"> 
            <div class="banner-area">
                <form action="expense.php" method="POST">
                    <table class="table" align="center">
                        <tr>
                    <td>Expense:</td><td> <input type="text" name="expense"></td>
                 </tr>
                 <tr>
                     <td colspan="2" align="center">
                    <input type="submit" value="submit" name="submit">
                </td>
                </tr>
                 </table>
                </form>
                <?php 
                        include('dbconnect.php'); 
                        if(isset($_POST['submit']))
                        {
                            $expense =mysqli_real_escape_string($db,$_POST['expense']) ;
                            $query = "insert into expenses(expenseid,cost,time) value ('','$expense','')";
                            $result = mysqli_query($db,$query);
                        }
                ?>
            </div>
        </div>
    </div>
                    </div>
                    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>