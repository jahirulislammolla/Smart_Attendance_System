 	<?php
									$user = $_SESSION['email'];
									
									$get_user ="select * from employee where email='$user'";
									$run_user = mysqli_query($conn,$get_user);
									$row = mysqli_fetch_array($run_user);
									
								
									
									
									$name = $row['name'];
									$email = $row['email'];
									$image = $row['image'];
									
									$department = $row['department'];
									$designation = $row['designation'];
									$phone = $row['phone'];
									$address = $row['address'];
									
									 


									 
									
									
					
						
					?>
 
 
 
 
 
 
 <body class="hold-transition skin-blue sidebar-mini">
 
 <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b>PR</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Smart</b>Payroll</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
		  
		   <?php
  
                            $date = date('Y-m-d');?>
		  
		                       
		  
          <div class="navbar-custom-menu">
            
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
						  <li class="dropdown messages-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							  <i class="fa fa-envelope-o"></i>
							  <span class="label label-success">Today</span>
							</a>
							<ul class="dropdown-menu">
							  <li class="header">You have 4 messages</li>
							  <li>
								<!-- inner menu: contains the actual data -->
								<ul class="menu">
								  
								
								  
								  
                     
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
			  
			  
			  
			   <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           
							<div class="user-image">
								<?php
								echo"
								<img src='../../admin/employee/images/$image'  width='30' height='30' />
								
									
									
									 ";
									?>
				
					

                </div><!--/.col-sm-6-->
                  <span class="hidden-xs">Employee</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                 
					<div class="img-circle">
								<?php
								echo"
							<img src='../../admin/employee/images/$image'  width='110' height='110' /> 
								
									
									
									 ";
									?>
				
					

                </div><!--/.col-sm-6-->
					
                    <p>
                    Employee
                      
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