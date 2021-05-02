
<script src="../assets/js/custom/sweetalert.min.js"></script>
        <?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");


$query="SELECT * from system_settings"; 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
$bname=$row['bank_name'];
								   
 }



$m=date("Y-m-d");
if(isset($_POST["button"]))
{
    $sql="SELECT * FROM customers WHERE loginid='".$_POST['loginid']."'";
    if(mysql_num_rows(mysql_query($sql)) > 0)
    {
        $logmsg="LOGIN ID ALREADY EXIST";
    }
    else
    {
    $sql="INSERT INTO customers (accountno, cot, imf, phone, email, acctype, ifsccode,firstname, lastname,loginid,accpassword,transpassword,accstatus,country,state,city,accopendate) VALUES ('$_POST[acc]','$_POST[cot]','$_POST[imf]','$_POST[phone]','$_POST[email]','$_POST[acctype]','$_POST[brname]','$_POST[firstname]','$_POST[lastname]','$_POST[loginid]','$_POST[accountpassword]','$_POST[transactionpassword]','Active','$_POST[country]','$_POST[state]','$_POST[city]','$m')";
    mysql_query($sql);
    $ree=mysql_query("SELECT * FROM customers WHERE loginid='$_POST[loginid]'");
    $arra=  mysql_fetch_array($ree);
    $cusid=$arra['customerid'];
    $sql="INSERT INTO accounts(accno,customerid,accstatus,accopendate,accounttype,accountbalance) VALUES ('$_POST[acc]','$cusid','$_POST[accstatus]','$m','$_POST[acctype]',0)";
    // More headers
    $subj='Welcome To Our Bank';
	$mess='We welcome you to our online banking platform as we hope to serve you better. Your login Id is '.$_POST[loginid].', your account password is '.$_POST[accountpassword].' and your transaction password is '.$_POST[transactionpassword].' . Plesae feel free to change it any time';
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: <no-reply@'.$bname.'>' . "\r\n";
	$to=$_POST[email];
	$subject=$subj;
	$message=$mess;
	mail($to,$subject,$message,$headers);
    if (!mysql_query($sql))
    {
    die('Error: ' . mysql_error());
    }
    $logmsg ="<script>swal('Succesful!', 'Your account has been created and a mail containing your account login details has been sent to you. Your Account Number is $_POST[acc] Thank you for joining us!', 'success')</script>";
    }
}
$resq = mysql_query("select * from branch");
?>
<html lang="en">
<head>
    <!-- Meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Khaytech Banking System">
<meta name="keywords" content="Banking, Online, Piggybank">
<!-- /meta tags -->
<title>Customers Login</title>

<!-- Site favicon -->
<link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
<!-- /site favicon -->

<!-- Font Icon Styles -->
<link rel="stylesheet" href="../assets/node_modules/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="../assets/vendors/gaxon-icon/styles.css">
<!-- /font icon Styles -->

<!-- Perfect Scrollbar stylesheet -->
<link rel="stylesheet" href="../assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css">
<!-- /perfect scrollbar stylesheet -->

<!-- Load Styles -->    <link rel="stylesheet" href="../assets/css/light-style-1.min.css">
    <!-- /load styles -->

</head>
<body class="dt-sidebar--fixed dt-header--fixed">

<!-- Loader -->
<div class="dt-loader-container">
  <div class="dt-loader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
    </svg>
  </div>
