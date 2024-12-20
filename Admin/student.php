<?php
include "navbar.php";
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Information</title>
    <style>
      .srch{
         padding-left:900px;
      }
    </style>
</head>
<body>
                    <!-- search bar  -->
 <div class="srch">
   <form action="" class="navbar-form" method="POST" name="form1">
<input type="text" name="search" placeholder="student_username..." 
class="form-control" required>
<button type="submit" name="submit" class="btn btn-default"
style="background-color:#6bb6b9e6;"> 
<span class="glyphicon glyphicon-search"></span>
</button>
    </form>
     </div>
   <h2>List of students</h2> 
   <?php
    if(isset($_POST['submit']))
    {
 $q= mysqli_query($db,"SELECT first,last, usename ,roll,email, contact FROM `student`
  WHERE usename LIKE '$_POST[search]%' ");
     if(mysqli_num_rows($q)==0)
     {
      echo "sorry! no bstudent with that username found. Try again.";
     }
     else
     {
 echo "<table class='table table-bordered table-hover'> ";
   echo "<tr style='background-color:#6bb6b9e6;'>";
   // Table header 
   echo "<th>";  echo "First_name";  echo "</th>";
   echo "<th>"; echo " Last_name"; echo "</th>";
   echo "<th>"; echo "Username "; echo "</th>";
   echo "<th>"; echo "roll"; echo "</th>";
   echo "<th>"; echo "Email"; echo "</th>";
   echo "<th>"; echo "contact"; echo "</th>";
   
   echo "</tr>";
     while($row= mysqli_fetch_assoc($q))
     {
        echo "<tr>";
        echo "<tr>";
              echo "<td>";   echo $row['first'];  echo "</td>";
              echo "<td>";   echo $row['last'];  echo "</td>";
              echo "<td>";   echo $row['usename']; echo "</td>";
              echo "<td>";   echo $row['roll'];  echo "</td>";
              echo "<td>";   echo $row['email'];  echo "</td>";
              echo "<td>";   echo $row['contact'];  echo "</td>";
        echo "</tr>";
     }
     echo " <table>";
     }
    }
   //  if button is not prssed.
    else
      {
         $res = mysqli_query($db,"SELECT first,last, usename,  roll, email, contact FROM `student`
          ORDER BY `student`.`first` ASC;");
         echo "<table class='table table-bordered table-hover'> ";
         echo "<tr style='background-color:#6bb6b9e6;'>";
         // Table header 
         echo "<th>";  echo "First_name";  echo "</th>";
        echo "<th>"; echo " Last_name"; echo "</th>";
        echo "<th>"; echo "Username "; echo "</th>";
       echo "<th>"; echo "roll" ; echo "</th>";
       echo "<th>"; echo "Email"; echo "</th>";
       echo "<th>"; echo "contact"; echo "</th>";
         echo "</tr>";
           while($row= mysqli_fetch_assoc($res))
           {
              echo "<tr>";
              echo "<td>";   echo $row['first'];  echo "</td>";
              echo "<td>";   echo $row['last'];  echo "</td>";
              echo "<td>";   echo $row['usename']; echo "</td>";
              echo "<td>";   echo $row['roll'];  echo "</td>";
              echo "<td>";   echo $row['email'];  echo "</td>";
              echo "<td>";   echo $row['contact'];  echo "</td>";
              echo "</tr>";
           }
           echo " <table>"; 
      }

   ?>
</body>
</html>