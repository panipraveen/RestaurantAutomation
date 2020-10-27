<?php
	require("config.php");
?>
		<table align="center">
			<caption style="text-align:center;color:red;"><b><u>Orders Pending to pay(OFFLINE)</u></b></caption>
			<tr>
				<th colspan=3 style="text-align:center">List of Orders<b>(OFFLINE)</b></th>
			</tr>
<?php

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM counter WHERE payment='not paid'";	//. $row["order_id"].
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "
		<tr>
				<td>
					Order id<br>
					Table no<br>
					Food Ordered<br>
					Quantity<br>
					date<br>
					Time<br>
					Cost
				</td>
				<td>
					".$row['order_id']."<br>
					".$row['table_no']."<br>
					".$row['food_name']."<br>
					".$row['quantity']."<br>
					".$row['date']."<br>
					".$row['time']."<br>
					<div style='color:red'><b>₹&nbsp".$row['cost']."</b><br></div>
				</td>
				<td>
					<button type='submit' name='pay' value=".$row['order_id']." class='btn-warning' style='padding:0px 30px;border-radius: 5px'>paid</button>
				</td>
			</tr>";
    }
} else {
    echo "NO Orders Pending";
}

mysqli_close($conn);
?>
		</table>