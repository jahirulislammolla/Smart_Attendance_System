<!doctype html>
<html>
<body onload="javascript:insertText()">
<?php
session_start();
include("dbconnect.php");
                      include("controller.php");


if(!isset($_SESSION['email'])){
	
	header("location: http://localhost/smart_payroll/admin/login.php");
}
else {
?>





					<?php include_once('first.php') ?>
					<?php include_once('../header.php') ?>
					<?php include_once('../sidebar.php') ?>



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
									       
											
											<?php
						
						$p = $_GET['month'];
                          $r = $_GET['year'];						
						echo "Month: " .$p. "-" .$r;
						//echo "Year:  " .$r;
						
						?>
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
						   <th>Rent & others</th>
						 <th>Total working Day</th>
						   <th>Present</th>
						   <th>Delay</th>
						      <th>Absent</th>
							     <th>Leave Deduction</th>
					 <th>Net Salary</th>
						<th>Total Due</th>
                       
                      
                      </tr>
                    </thead>
                    <tbody>
					
					
					
					
					<?php

								$fridays = array();
								
								
								
								$fridays[0] = date('d',strtotime("first fri of $p $r"));
								$fridays[1] = $fridays[0] + 7;
								$fridays[2] =  $fridays[0] + 14;
								$fridays[3] =  $fridays[0] + 21;
								$fridays['last'] = date('d',strtotime("last fri of $p $r"));

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
								$satdays[0] = date('d',strtotime("first saturday of $p $r"));
								$satdays[1] = $satdays[0] + 7;
								$satdays[2] =  $satdays[0] + 14;
								$satdays[3] =  $satdays[0] + 21;
								$satdays['last'] = date('d',strtotime("last saturday of $p $r"));

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
					
					                
											 $get_members ="select * from employee where id='$uid'";
														$run_members = mysqli_query($conn,$get_members);
														$serialnumber=0;
														while($row = mysqli_fetch_array($run_members)){
														 $serialnumber++;
														$id = $row['id'];
														$designation = $row['designation'];
														$department = $row['department'];
														$name = $row['name'];
														$email = $row['email'];
														
														$ac_no = $row['ac_no'];
														
														$get_members1 ="select * from salary where desig='$designation'";
														$run_members1 = mysqli_query($conn,$get_members1);
														while($row1 = mysqli_fetch_array($run_members1)){
														$basic = $row1['basic'];
														$others = $row1['others'];
														
														}
														
															
														 
														 
														 
														 $ld = date('d',strtotime("last day of $p $r"));
														 
														 
														 
														 
														 if($p=='january')
														{$m='01';}
													if($p=='february')
														{$m='02';}
													if($p=='march')
														{$m='03';}
													if($p=='april')
														{$m='04';}
													if($p=='may')
														{$m='05';}
													if($p=='june')
														{$m='06';}
													if($p=='july')
														{$m='07';}
													if($p=='august')
														{$m='08';}
													if($p=='september')
														{$m='09';}
													if($p=='october')
														{$m='10';}
													if($p=='november')
														{$m='11';}
													if($p=='december')
														{$m='12';}
													
														 
														 
														 
														 
														 $get_members3 ="select * from calendar where off_day LIKE '$r-$m-%'";     
														$run_members3 = mysqli_query($conn,$get_members3);
														
														 $others_off=mysqli_num_rows($run_members3);

								                  $total_off= $others_off + $cfriday + $csaturday;
												  $nowd= $ld - $total_off;
												  $sm=$p.'-'.$r;
												  
												  
												  
												  $get_members2 ="select * from records where date LIKE '$r-$m-%' AND name='$name' AND attendance_status LIKE 'Pre%' ";     
														$run_members2 = mysqli_query($conn,$get_members2);
														
														 $nopd=mysqli_num_rows($run_members2);
												  
												  $tabsent= $nowd-$nopd;
												  
					 $get_members4 ="select * from records where date LIKE '$r-$m-%' AND name='$name' AND time > '10:00:00:000000'  ";     
														$run_members4 = mysqli_query($conn,$get_members4);
														
														 $delay_count=mysqli_num_rows($run_members4);
														 
														 
														 
														    $absent=0;

                            $absent= $nowd-$nopd;
		
							$delay_c=$delay_count;
							$basic_sal =$basic;
							$percentage=2;
							
							if($delay_c>3){$delay = floor($delay_c / 3);
							$absent=$absent+$delay;}
							
							
							
								$deducted_amount=0;
								$netsal=0;
								$netper=0;
							if($absent >=2){
							$absent= $absent-2;
							$netper = ($percentage / 100) * $basic_sal;
							
							$netsal= $basic_sal-($absent*$netper);
							
							$deducted_amount=$absent*$netper;
							}
							else{$netsal= $basic_sal;}
							
							//provident......
							
							$provident=(int)$basic_sal*.05;
							
							//task performance management....
							$task=0;
							
							$lm= date('Y-m',strtotime("last day of last month"));
							$count_pending=0;
							$count_ok=0;
							$count_done=0;
							$count_total=0;
							$count_success=0;
							$sq="select count(last_date) count_pending from task where email='$email' and last_date between '$lm-01' AND '$lm-31'";
							 $result = mysqli_query($conn, $sq);
							 while($row=mysqli_fetch_array($result))
							 {
								 $count_pending = $row['count_pending']; 
							 }
							$sql="select count(last_date) count_done, COALESCE(sum(Submit_date<last_date), 0) count_ok from performance where email='$email' and last_date between '$lm-01' AND '$lm-31'";
							 $resut = mysqli_query($conn, $sql);
							 while($row=mysqli_fetch_array($resut))
							 {
								 
								 $count_done = $row['count_done'];
								 $count_ok=$row['count_ok'];
							 }
							if ($count_done+$count_pending>0 and $count_ok>0)
							{	
								$count_total=$count_done+$count_pending;
								$count_sucess=($count_ok/$count_total)*100;
							}
							if ($count_success>49)
							{
								$task=$basic_sal*(int)$count_success/1000;
							}
										
							$netsal=$others+$netsal+$task-$provident-($basic_sal*.025);							 
														 
														 
														 
														
														echo"
														
													 <tr>
									<td> $serialnumber </td>
									<td>$name</td>
									<td>$designation</td> 
									<td>$basic</td>
									<td>$others</td>
									   <td>$nowd </td> 	
                                <td>$nopd</td> 	
								<td>$delay_count</td>
								
								<td> $tabsent</td> 
								<td>$deducted_amount</td>
								<td>$netsal</td>
								";
								
									$amount_due=$netsal;
								
								 $get_members5 ="select * from payment where salary_of_month LIKE '$p-$r%'";     
														$run_members5 = mysqli_query($conn,$get_members5);
										while($row = mysqli_fetch_array($run_members5)){
										$amount_paid = 0;
										
										$get_members6="select total_due from due where email='$email'";
										$run_members6 = mysqli_query($conn,$get_members6);
												while($row1 = mysqli_fetch_array($run_members6))
												{
													$amount_due=(int) $row1["total_due"];
												}
														
														
										
										}
										echo"<td id='last_amount_due'> Due &nbsp $amount_due</td>
												
										
                                   	
 	 
									
									
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
							   
							  
							   <a href="#add<?php echo $uid;?>" data-toggle="modal"><button type='button'  class='btn btn-success'><span class='glyphicon glyphicon-plus' ></span> Add Salary</button></a>
							   
							   
							   
							   </section>
		                           
												<?php
												
											

?>
														
	   
	   		
	   

	   
	   
	   	   
</div>

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
       <!--Edit Item Modal -->
        
				<div id="add<?php echo $uid;?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Salary</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="add_salary" value="<?php echo $id; ?>" disabled/>
                          

					
                            
							<div class="row">
							<div class="col-md-6" class="form-group">
						<label for="email">Name</label>
						<input type="text" name="name" id="name"  class="form-control" value="<?php echo $name; ?>" placeholder="name"   disabled/>
					
					       </div>
						   
						   	
							<div class="col-md-6" class="form-group">
						<label for="email">Email</label>
						<input type="text" name="email" id="email"  class="form-control" value="<?php echo $email; ?>" placeholder="email"  disabled/>
					
					       </div>
						   </br>
						   </div>
						   
						   <div class="row">
						   
						   <div class="col-md-6"  class="form-group">
						<label for="email">Salary Of Month</label>
						<input type="text" name="sm" id="sm"  class="form-control" value="<?php echo ' ' .$p. '-' .$r; ?>" placeholder="sm"   disabled/>
					
					       </div>
						   <div class="col-md-6" class="form-group">
						<label for="email">Rent & others</label>
						<input type="text" name="others" id="others"  class="form-control" value="<?php echo $others; ?>" placeholder="others"  disabled/>
					
					       </div>
						   </br>
						   
					       </div>
						   
						   
						    <div class="row">
						   <div class="col-md-6" class="form-group">
						<label for="email">Account Number</label>
						<input type="text" name="ac_no" id="ac_no"  class="form-control" value="<?php echo $ac_no; ?>" placeholder="ac_no"   disabled/>
					</div> <div class="col-md-6" class="form-group">
						<label for="email">Basic</label>
						<input type="text" name="basic" id="basic"  class="form-control" value="<?php echo $basic; ?>" placeholder="basic"   disabled/>
					           </div>
					       </div>
						   <div class="row">
						   
							   
							    <div class="col-md-4" class="form-group">
						<label for="email">Delay</label>
						<input type="text" name="basic" id="basic"  class="form-control" value="<?php echo $delay_c; echo"&nbsp;Days"; ?>" placeholder="basic"   disabled/>
					           </div>
							   <div class="col-md-4" class="form-group">
						<label for="email">Performance Pay</label>
						<input type="text" name="basic" id="basic"  class="form-control" value="<?php echo $task; ?>" placeholder="basic"   disabled/>
					           </div>
							   
							   
							   
							   <div class="col-md-4" class="form-group">
						<label for="email">Provident</label>
						<input type="text" name="basic" id="basic"  class="form-control" value="<?php echo $provident; ?>" placeholder="basic"   disabled/>
					           </div>
							   
							   
							   
					       </div>
						   
						   
						   
						    <div class="row">
					       
						 
						   
						   <div class="col-md-4" class="form-group">
						<label for="email">Leave deduction</label>
						<input type="text" name="basic" id="basic"  class="form-control" value="<?php echo $deducted_amount; ?>" placeholder="basic"   disabled/>
					           </div>
							   
							   <div class="col-md-4" class="form-group">
						<label for="email">Tax</label>
						<input type="text" name="basic" id="basic"  class="form-control" value="<?php echo $basic_sal*0.025; ?>" placeholder="basic"   disabled/>
					           </div>
							     <div class="col-md-4" class="form-group" >
						<label for="email">Net Salary</label>
						<input type="text" name="netsal" id="netsal"  class="form-control" value="<?php echo $netsal; ?>" placeholder="netsal"   disabled/>
					
					       </div>
						   </br>
						   </div>
						   
						   
						   <?php $get_members10 ="select * from due where email='$email'";
														$run_members10 = mysqli_query($conn,$get_members10);
														while($row10 = mysqli_fetch_array($run_members10)){
														$td = $row10['total_due'];
														
														
														}?>
						    <div class="row">
							
						   
						   <div class="col-md-6" class="form-group">
						<label for="email">Total Due upto this month</label>
						<input type="number" name="td" id="td"  class="form-control"  value="<?php echo $td; ?>"   disabled/>
					
					       </div>
                  <div class="col-md-6" class="form-group">
						<label for="email">Amount Pay</label>
						<input type="number" name="amount_paid" id="amount_paid"  class="form-control"  placeholder="amount  pay"   />
					
					       </div>	



						   </div>						
  
                        </div>
                        <div class="modal-footer">
                            <button onclick='function_modal()' class="btn btn-primary" name="pay" data-dismiss="modal"><span class="glyphicon glyphicon-edit"></span> Pay</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                        </div>
                    </div>
                </div>
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
		function function_modal(){
				  //console.log("kkkk");
				  name='<?php echo $name;?>';
				  email='<?php echo $email;?>';
				  ac_no='<?php echo $ac_no;?>';
				  basic='<?php echo $basic;?>';
				  tabsent='<?php echo $tabsent;?>';
				  delay_c='<?php echo $delay_c;?>';
				  deducted_amount='<?php echo $deducted_amount;?>';
				  netsal='<?php echo $netsal;?>';
				 amount_paid=document.getElementById('amount_paid').value;
				  amount_due='<?php echo $amount_due;?>';
				  date='<?php echo $date;?>';
				  sm='<?php echo $sm;?>';
						
				  //console.log(amount_due+" "+amount_paid);
				  check="name="+name+"&email="+email+"&ac_no="+ac_no+"&basic="+basic+"&tabsent="+tabsent+"&delay_c="+delay_c+'&deducted_amount='+deducted_amount+'&netsal='+netsal+'&amount_paid='+amount_paid+"&amount_due="+amount_due+'&date='+date+'&sm='+sm;
				  if(amount_paid!='' && parseInt(amount_due)>=parseInt(amount_paid))
				  { 
				document.getElementById("last_amount_due").innerHTML ="Due "+(parseInt(amount_due) - parseInt(amount_paid))+"";
					loadDoc(check);  
				  }
				  else{
					  alert("Can't pay more than account payble.");
				  }
				  
			}
	
		function loadDoc(check) {
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			 console.log(this.responseText);
			 location.reload();
			}
		  };
		  xhttp.open("POST", "update_due.php", true);
		  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		  xhttp.send(check);
		}
	</script>
	  </body>
</html>
	
	<?php } ?>
	
	