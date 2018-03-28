<?php
function list_tahun_kegiatan() {
	$db_keg = new db();
	$conn_keg = $db_keg -> connect();
	$sql_kegiatan = $conn_keg -> query("select year(keg_start) as tahun from kegiatan group by year(keg_start) order by tahun asc") or die(mysqli_error($conn_keg));
	$cek=$sql_kegiatan->num_rows;
	$data_keg=array("error"=>false);
	if ($cek > 0) {
		$data_keg["error"]=false;
		$data_keg["thn_total"]=$cek;
		$i=1;
		while ($r=$sql_kegiatan->fetch_object()) {
			$data_keg["item"][$i]=array(
				"thn_keg"=>$r->tahun
			);
			$i++;
		}
	}
	else {
		$data_keg["error"]=true;
		$data_keg["pesan_error"]='Data tidak tersedia';
	}
	return $data_keg;
	$conn_keg->close();
}
function progress_kegiatan($keg_id) {
	$db_keg = new db();
	$conn_keg = $db_keg -> connect();
	$sql_kegiatan = $conn_keg -> query("select keg_id,keg_d_jenis,sum(keg_d_jumlah) as jumlah from keg_detil where keg_id='$keg_id' group by keg_d_jenis order by keg_d_jenis asc") or die(mysqli_error($conn_keg));
	$cek=$sql_kegiatan->num_rows;
	$data_keg=array("error"=>false);
	if ($cek > 0) {
		$data_keg["error"]=false;
		$data_keg["jenis_total"]=$cek;
		$i=1;
		while ($r=$sql_kegiatan->fetch_object()) {
			$data_keg["item"][$i]=array(
				"keg_id"=>$r->keg_id,
				"jenis_id"=>$r->keg_d_jenis,
				"jenis_jumlah"=>$r->jumlah
			);
			$i++;
		}
	}
	else {
		$data_keg["error"]=true;
		$data_keg["pesan_error"]='Data tidak tersedia';
	}
	return $data_keg;
	$conn_keg->close();
}
function list_keg_detil_kabkota($keg_id,$unit_kode,$keg_jenis,$detil=false) {
	$db_keg = new db();
	$conn_keg = $db_keg -> connect();
	if ($detil==false) {
		//semua untuk 1 kegiatan
		$sql_kegiatan = $conn_keg -> query("select keg_detil.*,unit_nama from keg_detil inner join unitkerja on keg_detil.keg_d_unitkerja=unitkerja.unit_kode where keg_id='$keg_id' and keg_d_jenis='$keg_jenis' order by keg_d_tgl asc") or die(mysqli_error($conn_keg));
	}
	else {
		//1 keg 1 kabkota saja
		$sql_kegiatan = $conn_keg -> query("select keg_detil.*,unit_nama from keg_detil inner join unitkerja on keg_detil.keg_d_unitkerja=unitkerja.unit_kode where keg_id='$keg_id' and keg_d_jenis='$keg_jenis' and keg_d_unitkerja='$unit_kode' order by keg_d_tgl asc") or die(mysqli_error($conn_keg));
	}
	$cek=$sql_kegiatan->num_rows;
	$data_keg=array("error"=>false);
	if ($cek > 0) {
		$data_keg["error"]=false;
		$data_keg["detil_total"]=$cek;
		$i=1;
		while ($r=$sql_kegiatan->fetch_object()) {
			$data_keg["item"][$i]=array(
				"keg_id"=>$r->keg_id,
				"detil_id"=>$r->keg_d_id,
				"detil_unitkerja"=>$r->keg_d_unitkerja,
				"detil_unitnama"=>$r->unit_nama,
				"detil_tanggal"=>$r->keg_d_tgl,
				"detil_jumlah"=>$r->keg_d_jumlah,
				"detil_dibuat_oleh"=>$r->keg_d_dibuat_oleh,
				"detil_dibuat_waktu"=>$r->keg_d_dibuat_waktu,
				"detil_diupdate_oleh"=>$r->keg_d_diupdate_oleh,
				"detil_diupdate_waktu"=>$r->keg_d_diupdate_waktu,
				"detil_jenis"=>$r->keg_d_jenis,
				"detil_link_laci"=>$r->keg_d_link_laci,
				"detil_ket"=>$r->keg_d_ket
			);
			$i++;
		}
	}
	else {
		$data_keg["error"]=true;
		$data_keg["pesan_error"]='Data tidak tersedia';
	}
	return $data_keg;
	$conn_keg->close();
}
function list_target_keg_spj_kabkota($keg_id) {
	$db_keg = new db();
	$conn_keg = $db_keg -> connect();
	$sql_target= $conn_keg -> query("select unit.unit_kode, unit.unit_nama, unit.unit_parent, keg_unit.*, keg_spj.* from (select * from unitkerja where unit_jenis='2') as unit left join (select * from keg_target where keg_id='$keg_id') as keg_unit on unit.unit_kode=keg_unit.keg_t_unitkerja LEFT join keg_spj on keg_spj.keg_id=keg_unit.keg_id and keg_spj.keg_s_unitkerja=unit.unit_kode order by unit.unit_kode asc") or die(mysqli_error($conn_keg));
	$cek=$sql_target->num_rows;
	$data_keg=array("error"=>false);
	if ($cek>0) {
		$data_keg["error"]=false;
		$data_keg["target_total"]=$cek;
		$i=1;
		while ($r=$sql_target->fetch_object()) {
			$data_keg["item"][$i]=array(
				"keg_id"=>$r->keg_id,
				"target_id"=>$r->keg_t_id,
				"target_unitkerja"=>$r->keg_t_unitkerja,
				"target_unitnama"=>$r->unit_nama,
				"target_unitparent"=>$r->unit_parent,
				"target_jumlah"=>$r->keg_t_target,
				"target_dibuat_oleh"=>$r->keg_t_dibuat_oleh,
				"target_dibuat_waktu"=>$r->keg_t_dibuat_waktu,
				"target_diupdate_oleh"=>$r->keg_t_diupdate_oleh,
				"target_diupdate_waktu"=>$r->keg_t_diupdate_waktu,
				"target_poin_waktu"=>$r->keg_t_point_waktu,
				"target_poin_jumlah"=>$r->keg_t_point_jumlah,
				"target_poin_total"=>$r->keg_t_point,
				"spj_id"=>$r->keg_s_id,
				"spj_jumlah"=>$r->keg_s_target,
				"spj_dibuat_oleh"=>$r->keg_s_dibuat_oleh,
				"spj_dibuat_waktu"=>$r->keg_s_dibuat_waktu,
				"spj_diupdate_oleh"=>$r->keg_s_diupdate_oleh,
				"spj_diupdate_waktu"=>$r->keg_s_diupdate_waktu,
				"spj_poin_waktu"=>$r->keg_s_point_waktu,
				"spj_poin_jumlah"=>$r->keg_s_point_jumlah,
				"spj_poin_total"=>$r->keg_s_point,
			);
			$i++;
		}
	}
	else {
		$data_keg["error"]=true;
		$data_keg["pesan_error"]='Data tidak tersedia';
	}
	return $data_keg;
	$conn_keg->close();
}
function list_target_keg_kabkota($keg_id,$unit_kode,$detil=false) {
	$db_keg = new db();
	$conn_keg = $db_keg -> connect();
	if ($detil==false) {
		//semua untuk 1 kegiatan
		$sql_kegiatan = $conn_keg -> query("select keg_target.*, unitkerja.unit_nama from keg_target inner join unitkerja on keg_target.keg_t_unitkerja=unitkerja.unit_kode where keg_id='$keg_id' and keg_t_target>0 order by keg_target.keg_t_unitkerja asc") or die(mysqli_error($conn_keg));
	}
	else {
		//1 keg 1 kabkota saja
		$sql_kegiatan = $conn_keg -> query("select keg_target.*, unitkerja.unit_nama from keg_target inner join unitkerja on keg_target.keg_t_unitkerja=unitkerja.unit_kode where keg_id='$keg_id' and keg_t_unitkerja='$unit_kode' and keg_t_target>0 ") or die(mysqli_error($conn_keg));
	}
	$cek=$sql_kegiatan->num_rows;
	$data_keg=array("error"=>false);
	if ($cek > 0) {
		$data_keg["error"]=false;
		$data_keg["target_total"]=$cek;
		$i=1;
		while ($r=$sql_kegiatan->fetch_object()) {
			$data_keg["item"][$i]=array(
				"keg_id"=>$r->keg_id,
				"target_id"=>$r->keg_t_id,
				"target_unitkerja"=>$r->keg_t_unitkerja,
				"target_unitnama"=>$r->unit_nama,
				"target_jumlah"=>$r->keg_t_target,
				"target_dibuat_oleh"=>$r->keg_t_dibuat_oleh,
				"target_dibuat_waktu"=>$r->keg_t_dibuat_waktu,
				"target_diupdate_oleh"=>$r->keg_t_diupdate_oleh,
				"target_diupdate_waktu"=>$r->keg_t_diupdate_waktu,
				"target_poin_waktu"=>$r->keg_t_point_waktu,
				"target_poin_jumlah"=>$r->keg_t_point_jumlah,
				"target_poin_total"=>$r->keg_t_point
			);
			$i++;
		}
	}
	else {
		$data_keg["error"]=true;
		$data_keg["pesan_error"]='Data tidak tersedia';
	}
	return $data_keg;
	$conn_keg->close();
}
function list_target_spj_kabkota($keg_id,$unit_kode,$detil=false) {
	$db_keg = new db();
	$conn_keg = $db_keg -> connect();
	if ($detil==false) {
		//semua untuk 1 kegiatan
		$sql_kegiatan = $conn_keg -> query("select keg_spj.*, unitkerja.unit_nama from keg_spj inner join unitkerja on keg_spj.keg_s_unitkerja=unitkerja.unit_kode where keg_id='$keg_id' and keg_s_target>0 order by keg_spj.keg_s_unitkerja asc") or die(mysqli_error($conn_keg));
	}
	else {
		//1 keg 1 kabkota saja
		$sql_kegiatan = $conn_keg -> query("select keg_spj.*, unitkerja.unit_nama from keg_spj inner join unitkerja on keg_spj.keg_s_unitkerja=unitkerja.unit_kode where keg_id='$keg_id' and keg_s_unitkerja='$unit_kode' and keg_s_target>0 ") or die(mysqli_error($conn_keg));
	}
	$cek=$sql_kegiatan->num_rows;
	$data_keg=array("error"=>false);
	if ($cek > 0) {
		$data_keg["error"]=false;
		$data_keg["spj_total"]=$cek;
		$i=1;
		while ($r=$sql_kegiatan->fetch_object()) {
			$data_keg["item"][$i]=array(
				"keg_id"=>$r->keg_id,
				"spj_id"=>$r->keg_s_id,
				"spj_unitkerja"=>$r->keg_s_unitkerja,
				"spj_unitnama"=>$r->unit_nama,
				"spj_jumlah"=>$r->keg_s_target,
				"spj_dibuat_oleh"=>$r->keg_s_dibuat_oleh,
				"spj_dibuat_waktu"=>$r->keg_s_dibuat_waktu,
				"spj_diupdate_oleh"=>$r->keg_s_diupdate_oleh,
				"spj_diupdate_waktu"=>$r->keg_s_diupdate_waktu,
				"spj_poin_waktu"=>$r->keg_s_point_waktu,
				"spj_poin_jumlah"=>$r->keg_s_point_jumlah,
				"spj_poin_total"=>$r->keg_s_point
			);
			$i++;
		}
	}
	else {
		$data_keg["error"]=true;
		$data_keg["pesan_error"]='Data tidak tersedia';
	}
	return $data_keg;
	$conn_keg->close();
}
function list_spj_detil_kabkota($keg_id,$unit_kode,$keg_jenis,$detil=false) {
	$db_keg = new db();
	$conn_keg = $db_keg -> connect();
	if ($detil==false) {
		//semua spj untuk 1 kegiatan
		$sql_kegiatan = $conn_keg -> query("select spj_detil.*,unit_nama from spj_detil inner join unitkerja on spj_detil.spj_d_unitkerja=unitkerja.unit_kode where keg_id='$keg_id' and spj_d_jenis='$keg_jenis' order by spj_d_tgl asc") or die(mysqli_error($conn_keg));
	}
	else {
		//1 spj 1 kabkota saja
		$sql_kegiatan = $conn_keg -> query("select spj_detil.*,unit_nama from spj_detil inner join unitkerja on spj_detil.spj_d_unitkerja=unitkerja.unit_kode where keg_id='$keg_id' and spj_d_jenis='$keg_jenis' and spj_d_unitkerja='$unit_kode' order by spj_d_tgl asc") or die(mysqli_error($conn_keg));
	}
	$cek=$sql_kegiatan->num_rows;
	$data_keg=array("error"=>false);
	if ($cek > 0) {
		$data_keg["error"]=false;
		$data_keg["spj_bnyk"]=$cek;
		$i=1;
		while ($r=$sql_kegiatan->fetch_object()) {
			$data_keg["item"][$i]=array(
				"keg_id"=>$r->keg_id,
				"spj_id"=>$r->spj_d_id,
				"spj_unitkerja"=>$r->spj_d_unitkerja,
				"spj_unitnama"=>$r->unit_nama,
				"spj_tanggal"=>$r->spj_d_tgl,
				"spj_jumlah"=>$r->spj_d_jumlah,
				"spj_dibuat_oleh"=>$r->spj_d_dibuat_oleh,
				"spj_dibuat_waktu"=>$r->spj_d_dibuat_waktu,
				"spj_diupdate_oleh"=>$r->spj_d_diupdate_oleh,
				"spj_diupdate_waktu"=>$r->spj_d_diupdate_waktu,
				"spj_jenis"=>$r->spj_d_jenis,
				"spj_link_laci"=>$r->spj_d_link_laci,
				"spj_ket"=>$r->spj_d_ket
			);
			$i++;
		}
	}
	else {
		$data_keg["error"]=true;
		$data_keg["pesan_error"]='Data tidak tersedia';
	}
	return $data_keg;
	$conn_keg->close();
}
function list_kegiatan($keg_id,$detil=false,$before=false,$bulan_keg,$tahun_keg) {
	$db_keg = new db();
	$conn_keg = $db_keg -> connect();
	if ($detil==false) {
		//semua kegiatan
		if ($before==false) {
			//semua kegiatan harus ada tahun kegiatan
			if ($bulan_keg>0) {
				//ada bulan kegiatan
				$sql_kegiatan = $conn_keg -> query("select kegiatan.*,unit_nama,unit_jenis,unit_parent from kegiatan inner join unitkerja on kegiatan.keg_unitkerja=unitkerja.unit_kode where month(keg_end)='$bulan_keg' and year(keg_end)='$tahun_keg' order by keg_dibuat_waktu desc") or die(mysqli_error($conn_keg));
			}
			else {
				//tanpa bulan
				$sql_kegiatan = $conn_keg -> query("select kegiatan.*,unit_nama,unit_jenis,unit_parent from kegiatan inner join unitkerja on kegiatan.keg_unitkerja=unitkerja.unit_kode where year(keg_end)='$tahun_keg' order by keg_dibuat_waktu desc") or die(mysqli_error($conn_keg));
			}
		}
		else {
			//hanya list kegiatan mendekati waktu
			$sql_kegiatan = $conn_keg -> query("select kegiatan.*,unit_nama,unit_jenis,unit_parent from kegiatan inner join unitkerja on kegiatan.keg_unitkerja=unitkerja.unit_kode where (keg_end BETWEEN date_add(now(), INTERVAL -2 day) and date_add(now(),INTERVAL 7 day)) order by keg_end asc") or die(mysqli_error($conn_keg));
		}
	}
	else {
		//satu detil kegiatan
		$sql_kegiatan = $conn_keg -> query("select kegiatan.*,unit_nama,unit_jenis,unit_parent from kegiatan inner join unitkerja on kegiatan.keg_unitkerja=unitkerja.unit_kode where kegiatan.keg_id='$keg_id'") or die(mysqli_error($conn_keg));
	}
	$cek = $sql_kegiatan -> num_rows;
	$data_keg=array("error"=>false);
	if ($cek>0) {
		$data_keg["error"]=false;
		$data_keg["keg_total"]=$cek;
		$i=1;
		while ($r= $sql_kegiatan -> fetch_object()) {
			$data_keg["item"][$i]=array(
				"keg_id"=>$r->keg_id,
				"keg_nama"=>$r->keg_nama,
				"keg_unitkerja"=>$r->keg_unitkerja,
				"keg_start"=>$r->keg_start,
				"keg_end"=>$r->keg_end,
				"keg_dibuat_oleh"=>$r->keg_dibuat_oleh,
				"keg_dibuat_waktu"=>$r->keg_dibuat_waktu,
				"keg_diupdate_oleh"=>$r->keg_diupdate_oleh,
				"keg_diupdate_waktu"=>$r->keg_diupdate_waktu,
				"keg_jenis"=>$r->keg_jenis,
				"keg_total_target"=>$r->keg_total_target,
				"keg_target_satuan"=>$r->keg_target_satuan,
				"keg_spj"=>$r->keg_spj,
				"keg_info"=>$r->keg_info,
				"keg_unitnama"=>$r->unit_nama,
				"keg_unitjenis"=>$r->unit_jenis,
				"keg_unitparent"=>$r->unit_parent
			);
			$i++;
		}
	}
	else {
		$data_keg["error"]=true;
		$data_keg["pesan_error"]="Data kegiatan tidak tersedia";		
	}
	return $data_keg;
	$conn_keg->close();
}
function list_kegiatan_bidang($unit_kode,$bulan_keg,$tahun_keg) {
	$db_keg = new db();
	$conn_keg = $db_keg -> connect();
	if ($unit_kode>0) {
		//kegiatan 1 bidang berdasarkan bulan
			if ($bulan_keg>0) {
				//ada bulan kegiatan
				$sql_kegiatan = $conn_keg -> query("select kegiatan.*,unit_nama,unit_jenis,unit_parent from kegiatan inner join unitkerja on kegiatan.keg_unitkerja=unitkerja.unit_kode where month(keg_end)='$bulan_keg' and year(keg_end)='$tahun_keg' and unit_parent='$unit_kode' order by keg_dibuat_waktu desc") or die(mysqli_error($conn_keg));
			}
			else {
				//tanpa bulan
				$sql_kegiatan = $conn_keg -> query("select kegiatan.*,unit_nama,unit_jenis,unit_parent from kegiatan inner join unitkerja on kegiatan.keg_unitkerja=unitkerja.unit_kode where year(keg_end)='$tahun_keg' and unit_parent='$unit_kode' order by keg_dibuat_waktu desc") or die(mysqli_error($conn_keg));
			}
		
	}
	else {
		//satu detil kegiatan bidang
		if ($bulan_keg>0) {
				//ada bulan kegiatan
				$sql_kegiatan = $conn_keg -> query("select kegiatan.*,unit_nama,unit_jenis,unit_parent from kegiatan inner join unitkerja on kegiatan.keg_unitkerja=unitkerja.unit_kode where month(keg_end)='$bulan_keg' and year(keg_end)='$tahun_keg' order by keg_end desc") or die(mysqli_error($conn_keg));
			}
			else {
				//tanpa bulan
				$sql_kegiatan = $conn_keg -> query("select kegiatan.*,unit_nama,unit_jenis,unit_parent from kegiatan inner join unitkerja on kegiatan.keg_unitkerja=unitkerja.unit_kode where year(keg_end)='$tahun_keg' order by keg_dibuat_waktu desc") or die(mysqli_error($conn_keg));
			}
	}
	$cek = $sql_kegiatan -> num_rows;
	$data_keg=array("error"=>false);
	if ($cek>0) {
		$data_keg["error"]=false;
		$data_keg["keg_total"]=$cek;
		$i=1;
		while ($r= $sql_kegiatan -> fetch_object()) {
			$data_keg["item"][$i]=array(
				"keg_id"=>$r->keg_id,
				"keg_nama"=>$r->keg_nama,
				"keg_unitkerja"=>$r->keg_unitkerja,
				"keg_start"=>$r->keg_start,
				"keg_end"=>$r->keg_end,
				"keg_dibuat_oleh"=>$r->keg_dibuat_oleh,
				"keg_dibuat_waktu"=>$r->keg_dibuat_waktu,
				"keg_diupdate_oleh"=>$r->keg_diupdate_oleh,
				"keg_diupdate_waktu"=>$r->keg_diupdate_waktu,
				"keg_jenis"=>$r->keg_jenis,
				"keg_total_target"=>$r->keg_total_target,
				"keg_target_satuan"=>$r->keg_target_satuan,
				"keg_spj"=>$r->keg_spj,
				"keg_info"=>$r->keg_info,
				"keg_unitnama"=>$r->unit_nama,
				"keg_unitjenis"=>$r->unit_jenis,
				"keg_unitparent"=>$r->unit_parent
			);
			$i++;
		}
	}
	else {
		$data_keg["error"]=true;
		$data_keg["pesan_error"]="Data kegiatan tidak tersedia";		
	}
	return $data_keg;
	$conn_keg->close();
}
function ranking_kabkota($bulan_keg,$tahun_keg) {
	$db_keg = new db();
	$conn_keg = $db_keg -> connect();
	$sql_ranking_keg = $conn_keg -> query("select unit_nama, keg.* from unitkerja inner join (select keg_t_unitkerja, count(*) as keg_jml, sum(keg_target.keg_t_target) as keg_jml_target, sum(keg_target.keg_t_point_waktu) as point_waktu, sum(keg_target.keg_t_point_jumlah) as point_jumlah, sum(keg_target.keg_t_point) as point_total, avg(keg_target.keg_t_point) as point_rata from keg_target,kegiatan where kegiatan.keg_id=keg_target.keg_id and month(kegiatan.keg_end)='$bulan_keg' and year(kegiatan.keg_end)='$tahun_keg' and keg_target.keg_t_target>0 group by keg_t_unitkerja) as keg on unitkerja.unit_kode=keg.keg_t_unitkerja order by keg.point_rata desc");
	$cek=$sql_ranking_keg->num_rows;
	$data_keg=array("error"=>false);
	if ($cek>0) {
		$data_keg["error"]=false;
		$data_keg["rank_total"]=$cek;
		$i=1;
		while ($r=$sql_ranking_keg->fetch_object()) {
			$data_keg["item"][$i]=array(
				"rank_nama"=>$r->unit_nama,
				"rank_unitkode"=>$r->keg_t_unitkerja,
				"rank_keg_jumlah"=>$r->keg_jml,
				"rank_target"=>$r->keg_jml_target,
				"rank_poin_waktu"=>$r->point_waktu,
				"rank_poin_jumlah"=>$r->point_jumlah,
				"rank_poin_total"=>$r->point_total,
				"rank_poin_rata"=>$r->point_rata
			);
			$i++;
		}
	}
	else {
		$data_keg["error"]=true;
		$data_keg["pesan_error"]='Data tidak tersedia';
	}
	return $data_keg;
	$conn_keg->close();	
}

