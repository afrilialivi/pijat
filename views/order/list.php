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
    <!-- vertical scroll -->
    <link rel="stylesheet" href="../css/vertical_scroll/main.css">
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
  <style media="screen">
  section {
    padding: 2em;
    text-align: justify;
    max-width: 1300px;
    margin: 0 auto;
    clear: both;
  }

  <?php while ($r_infrastruktur__ = mysql_fetch_array($q_infrastruktur__)) {?>

  #theImg_<?= $r_infrastruktur__['ruangan_infrastruktur_id']?>,
  #text_<?= $r_infrastruktur__['ruangan_infrastruktur_id']?> {
          position: absolute;
          /*width: 100px;
          height: 100px;*/
          margin-left:
          <?php
          $data_x = ($r_infrastruktur__['koordinat_x']) ? $r_infrastruktur__['koordinat_x'] : 0;
          echo $data_x ?>px;
          margin-top:
          <?php
          $data_y = ($r_infrastruktur__['koordinat_y']) ? $r_infrastruktur__['koordinat_y'] : 0;
          echo $data_y ?>px;
          cursor: pointer;
  }
  #text_<?= $r_infrastruktur__['ruangan_infrastruktur_id']?> {
    position: absolute;
    /*width: 100px;
    height: 100px;*/
    margin-left:
    <?php
    $data_x = ($r_infrastruktur__['koordinat_x']) ? $r_infrastruktur__['koordinat_x'] : 0;
    $data_x=$data_x-10;
    echo $data_x ?>px;
    margin-top:
    <?php
    $data_y = ($r_infrastruktur__['koordinat_y']) ? $r_infrastruktur__['koordinat_y'] : 0;
    echo $data_y ?>px;
    cursor: pointer;
  }
  h2#text_<?= $r_infrastruktur__['ruangan_infrastruktur_id']?> {
     font-size: 14px;
     position: absolute;
     top: 5px;
     left: 0;
     width: 130px;
  }
  h2#text_<?= $r_infrastruktur__['ruangan_infrastruktur_id']?>:hover{
    top: -20px;
    font-size: 18px;
    margin: 0;
    padding: 0;
    width: 130px;
  }

  <?php } ?>
  .reds_color_button{
    background-color: #665073!important;
  }
  .morph-button-fixed > button {
    z-index: 2;
}

  .morph-button-sidebar .morph-content {
      background: rgb(102, 80, 115);
  }
  </style>
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
  <section>
    <div class="box">
      <div id="ruangan_box" name="ruangan_box" class="box-body" style="background-color:rgba(255, 255, 255, 0.85);height:100vh;">
        <?php while ($r_infrastruktur_ = mysql_fetch_array($q_infrastruktur_)) {
          $where_infrastruktur_id = "WHERE infrastruktur_id = '".$r_infrastruktur_['infrastruktur']."'";
          $img = select_config_by('infrastruktur','infrastruktur_img', $where_infrastruktur_id);?>
          <div class="imgHolder">
            <a href="<?= $action_order.$r_infrastruktur_['ruangan_infrastruktur_id'] ?>">
              <img id="theImg_<?= $r_infrastruktur_['ruangan_infrastruktur_id']?>" src="../img/infrastruktur/<?= $img?>" alt="">
              <h2 id="text_<?= $r_infrastruktur_['ruangan_infrastruktur_id']?>"><?= $r_infrastruktur_['infrastruktur_name']?></h2>
            </a>
          </div>
        <?}?>
      </div>
      <input type="hidden" name="ruangan_id" id="ruangan_id" value="<?= $ruangan_id?>">
    </div>
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
               while($r_branch = mysql_fetch_array($q_branch)){?>
                 <li><a href="order.php?branch_id=<?= $r_branch['branch_id']?>"><?= $r_branch['branch_name']?></a></li>
                 <?php } ?>
             </ul>
            </div>
           </div>
         </div>
       </div><!-- morph-button -->
       <div class="morph-button morph-button-sidebar morph-button-fixed" style=" bottom: 10px; left: 240px;">
         <button type="button" class="reds_color_button"><?= $ruangan_name?></button>
         <div class="morph-content reds_color_button">
           <div>
             <div class="content-style-sidebar">
               <span class="icon icon-close">Close the overlay</span>
               <h2>Ruangan</h2>
               <ul>
                 <?php
                 while($r_ruangan = mysql_fetch_array($q_ruangan)){ ?>
                   <li>
                     <a href="order.php?branch_id=<?= $branch_id?>&ruangan_id=<?= $r_ruangan['ruangan_id']?>">
                       <?= $r_ruangan['ruangan_name']?>
                     </a>
                   </li>
                   <?php } ?>
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
  <script>
			(function() {
				var docElem = window.document.documentElement, didScroll, scrollPosition;

				// trick to prevent scrolling when opening/closing button
				function noScrollFn() {
					window.scrollTo( scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0 );
				}

				function noScroll() {
					window.removeEventListener( 'scroll', scrollHandler );
					window.addEventListener( 'scroll', noScrollFn );
				}

				function scrollFn() {
					window.addEventListener( 'scroll', scrollHandler );
				}

				function canScroll() {
					window.removeEventListener( 'scroll', noScrollFn );
					scrollFn();
				}

				function scrollHandler() {
					if( !didScroll ) {
						didScroll = true;
						setTimeout( function() { scrollPage(); }, 60 );
					}
				};

				function scrollPage() {
					scrollPosition = { x : window.pageXOffset || docElem.scrollLeft, y : window.pageYOffset || docElem.scrollTop };
					didScroll = false;
				};

				scrollFn();

				[].slice.call( document.querySelectorAll( '.morph-button' ) ).forEach( function( bttn ) {
					new UIMorphingButton( bttn, {
						closeEl : '.icon-close',
						onBeforeOpen : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterOpen : function() {
							// can scroll again
							canScroll();
						},
						onBeforeClose : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterClose : function() {
							// can scroll again
							canScroll();
						}
					} );
				} );

				// for demo purposes only
				[].slice.call( document.querySelectorAll( 'form button' ) ).forEach( function( bttn ) {
					bttn.addEventListener( 'click', function( ev ) { ev.preventDefault(); } );
				} );
			})();
		</script>
</body>
</html>
