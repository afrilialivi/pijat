<?php
function select_pijat_details($id){
  $query = mysql_query("SELECT a.*, b.item_name FROM pijat_details a
                        LEFT JOIN item b ON b.item_id = a.item
                        WHERE a.pijat = '$id'");
  return $query;
}

function delete_pijat_item($id){
	mysql_query("delete from pijat_details where pijat_detail_id = '$id'");
}

 ?>
