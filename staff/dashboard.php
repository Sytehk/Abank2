<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");

if(!($_SESSION["staffid"]))
{
		header("Location: login.php");
}
?>
      <!-- Site Content Wrapper -->
      <div class="dt-content-wrapper">

        <!-- Site Content -->
        <div class="dt-content">

          <!-- Page Header -->
          <div class="dt-page__header">
            <h1 class="dt-page__title">Staff Dashboard</h1>
          </div>
          <!-- /page header -->

          <!-- Grid -->
          <div class="row">

            <!-- Grid Item -->
            <div class="col-xl-3 col-sm-6">
              <!-- Card -->
              <div class="dt-card">
<? $users = mysql_query("select * from customers"); ?>
<? $login = mysql_query("select * from customers "); ?>
 <?php	
while($arrow = mysql_fetch_array($login))
	  { $lastlogin=$arrow[lastlogin];
	   ; }?>

                <!-- Card Body -->
                <div class="dt-card__body d-flex flex-sm-column">
                  <div class="mb-sm-7 mr-7 mr-sm-0">
                    <i class="icon icon-users dt-icon-bg bg-primary text-primary"></i>
                  </div>
                  <div class="flex-1">
                    <div class="d-flex align-items-center mb-2">
                      <span class="h4 mb-0 font-weight-medium mr-2"><?php echo mysql_num_rows($users); ?> Customers</span>
                     
                    </div>
                    <div class="h5 mb-2">Total Customers</div>
                    <p class="card-text text-light-gray f-12">Last user login <? $query="SELECT MAX(lastlogin) FROM customers"; 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
  print "$row[0]";
 }
?></p>
                  </div>
                </div>
                <!-- /card body -->

              </div>
              <!-- /card -->
            </div>
            <!-- /grid item -->

            <!-- Grid Item -->
            <div class="col-xl-3 col-sm-6">
              <!-- Card -->
              <div class="dt-card">

                <!-- Card Body -->
                <div class="dt-card__body d-flex flex-sm-column">
                  <div class="mb-sm-7 mr-7 mr-sm-0">
                    <i class="icon icon-company dt-icon-bg bg-success text-success"></i>
                  </div>
                  <div class="flex-1">
                    <div class="d-flex align-items-center mb-2">
                      <span class="h4 mb-0 font-weight-medium mr-2"><? $query="SELECT sum(amount) FROM transactions where type='Credit' AND cashier='$_SESSION[staffid]'"; 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
  print "$cur $row[0]";
 }
?></span>



<?php 
					  
					  $query="SELECT * FROM transactions where type='credit' AND cashier='$_SESSION[staffid]'"; 
 $result = mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{
	
	$savedamount="$row[amount]";}
?>
                    
                    </div>
                    <div class="h5 mb-2">Total Credits By Me</div>
                    <p class="card-text text-light-gray f-12">Last Credited: <? echo "$cur $savedamount";?></p>
                  </div>
                </div>
                <!-- /card body -->

              </div>
              <!-- /card -->
            </div>
            <!-- /grid item -->

            <!-- Grid Item -->
            <div class="col-xl-3 col-sm-6">
              <!-- Card -->
              <div class="dt-card">

                <!-- Card Body -->
                <div class="dt-card__body d-flex flex-sm-column">
                  <div class="mb-sm-7 mr-7 mr-sm-0">
                    <i class="icon icon-customer dt-icon-bg bg-secondary text-secondary"></i>
                  </div>
                  <div class="flex-1">
                    <div class="d-flex align-items-center mb-2">
                      <span class="h4 mb-0 font-weight-medium mr-2"><? $query="SELECT sum(amount) FROM transactions where type='Debit' AND cashier='$_SESSION[staffid]'"; 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
  print "$cur $row[0]";
 }
?></span>
             
             <?php 
					  
					  $query="SELECT * FROM transactions where type='Debit' AND cashier='$_SESSION[staffid]'"; 
 $result = mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{
	
	$withamount="$row[amount]";}
