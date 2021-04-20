<!DOCTYPE html>
<html lang="en">
<head>
	<title>CHRW</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- logo on tab ===============================================================================================-->	
	<link rel="icon" href="production/images/icons/favicon2.png" type="image/gif">
	<!--============================================================================================================-->


	<!-- CSS ===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!-- new font -->
    <link href="newfont/style.css" rel="stylesheet">
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
			<div class="wrap-login100">


				<!-- form start ===================================================================================-->
				<form class="login100-form validate-form" action="production/process_login.php" method="POST">
					<span class="login100-form-title p-b-43">
						<img src='production/images/logo3.png' alt='' width="300" height="300"> 
                    </span>
                    <div style="color:red;">
                    
					<?php

						// Error message for failed login
                        if(isset($_SESSION['FAIL']))
                        {
                            $msg = $_SESSION['FAIL'];
                            unset($_SESSION['FAIL']);
                    
                            echo $msg;
                        }
                        
                    ?>
                    </div>

					<br>
                    
					<!-- Username input -->
					<div class="wrap-input100 validate-input" data-validate = "Username is required" style = "background-color: white; border: solid #6675df; border-width: thin;">
						<input class="input100" type="text" name="username" placeholder='Enter your Email'>
						<span class="focus-input100"></span>
					</div>
					

					<!-- Password input -->
					<div class="wrap-input100 validate-input" data-validate="Password is required" style = "background-color: white; border: solid #6675df; border-width: thin;">
						<input class="input100" type="password" name="pass" placeholder='Enter your Password'>
						<span class="focus-input100"></span>
					</div>
						

					<!-- Submit button -->
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" style = "font-size: 24px">
							Login
						</button>
					</div>
					
					<div>
						<br>
						<!-- Link to signup page (Request for account) -->
						<u><a href="production/signup.php">Request for Account</a></u>
					</div>


				</form>
				<!-- ================================================================================================-->
				
				<!-- Background on the left -->
				<div class="login100-more" style="background-image: url('production/images/sghlogo.png'); background-size: cover;">
			
				</div>
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