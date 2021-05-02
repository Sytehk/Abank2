<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");

if(!($_SESSION["staffid"]))
{
		header("Location: login.php");
}
$loan=mysql_query("select * from transfers where status=0 ");
?>
<!-- Site Content Wrapper -->

              <!-- Site Content Wrapper -->
            <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    <div class="dt-page__header">
                        <h1 class="dt-page__title">Pending Transfer</h1>
                    </div>
                    <!-- /page header -->

                    <!-- Grid -->
                    <div class="row">
                    <?
                    if(isset($_POST["approve"]))
{
$sqq="UPDATE transfers SET status =1 WHERE id='".$_POST[approve]."'";
echo "<script>swal('Succesful!', 'Cash Transfer Has Been Approved! Please ensure you have credited the account number', 'success')</script>";
 
  if (!mysql_query($sqq))
				  {
				  die('Error: ' . mysql_error());
				  }
   }
  ?>
  
  
                        <!-- Grid Item -->
                        <div class="col-xl-12">

                            <!-- Entry Header -->
                            <div class="dt-entry__header">

                                <!-- Entry Heading -->
                                <div class="dt-entry__heading">
                                    <h3 class="dt-entry__title">Mobile Transfer To Other Banks</h3>
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
                                                <th>Receiver's Name</th>
                                                <th>Receiver's Bank</th>
                                                <th>Bank Account No</th>
                                                <th>Amount</th>
                                                <th>Date</th>
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
                                <td>$arrvar[receiver]</td>
				<td>$arrvar[name]</td>
				<td>$arrvar[bank]</td>
                                <td>$cur $arrvar[amount]</td>
				<td>$arrvar[date]</td>
<td>
 <form method='post' action='' >
 <input hidden value='$arrvar[id]' name='approve'>
<input type='submit' class='btn btn-secondary' name='pay'  value='Approve' />
</form>
</td>
      	      </tr>";
				$i++;
			  }
			  ?>                                     </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Receiver's Name</th>
                                                <th>Receiver's Bank</th>
                                                <th>Bank Account No</th>
                                                <th>Amount</th>
                                                <th>Date</th>
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