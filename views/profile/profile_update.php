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
                        <h5>Update data profile</h5>
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
                            $user_nama = $_POST['user_nama'];
                            $user_email = $_POST['user_email'];
                                                       
                            //$waktu_lokal=date("Y-m-d H:i:s");
                                                       
                            $r_update=update_profile($user_no,$user_nama,$user_email);
                            echo $r_update["pesan_error"];                          
                        }
                        else {
                            echo 'ERORR';
                        }

                        ?>
                        <a href="<?php echo $url.'/'.$page; ?>" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
                    </div>
                </div>
        </div>
        
    </div>
</div>
