<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Data Master Aktivitas</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url; ?>">Depan</a>
	</li>
	<li>
		<a href="<?php echo $url; ?>/master/">Master</a>
	</li>
	<li>
        <a href="<?php echo $url; ?>/master/aktivitas/">Aktivitas</a>
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
                <h5>Simpan data redaksi</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
               <?php
                if ($_POST['submit_redaksi']) {
                    $kata_redaksi =$_POST['kata_redaksi'];
                    $sql_in_redaksi=simpan_redaksi($kata_redaksi);
                    if ($sql_in_redaksi) {
                        echo 'Data Redaksi berhasil di simpan';
                    }
                    else {
                        echo 'Data redaksi tidak bisa disimpan';
                    }
                }
                else {
                    echo 'Error';
                }
                ?>
            </div>
        </div>
        </div>
    </div>
</div>
