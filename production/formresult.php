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

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
          <!-- top part------------------------------------------------------------------------------------- -->
            <div class="page-title">
              <div class="title_left">
                <h3>Our Recommendations</h3>
                
                <?php
                // var_dump($_POST);

                ?>

              </div>
            </div>

            <div class="clearfix"></div>
            <!-- --------------------------------------------------------------------------------------------- -->

            
            <!-- Result Table----------------------------------------------------------------------------------- -->

            <?php
            if(isset($_POST['WARD_CLASS']) && isset($_POST['GENDER']))
            {
            
              $bed = $_POST['WARD_CLASS'];
              $gender = $_POST['GENDER'];

              // var_dump($bed);
              // var_dump($gender);

              if($bed == "SUBSIDIZED" and $gender == "MALE"){
                $bg = "Bed Availability Subsidized (Male)";
                $bed_gender = "bed_status_sub_male";
              }
              else if($bed == "PRIVATE" and $gender == "MALE"){
                $bg = "Bed Availability Private (Male)";
                $bed_gender = "bed_status_private_male";
              }
              else if($bed == "SUBSIDIZED" and $gender == "FEMALE"){
                $bg = "Bed Availability Subsidized (Female)";
                $bed_gender = "bed_status_sub_female";
              }
              else{
                $bg = "Bed Availability Private (Female)";
                $bed_gender = "bed_status_private_female";
              }

              if(isset($_POST['VNH'])){
                $vnh = $_POST['VNH'];
                if($_POST['VNH'] == "YES"){
                  $pri = "priority_vnh";
                }
                else{
                  $pri = "priority2";
                }
                
              }
              else{
                $pri = "priority2";
              }

              $dao = new ChformDAO($bed_gender, $pri);

              $ch_in = $dao->retrieve($bed_gender, $pri);
              // $view_type = $ch_in->getdisplay_type();

              //var_dump($ch_in);

              $queue = array();

              foreach($ch_in as $cin){
                $q = array();

                $ch_name = $cin->get_chname();
                $ch_shortname = $cin->get_shortname();
                $ch_bedavail = $cin->get_bedavail();
                $ch_lastupdate = $cin->get_lastupdate();
                //$ch_priority = $cin->get_priority();

                //array_push($q,$ch_priority);
                array_push($q,$ch_shortname);
                array_push($q,$ch_name);
                array_push($q,$ch_bedavail);
                array_push($q,$ch_lastupdate);

                array_push($queue,$q);
              }

              // var_dump($queue);

              $accept = array();
              $reject = array();

              foreach($queue as $query){
                $one_ch = array();
                array_push($one_ch,$query[0]);
                $requirement = array();
                $reason = array();
                $acceptreject = array();

                foreach($_POST as $com => $cr){

                  if($cr == "NO" or $cr == "NIL"){
                  }
                  else if(is_array($cr)){
                    foreach($cr as $c){
                      $fullname = $query[1];
                      $dao = new ChrequirementDAO($fullname, $c);

                      $ch_req = $dao->retrieve($fullname, $c);
                      $req = $ch_req->get_fullname();

                      // var_dump($req);

                      if($req=="NO"){
                        array_push($acceptreject,"Not Suitable");
                        //code here

                        $dao = new ChreqnoDAO($c);

                        $ch_reqno = $dao->retrieve($c);
                        $reqno = $ch_reqno->get_reqno();

                        $redreqno = "<font color='red'>$reqno</font>";

                        if(in_array($redreqno,$reason)==False){
                          array_push($reason,$redreqno);
                        }
                        

                      }
                      else{
                        array_push($acceptreject,"Suitable");

                        if($req != "YES"){

                          if(in_array($req,$requirement)==False){
                            array_push($requirement,$req);
                          }
                          
                        }
                        
                      }

                    }
                  }
                  else{

                    if($com == "GENDER"){
                    }
                    else{
                      $fullname = $query[1];
                      $c = $cr;
                      $dao = new ChrequirementDAO($fullname, $c);

                      $ch_req = $dao->retrieve($fullname, $c);
                      $req = $ch_req->get_fullname();

                      // var_dump($req);

                      if($req=="NO"){
                        array_push($acceptreject,"Not Suitable");
                        //code here
                        $dao = new ChreqnoDAO($c);

                        $ch_reqno = $dao->retrieve($c);
                        $reqno = $ch_reqno->get_reqno();

                        $redreqno = "<font color='red'>$reqno</font>";

                        if(in_array($redreqno,$reason)==False){
                          array_push($reason,$redreqno);
                        }

                      }
                      else{
                        array_push($acceptreject,"Suitable");

                        if($req != "YES"){

                          if(in_array($req,$requirement)==False){
                            array_push($requirement,$req);
                          }

                        }
                        
                      }

                    }


                  }
                }

                // var_dump($requirement);
                // var_dump($acceptreject);

                $query_bedavail = $query[2];
                $query_lastupdate = $query[3];
                
                // if($query_bedavail == 0){
                //   array_push($acceptreject,"Reject");

                //   $nobed = "<font color='red'>No bed available</font>";

                //   array_push($reason,$nobed);
                // }

                if(in_array("Not Suitable",$acceptreject)){
                  array_push($one_ch,$reason);
                }
                else{
                  array_push($one_ch,$requirement);
                }

                array_push($one_ch,$query_bedavail);
                array_push($one_ch,$query_lastupdate);

                if(in_array("Not Suitable",$acceptreject)){
                  $acceptance = "Not Suitable";
                }
                else{
                  $acceptance = "Suitable";
                }

                array_push($one_ch,$acceptance);

                //var_dump($one_ch);

                if($acceptance =="Suitable"){
                  array_push($accept,$one_ch);
                }
                else{
                  array_push($reject,$one_ch);
                }

              }
              
              $all = array();

              foreach($accept as $a){
                array_push($all,$a);
              }

              foreach($reject as $r){
                array_push($all,$r);
              }

              //var_dump($all);

              ?>

              <div class="row" style="display: block;">

                <div class="col-md-12 col-sm-12">
                  <div class="x_panel">
                    <div class="x_title">

                      <?php
                      for($i=0;$i<3;$i++){
                        $fst = $all[$i];
                        $shortn = $fst[0];
                        $beda = $fst[2];
                        $lastu = $fst[3];
                        $rej = $fst[4]; 

                        if($i==0){
                          $check = 0;
                          if($rej == "Not Suitable"){
                            $check = 1;
                            $msg = "<font color='red'>Please contact Patient Navigator</font>";
                          }
                          else if($beda ==0){
                            $msg = array();
                            $m1 = "<font color='orange'>$shortn</font>";
                            array_push($msg,$m1);
                          }
                          else{
                            $msg = array();
                            $m1 = "$shortn";
                            array_push($msg,$m1);
                          }
                          
                        }
                        else if($i==1){

                          $check1 = 0;

                          if($check == 0){
                            if($rej == "Not Suitable"){
                              $check1 = 1;
                            }
                            else if($beda ==0){
                              $m2 = "<font color='orange'>$shortn</font>";
                              array_push($msg,$m2);
                            }
                            else{
                              $m2 = "$shortn";
                              array_push($msg,$m2);
                            }

                          }

                        }
                        else{
                          if($check1 == 0){
                            if($rej == "Suitable"){
                              if($beda ==0){
                                $m3 = "<font color='orange'>$shortn</font>";
                                array_push($msg,$m3);
                              }
                              else{
                                $m3 = "$shortn";
                                array_push($msg,$m3);
                              }
                            }
                            
                          }
                        }

                      }

                      if(is_array($msg)){
                        for($i=0;$i<=(count($msg)-1);$i++){
                          if(count($msg)==1){
                            $mm = $msg[$i];
                            echo"<h1>$mm</h1>";
                          }
                          else if(count($msg)==2){
                            if($i==0){
                              $mm = $msg[$i];
                              echo"<h1>$mm >";
                            }
                            else{
                              $mm = $msg[$i];
                              echo"$mm</h1>";
                            }
                          }
                          else{
                            if($i==0){
                              $mm = $msg[$i];
                              echo"<h1>$mm >";
                            }
                            else if($i==1){
                              $mm = $msg[$i];
                              echo"$mm >";
                            }
                            else{
                              $mm = $msg[$i];
                              echo"$mm</h1>";
                            }
                          }
                        }
                      }
                      else{
                        echo"<h1>$msg</h1>";
                      }


                      ?>
                        

                      <div class="clearfix"></div>
    
                    </div>


                    <div class="x_content">
                      <div class = "table-responsive">
                      <table class="table table-striped" style="font-size: 15px;">
                        <thead>
                          <tr style="background-color:#2a3f54; color: white;" >
    
                              <th>Community Hospital</th>
                              <th>Requirements</th>
                              <th><?=$bg?></th>
                              <th>Last Update on</th>
                              <th>Acceptance</th>
                          </tr>
                        </thead>
                        <tbody>
                  
                            <?php
                            foreach($all as $a){

                              echo"<tr>";

                              $chn = $a[0];
                              $all_reason = $a[1];
                              $chbavail = $a[2];
                              $lastup = $a[3];
                              $ar = $a[4];

                              
                              echo"<td class= 'last'><a href='#'><b>$chn</b></a></td>";

                              echo"
                              <td>
                                <ul>";

                                if($chbavail==0 and $ar=="Suitable"){
                                  foreach($all_reason as $each_reason){
                                    echo"<li><font color='orange'>$each_reason</font></li>";
                                  }
                          
                                }
                                else{
                                  foreach($all_reason as $each_reason){
                                    echo"<li>$each_reason</li>";
                                  }
                                }                              


                              echo"
                                </ul>
                              </td>";

                              
                              if($chbavail == 0 and $ar=="Suitable"){
                                echo"<th><font color='orange'>$chbavail</font></th>";
                                
                              }
                              else if($ar=="Not Suitable"){
                                echo"<th><font color='red'>$chbavail</font></th>";
                              }
                              else{
                                echo"<th>$chbavail</th>";
                              }

                              echo"<th>$lastup</th>";

                              if($chbavail == 0 and $ar=="Suitable"){
                                echo"<td><h2 style='color:orange;'>$ar</h2>";
                                echo"<font color='orange'>No bed available currently</font></td>";
                              }
                              else if($ar=="Suitable"){
                                echo"<td><h2 style='color:green;'>$ar</h2></td>";
                              }
                              else{
                                echo"<td><h2 style='color:red;'>$ar</h2></td>";
                              }

                              echo"</tr>";
                            }
                            
                            
                          
                            echo " </tbody>
                            </table>
                            </div>";

                            $website = "querypage.php";

                            echo '</div>
                            

                          </div>
                          <form action='.$website.'>
                          <button onclick="document.location='.$website.'" class="btn btn-success">Back</button>
                        </form>
                        </div>';
                  
                        }
                        else
                        {
                          echo "<br><div style='font-size: 25px; color: red;'>Please re-enter and try again</div><br><br>";
                          $website = "querypage.php";
                          echo'<form action='.$website.'>
                          <button onclick="document.location='.$website.'" class="btn btn-success">Back</button>
                        </form>';
                        }
                  ?>
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
