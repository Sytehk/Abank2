
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

                        <h1 class="dt-page__title">New Account Type</h1>

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
                      <i class="icon icon-user icon-fw icon-2x text-black mr-2"></i>
                      <h3 class="dt-card__title text-black"> Create New Bank Account Type</h3>
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
                   <form  method="post" action="accounttype.php">
         
                    <!-- Grid -->
                    <div class="row">
                     <?
if(isset($_POST["button"]))
{
    
    $sql="INSERT INTO accountmaster (accounttype, prefix, minbalance, interest) VALUES ('$_POST[acct]','$_POST[code]','$_POST[min]','$_POST[int]')";
    mysql_query($sql);
   
   echo"<script>swal('Success!', 'New Account Type Created Successfully!', 'success')</script>";
    }

?>

                      <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Account Name</label>
                          <input required name="acct"  id="firstname" class="form-control">
                  
                        </div>
                      </div>
                      <!-- / grid item -->
                       
                      <!-- / grid item -->
                      
   
                       <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Account Code</label>
                          <input name="code" id="state" class="form-control">
              
                        </div>
                      </div>
                      <!-- / grid item -->
                       <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Account Minimum Balance</label>
                          <input name="min" id="city" class="form-control">
              
                        </div>
                      </div>
                      <!-- / grid item -->
                      
                      <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                           <label>Savings Interest</label>
                          <input required name="int" value="<? echo $loginid?>" id="loginid" class="form-control">
                  
                        </div>
                      </div>
                      
                      
                       
                    </div>
                    <!-- /grid -->
                 
                  <!-- /form -->
                </div>
                <!-- /card body -->

                <!-- Card Footer -->
                <div class="px-7 py-5 border-top border-width-2 border-black-transparent">
                  
                
                 <tr>
        	      <td colspan="2"><div align="right">
        	        <input  type="submit" name="button" id="button"  class="btn btn-secondary" value="Create New Account Type" />
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
    