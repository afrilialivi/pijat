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


                                        <div class="col-md-12">

                                        <div class="form-group">
                                            <label>Nama Cabang</label>
                                            <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama ..." value="<?= $row->branch_name ?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Telepon</label>
                                            <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                                <input required type="number" min="0" name="i_phone" class="form-control" placeholder="Masukkan telepon..." value="<?= $row->branch_phone ?>"/>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label>Alamat</label>
                                            <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <input required type="text" name="i_address" class="form-control" placeholder="Masukkan alamat..." value="<?= $row->branch_address ?>"/>
                                            </div>
                                        </div>



                                         <div class="form-group">
                                            <label>Kota</label>
                                            <input required type="text" name="i_city" class="form-control" placeholder="Masukkan kota..." value="<?= $row->branch_city ?>"/>
                                        </div>

                                         <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea name="i_desc" class="form-control" rows="5"><?= $row->branch_desc ?></textarea>
                                        </div>




                                        </div>

                                        <div style="clear:both;"></div>

                                </div><!-- /.box-body -->

                                  <div class="box-footer">
                                <input class="btn btn-danger" type="submit" value="Save"/>
                                <a href="<?= $close_button?>" class="btn btn-default" >Close</a>

                             </div>

                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
