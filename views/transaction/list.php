<style media="screen">
	.span_title{
		text-align: center;
		font-size: 25px;
		font-family: monospace;
	}
</style>
<link href="../css/transaction.css" rel="stylesheet" type="text/css"/>

	<section class="content">
		<div class="box">
		<form id="form_daftar_pijat" action="<?= $action_statement?>" method="post" enctype="multipart/form-data" role="form">
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<?php echo $keterangan; ?>
						<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Tanggal : </label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right" id="date_picker1" name="i_date" value="<?= $date ?>" required/>
									</div><!-- /.input group -->
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Member :</label>
									<select class="selectpicker form-control" id="i_member" name="i_member">
										<option value="0"></option>
										<?php while ($r_member = mysql_fetch_array($q_member)) {?>
											<option value="<?= $r_member['member_id']?>"
												<?php if ($member_id = $r_member['member_id']){echo "selected";}?>>
												<?= $r_member['member_name']?></option>
										<? } ?>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Cabang :</label>
									<select class="selectpicker form-control" id="i_branch" name="i_branch" required>
										<option value="0"></option>
										<?php while ($r_branch = mysql_fetch_array($q_branch)) {?>
											<option value="<?= $r_branch['branch_id']?>"
												<?php if ($branch_id = $r_branch['branch_id']){echo "selected";}?>>
												<?= $r_branch['branch_name']?></option>
										<? } ?>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="">Pijat :</label>
									<select class="selectpicker form-control" id="i_pijat" name="i_pijat" onchange="set_harga()"  required>
										<option value="0"></option>
										<?php while ($r_pijat = mysql_fetch_array($q_pijat)) {?>
											<option value="<?= $r_pijat['pijat_id']?>" data-harga="<?= $r_pijat['pijat_harga']?>"><?= $r_pijat['pijat_name']?></option>
										<? } ?>
									</select>
								</div>
								<div class="form-group">
									<label>Harga :</label>
									<input type="text" class="form-control" readonly name="grand_total_currency" id="grand_total_currency" value="">
									<input type="hidden" name="grand_total" id="grand_total" class="form-control" value=""/>
								</div>
								<!-- <div class="form-group">
									<label for="">Item :</label>
									<select class="selectpicker form-control" id="i_item" name="i_item">
										<option value="0"></option>
										<?php while ($r_item = mysql_fetch_array($q_item)) {?>
											<option value="<?= $r_item['item_id']?>"><?= $r_item['item_name']?></option>
										<? } ?>
									</select>
								</div> -->
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer" style="background-color: #fff;">
				<div class="row">
					<div  class="col-md-10 col-md-offset-1">
						<button id="btn_submit" class="btn btn-warning" onclick="btn_submit()" type="submit">Save</button>
						<a href="<?= $close_button?>" class="btn btn-danger" >Close</a>
					</div>
				</div>
			</div>
			</form>
		</div>	
	</section>

<script type="text/javascript">
	
	function set_harga() {
		var i_pijat = $('#i_pijat').val();
		var harga = $('#i_pijat option:selected').data('harga');
		$('#grand_total').val(harga);
		$('#grand_total_currency').val(toRp(harga));
	}


</script>
