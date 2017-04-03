<script type="text/javascript">
		  function grand_total()
			{
				var harga = parseFloat(document.getElementById("i_harga").value);
				var qty = parseFloat(document.getElementById("i_qty").value);
				var	total = harga * qty;
				document.getElementById("i_total").value = total;
			}

		   </script>
			 <script type="text/javascript">
				 function get_quantity(type){
					 var i_qty = document.getElementById("i_qty_popmodal").value;
					 if(type == 1){
						 new_data = parseFloat(i_qty) + 1;
					 }else{
						 if(i_qty != 1){
							 new_data = i_qty - 1;
						 }else{
							 new_data = 1;
						 }
					 }
					 document.getElementByName("i_qty").value = "99";
					 //alert(new_data);
				 }
			 </script>
<!-- Content Header (Page header) -->
                <!-- Main content -->
                <section class="content" style="padding-top:2px;">
                    <div class="row" style="height:400px;">
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->
                          <div class="title_page"> <?= $title ?></div>

                             <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-cokelat">
                                <div class="box-body">
                                    <div class="row note-row">
                                      <!-- <div class="col-md-6">
                                        <input type="text" class="form-control text_popmodal" value="<?= $jumlah ?>" cc  />
                                      </div> -->
																			<div class="row">
																				<div class="col-md-8">
																					<div class="popmodal_title" style="font-size: 18px;"><?= $menu_name ?></div>
																				</div>
																				<div class="col-md-4">
																					<div class="input-group">
																						<span class="input-group-btn popmod">
																							<button class="btn btn-default text_popmodal" type="button" style="color:white; background-color:black" onclick="addmin('min')">-</button>
																						</span>
																						<input type="text" class="form-control text_popmodal" value="1" name="i_qty" id="i_qty" />
																						<span class="input-group-btn">
																							<button class="btn btn-default text_popmodal" type="button" style="color:white; background-color:black" onclick="addmin('plus')">+</button>
																						</span>
																					</div>
																					<input type="hidden" class="form-control" value="<?= $menu_id ?>" name="i_menu_id_popmodal" id="i_menu_id_popmodal"  />
																				</div>
																			</div>
                                    </div>
                                    <br>
                                    <?php
                                        $query_note_category = mysql_query("SELECT * FROM note_categories WHERE note_category_id != 5");
                                        while($row_note_category = mysql_fetch_array($query_note_category)){
                                        ?>
                                        <div class="col-md-3">
                                        <div class="row">
                                        <div class="form-group note_frame" style="border:0px;">
                                            <legend><?= $row_note_category['note_category_name']?></legend>

                                             <div id="donate">
                                             <?php
                                             $active = 0;

                                            $query_note = mysql_query("select * from notes where note_category_id = '".$row_note_category['note_category_id']."' order by note_id");
                                            while($row_note = mysql_fetch_array($query_note)){
                                              $get_note_active = get_note_active($row_note['note_id'], $wt_id);
                                              switch($row_note_category['note_category_id']){
                                                 case 1: $background_color= "#8ed0e1"; break;
                                                 case 2: $background_color= "#7edd8d"; break;
                                                 case 3: $background_color= "#f7b065"; break;
                                                 case 4: $background_color= "#d891ef"; break;
                                              }
                                              if($get_note_active > 0){
                                                 $checked = "checked = 'checked'";
                                                 $active++;
                                                 $link = get_link_active($row_note['note_id'], $wt_id);
                                                 $background_color = 'red';
                                              }else{
                                                $checked = '';
                                              } ?>
                                          <label class="blue" style="background-color: <?= $background_color ?>">
                                             <input type="radio" name="i_note_<?= $row_note_category['note_category_id'] ?>" value="<?= $row_note['note_id'] ?>" <?= $checked ?>/>
                                            <span  onclick="get_change(<?= $row_note['note_id']?>, <?= $row_note_category['note_category_id'] ?>)" id="i_span_<?= $row_note['note_id']?>" class="i_span_<?= $row_note_category['note_category_id']?>" style=" padding-top: 0px;
    padding-bottom:0px;"><?= $row_note['note_name'] ?>
                                            </span>
                                          </label>
                                              <?php } ?>
                                            </div>
                                              <?php
                                              if($active!=0){
                                              ?>
                                              <div style="text-align:right">
                                              <a href="transaction_new.php?page=delete_note&table_id=<?= $table_id ?>&wt_id=<?= $wt_id?>&id=<?= $link ?>" class="btn btn-danger" ><i class="fa fa-trash-o"></i></a>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        </div>
                                      </div>
                                        <?php
                                        }
                                        ?>
																				<?php
		                                        $query_note_category = mysql_query("SELECT * FROM note_categories WHERE note_category_id = 5");
		                                        while($row_note_category = mysql_fetch_array($query_note_category)){
		                                        ?>
		                                        <div class="row">
		                                        <div class="form-group note_frame" style="border:0px;">
		                                            <legend><?= $row_note_category['note_category_name']?></legend>

		                                             <div id="donate">
		                                             <?php
		                                             $active = 0;

		                                            $query_note = mysql_query("select * from notes where note_category_id = '".$row_note_category['note_category_id']."' order by note_id");
		                                            while($row_note = mysql_fetch_array($query_note)){
		                                              $get_note_active = get_note_active($row_note['note_id'], $wt_id);
		                                              if($get_note_active > 0){
		                                                 $checked = "checked = 'checked'";
		                                                 $active++;
		                                                 $link = get_link_active($row_note['note_id'], $wt_id);
		                                                 $background_color = 'red';
		                                              }else{
		                                                $checked = '';
		                                              } ?>
		                                          <label class="blue" style="background-color: #e4e820">
		                                             <input type="radio" name="i_note_<?= $row_note_category['note_category_id'] ?>" value="<?= $row_note['note_id'] ?>" <?= $checked ?>/>
		                                            <span  onclick="get_change(<?= $row_note['note_id']?>, <?= $row_note_category['note_category_id'] ?>)" id="i_span_<?= $row_note['note_id']?>" class="i_span_<?= $row_note_category['note_category_id']?>" style=" padding-top: 0px;
		    padding-bottom:0px;"><?= $row_note['note_name'] ?>
		                                            </span>
		                                          </label>
		                                              <?php } ?>
		                                            </div>
		                                              <?php
		                                              if($active!=0){
		                                              ?>
		                                              <div style="text-align:right">
		                                              <a href="transaction_new.php?page=delete_note&table_id=<?= $table_id ?>&wt_id=<?= $wt_id?>&id=<?= $link ?>" class="btn btn-danger" ><i class="fa fa-trash-o"></i></a>
		                                            </div>
		                                            <?php
		                                            }
		                                            ?>
		                                        </div>
		                                        </div>
		                                        <?php } ?>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-12">
                                        <label>Keterangan</label>
                                        <div class="form-group">
                                             <textarea class="form-control" rows="5" name="i_desc" ><?= $get_note_desc; ?></textarea>
                                            </div>
                                          </div>
                                      </div>
                                        <div style="clear:both;"></div>

                                </div><!-- /.box-body -->

                                  <div class="box-footer">
                                <input class="btn btn-danger" type="submit" value="Save"/>
                                <a href="<?= $close_button?>" class="btn btn-danger" >Close</a>

                             </div>

                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->

                <script type="text/javascript">
                function get_change(id, group){

                 if(group == 1){
                    var color = "#8ed0e1";
                  }else if(group == 2){
                    var color = "#7edd8d";
                  }else if(group == 3){
                    var color = "#f7b065";
                  }else if(group == 4){
                    var color = "#d891ef";
                  }

                  $(".i_span_"+group).css("background-color", color);
                  $(".i_span_"+group).css("color", "black");

                  document.getElementById("i_span_"+id).style.backgroundColor = "red";
                  //document.getElementById("i_span_"+id).style.color = "white";
                }
                </script>
								<script>
									$(function(){
										addmin = function(operation){
											var jumlah =  $("#i_qty").val();
											jumlah = parseInt(jumlah);
											if(operation == "min"){
												jumlah = jumlah-1;
											}else{
												jumlah = jumlah+1;
											}
											if(jumlah>0){
												$('input[name=i_qty]').val(jumlah);
											}
										}
									});
								</script>
