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
			    width: 75%;
			    border: 3px solid #73AD21;
				border-radius: 20px;
			    padding: 50px;
				text-align: center;
				font-size: 20px;
			}
			body{
				background-image: url('/official_Tybsc_project/body_background/image_6.jpg');
				background-attachment: fixed;
				background-repeat:round;
			}
		</style>
	</head>
	<body class="align_all">
	<br><br>
		<form action="Registration.php" method="post">
			<div class="container making_straight">
				<div class="form-group">
					<div class="row">
						<div class="col-md-3"><label>Name</label></div>
						<div class="col-md-5"><input type="text" class="form-control" name="nm" placeholder="Enter your name" required></div>
					</div><br>
					<div class="row">
						<div class="col-md-3"><label>Address</label></div>
						<div class="col-md-5"><textarea rows="4" cols="13" class="form-control" name="addr" placeholder="Enter your address" required></textarea></div>
					</div><br>
					<div class="row">
						<div class="col-md-3"><label>Password</label></div>
						<div class="col-md-5"><input type="password" class="form-control" name="pwd" placeholder="Enter your password" required></div>
					</div><br>
					<div class="row">
						<div class="col-md-3"><label>Mobile Number</label></div>
						<div class="col-md-5"><input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter your mobile number" maxlength="10" required></div>
					</div><br>
					<div class="row">
						<div class="col-md-3"><label>email</label></div>
						<div class="col-md-5"><input type="email" class="form-control" name="eml" placeholder="Enter your email" required></div>
					</div><br>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-4"><input type="submit" class="form-control btn-success" name="register" value="Register"></div>
					</div>
				</div>
			</div>
		</form>
		<!--<script>
			function validate_mobile(){
					//document.getElementById('my_text').innerHTML="I am Working";
					var mobile_val = document.getElementById('mobile_number').value;
					if(preg_match('/^[0-9]{10}+$/',mobile_val)){
						return document.getElementById('my_text').innerHTML = "<i class='fa fa-check' aria-hidden='true' style='color:green'></i>";
				}
				else{
						return document.getElementById('my_text').innerHTML = "Number is Invalid";
				}
			}
		</script>-->
	</body>
</html>

<?php
	if(isset($_POST['register'])){

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		//retriving values
		$name=mysqli_real_escape_string($conn,$_POST['nm']);
		$address=mysqli_real_escape_string($conn,$_POST['addr']);
		$pass=sha1(mysqli_real_escape_string($conn,$_POST['pwd']));
		$mobile_number=mysqli_real_escape_string($conn,$_POST['mobile_number']);
		$email=mysqli_real_escape_string($conn,$_POST['eml']);
		

		$sql = "INSERT INTO register(name,address,password,mobile_number,email,role) VALUES ('$name','$address','$pass','$mobile_number','$email','customer')";

		if (mysqli_query($conn, $sql)) {
			echo "<script type='text/javascript'>
					alert('Profile Created Sucessfully');
					window.location.href = 'login.php';
					</script>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
	}
?>