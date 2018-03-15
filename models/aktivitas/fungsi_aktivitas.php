<?php
function list_redaksi($id,$detil=false) {
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	if ($detil==false) {
		//list semua redaksi
		$sql_list_redaksi = $conn_aktif -> query("select * from redaksi order by id asc") or die(mysqli_error($conn_aktif));
	}
	else {
		//pilih 1 redaksi sesuai id nya
		$sql_list_redaksi = $conn_aktif -> query("select * from redaksi where id='$id'") or die(mysqli_error($conn_aktif));
	}
	$r_data=array("error"=>false);
	$cek = $sql_list_redaksi->num_rows;
	if ($cek > 0) {
		//ada isinya
		$r_data["error"]=false;
		$r_data["red_total"]=$cek;
		$i=1;
		while ($r=$sql_list_redaksi->fetch_object()) {
			$r_data["item"][$i]=array(
				"red_id"=>$r->id,
				"red_nama"=>$r->redaksi
			);
			$i++;
		}

	}
	else {
		$r_data["error"]=true;
		$r_data["pesan_error"]="Data tidak tersedia";

	}
	return $r_data;
	$conn_aktif -> close();
}
function save_m_aktivitas($aktif_judul,$aktif_unitkerja,$peg_id,$aktif_status) {
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	$sql_simpan_red=$conn_aktif->query("insert into m_aktivitas(judul,unitkerja,peg_id,status) values('$aktif_judul','$aktif_unitkerja','$peg_id','$aktif_status')") or die(mysqli_error($conn_aktif));
	$status_input=array("error"=>false);
	if ($sql_simpan_red) {
		$status_input["error"]=false;
		$status_input["pesan_error"]='(SUKSES) Data berhasil disimpan';
	}
	else {
		$status_input["error"]=true;
		$status_input["pesan_error"]='(ERROR) Data tidak disimpan';
	}
	return $status_input;
	$conn_aktif->close();
}
function update_m_aktivitas($aktif_id,$aktif_judul,$aktif_unitkerja,$peg_id,$aktif_status) {
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	$sql_update_aktivitas=$conn_aktif->query("update m_aktivitas set judul='$aktif_judul',unitkerja='$aktif_unitkerja',peg_id='$peg_id',status='$aktif_status' where id='$aktif_id'") or die(mysqli_error($conn_aktif));
	$status_input=array("error"=>false);
	if ($sql_update_aktivitas) {
		$status_input["error"]=false;
		$status_input["pesan_error"]='(SUKSES) Data berhasil diupdate';
	}
	else {
		$status_input["error"]=true;
		$status_input["pesan_error"]='(ERROR) Data tidak diupdate';
	}
	return $status_input;
	$conn_aktif->close();
}
function search_id_m_aktivitas($redaksi,$aktif_unitkerja) {
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	$sql_search=$conn_aktif->query("select id from m_aktivitas where judul='$redaksi' and SUBSTRING(unitkerja,1,4)=SUBSTRING('$aktif_unitkerja',1,4) limit 1") or die(mysqli_error($conn_aktif));
	$status_input=array("error"=>false);
	$cek=$sql_search->num_rows;
	if ($cek>0) {
		$r=$sql_search->fetch_object();
		$status_input["error"]=false;
		$status_input["id"]=$r->id;
	}
	else {
		$status_input["error"]=true;
		$status_input["pesan_error"]='Data tidak tersedia';
	}
	return $status_input;
	$conn_aktif->close();
}
function delete_aktfivitas_harian($aktif_id) {
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	$sql_delete_aktivitas=$conn_aktif->query("select * from aktivitas where aktif_id='$aktif_id' ") or die(mysqli_error($conn_aktif));
	$status_input=array("error"=>false);
	$cek=$sql_delete_aktivitas->num_rows;
	if ($cek>0) {
		$status_input["error"]=false;
		$r=$sql_delete_aktivitas->fetch_object();
		$sql_hapus=$conn_aktif->query("delete from aktivitas where aktif_id='$aktif_id'") or die(mysqli_error($conn_aktif));
		$status_input["pesan_error"]='(SUKSES) Data kegiatan <strong>'.$r->m_redaksi.'</strong> dari Jam '.date("H:i",strtotime($r->aktif_awal)).' s/d '.date("H:i",strtotime($r->aktif_akhir)).' sudah dihapus';
	}
	else {
		$status_input["error"]=true;
		$status_input["pesan_error"]='(ERROR) Data tidak ditemukan';
	}
	return $status_input;
	$conn_aktif->close();
}
function update_aktivitas_harian($aktif_id,$m_id,$redaksi,$peg_id,$tgl_aktif,$jam_awal,$jam_akhir,$target,$satuan,$aktif_unitkerja,$aktif_status) {
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();

	$r_m_update=update_m_aktivitas($m_id,$redaksi,$aktif_unitkerja,$peg_id,1);
	$sql_update_aktivitas=$conn_aktif->query("update aktivitas set m_redaksi='$redaksi', peg_id='$peg_id', aktif_unitkerja='$aktif_unitkerja', aktif_target='$target', aktif_status='$satuan', aktif_awal='$jam_awal', aktif_akhir='$jam_akhir', aktif_status='$aktif_status' where aktif_id='$aktif_id' ") or die(mysqli_error($conn_aktif));
	$status_input=array("error"=>false);
	if ($sql_update_aktivitas) {
		$status_input["error"]=false;
		$status_input["pesan_error"]='(SUKSES) Data berhasil diupdate';
	}
	else {
		$status_input["error"]=true;
		$status_input["pesan_error"]='(ERROR) Data tidak bisa diupdate';
	}
	return $status_input;
	$conn_aktif->close();

}
function save_aktivitas_harian($redaksi,$peg_id,$tgl_aktif,$jam_awal,$jam_akhir,$target,$satuan,$aktif_unitkerja) {
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	//simpan di master redaksi dulu
	//$sql_simpan_red=$conn_aktif->query("insert into m_aktivitas(judul,unitkerja,peg_id,status) values('$redaksi','$aktif_unitkerja','$peg_id','1')") or die(mysqli_error($conn_aktif));
	//$sql_cari_id=$conn_aktif->query("select id from m_aktivitas where judul='$redaksi' and unitkerja='$aktif_unitkerja' and peg_id='$peg_id' limit 1") or die(mysqli_error($conn_aktif));
	//$r=$sql_cari_id->fetch_object();
	//$m_id=$r->id;
	$r_cari=search_id_m_aktivitas($redaksi,$aktif_unitkerja,$peg_id);
	if ($r_cari["error"]==false) {
		//master aktivitas sudah ada
		$m_id=$r_cari["id"];
	}
	else {
		$r_save_m_aktivitas=save_m_aktivitas($redaksi,$aktif_unitkerja,$peg_id,1);
		$r_cari_baru=search_id_m_aktivitas($redaksi,$aktif_unitkerja);
		$m_id=$r_cari_baru["id"];
	}
	
	
	$sql_input_aktivitas=$conn_aktif->query("insert into aktivitas(m_id,m_redaksi,peg_id,aktif_unitkerja,aktif_target,aktif_satuan,aktif_tgl,aktif_awal,aktif_akhir,aktif_status) values('$m_id','$redaksi','$peg_id','$aktif_unitkerja','$target','$satuan','$tgl_aktif','$jam_awal','$jam_akhir','1')") or die(mysqli_error($conn_aktif));
	$status_input=array("error"=>false);
	if ($sql_input_aktivitas) {
		$status_input["error"]=false;
		$status_input["pesan_error"]='(SUKSES) Data berhasil disimpan';
	}
	else {
		$status_input["error"]=true;
		$status_input["pesan_error"]='(ERROR) Data tidak disimpan';
	}
	return $status_input;
	$conn_aktif->close();

}
function list_aktivitas_unitkerja($unit_kode,$tgl_aktif,$esIII=false) {

} 
function list_aktivitas_harian($id,$tgl_aktif,$detil=false,$peg_id) {
	//$id bisa id aktifitas, peg_id, maupun unit_id
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	if ($detil==false) {
		//semua list aktifitas
		$sql_list_aktifitas = $conn_aktif -> query("select * from aktivitas inner join unitkerja on aktivitas.aktif_unitkerja=unitkerja.unit_kode where aktivitas.aktif_tgl='$tgl_aktif' and aktivitas.peg_id='$peg_id' order by aktif_awal asc") or die(mysqli_error($conn_aktif));
	}
	else {
		//hanya 1 kegiatan saja
		$sql_list_aktifitas = $conn_aktif -> query("select * from aktivitas inner join unitkerja on aktivitas.aktif_unitkerja=unitkerja.unit_kode where aktivitas.aktif_id='$id' order by aktif_awal asc") or die(mysqli_error($conn_aktif));
	}

	$r_data=array("error"=>false);
	$cek = $sql_list_aktifitas->num_rows;
	if ($cek > 0) {
		//ada isinya
		$r_data["error"]=false;
		$r_data["aktif_total"]=$cek;
		$i=1;
		while ($r=$sql_list_aktifitas->fetch_object()) {
			$r_data["item"][$i]=array(
				"aktif_id"=>$r->aktif_id,
				"m_id"=>$r->m_id,
				"m_redaksi"=>$r->m_redaksi,
				"peg_id"=>$r->peg_id,
				"aktif_unitkerja"=>$r->aktif_unitkerja,
				"aktif_target"=>$r->aktif_target,
				"aktif_satuan"=>$r->aktif_satuan,
				"aktif_tgl"=>$r->aktif_tgl,
				"aktif_awal"=>$r->aktif_awal,
				"aktif_akhir"=>$r->aktif_akhir,
				"aktif_status"=>$r->aktif_status
			);
			$i++;
		}

	}
	else {
		$r_data["error"]=true;
		$r_data["pesan_error"]="Data tidak tersedia";

	}
	return $r_data;
	$conn_aktif -> close();
}
function list_master_aktivitas($id,$detil=false,$unit=false) {
	$unit_kode=$_SESSION['sesi_unitkerja'];
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	if ($detil==false) {
		if ($unit==false) {
			//list semua master kegiatan
			//list semua redaksi
			$sql_list_redaksi = $conn_aktif -> query("select * from m_aktivitas order by id asc") or die(mysqli_error($conn_aktif));
		}
		else {
			//list master kegiatan di bidangnya
			$sql_list_redaksi = $conn_aktif -> query("select * from m_aktivitas where SUBSTRING(unitkerja,1,4)=SUBSTRING('$unit_kode',1,4) order by id asc") or die(mysqli_error($conn_aktif));
		}
	}
	else {
		//pilih 1 redaksi sesuai id nya
		$sql_list_redaksi = $conn_aktif -> query("select * from m_aktivitas where id='$id'") or die(mysqli_error($conn_aktif));
	}
	$r_data=array("error"=>false);
	$cek = $sql_list_redaksi->num_rows;
	if ($cek > 0) {
		//ada isinya
		$r_data["error"]=false;
		$r_data["m_total"]=$cek;
		$i=1;
		while ($r=$sql_list_redaksi->fetch_object()) {
			$r_data["item"][$i]=array(
				"m_id"=>$r->id,
				"m_judul"=>$r->judul,
				"m_unitkerja"=>$r->unitkerja,
				"m_peg_id"=>$r->peg_id,
				"m_status"=>$r->status,
				"m_tgl_add"=>$r->tgl_add
			);
			$i++;
		}

	}
	else {
		$r_data["error"]=true;
		$r_data["pesan_error"]="Data tidak tersedia";

	}
	return $r_data;
	$conn_aktif -> close();
}

function simpan_redaksi($kata_redaksi) {
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	$sql_simpan_data= $conn_aktif->query("insert into redaksi(redaksi) values('$kata_redaksi')") or die(mysqli_connect($conn_aktif));
	if ($sql_simpan_data) {
		$r_data=true;
	}
	else {
		$r_data=false;
	}
	return $r_data;
	$conn_aktif -> close();
}
?>