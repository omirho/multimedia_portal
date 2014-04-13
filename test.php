<html>
<head>
	<script type="text/javascript" src="js/jquery-2.1.0.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$("#li").click(function(){
			$.post("test1.php",
		  	{
		    	name:"Donald Duck",
		    	city:"Duckburg"
		  	},
		  	function(data,status){
		    	if(status == "success")
		    	{
		    		alert(data);
		    		$("#li").attr('disabled',true);
		    		$("#dli").attr('disabled',false);
		    	}
		  	});
		});
		$("#dli").click(function(){
			$.post("test1.php",
		  	{
		    	name:"DuckDonald",
		    	city:"Durg"
		  	},
		  	function(data,status){
		    	if(status == "success")
		    	{
		    		alert(data);
		    		$("#li").attr('disabled',false);
		    		$("#dli").attr('disabled',true);
		    	}
		  	});
		});
	});
	</script>
</head>
<body>

<button id="li" type="button" >Like Me!</button>
<button id="dli" type="button" >Dislike Me!</button>
 
</body>
</html>
