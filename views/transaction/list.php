<style media="screen">
	#table_item
	{
		height: 400px;
    overflow:scroll;
    scrollbar-face-color:red;
	}
</style>


<link href="../css/transaction.css" rel="stylesheet" type="text/css"/>
<section class="content">
	<div class="col-md-12">
		<div class="box">
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Tanggal : </label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" required class="form-control pull-right normal" id="date_picker1" name="i_date" value="<?= $date ?>"/>
								</div><!-- /.input group -->
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Member :</label>
								<select class="selectpicker form-control normal" id="i_member" name="i_member">
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
								<select class="selectpicker form-control normal" id="i_branch" name="i_branch" required>
									<option value="0"></option>
									<?php while ($r_branch = mysql_fetch_array($q_branch)) {?>
										<option value="<?= $r_branch['branch_id']?>"
											<?php if ($branch_id = $r_branch['branch_id']){echo "selected";}?>>
											<?= $r_branch['branch_name']?></option>
									<? } ?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="">Pijat :</label>
									<select class="selectpicker form-control normal" id="i_pijat" name="i_pijat" onchange="set_harga()"  required>
										<option value="0"></option>
										<?php while ($r_pijat = mysql_fetch_array($q_pijat)) {?>
											<option value="<?= $r_pijat['pijat_id']?>" data-harga="<?= $r_pijat['pijat_harga']?>"><?= $r_pijat['pijat_name']?></option>
										<? } ?>
									</select>
								</div>
								<div class="form-group">
									<label>Harga :</label>
									<input type="text" class="form-control normal" readonly name="grand_total_currency" id="grand_total_currency" value="">
									<input type="hidden" name="grand_total" id="grand_total" class="form-control normal" value=""/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-body">
										<div class="col-md-6">
											<div class="row">
												<div class="input-group">
							                          <input type="text" id="search" class="form-control input-sm normal" placeholder="Cari produk">
							                          <span class="input-group-btn">
							                            <button class="btn btn-default btn-sm" type="button">
							                              <i class="fa fa-search"></i>
							                            </button>
							                          </span>
							                     </div><!-- /input-group -->
											</div>
											<br>
											<div class="row">
												<table id="table_item" class="table table-hover table-striped my-item" style="font-size: 12px;height:400px;">
							                      <thead>
							                        <tr>
																				<th width="5%">No.</th>
							                          <th width="50%">NAMA ITEM</th>
							                          <th class="text-right">HARGA</th>
							                          <th class="text-center"><i class="fa fa-th"></i></th>
							                        </tr>
							                      </thead>
							                      <tbody class="fbody" id="data_items">

							                      </tbody>
							                    </table>
											</div>
										</div>
										<div class="col-md-6" style="top:50px;">
														<table class="table table-hover table-striped transaksi item-list" style="font-size:12px;">
										                      <thead>
										                        <tr>
										                            <th class="text-center" style="width:10%;">QTY</th>
										                            <th width="40%">ITEM</th>
										                            <th style="">HARGA</th>
										                            <th class="text-center hide" id="sales-column-discount">DISC</th>
										                            <th class="text-right">TOTAL</th>
										                            <th width="13%" class="text-center"><i class="fa fa-th"></i></th>
										                        </tr>
										                      </thead>
										                      <tbody id="tbody_sales_cart">
																						<tr>
																							<td></td>
																							<td></td>
																							<td></td>
																							<td></td>
																							<td></td>
																						</tr>
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



