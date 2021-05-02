<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");


if(!($_SESSION["staffid"]))
{
		header("Location:login.php");
}
$custarray = mysql_query("select * from transactions where type= 'debit'");
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
                                                <th>Account Number</th>
                                                <th>Amount</th>
                                                 <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                           </tr>
<?php	
 while($customer = mysql_fetch_array($custarray))
	  {
echo " <tr>
      <td>&nbsp;$customer[charged]</td>
      <td>$customer[amount]</td>
      <td>&nbsp;$customer[paymentdate]</td>
         </tr>";
	  }
	 ?>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                               <th>Account Number</th>
                                                <th>Amount</th>
                                                 <th>Date</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                         <tr>
        	      <td colspan="2"><div align="right">
<input type="button" class="btn btn-secondary" value="Print Customers' Detail" onClick="window.print()"></tr></td></div>
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