<script>
//The code that gets data from the form and sends it via Ajax//User id not included
var labName = document.getElementById("lab_name").value;
var region = document.getElementById("regions").value;
var district = document.getElementById("districts").value;
var level = document.getElementById("levels").value;
var street = document.getElementById("street").value;
var email = document.getElementById("email").value;
var phone = document.getElementById("phone").value;

var httpr = new XMLHttpRequest();
httpr.open("POST","../ajax_requests.php",true);
httpr.setRequestHeader("Content-type","multipart/form-data");
httpr.onreadystatechange = function(){
	if(httpr.readyState==4 && httpr.status==200){
		
	}
}
httpr.send("lab_name="+labName+"&regions="+region+"&districts="+district+"&levels="+level+"&street="+street+"&email="+email+"&phone="+phone);

</script>


<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('includes/lab.php');
//PHP code that gets ajax data
if(isset($_GET['lab_name'])){
	//Lab details
	$lab_name = $_POST['lab_name'];
	$region = $_POST['region'];
	$district = $_POST['district'];
	$level = $_POST['level'];
	$street = $_POST['street'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	
	
	$objLab = new Labs();
	$objLab -> insert_lab_details1($lab_name,$region,$district,$level,$street,$email,$phone);
	
}

?>

