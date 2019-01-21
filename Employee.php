<?php 
include('server1.php');

?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Employee</title>
	<link rel="stylesheet" type="text/css" href="welcome.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
</head>
<body style="background: url('Le3.jpg');
	background-repeat: no-repeat;
	background-size: 100%;
    background-position: center; 
    height: 900px;">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <img src="lep.png" width="50" height="50" alt="logo">
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="        navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
		$results = mysqli_query($db, "SELECT * FROM users,employee WHERE users.username = '$username' AND employee.username = '$username'");
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
			<th>FirstName</th>
			<th>Middle Initial</th>
			<th>Lastname</th>
			<th colspan="2">UPDATE</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['firstname']; ?></td>
			<td><?php echo $row['middle_initial']; ?></td>
			<td><?php echo $row['lastname']; ?></td>
			<td>
				<a href="edit.php?edit=<?php echo $row['employee_no']; ?>" class="edit employee_btn" >Edit</a>
			</td>
			<td>
				<a href="server1.php?del=<?php echo $row['employee_no']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } 
	} ?>
</table>
	




	<input type="hidden" name="employee_no" value="<?php echo $employee_no; ?>">

	<b><font color="black"><div class="input-group">
		<label>Employee Firstname :</label>
		<input type="text" name="firstname" required value="<?php echo $firstname; ?>">
	</div><br>
	<div class="input-group">
		<label>Employee Middle Initial :</label>
		<input type="text" name="middle_initial" required value="<?php echo $middle_initial; ?>">
	</div><br>
	<div class="input-group">
		<label>Employee Lastname :</label>
		<input type="text" name="lastname" required value="<?php echo $lastname; ?>">
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
