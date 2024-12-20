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
      td,th{
          width: 10%;
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
  margin-left: 100px;
}
.scroll
{
    width: 100%;
    height: 200px;
    overflow:auto;
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
  <div ><a href="expired.php">Returen books</a></div>
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
</div>
 
<?php
if(isset($_SESSION['login_user']))
{
    ?>
    <div class="srch">
    <form action="" method="POST" name="form1">
      <input type="text" name="username" class="form-control" placeholder="Username"
      required=""><br>
      <input type="text" name="bid" class="form-control" placeholder="BID"
      required=""><br>
    <button class="btn btn-default" name="submit" type="submit">
        Submit</button><br>

    </form>
</div>
    <?php
    if(isset($_POST['submit']))
    {
        $var1 = '<p style="color:yellow; background-color:green;">Returned</p>'; 
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $bid = mysqli_real_escape_string($db, $_POST['bid']);
        
        // Construct the SQL query
        $query = "UPDATE issue_book SET approve = '$var1' WHERE 
        username = '$username' AND 
        bid = '$bid'";
        
        $result = mysqli_query($db, $query);
        
        if ($result) {
            // Query executed successfully
            echo "Update successful.";
        } else {
            // Query execution failed
            echo "Update failed: " . mysqli_error($db);
        }
        
        
    }
}
?>

<!-- <h2 style="text-align:center;">Date expired list</h2> -->
    <?php
if(isset($_SESSION['login_user']))
{
    $var='<p style="color:yellow; background-color:red">Expired</p>';
     $sql= "SELECT student.usename, student.roll, books.bid, books.name, books.authors,
      books.edition,
     issue_book.approve, issue_book.Issue, issue_book.return_date FROM student INNER JOIN 
     issue_book ON student.usename = issue_book.username INNER JOIN books ON 
     issue_book.bid = books.bid WHERE issue_book.approve 
    IS NOT NULL AND issue_book.approve != 'Yes' ORDER BY issue_book.return_date ASC";
     $res=mysqli_query($db,$sql);
     echo "<table class='table table-bordered table-hover'> ";
   echo "<tr style='background-color:#6bb6b9e6;'>";
   // Table header 
   echo "<th>";  echo "Username";  echo "</th>";
   echo "<th>"; echo " Roll No"; echo "</th>";
   echo "<th>"; echo "BID "; echo "</th>";
   echo "<th>"; echo "Book Name"; echo "</th>";
   echo "<th>"; echo "Authors Name"; echo "</th>";
   echo "<th>"; echo "Edition "; echo "</th>";
   echo "<th>"; echo "Status "; echo "</th>";
   echo "<th>"; echo "Issue Date"; echo "</th>";
   echo "<th>"; echo "Return Date"; echo "</th>";
   echo "</tr>";
   echo "</table>";
   echo "<div class='scroll'>";
   echo "<table class='table table-bordered table-hover'> ";
  
     while($row= mysqli_fetch_assoc($res))
     { 
        echo "<tr>";
        echo "<td>";   echo $row['usename'];  echo "</td>";
        echo "<td>";   echo $row['roll'];  echo "</td>";
        echo "<td>";   echo $row['bid'];  echo "</td>";
        echo "<td>";   echo $row['name']; echo "</td>";
        echo "<td>";   echo $row['authors'];  echo "</td>";
        echo "<td>";   echo $row['edition'];  echo "</td>";
        echo "<td>";   echo $row['approve'];  echo "</td>";
        echo "<td>";   echo $row['Issue'];  echo "</td>";
        echo "<td>";   echo $row['return_date'];  echo "</td>";
        echo "</tr>";
     }
     echo " <table>";
     echo "</div>";
}
   else
   {
    ?>
     <h2 style="text-align:center;"> Login to see information of Borrowed 
     Books</h2>
    <?php
   }

?>
</body>
</html>