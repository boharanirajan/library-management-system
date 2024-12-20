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
.Approve
{
  margin-left:420px;
}
    </style>
</head>

    </style>
    <title>Approve Request<</title>
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
<div class="container">
   <br><h3 style="text-align:center;">Approve Request</h3><br><br>
  <form action="" class="Approve" method="POST">
    <input  class="form-control" type="text" name="approve" placeholder="Yes or No"
    required=""><br>
    <input class="form-control" type="text" name="Issue" placeholder="Issue Date yyyy-mm-dd"
    required=""><br>
    <input type="text" name="return_date"class="form-control"
     placeholder="Return Date yyyy-mm-dd" required="">
     <button class="btn btn-default" type="submit" name="submit">
      Approve
     </button>
  </form>
</div>
</div> 

<?php
if(isset($_POST['submit']))
{
  mysqli_query($db,"UPDATE `issue_book` SET `approve`='$_POST[approve]',`Issue`='$_POST[Issue]',
  `return_date`='$_POST[return_date]'
   WHERE username='$_SESSION[name]'AND bid='$_SESSION[bid]';");

  mysqli_query($db,"UPDATE books SET quantity=quantity-1 where bid='$_SESSION[bid]';");
  $res=mysqli_query($db,"SELECT quantity from books where bid='$_SESSION[bid]';");
  while($row=mysqli_fetch_assoc($res))
  {
    if($row['quantity']==0){
      mysqli_query($db,"UPDATE books SET status='not avaliable'where bid='$_SESSION[bid]';");
    }
  }
  ?>
  <script>
    alert("Updated successfully");
    window.location="request.php";
  </script>
  <?php
}
?>
</body>
</html>