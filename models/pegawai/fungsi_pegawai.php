<?php

function list_pegawai_user($user_no,$detil=false) {
	$db_peg = new db();
	$conn_peg = $db_peg->connect();
	$r_peg = array("error"=>false);
	if ($detil==true) {
		//satu data pegawai saja
		$sql_peg = $conn_peg -> query("select m_pegawai.*,unit_nama,unit_parent,unit_eselon from m_pegawai inner join unitkerja on m_pegawai.peg_unitkerja=unitkerja.unit_kode where peg_jabatan<3 and peg_status=1 and peg_user_no='$user_no'") or die(mysqli_error($conn_peg));
	}
	else {
		//semua data pegawai
		$sql_peg = $conn_peg -> query("select m_pegawai.*,unit_nama,unit_parent,unit_eselon from m_pegawai inner join unitkerja on m_pegawai.peg_unitkerja=unitkerja.unit_kode where peg_jabatan<3 and peg_status=1") or die(mysqli_error($conn_peg));
	}
	
	$cek=$sql_peg -> num_rows;
	if ($cek>0) {
		$r_peg["error"]=false;
		$r_peg["peg_total"]=$cek;
		$i=1;
		while ($r=$sql_peg->fetch_object()) {
			$r_peg["item"][$i]=array(
				"peg_no"=>$r->peg_no,
				"peg_id"=>$r->peg_id,
				"peg_nama"=>$r->peg_nama,
				"peg_nip"=>$r->peg_nip,
				"peg_nip_lama"=>$r->peg_nip_lama,
				"peg_jk"=>$r->peg_jk,
				"peg_unitkerja"=>$r->peg_unitkerja,
				"peg_jabatan"=>$r->peg_jabatan,
				"peg_status"=>$r->peg_status,
				"unit_nama"=>$r->unit_nama,
				"unit_parent"=>$r->unit_parent,
				"unit_eselon"=>$r->unit_eselon,
				"peg_dibuat_waktu"=>$r->peg_dibuat_waktu,
				"peg_dibuat_oleh"=>$r->peg_dibuat_oleh,
				"peg_diupdate_waktu"=>$r->peg_diupdate_waktu,
				"peg_diupdate_oleh"=>$r->peg_diupdate_oleh
			);
			$i++;
		}
	}
	else {
		$r_peg["error"]=true;
		$r_peg["pesan_error"]='Data tidak tersedia';
	}
	return $r_peg;
	$conn_peg -> close();
}
function list_bawahan_pegawai($unit_kode,$eselonIV=true,$unit_eselon) {
	$db_peg = new db();
	$conn_peg = $db_peg->connect();
	$r_peg = array("error"=>false);
	if ($eselonIV==true) {
		$sql_peg = $conn_peg -> query("select * from m_pegawai inner join (select * from unitkerja where unitkerja.unit_kode='$unit_kode') as u on m_pegawai.peg_unitkerja=u.unit_kode where m_pegawai.peg_status=1 and m_pegawai.peg_jabatan=2 order by peg_unitkerja, peg_jabatan asc") or die(mysqli_error($conn_peg));
	}
	else {
		$sql_peg = $conn_peg -> query("select * from m_pegawai inner join (select * from unitkerja where unitkerja.unit_parent='$unit_kode') as u on m_pegawai.peg_unitkerja=u.unit_kode where m_pegawai.peg_status=1 order by peg_unitkerja, peg_jabatan asc") or die(mysqli_error($conn_peg));
	}	
	$cek=$sql_peg -> num_rows;
	if ($cek>0) {
		$r_peg["error"]=false;
		$r_peg["peg_total"]=$cek;
		$i=1;
		while ($r=$sql_peg->fetch_object()) {
			$r_peg["item"][$i]=array(
				"peg_no"=>$r->peg_no,
				"peg_id"=>$r->peg_id,
				"peg_nama"=>$r->peg_nama,
				"peg_nip"=>$r->peg_nip,
				"peg_nip_lama"=>$r->peg_nip_lama,
				"peg_jk"=>$r->peg_jk,
				"peg_unitkerja"=>$r->peg_unitkerja,
				"peg_jabatan"=>$r->peg_jabatan,
				"peg_status"=>$r->peg_status,
				"unit_nama"=>$r->unit_nama,
				"unit_parent"=>$r->unit_parent,
				"unit_eselon"=>$r->unit_eselon,
				"peg_dibuat_waktu"=>$r->peg_dibuat_waktu,
				"peg_dibuat_oleh"=>$r->peg_dibuat_oleh,
				"peg_diupdate_waktu"=>$r->peg_diupdate_waktu,
				"peg_diupdate_oleh"=>$r->peg_diupdate_oleh
			);
			$i++;
		}
	}
	else {
		$r_peg["error"]=true;
		$r_peg["pesan_error"]='Data tidak tersedia';
	}
	return $r_peg;
	$conn_peg -> close();
}
?>