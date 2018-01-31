<?php


?>


<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){

	setTimeout(loadMessages, 3000);

	function loadMessages(){
		console.log("Trying to load messages....");
		setTimeout(loadMessages, 3000);
		$.ajax({
			url : "listall.php",
			method : "POST",
			dataType : "json"
			
			}).done(function(result){
				console.log('success');
				console.log('result ' + result);
				$("#messagelist").empty();
				for (var i = 0; i < result.length; i++) {
					var fildiscussion = result[i];
					$("#messagelist").append("<i>" + fildiscussion.emitter + "</i> : " + fildiscussion.message + "<br/>" );
				}
				
				
				}).fail(function(result, status, error){
					console.log('fail');
					});
	}
	
	$("#messagesubmit").on("click", function(event){
		event.preventDefault();
		console.log("you click and want to add something");
		//do ajax request
		console.log(event.target.name);
		$.ajax({
			url : "addmessage.php",
			method : "POST",
			data : $("#chatform").serialize(),
			dataType : "json"
			
			}).done(function(result){
				console.log('success');
				}).fail(function(result, status, error){
					console.log('fail');
					});
	});

	var loadedchattime = new Date();
	console.log(loadedchattime);
});
</script>
</head>
<body>
<form id="chatform">
<input type="text" id="messageemitter" name="messageemitter" placeholder="user"/>
<input type="text" id="messageinput" name="messageinput" placeholder="message"/>
<input type="submit" id="messagesubmit" name="messagesubmit">
</form>
<div id="messagelist"></div>
</body>
</html>