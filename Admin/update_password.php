<?php
include "connection.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change password</title>
    <style>
       body{
        width: 100%;
        height:650px;
    
       } 
       .wrapper
       {
        width:400px;
        height: 600px;
        
        margin: 0px auto;
      background-color:black;
      opacity: 0.6;
     color:white;
     padding: 27px 15px;
       } 
       .form-control{
        width: 300px;
       }
    </style>
</head>
<body>
    <div class="wrapper">
        <div>
     <h1 style="text-align: center;font-size: 20px;">
     Change your Password</h1> 
     
     </div>
     <div style="padding-left:30px">
     <form action="" method="post">
     <input type="text" name="usename" class="form-control"
     placeholder="username" required> <br>
     <input type="text" name="email" class="form-control" 
     placeholder="Email" required ><br>
     <input type="text" name="password" class="form-control" 
     placeholder=" new password" required ><br>
     <button class="btn btn-default" name="submit"
       type="submit"> Update</button>

     </form>
     </div>
    </div>
    <?php
    if(isset($_POST['submit']))
    {
        if(mysqli_query($db,"UPDATE `admin` SET
         password='$_POST[password]' where usename='$_POST[usename]'
         AND  email='$_POST[email]';"))
         {
            ?>
            <script>
                alert("The password upadate sucessfully");
            </script>
            <?php

         }
    }
    ?>
</body>
</html>