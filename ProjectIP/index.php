<?php 
	
	// start the session
	session_start();
	
	$page_title = 'Welcome to this Site!';
	include ('./header.html');
	
	if(isset($_SESSION['username'])){
		//echo 'Id: ' . $_SESSION['id'];  <div id="demoFont">Main Page</div>
		echo "<div id='demoFont2'>Welcome, " . $_SESSION['username'] . "&nbsp;</div>";
		$username = $_SESSION['username'];
	}
	
?>
<head>
	
	<style>
		
		#demoFont3 {
			font-family: "Arial Black", Gadget, sans-serif;
			font-size: 65px;
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
		
		#demoFont2 {
			font-family: "Arial Black", Gadget, sans-serif;
			font-size: 20px;
			letter-spacing: -0.8px;
			word-spacing: 2px;
			color: #002d90;
			font-weight: 400;
			text-align:right;
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
			
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
		}
		
		.box{
			background:#bcc0fd;
			width:1308px;
			height: 487px;
			border-radius:6px;
			margin: 0 auto 0 auto;
			padding:30px 0px 30px 0px;
			border: #2980b9 4px solid; 
		}
		
	</style>
	
</head>
<body bgcolor="#acb2ff">
	
	<br>
	
	<form>
	
		<div class="box">
				
			<img src="shoes/001adidasmain.jpg" width="800" height="450" alt="Main Icon" style="margin-bottom:0px; margin: 20px; float: left;">
			<br>
			<br>
			<br>
			<div id="demoFont3">ADIDAS</div>
			<br>
			<br>
			<br>
			<br>
			<img src="shoes/adidaslogo.png" width="130" height="100" alt="Logo Icon" style="margin-left:160px; float: center;">
			<br>
			<br>
			<p style="text-align: center;"><button type="submit" class="buttonDesign" name="submit" formaction="adidas_men.php">Browse Adidas Product</button></p>
				
		</div>
		<br>
		<br>
		
		<div class="box">
				
			<img src="shoes/002nikemain.jpg" width="800" height="450" alt="Main Icon" style="margin-bottom:0px; margin: 20px; float: right;">
			<br>
			<br>
			<br>
			<div id="demoFont3">NIKE</div>
			<br>
			<br>
			<br>
			<br>
			<img src="shoes/nikelogo.png" width="130" height="100" alt="Logo Icon" style="margin-left:170px; float: center;">
			<br>
			<br>
			<p style="text-align: center;"><button type="submit" class="buttonDesign" name="submit" formaction="nike_men.php">Browse Nike Product</button></p>
				
		</div>
		<br>
		<br>
		
		<div class="box">
				
			<img src="shoes/003pumamain.jpg" width="800" height="450" alt="Main Icon" style="margin-bottom:0px; margin: 20px; float: left;">
			<br>
			<br>
			<br>
			<div id="demoFont3">PUMA</div>
			<br>
			<br>
			<br>
			<br>
			<img src="shoes/pumalogo.png" width="130" height="100" alt="Logo Icon" style="margin-left:170px; float: center;">
			<br>
			<br>
			<p style="text-align: center;"><button type="submit" class="buttonDesign" name="submit" formaction="puma_men.php">Browse Puma Product</button></p>
			
		</div>
		<br>
		<br>
		
		<div class="box">
				
			<img src="shoes/004conversemain.jpg" width="800" height="450" alt="Main Icon" style="margin-bottom:0px; margin: 20px; float: right;">
			<br>
			<br>
			<br>
			<div id="demoFont3">CONVERSE</div>
			<br>
			<br>
			<br>
			<br>
			<img src="shoes/converselogo.png" width="130" height="100" alt="Logo Icon" style="margin-left:170px; float: center;">
			<br>
			<br>
			<p style="text-align: center;"><button type="submit" class="buttonDesign" name="submit" formaction="converse_men.php">Browse Converse Product</button></p>
			
		</div>
		<br>
		<br>
		
		<div class="box">
				
			<img src="shoes/005asicsmain.jpg" width="800" height="450" alt="Main Icon" style="margin-bottom:0px; margin: 20px; float: left;">
			<br>
			<br>
			<br>
			<div id="demoFont3">ASICS</div>
			<br>
			<br>
			<br>
			<br>
			<img src="shoes/asicslogo.png" width="150" height="70" alt="Logo Icon" style="margin-left:160px; float: center;">
			<br>
			<br>
			<p style="text-align: center;"><button type="submit" class="buttonDesign" name="submit" formaction="asics_men.php">Browse Asics Product</button></p>
				
		</div>
		<br>
		<br>
		
		<div class="box">
				
			<img src="shoes/006vansmain.jpg" width="800" height="450" alt="Main Icon" style="margin-bottom:0px; margin: 20px; float: right;">
			<br>
			<br>
			<br>
			<div id="demoFont3">VANS</div>
			<br>
			<br>
			<br>
			<br>
			<img src="shoes/vanslogo.png" width="150" height="70" alt="Logo Icon" style="margin-left:160px; float: center;">
			<br>
			<br>
			<p style="text-align: center;"><button type="submit" class="buttonDesign" name="submit" formaction="vans_men.php">Browse Vans Product</button></p>
				
		</div>
		<br>
		<br>
		
	</form>
	
</body>


