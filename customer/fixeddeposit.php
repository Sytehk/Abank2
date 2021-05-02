
<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

 
?>


<?
$rr=mysqli_query($con,"SELECT COUNT(*) FROM fixed_deposit where customerid  = '".$_SESSION['customerid']."'");
$r = mysqli_fetch_row($rr);
$nr = $r[0];
if($nr==1){
}	


?>



            <div class="dt-content-wrapper">


<? if($nr==1) { ?>
<script>

swal('Attention!', 'You Already Have A Fixed Deposit Account Running', 'info') 

</script>



<?}?>
                <!-- Site Content -->

                <div class="dt-content">



                    <!-- Page Header -->

                    <div class="dt-page__header">

                        <h1 class="dt-page__title"><?php echo $_SESSION[customername]; ?></h1>

                    
  <div class="dt-entry__header">
           </div>
           <div class="row">

                    <!-- /page header -->
  <!-- Grid Item -->
  
            <div class="col-xl-12 col-md-12 order-xl-4">

              <!-- Card -->
              <div class="dt-card bg-primary text-white">

                <!-- Card Header -->
                <div class="dt-card__header">

                  <!-- Card Heading -->
                  <div class="dt-card__heading">
                    <div class="d-flex align-items-center">
                      <i class="icon icon-revenue icon-fw icon-2x text-white mr-2"></i>
                      <h3 class="dt-card__title text-white">Fixed Deposit</h3>
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
                  
                
                  <form id="form1" name="form1" method="post" action="dashboard.php">
            
                    <!-- Grid -->
                    <div class="row">
                    <!-- Grid Item -->
<? $refid = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz01234567890') , 0 , 14 );?>
<? $act = substr(str_shuffle('01234567890') , 0 , 10 );?>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Reference Number</label>
                          <input readonly name="fdid" value="<? echo $refid ?>" class="form-control">
          				 <input readonly name="act" hidden value="<? echo $act ?>" class="form-control">
           
                        </div>
                      </div>
                      <!-- / grid item -->
<!-- Grid Item -->
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Enter Target Amount</label>
                          <input name="amount" value="" class="form-control">
           
                        </div>
                      </div>
                      <!-- / grid item -->

                     
                      <!-- Grid Item -->
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Select Duration</label>
                          <select required name="duration" class="custom-select custom-select-sm">
                         <?php   $result=  mysql_query("SELECT * FROM duration");
					  while($arrvar = mysql_fetch_array($result))
			  {
				echo "<option value='".$arrvar['value']."'>".$arrvar['name']."</option>";
			  }  
                     
			  ?>
                          </select>
                        </div>
                      </div>
                      <!-- / grid item -->


                      <!-- Grid Item -->
                      <div class="col-12">
                      Terms & Conditions: Please Note That You Cant Withdraw Deposited Savings In This Scheme Until The Stipulated
                      Time As Selected Above. 
                        <div class="form-group">
                                            <div class="form-check"><br>
                                                <input class="form-check-input" type="checkbox" value=""
                                                       id="invalidCheck2" required>
                                                <label class="form-check-label" for="invalidCheck2">
                                                    Agree to terms and conditions
                                                </label>
                                            </div>
                                        </div>
                      </div>
                      <!-- / grid item -->

                     
                    </div>
                    <!-- /grid -->
                 
                  <!-- /form -->
                </div>
                <!-- /card body -->

                <!-- Card Footer -->
                <div class="px-7 py-5 border-top border-width-2 border-black-transparent">
                  
                 <tr>
        	      <td colspan="2"><div align="right">
        	        <input type="submit" <? if($nr==1) print"disabled";
                
                ?> class="btn btn-danger" name="fixed" id="pay" value="Setup Account" />
        	      </div></td>
       	        </tr></div>
                <!-- /card footer -->
 </form> 
              </div>
              <!-- /card -->

            </div>
            <!-- /grid item -->
                    <!-- Entry Header -->


                  

                    <!-- /grid -->



                </div></div></div>

                <!-- /site content -->



<?php include'footer.php' ?>


</body>
    