<?php 
?>

<html>
<head>
    <title>Welcome to admin login</title>
</head>

<body>
    <form action="products.php" method="POST">
        Name: <input type="text" name="name"> <br>
        Stock: <input type="text" name="stock"> <br>
        Price: <input type="text" name="price"> <br>   
        <input type="submit" value="submit" name="submit">
    </form>
    <?php 
    include('dbconnect.php'); 
    
  


    
    if(isset($_POST['submit']))
    {
        $name =mysqli_real_escape_string($db,$_POST['name']) ;
        $stock = mysqli_real_escape_string($db,$_POST['stock']) ;
        $price = mysqli_real_escape_string($db,$_POST['price']) ;
        
        
        $query = "insert into products (name,stock,price) value ('$name',$stock,'$price')";
        $result = mysqli_query($db,$query);
        if($result)
        {
            echo "success";
            // for($i=0;$i<count($_POST);$i++){
            //     $_POST[$i] = "";
            // }
        }
        else 
        {
            echo "fail";
        }
    }
?>
</body>
</html>