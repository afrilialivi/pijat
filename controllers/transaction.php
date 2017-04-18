<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/order_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Order");
$judul = 'Zee Holistic';
$_SESSION['menu_active'] = 2;

switch ($page) {
     case 'list':
        get_header();
        $close_button = "home.php";
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

        $q_pijat = select_config('pijat', '');
            $q_pijat = select_config('pijat','');

         $q_item = select_config('item', '');
            $q_item = select_config('item','');

        $ruangan_infrastruktur_id = isset($_GET['ruangan_infrastruktur_id']) ? $_GET['ruangan_infrastruktur_id'] : null;
        // get_isset($_GET['ruangan_infrastruktur_id']);
        $paket_pijat_id = isset($_GET['paket_pijat_id']) ? $_GET['paket_pijat_id'] : null;

        $where_ruangan_infrastruktur_id = "where ruangan_infrastruktur_id = '$ruangan_infrastruktur_id'";
        $infrastruktur_name = select_config_by('ruangan_infrastruktur', 'infrastruktur_name', $where_ruangan_infrastruktur_id);
        $infrastruktur_id = select_config_by('ruangan_infrastruktur', 'infrastruktur', $where_ruangan_infrastruktur_id);

        $keterangan = "";

        if ($ruangan_infrastruktur_id!=null) {
          $keterangan = '<center>
                            <span class="span_title">'.$infrastruktur_name.'</span>
                         </center>';
        }

        if ($paket_pijat_id!=null) {
          $keterangan=1;
        }

            // $query = select($where);
        
            //inisialisasi
            $row = new stdClass();
    
            $row->member_id = false;
            $row->branch_id = false;
            $row->pijat = false;
            // $row->item = false;
            $row->transaction_date = date("d/m/Y");
            $row->transaction_code = false;

        // $pijat

        // $where_infrastruktur_id = "WHERE infrastruktur_id = '$infrastruktur_id'";
        // $infrastruktur_name = select_config_by('infrastruktur', 'infrastruktur_name', $where_infrastruktur_id);
            $action_statement = "transaction.php?page=save";
        include '../views/transaction/list.php';
        get_footer();
        break;

        default:

    break;

    case 'save':
        extract($_POST);
        $i_member = get_isset($i_member);
        $i_branch = get_isset($i_branch);
        $i_pijat = get_isset($i_pijat);
        $i_item = [];
        $i_date = get_isset($i_date);
        $i_date = format_back_date($i_date);
        $grand_total_currency = get_isset($grand_total_currency);
        // $i_hour = get_isset($i_hour);
        
        // $i_h = explode(" ", $i_hour);
        
        // $hour = explode(":", $i_h[0]);
        
        
        
        // if($i_h[1] == "PM"){
        //     if($hour[0] == 12){
        //         $new_hour = $hour[0];
        //     }else{
        //         $new_hour = $hour[0] + 12;
        //     }
        //     $new_hour = $new_hour.":".$hour[1];
        // }else{
        //     if($hour[0] == 12){
        //         $new_hour = $hour[0] - 12;
        //     }else{
        //         $new_hour = $hour[0];
        //     }
            
        //     if(strlen($new_hour)==1){
        //         $new_hour = "0".$new_hour;
        //     }
            
        //     $new_hour = $new_hour.":".$hour[1];
        // }                
            if ($i_pijat) {
                  $data = "'',
                        '$i_member',
                        '$i_branch',
                        '$i_pijat',
                        '$grand_total_currency',
                        '$i_date',
                        '0'
                        ";

                $transaction_id = create_config('transactions_tmp', $data);

                        foreach ($i_item as $key => $value) {
                            $data_detail = "''
                                            '$transaction_id',
                                            '$i_pijat',
                                            '$i_item[$key]',
                                            '',
                                            '',
                                            '',
                                            '',
                                            '',
                                            '',
                                            '',
                                            ''";

                    create_config('transaction_tmp_details', $data);     
                }               
                header("location: statement.php?page=list&id=$transaction_id&member=$i_member");
            } else {
                header("location: transaction.php");
            }
            
            
        break;
    }