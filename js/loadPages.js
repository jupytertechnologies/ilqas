//Include the lab page 
function loadLab(user){
	
	var userId = user;
	var user_id;
	
	if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}else{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
	}
	
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById('all_content').innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open('GET',`lab_info.php?user_id=${userId}` , true);
	xmlhttp.send();
}

//Include the dashboard
function loadDashboard(){
	if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}else{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
	}
	
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById('main_content').innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open('GET','main_page.php', true);
	xmlhttp.send();
}

function getCategoryId(){
	var category;
	var categoryName = document.getElementById('category').value;
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4 && xhr.status ==200){
			
		}
	}
	xhr.open('POST','make_request.php', true);
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhr.send(`category=${categoryName}`);
}











