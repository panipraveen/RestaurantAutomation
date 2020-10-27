<?php
	require("customer_navbar.php");
	if($_SESSION["user_role_session"]!="admin" && $_SESSION["user_role_session"]!="manager"){
		echo "<script>window.location.href = '/official_Tybsc_project/wrong.php';</script>";
	}
?>
<?php
	require("config.php");
?>
<?php
	if(isset($_POST['pay'])){
		$to_change = $_POST['pay'];  
		
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT * FROM order_list WHERE id='".$to_change."'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
						$sql_place = "SELECT * FROM place_order WHERE order_ref_id='".$to_change."'";
						$result_place = mysqli_query($conn, $sql_place);
						if (mysqli_num_rows($result_place) > 0) {
							// output data of each row
							while($row_place = mysqli_fetch_assoc($result_place)) {
										$sql_paid = "INSERT INTO paid_order(order_id,register_id,menu_items_id,cost,quantity,payment,date,time)VALUES ('".$row["order_id"]."','".$row["register_id"]."','".$row_place["menu_items_id"]."','".$row_place["added_cost"]."','".$row_place["quans"]."','".$row_place["payment"]."','".$row_place["date"]."','".$row_place["time"]."')";
										
										if (mysqli_query($conn, $sql_paid)) {
											echo "Added Successfully";
										} else {
											echo "Error: " . $sql_paid . "<br>" . mysqli_error($conn);
										}
							}
						} else {
							echo "place order error 0 results";
						}
										// sql to delete a record
										$sql_delete = "DELETE FROM place_order WHERE order_ref_id='".$to_change."'";

										if (mysqli_query($conn, $sql)) {
											// sql to delete a record
											$sql = "DELETE FROM order_list WHERE id='".$to_change."'";
											if (mysqli_query($conn, $sql)) {
												echo "<script>alert('Order Successfully Finished');window.location.href = '/official_Tybsc_project/counter.php';</script>";
											} else {
												echo "order list delete error " . mysqli_error($conn);
											}

										} else {
											echo "place order delete error: " . mysqli_error($conn);
										}

			}
		} else {
			echo "order list error 0 results";
		}

		mysqli_close($conn);
	}
	






/*	
	if(isset($_POST['online_pay'])){
		$to_change = $_POST['online_pay'];  
		
		$con_paid = mysqli_connect($servername, $username, $password, $dbname);
		if (!$con_paid) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "UPDATE online_counter SET payment='paid' WHERE order_id='".$to_change."'";

		if (mysqli_query($con_paid, $sql)) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . mysqli_error($con_paid);
		}

		mysqli_close($con_paid);
	}*/
