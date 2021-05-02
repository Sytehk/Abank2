<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");

$loantypearray = mysql_query("select * from loantype");

 
              
          
?>
<!-- Site Content Wrapper -->

              <!-- Site Content Wrapper -->
            <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    

                    <!-- Grid -->
                    <div class="row">

                        <!-- Grid Item -->
                        <div class="col-xl-12">

                            <!-- Entry Header -->
                            <div class="dt-entry__header">

                                <!-- Entry Heading -->
                                <div class="dt-entry__heading">
                                    <h3 class="dt-entry__title">Select Loan Plan</h3>
                                </div>
                                <!-- /entry heading -->

                            </div>
                            <!-- /entry header -->

                            <!-- Card -->
                            <div class="dt-card">

                                <!-- Card Body -->
                                <div class="dt-card__body">

                                    <!-- Tables -->
                                    <div class="table-responsive">
<? $dt = date("Y-m-d h:i:s");
if(isset($_POST["button"]))
{
 $sql="INSERT INTO loan (loantype,loanamt,loannumber,customerid,acctno,interest,startdate) VALUES ('$_POST[type]','$_POST[amt]','$_POST[lcode]','$_POST[custid]','$_POST[accno]','$_POST[int]','$dt')";
echo "<script>swal('Succesful!', 'Your Loan Request Has Been Received. Your Loan Account Reference Number Is  $_POST[lcode]. Please Wait While We Verify Your Loan Application. You Will Receive A Mail On Your Loan Approval Status Soonest!', 'success')</script>";

if (!mysql_query($sql))
				  {
				  die('Error: ' . mysql_error());
				  }
}           ?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}

.columns {
  float: left;
  width: 33.3%;
  padding: 8px;
}

.price {
  list-style-type: none;
  border: 1px solid #eee;
  margin: 0;
  padding: 0;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}

.price:hover {
  box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

.price .header {
  background-color: #111;
  color: white;
  font-size: 25px;
}

.price li {
  border-bottom: 1px solid #eee;
  padding: 20px;
  text-align: center;
}

.price .grey {
  background-color: #eee;
  font-size: 20px;
}

.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  font-size: 18px;
}

@media only screen and (max-width: 600px) {
  .columns {
    width: 100%;
  }
}

</style>
</head>
<body>
 <?php	

 $results = mysql_query("SELECT * FROM customers WHERE  customerid='$_SESSION[customerid]'");

while($arrow = mysql_fetch_array($results))
{
	$accno = $arrow[accountno];
	$custid = $arrow[customerid];	
	$acctype = $arrow[acctype];	
	$email = $arrow[email];
	$phone = $arrow[phone];
}
$tcode=rand(1111111111,9999999999);
 while($loantypes = mysql_fetch_array($loantypearray))

	  {
echo "
<div class='columns'>
  <ul class='price'>
    <li class='header' style='background-color:#800080'>$loantypes[loantype]</li>
    <li class='grey''>$loantypes[interest] % Interest</li>
    <li>$cur $loantypes[minimumamt] Minimum</li>
    <li>$cur $loantypes[maximumamt] Maximum</li>
    <!-- Modal Body -->
                                                <div class='modal-body'>
                                              

                                                </div>
                                                <!-- /modal body -->

                                               
    <li class='grey'>
    											 <form  method='post' action=''>
    											 
                                                 <input required type='number' min='$loantypes[minimumamt]' max='$loantypes[maximumamt]' name='amt' class='form-control form-control-sm' placeholder='Enter Loan Amount'>
                                                 <input type='hidden' name='accno' value='$accno'  />
                                                 <input type='hidden' name='type' value='$loantypes[loantype]'  />
												 <input type='hidden' name='custid' value='$custid'  />
 												 <input type='hidden' name='int' value='$loantypes[interest]'  />
 												 <input type='hidden' name='lcode' value='$tcode'  /><br>
    											 <input name='button'  type='submit' value='Apply For Loan' class='btn btn-secondary'/>
    </form>
                                            
                                           
  </ul>
</div>
";
	  }
	  ?>
  

                                </div>
                                <!-- /card body -->

                            </div>
                            <!-- /card -->

                        </div>
                        <!-- /grid item -->

                    </div>
                    <!-- /grid -->

                </div>
                <!-- /site content -->



<?php include'footer.php' ?>
    