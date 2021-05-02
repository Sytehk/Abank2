

<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");
if((!(isset($_SESSION['customerid'])))&&(!(isset($_SESSION['adminid']))))
    header('Location:login.php?error=nologin');

if(isset($_GET["mailid"]))
{
	mysql_query("DELETE FROM mail where mailid='$_GET[mailid]'");
	$recres = "Mail deleted Successfully...";
}
if(isset($_SESSION['adminid']))
$result = mysql_query("SELECT * FROM mail where senderid='$_SESSION[adminid]'");
else if(isset($_SESSION['customerid']))
    $result= mysql_query("SELECT * FROM mail where senderid='$_SESSION[customerid]'");
?><div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    
                    <!-- /page header -->
 <div class="dt-entry__header">

Sent Messages

                    </div>

                    <!-- Grid -->
                    <div class="row">

                        <!-- Grid Item -->
                        <div class="col-xl-12">

                            <!-- Module -->
                            <div class="dt-module">

                                <!-- Module Sidebar -->
                                <div class="dt-module__sidebar">

                                    <!-- Sidebar Header -->
                                    <div class="dt-module__sidebar-header border-bottom">
                                        <div class="d-none d-md-flex align-items-center">
                                            <i class="icon icon-open-mail icon-1x mr-3 text-dark"></i>
                                            <span class="h3 mb-0">Messages</span>
                                        </div>

                                        <!-- App Quick Menu -->
                                        <div class="quick-menu-list d-md-none">

                                            <!-- Search Box -->
                                            <form class="search-box d-md-none">
                                                <input class="form-control" type="search" id="address" name="address"
                                                       placeholder="Search in app...">
                                                <button type="submit" class="search-icon"><i
                                                            class="icon icon-search icon-lg"></i></button>
                                            </form>
                                            <!-- /search box -->

                                            <a href="javascript:void(0)" class="quick-menu d-none d-md-block"
                                               data-toggle="mdrawer" data-target="#drawer-search-bar"><i
                                                        class="icon icon-search"></i></a>
                                            <a href="javascript:void(0)" class="quick-menu" data-open="compose"><i
                                                        class="icon icon-editors"></i></a>
                                            <a href="javascript:void(0)" class="quick-menu" data-toggle="mdrawer"
                                               data-target="#drawer-notifications"><i
                                                        class="icon icon-notification2"></i></a>
                                            <a href="javascript:void(0)" class="quick-menu d-md-none"
                                               data-toggle="msidebar-content"><i class="icon icon-menu"></i></a>
                                        </div>
                                        <!-- /app quick menu -->
                                    </div>
                                    <!-- /sidebar header -->

                                    <!-- Sidebar Menu -->
                                    <div class="dt-module__sidebar-content ps-custom-scrollbar">

                                        <!-- Button -->
                                        <div class="action-area mt-5 mb-7 d-none d-md-block">
                                            <a href="javascript:void(0)"
                                               class="btn btn-shadow btn-default compose-btn btn-rounded"
                                               data-open="compose">
                                                <i class="icon icon-editors icon-fw mr-2"></i>Compose</a>
                                        </div>
                                        <!-- /button -->

                                        <!-- Sidebar Navigation -->
                                        <ul class="dt-module-side-nav">

                                            <!-- Menu Header -->
                                            <li class="dt-module-side-nav__header">
                                                <span class="dt-module-side-nav__text">main</span>
                                            </li>
                                            <!-- /menu header -->

                                            <!-- Menu Item -->
                                            <li class="dt-module-side-nav__item">
                                                <a href="inbox.php" class="dt-module-side-nav__link">
                                                    <i class="icon icon-inbox icon-fw icon-lg"></i>
                                                    <span class="dt-module-side-nav__text">Inbox</span> </a>
                                            </li>
                                            <!-- /menu item -->

                                            <!-- Menu Item -->
                                            <li class="dt-module-side-nav__item active">
                                                <a href="javascript:void(0)" class="dt-module-side-nav__link">
                                                    <i class="icon icon-send icon-fw icon-lg"></i>
                                                    <span class="dt-module-side-nav__text">Sent</span> </a>
                                            </li>
                                            <!-- /menu item -->

                                           

                                        </ul>
                                        <!-- /sidebar navigation -->

                                       
                                    </div>
                                    <!-- /sidebar Menu -->

                                </div>
                                <!-- /module sidebar -->

                                <!-- Module Container -->
                                <div class="dt-module__container">

                                    <!-- Module Header -->
                                    <div class="dt-module__header d-none d-md-flex">

                                        <!-- Search Box -->
                                        <form class="search-box ml--15">
                                            <input class="form-control border-0 shadow-none bg-focus form-control-sm"
                                                   placeholder="Search in app..." value=""
                                                   type="search"> <span class="search-icon"><i
                                                        class="icon icon-search icon-lg"></i></span>
                                        </form>
                                        <!-- /search box -->

                                           

                                    </div>
                                    <!-- /module header -->

                                    <!-- Module Content -->
                                    <div class="dt-module__content ps-custom-scrollbar">

                                        <!-- Module Content Inner -->
                                        <div class="dt-module__content-inner">

                                            <div class="px-1 pb-4 border-bottom border-width-2 mb-1 mt--5">
                                                <!-- Dropdown -->
                                                <div class="dropdown">

                                                    <!-- Checkbox -->
                                                    <div class="dt-checkbox dt-checkbox-icon dt-checkbox-only mr-1">
                                                        <input id="option-checkbox" type="checkbox">
                                                        <label class="font-weight-light dt-checkbox-content"
                                                               for="option-checkbox">
                                                            <span class="unchecked"><i
                                                                        class="icon icon-box-o icon-fw icon-xl"></i></span>
                                                            <span class="checked"><i
                                                                        class="icon icon-box-check-o icon-fw icon-xl text-primary"></i></span>
                                                        </label>
                                                    </div>
                                                    <!-- /checkbox -->

                                                    <!-- Dropdown Button -->
                                                    <a href="#" class="dropdown-toggle text-dark" data-toggle="dropdown"
                                                       aria-haspopup="true" aria-expanded="false">Sent Messages </a>
                                                    <!-- /dropdown button -->

                                                    

                                                </div>
                                                <!-- /dropdown -->
                                            </div>

                                            <!-- Module List -->
                                            <div class="dt-module__list">

