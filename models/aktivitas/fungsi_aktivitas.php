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
function save_aktivitas_harian($redaksi,$peg_id,$tgl_aktif,$jam_awal,$jam_akhir,$target,$satuan,$aktif_unitkerja) {
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	//simpan di master redaksi dulu
	$sql_simpan_red=$conn_aktif->query("insert into m_aktivitas(judul,unitkerja,peg_id,status) values('$redaksi','$aktif_unitkerja','$peg_id','1')") or die(mysqli_error($conn_aktif));
	$sql_cari_id=$conn_aktif->query("select id from m_aktivitas where judul='$redaksi' and unitkerja='$aktif_unitkerja' and peg_id='$peg_id' limit 1") or die(mysqli_error($conn_aktif));
	$r=$sql_cari_id->fetch_object();
	$m_id=$r->id;
	$sql_input_aktivitas=$conn_aktif->query("insert into aktivitas(m_id,m_redaksi,peg_id,aktif_unitkerja,aktif_target,aktif_satuan,aktif_tgl,aktif_awal,aktif_akhir,aktif_status) values('$m_id','$redaksi','$peg_id','$aktif_unitkerja','$target','$satuan','$tgl_aktif','$jam_awal','$jam_akhir','1')") or die(mysqli_error($conn_aktif));
	$status_input=array("error"=>false);
	if ($sql_input_aktivitas) {
		$status_input["error"]=false;
		$status_input["pesan_error"]='(SUKSES) Data berhasil disimpan';
	}
	else {
		$status_input["error"]=true;
		$status_input["pesan_error"]='(ERROR) Data berhasil tidak disimpan';
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