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
        <h1 style="color:white;">ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
       </div>
          <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="books.php">Books</a></li>
                <li><a href="studentlogin.php">StudentLogin</a></li>
                <li><a href="feedback.php">Feedback</a></li>
            </ul>
          </nav>
        </header>
       <section style="width: 100%; height: 400px;">
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
        <!--
        <div class="box">
             <h1 style="text-align: center; font-size:35px;">Welcome to libery</h1><br>
             <h1 style="text-align: center; font-size:25px;">Open at:9:30 AM</h1><br>
             <h1 style="text-align: center; font-size:25px;">Close at: 4:00PM</h1>
        </div>-->
        </section>
        <footer>
           <p style="color:white; text-align: center;">
            <br><br><br>
            Email: &nbsp Online.librart@gamil.com
            <br>
            Mobile: &nbsp 9847119089
           </p>
        </footer>
</div>
</body>
</html>