
<script src="../assets/js/custom/sweetalert.min.js"></script>
                <?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

if(($_REQUEST['error'])=='nologin')
    $logininfo="Please Sign In to Continue";
else if(($_REQUEST['error'])=='forgetpass')
    $logininfo="Please contact the nearest branch";
if(isset($_SESSION['customerid']))
{
	header("Location: dashboard.php"); exit(0);
}

if ((isset($_REQUEST['login'])))
{
$password = mysql_real_escape_string($_REQUEST['password']);
$logid= mysql_real_escape_string($_REQUEST['login']);
$query="SELECT * FROM customers WHERE loginid='$logid' AND accpassword='$password'";
$res=  mysql_query($query);
if(mysql_num_rows($res) == 1)
	{
		while($recarr = mysql_fetch_array($res))
		{
			
		$_SESSION['customerid'] = $recarr['customerid'];
		$_SESSION['ifsccode'] = $recarr['ifsccode'];
		$_SESSION['customername'] = $recarr['firstname']. " ". $recarr['lastname'];
		$_SESSION['loginid'] = $recarr['loginid'];
		$_SESSION['accstatus'] = $recarr['accstatus'];
		$_SESSION['accopendate'] = $recarr['accopendate'];
		$_SESSION['lastlogin'] = $recarr['lastlogin'];		
		}
		$_SESSION["loginid"] =$_POST["login"];
		header("Location: dashboard.php");
	}
else{
	$res = mysql_query("SELECT * FROM employees WHERE loginid='$logid' AND password='$password'");


	if(mysql_num_rows($res) == 1)
	{
		$_SESSION["adminid"] =$_POST["login"];
		header("Location: admindashboard.php");
	}
	else
	{
		$logininfo = "Invalid Username or password entered";
	}
}
}
?>
<html lang="en">
<head>
    <!-- Meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Khaytech Banking System">
<meta name="keywords" content="Banking, Online, Piggybank">
<!-- /meta tags -->
<title>Customers Login</title>

<!-- Site favicon -->
<link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
<!-- /site favicon -->

<!-- Font Icon Styles -->
<link rel="stylesheet" href="../assets/node_modules/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="../assets/vendors/gaxon-icon/styles.css">
<!-- /font icon Styles -->

<!-- Perfect Scrollbar stylesheet -->
<link rel="stylesheet" href="../assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css">
<!-- /perfect scrollbar stylesheet -->

<!-- Load Styles -->    <link rel="stylesheet" href="../assets/css/light-style-1.min.css">
    <!-- /load styles -->

</head>
<body class="dt-sidebar--fixed dt-header--fixed">

<!-- Loader -->
<div class="dt-loader-container">
  <div class="dt-loader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
    </svg>
  </div>
</div>
<!-- /loader -->
<!-- Root -->
<div class="dt-root">
    <div class="dt-root__inner">
        <!-- Login Container -->
        <div class="dt-login--container">

            <!-- Login Content -->
            <div class="dt-login__content-wrapper">

                <!-- Login Background Section -->
                <div class="dt-login__bg-section">

                    <div class="dt-login__bg-content">
                        <!-- Login Title -->
                        <h1 class="dt-login__title">Login</h1>
                        <!-- /login title -->

                        <p class="f-16">Sign in and explore the possibilities of online banking.</p>
                        <?php if(isset($logininfo))
    {  echo "<script>swal('Error!', 'Wrong Password of Username Entered!', 'error')</script>"; } ?>   
                    </div>


                    <!-- Brand logo -->
                    <div class="dt-login__logo">
                        <a class="dt-brand__logo-link" href="login.php">
                            <img class="dt-brand__logo-img" src="../assets/images/logoo.png" alt="Drift">
                        </a>
                    </div>
                    <!-- /brand logo -->

                </div>
                <!-- /login background section -->

                <!-- Login Content Section -->
                <div class="dt-login__content">

                    <!-- Login Content Inner -->
                    <div class="dt-login__content-inner">

                        <!-- Form -->
                        <form action="login.php" method="POST">

                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="sr-only" for="email-1">Account ID</label>
                                <input type="text" class="form-control" id="email-1" name="login" aria-describedby="email-1"
                                       placeholder="Enter Account ID">
                            </div>
                            <!-- /form group -->

                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="sr-only" for="password-1">Account Password</label>
                                <input type="password" class="form-control " name="password" id="password-1" placeholder="Enter Account Password">
                                </div>
                            <!-- /form group -->

                            <!-- Form Group -->
                            <div class="dt-checkbox d-block mb-6">
                                <input type="checkbox" id="checkbox-1">
                                <label class="dt-checkbox-content" for="checkbox-1">
                                    Keep me login on this device
                                </label>
                            </div>
                            <!-- /form group -->

                            <!-- Form Group -->
                            <div class="form-group">
                                <input type="submit" name="go" id="go" type="submit" value="Login" class="btn btn-primary text-uppercase">
                                <span class="d-inline-block ml-4">Or
              <a class="d-inline-block font-weight-medium ml-3" href="register.php">Create New Account</a>
            </span>
                            </div>
                            <!-- /form group -->

                           


                        </form>
                        <!-- /form -->

                    </div>
                    <!-- /login content inner -->

                    

                </div>
                <!-- /login content section -->

            </div>
            <!-- /login content -->

        </div>
        <!-- /login container -->

    </div>
</div>
<!-- /root -->

<!-- Optional JavaScript -->
<script src="../assets/node_modules/jquery/dist/jquery.min.js"></script>
<script src="../assets/node_modules/moment/moment.js"></script>
<script src="../assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Perfect Scrollbar jQuery -->
<script src="../node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<!-- /perfect scrollbar jQuery -->

<!-- masonry script -->
<script src="../assets/node_modules/masonry-layout/dist/masonry.pkgd.min.js"></script>
<script src="../assets/node_modules/sweetalert2/dist/sweetalert2.js"></script>
<script src="../assets/js/functions.js"></script>
<script src="../assets/js/customizer.js"></script><!-- Custom JavaScript -->
<script src="../assets/js/script.js"></script>

<script src="../assets/node_modules/sweetalert2/dist/sweetalert2.js"></script>
<script src="../assets/js/custom/sweet-alert.js"></script>
<script src="../assets/node_modules/sweetalert2/dist/sweetalert2.js"></script>
</body>
</html>
           
<?php include'footer.php' ?>
