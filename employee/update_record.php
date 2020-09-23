
<?php
		  include("dbconnect.php");
	
		$email= mysqli_real_escape_string($con,$_POST['email']);
        $check=$_POST["check"];
		//var_dump($email);
		//var_dump($password);
		//var_dump($check);
		$get_user = "select * from employee where email='$email'";
		$run_user = mysqli_query($con, $get_user);
    $id='';
    $name='';
    while($row = mysqli_fetch_array($run_user)){
        $id=$row['id'];
        $name=$row["name"];
		//var_dump($row);
      }
		$check = mysqli_num_rows($run_user);
		if($check==1){ 
                $date=date("Y-m-d");
                $time=date("h:i:sa");
                $teacher_query="select count(date) count from records where id_teacher='$id' and date='$date'";
                 $teacher_result=mysqli_query($con,$teacher_query);
                 //var_dump($teacher_result);
                 $count=0;
                 while ($row1 = mysqli_fetch_array($teacher_result)) {
                   # code...
                    $count=(int) $row1['count'];
                 }
                 if($count==0 && $check=="1")
                {
          
                  $records_insert="INSERT INTO records (name, attendance_status, `date`, `time`, id_teacher)
VALUES ('$name','Present','$date',NOW(),'$id')";
                  mysqli_query($con, $records_insert);
				  echo 'update';
                 
                }
                 echo "update";
            }	
                
		else{
			
			echo "fail";
			
			
		}
?>