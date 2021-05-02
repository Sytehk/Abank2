
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

                        <h1 class="dt-page__title">System Settings</h1>

                    </div>

                    <!-- /page header -->
  <!-- Grid Item -->
            <div class="col-xl-12 col-md-6 order-xl-4">

              <!-- Card -->
              <div class="dt-card bg- text-black">

                <!-- Card Header -->
                <div class="dt-card__header">

                  <!-- Card Heading -->
                  <div class="dt-card__heading">
                    <div class="d-flex align-items-center">
                      <i class="icon icon-settings icon-fw icon-2x text-black mr-2"></i>
                      <h3 class="dt-card__title text-black">System Settings</h3>
                    </div>
                  </div>
                  <!-- /card heading -->

                 
<?
if(isset($_POST["button"]))
{
    
    if(mysql_num_rows(mysql_query($sql)) > 0)
    {
     echo"<script>swal('Error!', 'This Branch Has Alredy Been Created!', 'error')</script>";
    }
    else
    {
    $sql="update system_settings set bank_name='$_POST[name]', theme_color='$_POST[color]', email='$_POST[email]', phone='$_POST[phone]',currency='$_POST[currency]', theme_color='$_POST[color]'";
    mysql_query($sql);
    if (!mysql_query($sql))
    {
    die('Error: ' . mysql_error());
    }
   echo"<script>swal('Success!', 'System Settings Updated Successfully!', 'success')</script>";
    }
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
   $results = mysql_query("SELECT * FROM system_settings");

while($arrow = mysql_fetch_array($results))
{
	$bankname=$arrow[bank_name];
	$currency=$arrow[currency];
	$email=$arrow[email];
	$phone=$arrow[phone];
    $status=$arrow[status];
    $theme=$arrow[theme_color];
}
   ?>                  
                      <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Bank Name</label>
                          <input required name="name" value="<? echo $bankname; ?>" class="form-control">
                  
                        </div>
                      </div>
                      <!-- / grid item -->
                       
                      <!-- / grid item -->
                      
    <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Currency</label>
                          <select name="currency" id="country" class="custom-select custom-select-sm">
               <?php   $acc= mysql_query("select * from currency");

               
               while($rowsacc = mysql_fetch_array($acc))
						{
							echo "<option value='$rowsacc[code]'>$rowsacc[name]</option>";
						}
						?>
                </select>
                        </div>
                      </div>
                      <!-- / grid item -->
                       <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Official E-mail</label>
                          <input name="email"  value="<? echo $email; ?>" class="form-control">
              
                        </div>
                      </div>
                      <!-- / grid item -->
                       <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Official Phone Number</label>
                          <input name="phone"  value="<? echo $phone; ?>" class="form-control">
              
                        </div>
                      </div>
                      <!-- / grid item -->
                      
                      <!-- Grid Item -->
                      <div class="col-sm-12">
                        <div class="form-group">
                       
                          <label>Theme Color</label>
                          <select name="color" class="custom-select custom-select-sm">
                          
                         <?php   $acc= mysql_query("select * from theme");

               
               while($rowsacc = mysql_fetch_array($acc))
						{
							echo "<option value='$rowsacc[code]'>$rowsacc[color]</option>";
						}
						?>
                </select>
                        </div>
                      </div>
                      <!-- / grid item -->


 <div class="col-sm-6">
                        <div class="form-group">
                          
                          <input required hidden type="text" value="<? echo $status; ?>" name="status"   class="form-control">
                  
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
        	        <input  type="submit" name="button" id="button"  class="btn btn-secondary" value="Update System" />
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
    