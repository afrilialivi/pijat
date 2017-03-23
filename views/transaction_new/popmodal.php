	<script type="text/javascript">
		function get_quantity(type){
			var i_qty_popmodal = document.getElementById("i_qty_popmodal").value;
			if(type == 1){
				new_data = parseFloat(i_qty_popmodal) + 1;
			}else{
				if(i_qty_popmodal != 1){
					new_data = i_qty_popmodal - 1;
				}else{
					new_data = 1;
				}
			}
			document.getElementByName("i_qty_popmodal").value = "99";
			//alert(new_data);
		}
	</script>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8">
				<div class="popmodal_title" style="font-size: 18px;"><?= $menu_name ?></div>
				<input type="hidden" id="test" name="test" value="<?=$type_id?>">
				<input type="hidden" id="test1" name="test1" value="<?=$member_id?>">
				<input type="hidden" id="jml_orang" name="jml_orang" value="<?=$jml_orang?>">
			</div>
			<div class="col-md-4 popmod-col">
				<div class="input-group popmod">
					<span class="input-group-btn">
						<button class="btn btn-default text_popmodal" type="button" style="color:white; background-color:black" onclick="addmin('min')">-</button>
					</span>
					<input type="text" class="form-control text_popmodal" value="1" name="i_qty_popmodal" id="i_qty_popmodal"  />
					<span class="input-group-btn">
						<button class="btn btn-default text_popmodal" type="button" style="color:white; background-color:black" onclick="addmin('plus')">+</button>
					</span>
				</div>
				<input type="hidden" class="form-control" value="<?= $menu_id ?>" name="i_menu_id_popmodal" id="i_menu_id_popmodal"  />
			</div>
		</div>
		<?php
		$query_note_category = mysql_query("SELECT * FROM note_categories WHERE note_category_id != 5");
		while($row_note_category = mysql_fetch_array($query_note_category)){
			?>
		<div class="col-md-3 hide-on-mobile">
			<div class="row">
				<div class="form-group note_frame">
					<legend><?= $row_note_category['note_category_name']?></legend>
					<div id="donate">
						<?php
						$active = 0;
						$query_note = mysql_query("select * from notes where note_category_id = '".$row_note_category['note_category_id']."' order by note_id");
						while($row_note = mysql_fetch_array($query_note)){
							switch($row_note_category['note_category_id']){
								case 1: $background_color= "#8ed0e1"; break;
								case 2: $background_color= "#7edd8d"; break;
								case 3: $background_color= "#f7b065"; break;
								case 4: $background_color= "#d891ef"; break;
							}
							$checked = '';
							?>
							<label class="blue" style="background-color: <?= $background_color ?>">
								<input style="display:none;"  type="radio" name="i_note_<?= $row_note_category['note_category_id'] ?>" value="<?= $row_note['note_id'] ?>" <?= $checked ?>/>
								<span  onclick="get_change(<?= $row_note['note_id']?>, <?= $row_note_category['note_category_id'] ?>)" id="i_span_<?= $row_note['note_id']?>" class="i_span_<?= $row_note_category['note_category_id']?>"><?= $row_note['note_name'] ?>
								</span>
							</label>
							<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php }
			$query_note_category = mysql_query("SELECT * FROM note_categories WHERE note_category_id = 5");
			while($row_note_category = mysql_fetch_array($query_note_category)){
				?>
					<div class="row hide-on-mobile">
						<div class="form-group note_frame">
							<legend><?= $row_note_category['note_category_name']?></legend>
							<div id="donate">
								<?php
								$active = 0;
								$query_note = mysql_query("select * from notes where note_category_id = '".$row_note_category['note_category_id']."' order by note_id");
								while($row_note = mysql_fetch_array($query_note)){
									$checked = '';
									?>
									<label class="blue" style="background-color:#f1f52a;">
										<input style="display:none;"  type="radio" name="i_note_<?= $row_note_category['note_category_id'] ?>" value="<?= $row_note['note_id'] ?>" <?= $checked ?>/>
										<span  onclick="get_change(<?= $row_note['note_id']?>, <?= $row_note_category['note_category_id'] ?>)" id="i_span_<?= $row_note['note_id']?>" class="i_span_<?= $row_note_category['note_category_id']?>"><?= $row_note['note_name'] ?>
										</span>
									</label>
									<?php } ?>
							</div>
						</div>
					</div>
			<?php }?>
		<br>
		<div style="clear:both;"></div>
	<!-- </div>--><!-- /.box-body -->
	<!-- on mobile -->
	<!-- <div class="box-body show-on-mobile hide-on-mobile1280"> -->
		<!-- <div class="row"> -->
			<!-- <div class="col-md-3">
				<div class="popmodal_title" style="font-size: 18px;"><?= $menu_name ?></div>
			</div>
			<div class="col-md-3" style="padding-left: 28px;">
				<div class="input-group popmod">
					<span class="input-group-btn">
						<button class="btn btn-default text_popmodal" type="button" style="color:white; background-color:black" onclick="addmin('min')">-</button>
					</span>
					<input type="text" class="form-control text_popmodal" value="1" name="i_qty_popmodal" id="i_qty_popmodal"  />
					<span class="input-group-btn">
						<button class="btn btn-default text_popmodal" type="button" style="color:white; background-color:black;" onclick="addmin('plus')">+</button>
					</span>
				</div> -->
				<!-- <input type="hidden" class="form-control" value="<?= $menu_id ?>" name="i_menu_id_popmodal" id="i_menu_id_popmodal"  />
			</div> -->
				<div class="col-md-3 frame-menu-popmod show-on-mobile hide-on-mobile1280">
					<?php
					$query_note_category = mysql_query("SELECT * FROM note_categories");
					while($row_note_category = mysql_fetch_array($query_note_category)){
						?>
					<div class="col-md-3">
							<div class="form-group note_frame">
								<legend><?= $row_note_category['note_category_name']?></legend>
								<div id="donate">
									<?php
									$active = 0;
									$query_note = mysql_query("select * from notes where note_category_id = '".$row_note_category['note_category_id']."' order by note_id");
									while($row_note = mysql_fetch_array($query_note)){
										switch($row_note_category['note_category_id']){
											case 1: $background_color= "#8ed0e1"; break;
											case 2: $background_color= "#7edd8d"; break;
											case 3: $background_color= "#f7b065"; break;
											case 4: $background_color= "#d891ef"; break;
											case 5: $background_color= "#ebf535"; break;
										}
										$checked = ''; ?>
										<label class="blue" style="background-color: <?= $background_color ?>">
											<input style="display:none;"  type="radio" name="i_note_<?= $row_note_category['note_category_id'] ?>" value="<?= $row_note['note_id'] ?>" <?= $checked ?>/>
											<span  onclick="get_change(<?= $row_note['note_id']?>, <?= $row_note_category['note_category_id'] ?>)" id="i_span_<?= $row_note['note_id']?>" class="i_span_<?= $row_note_category['note_category_id']?>"><?= $row_note['note_name'] ?>
											</span>
										</label>
										<?php }?>
								</div>
							</div>
					</div>
				<?php } ?>
				</div>
				<div class="row frame-ket">
					<div class="col-md-12">
						<label>Keterangan</label>
						<div class="form-group">
							<textarea class="form-control" rows="5" name="i_desc"></textarea>
						</div>
					</div>
				</div>
		</div>
	<!-- </div> -->
	<!--<div class="dialogModal_footer">-->
	<!--</div>-->
<script>
	$(function(){
		addmin = function(operation){
			var jumlah =  $("#i_qty_popmodal").val();
			jumlah = parseInt(jumlah);
			if(operation == "min"){
				jumlah = jumlah-1;
			}else{
				jumlah = jumlah+1;
			}
			if(jumlah>0){
				$('input[name=i_qty_popmodal]').val(jumlah);
			}
		}
	});
</script>