?>
         
                    </div>
                    <div class="h5 mb-2">Total Debits By Me</div>
                    <p class="card-text text-light-gray f-12">Last Debited  <? echo "$cur $withamount";?> </p>
                  </div>
                </div>
                <!-- /card body -->

              </div>
              <!-- /card -->
            </div>
            <!-- /grid item -->

            <!-- Grid Item -->
            <div class="col-xl-3 col-sm-6">
              <!-- Card -->
              <div class="dt-card">

<?php 
					  
					  $query="SELECT * FROM  loan "; 
 $result = mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{
	
	$lastloan="$row[loanamt]";}
?>
                <!-- Card Body -->
                <div class="dt-card__body d-flex flex-sm-column">
                  <div class="mb-sm-7 mr-7 mr-sm-0">
                    <i class="icon icon-revenue-new dt-icon-bg bg-orange text-orange"></i>
                  </div>
                  <div class="flex-1">
                    <div class="d-flex align-items-center mb-2">
                      <span class="h4 mb-0 font-weight-medium mr-2"><? $query="SELECT sum(loanamt) FROM loan where status=2 and signed='$_SESSION[staffid]'"; 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
  print "$cur $row[0]";
  
  $loan=$row[0];
 }
?></span>

<? $query="SELECT loanamt FROM loan where status=2 and signed='$_SESSION[staffid]'"; 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 
  
  $loanpay=$row[0];
 }
?>
                    
                    </div>
                    <div class="h5 mb-2">Loan Disbursed By Me</div>
                    <p class="card-text text-light-gray f-12">Last Disbursed: <? echo "$cur $lastloan";?></p>
                  </div>
                </div>
                <!-- /card body -->

              </div>
              <!-- /card -->
            </div>
            <!-- /grid item -->

           

          </div>
          <!-- /grid -->



          <!-- Grid -->
          <div class="row">

     <!-- Grid Item -->
            <div class="col-xl-6 order-xl-2">

              <!-- Card -->
              <div class="card">

                <!-- Card Header -->
                <div class="card-header card-nav bg-transparent">

                  <ul class="card-header-links nav nav-underline nav-scroll text-uppercase"
                      role="tablist">
                    
                    
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#tab-pane2" role="tab"
                         aria-controls="tab-pane2"
                         aria-selected="true">Pending Loan</a>
                    </li>
                <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#tab-pane4" role="tab"
                         aria-controls="tab-pane4"
                         aria-selected="true"></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#tab-pane3" role="tab"
                         aria-controls="tab-pane3"
                         aria-selected="true">Approved Loan</a>
                    </li>
                    
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#tab-pane4" role="tab"
                         aria-controls="tab-pane3"
                         aria-selected="true">Disbursed Loan</a>
                    </li>
                    
                  </ul>

                </div>
                <!-- /card header -->

                <!-- Card Body -->
                <div class="card-body px-0 pt-4">

                  <!-- Tab Content-->
                  <div class="tab-content">

           

                    <!-- Tab panel -->
                <!-- Tab panel -->
                    <div id="tab-pane2" class="tab-pane active">

                      <!-- Widget -->
                      <div class="dt-widget dt-widget-sm dt-widget-hover">
