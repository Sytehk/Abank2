<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

$result = mysql_query("select * from customers WHERE customerid='$_SESSION[customerid]'");
$loan=mysql_query("select * from loan where customerid='$_SESSION[customerid]'");
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
                                    <h3 class="dt-entry__title">View Loan</h3>
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
                                                
                                                <th>Loan Type</th>
                                                <th>Loan Account</th>
                                                <th>Loan Amount</th>
                                                <th>Loan Interest</th>
                                                <th>Total Payment</th>
                                                <th>Paid Loan</th>
                                                <th>Unpaid Balance</th>
                                                <th>Loan Date</th>
                                                <th>Loan Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                           </tr>
 <?php
				  $i=1;
			  while($arrvar = mysql_fetch_array($loan))
                          {
                          
                          $unp=$arrvar[balance]-$arrvar[paid];
        	           echo " <tr>
                                
                                <td>$arrvar[loantype]</td>
				<td>$arrvar[loannumber]</td>
				<td>$cur $arrvar[loanamt]</td>
                                <td>$arrvar[interest] %</td>
                                <td>$cur $arrvar[balance] </td>
                                <td>$cur $arrvar[paid]</td>
                                <td>$cur $unp</td>
				<td>$arrvar[startdate]</td>";?>
				<td> <span class="badge badge-pill badge-danger mb-1 mr-1"><? if ($arrvar[status]=='0') print "loan Is Unapproved";?></span>
																	<span class="badge badge-pill badge-info mb-1 mr-1"><? if ($arrvar[status]=='1') print "Awaiting Fund Disbursement";?></span>
																	<span class="badge badge-pill badge-success mb-1 mr-1"><? if ($arrvar[status]=='2') print "Loan Is Active And Running";?></span>
                                                                   </td>

      	      </tr>
				$i++;
			 <? }
			  ?>                                     </tbody>
                                            <tfoot>
                                            <tr>
                                                 
                                                <th>Loan Type</th>
                                                <th>Loan Account</th>
                                                <th>Loan Amount</th>
                                                <th>Loan Interest</th>>
                                                <th>Total Payment</th>
                                                <th>Paid Loan</th>
                                                <th>Unpaid Balance</th>
                                                <th>Loan Date</th>
                                                <th>Loan Status</th>
                                            </tr>
                                            </tfoot>
                                        </table>
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