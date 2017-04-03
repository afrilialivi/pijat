<!-- Content Header (Page header) -->

                 <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">

                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan gagal !</b>
               Password dan confirm password tidak sama
                </div>

                </section>
                <?php
                }
                ?>

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


                                        <div class="col-md-9">

                                        <div class="form-group">
                                            <label>Nama Paket</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama paket ..." value="<?= $row->paket_pijat_name ?>"/>
                                        </div>
                                          <div class="form-group">
                                            <label>Harga </label>
                                            <input required type="textarea" name="i_harga_currency" id="i_harga_currency" 
                                            class="form-control" placeholder="Masukkan harga ..." onkeyup="number_currency(this);" 
                                            value="<?= $row->paket_pijat_harga ?>"/>

                                            <input type="hidden" name="i_harga" id="i_harga" class="form-control" placeholder="Masukkan harga ..." value="<?= $row->paket_pijat_harga ?>"/>
                                        </div>

                                        </div>
                                        
                                        <div style="clear:both;"></div>

                                </div><!-- /.box-body -->

                                  <div class="box-footer">
                                <input class="btn btn-danger" type="submit" value="Save"/>
                                <a href="<?= $close_button?>" class="btn btn-danger" >Close</a>

                             </div>

                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->

                    <!-- <?php
                    if($id){
					?>
                     <div class="row">
                        <div class="col-xs-12">

                             <div class="title_page"> Recipe</div>

                            <div class="box">

                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Nama Bahan</th>
                                                <th>Qty</th>
                                                  <th>Satuan</th>
                                                   <th>Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row_recipe = mysql_fetch_array($query_recipe)){
                                            ?>
                                            <tr>
                                            <td><?= $no?></td>
                                               <td><?= $row_recipe['item_name']?></td>
                                                <td><?= $row_recipe['item_qty']?></td>
                                                <td><?= ($row_recipe['unit_name'])?></td>

                                              <td style="text-align:center;">

                                                    <a href="menu.php?page=form_item&id=<?= $row_recipe['menu_recipe_id']?>&menu_id=<?= $row->menu_id ?>" class="btn btn-default" ><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $row_recipe['menu_recipe_id']; ?>,'menu.php?page=delete_item&menu_id=<?= $row->menu_id ?>&id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>

                                                </td>
                                            </tr>
                                            <?php
											                        $no++;
                                            }
                                            ?>
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <td colspan="5"><a href="<?= $add_button_item ?>" class="btn btn-danger " >Add Item</a></td>

                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                    <?php
					}
					?> -->
                </section><!-- /.content -->
  <script type="text/javascript">

    function menu_kategori(){
  			var x = document.getElementById("kategori_utama").value;
  			//alert(x);
  			$.ajax
          ({
  						type: 'POST',
  						url: 'menu.php?page=menu_type',
              data: {x:x},
  						dataType: 'json',
          }).done(function(data) {
  					$('#menu_type_v').html("");
  					// alert(data.data[0]['menu_type_name']);
  						for(var inn = 0; inn<data.data.length; inn++){
                $("#menu_type_v").append("<option value='"+data.data[inn]['menu_type_id']+"'>"+data.data[inn]['menu_type_name']+"</option>");
  						}
  						$('#menu_type_v').selectpicker("refresh");
  				});
  		}

    function number_currency(elem){
        var elem_id = '#'+elem.id;
        var elem_val    = $(elem_id).val();
        var elem_no_cur = elem_id.replace(/_currency/g,'');

        var str = elem_val.toString(), parts = false, output = [], i = 1, formatted = null;

        parts = str.split(".");
        var gabung = '';
        for (var i = 0; i < parts.length; i++) {
          var gabung = gabung+parts[i];
        }

        str = gabung.split("").reverse();
        var i = 1;
        for(var j = 0, len = gabung.length; j < len; j++) {
          if(str[j] != ".") {
            output.push(str[j]);
            if(i%3 == 0 && j < (len - 1)) {
              output.push(".");
            }
            i++;
          }
        }

        formatted = output.reverse().join("");
        $(elem_id).val(formatted);
        $(elem_no_cur).val(gabung);
      }

  </script>
