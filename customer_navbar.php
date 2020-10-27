<?php session_start(); ?>
<?php
	if($_SESSION["user_session"] == null){
		echo "<script>location.href = '/official_Tybsc_project/Login.php';</script>";
	}
	require("config.php");
	date_default_timezone_set('Asia/Kolkata');
?>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
	  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	  <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
		<!-- Popper.JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
		<!-- Bootstrap JS -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
		   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        

			
		<style>
			.all_up {
				text-transform: uppercase;
				font-size: 20px;
				}
				.for_num{
					font-size: 20px;
					color: red;
				}
				.fa-question-circle{
					font-size: 25px;
				}
				a:hover {
				  //background-color: yellow;
				  color: #380474;
				}
				navbar{
					z-index: 0;
				}
				.left_navbar_components{
					color: red;
				}
				
				
				
				
			body{
			  font-family: Arial;
			}
				
		</style>
		<script>
			setInterval("cart_number()",500);
			function cart_number() {
			  var xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				  document.getElementById("cart_num").innerHTML = this.responseText;
				}
			  };
			  xhttp.open("GET","cart_number_ajax.php", true);
			  xhttp.send();
			}
		</script>
	</head>
	<body>
		<nav class="navbar bg-info navbar-dark">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="home.php">Tech Restaurant</a>
			</div>
			<ul class="nav navbar-nav">
			  <li><a href="home.php">Home</a></li>
			  <li><a href="services.php">Services</a></li>
			  <li><a href="menu_items.php">Menu</a></li>
			  <li><a href="place_order.php">Orders</a></li>
			  <?php if($_SESSION["user_role_session"] == "admin" or $_SESSION["user_role_session"] == "manager" or $_SESSION["user_role_session"] == "staff"){ echo "<li><a href='dashboard.php' style='color:red;'><b>GO to Admin Panel</b></a></li>"; } ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			  <li><h3 style="color:#0275d8;"><?php if(isset($_SESSION["user_session"])){ echo '<div class="all_up">'.$_SESSION["user_session"].'</div>'; }?></li>
			  <li><a href="cart_items.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart<sup class="for_num" id="cart_num"></sup></a></li>
			  <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
			  <li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
			  <li><a href="help.php"><i class="fa fa-question-circle"></i></a></li>
			</ul>
		  </div>
		</nav>
	</body>
</html>