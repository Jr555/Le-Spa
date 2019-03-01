<?php 
include('server1.php');

?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Commission Reports</title>
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
      <li class="nav-item">
        <a class="nav-link" href="ServiceRecords.php?username=<?php echo $_GET['username'];?>">Service Records</a>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
      <img src="unnamed.png" width="50" height="50" alt="logo">
      <img src="ustp.png" width="50" height="50" alt="logo">
    </div>
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
	<?php } ?>
</table>
	
  <input type="hidden" name="id" value="<?php echo $id; ?>">
    
	<table class="table table-hover table-stripped">
  <thead class="thead-dark">
  	<tr><h1><center><font color="red">Commission Reports</font></center></h1></tr>
    <tr>
      <th scope="col"><center>EMPLOYEE NAME</center></th>	
      <th scope="col">CUSTOMER NAME</th>
      <th scope="col">SERVICES</th>
	  <th scope="col">DATE</th>
      <th scope="col">PAYMENTS</th>
	</tr>
  </thead>
  <tbody class="text-align">
    <tr>
		<th><center>Liza Soberano</center></th>
		<th>Edwin Ending II</th>
	    <th>Whole Body Massage</th>
	    <th>2/14/2019</th>
	    <th>P1,000,000</th>
  	</tr>
  	<tr>
		<th><center>Yassi Pressman</center></th>
	    <th>Matthew Flor</th>
	    <th>Half Body Massage</th>
        <th>2/14/2019</th>
        <th>P500,000</th>
  	</tr>
  	<tr>
		<th><center>Pia Wurtchback</center></th>
		<th>Kilven Mark Badiang</th>
		<th>Back Massage</th>
        <th>2/14/2019</th>
        <th>P500,000</th>
  	</tr>
  </tbody>
</table>
</form>
</body>
</html>
