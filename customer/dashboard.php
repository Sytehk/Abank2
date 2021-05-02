<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

$dts =  date("l jS \of F Y ");
mysql_query("UPDATE customers SET lastlogin='$dts' WHERE customerid='$_SESSION[customerid]'");
$sqlq = mysql_query("select * from transaction where paymentstat='Pending'");
$mailreq = mysql_query("select * from mail where reciverid='".$_SESSION['customerid']."'  AND status=0 ");
$results = mysql_query("SELECT * FROM accounts WHERE  customerid='$_SESSION[customerid]'");
$results2 = mysql_query("SELECT * FROM customers WHERE  customerid='$_SESSION[customerid]'");
$mailreq = mysql_query("select * from mail where reciverid='".$_SESSION['customerid']."'  AND status='New' ");



if(isset($_POST['deposit']))
{
$now=$_POST['mone'];
mysql_query("UPDATE accounts SET accountbalance =accountbalance+'$now' WHERE customerid ='".$_SESSION['customerid']."'");
$sql="INSERT INTO loanpayment (customerid,loanid,paidamt,date) VALUES ('$_SESSION[customerid]','$_POST[lid]','$_POST[amt]','$dt')";
print "
				<script language='javascript'>
					window.location = 'dashboard.php';
				</script>
			";
}
?>


<!-- Site Content Wrapper -->

            <div class="dt-content-wrapper">

<?

if(isset($_POST['fixed']))
{
$query=mysqli_query($con,"insert fixed_deposit (customerid,accno, amount,duration,status) VALUES ('$_SESSION[customerid]','$_POST[act]','$_POST[amount]','$_POST[duration]','1')");
?>
<script>

swal('Successful!', 'Your Fixed Deposit Account Has Been Created. Your Fixed Deposit Account Number Is $_POST[act]', 'success') 

</script>

<?}
?>


                <!-- Site Content -->

                <div class="dt-content">



                    <!-- Page Header -->

                    <div class="dt-page__header">

                        <h1 class="dt-page__title"><?php echo $_SESSION[customername]; ?></h1>
<?php
echo date("l jS \of F Y ");
?>
                    </div>

                    <!-- /page header -->



                    <!-- Entry Header -->

                    <div class="dt-entry__header">



                        <!-- Entry Heading -->

                        <div class="dt-entry__heading">

                            <h3 class="dt-entry__title">Account Summary</h3>

                        </div>

                        <!-- /entry heading -->



                    </div>

                    <!-- /entry header -->



                    <!-- Grid -->

                    <div class="row mb-sm-8">


<?
$result = mysql_query("select * from accounts WHERE customerid='$_SESSION[customerid]'");
$rowrec = mysql_fetch_array($result);?>
<?
$result = mysql_query("select * from fixed_deposit WHERE customerid='$_SESSION[customerid]'");
$rowrec2 = mysql_fetch_array($result);?>
                        <!-- Grid Item -->

                        <div class="col-md-3 col-6">



                            <!-- Card -->

                            <div class="dt-card">



                                <!-- Card Body -->

                                <div class="dt-card__body p-xl-8 py-sm-8 py-6 px-4">



                                    <span class="badge badge-secondary badge-top-right">Main Account
		   </span>



                                    <!-- Media -->

                                    <div class="media">



                                        <i class="icon icon-revenue-new icon-5x mr-xl-5 mr-3 align-self-center"></i>



                                        <!-- Media Body -->

                                        <div class="media-body">

                                            <p class="mb-1 h6"><?php echo $rowrec[accounttype]; ?> Account</p>

                                            <span class="d-block text-light-gray">
			
			</span> Account N<u>o</u>:
