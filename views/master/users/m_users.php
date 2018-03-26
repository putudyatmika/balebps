<?php
			if ($lvl3=='add') {
				include 'views/master/users/users_form.php';
			}
			elseif ($lvl3=='save') {
				include 'views/master/users/users_save.php';
			}
			elseif ($lvl3=='edit') {
				include 'views/master/users/users_form_edit.php';
			}
			elseif ($lvl3=='update') {
				include 'views/master/users/users_update.php';
			}
			elseif ($lvl3=='view') {
				include 'views/master/users/users_view.php';
			}
			elseif ($lvl3=='delete') {
				include 'views/master/users/users_delete.php';
			}
			elseif ($lvl3=='honor') {
				include 'views/master/users/users_honor.php';
			}
			elseif ($lvl3=='pns') {
				include 'views/master/users/users_pns.php';
			}
			else {
				include 'views/master/users/users_list.php';
			}
		?>