<?php
if (isset($_POST['pilih_bidang'])) { $pilih_bidang=$_POST['pilih_bidang']; }
else { $pilih_bidang=0; }

if (isset($_POST['bln_pilih'])) { $bln_pilih=$_POST['bln_pilih']; }
else { $bln_pilih=0; }

if (isset($_POST['thn_pilih'])) { $thn_pilih=$_POST['thn_pilih']; }
else { $thn_pilih=date("Y"); }

if ($act=='kabkota') {
	include 'views/unitkerja/keg_kabkota.php';
}
elseif ($act=='provinsi') {
	include 'views/unitkerja/keg_provinsi.php';
}
else {
	include 'views/unitkerja/keg_semua.php';
}
?>