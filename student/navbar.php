<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library Management system</title>
    <link rel="stylesheet" href="CSS/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
</script>
<body>
<nav class="navbar navbar-inverse" style="width:100%;" >
        <div>
        <div class="navbar-header">
            <a class="navbar-brand active">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
           </div class="container-fluid">
                <ul class="navbar-nav">
                    <li><a href="">Home</a></li>
                    <li><a href="">Books</a></li>
                    <li><a href="">Feedback</a></li>
                </ul>
                <?php
                if(isset($_SESSION['login_user']))
                {?>
                <ul class="nav navbar-nav navbar-right">
                     <li><a href="profile.php"> Profile</a></li>
             </ul>
                
                  <ul class="nav navbar-nav navbar-right">
                    <li> <a href="profile.php"></a>
                    <div style="color: white;">
                    <?php
                    echo "<img  class='img-circle profile-img' height=30 width=30
                    src='images/".$_SESSION['pic']."' >";
                    echo $_SESSION['login_user'];
                ?>
                </div>
                </li>
                    <li><a href="logout.php">
                        <span class="glyphicon  glyphicon-log-out">
                     Logout</span></a></li></ul>
                     <?php
                }
                else
                { ?>
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="studentlogin.php"> <span class="glyphicon  glyphicon-log-in">
                     Login</span></a></li>
                     <li><a href="registration.php"><span class="glyphicon  glyphicon-user">
                      SignUp</span></a></li>
                    </ul> 
                    <?php
                }
                ?>
            </div>
              </nav>

</body>
</html>