function jumlah_kegiatan($bulan_keg,$tahun_keg) {
	$db_keg = new db();
	$conn_keg = $db_keg -> connect();
	$sql_ranking_keg = $conn_keg -> query("select unitkerja.unit_kode, unitkerja.unit_nama, keg.jumlah from unitkerja left join (select SUBSTRING(keg_unitkerja,1,4) as keg_unit, COUNT(*) as jumlah from kegiatan where month(kegiatan.keg_end)='$bulan_keg' and year(kegiatan.keg_end)='$tahun_keg' group by keg_unit) as keg on keg.keg_unit=SUBSTRING(unitkerja.unit_kode,1,4) where unitkerja.unit_jenis=1 and unitkerja.unit_eselon=3 group by unitkerja.unit_kode") or die(mysqli_error($conn_keg));
	$cek=$sql_ranking_keg->num_rows;
	$data_keg=array("error"=>false);
	if ($cek>0) {
		$data_keg["error"]=false;
		$data_keg["keg_bulan_total"]=$cek;
		$i=1;
		while ($r=$sql_ranking_keg->fetch_object()) {
			$data_keg["item"][$i]=array(
				"keg_bulan_unitnama"=>$r->unit_nama,
				"keg_bulan_unitkerja"=>$r->unit_nama,
				"keg_bulan_jumlah"=>$r->jumlah
			);
			$i++;
		}
	}
	else {
		$data_keg["error"]=true;
		$data_keg["pesan_error"]='Data tidak tersedia';
	}
	return $data_keg;
	$conn_keg->close();	
}
function jumlah_kegiatan_tahunan($tahun_keg,$detil=false) {
	$db_keg = new db();
	$conn_keg = $db_keg -> connect();
	if ($detil==false) {
		$sql_tahunan = $conn_keg -> query("select month(keg_end) as bulan, year(keg_end) as tahun, count(*) as jumlah from kegiatan where year(keg_end) <= '$tahun_keg' group by tahun asc limit 2") or die(mysqli_error($conn_keg));
	}
	else {
		$sql_tahunan = $conn_keg -> query("select month(keg_end) as bulan, year(keg_end) as tahun, count(*) as jumlah from kegiatan where year(keg_end)='$tahun_keg' group by bulan asc") or die(mysqli_error($conn_keg));
	}
	
	$cek=$sql_tahunan->num_rows;
	$data_keg=array("error"=>false);
	if ($cek>0) {
		$data_keg["error"]=false;
		$data_keg["keg_bln_total"]=$cek;
		$i=1;
		while ($r=$sql_tahunan->fetch_object()) {
			$data_keg["item"][$i]=array(
				"keg_bulan"=>$r->bulan,
				"keg_tahun"=>$r->tahun,
				"keg_jumlah"=>$r->jumlah
			);
			$i++;
		}
	}
	else {
		$data_keg["error"]=true;
		$data_keg["pesan_error"]='Data tidak tersedia';
	}
	return $data_keg;
	$conn_keg->close();	
}
function jumlah_keg_terima_kirim($tahun_keg) {
	$db_keg = new db();
	$conn_keg = $db_keg -> connect();
	$sql_terimakirim=$conn_keg->query("select year(kegiatan.keg_end) as keg_tahun, count(*) as keg_jumlah, detil.keg_d_jenis from kegiatan inner join (select keg_id, year(keg_d_tgl) as tahun, keg_d_jenis, count(*) as jumlah from keg_detil group by keg_id, keg_d_jenis, tahun) as detil on kegiatan.keg_id=detil.keg_id where year(kegiatan.keg_end)='2018' group by year(kegiatan.keg_end) asc, detil.keg_d_jenis") or die(mysqli_error($conn_keg));
	$cek=$sql_terimakirim->num_rows;
	$data_keg=array("error"=>false);
	if ($cek>0) {
		$data_keg["error"]=false;
		$data_keg["t_total"]=$cek;
		$i=1;
		while ($r=$sql_terimakirim->fetch_object()) {
			$data_keg["item"][$i]=array(
				"keg_tahun"=>$r->keg_tahun,
				"keg_jenis"=>$r->keg_d_jenis,
				"keg_jumlah"=>$r->keg_jumlah
			);
			$i++;
		}
	}
	else {
		$data_keg["error"]=true;
		$data_keg["pesan_error"]='Data tidak tersedia';
	}
	return $data_keg;
	$conn_keg->close();	
}

