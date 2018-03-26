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
        <strong>Update data</strong>
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
                        <h5>Update data user</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                      <?php
                        if ($_POST['submit_update']) {
                            $user_no = $_POST['user_no'];
                            $user_id = $_POST['user_id'];
                            $user_nama = $_POST['user_nama'];
                            $user_email = $_POST['user_email'];
                            $user_passwd = $_POST['user_passwd'];
                            $user_passwd2 = $_POST['user_passwd2'];
                            $user_unitkerja = $_POST['user_unitkerja'];
                            $user_status = $_POST['user_status'];
                            $user_level = $_POST['user_level'];
                            //$waktu_lokal=date("Y-m-d H:i:s");
                            if ($user_passwd=='' or $user_passwd2==''){
                                $pass_md5='';
                            }
                            elseif ($user_passwd != $user_passwd2) {
                                $pass_md5='';
                            }
                            else {
                               $pass_md5=gen_passwd($user_passwd);
                            }
                            

                            //$tipe_nama= strtoupper(strtolower($tipe_nama));
                            //$tipe_kode= strtoupper(strtolower($tipe_kode));

                            //$created=$_SESSION['sesi_user_id'];
                            $r_update=update_user_id($user_no,$user_id,$user_nama,$user_email,$pass_md5,$user_unitkerja,$user_status,$user_level);
                            echo $r_update["pesan_error"];                          
                        }
                        else {
                            echo 'ERORR';
                        }

                        ?>
                        <a href="<?php echo $url.'/'.$page.'/'.$act; ?>/users/" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
                    </div>
                </div>
        </div>
        
    </div>
</div>
