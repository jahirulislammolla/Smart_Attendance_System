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
										  <h3 class="box-title">All Messages</h3>
										</div><!-- /.box-header -->
										<div class="box-body">
		   
		   
		   
  <div class="dropdown">
               
			   
               
								
								
								
				
				
				
            </div><br>


            <table id="example" class="table table-bordered table-striped" >
                <thead>
										<tr>
											 <th>Sender</th>
											<th>Subject</th>
											<th>Messages</th>
											 <th>Date</th>
											 	 <th>Time</th>
												 
												  <th>Action</th>
											 
							
											 
											
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Sender</th>
											<th>Subject</th>
											<th>Messages</th>
											 <th>Date</th>
											 	 <th>time</th>
												  <th>Action</th>
											 
										</tr>
									</tfoot>
								
                          <tbody>
                    <?php 
					         $date=date("Y-m-d ");
							 
							 $sql ="select * from message where receiver='$user'";
														$result = $con->query($sql);
														if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                                                         $id = $row['id'];
														$sender = $row['sender'];
														$subject = $row['subject'];
														
														$msg = $row['msg']; 
														
														$date = $row['date'];
														$time = $row['time'];
                                                     														
													
														
													
															
                            

                            echo "<tr>
                                     <td>$sender</td>
									<td>$subject</td>
									<td>$msg</td>
									 <td>$date</td>
									 <td>$time</td>
									 
									 "; ?>
									
									
                       <td>
                        
                   
                            
                            
                           
						   
									 <a href="#reply<?php echo $id;?>" data-toggle="modal" class="btn btn-warning btn-xs">Reply </a>
					
							
						   	 
						   
						
                    </td>



                   
        </div>

       
     

      </div>
	   </div>


        <!--Edit Item Modal -->
        
        <div id="reply<?php echo $id; ?>" class="modal fade" role="dialog">
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
												  <input type="email" name="re" class="form-control"  value="<?php echo $sender; ?>">
												</div>
												<div class="form-group">
												  <input type="text" name="subject" class="form-control"  placeholder="Subject">
												</div>
												<div>
												  <input type="text" placeholder="Message"  name="msg" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
												</div>
													<div class="box-footer clearfix">
											  <button class="pull-right btn btn-default"  name="submit" id="submit">Send <i class="fa fa-arrow-circle-right"></i></button>
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
                     


                        //Update Items
                        if(isset($_POST['submit'])){
                           
                        
							
                           $subject = $_POST['subject'];
                            $msg = $_POST['msg'];
							 $re = $_POST['re'];
                           
							 $sq="insert into message(sender,receiver,subject,msg,date,time)values('$user','$re','$subject','$msg','$date',NOW())";
								
								
								
                           
								
								
								 if ($con->query($sq) === TRUE) {
                                echo '<script>window.location.href="message.php"</script>';
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