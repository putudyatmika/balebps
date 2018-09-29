<?php
if (isset($_POST['pilih_bidang'])) { $pilih_bidang=$_POST['pilih_bidang']; }
else { $pilih_bidang=0; }

if (isset($_POST['bln_pilih'])) { $bln_pilih=$_POST['bln_pilih']; }
else { $bln_pilih=0; }

if (isset($_POST['thn_pilih'])) { $thn_pilih=$_POST['thn_pilih']; }
else { $thn_pilih=date("Y"); }

if ($act=='kabkota') {
	include 'views/laporan/lap_kabkota.php';
}
elseif ($act=='bidang') {
	include 'views/laporan/lap_bidang.php';
}
else {
	include 'views/laporan/lap_provinsi.php';
}
?>