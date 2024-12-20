<?php
include "connection.php";
include "navbar.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student registration</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
</script>
</head>
<body>
        <section style="background-image: url(images/4.png);">
            <div class="log_img">
                      <br>
               <div class="box2" style="margin-top:50px;">
                   <h1 style="text-align: center;font-size: 25px;"> Library Management system</h1> 
                   <h1 style="text-align: center;font-size: 25px;"> User registration Form</h1> 
                   <form name="registration" onsubmit="return validateForm()" 
                   method="post" action="">
    <div class="login">
        <input class="form-control" type="text" name="first" placeholder="First Name" required=""><br>
        <input class="form-control" type="text" name="last" placeholder="Last Name" required=""><br>
        <input class="form-control" type="text" name="usename" placeholder="Username"><br>
        <input class="form-control" type="password" name="password" placeholder="Password"> <br>
        <input class="form-control" type="text" name="roll" placeholder="Roll No" required=""><br>
        <input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
        <input class="form-control" type="text" name="contact" placeholder="Phone No" required="">
        <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 60px; height: 30px;">
    </div>
</form>

<script>
    function validateForm() {
        var first = document.forms["registration"]["first"].value;
        var last = document.forms["registration"]["last"].value;
        var usename = document.forms["registration"]["usename"].value;
        var password = document.forms["registration"]["password"].value;
        var roll = document.forms["registration"]["roll"].value;
        var email = document.forms["registration"]["email"].value;
        var contact = document.forms["registration"]["contact"].value;

        // Basic Form Field Presence Check
        if (first === "" || last === "" || usename === "" || password === "" || roll === "" || email === "" || contact === "") {
            alert("All fields must be filled out");
            return false;
        }

        // Validate email format
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert("Please enter a valid email address");
            return false;
        }

        // Validate password strength
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/;
        if (!passwordRegex.test(password)) {
            alert("Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character (!@#$%^&*()_+)");
            return false;
        }

        // Validate phone number
        var phoneRegex = /^(\+\d{1,2})?\d{10,}$/;
        if (!phoneRegex.test(contact)) {
            alert("Please enter a valid phone number");
            return false;
        }

        return true;
    }
</script>


       <?php
          if(isset($_POST['submit']))
          {
            include "connection.php";
            $count=0;
            $mysql= "SELECT usename from student";
            $res=mysqli_query($db, $mysql);
            while($row= mysqli_fetch_assoc($res))
            {
             if(  $row['usename']==$_POST['usename'])
             {
                $count= $count+1;
             }
            }
            if($count==0){
            
            $sql = "INSERT INTO student values ('$_POST[first]', '$_POST[last]'
            ,'$_POST[usename]','$_POST[password]','$_POST[roll]','$_POST[email]',
            '$_POST[contact]','p.png')";
            $result = mysqli_query($db, $sql);
       ?>
       <script type="text/javascript">
        alert("Registraction successful");
           </script>
           <?php
          }
          else
          {
            ?>
            <script type="text/javascript">
        alert(" The Username already exist.");
           </script>
           <?php
          }
          }
        
           ?>
</body>
</html>