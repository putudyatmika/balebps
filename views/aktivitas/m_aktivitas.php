<?php
			if ($act=='add') {
				include 'views/aktivitas/aktif_form.php';
			}
			elseif ($act=='save') {
				include 'views/aktivitas/aktif_save.php';
			}
			elseif ($act=='edit') {
				include 'views/aktivitas/aktif_form_edit.php';
			}
			elseif ($act=='update') {
				include 'views/aktivitas/aktif_update.php';
			}
			elseif ($act=='view') {
				include 'views/aktivitas/aktif_view.php';
			}
			elseif ($act=='delete') {
				include 'views/aktivitas/aktif_delete.php';
			}
			elseif ($act=='harian') {
				include 'views/aktivitas/aktif_harian.php';
			}
			elseif ($act=='bulanan') {
				include 'views/aktivitas/aktif_bulanan.php';
			}
			else {
				include 'views/aktivitas/aktif_list.php';
			}
		?>