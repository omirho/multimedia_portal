<?php
// Create connection
$con=mysqli_connect("localhost","root","","multimedia");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>


<html>
    <head>
        <style>
            .error {color: #000000;}
        </style>
    	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
                
                <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
    
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
        <!--table-->
        
	<style type="text/css" media="screen">
		@import url(http://fonts.googleapis.com/css?family=Ubuntu);
		
		* {margin: 0; padding: 0; }
		
		body {
			font-family: Ubuntu, arial, verdana;
			background-image:url('white1.jpg');
background-repeat:no-repeat;
background-attachment:fixed;
background-size: cover;
		}
		
		/*----------
		Blocks
		----------*/
		/*Pricing table and price blocks*/
		.pricing_table {
			line-height: 150%; 
			font-size: 12px; 
			margin: 0 auto; 
			width: 75%; 
			max-width: 800px; 
			padding-top: 10px;
                        margin-left: 400px;
			margin-top: 300px;
                        position: relative;
                        z-index: 2;
		}
		
		.price_block {
			text-align: center; 
			width: 400px; 
			color: #fff; 
			float: left; 
			list-style-type: none; 
			transition: all 0.25s; 
			position: relative; 
			box-sizing: border-box;
                        margin-left:20px;
			margin-bottom: 50px; 
			border-bottom: 1px solid transparent; 
		}

		
		/*Price heads*/
		.pricing_table h3 {
			text-transform: uppercase; 
			padding: 5px 0; 
			background: #333; 
			margin: -10px 0 100px 0;
		}
		
		/*Price tags*/
		.price {
			display: table; 
			background: #444; 
			width: 100%; 
			height: 70px; 
		}
		.price_figure {
			font-size: 24px; 
			text-transform: uppercase; 
			vertical-align: middle; 
			display: table-cell;
		}
		.price_number {
			font-weight: bold; 
			display: block;
		}
		.price_tenure {
			font-size: 11px; 
		}
		
		/*Features*/
		.features {
			background: #DEF0F4; 
			color: #000;
		}
		.features li {
			padding: 8px 15px;
			border-bottom: 1px solid #ccc; 
			font-size: 11px; 
			list-style-type: none;
		}
		
		.footer {
			padding: 15px; 
			background: #DEF0F4;
		}
		.action_button {
			text-decoration: none; 
			color: #fff; 
			font-weight: bold; 
			border-radius: 5px; 
			background: linear-gradient(#666, #333); 
			padding: 5px 20px; 
			font-size: 11px; 
			text-transform: uppercase;
		}
		
		.price_block:hover {
			box-shadow: 0 0 0px 5px rgba(0, 0, 0, 0.5); 
			transform: scale(1.04) translateY(-5px); 
			z-index: 1; 
			border-bottom: 0 none;
		}
		.price_block:hover .price {
			background:linear-gradient(#DB7224, #F9B84A); 
			box-shadow: inset 0 0 45px 1px #DB7224;
		}
		.price_block:hover h3 {
			background: #222;
		}
		.price_block:hover .action_button {
			background: linear-gradient(#F9B84A, #DB7224); 
		}
		
		
		@media only screen and (min-width : 480px) and (max-width : 768px) {
			.price_block {width: 50%;}
			.price_block:nth-child(odd) {border-right: 1px solid transparent;}
			.price_block:nth-child(3) {clear: both;}
			
			.price_block:nth-child(odd):hover {border: 0 none;}
		}
		@media only screen and (min-width : 768px){
			.price_block {width: 25%;}
			.price_block {border-right: 1px solid transparent; border-bottom: 0 none;}
			.price_block:last-child {border-right: 0 none;}
			
			.price_block:hover {border: 0 none;}
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		.skeleton, .skeleton ul, .skeleton li, .skeleton div, .skeleton h3, .skeleton span, .skeleton p {
			border: 5px solid rgba(255, 255, 255, 0.9);
			border-radius: 5px;
			margin: 7px !important;
			background: rgba(0, 0, 0, 0.05) !important;
			padding: 0 !important;
			text-align: left !important;
			display: block !important;
			
			width: auto !important;
			height: auto !important;
			
			font-size: 10px !important;
			font-style: italic !important;
			text-transform: none !important;
			font-weight: normal !important;
			color: black !important;
		}
		.skeleton .label {
			font-size: 11px !important;
			font-style: italic !important;
			text-transform: none !important;
			font-weight: normal !important;
			color: white !important;
			border: 0 none !important;
			padding: 5px !important; 
			margin: 0 !important;
			float: none !important;
			text-align: left !important;
			text-shadow: 0 0 1px white;
			background: none !important;
		}
		.skeleton {
			display: none !important;
			margin: 100px !important;
			clear: both;
		}
	</style>
        
        
        
     <!--searchbar-->
        
        <style>
.form-wrapper {
    position: relative;
    /*top: 15px;
    left: 480px;*/
        width: 450px;
        padding: 8px;
        margin: 100px auto;
        overflow: scroll;
        border-width: 1px;
        border-style: solid;
        border-color: #dedede #bababa #aaa #bababa;
        -moz-box-shadow: 0 3px 3px rgba(255,255,255,.1), 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 5px #444;
        -webkit-box-shadow: 0 3px 3px rgba(255,255,255,.1), 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 5px #444;
        box-shadow: 0 3px 3px rgba(255,255,255,.1), 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 5px #444;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
        background-color: #f6f6f6;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#f6f6f6), to(#eae8e8));
        background-image: -webkit-linear-gradient(top, #f6f6f6, #eae8e8);
        background-image: -moz-linear-gradient(top, #f6f6f6, #eae8e8);
        background-image: -ms-linear-gradient(top, #f6f6f6, #eae8e8);
        background-image: -o-linear-gradient(top, #f6f6f6, #eae8e8);
        background-image: linear-gradient(top, #f6f6f6, #eae8e8);
}

.form-wrapper #search {
        width: 330px;
        height: 20px;
        padding: 10px 5px;
        float: left;
        font: bold 16px 'lucida sans', 'trebuchet MS', 'Tahoma';
        border: 1px solid #ccc;
        -moz-box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #fff;
        -webkit-box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #fff;
        box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #fff;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
}

.form-wrapper #search:focus {
        outline: 0;
        border-color: #aaa;
        -moz-box-shadow: 0 1px 1px #bbb inset;
        -webkit-box-shadow: 0 1px 1px #bbb inset;
        box-shadow: 0 1px 1px #bbb inset;
}

.form-wrapper #search::-webkit-input-placeholder {
   color: #999;
   font-weight: normal;
}

.form-wrapper #search:-moz-placeholder {
        color: #999;
        font-weight: normal;
}

.form-wrapper #search:-ms-input-placeholder {
        color: #999;
        font-weight: normal;
} 

.form-wrapper #submit {
        float: right;
        border: 1px solid #00748f;
        height: 42px;
        width: 100px;
        padding: 0;
        cursor: pointer;
        font: bold 15px Arial, Helvetica;
        color: #fafafa;
        text-transform: uppercase;
        background-color: #0483a0;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#31b2c3), to(#0483a0));
        background-image: -webkit-linear-gradient(top, #31b2c3, #0483a0);
        background-image: -moz-linear-gradient(top, #31b2c3, #0483a0);
        background-image: -ms-linear-gradient(top, #31b2c3, #0483a0);
        background-image: -o-linear-gradient(top, #31b2c3, #0483a0);
        background-image: linear-gradient(top, #31b2c3, #0483a0);
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        text-shadow: 0 1px 0 rgba(0, 0 ,0, .3);
        -moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #fff;
        -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #fff;
        box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #fff;
}

.form-wrapper #submit:hover,
.form-wrapper #submit:focus {
        background-color: #31b2c3;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#0483a0), to(#31b2c3));
        background-image: -webkit-linear-gradient(top, #0483a0, #31b2c3);
        background-image: -moz-linear-gradient(top, #0483a0, #31b2c3);
        background-image: -ms-linear-gradient(top, #0483a0, #31b2c3);
        background-image: -o-linear-gradient(top, #0483a0, #31b2c3);
        background-image: linear-gradient(top, #0483a0, #31b2c3);
}       

.form-wrapper #submit:active {
        outline: 0;
        -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
        -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
}

.form-wrapper #submit::-moz-focus-inner {
        border: 0;
}


</style>
        


<!--menubar-->

<style>

@font-face {
    font-family: 'WebSymbolsRegular';
    src: url('websymbols/websymbols-regular-webfont.eot');
    src: url('websymbols/websymbols-regular-webfont.eot?#iefix') format('embedded-opentype'),
        url('websymbols/websymbols-regular-webfont.woff') format('woff'),
        url('websymbols/websymbols-regular-webfont.ttf') format('truetype'),
        url('websymbols/websymbols-regular-webfont.svg#WebSymbolsRegular') format('svg');
    font-weight: normal;
    font-style: normal;
}
.ca-menu{
    padding:0; margin-left: 10px;
   /* margin-top: 25px;
    //margin:20px auto;*/
    width: 400px;
    position: fixed;
    top: 150px;
    left: 10px;
    min-width: 1300px;
}
.ca-menu li{
    width: 300px;
    height: 70px;
    overflow: hidden;
    position: relative;
    display: block;
    background-color: rgba(255,255,255,0.5);
    -webkit-box-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    -moz-box-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    box-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    margin-bottom: 14px;
    -webkit-transition: all 300ms ease-in-out;
	-moz-transition: all 300ms ease-in-out;
	-o-transition: all 300ms ease-in-out;
	-ms-transition: all 300ms ease-in-out;
	transition: all 300ms ease-in-out;
}
.ca-menu li:last-child{
    margin-bottom: 0px;
}
.ca-menu li a{
    text-align: left;
    width: 100%;
    height: 100%;
    display: block;
    color: #333;
    position: relative;
}
.ca-icon{
    font-family: 'WebSymbolsRegular', cursive;
    font-size: 30px;
    color: #333;
    text-shadow: 0px 0px 1px #333;
    line-height: 90px;
    position: absolute;
    width: 90px;
    left: 20px;
    text-align: center;
    -webkit-transition: all 300ms linear;
	-moz-transition: all 300ms linear;
	-o-transition: all 300ms linear;
	-ms-transition: all 300ms linear;
	transition: all 300ms linear; 
}
.ca-content{
    position: absolute;
    left: 120px;
    width: 370px;
    height: 60px;
    top: 20px;
}
.ca-main{
    font-size: 17px;
    -webkit-transition: all 300ms linear;
	-moz-transition: all 300ms linear;
	-o-transition: all 300ms linear;
	-ms-transition: all 300ms linear;
	transition: all 300ms linear; 
}
.ca-sub{
    font-size: 14px;
    color: #666;
}
.ca-menu li:hover{
    background-color: #000;
}
.ca-menu li:hover .ca-icon{
    color: #f900b0;
    font-size: 120px;
    opacity: 0.2;
    left: -20px;
    -webkit-transform: rotate(20deg);
    -moz-transform: rotate(20deg);
    -ms-transform: rotate(20deg);
    transform: rotate(20deg);
}
.ca-menu li:hover .ca-main{
    color: #f900b0;
    opacity: 0.8;
}
.ca-menu li:hover .ca-sub{
    color: #fff;
    opacity: 0.8;
}
    
</style>
        

<!--searchbar2-->

<style>
    
    #searchbox{
        background: #eaf8fc;
        background-image: -moz-linear-gradient(#fff, #d4e8ec);
        background-image: -webkit-gradient(linear,left bottom,left top,color-stop(0, #d4e8ec),color-stop(1, #fff));

        -moz-border-radius: 35px;
        border-radius: 35px;

        border-width: 1px;
        border-style: solid;
        border-color: #c4d9df #a4c3ca #83afb7;
        width: 500px;
        height: 35px;
        padding: 10px;
        margin: 100px auto 50px;
        overflow: hidden; /* Clear floats */
}

#search, #submit{
        float: left;
}

#search{
        padding: 5px 9px;
        height: 23px;
        width: 380px;
        border: 1px solid #a4c3ca;
        font: normal 13px 'trebuchet MS', arial, helvetica;
        background: #f1f1f1;

        -moz-border-radius: 50px 3px 3px 50px;
         border-radius: 50px 3px 3px 50px;
         -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25) inset, 0 1px 0 rgba(255, 255, 255, 1);
         -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25) inset, 0 1px 0 rgba(255, 255, 255, 1);
         box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25) inset, 0 1px 0 rgba(255, 255, 255, 1);
}

/* ----------------------- */

#submit{
        background: #6cbb6b;
        background-image: -moz-linear-gradient(#95d788, #6cbb6b);
        background-image: -webkit-gradient(linear,left bottom,left top,color-stop(0, #6cbb6b),color-stop(1, #95d788));

        -moz-border-radius: 3px 50px 50px 3px;
        border-radius: 3px 50px 50px 3px;

        border-width: 1px;
        border-style: solid;
        border-color: #7eba7c #578e57 #447d43;

         -moz-box-shadow: 0 0 1px rgba(0, 0, 0, 0.3), 0 1px 0 rgba(255, 255, 255, 0.3) inset;
         -webkit-box-shadow: 0 0 1px rgba(0, 0, 0, 0.3), 0 1px 0 rgba(255, 255, 255, 0.3) inset;
         box-shadow: 0 0 1px rgba(0, 0, 0, 0.3), 0 1px 0 rgba(255, 255, 255, 0.3) inset;                

        height: 35px;
        margin: 0 0 0 10px;
        padding: 0;
        width: 90px;
        cursor: pointer;
        font: bold 14px Arial, Helvetica;
        color: #23441e;

        text-shadow: 0 1px 0 rgba(255,255,255,0.5);
}

#submit:hover{
        background: #95d788;
        background-image: -moz-linear-gradient(#6cbb6b, #95d788);
        background-image: -webkit-gradient(linear,left bottom,left top,color-stop(0, #95d788),color-stop(1, #6cbb6b));
}       

#submit:active{
        background: #95d788;
        outline: none;

         -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
         -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
         box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
}

#submit::-moz-focus-inner{
       border: 0;  /* Small centering fix for Firefox */
}

#search::-webkit-input-placeholder {
   color: #9c9c9c;
   font-style: italic;
}

#search:-moz-placeholder {
   color: #9c9c9c;
   font-style: italic;
}  

#search:-ms-placeholder {
   color: #9c9c9c;
   font-style: italic;
}

#search.placeholder {
   color: #9c9c9c !important;
   font-style: italic;
}
    
</style>


<!--rating-->
<style type="text/css">
  .star {
background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAAKCAQAAADI+WwIAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAgY0hSTQAAeiYAAICEAAD6AAAAgOgAAHUwAADqYAAAOpgAABdwnLpRPAAAAAJiS0dEAP+Hj8y/AAAACXBIWXMAAAsTAAALEwEAmpwYAAAACXZwQWcAAAALAAAACgCF+qVAAAAAhUlEQVQI103NMQqCABgF4C+Fxg7QHDQ0JkFnaKqlKJBu4Np9hEDoBq2doCYP0B4UBKLYUKZvex+P/+9N/dJ3FXl9S9CopbF9U1pOkAgb3irVanOMlGqldeBoo9CmspMFOFmp/hzLmtuXzvrWvpwJFVJvLLqci8Qmzl8OhzBwcMdD6ilXfwAd9B9f78yTCQAAAABJRU5ErkJggg==);  
  }
 
  .unstar {
background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAAKCAQAAADI+WwIAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAgY0hSTQAAeiYAAICEAAD6AAAAgOgAAHUwAADqYAAAOpgAABdwnLpRPAAAAAJiS0dEAP+Hj8y/AAAACXBIWXMAAAsTAAALEwEAmpwYAAAACXZwQWcAAAALAAAACgCF+qVAAAAAo0lEQVQI1z2NMQrCQBRE32YxGFDwBGJnYZkll0ilpDISLO28k4lFwN7CTsTKSisbK8ELCJFI/BZJdn41j/kzSqiVuZ3r1yzeAAanoajpcOwsW2dxf+0yWGe6CaVzNmgY4VHyQKAiVsIlUlvc9otK4lXugNnJjKqlkpi86X6exIZfNztZBGhKUgr4hBZ3A3UX4ye/CYdeWHch7MOzJ9R3jFLt8we7izGyoi32iQAAAABJRU5ErkJggg==);
  }
 
  .half-star {
background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAAKCAQAAADI+WwIAAAAAmJLR0QA/4ePzL8AAAAJcEhZcwAACxIAAAsSAdLdfvwAAAAJdnBBZwAAAAsAAAAKAIX6pUAAAACTSURBVAjXTY0xCsJAEEVfdiEgpPAWFpYTvMRWSioDwdIuh7GydbEIeAM7sU1lo42tR1CEdSzMJk4178H/H7qTVK4+A0URTNTMmZhVhEHXMK69/UEiS3Z0sOGOQqBMQAr2pABbgKDlujHQHlgQYpdWeRO7z/0Cj8swOcPyxvOEl/vXN/K2+kw5Zq4PipNR/E+Ft8IX7yMjsFUGo0cAAAAcdEVYdFNvZnR3YXJlAEFkb2JlIEZpcmV3b3JrcyBDUzVxteM2AAAAAElFTkSuQmCC);
  }
 
  .rating {
    float: left;
    width: 11px;
    height: 10px;
  }
</style>
    </head>
    
    <body>
        
        
        <?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$searchinput = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   if (empty($_POST["search"]))
     {$nameErr = "req";
     }
   else
     {
     $searchinput = test_input($_POST["search"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$searchinput))
       {
       $nameErr = "Only letters and white space allowed"; 
       }
     }
}
     function test_input($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}
?>
        
        
        
        
         <div class="container">
            <!--div class="header">
               
                
                 
                <div class="clr"></div>
            </div-->
          
            <div class="content">
                <!--div class="more">
                    <ul>
                        <li><a href="index.html">Example 1</a></li>
                        <li><a href="index2.html">Example 2</a></li>
                        <li class="selected"><a href="index3.html">Example 3</a></li>
                        <li><a href="index4.html">Example 4</a></li>
                        <li><a href="index5.html">Example 5</a></li>
                        <li><a href="index6.html">Example 6</a></li>
                        <li><a href="index7.html">Example 7</a></li>
                        <li><a href="index8.html">Example 8</a></li>
                        <li><a href="index9.html">Example 9</a></li>
                        <li><a href="index10.html">Example 10</a></li>
                    </ul>
                </div-->
                
                <ul class="ca-menu">
                    <li>
                        <a href="index.php?id=1">
                            <span class="ca-icon">A</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Action</h2>
                                <h3 class="ca-sub">Personalized to your needs</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?id=2">
                            <span class="ca-icon">P</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Puzzle</h2>
                                <h3 class="ca-sub">Advanced use of technology</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?id=3">
                            <span class="ca-icon">S</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Shooter</h2>
                                <h3 class="ca-sub">Understanding visually</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?id=4">
                            <span class="ca-icon">S&D</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Strategy and Defense</h2>
                                <h3 class="ca-sub">Professionals in action</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?id=5">
                            <span class="ca-icon">R</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Racing</h2>
                                <h3 class="ca-sub">24/7 for you needs</h3>
                            </div>
                        </a>
                    </li>
                    <!--li>
                        
                             
                            <div>
                            <p style="font-size:20px;margin-left: 80px;"> <a href="sort1.php?id=0">Sort by ratings</a><a href="sort1.php?id=1">Sort by views</a></p>
                          </div>
                        
                    </li-->
                </ul>
            </div><!-- content -->
        </div>
        
        
        
        
        
        
        
        
        
        
        
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color:#fff;">FunZone!</a>
   </div>
   
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
        
        
    
        
        
        
 <?php
 /*function searchfunc()
 {
     $id=7; echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id;
     
 }
 */
 ?>
        
        
        
        
        <form method="post" action="search.php" class="navbar-form navbar-left" role="search" style="height: 100px">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search" style="width: 500px;" name="search">
        </div>
        <button type="submit" class="btn btn-default" style="width: 150px" name="button">Submit</button>
      </form>

   <div>
      <center><p class="navbar-text">Signed in as Thomas</p></center>
   </div>
        
        
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        
        
        
        
        
        
 <div class="row" style="float:right;width:1000px;margin-top:200px; margin-bottom:80px;">
     
     <?php
     //session_start();
     if($nameErr!='req'){
$result=  mysqli_query($con, "SELECT * FROM multimedia.games WHERE name LIKE '%$searchinput%'");
//$ids=array();
while($row=mysqli_fetch_array($result))
{
    //array_push($ids, $row['id']);
    echo'<div class="col-sm-1 col-md-3">';
      echo '<div class="thumbnail">';
         echo '<img style="width:200px;height:200px;" src="';
         echo "../games/";
             echo $row['genre'];
                 echo '/images/';
                    echo $row['image_location'];
                            echo'">';
      echo '</div>';
      echo'<div class="caption">';
         echo'<h3>'.$row['name'].'</h3>';
         $rating=$row['rating'];
         $temp=5;
         echo'<p>Rating&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspViews</style></p>';
         while($temp!=0)
         {
             if($rating>=1)
             {
                 echo'<span class="rating star"></span>';
                 $rating=$rating-1;
                 $temp=$temp-1;
             }
             else if($rating>0 && $rating<0.5)
             {
                 echo'<span class="rating half-star"></span>';
                 $rating=0;
                 $temp=$temp-1;
             }
             else if($rating>=0.5 && $rating<1)
             {
                 echo'<span class="rating star"></span>';
                 $rating=0;
                 $temp=$temp-1;
             }
             else
             {
                 echo'<span class="rating unstar"></span>';
                 $temp=$temp-1;
             }
         }
         echo'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
         echo $row['views'];
         echo'<br><p>';
         
         echo'<a href="gameplay.php' ;
            //echo $row['game_location'];
                       echo'?gameid=';
                       echo $row['id'];
                       echo'"';
         
            echo' target="_newtab" class="btn btn-primary" role="button">';
            echo 'Play';
            echo'</a>'; 
            echo'<a href="../games/action/';
                echo $row['game_location'];
            echo'" download class="btn btn-default" role="button">';
               echo'Download';
            echo'</a>';
         echo'</p>';
      echo'</div>';
      echo'</div>';
}
     }
?>
 </body>
 </html>