<?php
	if ($act=="users") {
		include 'views/master/users/m_users.php';
	}
	elseif ($act=="pegawai") {
		include 'views/master/pegawai/m_pegawai.php';
	}
	elseif ($act=="absen") {
		include 'views/master/absen/m_absen.php';
	}
	elseif ($act=="unitkerja") {
		include 'views/master/unitkerja/m_unitkerja.php';
	}
	elseif ($act=="aktivitas") {
		include 'views/master/aktivitas/m_aktivitas.php';
	}
	else {
		include 'views/master/m_master_list.php';
	}
?>