<?php	
 $savearray = mysql_query("select * from loan where status=0 ORDER BY loanid DESC LIMIT 3");
 while($save = mysql_fetch_array($savearray))
	  {?> 
                       
                        <!-- Widget Item -->
                        <div class="dt-widget__item">

                          <!-- Widget Image -->
                          <div class="dt-widget__img">
                            <!-- Avatar -->
                            <img class="dt-avatar size-30"
                                 src="../assets/images/icon-account.png" alt="User">
                            <!-- /avatar -->
                          </div>
                          <!-- /widget image -->

                           <!-- Widget Info -->
                           <div class="dt-widget__info text-truncate">
                            <a class="dt-widget__title text-truncate"
                               href="javascript:void(0)">Loan ID<br><? echo "$save[loannumber]" ?></a>
                          </div>
                          <div class="dt-widget__info text-truncate">
                            <a class="dt-widget__title text-truncate"
                               href="javascript:void(0)">Amount<br><? echo "$cur$save[loanamt]" ?></a>
                          </div>
                         
                          <!-- /widget info -->

                          <!-- Widget Extra -->
                          <div class="dt-widget__extra min-w-60 text-center align-self-center">
                           <span class="badge badge-pill badge-danger mb-1 mr-1">Pending</span>

                          </div>
                          <!-- /widget extra -->

                          <!-- Dropdown -->
                          <div class="dropdown align-self-center ml-1 ml-sm-10">
                            <a class="dropdown-toggle no-arrow" href="#"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                              <i class="icon icon-vertical-more icon-fw text-light-gray"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item"
                                 href="loanapplications.php">View</a>
                             
                            </div>
                          </div>
                          <!-- /dropdown -->

                        </div>
                        <!-- /widgets item -->

                        <!-- Widget Link -->
                        
                        <!-- /widget link -->
<?}?>					<div class="dt-widget-link">
                          <a href="loanapplications.php"
                             class="text-uppercase font-weight-medium">View All Pending Loan</a>
                        </div>
                      </div>
                      <!-- /widget -->

                    </div>
                    <!-- /tab panel -->

                    <!-- Tab panel -->
                    <div id="tab-pane3" class="tab-pane">

                      <!-- Widget -->
                      <div class="dt-widget dt-widget-sm dt-widget-hover">
<?php	
 $savearray = mysql_query("select * from loan where status=1 ORDER BY loanid DESC LIMIT 3");
 while($save = mysql_fetch_array($savearray))
	  {?>  
                       
                        <!-- Widget Item -->
                        <div class="dt-widget__item">

                          <!-- Widget Image -->
                          <div class="dt-widget__img">
                            <!-- Avatar -->
                            <img class="dt-avatar size-30"
                                 src="../assets/images/icon-account.png" alt="User">
                            <!-- /avatar -->
                          </div>
                          <!-- /widget image -->

                           <!-- Widget Info -->
                           <div class="dt-widget__info text-truncate">
                            <a class="dt-widget__title text-truncate"
                               href="javascript:void(0)">Loan ID<br><? echo "$save[loannumber]" ?></a>
                          </div>
                          <div class="dt-widget__info text-truncate">
                            <a class="dt-widget__title text-truncate"
                               href="javascript:void(0)">Amount<br><? echo "$cur$save[loanamt]" ?></a>
                          </div>
                          <!-- /widget info -->

                          <!-- Widget Extra -->
                          <div class="dt-widget__extra min-w-60 text-center align-self-center">
                           <span class="badge badge-pill badge-success mb-1 mr-1">Successful</span>

                          </div>
                          <!-- /widget extra -->

                          <!-- Dropdown -->
                          <div class="dropdown align-self-center ml-1 ml-sm-10">
                            <a class="dropdown-toggle no-arrow" href="#"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                              <i class="icon icon-vertical-more icon-fw text-light-gray"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item"
                                 href="disburse.php">View</a>
                            
                            </div>
                          </div>
                          <!-- /dropdown -->

                        </div>
                        <!-- /widgets item -->

                        <!-- Widget Link -->
                        
                        <!-- /widget link -->
<?}?>					<div class="dt-widget-link">
                          <a href="disburse.php"
                             class="text-uppercase font-weight-medium">View All Successful Loan</a>
                        </div>
                      </div>
                      <!-- /widget -->

                    </div>
                    <!-- /tab panel -->
                    
                    
                    <!-- Tab panel -->
                    <div id="tab-pane4" class="tab-pane">

                      <!-- Widget -->
                      <div class="dt-widget dt-widget-sm dt-widget-hover">