function seksi_terbanyak_kegiatan($tahun_keg) {
	$db_keg = new db();
	$conn_keg = $db_keg -> connect();
	$sql_terimakirim=$conn_keg->query("select unit_kode, unit_nama, keg.jumlah, keg.tahun from unitkerja inner join (select keg_unitkerja, COUNT(*) as jumlah, year(keg_end) as tahun from kegiatan where year(keg_end)='$tahun_keg' group by keg_unitkerja,tahun order by jumlah desc) as keg on unitkerja.unit_kode=keg.keg_unitkerja order by jumlah desc limit 1") or die(mysqli_error($conn_keg));
	$cek=$sql_terimakirim->num_rows;
	$data_keg=array("error"=>false);
	if ($cek>0) {
		$data_keg["error"]=false;
		$data_keg["keg_banyak"]=$cek;
		$i=1;
		while ($r=$sql_terimakirim->fetch_object()) {
			$data_keg["item"][$i]=array(
				"keg_unitkode"=>$r->unit_kode,
				"keg_unitnama"=>$r->unit_nama,
				"keg_jumlah"=>$r->jumlah,
				"keg_tahun"=>$r->tahun
			);
			$i++;
		}
	}
	else {
		$data_keg["error"]=true;
		$data_keg["pesan_error"]='Data tidak tersedia';
	}
	return $data_keg;
	$conn_keg->close();	
}

