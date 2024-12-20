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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
  <div class="wrapper">
       <header>
       <div class="logo">
        <img src="./images/9.png" alt="">
        <h1 style="color:white; font-size: 20px;">ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
       </div>
       <?php
      if( isset($_SESSION['login_user']))
       {
        ?>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="books.php">Books</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="feedback.php">Feedback</a></li>
            </ul>
          </nav>
          <?php
      }
      else
      {  ?>
      <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="books.php">Books</a></li>
                <li><a href="admin_login.php">Login</a></li>
                <li><a href="feedback.php">Feedback</a></li>
            </ul>
          </nav>
      <?php
       
      }
       ?>   
        </header>
       <section style="width: 100%; height: 600px;">
        <div class="sec_img">

          <div class="w3-content w3-section" style="width: 100%; height:400px; overflow: hidden;">
            <img class="mySlides w3-animate-left" src="images/a.jpg" style="width: 100%;height:400px;">
            <img class="mySlides w3-animate-left" src="images/c.jpg" style="width: 100%; height:400px;">
            <img class="mySlides w3-animate-left" src="images/b.jpeg" style="width: 100%; height:400px;">
            <img class="mySlides w3-animate-fading" src="images/d.jpg" style="width: 100%; height:400px;">
            <img class="mySlides w3-animate-fading" src="images/e.jpg" style="width: 100%; height:400px;">
            <img class="mySlides w3-animate-fading" src="images/h.jpg" style="width: 100%; height:400px;">
          </div>
        <script type="text/javascript">
          var a=0;
          carousel();
        
          function carousel()
          {
            var i;
            var x= document.getElementsByClassName("mySlides");
        
            for(i=0; i<x.length; i++)
            {
              x[i].style.display="none";
            }
        
            a++;  
            if(a > x.length) {a = 1}
              x[a-1].style.display = "block";
              setTimeout(carousel, 5000);
          }
        </script>
        </section>
</div>
<?php
include "footer.php";
?>
</body>
</html>