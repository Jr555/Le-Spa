<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'leSpa');

	// initialize variables
	$id = "";
	$service_code= "";
	$employee_no = "";
	$update = false;

	if (isset($_GET['save'])) {
		$username = $_SESSION['username'];
		$service_code = $_GET['service_code'];
		$employee_no = $_GET['employee_no'];

		$query =  "INSERT INTO service_records (service_code, employee_no) VALUES ($service_code, '$employee_no')";
		mysqli_query($db,$query); 
		$_SESSION['message']; 
		header('location: ServiceRecords.php?username='.$username);
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$service_code = $_POST['service_code'];
		$employee_no = $_POST['employee_no'];
		$query = "SELECT id FROM service_records WHERE id = '$id'";
		$results = mysqli_query($db,$query);
		if(mysqli_num_rows($results)){
			while ($row=mysqli_fetch_array($results)) {
				mysqli_query($db, "UPDATE service_records SET id='$id', service_code='$service_code' ,employee_no='$employee_no' WHERE id='$id'" );
				$_SESSION['message']; 
				header('location: ServiceRecords.php?username='.$row['username']);
			}
		}else{
		    echo "error";
		}
		

	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM service_records WHERE id=$id");
	$_SESSION['message']; 
	header('location: ServiceRecords.php?username='.$row['username']);
}

    
	

	//Add button
	if(isset($_POST['back'])){
		header("location: ServiceRecord.php?username=".$row['username']);
		
	}
	
	// ...	
		if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM service_records WHERE id=$id");

		if (mysqli_num_rows($record) == 1) {
			while ($n = mysqli_fetch_array($record)){
				$id = $n['id'];
				$service_code = $n['service_code'];
				$employee_no = $n['employee_no'];
			}
		}

	}
?>
