
        <!-- header logo: style can be found in header.less -->
           <?php
                if(isset($_GET['err']) && $_GET['err'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-warning alert-dismissable">
                <i class="fa fa-warning"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan Gagal !</b>
               Pilih meja yang di booking 
                </div>
           
                </section>
                <?php
                }
                ?>
                
                 <!-- Main content -->
        <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">
                <section class="content">
                  
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                          <div class="title_page"> <?= $title ?></div>

                             

                            <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                    
                                       
                                        <div class="col-md-12">
                                        
                                         <div class="form-group">
                                             <label>Tanggal </label>
                                             <div class="input-group">
            
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="date_picker1" name="i_date" value="<?= $row->date ?>"/>
                                        </div><!-- /.input group -->
                                         </div>
                                        
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama ..." value="<?= $row->name ?>"/>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label>Telepon</label>
                                        <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                        </div>
                                            <input min="0" required class="form-control" type="number" name="i_phone" placeholder="Masukkan telepon ..." value="<?= $row->phone?>">
                                        </div>
                                        </div>
                                      

                                          <div class="form-group">
                                            <label>Alamat</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-home"></i>
                                                </div>
                                            <input required type="text" name="i_address" class="form-control" placeholder="masukkan alamat ..." value="<?= $row->address ?>"/>
                                            </div>
                                        </div>
                                       
                                        <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <label>Jam</label>
                                            <div class="input-group">                                            
                                                <input type="text" name="i_hour" class="form-control timepicker"/>
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                    </div>
                                       
                                        </div>
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                <div class="box-footer">
                                    <input class="btn btn-warning" type="submit" value="Save"/>
                                    <a href="<?= $close_button?>" class="btn btn-danger" >Close</a>
                                </div>
                            
                            </div><!-- /.box -->
                      
                        </div><!--/.col (right) -->
                        
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
        </form>