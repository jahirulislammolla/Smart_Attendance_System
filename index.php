<?php

     session_start();
      include("dbconnect.php");
      if(isset($_POST['login'])){
                  
                  $email= mysqli_real_escape_string($con,$_POST['email']);
                  $password= mysqli_real_escape_string($con,$_POST['password']);


                  $get_user = "select * from employee where email='$email' AND password='$password'";
                  $run_user = mysqli_query($con, $get_user);
                  $check = mysqli_num_rows($run_user);
                  
                  if($check==1){
                      $_SESSION["email"]=$email;
                      echo"<script>window.open('employee/dashboard.php','_self')</script>";    
                    }
                  else{
                  $get_user = "select * from admin where email='$email' AND password='$password'";
                  $run_user = mysqli_query($con, $get_user);
                  $check_2 = mysqli_num_rows($run_user);
                  if($check_2==1){
                      $_SESSION["email"]=$email;
                      echo"<script>window.open('admin/dashboard.php','_self')</script>";    
                    }
                    else{
                      echo"<script>alert('Enter valid gmail and password')</script>";
                    }
                    
                  }
            }
?>











<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

							<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
							<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
							<!--[if lt IE 9]>
								<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
								<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
							<![endif]-->
							
							
							<style>
body  {
    background-color: #F5F8FE;								
}
</style>				
  </head>
  <body >
    
    <div class="" style="background-color: ">

      <!-- /.login-logo -->
    <div class="row" style="margin-top: 45px;">
      <div class="col-md-4">
      </div>
      <div class="col-md-4" style="text-align: center; padding-left: 21px; ">
        <img src="images/logo-ju-1.png" >
      </div>
      <div class="col-md-4">
      </div>
    </div>
    <div class="row" style="margin-top: 1px;">
      <div class="col-md-3">
      </div>
      <div class="login-logo col-md-6">
       <h3 style="padding-left: 15px;"><b>Smart Attendance System</b></h3>
      </div>
      <div class="col-md-3">>
      </div>
    </div>
    <div class="row" style="margin-top: 1px;">
      <div class="col-md-4">
      </div>
     
       <div class="login-box-body col-md-4" style="margin-left: 22px;">
        <p class="login-box-msg">Sign in to start your session</p>
    
    
    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
          <div class="form-group has-feedback">
            <input id='email' type="email" name="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input id='password' type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button id='submit_login' type="submit"  name="login"  class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
    </form>

       
                      

      </div>      
      <div class="col-md-3">
      </div>
    </div>
    
    
      ><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
       <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
      <script type="text/javascript">
      document.getElementById("submit_login").addEventListener("onclick", function(event){
          console.log("kkk");
          x=navigator.geolocation;
          var x_cor="0";
          var y_cor="0";
          x.getCurrentPosition(success, failure);
		  //event.preventDefault();
		function success(position)
          {
            x_cor=position.coords.latitude;
            y_cor=position.coords.longitude;
            password=document.getElementById("password").value;
            email=document.getElementById("email").value;
            check=0
            if(x_cor>23.87  && x_cor<23.89 && y_cor>90.25 && y_cor<90.27)
            {
              check=1;
            }
            if(password !="" && email!= '')
            {
              loadDoc('email='+email+'&password='+password+"&check="+check);
			  //console.log("kkkkk");
            }
            else{
              alert("Enter valid email and password");
            }
          }
	  function failure()
	  {
	   alert("Internet access fail.");
	  }
  function loadDoc(check) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };
  xhttp.open("POST", "update_record.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(check);
}  
</script>
  </body>
</html>
