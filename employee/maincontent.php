<?php



	             include 'controller.php';
				   include 'dbconnect.php';

$user = $_SESSION['email'];
									
									$get_user ="select * from employee where email='$user'";
									$run_user = mysqli_query($con,$get_user);
									$row = mysqli_fetch_array($run_user);
									
								
									
									
									$name = $row['name'];
									$email = $row['email'];
									$image = $row['image'];
									
								$fridays = array();
								$fridays[0] = date('d',strtotime('first fri of this month'));

								$fridays[1] = $fridays[0] + 7;
								$fridays[2] =  $fridays[0] + 14;
								$fridays[3] =  $fridays[0] + 21;
								$fridays['last'] = date('d',strtotime('last fri of this month'));

								if($fridays[3] == $fridays['last']){
								  unset($fridays['last']);
								  $cfriday=4;
								}
								else {
								  $fridays[4] = $fridays['last'];
								  unset($fridays['last']);
								  $cfriday=5;
								  
								}
							
								
								
								
								
								$satdays = array();
								$satdays[0] = date('d',strtotime('first saturday of this month'));
								$satdays[1] = $satdays[0] + 7;
								$satdays[2] =  $satdays[0] + 14;
								$satdays[3] =  $satdays[0] + 21;
								$satdays['last'] = date('d',strtotime('last saturday of this month'));

								if($satdays[3] == $satdays['last']){
								  unset($satdays['last']);
								  $csaturday=4;
								}
								else {
								  $satdays[4] = $satdays['last'];
								  unset($satdays['last']);
								  $csaturday=5;
								  
								}
							
								
								
								
?>




<?php
 include("dbconnect.php");
	
	           if(isset($_POST['submit'])){
		
		  
		
								$receiver= mysqli_real_escape_string($con,$_POST['receiver']);
								$subject= mysqli_real_escape_string($con,$_POST['subject']);
								$msg= mysqli_real_escape_string($con,$_POST['msg']);
								
								$date = date('Y-m-d');
													
		 
		
		
		
			
									$insert1 = "insert into message (sender,receiver,subject,msg,date) values('$user','$receiver','$subject','$msg','$date')";
									
									
									
									$run_insert1 = mysqli_query($con,$insert1);
									
									if($run_insert1){
										
										
										
										
										echo"<script>alert('Message sent!')
										</script>";
										echo"<script>window.open('dashboard.php','_self')
										</script>";
										
														
									}
									
									
									
									
									
			
		
		
		
	}
	
	
	