<?php
while($row = mysql_fetch_array($result))
  				{
                                  $rid=$row['reciverid'];
                                  if (!($rid=='admin'))
                                  {
                                      $rres=  mysql_query("SELECT * FROM customers WHERE customerid='".$rid."'");
                                      $rresarr = mysql_fetch_array($rres);
                                      $recid = $rresarr['firstname']." ".$rresarr['lastname'];
                                  }
                                  else
                                      $recid=$rid;
		 echo "                                 <!-- Module Item -->
                                                <div class='dt-module__list-item'>

                                                    
                                                    <div class='dt-checkbox dt-checkbox-icon dt-checkbox-only mr-5'>
                                                        <input id='icon-checkbox-1' type='checkbox'>
                                                        <label class='font-weight-light dt-checkbox-content'
                                                               for='icon-checkbox-1'>
                                                            <span class='unchecked'><i
                                                                        class='icon icon-box-o icon-fw icon-xl'></i></span>
                                                            <span class='checked'><i
                                                                        class='icon icon-box-check-o icon-fw icon-xl text-primary'></i></span>
                                                        </label>
                                                    </div>
                                                    <!-- /checkbox -->

                                                    <!-- Checkbox -->
                                                    <div class='dt-checkbox dt-checkbox-icon dt-checkbox-only mr-5'>
                                                        <input id='icon-checkbox-2' type='checkbox''>
                                                        <label class='font-weight-light dt-checkbox-content'
                                                               for='icon-checkbox-2'>
                                                            <span class='unchecked'><i
                                                                        class='icon icon-star-o icon-fw icon-xl'></i></span>
                                                            <span class='checked'><i
                                                                        class='icon icon-star-fill icon-fw icon-xl text-warning'></i></span>
                                                        </label>
                                                    </div>
                                                    <!-- /checkbox -->

                                                    <!-- Avatar -->
                                                    <img class='dt-avatar mr-4' src='../assets/images/icon-account.png'
                                                         alt='Reece Jacklin''>
                                                    <!-- /avatar -->

                                                    <!-- Module Content -->
                                                    <div class='dt-module__list-item-content'
                                                         data-location='readmessage.php?mailid=$row[mailid]'>
                                                        <div class='user-detail'>
                                                            <span class='user-name'>Receiver: $recid</span>
                                                            <span class='dt-separator-v'>&nbsp;</span>
                                                            <span class='designation'>Subject: $row[subject]</span>
                                                        </div>
                                                        <p class='mb-0 text-light-gray text-truncate'>Message ID Number Is $row[mailid]</p>
                                                    </div>
                                                    <!-- /module content -->

                                                    <!-- Module Info -->
                                                    <div class='dt-module__list-item-info'>
                                                        <div class='badge-group'>
                                                           <a href='readmessage.php?mailid=$row[mailid]'> <span class='badge bg-dark-blue text-white'>View</span><?a>
                                                           <a href='sent.php?mailid=$row[mailid]'> <span class='badge badge-danger'>Delete</a></span>
                                                     </div>
                                                        <span>$row[mdatetime]</span>
                                                    </div>
                                                    <!-- /module info -->
                                                </div>
                                                <!-- /module item -->";

                                                }?>
                                               
                                               
                                               
                                               

                                            </div>
                                            <!-- /module list -->

                                        </div>
                                        <!-- /module content inner -->

                                    </div>
                                    <!-- /module content -->

                                </div>
                                <!-- /module container -->

                              
                            </div>
                            <!-- /module -->

                        </div>
                        <!-- /grid item -->

                    </div>
                    <!-- /grid -->

                </div>
                <!-- /site content -->

                
<?php include'footer.php' ?>

            </div>
            <!-- /site content wrapper -->

           
        </main>

        <!-- Compose Mail Box -->
        <div class="compose-mail-box">










