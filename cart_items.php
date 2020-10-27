<?php
	require("customer_navbar.php");
?>
<?php
	require("config.php");
?>
<?php
	/*if(!isset($_SESSION['user_name'])){
		die();
	}*/
?>

		
		
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
		<style>
			.imgwork{
				border-radius: 20px;
				height: 150px;
				width: 180px;
				text-align: center;
			}
			.cost_work{
				color: green;
				//text-align: center;
				padding-left: 5px;
			}
			.table_work{
				background-color: #F5F5F5;
				border: 5px solid #73AD21;
				border-radius: 3%;
				width: 70%;
				text-align:center;
				margin: auto;
				border-collapse: collapse;
			}
			th{
				text-align: center;
			}
			.check_all_css{
				text-align: center;
				//margin: auto;
				//width: 100%;
			}
			.quans_work{
				padding-left: 5px;
			}
			body{
				background-image: url('/official_Tybsc_project/body_background/image_1.jpg');
				background-attachment: fixed;
			}
			</style>
		
		<script>
			setInterval("opencart()",1000);
			function opencart(){
			  var xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				  document.getElementById("open_cart_show").innerHTML = this.responseText;
				}
			  };
			  xhttp.open("POST","open_cart.php", true);
			  xhttp.send();
			}
			
			
			function remove_cart(some) {
			  var xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				  //document.getElementById("demo").innerHTML = this.responseText;
				}
			  };
			  xhttp.open("GET","remove_cart.php?some="+some, true);
			  xhttp.send();
			}
		</script>

		
	</head>
	<body>
		<div id="demo"></div>
		<div id="open_cart_show"></div>
		<?php
			/*$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "official_Tybsc_project";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT * FROM add_cart WHERE register_id='".$_SESSION["user_id_session"]."'";
			$result = $conn->query($sql);
			
			echo "<table class='table_work' border=2px>";
			echo "<tr>";
			echo "<th>Sr</th>";
			echo "<th>Food</th>";
			echo "<th>Sr</th>";
			echo "<th>Status Of Item</th>";
			echo "</tr>";
			if ($result->num_rows > 0) {
				// output data of each row
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
								echo "<td align='left'>".$row_1['food_description']."<br><br><br><br>
										<div class='cost_work'><b>Cost:- ".$row_1['cost']."</b></div></td>";
								echo "<td><button type='button' name='".$row['id']."' value='".$row['id']."' class='btn btn-danger' onClick='remove_cart(this.value)'>Remove Item</button></td>";
							}
						}
					echo "</tr>";
				}
				echo "</table>";
			echo "<br><div class='check_all_css'><button type'submit' name='check_all' class='btn btn-success'>Place Order and proceed to payment</button></div>";
			} else {
				echo "<h2 align='center'>No Items</h2>";
			}
			
			$conn->close();*/
		?>
	</body>
</html>