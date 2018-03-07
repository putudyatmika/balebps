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
function list_master_aktifitas($id,$detil=false,$unit=false) {
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	if ($detil==false) {
		//list semua redaksi
		$sql_list_redaksi = $conn_aktif -> query("select * from m_aktivitas order by id asc") or die(mysqli_error($conn_aktif));
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
?>