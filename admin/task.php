

								<?php
session_start();

                        include 'dbconnect.php';
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
		
		
		
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    </head>
	
		 <?php $uid = $_GET['id'];?>
						
<!------ Include the above in your HEAD tag ---------->
<body>

							  <?php 
						  $sq ="select * from employee where id='$uid'";
														$res = $conn->query($sq);
														if ($res->num_rows > 0) {
                        // output data of each row
                        while($row1 = $res->fetch_assoc()) {
                                                         $id = $row1['id'];
														$email = $row1['email'];
														$name = $row1['name'];
														$department = $row1['department'];
														$designation = $row1['designation'];
				
						}
														}
				
			 	
			            	?>
               <?php include_once('../first.php') ?>
										<?php include_once('../header.php') ?>
										<?php include_once('../sidebar.php')    ?>


    <div class="content-wrapper" >
		   
		    <section class="content">
								  <div class="row">
									<div class="col-xs-12">
							   
							   
										 <div class="box">
										 
										<div class="box-header">
										
										
										<div class="row">
										  <h3 class="box-title"style="text-align: left;margin-left:5%;" >Assign Task for <?php echo"$name";  ?> </h3>
										  
										   <h3 class="box-title"style="text-align: center;margin-left:15%;" >Department: <?php echo"$department";  ?> </h3>
										   
										   <h3 class="box-title"style="text-align: right;margin-left:15%;" >Designation: <?php echo"$designation";  ?> </h3>
										  
										  
										   
											 
											 
											 </div>
											 
											 
											 
										</div><!-- /.box-header -->
										<div class="box-body">
		   
		   
		   
<br>
<div style="text-align: right; margin-right:50px;">
       <input colspan="5"  type="button" class="btn btn-success " id="addrow" value="Add Row" />
  </div>         
           <table id="myTable" class=" table order-list">
    <thead>
								<tr>
										
									
										
									<td>Task</td>
									
									<td>Last Date</td>
								</tr>
    </thead>
    <tbody>
	  
	
	
	
        <tr>
       
							
							<td class="col-sm-6">
								<input id='task_1' type="text" name="task" placeholder="assign task"  class="form-control" />
							</td>
							
							<td class="col-sm-3">
								<input id='date_1' type="date" name="last_date" placeholder="Last Date of submission"  class="form-control" />
							</td>
							<td class="col-sm-2"><a class="deleteRow"></a>

            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
                           <td colspan="5" style="text-align: left;">
                              <input type="submit" class="btn btn-lg btn-block "  id="submit" value="Assign Task" />
                                     </td>
        </tr>
        <tr>
        </tr>
    </tfoot>
</table>

		   
		   
		   
		   
		   
     
	   </div>
	   </div>
	   
	   
	   
	
	   
																
	   
	   </section>

 







































<script>
$(document).ready(function () {
    var counter = 2;

							$("#addrow").on("click", function () {
								var newRow = $("<tr>");
								var cols = "";

								cols += '<td><input id="task_'+counter+'" type="text" class="form-control" placeholder="assign task" name="task' + counter + '"/></td>';
								cols += '<td><input id="date_'+counter+'" type="date" class="form-control" name="last_date' + counter + '"/></td>';
							   

								cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
								newRow.append(cols);
								$("table.order-list").append(newRow);
								counter++;
								
								
								
								
							});
		$("#submit").on("click", function(){
			var rowCount = $('#myTable tr').length;
			email="<?php echo $email; ?>";
			dept="<?php echo $department; ?>";
			des="<?php echo $designation; ?>";
			for(i=1; i<rowCount-2; i++)
			{
				task=$("#task_"+i).val();
				date=$("#date_"+i).val();
				if (task !="" && date !="")
				{
					$.ajax({
					url:"update_task.php",
					type: "POST",
					data: {"task":task,"date":date, "email":email,"dept":dept, "des":des},
					success: function(data){
						 console.log(data);
					  }
					});
				}	
			}//location.reload();
		});



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}
</script>

</body>


	   
</html>
<?php } ?>