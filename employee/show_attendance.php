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
				<?php include_once('footer.php') ?>

	
    <body style="margin:0;">

      <div class="content-wrapper" >
		   
		    <section class="content">
								  <div class="row">
									<div class="col-xs-12">
							   
							   
										 <div class="box">
										<div class="box-header">
										  <h3 class="box-title">All Attendance</h3>
										</div><!-- /.box-header -->
										<div class="box-body">   

  <br>
<div>
	<select name="example_length" aria-controls="example" class=""><option value="10">2020</option><option value="25">2021</option><option value="50">2022</option><option value="100">2023</option>
	</select>
	<select name="example_length" aria-controls="example" class="">
		<option value="10">January</option>
		<option value="25">February</option>
		<option value="50">March</option>
		<option value="100">April</option>
		<option value="10">May</option>
		<option value="25">June</option>
		<option value="50">July</option>
		<option value="100">August</option>
		<option value="10">September</option>
		<option value="25">October</option>
		<option value="50">November</option>
		<option value="100">December</option>
	</select>
</div>

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