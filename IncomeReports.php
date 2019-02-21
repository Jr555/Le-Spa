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
	background-size: cover;
    background-position: center; 
    height: 800px;">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<img src="lep.png" width="50" height="50" alt="logo">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="Employee.php?username=<?php echo $_GET['username'];?>">Employee</a>	
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="Customer.php?username=<?php echo $_GET['username'];?>">Customer</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="Services.php?username=<?php echo $_GET['username'];?>">Service</a>
      </li> 
	  <li class="nav-item">
        <a class="nav-link" href="IncomeReports.php?username=<?php echo $_GET['username'];?>">Income Reports</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="CommissionReports.php?username=<?php echo $_GET['username'];?>">Commission Reports</a>
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
	<?php } 
	 ?>
</table>
	
  <input type="hidden" name="id" value="<?php echo $id; ?>">
    
	<table class="table table-hover table-stripped">
  <thead class="thead-dark">
  	<tr><h1><center><font color="red">Income Reports</font></center></h1></tr>
    <tr>
      <th scope="col"><center>SERVICES</center></th>
	   <th scope="col"><center>DATE</center></th>
      <th scope="col"><center>PAYMENTS</center></th>
	</tr>
  </thead>
  <tbody class="text-center">

	<tr>
		<th>Whole Body Massage</th>
		<th>2/14/2019</th>
		<th>P1,000,000</th>
  	</tr>
  	<tr>
		<th>Half Body Massage</th>
	    <th>2/14/2019</th>
		<th>P500,000</th>
  	</tr>
  	<tr>
		<th>Legs Massage</th>
		<th>2/14/2019</th>
		<th>P500,000</th>
  	</tr>
  </tbody>
</table>

</body>
</html>
