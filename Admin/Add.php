<?php
include "navbar.php";
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
    <title>Books</title>
    <style>
      .srch{
         padding-left:1000px;
      }
      body {
        background-color:white;
  font-family: "Lato", sans-serif;
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
.h:hover
{
  color: white;
  width: 200px;
  height: 50px;
  background-color:#00544c;
  margin: ;
}
.book
{

    margin: 0 auto;
    width: 500px;
}
.form-control
{
    height:35px;
}
    </style>
</head>
<body>
<!-- ------------------sidenavbar---------------- -->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div style="color: white; margin-left:20px;">
          <?php
          if(isset( $_SESSION['login_user']))
          {
     echo "<img  class='img-circle profile-img' height=100 
     width=100 
             src='images/".$_SESSION['pic']."' >";
             echo "<br>";
             echo $_SESSION['login_user'];
          }
                ?>
                </div>
   <div class="h"><a href="add.php"> Add Books</a></div>
   <div class="h"><a href="books.php">  Books</a></div>
   <div class="h"> <a href="request.php">Books Request</a></div>
   <div class="h"><a href="issue_info.php">Issue Information</a> </div>
</div>

<div id="main">
<span style="font-size:30px;cursor:pointer" onclick="openNav()">
  &#9776; open</span>
<div class="container">
    <h2 style="text-align:center;" >Add new Books</h2>
    <form class="book" action="" method="post">
        <input type="text" name="bid" class="form-control" 
        placeholder="Book id" required> <br>
        <input type="text" name="name" class="form-control" 
        placeholder="Book name"required> <br>
        <input type="text" name="authors" class="form-control" 
        placeholder="Authors name" required> <br>
        <input type="text" name="edition" class="form-control" 
        placeholder="Edition" required> <br>
        <input type="text" name="status" class="form-control" 
        placeholder="Status" required> <br>
        <input type="text" name="quantity" class="form-control" 
        placeholder="Quantity" required> <br>
        <input type="text" name="department" class="form-control" 
        placeholder="Department" required> <br>
        <button class="btn-btn-default" type="submit" name="submit">
            ADD</button>
    </form>
</div>
<?php
if(isset($_POST['submit']))
{
    if($_SESSION['login_user'])
    {
        mysqli_query($db,"INSERT INTO books VALUES ('$_POST[bid]','$_POST[name]',
        '$_POST[authors]','$_POST[edition]','$_POST[status]','$_POST[quantity]',
        '$_POST[department]');");
        ?>
        <script>
            alert("Books Added successfully");
        </script>
        <?php
    }
}
else
{
    ?>
    <script>
            alert("You need to login first.");
        </script>
        <?php
}
  ?>
  </div>
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
</body>
</html>