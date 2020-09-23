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
										  <h3 class="box-title">All Employee</h3>
										</div><!-- /.box-header -->
										<div class="box-body">
		   
		   
		   
  <div class="dropdown">
               
			   
               
								
								
								
				
				
				
            </div><br>


            <table id="example" class="table table-bordered table-striped" >
                <thead>
										<tr>
											 <th>ID</th>
											<th>Name</th>
											<th>Email</th>
											 <th>Designation</th>
											 
							
											 
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											 <th>ID</th>
											<th>Name</th>
											<th>Email</th>
											 <th>Designation</th>
											
											<th>Action</th>
										</tr>
									</tfoot>
								
                          <tbody>
                    <?php 
					         $date=date("Y-m-d ");
							 $sql ="select * from employee";
														$result = $con->query($sql);
														if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                                                         $id = $row['id'];
														$email = $row['email'];
														$name = $row['name'];
														
														$designation = $row['designation'];
                                     $department = $row['department'];														
														
														$phone = $row['phone'];
														
                                                     														
														$address = $row['address']; 
														$joindate = $row['joindate']; 
														$image = $row['image']; 
														
													
															
                            

                            echo "<tr>
                                     <td>$id</td>
									<td>$name</td>
									<td>$email</td>
									 <td>$department</td>
									 
									 "; ?>
									
									
                       <td>
                        
                   
                            
                            
                           
						    <a href="#view<?php echo $id;?>" data-toggle="modal" class="btn btn-info btn-xs">View Details </a>
							 <a href="#message<?php echo $id;?>" data-toggle="modal" class="btn btn-success btn-xs">send Message </a>
									 
									  
						   
						
                    </td>



                   
        </div>

       
     

      </div>
	   </div>


        <!--Edit Item Modal -->
        
                <div id="view<?php echo $id; ?>" class="modal fade" role="dialog">
            <form method="post" class="contactForm" role="form" enctype="multipart/form-data">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">View Employee Details</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="edit_teacher" value="<?php echo $id; ?>">
                          
                                <div class="row">
								   <div class="col-md-5" style="margin-left:30px">
								   
								   <?php
								echo"
								<img src='../../admin/employee/images/$image'  width='200' height='150' /> 
								
									
									
									 ";
									?>
								   
								</div>
								
								
								
								
								   <div class="col-md-6">
						            <div class="form-group">
										<label for="email">Name</label>
										<input type="text"  id="name" name="name"   class="form-control"  value="<?php echo $name; ?>" placeholder="Name"  />
									
									</div>
                           
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" name="email" id="email"  class="form-control" value="<?php echo $email; ?>" placeholder="Email"  />
								
									</div>
									</div>
										</div>
									<div class="form-group">
										<label for="email">Department</label>
										<input type="email" name="department" id="department"  class="form-control" value="<?php echo $department; ?>" placeholder="department"  />
								
									</div>
									<div class="form-group">
										<label for="email">Designation</label>
										<input type="email" name="designation" id="designation"  class="form-control" value="<?php echo $designation; ?>" placeholder="designation"  />
								
									</div>
									
					
					
									<div class="form-group">
										<label for="email">Phone</label>
										<input type="number" name="phone" id="phone"  class="form-control" value="<?php echo $phone; ?>" placeholder="phone"  />
									
									</div>
									
									
									
									
									
                            
							
							<div class="form-group">
						<label for="email">Address</label>
						<input type="text" name="address" id="address"  class="form-control" value="<?php echo $address; ?>" placeholder="address"   />
					
					       </div>
					
				
									

								
								
								
								
                            
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                        </div>
                    </div>
                </div>
        </div>
		 </form>
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		  
		            <div id="message<?php echo $id; ?>" class="modal fade" role="dialog">
            <form method="post" class="contactForm" role="form" enctype="multipart/form-data">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Send Reply</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box box-info">
											
											<div class="box-body">
											  <form action="" enctype="multipart/form-data" method="post">
												<div class="form-group">
												  <input type="email" name="re" class="form-control"  value="<?php echo $email; ?>">
												</div>
												<div class="form-group">
												  <input type="text" name="subject" class="form-control"  placeholder="Subject">
												</div>
												<div>
												  <input type="text" placeholder="Message"  name="msg" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
												</div>
													<div class="box-footer clearfix">
											  <button class="pull-right btn btn-default"  name="submit1" id="submit">Send <i class="fa fa-arrow-circle-right"></i></button>
											</div>
											  </form>
											</div>
										
										  </div>
				
									

								
								
								
								
                            
                        </div>
                        <div class="modal-footer">
                           
                            <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                        </div>
                    </div>
                </div>
        </div>
		 </form>
		
	
		
		
		
		
        
        </tr>


        <?php
                        }
                     


                       
                       if(isset($_POST['submit1'])){
                           
                        
							
                           $subject = $_POST['subject'];
                            $msg = $_POST['msg'];
							 $re = $_POST['re'];
                           
							 $sq="insert into message(sender,receiver,subject,msg,date,time)values('$user','$re','$subject','$msg','$date',NOW())";
								
								
								
                           
								
								
								 if ($conn->query($sq) === TRUE) {
                                echo '<script>window.location.href="all_employee.php"</script>';
                            }
														else {
                                echo "Error updating record: " . $conn->error;
                            }
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