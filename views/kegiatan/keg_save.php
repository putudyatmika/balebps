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
		<strong>Simpan Kegiatan</strong>
	</li>

	</ol>
	</div>
	<div class="col-lg-2">
        <?php if ($_SESSION['sesi_level'] > 2) { ?>
       <div class="title-action">
            <a href="<?php echo $url; ?>/kegiatan/add/" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        </div>
        <?php } ?>
	</div>
</div>
<div class="row wrapper wrapper-content animated fadeInRightBig tooltip-bps">
     <div class="row">
        <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Simpan Kegiatan</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <?php
                        if ($_POST['submit_keg']) {
                            $nama_kegiatan=trim($_POST['keg_nama']);
                            $keg_unitkerja=$_POST['keg_unitkerja'];
                            $keg_jenis=$_POST['keg_jenis'];
                            $keg_tglmulai=$_POST['keg_tglmulai'];
                            $keg_tglakhir=$_POST['keg_tglakhir'];
                            $keg_satuan=trim($_POST['keg_satuan']);
                            $keg_t=trim($_POST['keg_target']);
                            
                            $kabkota_target=$_POST['keg_kabkota'];
                            $kabkota_spj=$_POST['spj_kabkota'];
                            $keg_spj=$_POST['keg_spj'];
                            $r_save=save_kegiatan($nama_kegiatan,$keg_unitkerja,$keg_tglmulai,$keg_tglakhir,$keg_jenis,$keg_t,$keg_satuan,$keg_spj);

                            if ($r_save["error"]==false) {
                                //tampilkan pesan suksesnya
                                echo '<div class="alert alert-success">
                                        '.$r_save["pesan_error"].'
                                    </div>';
                                $keg_id=$r_save["keg_id"];
                                $r_bidang=list_unitkerja(0,false,true,false,0);
                                if ($r_bidang["error"]==false) {
                                    $bnyk_unit=$r_bidang["unit_total"];
                                    $target_spj=0;
                                    $target_kabkota=0;
                                    $unit_nama='';
                                    $keg_target=0;
                                    echo '<div class="alert alert-success">';
                                    for ($u=1;$u<=$bnyk_unit;$u++) {
                                        $target_kabkota=$kabkota_target[$r_bidang["item"][$u]["unit_kode"]];
                                        $target_spj=$kabkota_spj[$r_bidang["item"][$u]["unit_kode"]];
                                        $unit_nama=$r_bidang["item"][$u]["unit_nama"];

                                        if ($target_kabkota>0) {
                                            $keg_target=$target_kabkota;
                                        }
                                        else {
                                            $keg_target=0;
                                        }
                                        $s_kabkota=save_target_kabkota($keg_id,$r_bidang["item"][$u]["unit_kode"],$keg_target,$unit_nama);
                                        echo '<p>'.$s_kabkota["pesan_error"].'</p>';
                                        
                                        if ($target_spj>0) {
                                            $spj_target=$target_spj;
                                        }
                                        else {
                                            $spj_target=0;
                                        }
                                        
                                        if ($keg_spj==1) {
                                        $s_spj=save_target_spj($keg_id,$r_bidang["item"][$u]["unit_kode"],$spj_target,$unit_nama);
                                        echo '<p>'.$s_spj["pesan_error"].'</p>';
                                        }
                                        //echo 'Target Kabkota : '.$kabkota_target[$r_bidang["item"][$u]["unit_kode"]].'<br />';
                                        //echo 'Target SPJ : '.$kabkota_spj[$r_bidang["item"][$u]["unit_kode"]].'<br />';
                                    }
                                    echo '</div>';
                                }
                            }
                            else {
                                echo $r_save["pesan_error"];
                            }
                            
                        }
                        ?>
                        <a href="<?php echo $url; ?>/kegiatan/add/" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
                    </div>
                </div>
        </div>
    
        
    </div>    
</div>