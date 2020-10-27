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

			.making_straight{
				margin: auto;
				//margin-left: 300px;
				margin-top: 50px;
				width: 80%;
				border: 3px solid #73AD21;
				border-radius: 20px;
				padding: 50px;
				text-align: center;
				font-size: 20px;
			}		
			
			.table_work{
				width: 90%;
				text-align:center;
				margin: auto;
				border: 1px solid black;
				height: 100px;
			}
			th{
				text-align:center;
				border-bottom: 2px solid grey;
			}
			tr:hover{
				background-color:#D0F0C0;
			}
			.btn{
				color: red;
			}
			.note{
				margin-left: 50px;
			}
		</style>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<style>
			body {
				font-family: 'Roboto';
				background: #fafafa;
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
				
				
				
				
					<div class="container making_straight">
						<div class="form-group">
							<div class="w3-container">
							  <h2 style="color:blue;">Add / Update / Remove</h2>

							  <div class="w3-row">
								<a href="javascript:void(0)" onclick="openCity(event, 'London');">
								  <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">ADD</div>
								</a>
								<a href="javascript:void(0)" onclick="openCity(event, 'Paris');">
								  <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Update</div>
								</a>
								<a href="javascript:void(0)" onclick="openCity(event, 'Tokyo');">
								  <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Delete</div>
								</a>
							  </div>

							  <div id="London" class="w3-container city" style="display:none">
								<h2><label>Add Category</label></h2><br>
								<form action="add_category.php" method="Post">
									<div class="row">
										<div class="col-md-4">Enter New Category</div>
										<div class="col-md-4"><input type="text" name="add_cat1" class="form-control" placeholder="Enter New Category" required></div>
									</div><br>
									<div class="row">
										<div class="col-md-3"></div>
										<div class="col-md-3"><button type="submit" name="add_cating" class="btn btn-warning">Add Category</button></div>
									</div>
								</form>
							  </div>

							  <div id="Paris" class="w3-container city" style="display:none">
								<h2><label>Update Category</label></h2><br>
								<form action="add_category.php" method="POST">
									<div class="row">
										<div class="col-md-3"><label>Enter the Name</label></div>
										<div class="col-md-4"><input type="text" name="update_menu_cat" class="form-control" placeholder="Enter the name" required></div>
									</div><br>
									<div class="row">
										<div class="col-md-3"><label>Enter the Category</label></div>
										<div class="col-md-4"><input type="text" name="update_cate" class="form-control" placeholder="Enter the Category" required></div>
									</div><br>
									<div class="row">
										<div class="col-md-3"></div>
										<div class="col-md-3"><button type="submit" name="cate_update" class="btn btn-warning">Update Category</button></div>
									</div>
								</form>
							  </div>

							  <div id="Tokyo" class="w3-container city" style="display:none">
								<h2><label>Remove Category</label></h2><br>
									<label class="note"><b>Note:</b> If you Remove the Category then it's corresponding menu items will also be Removed</label>
									<form action="add_category.php" method="post" enctype="multipart/form-data">
									<?php 
										$sum_count = 0;
										// Create connection
										$conn = mysqli_connect($servername, $username, $password, $dbname);
										// Check connection
										if (!$conn) {
											die("Connection failed: " . mysqli_connect_error());
										}

										$sql = "SELECT * FROM menu_category";
										$result = mysqli_query($conn, $sql);

										if (mysqli_num_rows($result) > 0) {
											echo "<form action='add_category.php' method='POST'>";
											echo "<table class='table_work'>";
											echo "<tr>";
											echo "<th>Sr.no</th>";
											echo "<th>Category</th>";
											echo "<th>Remove Category</th>";
											echo "</tr>";
											// output data of each row
											while($row = mysqli_fetch_assoc($result)) {
												$sum_count = $sum_count + 1;
												echo "<tr>";
												echo "<td>".$sum_count."</td>";
												echo "<td>".$row['category']."</td>";
												echo "<td><button type='submit' class='btn btn-link' name='delete_item' value='".$row['id']."'>Remove</button></td>";
												echo "</tr>";
											}
										} else {
											echo "0 results";
										}
										echo "</table></form>";

										mysqli_close($conn);
									?>
								 </form>
							  </div>
							</div>
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
			<script>
				function openCity(evt, cityName) {
				  var i, x, tablinks;
				  x = document.getElementsByClassName("city");
				  for (i = 0; i < x.length; i++) {
					x[i].style.display = "none";
				  }
				  tablinks = document.getElementsByClassName("tablink");
				  for (i = 0; i < x.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
				  }
				  document.getElementById(cityName).style.display = "block";
				  evt.currentTarget.firstElementChild.className += " w3-border-red";
				}
			</script>
	</body>
</html>
<?php
	if(isset($_POST["delete_item"])){
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT * FROM menu_category WHERE id='".$_POST["delete_item"]."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$sql1 = "DELETE FROM menu_items WHERE category='".$row["category"]."'";
				if ($conn->query($sql1) === TRUE) {
					//echo "Record deleted successfully";
				} else {
					echo "Error deleting record of menu items: " . $conn->error;
				}
				
				$sql2 = "DELETE FROM menu_category WHERE id='".$_POST["delete_item"]."'";
				if ($conn->query($sql2) === TRUE) {
									$sql4 = "SELECT * FROM menu_items WHERE category='".$_POST["delete_item"]."'";
									$result4 = $conn->query($sql4);

									if ($result4->num_rows > 0) {
										// output data of each row
										while($row4 = $result4->fetch_assoc()) {
											unlink("C:/xampp/htdocs/official_Tybsc_project/Images/".$row4["food_image"]);
										}
									} else {
										echo "0 results";
									}
					echo "<script>alert('Category and it's Item Deleted Successfully');window.location.href = '/official_Tybsc_project/add_category.php';</script>";
				} else {
					echo "Error deleting record menu_category: " . $conn->error;
				}
			}
		} else {
			echo "0 results";
		}
		$conn->close();
	}
?>
<?php
	if(isset($_POST["add_cating"])){
		$add_cat1 = $_POST["add_cat1"];
				// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT * FROM menu_category";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				if($row["category"] == $add_cat1){
					echo "<script>alert('Category already Exists');window.location.href = '/official_Tybsc_project/add_category.php';</script>";
					return;
				}
			}
		}
		else {
			echo "0 results";
		}
			$sql2 = "INSERT INTO menu_category (category)
						VALUES ('".$add_cat1."')";

						if ($conn->query($sql2) === TRUE) {
							echo "<script>alert('Category added Succesfully');window.location.href = '/official_Tybsc_project/add_category.php';</script>";
						} else {
							echo "Error: " . $sql2 . "<br>" . $conn->error;
						}
			//echo "<script>alert('i rand');</script>";
			/*$sql = "INSERT INTO MyGuests (firstname, lastname, email)
			VALUES ('John', 'Doe', 'john@example.com')";

			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}*/


		mysqli_close($conn);
	}
?>
<?php
	if(isset($_POST["cate_update"])){
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "UPDATE menu_category SET category='".$_POST['update_cate']."' WHERE category='".$_POST["update_menu_cat"]."'";

		if (mysqli_query($conn, $sql)) {
			$sql2 = "UPDATE menu_items SET category='".$_POST['update_cate']."' WHERE category='".$_POST["update_menu_cat"]."'";
			if (mysqli_query($conn, $sql2)) {
				echo "<script type='text/javascript'>
						alert('Category Updated Successfully');
						window.location.href = '/official_Tybsc_project/add_category.php';
						</script>";
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}

		mysqli_close($conn);
	}
?>