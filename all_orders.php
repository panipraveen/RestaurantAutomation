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
		<style>
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
			table{
				margin-left: 30px;
			}
			.btn_own{
				margin-left: 60px; 
				padding-left: 10px;
				padding-right: 10px;
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
			<table border="2" class="table_work">
				<tr>
					<th>Customer and order Details</th>
					<th>Details</th>
					<th>Menu Items</th>
				</tr>				
<?php
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	
	
	$sql = "SELECT * FROM order_list";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
				echo "<tr style='margin:auto;'>
				<td>Order Id<br>
				Name<br>
				Email and Mobile Number<br>
				Menu Item<br>
				Quantity<br>
				Date<br>
				Time<br>
				Cost
				</td>
			";
				
			$sql_register = "SELECT * FROM register WHERE id='".$row['register_id']."'";
			$result_register = mysqli_query($conn, $sql_register);
			if (mysqli_num_rows($result_register) > 0) {
				// output data of each row
				while($row_register = mysqli_fetch_assoc($result_register)) {
						//  //
											echo "<td>".$row['order_id']."<br>";
											echo $row_register['name']."<br>";
											echo $row_register['email']."&nbsp&&nbsp".$row_register['mobile_number']."&nbsp<br>";
											echo "<form action='all_orders.php' method='POST'>";
											echo "<br><br><button type='submit' name='delete_own_order' class='btn btn-info btn_own' value='".$row['id']."'>Delete Order</button>";
											echo "</form>";
								$sql_place = "SELECT * FROM place_order WHERE order_ref_id='".$row['id']."'";
								$result_place = mysqli_query($conn, $sql_place);
								
								if (mysqli_num_rows($result_place) > 0) {
									// output data of each row
									while($row_place = mysqli_fetch_assoc($result_place)) {
										//asdasdasd
											/*echo $row_place['quans']."<br>";
											echo $row_place['date']."<br>";
											echo $row_place['time']."<br>";
											echo $row_place['added_cost']."<br>";*/
											
														$sql_menu = "SELECT * FROM menu_items WHERE id='".$row_place['menu_items_id']."'";
														$result_menu = mysqli_query($conn, $sql_menu);

														if (mysqli_num_rows($result_menu) > 0) {
															// output data of each row
															while($row_menu = mysqli_fetch_assoc($result_menu)) {
																																
																echo "<td><br><br><br>".$row_menu['food_name']."&nbsp&nbsp<br>";
																echo $row_place['quans']."<br>";
																echo $row_place['date']."<br>";
																echo $row_place['time']."<br>";
																echo "<div style='color:blue'><b>".$row_place['added_cost']."<b></div><br>";
																
															}
														} else {
															echo "menu item errror";
														}
									}					
								} else {
									echo "place error";
								}
				}
			} else {
				echo "register error";
			}
			echo "</td></tr>";
		}
				//echo "</td></tr>";
	} else {
		echo "<h3 style='text-align:center'>No ORDERS</h3>";
	}

	mysqli_close($conn);
?>
			</table>
				

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
<?php
	if(isset($_POST['delete_own_order'])){
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// sql to delete a record
		$sql = "DELETE FROM place_order WHERE order_ref_id='".$_POST['delete_own_order']."'";
		if (mysqli_query($conn, $sql)) {
			
			// sql to delete a record
			$sql_1 = "DELETE FROM order_list WHERE id='".$_POST['delete_own_order']."'";
			if (mysqli_query($conn, $sql_1)) {
				echo "<script>alert('Order Cancelled by admin successfully');window.location.href = '/official_Tybsc_project/all_orders.php';</script>";
			} else {
				echo "i tried my best but still can't" . mysqli_error($conn);
			}			
		} else {
			echo "sorry can't delete " . mysqli_error($conn);
		}

		mysqli_close($conn);
	}
?>