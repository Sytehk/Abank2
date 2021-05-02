<!DOCTYPE html>
<? 
if(!(isset($_SESSION['staffid'])))
    header('Location:login.php?error=plslogin');
    
    $mailreq = mysql_query("select * from mail where reciverid='".$_SESSION['customerid']."'  AND status='New' ");

if(isset($_GET["mailid"]))
{
	
}
if(isset($_SESSION['adminid']))
$result = mysql_query("SELECT * FROM mail where reciverid='$_SESSION[adminid]' AND status='New' ");
else if(isset($_SESSION['customerid']))
    $result= mysql_query("SELECT * FROM mail where reciverid='$_SESSION[customerid]' AND status='New' ");
    
    

?>

<?
$query="SELECT * from system_settings"; 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
$cur=$row['currency'];
$color=$row['theme_color'];
								   
 }?>

<html lang="en">

<head>

    <!-- Meta tags -->

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta name="description" content="A digitalized banking software">

<meta name="keywords" content="Ibank, piggybank">

<script src="../assets/js/custom/sweetalert.min.js"></script>

<!-- /meta tags -->

<title>Drift - Admin Template</title>



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



<!-- Load Styles -->    <link rel="stylesheet" href="../assets/css/<?php echo $color;?>">
<!-- Load Styles -->    <link rel="stylesheet" href="../assets/css/style.min.css">

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

        <!-- Header -->

<header class="dt-header">



  <!-- Header container -->

  <div class="dt-header__container">



    <!-- Brand -->

    <div class="dt-brand">



      <!-- Brand tool -->

      <div class="dt-brand__tool" data-toggle="main-sidebar">

        <i style="color:white;" class="icon icon-apps icon-sm icon-fw"></i>

             
      </div>

      <!-- /brand tool -->



    <!-- Brand logo -->

      <span class="dt-brand__logo">

        <a class="dt-brand__logo-link" href="login.php">

          <img class="" width="50" height="40" src="../assets/images/logoo.png" alt="ibank">

        </a>

      </span>

      <!-- /brand logo -->



    </div>

    <!-- /brand -->



    <!-- Header toolbar-->

    <div class="dt-header__toolbar">



     
      <!-- Search box -->
      <form class="search-box d-none d-lg-block" action="searchresult.php" method="get">

        <div class="input-group" >

          <input class="form-control" name="query" placeholder="Enter Account Number or Date" value="" type="search">

          <span class="search-icon"><i class="icon icon-revenue icon-lg"></i></span>

          <div class="input-group-append">

            <button class="btn btn-danger" type="submit"><i class="icon icon-search icon-lg"></i>Search

            </button>



          </div>

        </div>

      </form>

      <!-- /search box -->



      <!-- Header Menu Wrapper -->

      <div class="dt-nav-wrapper">

        <!-- Header Menu -->

        <ul class="dt-nav d-lg-none">

          <li class="dt-nav__item dt-notification-search dropdown">



            <!-- Dropdown Link -->

            <a href="#" class="dt-nav__link dropdown-toggle no-arrow" data-toggle="dropdown"

               aria-haspopup="true" aria-expanded="false"> <i style="color:white;" class="icon icon-search icon-fw icon-lg"></i> </a>

            <!-- /dropdown link -->



            <!-- Dropdown Option -->

            <div class="dropdown-menu">



              <!-- Search Box -->

              <form class="search-box right-side-icon">

                <input class="form-control  form-control-lg" name="query" type="search" placeholder="Enter Account Number or Date">

                <button type="submit" class="search-icon"><i class="icon icon-search icon-lg"></i></button>

              </form>

              <!-- /search box -->



            </div>

            <!-- /dropdown option -->



          </li>

        </ul>

        <!-- /header menu -->



       

        <ul class="dt-nav">

         

          <li class="dt-nav__item dt-notification dropdown">



            <!-- Dropdown Link -->

            <a href="#" class="dt-nav__link dropdown-toggle no-arrow" data-toggle="dropdown"

               aria-haspopup="true" aria-expanded="false"> <i style="color:white;" class="icon icon-open-mail icon-fw"></i> </a>

            <!-- /dropdown link -->



            <!-- Dropdown Option -->

            <div class="dropdown-menu dropdown-menu-right dropdown-menu-media">

              <!-- Dropdown Menu Header -->

              <div class="dropdown-menu-header">

                <h4 class="title"> New Messages (<?php echo mysql_num_rows($mailreq); ?>)</h4>



               
              </div>

              <!-- /dropdown menu header -->



              <!-- Dropdown Menu Body -->

              <div class="dropdown-menu-body ps-custom-scrollbar">



                <div class="h-auto">