<?php	
 $savearray = mysql_query("select * from loan where status=2 ORDER BY loanid DESC LIMIT 3");
 while($save = mysql_fetch_array($savearray))
	  {?>  
                       
                        <!-- Widget Item -->
                        <div class="dt-widget__item">

                          <!-- Widget Image -->
                          <div class="dt-widget__img">
                            <!-- Avatar -->
                            <img class="dt-avatar size-30"
                                 src="../assets/images/icon-account.png" alt="User">
                            <!-- /avatar -->
                          </div>
                          <!-- /widget image -->

                           <!-- Widget Info -->
                           <div class="dt-widget__info text-truncate">
                            <a class="dt-widget__title text-truncate"
                               href="javascript:void(0)">Loan ID<br><? echo "$save[loannumber]" ?></a>
                          </div>
                          <div class="dt-widget__info text-truncate">
                            <a class="dt-widget__title text-truncate"
                               href="javascript:void(0)">Amount<br><? echo "$cur$save[loanamt]" ?></a>
                          </div>
                          <!-- /widget info -->

                          <!-- Widget Extra -->
                          <div class="dt-widget__extra min-w-60 text-center align-self-center">
                           <span class="badge badge-pill badge-info mb-1 mr-1">Disbursed</span>

                          </div>
                          <!-- /widget extra -->

                          <!-- Dropdown -->
                          <div class="dropdown align-self-center ml-1 ml-sm-10">
                            <a class="dropdown-toggle no-arrow" href="#"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                              <i class="icon icon-vertical-more icon-fw text-light-gray"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item"
                                 href="disburse.php">View</a>
                            
                            </div>
                          </div>
                          <!-- /dropdown -->

                        </div>
                        <!-- /widgets item -->

                        <!-- Widget Link -->
                        
                        <!-- /widget link -->
<?}?>					<div class="dt-widget-link">
                          <a href="disburse.php"
                             class="text-uppercase font-weight-medium">View All Disbursed Loan</a>
                        </div>
                      </div>
                      <!-- /widget -->

                    </div>
                    <!-- /tab panel -->

                  

                  </div>
                  <!-- /tab content-->

                </div>
                <!-- /card body -->

              </div>
              <!-- /card -->

            </div>
            <!-- /grid item -->

           

            <!-- Grid Item -->
            <div class="col-xl-6 order-xl-2">

              <!-- Card -->
              <div class="card">

                <!-- Card Header -->
                <div class="card-header card-nav bg-transparent">

                  <ul class="card-header-links nav nav-underline nav-scroll text-uppercase"
                      role="tablist">
                    
                    
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#tab-pane5" role="tab"
                         aria-controls="tab-pane2"
                         aria-selected="true">Pending Transfer</a>
                    </li>
                <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#tab-pane1" role="tab"
                         aria-controls="tab-pane4"
                         aria-selected="true"></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#tab-pane6" role="tab"
                         aria-controls="tab-pane3"
                         aria-selected="true">Approved Transfer</a>
                    </li>
                    
                  </ul>

                </div>
                <!-- /card header -->

                <!-- Card Body -->
                <div class="card-body px-0 pt-4">

                  <!-- Tab Content-->
                  <div class="tab-content">

           

                    <!-- Tab panel -->
                <!-- Tab panel -->
                    <div id="tab-pane5" class="tab-pane active">

                      <!-- Widget -->
                      <div class="dt-widget dt-widget-sm dt-widget-hover">
