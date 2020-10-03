 	<?php

	include("dbconnect.php");



									$user = $_SESSION['email'];

									$get_user ="select * from admin where email='$user'";
									$run_user = mysqli_query($con,$get_user);
									$row = mysqli_fetch_array($run_user);




									$name = $row['name'];
									$email = $row['email'];
									$image = $row['image'];









					?>






 <body class="hold-transition skin-blue sidebar-mini">

 <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b>AS</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Smart </b>Attendance</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
					  <li class="dropdown messages-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						  <i class="fa fa-envelope-o"></i>
						  <span class="label label-success">Today</span>
						</a>
						<ul class="dropdown-menu">



						  <li>
							<!-- inner menu: contains the actual data -->
							<ul class="menu">

                      <li>



						<?php
						$date=date("Y-m-d ");




							 $sql ="select * from message where receiver='$user' and date='$date'";
														$result = $con->query($sql);
														  $no=mysqli_num_rows($result);
														if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                                                         $id = $row['id'];
														$sender = $row['sender'];
														$subject = $row['subject'];

														$msg = $row['msg'];

														$date = $row['date'];
														$time = $row['time'];



						?>
                          <div class="pull-left">

														<?php

								 $sql1 ="select * from employee where email='$sender' ";
														$result1 = $con->query($sql1);

														if ($result1->num_rows > 0) {
                        // output data of each row
                        while($row1 = $result1->fetch_assoc()) {
						$image1 = $row1['image'];}}?>
								<div class='row' style="margin-left:20%">
								<?php
								echo"
							<img src='images/$image1'  width='50' height='50'  class='img-circle' />

									$sender

						";?></div>





                         <div style="margin-left:20%">
						<i class="fa fa-clock-o"></i> <?php echo"$time"; ?>



					  </div>
                      </div>


						<?php } ?>
                      </li></ul>
						<?php } ?>


                  </li>


				   <li class="header">You have <?php echo"$no"; ?> message today</li>
                  <li class="footer"><a href="message.php">See All Messages</a></li>
                </ul>
              </li>


			   <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

							<div class="user-image">
								<?php
								echo"
								<img src='images/$image'  width='30' height='30' />



									 ";
									?>



								</div><!--/.col-sm-6-->
								  <span class="hidden-xs">Admin</span>
								</a>
								<ul class="dropdown-menu">
								  <!-- User image -->
								  <li class="user-header">

									<div class="img-circle">
												<?php
												echo"
												<img src='images/$image'  width='110' height='110' />



													 ";
													?>



                </div><!--/.col-sm-6-->

                    <p>
                      Admin
                      <small></small>
                    </p>
                  </li>

                  <li class="user-footer">

                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>







			  </ul>
          </div>
        </nav>
      </header>
