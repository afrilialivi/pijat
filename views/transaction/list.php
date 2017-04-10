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
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">

					<?php echo $keterangan; ?>
					
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Tanggal : </label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" required class="form-control pull-right" id="date_picker1" name="i_date" value="<?= $date ?>"/>
								</div><!-- /.input group -->
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Member :</label>
								<select class="selectpicker form-control" id="i_member" name="i_member">
									<option value="0"></option>
									<?php while ($r_member = mysql_fetch_array($q_member)) {?>
										<option value="<?= $r_member['member_id']?>"><?= $r_member['member_name']?></option>
									<? } ?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Cabang :</label>
								<select class="selectpicker form-control" id="i_member" name="i_member">
									<option value="0"></option>
									<?php while ($r_branch = mysql_fetch_array($q_branch)) {?>
										<option value="<?= $r_branch['branch_id']?>"
											<?php if ($branch_id = $r_branch['branch_id']){echo "selected";}?>>
											<?= $r_branch['branch_name']?></option>
									<? } ?>
								</select>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