function get_id_kegiatan($NamaKegiatan,$waktu_save,$pembuat) {
	$db_keg = new db();
	$conn_keg = $db_keg->connect();
	$sql_id_keg = $conn_keg -> query("select * from kegiatan where keg_nama='$NamaKegiatan' and keg_dibuat_waktu='$waktu_save' and keg_dibuat_oleh='$pembuat'");
	$cek=$sql_id_keg->num_rows;
	if ($cek>0) {
	   $id_keg='';
	   $r=$sql_id_keg->fetch_object();
	   $id_keg=$r->keg_id;
	}
	else {
	 $id_keg='';
	}
	return $id_keg;
	$conn_keg->close();
	}

function save_kegiatan($nama_kegiatan,$keg_unitkerja,$keg_tglmulai,$keg_tglakhir,$keg_jenis,$keg_t,$keg_satuan,$keg_spj) {
	$waktu_lokal=date("Y-m-d H:i:s");
    $created=$_SESSION['sesi_user_id'];
	$db_keg = new db();
	$conn_keg = $db_keg -> connect();
	$sql_save_kegiatan=$conn_keg->query("insert into kegiatan(keg_nama, keg_unitkerja, keg_start, keg_end, keg_dibuat_oleh, keg_dibuat_waktu, keg_diupdate_oleh, keg_jenis, keg_total_target, keg_target_satuan, keg_spj) values('$nama_kegiatan', '$keg_unitkerja', '$keg_tglmulai', '$keg_tglakhir', '$created', '$waktu_lokal', '$created', '$keg_jenis', '$keg_t', '$keg_satuan','$keg_spj')") or die(mysqli_error($conn_keg));
	$data_keg=array("error"=>false);
	if ($sql_save_kegiatan) {
		$data_keg["error"]=false;
		$sql_id_keg = $conn_keg -> query("select keg_id from kegiatan where keg_nama='$nama_kegiatan' and keg_dibuat_waktu='$waktu_lokal' and keg_dibuat_oleh='$created' limit 1");
		$cek=$sql_id_keg->num_rows;
		if ($cek>0) {
			//dapet keg_id
			$r=$sql_id_keg->fetch_object();
			$data_keg["keg_id"]=$r->keg_id;
			$data_keg["pesan_error"]='Data kegiatan <strong>('.$r->keg_id.') '.$nama_kegiatan.'</strong> berhasil di simpan';
		}
		else {
			//keg_id=error
			$data_keg["keg_id"]=0;
			$data_keg["pesan_error"]='Data kegiatan <strong>'.$nama_kegiatan.'</strong> berhasil di simpan';
		}
	}
	else {
		$data_keg["error"]=true;
		$data_keg["pesan_error"]='Data kegiatan tidak tersimpan';
	}
	return $data_keg;
	$conn_keg->close();	
}
function save_target_kabkota($keg_id,$kabkota_id,$target_kabkota,$unit_nama) {
	$waktu_lokal=date("Y-m-d H:i:s");
    $created=$_SESSION['sesi_user_id'];
	$db_keg = new db();
	$conn_keg = $db_keg -> connect();
	$sql_keg_kabkota = $conn_keg -> query("insert into keg_target(keg_id, keg_t_unitkerja, keg_t_target, keg_t_dibuat_oleh, keg_t_dibuat_waktu, keg_t_diupdate_oleh) values('$keg_id', '$kabkota_id', '$target_kabkota', '$created', '$waktu_lokal', '$created')") or die(mysqli_error($conn_keg));
	$data_keg=array("error"=>false);
	if ($sql_keg_kabkota) {
		$data_keg["error"]=false;
		$data_keg["pesan_error"]='Data target <strong>'.$unit_nama.'</strong> sebanyak '.$target_kabkota.' tersimpan';
	}
	else {
		$data_keg["error"]=true;
		$data_keg["pesan_error"]='Data target kabupaten/kota tidak tersimpan';
	}
	return $data_keg;
	$conn_keg->close();	
}

function save_target_spj($keg_id,$kabkota_id,$target_spj,$unit_nama) {
	$waktu_lokal=date("Y-m-d H:i:s");
    $created=$_SESSION['sesi_user_id'];
	$db_keg = new db();
	$conn_keg = $db_keg -> connect();
	$sql_keg_spj = $conn_keg -> query("insert into keg_spj(keg_id, keg_s_unitkerja, keg_s_target, keg_s_dibuat_oleh, keg_s_dibuat_waktu, keg_s_diupdate_oleh) values('$keg_id', '$kabkota_id', '$target_spj', '$created', '$waktu_lokal', '$created')") or die(mysqli_error($conn_keg));
	$data_keg=array("error"=>false);
	if ($sql_keg_spj) {
		$data_keg["error"]=false;
		$data_keg["pesan_error"]='Data target spj <strong>'.$unit_nama.'</strong> sebanyak '.$target_spj.' tersimpan';
	}
	else {
		$data_keg["error"]=true;
		$data_keg["pesan_error"]='Data target spj kabupaten/kota tidak tersimpan';
	}
	return $data_keg;
	$conn_keg->close();	
}
?>