<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Data Master Unit Kerja</h2>
	<ol class="breadcrumb">
	<li>
		<a href="index.php">Depan</a>
	</li>
	<li>
		<a href="<?php echo $url; ?>/master/">Master</a>
	</li>
	<li>
        <a href="<?php echo $url; ?>/master/unitkerja/">Unit Kerja</a>
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
                        <h5>Update data Unit Kerja</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <?php
                            if ($_POST['submit_unit']) {
                                $unit_kode = $_POST['unit_kode'];
                                $unit_nama = $_POST['unit_nama'];
                                $unit_parent = $_POST['unit_parent'];
                                $unit_jenis = $_POST['unit_jenis'];
                                $unit_eselon = $_POST['unit_eselon'];
                                if ($unit_parent=='') {
                                    $unit_parent=NULL;
                                }
                                $r_unit=update_unitkerja($unit_kode,$unit_nama,$unit_parent,$unit_jenis,$unit_eselon);
                                echo $r_unit["pesan_error"];
                            }
                            else {
                                echo 'ERORR';
                            }

                            ?>
                    </div>
                </div>
        </div>
        
    </div>
</div>
