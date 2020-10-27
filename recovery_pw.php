<?php session_start(); ?>
<?php
	require("config.php");
?>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<style>
			.making_straight{
				background-color: #F5F5F5;
				margin: auto;
				//margin-left: 300px;
				margin-top: 50px;
			    width: 60%;
			    border: 3px solid #73AD21;
				border-radius: 20px;
			    padding: 50px;
				text-align: center;
				font-size: 20px;
			}
			.in_vis{
				visibility: hidden;
			}
			body{
				background-image: url('/official_Tybsc_project/body_background/image_6.jpg');
				background-repeat:round;
				background-attachment: fixed;
			}
		</style>
	</head>
	<body>
		<form action="recovery_pw.php" method="POST">
			<div class="container making_straight">
				<div class="row">
					<div class="col-md-9"><Label>Enter New Password below</label></div>
				</div><br>
				<div class="row">
					<div class="col-md-4"><label>New Password</label></div>
					<div class="col-md-5"><input type="password" name="pass1" id="pass1" class="form-control" placeholder="Enter password" required /></div>
				</div><br>
				<div class="row">
					<div class="col-md-4"><label>Confirm Password</label></div>
					<div class="col-md-5"><input type="password" name="pass2" id="pass2" class="form-control" placeholder="Enter Confirm Password" oninput="check_pw()" required /></div>
					<div class="col-md-1"><div class="fa fa-check in_vis" id="icon_check"></div></div>
				</div><br>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-5"><button type="submit" name="recovery" id="recovery" class="form-control btn btn-success" disabled="true">Change Password</button></div>
				</div>
			</div>
		</form>
		<script>
			function check_pw() {
			  var x = document.getElementById("pass1").value;
			  var y = document.getElementById("pass2").value;
			  var z = document.getElementById("pass2").value;
			  if(x==y){
				  document.getElementById("icon_check").style.visibility = "visible";
				  document.getElementById("icon_check").style.color = "green";
				  document.getElementById("recovery").disabled = false;
			  }
			  else if((x == "") && (y == "")){
				  document.getElementById("icon_check").style.visibility = "visible";
				  document.getElementById("icon_check").style.color = "red";
				  document.getElementById("recovery").disabled = true;
			  }
			  else{
				  document.getElementById("icon_check").style.visibility = "visible";
				  document.getElementById("icon_check").style.color = "red";
				  document.getElementById("recovery").disabled = true;
			  }
			  //document.getElementById("demo").innerHTML = "You wrote: " + x;
			}
		</script>
	</body>
</html>
<?php
	if(isset($_POST["recovery"])){
		
		$pw = sha1($_POST["pass2"]);

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "UPDATE register SET password='".$pw."' WHERE id='".$_SESSION["forgot_id"]."'";

		if ($conn->query($sql) === TRUE) {
			$_SESSION["forgot_id"] = "";
			echo "<script LANGUAGE='JavaScript'>
					window.alert('Password Changed Successfully');
					window.location.href='Login.php';
				  </script>";
		} else {
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	}
?>