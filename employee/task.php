								<?php
session_start();


	             include 'controller.php';
if(!isset($_SESSION['email'])){
	
	header("location: http://localhost/smart_payroll/admin/login.php");
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
		
		 <link rel="stylesheet" href="../plugins/iCheck/all.css">
		 
		 
		 
		 
		
		
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
	
	
	                   
	<?php include_once('../first.php') ?>
				<?php include_once('../header.php') ?>
				<?php include_once('../sidebar.php') ?>
	
	
    <bodyy onload="myFunction()" style="margin:0;">

      <div class="content-wrapper" >
		   
		    <section class="content">
								  <div class="row">
									<div class="col-xs-12">
							   
							   
										 <div class="box">
										<div class="box-header">
										  <h3 class="box-title">View Tasks</h3>
										</div><!-- /.box-header -->
										<div class="box-body">
		   
		   
		   
  <div class="dropdown">
               
			            
               
								
								
								
				
				
				
            </div><br>
			
			
			
			
			
													
				
				
				
			        	


            <table id="myTable" class="table table-bordered table-striped" >
                <thead>
										<tr>
											 <th>Email</th>
											<th>Task</th>
											
											<th>Assigned date</th>
											
											   <th>Last Date</th>
											   <th>Status</th>
											   	   
											    
											      
											   
											 
										
										</tr>
									</thead>
									
								
                          <tbody>
                   <?php 
						 $date=date("Y-m-d ");
						 $user = $_SESSION['email'];
			
						  $sq ="select * from task where email='$user'";
														$res = $con->query($sq);
														if ($res->num_rows > 0) {
                        // output data of each row
						$count=1;
                        while($row1 = $res->fetch_assoc()) {
                                                         $id = $row1['id'];
														 $email = $row1['email'];
														 
														  $department = $row1['department'];
														$task = $row1['task'];
															$assign_date = $row1['assign_date'];
																$last_date = $row1['last_date'];
															?>
                            

                           <tr>
                                	<td id='<?php echo "email_"; echo $count; ?>'><?php echo"$email"; ?></td>     
									<td id='<?php echo "task_"; echo $count; ?>'><?php echo"$task"; ?></td>
									<td><?php echo"$assign_date"; ?></td>
									 <td id='<?php echo "date_"; echo $count; ?>'><?php echo"$last_date"; ?></td>
									 
									 
									  <td>
									  
									  
									  
									 <div class="form-group">
									<label>
									  <input id='<?php echo "checkbox_"; echo $count; ?>' name="checkbox" type="checkbox" >
									  Check If You've completed
									</label>
                    
                   
                                     </div> 
									  
									  
									  
									  
									  
									  
									  </td>
									  
									   
									 
									 
														<?php $count++;} } ?>
														     
        </tr>
						
						<tfoot>
						<tr>
						<td colspan='5' style="text-align:right;">
									   <button  value="Submit" class="btn btn-primary" id="submit">Submit </button>
									   
									   </td>
									</tr>
									</tfoot>
						
						       

						
						
                  
														
													
        </div>

       
     

      </div>
	   </div>


   
                                    
    


            </tbody>
            </table>
           

     
	   </div>
	   </div>
	   
																
	   
	   </section>
          
 <!--Add attendance Modal -->
          

							   
							   
							   
							   
                               

        
       <!--view attendance modal -->
	   
	<script src='js/jquery.js'></script>
	   <script>
			document.getElementById("submit").onclick=function(){
				var x=document.getElementById("myTable").rows.length;
				for(i=1; i<x-1; i++)
				{
					check=document.getElementById("checkbox_"+i).checked;
					date=document.getElementById("date_"+i).innerText;
					task=document.getElementById("task_"+i).innerText;
					email=document.getElementById("email_"+i).innerText;
					department='<?php echo $department;?>';
					if(check==true)
					{
						ajax1("email="+email+"&task="+task+"&date="+date+'&department='+department);
						$("#checkbox_"+i).closest("tr").remove();
					}
				}
			}
			function ajax1(val){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					console.log(this.responseText);
				  }
				};
				xhttp.open("POST", "task_performance_update.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send(val);
			}
	   </script>
	   
	   
             </body>

    </html>
	
	  <script src="../plugins/iCheck/icheck.min.js"></script>
	
<?php } ?>