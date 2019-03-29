<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'leSpa');

	// initialize variables
	$firstname = "";
	$middle_initial= "";
	$lastname = "";
	$address = "";
	$contact_number = "";
	$customer_no = 0;
	$update = false;

	if (isset($_POST['save'],$_GET['username'])) {
		$username = $_GET['username'];
		$firstname = $_POST['firstname'];
		$middle_initial = $_POST['middle_initial'];
		$lastname = $_POST['lastname'];
		$Ext = $_POST['Ext'];
		$address = $_POST['address'];
		$contact_number = $_POST['contact_number'];

		mysqli_query($db, "INSERT INTO customer (firstname, middle_initial, lastname, Ext, address, contact_number) VALUES ('$firstname', '$middle_initial', '$lastname', '$Ext', '$address', '$contact_number')"); 
		$_SESSION['message']; 
		header('location: Customer.php?username='.$username);
	}


	if (isset($_POST['update'])) {
		$customer_no = $_POST['customer_no'];
		$firstname = $_POST['firstname'];
		$middle_initial = $_POST['middle_initial'];
		$lastname = $_POST['lastname'];
		$Ext = $_POST['Ext'];
		$address = $_POST['address'];
		$contact_number = $_POST['contact_number'];
		$query = "SELECT customer_no FROM customer WHERE customer_no = $customer_no";
		$results = mysqli_query($db,$query);
		if(mysqli_num_rows($results)){
			while ($row=mysqli_fetch_array($results)) {
				mysqli_query($db, "UPDATE customer SET firstname='$firstname', middle_initial='$middle_initial' ,lastname='$lastname' ,Ext='$Ext' ,address='$address' ,contact_number='$contact_number' WHERE customer_no=$customer_no" );
				$_SESSION['message']; 
				header('location: Customer.php?username='.$row['username']);
			}
		}

	}

if (isset($_GET['del'])) {
	$customer_no = $_GET['del'];
	mysqli_query($db, "DELETE FROM customer WHERE customer_no=$customer_no");
	$_SESSION['message']; 
	header('location: Customer.php?username='.$row['username']);
}

	$results = mysqli_query($db, "SELECT * FROM customer");


	//Add button
	if(isset($_POST['back'])){
		header("location: Customer.php?username=".$row['username']);
		
	}
	
	// ...	
		if (isset($_GET['edit'])) {
		$customer_no = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM customer WHERE customer_no=$customer_no");

		if (mysqli_num_rows($record) == 1) {
			while ($n = mysqli_fetch_array($record)){
				$customer_no = $n['customer_no'];
				$firstname = $n['firstname'];
				$middle_initial = $n['middle_initial'];
				$lastname = $n['lastname'];
				$Ext = $n['Ext'];
				$address = $n['address'];
				$contact_number = $n['contact_number'];
			}
		}

	}
?>
