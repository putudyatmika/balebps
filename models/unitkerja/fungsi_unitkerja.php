<?php
function get_nama_unit($kode_unit) {
	$db_unit = new db();
	$conn_unit = $db_unit->connect();
	$sql_namaunit = $conn_unit -> query("select * from unitkerja where unit_kode='".$kode_unit."'");
	$cek=$sql_namaunit->num_rows;
	if ($cek>0) {
	   $nama_unit='';
	   $r=$sql_namaunit->fetch_object();
	   $nama_unit=$r->unit_nama;
	}
	else {
	 $nama_unit='';
	}
	return $nama_unit;
	$conn_unit->close();
	}

function get_jenis_unit($kode_unit) {
$db_unit = new db();
$conn_unit = $db_unit->connect();
$sql_namaunit = $conn_unit -> query("select * from unitkerja where unit_kode='".$kode_unit."'");
$cek=$sql_namaunit->num_rows;
if ($cek>0) {
$jenis_unit='';
$r=$sql_namaunit->fetch_object();
$jenis_unit=$r->unit_jenis;
}
else {
$jenis_unit='';
}
return $jenis_unit;
$conn_unit->close();
}

function get_eselon_unit($kode_unit) {
	$db_unit = new db();
	$conn_unit = $db_unit->connect();
	$sql_namaunit = $conn_unit -> query("select * from unitkerja where unit_kode='".$kode_unit."'");
	$cek=$sql_namaunit->num_rows;
	if ($cek>0) {
		$eselon_unit='';
		$r=$sql_namaunit->fetch_object();
		$eselon_unit=$r->unit_eselon;
	}
	else {
		$eselon_unit='';
	}
	return $eselon_unit;
	$conn_unit->close();
}

function get_parent_unit($kode_unit) {
	//$kode_parent=substr($kode_unit,0,-1).'0';
	$db_unit = new db();
	$conn_unit = $db_unit->connect();
	$sql_namaunit = $conn_unit -> query("select * from unitkerja where unit_kode='".$kode_unit."'");
	$cek=$sql_namaunit->num_rows;
	if ($cek>0) {
			$nama_parent='';
		  $r=$sql_namaunit->fetch_object();
			$kode_parent=$r->unit_parent;
			$nama_parent=get_nama_unit($kode_parent);
	}
	else {
	 $nama_parent='';
	}
	return $nama_parent;
	$conn_unit->close();
	}

function get_parent_kode($kode_unit) {
		//$kode_parent=substr($kode_unit,0,-1).'0';
		$db_unit = new db();
		$conn_unit = $db_unit->connect();
		$sql_namaunit = $conn_unit -> query("select * from unitkerja where unit_kode='".$kode_unit."'");
		$cek=$sql_namaunit->num_rows;
		$kode_parent='';
		if ($cek>0) {
			$r=$sql_namaunit->fetch_object();
			$kode_parent=$r->unit_parent;
		}
		else {
		 $kode_parent='';
		}
		return $kode_parent;
		$conn_unit->close();
		}
