<!-- Content Header (Page header) -->
        

                <!-- Main content -->
              <section class="content">
                  <div class="row">
                      
                    <!-- right column -->
                    <div class="col-md-12">
                        <!-- general form elements disabled -->

                          
                      <div class="title_page"> <?= $title ?></div>

                          <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-cokelat">
                                
                                <div class="box-body">
                                    
                                    <div class="col-md-8">
                                        
                                        <div class="form-group">
                                            <label>Nama Infrastruktur</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama..." value="<?= $row->infrastruktur_name ?>"/>
                                        </div>
                                      
                                        <div class="form-group">
                                          <label>Warna Infrastruktur</label>
                                           <input type="text" name="i_warna" id="i_warna" class="form-control" placeholder="Masukkan warna..." value="<?= $row->infrastruktur_warna ?>"/>               
                                  		  </div>

                                    </div>  
                                        <div class="col-md-4">
                                          <label>Image</label>
                                          <?php
                                            if($id){
                                             $gambar = ($row->infrastruktur_img) ? $row->infrastruktur_img : "img_not_found.png";
                                            ?>
                                            <br />
                                            <img src="<?= "../img/infrastruktur/".$gambar ?>" style="max-width:100%; 
                                            padding-bottom: 10px"/>
                                            <?php
                                            } ?>
                                             <div class="input-group  ">
                                                <label class="input-group-btn">
                                                    <span class="btn btn-warning">
                                                        Browse… <input type="file" style="display: none;" name="i_img" id="i_img" class="btn-file" />
                                                    </span>
                                                </label>
                                                <input type="text" class="form-control" readonly="" 
                                                value="<?= $row->infrastruktur_img ?>">
                                            </div>
                                        </div>  
                                        
                                       
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                  <div class="box-footer">
                                    <input class="btn btn-warning" type="submit" value="Save"/>
                                    <a href="<?= $close_button?>" class="btn btn-danger" >Close</a>
                                  </div>
                            
                            </div><!-- /.box -->
                          </form>
                        </div><!--/.col (right) -->
                      </div>   <!-- /.row -->
              </section><!-- /.content -->