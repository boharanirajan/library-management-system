<?php
include "connection.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library Management system</title>
    <link rel="stylesheet" href="CSS/style.css">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
</script> -->
<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
<style>
    nav{
        margin: 0px;
        width: 100%;
    }
</style>
</head>
<body>

    <section style="background-image: url(images/3.jpg);">
         <div class="log_img">
            <br><br><br>
            <div class="box1">
                <h1 style="text-align: center;font-size: 25px;"> Library Management system</h1> 
                <h1 style="text-align: center;font-size: 25px;"> Admin Login Form</h1> 
                <form action="" name="login" action="" method="post">
                    <br>
                    <div class="login">
                 <input class="form-control" type="text" name="usename" 
                 placeholder="Username"><br>
                <input type="password" class="form-control" name="password"
                 placeholder="password"><br>
                 <input class="btn btn-default" type="submit" name="submit"
                  value="login"
                    style="color: black; width: 60px; height: 30px;">
                </div>
                <p style="color: white;">
                    <a style="color:White; margin-left: 70px; text-decoration: none; "
                     href="update_password.php">Forgot password?
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp; &nbsp;&nbsp;&nbsp;</a>
                    New to this website?  &nbsp; <a href="registration.html" 
                    style="color: white; text-decoration: none;">
                        Sign up</a>
                </p>
            </form>
            </div>

         </div>
    </section>
    <?php
    if(isset($_POST['submit']))
    {
        $count=0;
     $res =mysqli_query($db, "SELECT * FROM `admin` WHERE usename='$_POST[usename]'
      AND password= '$_POST[password]';" );
      $row =mysqli_fetch_assoc($res);
     $count = mysqli_num_rows($res);
     if($count==0){
        ?>
        <!-- <script>
            alert("The username and password doesn't match.");
        </script> -->
        <div class="alert alert-warning" style = "width: 700px; margin-left:300px">
            <strong>The username and password doesn't match.</strong>
        </div>
        <?php
     }
     else
     {      // if username and password mathes

        $_SESSION['login_user'] = $_POST['usename'];
        $_SESSION['pic']=$row['pic'];
     ?>
     <script>
      window.location = "index.php";
     </script>
     <?php
     }
    }
    ?>
    <footer>

    </footer>
</body>
</html>