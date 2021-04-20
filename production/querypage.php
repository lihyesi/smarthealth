<!DOCTYPE html>
<html lang="en">

<!--THE TOP ============================================================================== -->
<head>

	<!-- Meta, title, CSS, favicons, etc. -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CHRW</title>
	<link rel="icon" href="images/icons/favicon2.png" type="image/gif">
    
	
	<!-- Bootstrap -->
	<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- bootstrap-wysiwyg -->
	<link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
	<!-- Select2 -->
	<link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
	<!-- Switchery -->
	<link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
	<!-- starrr -->
	<link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
	<!-- bootstrap-daterangepicker -->
	<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<!-- Custom Theme Style -->
	<link href="../build/css/custom.min.css" rel="stylesheet">
	<!-- new font -->
	<link href="../newfonts/style.css" rel="stylesheet">

</head>
<!--========================================================================================-->

<!-- SESSION ======================================================== -->
<?php
	require_once 'include/common.php';

	// Declare SESSION
	if (isset($_SESSION['USER']))
	{
		// If user login as usual, allow user to access the website
		$name = $_SESSION['USER'];
		$role = $_SESSION['ROLE'];
		$username = $_SESSION['USERNAME'];

	}
	else
	{
		// If user just key in URL, redirect user to login page (index.php/landing page)
		header("Location: ../index.php");
		return;
	}
?>
<!-- ================================================================ -->


<!-- Side Bar ===================================================================================================================================================-->
	
	<!-- Side bar head ===========================================================================================================================-->
	<body class="nav-md" style="background-color: white;">
		<div class="container body"  style="background-color: #0a8c6a;">
			<div class="main_container" style="background-color: #0a8c6a;">
				<div class="col-md-3 left_col menu_fixed" style="background-color: #0a8c6a;">
					<div class="left_col scroll-view" style="background-color: #0a8c6a;">
						<div class="navbar nav_title" style="border: 0; background-color: #0a8c6a;">
							<div class="newfont">
								<!-- words on the top left side bar -->
								<a href="querypage.php" class="site_title"><img src='images/logo3.png' alt='' width="60">CH Referral</a>
							</div>
						</div>

						<div class="clearfix"></div>

						<!-- Menu profile quick info ========================================================================-->
						
						<div class="profile clearfix">
							<div class="profile_info">
								<span style="color:white;"><h6 style="font-size:18px">Welcome,</h6></span> 
								<div style="color:white;"><h6 style="font-size:20px"><b><?php echo $name; ?></b></h6></div>
							</div>
						</div>

						<br />
						<!-- =================================================================================================-->

						
	<!--=========================================================================================================================================--->

	<!-- side bar menu ==========================================================================================================================-->
          			<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						
						<div class="menu_section">
							<!-- Unordered list for the sidebar -->
							<ul class="nav side-menu">
								<!-- Link to Home Page -->
								<li style="font-size:18px";><a href = "querypage.php"><i class="fa fa-home"></i>Home</a></li>
								<!-- Link to CH basic information page -->
								<li style="font-size:18px";><a href = "ch_info.php"><i class="fa fa-info-circle"></i>CH Information</a></li>

								<?php
									// if user, have access to User Management, Criteria Setting and CH Setting
                    				if($role == "admin")
									{
										echo '<li style="font-size:18px";><a href = "ch_user.php"><i class="fa fa-users"></i>User Management</a></li>
										
										
										<li style="font-size:18px";><a href = "ch_comp.php"><i class="fa fa-gear"></i>Criteria Setting</a></li>


										<li style="font-size:18px";><a><i class="fa fa-cogs"></i>CH Setting <span class="fa fa-chevron-down"></span></a>
											<ul class="nav child_menu">
												<li><a href="ch_bed_avail.php">CH Bed Availability</a></li>
												<li><a href="ch_management.php">CH Management</a></li>
												<li><a href="ch_pri.php">CH Priority Update</a></li>
												<li><a href="ch_cap_setting.php">CH Capability Setting</a></li>
											</ul>
										</li>';
									}
								?>
							</ul>
						</div>

					</div>
	<!--=========================================================================================================================================--->
				</div>
            </div>
<!-- =============================================================================================================================================================-->



<!-- top navigation ==============================================================================================================================================-->
			<div class="top_nav">
				<div class="nav_menu">
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i></a>
					</div>
					<nav class="nav navbar-nav">
						<ul class=" navbar-right">
							<li class="nav-item dropdown open" style="padding-left: 15px;">
								<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
									<?php echo $name; ?>
								</a>
								<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="profile.php">Profile</a>
									<a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
								</div>
							</li>
						</ul>
					</nav>
				</div>
			</div>
