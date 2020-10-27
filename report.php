<?php
	require("config.php");
	date_default_timezone_set('Asia/Kolkata');
?>
<?php
/*	if(isset($_POST['gen_report'])){
		$start_date = $_POST['start_date_report'];
		$end_date = $_POST['end_date_report'];
		$current_date = date("Y-m-d");
		$collect = 0;

		$con_rep = mysqli_connect($servername, $username, $password, $dbname);
		if (!$con_rep) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT order_id,table_no,food_name,quantity,cost,date,time FROM counter WHERE date BETWEEN '" . $start_date . "' AND  '" . $end_date . "' AND payment='paid' ORDER by order_id ASC";
		$result = mysqli_query($con_rep, $sql);
		
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=Detailed Report(Offline).xls");
		echo '<table style="width:30%" border="2">
			<tr>
				<th colspan=7 style="text-align:center;color:red">List of all Orders(OFFLINE)</th>
			</tr>
			<tr>
				<th>Order id</th>
				<th>Table no</th>
				<th>Food Ordered</th>
				<th>Quantity</th>
				<th>date</th>
				<th>Time</th>
				<th>Cost</th>
			</tr>';

		if(($start_date <=$current_date) && ($end_date <= $current_date)){
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					echo "
					<tr>
						<td>".$row['order_id']."</td>
						<td>".$row['table_no']."</td>
						<td>".$row['food_name']."</td>
						<td>".$row['quantity']."</td>
						<td>".$row['date']."</td>
						<td>".$row['time']."</td>
						<td>".$row['cost']."</td>
					</tr>";
					$collect = $collect + $row['cost'];
				}
			}
			else{
				echo "No Record of Orders Between the Dates";
			}
			echo "<tr>
					<td colspan=6 style='color:red;text-align:center'><b>Total Cost</b></td>
					<td style='color:green'>".$collect."</td>
				</tr>
				";
		}
		else{
			echo "date exceeding current date";
			echo $start_date;
			echo $end_date;
		}
		echo "</table>";
		mysqli_close($con_rep);
	}
	
	echo "<br><br><br><br><br>";
	*/
	
	if(isset($_POST['gen_report'])){
		$start_date = $_POST['start_date_report'];
		$end_date = $_POST['end_date_report'];
		$current_date = date("Y-m-d");
		$collect = 0;

		$con_rep = mysqli_connect($servername, $username, $password, $dbname);
		if (!$con_rep) {
			die("Connection failed: " . mysqli_connect_error());
		}

			$sql = "SELECT * FROM paid_order WHERE date BETWEEN '" . $start_date . "' AND  '" . $end_date . "' ORDER by id ASC";
			$result = mysqli_query($con_rep, $sql);
			

			if(($start_date <=$current_date) && ($end_date >= $current_date)){
					header("Content-type: application/vnd.ms-excel");
					header("Content-Disposition: attachment; filename=Detailed Restaurant Report.xls");
					echo '<table align="center" style="width:40%;text-align:center;" border="2">
						<tr>
							<th colspan=10 style="text-align:center;color:blue">List of all Orders</th>
						</tr>';
							echo "
								<tr style='text-align:center;'>
									<th>Order id</th>
									<th>name</th>
									<th>Email</th>
									<th>Mobile Number</th>
									<th>Menu name</th>
									<th>Menu Category</th>
									<th>Quantity</th>
									<th>Date</th>
									<th>Time</th>
									<th style='color: green'>Cost</th>
								</tr>";
				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
									$sql_register = "SELECT * FROM register WHERE id='".$row["register_id"]."'";
									$result_register = mysqli_query($con_rep, $sql_register);

									if (mysqli_num_rows($result_register) > 0) {
										// output data of each row
										while($row_register = mysqli_fetch_assoc($result_register)) {
																$sql_menu = "SELECT * FROM menu_items WHERE id='".$row["menu_items_id"]."'";
																$result_menu = mysqli_query($con_rep, $sql_menu);

																if (mysqli_num_rows($result_menu) > 0) {
																	// output data of each row
																	while($row_menu = mysqli_fetch_assoc($result_menu)) {
																		echo "
																			<tr style='text-align:center;'>
																				<td>id: ".$row['order_id']."</td>
																				<td>".$row_register['name']."</td>
																				<td>".$row_register['email']."</td>
																				<td>".$row_register['mobile_number']."</td>
																				<td>".$row_menu['food_name']."</td>
																				<td>".$row_menu['category']."</td>
																				<td>".$row['quantity']."</td>
																				<td>".$row['date']."</td>
																				<td>".$row['time']."</td>
																				<td><div style='color:green;font-weight:bold;'>".$row['cost']."</div></td>
																			</tr>";
																			$collect = $collect + $row['cost'];
																	}
																} else {
																	echo "menu Error";
																}
										}
									} else {
										//echo "Register Error";
									}
					}
					echo "<tr>
							<td colspan=9 style='color:red;text-align:center'><b>Total Cost</b></td>
							<td style='color:red;text-align:center;font-weight:bold;'>Rs ".$collect."</td>
						</tr>
						";
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
		mysqli_close($con_rep);
	}
?>