<?php echo $rowrec[accno]; ?>



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
                        
                        



                        <!-- Grid Item -->

                        <div class="col-md-3 col-6">



                            <!-- Card -->

                            <div class="dt-card">



                                <!-- Card Body -->

                                <div class="dt-card__body p-xl-8 py-sm-8 py-6 px-4">



                                    <span class="badge badge-secondary badge-top-right">Main Account</span>



                                    <!-- Media -->

                                    <div class="media">



                                        <i class="icon icon-orders-new icon-5x mr-xl-5 mr-3 align-self-center"></i>



                                        <!-- Media Body -->

                                        <div class="media-body">

                                            <p class="mb-1 h6">Acct Balance:</p>

                                            <span class="d-block text-light-gray"><?php echo "$cur $rowrec[accountbalance]"; ?>
                                            <br><?php
echo date("jS \ F ");
?></span>

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
                        
                        
                        


                        <!-- Grid Item -->

                        <div class="col-md-3 col-6">



                            <!-- Card -->

                            <div class="dt-card">



                                <!-- Card Body -->

                                <div class="dt-card__body p-xl-8 py-sm-8 py-6 px-4">



                                    <span class="badge badge-secondary badge-top-right">Fixed Deposit</span>



                                    <!-- Media -->

                                    <div class="media">



                                        <i class="icon icon-orders-new icon-5x mr-xl-5 mr-3 align-self-center"></i>



                                        <!-- Media Body -->

                                        <div class="media-body">

                                            <p class="mb-1 h6">Fixed Deposit</p>

                                            <span class="d-block text-light-gray">Account N<u>o</u><br>
</span><?php echo $rowrec2[accno]; ?>
<? if($rowrec2<1) print"Not Available"; ?>

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
                        
                        
                         <!-- Grid Item -->

                        <div class="col-md-3 col-6">



                            <!-- Card -->

                            <div class="dt-card">



                                <!-- Card Body -->

                                <div class="dt-card__body p-xl-8 py-sm-8 py-6 px-4">


                                    <span class="badge badge-secondary badge-top-right">Fixed Deposit</span>



                                    <!-- Media -->

                                    <div class="media">



                                        <i class="icon icon-orders-new icon-5x mr-xl-5 mr-3 align-self-center"></i>



                                        <!-- Media Body -->

                                        <div class="media-body">

                                            <p class="mb-1 h6">Total Fixed</p>

                                            <span class="d-block text-light-gray"><?php echo "$cur $rowrec2[balance]"; ?>
<? if($rowrec2<1) print"Not Available"; ?><br>
</span><?php


echo date("jS F ");
?>

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
                        
                        
                        


                       
                                                <!-- Grid Item -->

                        <div class="col-md-3 col-6">



                            <!-- Card -->

                            <div class="dt-card">



                                <!-- Card Body -->

                                <div class="dt-card__body p-xl-8 py-sm-8 py-6 px-4">



                                    <span class="badge badge-secondary badge-top-right">Main Account</span>



                                    <!-- Media -->

                                    <div class="media">



                                        
                                        <i class="icon icon-revenue icon-5x mr-xl-5 mr-3 align-self-center"></i>



                                        <!-- Media Body -->

                                        <div class="media-body">

                                            <p class="mb-1 h4"> <?php
			echo "$arrow[accounttype]
     		   ";
			
		   ?></p>

                                            <span class="d-block text-light-gray"><?php
echo "Deposit Fund Into Account";?> 
</span>

                                        </div>

                                        <!-- /media body -->



                                    </div>

                                    <!-- /media --><hr>

<center><button type="button" a href="#myModal" data-toggle="modal" class="btn btn-secondary btn-sm mr-2 mb-2">Quick Deposit</button></center>

                                </div>

                                <!-- /card body -->



                            </div>

                            <!-- /card -->



                        </div>

                        <!-- /grid item -->
                                             
                                             
                                                <!-- Grid Item -->

                        <div class="col-md-3 col-6">



                            <!-- Card -->

                            <div class="dt-card">



                                <!-- Card Body -->

                                <div class="dt-card__body p-xl-8 py-sm-8 py-6 px-4">



                                    <span class="badge badge-secondary badge-top-right">Fixed Deposit</span>



                                    <!-- Media -->

                                    <div class="media">



                                        <i class="icon icon-lockscreen icon-5x mr-xl-5 mr-3 align-self-center"></i>



                                        <!-- Media Body -->

                                        <div class="media-body">

                                            <p class="mb-1 h4"> <?php
			echo "$arrow[accounttype]
     		   ";
			
		   ?></p>

                                            <span class="d-block text-light-gray"><?php
