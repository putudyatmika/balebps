<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Kegiatan</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url; ?>">Depan</a>
	</li>
    <li>
        <a href="<?php echo $url; ?>/kegiatan/">Kegiatan</a>
    </li>
	<li class="active">
		<strong>View Data</strong>
	</li>

	</ol>
	</div>
	<div class="col-lg-2">
       <div class="title-action">
            <a href="<?php echo $url; ?>/aktivitas/add/" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        </div>
	</div>
</div>
<div class="row wrapper wrapper-content animated fadeInRightBig">
    <div class="row">
        <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>View Kegiatan</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <?php
                    $keg_id=$lvl3;
                    $r_keg=list_kegiatan($keg_id,true,false,0,0);
                    if ($r_keg["error"]==false) {
                        $keg_total=$r_keg["keg_total"];
                        echo ' <h2>'.$r_keg["item"][1]["keg_nama"].'</h2>';
                    }
                    else {

                    }
                    ?>
                    
                    </div>
                </div>
        </div>
        <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Rekap BPS Kabupaten/Kota</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                       
                    </div>
                </div>
        </div>
    </div>
</div>