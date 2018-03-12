<?php
			if ($act=='add') {
				include 'views/aktifitas/aktif_form.php';
			}
			elseif ($act=='save') {
				include 'views/aktifitas/aktif_save.php';
			}
			elseif ($act=='edit') {
				include 'views/aktifitas/aktif_form_edit.php';
			}
			elseif ($act=='update') {
				include 'views/aktifitas/m_aktifitas_update.php';
			}
			elseif ($act=='view') {
				include 'views/aktifitas/m_aktifitas_view.php';
			}
			elseif ($act=='delete') {
				include 'views/aktif_delete.php';
			}
			elseif ($act=='harian') {
				include 'views/aktifitas/aktif_harian.php';
			}
			else {
				include 'views/aktifitas/aktif_list.php';
			}
		?>