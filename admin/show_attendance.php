<!doctype html>
<html>
<?php
session_start();
include("dbconnect.php");


if(!isset($_SESSION['email'])){
	
	header("location: http://localhost/smart_payroll/admin/login.php");
}
else {


$da=$_GET['date'];
?>
<?php include_once('first.php') ?>
<?php include_once('../header.php') ?>
             <?php include_once('../sidebar.php') ?>

   
   
   
   
   <div class="content-wrapper">

  <section class="content-header">
          <h1>
            Dashboard
                             
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

<div class="content">
<div class="panel panel-body">
						<div class='row'>
						<div class='col-md-10'><h3 style="text-align:center;"><?php echo "Attendance "; echo $da; ?></h3></div>
						<div class='col-md-2'><button class="btn btn-success" >Print</button></div>
						 
						
						</div>
	                      <table id="example" class="table table-striped">
	
	<tr>
	<th>Serial Number</th><th>Name</th><th>Time</th><th>Attendance Status</th>
	</tr>
	<?php


$con = mysqli_connect("localhost","root","","spsdb");
if(mysqli_connect_errno())
{
	echo"Failed to connect to MySQL: " . mysqli_connect_errno();
	
}



?>
								<?php $result=mysqli_query($conn,"select id, name, (select sum(date='$da') from records where id_teacher=employee.id) count from employee");
								$serialnumber=0;
								$counter=0;
								
	              while($row=mysqli_fetch_array($result))
	{
						$serialnumber++;
						//var_dump($row);
						
		
		                           $id = $row['id'];
	
	?>												
	
									<tr>
									<td> <?php echo $serialnumber; ?> </td>
									<td> <?php echo $row['name']; ?>
									</td>
									
									
																	
									
									<td> <?php
									
									if ($row["count"]=='1')
									{//var_dump($row["count"]);
											$result1=mysqli_query($conn,"select time,attendance_status from records where id_teacher='$id' and date='$da'");
									while($row1=mysqli_fetch_array($result1))
									{								//var_dump($row1);
									$t=$row1['time'];
									$s=$row1['attendance_status'];
									
										echo $t   ;
									
									
									
										
										?> 
									
									</td>
									<td> <?php
									
									if ($t > "10:00:00:000000" ) {
											echo "Delay"; 
									}
									else echo "Present";
									}
									
									}
									else{
									echo "-- : -- : --</td><td> Absent";
									}
									?> 
									</td>
									</td>
									
									
									</tr>
	
	<?php
	$counter++;
	}
	?>
	</table>
	
	
	</div>
	</div>
	</div>
	
   
   
<?php } ?>
						<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
						<script>
							$(document).ready(function(){
								$("button").click(function(){
									m="<?php echo $da; ?>";
									location.href="attendance_pdf.php?date="+m;
								});
							});
						</script>
</html>



