<html>
	
	<head>
		<script>
			setTimeout(function(){updateRelevance()},5000);

			function updateRelevance()
			{
				try
                {
                    var xmlhttp;
                    
                    if (window.XMLHttpRequest)
                    {// code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp=new XMLHttpRequest();
                    }
                    else
                    {// code for IE6, IE5
                        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    
                    var url = "incrementRelevance.php";
                    var params = "hash="+hash;
                    xmlhttp.open("POST", url, true);
                    //Send the proper header information along with the request
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xmlhttp.setRequestHeader("Content-length", params.length);
                    xmlhttp.setRequestHeader("Connection", "close");
                    
                    xmlhttp.onreadystatechange=function()
                    {
                    	document.getElementById("status").innerHTML=xmlhttp.status;

                        if (xmlhttp.readyState==4 && xmlhttp.status==200)
                        {
                            document.getElementById("xyz").innerHTML=xmlhttp.responseText;
                        }
                    }
                    xmlhttp.send(params);
                }
                catch(err)
                {
                    alert(err);
                }
			}


		</script>
	</head>

	<body>
		<div id = "xyz">This is on load</div>
	</body>

</html>