<!--===========================================================================================================================================================-->

<!-- Page Content  ---------------------------------------------------------------------------------------------------------------------------------->
			<div class="right_col" role="main">
				<div class="">

					<div class="page-title">
						<div class="title_left">
							<h3>Patient's Profile<br></h3>
						</div>
					</div>

					<form action="formresult.php" method="POST">
					
								<?php
									// $dao = new ChcrecatDAO();

									// $ch_comp = $dao->retrieve();
									$num = 1;

									$dao = new CatDAO();

									$ch_comp = $dao->retrieve($num);
									


									foreach ($ch_comp as $comp)
									{

										$importance = $comp->get_importance();

										if($importance == "FIXED"){
											echo'
											<div class="clearfix"></div>
						
												<div class="row">
													<div class="col-md-12 col-sm-12 ">
														<div class="x_panel">
											';

											$components = $comp->get_component();
											

											if(strpos($components, "_")){
												$component = str_replace("_"," ",$components);
											}
											else{
												$component = $components;
											}

											echo '
											<div class="x_title">
												<h2>'.$component.'</h2>
												<ul class="nav navbar-right panel_toolbox">
													<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
													</li>
												</ul>
												<div class="clearfix"></div>
											</div>';

											echo '<div class="x_content"><br>';

											$dao = new CreviewDAO();

											$cre_view = $dao->retrieve($components);
											$view_type = $cre_view->getdisplay_type();
											// $important = $cre_view->getimportance();
											//echo $view_type."<br>";

											$dao = new ChcreDAO();

											$ch_cre = $dao->retrieve($components);
											// var_dump($ch_cre);
							

											if($view_type == "DROPDOWN"){
												echo"<select id='$components' class='form-control' name ='$components' required>";

												if($component == "WARD CLASS"){
													foreach($ch_cre as $cre)
													{
														$criteria = $cre->getsub_component();

														$selected = "";

														if($criteria == "SUBSIDIZED"){
															$selected = "selected";
														}

														echo"<option value='$criteria' $selected>$criteria</option>";

													}	
												}
												else if($component == "FEEDING"){
													foreach($ch_cre as $cre)
													{
														$criteria = $cre->getsub_component();

														$selected = "";

														if($criteria == "ORAL"){
															$selected = "selected";
														}

														if(strpos($criteria, "_")){
															$criterias = str_replace("_"," ",$criteria);
														}
														else{
															$criterias = $criteria;
														}

														echo"<option value='$criteria' $selected>$criterias</option>";

													}	
												}
												else{

													echo"<option value='NIL' selected>NIL</option>";

													foreach($ch_cre as $cre)
													{
														$criterias = $cre->getsub_component();

														if(strpos($criterias, "_")){
															$criteria = str_replace("_"," ",$criterias);
														}
														else{
															$criteria = $criterias;
														}

														echo"<option value='$criterias'>$criteria</option>";

													}

												}

												echo"</select>";

											}
											else{
												foreach($ch_cre as $cre)
												{
													$criterias = $cre->getsub_component();
													// echo $criteria."<br>";

													if(strpos($criterias, "_")){
														$criteria = str_replace("_"," ",$criterias);
													}
													else{
														$criteria = $criterias;
													}

													if($view_type == "RADIO"){
														if($components == "GENDER"){
															echo"MALE <input type='radio' class='flat' name= '$components' id= '$components' value='MALE' checked='' required /> &nbsp"; 
															echo"FEMALE <input type='radio' class='flat' name='$components' id='$components' value='FEMALE' />";
														}
														else{
															echo"NO <input type='radio' class='flat' name= '$components' id= '$components' value='NO' checked='' required /> &nbsp"; 
															echo"YES <input type='radio' class='flat' name='$components' id='$components' value='$components' />";
														}
														
													}
													else if($view_type == "CHECKBOX"){
														// if($components=="TYPE_OF_CARE"){
															//echo"<input type='checkbox' name= '$components.[]' id='$components' value='$criterias' class='flat' /> $criteria &nbsp";
				

														$dao = new CatsubDAO();

														$catsub = $dao->retrieve($criterias);
														// $sub = $catsub->get_subcomponent();
														
														// var_dump($catsub);

														if(empty($catsub)==FALSE){

															if(strpos($criterias, ".")){
																$criter = str_replace(".","_",$criterias);
															}
															else{
																$criter = $criterias;
															}

															echo '
															<script>
															function myFunction'.$criter.'() {
															var checkBox = document.getElementById("myCheck'.$criter.'");
															var text = document.getElementById("text'.$criter.'");
															if (checkBox.checked == true){
																text.style.display = "block";
															} else {
																text.style.display = "none";
															}
															}
															</script>
															' ;
															
			
															echo"<input type='checkbox' id='myCheck".$criter."' onclick='myFunction".$criter."()' /> $criteria &nbsp";

															echo"
															<select id='text".$criter."' class='form-control' name ='$criterias' style='display:none' required>
															";

															echo"<option value='NIL' selected>Please Select</option>";
																
															foreach($catsub as $sub){
																$subc = $sub->get_subcomponent();

																if(strpos($subc, "_")){
																	$su = str_replace("_"," ",$subc);
																}
																else{
																	$su = $subc;
																}

																echo"<option value='$subc'>$su</option>";
																
															}

															echo"
															</select><br><br>
															";

																	
														}
														else{
															echo"<input type='checkbox' name= '$components.[]' id='$components' value='$criterias' /> $criteria &nbsp";
														}			
																
														// }
														// else{
														// 	echo"<input type='checkbox' name= '$components.[]' id='$components' value='$criterias' /> $criteria &nbsp";
														// }
													}

												}
											}
											


											echo '</div>';

											echo"
														</div>
												</div>
											</div>
											";
										}

										
									}





									foreach ($ch_comp as $comp)
									{

										$importance = $comp->get_importance();

										if($importance == "FREQUENT"){
											echo'
											<div class="clearfix"></div>
						
												<div class="row">
													<div class="col-md-12 col-sm-12 ">
														<div class="x_panel">
											';

											$components = $comp->get_component();
											

											if(strpos($components, "_")){
												$component = str_replace("_"," ",$components);
											}
											else{
												$component = $components;
											}

											echo '
											<div class="x_title">
												<h2>'.$component.'</h2>
												<ul class="nav navbar-right panel_toolbox">
													<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
													</li>
												</ul>
												<div class="clearfix"></div>
											</div>';

											echo '<div class="x_content"><br>';

											$dao = new CreviewDAO();

											$cre_view = $dao->retrieve($components);
											$view_type = $cre_view->getdisplay_type();
											// $important = $cre_view->getimportance();
											//echo $view_type."<br>";

											$dao = new ChcreDAO();

											$ch_cre = $dao->retrieve($components);
											// var_dump($ch_cre);
							

											if($view_type == "DROPDOWN"){
												echo"<select id='$components' class='form-control' name ='$components' required>";

												if($component == "WARD CLASS"){
													foreach($ch_cre as $cre)
													{
														$criteria = $cre->getsub_component();

														$selected = "";

														if($criteria == "SUBSIDIZED"){
															$selected = "selected";
														}

														echo"<option value='$criteria' $selected>$criteria</option>";

													}	
												}
												else if($component == "FEEDING"){
													foreach($ch_cre as $cre)
													{
														$criteria = $cre->getsub_component();

														$selected = "";

														if($criteria == "ORAL"){
															$selected = "selected";
														}

														if(strpos($criteria, "_")){
															$criterias = str_replace("_"," ",$criteria);
														}
														else{
															$criterias = $criteria;
														}

														echo"<option value='$criteria' $selected>$criterias</option>";

													}	
												}
												else{

													echo"<option value='NIL' selected>NIL</option>";

													foreach($ch_cre as $cre)
													{
														$criterias = $cre->getsub_component();

														if(strpos($criterias, "_")){
															$criteria = str_replace("_"," ",$criterias);
														}
														else{
															$criteria = $criterias;
														}

														echo"<option value='$criterias'>$criteria</option>";

													}

												}

												echo"</select>";

											}
											else{
												foreach($ch_cre as $cre)
												{
													$criterias = $cre->getsub_component();
													// echo $criteria."<br>";

													if(strpos($criterias, "_")){
														$criteria = str_replace("_"," ",$criterias);
													}
													else{
														$criteria = $criterias;
													}

													if($view_type == "RADIO"){
														if($components == "GENDER"){
															echo"MALE <input type='radio' class='flat' name= '$components' id= '$components' value='MALE' checked='' required /> &nbsp"; 
															echo"FEMALE <input type='radio' class='flat' name='$components' id='$components' value='FEMALE' />";
														}
														else{
															echo"NO <input type='radio' class='flat' name= '$components' id= '$components' value='NO' checked='' required /> &nbsp"; 
															echo"YES <input type='radio' class='flat' name='$components' id='$components' value='$components' />";
														}
														
													}
													else if($view_type == "CHECKBOX"){
														// if($components=="TYPE_OF_CARE"){
															//echo"<input type='checkbox' name= '$components.[]' id='$components' value='$criterias' class='flat' /> $criteria &nbsp";
				

														$dao = new CatsubDAO();

														$catsub = $dao->retrieve($criterias);
														// $sub = $catsub->get_subcomponent();
														
														// var_dump($catsub);

														if(empty($catsub)==FALSE){

															if(strpos($criterias, ".")){
																$criter = str_replace(".","_",$criterias);
															}
															else{
																$criter = $criterias;
															}

															echo '
															<script>
															function myFunction'.$criter.'() {
															var checkBox = document.getElementById("myCheck'.$criter.'");
															var text = document.getElementById("text'.$criter.'");
															if (checkBox.checked == true){
																text.style.display = "block";
															} else {
																text.style.display = "none";
															}
															}
															</script>
															' ;
															
			
															echo"<input type='checkbox' id='myCheck".$criter."' onclick='myFunction".$criter."()' /> $criteria &nbsp";

															echo"
															<select id='text".$criter."' class='form-control' name ='$criterias' style='display:none' required>
															";

															echo"<option value='NIL' selected>Please Select</option>";
																
															foreach($catsub as $sub){
																$subc = $sub->get_subcomponent();

																if(strpos($subc, "_")){
																	$su = str_replace("_"," ",$subc);
																}
																else{
																	$su = $subc;
																}

																echo"<option value='$subc'>$su</option>";
																
															}

															echo"
															</select><br><br>
															";

																	
														}
														else{
															echo"<input type='checkbox' name= '$components.[]' id='$components' value='$criterias' /> $criteria &nbsp";
														}			
																
														// }
														// else{
														// 	echo"<input type='checkbox' name= '$components.[]' id='$components' value='$criterias' /> $criteria &nbsp";
														// }
													}

												}
											}
											


											echo '</div>';

											echo"
														</div>
												</div>
											</div>
											";
										}

										
									}








									foreach ($ch_comp as $comp)
									{

										$importance = $comp->get_importance();

										if($importance == "LESS_FREQUENT"){
											echo'
											<div class="clearfix"></div>
						
												<div class="row">
													<div class="col-md-12 col-sm-12 ">
														<div class="x_panel">
											';

											$components = $comp->get_component();
											

											if(strpos($components, "_")){
												$component = str_replace("_"," ",$components);
											}
											else{
												$component = $components;
											}

											echo '
											<div class="x_title">
												<h2>'.$component.'</h2>
												<ul class="nav navbar-right panel_toolbox">
													<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
													</li>
												</ul>
												<div class="clearfix"></div>
											</div>';

											echo '<div class="x_content"><br>';

											$dao = new CreviewDAO();

											$cre_view = $dao->retrieve($components);
											$view_type = $cre_view->getdisplay_type();
											// $important = $cre_view->getimportance();
											//echo $view_type."<br>";

											$dao = new ChcreDAO();

											$ch_cre = $dao->retrieve($components);
											// var_dump($ch_cre);
							

											if($view_type == "DROPDOWN"){
												echo"<select id='$components' class='form-control' name ='$components' required>";

												if($component == "WARD CLASS"){
													foreach($ch_cre as $cre)
													{
														$criteria = $cre->getsub_component();

														$selected = "";

														if($criteria == "SUBSIDIZED"){
															$selected = "selected";
														}

														echo"<option value='$criteria' $selected>$criteria</option>";

													}	
												}
												else if($component == "FEEDING"){
													foreach($ch_cre as $cre)
													{
														$criteria = $cre->getsub_component();

														$selected = "";

														if($criteria == "ORAL"){
															$selected = "selected";
														}

														if(strpos($criteria, "_")){
															$criterias = str_replace("_"," ",$criteria);
														}
														else{
															$criterias = $criteria;
														}

														echo"<option value='$criteria' $selected>$criterias</option>";

													}	
												}
												else{

													echo"<option value='NIL' selected>NIL</option>";

													foreach($ch_cre as $cre)
													{
														$criterias = $cre->getsub_component();

														if(strpos($criterias, "_")){
															$criteria = str_replace("_"," ",$criterias);
														}
														else{
															$criteria = $criterias;
														}

														echo"<option value='$criterias'>$criteria</option>";

													}

												}

												echo"</select>";

											}
											else{
												foreach($ch_cre as $cre)
												{
													$criterias = $cre->getsub_component();
													// echo $criteria."<br>";

													if(strpos($criterias, "_")){
														$criteria = str_replace("_"," ",$criterias);
													}
													else{
														$criteria = $criterias;
													}

													if($view_type == "RADIO"){
														if($components == "GENDER"){
															echo"MALE <input type='radio' class='flat' name= '$components' id= '$components' value='MALE' checked='' required /> &nbsp"; 
															echo"FEMALE <input type='radio' class='flat' name='$components' id='$components' value='FEMALE' />";
														}
														else{
															echo"NO <input type='radio' class='flat' name= '$components' id= '$components' value='NO' checked='' required /> &nbsp"; 
															echo"YES <input type='radio' class='flat' name='$components' id='$components' value='$components' />";
														}
														
													}
													else if($view_type == "CHECKBOX"){
														// if($components=="TYPE_OF_CARE"){
															//echo"<input type='checkbox' name= '$components.[]' id='$components' value='$criterias' class='flat' /> $criteria &nbsp";
				

														$dao = new CatsubDAO();

														$catsub = $dao->retrieve($criterias);
														// $sub = $catsub->get_subcomponent();
														
														// var_dump($catsub);

														if(empty($catsub)==FALSE){

															if(strpos($criterias, ".")){
																$criter = str_replace(".","_",$criterias);
															}
															else{
																$criter = $criterias;
															}

															echo '
															<script>
															function myFunction'.$criter.'() {
															var checkBox = document.getElementById("myCheck'.$criter.'");
															var text = document.getElementById("text'.$criter.'");
															if (checkBox.checked == true){
																text.style.display = "block";
															} else {
																text.style.display = "none";
															}
															}
															</script>
															' ;
															
			
															echo"<input type='checkbox' id='myCheck".$criter."' onclick='myFunction".$criter."()' /> $criteria &nbsp";

															echo"
															<select id='text".$criter."' class='form-control' name ='$criterias' style='display:none' required>
															";

															echo"<option value='NIL' selected>Please Select</option>";
																
															foreach($catsub as $sub){
																$subc = $sub->get_subcomponent();

																if(strpos($subc, "_")){
																	$su = str_replace("_"," ",$subc);
																}
																else{
																	$su = $subc;
																}

																echo"<option value='$subc'>$su</option>";
																
															}

															echo"
															</select><br><br>
															";

																	
														}
														else{
															echo"<input type='checkbox' name= '$components.[]' id='$components' value='$criterias' /> $criteria &nbsp";
														}			
																
														// }
														// else{
														// 	echo"<input type='checkbox' name= '$components.[]' id='$components' value='$criterias' /> $criteria &nbsp";
														// }
													}

												}
											}
											


											echo '</div>';

											echo"
														</div>
												</div>
											</div>
											";
										}

										
									}
									
									
								?>

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------->


