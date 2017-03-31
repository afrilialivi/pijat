<?php
if(!$_SESSION['login']){
header("location: ../login.php");
}
?>
<!doctype html>
  <html lang="en">
    <head>
      <title><?php echo $title2; ?></title>
      <!-- bootstrap 3.0.2 -->
      <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />

      <!-- DATA TABLES -->
      <link href="../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
      <!-- Theme style -->
      <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
      <!-- iCheck for checkboxes and radio inputs -->
      <link href="../css/iCheck/all.css" rel="stylesheet" type="text/css" />

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
      <link rel="stylesheet" href="../css/vertical_scroll_new/jquery.mCustomScrollbar.css">
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
      </style>
    </head>
    <body margin-left="0" margin-top="0">
      <div class="header_fixed">
        <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
          <button class="blue_color_button"  type="button">ADD ROOM</button>
          <div class="morph-content">
            <div>
              <div class="content-style-form content-style-form-2">
                <span class="icon icon-close">Close the dialog</span>
                <h2>ADD ROOM</h2>
                <form action="<?= $action_room?>" method="post" enctype="multipart/form-data" role="form">
                  <p><label>Room Name</label><input type="text" name="i_room_name" required  /></p>
                  <p>
                    <input type="submit" name="button" id="button" value="SAVE" class="button_building">
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div><!-- morph-button -->
        <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
          <button type="button" class="blue_color_button" >ADD TABLE</button>
          <div class="morph-content">
            <div>
              <div class="content-style-form content-style-form-2">
              <span class="icon icon-close">Close the dialog</span>
              <h2>ADD TABLE</h2>
                <form action="<?= $action_table?>" method="post" enctype="multipart/form-data" role="form">
                  <p><label>Table Name</label><input type="text" name="i_table_name" required  /></p>
                  <p>
                    <input type="submit" name="button" id="button" value="SAVE" class="button_building">
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div><!-- morph-button -->
        <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
          <button type="button" class="red_color_button"   onClick="javascript: window.location.href = 'home.php'; ">BACK TO MENU</button>
        </div><!-- morph-button -->
        <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
          <button class="progress-button reds_color_button" data-style="shrink" data-horizontal onClick="save_all_position(); ">SAVE</button>
        </div><!-- morph-button -->
      </div>
      <section>
        <div class="box">
          <div class="box-body" style="background-color:rgba(255, 255, 255, 0.85);height:100vh;"></div>
        </div>
      </section>  
      <div class="footer_fixed">
        <div class="morph-button morph-button-sidebar morph-button-fixed">
          <button type="button" class="green_color_button"><?= $building_name?></button>
          <div class="morph-content">
            <div>
              <div class="content-style-sidebar">
                <span class="icon icon-close">Close the overlay</span>
                <h2>Room</h2>
                <ul>
                <?php
                $q_building5 = mysql_query("select * from buildings order by building_id");
                while($r_building5 = mysql_fetch_array($q_building5)){ ?>
                  <li>
                    <a href="table.php?building_id=<?= $r_building5['building_id']?>"><?= $r_building5['building_name']?></a>
                  </li>
                <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
  </html>
