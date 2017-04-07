<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/pijat_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("pijat");

$_SESSION['menu_active'] = 1;
switch ($page) {
  case 'list':
    get_header($title);
    $where ='';
    $query = select_config('pijat', $where);
    $add_button = "pijat.php?page=form";
    include '../views/pijat/pijat_list.php';
    get_footer();
    break;

    case 'form':
      get_header($title);

      $close_button = "pijat.php?page=list";

      $id = (isset($_GET['id'])) ? $_GET['id'] : null;
      $q_infrastruktur = select_config('infrastruktur', '');
      if($id){
        $where_pijat_id = "where pijat_id = '$id'";
        $row = select_object_config('pijat', $where_pijat_id);
        $q_pijat_details = select_pijat_details($id);
        $q_item = select_config('item', '');
        $action = "pijat.php?page=edit&id=$id";
      } else {

        $row = new stdClass();

        $row->pijat_name = false;
        $row->pijat_harga = false;
        $row->infrastruktur = false;

        $action = "pijat.php?page=save";
      }

      include '../views/pijat/pijat_form.php';
      get_footer();
    break;

    case 'save':
        extract($_POST);
        $i_name = get_isset($i_name);
        $i_harga = get_isset($i_harga);
        $i_infrastruktur = get_isset($i_infrastruktur);
        $data = "'',
                '$i_name',
                '$i_harga',
                '$i_infrastruktur'
          ";

        $pijat_id = $create_config('pijat', $data);

        header("Location: pijat.php?page=form&id=$pijat_id");
    break;

    case 'edit':

      extract($_POST);

      $id = get_isset($_GET['id']);
      $i_name = get_isset($i_name);
      $i_harga = get_isset($i_harga);
      $i_infrastruktur = get_isset($i_infrastruktur);

      $data = "pijat_name = '$i_name',
               pijat_harga = '$i_harga',
               infrastruktur = '$i_infrastruktur'
          ";

      $where_pijat_id = "pijat_id = '$id'";
      update_config2('pijat', $data, $where_pijat_id);
      header('Location: pijat.php?page=list&did=2');
    break;

    case 'delete':
        $id = get_isset($_GET['id']);
        delete($id);
        header('Location: pijat.php?page=list&did=3');
    break;

    case 'tambah_paket_recipe':
        $pijat_id = $_GET['pijat_id'];
        $detail_id = (isset($_GET['detail_id'])) ? $_GET['detail_id'] : null;
        $q_item = select_config('item', '');

        if ($detail_id) {
          $action = "pijat.php?page=edit_detail";
          $where_pijat_detail = "where pijat_detail_id = '$detail_id'";
          $row = select_object_config('pijat_details',$where_pijat_detail);
        } else {
          $action = "pijat.php?page=save_detail";
          $row = new stdClass();
          $where_pijat = $pijat;
          $row->item = false;
          $row->item_qty = false;
        }

        include '../views/pijat/popmodal_item.php';

      break;

    case 'add_new_item':
      $id = $_GET['id'];
      include '../views/pijat/popmodal_add_item.php';
      break;

}
?>
