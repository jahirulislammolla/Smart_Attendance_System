var myVar;

function session_destory() {
    myVar = setInterval(function(){
    	                  location.href='login.php';
    }, 10800000);
}
session_destory();
