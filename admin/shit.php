<?php
session_start();
include("dbconnect.php");


if(!isset($_SESSION['email'])){
	
	header("location: http://localhost/ofc_pro/login.php");
}
else {
?>
<?php 

 function fetch_data()  
 {  
								  $output = '';  
								  $conn = mysqli_connect("localhost", "root", "", "spsdb");  
								$sql="select * from records where date='$date'";
								  $result = mysqli_query($conn, $sql);  
								  while($row = mysqli_fetch_array($result))  
								  {       
								  $output .= '<tr>  
													  <td>'.$row["id"].'</td>  
													  <td>'.$row["name"].'</td>  
													  <td>'.$row["time"].'</td>  
													  <td>'.$row["attendance_status"].'</td>  
												 </tr>  
													  ';  
								  }  
								  return $output;  
 } 


if(isset($_POST["generate_pdf"]))  
 {  
                    require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
							  <h4 align="center">Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP</h4><br /> 
							  <table border="1" cellspacing="0" cellpadding="3">  
								   <tr>  
										<th width="5%">Id</th>  
										<th width="30%">Name</th>  
										<th width="15%">time</th>  
										<th width="50%">attendance_status</th>  
								   </tr>  
							  ';  
							  $content .= fetch_data();  
							  $content .= '</table>';  
							  $obj_pdf->writeHTML($content);  
							  $obj_pdf->Output('file.pdf', 'I');  
 }  

?>



<?php include_once('first.php') ?>
<?php include_once('header.php') ?>
             <?php include_once('sidebar.php') ?>

   
   
   
   
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
   
   
   <div class="col-md-12" align="right">
                     <form method="post">  
                          <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />  
                     </form>  
                     </div>
                     <br/>
                     <br/>
   
   
	                      <table id="example" class="table table-striped">
	
	   
                          <tr>  
                               <th width="5%">Id</th>  
                               <th width="30%">Name</th>  
                               <th width="15%">time</th>  
                               <th width="50%">attendance_status</th>  
                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  

	
	
	</div>
	</div>
	</div>
	
   
   
<?php } ?>




