<?php header('Access-Control-Allow-Origin: https://www.google.com/'); ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	$.ajax({
	   url:'https://www.google.com/search?q=live+corona+cases+in+india&oq=live+corona+cases&aqs=edge.2.69i57j0i402j0i433j0l4.6776j0j1&sourceid=chrome&ie=UTF-8',
	   type:'GET',
	   success: function(data){
	       $('#content').html($(data).find('#eTST2').html());
	   }
	});
</script>
</head>
<body>
<p id="content"></p>
</body>
</html>
