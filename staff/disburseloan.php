<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");

if(!($_SESSION["staffid"]))
{
		header("Location: login.php");
}
$dts = date("Y-m-d h:i:s");
mysql_query("UPDATE customers SET lastlogin='$dts' WHERE customerid='$_SESSION[customerid]'");
$results = mysql_query("SELECT * FROM loan WHERE  loanid='$_SESSION[customerid]'");

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

                    <div class="dt-page__header">

                        <h1 class="dt-page__title"><?php echo "Disburse Loan"; ?></h1>

                    </div>
<?php
			if(isset($_POST[pay]))
			{ ?>
			
			 <?php	
				  	$result3 = mysql_query("select * from loan WHERE loanid='$_POST[payto]'");
                                        $arrpayment3 = mysql_fetch_array($result3);
                                        $aamt=0;
                                        for($i=0;$i<mysql_num_rows($x);$i++)
                                        {
                                        $arrpayment2 = mysql_fetch_array($x);
                                        $aamt = $aamt+$arrpayment2[amount];
                                        }
                                    
                                        $balance = $arrpayment3[loanamt] + ($arrpayment3[interest]*$arrpayment3[loanamt]/100) - $aamt;
                                         $int= $balance-$arrpayment3[loanamt];
                  ?>
                   <?php	
				  	$result3 = mysql_query("select * from customers WHERE customerid='$_POST[custid]'");
                                        $arrpayment4 = mysql_fetch_array($result3);
                                       
                  ?>
                  <?php
			}?>
                    <!-- Profile -->
                    <div class="profile">
				     <!-- Profile Content -->
                        <div class="profile-content">

                            <!-- Grid -->
                            <div class="row">

                                <!-- Grid Item -->
                                <div class="col-xl-4 order-xl-2">


                                    <!-- Grid -->
                                    <div class="row">

                                        <!-- Grid Item -->
                                        <div class="col-xl-12 col-md-6 col-12 order-xl-2">

                                            <!-- Card -->
                                           
                                        </div>
                                        <!-- /grid item -->

                                      

                                    </div>
                                    <!-- /grid -->

                                </div>
                                <!-- /grid item -->

                                <!-- Grid Item -->
                                <div class="col-xl-12 order-xl-1">

                                    <!-- Card -->
                                    <div class="card">

                                        <!-- Card Header -->
                                        <div class="card-header card-nav bg-transparent d-sm-flex justify-content-sm-between">
                                            <h3 class="mb-2 mb-sm-n5">Loan Status</h3>

                                            <ul class="card-header-links nav nav-underline" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#tab-pane1"
                                                       role="tab"
                                                       aria-controls="tab-pane1"
                                                       aria-selected="true">Loan Overview</a>
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
                                                                    <span class="d-block text-light-gray f-12 mb-1">Loan Number</span>
                                                                    <p class="h5 mb-0"><? echo $arrpayment3[loannumber];?></p>
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

                                                                <i class="icon icon-calendar icon-4x mr-5 align-self-center text-yellow"></i>

                                                                <!-- Media Body -->
                                                                <div class="media-body">
                                                                    <span class="d-block text-light-gray f-12 mb-1">Application Date</span>
                                                                    <p class="h5 mb-0"><? echo $arrpayment3[startdate];?></p>
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

                                                                <i class="icon icon-dollar-circle icon-4x mr-5 align-self-center text-yellow"></i>

                                                                <!-- Media Body -->
                                                                <div class="media-body">
                                                                    <span class="d-block text-light-gray f-12 mb-1">Loan Amount</span>
                                                                    <p class="h5 mb-0"><? echo $arrpayment3[loanamt];?></p>
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

                                                                <i class="icon icon-chart-bar icon-4x mr-5 align-self-center text-yellow"></i>

                                                                <!-- Media Body -->
                                                                <div class="media-body">
                                                                    <span class="d-block text-light-gray f-12 mb-1">Intrest Rate</span>
                                                                    <p class="h5 mb-0"><? echo $arrpayment3[interest];?></p>
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

                                                                <i class="icon icon-chart-pie icon-4x mr-5 align-self-center text-yellow"></i>

                                                                <!-- Media Body -->
                                                                <div class="media-body">
                                                                    <span class="d-block text-light-gray f-12 mb-1">Interest</span>
                                                                    <p class="h5 mb-0"><? echo $int;?></p>
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
                                                                    <span class="d-block text-light-gray f-12 mb-1">Total</span>
                                                                    <p class="h5 mb-0"><? echo $balance;?></p>
                                                                </div>
                                                                <!-- /media body -->

                                                            </div>
                                                            <!-- /media -->
                                                        </li>
                                                        <!-- /list item -->
                                                        
                                                         <!-- /list item -->
 <!-- List Item -->
                                                        <li class="dt-list__item">
                                                            <!-- Media -->
                                                            <div class="media">

                                                                <i class="icon icon-diamond icon-4x mr-5 align-self-center text-yellow"></i>

                                                                <!-- Media Body -->
                                                                <div class="media-body">
                                                                    <span class="d-block text-light-gray f-12 mb-1">Loan Status</span>
                                                                    <p class="h5 mb-0">
                                                                    <span class="badge badge-pill badge-danger mb-1 mr-1"><? if ($arrpayment3[status]=='0') print "loan Is Unapproved";?></span>
																	<span class="badge badge-pill badge-info mb-1 mr-1"><? if ($arrpayment3[status]=='1') print "Loan Approved And Awaiting Fund Disbursement";?></span>
																	<span class="badge badge-pill badge-success mb-1 mr-1"><? if ($arrpayment3[status]=='2') print "Fund Disbursed And Is Loan Is Active";?></span>
                                                                    </p>
                                                                </div>
                                                                <!-- /media body -->

                                                            </div>
                                                            <!-- /media -->
                                                        </li>
                                                        <!-- /list item -->
                                                        
                                                        
<br><br>
                                                      

                                                </div>
                                                <!-- /tab panel -->

                                                <form method='post' action='disburse.php' >
 <input hidden value='<? echo $arrpayment3[loanid];?>' name='payto'>
  <input hidden value='<? echo $arrpayment3[interest];?>' name='inti'>
 <? if ($arrpayment3[status]=='1') print " <label>User Applied For $arrpayment3[loanamt] Please Enter Amount To Disburse To User</label>
    <input placeholder='Enter Amount To Disburse' class='form-control' hiden name='amt'><br>
 <input type='submit' class='btn btn-info' name='disburse'  value='Disburse Fund' />";?>
</form>
                                                
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

                </div></div>
                <!-- /site content -->
                
<?php include'footer.php' ?>