?>



			
							<div class="content-wrapper">
									<!-- Content Header (Page header) -->
									<section class="content-header">
									  <h1>
										 Attandance <small>Current Month</small>
									  </h1>
									  <ol class="breadcrumb">
										<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
										<li class="active">Dashboard</li>

									  </ol>
									</section>

									<!-- Main content -->
									<section class="content">
									  <!-- Small boxes (Stat box) -->
									  <div class="row">
										<div class="col-lg-3 col-xs-6">
										  <!-- small box -->
										  <div class="small-box bg-aqua">
											<div class="inner">
											
											<!--  <?php  $tea=mysqli_query($con,"SELECT *
														FROM task where email='$user' and MONTH(assign_date) = MONTH(CURRENT_DATE())
														AND YEAR(assign_date) = YEAR(CURRENT_DATE())");
										   $no_teacher=mysqli_num_rows($tea);
										   ?> -->
											
											  <h3>11</h3>
											  <p>Total Days</p>
											</div>
											<div class="icon">
											  <i class="ion ion-checkmark"></i>
											</div>
											<a href="show_attendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										  </div>
										</div><!-- ./col -->
										
										<div class="col-lg-3 col-xs-6">
										  <!-- small box -->
										  <div class="small-box bg-green">
											<div class="inner">
											
											<!--  <?php  $tea=mysqli_query($con,"SELECT *
														FROM task where email='$user' and MONTH(assign_date) = MONTH(CURRENT_DATE())
														AND YEAR(assign_date) = YEAR(CURRENT_DATE())");
										   $no_teacher=mysqli_num_rows($tea);
										   ?> -->
											
											  <h3>8</h3>
											  <p>On Time</p>
											</div>
											<div class="icon">
											  <i class="ion ion-checkmark-circled"></i>
											</div>
											<a href="show_attendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										  </div>
										</div><!-- ./col -->

										<div class="col-lg-3 col-xs-6">
										  <!-- small box -->
										  <div class="small-box bg-orange">
											<div class="inner">
											
											<!--  <?php  $tea=mysqli_query($con,"SELECT *
														FROM task where email='$user' and MONTH(assign_date) = MONTH(CURRENT_DATE())
														AND YEAR(assign_date) = YEAR(CURRENT_DATE())");
										   $no_teacher=mysqli_num_rows($tea);
										   ?> -->
											
											  <h3>2</h3>
											  <p>Late</p>
											</div>
											<div class="icon">
											  <i class="ion ion-checkmark-circled"></i>
											</div>
											<a href="show_attendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										  </div>
										</div><!-- ./col -->
										<div class="col-lg-3 col-xs-6">
										  <!-- small box -->
										  <div class="small-box bg-red">
											<div class="inner">
											  <!-- <?php  $cr=mysqli_query($con,"SELECT *
														FROM records where name='$name' and MONTH(date) = MONTH(CURRENT_DATE())
														AND YEAR(date) = YEAR(CURRENT_DATE())");
										   $no_cr=mysqli_num_rows($cr);
										   ?> -->
											
											  <h3>1</h3>
											  <p>Absent</p>
											</div>
											<div class="icon">
											  <i class="ion ion-close"></i>
											</div>
											<a href="show_attendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										  </div>
										</div><!-- ./col -->
										
									  </div><!-- /.row -->
									  <!-- Main row -->
									  
									  <div class="row">
									  	<section class="content-header">
										  <h1>
											 Calendar <small>Current Month</small>
										  </h1>
										</section>
										<br>
										<!-- Left col -->
										<section class="col-lg-12 connectedSortable">
										  <!-- Custom tabs (Charts with tabs)-->
										 

										  <!-- Chat box -->
										  

										  <!-- TO DO List -->
										 

										  <!-- quick email widget -->
										<div id='fullDiv' >
											  
											    <li style='background-color:#2c8d9e'><b>SUN</b></li>
											    <li style='background-color:#2c8d9e'><b>MON</b></li>
											    <li style='background-color:#2c8d9e'><b>TUE<b></li>
											    <li style='background-color:#2c8d9e'><b>WED</b></li>
											    <li style='background-color:#2c8d9e'><b>THUR</b></li>
											    <li style='background-color:#2c8d9e'><b>FRI</b></li>
											    <li style='background-color:#2c8d9e'><b>SAT</b></li>
											    <?php 
											    	$start_day=date('w',strtotime('first day of this month'));
											    	$current_day=date("d");
											    	$last_day=date('d',strtotime('last day of this month'));
											    	$last_day_pre=date('d',strtotime("last day of previous month"));
											    	$check=0;
											    	for ($i=$last_day_pre-$start_day+1; $i <=$last_day_pre; $i++) {
											    		if ($check%7==5 || $check%7==6) {
											    			# code...
											    			echo "<li style='background-color:aqua'>$i</li>";
											    		}
											    		else{
											    			echo "<li>$i</li>";
											    		}
											    		
											    	$check++;
											    	}
											    	for ($i=1; $i <=$last_day ; $i++) {
											    		if ($i==$current_day) {// current day hobe
											    			# code...
											    			echo "<li style='border-radius: 25px;background-color: #1abc9c;'>$i</li>";
											    		}
														else if ($check%7==5 || $check%7==6) {
											    			# code...
											    			echo "<li style='background-color:#e0dd09'>$i</li>";
											    		}
											    		else if ($i==1 || $i==3 ||$i==6 ||$i==9 ||$i==8 ||$i==10 ||$i==14 ) {
											    			# code...
											    			echo "<li style='background-color:green'>$i</li>";
											    		}

											    		else if ($i==2 ||$i==7) {
											    			# code...
											    			echo "<li style='background-color:orange'>$i</li>";
											    		}
											    		else if ($i==13) {
											    			# code...
											    			echo "<li style='background-color:red'>$i</li>";
											    		}
											    		else{
											    			echo "<li>$i</li>";
											    		}
											    	$check++;
											    	}											    	
											    	for ($i=1; $i <=35-$start_day-$last_day ; $i++) {
											    		
											    		if ($check%7==5 || $check%7==6) {
											    			# code...
											    			echo "<li style='background-color:#e0dd09'>$i</li>";
											    		}
											    		else{
											    			echo "<li>$i</li>";
											    		}
											    	$check++;
											    	}
											    	
											    ?>
											    
											  </ul>
											</div>

										</section><!-- /.Left col -->
										<!-- right col (We are only adding the ID to make the widgets sortable)-->
									</div>
									<br><br><br>
									 			  
				  

										</section><!-- right col -->
									  </div><!-- /.row (main row) -->

								  
								  
								  
<script type="text/javascript">
	var winHeight = $(window).height();
var height = ( winHeight * 16.6666 ) / 100;
var lineHeight = height + "px";

$("#fullDiv li").css("line-height", lineHeight);
$("#fullDiv li").css("height", height);

</script>				  
								  
								  
								  
								  
								  
								  
<?php  ?>