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
<body>
<style>
body {
    background: url('lemas.jpg');
}
input[type=text] {
	border: 2px solid #000000;
	border-radius: 5px 5px 5px 5px;
}
select {
	border: 2px solid #00008B;
	border-radius: 5px 5px 5px 5px;
}
button {
	background-color: #0000FF;
}
img, .logo {
	border-radius: 30px 30px 30px 30px;
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
      	<button type="button" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="List of Employees">
          <a class="nav-link" href="Employee.php?username=<?php echo $_GET['username'];?>">Employee</a>
        </button>
      </li>
	  <li class="nav-item">
	  	<button type="button" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="List of Customers">
          <a class="nav-link" href="Customer.php?username=<?php echo $_GET['username'];?>">Customer</a>
        </button>
      </li>
	  <li class="nav-item">
	  	<button type="button" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="List of Services">
          <a class="nav-link" href="Services.php?username=<?php echo $_GET['username'];?>">Service</a>
        </button>
      </li> 
      <li class="nav-item">
      	<button type="button" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Records of Customers">
          <a class="nav-link" href="CustomerRecords.php?username=<?php echo $_GET['username'];?>">Customer Records</a>
        </button>
      </li>
      <li class="nav-item">
      	<button type="button" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Records of Services">
          <a class="nav-link" href="ServiceRecords.php?username=<?php echo $_GET['username'];?>">Service Records</a>
        </button>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
      <button type="button" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Bachelor of Science in 
         Information Technology">
         <img src="unnamed.png" width="50" height="50" alt="logo">
      </button>
      <button type="button" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="University of Science and Technology of Southern Philippines">
         <img src="ustp.png" width="50" height="50" alt="logo">
      </button>
      <b><a href="Logout.php"><font color="red">Logout</font></a></b>
    </div>
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
			<td><center>₱ <?php echo $row['commission']; ?></center></td>
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
  	          <button class="btn" type="submit" name="update" style="background: #0000FF;" ><font color="white"><b>Update</b></font></button>
  	        </div>
		<?php else: ?>
			  <button class="btn" type="submit" name="save" ><b>Save</b></button>
		<?php endif ?>
			<p class="change_link">

			</p>
	</div>

</form>
</body>
</html>
