
<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");
if(!($_SESSION["adminid"]))
{
		header("Location: login.php");
}

?>
<!-- Site Content Wrapper -->

            <div class="dt-content-wrapper">



                <!-- Site Content -->

                <div class="dt-content">



                    <!-- Page Header -->

                    <div class="dt-page__header">

                        <h1 class="dt-page__title"><?php echo $_SESSION[customername]; ?></h1>

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
                      <i class="icon icon-login-page icon-fw icon-2x text-black mr-2"></i>
                      <h3 class="dt-card__title text-black">Change Login Password</h3>
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

<?

if(isset($_POST["button"]))
{
    if (mysql_real_escape_string($_POST[newpass]) == $_POST[confpass])
    {
mysql_query("UPDATE administrator SET password='$_POST[newpass]' WHERE password='$_POST[oldpass]'");
	if(mysql_affected_rows() == 1)
	{
	echo "<script>swal('Succesful!', 'Your admin password has been updated successfully!', 'success')</script>;";
	}
	else
	{
	echo "<script>swal('error!', 'Password update was not successful. Ensure you entered the current password correctly!', 'error')</script>;";
	}
        }
    else
       echo "<script>swal('Error', 'Invalid New Password! Ensure Your Confirm Password Is  Correct', 'error')</script>;";
}?>

<script>
function validateForm()
{
var x=document.forms["form1"]["loginid"].value;
var y=document.forms["form1"]["oldpass"].value;
var z=document.forms["form1"]["newpass"].value;
var a=document.forms["form1"]["confpass"].value;
if (x==null || x=="")
  {
  swal('Error!', 'All fields are required!', 'error')
  return false;
  }
  if (y==null || y=="")
  {
  swal('Error!', 'Old password must be entered', 'error')
  return false;
  }
  if (z==null || z=="")
  {
 swal('Error!', 'Please enter the new password!', 'error')
  return false;
  }
  if (a==null || a=="")
  {
  swal('Error!', 'Confirm new password!', 'error')
  return false;
  }
  if(!(z==a))
      {
          swal('Error!', 'Confirm password field does not tally with the new password, please review!', 'error')
          return false;
      }
}
</script>

                <!-- Card Body -->
                <div class="dt-card__body pb-3">
                  <!-- Form -->
                 <form onsubmit="return validateForm()" id="form1" name="form1" method="post" action="">
            <?php echo $ctrow; ?>
                    <!-- Grid -->
                    <div class="row">
                      <!-- Grid Item -->
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Current Password</label>
                          <input required name="oldpass" type="password" id="oldpass" placeholder="Enter Current Password" size="35" class="custom-select custom-select-sm">
                         
                        </div>
                      </div>
                      <!-- / grid item -->

                      <!-- Grid Item -->
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Enter New Password</label>
                          <input required name="newpass" type="password" id="newpass" placeholder="Enter New Password" class="custom-select custom-select-sm">
                          
                        </div>
                      </div>
                      <!-- / grid item -->

                
 <!-- Grid Item -->
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Confirm New Password</label>
                          <input required name="confpass" type="password" id="confpass" placeholder="Confirm New Password" class="custom-select custom-select-sm">
                          
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
                  <span class="d-block display-4 mb-2">
                
                 <tr>
        	      <td colspan="2"><div align="right">
        	        <input type="submit" class="btn btn-secondary" name="button" id="button" value="Update Password" />
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
    