<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");
include("header.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

$acc= mysql_query("select * from accounts where accno='$_POST[accno]'");
while($rows = mysql_fetch_array($acc))
{
	$Accountnumber = $rows["accno"];
	$Accountbalance= $rows["accountbalance"];
}
$result = mysql_query("select * from accounts WHERE customerid='$_SESSION[customerid]'");
?>
<!-- Site Content Wrapper -->

              <!-- Site Content Wrapper -->
            <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    <div class="dt-page__header">
                        <h1 class="dt-page__title">Account Overview</h1>
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
                                    <h3 class="dt-entry__title">My Account Overview</h3>
                                </div>
                                <!-- /entry heading -->

                            </div>
                            <!-- /entry header -->

                            <!-- Card -->
                            <div class="dt-card">
<div id="templatemo_main">
    <div id="sidecon">
        <?php
if(isset($_POST[submit]))
{
?>
    	
                                <!-- Card Body -->
                                <div class="dt-card__body">
<h4>Account Overview For <?php echo date("d-m-Y");?></h4>

        	<form id="form1" name="form1" method="post" action="">
        	  <table class="table table-striped table-bordered table-hover" width="561" border="1">
        	    <tr>
        	      <th colspan="2" scope="col">&nbsp;&nbsp; Account Name: <?php echo $_SESSION[customername]; ?>
                  </th>
       	        </tr>
        	    <tr>
        	      <td width="275"><strong>Account number</strong></td>
        	      <td width="270"><?php echo $Accountnumber;?>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <td><strong>Account Balance</strong></td>
        	      <td><?php echo $Accountbalance; ?>&nbsp;</td>
      	      </tr>
              
      	    </table>
        	  <br />
                                    <!-- Tables -->
                                    <div class="table-responsive">

                                        <table id="data-table" class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>S/N Number</th>
                                                <th>Action Date</th>
                                                <th>Withdrawal</th>
                                                <th>Deposit</th>
                                                <th>Account Charges</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                           </tr>
<?php
                    $customid=$_SESSION['customerid'];
                    $count=1;
                   $query="SELECT * FROM transactions WHERE (payeeid='$customid') OR (receiveid='$customid') OR (charged='$customid')";
                   $result=mysql_query($query);
			  while(($arrvar = mysql_fetch_array($result))&&($count <= 3 ))
			  {
                                echo " <tr>
                                             <td>$count</td>
                                             <td>$arrvar[paymentdate]</td>";
                                if ($arrvar['payeeid']==$customid)
                                       echo "<td>$arrvar[amount]</td><td> </td></td><td>";
                              else if ($arrvar['receiveid']==$customid)
                                       echo "<td> </td> <td>$arrvar[amount]</td></td><td>";
                                        else if ($arrvar['charged']==$customid)
                                       echo "<td> </td><td> </td> <td>$arrvar[amount]</td>";
                            
                              echo "</tr>";
                              $count=$count+1;
			  }
			  ?>               </tbody>
                                            <tfoot>
                                            <tr>
                                               <th>S/N Number</th>
                                                <th>Action Date</th>
                                                <th>Withdrawal</th>
                                                <th>Deposit</th>
                                                <th>Account Charges</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    
                                                                        
                                     <?php
}
else
{
	?><div class="col-xl-12"><br>
           <h4>If you have more than one account with us please the account you want to check</h4>
           	<form id="form1" name="form1" method="POST" action="">
        	  <table width="520" height="127" border="0">
        	    
        	    <tr>
        	      <td valign="top">Account number  <label for="ac_no"></label>
        	        <select name="accno" id="accno" class="custom-select custom-select-sm">
        	            <?php
        	           while($arrvar = mysql_fetch_array($result))
					  	{
        		        echo "<option value='$arrvar[accno]'>$arrvar[accno]</option>";
               			}
					   ?>
                  </select><br><br>
       	          <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Proceed" /></td>
      	      </tr>
      	    </table>
       	  </form></div>
           <?php
}
?>
                        
  </div>          <!-- /tables -->

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
    
<script src="../assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
<script src="../assets/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script src="../assets/js/custom/data-table.js"></script>