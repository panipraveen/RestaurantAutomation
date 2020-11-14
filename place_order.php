<?php
	include("customer_navbar.php");
	date_default_timezone_set('Asia/Kolkata');
?>
<?php
	require("config.php");
?>
<?php
	if(isset($_POST['check_all'])){
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		$order_id = (microtime(true) * 10000) + rand(1000,999);
		
		$sql = "INSERT INTO order_list(order_id,register_id)VALUES('".$order_id."','".$_SESSION["user_id_session"]."')";
		
		if (mysqli_query($conn, $sql)) {
			$last_id_order = mysqli_insert_id($conn);
			//echo "I AM INSERTED";
			}else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
			
			
			$sql_1 = "SELECT * FROM order_list WHERE register_id='".$_SESSION["user_id_session"]."' AND id='".$last_id_order."'";
			$result_1 = $conn->query($sql_1);
			if ($result_1->num_rows > 0) {
				// output data of each row
				while($row_1 = $result_1->fetch_assoc()) {
					$sql_2 = "SELECT * FROM add_cart WHERE register_id='".$_SESSION["user_id_session"]."'";
					$result_2 = $conn->query($sql_2);
					if ($result_2->num_rows > 0) {
						// output data of each row
						while($row_2 = $result_2->fetch_assoc()) {
							$sql_3 = "INSERT INTO place_order(order_ref_id,menu_items_id,added_cost,quans,payment,date,time)VALUES('".$row_1["id"]."','".$row_2["menu_items_id"]."','".$row_2["added_cost"]."','".$row_2["quans"]."','notpaid','".date("Y/m/d")."','".date("h:i:s")."')";	
							if (mysqli_query($conn, $sql_3)) {
								//echo "New record created successfully";
							} else {
								echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}
						}
					} else {
						echo "inner loop no results";
					}
				}
			} else {
				echo "No Orders Found";
			}
			
			$delete_sql = "DELETE FROM add_cart WHERE register_id='".$_SESSION["user_id_session"]."'";
			if (mysqli_query($conn, $delete_sql)) {
				//echo "Record deleted successfully";
			} else {
				echo "Error deleting record: " . mysqli_error($conn);
			}
			
		mysqli_close($conn);
	}
?>
<html>
	<head>
		<style>
			table{
				border-collapse: collapse;
				border: 3px solid #73AD21;
				background-color: #F5F5F5;
				border-radius: 20px;
				width: 50%;
				margin: auto;
				//margin-left: 50px;
				text-align: center;
				color: black;
			}
			th{
				border: none;
				text-align: center;
				height: 25px;
				color: #900000;
				font-size: 18px;
			}
			.my_order_id{
				color: red;
			}
			td{
				font-size: 17px;
			}
			.total_amount{
				text-align: right;
				padding-right: 35px;
				font-weight: bold;
				color: #FF3300;
				font-size: 21px;
				border: none;
			}
			.cancel_button_css{
				border: none;
				color: #0275d8;
			}
			.day_time{
				text-align: left;
				font-weight: bold;
				border: none;
			}
			body{
				background-image: url('/official_Tybsc_project/body_background/image_1.jpg');
				background-attachment: fixed;
			}
		</style>
	</head>
	<body>
		<?php
			if(isset($_POST['cancel'])){

				// Create connection
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				// Check connection
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}

				// sql to delete a record
				$sql = "DELETE FROM order_list WHERE id='".$_POST['cancel']."'";

				if (mysqli_query($conn, $sql)) {
					echo "<script>alert('Your Order has been Deleted');</script>";
				} else {
					echo "Error deleting record: " . mysqli_error($conn);
				}
				mysqli_close($conn);
			}
		?>
		
		
		<?php
			// Create connection
			$connec_tion = mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
			if (!$connec_tion) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$sum_count = 0;
			$quan_count = 0;
			$Sr = 0;
			
			$sql_re = "SELECT * FROM order_list WHERE register_id='".$_SESSION["user_id_session"]."'";
			$result_re = mysqli_query($connec_tion, $sql_re);

			if (mysqli_num_rows($result_re) > 0) {
				// output data of each row
				echo "<h3 align='center' style='color:white;'>The Orders will be Sent to your Address and Payment: Cash On Delivery</h3><br>";
				while($row_re = mysqli_fetch_assoc($result_re)) {
					echo "<table border='6'>";
						echo "<tr><th colspan='4' class='my_order_id'>Order id: ".$row_re['order_id']."</th></tr>";
						echo "<tr>";
						echo "<th>Sr.no</th>";
						echo "<th>Food Name</th>";
						echo "<th>Quantity and Cost</th>";
						echo "<th>Total Cost</th>";
						echo "</tr>";
					
					$sql_re_1 = "SELECT * FROM place_order WHERE order_ref_id='".$row_re["id"]."' AND payment='notpaid'";
					$result_re_1 = mysqli_query($connec_tion, $sql_re_1);
					if (mysqli_num_rows($result_re_1) > 0) {
						
						// output data of each row
						while($row_re_1 = mysqli_fetch_assoc($result_re_1)) {
							$sql_final = "SELECT * FROM menu_items WHERE id='".$row_re_1["menu_items_id"]."'";
							$result_final = mysqli_query($connec_tion, $sql_final);
							if (mysqli_num_rows($result_final) > 0) {
								// output data of each row
								while($row_final = mysqli_fetch_assoc($result_final)) {
									$sum_count = $sum_count + 1;
									echo "<tr>";
									echo "<td>".$sum_count."</td>";
									echo  "<td>".$row_final['food_name']."</td>";
									echo "<td>".$row_re_1['quans']."&nbsp x &nbsp".$row_final['cost']."</td>";
									echo "<td>".$row_re_1['quans'] * $row_final['cost']."</td>";
									echo "</tr>";
									$quan_count = $quan_count + $row_re_1['quans'] * $row_final['cost'];
								}
								$_SESSION["day1"] = $row_re_1['date'];
								$_SESSION["time1"] = $row_re_1['time'];
								
							} else {
								echo "0 results";
							}
						}
					echo "<tr><td colspan='4' class='day_time'>&nbsp</td></tr>";
					echo "<tr><td colspan='4' id='day1' class='day_time'>Date: ".$_SESSION['day1']."</td></tr>";
					echo "<tr><td colspan='4' id='time1' class='day_time'>Time: ".$_SESSION['time1']."</td></tr>";
					}
					else {
						echo "0 results";
						
					}
					echo "<tr><td colspan='4' class='total_amount'><u>Total Amount: ".$quan_count."</u></tr>";
					$sum_count = 0;
					$quan_count = 0;
					echo "<form action='place_order.php' method='POST'>";
					echo "<tr><th colspan='4' class='cancel_button_css'><button type='submit' name='cancel' value='".$row_re["id"]."'>Cancel Order</button></th></tr>";
					echo "<form>";
					echo "</table>";
					echo "<br><br>";
				}
				
				unset ($_SESSION["day1"]);
				unset ($_SESSION["time1"]);
			} else {
				echo "<h3 align='center'>No Orders Found</h3>";
			}
			mysqli_close($connec_tion);
		?>
	</body>
</html>
