<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'leSpa');

	// initialize variables
	$firstname = "";
	$middle_initial= "";
	$lastname = "";
	$address = "";
	$contact_number = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'],$_GET['username'])) {
		$username = $_GET['username'];
		$firstname = $_POST['firstname'];
		$middle_initial = $_POST['middle_initial'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$contact_number = $_POST['contact_number'];

		mysqli_query($db, "INSERT INTO customer (username, firstname, middle_initial, lastname, address, contact_number) VALUES ('$username','$firstname', '$middle_initial', '$lastname', '$address', '$contact_number')"); 
		$_SESSION['message']; 
		header('location: Customer.php?username='.$username);
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$middle_initial = $_POST['middle_initial'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$contact_number = $_POST['contact_number'];
		$query = "SELECT username FROM customer WHERE id = $id";
		$results = mysqli_query($db,$query);
		if(mysqli_num_rows($results)){
			while ($row=mysqli_fetch_array($results)) {
				mysqli_query($db, "UPDATE customer SET firstname='$firstname', middle_initial='$middle_initial' ,lastname='$lastname' ,address='$address' ,contact_number='$contact_number' WHERE id=$id" );
				$_SESSION['message']; 
				header('location: Customer.php?username='.$row['username']);
			}
		}

	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM customer WHERE id=$id");
	$_SESSION['message']; 
	header('location: Customer.php');
}


	$results = mysqli_query($db, "SELECT * FROM customer");


	//Add button
	if(isset($_POST['back'])){
		header("location: Customer.php");
		
	}
	
	// ...	
		if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM customer WHERE id=$id");

		if (mysqli_num_rows($record) == 1) {
			while ($n = mysqli_fetch_array($record)){
				$username = $n['username'];
				$firstname = $n['firstname'];
				$middle_initial = $n['middle_initial'];
				$lastname = $n['lastname'];
				$address = $n['address'];
				$contact_number = $n['contact_number'];
			}
		}

	}
?>
