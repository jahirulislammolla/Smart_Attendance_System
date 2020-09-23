							<?php
							session_start();
							include("dbconnect.php");
								include("controller.php");


							if(!isset($_SESSION['email'])){
								
								header("../login.php");
							}
							else {
							?>





	
			<?php
								$user = $_SESSION['email'];
								
								$get_user ="select * from employee where email='$user'";
								$run_user = mysqli_query($con,$get_user);
								$row = mysqli_fetch_array($run_user);
								
							
								
											$id = $row['id'];
											$name = $row['name'];
											$email = $row['email'];
											   $image = $row['image'];
											$password = $row['password'];
											$designation=$row['designation'];
											$department=$row["department"];
											$nick_name=$row["nick_name"];
												$phone = $row['phone'];
											 
											$address = $row['address'];	
										
									?>
									


						<?php include_once('first.php') ?>
						<?php include_once('header.php') ?>
						<?php include_once('sidebar.php') ?>



<!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
                          Employee
                    <small>Employee Panel</small>
          </h1>
          <ol class="breadcrumb">
                           <li><a href="http://localhost/smart_payroll/employee_in_loc/dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
          
            <li class="active">Update Profile</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Form</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
									
									<form role="form" action="" method="post" name="signupform"  enctype="multipart/form-data" class="form-horizontal">
									  <div class="box-body">
									  
									  
									 
										
										
										<div class="form-group">
										  <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
										  <div class="col-sm-10">
											<input type="text" name="uname"  value="<?php echo $name; ?>" required= "required" class="form-control"   />
										  </div>
										</div>
									
									  
									  
										
										<div class="form-group">
										  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
										  <div class="col-sm-10">
											<input type="text" name="upassword" class="form-control"  value="<?php echo $password; ?>"  id="inputPassword3">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="inputPassword3" class="col-sm-2 control-label">Phone</label>
										  <div class="col-sm-10">
											<input type="number" name="uphone" class="form-control"  value="<?php echo $phone; ?>"  id="inputPassword3">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="inputPassword3" class="col-sm-2 control-label">Address</label>
										  <div class="col-sm-10">
											<input type="text" name="uaddress" class="form-control"  value="<?php echo $address; ?>"  id="inputPassword3">
										  </div>
										</div>
										
										
										<div class="form-group">
										  <label for="inputPassword3" class="col-sm-2 control-label">Account No</label>
										  <div class="col-sm-10">
											<input type="text" name="uac_no" class="form-control"  value="<?php echo $ac_no; ?>"  id="inputPassword3">
										  </div>
										</div>
										
										
										
										
										
										
										
										
										<div class="form-group">
										  <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
										  
										  <div class="row">
										    <div class="col-md-3">
										  
										  <?php echo"
								<img src='../../admin/employee/images/$image'    width='100' height='100' /> 
								
									 ";?> </div>
									   <div class="col-md-3" style="padding-top:50px;">
											<input type="file"   name="uimage" id="inputEmail3" placeholder="ghg">
										  </div>
										    </div>
										</div>
										
										
										
										
										
										
										
									  </div><!-- /.box-body -->
									  <div class="box-footer">
										<button type="submit" class="btn btn-default">Cancel</button>
										<button type="submit" name="update" class="btn btn-info pull-right">Update</button>
									  </div><!-- /.box-footer -->
									</form>
              </div><!-- /.box -->

            
			
			
			
            
			
			
			
			
			
			
			
			
									
									<?php
						if(isset($_POST['update'])){
							
							$uname = $_POST['uname'];
							$upassword = $_POST['upassword'];
						
							$uphone = $_POST['uphone'];
							$uaddress = $_POST['uaddress'];
							$uac_no = $_POST['uac_no'];
					
							
												   $uimage = $_FILES['uimage']['name'];
														$image_tmp = $_FILES['uimage']['tmp_name'];
							
													move_uploaded_file($image_tmp,"../../admin/employee/images/$image");
							
							
											
							
							
							$update = "update employee set name='$uname', password='$upassword',phone='$uphone',address='$uaddress',ac_no='$uac_no', image='$uimage' where id='$id'";
							
							$run= mysqli_query($conn, $update);
							if($run)
							{
								echo"<script>alert('ur profile has been updated!')</script>";
								 echo"<script>window.open('edit_employee.php','_self')</script> ";
							}
							
							
						}
										
											 
							?>					
			
			
			
			
			
			
			
			
			
			
			
             

            

            </div><!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
             
             
            </div>
          </div>  
        </section>
      </div>
  
 
               

 <!-- Main content -->
       

	   <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Smart Payroll System</b> Final Project
        </div>
        <strong>Copyright &copy; Group G </strong> All rights reserved.
      </footer>
	   
	   
</div>








	
	
   
	
	
	
	<?php include_once('footer.php') ?>
	
	
	  </body>
</html>
	
	<?php } ?>
	
	
	