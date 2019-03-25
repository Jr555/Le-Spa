<?php 
include('server1.php');

?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="new.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<img src="logo.jpg" width="50" height="50" alt="logo">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="login.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Employee.php">Employee</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="Customer.php">Customer</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="Services.php">Services</a>
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
			<th><center><h1><font color="red">LE SPA</font></h1></center></th>
			<th colspan="2"></th>
		</tr>
		<tr>
			<th>FirstName</th>
			<th>Middle Initial</th>
			<th>Lastname</th>
			<th>Salary</th>
			<th colspan="2">UPDATE</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['firstname']; ?></td>
			<td><?php echo $row['middle_initial']; ?></td>
			<td><?php echo $row['lastname']; ?></td>
			<td><?php echo $row['salary']; ?></td>

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

	<b><font color="black"><div class="input-group">
		<label>Employee Firstname: </label>
		<input type="text" name="firstname" required value="<?php echo $firstname; ?>">
	</div><br>
	<div class="input-group">
		<label>Employee Middle Initial: </label>
		<input type="text" name="middle_initial" required value="<?php echo $middle_initial; ?>">
	</div><br>
	<div class="input-group">
		<label>Employee Lastname: </label>
		<input type="text" name="lastname" required value="<?php echo $lastname; ?>">
	</div><br>
	<div class="input-group">
		<label>Salary: </label>
		<input type="text" name="salary" required value="<?php echo $salary; ?>">
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
