<?php 
include('customer_server.php');

?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Customer</title>
	<link rel="stylesheet" type="text/css" href="new.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
</head>
<body style="background: url('co.jpg');
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
	if(isset($_GET['edit'])){
		$customer_no = $_GET['edit'];
		$result1 = mysqli_query($db, "SELECT * FROM customer WHERE customer_no = '$customer_no'");
?>
	<form method="post" action="" >
<table class="table table-dark">
	<thead>
	    <tr>
			<th></th>
			<th></th>
			<th><h1><font color="red">LE SPA</font></h1></th>
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
	} 
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
	</div></br>
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
