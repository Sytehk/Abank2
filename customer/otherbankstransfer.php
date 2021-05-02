
<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");
include("header.php");


if(isset($_POST['pay']))
{
$bank = $_POST['bank'];
$payamt = $_POST['pay_amt'];
$acct= $_POST['acctno'];
$key= $_POST['code'];
$result1 = mysql_query("select * from banks WHERE code='$bank'");
if(mysql_num_rows($result1) == 1)
{$arrpayment = mysql_fetch_array($result1); $payeetype='ext';}
else
{
    $result1= mysql_query("SELECT * FROM banks WHERE code='$_POST[bank]'");
    $arrpayment1 = mysql_fetch_array($result1);
   
}
}

 /*
This PHP script helps to verify a Nigerian bank account name
using paystack API
it returns the account name if successful
*/
        $bankCode = "$bank"; //bank CBN code https://bank.codes/api-nigeria-nuban/
        $AccountID = "$acct"; //NUBAN account number
        $baseUrl = "https://api.paystack.co";
        $endpoint = "/bank/resolve?account_number=".$AccountID."&bank_code=".$bankCode;
        $httpVerb = "GET";
        $contentType = "application/json"; //e.g charset=utf-8
        $authorization = "$key"; //gotten from paystack dashboard
        
    
        $headers = array (
            "Content-Type: $contentType",
            "Authorization: Bearer $authorization"
        );
		
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $baseUrl.$endpoint);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $content = json_decode(curl_exec( $ch ),true);
            $err     = curl_errno( $ch );
            $errmsg  = curl_error( $ch );
            
            curl_close($ch);

            if($content['status']) {
                    $response['account_number'] = $content['data']['account_number'];
                    $response['account_name'] = $content['data']['account_name'];

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
                { print "
				<script language='javascript'>
					window.location = 'interbank.php?error=insufficientbalance';
				</script>
			";
                     
                    exit(0);;
                }
                
                if (isset($_POST['payeetype']))
                {
                    
                    if ($_POST['payeetype'] == 'int')
                    {     mysql_query("UPDATE accounts SET accountbalance = accountbalance+$amount WHERE customerid ='".$_POST[payto]."'") or die(mysql_error ());
                    }
                }
               $sql1="INSERT INTO transactions (type,paymentdate,payeeid,receiveid,amount,paymentstat) VALUES ('Transfer','$dt','$_SESSION[customerid]','$_POST[payt]','$amount','active')";
                  $sql2="INSERT INTO withdrawals (userid,amount,status) VALUES ('$_SESSION[customerid]','$amount','1')";
                 $sql="INSERT INTO transfers (sender,receiver,name,bank,amount,status) VALUES ('$_SESSION[customerid]','$_POST[payt]','$_POST[name]','$_POST[bank]','$amount','0')";
              
                mysql_query("UPDATE accounts SET accountbalance = accountbalance-$amount WHERE customerid ='".$_SESSION['customerid']."'");
		        print('Location:otherbanks.php?success=successful');
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

Other-Bank Transfer

                    </div>

                    <!-- Grid -->
                    <div class="row">

            <div class="col-xl-12 col-md-6 order-xl-4">

              <!-- Card -->
              <div class="dt-card bg- text-black">

                <!-- Card Header -->
                <div class="dt-card__header">

                  <!-- Card Heading -->
                  <div class="dt-card__heading">
                    <div class="d-flex align-items-center">
                      <i class="icon icon-revenue icon-fw icon-2x text-black mr-2"></i>
                      <h3 class="dt-card__title text-blacks">Transaction Summary</h3>
                    </div>
                  </div>
                  <!-- /card heading -->

                  <!-- Card Tools -->
                  <div class="dt-card__tools align-self-start mt-n3 mr-n2">
                    <!-- Dropdown -->
                    <div class="dropdown">

                

                    </div>
                    <!-- /dropdown -->
                  </div>
                  <!-- /card tools -->

                </div>
                <!-- /card header -->

                <!-- Card Body -->
                <div class="dt-card__body pb-3">
                  <!-- Form -->
                  <form id="form1" name="form1" method="post" action="otherbankstransfer.php">
                             
<input type="hidden" name="payt" value="<?php echo $AccountID; ?>"  />
<input type="hidden" name="payamt" value="<?php echo $payamt; ?>"  />
<input type="hidden" name="bank" value="<?php echo $arrpayment['bank']; ?>"  />
<input type="hidden" name="name" value="<?php echo $response['account_name']; ?>"  />

                    <!-- Grid -->
                    <div class="row">
                      <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label><?php
                          
                           if($content['status']) {
                    $response['account_number'] = $content['data']['account_number'];
                    $response['account_name'] = $content['data']['account_name'];

        
            
				echo "<b>&nbsp;Account Name : </b>".$response['account_name'];
				echo "<br><b>&nbsp;Account Number. : </b> $AccountID";
				echo "<br><b>&nbsp;Bank name : </b>".$arrpayment['bank'];
				echo "<br><b>&nbsp;Amount : </b> $cur $payamt";
	  ?></label>
                           
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
                          <input required type="text" min="10" name="trpass" type="password" id="trpass"  class="form-control form-control-sm"
                                 placeholder="Enter Transaction Password">
                        </div>
                      </div>
                      <!-- / grid item -->

                     
                    </div>
                    <!-- /grid -->
                 
                  <!-- /form -->
                </div>
                <!-- /card body -->

                <!-- Card Footer -->
                <div class="px-7 py-5 border-top border-width-2 border-black-transparent">
                
                 <tr>
        	      <td colspan="2"><div align="right">
        	        <input class="btn btn-success"  type="submit" name="pay2" id="pay2" value="Transfer" />
        	       
        	      </div></td>
       	        </tr></div>
       	      <?    } else {
                echo $content['message']; echo "</div></div></div>";
            }
                ?>
                <!-- /card footer -->
 </form>
              </div>
              <!-- /card -->

            </div>
            <!-- /grid item -->
                    <!-- Entry Header -->


                </div></div>

                <!-- /site content -->



<?php include'footer.php' ?>

<script src="../assets/node_modules/sweetalert2/dist/sweetalert2.js"></script>
</body>
    