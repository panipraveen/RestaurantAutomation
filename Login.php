<?php session_start(); ?>
<?php
	require("config.php");
?>
<?php
	if(isset($_SESSION["user_session"])){
		unset ($_SESSION["user_session"]);
		unset ($_SESSION["user_id_session"]);
		unset ($_SESSION["user_role_session"]);
		//session_destroy ();
		//echo $_SESSION["user_session"];
	}
?>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
			body{
				background-image: url('/official_Tybsc_project/body_background/image_6.jpg');
			}
		</style>
		<script>
			function eye_show(){
				var show_pw = document.getElementById("pwd");
				//alert(show_pw.type);
				//alert(show_pw.value);
				if(show_pw.value != ""){
					if(show_pw.type == "password"){
						show_pw.type = "text";
					}
					else{
						show_pw.type = "password";
					}
				}
			}
		</script>
	</head>
	<body>
	<br><br>
		<form action="Login.php" method="post">
			<div class="container making_straight">
				<div class="form-group">
					<div class="row">
						<div class="col-md-2"><label>Username</label></div>
						<div class="col-md-5"><input type="text" class="form-control" name="usr" placeholder="Enter your name" autofocus required></div>
					</div><br>
					<div class="row">
						<div class="col-md-2"><label>Password</label></div>
						<div class="col-md-5"><input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter your password" required></div>
						<div class="col-md-1"><button type="button" class="btn btn-link" style="margin-left:-40px;" id="eye_button" onclick="eye_show()"><i class="material-icons">remove_red_eye</i></button></div>
					</div><br>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-4"><input type="submit" class="form-control btn-success" name="login" value="Login"></div>
						<div class="col-md-5"><a href="forgot_password.php">Forgot Username/Password?</a></div>
					</div><br>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-4"><input type="button" class="form-control btn-info" name="account" value="Create Account" onclick="document.location.href='Registration.php';" /></div>
					</div>
				</div>
			</div>
		</form>
	</body>
</html>
<?php
/*if(!isset($_SESSION['user_name'])){
	die();
}*/
	if(isset($_POST['login'])){
		
		//Retriving values
		//$usr=htmlspecialchars($_POST['usr']);
		//$pwd=sha1($_POST['pwd']);
		
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		//Retriving Values(Latest Modified and Working)
		$userid = htmlspecialchars(mysqli_real_escape_string($conn,$_POST["usr"]));
		//echo "<h1 style='color:red'>".$userid."</h1>";
		$userPass = sha1(mysqli_real_escape_string($conn,$_POST["pwd"]));
		
		$sql = "SELECT id,name,role FROM register WHERE name='$userid' AND password='$userPass'";
		$result = mysqli_query($conn, $sql);
		//$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
					$_SESSION["user_session"] = $userid;
					$_SESSION["user_id_session"] = $row["id"];
					$_SESSION["user_role_session"] = $row["role"];
					header("Location: menu_items.php");
			}
		}else {
			echo "<h3 style='text-align:center;'>Invalid Credentials!!! Please try again <i class='fa fa-smile-o' aria-hidden='true' style='color:#800000'></i></h3>";
		}

		mysqli_close($conn);
	}
?>
<?php
	// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
	$curr_time = date("Y-m-d H:i:s");
	// sql to delete a record
	$sql_del_mails = "DELETE FROM otp_expiry WHERE created_at < (NOW() - INTERVAL 15 MINUTE)";

	if (mysqli_query($conn, $sql_del_mails)) {
	  //echo "<script>alert('Record deleted successfully');</script>";
	} else {
	  echo "Error deleting record: " . mysqli_error($conn);
	}
	mysqli_close($conn);
?>