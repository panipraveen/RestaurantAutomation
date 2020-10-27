<?php
	require("customer_navbar.php");
?>
<?php
	require("config.php");
?>
<?php
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// sql to delete a record
	$sql = "DELETE FROM add_cart WHERE id='".$_GET['some']."'";
	//$sql_1 = "DELETE FROM WHERE id='".$_GET['some']."'";

	if (mysqli_query($conn, $sql)) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . mysqli_error($conn);
	}

	mysqli_close($conn);
?>