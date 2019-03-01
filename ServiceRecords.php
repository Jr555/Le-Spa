<?php 
include('servicesrecords_server.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Service Records</title>
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
</head>
<body>
<style>
body {
  background: url('Logos.png');
}
form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 3px solid #000000;
  border-radius: 30px 30px 30px 30px;
  color: black;
}
input[type=text] {
	border: 2px solid #00008B #0000FF;
	border-radius: 5px 5px 5px 5px;
}
select {
	border: 2px solid #00008B;
	border-radius: 5px 5px 5px 5px;
}
button {
	background-color: #0000FF;
}
</style>
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
<table class="table table-hover table-stripped">
  <thead class="thead-dark">
  	<tr><h1><center><font color="red">Service Records</font></center></h1></tr>
    <tr>
      <th scope="col"><center>CUSTOMER</center></th>
	   <th scope="col"><center>SERVICES</center></th>
      <th scope="col"><center>EMPLOYEE</center></th>
	</tr>
  </thead>
  <tbody class="text-center">
	<tr>
		<th></th>
		<th></th>
		<th></th>
  	</tr>
  	<tr>
		<th></th>
	    <th></th>
		<th></th>
  	</tr>
  	<tr>
		<th></th>
		<th></th>
		<th></th>
  	</tr>
  </tbody>
</table>

<form>
  <b>
  <div class="col-md-13 mb-13">
    <label>Customer</label>
    <select class="form-control">
    	<?php 
        include('customer_server.php');

        ?>
    	<?php
    		$sql = mysqli_query($db,"SELECT * FROM customer");
    		while ($row = mysqli_fetch_array($results)) {

    	?>
    	<option value="<?php echo $row['customer_no']; ?>"><?php echo $row['firstname']," ",$row['middle_initial']," ",$row['lastname']," ",$row['Ext'] ?></option>
    	<?php
    		}

    	 ?>
    </select>
  </div>
  <div class="col-md-13 mb-13">
    <label>Services</label>
    <select class="form-control">
    	<?php 
        include('services_server.php');

        ?>
    	<?php
    		$sql = mysqli_query($db,"SELECT * FROM service");
    		while ($row = mysqli_fetch_array($results)) {

    	?>
    	<option value="<?php echo $row['service_code']; ?>"><?php echo $row['description'] ?></option>
    	<?php
    		}

    	 ?>
    </select>
  </div>
  <div class="col-md-13 mb-13">
    <label>Employee</label>
    <select class="form-control">
    	<?php 
        include('server1.php');
        
        ?>
    	<?php
    		$sql = mysqli_query($db,"SELECT * FROM employee");
    		while ($row = mysqli_fetch_array($results)) {

    	?>
    	<option value="<?php echo $row['employee_no']; ?>"><?php echo $row['firstname']," ",$row['middle_initial']," ",$row['lastname']," ",$row['Ext'] ?></option>
    	<?php
    		}

    	 ?>
    </select>
  </div><br>
</b>
<center>
  <button type="submit" class="btn"><font color="black"><b>Submit</b></font></button>
</center>
</form>
</center>
</body>
</html>