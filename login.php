<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<h1><center><b><font color="darkgreen"></font></b></center></h1>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="index.css">
<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
</head>
<body style="background: url('le.jpg');
	background-repeat: no-repeat;
	background-size: cover;
    background-position: center;
    margin-top: 233px">
<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
            // Redirect user to index.php
	    header("Location: Employee.php?username=$username");
         }else{
	echo "<div class='form'>
<center><h1>Username/Password is incorrect.</h1>
<br><h3>Click here to</h3><a href='login.php'><h4><font color='red'><b>Login</b></font></h4></a></div></center>";
	}
    }else{
?>
<center><div class="form">
<h1><font color="red">Log In</font></h1>
<form action="" method="post" name="login">
<b><div class="input-group">
<input type="text" name="username" placeholder="Username" required /><br><br>
</div>
<b><div class="input-group">
<input type="password" name="password" placeholder="Password" required /><br><br>
</div>
<center><div class="input-group">
<button type="submit" class="btn" name="reg_user">Log In</button>
</div></b></center>
</form>
<p><h4><b>Not registered yet? <a href='registration.php'><font color="white">Register</font></b></h4></a></p>
</div></center>
<?php } ?>
</body>
</html>