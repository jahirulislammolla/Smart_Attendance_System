								<?php
session_start();


	             include 'controller.php';
if(!isset($_SESSION['email'])){
	
	header("location: http://localhost/smart_payroll/employee_in_loc/login.php");
}
else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
       

							<meta charset="utf-8">
							<meta http-equiv="X-UA-Compatible" content="IE=edge">
							<meta name="viewport" content="width=device-width, initial-scale=1">
							<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
							<!-- Latest compiled and minified CSS -->
							<link rel="stylesheet" href="css/bootstrap.min.css">
							<!-- Optional theme -->
							<link rel="stylesheet" href="css/bootstrap-theme.min.css">
							<!-- Loader -->
							<link rel="stylesheet" href="css/loader.css">
							<script src="js/jquery-1.12.4.js"></script>
							<link rel="stylesheet" type="text/css" href="dashboard/vendor/font-awesome/css/font-awesome.min.css">
							<script>
            $(document).ready(function() {
                $('#example').DataTable({

                });
            });

        </script>
        <link rel="stylesheet" href="css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="css/responsive.bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>

    </head>
	
	
	<?php include_once('first.php') ?>
				<?php include_once('header.php') ?>
				<?php include_once('sidebar.php') ?>
	
	
    <body onload="myFunction()" style="margin:0;">

      <div class="content-wrapper" >
		   
		    <section class="content">
								  <div class="row">
									<div class="col-xs-12">
							   
							   
										 <div class="box">
										<div class="box-header">
										  <h3 class="box-title">All Events</h3>
										</div><!-- /.box-header -->
										<div class="box-body">
		   
		   
		   
  <div class="dropdown">
               
			   
               
								
								
								
				
				
				
            </div><br>


            <table id="example" class="table table-bordered table-striped" >
                <thead>
										<tr>
											 <th>Event on</th>
											<th>Date</th>
											<th>Time</th>
											 <th>Location</th>
											 	 <th>Invited Department</th>
												 
												
											 
							
											 
											
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Event on</th>
											<th>Date</th>
											<th>Time</th>
											 <th>Location</th>
											 	 <th>Invited Department</th>
											
											 
										</tr>
									</tfoot>
								
                          <tbody>
                   
				   
				   
				   
				    <?php 
					         $date=date("Y-m-d ");
							 
							 $sql ="select * from event where invited_dept='$department' or invited_dept='All'";
														$result = $con->query($sql);
														if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                                                         $id = $row['id'];
														$topic = $row['topic'];
														$date = $row['date'];
														
														$time = $row['time']; 
														
														$location = $row['location'];
														$invited_dept = $row['invited_dept'];
                                                     														
													
														
													
															
                            

                            echo "<tr>
                                     <td>$topic</td>
									<td>$date</td>
									<td>$time</td>
									 <td>$location</td>
									 <td>$invited_dept</td>
									 
									 "; ?>
				   
				   
									
									
                       



                   
        </div>
       
     

      </div>
	   </div>


        
        </tr>
<div class="row">
									 	<section class="content-header">
									  <h1>
										 Off Day <small>Current Month</small>
									  </h1>
									</section>
									<br>
										<div class="col-lg-3 col-xs-6">
										  <!-- small box -->
										  <div class="small-box" style="background-color: #87CEFA">
											<div class="inner">
											
											<!--  <?php  $tea=mysqli_query($con,"SELECT *
														FROM task where email='$user' and MONTH(assign_date) = MONTH(CURRENT_DATE())
														AND YEAR(assign_date) = YEAR(CURRENT_DATE())");
										   $no_teacher=mysqli_num_rows($tea);
										   ?> -->
											
											  <h3><?php print_r($cfriday);?></h3>
											  <p>Fridays</p>
											</div>
											
											<a href="show_attendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										  </div>
										</div><!-- ./col -->
										
										<div class="col-lg-3 col-xs-6">
										  <!-- small box -->
										  <div class="small-box" style="background-color: #87CEFA">
											<div class="inner">
											
											<!--  <?php  $tea=mysqli_query($con,"SELECT *
														FROM task where email='$user' and MONTH(assign_date) = MONTH(CURRENT_DATE())
														AND YEAR(assign_date) = YEAR(CURRENT_DATE())");
										   $no_teacher=mysqli_num_rows($tea);
										   ?> -->
											
											  <h3><?php print_r($csaturday);?></h3>
											  <p>Saturdays</p>
											</div>
											
											<a href="show_attendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										  </div>
										</div><!-- ./col -->

										<div class="col-lg-3 col-xs-6">
										  <!-- small box -->
										  <div class="small-box" style="background-color: #87CEFA">
											<div class="inner">
											
											<!--  <?php  $tea=mysqli_query($con,"SELECT *
														FROM task where email='$user' and MONTH(assign_date) = MONTH(CURRENT_DATE())
														AND YEAR(assign_date) = YEAR(CURRENT_DATE())");
										   $no_teacher=mysqli_num_rows($tea);
										   ?> -->
											
											  <h3>1</h3>
											  <p>Others</p>
											</div>
										
											<a href="show_attendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										  </div>
										</div><!-- ./col -->
										<div class="col-lg-3 col-xs-6">
										  <!-- small box -->
										  <div class="small-box" style="background-color: #87CEFA">
											<div class="inner">
											  <!-- <?php  $cr=mysqli_query($con,"SELECT *
														FROM records where name='$name' and MONTH(date) = MONTH(CURRENT_DATE())
														AND YEAR(date) = YEAR(CURRENT_DATE())");
										   $no_cr=mysqli_num_rows($cr);
										   ?> -->
											
											  <h3>9</h3>
											  <p>Total</p>
											</div>
											<a href="show_attendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										  </div>
										</div><!-- ./col -->
										
									  </div>	

        <?php
                        }
                     


                      
                       
                   

                   
						}
				  
				  
								
?>

















            </tbody>
            </table>
           

     
	   </div>
	   </div>
	   </section>
          
 <!--Add attendance Modal -->
           
           
       <!--view attendance modal -->
	   

	   
	   
	   
             </body>

    </html>
<?php } ?>