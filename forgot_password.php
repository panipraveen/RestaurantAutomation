<!-- official project mail page -->
<?php
	require("config.php");
?>
<?php
	session_start();
	include "C:/xampp/htdocs/official_Tybsc_project/mail_function.php";
	$success = "";
	date_default_timezone_set('Asia/Kolkata');
	if(isset($_POST['click_forgot'])){
		$email_id = $_POST['email_id'];
		$_SESSION["email_id_session"] = $email_id;
		$mobile = $_POST['mobile'];

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT id,mobile_number,email,name FROM register WHERE email='$email_id' AND mobile_number='$mobile'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "MATCH FOUND";
				$_SESSION["forgot_id"] = $row["id"];
				//$success = 1;
				
				// sql to delete a record
				$sql = "DELETE FROM otp_expiry WHERE e_mail='".$email_id."'";

				if (mysqli_query($conn, $sql)) {
				  //echo "Record deleted successfully";
				} else {
				  echo "Error deleting record: " . mysqli_error($conn);
				}
				
				
				//generate OTP
				$otp = rand(100000,999999);
				$name = $row["name"];
				
				//send otp
				$mail_status = sendOTP($email_id,$otp,$name);
				
				if($mail_status == 1){
					$result_add = mysqli_query($conn,"INSERT INTO otp_expiry(otp,is_expired,created_at,e_mail) VALUES(".$otp.",0,'".date("Y-m-d H:i:s")."','".$email_id."')");
					//echo $result_add;
					$current_id = mysqli_insert_id($conn);
					//echo $current_id;
					
					
					if(!empty($current_id)){
						$success=1;
					}
					else{
						$error_message = "<h3>Email Does not Exists!</h3>";
						echo $error_message;
					}
				}
			}
		} else {
			echo "<h3>Not a Valid Credentials</h3>";
		}
		$conn->close();
	}
	if(isset($_POST['submit_otp'])){

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT * FROM otp_expiry WHERE otp='".$_POST["otp_user"]."' AND is_expired != 1 AND NOW() <=DATE_ADD(created_at, INTERVAL 15 MINUTE) AND e_mail='".$_SESSION["email_id_session"]."'";
		$result = $conn->query($sql);
		//echo "aklsdjkladlka";
		//echo $result;
		//print_r($result);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				//print_r($result);
				$success = 2;
			}
		} else {
			$success = 1;
			$error_message = "Invalid OTP!";
		}
		$conn->close();
	}
?>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
				background-repeat:round;
				background-attachment: fixed;
			}
		</style>
	</head>
	<body><br>
		<?php if(!empty($error_message)){
				echo $error_message;
		} 
		?>
		<?php if($success == 1){ ?>
			<form action="forgot_password.php" method="POST">
				<div class="container making_straight">
					<div class="row">
						<div class="col-md-8"><label>Enter OTP</label></div>
					</div>
					<div class="row">
						<div class="col-md-2"><h4>Check your Mail for OTP</h4></div>
						<div class="col-md-4"><input type="text" name="otp_user" class="form-control" placeholder="Enter the OTP" required /></div>
					</div>
					<div class="row">
						<div class="col-md-8"><h3>Note: Your OTP will we Valid for only 15 minutes</h3></div>
					</div><br>
					<div class="row">
						<div class="col-md-4"><input type="submit" name="submit_otp" value="submit" class="form-control btn btn-success"/></div>
					</div><br>
				</div>
			</form>
		<?php } else if($success == 2){ header("Location: recovery_pw.php");?>
		<?php }else { ?>
			<form action="forgot_password.php" method="POST">
				<div class="container making_straight">
					<div class="row">
						<div class="col-md-3"><label>Enter Email ID</label></div>
						<div class="col-md-4"><input type="email" name="email_id" class="form-control" placeholder="Enter your Email id" required /></div>
					</div><br>
					<div class="row">
						<div class="col-md-3"><label>Enter Mobile Number</label></div>
						<div class="col-md-4"><input type="text" name="mobile" class="form-control" placeholder="Enter your Mobile Number" maxlength=10 required /></div>
					</div><br>
					<div class="row">
						<div class="col-md-6"><input type="submit" name="click_forgot" class="form-control btn btn-success" value="Submit"/></div>
					</div>
				</div>
			</form>
		<?php } ?>
	</body>
</html>