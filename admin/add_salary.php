<?php
session_start();
include("dbconnect.php");
                      include("controller.php");


if(!isset($_SESSION['email'])){
	
	header("location: http://localhost/ofc_pro/login.php");
}
else {
?>





					<?php include_once('first.php') ?>
					<?php include_once('header.php') ?>
					<?php include_once('sidebar.php') ?>



<!-- Content Wrapper. Contains page content -->
     

<!-- Main content -->
  
  <?php
  
                            $date = date('Y-m-d');
								 $curmonth = date('m');
							 $curyear = date('Y');?>
  
							<div class="content-wrapper">
								<!-- Content Header (Page header) -->
								<section class="content-header">
								  <h1>
									       
											<small><b>Current Month's Data</b></small> 
								  </h1>
								  
								 
								 
								</section>

								<!-- Main content -->
							
      </div>
  
 
               

 <!-- Main content -->
 
   
  
    <div class="content-wrapper">


	   
	   
	   
	   
	   
	   
							   
								 <section class="content">
								  <div class="row">
									<div class="col-xs-12">
							   
							   
										 <div class="box">
										<div class="box-header">
										 
										</div><!-- /.box-header -->
										<div class="box-body">
										
										
										
										
										
										
										
										
										
										
										
										
										  <table id="example" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Serial No</th>
                        <th>Name</th>
                        <th>Designation</th>
					      <th>Basic Salary</th>
						 <th>Total working Day</th>
						   <th>Present</th>
						   <th>Delay</th>
						    
                       
                      
                      </tr>
                    </thead>
                    <tbody>
					
					
					
					
					<?php

								$fridays = array();
								$fridays[0] = date('d',strtotime('first fri of this month'));
								$fridays[1] = $fridays[0] + 7;
								$fridays[2] =  $fridays[0] + 14;
								$fridays[3] =  $fridays[0] + 21;
								$fridays['last'] = date('d',strtotime('last fri of this month'));

								if($fridays[3] == $fridays['last']){
								  unset($fridays['last']);
								  $cfriday=4;
								}
								else {
								  $fridays[4] = $fridays['last'];
								  unset($fridays['last']);
								  $cfriday=5;
								  
								}
							
								
								
								
								
								$satdays = array();
								$satdays[0] = date('d',strtotime('first saturday of this month'));
								$satdays[1] = $satdays[0] + 7;
								$satdays[2] =  $satdays[0] + 14;
								$satdays[3] =  $satdays[0] + 21;
								$satdays['last'] = date('d',strtotime('last saturday of this month'));

								if($satdays[3] == $satdays['last']){
								  unset($satdays['last']);
								  $csaturday=4;
								}
								else {
								  $satdays[4] = $satdays['last'];
								  unset($satdays['last']);
								  $csaturday=5;
								  
								}
							
								
								
								
?>
					
					
						<?php
						
						
						                 $uid = $_GET['id'];
					
					                
											 $get_members ="select * from teacher where id='$uid'";
														$run_members = mysqli_query($conn,$get_members);
														$serialnumber=0;
														while($row = mysqli_fetch_array($run_members)){
														 $serialnumber++;
														$id = $row['id'];
														$designation = $row['designation'];
														$name = $row['nam'];
														
														$get_members1 ="select basic from salary where desig='$designation'";
														$run_members1 = mysqli_query($conn,$get_members1);
														while($row1 = mysqli_fetch_array($run_members1)){
														$basic = $row1['basic'];}
														
															$get_members2 ="select * from records where date LIKE '$curyear-$curmonth-%' AND name='$name' AND attendance_status LIKE 'Pre%' ";     
														$run_members2 = mysqli_query($conn,$get_members2);
														
														 $nopd=mysqli_num_rows($run_members2);
														 
														 
														 
														 $ld = date('d',strtotime('last day of this month'));
														 
														 $get_members3 ="select * from calendar where off_day LIKE '$curyear-$curmonth-%'";     
														$run_members3 = mysqli_query($conn,$get_members3);
														
														 $others_off=mysqli_num_rows($run_members3);

								                  $total_off= $others_off + $cfriday + $csaturday;
												  $nowd= $ld - $total_off;
												  
												  
					 $get_members4 ="select * from records where date LIKE '$curyear-$curmonth-%' AND name='$name' AND time > '10:00:00:000000'  ";     
														$run_members4 = mysqli_query($conn,$get_members4);
														
														 $delay_count=mysqli_num_rows($run_members4);
														
														echo"
														
													 <tr>
									<td> $serialnumber </td>
									<td>$name</td>
									<td>$designation</td> 
									<td>$basic</td>
									   <td>$nowd</td> 	
                                <td>$nopd</td> 	
                                  <td>$delay_count</td> 	
 	 
									
									
								  </tr>
											
											
											
											";
														}
											
			             		?>
					
					
                     
                    
                     
                     
                    </tbody>
					
					
				
                   
                  </table>
										
										
										
										
										
										
										
										
										
										</div><!-- /.box-body -->
									  </div><!-- /.box -->
							   
							   
							   </div>
							   </div>
							   </section>
		                           
												<?php
												
											

?>
														
	   
	   		
	   

	   
	   
	   	   
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
	
	
	
	
	
	
	
	
	
	<!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
   
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
	
	
	
	
	
	
	  </body>
</html>
	
	<?php } ?>
	
	
	