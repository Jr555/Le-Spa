<?php 
include('server1.php');

?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Employee</title>
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
</head>
<body>
<style>
body {
  background: url('Le3.jpg');
}
form, .content {
  background-color: white;
  width: 35%;
  margin: 0px auto;
  padding: 20px;
  border: 3px solid #000000;
  border-radius: 30px 30px 30px 30px;
  color: black;
}
input[type=text] {
	border: 2px solid #00008B;
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
   <img src="lep.png" width="80" height="50" >
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="        navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
	<?php
	if(isset($_GET['edit'])){
		$employee_no = $_GET['edit'];
		$result1 = mysqli_query($db, "SELECT * FROM employee WHERE employee_no = '$employee_no'");
?>
<form method="post" action="" >
<table class="table table-dark">
	<thead>
	    <tr>
			<th></th>
			<th></th>
			<th><h1><font color="red"><center>LE SPA</center></font></h1></th>
			<th colspan="2"></th>
		</tr>
		<tr>
			<th><center>Employee No</center></th>
			<th><center>FirstName</center></th>
			<th><center>Middle Initial</center></th>
			<th><center>Lastname</center></th>
			<th><center>Extention</center></th>
			<th colspan="2">UPDATE</th>
		</tr>
	</thead>

	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><center><?php echo $row['employee_no']; ?></center></td>
			<td><center><?php echo $row['firstname']; ?></center></td>
			<td><center><?php echo $row['middle_initial']; ?></center></td>
			<td><center><?php echo $row['lastname']; ?></center></td>
			<td><center><?php echo $row['Ext']; ?></center></td>
			<td>
				<a href="edit.php?edit=<?php echo $row['employee_no']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server1.php?del=<?php echo $row['employee_no']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } 
	} ?>
</table>
	




	<input type="hidden" name="employee_no" value="<?php echo $employee_no; ?>">
	<input type="hidden" name="username" value="<?php echo $_GET['username']; ?>">

	<b><font color="black"><div class="input-group">
		<label>Employee Firstname </label>
		<input type="text" name="firstname" required value="<?php echo $firstname; ?>">
	</div><br>
	<div class="input-group">
		<label>Employee Middle Initial </label>
		<input type="text" name="middle_initial" value="<?php echo $middle_initial; ?>">
	</div><br>
	<div class="input-group">
		<label>Employee Lastname </label>
		<input type="text" name="lastname" required value="<?php echo $lastname; ?>">
		<select name="Ext">
    	 <option value="">Ext</option>
         <option value="Jr">Jr</option>
         <option value="Sr">Sr</option>
         <option value="II">II</option>
         <option value="III">III</option>
        </select>
	</div>
	<div class="input-group">

		<?php if ($update == true): ?>
		
			<div class="input-group">
  	          <b><button class="btn" type="submit" name="update" style="background: #0000FF;" ><font color="white"><b>Save</b></font></button></b>
  	        </div>
		<?php else: ?>
			<b><button class="btn" type="submit" name="update"><b>Save</b></button></b>
		<?php endif ?>
			<p class="change_link">
			  <a href="login.php"><font color="red"><b>Logout</b></font></a>
			</p>
	</div>

</form>
</body>
</html>
