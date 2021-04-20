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
            
        <!-- top part------------------------------------------------------------------------------------- -->
        <div class="page-title">
            <div class="title_left">
            <h3>Criteria Management</h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <!-- --------------------------------------------------------------------------------------------- -->

            
            <!-- Result Table----------------------------------------------------------------------------------- -->
            <div class="row" style="display: block;">

              <div class="col-md-12 col-sm-12">
                  
                <div class="x_panel">
                    <form action='add_component.php' method='GET'>
                        <button type='submit' class='btn btn-success'>Add Component</button>
                    </form>

                  <div class="x_content">
                  <div class = 'table-responsive'>
                    <table class="table table-striped" style="font-size: 15px;">
                      
                      <thead>
                        <tr style="background-color:#2a3f54; color: white;" >
                                    <th>Component</th>
                                    <th>Status</th>
                                    <th>Display type</th>
                                    <th>Edit Frequency</th>
                                    <th>Action</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                        
                            <?php
                                $dao = new CompmanagementDAO();

                                $comp_list = $dao->retrieve();

                                foreach ($comp_list as $comp)
                                {
                                    $compo = $comp->getcomponent();
                                    $component = strtoupper(str_replace("_"," ",$compo));
                                    $display = $comp->getdisplay_type();
                                    $status2 = $comp->getstatus2();
                                    $status = ucwords($status2);
                                    $importance = $comp->getimportance();
                                    $importance2 = strtoupper(str_replace("_"," ",$importance));

                                    echo "<tr>";
                                        echo "<th scope='row'>";
                                        echo $component;
                                        echo "</th>";

                                        echo "<td>";
                                        echo $status;
                                        echo "</td>";
    
                                        echo "<td>";
                                        if ($display == "DROPDOWN")
                                        {
                                            echo "Single Select";
                                        }
                                        elseif($display == "CHECKBOX")
                                        {
                                            echo "Multi Select";
                                        }
                                        else 
                                        {
                                            echo "Yes / No";
                                        }
                                        // echo $display;
                                        echo "</td>";

                                        echo "<td>";
                                        echo $importance2;
                                        echo "</td>";

                                        echo "<td style='width:12%'>";
                                        echo "<form action='see_cre.php' method='GET'>";
                                            echo "<input type='hidden' id='component' name='component' value=" . $compo . ">";
                                            echo "<input type='hidden' id='display' name='display' value=" . $display . ">";
                                            echo "<button type='submit' class='btn btn-primary' style = 'background-color: green; border-color: green;'>See Criteria</button>";
                                        echo "</form>";
                                        echo "</td>";

                                        if ($component != "WARD CLASS" && $component != "GENDER" && $component != "FEEDING" )
                                        {
                                            echo "<td style='width:9%'>";
                                            echo "<form action='comp_edit.php' method='GET'>";
                                                echo "<input type='hidden' id='component' name='component' value=" . $compo . ">";
                                                echo "<input type='hidden' id='display_type' name='display_type' value=" . $display . ">";
                                                echo "<input type='hidden' id='status2' name='status2' value=" . $status2 . ">";
                                                echo "<input type='hidden' id='importance' name='importance' value=" . $importance . ">";
                                                echo "<button type='submit' class='btn btn-primary' style = 'background-color: #ef8d32; border-color: #ef8d32;'>Edit</button>";
                                            echo "</form>";
                                            echo "</td>";

                                            echo "<td style='width:9%'>";
                                            echo "<form action='deletecomp_confirmation.php' method='GET'>";
                                                echo "<input type='hidden' id='component' name='component' value=" . $compo . ">";
                                                echo "<button type='submit' class='btn btn-primary' style = 'background-color: red; border-color: red;'>Delete</button>";
                                            echo "</form>";
                                            echo "</td>";
                                        }
                                        else
                                        {
                                            echo "<td></td><td></td>";
                                        }

                                    

                                    echo "</tr>";

                                }

                            ?>
                          
                          </tbody>

                        </table>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../vendors/validator/multifield.js"></script>
    <script src="../vendors/validator/validator.js"></script>
    

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="../vendors/validator/validator.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

</body>

</html>
