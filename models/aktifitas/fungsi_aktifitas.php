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
function list_aktifitas_unitkerja($unit_kode,$tgl_aktif,$esIII=false) {

} 
function list_aktifitas_harian($id,$tgl_aktif,$detil=false,$peg_id) {
	//$id bisa id aktifitas, peg_id, maupun unit_id
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	if ($detil==false) {
		//semua list aktifitas
		$sql_list_aktifitas = $conn_aktif -> query() or die(mysqli_error($conn_aktif));
	}
	else {
		//hanya 1 kegiatan saja
		$sql_list_aktifitas = $conn_aktif -> query() or die(mysqli_error($conn_aktif));
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
function list_master_aktifitas($id,$detil=false,$unit=false) {
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