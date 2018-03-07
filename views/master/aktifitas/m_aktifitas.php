<?php
			if ($lvl3=='add') {
				include 'views/master/aktifitas/m_aktifitas_form.php';
			}
			elseif ($lvl3=='save') {
				include 'views/master/aktifitas/m_aktifitas_save.php';
			}
			elseif ($lvl3=='edit') {
				include 'views/master/aktifitas/m_aktifitas_form_edit.php';
			}
			elseif ($lvl3=='update') {
				include 'views/master/aktifitas/m_aktifitas_update.php';
			}
			elseif ($lvl3=='view') {
				include 'views/master/aktifitas/m_aktifitas_view.php';
			}
			elseif ($lvl3=='delete') {
				include 'views/master/aktifitas/m_aktifitas_delete.php';
			}
			elseif ($lvl3=='honor') {
				include 'views/master/aktifitas/m_aktifitas_honor.php';
			}
			elseif ($lvl3=='pns') {
				include 'views/master/aktifitas/m_aktifitas_pns.php';
			}
			else {
				include 'views/master/aktifitas/m_aktifitas_list.php';
			}
		?>