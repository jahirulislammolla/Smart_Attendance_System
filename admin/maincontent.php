<?php

include 'controller.php';
include 'dbconnect.php';
if(!isset($_SESSION['email'])){

	header("location: http://localhost/Smart_Attendance_System/");
}
else {
	?>

	<?php

	$user = $_SESSION['email'];
	include("dbconnect.php");

	if(isset($_POST['submit'])){



		$receiver= mysqli_real_escape_string($con,$_POST['receiver']);
		$subject= mysqli_real_escape_string($con,$_POST['subject']);
		$msg= mysqli_real_escape_string($con,$_POST['msg']);

		$date = date('Y-m-d');

		$insert1 = "insert into message (sender,receiver,subject,msg,date,time) values('$user','$receiver','$subject','$msg','$date',NOW())";

		$run_insert1 = mysqli_query($con,$insert1);

		if($run_insert1){
			echo"<script>alert('Message sent!')
			</script>";
			echo"<script>window.open('dashboard.php','_self')
			</script>";
		}

	}

	?>

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

	$date = date('Y-m-d');


	?>






	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Dashboard
				<small>Admin panel</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">

							<?php  $tea=mysqli_query($con,"SELECT *
								FROM employee");
								$no_employee=mysqli_num_rows($tea);
								?>

								<h3><?php print_r($no_employee);?> </h3>
								<p>Employee</p>
							</div>
							<div class="icon">
								<i class="ion ion-person"></i>
							</div>
							<a href="all_employee.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div><!-- ./col -->
					<div class="col-lg-3 col-xs-6">
						<!-- small box -->
						<div class="small-box bg-green">
							<div class="inner">

								<?php  $dept=mysqli_query($con,"SELECT *
									FROM department");
									$no_department=mysqli_num_rows($dept);
									?>
									<h3><?php print_r($no_department);?><sup style="font-size: 20px"></sup></h3>
									<p>Department</p>
								</div>
								<div class="icon">
									<i class="ion ion-ios-people"></i>
								</div>
								<a href="department.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div><!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-yellow">
								<div class="inner">
									<?php  $att=mysqli_query($con,"SELECT *
										FROM records
										WHERE DAY(date) = DAY(CURRENT_DATE())
										AND MONTH(date) = MONTH(CURRENT_DATE())
										AND YEAR(date) = YEAR(CURRENT_DATE())");
										$att=mysqli_num_rows($att);
										?>

										<h3><?php print_r($att);?> </h3>
										<p>Today's Attendance</p>
									</div>
									<div class="icon">
										<i class="ion ion-ios-keypad"></i>
									</div>
									<a href="view_all.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div><!-- ./col -->
							<div class="col-lg-3 col-xs-6">
								<!-- small box -->
								<div class="small-box bg-red">
									<div class="inner">


										<?php  $e=mysqli_query($con,"SELECT *
											FROM event where date='$date'");
											$no_e=mysqli_num_rows($e);
											?>

											<h3><?php print_r($no_e);?> </h3>
											<p>Today's Events</p>
										</div>
										<div class="icon">
											<i class="ion ion-ios-book"></i>
										</div>
										<a href="event.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div><!-- ./col -->
							</div><!-- /.row -->
							<!-- Main row -->
							<div class="row">
								<!-- Left col -->
								<section class="col-lg-7 connectedSortable">
									<!-- Custom tabs (Charts with tabs)-->


									<!-- Chat box -->


									<!-- TO DO List -->


									<!-- quick email widget -->
									<div class="box box-info">
										<div class="box-header">
											<i class="fa fa-envelope"></i>
											<h3 class="box-title">Send Message</h3>
											<!-- tools box -->
											<div class="pull-right box-tools">
												<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
											</div><!-- /. tools -->
										</div>
										<div class="box-body">
											<form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">
												<div class="form-group">
													<input type="email" name="receiver" class="form-control"  placeholder="Email to:">
												</div>
												<div class="form-group">
													<input type="text" name="subject" class="form-control"  placeholder="Subject">
												</div>
												<div>
													<input type="text" placeholder="Message"  name="msg" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
												</div>
												<div class="box-footer clearfix">
													<button class="pull-right btn btn-default"  name="submit" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
												</div>
											</form>
										</div>

									</div>

								</section><!-- /.Left col -->
								<!-- right col (We are only adding the ID to make the widgets sortable)-->
								<section class="col-lg-5 connectedSortable">

									<!-- Map box -->

									<!-- /.box -->

									<!-- solid sales graph -->

									<!-- Calendar -->
									<div class="box box-solid bg-green-gradient">
										<div class="box-header">
											<i class="fa fa-calendar"></i>
											<h3 class="box-title">Calendar</h3>
											<!-- tools box -->
											<div class="pull-right box-tools">
												<!-- button with a dropdown -->
												<div class="btn-group">
													<button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
													<ul class="dropdown-menu pull-right" role="menu">
														<li> <a href="#edit" data-toggle="modal" >Add Off Day </a></li>
														<li><a href="#event" data-toggle="modal">Add new event</a></li>



													</ul>
												</div>
												<button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
												<button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
											</div><!-- /. tools -->
										</div><!-- /.box-header -->
										<div class="box-body no-padding">
											<!--The calendar -->
											<div id="calendar" style="width: 100%"></div>
										</div><!-- /.box-body -->
										<div class="box-footer text-black">
											<div class="row">
												<div class="col-sm-6">
													<!-- Progress bars -->

													<a href="#"  class="btn btn-info" style="width:45%;">Fridays </a>
													<a href="#"  class="btn btn-outline-info" style="width:45%;"><?php print_r($cfriday);?> </a>

												</div ><!-- /.col -->
												<div class="col-sm-6" >
													<a href="#"  class="btn btn-info"style="width:45%;">Saturdays </a>
													<a href="#"  class="btn btn-outline-info" style="width:45%;"><?php print_r($csaturday);?> </a>
												</div><!-- /.col -->


												<div id="edit" class="modal fade" role="dialog">
													<form method="post" class="contactForm" role="form" enctype="multipart/form-data">
														<div class="modal-dialog">
															<!-- Modal content-->
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title">Add Off Day</h4>
																</div>
																<div class="modal-body">
																	<input type="hidden" name="add_off_day">


																	<div class="form-group">
																		<label for="email">Date</label>
																		<input type="date"  id="off_day" name="off_day"   class="form-control"   placeholder="Add off Day"  />

																	</div>

																	<div class="form-group">
																		<label for="email">Description</label>
																		<input type="text" name="description" id="description"  class="form-control" placeholder="Add description"  />

																	</div>



																</div>
																<div class="modal-footer">
																	<button type="submit" class="btn btn-primary" name="update"><span class="glyphicon glyphicon-edit"></span> Update</button>
																	<button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
																</div>
															</div>
														</div>
													</div>


												</form>


												<div id="event" class="modal fade" role="dialog">
													<form method="post" class="contactForm" role="form" enctype="multipart/form-data">
														<div class="modal-dialog">
															<!-- Modal content-->
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title">Add new Event</h4>
																</div>
																<div class="modal-body">
																	<input type="hidden" name="add_off_day">


																	<div class="form-group">
																		<label for="email">Event On</label>
																		<input type="text" name="topic" id="topic"  class="form-control" placeholder="Add Topic"  />

																	</div>

																	<div class="form-group">
																		<label for="email">Date</label>
																		<input type="date"  id="date" name="date"   class="form-control"   placeholder="Add date"  />

																	</div>
																	<div class="form-group">
																		<label for="email">Time</label>
																		<input type="time"  id="time1" name="time1"   class="form-control"   placeholder="Add time"  />

																	</div>
																	<div class="form-group">
																		<label for="email">Location</label>
																		<input type="text"  id="location" name="location"   class="form-control"   placeholder="Add location"  />

																	</div>
																	<div class="form-group">
																		<label for="email">Invited Department</label>
																		<select id="invited_dept" name="invited_dept"  class="form-control "  >
																			<option >Select department</option>
																			<option value="All">All Department</option>
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
																<div class="modal-footer">
																	<button type="submit" class="btn btn-primary" name="update1"><span class="glyphicon glyphicon-edit"></span> Update</button>
																	<button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
																</div>
															</div>
														</div>
													</div>

												</form>


												<?php

												//Update Items
												if(isset($_POST['update'])){

													$off_day = $_POST['off_day'];


													$description = $_POST['description'];


													$sql="insert into calendar(off_day, description)values('$off_day','$description')";



													if ($con->query($sql) === TRUE) {




														echo '<script>window.location.href="dashboard.php"</script>';
													}
													else {
														echo "Error: " . $conn->error;
													}
												}

												?>







												<?php

												//Update Items
												if(isset($_POST['update1'])){

													$topic = $_POST['topic'];


													$date = $_POST['date'];
													$time1 = $_POST['time1'];
													$location = $_POST['location'];
													$invited_dept = $_POST['invited_dept'];


													$sq="insert into event(topic,date,time,location,invited_dept)values('$topic','$date','$time1','$location','$invited_dept')";



													if ($con->query($sq) === TRUE) {




														echo '<script>window.location.href="dashboard.php"</script>';
													}
													else {
														echo "Error: " . $con->error;
													}
												}

												?>


											</div><!-- /.row -->


											<div >
											</br>
										</div>

										<div class="row">
											<div class="col-sm-6">
												<!-- Progress bars -->

												<a href="#"  class="btn btn-info" style="width:45%;">Others </a>
												<?php  $d_at=mysqli_query($con,"SELECT *
													FROM calendar
													WHERE MONTH(off_day) = MONTH(CURRENT_DATE())
													AND YEAR(off_day) = YEAR(CURRENT_DATE())");
													$others=mysqli_num_rows($d_at);
													?>

													<a href="#"  class="btn btn-outline-info" style="width:45%;"><?php print_r($others);?> </a>

												</div ><!-- /.col -->




												<div class="col-sm-6">
													<!-- Progress bars -->

													<a href="#"  class="btn btn-info" style="width:45%;">Total </a>
													<a href="#"  class="btn btn-outline-info" style="width:45%;"><?php print_r($cfriday+$csaturday+$others);?> </a>

												</div ><!-- /.col -->
											</div><!-- /.row -->

										</div>
									</div><!-- /.box -->


								</section><!-- right col -->
							</div><!-- /.row (main row) -->

						</section><!-- /.content -->
					</div><!-- /.content-wrapper -->

				<?php } ?>