<?
while($row = mysql_fetch_array($result))
  				{ $rid=$row['senderid'];
                                  if (!($rid=='admin'))
                                  {
                                      $rres=  mysql_query("SELECT * FROM customers WHERE customerid='".$rid."'");
                                      $rresarr = mysql_fetch_array($rres);
                                      $recid = $rresarr['firstname']." ".$rresarr['lastname'];
                                  }
                                  else
                                      $recid=$rid;

                                               echo "

                  <!-- Media -->

                  <a href='readmessage.php?mailid=$row[mailid]' class='media'>



                    <!-- Avatar -->

                    <img class='dt-avatar mr-3' src='../assets/images/user-avatar/mathew.jpg' alt='User'>

                    <!-- avatar -->



                   
                   
                    <!-- Media Body -->

                    <span class='media-body text-truncate'>

                    <span class='user-name mb-1'>$recid</span>

                    <span class='message text-light-gray text-truncate'> $row[subject]</span>

                  </span>

                    <!-- /media body -->



                    <span class='action-area h-100 min-w-80 text-right'>

                    <span class='meta-date mb-1'>$row[mdatetime]</span>

                      <!-- Toggle Button -->

                      <span class='toggle-button' data-toggle='tooltip' data-placement='left' title='Mark as read'>

                        <span class='show'><i class='icon icon-dot-o icon-fw f-10 text-light-gray'></i></span>

                        <span class='hide'><i class='icon icon-dot icon-fw f-10 text-light-gray'></i></span>

                      </span>

                      <!-- /toggle button -->

                  </span> </a>

                  <!-- /media -->";

                                                }
                                                 ?>
                                               









                </div>



              </div>

              <!-- /dropdown menu body -->



              <!-- Dropdown Menu Footer -->

              <div class="dropdown-menu-footer">

                <a href="inbox.php" class="card-link"> See All <i class="icon icon-arrow-right icon-fw"></i>

                </a>

              </div>

              <!-- /dropdown menu footer -->

            </div>

            <!-- /dropdown option -->



          </li>

        </ul>

        <!-- /header menu -->



        <!-- Header Menu -->

        <ul class="dt-nav">

          <li class="dt-nav__item dropdown">



           

        <!-- /header menu -->



        <!-- Header Menu -->

        <ul class="dt-nav">

          <li class="dt-nav__item dropdown">



            <!-- Dropdown Link -->

            <a href="#" class="dt-nav__link dropdown-toggle no-arrow dt-avatar-wrapper"

               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

          <img class="" width="50" height="40" src="../assets/images/logoo.png" alt="ibank">

              <span class="dt-avatar-info d-none d-sm-block">

                <span style="color:white;" class="dt-avatar-name"><?php echo $_SESSION[staffid]; ?></span>

              </span> </a>

            <!-- /dropdown link -->



            <!-- Dropdown Option -->

            <div class="dropdown-menu dropdown-menu-right">

              <div class="dt-avatar-wrapper flex-nowrap p-6 mt--5 bg-gradient-purple text-white rounded-top">

          <img class="" width="50" height="40" src="../assets/images/logoo.png" alt="ibank">

                <span class="dt-avatar-info">

                <span style="color:white;" class="dt-avatar-name"><?php echo $_SESSION[staffid]; ?></span>


                </span>

              </div>

              </a> <a class="dropdown-item" href="staffpass.php">

                <i class="icon icon-settings icon-fw mr-2 mr-sm-1"></i>Setting </a>

              <a class="dropdown-item" href="logout.php"> <i class="icon icon-logout icon-fw mr-2 mr-sm-1"></i>Logout

              </a>

            </div>

            <!-- /dropdown option -->



          </li>

        </ul>

        <!-- /header menu -->

      </div>

      <!-- Header Menu Wrapper -->



    </div>

    <!-- /header toolbar -->



  </div>

  <!-- /header container -->



</header>

<!-- /header -->

        <!-- Site Main -->

        <main class="dt-main">

            <!-- Sidebar -->

