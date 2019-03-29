<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<h1><center><b><font color="darkgreen"></font></b></center></h1>
<title>Login</title>
<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
</head>
<body>
<style>
	* {
  margin: 0px;
  padding: 0px;
}
body {
  font-size: 120%;
  background: url('le.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: height:50% center; 
}

.header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background: #000080;
  text-align: center;
  border: 1px solid #FFFFFF;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #C0C0C0;
  border-radius: 10px 10px 10px 10px;
  color: firebrick;
  margin-top: 3%;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  width: 318px;
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #000080;
  border: none;
  border-radius: 5px;
}
.button {
  width: 100px;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}
</style>
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
<center><div class="form"><br><br><br>
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
<p><h4><b>Not registered yet? <a href='registration.php'><font color="black">Register</font></b></h4></a></p>
</div></center>
<?php } ?>
</body>
</html>