function save_unitkerja($unit_kode,$unit_nama,$unit_parent,$unit_jenis,$unit_eselon) {
	$waktu_lokal=date("Y-m-d H:i:s");
	$created=$_SESSION['sesi_user_id'];
	$save_data=array("error"=>false);
	$db_unit = new db();
	$conn_unit = $db_unit->connect();
	$sql_unit= $conn_unit -> query("select * from unitkerja where unit_kode='$unit_kode'");
    $cek=$sql_unit -> num_rows;
    if ($cek>0) {
    	$save_data["error"]=true;
    	$save_data["pesan_error"]='ERROR : Kode Unit '.$unit_kode.' ('.$unit_nama.') sudah tersedia';
    }
    else {
    	$save_data["error"]=false;
    	if ($unit_parent==NULL) {
            $sql_unit_save = $conn_unit -> query("insert into unitkerja(unit_kode,unit_nama,unit_dibuat_oleh,unit_dibuat_waktu,unit_diupdate_oleh,unit_jenis,unit_eselon) values('$unit_kode','$unit_nama','$created','$waktu_lokal','$created','$unit_jenis','$unit_eselon')") or die(mysqli_error($conn_unit));
        }
        else {
             $sql_unit_save = $conn_unit -> query("insert into unitkerja(unit_kode,unit_nama,unit_parent,unit_dibuat_oleh,unit_dibuat_waktu,unit_diupdate_oleh,unit_jenis,unit_eselon) values('$unit_kode','$unit_nama','$unit_parent','$created','$waktu_lokal','$created','$unit_jenis','$unit_eselon')") or die(mysqli_error($conn_unit));
        }

        if ($sql_unit_save) { $save_data["pesan_error"]='SUCCESS : data unit berhasil disimpan'; }
        else { $save_data["pesan_error"]='ERROR : data tidak bisa disimpan'; }
    }
    return $save_data;
	$conn_unit->close();
}
function update_unitkerja($unit_kode,$unit_nama,$unit_parent,$unit_jenis,$unit_eselon) {
	$waktu_lokal=date("Y-m-d H:i:s");
	$created=$_SESSION['sesi_user_id'];
	$up_data=array("error"=>false);
	$db_unit = new db();
	$conn_unit = $db_unit->connect();
	$sql_unit= $conn_unit -> query("select * from unitkerja where unit_kode='$unit_kode'");
    $cek=$sql_unit -> num_rows;
    if ($cek>0) {
    	$up_data["error"]=false;
    	 if ($unit_parent==NULL) {
			$sql_unit_update = $conn_unit -> query("update unitkerja set unit_nama='$unit_nama',unit_diupdate_oleh='$created',unit_jenis='$unit_jenis', unit_eselon='$unit_eselon' where unit_kode='$unit_kode'") or die(mysqli_error($conn_unit));
		 }
		 else {
			 $sql_unit_update = $conn_unit -> query("update unitkerja set unit_nama='$unit_nama',unit_diupdate_oleh='$created',unit_jenis='$unit_jenis',unit_parent='$unit_parent',unit_eselon='$unit_eselon' where unit_kode='$unit_kode'") or die(mysqli_error($conn_unit));
		 }

        if ($sql_unit_update) { $up_data["pesan_error"]='SUCCESS : data unit berhasil diupdate'; }
        else { $up_data["pesan_error"]='ERROR : data tidak bisa diupdate'; }
    }
    else {
    	$up_data["error"]=true;
    	$up_data["pesan_error"]='ERROR : Kode Unit '.$unit_kode.' ('.$unit_nama.') tidak tersedia';
    }
    
    return $up_data;
	$conn_unit->close();
}
function list_unitkerja($unit_kode,$detil=false,$jenis=false,$eselon3=false) {
	//$jenis false = provinsi, $jenis true = kabkota
	//$eselon3 false = semua eselon 3 provinsi, $eselon3 true = semua eselon 3 provinsi
	$db_unit = new db();
	$conn_unit = $db_unit -> connect();
	if ($detil==true) {
		$sql_unit = $conn_unit -> query("select * from unitkerja left join (select unit_kode as parent_kode, unit_nama as parent_nama from unitkerja where unit_jenis='1' and SUBSTRING(unit_kode,5,1)=0 order by unit_kode asc) as unitparent on unitkerja.unit_parent=unitparent.parent_kode where unit_kode='$unit_kode'");
	}
	else {
		if ($jenis==false) {
			if ($eselon3==false) {
				$sql_unit = $conn_unit -> query("select * from unitkerja left join (select unit_kode as parent_kode, unit_nama as parent_nama from unitkerja where unit_jenis='1' and SUBSTRING(unit_kode,5,1)=0 order by unit_kode asc) as unitparent on unitkerja.unit_parent=unitparent.parent_kode where unit_jenis='1' order by unit_kode asc");
			}
			else {
				$sql_unit = $conn_unit -> query("select * from unitkerja left join (select unit_kode as parent_kode, unit_nama as parent_nama from unitkerja where unit_jenis='1' and SUBSTRING(unit_kode,5,1)=0 order by unit_kode asc) as unitparent on unitkerja.unit_parent=unitparent.parent_kode where unit_jenis='1' and SUBSTRING(unit_kode,5,1)=0 order by unit_kode asc");	
			}
		}
		else {
			$sql_unit = $conn_unit -> query("select * from unitkerja left join (select unit_kode as parent_kode, unit_nama as parent_nama from unitkerja where SUBSTRING(unit_kode,5,1)=0 order by unit_kode asc) as unitparent on unitkerja.unit_parent=unitparent.parent_kode where unit_jenis='2' order by unit_jenis,unit_kode asc");
		}
	}
	$cek_unit = $sql_unit->num_rows;
	$unitkerja_list=array("error"=>false);
	if ($cek_unit>0) {
		$unitkerja_list["error"]=false;
		$unitkerja_list["unit_total"]=$cek_unit;
		$i=1;
		while ($r=$sql_unit->fetch_object()) {
			$unitkerja_list["item"][$i]=array(
				"unit_kode"=>$r->unit_kode,
				"unit_nama"=>$r->unit_nama,
				"unit_parent"=>$r->unit_parent,
				"parent_nama"=>$r->parent_nama,
				"unit_jenis"=>$r->unit_jenis,
				"unit_dibuat_waktu"=>$r->unit_dibuat_waktu,
				"unit_dibuat_oleh"=>$r->unit_dibuat_oleh,
				"unit_diupdate_waktu"=>$r->unit_diupdate_waktu,
				"unit_diupdate_oleh"=>$r->unit_diupdate_oleh,
				"unit_eselon"=>$r->unit_eselon
			);
			$i++;
		}
	}
	else {
		$unitkerja_list["error"]=true;
		$unitkerja_list["pesan_error"]="data tidak tersedia";
	}
	return $unitkerja_list;
	$conn_unit->close();
}
?>
