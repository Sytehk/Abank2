


<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

if(!isset($_POST['deposit']))
    print "
				<script language='javascript'>
					window.location = '404.php';
				</script>
			";
			
if(isset($_POST['deposit']))
{
$depo = $_POST['amount'];
$email = $_POST['email'];
$phone= $_POST['phone'];
}
$result = mysql_query("select * from accounts WHERE customerid='$_SESSION[customerid]'");
$rowrec = mysql_fetch_array($result);


?>



<!-- Site Content Wrapper -->
            <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Profile -->
                    <div class="profile">
				     <!-- Profile Content -->
                        <div class="profile-content">

                            <!-- Grid -->
                            <div class="row">

                                <!-- Grid Item -->
                                <div class="col-xl-4 order-xl-2">


                                    <!-- Grid -->
                                    <div class="row">

                                        <!-- Grid Item -->
                                        <div class="col-xl-12 col-md-6 col-12 order-xl-2">

                                            <!-- Card -->
                                           
                                        </div>
                                        <!-- /grid item -->

                                      
                                    </div>
                                    <!-- /grid -->

                                </div>
                                <!-- /grid item -->

                                <!-- Grid Item -->
                                <div class="col-xl-12 order-xl-1">

                                    <!-- Card -->
                                    <div class="card">

                                        <!-- Card Header -->
                                        <div class="card-header card-nav bg-transparent d-sm-flex justify-content-sm-between">
                                           
                                            <ul class="card-header-links nav nav-underline" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#tab-pane1"
                                                       role="tab"
                                                       aria-controls="tab-pane1"
                                                       aria-selected="true">Select Payment Gateway To Proceed</a>
                                                </li>
                                              
                                            </ul>

                                        </div>
                                        <!-- /card header -->
                                         <!-- Grid Item -->
                               

                                       <br><!-- Entry Header -->
                  
									 <div class="card-body">

                     
                    <!-- /entry header -->

                    <!-- Grid -->
                    <div class="row">

                        <!-- Grid Item -->
                        <div class="col-xl-4 col-sm-6">
<?php $query="SELECT * FROM  payment_gateway where name='Rave' and status=1"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$rave="$row[secret_key]";
 
 }?>
<?php
 $query="SELECT count(*) FROM  payment_gateway where name='Rave' and status=1"; 
 
 $result = mysqli_query($con,$query);
 $row = mysqli_fetch_row($result);
$numrows = $row[0];

if($numrows==1) {
	?>
                            <!-- Card -->
                            <div class="card border border-primary">

                                <!-- Card Header -->
                                <h4 class="card-header border-bottom border-primary"><b><? echo "$cur $depo"; ?></b></h4>
                                <!-- /card header -->

                                <!-- Card Body -->
                                <div class="card-body">

                                    <!-- Card Title-->
                                    <h2 class="card-title">Rave-Pay Gateway</h2>
                                    <!-- Card Title-->

                                    <!-- Card Text-->
                                    <p class="card-text">
                                    <img class="card-img img-fluid mb-3" src="images/rave.png" alt="Card image cap" />

                                    </p>
                                    <!-- /card text-->

                                </div>
                                <!-- /card body -->

                                <!-- Card Footer -->
                                <div class="card-footer border-top border-primary"><form>
    <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
    <button type="button" class="btn btn-lg btn-primary btn-block" onClick="payWithRave()">Deposit</button>
</form>

<script>
    const API_publicKey = "<?=$rave?>";

    function payWithRave() {
        var x = getpaidSetup({
            PBFPubKey: API_publicKey,
            customer_email: "<?=$email?>",
            amount: "<?=$depo?>",
            customer_phone: "<?=$phone?>",
            currency: "NGN",
            txref: "rave-123456",
            meta: [{
                metaname: "flightID",
                metavalue: "AP1234"
            }],
            onclose: function() {},
            callback: function(response) {
                var txref = response.tx.txRef; // collect txRef returned and pass to a 					server page to complete status check.
                console.log("This is the response returned after a charge", response);
                if (
                    response.tx.chargeResponseCode == "00" ||
                    response.tx.chargeResponseCode == "0"
                ) {
                   swal({ 
            title: 'Deposit Successful',
            type: 'success',
            html: 
            'Your Depost Refrence Number Has Been Sent To Your E-Mail Address <strong><?=$email?></strong>.<br> ' + 
            'Click The Button Below To Complete Deposit Process & Post Deposited Fund To Your Account'+
            '<form method="post" action="dashboard.php"><br><input hidden name="mone" value="<?=$depo?>"><input class="btn btn-success" name="deposit" type="submit" value="Complete Process"></form><br> ' +
            '',
            showCloseButton: false,
            showCancelButton: false,
            showConfirmButton: false,
  
        }); 
                } else {
                   alert("Hello! Payment Not Successfull!");
                }

                x.close(); // use this to close the modal immediately after payment.
            }
        });
    }
</script></div>
                                <!-- /card footer -->

                            </div>
                            <!-- /card -->

                        </div>
                        <!-- /grid item -->
                    <?php
} 
?>



                        <!-- Grid Item -->
                        <div class="col-xl-4 col-sm-6">
