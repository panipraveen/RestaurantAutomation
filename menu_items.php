<?php
	require("customer_navbar.php");
	if(isset($_POST['submit_cart'])){
		echo "<script type='text/javascript'>alert('Your Order has been placed! Go to Orders section to view your Order');</script>";
	}
?>
<?php
	require("config.php");
?>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	  <!--//height: 200px;width: 180px;-->
	  <style>
		.imgwork{
			border-radius: 20px;
			height: 150px;
			width: 140px;							
		}
		.demo{
		  background-color: #E8E8E8;
		  border-radius: 20px;
		  width: 300px;
		  height: 460px;
		  border: 2px solid #47d147;
		  padding: 50px;
		  margin: 20px;
		  text-align:center;
		}
		body{
		  font-family: Arial;
		}
		
		
		#snackbar {
		  visibility: hidden;
		  min-width: 250px;
		  margin-left: -125px;
		  background-color: #333;
		  color: #fff;
		  text-align: center;
		  border-radius: 2px;
		  padding: 16px;
		  position: fixed;
		  z-index: 1;
		  left: 50%;
		  top: 30px;
		  font-size: 17px;
		}

		#snackbar.show {
		  visibility: visible;
		  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
		  animation: fadein 0.5s, fadeout 0.5s 2.5s;
		}

		@-webkit-keyframes fadein {
		  from {top: 0; opacity: 0;} 
		  to {top: 30px; opacity: 1;}
		}

		@keyframes fadein {
		  from {top: 0; opacity: 0;}
		  to {top: 30px; opacity: 1;}
		}

		@-webkit-keyframes fadeout {
		  from {top: 30px; opacity: 1;} 
		  to {top: 0; opacity: 0;}
		}

		@keyframes fadeout {
		  from {top: 30px; opacity: 1;}
		  to {top: 0; opacity: 0;}
		}
		body{
			background-image: url('/official_Tybsc_project/body_background/image_1.jpg');
			background-repeat:round;
			background-attachment: fixed;
		}
	  </style>
		<script>
			function add_cart(str) {
			  var quans = document.getElementById("quan_"+str).value;
			  //alert(quans);
			  var xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				  document.getElementById("txtHint").innerHTML=this.responseText;
				  var x = document.getElementById("snackbar");
				  x.className = "show";
				  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
				}
			  };
			  xhttp.open("GET","add_cart_ajax.php?q="+str+"&r="+quans, true);
			  xhttp.send();
			}
		</script>
	</head>
	<body>
		<div id="txtHint"></div>
		<div id="snackbar">Added To chart Please visit cart to place Your Order</div>
		<?php

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT category FROM menu_category";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {	//$result_items->num_rows > 0
					echo "<div style='color:white;text-align:center;'><h2 style='font-size:50px;'>".$row["category"]."</h2></div>";
					
					$sql_items = "SELECT * FROM menu_items WHERE category='".$row["category"]."'";
					$result_items = $conn->query($sql_items);
					
					if($result_items->num_rows > 0){
						echo "<form action=menu_items.php method='POST'>";
							echo "<div class='container form-group'>";
								echo "<div class='row'>";
								echo "<table><tr>";
								$loop_count = 0;
						 while($row_items = $result_items->fetch_assoc()) {
								$loop_count = $loop_count + 1;
								echo "<td>";
								echo "<div class='demo'>";
									echo '<img src="Images/'.$row_items['food_image'].'" class="imgwork"><br><br>';
									echo "<b><label>".$row_items["food_name"]."</label></b><br><br><label>".$row_items["food_description"]."</label><br><br><label>Quantity&nbsp</label><select name='quan_".$row_items["id"]."' id='quan_".$row_items["id"]."'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select><br><b><div style='color:red'>Cost:&nbsp".$row_items["cost"]."</div></b><br>";
									echo "<button type='button' name='submit_cart' id='submit_cart' class='btn btn-primary' value='".$row_items["id"]."' onClick='add_cart(this.value)'>Add To Cart</button>";				
								echo "</div></td>";
								if($loop_count%3==0){
									//echo $loop_count;
									echo "</tr><tr>";
									echo "<br>";
								}
						}
							echo "</div></div></tr></table>";
						echo "</form><";
					}
					else{
						echo "<h3 style='text-align:center'>No Items</h3>";
					}
				}
			} else {
				echo "0 results";
			}
			$conn->close();
		?>
	</body>
</html>
<?php
	//include "footer.php";
?>