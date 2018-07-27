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
		<strong>Hapus konfirmasi pengiriman</strong>
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
                        <h5>Hapus konfirmasi pengiriman</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <?php
                        $detil_id=$lvl4;
                        $keg_id=$lvl3;
                        $r_detil=view_keg_detil($detil_id);
                        $update_nilai=false;
                        if ($r_detil["error"]==false) {
                            //$keg_id=$r_detil["item"][1]["keg_id"];
                            if ($_SESSION['sesi_level'] > 1) {
                                //operator dan admin
                                if ($_SESSION['sesi_level'] > 3) {
                                    //jika admin atau superadmin
                                    $r_hapusdetil=hapus_keg_detil($detil_id);
                                    if ($r_hapusdetil["error"]==false) {
                                        //berhasil di hapus
                                        echo '<div class="alert alert-success">
                                        '.$r_hapusdetil["pesan_error"].'
                                         </div>';
                                    }
                                    else {
                                        //error hapus
                                        echo '<div class="alert alert-danger">
                                        '.$r_hapusdetil["pesan_error"].'
                                         </div>';
                                    }
                                }
                                else {
                                    //operator
                                    if ($_SESSION['sesi_level']==2) {
                                        //jika operator kabkota
                                        if ($r_detil["item"][1]["detil_jenis"]==1) {
                                            //hapus pengiriman
                                            if ($r_detil["item"][1]["detil_unitkerja"]==$_SESSION['sesi_unitkerja']) {
                                                //delete detil oleh operator kab/kota
                                            }
                                            else {
                                                //error hapus
                                                echo '<div class="alert alert-danger">User tidak mempunyai hak akses untuk menghapus</div>';
                                            }
                                        }
                                        else {
                                            //error operator kabupaten tidak boleh hapus penerimaan
                                            echo '<div class="alert alert-danger">User tidak mempunyai hak akses untuk menghapus penerimaan</div>';
                                        }
                                        
                                    }
                                    else if ($_SESSION['sesi_level']==3) {
                                        //operator provinsi
                                        $r_keg=list_kegiatan($keg_id,true,false,0,0); //hanya 1 kegiatan saja
                                        if ($r_keg["item"][1]["keg_unitkerja"]==$_SESSION['sesi_unitkerja']) {

                                        }
                                        else {
                                            //sama2 operator provinsi tapi unit kerja yg lain
                                            //error hapus
                                            echo '<div class="alert alert-danger">User tidak mempunyai hak akses untuk menghapus</div>';
                                        }
                                    }
                                    
                                }

                            }
                            else {
                                //level user pemantau dan operator kabkota tidak bisa mengakses menu ini
                                echo '<div class="alert alert-danger">Level user anda tidak bisa melakukan aksi ini
                                </div>';
                            }
                        }
                        else {
                            //error
                            echo '<div class="alert alert-danger">
                                        '.$r_detil["pesan_error"].'
                                    </div>';
                        }
                        
                        ?>
                        <a href="<?php echo $url.'/kegiatan/view/'.$keg_id; ?>" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
                    </div>
                </div>
        </div>
    
        
    </div>    
</div>