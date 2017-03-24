  <?php
  if(isset($_GET['did']) && $_GET['did'] == 1){
  ?>
  <section class="content_new">
    <div class="alert alert-info alert-dismissable">
      <i class="fa fa-check"></i>
      <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
      <b>Sukses !</b>
      Simpan Berhasil
    </div>
  </section>
  <?php
  }else if(isset($_GET['did']) && $_GET['did'] == 2){
  ?>
  <section class="content_new">
    <div class="alert alert-info alert-dismissable">
      <i class="fa fa-check"></i>
      <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
      <b>Sukses !</b>
      Edit Berhasil
    </div>
  </section>
  <?php
  }else if(isset($_GET['did']) && $_GET['did'] == 3){ ?>
  <section class="content_new">
    <div class="alert alert-info alert-dismissable">
      <i class="fa fa-check"></i>
      <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
      <b>Sukses !</b>
      Delete Berhasil
    </div>
  </section>
  <?php } ?>
  <!-- Main content -->
  <section class="content">
        <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="col-md-3 col-xs-6 hide-on-mobile">
              <!-- small box -->
              <div class="small-box bg-white home_back1">
                  <div class="inner">
                      <h3>
                          <?= $date_now ?>
                      </h3>
                      <p>
                         Tanggal
                      </p>
                  </div>
                  <div class="icon home_icon1">
                  </div>
              </div>
          </div><!-- ./col -->
          <div class="col-md-3 col-xs-6 hide-on-mobile">
              <!-- small box -->
              <div class="small-box bg-white home_back2">
                  <div class="inner">
                      <h3>
                          <?= $jumlah_penjualan ?>
                      </h3>
                      <p>
                          Jumlah Penjualan
                      </p>
                  </div>
                  <div class="icon home_icon2">
                  </div>
              </div>
          </div><!-- ./col -->
          <div class="col-md-3 col-xs-6 hide-on-mobile">
              <!-- small box -->
              <div class="small-box bg-white home_back3">
                  <div class="inner">
                    <?php echo "<span style='font-size:20px'>Rp. </span>".$total_omset ?>
                      <h3>
                      </h3>
                      <p>
                          Total Omset
                      </p>
                  </div>
                  <div class="icon home_icon3">
                  </div>
              </div>
          </div><!-- ./col -->
          <div class="col-md-3 col-xs-6 hide-on-mobile">
              <div class="small-box bg-white home_back4" >
                  <div class="inner" style="height:90px;">
                      <h3 class="hide-on-mobile320" style="font-size:16px;">
                         <?= $menu_terlaris?>
                      </h3>
                      <p>
                         Menu Terlaris
                      </p>
                  </div>
                  <div class="icon home_icon4">
                  </div>
              </div>
          </div><!-- ./col -->
          <div class="col-md-4 show-on-mobile320">
            <div class="small-box bg-white home_back1">
              <h3>
                Tanggal
                  <?= $date_now ?>
              </h3>
              <br>
              <h>Jumlah Penjualan : </h>
              <h3 style="margin-top:0;">
                  <?= $jumlah_penjualan ?>
              </h3>
              <br>
              <h>Total Omset</h>
              <h3 style="margin-top:0;">
                  <?php echo "<span style='font-size:20px'>Rp. </span>".$total_omset ?>
              </h3>
              <br>
              <h>Menu Terlaris</h>
              <h3 style="font-size:12px;">
                 <?= $menu_terlaris?>
              </h3>
              <br>
                <!-- <div class="input-group">
                  <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" required class="form-control pull-left" id="reservation2" name="i_date" value="<?= $date_default?>"/>
                </div>/.input group -->
            </div>
          </div>
          </br>
          <div class="col-md-4 show-on-mobile720" style="padding-top: 20px;">
            <div class="small-box bg-white home_back1 text-center">
              <h3>
                Tanggal
                  <?= $date_now ?>
              </h3>
              <br>
              <h>Jumlah Penjualan : </h>
              <h3 style="margin-top:0;">
                  <?= $jumlah_penjualan ?>
              </h3>
              <br>
              <h>Total Omset</h>
              <h3 style="margin-top:0;">
                  <?php echo "<span style='font-size:20px'>Rp. </span>".$total_omset ?>
              </h3>
              <br>
              <h>Menu Terlaris</h>
              <h3 style="font-size:12px;">
                 <?= $menu_terlaris?>
              </h3>
              <br>
                <!-- <div class="input-group">
                  <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" required class="form-control pull-left" id="reservation2" name="i_date" value="<?= $date_default?>"/>
                </div>/.input group -->
            </div>
          </div>
      </div><!-- /.row -->
      </div>
 
          </div>
      </div>
      
  </section><!-- /.content -->
