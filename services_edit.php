<?php 
include('services_server.php');

?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Services</title>
	<link rel="stylesheet" type="text/css" href="welcome.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
</head>
<body style="background: url('lemas.jpg');
	background-repeat: no-repeat;
	background-size: cover;
    background-position: center; 
    height: 400px;">
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
        <a class="nav-link" href="Income Reports.php?username=<?php echo $_GET['username'];?>">Income Reports</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="Commission Reports.php?username=<?php echo $_GET['username'];?>">Commission Reports</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<?php
	if(isset($_GET['username'])){
		$username = $_GET['username'];
		$results = mysqli_query($db, "SELECT * FROM service");
    }
?>
<form method="post" action="">
<table class="table table-dark">
	<thead>
	    <tr>
			<th></th>
			<th></th>
			<th><center><h1><font color="red">LE SPA</font></h1></center></th>
			<th colspan="2"></th>
		</tr>
		<tr>
			<th><center>Service Code</center></th>
			<th><center>Description</center></th>
			<th><center>Price</center></th>
			<th><center>Duration</center></th>
			<th><center>Commission</center></th>
			<th colspan="2">UPDATE</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><center><?php echo $row['service_code']; ?></center></td>
			<td><center><?php echo $row['description']; ?></center></td>
			<td><center>₱ <?php echo $row['price']; ?></center></td>
			<td><center><?php echo $row['duration']; ?></center></td>
			<td><center><?php echo $row['commission']; ?></center></td>
			<td>
				<a href="services_edit.php?edit=<?php echo $row['service_code']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="services_server.php?del=<?php echo $row['service_code']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } 
?>
</table>
	




	<input type="hidden" name="service_code" value="<?php echo $service_code; ?>">

	<b><font color="yellow"><div class="input-group">
	<div class="input-group">
		<label>Description :</label>
		<input type="text" name="description" required value="<?php echo $description; ?>">
	</div><br>
	<div class="input-group">
		<label>Price :</label>
		<input type="text" name="price" required value="<?php echo $price; ?>">
	</div><br>
	<div class="input-group">
		<label>Duration :</label>
		<input type="text" name="duration" required value="<?php echo $duration; ?>">
	</div><br>
    <div class="input-group">
		<label>Commission :</label>
		<input type="text" name="commission" value="<?php echo $commission; ?>">
	</div><br></font><br>
	<div class="input-group">

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
