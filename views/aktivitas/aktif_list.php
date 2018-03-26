<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Aktivitas Harian Pegawai</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url; ?>">Depan</a>
	</li>
	<li class="active">
		<strong>Aktivitas</strong>
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
        <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Semua Kegiatan</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                     <div class="table-responsive">
                            <table class="table table-striped table-hover dataPegawaiPNS" >
                            <thead>
                            <tr class="bg-success p-md">
                                <th class="text-center" width="3%">No</th>
                                <th class="text-center">Pegawai</th>
                                <th class="text-center">Jabatan</th>
                                <th class="text-center">Hari/Tanggal</th>
                                <th class="text-center">Jam</th>
                                <th class="text-center">Kegiatan</th>
                                <th class="text-center">Target</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $aktif_unitkerja=$_SESSION['sesi_peg_unitkerja'];
                            $r_aktif=list_aktivitas_unitkerja($aktif_unitkerja,0,false);
                            if ($r_aktif["error"]==false) {
                                $bnyk_aktif=$r_aktif["aktif_total"];
                                for ($i=1;$i<=$bnyk_aktif;$i++) {
                                    echo '
                                    <tr>    
                                        <td>'.$i.'</td>
                                        <td>'.$r_aktif["item"][$i]["peg_nama"].'</td>
                                        <td>'.$JenisJabatan[$r_aktif["item"][$i]["peg_jabatan"]].' '.$r_aktif["item"][$i]["unit_nama"].'</td>
                                        <td>'.$r_aktif["item"][$i]["aktif_tgl"].'</td>
                                        <td>'.date("H:i",strtotime($r_aktif["item"][$i]["aktif_awal"])).' - '.date("H:i",strtotime($r_aktif["item"][$i]["aktif_akhir"])).'</td>
                                        <td>'.$r_aktif["item"][$i]["m_redaksi"].'</td>
                                        <td>'.$r_aktif["item"][$i]["aktif_target"].' '.$r_aktif["item"][$i]["aktif_satuan"].'</td>
                                        <td></td>
                                    </tr>
                                    ';
                                }
                            }
                            else {

                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="text-center" width="3%">No</th>
                                <th class="text-center">Pegawai</th>
                                <th class="text-center">Jabatan</th>
                                <th class="text-center">Hari/Tanggal</th>
                                <th class="text-center">Jam</th>
                                <th class="text-center">Kegiatan</th>
                                <th class="text-center">Target</th>
                                <th>&nbsp;</th>
                            </tr>
                            </tfoot>
                            </table>
                        </div> 
                    </div>
                </div>
        </div>
    </div>
</div>