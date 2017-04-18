<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/item_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("item");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);

		$query = select();
		$q_satuan = select_config('satuan','');
		$add_button = "item.php?page=form";

		include '../views/item/list.php';
		get_footer();
	break;

	case 'form':
		get_header();

		$close_button = "item.php?page=list";

		$q_satuan = select_config('satuan', '');

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);

			$action = "item.php?page=edit&id=$id";
		} else{

			//inisialisasi
			$row = new stdClass();

			$row->item_name = false;
			$row->item_hpp = false;
			$row->item_margin = false;
			$row->item_harga_jual = false;
			$row->item_satuan = false;

			$action = "item.php?page=save";
		}

		include '../views/item/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$i_name = get_isset($i_name);
		$i_hpp = get_isset($i_hpp);
		$i_margin = get_isset($i_margin);
		$i_jual = get_isset($i_jual);
		$i_satuan = get_isset($i_satuan);

		$data = "'',
					'$i_name',
					'$i_hpp',
					'$i_margin',
					'$i_jual',
					'$i_satuan'
			";
			create_config('item',$data);
			// echo $data;
			header("Location: item.php?page=list&did=1");
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_hpp = get_isset($i_hpp);
		$i_margin = get_isset($i_margin);
		$i_jual = get_isset($i_jual);
		$i_satuan = get_isset($i_satuan);

					$data = " item_name = '$i_name',
							  item_hpp = '$i_hpp',
							  item_margin = '$i_margin',
							  item_harga_jual = '$i_jual',
							  item_Satuan = '$i_satuan'
					";		
			update($data, $id);
			// echo $data;
			header('Location: item.php?page=list&did=2');

	break;

	case 'delete':

		$id = get_isset($_GET['id']);

		delete($id);

		header('Location: item.php?page=list&did=3');

	break;
}

?>
