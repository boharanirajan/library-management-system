<?php
include "connection.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
<style>
      .srch{
         padding-left:900px;
      }
      .form-control
      {
        width: 300px;
        height: 40px;
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
    <title>book Request</title>
</head>
<body>
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
  <a href="issue_info.php">Issue Information</a>
  <div ><a href="expired.php">Return books</a></div>
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
<br>

<div class="srch">
    <form action="" method="POST" name="form1">
      <input type="text" name="username" class="form-control" 
      placeholder="Username"
      required=""><br>
      <input type="text" name="bid" class="form-control"
       placeholder="BID"
      required=""><br>
    <button class="btn btn-default" name="submit" type="submit">
        Submit</button><br>

    </form>
</div>
<h2 style="text-align:center">Request of Book</h2>
<?php
if(isset($_SESSION['login_user']))
{
    $sql="SELECT student.usename, student.roll, books.bid, books.name, 
    books.authors,books.edition,books.status FROM student INNER JOIN 
    issue_book ON student.usename=issue_book.username 
    INNER JOIN books ON issue_book.bid=books.bid WHERE issue_book.approve !='yes'";

// $sql= "SELECT student.usename, student.roll, books.bid, books.name, books.authors,
// books.edition,books.status FROM student INNER JOIN 
// issue_book ON student.usename = issue_book.username 
// INNER JOIN books ON 
// issue_book.bid = books.bid WHERE issue_book.approve 
// IS NOT NULL AND issue_book.approve != 'Yes';
// $res=mysqli_query($db,$sql);
    
    $res=mysqli_query($db,$sql);
    if(mysqli_num_rows($res)==0)
     {
        echo "<h2><b>";
      echo "There's no panding request.";
      echo "<h2/><b/>";
     }
     else
     {
        echo "<table class='table table-bordered table-hover'> ";
   echo "<tr style='background-color:#6bb6b9e6;'>";
   // Table header 
   echo "<th>";  echo "Username";  echo "</th>";
   echo "<th>"; echo " Roll No"; echo "</th>";
   echo "<th>"; echo "BID "; echo "</th>";
   echo "<th>"; echo "Book Name"; echo "</th>";
   echo "<th>"; echo "Authors Name"; echo "</th>";
   echo "<th>"; echo "Edition "; echo "</th>";
   echo "<th>"; echo "Status"; echo "</th>";
   echo "</tr>";
     while($row= mysqli_fetch_assoc($res))
     {
        echo "<tr>";
        echo "<td>";   echo $row['usename'];  echo "</td>";
        echo "<td>";   echo $row['roll'];  echo "</td>";
        echo "<td>";   echo $row['bid'];  echo "</td>";
        echo "<td>";   echo $row['name']; echo "</td>";
        echo "<td>";   echo $row['authors'];  echo "</td>";
        echo "<td>";   echo $row['edition'];  echo "</td>";
        echo "<td>";   echo $row['status'];  echo "</td>";
        echo "</tr>";
     }
     echo " <table>";
     }
}
  else{
    ?>
    <br>
    <h3 style="text-align:center:">You need login to see the request.</h3>
    <?php

  }
  if(isset($_POST['submit']))
  {
    $_SESSION['name']=$_POST['username'];
    $_SESSION['bid']=$_POST['bid'];
    ?>
    <script>
        window.location="approve.php";
    </script>
    <?php
    
  }
    ?>
</body>
</html>