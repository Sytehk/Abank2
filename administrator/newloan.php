
<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");

if(!($_SESSION["adminid"]))
{
		header("Location: login.php");
}

$m=date("Y-m-d");
if(isset($_POST["add"]))
{
$sql="INSERT INTO loantype (loantype,prefix,maximumamt,minimumamt,interest,status)
VALUES
('$_POST[loantype]','$_POST[prefix]','$_POST[maxamt]','$_POST[minamt]','$_POST[interest]','$_POST[accstatus]')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
$msg= "1 record added";
}
$sql2 = mysql_query("select * from loantype");
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
              <div class="dt-card bg-primary text-white">

                <!-- Card Header -->
                <div class="dt-card__header">

                  <!-- Card Heading -->
                  <div class="dt-card__heading">
                    <div class="d-flex align-items-center">
                      <i class="icon icon-users icon-fw icon-2x text-white mr-2"></i>
                      <h3 class="dt-card__title text-white">Create New Loan Plan</h3>
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
<script type="text/javascript">
function valid()
{
	if(document.form1.loantype.value=="")
	{
		alert("INVALID LOAN TYPE");
		return false;
	}
	if(document.form1.prefix.value=="")
	{
		alert("INVALID PREFIX");
		return false;
	}
	if(document.form1.maxamt.value=="")
	{
		alert("INVALID MAXIMUM AMOUNT");
		return false;
	}
	if(document.form1.minamt.value=="")
	{
		alert("INVALID MINIMUM AMOUNT");
		return false;
	}
	if(document.form1.interest.value=="")
	{
		alert("INVALID INTEREST");
		return false;
	}
	if(document.form1.status.value=="")
	{
		alert("INVALID STATUS");
		return false;
	}
	
}
</script>


                <!-- Card Body -->
                <div class="dt-card__body pb-3">
                  <!-- Form -->
                    <form onsubmit="return valid()" id="form1" name="form1" method="post" action="">
           <?php if(isset($msg)) echo $msg; ?>
           
                    <!-- Grid -->
                    <div class="row">
                    

                      <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Loan Name</label>
                          <input required type="text" name="loantype" id="loantype" class="form-control">
                  
                        </div>
                      </div>
                      <!-- / grid item -->
                        <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Loan Code</label>
                          <input type="text"  name="prefix" id="prefix"  class="form-control">
                      </div>
                      </div>
                      <!-- / grid item -->
   
                       <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Maximum Request</label>
                          <input type="number" name="maxamt" id="maxamt" class="form-control">
              
                        </div>
                      </div>
                      <!-- / grid item -->
                       <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Minimum Request</label>
                          <input type="number" name="minamt" id="minamt" class="form-control">
              
                        </div>
                      </div>
                      <!-- / grid item -->
                       <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Loan Interest</label>
                          <input required type="number" name="interest" id="interest"  class="form-control">
                  
                        </div>
                      </div>
                      <!-- / grid item -->
					 <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Activate Loan</label>
                          <select name="accstatus" id="accstatus" class="custom-select custom-select-sm">
              		<option value="">Select</option>
                    <option value="active">active</option>
                    <option value="inactive">inactive</option>
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
        	        <input  type="submit" name="add" id="add"  class="btn btn-danger" value="Create Loan Plan" />
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

<script src="../assets/node_modules/sweetalert2/dist/sweetalert2.js"></script>

</body>
    