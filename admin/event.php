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
												 
												  <th>Action</th>
											 
							
											 
											
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Event on</th>
											<th>Date</th>
											<th>Time</th>
											 <th>Location</th>
											 	 <th>Invited Department</th>
												  <th>Action</th>
											 
										</tr>
									</tfoot>
								
                          <tbody>
                   
				   
				   
				   
				    <?php 
					         $date=date("Y-m-d ");
							 
							 $sql ="select * from event";
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
				   
				   
									
									
                       <td>
                        
                   
                            
                            
                           
						   
									<a href="#edit<?php echo $id;?>" data-toggle="modal" class="btn btn-warning btn-xs">Edit </a>
									  <a href="#delete<?php echo $id;?>" data-toggle="modal" class="btn btn-danger btn-xs">Delete</a>
					
							
						   	 
						   
						
                    </td>



                   
        </div>
       
     

      </div>
	   </div>


        <!--Edit Item Modal -->
        
             
		 
		 
		 
		 
		 	<div id="edit<?php echo $id; ?>" class="modal fade" role="dialog">
            <form method="post" class="contactForm" role="form" enctype="multipart/form-data">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update Event</h4>
                        </div>
                        <div class="modal-body">
                   
                           <input type="hidden" name="edit" value="<?php echo $id; ?>">

									<div class="form-group">
										<label for="email">Event On</label>
										<input type="text" name="topic" id="topic"  class="form-control" value="<?php echo $topic; ?>"  />
								
									</div>
						  
						            <div class="form-group">
										<label for="email">Date</label>
										<input type="date"  id="date" name="date"   class="form-control"  value="<?php echo $date; ?>"  />
									
									</div>
									 <div class="form-group">
										<label for="email">Time</label>
										<input type="time"  id="time1" name="time1"   class="form-control"   value="<?php echo $time; ?>"  />
									
									</div>
									 <div class="form-group">
										<label for="email">Location</label>
										<input type="text"  id="location" name="location"   class="form-control"   value="<?php echo $location; ?>"  />
									
									</div>
									 <div class="form-group">
										<label for="email">Invited Department</label>
										<select id="invited_dept" name="invited_dept"  class="form-control "  >
							<option ><?php echo $invited_dept; ?></option>
							<option value="All">All Department</option>
							<option value="Production">Production</option>
							<option value="Research and Development">Research and Development</option>
							<option value="Purchasing">Purchasing</option>
							<option value="Marketing">Marketing</option>
							<option value="Human Resource Management">Human Resource Management</option>
							<option value="Accounting and Finance">Accounting and Finance</option>
							<option value="Quality Assurance">Quality Assurance</option>
								<option value="Quality Control">Quality Control</option>
							
							 
							 </select>
									
									
									</div>
                           
									
									
					
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="update1"><span class="glyphicon glyphicon-edit"></span> Update</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                        </div>
                    </div>
                </div>
        </div>
		
		
		 </form>
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 <div id="delete<?php echo $id; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <form method="post">
                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Delete</h4>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                            <p>
                                <div class="alert alert-danger">Are you Sure you want Delete <strong><?php echo $topic; ?>?</strong></p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> NO</button>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
		 
		 

		 
		 
		 
		

		 
		
        
        </tr>


        <?php
                        }
                     


                        //Update Items
                        if(isset($_POST['update1'])){
                           $edit = $_POST['edit'];
                        
							
                           $topic = $_POST['topic'];
                            $date = $_POST['date'];
							 $time1 = $_POST['time1'];
							  $location = $_POST['location'];
							 $invited_dept = $_POST['invited_dept'];
                           
							
								
								$sq = "UPDATE event SET 
							  topic='$topic',
                               date='$date',
                                time='$time1',
                                location='$location',
								  invited_dept='$invited_dept'
								
								
                                WHERE id='$edit' ";
								
                           
								
								
								 if ($con->query($sq) === TRUE) {
                                echo '<script>window.location.href="event.php"</script>';
                            }
														else {
                                echo "Error updating record: " . $con->error;
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