<?php
			if ($act=='add') {
				include 'views/aktifitas/aktif_form.php';
			}
			elseif ($act=='save') {
				include 'views/master/aktifitas/m_aktifitas_save.php';
			}
			elseif ($act=='edit') {
				include 'views/master/aktifitas/m_aktifitas_form_edit.php';
			}
			elseif ($act=='update') {
				include 'views/master/aktifitas/m_aktifitas_update.php';
			}
			elseif ($act=='view') {
				include 'views/master/aktifitas/m_aktifitas_view.php';
			}
			elseif ($act=='delete') {
				include 'views/aktifitas/aktif_delete.php';
			}
			elseif ($act=='harian') {
				include 'views/aktifitas/aktif_harian.php';
			}
			else {
				include 'views/aktifitas/aktif_list.php';
			}
		?>