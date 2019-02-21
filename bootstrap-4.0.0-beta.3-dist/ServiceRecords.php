<!DOCTYPE html>
<html>
<head>
	<title>Service</title>
	<link rel="stylesheet" type="text/css" href="service_records.css">
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
    <div class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
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
<center>
</center>
<form>
  <b>
  <div class="form-group">
    <label>Customer</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Customer Name">
    <select name="">
    	    <option value="">Select Customer</option>
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
    </select>
  </div>
  <div class="form-group">
    <label>Services</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Service">
    <select name="">
    	    <option value="">Services</option>
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
    </select>
  </div>
  <div class="form-group">
    <label>Employee</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Employee Name">
    <select name="">
    	    <option value="">Select Employee</option>
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
    </select>
  </div>
</b>
<center>
  <button type="submit" class="btn btn-primary">Submit</button>
</center>
</form>
</body>
</html>