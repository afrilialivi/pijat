<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/paket_pijat_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("paket pijat");

$_SESSION['paket_pijat_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		$where ='';
		$query = select_config('paket_pijat', $where);
		$add_button = "paket_pijat.php?page=form";

		include '../views/paket_pijat/list.php';
		get_footer();
	break;

	case 'form':
		get_header($title);
		
		$close_button = "paket_pijat.php?page=list";
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
		
			$action = "paket_pijat.php?page=edit&id=$id";
		} else {
			
			//inisialisasi
			$row = new stdClass();
	
			$row->paket_pijat_name = false;
			$row->paket_pijat_harga = false;
			
			$action = "paket_pijat.php?page=save";
		}

		include '../views/paket_pijat/form.php';
		get_footer();
	break;

	case 'save':
			extract($_POST);

			$i_name = get_isset($i_name);
			$i_harga = get_isset($i_harga);
			$data = "'',
						'$i_name',
						'$i_harga'
				";
				
				//echo $data;

			create($data);
				
			header("Location: paket_pijat.php?page=list&did=1");		
	break;

	case 'edit':
			
		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_harga = get_isset($i_harga);

		$data = "paket_pijat_name = '$i_name',
				paket_pijat_harga = '$i_harga'
				";
			
		update($data, $id);
			
		header('Location: paket_pijat.php?page=list&did=2');
	break;

	case 'delete':
			$id = get_isset($_GET['id']);	
			delete($id);
			header('Location: paket_pijat.php?page=list&did=3');
	break;
}

?>
