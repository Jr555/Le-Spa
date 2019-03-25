<?php 
include('customerrecords_server.php');

?>
<!DOCTYPE html>
<html>
<head>
  <title>Customer Records</title>
  <link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
</head>
<body>
<style>
body {
  background: url('Logos.png');
}
form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 3px solid #000000;
  border-radius: 30px 30px 30px 30px;
  color: black;
}
input[type=text] {
  border: 2px solid #00008B #0000FF;
  border-radius: 5px 5px 5px 5px;
  width: 100%;
  height: 50%;
}
input[type=date] {
  border: 2px solid #00008B #0000FF;
  border-radius: 5px 5px 5px 5px;
  width: 100%;
  height: 50%;
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
        <a class="nav-link" href="CustomerRecords.php?username=<?php echo $_GET['username'];?>">Customer Records</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="ServiceRecords.php?username=<?php echo $_GET['username'];?>">Service Records</a>
    </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
      <button type="button" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Bachelor of Science in 
         Information Technology">
         <img src="unnamed.png" width="50" height="50" alt="logo">
      </button>
      <button type="button" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="University of Science and Technology of Southern Philippines">
         <img src="ustp.png" width="50" height="50" alt="logo">
      </button>
       <b><a href="Logout.php"><font color="red">Logout</font></a></b>
    </div>
  </div>
</nav>
<table class="table table-hover table-stripped">
  <thead class="thead-dark">
    <tr><h1><center><font color="red">Customer Records</font></center></h1></tr>
    <tr>
      <th scope="col"><center>ID</center></th>
      <th scope="col"><center>Customer Name</center></th>
      <th scope="col"><center>Date</center></th>
      <th scope="col">UPDATE</th>
    </tr>
  </thead>
  <?php while ($row = mysqli_fetch_array($results)) { ?>
    <tr>
      <td><center><?php echo $row['id']; ?></center></td>
      <td><center><?php echo $row['customer_no'] ?></center></td>
      <td><center><?php echo $row['date']; ?></center></td>
      <td>
        <a href="customerrecords_server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
      </td>
    </tr>
  <?php } 
  
    ?>
</table>

<form action="" method="GET">
  <b>
  <div class="col-md-13 mb-13">
    <label>Customer Name</label>
    <select class="form-control" name="customer_no">
      <option value=""></option>
      <?php 
        include('customer_server.php');

        ?>
      <?php
        $sql = mysqli_query($db,"SELECT * FROM customer");
        while ($row = mysqli_fetch_array($results)) {

      ?>
      <option value="<?php echo $row['customer_no']; ?>"><?php echo $row['firstname']." ".$row['middle_initial']." ".$row['lastname']." ".$row['Ext'] ?></option>
      <?php
        }

       ?>
    </select>
  </div>
  <div class="col-md-13 mb-13">
    <label>Date</label>
    <input type="date" name="date" required value="<?php echo $date; ?>">
  </div><br>
</b>
<div class="input-group">

    <?php if ($update == true): ?>
    
      <div class="input-group">
              <button class="btn" type="submit" name="update" style="background: #0000FF;" ><font color="white"><b>Update</b></font></button>
            </div>
    <?php else: ?>
              <button class="btn" type="submit" name="save"><b>Save</b></button>
    <?php endif ?>
      <p class="change_link">
       
      </p>
  </div>
</form>
</center>
</body>
</html>