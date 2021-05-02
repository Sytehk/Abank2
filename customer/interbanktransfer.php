
<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");
include("header.php");


if(isset($_POST['pay']))
{
$payto = $_POST['payto'];
$payamt = $_POST['pay_amt'];
$payacno= $_POST['ac_no'];
if(mysql_num_rows($result1) == 1)
{$arrpayment = mysql_fetch_array($result1); $payeetype='ext';}
else
{
    $result1= mysql_query("SELECT * FROM customers WHERE accountno='$_POST[payto]'");
    $arrpayment1 = mysql_fetch_array($result1);
    $payeetype='int';
     $arrpayment['accounttype'] = $arrpayment1['acctype'];
    $arrpayment['payeename'] = $arrpayment1['firstname']." ".$arrpayment1['lastname'];
    $arrpayment['accountnumber'] = $arrpayment1['accountno'];
     $arrpayment['ifsccode'] = $arrpayment1['ifsccode'];
    $res1=mysql_query("SELECT * FROM accounts WHERE customerid='$_POST[payto]'");
    $arrpayment4 = mysql_fetch_array($res1);
   
    
   
}
}
$dt = date("Y-m-d h:i:s");
$custid=  mysql_real_escape_string($_SESSION['customerid']);
$resultpass = mysql_query("select * from customers WHERE customerid='$custid'");
$arrpayment1 = mysql_fetch_array($resultpass);

if(isset($_POST["pay2"]))
{
       
	if($_POST['trpass'] == $arrpayment1['transpassword'])
	{
            $rr = mysql_query("SELECT * FROM accounts WHERE customerid ='".$_SESSION['customerid']."'");
            $rrarr=  mysql_fetch_array($rr);
		$amount=$_POST['payamt'];
                if ($amount>$rrarr['accountbalance'])
                {
                print "
				<script language='javascript'>
					window.location = 'interbank.php?error=insufficientbalance';
				</script>
			";
                     
                    exit(0);
                }
                
                if (isset($_POST['payeetype']))
                {
                    
                    if ($_POST['payeetype'] == 'int')
                    {     mysql_query("UPDATE accounts SET accountbalance = accountbalance+$amount WHERE accno ='".$_POST[payto]."'") or die(mysql_error ());
                    }
                }
                $sql1="INSERT INTO transactions (type,paymentdate,payeeid,receiveid,amount,paymentstat) VALUES ('Transfer','$dt','$_SESSION[customerid]','$_POST[payto]','$amount','active')";
                 $sql2="INSERT INTO withdrawals (userid,amount,status) VALUES ('$_SESSION[customerid]','$amount','1')";
               $sql="INSERT INTO transfers (name, sender,receiver,bank,amount,status) VALUES ('$_POST[name]', '$_SESSION[customerid]','$_POST[payto]','$sbank','$amount','1')";
              
                mysql_query("UPDATE accounts SET accountbalance = accountbalance-$amount WHERE customerid ='".$_SESSION['customerid']."'");
		 		
				if (!mysql_query($sql))
				  {
				  die('Error: ' . mysql_error());
				  }
				  if (!mysql_query($sql1))
				  {
				  die('Error: ' . mysql_error());
				  }
				  if (!mysql_query($sql2))
				  {
				  die('Error: ' . mysql_error());
				  }
				if(mysql_affected_rows() == 1)
				  { 
					 print "
				<script language='javascript'>
					window.location = 'interbank.php?success=successful';
				</script>
			";
                    exit(0);
				  }
				else
				  {
					  $successresult = "Failed to transfer";
				  }
	}
	else
	{
	$passerr = "Invalid password entered!!!<br/> Transaction Failed </b>";
	 print "
				<script language='javascript'>
					window.location = 'interbank.php?error=WrongPassword';
				</script>
			";
        exit(0);
	}		  
}

$custid=  mysql_real_escape_string($_SESSION['customerid']);
$acc= mysql_query("select * from accounts where customer_id='$custid'");

?>

<!-- Site Content Wrapper -->
<div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    
                    <!-- /page header -->
 <div class="dt-entry__header">

