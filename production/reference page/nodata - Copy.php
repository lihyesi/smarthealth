<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- tab area on the top -------------------------------------------------------------------------------------- -->
    <title>IoToilet</title>
    <link rel="icon" href="../images/icons/favicon9.png" type="image/gif">
    <!-- --------------------------------------------------------------------------------------------------------- -->

    <!-- all the links ----------------------------------------------------------------------------------------------->
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- new font -->
    <link href="../newfont/style.css" rel="stylesheet">
    <!----------------------------------------------------------------------------------------------------------------->


    <!--session !------------------------------------------------------------------------------------------------------>

    <?php
    session_start();

        if (isset($_SESSION['USER']))
        {
            $name = $_SESSION['USER'];
            $role = $_SESSION['ROLE'];
            // unset($_SESSION['USER']);

        }
        else
        {
          header("Location: ../login.php");
        }

    ?>

    <!----------------------------------------------------------------------------------------------------------------->
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            
            <!--the top part of side bar ------------------------------------------------------------------>
            <div class="navbar nav_title" style="border: 0;">
            <!-- <div class="navbar nav_title" style="border: 0;"> -->
              <div class="newfont">
                <a href="homepage.php" class="site_title"><img src='../images/icons/favicon9.png' alt=''><span>  I O T O I L E T </span></a>
              </div>
            </div>
            <!--------------------------------------------------------------------------------------------->


            <div class="clearfix"></div>



            <!-- menu profile quick info ------------------------------------------------------------------>
            <div class="profile clearfix">
              <div class="profile_info">
                <span><h6>Welcome,</h6></span>  
                <div style="color:white;"><h6><?php echo $name; ?></h6></div>
              </div>
            </div>
            <!--------------------------------------------------------------------------------------------->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <h3>General</h3>

                <ul class="nav side-menu">
                    
                  <li><a href="homepage.php"><i class="fa fa-home"></i> Home</a></li>

                  <li><a><i class="fa fa-desktop"></i> Toilets <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="nodata.php">Level 2 Male</a></li>
                        <li><a href="nodata.php">Level 2 Female</a></li>
                        <li><a href="nodata.php">Level 3 Male</a></li>
                        <li><a href="nodata.php">Level 3 Female</a></li>
                        <li><a href="nodata.php">Level 4 Male</a></li>
                        <li><a href="toilet.php">Level 4 Female</a></li>
                        <li><a href="nodata.php">Level 5 Male</a></li>
                        <li><a href="nodata.php">Level 5 Female</a></li>
                    </ul>
                  </li>


                  <li><a href="analysis.php"><i class="fa fa-bar-chart-o"></i> Analysis </a></li>


                  <?php
                    if($role == "ADMINISTRATOR")
                    {
                      echo '<li><a><i class="fa fa-desktop"></i> User Management <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="create_user.php">Create User</a></li>
                          <li><a href="delete_user.php">Delete User</a></li>
                      </ul>
                      </li>';
                    }
                  ?>
                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">

                    <!-- the top right profile -->
                    <?php
                        echo $name;
                    ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
                <br>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

<!-- stop here ---------------------------------------------------------------------------------------------------------------------------------------------------------->

        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
                <img src='../images/sorry image.jfif' alt='' height='150'>
                <h1 class="error-number">No Data</h1>
                <h2>Sorry this page is still under development</h2>
                <p>We hope to bring you more information in the future.<a href="homepage.php"> Click here to go back to Home</a>
                    <br><br><br><br><br><br><br><br><br><br>
                </p>
            </div>
          </div>
        </div>

            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
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
