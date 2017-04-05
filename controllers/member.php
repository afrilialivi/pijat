<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/member_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucwords("member");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);

		$query = select();
		$add_button = "member.php?page=form";

		include '../views/member/list.php';
		get_footer();
	break;

	case 'form':
		get_header();

		$close_button = "member.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$query_statement = select_statement($id);


		if($id){


			$row = read_id($id);
			$where_member_id = "where member_id = '$id'";
			$r_statement = select_object_config('statement', $where_member_id);
			$action_statement = "member.php?page=save_statement&id=$id";
			$action = "member.php?page=edit&id=$id"; 

			$check_statement = select_config_by('statement', 'count(*)', $where_member_id);

			if (!$check_statement) {

				$r_statement = new stdClass();

				$r_statement->tekanan = false;
				$r_statement->asma = false;
				$r_statement->inhaler = false;
				$r_statement->leher = false;
				$r_statement->kulit = false;
				$r_statement->kulit_jabarkan = false;
				$r_statement->selain_diatas = false;
				$r_statement->selain_jabarkan = false;
				$r_statement->alergi  = false;
				$r_statement->alergi_jabarkan = false;
				$r_statement->hamil = false;
				$r_statement->usia_kandungan = false;
				$r_statement->kontak_lens = false;
				$r_statement->melepas_lens = false;
				$r_statement->level = false;
				$r_statement->spesial = false;
				$r_statement->jawaban = false;
				$r_statement->tidak_menyembunyikan = false;
				$r_statement->tanggung_jawab = false;
			}

		} else {

			//inisialisasi
			$row = new stdClass();

			$row->member_name = false;
			$row->member_phone = false;
			$row->member_alamat = false;
			$row->member_email = false;
			
			$action = "member.php?page=save";
		}
		include '../views/member/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$i_name = get_isset($i_name);
		$i_phone = get_isset($i_phone);
		$i_alamat = get_isset($i_alamat);
		$i_email = get_isset($i_email);

		$data = "'',
					'$i_name',
					'$i_phone',
					'$i_alamat',
					'$i_email'
			";

			//echo $data;
			// create_config('members', $data);
			$member_id = create_config('members', $data);
			// var_dump($_POST); 
			header("Location: member.php?page=form&id=$member_id");


	break;

	case 'add_menu':

		extract($_POST);

		$member_id = $_GET['member_id'];
		$menu_id = $_GET['menu_id'];

		$data = "'',
					'$member_id',
					'$menu_id'
			";

			//echo $data;

		create_item($data);

		header("Location: member.php?page=form&id=$member_id&did=1");


	break;


	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_phone = get_isset($i_phone);
		$i_alamat = get_isset($i_alamat);
		$i_email = get_isset($i_email);

		$data = " member_name = '$i_name',
				  member_phone = '$i_phone',
				  member_alamat = '$i_alamat',
				  member_email = '$i_email'
				";

		$where_member_id = "member_id = '$id'";				
		update_config2('members', $data, $where_member_id);

		header("Location: member.php?page=form&id=$id&did=1");



	break;

	case 'delete':

		$id = get_isset($_GET['id']);

		delete($id);

		header('Location: member.php?page=list&did=3');

	break;

	case 'delete_item':

		$id = get_isset($_GET['id']);
		$member_id = get_isset($_GET['member_id']);

		delete_item($id);

		header("Location: member.php?page=form&id=$member_id&did=3");

	break;

	case 'save_statement':
			var_dump($_POST);
				extract($_POST);
				$id = (isset($_GET['id'])) ? $_GET['id'] : null;
				$i_tekanan = get_isset($i_tekanan);
				$i_asma = get_isset($i_asma);
				$i_inhaler = get_isset($i_inhaler);
				$i_leher = get_isset($i_leher);
				$i_kulit = get_isset($i_kulit);
				$i_kulit_jabarkan = get_isset($i_kulit_jabarkan);
				$i_selain = get_isset($i_selain);
				$i_selain_jabarkan = get_isset($i_selain_jabarkan);
				$i_alergi = get_isset($i_alergi);
				$i_alergi_jabarkan = get_isset($i_alergi_jabarkan	);
				$i_hamil = get_isset($i_hamil);
				$i_usia_kandungan = get_isset($i_usia_kandungan);
				$i_lens = get_isset($i_lens);
				$i_melepasnya = get_isset($i_melepasnya);
				$i_level = get_isset($i_level);
				$i_spesial = get_isset($i_spesial);
				$i_jawaban = get_isset($i_jawaban);
				$i_menyembunyikan = get_isset($i_menyembunyikan);
				$i_bertanggung_jawab = get_isset($i_bertanggung_jawab);

				$data = "'',
						'$id',
						'$i_tekanan',
						'$i_asma',
						'$i_inhaler',
						'$i_leher',
						'$i_kulit',
						'$i_kulit_jabarkan',
						'$i_selain',
						'$i_selain_jabarkan',
						'$i_alergi',
						'$i_alergi_jabarkan',
						'$i_hamil',
						'$i_usia_kandungan',
						'$i_lens',
						'$i_melepasnya',
						'$i_level',
						'$i_spesial',
						'$i_jawaban',
						'$i_menyembunyikan',
						'$i_bertanggung_jawab'

						";
				// create_config('statement',$data);
				$statement_id = create_config('statement', $data);
				// var_dump($_POST); 
				header("Location: member.php?page=list");
				// echo "string";
			break;	

	case 'edit_statement':
			var_dump($_POST);
				
				extract($_POST);
				$id = get_isset($_GET['id']);
				$i_tekanan = get_isset($i_tekanan);
				$i_asma = get_isset($i_asma);
				$i_inhaler = get_isset($i_inhaler);
				$i_leher = get_isset($i_leher);
				$i_kulit = get_isset($i_kulit);
				$i_kulit_jabarkan = get_isset($i_kulit_jabarkan);
				$i_selain = get_isset($i_selain);
				$i_selain_jabarkan = get_isset($i_selain_jabarkan);
				$i_alergi = get_isset($i_alergi);
				$i_alergi_jabarkan = get_isset($i_alergi_jabarkan	);
				$i_hamil = get_isset($i_hamil);
				$i_usia_kandungan = get_isset($i_usia_kandungan);
				$i_lens = get_isset($i_lens);
				$i_melepasnya = get_isset($i_melepasnya);
				$i_level = get_isset($i_level);
				$i_spesial = get_isset($i_spesial);
				$i_jawaban = get_isset($i_jawaban);
				$i_menyembunyikan = get_isset($i_menyembunyikan);
				$i_bertanggung_jawab = get_isset($i_bertanggung_jawab);

				$data = "'',
						'$i_tekanan',
						'$i_asma',
						'$i_inhaler',
						'$i_leher',
						'$i_kulit',
						'$i_kulit_jabarkan',
						'$i_selain',
						'$i_selain_jabarkan',
						'$i_alergi',
						'$i_alergi_jabarkan',
						'$i_hamil',
						'$i_usia_kandungan',
						'$i_lens',
						'$i_melepasnya',
						'$i_level',
						'$i_spesial',
						'$i_jawaban',
						'$i_menyembunyikan',
						'$i_bertanggung_jawab'

						";
				update($data,$id);

			header("Location: member.php?page=form&id=$id&did=1");
		break;
}

?>
