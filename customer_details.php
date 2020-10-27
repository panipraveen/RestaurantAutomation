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
			
			#customer_table{
				margin: auto;
				width:100%;
			}
			.customer_row:hover {background-color:#D0F0C0;}
			
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
		</style>
		<script>
			 $(document).ready(function(){
			   $("#customer_table").dataTable();
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

<?php
	if(isset($_POST["cus_edit"])){
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT * FROM register WHERE id=".$_POST['cus_edit']."";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				
?>
				<form action="customer_details.php" method="POST">
					<div class="container making_straight">
						<div class="form-group">
							<div class="row">
								<div class="col-md-1"><label>Name</label></div>
								<div class="col-md-3"><input type="text" name="cus_name" class="form-control" placeholder="Enter your Name" value="<?php echo $row['name']; ?>" required></div>
								<div class="col-md-1"><label>Email</label></div>
								<div class="col-md-3"><input type="text" name="cus_email" class="form-control" placeholder="Enter your Email" value="<?php echo $row['email']; ?>" required></div>
								<div class="col-md-1"><label>Mobile</label></div>
								<div class="col-md-3"><input type="text" name="cus_mobile" class="form-control" maxlength="10" placeholder="Enter your Mobile Number" value="<?php echo $row['mobile_number']; ?>" required></div>
							</div><br>
							<div class="row">
								<div class="col-md-2"><label>Address </label></div>
								<div class="col-md-6"><textarea name="cus_address" cols="200" class="address1 form-control" placeholder="Enter your address" required><?php echo $row['address']; ?></textarea></div>
								<div class="col-md-1"><label>Role</label></div>
								<div class="col-md-1">
									<select name="cus_role_1">
									  <option value="customer">Customer</option>
									  <option value="admin">Admin</option>
									  <option value="manager">Manager</option>
									  <option value="staff">Staff</option>
									</select>
								</div>
							</div><br>
							<div class="row">
								<div class="col-md-3"><label>Password if you want to Change</label></div>
								<div class="col-md-4"><input type="password" name="cus_password" class="form-control" placeholder="Enter to Change Password"></div>
							</div>
							<div class="row">
								<div class="col-md-5"></div>
								<div class="col-md-3"><button type="submit" name="update_cus" class="form-control btn btn-info" value="<?php echo $row['id']; ?>">Update Profile</button></div>
							</div>
						</div>
					</div>
				</form><br>
<?php
			}
		} else {
			echo "0 results";
		}
		$conn->close();
	}
?>
<?php
	if(isset($_POST["update_cus"])){
		$cus_name = htmlspecialchars($_POST['cus_name']);
		$cus_address = htmlspecialchars($_POST['cus_address']);
		$cus_mobile = htmlspecialchars($_POST['cus_mobile']);
		$cus_email = htmlspecialchars($_POST['cus_email']);
		$cus_role_1 = htmlspecialchars($_POST['cus_role_1']);
		$cus_pw = sha1(htmlspecialchars($_POST['cus_password']));
		
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		if($_POST['cus_password'] != ""){
			$sql = "UPDATE register SET name='".$cus_name."',address='".$cus_address."',password='".$cus_pw."',mobile_number='".$cus_mobile."',email='".$cus_email."',role='".$cus_role_1."' WHERE id='".$_POST['update_cus']."'";
		}else{
			$sql = "UPDATE register SET name='".$cus_name."',address='".$cus_address."',mobile_number='".$cus_mobile."',email='".$cus_email."',role='".$cus_role_1."' WHERE id='".$_POST['update_cus']."'";
		}
		
		if (mysqli_query($conn, $sql)) {
						$sql_admin_reg = "INSERT INTO admin_register(added_id,own_id)VALUES('".$_POST['update_cus']."','".$_SESSION["user_id_session"]."')";
						if (mysqli_query($conn, $sql_admin_reg)) {
							echo "<script>alert('Profile Updated Successfully');window.location.href = '/official_Tybsc_project/customer_details.php';</script>";
						} else {
							echo "Error: " . $sql_admin_reg . "<br>" . mysqli_error($conn);
						}		
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}
		

		mysqli_close($conn);
	}
?>

			
				<div class="container">
					<form action="customer_details.php" method="POST">
						<table id="customer_table" class="table-responsive table-bordered">
							<thead>
							   <tr>
								 <th>Name</th>
								 <th>Address</th>
								  <th>Mobile Number and Email</th>
								  <th>Position</th>
								  <th>Action</th>
							   </tr>
							 </thead>
<?php
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT * FROM register WHERE role='customer'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo "
				<tr class='customer_row'>
					<td>".$row['name']."</td>
					<td>".$row['address']."</td>
					<td>".$row['mobile_number']."<br>".$row['email']."</td>
					<td>".$row['role']."</td>
					<td><button type='submit' class='btn btn-link' name='cus_edit' value='".$row['id']."'>Edit</button>&nbsp<button type='submit' name='cus_delete' class='btn btn-link' value='".$row['id']."'>Delete</button></td>
				</tr>
			";
		}
	} else {
		echo "0 results";
	}

	mysqli_close($conn);
?>							
						 </table>
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
<?php
	if(isset($_POST['cus_delete'])){
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// sql to delete a record
		$sql = "DELETE FROM register WHERE id='".$_POST['cus_delete']."'";

		if ($conn->query($sql) === TRUE) {
			echo "<script>alert('Profile Deleted Successfully');window.location.href = '/official_Tybsc_project/customer_details.php';</script>";
		} else {
			echo "Error deleting record: " . $conn->error;
		}

		$conn->close();
	}
?>