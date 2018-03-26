<?php
			if ($lvl3=='add') {
				include 'views/master/pegawai/m_pegawai_form.php';
			}
			elseif ($lvl3=='save') {
				include 'views/master/pegawai/m_pegawai_save.php';
			}
			elseif ($lvl3=='edit') {
				include 'views/master/pegawai/m_pegawai_form_edit.php';
			}
			elseif ($lvl3=='update') {
				include 'views/master/pegawai/m_pegawai_update.php';
			}
			elseif ($lvl3=='view') {
				include 'views/master/pegawai/m_pegawai_view.php';
			}
			elseif ($lvl3=='delete') {
				include 'views/master/pegawai/m_pegawai_delete.php';
			}
			elseif ($lvl3=='honor') {
				include 'views/master/pegawai/m_pegawai_honor.php';
			}
			elseif ($lvl3=='pns') {
				include 'views/master/pegawai/m_pegawai_pns.php';
			}
			else {
				include 'views/master/pegawai/m_pegawai_list.php';
			}
?>