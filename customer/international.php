
<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

$acc= mysql_query("select * from accounts where customerid='".$_SESSION['customerid']."'");
?>
<!-- Site Content Wrapper -->

           <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    
                    <!-- /page header -->
		 <div class="dt-entry__header">

			International Bank Transfer

                    </div>

                    <!-- Grid -->
                    <div class="row">

                        <!-- Grid Item -->
                        <div class="col-xl-12">
              <!-- Card -->
              <br>
						<strong>Dear, <?php echo $_SESSION[customername];  ?></strong>
						<p>Your IP Address: <?php echo $_SERVER['REMOTE_ADDR']; ?> has been logged on our server <br />at <?php echo date("h:i A d M Y"); ?> to monitor money laundering.</p>
                        Please, Ensure to fill in the fields correctly.
              <div class="dt-card bg- text-black">

                <!-- Card Header -->
                <div class="dt-card__header">
				
                  <!-- Card Heading -->
                  <div class="dt-card__heading">
                    <div class="d-flex align-items-center">
                      <i class="icon icon-revenue icon-fw icon-2x text-black mr-2"></i>
                      <h3 class="dt-card__title text-black">International Fund Transfer</h3>
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
                        <a class="dropdown-item" href="javascript:void(0)">Action</a>
                        <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                        <a class="dropdown-item" href="javascript:void(0)">Something else
                          here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                      </div>
                      <!-- /dropdown menu -->

                    </div>
                    <!-- /dropdown -->
                  </div>
                  <!-- /card tools -->

                </div>
                <!-- /card header -->

                <!-- Card Body -->
                <div class="dt-card__body pb-3">
                  <!-- Form -->
                  <form id="form1" name="form1" method="post" action="internationalbankstransfer.php">
             <?php if(isset($_REQUEST['error']))
                 {      if($_REQUEST['error']=='nodetails')
                            echo "<h3 style=\"color:red; width:fill-available; text-align:center;\">Details Missing or Invalid.<br/>Payment Failed</h3>";
                        else if ($_REQUEST['error']=='WrongPassword')
                            echo "<script>swal('Error!', 'Wrong Password Entered!', 'error')</script>;";
                        else if ($_REQUEST['error'] == 'insufficientbalance')
                            echo "<script>swal('Error!', 'Insufficient Balance!', 'error')</script>;";
                          else if ($_REQUEST['error'] == 'cot')
                            echo "<script>swal('Error!', 'Wrong COT Code Entered Please Try Again! Or contact Your local bank for assistance', 'error')</script>;";
                          else if ($_REQUEST['error'] == 'imf')
                            echo "<script>swal('Error!', 'Wrong IMF Code Entered Please Try Again!  Or contact Your local bank for assistance', 'error')</script>;";
                            
                         else if ($_REQUEST['error'] == 'accountnotfound')
                            echo "<script>swal('Error!', 'Wrong Account Number. Please Check The Account Number And Try Again!', 'error')</script>;";
                            
                            else if ($_REQUEST['error'] == 'successful')
                            echo "<script>swal('Succesful!', 'Transfer Succesful!', 'success')</script>;";
                        else
                            echo "<h3 style=\"color:red; width:fill-available; text-align:center;\">".$_REQUEST['error']."</h3>";
                 }
                            ?>
                            <?php if(isset($_REQUEST['success']))
                 {          if ($_REQUEST['success'] == 'successful')
                            echo "<script>swal('Succesful!', 'Transfer Succesful!', 'success')</script>;";
                        
                 }
                            ?>
                    <!-- Grid -->
                    <div class="row">
                    
                      <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Receiver's Bank</label>
                          <input required name="bank" class="form-control">
                         
                        </div>
                      </div>
                      <!-- / grid item -->
                      
                       <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Receiver's Bank Address</label>
                          <input required name="bankadd" class="form-control">
                         
                        </div>
                      </div>
                      <!-- / grid item -->
                      
						<!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Receiver's Name</label>
                          <input required name="rname" id="ac_no" class="form-control">
                         
                        </div>
                      </div>
                      <!-- / grid item -->
 						
 							<!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Receiver's Bank Account Number</label>
                          <input required name="acctno" id="ac_no" class="form-control">
                         
                        </div>
                      </div>
                      <!-- / grid item -->

					<!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>SWIFT/ABA ROUTING NUMBER</label>
                          <input required name="swift" id="ac_no" class="form-control">
                         
                        </div>
                      </div>
                      <!-- / grid item -->

                      
                      <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Select Sender's Account</label>
                          <select required name="acct" id="ac_no" class="custom-select custom-select-sm">
                           <?php  while($rowsacc = mysql_fetch_array($acc))
						{
							echo "<option value='$rowsacc[accno]'>$rowsacc[accno] </option>";
						}
						?>
                          </select>
                        </div>
                      </div>
                      <!-- / grid item -->

                      <!-- Grid Item -->
                      <div class="col-6">
                        <div class="form-group">
                            <label class="mb-0">Enter Amount To Transfer</label>
                           <input required type="number" min="10" name="pay_amt" id="pay_amt" class="form-control form-control-sm" placeholder="Amount">
                        </div>
                      </div>
                      <!-- / grid item -->

                     </div>
                     </div>
                 <!-- Card Footer -->
                <div class="px-7 py-5 border-top border-width-2 border-black-transparent">
                  <span class="d-block display-4 mb-2"><?php
                  
				$mailreq = mysql_query("select * from mail where reciverid='".$_SESSION['customerid']."'");
				$results = mysql_query("SELECT * FROM accounts WHERE  customerid='$_SESSION[customerid]'");

			 while($arrow = mysql_fetch_array($results))
			{
				echo " $cur $arrow[accountbalance]";
			
		   }?></span>
                  <p class="f-16 mb-0">Account Balance</p>
                
                 <tr>
        	      <td colspan="2"><div align="right">
        	        <input type="submit" class="btn btn-primary" name="pay" id="pay" value="Transfer" />
        	      </div></td>
       	        </tr></div>
                <!-- /card footer -->
 </form>
              </div>
              <!-- /card -->

            </div>
            <!-- /grid item -->
                    <!-- Entry Header -->




                </div>
</div>
                <!-- /site content -->



<?php include'footer.php' ?>

</body>
    