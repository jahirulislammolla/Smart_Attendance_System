<?php
session_start();


include("dbconnect.php");

if(!isset($_SESSION['email'])){

	header("location: http://localhost/Smart_Attendance_System/");
}
else {

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
				<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>

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

		<?php
		include("footer.php");
	} ?>

</body>
</html>
