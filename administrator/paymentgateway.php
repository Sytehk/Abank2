
<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");
if(!($_SESSION["adminid"]))
{
		header("Location: login.php");
}

$loan=mysql_query("select * from system_settings ");
?>
<!-- Site Content Wrapper -->

            <div class="dt-content-wrapper">



                <!-- Site Content -->

                <div class="dt-content">



                    <!-- Page Header -->

                    <div class="dt-page__header">

                        <h1 class="dt-page__title">Payment Gateway Settings</h1>

                    </div>

                    <!-- /page header -->
  <!-- Grid Item -->
            <div class="col-xl-12 col-md-6 order-xl-4">

              <!-- Card -->
              <div class="dt-card bg-prima text-black">

                <!-- Card Header -->
                <div class="dt-card__header">

                  <!-- Card Heading -->
                  <div class="dt-card__heading">
                    <div class="d-flex align-items-center">
                      <i class="icon icon-dollar icon-fw icon-2x text-black mr-2"></i>
                      <h3 class="dt-card__title text-black">Payment Settings</h3>
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
<?
if(isset($_POST["button"]))
{

    $sql="update payment_gateway set gateway_name='$_POST[pname]', secret_key='$_POST[stack]', status='$_POST[pstatus]'  where name='$_POST[pname]'";
    
    
    $sql2="update payment_gateway set gateway_name='$_POST[rname]', secret_key='$_POST[rave]', status='$_POST[rstatus]'  where name='$_POST[rname]'";
    mysql_query($sql);
    if (!mysql_query($sql))
    {
    die('Error: ' . mysql_error());
    }
     mysql_query($sql2);
    if (!mysql_query($sql2))
    {
    die('Error: ' . mysql_error());
    }
   echo"<script>swal('Success!', 'Payment Gateway Updated Successfully!', 'success')</script>";
    }

?>
                </div>
                <!-- /card header -->
                <!-- Card Body -->
                <div class="dt-card__body pb-3">
                  <!-- Form -->
                   <form  method="post" action="">
         
                    <!-- Grid -->
                    <div class="row">
   <?php
   $results = mysql_query("SELECT * FROM payment_gateway where name='Paystack'");

while($arrow = mysql_fetch_array($results))
{
	$stack=$arrow[secret_key];
	$pname=$arrow[name];
    $pstatus=$arrow[status];
}
   ?> 
   
      <?php
   $results = mysql_query("SELECT * FROM payment_gateway where name='Rave'");

while($arrow = mysql_fetch_array($results))
{
	$rave=$arrow[secret_key];
	$rname=$arrow[name];
    $rstatus=$arrow[status];
}
   ?>               
                      <!-- / grid item -->
                      
    <!-- Grid Item -->
                     
                      <!-- / grid item -->
                       <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Paystack Public Key</label>
                          <input name="stack"  value="<? echo $stack; ?>" class="form-control">
                           <input name="pname" hidden value="<? echo $pname; ?>" class="form-control">
              
              
                        </div>
                      </div> 
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Rave-Pay Public Key</label>
                          <input name="rave"  value="<? echo $rave; ?>" class="form-control">
              			  <input name="rname" hidden value="<? echo $rname; ?>" class="form-control">
              
                        </div>
                      </div>
                      <!-- / grid item -->
                       <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Paystack Status</label>
                          <select required name="pstatus"  class="custom-select custom-select-sm">
                           <option value=''>Select Status</option>
                            <option value='1'>Activate</option>
                           <option value='0'>Deactivate</option>
						
                          </select>
                        </div>
                      </div>
                      <!-- / grid item -->
                         <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Rave-Pay Status</label>
                          <select required name="rstatus"  class="custom-select custom-select-sm">
                           <option value=''>Select Status</option>
                            <option value='1'>Activate</option>
                           <option value='0'>Deactivate</option>
						
                          </select>
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
        	        <input  type="submit" name="button" id="button"  class="btn btn-secondary" value="Update Payment Gateway" />
        	      </div></td>
       	        </tr></div>
                <!-- /card footer -->
 </form>
              </div>
              <!-- /card -->

            </div>
            <!-- /grid item -->
                    <!-- Entry Header -->


                    <div class="dt-entry__header">





                    </div>

                    <!-- /grid -->



                </div>

                <!-- /site content -->



<?php include'footer.php' ?>


</body>
    