                      <div class="row">
                        <div class="col-xs-12">

                          <div class="title_page"> Recipe</div>

                            <div class="box">

                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                              <th width="5%">No</th>
                                              <th style="text-align: center;">Nama Bahan</th>
                                              <th style="text-align: center;">Qty</th>
                                              <th style="text-align: center;">Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row_recipe = mysql_fetch_array($query_detail)){
                                            ?>
                                            <tr>
                                              <td><?= $no?></td>
                                              <td><?= $row_recipe['item_name']?></td>
                                              <td><?= format_rupiah($row_recipe['item_qty'])?></td>
                                              <td style="text-align:center;">
                                                  <a href="javascript:void(0)" class="btn btn-default" 
                                                  onclick="menu_recipe(<?= $row_recipe['paket_pijat_detail_id']?>)">
                                                    <i class="fa fa-pencil"></i>
                                                  </a>
                                                  <a href="javascript:void(0)" onclick="confirm_delete(<?= $row_recipe['menu_recipe_id']; ?>,
                                                  'menu.php?page=delete_recipes&menu_id=<?= $row_recipe['paket_pijat_detail_id'] ?>&id=')" class="btn btn-default" >
                                                    <i class="fa fa-trash-o"></i>
                                                  </a>
                                              </td>
                                            </tr>
                                            <?php
                                              $no++;
                                            }
                                            ?>
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <td colspan="4">
                                                  <a href="javascript:void(0)" class="btn btn-danger" 
                                                  onclick="menu_recipe(<?= $row_recipe['paket_pijat_detail_id']?>)">Add Item
                                                  </a>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                    <script type="text/javascript">
                      function menu_recipe(id){
                        var paket_pijat = <?php echo $paket_pijat_id;?>;
                        alert(paket_pijat);
                      //   $('#medium_modal').modal();
                      // var url = 'paket_pijat.php?page=tambah_paket_recipe&&detail_id='+detail_id+'&paket_pijat'+paket_pijat;
                      //   $('#medium_modal_content').load(url,function(result){
                      //     });
                      }
                    </script>