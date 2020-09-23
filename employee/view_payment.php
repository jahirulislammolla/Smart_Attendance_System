								<?php
session_start();


	             include 'controller.php';
if(!isset($_SESSION['email'])){
	
	header("location: http://localhost/smart_payroll/admin/login.php");
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
	
	
	 <?php $uid = $_GET['id'];?>
	
	<?php include_once('first.php') ?>
				<?php include_once('header.php') ?>
				<?php include_once('../sidebar.php') ?>
	
	
    <bodyy onload="myFunction()" style="margin:0;">

      <div class="content-wrapper" >
		   
		    <section class="content">
								  <div class="row">
									<div class="col-xs-12">
							   
							   
										 <div class="box">
										<div class="box-header">
										  <h3 class="box-title">View Payment History</h3>
										</div><!-- /.box-header -->
										<div class="box-body">
		   
		   
		   
  <div class="dropdown">
               
			              <?php 
						  $sq ="select * from employee where id='$uid'";
														$res = $conn->query($sq);
														if ($res->num_rows > 0) {
                        // output data of each row
                        while($row1 = $res->fetch_assoc()) {
                                                         $id = $row1['id'];
														$email = $row1['email'];
														$name = $row1['name'];
				
						}
														}
				
			 	
			            	?>
               
								
								
								
				
				
				
            </div><br>


            <table id="example" class="table table-bordered table-striped" >
                <thead>
										<tr>
											
											<th>Name</th>
											<th>Email</th>
											 <th>Account Number</th>
											 
											 <th>Basic Salary</th>
											 <th>Absent</th>
											 <th>Delay</th>
											 <th>Deducted Amount</th>
											 
											 
											 
                                               <th>Net Salary</th>
											   <th>Amount Paid</th>
											   <th>Amount Due</th>
											   <th>Payment Date</th>
											      <th>Salary of month</th>
											   
											 
										
										</tr>
									</thead>
									<tfoot>
									
									</tfoot>
								
                          <tbody>
                    <?php 
					         $date=date("Y-m-d ");
							 $sql ="select * from payment where name='$name' AND email='$email'";
														$result = $conn->query($sql);
														if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                                                         $id = $row['id'];
														$email = $row['email'];
														
														$ac_no = $row['ac_no'];
														
														$basic = $row['basic'];
														$absent = $row['absent'];
													    $delay = $row['delay'];
														$deducted_amount = $row['deducted_amount'];
														
														
														
														$netsal = $row['netsal'];
														$amount_paid = $row['amount_paid'];
														$amount_due = $row['amount_due'];
														$date_of_payment = $row['date_of_payment'];
														$salary_of_month = $row['salary_of_month'];
														
														 
														
													
															
                            

                            echo "<tr>
                                     
									<td>$name</td>
									<td>$email</td>
									 <td>$ac_no</td>
									 
									 
									  <td>$basic</td>
									   <td>$absent</td>
									    <td>$delay</td>
										 <td>$deducted_amount</td>
									 
									 
									  <td>$netsal</td>
									   <td>$amount_paid</td>
									    <td>$amount_due</td>
										 <td>$date_of_payment</td>
										  <td>$salary_of_month</td>
									 
									 
									 
						"; ?>
						
                   	<?php } } 
														
														else echo"   ";
														
														?>	
        </div>

       
     

      </div>
	   </div>


        
        </tr>


    


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