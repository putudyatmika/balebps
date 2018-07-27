<?php
if (isset($_POST['pilih_bidang'])) { $pilih_bidang=$_POST['pilih_bidang']; }
else { $pilih_bidang=0; }

if (isset($_POST['bln_pilih'])) { $bln_pilih=$_POST['bln_pilih']; }
else { $bln_pilih=0; }

if (isset($_POST['thn_pilih'])) { $thn_pilih=$_POST['thn_pilih']; }
else { $thn_pilih=date("Y"); }

if ($act=='add' and $_SESSION['sesi_level'] > 2) {
	include 'views/kegiatan/keg_form.php';
}
elseif ($act=='save' and $_SESSION['sesi_level'] > 2) {
	include 'views/kegiatan/keg_save.php';
}
elseif ($act=='edit' and $_SESSION['sesi_level'] > 2) {
	include 'views/kegiatan/keg_form_edit.php';
}
elseif ($act=='update' and $_SESSION['sesi_level'] > 2) {
	include 'views/kegiatan/keg_update.php';
}
elseif ($act=='view') {
	include 'views/kegiatan/keg_view.php';
}
elseif ($act=='delete' and $_SESSION['sesi_level'] > 2) {
	include 'views/kegiatan/keg_delete.php';
}
elseif ($act=='bidang') {
	include 'views/kegiatan/keg_list_bidang.php';
}
elseif ($act=='savekirim') {
	include 'views/kegiatan/keg_save_kirim.php';
}
elseif ($act=='saveterima') {
	include 'views/kegiatan/keg_save_terima.php';
}
elseif ($act=='updatekirim') {
	include 'views/kegiatan/keg_update_kirim.php';
}
elseif ($act=='updateterima') {
	include 'views/kegiatan/keg_update_terima.php';
}
elseif ($act=="deletedetil" and $_SESSION['sesi_level'] > 1) {
	include 'views/kegiatan/keg_delete_detil.php';
}
elseif ($act=='addinfo' and $_SESSION['sesi_level'] > 2) {
	include 'views/kegiatan/keg_addinfo.php';
}
elseif ($act=='deleteinfo' and $_SESSION['sesi_level'] > 2) {
	include 'views/kegiatan/keg_deleteinfo.php';
}
else {
	include 'views/kegiatan/keg_list.php';
}
?>