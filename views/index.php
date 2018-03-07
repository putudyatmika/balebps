<?php
if ($page=="kegiatan") {
    include 'views/kegiatan/m_keg.php';
}
elseif (($page=="master") && ($_SESSION['sesi_level'] >= 4)) {
    include 'views/master/m_master.php';
}
elseif ($page=="ranking") {
        include 'views/ranking/m_ranking.php';
    }
elseif ($page=="unitkerja") {
        include 'views/unitkerja/m_unitkerja.php';
    }
elseif ($page=="laporan") {
        include 'views/laporan/m_laporan.php';
    }
elseif (($page=="absen") && ($_SESSION['sesi_provkab'] == 1)) {
        include 'views/absen/m_absen.php';
    }
elseif (($page=="aktifitas") && ($_SESSION['sesi_provkab'] == 1)) {
        include 'views/aktifitas/m_aktifitas.php';
}
elseif ($page=="logout") {
    include 'views/login/logout.php';
}
elseif ($page=="users") {
    include 'views/users/m_users.php';
}
elseif ($page=="json") {
    include 'views/json/m_json.php';
}
else {
    include 'views/utama/m_views.php';
}
?>