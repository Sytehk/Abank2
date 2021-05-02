<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

?>
<!-- Site Content Wrapper -->

              <!-- Site Content Wrapper -->
            <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    <div class="dt-page__header">
                        <h1 class="dt-page__title">Transfer History</h1>
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
                                    <h3 class="dt-entry__title">Recent Transfer</h3>
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

                                        <table id="data-table" class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>Transaction ID</th>
                                                <th>Transaction Date</th>
                                                <th>Account Number</th>
                                                <th>Receivers's Bank</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                           </tr>
<?php
$query="SELECT * FROM transfers where (sender=".$_SESSION['customerid'].") ";
$rectrans=mysql_query($query);
while($recs = mysql_fetch_array($rectrans))
{	
$transid=$recs['id'];
$transdate=$recs['date'];
$receiveid=$recs['receiver'];
$receivebank=$recs['bank'];
    $amount=$recs['amount'];
    $date=$recs['date'];
    $status=$recs['status'];	
		echo "<tr>
        	      <td>TRANS$transid</td>
        	      <td>$transdate</td>
        	     
        	      <td>$receiveid</td>
        	      <td>$receivebank</td>
                      <td>$cur $amount</td>
        	      "; ?>
        	      <td> <span class="badge badge-pill badge-danger mb-1 mr-1"><? if ($status=='0') print "Pending";?></span>
					<span class="badge badge-pill badge-info mb-1 mr-1"><? if ($status=='1') print "Successful";?></span>
				                                                   </td>
<?}
?>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                  <th>Transaction ID</th>
                                                <th>Transaction Date</th>
                                                <th>Account Number</th>
                                                <th>Receivers's Bank</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                         <tr>
        	      <td colspan="2"><div align="right">
<input type="button" class="btn btn-secondary" value="Print Transaction Detail" onClick="window.print()"></tr></td></div>
                                    </div>
                                    <!-- /tables -->

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