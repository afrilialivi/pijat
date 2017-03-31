<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/infrastruktur_setting_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("infrastruktur");
$title2 = 'Bakmi Gili';
$_SESSION['menu_active'] = 6;

switch ($page) {
	case 'list':

		$first_building_id = select_config_by('buildings', 'min(building_id)', '');
		$building_id = (isset($_GET['building_id'])) ? $_GET['building_id'] : $first_building_id;
		$where_building_id = "WHERE building_id = '$building_id'";
		$building_name = select_config_by('buildings', 'building_name', $where_building_id);
		$building_img = select_config_by('buildings', 'building_img', $where_building_id);
		$action_room = "infrastruktur_setting.php?page=save_room";
		$action_infrastruktur = "infrastruktur_setting.php?page=save_infrastruktur&building_id=$building_id";
		$action_logout = "logout.php";

		include '../views/infrastruktur_setting/list.php';
		//get_footer();
	break;

	case 'save_infrastruktur_location':

		$id=$_GET['id'];
		$data_x=$_GET['data_x'];
		$data_y=$_GET['data_y'];
		$data_top = $_GET['data_top'];

		save_infrastruktur_location($id, $data_x, $data_y, $data_top);


	break;

	case 'save_room':
		$room_name = $_POST['i_room_name'];
		$data = "'','".$room_name."'";
		save_room($data);
		header('location: infrastruktur_setting.php');
	break;

	case 'save_infrastruktur':
		$building_id = $_GET['building_id'];
		$infrastruktur_name = $_POST['i_infrastruktur_name'];
		$data = "'',
				'$building_id',
				'".$infrastruktur_name."',
				'200',
				'200',
				'2',
				'1',
				'0'
				";
		save_infrastruktur($data);
		header("location: infrastruktur_setting.php?building_id=$building_id");
	break;

	case 'save_payment':
		$infrastruktur_id = $_GET['infrastruktur_id'];
		$building_id = $_GET['building_id'];

		$query =  mysql_query("select *
								from transactions_tmp a
								where a.infrastruktur_id = '$infrastruktur_id'
								");
		while($row = mysql_fetch_array($query)){
			$data = "'',
					'$infrastruktur_id',
					'".$row['transaction_date']."',
					'".$row['transaction_total']."'
			";
			create_config("transactions", $data);
			$transaction_id = mysql_insert_id();

			$query_detail =  mysql_query("select *
								from transaction_tmp_details a
								where a.transaction_id = '".$row['transaction_id']."'
								");
			while($row_detail = mysql_fetch_array($query_detail)){
				$data_detail = "'',
									'$transaction_id',
									'".$row_detail['menu_id']."',
									'".$row_detail['transaction_detail_price']."',
									'".$row_detail['transaction_detail_qty']."',
									'".$row_detail['transaction_detail_total']."'
									";
					create_config("transaction_details", $data_detail);
			}

			delete_tmp($infrastruktur_id);

		}
		header("location: infrastruktur_setting.php?building_id=$building_id");
	break;


}

?>
