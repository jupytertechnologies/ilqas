<html> 
<header> 
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script>
$(document).ready(function() {
	$("#next").click(function(){
		var output = validate();
		if(output) {
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
		}
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
</header>

<body>
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
</body>

</html>
