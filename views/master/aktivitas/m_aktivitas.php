<?php
			if ($lvl3=='add') {
				include 'views/master/aktivitas/m_aktivitas_form.php';
			}
			elseif ($lvl3=='save') {
				include 'views/master/aktivitas/m_aktivitas_save.php';
			}
			elseif ($lvl3=='edit') {
				include 'views/master/aktivitas/m_aktivitas_form_edit.php';
			}
			elseif ($lvl3=='update') {
				include 'views/master/aktivitas/m_aktivitas_update.php';
			}
			elseif ($lvl3=='view') {
				include 'views/master/aktivitas/m_aktivitas_view.php';
			}
			elseif ($lvl3=='delete') {
				include 'views/master/aktivitas/m_aktivitas_delete.php';
			}
			elseif ($lvl3=='honor') {
				include 'views/master/aktivitas/m_aktivitas_honor.php';
			}
			elseif ($lvl3=='pns') {
				include 'views/master/aktivitas/m_aktivitas_pns.php';
			}
			else {
				include 'views/master/aktivitas/m_aktivitas_list.php';
			}
		?>