echo "Lock Fund Towards Goal:";?> 
</span>

                                        </div>

                                        <!-- /media body -->



                                    </div>

                                    <!-- /media --><hr>
                                    <?
 $query="SELECT * FROM  fixed_deposit where customerid  = '".$_SESSION['customerid']."'"; 
 
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$stat="$row[status]";
	
}

?>
<center><a href="fixeddeposit.php"><button <? if ($stat==1) print"hidden";
                
                ?> type="button" class="btn btn-secondary btn-sm mr-2 mb-2">Get Started</button></a>
                <button <? if ($stat==0) print"hidden";
                
                ?> type="button" a href="#myModal2" data-toggle="modal" class="btn btn-secondary btn-sm mr-2 mb-2">Deposit Fund</button></center>


                                </div>

                                <!-- /card body -->



                            </div>

                            <!-- /card -->



                        </div>

                        <!-- /grid item -->
                        
                        



                        <!-- Grid Item -->

                        <div class="col-md-6 col-12">



                            <!-- Card -->

                            <div class="dt-card">



                                <!-- Card Body -->

                                <div class="dt-card__body p-xl-8 py-sm-8 py-6 px-4">



                                    <span class="badge badge-secondary badge-top-right">Messages</span>



                                    <!-- Media -->

                                    <div class="media">



                                        <i class="icon icon-mail icon-5x mr-xl-5 mr-1 mr-sm-3 align-self-center"></i>



                                        <!-- Media Body -->

                                        <div class="media-body">

                                            <ul class="invoice-list">


                                                <li class="invoice-list__item">

                                                    <span class="invoice-list__number"><h4>Messages</h4></span> <span

                                                            class="dot-shape bg-success"></span>

                                                    <span class="invoice-list__label"> <?php echo mysql_num_rows($mailreq); ?> New Message(s)</span>

                                                    <span class="custom-tooltip bg-success"><?php echo mysql_num_rows($mailreq); ?></span>

                                                </li>

                                                <li class="invoice-list__item">

                                                    <span class="invoice-list__number " ><h4>Last Login</h4></span> <span

                                                            class="dot-shape bg-warning"></span>

                                                    <span class="invoice-list__label"><?php echo $_SESSION[lastlogin]; ?></span>

                                                    <span class="custom-tooltip bg-warning"><h6><?php echo $_SESSION[lastlogin]; ?></h6></span>

                                                </li>

                                            </ul>

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

<? $query="SELECT sum(balance) FROM loan WHERE customerid='$_SESSION[customerid]'"; 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
  $tloan=$row[0];
  
  
 }
?>

<? $query="SELECT sum(paidamt) FROM loanpayment WHERE customerid='$_SESSION[customerid]'";  
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
  $ploan=0+$row[0];
  $uloan=0+$tloan-$ploan;
  
 }
?>



<!-- Grid Item -->
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: "ACTIVE LOAN"
	},
	legend:{
		cursor: "pointer",
		itemclick: explodePie
	},
	data: [{
		type: "pie",
		showInLegend: true,
		toolTipContent: "{name}: <strong>{y}<? echo $cur ?></strong>",
		indexLabel: "{name}: {y}<? echo $cur ?>",
		dataPoints: [
			{ y: <? echo $tloan ?>, name: "TOTAL LOAN", exploded: true },
			{ y: <? echo $ploan ?>, name: "TOTAL PAID" },
			{ y: <? echo $uloan ?>, name: "UNPAID LOAN" },
			
		]
	}]
});
chart.render();
}

