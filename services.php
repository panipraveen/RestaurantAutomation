<?php
	require("config.php");
?>
<?php
	//require("config.php");
	require("customer_navbar.php");
	date_default_timezone_set('Asia/Kolkata');
?>
<?php
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT * FROM menu_items";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
?>
<?php			
		}
	} else {
		echo "0 results";
	}

	mysqli_close($conn);
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
				color: white;
				text-align: center;
				font-size: 40px;
			}
			.menu1{
				width: 120%;
				height: 30%;
			}
			.event1{
				width: 90%;
				height: 20%;
			}
			#cater_modal{
				border-radius: 10px;
				//text-align: right;
				position: absolute;
				right: 200px;
			}
			table{
				border: 5px solid red;
			}
			body{
				background-image: url('/official_Tybsc_project/body_background/image_1.jpg');
				background-attachment: fixed;
			}
		</style>
	</head>
	<body><br>
												<div class="container">
												  <!-- Trigger the modal with a button -->
												  <button type="button" class="btn btn-warning btn-lg" id="cater_modal" data-toggle="modal" data-target="#myModal"><i class="fas fa-align-right"></i>Catering Orders</button>
												  <!-- Modal -->
												  <div class="modal fade" id="myModal" role="dialog">
													<div class="modal-dialog modal-lg">
													
													  <!-- Modal content-->
													  <div class="modal-content">
														<div class="modal-header">
														  <button type="button" class="close" data-dismiss="modal">&times;</button>
														  <h4 class="modal-title">Your Orders</h4>
														</div>
														<div class="modal-body table-responsive">
														<form action="services.php" method="POST">
<?php
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql_cater = "SELECT * FROM catering WHERE register_id='".$_SESSION["user_id_session"]."'";
	$result_cater = mysqli_query($conn, $sql_cater);

	if (mysqli_num_rows($result_cater) > 0) {
?>
														<table class="table table-bordered">
																<tr>
																	<th>name</th>
																	<th>contacts</th>
																	<th>address</th>
																	<th>city</th>
																	<th>state</th>
																	<th>email</th>
																	<th>menu</th>
																	<th>event</th>
																	<th>quantity</th>
																	<th>Date and Time</th>
																	<th>Status</th>
																	<th>Operation</th>
																</tr>
<?php
		// output data of each row
		while($row_cater = mysqli_fetch_assoc($result_cater)) {
?>

																	<tr>
																		<td><?php echo $row_cater['name']; ?></td>
																		<td><?php echo $row_cater['contact_1']."<br>".$row_cater['contact_2']; ?></td>
																		<td><?php echo $row_cater['address']; ?></td>
																		<td><?php echo $row_cater['city']; ?></td>
																		<td><?php echo $row_cater['state']; ?></td>
																		<td><?php echo $row_cater['email']; ?></td>
																		<td><?php echo $row_cater['menu_list']; ?></td>
																		<td><?php echo $row_cater['event']; ?></td>
																		<td><?php echo $row_cater['quantity']; ?></td>
																		<td><?php echo $row_cater['date']."<br>".$row_cater['time']; ?></td>
																		<td style="color:green"><?php echo $row_cater['paid']; ?></td>
																		<td><button type="submit" name="cancel_cater" class="btn btn-danger" value='<?php echo $row_cater['id']; ?>'>Cancel</button></td>
																	</tr>
															
<?php			
		}
	} else {
		echo "NO ORDERS FOUND";
	}

	mysqli_close($conn);
