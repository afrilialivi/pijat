<!-- select2 -->
<script type="text/javascript" src="../select2/dist/js/select2.js"></script>
<!-- end select2 -->
<script type="text/javascript" src="../js/search2/jcfilter.min.js"></script>
<script>
//$("#entersomething").keyup(function(e){
//    var code = e.which; // recommended to use e.which, it's normalized across browsers
//    alert(code);
//    if(code==13)e.preventDefault();
//    if(code==32||code==13||code==188||code==186){
//        $("#displaysomething").html($(this).val());
//    } // missing closing if brace
//});
</script>
<script type="text/javascript">
	function filter_cat(){
		alert("test");
	}
	function CurrencyFormat(number)
	{
	   var decimalplaces = 0;
	   var decimalcharacter = "";
	   var thousandseparater = ",";
	   number = parseFloat(number);
	   var sign = number < 0 ? "-" : "";
	   var formatted = new String(number.toFixed(decimalplaces));
	   if( decimalcharacter.length && decimalcharacter != "." ) { formatted = formatted.replace(/\./,decimalcharacter); }
	   var integer = "";
	   var fraction = "";
	   var strnumber = new String(formatted);
	   var dotpos = decimalcharacter.length ? strnumber.indexOf(decimalcharacter) : -1;
	   if( dotpos > -1 )
	   {
	      if( dotpos ) { integer = strnumber.substr(0,dotpos); }
	      fraction = strnumber.substr(dotpos+1);
	   }
	   else { integer = strnumber; }
	   if( integer ) { integer = String(Math.abs(integer)); }
	   while( fraction.length < decimalplaces ) { fraction += "0"; }
	   temparray = new Array();
	   while( integer.length > 3 )
	   {
	      temparray.unshift(integer.substr(-3));
	      integer = integer.substr(0,integer.length-3);
	   }
	   temparray.unshift(integer);
	   integer = temparray.join(thousandseparater);
	   return sign + integer + decimalcharacter + fraction;
	}
	function get_total_price(){
		var total_harga = 0;
		<?php
		while($row2 = mysql_fetch_array($query2)){
		?>
		var jumlah = document.getElementById("i_jumlah_"+<?= $row2['menu_id']?>).value;
		var harga = document.getElementById("i_harga_"+<?= $row2['menu_id']?>).value;

		var total = jumlah * harga;
		total_harga = total_harga + total;
		<?php
		}
		?>
		document.getElementById("i_total_harga").value = total_harga;
		document.getElementById("i_total_harga_rupiah").value = CurrencyFormat(total_harga);
	}

	function confirm_delete_history(id){
		var a = confirm("Anda yakin ingin menghapus order ini ?");
		var table_id = document.getElementById("i_table_id").value;

		if(a==true){
			window.location.href = 'transaction_new.php?page=delete_history&table_id=' + table_id + '&id=' + id;
		}
	}

	function load_data_history(id)
	{
	}
	</script>
	<?php
	if(isset($_GET['did']) && $_GET['did'] == 1){
		?>
		<section class="content_new">
			<div class="alert alert-info alert-dismissable">
				<i class="fa fa-check"></i>
				<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
				<b>Sukses !</b>
				Simpan Berhasil
			</div>
		</section>
		<?php
	}else if(isset($_GET['err']) && $_GET['err'] == 1){
		?>
		<section class="content_new">
			<div class="alert alert-warning alert-dismissable">
				<i class="fa fa-check"></i>
				<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
				<b>Simpan Gagal !</b>
				Menu masih kosong, Pilih menu terlebih dahulu !
			</div>
		</section>
		<?php
	}
	?>
	<form action="<?= $action ?>" method="POST" enctype="multipart/form-data" role="form">
		<!-- Main content -->
		<section class="content" style="padding-top: 0">
			<?php
			$get_all_jumlah = get_all_jumlah($table_id);
			?>
			<div class="row">
				<div <?php if($get_all_jumlah == 0){ ?>class="col-md-12" <?php }else{ ?>class="col-md-8"<?php } ?> id="table_menu">
                                    </br>
                                    <div class="box box-cokelat">
						<div class="box-body">
							<div class="container">
								<!-- Top Navigation -->

									<div class="row">
										<div class="">
											<div class="col-md-4">
												<div class="form-group">
													<input type="hidden" id="i_table_id" value="<?= $table_id ?>"/>
													<label>Date </label>
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
													<label>Order Type </label>
													<select name="i_tot_id[]" id="i_tot_id" class="selectpicker show-tick form-control" data-live-search="true" onchange="order_member()">
														<?php
														$qotype = mysql_query("select tot_id from transactions_tmp where table_id = '".$_GET['table_id']."'");
														$typ = mysql_fetch_array($qotype);
														$type = "";
														if(count($typ)>0){
															$type= $typ['tot_id'];
														}
														if ($_SESSION['type_id']) {
															$type = $_SESSION['type_id'];
														}
														$query_tot = mysql_query("select * from transaction_order_types");
														while($row_tot = mysql_fetch_array($query_tot)){
															?>
															<option value="<?= $row_tot['tot_id']?>" <?php if($type == $row_tot['tot_id']){echo "Selected";} ?>>
																<?= $row_tot['tot_name']; ?></option>
																<?php
															}
															?>
														</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label>Jumlah Orang</label>
														<input type="number" id="jml_orang" name="jml_orang" class="form-control" value="<?= $jml_orang ?>">
													</div>
												</div>
										</div>
										<input type="hidden" name="i_table_id" id="i_table_id" value="<?= $table_id?>"/>
											<div class="col-md-5">
												<div id="i_member" class="form-group" style="display:none;">
													<br>
													<label>Nama :</label>
													<select name="i_member_id" id="i_member_id" class="selectpicker show-tick form-control" data-live-search="true" onchange="ket_member()">
														<option value="0"></option>
														<?php
														$qotype = mysql_query("select member_id from transactions_tmp where table_id = '".$_GET['table_id']."'");
														$typ = mysql_fetch_array($qotype);
														$type = "";

														if(count($typ)>0){
															$type= $typ['member_id'];}

														if ($_SESSION['member_id']) {
															$type = $_SESSION['member_id'];}

														$query=mysql_query("select * from members");
														while($row_member=mysql_fetch_array($query)){
															?><option value="<?= $row_member['member_id']?>"<?php if($type == $row_member['member_id']){echo "Selected";} ?>><?= $row_member['member_name']; ?></option>
														<?php } ?>
														</select>
												</div>
												<div id="ket_member"  class="form-group">
												</div>
										</div>
											<div class="col-md-4  hide-on-mobile">
												<!-- <div class="form-group">
													<label>Table </label>
													<select name="i_table_id" id="i_table_id"  class="selectpicker show-tick form-control" data-live-search="true"  >
														<?php
														$query_table = mysql_query("select a.*, b.building_name
														from tables a
														left join buildings b on b.building_id = a.building_id
														where tms_id <> '2'
														order by building_id, table_name
														");
														while($row_table = mysql_fetch_array($query_table)){
															?>
															<option value="<?= $row_table['table_id']?>" <?php if($row_table['table_id'] == $table_id){ ?> selected="selected"<?php }?>><?php
															if($row_table['table_id'] != 0){
																$building = " (".$row_table['building_name'].")";
															}else{
																$building= "";
															}
															echo $row_table['table_name'].$building; ?></option>
															<?php
														}
														?>
													</select>
												</div> -->
											</div>
											</div>
											<div id="table_history">
											</div>
											<div class="row">
												<br>

												<div class="col-md-3 a-show show-on-mobile" style="padding-left:0px;">
													<div class="form-group">
														<div class="btn btn-block btn_cat_button" id="widget" onclick="widget()"> Daftar Pesanan</div>
													</div>
													<div id="widget_frame" style="display:none;">
														<!-- <b>Voucher</b> -->
														<div class="box" style="margin-bottom:0px; padding-bottom:0px;">
																	 <table id="" class="" style="margin-bottom:0px;">
																			 <thead style="height:30px; line-height:30px;">
																					 <tr>
																					 <th width="5%" style="padding:10px">Jml</th>
																							 <th  style="padding:10px">Nama Menu</th>
																					 </tr>
																			 </thead>
																	 </table>
													 </div>
													 <div class="box">
														 	<div>
																<table id="" class="table">
																	<tbody>
																				<?php
																			 $no = 1;
																			 $query_widget = mysql_query("select a.*, b.menu_name from widget_tmp a
																																join menus b on b.menu_id = a.menu_id
																																where table_id = '$table_id'
																																order by a.wt_id
																																");
																				while($row_widget = mysql_fetch_array($query_widget)){
																				?>
																				<tr>
																					 <td width="5%"><?= $row_widget['jumlah']?></td>
																						<td><?= $row_widget['menu_name']?></td>
																							<td style="text-align:center;">
																								<a href="transaction_new.php?page=note&table_id=<?= $table_id?>&wt_id=<?= $row_widget['wt_id']?>" class="btn btn-default" ><i class="fa fa-edit"></i></a>
																								<a href="javascript:void(0)" onclick="confirm_delete(<?= $row_widget['wt_id']; ?>, 'transaction_new.php?page=delete_widget&table_id=<?= $table_id ?>&id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>
																						</td>
																				</tr>
																				<?php
																				$query_widget_detail = mysql_query("select a.*, b.note_name
																																from widget_tmp_details a
																																join notes b on b.note_id = a.note_id
																																where wt_id = '".$row_widget['wt_id']."'
																																order by wt_id
																																");
																				while($row_widget_detail = mysql_fetch_array($query_widget_detail)){
																				?>
																				<tr>
																					 <td width="10%"></td>
																						<td>- <?= $row_widget_detail['note_name']?></td>
																							<td style="text-align:center;">
																						</td>
																				</tr>
																				<?php } $no++; } ?>
																				</tbody>
																	</table>
															</div>
													 </div>
													 </div>
												</div>
												<div class="col-md-3" style="padding-left:0px;">
													<div class="form-group">
                                                                                                                <!--<div class="btn btn-block btn_cat_button" id="menu" onclick="menu()"> All Categories</div>-->
														<div class="btn btn-block btn_cat_button" id="menu" onclick="menu()"> All Categories</div>
													</div>
												</div>
												<!-- kategori utama select -->
												<?php
												$query=mysql_query("select * from kategori_utama");
												while($m_kategori = mysql_fetch_array($query)){?>
													<div class="col-md-3" style="padding-left:0px;">
														<div class="form-group">
															<div class="btn btn-block btn_cat_button" id="sub_menu" onclick="sub_menu('<?= $m_kategori['id_kategori_utama']?>')"><?= $m_kategori['kategori_utama_name']?></div>
																</div>
															</div>
															<?php  }?>
														</div>
														<!-- sub menu select -->
														<div id="sub_menu_v"><!-- menu.css -->

														</div>
														<!-- end sub menu select2 -->
														<div style="clear:both"></div>
														<div id="all_menu" class="all_menu">
														</div>
														<div style="clear:both"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-4" id="table_widget" <?php if($get_all_jumlah == 0){ ?>style="display:none"<?php } ?>>
										<?php
										include 'widget.php';
										?>
										<!--</div>-->
									</div>
								</section>
							</div><!-- /row -->
							<div style="height:100px; width:100%;"></div>
						</section>
	<section class="content_checkout">
		<div class="row">
			<div class="col-md-12">
				<div class="col-xs-4">
					<div class="form-group">
						<input required type="hidden" readonly="readonly" name="i_total_harga" id="i_total_harga" class="form-control total_checkout" value="<?= $get_all_jumlah ?>"/>
						<input required type="text" readonly="readonly" name="i_total_harga_rupiah" id="i_total_harga_rupiah" class="form-control total_checkout" value="<?= $get_all_jumlah ?>"/>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
                                                <input type="text" name="searchText" id="filter" class="form-control cari_checkout" value="" placeholder="Cari menu..."/>
					</div>
				</div>
<!--                                <div class="col-xs-2">
					<div class="form-group">
                                            <input type="number" name="qty" id="qty" class="form-control jum_checkout" value="" placeholder="Jumlah.." min="0"/>
					</div>
				</div>-->
<!--                                <div class="col-xs-3">
					<div class="form-group">

                                            <select class="selectpicker form-control opsi_checkout" name="note" id="opsi">


                                              <? while($r_type = mysql_fetch_array($query_note)){ ?>
                                                    <option value="<?= $r_type['note_id'] ?>"><?= $r_type['note_name']?></option>
                                              <? }
                                              ?>
                                            </select>
					</div>
				</div>-->
                                <div class="col-xs-2">
					<div class="form-group">
						<input class="btn btn-danger button_checkout hide-on-mobile" type="submit" value="SAVE"/>
						<input class="btn btn-danger show-on-mobile" value="SAVE" type="submit"/>
					</div>
				</div>
			</div>
	</div>
	</section>
	</form>
 <!-- start popmodal -->
	<div id="dialog_content" class="dialog_content" style="display:none">
	<form action="transaction_new.php?page=create_note&table_id=<?= $table_id ?>" enctype="multipart/form-data" method="post">
		<!-- <form enctype="multipart/form-data"> -->
		<div class="dialogModal_header"></div>
                <div class="dialogModal_content"></div>
		<div class="dialogModal_footer">
			<input type="submit" class="btn btn-primary" data-dialogmodal-but="next" value="Save"  style="padding:10px;margin-left:30px;"></input>
			<button type="button" class="btn btn-default"data-dialogmodal-but="cancel"  style="padding:10px;margin-left:30px;">Cancel</button>
		</div>
	</form>
	</div>

<!-- end popmodal -->

<script type="text/javascript">
       jQuery(document).ready(function(){
          jQuery("#filter").jcOnPageFilter({
                    animateHideNShow: true,
                    focusOnLoad:true,
                    highlightColor:'#E9F0F5',
                    textColorForHighlights:'#E9F0F5',
                    caseSensitive:false,
                    hideNegatives:true,
                    parentLookupClass:'jcorgFilterTextParent',
                    childBlockClass:'jcorgFilterTextChild'});
       });
</script>
	<script type="text/javascript">
		function add_menu(id)
		{
	  	var jumlah = document.getElementById("i_jumlah_"+id).value;
	  	jumlah++;
	  	document.getElementById("i_jumlah_"+id).value = jumlah;
	  	get_total_price();
	  	$('#table_menu').addClass('col-md-8');
	  	document.getElementById("table_widget").style.display = 'inline';
	  	$("#table_widget").load('transaction_new.php?page=form_widget&menu_id='+id+'&jumlah='+jumlah+'&table_id='+<?= $table_id ?>);
		}
	function minus_menu(id)
		{
			var jumlah = document.getElementById("i_jumlah_"+id).value;
			jumlah--;
			if(jumlah > 0){
				jumlah = jumlah;
			}else{
				jumlah = 0;
			}
			$("#table_widget").load('transaction_new.php?page=form_widget&menu_id='+id+'&jumlah='+jumlah+'&table_id='+<?= $table_id ?>);
			document.getElementById("i_jumlah_"+id).value = jumlah;
			get_total_price();
		}
	function edit_menu(id)
		{
			var jumlah = document.getElementById("i_jumlah_"+id).value;
			document.getElementById("i_jumlah_"+id).value = jumlah;
			get_total_price();
			$('#table_menu').addClass('col-md-8');
			document.getElementById("table_widget").style.display = 'inline';
			$("#table_widget").load('transaction_new.php?page=form_widget&menu_id='+id+'&jumlah='+jumlah+'&table_id='+<?= $table_id ?>);
		}
	</script>
   <script type="text/javascript">
	 		function dialogModal(x){
				var a = document.getElementById('i_tot_id').value;
				var b = document.getElementById('i_member_id').value;
				var c = document.getElementById('jml_orang').value;
				var send = function(table_id){
					document.location.href = 'transaction_new.php?page=create_note&table_id='+table_id;
				}
				$('.dialog_content').dialogModal({
					topOffset: 0,
					onOkBut: function() {},
					onCancelBut: function() {},
					onLoad: function() {
						$(".dialogModal_content").load('transaction_new.php?page=popmodal&menu_id='+x+'&type='+a+'&member_id='+b+'&jml_orang='+c);
					},
					onClose: function() {},
				});
			}
	 </script>
	<script type="text/javascript">
		$(".js-example-basic-multiple").select2();
	</script>
	<script type="text/javascript">
		function menu(){
			$.ajax
			({
				url: 'transaction_new.php?page=menu',
				dataType:'json',
			}).done(function(data){
				$('#all_menu').html("");
				for(var inn = 0; inn<data.data.length; inn++){
					$('#all_menu').append(
						'<div class="box-showcase jcorgFilterTextParent">\
								<a id="dialogModal_ex" onclick="dialogModal('+data.data[inn].menu_id+')">\
									<input type="hidden" value="1"/>\
									<div class="title_menu">'+data.data[inn].menu_name+'</div>\
									<div class="box-showcaseInner_frame">\
										<div class="box-showcaseInner">\
										<img class="img-responsive" src="../img/menu/'+data.data[inn].menu_img+'">\
										</div>\
									</div>\
								</a>\
								<div class="box-showcaseDesc ">\
									<div class="box-showcaseDesc_price">'+data.data[inn].menu_price+'</div>\
								</div>\
								<div class="jcorgFilterTextChild">'+data.data[inn].menu_name+'</div>\
						</div>');
				}
			});
				$('#sub_menu_v').empty();
		}
		menu();
	</script>

	<script type="text/javascript">
		function sub_menu(x){
				if(x<=7){
			$.ajax({
				type:'POST',
				url:'transaction_new.php?page=sub_menu_2',
				data: {x:x},
				dataType:'json',
			}).done(function(data){
				$('#sub_menu_v').html("");
				for(var inn = 0; inn<data.data.length; inn++){
						$('#sub_menu_v').append(
							'<div class="col-md-3" style="padding-left:0px;">\
								<div class="form-group">\
								<div class="btn btn-block btn_cat_button" onclick="menu_sub('+data.data[inn].menu_type_id+')">'+data.data[inn].menu_type_name+'</div>\
								</div>\
							</div>');
						}
				});
				//$('#all_menu').html("");
			}else {
				$.ajax
				({
					type:'POST',
					data: {x:x},
					url: 'transaction_new.php?page=menu_gofood',
					dataType:'json',
				}).done(function(data){
					$('#all_menu').html("");
					for(var inn = 0; inn<data.data.length; inn++){
						$('#all_menu').append(
							'<div class="box-showcase jcorgFilterTextParent">\
									<a id="dialogModal_ex" onclick="dialogModal('+data.data[inn].menu_id+')">\
										<input type="hidden" value="1"/>\
										<div class="title_menu">'+data.data[inn].menu_name+'</div>\
										<div class="box-showcaseInner_frame">\
											<div class="box-showcaseInner">\
											<img class="img-responsive" src="../img/menu/'+data.data[inn].menu_img+'">\
											</div>\
										</div>\
									</a>\
									<div class="box-showcaseDesc ">\
										<div class="box-showcaseDesc_price">'+data.data[inn].menu_price+'</div>\
									</div>\
									<div class="jcorgFilterTextChild">'+data.data[inn].menu_name+'</div>\
							</div>');
					}
				});
				$('#sub_menu_v').html("");
			}
		}
	</script>
	<script type="text/javascript">
		function menu_sub(x){
			$.ajax({
				type:'POST',
				url:'transaction_new.php?page=menu_sub',
				data:{x:x},
				dataType:'json',
			}).done(function(data){
				$('#all_menu').html("");
				for(var inn = 0; inn<data.data.length; inn++){
					$('#all_menu').append(
						'<div class="box-showcase jcorgFilterTextParent">\
								<a id="dialogModal_ex" onclick="dialogModal('+data.data[inn].menu_id+')">\
									<input type="hidden" value="1"/>\
									<div class="title_menu">'+data.data[inn].menu_name+'</div>\
									<div class="box-showcaseInner_frame">\
										<div class="box-showcaseInner">\
										<img class="img-responsive" src="../img/menu/'+data.data[inn].menu_img+'">\
										</div>\
									</div>\
								</a>\
								<div class="box-showcaseDesc ">\
									<div class="box-showcaseDesc_price">'+data.data[inn].menu_price+'</div>\
								</div>\
								<div class="jcorgFilterTextChild">'+data.data[inn].menu_name+'</div>\
						</div>');
				}
				$('#sub_menu_v').html("");
			});
		}
	</script>
	<!-- <script>
			// $('#sub_menu').click(function() {
			// $(this).toggleClass('btn btn-block btn_cat_button_active');
			// });
		// 	$(".btn").click(function() {
	  // 	$(this).parent().toggleClass(".btn btn-block btn_cat_button_active");
		// });
	</script> -->
	<script type="text/javascript">
		function widget(){
			if(widget_frame.style.display=='none'){
				widget_frame.style.display = 'block';
			}else {
				widget_frame.style.display = 'none';
			}
		}
		 function order_member(){
			 var x = document.getElementById('i_tot_id').value;
			 var y = document.getElementById('i_member');
			 if(x==3){
				 y.style.display="block";
			 }else {
			 	y.style.display="none";
			}
		 }
		   var x = document.getElementById('i_tot_id').value;
		   var y = document.getElementById('i_member');
		   var v = document.getElementById('ket_member');
		   var z = document.getElementById('i_member_id').value;
		   	 if(x==3){
				 y.style.display="block";
				 $.ajax({
				 type:'POST',
				 data:{z:z},
				 url:'transaction_new.php?page=ket_member',
				 dataType:'json',
			 }).done(function(data){
				 $('#ket_member').html("");
				 	for(var inn = 0; inn<data.data.length; inn++){
				 $('#ket_member').append('<label>Nama : '+data.data[inn].member_name+'</label><br>\
				 <label>Tlp : '+data.data[inn].member_phone+'</label><br>\
				 <label>Alamat : '+data.data[inn].member_alamat+'</label><br>\
				 <label>Disc : '+data.data[inn].member_discount+'%</label><br>\
				 ');
			 	}
		 	});v.style.display="block";
			 }else {
			 	y.style.display="none";
			}
	</script>
	<script type="text/javascript">
		function ket_member(){
				var z = document.getElementById('i_member_id').value;
			 $.ajax({
				 type:'POST',
				 data:{z:z},
				 url:'transaction_new.php?page=ket_member',
				 dataType:'json',
			 }).done(function(data){
				 $('#ket_member').html("");
				 	for(var inn = 0; inn<data.data.length; inn++){
				 $('#ket_member').append('<label>Nama : '+data.data[inn].member_name+'</label><br>\
				 <label>Tlp : '+data.data[inn].member_phone+'</label><br>\
				 <label>Alamat : '+data.data[inn].member_alamat+'</label><br>\
				 <label>Disc : '+data.data[inn].member_discount+'%</label><br>\
				 ');
			 	}
		 	});
		}
	</script>
