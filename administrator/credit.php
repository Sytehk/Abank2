<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");

if(!($_SESSION["adminid"]))
{
		header("Location:login.php");
}
$dt = date("Y-m-d h:i:s");


$results = mysql_query("SELECT * FROM customers where customerid='$_GET[custid]'");
$custid=$_GET['custid'];
while($arrow = mysql_fetch_array($results))
{
	$custname = $arrow[firstname]." ".$arrow['lastname'];
	$ifsccode=$arrow[ifsccode];
	$loginid=$arrow[loginid];
	$accstatus=$arrow[accstatus];
	$city=$arrow[city];
    $state=$arrow[state];
	$country=$arrow[country];
    $accopendate=$arrow[accopendate];
    $lastlogin=$arrow[lastlogin];
}
$resultsd = mysql_query("SELECT * FROM accounts where customerid='$_GET[custid]'");
mysql_num_rows($resultsd);
?>
<!-- Site Content Wrapper -->

              <!-- Site Content Wrapper -->
            <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    <div class="dt-page__header">
                        <h1 class="dt-page__title">Credit Customer</h1>
                    </div>
                    <!-- /page header -->

                    <!-- Grid -->
                    <div class="row">

                        <!-- Grid Item -->
                        <div class="col-xl-12">

                            <!-- Entry Header -->
                            <div class="dt-entry__header">

                                <!-- Entry Heading -->
                                <div class="dt-entry__heading">
                                    <h3 class="dt-entry__title">Credit Account</h3>
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

                                        
    <blockquote>
      
  <? 
  if(isset($_REQUEST['credit']))
{
     mysql_query("INSERT INTO transactions (cashier,type,paymentdate,receiveid,amount,paymentstat) VALUES ('$_SESSION[adminid]','Credit','$dt','$_REQUEST[custid]','$_REQUEST[amount]','active')");
     mysql_query("INSERT INTO saved (userid,amount,status) VALUES ('$_REQUEST[custid]','$_REQUEST[amount]','active')");
                   $query = "update accounts set accountbalance = accountbalance + '$_REQUEST[amount]' WHERE customerid = '$_REQUEST[custid]'";
                      mysql_query($query);
                      echo "<script>swal('Successful!', 'Account Successfully Credited!', 'success')</script>";
  
 
}
?>

    </blockquote>
    <table id="data-table" class="table table-striped table-bordered table-hover">
                                          <tr>
        <th colspan="5" scope="col"><strong>CUSTOMER ACCOUNTS</strong></th>
        </tr>
      <tr>
        <th width="100" scope="col"><strong>ACCOUNT NO</strong></th>
        <th width="75" scope="col"><strong>STATUS</strong></th>
        <th width="90" scope="col"><strong>OPEN DATE</strong></th>
        <th width="90" scope="col"><strong>ACCOUNT TYPE</strong></th>
        <th width="85" scope="col"><strong>BALANCE</strong></th>
      </tr>
      <?php
	 while($arrow=mysql_fetch_array($resultsd))
	 {
	 ?>
        <tr>
        <td>&nbsp;<?php echo $arrow[accno];?></td>
        <td>&nbsp;<?php echo $arrow[accstatus];?></td>
        <td>&nbsp;<?php echo $arrow[accopendate];?></td>
        <td>&nbsp;<?php echo $arrow[accounttype];?></td>
        <td>&nbsp;<?php echo " $cur $arrow[accountbalance]";?></td>
      </tr>
     <?php
     }
	 ?>
</table>
       <p>&nbsp;</p>

                                         <tr>
        	      <td colspan="2"><div align="right">
<input type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal" type="submit" value="Credit Account" name="Del"></tr></td></div>
                                    </div>
                                    <!-- /tables -->
  </form>
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

<!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Credit User</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
        <form method="post" action="">
      <input type="hidden" value="<?php echo $custid ?>" name="custid">                 
       <label>Enter Amount To Credit</label>
                          <input type="number" name="amount"  class="form-control">
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      <input name="credit" type="submit" value="Credit" class="btn btn-secondary" >
      </div>
    </div></form>

  </div>
</div>

<?php include'footer.php' ?>
    
<script src="../assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
<script src="../assets/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script src="../assets/js/custom/data-table.js"></script>