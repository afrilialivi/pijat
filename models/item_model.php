<?php

function select(){
	$query = mysql_query("select a.*, b.satuan_name 
							from item a
							left join satuan b on b.satuan_id = a.item_satuan
							order by item_id");
	return $query;
}


function read_id($id){
	$query = mysql_query("select *
							from item
			where item_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into item values(".$data.")");
}

function update($data, $id){
	mysql_query("update item set ".$data." where item_id = '$id'");
}

function delete($id){
	mysql_query("delete from item where item_id = '$id'");
}
?>