<?
$datetime=date("Y-m-d h:i:s");
if(isset($_POST["sendmsg"]))
{
    if(isset($_SESSION['customerid']))
    {
        $sql="INSERT INTO  mail(subject,message,mdatetime,senderid,reciverid) VALUES('$_POST[subject]','$_POST[message]','$datetime','$_SESSION[customerid]','$_POST[sendto]')";
    }
    
    if(isset($_SESSION['adminid']))
    {
        $sql="INSERT INTO  mail(subject,message,mdatetime,senderid,reciverid) VALUES('$_POST[subject]','$_POST[message]','$datetime','$_SESSION[adminid]','$_POST[sendto]')";
    }

if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error());
  }
$msgsuccess = mysql_affected_rows();
echo"<script>swal('Success!', 'Message Sent Successfully!', 'success')</script>";
}
?>





            <!-- Compose Mail Header -->
            <div class="compose-mail-box__header" data-toggle="minimize">
                <div class="title">
                    <i class="icon icon-editors icon-fw icon-xl mr-2"></i>Compose New Message
                </div>

                <div class="action-area ml-auto">
                    <a class="text-white mr-3" href="javascript:void(0)"> <i class="icon icon-chevrolet-down icon-xl"></i> </a>
                    <a class="text-white" href="javascript:void(0)" data-dismiss="compose"> <i
                                class="icon icon-remove icon-xl"></i>
                    </a>
                </div>
            </div>
            <!-- /compose mail header -->

            <!-- Compose Mail Body -->
            <div class="compose-mail-box__body">
               <!-- Form -->
                <form  method="post" action="">

                    <!-- Form Group -->
                    <div class="form-group mb-1">
                  Select Desk
                   <select name="sendto" id="sendto" class="custom-select custom-select-sm">
                        <?php
                            $result = mysql_query("SELECT * FROM staff");
                            
                                while($rows = mysql_fetch_array($result))
                                {
                                    echo "<option value='$rows[username]'>$rows[email]</option>";
                                }
                            
                        ?>
                        </select>       </div>
                    <!-- /form group -->

                    <!-- Form Group -->
                    <div class="form-group">
                        <label class="sr-only" for="subject">Subject</label>
                        <input type="text" class="form-control"  name="subject" id="subject" placeholder="Subject">
                    </div>
                    <!-- /form group -->

                    <!-- Form Group -->
                    <div class="form-group">
                        <label class="sr-only" for="textarea">Example textarea</label> <textarea name="message" id="MESSAGE" class="form-control"
                                                                                                 id="textarea">
Hi ,
Type Your Message Content Here.

Cheers!
</textarea>
                    </div>
                    <!-- /form group -->

                    <!-- Form Group -->
                    <div class="d-flex align-items-center">
                        <input type="submit" name="sendmsg" id="sendmsg" class="btn btn-primary btn-sm" value="Send Message">

                        <div class="action-area ml-auto">
                            <a class="text-dark" href="javascript:void(0)" data-dismiss="compose">
                                <i class="icon icon-trash-filled mr-1"></i> <span class="f-12 text-uppercase align-middle">discard</span>
                            </a>
                        </div>
                    </div>
                    <!-- /form group -->
                </form>
                <!-- /form -->
            </div>
            <!-- /compose mail body -->

        </div>
        <!-- /compose mail box -->
    </div>
</div>
<!-- /root -->

<!-- Contact User Information -->
<div class="card user-info-card">
    <div class="p-4">
        <div class="dt-avatar-wrapper mb-3">
            <img style="display: none" class="dt-avatar size-50 profile-pic"
                 src="assets/images/user-avatar/domnic-harris.jpg" alt="Domnic Harris"> <span style="display: none"
                                                                                              class="dt-avatar size-50 bg-orange text-white text-uppercase profile-placeholder">pp</span>

            <div class="dt-avatar-info">
                <span class="dt-avatar-name h4 mb-1">Domnic Harris</span>
                <span class="dt-avatar-desc f-12">dom.harris@gmail.com</span>
            </div>
        </div>

        <div class="mb-1">
            <i class="icon icon-maps icon-fw mr-1"></i> <span class="f-12">Palo Alto, CA, United States</span>
        </div>

        <div>
            <i class="icon icon-contacts icon-fw mr-1"></i> <span class="f-12">20+ Mutual Connections</span>
        </div>
    </div>

    <div class="px-4 py-2 border-top d-flex justify-content-between">
        <a href="javascript:void(0)" class="card-link">Add to Contacts</a>
        <div class="ml-2 ml-sm-10">
            <a class="mr-1" href="javascript:void(0)"><i class="icon icon-mail icon-fw icon-xl"></i></a>
            <a class="mr-1" href="javascript:void(0)"><i class="icon icon-tag-o icon-fw icon-xl"></i></a>
            <a href="javascript:void(0)"><i class="icon icon-chat-app icon-fw icon-xl"></i></a>
        </div>
    </div>
</div>
<!-- /contact user information -->

<script src="../assets/js/custom/apps/app.js"></script>
<script src="../assets/js/custom/apps/mail-app.js"></script>
</body>
</html>
<!-- Localized -->