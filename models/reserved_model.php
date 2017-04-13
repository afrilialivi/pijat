<?php

function select_table($where){
	$query = mysql_query("select a.*, b.building_name, c.branch_name from tables a 
							join buildings b on b.building_id = a.building_id
							join branches c on c.branch_id = b.branch_id
							$where
							order by c.branch_id, b.building_id, a.table_id");
	return $query;
}

function get_branch_name($branch_id){
	$query = mysql_query("select branch_name as result from branches where branch_id = '$branch_id'");
	$row = mysql_fetch_array($query);
	
	$result = ($row['result']);
	return $result;
}

function save($data){
		$query = mysql_query("insert into reserved values($data)");	
}

function update_status($table_id, $status){
	mysql_query("update tables set table_status_id = '$status' where table_id = '$table_id'");
}


?>