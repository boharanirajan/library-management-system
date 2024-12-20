<?php
include "navbar.php";
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <title>Books</title>
    <style>
      .srch{
         padding-left:900px;
      }
      body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  margin-top: 80px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}
.img-circle
{
   margin: left 80px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
    </style>
</head>

    </style>
</head>
<body>
<!-- ------------------sidenavbar---------------- -->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div style="color: white; margin-left:20px;">
          <?php
          if(isset($_SESSION['login_user']))
          {
     echo "<img  class='img-circle profile-img' height=100 
     width=100 
             src='images/".$_SESSION['pic']."' >";
             echo "<br>";
             echo $_SESSION['login_user'];
          }
               ?>
                
                </div>
  <a href="books.php">Books</a>
  <a href="request.php">Books Request</a>
  <!-- <a href="issue_info.php">Issue Information</a> -->
</div>

<div id="main">
    
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">
  &#9776; open</span>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
                    <!-- search bar  -->
 <div class="srch">
   <form action="" class="navbar-form" method="POST" name="form1">
<input type="text" name="search" placeholder="search books...." 
class="form-control" required>
<button type="submit" name="submit" class="btn btn-default"
style="background-color:#6bb6b9e6;"> 
<span class="glyphicon glyphicon-search"></span></button>
    </form>
     </div>
     <!-- ______________request book_________________________ -->
     <div class="srch">
   <form action="" class="navbar-form" method="POST" name="form1">
<input type="text" name="bid" placeholder="Enter Book ID" 
class="form-control" required>
<button type="submit" name="submit1" class="btn btn-default"
style="background-color:#6bb6b9e6;"> Request</button>
    </form>
     </div>
   <h2>List of Books</h2> 
   <?php

    if(isset($_POST['submit']))
    {
 $q= mysqli_query($db,"SELECT * FROM `books` WHERE name LIKE 
     '$_POST[search]%' ");
     if(mysqli_num_rows($q)==0)
     {
      echo "sorry! no books found. Try again.";
     }
     else
     {
 echo "<table class='table table-bordered table-hover'> ";
   echo "<tr style='background-color:#6bb6b9e6;'>";
   // Table header 
   echo "<th>";  echo "ID";  echo "</th>";
   echo "<th>"; echo " Book_name"; echo "</th>";
   echo "<th>"; echo "Authers_Name "; echo "</th>";
   echo "<th>"; echo "Edition"; echo "</th>";
   echo "<th>"; echo "Status"; echo "</th>";
   echo "<th>"; echo "Quantity"; echo "</th>";
   echo "<th>"; echo "Department "; echo "</th>";
   echo "</tr>";
     while($row= mysqli_fetch_assoc($q))
     {
        echo "<tr>";
        echo "<td>";   echo $row['bid'];  echo "</td>";
        echo "<td>";   echo $row['name'];  echo "</td>";
        echo "<td>";   echo $row['authors'];  echo "</td>";
        echo "<td>";   echo $row['edition']; echo "</td>";
        echo "<td>";   echo $row['status'];  echo "</td>";
        echo "<td>";   echo $row['quantity'];  echo "</td>";
        echo "<td>";   echo $row['department'];  echo "</td>";
        echo "</tr>";
     }
     echo " <table>";
     }
    }
   //  if button is not prssed.
    else
      {
         $res = mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");
         echo "<table class='table table-bordered table-hover'> ";
         echo "<tr style='background-color:#6bb6b9e6;'>";
         // Table header 
         echo "<th>";  echo "ID";  echo "</th>";
         echo "<th>"; echo " Book_name"; echo "</th>";
         echo "<th>"; echo "Authers_Name "; echo "</th>";
         echo "<th>"; echo "Edition"; echo "</th>";
         echo "<th>"; echo "Status"; echo "</th>";
         echo "<th>"; echo "Quantity"; echo "</th>";
         echo "<th>"; echo "Department "; echo "</th>";
         echo "</tr>";
           while($row= mysqli_fetch_assoc($res))
           {
              echo "<tr>";
              echo "<td>";   echo $row['bid'];  echo "</td>";
              echo "<td>";   echo $row['name'];  echo "</td>";
              echo "<td>";   echo $row['authors'];  echo "</td>";
              echo "<td>";   echo $row['edition']; echo "</td>";
              echo "<td>";   echo $row['status'];  echo "</td>";
              echo "<td>";   echo $row['quantity'];  echo "</td>";
              echo "<td>";   echo $row['department'];  echo "</td>";
              echo "</tr>";
           }
           echo " <table>"; 
      }

      if(isset($_POST['submit1']))
      {
        if(isset($_SESSION['login_user']))
         {
          mysqli_query($db, "INSERT INTO `issue_book` values ('$_SESSION[login_user]','$_POST[bid]','','','');");
          ?>
          <script>
          window.location="request.php";
        </script>
        <?php
        }
        else
        {
          ?>
          <script>
            alert("You need to login to request a book");
          </script>
          <?php
        }
      }
   ?>
</body>
</html>