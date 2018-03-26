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
        <strong>Simpan data</strong>
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
                        <h5>Simpan data user</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                      <?php
                        if ($_POST['submit_save']) {
                            $user_id = $_POST['user_id'];
                            $user_nama = $_POST['user_nama'];
                            $user_email = $_POST['user_email'];
                            $user_passwd = $_POST['user_passwd'];
                            $user_passwd2 = $_POST['user_passwd2'];
                            $user_unitkerja = $_POST['user_unitkerja'];
                            $user_status = $_POST['user_status'];
                            $user_level = $_POST['user_level'];
                            //$waktu_lokal=date("Y-m-d H:i:s");
                            $pass_md5=gen_passwd($user_passwd);

                            //$tipe_nama= strtoupper(strtolower($tipe_nama));
                            //$tipe_kode= strtoupper(strtolower($tipe_kode));

                            //$created=$_SESSION['sesi_user_id'];
                            $r_cek=cek_user_id($user_id);
                            if ($r_cek["error"]==false) {
                                //user_id bisa digunakan
                                $r_save=save_user_id($user_id,$user_nama,$user_email,$pass_md5,$user_unitkerja,$user_status,$user_level);
                                echo $r_save["pesan_error"];
                            }
                            else {
                                //user_id sudah diambil dan tidak bisa disave
                                echo $r_cek["pesan_error"];
                            }
                           
                        }
                        else {
                            echo 'ERORR';
                        }

                        ?>
                        <p><a href="<?php echo $url.'/'.$page.'/'.$act; ?>/add/" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a></p>
                    </div>
                </div>
        </div>
        
    </div>
</div>
