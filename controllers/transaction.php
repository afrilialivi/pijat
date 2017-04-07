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
    get_header();
    $date = format_date(date("Y-m-d"));
		if(isset($_GET['date'])){
			$date = format_date($_GET['date']);
		}

    $branch_id = $_SESSION['branch_id'];
    if(isset($_GET['branch_id_'])){
			$branch_id = format_date($_GET['branch_id_']);
		}

    $q_member = select_config('members', '');
		$q_branch = select_config('branches','');

    $infrastruktur_id = $_GET['infrastruktur_id'];
    include '../views/transaction/list.php';
    get_footer();
    break;

  default:

    break;
}
