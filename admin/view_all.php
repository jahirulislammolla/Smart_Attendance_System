<!doctype html>
<html>
<?php
session_start();
include("dbconnect.php");


if(!isset($_SESSION['email'])){
	
	header("location: http://localhost/ofc_pro/login.php");
}
else {
?>








<head>
 <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <!-- Loader -->
        <link rel="stylesheet" href="css/loader.css">
        <script src="js/jquery-1.12.4.js"></script>
        <link rel="stylesheet" type="text/css" href="dashboard/vendor/font-awesome/css/font-awesome.min.css">
        <script>
            $(document).ready(function() {
                $('#example').DataTable({

                });
            });

        </script>
        <link rel="stylesheet" href="css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="css/responsive.bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>



</head>













<?php include_once('first.php') ?>
<?php include_once('../header.php') ?>
<?php include_once('../sidebar.php') ?>

<div class="content-wrapper">

  <section class="content-header">
          <h1>
            Dashboard
            <small>Admin panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

<div class="content">
<div class="panel panel-body">
	
	<table class="table table-striped">
	
	<tr>
	<th>Serial Number</th><th>Dates</th><th>Show Attendance</th>
	</tr>
	<?php $result=mysqli_query($conn,"select distinct date from records ORDER BY date desc");
	$serialnumber=0;
	while($row=mysqli_fetch_array($result))
	{
		$serialnumber++;
									?>
									<tr>
									<td> <?php echo $serialnumber; ?> </td>
									<td> <?php echo $row['date']; ?> </td>
									<td>				 
									<input type="hidden" value="<?php echo $row['date']?>" name="date" id="<?php echo "id_"; echo $row['date']?>">
									
									<button value="Show Attendance" class="btn btn-primary" id="<?php echo "sub_"; echo $row['date']?>"><?php echo $row['date']?></button>
									
									</td>
									
									</tr>
									<?php
	}
	?>
	</table>
	
	
	</form>
	
	</div>
		</div>
			</div>

<?php
	
	}
	?>
			<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
						<script>
							$(document).ready(function(){
								$("button").click(function(){
									m=$(this).attr("id").split("_")[1];
									console.log(m);
									location.href="show_attendance.php?date="+m;
								});
							});
						</script>
</html>