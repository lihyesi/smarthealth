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

                  
                        <?php
                      
                        if (isset($_POST['table_records']))
                        {
                            echo "<div class='x_content'>
                            <div class = 'table-responsive'>
                            <table class='table table-striped' style='font-size: 15px;'>
                          
                            <form action='process_updatecre.php' method='POST'> 
                              <thead>
                                <tr style='color: black;' >
                                  <th>Criteria</th>
                                  <th>Status</th>
                                  <th>Reject reason</th>
                                  <th>Sub Component</th>
                                </tr>
                              </thead>
        
                              <tbody>";


                            $sub_com_list = $_POST['table_records'];
                            $component = $_POST['component'];
                            $display = $_POST['display'];


                            // var_dump($sub_com_list);


                            foreach($sub_com_list as $sub_component)
                            {                            
                              // echo $sub_component;  
                              $dao = new Cre2DAO();
                              $cre_list = $dao->retrieve($sub_component);
                              
                              // var_dump($cre_list);
                              foreach($cre_list as $cre)
                              {

                                $sub_com_old = $cre->getsub_component();
                                $status2 = $cre->getstatus2();
                                $reason = $cre->getreason();

                                $sub_com_new = str_replace("_"," ",$sub_com_old);


                                echo ("<tr>");
                                    
                                    if($display != "RADIO")
                                    {
                                      echo("<td><input type = 'text' name='".$sub_com_old."sub_com' class='form-control' required='required' value='".$sub_com_new."'/></td>");
                                    }
                                    else
                                    {
                                      echo("<td>".$sub_com_new."</td>");
                                      echo ('<input type="hidden" id="'.$sub_com_old.'sub_com" name="'.$sub_com_old.'sub_com" value="'.$sub_com_new.'">');
                                    }
                                    
                                    
                                    echo("<td>                                    
                                            <select class='form-control' name = '".$sub_com_old."status2' required='required'>");

                                    if($status2 == "show")
                                    {
                                          echo ("
                                          <option value='show' selected>Show</option>
                                          <option value='hide'>Hide</option>
                                        </select>
                                      </td>");
                                    }
                                    else
                                    {
                                          echo ("
                                          <option value='show'>Show</option>
                                          <option value='hide' selected>Hide</option>
                                        </select>
                                      </td>");
                                    }

                                    echo('<td><textarea id="reason" class="form-control" name="'.$sub_com_old.'reason" rows="6" cols="40">'.$reason.'</textarea></td>');
                                    
                                    if ($display == "CHECKBOX")
                                    {
                                        $dao = new CreDAO();
                                        $cre_list = $dao->retrieve($sub_com_old);

                                        if($cre_list != null)
                                        {
                                          echo "<td>";
                                            echo"<input type='hidden' id='component' name='component' value=" . $component . ">";
                                            echo"<input type='hidden' id='display' name='display' value=" . $display . ">";
                                            echo"<input type='hidden' id='sub_com_old' name='".$sub_com_old."sub_com_old' value=" . $sub_com_old . ">";
                                            echo "<button type='submit' formaction='see_subcre.php' class='btn btn-success'>Sub Component</button>";
                                          echo "</td>";
                                        }
                                        else
                                        {                                          
                                          echo "<td>";
                                            echo"<input type='hidden' id='component' name='component' value=" . $component . ">";
                                            echo"<input type='hidden' id='display' name='display' value=" . $display . ">";
                                            echo"<input type='hidden' id='sub_com_old' name='".$sub_com_old."sub_com_old' value=" . $sub_com_old . ">";
                                            echo "<button type='submit' formaction='see_subcre.php' class='btn btn-success'>Add Sub Component</button>";
                                          echo "</td>";
                                        }
                                    }
                                    else
                                    {
                                      echo "<td></td>";
                                    }

                                      


                                echo("</tr>");
                                echo "<input type='hidden' id='sub_com_old' name='".$sub_com_old."sub_com_old' value=" . $sub_com_old . ">";
                              }
                            }

                            echo "</tbody>
                            </table>
                            </div>
                            <table>
                              <tr>";
                              $_SESSION['COMPONENT'] = $component;
                              $_SESSION['DISPLAY'] = $display;
                              $_SESSION['CRE_LIST'] = $sub_com_list;
                              echo "<button type='submit' class='btn btn-success'>Update Criteria</button>
                            </form>";
                          

                          echo "<form action='see_cre.php' method='GET'>";
                          echo "<button type='submit' class='btn btn-success'>Cancel</button>
                                </form>
                            <tr>
                          </table>";

                        }
                        elseif(isset($_POST['component']))
                        {
                            $component = $_POST['component'];
                            $display = $_POST['display'];
                            echo '<div style="font-size: 25px; color: red;">Please choose at least one Criteria to edit.</style><br><br>';
                    
                            echo '</h2>
                            <div class="clearfix"></div>
                            </div>
                        
                            <div class="x_content">
                              <form action="see_cre.php" method="GET">
                                <input type="hidden" id="component" name="component" value=' . $component . '>
                                <input type="hidden" id="display" name="display" value=' . $display . '>
                                <button type="submit" class="btn btn-success">Back</button>
                              </form>
                            </div>
                            ';
                        }
                        else
                        {
                          if (isset($_SESSION['MSG']))
                          {
                            $msg = $_SESSION['MSG'];
                            unset($_SESSION['MSG']);

                            $component = $_SESSION['COMP'];
                            unset($_SESSION['COMP']);

                            $display = $_SESSION['DISPLAY'];
                            unset($_SESSION['DISPLAY']);

                            echo '<div style="font-size: 25px; color: red;">'. $msg .'</style><br><br>';

                            echo '</h2>
                            <div class="clearfix"></div>
                            </div>
                        
                            <div class="x_content">
                              <form action="see_cre.php" method="GET">
                                <input type="hidden" id="component" name="component" value=' . $component . '>
                                <input type="hidden" id="display" name="display" value=' . $display . '>
                                <button type="submit" class="btn btn-success">Back</button>
                              </form>
                            </div>
                            ';
                          }
                          else
                          {
                            echo '<div style="font-size: 25px; color: red;">Please go back to Component Page.</style><br><br>';
                          
                  
                          echo '</h2>
                          <div class="clearfix"></div>
                          </div>
                      
                          <div class="x_content">
                            <form action="ch_comp.php" method="GET">
                              <button type="submit" class="btn btn-success">Back</button>
                            </form>
                          </div>
                          ';
                          }
                        }
                        ?>




                  </div>
                </div>
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

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>



</html>
