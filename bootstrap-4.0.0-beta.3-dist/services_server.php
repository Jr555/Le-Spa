<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'leSpa');

	// initialize variables
	$description = "";
	$price= "";
	$duration = "";
	$commission = "";
	$service_code = 0;
	$update = false;

	if (isset($_POST['save'],$_GET['username'])) {
		$username = $_GET['username'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$duration = $_POST['duration'];
		$commission = $_POST['commission'];

		mysqli_query($db, "INSERT INTO service (description, price, duration, commission) VALUES ('$description', '$price', '$duration', '$commission')"); 
		$_SESSION['message']; 
		header('location: Services.php?username='.$username);
	}


	if (isset($_POST['update'])) {
		$service_code= $_POST['service_code'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$duration = $_POST['duration'];
		$commission = $_POST['commission'];
		$query = "SELECT service_code FROM service WHERE service_code = $service_code";
		$results = mysqli_query($db,$query);
		if(mysqli_num_rows($results)){
			while ($row=mysqli_fetch_array($results)) {
				mysqli_query($db, "UPDATE service SET description='$description', price='$price' ,duration='$duration' ,commission='$commission' WHERE service_code=$service_code" );
				$_SESSION['message']; 
				header('location: Services.php?username='.$row['username']);
			}
		}

	}

if (isset($_GET['del'])) {
	$service_code = $_GET['del'];
	mysqli_query($db, "DELETE FROM service WHERE service_code=$service_code");
	$_SESSION['message']; 
	header('location: Services.php?username='.$row['username']);
}


	$results = mysqli_query($db, "SELECT * FROM service");


	//Add button
	if(isset($_POST['back'])){
		header('location: Services.php?username='.$row['username']);
		
	}
	
	// ...	
		if (isset($_GET['edit'])) {
		$service_code = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM service WHERE service_code=$service_code");

		if (mysqli_num_rows($record) == 1) {
			while ($n = mysqli_fetch_array($record)){
				$service_code = $n['service_code'];
				$description = $n['description'];
				$price = $n['price'];
				$duration = $n['duration'];
				$commission = $n['commission'];
			}
		}

	}
?>
