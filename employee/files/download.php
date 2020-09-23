								<?php
session_start();


include 'controller.php';
if(!isset($_SESSION['email'])){
	
	header("location: http://localhost/ofc_pro/admin/login.php");
}
else {
?>
 <?php  
							if(isset($_GET['id'])){
								
								$id= $_GET['id'];
								
								 $sql ="select * from files where id='$id'";
														$result = $conn->query($sql);
														if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        
														
														
														$doc = $row['doc']; 
														
						}
														}
										  
										  
										  header('Content-Type: application/txt');
										  
								header("Content-Disposition: attachment; filename=$doc");
						
								readfile("file/$doc");
								header("files.php");
										  
													}
		  
	  
	  
	  
  
  ?>
  
  
  
  
<?php } ?> 