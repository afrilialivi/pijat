<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
  <div class="form-group">
    <label for="">Nama Item : </label>
    <select class="selectpicker form-control" id="" name="item_id">
      <option value="0"></option>
      <?php while ($r_item = mysql_fetch_array($q_item)) {?>
        <option value="<?= $r_item['item_id']?>"><?= $r_item['item_name']?></option>
      <?} ?>
    </select>
  </div>
</div>
<div class="modal-footer">

</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('.selectpicker').selectpicker('refresh');
  });
</script>
