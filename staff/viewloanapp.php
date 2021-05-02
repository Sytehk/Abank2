<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");

if(!($_SESSION["staffid"]))
{
		header("Location: login.php");
}
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

?>

<!-- Site Content Wrapper -->
            <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <div class="dt-page__header">

                        <h1 class="dt-page__title"><?php echo "Loan Details"; ?></h1>

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

                                        <!-- Grid Item -->
                                        <div class="col-xl-12 col-md-6 col-12 order-xl-1">

                                            <!-- Card -->
                                            <div class="dt-card dt-card__full-height">

                                                <!-- Card Header -->
                                                <div class="dt-card__header pt-6">

                                                    <!-- Card Heading -->
                                                    <div class="dt-card__heading">
                                                        <h3 class="dt-card__title">Account Holder</h3>
                                                    </div>
                                                    <!-- /card heading -->

                                                </div>
                                                <!-- /card header -->

                                                <!-- Card Body -->
                                                <div class="dt-card__body">
                                                    <!-- Media -->
                                                    <div class="media mb-5">

                                                        <i class="icon icon-user icon-xl mr-5"></i>
<!-- Media Body -->
                                                        <div class="media-body">
                                                            <span class="d-block text-light-gray f-12 mb-1">Customer's Name</span>
                                                            <a href="javascript:void(0)"><? echo $arrpayment4[firstname];?> <? echo $arrpayment4[lastname];?></a>
                                                        </div>
                                                        <!-- /media body -->
                                                        <!-- Media Body -->
                                                        

                                                    </div>
                                                    <!-- /media -->

                                                    <!-- Media -->
                                                    <div class="media mb-5">

                                                        <i class="icon icon-phone-o icon-xl mr-5"></i>

                                                        <!-- Media Body -->
                                                        <div class="media-body">
                                                            <span class="d-block text-light-gray f-12 mb-1">Phone</span>
                                                            <a href="javascript:void(0)"><? echo $arrpayment4[phone];?></a>
                                                        </div>
                                                        <!-- /media body -->

                                                    </div>
                                                    <!-- /media -->

                                                    <!-- Media -->
                                                    <div class="media">

                                                        <i class="icon icon-mail icon-xl mr-5"></i>

                                                        <!-- Media Body -->
                                                        <div class="media-body">
                                                            <span class="d-block text-light-gray f-12 mb-1">Email</span>
                                                            <a href="javascript:void(0)"><span class="h5"><? echo $arrpayment4[email];?></span></a>
                                                        </div>
                                                        <!-- /media body -->

                                                    </div>
                                                    <!-- /media -->
                                                </div>
                                                <!-- /card body -->

                                            </div>
                                            <!-- /card -->

                                        </div>
                                        <!-- /grid item -->

                                    </div>
                                    <!-- /grid -->

                                </div>
                                <!-- /grid item -->

                                <!-- Grid Item -->
                                <div class="col-xl-8 order-xl-1">

                                    <!-- Card -->
                                    <div class="card">

                                        <!-- Card Header -->
                                        <div class="card-header card-nav bg-transparent d-sm-flex justify-content-sm-between">
                                            <h3 class="mb-2 mb-sm-n5">Loan</h3>

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
																	<span class="badge badge-pill badge-info mb-1 mr-1"><? if ($arrpayment3[status]=='1') print "Awaiting Fund Disbursement";?></span>
																	<span class="badge badge-pill badge-success mb-1 mr-1"><? if ($arrpayment3[status]=='2') print "Loan Is Active";?></span>
                                                                    </p>
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
<? if ($arrpayment3[status]=='2') print "
                                                                <i class='icon icon-dollar-circle icon-4x mr-5 align-self-center text-yellow'></i>

                                                                <!-- Media Body -->
                                                                <div class='media-body'>
                                                                    <span class='d-block text-light-gray f-12 mb-1'>Unpaid Balance</span>
                                                                    <p class='h5 mb-0'>
                                                                   	<span class='badge badge-pill badge-success mb-1 mr-1'>$arrpayment3[balance]</span>
                                                                    </p>
                                                                </div>
                                                                <!-- /media body -->

                                                            </div>
                                                            <!-- /media -->
                                                        </li>
                                                        <!-- /list item -->";?>
                                                        
                                                        
<br><br>
                                                      

                                                </div>
                                                <!-- /tab panel -->

                                                <form method='post' action='loanapplications.php' >
 <input hidden value='<? echo $arrpayment3[loanid];?>' name='payto'>
  <input hidden value='<? echo $balance;?>' name='bal'>
<? if ($arrpayment3[status]=='0') print "<input type='submit' class='btn btn-primary' name='approve'  value='Approve' /> ";?>
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