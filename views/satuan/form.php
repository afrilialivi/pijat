<style type="text/css">
    label{
        color: #6B346A;
    }
</style>
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
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="form-group">
                                                    <label>Nama </label>
                                                    <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama satuan..." value="<?= $row->satuan_name ?>"/>
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