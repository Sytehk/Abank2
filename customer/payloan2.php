<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');


			if(!isset($_POST[pay]))
			{  print "
				<script language='javascript'>
					window.location = 'dashboard.php';
				</script>
			";
			}

?>
<!-- Site Content Wrapper -->

            <div class="dt-content-wrapper">



                <!-- Site Content -->

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    
                    <!-- /page header -->
 <div class="dt-entry__header">

Loan Payment

                    </div>

                    <!-- /page header -->
  <!-- Grid Item -->
            <!-- Grid -->
                    <div class="row">

                        <!-- Grid Item -->
                        <div class="col-xl-12">
   <!-- Card -->
              <div class="dt-card bg- text-black">

                <!-- Card Header -->
                <div class="dt-card__header">

                  <!-- Card Heading -->
                  <div class="dt-card__heading">
                    <div class="d-flex align-items-center">
                      <i class="icon icon-revenue2 icon-fw icon-2x text-black mr-2"></i>
                      <h3 class="dt-card__title text-black">Pay Loan</h3>
                    </div>
                  </div>
                  <!-- /card heading -->

                  <!-- Card Tools -->
                  <div class="dt-card__tools align-self-start mt-n3 mr-n2">
                    <!-- Dropdown -->
                    <div class="dropdown">

                     

                    </div>
                    <!-- /dropdown -->
                  </div>
                  <!-- /card tools -->

                </div>
                <!-- /card header -->

                <!-- Card Body -->
                <div class="dt-card__body pb-3">
                  <!-- Form -->
                  <form id="form1" name="form1" method="post" action="payloan.php" onsubmit="return validate()">
            <?php
			if(isset($_POST[pay]))
			{ ?>
			
			 <?php	
				  	$result3 = mysql_query("select * from loan WHERE loanid='$_POST[payto]'");
                                        $arrpayment3 = mysql_fetch_array($result3);
                                        $aamt=0;
                                        for($i=0;$i<mysql_num_rows($x);$i++)
                                        {
                                        $arrpayment2 = mysql_fetch_array($x);
                                        $aamt = $aamt+$arrpayment2[amount];
                                        }
                                    
                                        $balance = $arrpayment3[loanamt] + ($arrpayment3[interest]*$arrpayment3[loanamt]/100) - $aamt;
                                       
                  ?>
                  <?php
			}
			?>
                    <!-- Grid -->
                    <div class="row">
                      <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Loan Type</label>
                          <input readonly  value="<? echo $arrpayment3[loantype];?>" id="oldpass" size="35" class="custom-select custom-select-sm">
                         
                        </div>
                      </div>
                      <!-- / grid item -->
<!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Loan Amount </label>
                          <input readonly  value="<? echo $arrpayment3[loanamt];?>"  size="35" class="custom-select custom-select-sm">
                           
                        </div>
                      </div>
                      <!-- / grid item -->
                      <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Loan Interest Rate </label>
                          <input readonly  value="<? echo $arrpayment3[interest];?>%"  size="35" class="custom-select custom-select-sm">
                           
                        </div>
                      </div>
                      <!-- / grid item -->

 
 <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Loan Total</label>
                          <input readonly  value="<? echo $balance;?>"  size="35" class="custom-select custom-select-sm">
                           
                        </div>
                      </div>
                     <? $unpaid=$arrpayment3[balance]-$arrpayment3[paid];?>
                      <!-- / grid item -->
                       <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Unpaid Balance</label>
                          <input readonly  value="<? echo $unpaid;?>" size="35" class="custom-select custom-select-sm">
                           
                        </div>
                      </div>
                      <!-- / grid item -->

                      <!-- Grid Item -->
                      <div class="col-6">
                        <div class="form-group">
                        <span class="d-flex mb-1">
                            <label class="mb-0">Enter Transaction Password</label>
                            <a href="javascript:void(0)" class="text-white ml-auto">
                               
                            </a>
                        </span>
                          <input required name="trpass" type="password"  type="text" class="form-control form-control-sm"
                                 placeholder=" Transaction Password">
                        </div>
                      </div>
                      <!-- / grid item -->

                     
                    </div>
                    <!-- /grid -->
                 
                  <!-- /form -->
                </div>
                <!-- /card body -->
 <input type="hidden" name="paytoo" value="<?php echo $_POST[payto]; ?>"  />
                <input type="hidden" name="lid" value="<?php echo $arrpayment3[loannumber]; ?>"  />
				<input type="hidden" name="amt" value="<?php echo $_POST[pay_amt]; ?>"  />
				
                <!-- Card Footer -->
                <div class="px-7 py-5 border-top border-width-2 border-black-transparent">
                  <span class="d-block display-4 mb-2">
                
                 <tr>
        	      <td colspan="2"><div align="right">
        	        <input type="submit" class="btn btn-secondary" name="pay2" id="pay2" value="Pay Loan" />
        	      </div></td>
       	        </tr></div>
                <!-- /card footer -->
   
       </form>
              </div>
              <!-- /card -->

            </div></div>
            <!-- /grid item -->
                    <!-- Entry Header -->


                </div>

                <!-- /site content -->



<?php include'footer.php' ?>

</body>
    