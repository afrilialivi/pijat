<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/order_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Order");
$judul = 'Bakmi Gili';
$_SESSION['menu_active'] = 2;

switch ($page) {
	case 'list':
		$where_branch = "";
		$where = '';
		$first_building_id = select_config_by('buildings', 'MIN(building_id)', $where);
		$building_id = (isset($_GET['building_id'])) ? $_GET['building_id'] : $first_building_id;
		$branch_id = (isset($_GET['branch_id'])) ? $_GET['branch_id'] : $_SESSION['branch_id'];
		$where_branch_id = "where branch_id = '$branch_id'";
		$where_building_id = "where building_id = '$building_id'";
		$branch_name = select_config_by('branches', 'branch_name', $where_branch_id);
		$building_name = select_config_by('buildings', 'building_name', $where_branch_id);
		$action_logout = "logout.php";
		include '../views/order/list.php';
	break;
	}
?>
