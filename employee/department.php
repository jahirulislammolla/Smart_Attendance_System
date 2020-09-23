<?php
session_start();
include("../dbconnect.php");


if(!isset($_SESSION['email'])){
	
	header("location: http://localhost/smart_payroll/admin/login.php");
}
else {
?>






						<?php include_once('../first.php') ?>
						<?php include_once('../header.php') ?>
						<?php include_once('../sidebar.php'); 
						
						  $date = date('Y-m-d');
						  
						  
						   $sql ="select * from department";
														$result = $con->query($sql);
														if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
														$department = $row['name'];}}
						  
						  ?>



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
										<div class="col-lg-3 col-xs-6">
										  <!-- small box -->
										  <div class="small-box bg-aqua">
											<div class="inner">
											
											 <?php  $tea=mysqli_query($con,"SELECT *
														FROM employee where  department like 'Production%'");
										   $no_employee=mysqli_num_rows($tea);
										   ?>
											
											  <h3><?php print_r($no_employee);?> </h3>
											  <p>Production</p>
											</div>
											<div class="icon">
											  <i class="ion ion-ios-people"></i>
											</div>
											
											<a href="view_department.php?department=<?php echo "Production";?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										  </div>
										</div><!-- ./col -->
										<div class="col-lg-3 col-xs-6">
										  <!-- small box -->
										  <div class="small-box bg-green">
											<div class="inner">
											
											 <?php  $dept=mysqli_query($con,"SELECT *
														FROM employee where  department like 'Research and Development%'");
										   $no_department=mysqli_num_rows($dept);
										   ?>
											  <h3><?php print_r($no_department);?><sup style="font-size: 20px"></sup></h3>
											  <p>Research and Development</p>
											</div>
											<div class="icon">
											  <i class="ion ion-ios-people"></i>
											</div>
											<a href="view_department.php?department=<?php echo "Research and Development";?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										  </div>
										</div><!-- ./col -->
										<div class="col-lg-3 col-xs-6">
										  <!-- small box -->
										  <div class="small-box bg-yellow">
											<div class="inner">
											  <?php  $at=mysqli_query($con,"SELECT *
														FROM employee where  department like 'Purchasing%'");
										   $att=mysqli_num_rows($at);
										   ?>
											
											  <h3><?php print_r($att);?> </h3>
											  <p>Purchasing</p>
											</div>
											<div class="icon">
											  <i class="ion ion-ios-people"></i>
											</div>
											<a href="view_department.php?department=<?php echo "Purchasing";?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										  </div>
										</div><!-- ./col -->
										<div class="col-lg-3 col-xs-6">
										  <!-- small box -->
										  <div class="small-box bg-red">
											<div class="inner">
											
											
											  <?php  $e=mysqli_query($con,"SELECT *
														FROM employee where  department like 'Marketing%'");
										   $no_e=mysqli_num_rows($e);
										   ?>
											
											  <h3><?php print_r($no_e);?> </h3>
											  <p>Marketing</p>
											</div>
											<div class="icon">
											  <i class="ion ion-ios-people"></i>
											</div>
											<a href="view_department.php?department=<?php echo "Marketing";?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										  </div>
										</div><!-- ./col -->
									  </div><!-- /.row -->
							   
							   
							   
							   	  
							 <div class="row">
										<div class="col-lg-3 col-xs-6">
										  <!-- small box -->
										  <div class="small-box bg-aqua">
											<div class="inner">
											
											 <?php  $tea1=mysqli_query($con,"SELECT *
														FROM employee where  department like 'Human Resource Management%'");
										   $no_employee1=mysqli_num_rows($tea1);
										   ?>
											
											  <h3><?php print_r($no_employee1);?> </h3>
											  <p>Human Resource Management</p>
											</div>
											<div class="icon">
											  <i class="ion ion-ios-people"></i>
											</div>
											<a href="view_department.php?department=<?php echo "Human Resource Management";?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										  </div>
										</div><!-- ./col -->
										<div class="col-lg-3 col-xs-6">
										  <!-- small box -->
										  <div class="small-box bg-green">
											<div class="inner">
											
											 <?php  $dept1=mysqli_query($con,"SELECT *
														FROM employee where  department like 'Accounting and Finance%'");
										   $no_department1=mysqli_num_rows($dept1);
										   ?>
											  <h3><?php print_r($no_department1);?><sup style="font-size: 20px"></sup></h3>
											  <p>Accounting and Finance</p>
											</div>
											<div class="icon">
											  <i class="ion ion-ios-people"></i>
											</div>
											<a href="view_department.php?department=<?php echo "Accounting and Finance";?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										  </div>
										</div><!-- ./col -->
										<div class="col-lg-3 col-xs-6">
										  <!-- small box -->
										  <div class="small-box bg-yellow">
											<div class="inner">
											  <?php  $at1=mysqli_query($con,"SELECT *
														FROM employee where  department like 'Quality Assurance%'");
										   $att1=mysqli_num_rows($at1);
										   ?>
											
											  <h3><?php print_r($att1);?> </h3>
											  <p>Quality Assurance</p>
											</div>
											<div class="icon">
											  <i class="ion ion-ios-people"></i>
											</div>
											<a href="view_department.php?department=<?php echo "Quality Assurance";?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										  </div>
										</div><!-- ./col -->
										<div class="col-lg-3 col-xs-6">
										  <!-- small box -->
										  <div class="small-box bg-red">
											<div class="inner">
											
											
											  <?php  $e1=mysqli_query($con,"SELECT *
														FROM employee where  department like 'Quality Control%'");
										   $no_e1=mysqli_num_rows($e1);
										   ?>
											
											  <h3><?php print_r($no_e1);?> </h3>
											  <p>Quality Control</p>
											</div>
											<div class="icon">
											  <i class="ion ion-ios-people"></i>
											</div>
											<a href="view_department.php?department=<?php echo "Quality Control";?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										  </div>
										</div><!-- ./col -->
									  </div><!-- /.row -->
							   
							   
							   
							   
							 
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
							
							
							