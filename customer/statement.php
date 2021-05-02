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
                    
                    <!-- /page header -->
 <div class="dt-entry__header">

Statement Of Account

                    </div>


                        <!-- Grid Item -->
                        <div class="col-xl-12">

                            </div>
                            <!-- /entry header -->

                            <!-- Card -->
                            <div class="dt-card">

                                <!-- Card Body -->
                                <div class="dt-card__body">
 <form name="numtrans" action="">
      
        	     <div class="col-sm-12">
                        <div class="form-group">
                          <label>Enter The Number Of The Last Transactions You Want To Display </label><br>
                          <code>For Example, entering 32 will display the last 32 transactions
                          made.</code>
                          <input type="number" name="numtran" class="form-control">
                        
                        </div>
                      </div>
        	      
        	        <div class="col-sm-12">
                        <div class="form-group">
                          <input type="submit" name="numtranbut" id="button2" class="btn btn-secondary" value="Display Statement of Account" />
                        
                        </div>
                      </div>
        	      
        	        
        	          
       	          
      	 
       	  </form>
                                    <!-- Tables -->
                                    <div class="table-responsive">

<table id="data-table" class='table table-striped table-bordered table-hover'> <div class="row">
<thead>
      <tr>
												<th>Date</th>
                                                <th>Transaction ID</th>
                                                <th>Account Charges</th>
                                                <th>Withdrawals</th>
                                                <th>Deposits</th>
                                                <th>Withdrawn By</th>
                                                <th>Deposited By</th>
                                                <th>Amount</th>
      </tr>
      </thead>
                                            <tbody>
    
    <?php 
        if (isset($_REQUEST['numtran']))
        {
            $customid=$_SESSION['customerid'];
            $count=1;
            $query="SELECT * FROM transactions WHERE (payeeid='$customid') OR (receiveid='$customid') OR (charged='$customid')";
            $result=mysql_query($query);
            while(($arrvar = mysql_fetch_array($result))&&($count <= $_REQUEST['numtran'] ))
            {
                                    echo " <tr> <td>".$arrvar[paymentdate]."</td> ";
                                
                                     echo"<td>".$arrvar['transactionid']."</td>";
                                    if ($arrvar['payeeid']==$customid)
                                    {   echo "<td> </td><td>$cur$arrvar[amount]</td>";
                                        $q="SELECT * FROM registered_payee WHERE slno='".$arrvar['receiveid']."'";
                                         $r=  mysql_query($q);
                                     
                                     $rarry= mysql_fetch_array($r);
                                     echo "<td> </td><td>$rarry[payeename]</td>";
                                     echo "<td></td><td>$cur$arrvar[amount]</td> ";
                                    }
                              else if ($arrvar['receiveid']==$customid)
                              {echo "<td> </td><td> </td> <td>$cur$arrvar[amount]</td>";
                                  $r=  mysql_query("SELECT * FROM customers WHERE customerid='".$arrvar['payeeid']."'");
                                     $rarry= mysql_fetch_array($r);
                                       echo "<td> </td><td>Cashier 1 </td>";
                                       echo "<td> $cur $arrvar[amount]</td> ";
                              }
                              
                               if ($arrvar['charged']==$customid)
                              {echo " <td>$cur $arrvar[amount]</td>";
                                       
                                       echo "<td> </td> <td> </td> <td> </td> <td> </td> <td>$cur$arrvar[amount]</td>";
                              }
                              echo "</tr>";
                              $count=$count+1;
            }
        }
        else if (isset($_REQUEST['button']))
        {
            
                
        }
        
    ?>
       </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Date</th>
                                                <th>Transaction ID</th>
                                                <th>Account Charges</th>
                                                <th>Withdrawals</th>
                                                <th>Deposits</th>
                                                <th>Withdrawn By</th>
                                                <th>Deposited By</th>
                                                <th>Amount</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /tables -->

                                </div>
                                <!-- /card body -->

                            </div></div>
                            <!-- /card -->

                  
                <!-- /site content -->



<?php include'footer.php' ?>
    
<script src="../assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
<script src="../assets/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script src="../assets/js/custom/data-table.js"></script>