function explodePie (e) {
	if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
	} else {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
	}
	e.chart.render();

}
</script>
</head>
<body>

</body>
</html>
                        <div class="col-md-6">
 <!-- Grid Item -->
 




							 
			

           

              <!-- Card -->
              <div class="dt-card pb-4">

                <!-- Card Header -->
                <div class="dt-card__header mb-5">

                  <!-- Card Heading -->
                  <div class="dt-card__heading">
                    <h3 class="dt-card__title">Available Loan Plans</h3>
                  </div>
                  <!-- /card heading -->

                   <!-- Card Tools -->
                  <div class="dt-card__tools">
                <a href="viewloan.php">    <button type="button" class="btn btn-secondary btn-xs">View All</button></a>
                  </div>
                  <!-- /card tools -->

                </div>
                <!-- /card header -->

                <!-- Card Body -->
                <div class="dt-card__body p-0">
                  <!-- Widget -->
                  <div class="dt-widget dt-widget-hl-item dt-widget-hl-item-space dt-widget-mb-item dt-widget-hover-bg">


<div id="chartContainer" style="height: 300px; width: 98%;"></div>
                  </div>
                  <!-- /widget -->
                </div>
                <!-- /card body -->

              </div>
              <!-- /card -->


            <!-- /grid item -->

                            <!-- /card -->



                        </div>

                        <!-- /grid item -->





                        <!-- Grid Item -->

                        <div class="col-md-6">
 <!-- Grid Item -->
           

              <!-- Card -->
              <div class="dt-card pb-4">

                <!-- Card Header -->
                <div class="dt-card__header mb-5">

                  <!-- Card Heading -->
                  <div class="dt-card__heading">
                    <h3 class="dt-card__title">Last 5 Transactions</h3>
                  </div>
                  <!-- /card heading -->

                   <!-- Card Tools -->
                  <div class="dt-card__tools">
               <a href="overview.php">      <button type="button" class="btn btn-secondary btn-xs">View All</button></a>
                  </div>
                  <!-- /card tools -->

                </div>
                <!-- /card header -->

                <!-- Card Body -->
                <div class="dt-card__body p-0">
                  <!-- Widget -->
                  <div class="dt-widget dt-widget-hl-item dt-widget-hl-item-space dt-widget-mb-item dt-widget-hover-bg">

<?php	
 $savearray = mysql_query("select * from transactions ORDER BY transactionid DESC LIMIT 3");
 while($save = mysql_fetch_array($savearray))
	  {?>
                    <!-- Widget Item -->
                    <div class="dt-widget__item border-success">

                      <!-- Widget Info -->
                      <div class="dt-widget__info text-truncate">
                        <div class="dt-widget__title f-9 font-weight-medium text-truncate">
                         <span class="text-dark mr-1"><i class="icon icon-wall mr-1"></i><? echo "$save[receiveid]" ?></span>
                           </div>
                        
                        
                        <p class="mb-0 text-truncate text-light-gray">
                          <span class="text-dark mr-1"><i class="icon icon-calendar mr-1"></i><? echo "$save[paymentdate]" ?></span>
                          
                        </p>
                      </div>
                      <!-- /widget info -->



                      <!-- Widget Extra -->
                      <div class="dt-widget__extra text-right">
                        <!-- Show Content -->
                        <div class="show-content">
                          <span class="d-block text-dark"><? echo "$cur $save[amount]"; ?></span>
                          <span class="d-block"> <? echo "$save[type]" ?></span>
                        </div>
                        <!-- /show content -->
                        <!-- Hide Content -->
                        <div class="hide-content">
                          <!-- Action Button Group -->
                          <div class="action-btn-group">
                            <button class="btn text-success dt-fab-btn">
                              <i class="icon icon-editors icon-1x"></i>
                            </button>
                            <button class="btn text-danger dt-fab-btn">
                              <i class="icon icon-trash icon-xl"></i>
                            </button>
                          </div>
                          <!-- /action button group -->
                        </div>
                        <!-- /hide content -->
                      </div>
                      <!-- /widget extra -->

                    </div>
                    <!-- /widgets item -->
<?}?>
                   
                 </div>
                  <!-- /widget -->
                </div>
                <!-- /card body -->

              </div>
              <!-- /card -->


            <!-- /grid item -->

                            <!-- /card -->



                        </div>

                        <!-- /grid item -->





                    </div>

                    <!-- /grid -->

