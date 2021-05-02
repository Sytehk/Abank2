<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");
include("header.php");

if(!(isset($_SESSION['adminid'])))
    header('Location:login.php?error=nologin');

?>
<!-- Site Content Wrapper -->

              <!-- Site Content Wrapper -->
            <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    
                    <!-- /page header -->
 <div class="dt-entry__header">

Search Results

                    </div>


                        <!-- Grid Item -->
                        <div class="col-xl-12">

                            </div>
                            <!-- /entry header -->

                            <!-- Card -->
                            <div class="dt-card">

                                <!-- Card Body -->
                                <div class="dt-card__body">

                                    <!-- Tables -->
                                    <div class="table-responsive">

<table id="data-table" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                     
					  <th width="15%">Account Number</th>
					  <th width="15%">Amount</th>
					   <th width="15%">Transaction Type</th>
                      <th width="15%">Date</th>
                    </tr>
                  </thead>
                  <tbody>
				  
							 
<?php
    $query = $_GET['query']; 
    // gets value sent over search form
     
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysql_query("SELECT * FROM transactions
            WHERE (`paymentdate` LIKE '%".$query."%') OR (`receiveid` LIKE '%".$query."%') ") or die(mysql_error());
             
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
	  echo "<script>swal('Successful!', 'Transcation Available', 'success')</script>";
     
  echo "<tr>
				 
				  <td>
				  ".$results['receiveid']."
				  </td>
				   <td>$cur
				  ".$results['amount']."
				  </td> 
				  <td>
				  ".$results['type']."
				  </td>
				   <td>
				  ".$results['paymentdate']."
				  </td>

				  
				  </tr>";
              }
             

        }
        else{ // if there is no matching rows do following
            echo "<script>swal('Error!', 'Transcation Not Found For The Entry! Please Check The Account Number Or Try Searching By Date', 'error')</script>";
        }
         
    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }
  ?>
				  
                  </tbody>
                </table>
                                    </div>
                                    <!-- /tables -->

                                </div>
                                <!-- /card body -->

                            </div></div>
                            </div></div>
                            <!-- /card -->

                  
                <!-- /site content -->



<?php include'footer.php' ?>
    
<script src="../assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
<script src="../assets/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script src="../assets/js/custom/data-table.js"></script>