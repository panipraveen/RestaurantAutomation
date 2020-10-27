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
				<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
			   <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
			   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
			   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
			   <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
				<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
				<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css"/>
				<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
				<!-- DataTables CSS -->
				<link href="css/addons/datatables.min.css" rel="stylesheet">
				<!-- DataTables JS -->
				<script src="js/addons/datatables.min.js" type="text/javascript"></script>

				<!-- DataTables Select CSS -->
				<link href="css/addons/datatables-select.min.css" rel="stylesheet">
				<!-- DataTables Select JS -->
				<script src="js/addons/datatables-select.min.js" type="text/javascript"></script>
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
			.table_css{
				margin-left: 30px;
				width:90%;
				height: 300px;
			}
			.table_row:hover {background-color:#D0F0C0;}
		</style>
		<script>
			 $(document).ready(function(){
			   $("#cat_table").dataTable();
			 });
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
						<a href="#">Supplies</a>
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
				
				
<?php
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql_catering = "SELECT * FROM catering";
	$result_catering = mysqli_query($conn, $sql_catering);

	if (mysqli_num_rows($result_catering) > 0) {
?>
					<div class="container">
					<form action="services_admin.php" method="POST">
					<div class="table_css table-responsive">
						<table id="cat_table" class="table-responsive">
						   <thead>
						   <tr>
							 <th>Name</th>
							 <th>Address</th>
							 <th>Contacts</th>
							  <th>City and State</th>
							  <th>Menu</th>
							  <th>Event</th>
							  <th>Quantity</th>
							  <th>registered From</th>
							  <th>Date and Time</th>
							  <th>Status</th>
							  <th>Operation</th>
						   </tr>
						   </thead>
<?php
		// output data of each row
		while($row_catering = mysqli_fetch_assoc($result_catering)) {
				$sql_reg = "SELECT * FROM register WHERE id='".$row_catering['register_id']."'";
				$result_reg = mysqli_query($conn, $sql_reg);

				if (mysqli_num_rows($result_reg) > 0) {
					// output data of each row
					while($row_reg = mysqli_fetch_assoc($result_reg)) {
						
?>
							<tr class="table_row">
						     <td><?php echo $row_catering['name']; ?></td>
						     <td><?php echo $row_catering['address']; ?></td>
						     <td><?php echo $row_catering['contact_1']."<br>".$row_catering['contact_2']."<br>".$row_catering['email']; ?></td>
							 <td><?php echo $row_catering['city']."<br>".$row_catering['state']; ?></td>
							 <td><?php echo $row_catering['menu_list']; ?></td>
							 <td><?php echo $row_catering['event']; ?></td>
							 <td><?php echo $row_catering['quantity']; ?></td>
							 <td><?php echo $row_reg['name']; ?></td>
							 <td><?php echo $row_catering['date']."<br>".$row_catering['time']; ?></td>
							 <td style="color:green;"><?php echo $row_catering['paid']; ?></td>
							 <td><button type='submit' class='btn btn-link' name="confirm_cat" value='<?php echo $row_catering["id"]; ?>'>Confirm</button>
								 <button type='submit' class='btn btn-link' name="finished_cat" value='<?php echo $row_catering["id"]; ?>'>Finished</button>
								 <button type='submit' class='btn btn-link' name="delete_cat" value='<?php echo $row_catering["id"]; ?>'>Delete</button></td>
						   </tr>
<?php
									}
				} else {
					echo "Register";
				}
		}
	} else {
		echo "<h3 align='center'>No Catering Orders</h3><br>";
	}

	mysqli_close($conn);
?>							</table>
							</div>
							</form>
						</div>

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
	if(isset($_POST['confirm_cat'])){
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql_up = "UPDATE catering SET paid='Confirm' WHERE id='".$_POST['confirm_cat']."'";

		if (mysqli_query($conn, $sql_up)) {
			echo "<script>alert('Order Status Updated');window.location.href = '/official_Tybsc_project/services_admin.php';</script>";
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}

		mysqli_close($conn);
	}
?>
<?php
	if(isset($_POST['delete_cat'])){
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// sql to delete a record
		$sql_del = "DELETE FROM catering WHERE id='".$_POST['delete_cat']."'";

		if (mysqli_query($conn, $sql_del)) {
			echo "<script>alert('Order Deleted by Admin');window.location.href = '/official_Tybsc_project/services_admin.php';</script>";
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
		}

		mysqli_close($conn);
	}
?>
<?php
	if(isset($_POST['finished_cat'])){
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql_fini = "SELECT * FROM catering WHERE id='".$_POST['finished_cat']."' AND paid='Confirm'";
		$result_fini = mysqli_query($conn, $sql_fini);

		if (mysqli_num_rows($result_fini) > 0) {
			// output data of each row
			while($row_fini = mysqli_fetch_assoc($result_fini)) {
						$sql_regi = "SELECT * FROM register WHERE id='".$row_fini['register_id']."'";
						$result_regi = mysqli_query($conn, $sql_regi);

						if (mysqli_num_rows($result_regi) > 0) {
							// output data of each row
							while($row_regi = mysqli_fetch_assoc($result_regi)) {
													$sql_fi_in = "INSERT INTO finished_cater(name,contact_1,contact_2,address,city,state,email,date,time,menu_list,event,quantity,register_id,paid)
													VALUES ('".$row_fini['name']."','".$row_fini['contact_1']."','".$row_fini['contact_2']."','".$row_fini['address']."','".$row_fini['city']."','".$row_fini['state']."','".$row_fini['email']."','".$row_fini['date']."','".$row_fini['time']."','".$row_fini['menu_list']."','".$row_fini['event']."','".$row_fini['quantity']."','".$row_fini['register_id']."','".$row_fini['paid']."')";

												if (mysqli_query($conn, $sql_fi_in)) {
													echo "Record Inserted";
												} else {
													echo "Error: " . $sql_fi_in . "<br>" . mysqli_error($conn);
												}
												
												// sql to delete a record
												$sql_fidel = "DELETE FROM catering WHERE id='".$_POST['finished_cat']."'";

												if (mysqli_query($conn, $sql_fidel)) {
													echo "<script>alert('Order Finished');window.location.href = '/official_Tybsc_project/services_admin.php';</script>";
												} else {
													echo "Error deleting record: " . mysqli_error($conn);
												}
												
												
												
												
							}
						} else {
							echo "register error";
						}
				
			}
		} else {
			echo "0 results";
		}

		mysqli_close($conn);
	}
?>