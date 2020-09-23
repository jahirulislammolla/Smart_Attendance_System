  <?php
  include("dbconnect.php");
  $name=$_POST['name'];
  $email=$_POST['email'];
  $ac_no=$_POST['ac_no'];
  $basic=$_POST['basic'];
  $tabsent=$_POST['tabsent'];
  $delay_c=$_POST['delay_c'];
  $deducted_amount=$_POST['deducted_amount'];
  $netsal=$_POST['netsal'];
  $amount_paid=$_POST['amount_paid'];
  $amount_due=$_POST['amount_due'];
  $date=$_POST['date'];
  $sm=$_POST['sm'];
  //echo $sm;
  $last_due=(int)$amount_due - (int) $amount_paid;
  $sql2="insert into payment(name,email,ac_no,basic,absent,delay,deducted_amount,netsal,amount_paid,amount_due,date_of_payment,salary_of_month)values('$name','$email','$ac_no','$basic','$tabsent','$delay_c','$deducted_amount','$netsal','$amount_paid','$last_due','$date','$sm')";
						if ($conn->query($sql2) === TRUE) {
									//echo "update";
									$update = "update due set  total_due='$last_due' where email='$email'";
									$run= mysqli_query($conn, $update);
									
                                } 
                            else {
                                echo "Error deleting record: " . $conn->error;
                            }
?>