Inter-Bank Transfer

                    </div>

                    <!-- Grid -->
                    <div class="row">

                        <!-- Grid Item -->
                        <div class="col-xl-12">
              <!-- Card -->
              <div class="dt-card bg- text-black">

                <!-- Card Header -->
                <div class="dt-card__header">

                  <!-- Card Heading -->
                  <div class="dt-card__heading">
                    <div class="d-flex align-items-center">
                      <i class="icon icon-user icon-fw icon-2x text-black mr-2"></i>
                      <h3 class="dt-card__title text-black">Account Summary</h3>
                    </div>
                  </div>
                  <!-- /card heading -->

                  <!-- Card Tools -->
                  <div class="dt-card__tools align-self-start mt-n3 mr-n2">
                    <!-- Dropdown -->
                    <div class="dropdown">
<script>
$('.btn').on('click', function() {
    var $this = $(this);
  $this.button('loading');
    setTimeout(function() {
       $this.button('reset');
   }, 8000);
});</script>
                

                    </div>
                    <!-- /dropdown -->
                  </div>
                  <!-- /card tools -->

                </div>
                <!-- /card header -->

                <!-- Card Body -->
                <div class="dt-card__body pb-3">
                  <!-- Form -->
                  <form id="my_form name="form1" method="post" action="interbanktransfer.php">
                             
<input type="hidden" name="payto" value="<?php echo $payto; ?>"  />
<input type="hidden" name="payamt" value="<?php echo $payamt; ?>"  />
<input type="hidden" name="payeeid" value="<?php echo $payacno; ?>"  />
<input type="hidden" name="payeetype" value="<?php echo $payeetype; ?>"  />

                    <!-- Grid -->
                    <div class="row">
                      <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                        
                     <? $result = mysqli_query($con,"SELECT count(*) FROM customers WHERE accountno='$_POST[payto]'");
$row = mysqli_fetch_row($result);
$numrows = $row[0];
if ($numrows==0)
{
 print "
				<script language='javascript'>
					window.location = 'interbank.php?error=accountnotfound';
				</script>";}  
else
{

                          echo "<label>";
				echo "<b>&nbsp;Payee Name : </b>".$arrpayment['payeename'];
				echo "<br><b>&nbsp;Account No. : </b>".$arrpayment['accountnumber'];
				echo "<br><b>&nbsp;Account type : </b>".$arrpayment['accounttype'];
				echo "<br><b>&nbsp;Bank Branch : </b>".$arrpayment['ifsccode'];
	?>
                 </label>
                           
                        </div>
                      </div>

                      <!-- Grid Item -->
                      <div class="col-12">
                        <div class="form-group">
                        <span class="d-flex mb-1">
                            <label class="mb-0">Enter Transaction Password</label>
                            <a href="javascript:void(0)" class="text-white ml-auto">
                               
                            </a>
                        </span>
                          <input type="hidden" name="name" value="<?php echo $arrpayment['payeename']; ?>"  />
                          <input required type="text" min="10" name="trpass" type="password" id="trpass"  class="form-control form-control-sm"
                                 placeholder="Enter Transaction Password">
                                   </div>
                      </div>
                      <!-- / grid item -->

                     
                   
                    <!-- /grid -->
                 
                  <!-- /form -->
                </div>
                <!-- /card body -->

                <!-- Card Footer -->
                <div class="px-7 py-5 border-top border-width-2 border-black-transparent">
                
                 <tr>
        	      <td colspan="2"><div align="right">
        	        <input class="btn btn-secondary"  type="submit" name="pay2" id="pay2" value="Transfer" /><?}?>
        	      </div></td>
       	        </tr></div>
                <!-- /card footer -->
 </form>
              </div>
              <!-- /card -->

            </div>
            <!-- /grid item -->
                    <!-- Entry Header -->

                </div>

                <!-- /site content -->

</div>

<?php include'footer.php' ?>

<script src="../assets/node_modules/sweetalert2/dist/sweetalert2.js"></script>

</body>
    