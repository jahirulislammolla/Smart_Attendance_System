<?php
session_start();
include("dbconnect.php");


if(!isset($_SESSION['email'])){
	
	header("location: http://localhost/smart_payroll/admin/login.php");
}
else {
?>





<?php
 include("dbconnect.php");
	
	           if(isset($_POST['submit'])){
		
		  
		
								$name= mysqli_real_escape_string($conn,$_POST['name']);
								$password= mysqli_real_escape_string($conn,$_POST['password']);
								$email= mysqli_real_escape_string($conn,$_POST['email']);
								
								$department= mysqli_real_escape_string($conn,$_POST['department']);
								
								$gender= mysqli_real_escape_string($conn,$_POST['gender']);
                                $phone= mysqli_real_escape_string($conn,$_POST['phone']);
								$designation= mysqli_real_escape_string($conn,$_POST['designation']);
								$address= mysqli_real_escape_string($conn,$_POST['address']);
								$ac_no= mysqli_real_escape_string($conn,$_POST['ac_no']);
								$date = date('Y-m-d');
								
								
													$image = $_FILES['image']['name'];
							$image_tmp = $_FILES['image']['tmp_name'];
							
							move_uploaded_file($image_tmp,"images/$image");
								
								
		 
		
								
								$get_email = "select * from employee where email='$email'";
								$run_email = mysqli_query($conn, $get_email);
								$check = mysqli_num_rows($run_email);
								
								if($check==1){
									
									echo"<script>alert('This email is already registered!')</script>";
									exit();
								}
								
								if(strlen($password)<5){
									
									echo"<script>alert('password should be minimum 5 charecters.')</script>"; 
									exit();	
								}
								else{
			
									$insert1 = "insert into employee (name,email,password,department,designation,gender,phone,address,ac_no,image,joindate) values('$name','$email','$password','$department','$designation','$gender','$phone','$address','$ac_no','$image','$date')";
									
									
									
									$run_insert1 = mysqli_query($conn,$insert1);
									
									if($run_insert1){
										
										$_SESSION['email']=$email;
										
										
										echo"<script>alert('Insertion Successful!')
										</script>";
										echo"<script>window.open('add_employee.php','_self')
										</script>";
										
														
									}
									
									
									
									
									
			
		}
		
		
	}
	
	
	





?>
































						<?php include_once('first.php') ?>
						<?php include_once('../header.php') ?>
						<?php include_once('../sidebar.php') ?>



<!-- Content Wrapper. Contains page content -->
     

<!-- Main content -->
  
  
  
  
  
  
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin
                    <small>Admil Panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="http://localhost/smart_payroll/admin/dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
          
            <li class="active">Add Employee</li>
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
                  <h3 class="box-title">Add New Employee</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
									
									<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform"  enctype="multipart/form-data" class="form-horizontal">
									  <div class="box-body">
									  
									  
									 
										
										
										<div class="form-group">
										  <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
										  <div class="col-sm-10">
											<input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Full Name">
										  </div>
										</div>
									  
									  
									  
									  
										<div class="form-group">
										  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
										  <div class="col-sm-10">
											<input type="email"  name="email" class="form-control" id="inputEmail3" placeholder="Enter Email">
										  </div>
										</div>
										<div class="form-group">
										  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
										  <div class="col-sm-10">
											<input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
										  </div>
										</div>
										
										
										
										 <div class="form-group">
										  <label for="inputEmail3" class="col-sm-2 control-label">Department</label>
										  <div class="col-sm-10">
											
											
											<select id="inputEmail3" name="department" class="form-control "  >
							<option >Select a department</option>
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
										
										
										
										
										
										 <div class="form-group">
										  <label for="inputEmail3" class="col-sm-2 control-label">Designation</label>
										  <div class="col-sm-10">
											<select id="inputEmail3" name="designation" class="form-control "  >
							<option >Select a Designation</option>
							<option value="Officer">Officer</option>
							<option value="Executive">Executive</option>
							<option value="Assistant Manager">Assistant Manager</option>
							<option value="Manager">Manager</option>
							<option value="Vice President">Vice President</option>
							
							<option value="CEO">CEO</option>
							
							 
							 </select>
										  </div>
										</div>
										
										
										
										<div class="form-group">
										  <label for="inputEmail3" class="col-sm-2 control-label">Gender</label>
										  <div class="col-sm-10">
											<input type="text" name="gender" class="form-control" id="inputEmail3" placeholder="Gender">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
										  <div class="col-sm-10">
											<input type="number"  name="phone" class="form-control" id="inputEmail3" placeholder="Phone">
										  </div>
										</div>
										
										
										<div class="form-group">
										  <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
										  <div class="col-sm-10">
											<input type="text" class="form-control"  name="address" id="inputEmail3" placeholder="Address">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="inputEmail3" class="col-sm-2 control-label">Account No</label>
										  <div class="col-sm-10">
											<input type="text" class="form-control"  name="ac_no" id="inputEmail3" placeholder="Account no">
										  </div>
										</div>
										
										
										
										
										<div class="form-group">
										  <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
										  <div class="col-sm-10">
											<input type="file"   name="image" id="inputEmail3" placeholder="ghg">
										  </div>
										</div>
										
										
										
										
										
										
										
									  </div><!-- /.box-body -->
									  <div class="box-footer">
										<button type="submit" class="btn btn-default">Cancel</button>
										<button type="submit" name="submit" class="btn btn-info pull-right">Sign in</button>
									  </div><!-- /.box-footer -->
									</form>
              </div><!-- /.box -->

            
             

            

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
	
	
	