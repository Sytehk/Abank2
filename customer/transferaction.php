<?
include("../config/dbconfig.php");
if(isset($_POST['pay']))
{
$payto = $_POST['payto'];
$payamt = $_POST['pay_amt'];
$payacno= $_POST['ac_no'];
$result1 = mysql_query("select * from registered_payee WHERE slno='$payto'");
if(mysql_num_rows($result1) == 1)
{$arrpayment = mysql_fetch_array($result1); $payeetype='ext';}
else
{
    $result1= mysql_query("SELECT * FROM customers WHERE customerid='$_POST[payto]'");
    $arrpayment1 = mysql_fetch_array($result1);
    $payeetype='int';
    $arrpayment['payeename'] = $arrpayment1['firstname']." ".$arrpayment1['lastname'];
    $arrpayment['bankname'] = "Bank of Gotham City";
    $res1=mysql_query("SELECT * FROM accounts WHERE customerid='$_POST[payto]'");
    $arrpayment4 = mysql_fetch_array($res1);
    $arrpayment['accounttype'] = $arrpayment4['accounttype'];
    $arrpayment['accountnumber'] = $arrpayment4['accno'];
    $arrpayment['ifsccode'] = $arrpayment1['ifsccode'];
}
}
$dt = date("Y-m-d h:i:s");
$custid=  mysql_real_escape_string($_SESSION['customerid']);
$resultpass = mysql_query("select * from customers WHERE customerid='$custid'");
$arrpayment1 = mysql_fetch_array($resultpass);

if(isset($_POST["pay2"]))
{
        if (!($_POST['trpass'] == $_POST['conftrpass']))
        {
            $passerr = "Password Mismatch";
            header('Location: transferprocess.php?error=passwordmismatch');
            exit(0);
        }
	else if($_POST['trpass'] == $arrpayment1['transpassword'])
	{
            $rr = mysql_query("SELECT * FROM accounts WHERE customerid ='".$_SESSION['customerid']."'");
            $rrarr=  mysql_fetch_array($rr);
		$amount=$_POST['payamt'];
                if ($amount>$rrarr['accountbalance'])
                {
                    header('Location: transferprocess.php?error=insufficientbalance');
                    exit(0);
                }
                
                if (isset($_POST['payeetype']))
                {
                    
                    if ($_POST['payeetype'] == 'int')
                    {     mysql_query("UPDATE accounts SET accountbalance = accountbalance+$amount WHERE customerid ='".$_POST[payto]."'") or die(mysql_error ());
                    }
                }
                $sql="INSERT INTO transactions (paymentdate,payeeid,receiveid,amount,paymentstat) VALUES ('$dt','$_SESSION[customerid]','$_POST[payto]','$amount','active')";
                
                mysql_query("UPDATE accounts SET accountbalance = accountbalance-$amount WHERE customerid ='".$_SESSION['customerid']."'");
		
				if (!mysql_query($sql))
				  {
				  die('Error: ' . mysql_error());
				  }
				if(mysql_affected_rows() == 1)
				  {
					$successresult = "Transaction successfull";
					header("Location: transferprocess.php");
				  }
				else
				  {
					  $successresult = "Failed to transfer";
				  }
	}
	else
	{
	$passerr = "Invalid password entered!!!<br/> Transaction Failed </b>";
        header('Location:transferprocess.php?error='.$passerr);
        exit(0);
	}		  
}

$custid=  mysql_real_escape_string($_SESSION['customerid']);
$acc= mysql_query("select * from accounts where customer_id='$custid'");
?>