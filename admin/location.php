<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-I-GEE1c6Zc3Yook7Blq55TDVk23eRMA" type="text/javascript">
    </script>
    <script type="text/javascript">
    	x=navigator.geolocation;
    	x.getCurrentPosition(success, failure);
    	function success(position)
    	{
    		document.write("<h1>Your present latitude: "+position.coords.latitude+"</h1>");
    		document.write("<h1>Your present longitude: "+position.coords.longitude+"</h1>");
    }
    function failure()
    {
    	document.write("<h1>Fail</h1>")
    }
    </script>

</body>
</html>