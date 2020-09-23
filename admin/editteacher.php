<?php
session_start();
include("dbconnect.php");


if(!isset($_SESSION['email'])){
	
	header("location: http://localhost/ofc_pro/login.php");
}
else {
?>





<!-- Main content -->
  
			
  
  
  
  
    <div class="content-wrapper">


	   
	   
	   
	   
	   
	   
							   
								
		                           
												<?php
												
											

?>
														
	   
	   				 <div class="modal fade" id="a1" role="dialog">
							<div class="modal-dialog">
							<!-- Modal content-->
							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">Edit Teacher's Information</h4>
								</div>
								<div class="modal-body">
													 
																	 
																
																 <form action=" " method="post" role="form" class="contactForm">
												
													<div class="form-group">
												<label for="name">Name</label>
												<input type="text" name="aname"   class="form-control" value="<?php 
									$uid = $_GET['id'];
									$get_user ="select * from teacher where id='$uid'";
									$run_user = mysqli_query($con,$get_user);
									$row1 = mysqli_fetch_array($run_user);
									
								
									
									
									$name1 = $row1['name']; echo $name1; ?>" required="required" />
					
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="aemail"   class="form-control"  value="<?php echo $email; ?>" required="required" />
					
					</div>
					
				
					<div class="form-group">
						<label for="email">Designation</label>
						<input type="text" name="adesignation"  class="form-control" value="<?php echo $designation; ?>" required="required" />
					
					</div>
					
					
					<div class="form-group">
						<label for="email">Phone</label>
						<input type="number" name="aphone"  class="form-control" value="<?php echo $phone; ?>" required="required" />
					
					</div>
                            
							
							<div class="form-group">
						<label for="email">Address</label>
						<input type="text" name="aaddress"  class="form-control" value="<?php echo $address; ?>" required="required" />
					
					</div>
					
					
					<div class="form-group">
						<label for="email">Image</label>
						
						
					         <div class="row">
								<img class="col-sm-6" id="output1" style="width:150px;height:70px;" src="<?php echo $image; ?>">
									<input class="col-sm-6" style="padding-top:20px;" type="file" name="aimage"   required="required" />
					</div>
					</div>
					
                          
                            
                            <div class="form-group">
						
						<input type="submit" value="Update" name="app2" >
					
					</div>
                        </form>			
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>  
    </div>
  </div>
	   

	   
	   
	   	   
</div>



	   <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Smart Payroll System</b> Final Project
        </div>
        <strong>Copyright &copy; Group G </strong> All rights reserved.
      </footer>
	   

									


	
	
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

	