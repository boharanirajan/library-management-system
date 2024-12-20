<?php
include "connection.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .form-control
        {
            width:220px;
            height:0 auto;
            color:white;
        }
        form   {
            padding-left:500px;
        }
        label
        {
            color: white;
        }
        /* input{
            color:black;
        } */
    </style>
    <title>Edit profile</title>
</head>
<body style="background-color:#004528;">
    <h2 style="text-align:center; color:#fff;">Edit information</h2>
    <?php
    $sql="SELECT * from admin where usename='$_SESSION[login_user]'";
    $result=mysqli_query($db,$sql) or die (mysqli_error());
    while($row=mysqli_fetch_assoc($result)){
        $first= $row['first'];
        $last= $row['last'];
        $usename= $row['usename'];
        $password= $row['password'];
        $email= $row['email'];
        $contact= $row['contact'];    

    }
    ?>
    <div class="profile_info" style="text-align:center;">
<span style="color:white;">Welcome</span>
<h4 style="color:white;"><?php echo $_SESSION['login_user']; ?></h4>
</div>
<br>
<form name="registration" action="" method="post" 
enctype="multipart/form-data" onsubmit="return validateForm()">
    <input class="form-control" type="file" name="file" id="fileInput" required>
    <label for="first">First Name:</label>
    <input class="form-control" type="text" name="first" 
    value="<?php echo $first; ?>" style="color: black;" required>
    <label for="last">Last Name:</label>
    <input class="form-control" type="text" name="last" 
    value="<?php echo $last; ?>"  style="color: black;" required>
    <label for="usename">Username:</label>
    <input class="form-control" type="text" name="usename" 
    value="<?php echo $usename; ?>" style="color: black;" required>
    <label for="password">Password:</label>
    <input class="form-control" type="text" name="password"
     value="<?php echo $password; ?>" style="color: black;" required>
    <label for="email">Email:</label>
    <input class="form-control" type="text" name="email" 
    value="<?php echo $email; ?>" style="color: black;" required>
    <label for="contact">Phone No:</label>
    <input class="form-control" type="text" name="contact" 
    value="<?php echo $contact; ?>" style="color: black;" required>
    <div style="padding-left:100px;"><button class="btn btn-default" type="submit" name="submit"> Save</button></div>
</form>

<script>
    function validateForm() {
        var fileInput = document.getElementById('fileInput');
        var allowedTypes = ['image/jpeg', 'image/png'];

        // Validate file type
        if (fileInput.files.length > 0) {
            var fileType = fileInput.files[0].type;
            if (!allowedTypes.includes(fileType)) {
                alert('Invalid file type. Please upload a JPEG or PNG file.');
                return false;
            }
        } else {
            alert('Please choose a file to upload.');
            return false;
        }

        // Validate other form fields
        var first = document.forms["registration"]["first"].value;
        var last = document.forms["registration"]["last"].value;
        var usename = document.forms["registration"]["usename"].value;
        var password = document.forms["registration"]["password"].value;
        var email = document.forms["registration"]["email"].value;
        var contact = document.forms["registration"]["contact"].value;

        // Basic Form Field Presence Check
        if (first === "" || last === "" || usename === "" || password === "" || email === "" || contact === "") {
            alert('All fields must be filled out.');
            return false;
        }

        // Validate email format
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Please enter a valid email address.');
            return false;
        }

        // Validate phone number
        var phoneRegex = /^(\+\d{1,2})?\d{10,}$/;
        if (!phoneRegex.test(contact)) {
            alert('Please enter a valid phone number.');
            return false;
        }

        return true; // Allow form submission
    }
</script>
<?php
if(isset($_POST['submit']))
{
    move_uploaded_file($_FILES['file']['tmp_name'],"images/". $_FILES['file']
    ['name']);
    $first= $_POST['first'];
    $last= $_POST['last'];
    $usename= $_POST['usename'];
    $password= $_POST['password'];
    $email= $_POST['email'];
    $contact=$_POST['contact']; 
    $pic=$_FILES['file'] ['name'];
    $sql = "UPDATE admin SET pic='$pic',first='$first', last='$last', usename='$usename', 
    password='$password', email='$email', contact='$contact' WHERE usename='" . $_SESSION['login_user'] . "'";

    if(mysqli_query($db,$sql))
    {
        ?>
        <script>
            alert("saved  successfully....");
            window.location="profile.php";
        </script>
    <?php
}
}

?>
</body>
</html>