<?php
/*if(count($_POST)>0) {
	require_once("dbcontroller.php");
	$db_handle = new DBController();
	$query = "INSERT INTO users (email, password, display_name, gender) VALUES
	('" . $_POST["email"] . "', '" . $_POST["password"] . "', '" . $_POST["display-name"] . "', '" . $_POST["gender"] . "')";
	$result = $db_handle->insertQuery($query);
	if(!empty($result)) {
		$message = "You have registered successfully!";	
		unset($_POST);
	} else {
		$message = "Problem in registration. Try Again!";	
	}
}*/
?>
<head>
<style>
#registration-step{margin:0;padding:0;}
#registration-step li{list-style:none; float:left;padding:5px 10px;border-top:#EEE 1px solid;border-left:#EEE 1px solid;border-right:#EEE 1px solid;}
#registration-step li.highlight{background-color:#EEE;}
#registration-form{clear:both;border:1px #EEE solid;padding:20px;}
.demoInputBox{padding: 10px;border: #F0F0F0 1px solid;border-radius: 4px;background-color: #FFF;width: 50%;}
.registration-error{color:#FF0000; padding-left:15px;}
.message {color: #00FF00;font-weight: bold;width: 100%;padding: 10;}
.btnAction{padding: 5px 10px;background-color: #09F;border: 0;color: #FFF;cursor: pointer; margin-top:15px;}
</style>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
<script>

$(document).ready(function() {
	$("#next").click(function(){
		//var output = validate();
		//if(output) {
			var current = $(".highlight");
			var next = $(".highlight").next("li");
			if(next.length>0) {
				$("#"+current.attr("id")+"-field").hide();
				$("#"+next.attr("id")+"-field").show();
				$("#back").show();
				$("#finish").hide();
				$(".highlight").removeClass("highlight");
				next.addClass("highlight");
				if($(".highlight").attr("id") == $("li").last().attr("id")) {
					$("#next").hide();
					$("#finish").show();				
				}
			}
		//}
	});
	$("#back").click(function(){ 
		var current = $(".highlight");
		var prev = $(".highlight").prev("li");
		if(prev.length>0) {
			$("#"+current.attr("id")+"-field").hide();
			$("#"+prev.attr("id")+"-field").show();
			$("#next").show();
			$("#finish").hide();
			$(".highlight").removeClass("highlight");
			prev.addClass("highlight");
			if($(".highlight").attr("id") == $("li").first().attr("id")) {
				$("#back").hide();			
			}
		}
	});
});
</script>
</head>
<body>
<div class="message"><?php if(isset($message)) echo $message; ?></div>
<ul id="registration-step">
<li id="account" class="highlight">Account</li>
<li id="password">Credentials</li>
<li id="general">General</li>
</ul>
<form name="frmRegistration" id="registration-form" method="post">
<div id="account-field">
<label>Email</label><span id="email-error" class="registration-error"></span>
<div><input type="text" name="email" id="email" class="demoInputBox" /></div>
</div>
<div id="password-field" style="display:none;">
<label>Enter Password</label><span id="password-error" class="registration-error"></span>
<div><input type="password" name="password" id="user-password" class="demoInputBox" /></div>
<label>Re-enter Password</label><span id="confirm-password-error" class="registration-error"></span>
<div><input type="password" name="confirm-password" id="confirm-password" class="demoInputBox" /></div>
</div>
<div id="general-field" style="display:none;">
<label>Display Name</label>
<div><input type="text" name="display-name" id="display-name" class="demoInputBox"/></div>
<label>Gender</label>
<div>
<select name="gender" id="gender" class="demoInputBox">
<option value="female">Female</option>
<option value="male">Male</option>
</select></div>
</div>
<div>
<input class="btnAction" type="button" name="back" id="back" value="Back" style="display:none;">
<input class="btnAction" type="button" name="next" id="next" value="Next" >
<input class="btnAction" type="submit" name="finish" id="finish" value="Finish" style="display:none;">
</div>
</form>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
</body>