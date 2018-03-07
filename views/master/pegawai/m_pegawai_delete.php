<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Data Master Pegawai</h2>
	<ol class="breadcrumb">
	<li>
		<a href="index.php">Depan</a>
	</li>
	<li>
		<a href="<?php echo $url; ?>/master/">Master</a>
	</li>
	<li>
        <a href="<?php echo $url; ?>/master/pegawai/">Pegawai</a>
    </li>
    <li class="active">
        <strong>Hapus data pegawai</strong>
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
                        <h5>Update data pegawai</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                     <?php
                      $peg_no=$lvl4;
                        if (cek_pegawai_no($peg_no)==false) {
                        echo 'Pegawai ID tidak ada';
                      }
                      else {
                        $r_peg=list_pegawai($peg_no,true);
                        $peg_nama=$r_peg["item"][1]["peg_nama"];
                        $hapus_peg=hapus_pegawai_absen($peg_no);
                        if ($hapus_peg) { echo 'Pegawai an. <strong>'.$peg_nama.'</strong> berhasil di hapus'; }
                        else { echo 'Error menghapus data pegawai'; }
                      }
                    ?>
                    </div>
                </div>
        </div>
        
    </div>
</div>
