								<?php
session_start();


	             include 'controller.php';
							 include "dbconnect.php";
if(!isset($_SESSION['email'])){

	header("location: http://localhost/Smart_Attendance_System/");
}
else {
?>
    <!DOCTYPE html>
    <html lang="en">

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
				<?php include_once('header.php') ?>
				<?php include_once('sidebar.php') ?>


    <body onload="myFunction()" style="margin:0;">

      <div class="content-wrapper" >

		    <section class="content">
								  <div class="row">
									<div class="col-xs-12">


										 <div class="box">
										<div class="box-header">
										  <h3 class="box-title">All Employee</h3>
										</div><!-- /.box-header -->
										<div class="box-body">



  <div class="dropdown">









            </div><br>


            <table id="example" class="table table-bordered table-striped" >
                <thead>
										<tr>
											 <th>ID</th>
											<th>Name</th>
											<th>Email</th>
											 <th>Designation</th>



											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											 <th>ID</th>
											<th>Name</th>
											<th>Email</th>
											 <th>Designation</th>

											<th>Action</th>
										</tr>
									</tfoot>

                          <tbody>
                    <?php
					         $date=date("Y-m-d ");
							 $sql ="select * from employee";
														$result = $con->query($sql);
														if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                                                         $id = $row['id'];
														$email = $row['email'];
														$name = $row['name'];

														$designation = $row['designation'];

														$phone = $row['phone'];
														$ac_no = $row['ac_no'];

														$address = $row['address'];
														$joindate = $row['joindate'];
														$image = $row['image'];


                            echo "<tr>
                                     <td>$id</td>
									<td>$name</td>
									<td>$email</td>
									 <td>$designation</td>

									 "; ?>


                       <td>



						    <a href="#edit<?php echo $id;?>" data-toggle="modal" class="btn btn-warning btn-xs">Edit </a>
									<a href='ne.php?id=<?php echo $id;?>' class="btn btn-success btn-xs">Add Salary </a>

									  <a href="view_payment.php?id=<?php echo $id;?>"  class="btn btn-info btn-xs">View Payment</a>
						   	  <a href="#delete<?php echo $id;?>" data-toggle="modal" class="btn btn-danger btn-xs">Delete</a>


                    </td>
        </div>

      </div>
	   </div>


        <!--Edit Item Modal -->

 <div id="edit<?php echo $id; ?>" class="modal fade" role="dialog">
            <form method="post" class="contactForm" role="form" enctype="multipart/form-data">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Employee Details</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="edit_teacher" value="<?php echo $id; ?>">


						            <div class="form-group">
										<label for="email">Name</label>
										<input type="text"  id="name" name="name"   class="form-control"  value="<?php echo $name; ?>" placeholder="Name"  />

									</div>

									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" name="email" id="email"  class="form-control" value="<?php echo $email; ?>" placeholder="Email"  />

									</div>
									<div class="form-group">
									<label for="email">Designation</label>


									<select id="designation" name="designation" class="form-control "  >
							<option ><?php echo $designation; ?></option>
							<option value="Officer">Officer</option>
							<option value="Executive">Executive</option>
							<option value="Assistant Manager">Assistant Manager</option>
							<option value="Manager">Manager</option>
							<option value="Vice President">Vice President</option>

							<option value="CEO">CEO</option>


							 </select>


								</div>


									<div class="form-group">
										<label for="email">Phone</label>
										<input type="number" name="phone" id="phone"  class="form-control" value="<?php echo $phone; ?>" placeholder="phone"  />

									</div>


									<div class="form-group">
										<label for="email">Account no</label>
										<input type="text" name="ac_no" id="ac_no"  class="form-control" value="<?php echo $ac_no; ?>"   />

									</div>




							<div class="form-group">
						<label for="email">Address</label>
						<input type="text" name="address" id="address"  class="form-control" value="<?php echo $address; ?>" placeholder="address"   />

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





























        <!--Delete Modal -->
		 <div id="delete<?php echo $id; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <form method="post">
                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Delete</h4>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                            <p>
                                <div class="alert alert-danger">Are you Sure you want Delete <strong><?php echo $name; ?>?</strong></p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> NO</button>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>















        </tr>


        <?php
                        }



                        //Update Items
                        if(isset($_POST['update'])){
                            $edit_teacher = $_POST['edit_teacher'];
                            $name = $_POST['name'];

                           $email = $_POST['email'];
                            $designation = $_POST['designation'];
                            $phone = $_POST['phone'];
							  $ac_no = $_POST['ac_no'];
							 $address = $_POST['address'];

                            $sql = "UPDATE employee SET
							  name='$name',
                               email='$email',
                                designation='$designation',
                                phone='$phone',
								  ac_no='$ac_no',
								address='$address'

                                WHERE id='$edit_teacher' ";



                            if ($conn->query($sql) === TRUE) {
								$sq = "UPDATE records SET
							  name='$name'


                                WHERE id_teacher='$edit_teacher' ";



								 if ($conn->query($sq) === TRUE) {
                                echo '<script>window.location.href="all_employee.php"</script>';
                            }
							}							else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }
                        if(isset($_POST['delete'])){
                            // sql to delete a record
                            $delete_id = $_POST['delete_id'];
                            $sql1 = "DELETE FROM employee WHERE id='$delete_id' ";
                            if ($conn->query($sql1) === TRUE) {

                                    echo '<script>window.location.href="all_employee.php"</script>';
                                }
                            else {
                                echo "Error deleting record: " . $conn->error;
                            }
                        }




						}


												//Add Attendance
											if(isset($_POST['add_attendance'])){


											 $date=date("Y-m-d ");
	                                     $time=date("h:i:sa ");
									$res=mysqli_query($conn,"DELETE from records where date='$date'");


							   foreach($_POST['attendance_status'] as $id=>$attendance_status)
								{

								 $name=$_POST['name'][$id];
								     $id_teacher=$_POST['id'][$id];

											 $id_t=mysqli_query($conn,"select DISTINCT id from teacher");
										   $no=mysqli_num_rows($id_t);
										    $id_r=mysqli_query($conn,"select id_teacher from records where date='$date'");
										   $no1=mysqli_num_rows($id_r);
                                if($no==$no1){
									  $result=mysqli_query($conn,"update records set name='$name',attendance_status='$attendance_status',date='$date',time=NOW()
			                            where date='$date' and name='$name';
			 ");
								}
							  else{


								 $sql2="insert into records(name,attendance_status,date,time,id_teacher)values('$name','$attendance_status','$date',NOW(),'$id_teacher')";

								 if ($conn->query($sql2) === TRUE) {

                                    echo '<script>window.location.href="all_teacher.php"</script>';
                                }
                            else {
                                echo "Error deleting record: " . $conn->error;
                            }

							  }




								}




						}

?>

















            </tbody>
            </table>



	   </div>
		 </section>
	   </div>

 <!--Add attendance Modal -->


       <!--view attendance modal -->



	 <?php
	 include ("footer.php");

  } ?>

             </body>

    </html>
