<?php
session_start();
include("dbconnect.php");


if(!isset($_SESSION['email'])){
	
	header("location: http://localhost/smart_payroll/admin/login.php");
}
else {
?>












                             <?php $uid = $_GET['id'];?>






						<?php include_once('first.php') ?>
						<?php include_once('../header.php') ?>
						<?php include_once('../sidebar.php') ?>



<!-- Content Wrapper. Contains page content -->
     

<!-- Main content -->
  
  
  
  
  
  
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Salary
                    <small>Admin Panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
          
            <li class="active">Add Salary</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row" >
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
            <div class="box box-info">
               
                <!-- form start -->
									
									
              </div><!-- /.box -->

            
             

            

            </div><!--/.col (left) -->
            <!-- right column -->
							
			             <div class="col-md-4" style="margin-top:50px;">
						 
							 <select id="month" name="month" class="btn btn-default " style="border:1px solid steelblue; border-radius:5px" >
							<option value="january">January</option>
							<option value="february">February</option>
							<option value="march">March</option>
							<option value="april">April</option>
							<option value="may">May</option>
							<option value="june">June</option>
							<option value="july">July</option>
							<option value="august">August</option>
							<option value="september">September</option>
							<option value="october">October</option>
							<option value="november">November</option>
							<option value="december">December</option>
							 
							 </select>
							 
							  
							 <select id='year' name="year" class="btn btn-default " style="border:1px solid steelblue; border-radius:5px">
							
							 <?php for ($i = 2000; $i<=2070; $i++ )   {
								 
								 ?>
							 <option><?php echo"$i"; ?></option>
							 
							<?php } 
							 ?>
							 
							 </select>
							 
							 <button id='submit' name="submit" class="btn btn-primary" value="submit">Submit</button>
							 
							</div>
			
										
											
			
			
			
							<div class="col-md-8" style="margin-top:50px;" >
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							   <!-- Calendar -->
										  			
										
										
									 <div class="box">
										<div class="box-header">
										  <h3 class="box-title">Total Due of This employee</h3>
										</div><!-- /.box-header -->
										<div class="box-body">
										
										
										
										
										
										
										
										
										
										
										
										
										  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                       
                        <th>Name</th>
                        <th>Total Due</th>
					     
                      
                      </tr>
                    </thead>
                    <tbody>
					<?php 
					         $date=date("Y-m-d ");
							 
							 $sql1 ="select * from employee where id='$uid'";
														$result1 = $con->query($sql1);
														if ($result1->num_rows > 0) {
                        // output data of each row
                        while($row1 = $result1->fetch_assoc()) {
														$id = $row1['id'];
														$name = $row1['name'];
														$email = $row1['email'];
														}}




							$sql ="select * from due where email='$email'";
														$result = $con->query($sql);
														if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                                                         $id = $row['id'];
														$name = $row['name'];
														$total_due = $row['total_due'];
														
														
                                                     														
													
														
													
															
                            

                            echo "<tr>
                                 
									<td>$name</td>
									<td>$total_due</td>
									
									 
														"; }}?>
				
					
                     
                    
                     
                     
                    </tbody>
                   
                  </table>
										
										
										
										
										
										
										
										
										
										</div><!-- /.box-body -->
									  </div>
										  </div><!-- /.box -->
										  
										  
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
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
	<script type='text/javascript'>
		$(document).ready(function(){
			$("button").on("click",function(){
				var month=$("#month").val();
				var year=$("#year").val();
				console.log(month+" "+year);
				location.href='addsal.php?id='+<?php echo $uid ?>+'&month='+month+'&year='+year;
			});
		});
	</script>
	  </body>
</html>
	
	<?php } ?>
	
	
	