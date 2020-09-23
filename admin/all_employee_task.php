								<?php
session_start();


	             include 'controller.php';
				   include 'dbconnect.php';
if(!isset($_SESSION['email'])){
	
	header("location: http://localhost/smart_payroll/admin/login.php");
}
else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
       
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

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
										  <h3 class="box-title">Whose performance you want to check?</h3>
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
														$result = $conn->query($sql);
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
                        
                   
                            
                            
                           
						   
									  <a href="#view_task" id="<?php echo $email; ?>" data-toggle="modal" class="btn btn-info btn-xs">View Performance </a>
									  
						   	 
						   
						
                    </td>



                   
        </div>

       
     

      </div>
	   </div>


        <!--Edit Item Modal -->
        
 <div id="view_task" class="modal fade" role="dialog">
           
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">View Performance</h4>
                        </div>

						<div class="modal-body" id="chartContainer" style="height: 400px; width: 100%;"></div>  	
                        <div class="modal-footer">
                         
                            <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                        </div>
                    </div>
                </div>
        </div>
	
		 
		 
		 
		 
		 

		 
		 
		 
		

		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
       
		
		
		
		
		
		            

       
		
		
		
		
		
		
		
		
		
		
		
		
		
        
        </tr>


        <?php
                        }
                     


                       
                       
                   

                   
						}
				  
				  
												//Add Attendance      
								
                   
?>





            </tbody>
            </table>
           

     
	   </div>
	   </div>
	   </section>
          
 <!--Add attendance Modal -->
           
           
       <!--view attendance modal -->
	   

	   
	   
	   
             </body>
			 
			 
			 

    </html>
	
	
	
	
	
	
	
	
<script src="js/task.js"></script>
<script>
	$(document).ready(function(){
		month_lst = ['January', 'February', 'March', 'April', 'May', 'June', 'July',
              'August', 'September', 'October', 'November', 'December'];
		$("a").on("click",function(){
			email=$(this).attr('id');
			if (typeof email !== 'undefined' && email.split(".").length>1)
			{console.log(email);
				$.ajax({
				url:'test.php',
				type:"POST",
				data:{'email':email},
				success:function(data){
					x=data.split("#");
					a=x[0].split("*");
					b=x[1].split("*");
					console.log(a);
					console.log(b);
					var chart = new CanvasJS.Chart("chartContainer", {
						animationEnabled: true,
						theme: "light2", // "light1", "light2", "dark1", "dark2"
						title:{
						},
						axisY: {
							title: "Percentage of task completion"
						},
						data: [{        
							type: "column",  
							showInLegend: true, 
							legendMarkerColor: "grey",
							legendText: "Month",
							dataPoints: [      
								{ y: parseInt(a[0]), label: month_lst[parseInt(b[0])] },
								{ y: parseInt(a[1]), label: month_lst[parseInt(b[1])] },
								{ y: parseInt(a[2]), label: month_lst[parseInt(b[2])] },
								{ y: parseInt(a[3]), label: month_lst[parseInt(b[3])] },
								{ y: parseInt(a[4]), label: month_lst[parseInt(b[4])] },
								{ y: parseInt(a[5]), label: month_lst[parseInt(b[5])] },
								
							]
						}]
					});
					chart.render();
				}
				});
			}
			
	

		});
	});
	
</script>
	
	
	
	
	
	
	
	
<?php } ?>