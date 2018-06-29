<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Data Master Users</h2>
	<ol class="breadcrumb">
	<li>
		<a href="index.php">Depan</a>
	</li>
	<li>
		<a href="<?php echo $url; ?>/master/">Master</a>
	</li>
	<li>
        <a href="<?php echo $url; ?>/master/users/">Users</a>
    </li>
    <li class="active">
        <strong>View data users</strong>
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
                        <h5>View data user</h5>
                        
                    </div>
                    <div class="ibox-content">
                    <?php
                        $user_no=$lvl4;
                        $r_user=list_users($user_no,true);
                        if ($r_user["error"]==false) { 
                            
                            $nama_user_buat=get_idnama_users($r_user["item"][1]["user_dibuat_oleh"]);
                            $nama_user_update=get_idnama_users($r_user["item"][1]["user_diupdate_oleh"]);
                            $dibuat_tgl=tgl_convert_waktu(1,$r_user["item"][1]["user_dibuat_waktu"]);
                            $diupdate_tgl=tgl_convert_waktu(1,$r_user["item"][1]["user_diupdate_waktu"]);
                                
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
                                        <dt>#</dt>
                                        <dd><?php echo $r_user["item"][1]["user_no"];?></dd>
                                        <dt>User ID</dt>
                                        <dd><?php echo $r_user["item"][1]["user_id"];?></dd>
                                        <dt>Password</dt>
                                        <dd><?php echo $r_user["item"][1]["user_passwd"];?></dd>
                                        <dt>Email</dt>
                                        <dd><?php echo $r_user["item"][1]["user_email"];?></dd>
                                        <dt>Last Login</dt>
                                        <dd><?php echo tgl_convert_waktu(1,$r_user["item"][1]["user_lastlogin"]);?></dd>
                                        <dt>Last IP</dt>
                                        <dd><?php echo $r_user["item"][1]["user_lastip"];?></dd>
                                        <dt>Level</dt>
                                        <dd><?php echo $lvl_user[$r_user["item"][1]["user_level"]];?></dd>
                                        <dt>Status</dt>
                                        <dd><?php echo $status_umum[$r_user["item"][1]["user_status"]];?></dd>
                                        <dt>Dibuat Oleh</dt>
                                        <dd><?php echo $nama_user_buat;?></dd>
                                        <dt>Dibuat tanggal</dt>
                                        <dd><?php echo $dibuat_tgl;?></dd>
                                        <dt>Diupdate Oleh</dt>
                                        <dd><?php echo $nama_user_update;?></dd>
                                        <dt>Diupdate tanggal</dt>
                                        <dd><?php echo $diupdate_tgl;?></dd>
                                    </dl>
                                    <div class="row">
                                    <div class="container">
                                    <?php
                                    echo '
                                    <a href="'.$url.'/'.$page.'/'.$act.'/edit/'.$user_no.'" class="btn btn-success"><i class="fa fa-pencil fa-lg"></i></a>
                                    <a href="'.$url.'/'.$page.'/'.$act.'/delete/'.$user_no.'" class="btn btn-danger" data-confirm="Apakah data ('.$r_user["item"][1]["user_id"].') '.$r_user["item"][1]["user_nama"].' ini akan di hapus?"><i class="fa fa-trash fa-lg"></i></a>';
                                    ?>
                                    </div>
                                    </div>
                            </div>

                        <?php
                        }
                        else {
                            echo 'Data users tidak ditemukan';
                        }
                        ?>
                    </div>
                </div>
            </div>
                
    </div>
</div>
