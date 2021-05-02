<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

$dts = date("Y-m-d h:i:s");
mysql_query("UPDATE customers SET lastlogin='$dts' WHERE customerid='$_SESSION[customerid]'");
$sqlq = mysql_query("select * from transaction where paymentstat='Pending'");
$mailreq = mysql_query("select * from mail where reciverid='".$_SESSION['customerid']."'");
$results = mysql_query("SELECT * FROM accounts WHERE  customerid='$_SESSION[customerid]'");

while($arrow = mysql_fetch_array($results))
{
	$acno = $arrow[accno];
	$status = $arrow[accstatus];	
	$accopen = $arrow[accopendate];	
	$acctype = $arrow[accounttype];	
	$accbal = $arrow[accountbalance];
	$email = $arrow[email];
	$phone = $arrow[phone];
}

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

$result = mysql_query("select * from customers WHERE customerid='$_SESSION[customerid]'");
$rowrec = mysql_fetch_array($result);
?>

<!-- Site Content Wrapper -->
          <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    
                    <!-- /page header -->
 <div class="dt-entry__header">

Account Summary                    </div>

                    <!-- Grid -->
                    <div class="row">

                        <!-- Grid Item -->
                        <div class="col-xl-12">
                    <!-- Profile -->
                    <div class="profile">
				     <!-- Profile Content -->
                        <div class="profile-content">

                            <!-- Grid -->
                            <div class="row">

                                <!-- Grid Item -->
                                <div class="col-xl-12 order-xl-2">


                                    <!-- Grid -->
                                    <div class="row">

                                        <!-- Grid Item -->
                                        <div class="col-xl-12 col-md-6 col-12 order-xl-2">

                                            <!-- Card -->
                                           
                                        </div>
                                        <!-- /grid item -->

                                      
                                <!-- Grid Item -->
                                <div class="col-xl-12 order-xl-1">

                                    <!-- Card -->
                                    <div class="card">

                                        <!-- Card Header -->
                                        <div class="card-header card-nav bg-transparent d-sm-flex justify-content-sm-between">
                                            
                                            <ul class="card-header-links nav nav-underline" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#tab-pane1"
                                                       role="tab"
                                                       aria-controls="tab-pane1"
                                                       aria-selected="true">Account Holder's Overview</a>
                                                </li>
                                              
                                            </ul>

                                        </div>
                                        <!-- /card header -->

                                        <!-- Card Body -->
                                        <div class="card-body pb-2">

                                            <!-- Tab Content-->
                                            <div class="tab-content mt-5">

                                                <!-- Tab panel -->
                                                <div id="tab-pane1" class="tab-pane active">

                                                    <!-- List -->
                                                    <ul class="dt-list dt-list-col-4">
                                                        <!-- List Item -->
                                                        <li class="dt-list__item">
                                                            <!-- Media -->
                                                            <div class="media">

                                                                <i class="icon icon-user icon-4x mr-5 align-self-center text-yellow"></i>

                                                                <!-- Media Body -->
                                                                <div class="media-body">
                                                                    <span class="d-block text-light-gray f-12 mb-1">Account Holder</span>
                                                                    <p class="h5 mb-0"><?php echo $_SESSION[customername]; ?></p>
                                                                </div>
                                                                <!-- /media body -->

                                                            </div>
                                                            <!-- /media -->
                                                        </li>
                                                        <!-- /list item -->
                                                         <!-- List Item -->
                                                        <li class="dt-list__item">
                                                            <!-- Media -->
                                                            <div class="media">

                                                                <i class="icon icon-mail icon-4x mr-5 align-self-center text-yellow"></i>

                                                                <!-- Media Body -->
                                                                <div class="media-body">
                                                                    <span class="d-block text-light-gray f-12 mb-1">Account Holder's Email</span>
                                                                    <p class="h5 mb-0"><?php echo $rowrec[email]; ?></p>
                                                                </div>
                                                                <!-- /media body -->

                                                            </div>
                                                            <!-- /media -->
                                                        </li>
                                                        <!-- /list item -->
                                                         <!-- List Item -->
                                                        <li class="dt-list__item">
                                                            <!-- Media -->
                                                            <div class="media">

                                                                <i class="icon icon-phone icon-4x mr-5 align-self-center text-yellow"></i>

                                                                <!-- Media Body -->
                                                                <div class="media-body">
                                                                    <span class="d-block text-light-gray f-12 mb-1">Account Holders's Phone</span>
                                                                    <p class="h5 mb-0"><?php echo $rowrec[phone]; ?></p>
                                                                </div>
                                                                <!-- /media body -->

                                                            </div>
                                                            <!-- /media -->
                                                        </li>
                                                        <!-- /list item -->
                                                         <!-- List Item -->
                                                        <li class="dt-list__item">
                                                            <!-- Media -->
                                                            <div class="media">

                                                                <i class="icon icon-location icon-4x mr-5 align-self-center text-yellow"></i>

                                                                <!-- Media Body -->
                                                                <div class="media-body">
                                                                    <span class="d-block text-light-gray f-12 mb-1">Account Holder's Country</span>
                                                                    <p class="h5 mb-0"><?php echo $rowrec[country]; ?></p>
                                                                </div>
                                                                <!-- /media body -->

                                                            </div>
                                                            <!-- /media -->
                                                        </li>
                                                        <!-- /list item -->

                                                        <!-- List Item -->
                                                        <li class="dt-list__item">
                                                            <!-- Media -->
                                                            <div class="media">

                                                                <i class="icon icon-date-time-picker icon-4x mr-5 align-self-center text-yellow"></i>

                                                                <!-- Media Body -->
                                                                <div class="media-body">
                                                                    <span class="d-block text-light-gray f-12 mb-1">Account Opening</span>
                                                                    <p class="h5 mb-0"><?php echo $accopen ; ?></p>
                                                                </div>
                                                                <!-- /media body -->

                                                            </div>
                                                            <!-- /media -->
                                                        </li>
                                                        <!-- /list item -->

                                                        <!-- List Item -->
                                                        <li class="dt-list__item">
                                                            <!-- Media -->
                                                            <div class="media">

                                                                <i class="icon icon-thumbs-up icon-4x mr-5 align-self-center text-yellow"></i>

                                                                <!-- Media Body -->
                                                                <div class="media-body">
                                                                    <span class="d-block text-light-gray f-12 mb-1">Account Status</span>
                                                                    <p class="h5 mb-0"><?php echo $rowrec[accstatus]; ?></p>
                                                                </div>
                                                                <!-- /media body -->

                                                            </div>
                                                            <!-- /media -->
                                                        </li>
                                                        <!-- /list item -->

                                                        <!-- List Item -->
                                                        <li class="dt-list__item">
                                                            <!-- Media -->
                                                            <div class="media">

                                                                <i class="icon icon-calculator icon-4x mr-5 align-self-center text-yellow"></i>

                                                                <!-- Media Body -->
                                                                <div class="media-body">
                                                                    <span class="d-block text-light-gray f-12 mb-1">Account Number</span>
                                                                    <p class="h5 mb-0"><?php echo $acno ; ?></p>
                                                                </div>
                                                                <!-- /media body -->

                                                            </div>
                                                            <!-- /media -->
                                                        </li>
                                                        <!-- /list item --><!-- List Item -->
                                                        <li class="dt-list__item">
                                                            <!-- Media -->
                                                            <div class="media">

                                                                <i class="icon icon-company icon-4x mr-5 align-self-center text-yellow"></i>

                                                                <!-- Media Body -->
                                                                <div class="media-body">
                                                                    <span class="d-block text-light-gray f-12 mb-1">Bank Branch Code</span>
                                                                    <p class="h5 mb-0"><?php echo $rowrec[ifsccode]; ?></p>
                                                                </div>
                                                                <!-- /media body -->

                                                            </div>
                                                            <!-- /media -->
                                                        </li>
                                                        <!-- /list item -->
                                                        
                                                         <!-- List Item -->
                                                        <li class="dt-list__item">
                                                            <!-- Media -->
                                                            <div class="media">

                                                                <i class="icon icon-login-page icon-4x mr-5 align-self-center text-yellow"></i>

                                                                <!-- Media Body -->
                                                                <div class="media-body">
                                                                    <span class="d-block text-light-gray f-12 mb-1">Last Login</span>
                                                                    <p class="h5 mb-0"><?php echo $rowrec[lastlogin]; ?></p>
                                                                </div>
                                                                <!-- /media body -->

                                                            </div>
                                                            <!-- /media -->
                                                        </li>
                                                        <!-- /list item -->

                                                      
                                                </div>
                                                <!-- /tab panel -->

                                               
                                                
                                            </div>
                                            <!-- /tab content-->

                                        </div>
                                        <!-- /card body -->

                                    </div>
                                    <!-- /card -->

                            </div>
                            <!-- /grid -->

                        </div>
                        <!-- /profile content -->

                    </div>
                    <!-- /profile -->

                </div></div></div>
                <!-- /site content -->
                
<?php include'footer.php' ?>