?>
															</table></form>
														</div>
														<div class="modal-footer">
														  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
														</div>
													  </div>
													  
													</div>
												  </div>  
												</div>
												
												
												
		<br>
		<form action="services.php" method="post">
			<h3 class="cater_head">Catering Service Details</h3>
			<div class="container making_straight">
				<div class="form-group">
					<div class="row">
						<div class="col-md-1"><label>Name</label></div>
						<div class="col-md-3"><input type="text" class="form-control" name="name1" placeholder="Enter your name" autofocus required></div>
						<div class="col-md-2"></div>
						<div class="col-md-1"><label>Contact</label></div>
						<div class="col-md-2"><input type="text" class="form-control" name="contact1" placeholder="Contact_1" maxlength="10" required></div>
						<div class="col-md-1"><label>/</label></div>
						<div class="col-md-2"><input type="text" class="form-control" name="contact2" placeholder="Contact_2" maxlength="10" required></div></div>
					</div><br>
					<div class="row">
						<div class="col-md-3"><label>Street Address:-</label></div>
					</div>
					<div class="row">
						<div class="col-md-12"><input type="text" class="form-control" name="address1" placeholder="Enter the Address" required></div>
					</div><br>
					<div class="row">
						<div class="col-md-1"><label>City</label></div>
						<div class="col-md-3"><input type="text" name="city1" class="form-control" placeholder="Enter City" required></div>
						<div class="col-md-1"><label>State</label></div>
						<div class="col-md-3"><input type="text" name="state1" class="form-control" placeholder="Enter State" required></div>
						<div class="col-md-1"><label>Email</label></div>
						<div class="col-md-3"><input type="email" name="email1" class="form-control" placeholder="Enter email" required></div>
					</div><br>
					<div class="row">
						<div class="col-md-1"><label>Day/Date</label></div>
						<div class="col-md-3"><input type="date" class="form-control" name="date1" placeholder="Choose date" required></div>
						<div class="col-md-2"></div>
						<div class="col-md-3"><label>Requested Delivery Time</label></div>
						<div class="col-md-3"><input type="time" class="form-control" name="time1" required></div>
					</div><br>
					<div class="row">
						<div class="col-md-1"><label>Menu list:</label></div>
							<div class="col-md-4">
								<!--<form action="multiple_drop_down_list.php" method="POST">-->
									<select id="menus" name="menus[]" class="menus" multiple>
										<?php
											// Create connection
											$conn = mysqli_connect($servername, $username, $password, $dbname);
											// Check connection
											if (!$conn) {
												die("Connection failed: " . mysqli_connect_error());
											}

											$sql = "SELECT * FROM menu_items";
											$result = mysqli_query($conn, $sql);

											if (mysqli_num_rows($result) > 0) {
												// output data of each row
												while($row = mysqli_fetch_assoc($result)) {
										?>
											<option value="<?php echo $row['food_name']; ?>"><?php echo $row['food_name']; ?>(<?php echo $row['cost']; ?>)</option>
										<?php
												}
											} else {
												echo "0 results";
											}

											mysqli_close($conn);
										?>
									</select></div>
										<div class="col-md-1"><button type="button" name="add_sub" class="btn btn-warning" onclick="myFunction()">Add</button></div>
									<!--</form>-->
										<div class="col-md-5"><textarea name="menu1" id="menu1" class="menu1" col="100" placeholder="Select menu and click on Add button to enter menu here"></textarea></div>
						</div><br>
						<div class="row">
							<div class="col-md-12"><label>Your have No idea about menu? No Problem tell me your group's profile as well as your event and we will contact you About it</label></div>
						</div>
						<div class="row">
							<div class="col-md-12"><textarea name="event1" id="event1" class="event1 form-control" col="100" placeholder="Event Details"></textarea></div>
						</div><br>
						<div class="row">
							<div class="col-md-4"><label>Quantity(Number Of Plates)</label></div>
							<div class="col-md-4"><input type="text" name="quantity1" class="form-control" placeholder="Enter Quantity" maxlength="5" required></div>
						</div><br>
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-3"><button type="submit" name="place_cater" class="btn btn-info form-control">Submit Order</button></div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</body>
</html>
<script>
	function myFunction() {
		var inputVal = document.getElementById("menus").value;
		//inputVal.forEach
		//{
			document.getElementById("menu1").innerHTML += inputVal+",\n";
		//}
		//document.getElementById("menu1").innerHTML = inputVal;
	}
</script>
<?php
	if(isset($_POST['place_cater'])){
		$name1 = htmlspecialchars($_POST['name1']);
		$contact1 = htmlspecialchars($_POST['contact1']);
		$contact2 = htmlspecialchars($_POST['contact2']);
		$address1 = htmlspecialchars($_POST['address1']);
		$city1 = htmlspecialchars($_POST['city1']);
		$state1 = htmlspecialchars($_POST['state1']);
		$email1 = htmlspecialchars($_POST['email1']);
		$date1 = htmlspecialchars($_POST['date1']);
		$time1 = htmlspecialchars($_POST['time1']);
		$menu1 = htmlspecialchars($_POST['menu1']);
		$event1 = htmlspecialchars($_POST['event1']);
		$quantity1 = htmlspecialchars($_POST['quantity1']);
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "INSERT INTO catering(name,contact_1,contact_2,address,city,state,email,date,time,menu_list,event,quantity,register_id,paid)
				VALUES ('$name1','$contact1','$contact2','$address1','$city1','$state1','$email1','$date1','$time1','$menu1','$event1','$quantity1','".$_SESSION["user_id_session"]."','pending')";

		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('catering Order placed');window.location.href = '/official_Tybsc_project/services.php';</script>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
	}
?>
<?php
	if(isset($_POST['cancel_cater'])){
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// sql to delete a record
		$sql = "DELETE FROM catering WHERE id='".$_POST['cancel_cater']."' AND register_id='".$_SESSION["user_id_session"]."'";

		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Catering Order Deleted Successfully');window.location.href = '/official_Tybsc_project/services.php';</script>";
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
		}

		mysqli_close($conn);
	}
?>
<?php
	include "footer.php";
?>