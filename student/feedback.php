<?php
include "navbar.php";
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Feedback</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
</script>
<style type="text/css">
    body{
        background-image:url("images/66.jpg");
    }
    .wrapper{
        padding: 10px;
        margin: -20px auto;
        width: 850px;
        height:600px;
        background-color:black;
        opacity: 0.8;
        color:white;
        overflow:hidden;
    }
    .form-control
    {
        height:75px;
        width:60%;
    }
    .scroll{
        width: 100%;
        height: 250px;
        overflow: auto;
    }

</style>
</head>
<body>
    <div class="wrapper">
        <h3>If you suggesions or questions please comments below.</h3>
     <form action="" method="post">
        <input class= "form-control"  type="text" name="comments" placeholder="Write something...">
      <br>
        <input class="class-btn" type="submit" name="submit" style="width:100px; height: 35px;" 
        value="commets"> 
    </form>
   <br><br>
    <div class="scroll">
        <?php
        if(isset($_POST['submit']))
        {
          $sql = "INSERT INTO `comments`
           VALUES('',  '{$_POST['comments']}');";

          if( mysqli_query($db,$sql)){
            $q="SELECT * FROM `comments` ORDER BY `comments`.`id` ASC";
            $res=mysqli_query($db,$q);
            echo "<table class='table table-bordered'>";
            while($row=mysqli_fetch_assoc($res))
            {
          echo "<tr>";
      
          echo "<td>"; echo $row['comments']; echo "</td>";
          echo "</tr>";
            }
          }
          else{
            $q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
            $res=mysqli_query($db,$q);
            echo "<table class='table table-bordered'>";
            while($row=mysqli_fetch_assoc($res))
            {
              echo "<tr>";
              
              echo "<td>"; echo $row['comments']; echo "</td>";
              echo "</tr>";
              
            }
          }
        }
        ?>
    </div>
    </div>
</body>
</html>