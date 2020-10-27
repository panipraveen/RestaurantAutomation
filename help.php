<?php
	require("customer_navbar.php");
?>
<?php
	require("config.php");
?>
<?php
	// Create connection
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
			.making_straight{
				background-color: #F5F5F5;
				margin: auto;
				//margin-left: 300px;
				margin-top: 50px;
			    width: 80%;
			    border: 5px solid #73AD21;
				border-radius: 20px;
			    padding: 50px;
				text-align: center;
				font-size: 20px;
			}
			.cater_head{
				text-align: center;
				color: white;
			}
			.menu_1{
				height: 200px;
				width: 350px;
			}
			body{
				background-image: url('/official_Tybsc_project/body_background/image_1.jpg');
			}
		</style>
	</head>
	<body>
		<form action="help.php" method="post">
			<h3 class="cater_head">FeedBack</h3>
			<div class="container making_straight">
				<div class="form-group">
					<div class="row">
						<div class="col-md-1"><label>Name</label></div>
						<div class="col-md-3"><input type="text" class="form-control" name="name1" placeholder="Enter your name" value='<?php echo $row["name"] ?>' autofocus required></div>
						<div class="col-md-2"></div>
						<div class="col-md-1"><label>Email</label></div>
						<div class="col-md-3"><input type="email" name="email_1" class="form-control" placeholder="Enter Your Email id" value='<?php echo $row["email"] ?>' required></div>
					</div><br>
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4"><label>Enter your Suggestions Below</label></div>
					</div>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10"><textarea name="message_1" rows="10" cols="50" class="form-control" placeholder="Please Enter your Message here" required>Food was Good</textarea></div>
					</div><br>
					<div class="row">
						<div class="col-md-2"><label>Your Rating</label></div>
						<div class="col-md-1">
							<select name="rate_1">
							  <option value="best">Best</option>
							  <option value="good">Good</option>
							  <option value="worst">Worst</option>
							</select>
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-5"><button type="submit" name="feedback" class="btn btn-success form-control">Thank you</button></div>
					</div>
				</div>
			</div>
		</form>
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
	if(isset($_POST["feedback"])){
		$message_1 = htmlspecialchars($_POST["message_1"]);
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// prepare and bind
		$stmt = $conn->prepare("INSERT INTO feedback (register_id,feedback,rating) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $register_id, $feedback, $rating);

		// set parameters and execute
		$register_id = $_SESSION["user_id_session"];
		$feedback = $message_1;
		$rating = htmlspecialchars($_POST["rate_1"]);
		$stmt->execute();

		echo "<script>alert('We Appriciate your FeedBack');</script>";

		$stmt->close();
		$conn->close();
	}
?>