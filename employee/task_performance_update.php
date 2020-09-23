<?php
	include 'controller.php';
	include 'dbconnect.php';
	
	$email=$_POST["email"];
	$task=$_POST["task"];
	$date=$_POST['date'];
	$department=$_POST['department'];
	$current_date=date("Y-m-d");
			$insert1 = "insert into performance (last_date,Submit_date,email,department,task,action) values('$date','$current_date','$email','$department','$task','true')";
			$run_insert1 = mysqli_query($conn,$insert1);
			$delete="Delete from task where email='$email' and task='$task'";
			mysqli_query($conn,$delete);
			var_dump("done");
	
	
?>