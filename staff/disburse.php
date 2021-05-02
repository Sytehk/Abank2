<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");
include("header.php");
if(!($_SESSION["staffid"]))
{
		header("Location: login.php");
}
$loan=mysql_query("select * from loan where status=1 or status=2");
?>
<!-- Site Content Wrapper -->

              <!-- Site Content Wrapper -->
            <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    <div class="dt-page__header">
                        <h1 class="dt-page__title">Disburse Loan</h1>
                    </div>
                    <!-- /page header -->

                    <!-- Grid -->
                    <div class="row">
                   
  <?
  
 $amo=$_POST[amt];
 $intr=$_POST[inti];
 $bal=$amo*$intr/100+$amo;
 
 if(isset($_POST["disburse"]))
{

$sqq="UPDATE loan SET status =2, signed='$_SESSION[staffid]' WHERE loanid='".$_POST[payto]."'";
echo "<script>swal('Succesful!', 'Fund Has Been Disbursed And Loan Is Active And Running Now', 'success')</script>";
 
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
   }
  ?>
                    

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
                                                <th>Application Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                           </tr>
 <?php
				  $i=1;
			  while($arrvar = mysql_fetch_array($loan))
                          {
        	           echo " <tr>
                                <td>$arrvar[loantype]</td>
				<td>$arrvar[loannumber]</td>
				<td>$arrvar[loanamt]</td>
                                <td>$arrvar[interest] %</td>
				<td>$arrvar[startdate]</td>
<td>
 <form method='post' action='disburseloan.php' >
 <input hidden value='$arrvar[loanid]' name='payto'>
 <input hidden value='$arrvar[customerid]' name='custid'>
<input type='submit' class='btn btn-primary' name='pay'  value='Disburse' />
</td></form
      	      </tr>";
				$i++;
			  }
			  ?>                                     </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Loan Type</th>
                                                <th>Loan Account</th>
                                                <th>Loan Amount</th>
                                                <th>Loan Interest</th>
                                                <th>Application Date</th>
                                                <th>Action</th>
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