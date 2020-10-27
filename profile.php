<?php
	require("customer_navbar.php");
	date_default_timezone_set('Asia/Kolkata');
?>
<?php
	require("config.php");
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
			.profile_img{
				width: 130px;
				height: 130px;
				border-radius: 200px;
			}
			.text_work{
				font-size: 40px;
				text-transform: uppercase;
				color: orange;
			}
			.big_size{
				font-size: 30px;
			}
			.profile_work{
				color: red;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-3 profile_work"><h3><label><u>Your Profile</u></label></h3></div>
			</div>
			<div class="row">
				<div class="col-md-2"><img src="/official_Tybsc_project/profile_image/profile_pic.png" class="profile_img"></div><br><br>
				<div class="col-md-4 text_work"><label><?php echo $_SESSION["user_session"]; ?></label></div>
				<div class="col-md-3"><button type="button" class="btn btn-success" name="edit_profile" onclick="window.location.href='profile_update.php'"><i class="far fa-edit"></i>Edit Profile</button></div>
			</div><br>
			<div class="row">
				<div class="col-md-3 big_size"><label><u>Username:</u></label></div>
				<div class="col-md-3 big_size"><label><?php echo $row["name"]; ?></label></div>
			</div>
			<div class="row">
				<div class="col-md-3 big_size"><label><u>Address:</u></label></div>
				<div class="col-md-3 big_size"><label><?php echo $row["address"]; ?></label></div>
			</div><br>
			<div class="row">
				<div class="col-md-3 big_size"><label><u>Mobile Number:</u></label></div>
				<div class="col-md-3 big_size"><label><?php echo $row["mobile_number"]; ?></label></div>
			</div>
			<div class="row">
				<div class="col-md-3 big_size"><label><u>Email:</u></label></div>
				<div class="col-md-3 big_size"><label><?php echo $row["email"]; ?></label></div>
			</div>
		</div>
	</body>
</html>
<?php			
		}
	} else {
		echo "0 results";
	}

	mysqli_close($conn);
?>
<?php
	//include "footer.php";
?>