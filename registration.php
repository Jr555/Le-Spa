<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="index.css">
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
  background-position: center; 
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
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<center><h1><font color='red'>Welcome to Le Spa</font></h1>            
<center><h1><font color='blue'>You are now registered!</font></h1>
<br><h3><font color='white'>Click here to</font></h3><a href='login.php'><h4><font color='red'><b>Login</b></font></h4></a></div></center>";
	}
    }else{
?>
<center><div class="form">
<h1><font color="red">Registration</font></h1>
<form name="registration" action="" method="post">
<b><div class="input-group">
<input type="text" name="username" placeholder="Username" required /><br><br>
</div>
<b><div class="input-group">
<input type="text" name="firstname" placeholder="Firstname" required /><br><br>
</div>
<b><div class="input-group">
<input type="text" name="lastname" placeholder="Lastname" required /><br><br>
</div>
<b><div class="input-group">
<input type="email" name="email" placeholder="Email" required /><br><br>
</div>
<b><div class="input-group">
<input type="password" name="password" placeholder="Password" required /><br><br>
</div>
<b><div class="input-group">
<input type="password" name="confirm password" placeholder=" Confirm Password" required /><br><br>
</div>
<div class="input-group">
<button type="submit" class="btn" name="reg_user">Register</button>
</div></b>
<p>
<b><h4>Already a member?<a href="login.php"><font color="black">Log In</font></b></h4></a>
</p>
</form>
</div></center>
<?php } ?>
</body>
</html>