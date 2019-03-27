<?php 
include('customer_server.php');

?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Customer</title>
	<link rel="stylesheet" type="text/css" href="welcome.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
</head>
<body>
<style>
body {
    background: url('co.jpg');
}
img, .logo {
	border-radius: 30px 30px 30px 30px;
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
		$results = mysqli_query($db, "SELECT * FROM customer");
	}
?>
<form method="post" action="">
<table class="table table-dark">
	<thead>
	    <tr>
			<th></th>
			<th></th>
			<th><h1><center><font color="red">LE SPA</font></center></h1></th>
			<th colspan="2"></th>
		</tr>
		<tr>
			<th><center>Customer No</center></th>
			<th><center>FirstName</center></th>
			<th><center>Middle Initial</center></th>
			<th><center>Lastname</center></th>
			<th><center>Extention</center></th>
			<th><center>Address</center></th>
			<th><center>Contact Number</center></th>
			<th colspan="2">UPDATE</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><center><?php echo $row['customer_no']; ?></center></td>
			<td><center><?php echo $row['firstname']; ?></center></td>
			<td><center><?php echo $row['middle_initial']; ?></center></td>
			<td><center><?php echo $row['lastname']; ?></center></td>
			<td><center><?php echo $row['Ext']; ?></center></td>
			<td><center><?php echo $row['address']; ?></center></td>
			<td><center><?php echo $row['contact_number']; ?></center></td>

			<td>
				<a href="customer_edit.php?edit=<?php echo $row['customer_no']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="customer_server.php?del=<?php echo $row['customer_no']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } 
	
?>
</table>
	




	<input type="hidden" name="customer_no" value="<?php echo $customer_no; ?>">

	<b><font color="blue"><div class="input-group">
		<label>Customer Firstname :</label>
		<input type="text" name="firstname" required value="<?php echo $firstname; ?>">
	</div><br>
	<div class="input-group">
		<label>Customer Middle Initial :</label>
		<input type="text" name="middle_initial" value="<?php echo $middle_initial; ?>">
	</div><br>
	<div class="input-group">
		<label>Customer Lastname :</label>
		<input type="text" name="lastname" required value="<?php echo $lastname; ?>">
		<select name="Ext">
    	 <option value="">Ext</option>
         <option value="Jr">Jr</option>
         <option value="Sr">Sr</option>
         <option value="II">II</option>
         <option value="III">III</option>
        </select><br>
	</div>
    </br>
	<div class="input-group">
		<label>Customer Address :</label>
		<input type="text" name="address" required value="<?php echo $address; ?>">
	</div><br>
	<div class="input-group">
		<label>Contact Number :</label>
		<input type="text" name="contact_number" required value="<?php echo $contact_number; ?>">
	</div></font><br>
	<div class="input-group">

		<?php if ($update == true): ?>
		
			<div class="input-group">
  	          <button class="btn" type="submit" name="update" style="background: #0000FF;" ><font color="white"><b>Update</b></font></button>
  	        </div>
		<?php else: ?>
			  <button class="btn" type="submit" name="save"><b>Save</b></button>
		<?php endif ?>
			<p class="change_link">
			  
			</p>
	</div>
</form>
</body>
</html>
