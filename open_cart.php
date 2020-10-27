<?php
	session_start();
?>
<?php
	require("config.php");
?>
<?php

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM add_cart WHERE register_id='".$_SESSION["user_id_session"]."'";
	$result = $conn->query($sql);
	
	
	if ($result->num_rows > 0) {
		// output data of each row
		echo "<br><br>";
		echo "<table class='table_work' border=2px>";
		echo "<tr>";
		echo "<th>Sr</th>";
		echo "<th>Food</th>";
		echo "<th>Description and Cost</th>";
		echo "<th>Status Of Item</th>";
		echo "</tr>";
	
		$coun = 0;
		while($row = $result->fetch_assoc()) {
			//echo "id: " . $row["id"]. " - Register_id: " . $row["register_id"]. " menu_items_id " . $row["menu_items_id"]. "<br>";
			$coun = $coun + 1;
			echo "<tr>";
			$sql_1 = "SELECT * FROM menu_items WHERE id='".$row["menu_items_id"]."'";
				$result_1 = $conn->query($sql_1);
				if($result_1->num_rows > 0){
					while($row_1 = $result_1->fetch_assoc()){
						echo "<td>".$coun."</td>";
						echo "<td><br><img src='Images/".$row_1["food_image"]."' class='imgwork'><br><br>";
						echo "<label>".$row_1['food_name']."</label></td>";
						echo "<td align='left'>".$row_1['food_description']."<br><br><br><br><br>
								<div class='quans_work'><label>Quantity:&nbsp".$row['quans']."</label></div><br>
								<div class='cost_work'><b>Cost:- ".$row['added_cost']."</b></div></td>";
						echo "<td><button type='button' value='".$row['id']."' class='btn btn-danger' onClick='remove_cart(this.value)'>Remove Item</button></td>";
					}
				}
			echo "</tr>";
		}
		echo "</table>";
		echo "<form action='place_order.php' method='POST'>";
		echo "<br><div class='check_all_css'><button type='submit' name='check_all' class='btn btn-success'>Place Order and proceed to payment</button></div>";
		echo "<form>";
	} else {
		echo "<h2 align='center' style='color:white'>No Items in your Cart</h2>";
	}
	
	$conn->close();
?>