?>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			table {
			  border-collapse: collapse;
			  width: 100%;
			  <!--padding: 0px 0px 0px 100px;-->
			}

			th, td {
			  padding: 8px;
			  text-align: left;
			  border-bottom: 2px solid #ddd;
			}

			tr:hover {background-color:#D0F0C0;}
			
			
			
			
			
			
			@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";


			body {
				font-family: 'Roboto';
				background: #fafafa;
			}

			p {
				font-family: 'Poppins', sans-serif;
				font-size: 1.1em;
				font-weight: 300;
				line-height: 1.7em;
				color: #999;
			}

			a, a:hover, a:focus {
				border-radius: 10px;
				color: inherit;
				text-decoration: none;
				transition: all 0.3s;
			}

			.navbar_admin_work {
				padding: 15px 10px;
				background: #fff;
				border: none;
				border-radius: 0;
				margin-bottom: 40px;
				box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
			}

			.navbar-btn {
				box-shadow: none;
				outline: none !important;
				border: none;
			}

			.line {
				width: 100%;
				height: 1px;
				border-bottom: 1px dashed #ddd;
				margin: 40px 0;
			}

			/* ---------------------------------------------------
				SIDEBAR STYLE
			----------------------------------------------------- */

			.wrapper {
				display: flex;
				width: 100%;
				align-items: stretch;
				perspective: 1500px;
			}


			#sidebar {
				min-width: 250px;
				max-width: 250px;
				background: #292b2c;
				color: #fff;
				transition: all 0.6s cubic-bezier(0.945, 0.020, 0.270, 0.665);
				transform-origin: bottom left;
			}

			#sidebar.active {
				margin-left: -250px;
				transform: rotateY(100deg);
			}

			#sidebar .sidebar-header {
				padding: 20px;
				background: black;
			}

			#sidebar ul.components {
				padding: 20px 0;
				border-bottom: 1px solid #47748b;
			}

			#sidebar ul p {
				color: #fff;
				padding: 10px;
			}

			#sidebar ul li a {
				color: orange;
				padding: 10px;
				font-size: 1.1em;
				display: block;
			}
			#sidebar ul li a:hover {
				color: #7386D5;
				background: #fff;
			}

			#sidebar ul li.active > a, a[aria-expanded="true"] {
				color: #fff;
				background: #6d7fcc;
			}


			a[data-toggle="collapse"] {
				position: relative;
			}

			.dropdown-toggle::after {
				display: block;
				position: absolute;
				top: 50%;
				right: 20px;
				transform: translateY(-50%);
			}

			ul ul a {
				font-size: 0.9em !important;
				padding-left: 30px !important;
				background: #6d7fcc;
			}

			ul.CTAs {
				padding: 20px;
			}

			ul.CTAs a {
				text-align: center;
				font-size: 0.9em !important;
				display: block;
				border-radius: 5px;
				margin-bottom: 5px;
			}

			a.download {
				background: #fff;
				color: #7386D5;
			}

			a.article, a.article:hover {
				background: #6d7fcc !important;
				color: #fff !important;
			}



			/* ---------------------------------------------------
				CONTENT STYLE
			----------------------------------------------------- */
			#content {
				width: 100%;
				padding: 20px;
				min-height: 100vh;
				transition: all 0.3s;
			}

			#sidebarCollapse {
				width: 40px;
				height: 40px;
				background: #f5f5f5;
				cursor: pointer;
			}

			#sidebarCollapse span {
				width: 80%;
				height: 2px;
				margin: 0 auto;
				display: block;
				background: #555;
				transition: all 0.8s cubic-bezier(0.810, -0.330, 0.345, 1.375);
				transition-delay: 0.2s;
			}

			#sidebarCollapse span:first-of-type {
				transform: rotate(45deg) translate(2px, 2px);
			}
			#sidebarCollapse span:nth-of-type(2) {
				opacity: 0;
			}
			#sidebarCollapse span:last-of-type {
				transform: rotate(-45deg) translate(1px, -1px);
			}


			#sidebarCollapse.active span {
				transform: none;
				opacity: 1;
				margin: 5px auto;
			}


			/* ---------------------------------------------------
				MEDIAQUERIES
			----------------------------------------------------- */
			@media (max-width: 768px) {
				#sidebar {
					margin-left: -250px;
					transform: rotateY(90deg);
				}
				#sidebar.active {
					margin-left: 0;
					transform: none;
				}
				#sidebarCollapse span:first-of-type,
				#sidebarCollapse span:nth-of-type(2),
				#sidebarCollapse span:last-of-type {
					transform: none;
					opacity: 1;
					margin: 5px auto;
				}
				#sidebarCollapse.active span {
					margin: 0 auto;
				}
				#sidebarCollapse.active span:first-of-type {
					transform: rotate(45deg) translate(2px, 2px);
				}
				#sidebarCollapse.active span:nth-of-type(2) {
					opacity: 0;
				}
				#sidebarCollapse.active span:last-of-type {
					transform: rotate(-45deg) translate(1px, -1px);
				}

			}
			
			
			
			
			
			.btn_paid{
				margin-top: 25px;
				margin-left: 35px;
				border-radius: 10px;
				width: 40%;
				height: 60px;
			}
		</style>
		<script>
			/*setInterval("yourAjaxCall_offline()",1000);
			function yourAjaxCall_offline(){
			  var xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				  document.getElementById("demo_offline").innerHTML = this.responseText;
				}
			  };
			  xhttp.open("POST", "counter_retrive_offline.php", true);
			  xhttp.send();
			}*/
			
			setInterval("yourAjaxCall_online()",1000);
			function yourAjaxCall_online(){
			  var xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				  document.getElementById("demo_online").innerHTML = this.responseText;
				}
			  };
			  xhttp.open("POST", "online_counter.php", true);
			  xhttp.send();
			}
		</script>
	</head>
	<body>
	
	
		<div class="wrapper">
        <!-- Sidebar Holder -->
			<nav id="sidebar">
				<div class="sidebar-header">
					<h3><a href="dashboard.php" style="color:red;">Dashboard</a></h3>
				</div>

				<ul class="list-unstyled components left_navbar_components">
					</li>
					<li>
						<a href="menu_modification.php">Menu Operations</a>
						<ul>
							<li><a href="add_menu.php">Add Menu</a></li>
						</ul><br>
						<ul>
							<li><a href="add_category.php">Add/Remove Category</a></li>
						</ul>
					</li>
					<li>
						<a href="services_admin.php">Services</a>
					</li>
					<li>
						<a href="finished_services_admin.php">Finished Services</a>
					</li>
					<li>
						<a href="all_orders.php">All Orders</a>
					</li>
					<li>
						<a href="employee_details.php">Details Of Employee</a>
					</li>
					<li>
						<a href="customer_details.php">Customer Details</a>
					</li>
					<li>
						<a href="counter.php">Counter and Report</a>
					</li>
					<li>
						<a href="paid.php">Paid and Report</a>
					</li>
					<li>
						<a href="admin_registration.php"><span class="fas fa-user-plus"></span>&nbsp&nbspAdmin Registration</a></a>
					</li>
					<li>
						<a href="supplies.php">Supplies</a>
					</li>
					<li>
						<a href="feedback.php">FeedBacks</a>
					</li>
				</ul>
				<label style="padding-left:30px;font-size:18px;"> Developed By Praveen</label>
			</nav>

			<!-- Page Content Holder -->
			<div id="content">

				<nav class="navbar navbar-expand-lg navbar-light bg-light navbar_admin_work">
					<div class="container-fluid">

						<button type="button" id="sidebarCollapse" class="navbar-btn">
							<span></span>
							<span></span>
							<span></span>
						</button>

						
					</div>
				</nav>
				
				<form action="paid.php">
					<button type="submit" name="paid" class="btn-success btn_paid"><b>Total Finished Orders<b></button><button type="submit" name="report" class="btn-info btn_paid"><b>Report Generation<b></button>
				</form><br><br><br>
				<!--<form action="counter.php" method="POST">
					<div id="demo_offline"></div>
				</form>-->
				<form action="counter.php" method="POST">
					<div id="demo_online"></div>
				</form>

			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function () {
				$('#sidebarCollapse').on('click', function () {
					$('#sidebar').toggleClass('active');
					$(this).toggleClass('active');
				});
			});
			</script>
	
	</body>
</html>
