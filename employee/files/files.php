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
	
	
	<?php 
	$date = date('Y-m-d');
	include_once('first.php') ?>
				<?php include_once('header.php') ?>
				<?php include_once('../sidebar.php') ?>
	
	
    <bodyy onload="myFunction()" style="margin:0;">

      <div class="content-wrapper" >
		   
		    <section class="content">
								  <div class="row">
									<div class="col-xs-12">
							   
							   
										 <div class="box">
										<div class="box-header">
										  <h3 class="box-title">All Files</h3>
										</div><!-- /.box-header -->
										<div class="box-body">
		   
		   
		     <div class="dropdown">
               
			   
               
                <a href="#add" data-toggle="modal"><button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Add New Files</button></a>
            </div><br>



            <table id="example" class="table table-bordered table-striped" >
                <thead>
										<tr>
											 <th>ID</th>
											<th>Uploader</th>
											<th>Department</th>
											 <th>Date</th>
											<th>File</th>
											<th>Action</th>
											
										</tr>
									</thead>
									<tfoot>
										<tr>
											 	 <th>ID</th>
											<th>Uploader</th>
											<th>Department</th>
											 <th>Date</th>
											<th>File</th>
											<th>Action</th>
										</tr>
									</tfoot>
								
                          <tbody>
                    <?php 
					$user=$_SESSION['email'];
	
	                                                 $sq2="select * from employee where email='$user'";
														$result2 = $conn->query($sq2);
														if ($result2->num_rows > 0) {
                        // output data of each row
                        while($row2 = $result2->fetch_assoc()) {
                            $id = $row2['id'];
														$name = $row2['name'];
														$department = $row2['department'];
						}}
					
							 $sql ="select * from files where department='$department' or department='All'";
														$result = $conn->query($sql);
														if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $id = $row['id'];
														$uploader = $row['uploader'];
														$department = $row['department'];
														
														$date = $row['date']; 
														
														$doc = $row['doc']; 
														
                            

                            echo "<tr>
                                     <td>$id</td>
									<td>$uploader</td>
									<td>$department</td>
									 <td>$date</td>
									  <td>$doc</td>
            
            ";
                    ?>
                    <td>
                        
                   
                            
                           
                           
						    <a href="download.php?id=<?php echo $row['id'] ?>"  class="btn btn-warning btn-xs">Download </a>
						
						    
									
									 
						   	  
						   
						
                    </td>



                   
        </div>

       
     

      </div>
	   </div>



        </form>
       

        <!--Delete Modal -->
		
        
        </tr>


        <?php
                        }
                     


                     
                       
                    }

					
					
					
					  //Add Item        
										if(isset($_POST['add_files'])){
							
	                              
									 
											$uploader = $name;
											var_dump($uploader);
											$department = $_POST['department'];
											
										$cur_date= date('Y-m-d');
											
										$doc = $_FILES['doc']['name'];
							$doc_tmp = $_FILES['doc']['tmp_name'];
							
							move_uploaded_file($doc_tmp,"file/$doc");

											$sql = "INSERT INTO files 
								(
								uploader,
								department,
								date,
								doc)
								VALUES (
								'$uploader',
								'$department',
								'$cur_date',
								'$doc'
								
								)";
                        if ($conn->query($sql) === TRUE) {
                           

                           
                                echo '<script>window.location.href="files.php"</script>';
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
										
										
										
										
										
					
											 
										}
                  

                   
?>
            </tbody>
            </table>
			
			
			
			
			<?php
function makeconnection()
{
	$cn=mysqli_connect("localhost","root","","spsdb");
	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  return $cn;
}

?>
           
 <div id="add" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add New Files</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" class="contactForm" role="form" enctype="multipart/form-data">
                                 <div  class="form-group">
						<label for="email">Uploader</label>
						<input type="text" name="uploader" id="uploader"  class="form-control" value="<?php echo $name; ?>" placeholder="uploader"   disabled/>
					
					       </div>
                                <div class="form-group" class="col-md-2">
										<label for="email">Department</label>
										<select id="inputEmail3" name="department" class="form-control "  class="col-md-10">
							<option >All</option>
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
                                <div  class="form-group">
						<label for="email">Date</label>
						<input type="text" name="cur_date" id="cur_date"  class="form-control" value="<?php echo $date; ?>" placeholder="date"   disabled/>
					
					       </div> 
									<div class="form-group">
										<label for="email">File</label>
										<input type="file"  id="doc" name="doc"     placeholder="file"  />
									
									</div>
							   

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="add_files"><span class="glyphicon glyphicon-plus"></span> Add</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
     
	   </div>
	   </div>
	   </section>
          

           
       
             </body>

    </html>
<?php } ?>