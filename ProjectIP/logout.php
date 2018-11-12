<?php

	session_start();
	
	$page_title = 'Logout Page';
	include ('./header_user.html');
	
?>
<html>
	
	<style>
		
		#content{
			width: 50%;
			margin: 20px auto;
			border: 1px solid #cbcbcb;
			background-color: #cfd2ff;
		}
		
		#img_div{
			width: 80%;
			padding: 5px;
			margin: 15px auto;
			border: 1px solid #cbcbcb;
			background-color: #edeeff;
		}
		#img_div:after{
			content: "";
			display: block;
			clear: both;
		}
		#shoes_img{
			float: left;
			margin: 5px;
			width: 250px;
			height: 180px;
		}
		
		#demoFont {
			font-family: "Arial Black", Gadget, sans-serif;
			font-size: 45px;
			letter-spacing: -0.8px;
			word-spacing: 2px;
			color: #092666;
			font-weight: 400;
			text-align:center;
			text-decoration: none;
			font-style: normal;
			font-variant: normal;
			text-transform: none;
		}
		
		.buttonDesign {
			background-color: #4367e7;
			border: none;
			color: white;
			padding: 15px 42px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
		}
		
	</style>
	
	<body bgcolor="#acb2ff">
		<div id="demoFont">You have been Logged Out</div>
		<br>
		<br>
		<p><a href="index.php">Go back to Main Page</a></p>
	</body>
	
</html>

<?php

	// remove all session variables
	//session_unset(); 
	
	// unset cart session
	unset($_SESSION['id']);
	unset($_SESSION['username']);

	// destroy the session 
	//session_destroy(); 
	
?>