<?php
	session_start();
      include("controller.php");
	include("dbconnect.php");
	$lm= date('Y-m',strtotime("last day of last month"));
	$x=explode("-",$lm);
	$m=(int)$x[1]-5;
	if($m<1)
	{
		$m=$m+12;
	}
	for($i=0;$i<7;$i++)
	{
		$count_pending=0;
		$count_ok=0;
		$count_done=0;
		$sq="select count(last_date) count_pending from task where last_date between '$x[0]-$m-01' AND '$x[0]-$m-31'";
		 $result = mysqli_query($con, $sq);
		 while($row=mysqli_fetch_array($result))
		 {
			 $count_pending = $row['count_pending']; 
		 }
		$sq="select count(last_date) count_done, sum(Submit_date<=last_date) count_ok from performance where last_date between '$x[0]-$m-01' AND '$x[0]-$m-31'";
		 $result = mysqli_query($con, $sq);
		 while($row=mysqli_fetch_array($result))
		 {
			 
			 $count_done = $row['count_done'];
			 $count_ok=$row['count_ok'];
		 }
		 echo $count_pending.' '. $count_done." ". $count_ok;
		 echo"</br>";
		$m++;
	}
	
	
							
?>