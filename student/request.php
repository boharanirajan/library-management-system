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
<?php
if(isset($_SESSION['login_user']))
    {
 $q= mysqli_query($db,"SELECT * FROM `issue_book` WHERE username=
      '$_SESSION[login_user]'; ");
     if(mysqli_num_rows($q)==0)
     {
      echo "There's no panding request.";
     }
     else
     {
 echo "<table class='table table-bordered table-hover'> ";
   echo "<tr style='background-color:#6bb6b9e6;'>";
   // Table header 
   echo "<th>";  echo "Book ID";  echo "</th>";
   echo "<th>"; echo " Approve Status"; echo "</th>";
   echo "<th>"; echo "Issue Date "; echo "</th>";
   echo "<th>"; echo "Returen Date"; echo "</th>";
   
   echo "</tr>";
     while($row= mysqli_fetch_assoc($q))
     {
        echo "<tr>";
        echo "<td>";   echo $row['bid'];  echo "</td>";
        echo "<td>";   echo $row['approve'];  echo "</td>";
        echo "<td>";   echo $row['Issue'];  echo "</td>";
        echo "<td>";   echo $row['return_date']; echo "</td>";
        echo "</tr>";
     }
     echo " <table>";
     }
    }
    else{
        echo "<br/>";
        echo "<h2> <b>";
        echo"Please login first to see the request information.";
        echo "<h2/> <b/>";
    }
    ?>
</body>
</html>