<aside id="main-sidebar" class="dt-sidebar">

  <div class="dt-sidebar__container">



    <!-- Sidebar Navigation -->

    <ul class="dt-side-nav">



      <!-- Menu Header -->

      <li class="dt-side-nav__item dt-side-nav__header">

        <span class="dt-side-nav__text">Admin Account</span>

      </li>

      <!-- /menu header -->



      <!-- Menu Item -->

     <li class="dt-side-nav__item">

        <a href="dashboard.php" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-menu icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Dashboard</span> </a>

      

      </li>

      
      <!-- Menu Header -->

      <li class="dt-side-nav__item dt-side-nav__header">

        <span class="dt-side-nav__text">Customers</span>

      </li>

      <!-- /menu header -->



      <!-- Menu Item -->

        <li class="dt-side-nav__item">

        <a href="newaccount.php" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-user-account icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">New Customer</span> </a>

      </li>
       <li class="dt-side-nav__item">

        <a href="managecustomers.php" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-visits icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Manage Customers</span> </a>

      </li>
      
       <!-- Menu Header -->

      <li class="dt-side-nav__item dt-side-nav__header">

        <span class="dt-side-nav__text">Transaction Management</span>

      </li>

  
   <!-- Menu Item -->

      <li class="dt-side-nav__item">

        <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Basic Components">

          <i class="icon icon-users icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Bank Transfers</span> </a>



        <!-- Sub-menu -->

        <ul class="dt-side-nav__sub-menu">

          <li class="dt-side-nav__item">

            <a href="pendingtransfer.php" class="dt-side-nav__link" title="Alerts"> <i class="icon icon-user-add icon-fw icon-lg"></i>

              <span class="dt-side-nav__text">Approve</span> </a>

          </li>



          <li class="dt-side-nav__item">

            <a href="viewalltransfers.php" class="dt-side-nav__link" title="Badges"> <i class="icon icon-user-account icon-fw icon-lg"></i>

              <span class="dt-side-nav__text">View All</span> </a>

          </li>

        </ul>



    
      </li>
      <!-- Menu Header -->

      <li class="dt-side-nav__item dt-side-nav__header">

        <span class="dt-side-nav__text">Savings Management</span>

      </li>

      <!-- /menu header -->

		<li class="dt-side-nav__item">

        <a href="debitcutomer.php" class="dt-side-nav__link" title="Basic Form"> <i class="icon icon-dollar-circle icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Debit Account</span> </a>

      </li>
      <li class="dt-side-nav__item">

        <a href="creditcutomer.php" class="dt-side-nav__link" title="Basic Form"> <i class="icon icon-forms-basic icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Credit Account</span> </a>

      </li>
      
      <!-- /menu item -->




      <!-- Menu Item -->

      <li class="dt-side-nav__item">

        <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Basic Components">

          <i class="icon icon-users icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">History</span> </a>



        <!-- Sub-menu -->

        <ul class="dt-side-nav__sub-menu">

          <li class="dt-side-nav__item">

            <a href="credithistory.php" class="dt-side-nav__link" title="Alerts"> <i class="icon icon-user-add icon-fw icon-lg"></i>

              <span class="dt-side-nav__text">Credit History</span> </a>

          </li>



          <li class="dt-side-nav__item">

            <a href="debithistory.php" class="dt-side-nav__link" title="Badges"> <i class="icon icon-user-account icon-fw icon-lg"></i>

              <span class="dt-side-nav__text">Debit History</span> </a>

          </li>

        </ul>

        <!-- /sub-menu -->

      </li>

      <!-- Menu Header -->

      <li class="dt-side-nav__item dt-side-nav__header">

        <span class="dt-side-nav__text">Loan Management</span>

      </li>

      <!-- /menu header -->



      <!-- Menu Item -->

      <!-- /menu item -->
      
      <li class="dt-side-nav__item">

        <a href="loanapplications.php" class="dt-side-nav__link" title="File Upload"> <i class="icon icon-dollar icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Loan Applications</span> </a>

      </li>

      <li class="dt-side-nav__item">

        <a href="disburse.php" class="dt-side-nav__link" title="File Upload"> <i class="icon icon-dollar icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Disburse Loan</span> </a>

      </li>

      <!-- /menu item -->
      
      <li class="dt-side-nav__item">

        <a href="loanpayhistory.php" class="dt-side-nav__link" title="File Upload"> <i class="icon icon-file-upload icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Payment History</span> </a>

      </li>

      <!-- /menu item -->



      <!-- Menu Header -->

      <li class="dt-side-nav__item dt-side-nav__header">

        <span class="dt-side-nav__text">Messages</span>

      </li>

      <!-- /menu header -->



      

      <li class="dt-side-nav__item">

        <a href="inbox.php" class="dt-side-nav__link" title="Notifications">

          <i class="icon icon-mail icon-fw icon-lg"></i> <span class="dt-side-nav__text">Inbox</span>

        </a>

      </li>

      <li class="dt-side-nav__item">

        <a href="sent.php" class="dt-side-nav__link" title="Drag & Drop"> <i class="icon icon-send icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Sent Messages</span> </a>

      </li>

      <!-- /menu item -->
      
      
      



      <!-- Menu Header -->

      <li class="dt-side-nav__item dt-side-nav__header">

        <span class="dt-side-nav__text">Account Settings</span>

      </li>

      <!-- /menu header -->

       <li class="dt-side-nav__item">

        <a href="staffpass.php" class="dt-side-nav__link" title="Drag & Drop"> <i class="icon icon-send icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Account Password</span> </a>


      <!-- /menu item -->



      <!-- Menu Header -->

      <li class="dt-side-nav__item dt-side-nav__header">

        <span class="dt-side-nav__text">Logout</span>

      </li>

      <li class="dt-side-nav__item">

        <a href="logout.php" class="dt-side-nav__link" title="Drag & Drop"> <i class="icon icon-logout icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Logout</span> </a>

      </li>

    <!-- /sidebar navigation -->



  </div>

</aside>

<!-- /sidebar -->
