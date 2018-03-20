
<div class="row">
    <div class="col-lg-2">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-success pull-right">Tahunan</span>
                <h5>Jumlah Kegiatan</h5>
            </div>
            <div class="ibox-content">
                <?php
                    $r_keg_tahun=jumlah_kegiatan_tahunan($tahun_keg,false);
                    if ($r_keg_tahun["error"]==false) {
                        $jumlah_keg_tahun_ini=$r_keg_tahun["item"][2]["keg_jumlah"];
                        $keg_naik=(($r_keg_tahun["item"][2]["keg_jumlah"]-$r_keg_tahun["item"][1]["keg_jumlah"])/$r_keg_tahun["item"][1]["keg_jumlah"])*100;
                        $keg_naik=number_format($keg_naik,2,",",".");
                        echo '
                            <h1 class="no-margins">'.$r_keg_tahun["item"][2]["keg_jumlah"].'</h1> 
                            <div class="stat-percent font-bold text-navy">'.$keg_naik.'% <i class="fa fa-level-up"></i></div>
                            <small>Tahun '.$r_keg_tahun["item"][2]["keg_tahun"].'</small>
                        ';
                    }
                    else {
                        echo $r_keg_tahun["pesan_error"];
                    }
                ?>
               
            </div>
        </div>
    </div>
    <?php
    $r_terima=jumlah_keg_terima_kirim($tahun_keg);
    ?>
    <div class="col-lg-2">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-info pull-right">Tahun <?php echo $tahun_keg;?></span>
                <h5>Pengiriman</h5>
            </div>
            <div class="ibox-content">
                <?php 
                if ($r_terima["error"]==false) {
                    echo '
                     <h1 class="no-margins">'.$r_terima["item"][1]["keg_jumlah"].'</h1>
                <small>Kegiatan</small>
                    ';
                }
                else {
                    echo $r_terima["pesan_error"];
                }
                ?>
               
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-primary pull-right">Tahun <?php echo $tahun_keg;?></span>
                <h5>Penerimaan</h5>
            </div>
            <div class="ibox-content">
                <?php 
                if ($r_terima["error"]==false) {
                    echo '
                     <h1 class="no-margins">'.$r_terima["item"][2]["keg_jumlah"].'</h1>
                <small>Kegiatan</small>
                    ';
                }
                else {
                    echo $r_terima["pesan_error"];
                }
                ?>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-danger pull-right">Tahun 2018</span>
                <h5>Unit Kerja terbanyak kegiatan</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-1 col-xs-2">
                        <i class="fa fa-trophy fa-4x"></i>
                    </div>
                    <div class="col-lg-11 col-xs-10">
                <?php
                $r_seksi=seksi_terbanyak_kegiatan($tahun_keg);
                if ($r_seksi["error"]==false) {
                    if ($jumlah_keg_tahun_ini>0) {
                        $persen_seksi=($r_seksi["item"][1]["keg_jumlah"]/$jumlah_keg_tahun_ini)*100;
                        $persen_seksi=number_format($persen_seksi,2,",",".");
                    }
                    else {
                        $persen_seksi=0;
                    }
                    echo '
                        <h1 class="no-margins">'.$r_seksi["item"][1]["keg_unitnama"].'</h1>
                        <div class="stat-percent font-bold text-navy">'.$persen_seksi.'% <i class="fa fa-level-up"></i> dari '.$jumlah_keg_tahun_ini.' kegiatan</div>
                        <small>'.$r_seksi["item"][1]["keg_jumlah"].' Kegiatan</small>
                    ';
                }
                else {
                    echo $r_seksi["pesan_error"];
                }
                ?>
            </div>
               </div>
            </div>
        </div>
    </div>
</div>