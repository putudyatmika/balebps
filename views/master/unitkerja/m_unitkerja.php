<?php
			if ($lvl3=='add') {
				include 'views/master/unitkerja/m_unitkerja_form.php';
			}
			elseif ($lvl3=='save') {
				include 'views/master/unitkerja/m_unitkerja_save.php';
			}
			elseif ($lvl3=='edit') {
				include 'views/master/unitkerja/m_unitkerja_form_edit.php';
			}
			elseif ($lvl3=='update') {
				include 'views/master/unitkerja/m_unitkerja_update.php';
			}
			elseif ($lvl3=='view') {
				include 'views/master/unitkerja/m_unitkerja_view.php';
			}
			elseif ($lvl3=='delete') {
				include 'views/master/unitkerja/m_unitkerja_delete.php';
			}
			elseif ($lvl3=='provinsi') {
				include 'views/master/unitkerja/m_unitkerja_provinsi.php';
			}
			elseif ($lvl3=='kabupaten') {
				include 'views/master/unitkerja/m_unitkerja_kabupaten.php';
			}
			else {
				include 'views/master/unitkerja/m_unitkerja_list.php';
			}
?>