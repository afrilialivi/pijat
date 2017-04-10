<style media="screen">
  .modal-backdrop {
    z-index: 2;
  }
</style>
  <div class="col-md-12">
    <div class="box">
      <div class="box-body table-responsive">
        <div class="col-md-12">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="5%"  style="text-align:center;">No</th>
                    <th  style="text-align:center;">Nama Item</th>
                    <th style="text-align:center;">Qty</th>
                    <th style="text-align:center;">Config</th>
                </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              while ($r_pijat_details = mysql_fetch_array($q_pijat_details)) {?>
                <tr>
                  <td style="text-align:center;"><?=$no;?></td>
                  <td><?= $r_pijat_details['item_name']?></td>
                  <td style="text-align:right;"><?= $r_pijat_details['item_qty']?></td>
                  <td style="text-align:center;">
                    <button type="button" name="button" class="btn btn-default" onclick="edit_item(<?= $r_pijat_details['pijat_detail_id']?>)">
                      <i class="fa fa-pencil"></i>
                    </button>
                    <button type="button" name="button" class="btn btn-default">
                      <i class="fa fa-trash-o"></i>
                    </button>
                  </td>
                </tr>
              <? $no++;} ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="4">
                  <button type="button" name="button" class="btn btn-danger" onclick="add_item(<?= $id?>)">
                    Tambah
                  </button>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
  function add_item(id){
    $('#medium_modal').modal();
   var url = 'pijat.php?page=add_new_item&id='+id;
     $('#medium_modal_content').load(url,function(result){});
  }

  function edit_item(id){
    var pijat_id = <?= $id?>;
    $('#medium_modal').modal();
   var url = 'pijat.php?page=add_new_item&id='+pijat_id+'&pijat_detail_id='+id;
     $('#medium_modal_content').load(url,function(result){});
  }

</script>
