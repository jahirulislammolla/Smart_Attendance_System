<?php
session_start();
include("dbconnect.php");
//$_SESSION['email']=$_GET['email'];
include_once('first.php')
?>
<?php include_once('header.php') ?>
<?php include_once('sidebar.php') ?>

<!-- Content Wrapper. Contains page content -->


<!-- Main content -->


<?php include_once('maincontent.php') ?>
<?php


$employee_query="select * from employee";
$employee_result=mysqli_query($con,$employee_query);


while($row = mysqli_fetch_array($employee_result)){

  $id = $row['id'];
  $name = $row['name'];
  $email = $row['email'];
  $designation = $row['designation'];
  $joindate = $row['joindate'];

  $basic_query="select * from salary where desig='$designation'";
  $basic_result=mysqli_query($con,$basic_query);


  while($row2 = mysqli_fetch_array($basic_result)){
    $basic = $row2['basic'];
    $others = $row2['others'];

  }


  $fridays = array();



  $fridays[0] = date('d',strtotime("first fri of last month"));
  $fridays[1] = $fridays[0] + 7;
  $fridays[2] =  $fridays[0] + 14;
  $fridays[3] =  $fridays[0] + 21;
  $fridays['last'] = date('d',strtotime("last fri of last month"));

  if($fridays[3] == $fridays['last']){
    unset($fridays['last']);
    $cfriday=4;
  }
  else {
    $fridays[4] = $fridays['last'];
    unset($fridays['last']);
    $cfriday=5;

  }





  $satdays = array();
  $satdays[0] = date('d',strtotime("first saturday of last month"));
  $satdays[1] = $satdays[0] + 7;
  $satdays[2] =  $satdays[0] + 14;
  $satdays[3] =  $satdays[0] + 21;
  $satdays['last'] = date('d',strtotime("last saturday of last month"));

  if($satdays[3] == $satdays['last']){
    unset($satdays['last']);
    $csaturday=4;
  }
  else {
    $satdays[4] = $satdays['last'];
    unset($satdays['last']);
    $csaturday=5;

  }




  $l_month = date('20y-m-d',strtotime("last day of last month"));



  $dif=floor((abs(strtotime(date($joindate)) - strtotime($l_month))/(60*60*24)));

  $ld = date('d',strtotime("last day of last month"));
  $lm= date('20y-m',strtotime("first day of last month"));

  $get_members3 ="select * from calendar where off_day LIKE '$lm-%'";
  $run_members3 = mysqli_query($con,$get_members3);

  $others_off=mysqli_num_rows($run_members3);

  $total_off= $others_off + $cfriday + $csaturday;
  $nowd= $ld - $total_off;


  $get_members2 ="select * from records where date LIKE '$lm-%' AND name='$name' AND attendance_status LIKE 'Pre%' ";
  $run_members2 = mysqli_query($con,$get_members2);

  $nopd=mysqli_num_rows($run_members2);


  $get_members4 ="select * from records where date LIKE '$lm-%' AND name='$name' AND time > '10:00:00:000000'  ";
  $run_members4 = mysqli_query($con,$get_members4);

  $delay_count=mysqli_num_rows($run_members4);
  $absent=0;

  $absent= $nowd-$nopd;

  $delay_c=$delay_count;
  $basic_sal =$basic;
  $percentage=2;

  if($delay_c>3){$delay = floor($delay_c / 3);
    $absent=$absent+$delay;}



    $deducted_amount=0;
    $netsal=0;
    $netper=0;
    if($absent >=2){
      $absent= $absent-2;
      $netper = ($percentage / 100) * $basic_sal;

      $netsal= $basic_sal-($absent*$netper);

      $deducted_amount=$absent*$netper;
    }
    else{$netsal= $basic_sal;}
    //provident......

    $provident=(int)$basic_sal*.05;

    //task performance management....
    $task=0;

    $lm= date('Y-m',strtotime("last day of last month"));
    $count_pending=0;
    $count_ok=0;
    $count_done=0;
    $count_total=0;
    $count_success=0;
    $sq="select count(last_date) count_pending from task where email='$email' and last_date between '$lm-01' AND '$lm-31'";
    $result = mysqli_query($con, $sq);
    while($row=mysqli_fetch_array($result))
    {
      $count_pending = $row['count_pending'];
    }
    $sql="select count(last_date) count_done, COALESCE(sum(Submit_date<last_date), 0) count_ok from performance where email='$email' and last_date between '$lm-01' AND '$lm-31'";
    $resut = mysqli_query($con, $sql);
    while($row=mysqli_fetch_array($resut))
    {

      $count_done = $row['count_done'];
      $count_ok=$row['count_ok'];
    }
    if ($count_done+$count_pending>0 and $count_ok>0)
    {
      $count_total=$count_done+$count_pending;
      $count_sucess=($count_ok/$count_total)*100;
    }
    if ($count_success>49)
    {
      $task=$basic_sal*(int)$count_success/1000;
    }

    $netsal=$others+$netsal+$task-$provident-($basic_sal*.025);

    $l_month = date('20y-m-d',strtotime("last day of last month"));



    $dif=floor((abs(strtotime(date($joindate)) - strtotime($l_month))/(60*60*24)));

    $l_m_day = date('d',strtotime("last day of last month"));
    $cur_month = date('20y-m',strtotime("first day of this month"));



    $get ="select month, total_due, count(month) cou from due where email='$email'";
    $get_result=mysqli_query($con,$get);

    //$check = mysqli_num_rows($get_result);
    while($row3=mysqli_fetch_array($get_result))
    { $amount=$basic_sal*.05;
      //var_dump($row);
      if ((int)$row3['cou']==0 && $dif>$l_m_day)
      {
        $insert = "insert into due (name,email,total_due,month) values('$name','$email','$netsal','$cur_month')";
        $run_insert = mysqli_query($con,$insert);
        if($run_insert){echo"good";}
        else{echo"bad";}
        $insert = "insert into provident (email,amount) values('$email','$amount')";
        $run_insert = mysqli_query($con,$insert);

      }
      else{
        if ($dif > $l_m_day && $cur_month!=$row3['month'])
        {
          $netsal+=(int)$row3['total_due'];
          $update = "update due set  total_due='$netsal', month='$cur_month' where email='$email'";

          $run= mysqli_query($con, $update);
          $sq="select amount from provident where email='$email'";
          $run= mysqli_query($con, $sq);
          $amount=0;
          while($row5=mysqli_fetch_array($run))
          {
            $amount=$row5['amount'];
          }
          $update = "update provident set  amount='$amount', where email='$email'";

          $run= mysqli_query($con, $update);
        }
      }
    }





  }
  include_once('footer.php');
  ?>

</body>
</html>
