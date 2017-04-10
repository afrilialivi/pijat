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

    $ruangan_infrastruktur_id = get_isset($_GET['ruangan_infrastruktur_id']);
    $paket_pijat_id = isset($_GET['paket_pijat_id']) ? $_GET['paket_pijat_id'] : null;

    $where_ruangan_infrastruktur_id = "where ruangan_infrastruktur_id = '$ruangan_infrastruktur_id'";
    $infrastruktur_name = select_config_by('ruangan_infrastruktur', 'infrastruktur_name', $where_ruangan_infrastruktur_id);
    $infrastruktur_id = select_config_by('ruangan_infrastruktur', 'infrastruktur', $where_ruangan_infrastruktur_id);

    if ($ruangan_infrastruktur_id!=null) {
      $keterangan = '<center>
                        <span class="span_title">'.$infrastruktur_name.'</span>
                     </center>';
    }

    if ($paket_pijat_id!=null) {
      $keterangan=1;
    }

    // $pijat

    // $where_infrastruktur_id = "WHERE infrastruktur_id = '$infrastruktur_id'";
    // $infrastruktur_name = select_config_by('infrastruktur', 'infrastruktur_name', $where_infrastruktur_id);

    include '../views/transaction/list.php';
    get_footer();
    break;

  default:

    break;
}
