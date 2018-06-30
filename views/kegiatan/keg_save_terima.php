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
		<strong>Simpan konfirmasi penerimaan</strong>
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
                        <h5>Simpan konfirmasi penerimaan</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <?php
                        if ($_POST['submit_keg']) {
                            $keg_id=$_POST['keg_id'];
                            $keg_d_unitkerja=$_POST['keg_d_unitkerja'];
                            $keg_d_tgl=$_POST['keg_d_tgl'];
                            $keg_d_jumlah=$_POST['keg_d_jumlah'];
                            $keg_d_target = $_POST['keg_d_target'];
                            $keg_d_target_sudah = $_POST['keg_d_target_sudah'];

                            if ($keg_d_tgl=='' or $keg_d_jumlah=='') {
                                echo '<div class="alert alert-danger">isian tanggal penerimaan atau isian jumlah yang diterima tidak boleh kosong</div>';
                            }
                            else {
                                $r_save_kirim=save_konfirmasi_penerimaan($keg_id,$keg_d_unitkerja,$keg_d_tgl,$keg_d_jumlah);
                                if ($r_save_kirim["error"]==false) {
                                    //sukses
                                    echo '<div class="alert alert-success">'. $r_save_kirim["pesan_error"].'</div>';
                                    if ($r_save_kirim["error_nilai"]==false) {
                                        //sukses update nilai
                                        echo '<div class="alert alert-success">'. $r_save_kirim["pesan_error_nilai"].'</div>';
                                    }
                                    else {
                                        //error update nilai
                                        echo '<div class="alert alert-danger">'. $r_save_kirim["pesan_error_nilai"].'</div>';

                                    }
                                }
                                else {
                                    //error simpan konfirmasi
                                    echo '<div class="alert alert-danger">'. $r_save_kirim["pesan_error"].'</div>';
                                }
                            }
                           
                        }
                        ?>
                        <a href="<?php echo $url.'/kegiatan/view/'.$keg_id; ?>" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
                    </div>
                </div>
        </div>
    
        
    </div>    
</div>