$(document).ready(function(){

	var items = [];
	var html = '';
	var add_item_list = [];
	// var search_data = [];

	$.fn.getItems = function(){
		$.get("transaction.php?page=get_items",function(data){
						var no = 1;
						$.each(JSON.parse(data), function (index, value) {
								items.push(value);
								html += '<tr>\
													<td style="text-align:center;">'+no+'</td>\
													<td id="item-name">'+value.item_name+'\
													<td class="text-right">'+Intl.NumberFormat().format(value.item_harga_jual)+'</td><td class="text-center">\
														<button data-disc="" data-price="'+value.item_harga_jual+'" \
														data-qty="1" data-name="'+value.item_name+'" \
														data-id="'+value.item_id+'" data-has-promo=""\
														data-status-aktif="'+value.status_id+'"\
														data-promo-item-name="" data-promo-gratis="" data-promo-qty="" \
														class="btn btn-success btn-xs btn-add-cart">\
															<i class="fa fa-plus"></i>\
														</button>\
													</td>\
												</tr>';
									no++;
								});

						$("#data_items").append(html);
						$('#table_item').animate({scrollTop: $('#textdiv').prop("scrollHeight")}, 500);
						// alert(data);
				}).fail(function(data){
							alert(data);
					});
					$('#table_item').animate({scrollTop: $('#textdiv').prop("scrollHeight")}, 500);
	}

	$('.btn-add-cart').on('click', function (e) {
      $.fn.addCart($(this));
      e.preventDefault();
  });

	$.fn.addCart = function(btn){

		var this_name 			= btn.attr('data-name');
    var this_id 				= parseInt(btn.attr('data-id'));
		var this_harga_jual = btn.attr('data-price');
		var this_status 		= btn.attr('data-status-aktif');

		var this_qty = 1;
		var item_exist = 0;
		var item_exist_index = -1;

			if (add_item_list) {
				$.each(add_item_list, function (index, value) {
								if (value.item_id == this_id) {
										item_exist = 1;
										item_exist_index = index;
										this_qty = this_qty + value.item_qty;
								}
						});
			}

			if (item_exist) add_item_list.splice(item_exist_index, 1);

			var new_item_detail = {
							'item_name'		: this_name,
							'item_id'			: this_id,
							'item_price'	: this_harga_jual,
							'item_qty'		: this_qty,
							'item_status'	: this_status
					};


			add_item_list.push(new_item_detail);
			localStorage.setItem('item_detail', JSON.stringify(add_item_list));
			$.fn.refreshChart();

			// console.log(add_item_list);
	}

	$.fn.refreshChart = function () {
					// $.fn.refreshSales();
					storage_item_detail = JSON.parse(localStorage.getItem('item_detail'));
					console.log(storage_item_detail);

					var html = '';
					var html_struk = '';
					var input_sales_detail = '';
					var intSubTotal = 0;
					var total_item = 0;
					var total_item_qty = 0;
					//
					// $.each(storage_sales_detail, function (index, value) {
					// // 		var item_disc = value.item_disc;
					// // 		if( item_disc ) has_discount = 1;
					// // });
					//
					$("#tbody_sales_cart").empty();
					$.each(storage_item_detail, function (index, value) {

							var item_name = value.item_name;
							var item_id = value.item_id;
							var item_price = value.item_price;
							var item_qty = value.item_qty;
							var item_status = value.item_status;
							var item_total = item_qty * item_price;

							intSubTotal += item_total;
							var itemPrice = Intl.NumberFormat().format(item_price);
							var itemTotal = Intl.NumberFormat().format(item_total);
							// var itemDiscTotal = Intl.NumberFormat().format(item_disc_total);

							html += '<tr>';
							html += '<td class="text-center">';
							html += '<div class="input-group input-group-sm">';
							html += '<span class="input-group-btn">';
							html += '<button data-id="" class="btn btn-danger btn-sm btn-decrease-cart" type="button"><i class="fa fa-minus"></i></button>';
							html += '</span>';
							html += '<input type="text"  style="text-align:center;width:80px;" class="form-control input-sm qty" value="' + item_qty + '">';
							html += '<span class="input-group-btn">';
							html += '<button data-id="" class="btn btn-success btn-sm btn-increase-cart" type="button"><i class="fa fa-plus"></i></button>';
							html += '</span>';
							html += '</div>';
							html += '</td>';
							html += '<td>' + item_name;
							html += '</td>';
							html += '<td class="text-right">'+itemPrice+'</td>';
							html += '<td class="text-right">'+itemTotal+'</td>';
							html += '<td style="text-align: right;">' +
											'<div class="btn-group">' +
											'</div>' +
											'</td>';
							html += '</tr>';
							$("#tbody_sales_cart").html(html);
							// console.log(item_name);
			});


		};

		$('#search').keyup(function(){
			var word = $(this).val();
			var this_data = '';
			word = word.toLowerCase();

			var search_data = [];

			  $.each(items, function (index, value) {
					var name = value.item_name.toLowerCase();

					if( name.indexOf(word) > -1){
						this_data = {
                        'item_id'		: value.item_id,
                        'item_name' : value.item_name,
												'item_harga_jual' : value.item_harga_jual
												// 'item_status'			: value.item_status
                    }

						search_data.push(this_data);
						// console.log(search_data);
					}
				});
				var no =1;
				var html = '';
				// $("#data_items").empty();
				$("#data_items").html(html);
				$.each(search_data, function (index, value) {
				// 	// var item_name  = value.item_name;
						html += '<tr>\
											<td style="text-align:center;">'+no+'</td>\
											<td id="item-name">'+value.item_name+'\
											<td class="text-right">'+Intl.NumberFormat().format(value.item_harga_jual)+'</td><td class="text-center">\
												<button data-disc="" data-price="'+value.item_harga_jual+'" \
												data-qty="1" data-name="'+value.item_name+'" \
												data-id="'+value.item_id+'" data-has-promo=""\
												data-status-aktif="'+value.status_id+'"\
												data-promo-item-name="" data-promo-gratis="" data-promo-qty="" \
												class="btn btn-success btn-xs btn-add-cart">\
													<i class="fa fa-plus"></i>\
												</button>\
											</td>\
										</tr>';
							no++;
				// 			// console.log(value.item_harga_jual);
						});
						$("#data_items").html(html);

		});

	$("body").on("click", ".btn-decrease-cart", function (event) {
			var qty = $(this).parent().parent().find("input:text");
			var value = qty.val();
			var value = parseInt(value);
      if (value > 1) {
          var item_row = $(this).parent().parent().parent().parent();
          var item_index = item_row.index();
          var this_name = '';
          var this_id = 0;
          var this_price = 0;
          var this_qty = 0;
          var this_total = 0;
          var item_exist = 0;
          var item_exist_index = -1;
          if (add_item_list) {
              $.each(add_item_list, function (index, value) {
                  if (item_index == index) {
                      var qty = value.item_qty - 1;
                      this_name = value.item_name;
                      this_id = value.item_id;
                      this_price = value.item_price;
											this_qty = qty;
                      this_total = value.item_total * this_qty;
                      item_exist = 1;
                      item_exist_index = index;
                  }
              });
          }
  		}
			var new_data = {
                    'item_name': this_name,
                    'item_id': this_id,
                    'item_price': this_price,
                    'item_qty': this_qty,
                };
			add_item_list[item_exist_index] = new_data;
			localStorage.setItem('item_detail', JSON.stringify(add_item_list));
			// console.log(add_item_list);
			$.fn.refreshChart();
      event.preventDefault();
	});

	$("body").on("click", ".btn-increase-cart", function (event) {
		var qty = $(this).parent().parent().find("input:text");
		var value = qty.val();
		var value = parseInt(value);

				var item_row = $(this).parent().parent().parent().parent();
				var item_index = item_row.index();
				var this_name = '';
				var this_id = 0;
				var this_price = 0;
				var this_qty = 0;
				var this_total = 0;
				var item_exist = 0;
				var item_exist_index = -1;
				if (add_item_list) {
						$.each(add_item_list, function (index, value) {
								if (item_index == index) {
										var qty = value.item_qty + 1;
										this_name = value.item_name;
										this_id = value.item_id;
										this_price = value.item_price;
										this_qty = qty;
										this_total = value.item_total * this_qty;
										item_exist = 1;
										item_exist_index = index;
								}
						});
				}

		var new_data = {
									'item_name': this_name,
									'item_id': this_id,
									'item_price': this_price,
									'item_qty': this_qty,
							};
		add_item_list[item_exist_index] = new_data;
		localStorage.setItem('item_detail', JSON.stringify(add_item_list));
		// console.log(add_item_list);
		$.fn.refreshChart();
		event.preventDefault();
	});


	$.fn.getItems();

});



</script>
