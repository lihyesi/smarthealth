<!DOCTYPE html>
<html lang="en">
<head>
	<title>CHRW</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- logo on tab ===============================================================================================-->	
	<link rel="icon" href="images/icons/favicon2.png" type="image/gif">
	<!--============================================================================================================-->


	<!-- CSS ===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<!-- new font -->
    <link href="../newfont/style.css" rel="stylesheet">
	<!--====================================================================================================-->


	<!-- SESSION start==============================================-->
	<?php
		session_start();
	?>
	<!--============================================================-->


<!-- Website content ===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">


				<!-- form start ===================================================================================-->
				<form class="login100-form validate-form" action="process_signup.php" method="POST">
					<span class="login100-form-title p-b-43">
						<h3><b>Request for Account<b><h3>
                    </span>
                    
					<div style="color:red;">
						<?php

							// Message for request status (red colour)
							if(isset($_SESSION['MSG2']))
							{
								$msg = $_SESSION['MSG2'];
								unset($_SESSION['MSG2']);
						
								echo "<br>";
								echo $msg;
							}
							
						?>
                    </div>

					<br>
                    <!-- Input full name, email address, mobile number -->

					<!-- Full name input -->
					<div class="wrap-input100 validate-input" data-validate = "Full Name is required" style = "background-color: white; border: solid #6675df; border-width: thin;">
						<input class="input100" type="text" name="fullname" placeholder='Enter your Full Name' required="required">
						<span class="focus-input100"></span>
					</div>
					
					<!-- Email input -->
					<div class="wrap-input100 validate-input" data-validate = "Full Name is required" style = "background-color: white; border: solid #6675df; border-width: thin;">
                          <input class="input100" type="email" name="email" placeholder='Enter your Email' required="required">
						  <span class="focus-input100"></span>
					</div>

					<!-- Mobile Number input -->
					<div class="wrap-input100 validate-input" data-validate="Mobile Number is required" style = "background-color: white; border: solid #6675df; border-width: thin;">
						<input class="input100" type="number" name="mobnum" placeholder='Enter your Mobile Number' required="required">
						<span class="focus-input100"></span>
					</div>
						

					<!-- Submit button -->
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" style = "font-size: 24px">
							Send Request
						</button>

						<br>
						<br>
				</form>
				<!-- ================================================================================================-->

				
				<!-- form 2 start (back button)===================================================================================-->
						<form>
						<button class="login100-form-btn" formaction='../index.php' style = "font-size: 24px; background-color:red;">
							Back to Login
						</button>
						</form>
					</div>
				
				<!-- =============================================================================================================-->

			</div>
		</div>
	</div>


	<!-- Script ===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main2.js"></script>
	<!--===============================================================================================-->

</body>
</html>