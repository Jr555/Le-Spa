<?php 
include('server1.php');

?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Income Reports</title>
	<link rel="stylesheet" type="text/css" href="welcome.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
</head>
<body style="background: url('logos.png');
	background-repeat: no-repeat;
	background-size: 100%;
    background-position: center; 
    height: 800px;">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<img src="lep.png" width="50" height="50" alt="logo">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="Employee.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Employee.php">Employee</a>	
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="Customer.php">Customer</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="Services.php">Service</a>
      </li> 
	  <li class="nav-item">
        <a class="nav-link" href="Income Reports.php">Income Reports</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="Commission Reports.php">Commission Reports</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

	<?php if (isset($_SESSION['message'])): ?>
  	
		<div class="msg">
		
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php
	if(isset($_GET['username'])){
		$username = $_GET['username'];
		$results = mysqli_query($db, "SELECT * FROM users,contact WHERE users.username = '$username' AND contact.username = '$username'");
?>
	<form method="post" action="" >

<table class="table table-hover table-stripped">
  <thead class="thead-dark">
	<thead>
	    <tr>
			<th><img src="logo.jpg" width="50" height="50" alt="logo"></th>
			<th></th>
			<th><center><h1><font color="red">LE SPA</font></h1></center></th>
			<th colspan="2"></th>
		</tr>
		<tr>
			<th>Name</th>
			<th>Address</th>
			<th>PhoneNumber</th>
			<th colspan="2">UPDATE</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td><?php echo $row['phone_number']; ?></td>
			<td>
				<a href="edit.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server1.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } 
	} ?>
</table>
	




	<input type="hidden" name="id" value="<?php echo $id; ?>">
    
	<table class="table table-hover table-stripped">
  <thead class="thead-dark">
  	<tr>
  		<th></th>
		<th><center><h1><font color="red">INCOME REPORTS</font></h1></center></th>
		<th></th>
  	</tr>
    <tr>
      <th scope="col"><center>SERVICES</center></th>
	   <th scope="col"><center>DATE</center></th>
      <th align="center" colspan='2' scope="col"><center>PAYMENTS</center></th>
	</tr>
  </thead>
  <tbody class="text-center">

	<tr>
		<th>BACK MASSAGE</th>
		<th>1/5/2018</th>
		<th>P5,000</th>
  	</tr>
  	<tr>
		<th>OIL MASSAGE</th>
	    <th>2/10/2018</th>
		<th>P600</th>
  	</tr>
  	<tr>
		<th>RUSSIAN MASSAGE</th>
		<th>3/15/2018</th>
		<th>P5,000</th>
  	</tr>
  	<tr>
		<th>SMOOTH OIL MASSAGE</th>
		<th>4/20/2018</th>
		<th>P200</th>
  	</tr>
  	<tr>
		<th>NATURAL MASSAGE</th>
		<th>5/25/2018</th>
		<th>P250</th>
  	</tr>
  </tbody>
</table>

		<?php if ($update == true): ?>
		
			<div class="input-group">
  	          <b><button class="btn" type="submit" name="update" style="background: #0000FF;" ><font color="white">Save</font></button></b>
  	        </div>
		<?php else: ?>
			<b><button class="btn" type="submit" name="save" >Save</button></b>
		<?php endif ?>
			<p class="change_link">
			  <b><a href="login.php"><font color="red">Logout</font></a></b>
			</p>
	</div>

</form>
</body>
</html>
