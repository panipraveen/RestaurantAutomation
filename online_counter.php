
<?php
	session_start();
	require("config.php");
?>
<style>
			table{
				border-collapse: collapse;
				border: 3px solid green;
				width: 80%;
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
		</style>
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
	
	$sql_re = "SELECT * FROM order_list";
	$result_re = mysqli_query($connec_tion, $sql_re);

	if (mysqli_num_rows($result_re) > 0) {
		// output data of each row
		echo "<h3 align='center'><b>List of Online Orders</b></h3><br>";
		while($row_re = mysqli_fetch_assoc($result_re)) {
				
			
			$sql_re_1 = "SELECT * FROM place_order WHERE order_ref_id='".$row_re["id"]."' AND payment='notpaid'";
			$result_re_1 = mysqli_query($connec_tion, $sql_re_1);
			if (mysqli_num_rows($result_re_1) > 0) {
				echo "<table border='6'>";
				echo "<tr><th colspan='4' class='my_order_id'>Order id: ".$row_re['order_id']."</th></tr>";
				echo "<tr>";
				echo "<th>Sr.no</th>";
				echo "<th>Food Name</th>";
				echo "<th>Quantity and Cost</th>";
				echo "<th>Total Cost</th>";
				echo "</tr>";
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
			echo "<form action='counter.php' method='POST'>";
			echo "<tr><th colspan='4' class='cancel_button_css'><button type='submit' name='pay' value='".$row_re["id"]."'>Paid Order</button></th></tr>";
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