<?php	
 $savearray = mysql_query("select * from transfers where status=0 ORDER BY id DESC LIMIT 3");
 while($save = mysql_fetch_array($savearray))
	  {?> 
                       
                        <!-- Widget Item -->
                        <div class="dt-widget__item">

                          <!-- Widget Image -->
                          <div class="dt-widget__img">
                            <!-- Avatar -->
                            <img class="dt-avatar size-30"
                                 src="../assets/images/icon-account.png" alt="User">
                            <!-- /avatar -->
                          </div>
                          <!-- /widget image -->

                           <!-- Widget Info -->
                           <div class="dt-widget__info text-truncate">
                            <a class="dt-widget__title text-truncate"
                               href="javascript:void(0)">Bank<br><? echo "$save[bank]" ?></a>
                          </div>
                          <div class="dt-widget__info text-truncate">
                            <a class="dt-widget__title text-truncate"
                               href="javascript:void(0)">Amount<br><? echo "$cur$save[amount]" ?></a>
                          </div>
                         
                          <!-- /widget info -->

                          <!-- Widget Extra -->
                          <div class="dt-widget__extra min-w-60 text-center align-self-center">
                           <span class="badge badge-pill badge-danger mb-1 mr-1">Pending</span>

                          </div>
                          <!-- /widget extra -->

                          <!-- Dropdown -->
                          <div class="dropdown align-self-center ml-1 ml-sm-10">
                            <a class="dropdown-toggle no-arrow" href="#"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                              <i class="icon icon-vertical-more icon-fw text-light-gray"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item"
                                 href="javascript:void(0)">View</a>
                             
                            </div>
                          </div>
                          <!-- /dropdown -->

                        </div>
                        <!-- /widgets item -->

                        <!-- Widget Link -->
                        
                        <!-- /widget link -->
<?}?>					<div class="dt-widget-link">
                          <a href="pendingtransfer.php"
                             class="text-uppercase font-weight-medium">View All Pending Transactions</a>
                        </div>
                      </div>
                      <!-- /widget -->

                    </div>
                    <!-- /tab panel -->

                    <!-- Tab panel -->
                    <div id="tab-pane6" class="tab-pane">

                      <!-- Widget -->
                      <div class="dt-widget dt-widget-sm dt-widget-hover">
<?php	
 $savearray = mysql_query("select * from transfers where status=1 ORDER BY id DESC LIMIT 3");
 while($save = mysql_fetch_array($savearray))
	  {?> 
                       
                        <!-- Widget Item -->
                        <div class="dt-widget__item">

                          <!-- Widget Image -->
                          <div class="dt-widget__img">
                            <!-- Avatar -->
                            <img class="dt-avatar size-30"
                                 src="../assets/images/icon-account.png" alt="User">
                            <!-- /avatar -->
                          </div>
                          <!-- /widget image -->

                           <!-- Widget Info -->
                           <div class="dt-widget__info text-truncate">
                            <a class="dt-widget__title text-truncate"
                               href="javascript:void(0)">Bank<br><? echo "$save[bank]" ?></a>
                          </div>
                          <div class="dt-widget__info text-truncate">
                            <a class="dt-widget__title text-truncate"
                               href="javascript:void(0)">Amount<br><? echo "$cur$save[amount]" ?></a>
                          </div>
                         
                          <!-- /widget info -->

                          <!-- Widget Extra -->
                          <div class="dt-widget__extra min-w-60 text-center align-self-center">
                           <span class="badge badge-pill badge-success mb-1 mr-1">Successful</span>

                          </div>
                          <!-- /widget extra -->

                          <!-- Dropdown -->
                          <div class="dropdown align-self-center ml-1 ml-sm-10">
                            <a class="dropdown-toggle no-arrow" href="#"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                              <i class="icon icon-vertical-more icon-fw text-light-gray"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item"
                                 href="viewalltransfers.php">View</a>
                            
                            </div>
                          </div>
                          <!-- /dropdown -->

                        </div>
                        <!-- /widgets item -->

                        <!-- Widget Link -->
                        
                        <!-- /widget link -->
<?}?>					<div class="dt-widget-link">
                          <a href="alltransfers.php"
                             class="text-uppercase font-weight-medium">View all Successful Transaction</a>
                        </div>
                      </div>
                      <!-- /widget -->

                    </div>
                    <!-- /tab panel -->

                  

                  </div>
                  <!-- /tab content-->

                </div>
                <!-- /card body -->

              </div>
              <!-- /card -->

            </div>
            <!-- /grid item -->

           
                      </div>
                      <!-- /grid -->
                    </div>
                    <!-- /tab panel -->

                   
                  </div></div></div></div></div></div>
                  <!-- /tab content-->

          
           


<? include("footer.php");?>