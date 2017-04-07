<style media="screen">
  .modal-backdrop {
    z-index: 2;
  }
</style>
<section class="content">
  <div class="col-md-12">
    <div class="box">
      <div class="box-body table-responsive">
        <div class="col-md-12">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Item</th>
                    <th>Qty</th>
                    <th>Config</th>
                </tr>
            </thead>
            <tbody>
              <?php while ($r_pijat_details = mysql_fetch_array($q_pijat_details)) {?>
                <tr>
                  <td></td>
                  <td><?= $r_pijat_details['item_name']?></td>
                  <td style="text-align:right;"><?= $r_pijat_details['item_qty']?></td>
                  <td></td>
                </tr>
              <? } ?>
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
</section>
<script type="text/javascript">
  function add_item(id){
    $('#medium_modal').modal();
   var url = 'pijat.php?page=add_new_item&id='+id;
     $('#medium_modal_content').load(url,function(result){});
  }
</script>
