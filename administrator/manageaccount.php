<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");

if(!($_SESSION["adminid"]))
{
		header("Location: login.php");
}
$loan=mysql_query("select * from accountmaster ");
?>
<!-- Site Content Wrapper -->

              <!-- Site Content Wrapper -->
            <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    <div class="dt-page__header">
                        <h1 class="dt-page__title">Manage Account Type</h1>
                    </div>
                    <!-- /page header -->

                    <!-- Grid -->
                    <div class="row">
                    <?
                    if(isset($_POST["delete"]))
{
$sqq="DELETE from accountmaster WHERE id='".$_POST[id]."'";
echo "<script>swal('Succesful!', 'Account Type Has Been Deleted!', 'success')</script>";
 
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
  
  <?
if(isset($_POST["button"]))
{
    $sql="SELECT * FROM branch WHERE ifsccode='".$_POST['ifsc']."'";
    if(mysql_num_rows(mysql_query($sql)) > 0)
    {
     echo"<script>swal('Error!', 'This Branch Has Alredy Been Created!', 'error')</script>";
    }
    else
    {
    $sql="INSERT INTO branch (ifsccode, branchname, country, city, state, branchaddress) VALUES ('$_POST[ifsc]','$_POST[branch]','$_POST[country]','$_POST[city]','$_POST[state]','$_POST[address]')";
    mysql_query($sql);
    if (!mysql_query($sql))
    {
    die('Error: ' . mysql_error());
    }
   echo"<script>swal('Success!', 'Bank Branch Created Successfully!', 'success')</script>";
    }
}
?>
 
                        <!-- Grid Item -->
                        <div class="col-xl-12">

                            <!-- Entry Header -->
                            <div class="dt-entry__header">

                                <!-- Entry Heading -->
                                <div class="dt-entry__heading">
                                    <h3 class="dt-entry__title">All Accounts</h3>
                                </div>
                                <!-- /entry heading -->

                            </div>
                            <!-- /entry header -->

                            <!-- Card -->
                            <div class="dt-card">

                                <!-- Card Body -->
                                <div class="dt-card__body">
										
								<a href="accounttype.php"><button  class='btn btn-secondary'>Create New Account Type </button></a>
								<br>
                                    <!-- Tables -->
                                    <div class="table-responsive">

                                        <table id="data-table" class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>Account Name</th>
                                                <th>Account Code</th>
                                                <th>Minimum Balance</th>
                                                <th>Interest</th>
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
                <td>$arrvar[accounttype]</td>
				<td>$arrvar[prefix]</td>
				<td>$arrvar[minbalance]</td>
                <td>$arrvar[interest]</td>
<td>
 <form method='post' action='manageaccount.php' >
 <input hidden value='$arrvar[id]' name='id'>
<input type='submit' class='btn btn-secondary' name='delete'  value='Delete' />
</form>
</td>
      	      </tr>";
				$i++;
			  }
			  ?>                                     </tbody>
                                            <tfoot>
                                            <tr>
                                               <th>Account Name</th>
                                                <th>Account Code</th>
                                                <th>Minimum Balance</th>
                                                <th>Interest</th>
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