<?
$query="SELECT * from system_settings"; 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
$bname=$row['bank_name'];
								   
 }?>
                <!-- Footer -->
<div align="center">
<footer class="dt-footer">

  <?php echo $bname;?> © <?php echo date("Y");?>

</footer></div>

<!-- /root -->

<!-- Optional JavaScript -->

<script src="../node_modules/jquery/dist/jquery.min.js"></script>

<script src="../node_modules/moment/moment.js"></script>

<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Perfect Scrollbar jQuery -->

<script src="../node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>

<!-- /perfect scrollbar jQuery -->



<!-- masonry script -->

<script src="../assets/node_modules/masonry-layout/dist/masonry.pkgd.min.js"></script>

<script src="../assetsnode_modules/sweetalert2/dist/sweetalert2.js"></script>

<script src="../assets/js/functions.js"></script>

<script src="../assets/js/customizer.js"></script><script src="../node_modules/chart.js/dist/Chart.min.js"></script>




<!-- Resources -->

<script src="../assets/node_modules/ammap3/ammap/ammap.js"></script>

<script src="../assets/node_modules/ammap3/ammap/maps/js/continentsLow.js"></script>

<script src="../assets/node_modules/ammap3/ammap/themes/light.js"></script>



<script src="../assets/node_modules/amcharts3/amcharts/amcharts.js"></script>

<script src="../assets/node_modules/amcharts3/amcharts/gauge.js"></script>



<script src="../assets/js/custom/charts/dashboard-default.js"></script>

<!-- Custom JavaScript -->

<script src="../assets/js/script.js"></script>




<!-- /footer -->
