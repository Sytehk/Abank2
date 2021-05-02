
<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

?>
<!-- Site Content Wrapper -->

           <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    
                    <!-- /page header -->
 <div class="dt-entry__header">

Loan Payment

                    </div>

                    <!-- Grid -->
                    <div class="row">

                        <!-- Grid Item -->
                        <div class="col-xl-12">


                    <!-- /page header -->
  <!-- Grid Item -->

              <!-- Card -->
              <div class="dt-card bg- text-black">

                <!-- Card Header -->
                <div class="dt-card__header">

                  <!-- Card Heading -->
                  <div class="dt-card__heading">
                    <div class="d-flex align-items-center">
                      <i class="icon icon-revenue2 icon-fw icon-2x text-black mr-2"></i>
                      <h3 class="dt-card__title text-black">Loan Payment</h3>
                    </div>
                  </div>
                  <!-- /card heading -->

                  <!-- Card Tools -->
                  <div class="dt-card__tools align-self-start mt-n3 mr-n2">
                    <!-- Dropdown -->
                    <div class="dropdown">

                      <!-- Dropdown Button -->
                      <a href="#" class="dropdown-toggle no-arrow text-white"
                         data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false"><i class="icon icon-horizontal-more icon-fw icon-3x"></i></a>
                      <!-- /dropdown button -->

                      <!-- Dropdown Menu -->
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="dashboard.php">Cancel</a>
                        
                      </div>
                      <!-- /dropdown menu -->

                    </div>
                    <!-- /dropdown -->
                  </div>
                  <!-- /card tools -->

                </div>
                <!-- /card header -->
<script>
function validateForm()
{
var x=document.forms["form1"]["trpass"].value;
var y=document.forms["form1"]["password"].value;

if (x==null || x=="")
  {
  alert("User id must be filled out");
  return false;
  }
  if (y==null || y=="")
  {
  alert("Password must be filled out");
  return false;
  }
}
</script>
<?




$dt = date("Y-m-d h:i:s");
if(isset($_POST["pay2"]))
{
$lid= $_POST[lid];
$custid=  mysql_real_escape_string($_SESSION['customerid']);
$resul = mysql_query("select * from customers WHERE customerid='$custid'");
$arrpayment1 = mysql_fetch_array($resul);
if(!($_POST['trpass'] == $arrpayment1['transpassword']))
{
    echo "<script>swal('Error!', 'Wrong transaction password enetered !', 'error')</script>";

}
else{
$rr = mysql_query("SELECT * FROM accounts WHERE customerid ='".$_SESSION['customerid']."'");
$rrarr=  mysql_fetch_array($rr);
$amount=$_POST[amt];
if ($amount>$rrarr['accountbalance'])
{
    echo "<script>swal('Error!', 'Issuficient Fund !', 'error')</script>";

}
else{
$sql="INSERT INTO loanpayment (customerid,loanid,paidamt,date) VALUES ('$_SESSION[customerid]','$_POST[lid]','$_POST[amt]','$dt')";
$sq="UPDATE accounts SET accountbalance = accountbalance -".$_POST[amt]." WHERE customerid='$_SESSION[customerid]'";
$sqq="UPDATE loan SET balance = balance -".$_POST[amt]." WHERE loannumber='".$_POST[lid]."'";
$sqq="UPDATE loan SET paid = paid +".$_POST[amt]." WHERE loannumber='".$_POST[lid]."'";

echo "<script>swal('Succesful!', 'Loan Payment Was Successful!', 'success')</script>";

if ((!mysql_query($sql)))
  {
  die('Error: ' . mysql_error());
  print_r($sql);
  }
  if(mysql_affected_rows() == 1)
  {
	$successresult = "Transaction successfull";
  }
  else
  {
	  $successresult = "Failed to transfer";
  }
  
  if ((!mysql_query($sqq)))
  {
  die('Error: ' . mysql_error());
  print_r($sqq);
  }
  if(mysql_affected_rows() == 1)
  {
	$successresult = "Transaction successfull";
  }
  else
  {
	  $successresult = "Failed to transfer";
  }
  
  
  if (!(mysql_query($sq)))
  {
      die("Error : ".mysql_error());
      print_r($sq);
  }
  if(mysql_affected_rows() == 1)
  {
	$successresult = "Transaction successfull";
  }
  else
  {
	  $successresult = "Failed to transfer";
  }
}
}
}
?>

                <!-- Card Body -->
                <div class="dt-card__body pb-3">
                  <!-- Form -->
                 <form id="form1" name="form1" method="post" action="payloan2.php" onsubmit="return validateForm()">
        
                    <!-- Grid -->
                    <div class="row">
                      <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Select Loan Account</label>
                          <select required name="payto" id="payto" class="custom-select custom-select-sm">
                         <?php
                                          $result=mysql_query("SELECT * FROM loan WHERE customerid='$_SESSION[customerid]'");
					  while($arrvar = mysql_fetch_array($result))
			  			{
						echo "<option value='$arrvar[loanid]'>$arrvar[loannumber]</option>";
			  			}
                                ?>
      	            </select>
                        </div>
                      </div>
                      <!-- / grid item -->

                      <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Enter Amount</label>
                          <input required name="pay_amt" id="pay_amt" class="form-control">
                           
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
        	        <input type="submit" class="btn btn-secondary" name="pay" id="pay"  value="Pay Loan" />
        	      </div></td>
       	        </tr>
                <!-- /card footer -->
 </form>
                    </div></div></div></div></div>

                <!-- /site content -->



<?php include'footer.php' ?>

<script src="../assets/node_modules/sweetalert2/dist/sweetalert2.js"></script>


</body>
    