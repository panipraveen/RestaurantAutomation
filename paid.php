<?php
	require("customer_navbar.php");
	if($_SESSION["user_role_session"]!="admin" && $_SESSION["user_role_session"]!="manager"){
		echo "<script>window.location.href = '/official_Tybsc_project/wrong.php';</script>";
	}
?>
<?php
	require("config.php");
?>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=0.5">
		<style>
			.order_head{
				color: darkgreen;
			}
			.btn_start{
				text-align:center;
				//margin-top: 25px;
				//margin-left: 450px;
			}
			.btn_total{
				border-radius: 6px;
				//margin-top: 25px;
				//margin-left: 500px;
				padding-right: 40px;
				padding-left: 40px;
				align-content: center;
			}
			.btn_report{
				border-radius: 6px;
				align-content: center;
				padding-right: 40px;
				padding-left: 40px;
				margin-top: 25px;
				margin-left: 100px;
			}
			table {
			  border-collapse: collapse;
			  width: 70%;
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
			
			
			
			
		</style>
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
				
				<div class="container">
					<div class="row"><h1 align="center" class="order_head"><u>Total Orders</u></h1></div><br>
					<form action="paid.php" method="POST">
						<div class="row btn_start">
							<label>Enter Starting Date:-</label>
							<input type="date" name="start_date"/>
						</div>
						<div class="row"> &nbsp </div>
						<div class="row btn_start">
							<label>Enter Ending Date:-&nbsp </label>
							<input type="date" name="end_date"/>
						</div>
						<div class="row"> &nbsp </div>
						<div class="row btn_start">
							<button type="submit" name="Total_order" class="btn-success btn_total">Fetch All Orders</button>
						</div>
					</form>
					<div class="row"> &nbsp </div>
					<div class="row"> &nbsp </div>
					<div class="row"> &nbsp </div>
					<form action="report.php" method="POST">
						<div class="row btn_start">
							<label>Enter Starting Date:-</label>
							<input type="date" name="start_date_report"/>
						</div>
						<div class="row"> &nbsp </div>
						<div class="row btn_start">
							<label class="btn_start">Enter Ending Date:-&nbsp </label>
							<input type="date" name="end_date_report"/>
						</div>
						<div class="row"> &nbsp </div>
						<div class="row btn_start">
							<button type="submit" name="gen_report" class="btn-info btn_total">Generate Report</button>
						</div>
					</form>
				</div>
<?php
	//Offline
/*	if(isset($_POST['Total_order'])){
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];
		$current_date = date("Y-m-d");

		$con_total = mysqli_connect($servername, $username, $password, $dbname);
		if (!$con_total) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT order_id,table_no,food_name,quantity,cost,date,time FROM counter WHERE date BETWEEN '" . $start_date . "' AND  '" . $end_date . "' AND payment='paid' ORDER by order_id ASC";
		$result = mysqli_query($con_total, $sql);
		
		echo '<table align="center">
			<caption style="text-align:center;color:red;"><b><u>Total Orders(OFFLINE)</u></b></caption>
			<tr>
				<th colspan=2 style="text-align:center">List of Orders(OFFLINE)</th>
			</tr>';
		if(($start_date <=$current_date) && ($end_date <= $current_date)){
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					echo "
					<tr>
						<td>
							Order id<br>
							Table no<br>
							Food Ordered<br>
							Quantity<br>
							date<br>
							Time<br>
							Cost
						</td>
						<td>
							".$row['order_id']."<br>
							".$row['table_no']."<br>
							".$row['food_name']."<br>
							".$row['quantity']."<br>
							".$row['date']."<br>
							".$row['time']."<br>
							<div style='color:green'><b>₹&nbsp".$row['cost']."</b></div><br>
						</td>
					</tr>";
				}
			}
			else{
				echo "No Record of Orders Between the Dates";
			}
		}
		else{
			echo "date exceeding current date";
			echo $start_date;
			echo $end_date;
		}
		echo "</table>";
		mysqli_close($con_total);
	}
	
	echo "<br><br><br><br><br>";
	*/
	
	//Online
	if(isset($_POST['Total_order'])){
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];
		$current_date = date("Y-m-d");

		$con_total = mysqli_connect($servername, $username, $password, $dbname);
		if (!$con_total) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT * FROM paid_order WHERE date BETWEEN '" . $start_date . "' AND  '" . $end_date . "' ORDER by id ASC";
		$result = mysqli_query($con_total, $sql);
		

		if(($start_date <=$current_date) && ($end_date >= $current_date)){	
				echo '<table align="center">
					<caption style="text-align:center;color:blue;"><b><u>Total Orders</u></b></caption>
					<tr>
						<th colspan=2 style="text-align:center">List of Orders</th>
					</tr>';
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
						echo "
							<tr>
								<td>
									Order id<br>
									name<br>
									Email & Mobile Number<br>
									name & Category<br>
									Quantity<br>
									Date<br>
									Time<br>
									Cost
								</td>";
								$sql_register = "SELECT * FROM register WHERE id='".$row["register_id"]."'";
								$result_register = mysqli_query($con_total, $sql_register);

								if (mysqli_num_rows($result_register) > 0) {
									// output data of each row
									while($row_register = mysqli_fetch_assoc($result_register)) {
															$sql_menu = "SELECT * FROM menu_items WHERE id='".$row["menu_items_id"]."'";
															$result_menu = mysqli_query($con_total, $sql_menu);

															if (mysqli_num_rows($result_menu) > 0) {
																// output data of each row
																while($row_menu = mysqli_fetch_assoc($result_menu)) {
																	echo "
																		<td><br>
																			".$row['order_id']."<br>
																			".$row_register['name']."<br>
																			".$row_register['email']."&nbsp & &nbsp".$row_register['mobile_number']."<br>
																			".$row_menu['food_name']."&nbsp & &nbsp".$row_menu['category']."<br>
																			".$row['quantity']."<br>
																			".$row['date']."<br>
																			".$row['time']."<br>
																			<div style='color:green'><b>₹&nbsp".$row['cost']."</b></div><br>
																		</td>
																	</tr>";	
																}
															} else {
																echo "menu Error";
															}
									}
								} else {
									//echo "Register Error";
								}
				}
			}
			else{
				echo "No Record of Orders Between the Dates";
			}
		}
		else{
			echo "date exceeding current date<br>";
			echo "Your start date was: ".$start_date."<br>";
			echo "Your End Date was: ".$end_date."<br>";
		}
		echo "</table>";
		mysqli_close($con_total);
	}
?>

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