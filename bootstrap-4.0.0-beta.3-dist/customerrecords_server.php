<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'leSpa');

	// initialize variables
	$id = "";
	$customer_no= "";
	$date = "";
	$update = false;

	if (isset($_GET['save'])) {
		$username = $_SESSION['username'];
		$customer_no = $_GET['customer_no'];
		$date = $_GET['date'];

		$query =  "INSERT INTO customer_records ( customer_no, date) VALUES ($customer_no, '$date')";
		mysqli_query($db,$query); 
		$_SESSION['message']; 
		header('location: CustomerRecords.php?username='.$username);
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$customer_no = $_POST['customer_no'];
		$date = $_POST['date(format)'];
		$query = "SELECT id FROM customer_records WHERE id = '$id'";
		$results = mysqli_query($db,$query);
		if(mysqli_num_rows($results)){
			while ($row=mysqli_fetch_array($results)) {
				mysqli_query($db, "UPDATE customer_records SET id='$id', customer_no='$customer_no' ,date='$date' WHERE id='$id'" );
				$_SESSION['message']; 
				header('location: CustomerRecords.php?username='.$row['username']);
			}
		}else{
		    echo "error";
		}
		

	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM customer_records WHERE id=$id");
	$_SESSION['message']; 
	header('location: CustomerRecords.php?username='.$row['username']);
}


	$results = mysqli_query($db, "SELECT customer_records.id, concat(customer.firstname,' ', customer.middle_initial,'. ', customer.lastname,' ', customer.Ext) as customer_no , customer_records.date FROM `customer_records`, customer where customer_records.customer_no = customer.customer_no");


	//Add button
	if(isset($_POST['back'])){
		header("location: CustomerRecord.php?username=".$row['username']);
		
	}
	
	// ...	
		if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM customer_records WHERE id=$id");

		if (mysqli_num_rows($record) == 1) {
			while ($n = mysqli_fetch_array($record)){
				$id = $n['id'];
				$customer_no = $n['customer_no'];
				$date = $n['date'];
			}
		}

	}
?>
