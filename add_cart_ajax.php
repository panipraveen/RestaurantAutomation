<?php session_start(); ?>
<?php
	require("config.php");
?>
<?php 

	// Create connection
	$conn_sel = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn_sel) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql_1 = "SELECT cost FROM menu_items WHERE id='".$_GET['q']."'";
	$result_1 = mysqli_query($conn_sel, $sql_1);

	if (mysqli_num_rows($result_1) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result_1)) {
			$sum_count = $row['cost'] * $_GET['r'];
			echo "<script>alert('".$sum_count."')</script>";
		}
	} else {
		echo "0 results";
	}

	mysqli_close($conn_sel);
		
	
	


	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "INSERT INTO add_cart(register_id,menu_items_id,added_cost,quans) VALUES('".$_SESSION["user_id_session"]."','".$_GET['q']."','".$sum_count."','".$_GET['r']."')";

	if (mysqli_query($conn, $sql)) {
		echo "<script>alert('asdasdadad');</script>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>