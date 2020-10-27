<?php session_start(); ?>
<?php
	require("config.php");
?>
<?php

	// Create connection
	$connecting = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$connecting) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sqling = "SELECT * FROM add_cart WHERE register_id='".$_SESSION["user_id_session"]."'";
	$resulting = mysqli_query($connecting, $sqling);
	
	$temp_count = "0";
	if (mysqli_num_rows($resulting) > 0) {
    // output data of each row
		while($rowing = mysqli_fetch_assoc($resulting)) {
			$temp_count = $temp_count + 1;
		}
	} else {
		$temp_count = "0";
		//echo "0 results";
	}
	echo $temp_count;
	mysqli_close($connecting);
?>