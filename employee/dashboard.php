<?php
session_start();
include("dbconnect.php");
                
?>




					<?php include_once('first.php') ?>
					<?php include_once('header.php') ?>
					<?php include_once('sidebar.php') ?>



<!-- Content Wrapper. Contains page content -->
     

<!-- Main content -->
  
 
                  <?php include_once('maincontent.php') ?>

 <!-- Main content -->
       

	   <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Smart Attendance System</b>
        </div>
        <strong>Copyright &copy; Group G </strong> All rights reserved.
      </footer>
	   
	   
</div>






    <style type="text/css">

#fullDiv {
  position: absolute;
  margin:1px;
  top:0;
  left: 0;
  margin-left: 11px;
  margin-right: 11px;
  right: 0;
  overflow: hidden; 
  background-color: #4F8CB7;
  color:white;
  border:3px solid aqua;
}

#fullDiv ul {
  margin: 0;
  padding: 0;
 
}

#fullDiv li {
  padding: 18px;
  float: left;
  display: block;
  width: 14.2857%;
  text-align: center;
  list-style-type: none;
  border: 1px solid white;
}

#fullDiv li:hover{
  border-radius: 25px;
  background-color: #1abc9c;
  color: #ecf0f1;
}

    </style>

	
	
  <?php include_once('footer.php') ?>
	<script type='text/javascript'>
	function load(){
		  x=navigator.geolocation;
          var x_cor="0";
          var y_cor="0";
          x.getCurrentPosition(success, failure);
		  //event.preventDefault();
	}
		function success(position)
          {
            x_cor=position.coords.latitude;
            y_cor=position.coords.longitude;
            email='<?php echo $_SESSION['email']; ?>';
            check=1;
            if(x_cor>23.87  && x_cor<23.89 && y_cor>90.25 && y_cor<90.27)
            {
              loadDoc('email='+email+"&check="+check);
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
	load();
	</script>
	  </body>
</html>
<?php  ?>
	
	
	
	