							<?php
							session_start();
					
								include("controller.php");


							if(!isset($_SESSION['email'])){
								
								header("location: http://localhost/smart_payroll/admin/login.php");
							}
							else {
							?>





	
			<?php
								$user = $_SESSION['email'];
								
								$get_user1 ="select * from admin where email='$user'";
								$run_user1 = mysqli_query($con,$get_user1);
								$row1 = mysqli_fetch_array($run_user1);
								
							
								
											$id = $row1['id'];
											$name = $row1['name'];
											$email = $row1['email'];
											   $image = $row1['image'];
											$password = $row1['password'];
											
											
										



									 
									
								
									
										
									?>
									






























						<?php include_once('first.php') ?>
						<?php include_once('header.php') ?>
						<?php include_once('sidebar.php') ?>



<!-- Content Wrapper. Contains page content -->
     

<!-- Main content -->
  
  
  
  
  
  
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
                         Admin
                    <small>Admin Panel</small>
          </h1>
          <ol class="breadcrumb">
                           <li><a href="http://localhost/smart_payroll/admin/dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
          
            <li class="active">Admin Profile</li>
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
										  <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
										  
										  <div class="row">
										    <div class="col-md-3">
										  
										  <?php echo"
								<img src='images/$image'    width='100' height='100' /> 
								
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
						
							
					
							
												   $uimage = $_FILES['uimage']['name'];
														$image_tmp = $_FILES['uimage']['tmp_name'];
							
													move_uploaded_file($image_tmp,"images/$image");
							
							
											
							
							
							$update = "update admin set name='$uname', password='$upassword', image='$uimage' where id='$id'";
							
							$run= mysqli_query($con, $update);
							if($run)
							{
								
								 echo"<script>window.open('edit_admin.php','_self')</script> ";
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








	
	
     <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
	
	
	
	
	
	
	  </body>
</html>
	
	<?php } ?>
	
	
	