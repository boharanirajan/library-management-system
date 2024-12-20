<?php
include "connection.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <style>
        .wrapper
        {
      width: 300px;
      margin: 0 auto;
      background-color:#004528;
        }

    </style>
</head>
<body style="background-color:#004528;">
    <div class="container">
    <form action="edit.php" method="post">
    <button class="btn btn-default" style="float:right; 
    width: 70px;" type="submit" name="submit1" value="Submit">
        Edit
    </button>
</form>
        <div class="wrapper">
         <?php
         if (isset($_POST['submit1']))
         {
            ?>
            <script>
                window.location="edit.php";
            </script>
            <?php

         }
        $q=mysqli_query($db,"SELECT*FROM student where usename=
        '$_SESSION[login_user]';");
         ?>
         <h2 style="text-align:center; color:white;">My profile</h2>
         <?php
         $row=mysqli_fetch_assoc($q);
         echo "<div style='text-align:center;'>
         <img class='img-circle profile-img' height=110
         width=120  src='images/".$_SESSION['pic']."'>
         </div>";
         ?>
         <div style="text-align:center; color:white;"> <b >Welcome
              </b>
       <h4>
        <?php
        echo $_SESSION['login_user'];
        ?>
       </h4> 
    </div>
    <?php
    echo "<b>";
     echo "<table class='table table-bordered'style='text-align:center; color:white;'>";
     echo "<tr>";
     echo "<td>";
     echo "<b>First name: </b>";
     echo "</td>";
      
     echo "<td>";
     echo $row['first'];
     echo "</td>";

     echo "</tr>";
     echo "<td>";
     echo "<b>Last name: </b>";
     echo "</td>";

     echo "<td>";
     echo $row['last'];
     echo "</td>";

     echo "<tr>";
     echo "<td>";
     echo "<b>Username: </b>";
     echo "</td>";

     echo "<td>";
     echo $row['usename'];
     echo "</td>";
     echo "</tr>";

     echo "<tr>";
     echo "<td>";
     echo "<b>Password: </b>";
     echo "</td>";

     echo "<td>";
     echo $row['password'];
     echo "</td>";
     echo "</tr>";

     echo "<tr>";
     echo "<td>";
     echo "<b>Email: </b>";
     echo "</td>";

     echo "<td>";
     echo $row['email'];
     echo "</td>";
     echo "</tr>";

     echo "<tr>";
     echo "<td>";
     echo "<b>Contact: </b>";
     echo "</td>";

     echo "<td>";
     echo $row['contact'];
     echo "</td>";
     echo "</tr>";

     echo "</table>";
     echo "</b>";
    ?>
</div>
       
    </div>
</body>
</html>