<?php
function get_idnama_users($user_id) {
	//(user_id) user_nama
	$db_users = new db();
	$conn_users = $db_users->connect();
	$sql_users = $conn_users -> query("select * from users where user_id='".$user_id."'");
	$cek=$sql_users->num_rows;
	if ($cek>0) {
	   $nama_user='';
	   $r=$sql_users->fetch_object();
	   $nama_user='('.$r->user_id.') '. $r->user_nama;
	}
	else {
	 $nama_user='';
	}
	return $nama_user;
	$conn_users->close();
	}

function get_email_users($user_id) {
	//(user_id) user_nama
	$db_users = new db();
	$conn_users = $db_users->connect();
	$sql_users = $conn_users -> query("select * from users where user_id='".$user_id."'");
	$cek=$sql_users->num_rows;
	if ($cek>0) {
	   $email_user='';
	   $r=$sql_users->fetch_object();
	   $email_user=$r->user_email;
	}
	else {
	 $email_user='';
	}
	return $email_user;
	$conn_users->close();
	}

function gen_passwd($passwd_ori) {
	global $pengacak;
	$passwd_md5=md5($pengacak.'('.$passwd_ori.')'.$pengacak);
  return $passwd_md5;
}

function cek_users_login($user_id,$user_passwd) {
	global $ip;
	$db = new db();
	$conn = $db->connect();
	$pass_md5=gen_passwd($user_passwd);
	$sql_cek = $conn -> query("select * from users where user_id='$user_id' and user_passwd='$pass_md5'");
	$cek=$sql_cek->num_rows;
	$r_login=array("error"=>false);
	if ($cek>0) {
		//berhasil login
		$waktu_lokal=date("Y-m-d H:i:s");
		$r=$sql_cek->fetch_object();
		if ($r->user_status==1) {
			//berhasil login dan aktif
			$sql_update_login=$conn -> query("update users set user_lastip='$ip', user_lastlogin='$waktu_lokal' where user_id='$user_id'");
			$r_login["error"]=false;
			$r_login["user_id"]=$user_id;
			$r_login["user_passwd"]=$user_passwd;
			$r_login["user_passwd_md5"]=$pass_md5;
			$r_login["user_no"]=$r->user_no;
			$r_login["user_nama"]=$r->user_nama;
			$r_login["user_level"]=$r->user_level;
			$r_login["user_unitkerja"]=$r->user_unitkerja;
			$r_login["user_provkab"]=get_jenis_unit($r->user_unitkerja);
			$r_login["pesan_error"]="Selamat Datang <b>".$r->user_nama."</b>";
		}
		else {
			//id user belum aktif
			$r_login["error"]=true;
			$r_login["pesan_error"]='User ID <strong>'.$user_id.'</strong> belum aktif.<br /> Hubungi Admin Provinsi';
		}
	}
	else {
		//tidak berhasil login
		$r_login["error"]=true;
		$r_login["pesan_error"]="Username/Password salah!";
	}
	return $r_login;
	$db->close();
}
function save_user_id($user_id,$user_nama,$user_email,$pass_md5,$user_unitkerja,$user_status,$user_level) {
	$waktu_lokal=date("Y-m-d H:i:s");
    $created=$_SESSION['sesi_user_id'];
	
	$db_users = new db();
	$conn_users = $db_users -> connect();
	$sql_save_user = $conn_users -> query("insert into users(user_id, user_nama, user_email, user_passwd, user_unitkerja, user_dibuat_oleh, user_dibuat_waktu, user_diupdate_oleh, user_diupdate_waktu, user_status, user_level) values('$user_id', '$user_nama', '$user_email', '$pass_md5', '$user_unitkerja', '$created', '$waktu_lokal', '$created', '$waktu_lokal', '$user_status', '$user_level')") or die(mysqli_error($conn_users));
	$r_save=array("error"=>false);
	if ($sql_save_user) {
		//berhasil di simpan
		$r_save["error"]=false;
		$r_save["pesan_error"]='<div class="alert alert-success"><strong>(SUCCESS)</strong> : Username '.$user_id.' berhasil di simpan</div>';
	}
	else {
		//gagal disimpan
		$r_save["error"]=true;
		$r_save["pesan_error"]='<div class="alert alert-danger"><strong>(ERROR)</strong> : gagal menyimpan data</div>';
	}
	return $r_save;
	$conn_users->close();
}
function cek_user_no($user_no) {
	$db = new db();
	$conn = $db->connect();
	$sql_cek = $conn -> query("select * from users where user_no='$user_no'");
	$cek=$sql_cek->num_rows;
	$r_login=array("error"=>false);
	if ($cek>0) {
		$r_login["error"]=false;
		$r_login["pesan_error"]="User No $user_no ada";
	}
	else {
		//tidak berhasil login
		$r_login["error"]=true;
		$r_login["pesan_error"]="Username tidak tersedia";
	}
	return $r_login;
	$db->close();
}
function update_user_id($user_no,$user_id,$user_nama,$user_email,$pass_md5,$user_unitkerja,$user_status,$user_level) {
	$waktu_lokal=date("Y-m-d H:i:s");
    $created=$_SESSION['sesi_user_id'];

	$db_users = new db();
	$conn_users = $db_users -> connect();
	$sql_cek_user = $conn_users -> query("select * from users where user_no='$user_no'") or die(mysqli_error($conn_users));
	$cek = $sql_cek_user -> num_rows;
	$r_update = array("error"=>false);
	if ($cek>0) {
		$r_update["error"]=false;
		//update sql
		if ($pass_md5=='') {
			$sql_save_user = $conn_users -> query("update users set user_id='$user_id',user_nama='$user_nama',user_email='$user_email',user_diupdate_oleh='$created',user_unitkerja='$user_unitkerja',user_status='$user_status',user_diupdate_waktu='$waktu_lokal',user_level='$user_level' where user_no='$user_no'") or die(mysqli_error($conn_users));
		}
		else {
			$sql_save_user = $conn_users -> query("update users set user_id='$user_id',user_nama='$user_nama',user_email='$user_email',user_diupdate_oleh='$created',user_unitkerja='$user_unitkerja',user_status='$user_status',user_diupdate_waktu='$waktu_lokal',user_level='$user_level',user_passwd='$pass_md5' where user_no='$user_no'") or die(mysqli_error($conn_users));
		}
		
		if ($sql_save_user) {
			//berhasil di update
			$r_update["error"]=false;
			$r_update["pesan_error"]='<div class="alert alert-success"><strong>(SUCCESS)</strong> : berhasil untuk melakukan update</div>';
		}
		else {
			//error di update
			$r_update["error"]=true;
			$r_update["pesan_error"]='<div class="alert alert-danger"><strong>(ERROR)</strong : Gagal untuk melakukan update</div>';
		}
	}
	else {
		//error user tidak ada
		$r_update["error"]=true;
		$r_update["pesan_error"]='<div class="alert alert-success"><strong>(ERROR)</strong : User No '.$user_no.' tidak tersedia</div>';
	}
	return $r_update;
	$conn_users->close();
}
function hapus_user_no($user_no) {
	$db_users = new db();
	$conn_users = $db_users -> connect();
	$sql_cek_user = $conn_users -> query("select * from users where user_no='$user_no'") or die(mysqli_error($conn_users));
	$cek = $sql_cek_user -> num_rows;
	$r_update = array("error"=>false);
	if ($cek>0) {
		$r_update["error"]=false;
		$r=$sql_cek_user->fetch_object();
		//update sql
		$sql_hapus_user = $conn_users -> query("delete from users where user_no='$user_no'") or die(mysqli_error($conn_users));

		if ($sql_hapus_user) {
			//berhasil di update
			$r_update["error"]=false;
			$r_update["pesan_error"]='<div class="alert alert-success"><strong>(SUCCESS)</strong> : Username <strong>('.$r->user_id.') '.$r->user_nama.'</strong> berhasil untuk melakukan update</div>';
		}
		else {
			//error di update
			$r_update["error"]=true;
			$r_update["pesan_error"]='<div class="alert alert-danger"><strong>(ERROR)</strong : Username <strong>('.$r->user_id.') '.$r->user_nama.'</strong>  Gagal untuk dihapus</div>';
		}
	}
	else {
		//error user tidak ada
		$r_update["error"]=true;
		$r_update["pesan_error"]='<div class="alert alert-success"><strong>(ERROR)</strong : User No <strong>'.$user_no.'</strong> tidak tersedia</div>';
	}
	return $r_update;
	$conn_users->close();
}
function cek_user_id($user_id) {
	$db = new db();
	$conn = $db->connect();
	$sql_cek = $conn -> query("select * from users where user_id='$user_id'");
	$cek=$sql_cek->num_rows;
	$r_login=array("error"=>false);
	if ($cek>0) {
		$r_login["error"]=true;
		$r_login["pesan_error"]="Username $user_id tidak tersedia";
	}
	else {
		//tidak berhasil login
		$r_login["error"]=false;
		$r_login["pesan_error"]="Username tersedia";
	}
	return $r_login;
	$db->close();
}
function list_users($user_no,$detil=false) {
	$db_users = new db();
	$conn_users = $db_users -> connect();
	if ($detil==true) {
		$sql_users = $conn_users -> query("select users.*, unitkerja.unit_nama,unitkerja.unit_jenis from users left join unitkerja on users.user_unitkerja=unitkerja.unit_kode where user_no='".$user_no."'");
	}
	else {
		$sql_users = $conn_users -> query("select users.*, unitkerja.unit_nama,unitkerja.unit_jenis from users left join unitkerja on users.user_unitkerja=unitkerja.unit_kode order by users.user_unitkerja asc, users.user_lastlogin desc");
	}
	$cek_users = $sql_users->num_rows;
	$users_list=array("error"=>false);
	if ($cek_users>0) {
		$users_list["error"]=false;
		$users_list["user_total"]=$cek_users;
		$i=1;
		while ($r=$sql_users->fetch_object()) {
			$users_list["item"][$i]=array(
				"user_no"=>$r->user_no,
				"user_id"=>$r->user_id,
				"user_nama"=>$r->user_nama,
				"user_passwd"=>$r->user_passwd,
				"user_email"=>$r->user_email,
				"user_unitkerja"=>$r->user_unitkerja,
				"user_dibuat_waktu"=>$r->user_dibuat_waktu,
				"user_dibuat_oleh"=>$r->user_dibuat_oleh,
				"user_lastlogin"=>$r->user_lastlogin,
				"user_lastip"=>$r->user_lastip,
				"user_status"=>$r->user_status,
				"user_diupdate_waktu"=>$r->user_diupdate_waktu,
				"user_diupdate_oleh"=>$r->user_diupdate_oleh,
				"user_level"=>$r->user_level,
				"unit_nama"=>$r->unit_nama,
				"unit_jenis"=>$r->unit_jenis
			);
			$i++;
		}
	}
	else {
		$users_list["error"]=true;
		$users_list["pesan_error"]="Data user tidak tersedia";
	}
	return $users_list;
	$conn_users->close();
}
?>
