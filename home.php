<?php
	require("customer_navbar.php");
?>
<?php
	require("config.php");
?>
<html>
	<head>
		<style>
			* {box-sizing: border-box;}
			//body {font-family: Verdana, sans-serif;}
			.mySlides {display: none;}
			img {vertical-align: middle;}

			/* Slideshow container */
			.slideshow-container {
			  max-width: 1000px;
			  position: relative;
			  margin: auto;
			}

			/* Caption text */
			.text {
			  color: #f2f2f2;
			  font-size: 15px;
			  padding: 8px 12px;
			  position: absolute;
			  bottom: 8px;
			  width: 100%;
			  text-align: center;
			}

			/* Number text (1/3 etc) */
			.numbertext {
			  color: #f2f2f2;
			  font-size: 12px;
			  padding: 8px 12px;
			  position: absolute;
			  top: 0;
			}

			/* The dots/bullets/indicators */
			.dot {
			  height: 15px;
			  width: 15px;
			  margin: 0 2px;
			  background-color: #bbb;
			  border-radius: 50%;
			  display: inline-block;
			  transition: background-color 0.6s ease;
			}

			.active {
			  background-color: #717171;
			}

			/* Fading animation */
			.fade {
			  -webkit-animation-name: fade;
			  -webkit-animation-duration: 1.5s;
			  animation-name: fade;
			  animation-duration: 1.5s;
			}

			@-webkit-keyframes fade {
			  from {opacity: .4} 
			  to {opacity: 1}
			}

			@keyframes fade {
			  from {opacity: .4} 
			  to {opacity: 1}
			}

			/* On smaller screens, decrease text size */
			@media only screen and (max-width: 300px) {
			  .text {font-size: 11px}
			}
			.home_img_work{
				margin: auto;
				width: 100%;
				height: 100%;
			}
			</style>
			
			
				
	</head>
	<body>
		<div class="slideshow-container">
		<div class="mySlides fade">
		  <div class="numbertext">1 / 4</div>
		  <img src="/official_Tybsc_project/Home_background_image/download_1.jpg" class="home_img_work" width="100%">
		  <div class="text"><label style="color:black;"><b>“There are only three things women need in life: food, water, and compliments.”</b></label></div>
		</div>

		<div class="mySlides fade">
		  <div class="numbertext">2 / 4</div>
		  <img src="/official_Tybsc_project/Home_background_image/download_2.jpg" class="home_img_work" width="100%">
		  <div class="text"><label style="color:black">“All you need is love. But a little chocolate now and then doesn’t hurt.”</label></div>
		</div>

		<div class="mySlides fade">
		  <div class="numbertext">3 / 4</div>
		  <img src="/official_Tybsc_project/Home_background_image/download_3.jpg" class="home_img_work" width="100%">
		  <div class="text"><label style="color:black">“Anything is good if it’s made of chocolate.”</label></div>
		</div>
		<div class="mySlides fade">
		  <div class="numbertext">4 / 4</div>
		  <img src="/official_Tybsc_project/Home_background_image/download_4.jpg" class="home_img_work" width="100%">
		  <div class="text"><label style="color:black">“Food is the most primitive form of comfort.”</label></div>
		</div>

		</div>
		<br>
		<div style="text-align:center">
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		  <span class="dot"></span>
		  <span class="dot"></span>		  
		</div>


		<script>
			var slideIndex = 0;
			showSlides();

			function showSlides() {
			  var i;
			  var slides = document.getElementsByClassName("mySlides");
			  var dots = document.getElementsByClassName("dot");
			  for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";  
			  }
			  slideIndex++;
			  if (slideIndex > slides.length) {slideIndex = 1}    
			  for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" active", "");
			  }
			  slides[slideIndex-1].style.display = "block";  
			  dots[slideIndex-1].className += " active";
			  setTimeout(showSlides, 3000); // Change image every 2 seconds
			}
			</script>
	</body>
</html>
<?php
	include "footer.php";
?>