<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-confirm {		
		color: #636363;
		width: 325px;
	}
	.modal-confirm .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
	}
	.modal-confirm .modal-header {
		border-bottom: none;   
        position: relative;
	}
	.modal-confirm h4 {
		text-align: center;
		font-size: 26px;
		margin: 30px 0 -15px;
	}
	.modal-confirm .form-control, .modal-confirm .btn {
		min-height: 40px;
		border-radius: 3px; 
	}
	.modal-confirm .close {
        position: absolute;
		top: -5px;
		right: -5px;
	}	
	.modal-confirm .modal-footer {
		border: none;
		text-align: center;
		border-radius: 5px;
		font-size: 13px;
	}	
	.modal-confirm .icon-box {
		color: #fff;		
		position: absolute;
		margin: 0 auto;
		left: 0;
		right: 0;
		top: -70px;
		width: 95px;
		height: 95px;
		border-radius: 50%;
		z-index: 9;
		background: #ef513a;
		padding: 15px;
		text-align: center;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
	.modal-confirm .icon-box i {
		font-size: 56px;
		position: relative;
		top: 4px;
	}
	.modal-confirm.modal-dialog {
		margin-top: 80px;
	}
    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
		background: #ef513a;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
        border: none;
    }
	.modal-confirm .btn:hover, .modal-confirm .btn:focus {
		background: #da2c12;
		outline: none;
	}
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>
<?
$query="SELECT * FROM  customers WHERE customerid='$_SESSION[customerid]'"; 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $email="$row[email]";
 $phone="$row[phone]";
 } 
 ?>
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">account_balance</i>
				</div>				
			</div>
			<div class="modal-body">
				<p class="text-center">Enter The Amount You Wish To Deposit Into Your Account And Click On Proceed </p>
			</div>
			
            <form method="post" action="deposit.php">
			<input name="amount"  type="number" required class="form-control" placeholder="Enter Amount To Deposit">
			<input name="email"  hidden class="form-control" value="<? echo $email; ?>">
			<input name="phone"  hidden class="form-control" value="<? echo $phone; ?>">
			<div class="modal-footer">
				<input name="deposit" type="submit" value="Proceed" class="btn btn-primary btn-block" >
			</div>
		</div>
		</form>
	</div>
</div>     
<?
$query="SELECT * FROM  fixed_deposit WHERE customerid='$_SESSION[customerid]'"; 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $duration="$row[duration]";
 } 
 
$curd=date("Y-m-d");
$expiry=date('Y-m-d', strtotime($curd. '+ '.$duration.'days'));

 ?>			
 
<div id="myModal2" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">account_balance</i>
				</div>				
			</div>
			<div class="modal-body">
				<p class="text-center">Remember, Fund Deposited
				In This Account Cannot Be Withdrawn Until <b> <? echo $expiry; ?></b> as  set by you when registering</p>
			</div>
			
            <form method="post" action="fixdeposit.php">
			<input name="amount" required type="Number" class="form-control" placeholder="Enter Amount To Deposit">
			<input name="email"  hidden class="form-control" value="<? echo $email; ?>">
			<input name="phone"  hidden class="form-control" value="<? echo $phone; ?>">
			<div class="modal-footer">
				<input name="deposit" type="submit" value="Proceed" class="btn btn-secondary btn-block" >
			</div>
		</div>
		</form>
	</div>
</div>     
</body>
</html>           

                </div>
                <!-- /site content -->
<script src="canvasjs.min.js"></script>

<?php include'footer.php' ?>
    