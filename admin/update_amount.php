<?php
	 include("dbconnect.php");
	$email=$_POST['email'];
	$due_val=0;
	$query="select total_due from due where email='$email'";
	$get_result=mysqli_query($conn,$query);
	while($row3=mysqli_fetch_array($get_result))
	{
		$due_val=$row3['total_due'];
	}
	echo $due_val;
?>