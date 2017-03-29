<?php
if(!$_SESSION['login']){
    header("location: ../login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
  <title><?php echo $judul ?></title>
		<!-- bootstrap 3.0.2 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs
    <link href="../css/iCheck/all.css" rel="stylesheet" type="text/css" />
-->
		<link rel="stylesheet" type="text/css" href="../css/style_table.css" />
		<!-- tooltip -->
 		<link rel="stylesheet" type="text/css" href="../css/tooltip/tooltip-classic.css" />
 		<!-- button component-->
 		<link rel="stylesheet" type="text/css" href="../css/button_component/normalize.css" />
		<link rel="stylesheet" type="text/css" href="../css/button_component/demo.css" />
		<link rel="stylesheet" type="text/css" href="../css/button_component/component.css" />
		<link rel="stylesheet" type="text/css" href="../css/button_component/content.css" />
    <!-- vertical scroll
    <link rel="stylesheet" href="../css/vertical_scroll/main.css">-->
    <!-- vertical scroll new -->
    <link rel="stylesheet" href="../css/vertical_scroll_new/style.css">
		<link rel="stylesheet" href="../css/vertical_scroll_new/jquery.mCustomScrollbar.css">         <!-- modal -->
    <link rel="stylesheet" type="text/css" href="../css/modal/component.css" />
    <!-- responsive -->
    <link rel="stylesheet" type="text/css" href="../css/responsive/jquery-ui.css" />
    <link href="../css/responsive/media.css" rel="stylesheet">
    <script src="../js/responsive/jquery.js"></script>
    <!-- end accordion -->

		<script src="../js/button_component/modernizr.custom.js"></script>

  <script type="text/javascript" src="../js/table/jquery.js"></script>
  <script type="text/javascript" src="../js/table/jquery.min.js"></script>
</head>
<body margin-left="0" margin-top="0">
  <div class="header_fixed">
		<div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
			<button class="blue_color_button"  type="button"  onClick="javascript: window.location.href = 'home.php'; "><i class="fa fa-bars show-on-mobile"></i>
      <span class="hide-on-mobile">BACK TO MENU</span>
      </button>BACK TO MENU</button>
		</div><!-- morph-button -->
		<!-- <div class="logo_order"></div> -->
  </div>
  <br>
  <section class="content">
    <center>
      <div class="box">
        <div class="box-body">
          <div class="">

          </div>
        </div>
      </div>
    </center>
  </section>
   <div class="footer_fixed">
     <div class="morph-button morph-button-sidebar morph-button-fixed">
       <button type="button" class="reds_color_button"><?= $branch_name?></button>
       <div class="morph-content">
         <div>
           <div class="content-style-sidebar">
             <span class="icon icon-close">Close the overlay</span>
             <h2>Cabang</h2>
             <ul>
               <?php
               $q_branch = mysql_query("select * from branches $where_branch order by branch_id");
               while($r_branch = mysql_fetch_array($q_branch)){
                 ?>
                 <li><a href="order.php?branch_id=<?= $r_branch['branch_id']?>"><?= $r_branch['branch_name']?></a></li>
                 <?php
               }
               ?>
             </ul>
             </div>
           </div>
         </div>
       </div><!-- morph-button -->
       <div class="morph-button morph-button-sidebar morph-button-fixed" style=" bottom: 10px; left: 240px;">
         <button type="button" class="reds_color_button"><?= $building_name?></button>
         <div class="morph-content reds_color_button">
           <div>
             <div class="content-style-sidebar">
               <span class="icon icon-close">Close the overlay</span>
               <h2>Ruangan</h2>
               <ul>
                 <?php
                 $q_building5 = mysql_query("select * from buildings where branch_id = '".$branch_id."' order by building_id");
                 while($r_building5 = mysql_fetch_array($q_building5)){
                   ?>
                   <li><a href="order.php?branch_id=<?= $branch_id?>&building_id=<?= $r_building5['building_id']?>"><?= $r_building5['building_name']?></a></li>
                   <?php
                 }
                 ?>
               </ul>
             </div>
           </div>
         </div>
       </div><!-- morph-button -->
     </div>
  <script src="../js/function.js" type="text/javascript"></script>
  <!-- Bootstrap
  <script src="../js/bootstrap.min.js" type="text/javascript"></script>-->
  <!-- DATA TABES SCRIPT -->
  <script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
  <script src="../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
  	<!-- date-range-picker -->
  <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
  <!-- InputMask
  <script src="../js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
  <script src="../js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
  <script src="../js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
  -->
  <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
  <script>window.jQuery || document.write('<script src="../js/vertical_scroll_new/jquery-1.11.0.min.js"><\/script>')</script>
  <script src="../js/vertical_scroll_new/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="../js/button_component/classie.js"></script>
  <script src="../js/button_component/uiMorphingButton_fixed.js"></script>
  <script src="../js/responsive/accordion.js"></script>
  <!-- modal -->
  <script src="../js/modal/classie.js"></script>
  <script src="../js/modal/modalEffects.js"></script>
</body>
</html>