<!--Ending form ----------------------------------------------------------------------------------------------------------------------------------------------------->
					<div class="item form-group">
						<!-- <div class="col-md-6 col-sm-6 offset-md-3"> -->

							<button type="submit" class="btn btn-success">Submit</button>
							<button class="btn btn-primary" type="reset">Reset</button>
							
						<!-- </div> -->
					</div>

					</div>

					</form>

				</div>
			</div>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------->



<!--Footer Content -------------------------------------------------------------------------------------------------------------------------------------------------->
			<footer>
				<div class="pull-right">
				</div>
				<div class="clearfix"></div>
			</footer>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------->
		</div>
	</div>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------->

	<!-- jQuery -->
	<script src="../vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="../vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="../vendors/nprogress/nprogress.js"></script>
	<!-- bootstrap-progressbar -->
	<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
	<script src="../vendors/iCheck/icheck.min.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="../vendors/moment/min/moment.min.js"></script>
	<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap-wysiwyg -->
	<script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
	<script src="../vendors/google-code-prettify/src/prettify.js"></script>
	<!-- jQuery Tags Input -->
	<script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
	<!-- Switchery -->
	<script src="../vendors/switchery/dist/switchery.min.js"></script>
	<!-- Select2 -->
	<script src="../vendors/select2/dist/js/select2.full.min.js"></script>
	<!-- Parsley -->
	<script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
	<!-- Autosize -->
	<script src="../vendors/autosize/dist/autosize.min.js"></script>
	<!-- jQuery autocomplete -->
	<script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
	<!-- starrr -->
	<script src="../vendors/starrr/dist/starrr.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="../build/js/custom.min.js"></script>

</body>
</html>
