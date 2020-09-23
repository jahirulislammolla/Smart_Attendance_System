<!doctype html>
<html>
<?php
session_start();
include("dbconnect.php");


if(!isset($_SESSION['email'])){
	
	header("location: http://localhost/smart_payroll/login.php");
}
else {


$da=$_GET['date'];
?>
<head>
  <title>Invoice</title>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600,600i,700,700i|Lato:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

    
					<link href="css/bootstrap.css" rel="stylesheet"/>
</head>
<body>
   <?php //include 'navbar.php'; 
 

        //create html of the data
        ob_start();
        ?>  
   
   <div class="content-wrapper">
<div class="content">
<div class="panel panel-body">
						<div class='row'>
						<h3 style="text-align:center; "><?php echo "Attendance Report of "; echo $da; ?></h3>
						
						 
						
						</div>
	                      <table  style='margin-left:15% '>
	 <div style='margin-left:15% '>
							<tr>
							<th>Serial Number</th>
							<th>Name</th>
							<th>Time</th>
							<th>Attendance Status</th>
							</tr>
							</div>
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
	
									<tr style="padding:10px;">
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
  <?php //include 'footer.php';

  $body = ob_get_clean();

        $body = iconv("UTF-8","UTF-8//IGNORE",$body);

        include("mpdf/mpdf.php");
        $mpdf=new \mPDF('c','A4','','' , 20, 20, 20, 20, 0, 0); 

        //write html to PDF
        $mpdf->WriteHTML($body);
 
        //output pdf
        //$mpdf->Output('info.pdf','D');

        //open in browser
        $mpdf->Output();

        //save to server
        //$mpdf->Output("mydata.pdf",'F');

   
    ?>
</body>
</html>