<?php $query="SELECT * FROM  payment_gateway where name='Paystack' and status=1"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$paystack="$row[secret_key]";
 
 }?>
<?php
 $query="SELECT count(*) FROM  payment_gateway where name='Paystack' and status=1"; 
 
 $result = mysqli_query($con,$query);
 $row = mysqli_fetch_row($result);
$numrows = $row[0];

if($numrows==1) {
	?>
                            <!-- Card -->
                            <div class="card border border-primary">

                                <!-- Card Header -->
                               <h4  class="card-header border-bottom border-primary"><b><? echo "$cur $depo"; ?></b></h4>
                                 <!-- /card header -->

                                <!-- Card Body -->
                                <div class="card-body">

                                    <!-- Card Title-->
                                    <h2 class="card-title">Paystack Gateway</h2>
                                    <!-- Card Title-->

                                    <!-- Card Text-->
                                    <p class="card-text">
                                    <img class="card-img img-fluid mb-3" src="images/paystack.png" alt="Card image cap" />

                                    </p>
                                    <!-- /card text-->

                                </div>
                                <!-- /card body -->

                                <!-- Card Footer -->
                                <div class="card-footer border-top border-primary"><script src="https://js.paystack.co/v1/inline.js"></script>
  <button type="button" class="btn btn-lg btn-primary btn-block" onclick="payWithPaystack()"> Deposit </button> 
</form>
 <?php $dep=$depo*100?>
<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: "<?=$paystack?>",
      email: "<?=$email?>",
      amount: "<?=$dep?>",
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      firstname: 'Stephen',
      lastname: 'King',
      // label: "Optional string that replaces customer email"
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
        swal({ 
            title: 'Deposit Successful',
            type: 'success',
            html: 
            'Your Depost Refrence Number Has Been Sent To Your E-Mail Address <strong><?=$email?></strong>.<br> ' + 
            'Click The Button Below To Complete Deposit Process & Post Deposited Fund To Your Account'+
            '<form method="post" action="dashboard.php"><br><input hidden name="mone" value="<?=$depo?>"><input class="btn btn-success" name="deposit" type="submit" value="Complete Process"></form><br> ' +
            '',
            showCloseButton: false,
            showCancelButton: false,
            showConfirmButton: false,
  
        }); 
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script></div>
                                <!-- /card footer -->

                            </div>
                            <!-- /card -->

                        </div>
                        <!-- /grid item -->
                    <?php
} 
?>                 

                    </div>

                    <!-- /grid -->


                                    </div>
                                    <!-- /card -->

                            </div>
                            <!-- /grid -->

                        </div>
                        <!-- /profile content -->

                    </div>
                    <!-- /profile -->

                </div></div></div>
                <!-- /site content -->
                
                
                
<?php include'footer.php' ?>


<!-- Optional JavaScript -->
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/moment/moment.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Perfect Scrollbar jQuery -->
<script src="../node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<!-- /perfect scrollbar jQuery -->

<!-- masonry script -->
<script src="../node_modules/masonry-layout/dist/masonry.pkgd.min.js"></script>
<script src="../node_modules/sweetalert2/dist/sweetalert2.js"></script>
<script src="../assets/js/functions.js"></script>
<script src="../assets/js/customizer.js"></script>
<script src="../assets/js/custom/sweet-alert.js"></script>

<!-- Custom JavaScript -->
<script src="../assets/js/script.js"></script>