</div>
<!-- /loader -->
<!-- Root -->
<div class="dt-root">
    <div class="dt-root__inner">
        <!-- Login Container -->
        <div class="dt-login--container">

            <!-- Login Content -->
            <div class="dt-login__content-wrapper">

                <!-- Login Background Section -->
                <div class="dt-login__bg-section">

                    <div class="dt-login__bg-content">
                        <!-- Login Title -->
                        <h1 class="dt-login__title">Create An Account</h1>
                        <!-- /login title -->

                        <p class="f-16">Create an account with us to explore the possibilities of online banking.</p>
                       
                    </div>


                    <!-- Brand logo -->
                    <div class="dt-login__logo">
                        <a class="dt-brand__logo-link" href="login.php">
                            <img class="dt-brand__logo-img" src="../assets/images/logoo.png" alt="Drift">
                        </a>
                    </div>
                    <!-- /brand logo -->

                </div>
                <!-- /login background section -->

                <!-- Login Content Section -->
                <div class="dt-login__content">

                    <!-- Login Content Inner -->
                    <div class="dt-login__content-inner">

                        <!-- Form -->
                         <form onsubmit="return valid()" id="form1" name="form1" method="post" action="">
           <p>&nbsp;<?php echo $logmsg; ?></p>
                    <!-- Grid -->
                    <div class="row">
           

                      <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Customer's First Name</label>
                          <input required name="firstname"  id="firstname" class="form-control">
                  
                        </div>
                      </div>
                      <!-- / grid item -->
                        <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Customer's Last Name</label>
                          <input type="text" name="lastname" id="lastname" class="form-control">
                      </div>
                      </div>
                      <!-- / grid item -->
                       <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Customer's Phone</label>
                          <input type="number" name="phone"  class="form-control">
                      </div>
                      </div>
                      <!-- / grid item -->
                       <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Customer's Email</label>
                          <input type="email" name="email" class="form-control">
                      </div>
                      </div>
                      <!-- / grid item -->
    <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Select Country</label>
                          <select name="country" id="country" class="custom-select custom-select-sm">
               <option value="">Select</option>
 <option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
                </select>
                        </div>
                      </div>
                      <!-- / grid item -->
                       <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Enter State</label>
                          <input name="state" id="state" class="form-control">
              
                        </div>
                      </div>
                      <!-- / grid item -->
                       <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Enter City</label>
                          <input name="city" id="city" class="form-control">
              
                        </div>
                      </div>
                      <!-- / grid item -->
                       <!-- Grid Item -->
                       <? $tcode=rand(1111111111,9999999999);?>
                           <input hidden required type="number" readonly value="<? echo $tcode ?>" name="acc" class="form-control">
                  
                      <!-- / grid item -->


                      <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                        <? $loginid = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz01234567890') , 0 , 14 );?>

                          <label>Login ID</label>
                          <input required name="loginid" value="<? echo $loginid?>" id="loginid" class="form-control">
                  
                        </div>
                      </div>
                      <!-- / grid item -->


 <div class="col-sm-6">
                        <div class="form-group">
                          <label>Login Password</label>
                          <? $loginpass = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz01234567890') , 0 , 14 );?>
                          <input required type="text" value="<? echo $loginpass?>" name="accountpassword" id="accountpassword"  class="form-control">
                           
                           <? $cot = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890') , 0 , 10 );?>
                           <? $imf = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890') , 0 , 10 );?>
                          <input required type="text" value="<? echo $cot?>" hidden name="imf" id="accountpassword"  class="form-control">
                          <input required type="text" value="<? echo $imf?>" hidden name="cot" id="accountpassword"  class="form-control">
                  
                        </div>
                      </div>
                      <!-- / grid item --> 
                      <!-- / grid item --> <div class="col-sm-6">
                        <div class="form-group">
                          <label>Transaction Password</label>
                          <input required type="text" value="<? echo $loginpass?>" name="transactionpassword" id="transactionpassword" class="form-control">
                  
                        </div>
                      </div>
                      
                      <!-- / grid item -->
                                 <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Select Bank Branch</label>
                          <select name="brname" id="brname" class="custom-select custom-select-sm">
                <?php
                    while($rta = mysql_fetch_array($resq) )
                        {
                            echo "<option value='$rta[ifsccode]'>$rta[branchname]</value>";
                        }
                ?> </select>
                
                         
                        </div>
                      </div>
                      <!-- / grid item -->
                      
                  
                      <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Select Account Type</label>
                          <select name="acctype"  class="custom-select custom-select-sm">
               <?php $re = mysql_query("SELECT * FROM accountmaster");
                           while ($a=  mysql_fetch_array($re))
                           {
                                echo "<option value='$a[accounttype]'>$a[accounttype]</option>";
                           }?>
                    
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
        	        <input  type="submit" name="button" id="button"  class="btn btn-secondary" value="Open Account" />
        	      </div></td>
       	        </tr></div>
                <!-- /card footer -->
 </form>
                        <!-- /form -->

                    </div>
                    <!-- /login content inner -->

                  
                </div>
                <!-- /login content section -->

            </div>
            <!-- /login content -->

        </div>
        <!-- /login container -->

    </div>
</div>
<!-- /root -->

<!-- Optional JavaScript -->
<script src="../assets/node_modules/jquery/dist/jquery.min.js"></script>
<script src="../assets/node_modules/moment/moment.js"></script>
<script src="../assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Perfect Scrollbar jQuery -->
<script src="../node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<!-- /perfect scrollbar jQuery -->

<!-- masonry script -->
<script src="../assets/node_modules/masonry-layout/dist/masonry.pkgd.min.js"></script>
<script src="../assets/node_modules/sweetalert2/dist/sweetalert2.js"></script>
<script src="../assets/js/functions.js"></script>
<script src="../assets/js/customizer.js"></script><!-- Custom JavaScript -->
<script src="../assets/js/script.js"></script>

<script src="../assets/node_modules/sweetalert2/dist/sweetalert2.js"></script>
<script src="../assets/js/custom/sweet-alert.js"></script>
<script src="../assets/node_modules/sweetalert2/dist/sweetalert2.js"></script>
</body>
</html>
           
<?php include'footer.php' ?>
