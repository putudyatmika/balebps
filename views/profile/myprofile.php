<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Data Master Users</h2>
	<ol class="breadcrumb">
	<li>
		<a href="index.php">Depan</a>
	</li>
	<li class="active">
        <strong>Profile Saya</strong>
    </li>
	</ol>
	</div>
	<div class="col-lg-2">

	</div>
</div>
<div class="row wrapper wrapper-content animated fadeInRight">
	 <div class="row">
                <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Profile Saya</h5>
                        
                    </div>
                    <div class="ibox-content">
                    <?php
                        $user_no=$_SESSION["sesi_user_no"];
                        $r_user=list_users($user_no,true);
                        if ($r_user["error"]==false) { 
                            
                            
                            $nama_user_buat=get_idnama_users($r_user["item"][1]["user_dibuat_oleh"]);
                            $nama_user_update=get_idnama_users($r_user["item"][1]["user_diupdate_oleh"]);
                            $dibuat_tgl=tgl_convert_waktu(1,$r_user["item"][1]["user_dibuat_waktu"]);
                           /*
                            $dibuat_tgl=tgl_convert_waktu(1,$r_user["item"][1]["user_dibuat_waktu"]);
                            $diupdate_tgl=tgl_convert_waktu(1,$r_user["item"][1]["user_diupdate_waktu"]);
                            */
                            if ($r_user["item"][1]["user_lastlogin"]=='0000-00-00 00:00:00' or $r_user["item"][1]["user_lastlogin"]=='') {
                                $lastlog_user='<span class="label label-danger">Belum pernah login</span>';
                            }
                            else {
                                $lastlog_user=tgl_convert_waktu_pendek(1,$r_user["item"][1]["user_lastlogin"]);
                            } 

                            if ($r_user["item"][1]["user_dibuat_waktu"]=='0000-00-00 00:00:00' or $r_user["item"][1]["user_diupdate_waktu"]=='') {
                                $tgl_update='<span class="label label-danger">Belum pernah diupdate</span>';
                            }
                            else {
                                $tgl_update=tgl_convert_waktu_pendek(1,$r_user["item"][1]["user_diupdate_waktu"]);
                            } 
                            ?>
                            <div class="row">
                            <div class="col-md-6">
                                   <h2 class="no-margins">
                                   <?php echo $r_user["item"][1]["user_nama"];?>
                                </h2>
                                <h4><?php echo $r_user["item"][1]["unit_nama"]; ?></h4>
                               
                            </div>
                            </div>
                            <div class="alert alert-info" role="alert">
                                    <dl class="dl-horizontal">
                                        <dt>User ID</dt>
                                        <dd><?php echo $r_user["item"][1]["user_id"];?></dd>
                                        <dt>Password</dt>
                                        <dd><?php echo $r_user["item"][1]["user_passwd"];?></dd>
                                        <dt>Email</dt>
                                        <dd><?php echo $r_user["item"][1]["user_email"];?></dd>
                                        <dt>Unitkerja</dt>
                                        <dd><?php echo '['.$r_user["item"][1]["user_unitkerja"].'] '.$r_user["item"][1]["unit_nama"];?></dd>
                                        <dt>Level</dt>
                                        <dd><?php echo $lvl_user[$r_user["item"][1]["user_level"]];?></dd>
                                        <dt>Status</dt>
                                        <dd><?php echo $status_umum[$r_user["item"][1]["user_status"]];?></dd>
                                        <dt>Register tanggal</dt>
                                        <dd><?php echo $dibuat_tgl;?></dd>
                                        <dt>Terakhir update</dt>
                                        <dd><?php echo $tgl_update;?></dd>
                                        <dt>Terakhir login</dt>
                                        <dd><?php echo tgl_convert_waktu(1,$r_user["item"][1]["user_lastlogin"]);?></dd>
                                        <dt>Dari IP</dt>
                                        <dd><?php echo $r_user["item"][1]["user_lastip"];?></dd>
                                    </dl>
                                    <div class="row">
                                    <div class="container">
                                    <?php
                                    echo '
                                    <a href="'.$url.'/'.$page.'/edit/" class="btn btn-success"><i class="fa fa-pencil fa-lg"></i></a>';
                                    ?>
                                    </div>
                                    </div>
                            </div>
                        <?php
                        }
                        else {
                            echo 'Data pegawai tidak ditemukan';
                        }
                        ?>
                    </div>
                </div>
            </div>
                
    </div>
</div>
