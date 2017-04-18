<style media="screen">
	.span_title{
		text-align: center;
		font-size: 25px;
		font-family: monospace;
	}
	table{
		border: none;
	}
	.item-list{
    border: 1px solid;
    padding: 20px;
    border-radius: 5px;
    border-color: #909090;
		height: 500px;
	}

</style>
<link href="../css/transaction.css" rel="stylesheet" type="text/css"/>

	<section class="content">
		<div class="box">
		<form action="<?= $action_statement?>" method="post" enctype="multipart/form-data" role="form">
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
										<select class="selectpicker form-control" id="i_branch" name="i_branch">
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
										<select class="selectpicker form-control" id="i_pijat" name="i_pijat" onchange="set_harga()">
											<option value="0"></option>
											<?php while ($r_pijat = mysql_fetch_array($q_pijat)) {?>
												<option value="<?= $r_pijat['pijat_id']?>" data-harga="<?= $r_pijat['pijat_harga']?>"><?= $r_pijat['pijat_name']?></option>
											<? } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Harga :</label>
										<input type="text" readonly name="grand_total_currency" id="grand_total_currency" class="form-control" value="">
										<input type="hidden" readonly name="grand_total" id="grand_total" class="form-control" value=""/>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="panel panel-default">
												<div class="panel-body">
													<div class="col-md-6 item-list">
														<table id="table-item" class="table table-hover table-striped my-item" style="font-size: 12px;">
	                            <thead>
	                              <tr>
																	<th width="5%">No.</th>
	                                <th width="80%">NAMA ITEM</th>
	                                <th class="text-right">HARGA</th>
	                                <th class="text-center"><i class="fa fa-th"></i></th>
	                              </tr>
	                            </thead>
	                            <tbody class="fbody" id="data-items">
																<?php
																$no = 1;
																while ($r_item = mysql_fetch_array($q_item)) {?>
																<tr>
																	<td><?= $no;?></td>
																	<td><?= $r_item['item_name']?></td>
																	<td><?= format_rupiah($r_item['item_harga_jual'])?></td>
																	<td>
																		<button type="button" data-id="<?= $r_item['item_id']?>" data-name="<?= $r_item['item_name']?>"
																			data-price="<?= $r_item['item_harga_jual']?>" data-qty="1"
																			class="btn btn-danger btn-xs btn-add-cart">
																			<i class="fa fa-plus"></i>
																		</button>
																	</td>
																</tr>
																<?$no++;}?>
	                            </tbody>
		                        </table>
													</div>
													<div class="col-md-6">
														<table class="table table-hover table-striped transaksi item-list" style="font-size: 12px;">
	                            <thead>
		                            <tr>
		                                <th width="20%" class="text-center">QTY</th>
		                                <th width="40%">ITEM</th>
		                                <th class="text-right">HARGA</th>
		                                <th class="text-center hide" id="sales-column-discount">DISC</th>
		                                <th class="text-right">TOTAL</th>
		                                <th width="13%" class="text-center"><i class="fa fa-th"></i></th>
		                            </tr>
	                            </thead>
	                            <tbody id="tbody_sales_cart">

	                            </tbody>
	                        	</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							</div>
						</div>
				</div>
			</div>
			<div class="box-footer" style="background-color: #fff;">
				<div class="row">
					<div  class="col-md-10 col-md-offset-1">
						<input class="btn btn-warning" type="submit" value="Save"/>
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
	$('body').on('click', '.btn-add-cart', function (e) {
      $.fn.addCart($(this));
      e.preventDefault();
  });

	$.fn.addCart = function(btn){
		var this_name = btn.attr('data-name');
		var this_id = parseInt(btn.attr('data-id'));
    var this_price = parseInt(btn.attr('data-price'));
    var this_qty = parseInt(btn.attr('data-qty'));
		var this_total = this_qty * this_price;

		html += '<tr>';
		html += '<td class="text-center">';
		html += '<div class="input-group input-group-sm">';
		html += '<span class="input-group-btn">';
		html += '<button data-id="" class="btn btn-danger btn-sm btn-decrease-cart" type="button"><i class="fa fa-minus"></i></button>';
		html += '</span>';
		html += '<input type="text"  style="text-align:center;" class="form-control input-sm qty" value="' + item_qty + '">';
		html += '<span class="input-group-btn">';
		html += '<button data-id="" class="btn btn-success btn-sm btn-increase-cart" type="button"><i class="fa fa-plus"></i></button>';
		html += '</span>';
		html += '</div>';
		html += '</td>';
		html += '<td>' + item_name;
		if( item_has_promo ) html += promo_text;
		html += '</td>';
		html += '<td class="text-right">' + itemPrice + '</td>';
		if( has_discount ) html += '<td class="text-center">' + itemDiscTotal + '</td>';
		html += '<td class="text-right">' + itemTotal + '</td>';
		html += '<td style="text-align: right;">' +
						'<div class="btn-group">' +
						'<button type="button" title="diskon item" data-discount-item="'+item_disc_total+'"\
						data-total="'+item_total_before_discount+'" class="btn btn-primary btn-sm btn-show-discount-item">\
						<i class="fa fa-usd" aria-hidden="true"></i></button>' +
						'<button type="button" title="hapus item" class="btn btn-danger btn-sm btn-remove-cart">\
						<i class="fa fa-trash" aria-hidden="true"></i></button>' +
						'</div>' +
						'</td>';
		html += '</tr>';

		$("#tbody_sales_cart").html();
	}
</script>
