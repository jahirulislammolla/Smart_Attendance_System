<?php

     include 'dbconnect.php';


$task=$_POST["task"];
$date=$_POST["date"];
$email=$_POST['email'];
$now_date=date("Y-m-d");
$dept=$_POST["dept"];
$des=$_POST["des"];



$insert1 = "insert into task (email,department,designation,task,assign_date,last_date) values('$email','$dept','$des','$task','$now_date','$date')";
									
									
									
									$run_insert1 = mysqli_query($conn,$insert1);
									



?>