<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'leSpa');

	// initialize variables
	$firstname = "";
	$middle_initial= "";
	$lastname = "";
	$employee_no = 0;
	$update = false;

	if (isset($_POST['save'],$_GET['username'])) {
		$username = $_GET['username'];
		$firstname = $_POST['firstname'];
		$middle_initial = $_POST['middle_initial'];
		$lastname = $_POST['lastname'];

		mysqli_query($db, "INSERT INTO employee (username, firstname, middle_initial, lastname) VALUES ('$username','$firstname', '$middle_initial', '$lastname')"); 
		$_SESSION['message']; 
		header('location: Employee.php?username='.$username);
	}


	if (isset($_POST['update'])) {
		$employee_no = $_POST['employee_no'];
		$firstname = $_POST['firstname'];
		$middle_initial = $_POST['middle_initial'];
		$lastname = $_POST['lastname'];
		$query = "SELECT username FROM employee WHERE employee_no = $employee_no";
		$results = mysqli_query($db,$query);
		if(mysqli_num_rows($results)){
			while ($row=mysqli_fetch_array($results)) {
				mysqli_query($db, "UPDATE employee SET firstname='$firstname', middle_initial='$middle_initial' ,lastname='$lastname' WHERE employee_no=$employee_no" );
				$_SESSION['message']; 
				header('location: Employee.php?username='.$row['username']);
			}
		}

	}

if (isset($_GET['del'])) {
	$employee_no = $_GET['del'];
	mysqli_query($db, "DELETE FROM employee WHERE employee_no=$employee_no");
	$_SESSION['message']; 
	header('location: Employee.php');
}


	$results = mysqli_query($db, "SELECT * FROM employee");


	//Add button
	if(isset($_POST['back'])){
		header("location: Employee.php");
		
	}
	
	// ...	
		if (isset($_GET['edit'])) {
		$employee_no = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM employee WHERE employee_no=$employee_no");

		if (mysqli_num_rows($record) == 1) {
			while ($n = mysqli_fetch_array($record)){
				$username = $n['username'];
				$firstname = $n['firstname'];
				$middle_initial = $n['middle_initial'];
				$lastname = $n['lastname'];
			}
		}

	}
?>
