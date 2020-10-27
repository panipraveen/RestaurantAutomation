<?php
	require("customer_navbar.php");
	date_default_timezone_set('Asia/Kolkata');
?>
<?php
	require("config.php");
?>
<?php
	if(isset($_POST["update"])){
		$update_name = htmlspecialchars($_POST["name1"]);
		$update_address = htmlspecialchars($_POST["address1"]);
		$update_mobile = htmlspecialchars($_POST["mobile1"]);
		$update_email = htmlspecialchars($_POST["email1"]);
		
		// Create connection
		$update_conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$update_conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$update_sql = "UPDATE register SET name='".$update_name."',address='".$update_address."',mobile_number='".$update_mobile."',email='".$update_email."' WHERE id='".$_SESSION["user_id_session"]."'";

		if (mysqli_query($update_conn, $update_sql)) {
			echo "<script type='text/javascript'>
					alert('Profile Updated Sucessfully');
					window.location.href = 'profile.php';
					</script>";
		} else {
			echo "Error updating record: " . mysqli_error($update_conn);
		}

		mysqli_close($update_conn);
	}
?>
<?php
	if(isset($_POST["password_update"])){
		
		$pass_1 = htmlspecialchars($_POST["pass1"]);
		$pass_2 = htmlspecialchars($_POST["pass2"]);
		// Create connection
		$pw_conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$pw_conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$pw_sql = "UPDATE register SET password='".sha1($pass_2)."' WHERE id='".$_SESSION["user_id_session"]."'";

		if (mysqli_query($pw_conn, $pw_sql)) {
			echo "<script type='text/javascript'>
					alert('Profile Password Updated Sucessfully');
					window.location.href = 'profile.php';
					</script>";
		} else {
			echo "Error updating record: " . mysqli_error($pw_conn);
		}

		mysqli_close($pw_conn);
	}
?>
<?php
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT * FROM register WHERE id='".$_SESSION["user_id_session"]."'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
?>
<html>
	<head>
		<style>
			.update_text{
				color: red;
				font-size: 22px;
				margin-left: 70px;
			}
			.l_text{
				font-size: 25px;
			}
			.address_text{
				width:310px;
				height:70px;
			}
			.in_vis{
				visibility: hidden;
			}
		</style>
	</head>
	<body><br>
		<div class="container form-control">
			<form action="profile_update.php" method="POST">
				<div class="row">
					<div class="col-md-4 update_text"><label>Update Your Profile</label></div>
				</div><br>
				<div class="row">
					<div class="col-md-2 l_text"><label>Enter Username</label></div>
					<div class="col-md-3"><input type="text" name="name1" class="form-control" placeholder="New Username" value="<?php echo $row["name"]; ?>"></div>
				</div><br>
				<div class="row">
					<div class="col-md-2 l_text"><label>Enter Address</label></div>
					<div class="col-md-3"><textarea name="address1" rows="3" class="address_text form-control" placeholder="New Address"><?php echo $row["address"]; ?></textarea></div>
				</div><br>
				<div class="row">
					<div class="col-md-2 l_text"><label>Enter Mobile Number</label></div>
					<div class="col-md-3"><input type="text" name="mobile1" class="form-control" maxlength="10" placeholder="New Mobile Number" value="<?php echo $row["mobile_number"]; ?>"></div>
				</div><br>
				<div class="row">
					<div class="col-md-2 l_text"><label>Enter email</label></div>
					<div class="col-md-3"><input type="email" name="email1" class="form-control" placeholder="New Email Id" value="<?php echo $row["email"]; ?>"></div>
				</div><br>
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-2"><button type="submit" name="update" class="form-control btn btn-success">Update My Profile</button></div>
				</div><br><br>
			</form>
		</div>
		<form action="profile_update.php" method="POST">
			<div class="container">
				<div class="row"></div><br><br>
				<div class="row">
					<div class="col-md-9"><Label><h3>Enter New Password below(if you wish to change your passoword)</h3></label></div>
				</div><br>
				<div class="row">
					<div class="col-md-2"><label>New Password</label></div>
					<div class="col-md-5"><input type="password" name="pass1" id="pass1" class="form-control" placeholder="Enter new password" oninput="check_pw()" required /></div>
				</div><br>
				<div class="row">
					<div class="col-md-2"><label>Confirm Password</label></div>
					<div class="col-md-5"><input type="password" name="pass2" id="pass2" class="form-control" placeholder="Enter Confirm Password" oninput="check_pw()" required /></div>
					<div class="col-md-1"><div class="fa fa-check in_vis" id="icon_check"></div></div>
				</div><br>
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-5"><button type="submit" name="password_update" id="password_update" class="btn btn-primary" disabled="true">Change Password</button></div>
				</div>
			</div>
		</form>
		<script>
			function check_pw() {
			  var x = document.getElementById("pass1").value;
			  var y = document.getElementById("pass2").value;
			  if(x==y){
				  document.getElementById("icon_check").style.visibility = "visible";
				  document.getElementById("icon_check").style.color = "green";
				  document.getElementById("password_update").disabled = false;
			  }
			  else if((x=="") && (y=="")){
				  document.getElementById("icon_check").style.visibility = "visible";
				  document.getElementById("icon_check").style.color = "red";
				  document.getElementById("password_update").disabled = true;
			  }
			  else{
				  document.getElementById("icon_check").style.visibility = "visible";
				  document.getElementById("icon_check").style.color = "red";
				  document.getElementById("password_update").disabled = true;
			  }
			  //document.getElementById("demo").innerHTML = "You wrote: " + x;
			}
		</script>
	</body>
</html>
<?php			
		}
	} else {
		echo "0 results";
	}

	mysqli_close($conn);
?>