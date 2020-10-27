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
			.demo_1{
				background-color: #FFDD99;
				//margin: auto;
				//margin-left: 300px;
				margin-top: 50px;
			    //width: 30%;
				height: 20%;
			    border: 3px solid orange;
				border-radius: 20px;
			    padding: 2px;
				text-align: center;
				font-size: 15px;
			}
			.demo_2{
				background-color: #D0F0C0;
				//margin: auto;
				//margin-left: 300px;
				margin-top: 50px;
			    //width: 30%;
				height: 20%;
			    border: 3px solid green;
				border-radius: 20px;
			    padding: 2px;
				text-align: center;
				font-size: 15px;
			}
			.demo_3{
				background-color: #66E6FF;
				//margin: auto;
				//margin-left: 300px;
				margin-top: 50px;
			    //width: 30%;
				height: 20%;
			    border: 3px solid #0080FF;
				border-radius: 20px;
			    padding: 2px;
				text-align: center;
				font-size: 15px;
			}
			.demo_4{
				background-color: #FF99CC;
				//margin: auto;
				//margin-left: 300px;
				margin-top: 50px;
			    //width: 30%;
				height: 20%;
			    border: 3px solid #FF198C;
				border-radius: 20px;
			    padding: 2px;
				text-align: center;
				font-size: 15px;
			}
			.demo_5{
				background-color: #C9FFE5;
				//margin: auto;
				//margin-left: 300px;
				margin-top: 50px;
			    //width: 30%;
				height: 20%;
			    border: 3px solid #1966FF;
				border-radius: 20px;
			    padding: 2px;
				text-align: center;
				font-size: 15px;
			}
			.demo_6{
				background-color: #FFEAE6;
				//margin: auto;
				//margin-left: 300px;
				margin-top: 50px;
			    //width: 30%;
				height: 20%;
			    border: 3px solid #FF9580;
				border-radius: 20px;
			    padding: 2px;
				text-align: center;
				font-size: 15px;
			}
			.demo_7{
				background-color: #D3D3D3;
				//margin: auto;
				//margin-left: 300px;
				margin-top: 50px;
			    //width: 30%;
				height: 20%;
			    border: 3px solid #1A0000;
				border-radius: 20px;
			    padding: 2px;
				text-align: center;
				font-size: 15px;
			}
			.demo_8{
				background-color: #FFB366;
				//margin: auto;
				//margin-left: 300px;
				margin-top: 50px;
			    //width: 30%;
				height: 20%;
			    border: 3px solid #FF7E00;
				border-radius: 20px;
			    padding: 2px;
				text-align: center;
				font-size: 15px;
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
					<div class="row">
						<div class="col-md-3 demo_1"><br>
<?php
	$con = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	$sql="SELECT * FROM paid_order";

	if ($result=mysqli_query($con,$sql))
	  {
	  // Return the number of rows in result set
	  $rowcount=mysqli_num_rows($result);
?>
							<label style="font-size: 30px;">Total orders</label><br>
							<label>Number of Menu that are already Finished</label><br>
							<label style="font-size: 50px;"><?php printf($rowcount); ?></label>
<?php	  
	  // Free result set
	  mysqli_free_result($result);
	  }

	mysqli_close($con);
?>
						</div>
						<div class="col-md-1"></div>
						<div class="col-md-3 demo_2"><br>
<?php
	$con = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	$sql="SELECT * FROM place_order";

	if ($result=mysqli_query($con,$sql))
	  {
	  // Return the number of rows in result set
	  $rowcount=mysqli_num_rows($result);
?>
							<label style="font-size: 30px;">Pending orders</label><br>
							<label>OnGoing Menu Orders</label><br>
							<label style="font-size: 50px"><?php printf($rowcount); ?></label>
						</div>
<?php	  
	  // Free result set
	  mysqli_free_result($result);
	  }

	mysqli_close($con);
?>
<?php
	$con = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	$sql="SELECT * FROM finished_cater";

	if ($result=mysqli_query($con,$sql))
	  {
	  // Return the number of rows in result set
	  $rowcount=mysqli_num_rows($result);
?>
						<div class="col-md-1"></div>
						<div class="col-md-3 demo_3"><br>
							<label style="font-size: 30px;">Total Catering</label><br>
							<label>Finished Orders for any Events</label><br>
							<label style="font-size: 50px"><?php printf($rowcount); ?></label>
						</div>
<?php	  
	  // Free result set
	  mysqli_free_result($result);
	  }

	mysqli_close($con);
?>
					</div>
					<div class="row">
<?php
	$con = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	$sql="SELECT * FROM catering";

	if ($result=mysqli_query($con,$sql))
	  {
	  // Return the number of rows in result set
	  $rowcount=mysqli_num_rows($result);
?>
						<div class="col-md-3 demo_4"><br>
							<label style="font-size: 30px;">OnGoing Catering</label><br>
							<label>onGoing Catering Orders Count</label><br>
							<label style="font-size: 50px"><?php printf($rowcount); ?></label>
						</div>
<?php
	  // Free result set
	  mysqli_free_result($result);
	  }

	mysqli_close($con);
?>
<?php
	$con = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	$sql="SELECT COUNT(*) FROM supplies";

	if ($result=mysqli_query($con,$sql))
	  {
	  // Return the number of rows in result set
	  $rowcount=mysqli_num_rows($result);
?>
						<div class="col-md-1"></div>
						<div class="col-md-3 demo_5"><br>
							<label style="font-size: 30px;">Supplies</label><br>
							<label>Total number of supplies Entered</label><br>
							<label style="font-size: 50px"><?php printf($rowcount); ?></label>
						</div>
<?php
	  // Free result set
	  mysqli_free_result($result);
	  }

	mysqli_close($con);
?>
<?php
	$con = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	$sql="SELECT * FROM feedback";

	if ($result=mysqli_query($con,$sql))
	  {
	  // Return the number of rows in result set
	  $rowcount=mysqli_num_rows($result);
?>
						<div class="col-md-1"></div>
						<div class="col-md-3 demo_6"><br>
							<label style="font-size: 30px;">FeedBacks</label><br>
							<label>Total number of Feedbacks Entered</label><br>
							<label style="font-size: 50px"><?php printf($rowcount); ?></label>
						</div>
<?php
	  // Free result set
	  mysqli_free_result($result);
	  }

	mysqli_close($con);
?>
					</div>
					<div class="row">
<?php
	$con = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	$sql="SELECT * FROM menu_items";

	if ($result=mysqli_query($con,$sql))
	  {
	  // Return the number of rows in result set
	  $rowcount=mysqli_num_rows($result);
?>
						<div class="col-md-3 demo_7"><br>
							<label style="font-size: 30px;">Menu Items</label><br>
							<label>Number of Existing Menu Items</label><br>
							<label style="font-size: 50px"><?php printf($rowcount); ?></label>
						</div>
<?php
	  // Free result set
	  mysqli_free_result($result);
	  }

	mysqli_close($con);
?>
<?php
	$con = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	$sql="SELECT * FROM menu_category";

	if ($result=mysqli_query($con,$sql))
	  {
	  // Return the number of rows in result set
	  $rowcount=mysqli_num_rows($result);
?>
						<div class="col-md-1"></div>
						<div class="col-md-3 demo_8"><br>
							<label style="font-size: 30px;">Menu Category</label><br>
							<label>Category related to Menu Items</label><br>
							<label style="font-size: 50px"><?php printf($rowcount); ?></label>
						</div>
<?php
	  // Free result set
	  mysqli_free_result($result);
	  }

	mysqli_close($con);
?>
<?php
	$con = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	$sql="SELECT * FROM register WHERE role='customer'";

	if ($result=mysqli_query($con,$sql))
	  {
	  // Return the number of rows in result set
	  $rowcount=mysqli_num_rows($result);
?>
						<div class="col-md-1"></div>
						<div class="col-md-3 demo_2"><br>
							<label style="font-size: 30px;">Customers</label><br>
							<label>Number of Registered Customers</label><br>
							<label style="font-size: 50px"><?php printf($rowcount); ?></label>
						</div>
<?php
	  // Free result set
	  mysqli_free_result($result);
	  }

	mysqli_close($con);
?>
<?php
	$con = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	$sql="SELECT * FROM register WHERE role='admin' OR role='manager' OR role='staff'";

	if ($result=mysqli_query($con,$sql))
	  {
	  // Return the number of rows in result set
	  $rowcount=mysqli_num_rows($result);
?>
					</div>
					<div class="row">
						<div class="col-md-3 demo_6"><br>
							<label style="font-size: 30px;">Admins</label><br>
							<label>Number of alloted Admins</label><br>
							<label style="font-size: 50px"><?php printf($rowcount); ?></label>
						</div>
<?php
	  // Free result set
	  mysqli_free_result($result);
	  }

	mysqli_close($con);
?>
					</div>
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