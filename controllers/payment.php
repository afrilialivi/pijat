<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/payment_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucwords("Pembayaran");
$judul = 'Bakmi Gili';

$_SESSION['table_active'] = 1;

switch ($page) {
	case 'list':

		$table_id = get_isset($_GET['table_id']);
		$building_id = (isset($_GET['building_id'])) ? $_GET['building_id'] : 0;
		$query = select($table_id);
		$query2 = select($table_id);
		$action = "order.php?page=save_payment&table_id=".$table_id."&building_id=".$building_id;
		$table_name = get_table_name($table_id);
		$building_name = get_table_name($building_id);
		$transaction_code = get_transaction_code($table_id);
		$member_id = get_member_id($table_id);


		if($table_id == 0 ){
			$button_back = "";
		}else{
			$button_back = "order.php?building_id=$building_id";
		}

		include '../views/payment/list.php';

	break;



	case 'save':

		extract($_POST);

		$i_name = get_isset($i_name);

		$data = "'',
					'$i_name'
			";
			//echo $data;
			create($data);

			header("Location: payment.php?page=list&did=1");


	break;

	case 'read_voucher':

		extract($_POST);

		$id = get_isset($id);

		$data_voucher = read_voucher($id);

		//echo $data_voucher['voucher_type_id']."-".$data_voucher['voucher_value'];
		$data['voucher_type_id'] = $data_voucher['voucher_type_id'];
		$data['voucher_value'] = $data_voucher['voucher_value'];

		echo json_encode($data);

	break;

	case 'hitungbulat':
		$totalkedua=ceil($_POST['price']);
		if (substr($totalkedua,-2)!=00){
			if(substr($totalkedua,-2)<50){
				$totalkedua=round($totalkedua,-2)+100;
			}else{
				$totalkedua=round($totalkedua,-2);
			}
		}
		echo $totalkedua;
	break;

	case 'tax':

	break;
}

?>
