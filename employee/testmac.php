<?php $con = mysqli_connect("localhost","root","","spsdb");
							if(mysqli_connect_errno())
							{
								echo"Failed to connect to MySQL: " . mysqli_connect_errno();
								
							}
										
										$get_user ="select * from teacher where email='zamshed@gmail.com'";
								$run_user = mysqli_query($con,$get_user);
								$row = mysqli_fetch_array($run_user);
								
							$id = $row['id'];
								
											$nam = $row['nam'];
					$email = $row['email'];
											   $image = $row['image'];
											$password = $row['password'];
											
											$phone = $row['phone'];
											$designation = $row['designation'];
											$mobile_ip = $row['mobile_ip'];
											$address = $row['address'];
										
										ob_start();  

							//Get the ipconfig details using system commond  
							echo "$mobile_ip";	 echo "<br>";echo "<br>";
														system("for /L %N in (1,1,254) do start /b ping -n 1 -w 200 192.168.0.%N ");

							 system("arp -a");  

							// Capture the output into a variable  
							$mycomsys1=ob_get_contents();  

							// Clean (erase) the output buffer  
								ob_clean();  
                         
							$find_mac1 = " $mobile_ip"; 
							//find the "Physical" & Find the position of Physical text  

							$pmac1 = strpos($mycomsys1, $find_mac1); 
							
							if($pmac1 != null){
							$p=substr("$mycomsys1","$pmac1"-22,16);
							echo "$mycomsys1";echo "<br>";echo "<br>";
							echo "$find_mac1";echo "<br>";echo "<br>";
							echo "$pmac1";echo "<br>";echo "<br>";
							echo "$p";
							}
							else{echo "add mac to the database";}
							
							//for /L %N in (1,1,254) do start /b ping -n 1 -w 200 192.168.0.%N 
							
							?>