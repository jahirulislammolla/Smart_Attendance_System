 	<?php
	
	
	include("dbconnect.php");
								
									$user = $_SESSION['email'];
									
									$get_user ="select * from employee where email='$user'";
									$run_user = mysqli_query($con,$get_user);
									$row = mysqli_fetch_array($run_user);
									
								
									
									
									$name = $row['name'];
									$email = $row['email'];
									$image = $row['image'];
									$nick_name=$row['nick_name'];
									$department = $row['department'];
									$designation = $row['designation'];
									$phone = $row['phone'];
								

									 
									
									
					
						
					?>
 
 
 
 
 
 
 <body class="hold-transition skin-blue sidebar-mini">
 
 <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>S</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Attendance</b> System</span>
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
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      
                    
                      
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                           Puja Roy
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Sir, I need 3 days break?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Maliha Mahjabeen
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>I will not caome tomorrow?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
			  
			  
			  
			   <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           
							<div class="user-image">
								<?php
            
								echo"<img src='images/$image'  width='30' height='30' />";
									?>
				
					

								</div><!--/.col-sm-6-->
								  <span class="hidden-xs">
                    <?php 
                    echo $nick_name;
                    ?>
</span>
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
                      <?php 
                    echo $name;
                    ?>
                     
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