<?php
$bulan_keg=date('n');
$tahun_keg=date('Y');
?>
<div class="wrapper wrapper-content">
	<?php include 'views/utama/depan_widget.php'; ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right"></span>
                    <h5>Kegiatan Mendekati Batas Waktu</h5>
                </div>
                <div class="ibox-content">
                    <?php include 'views/utama/depan_kegiatan.php'; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">Max 5 poin</span>
                    <h5>Nilai Bulan Maret 2018</h5>
                </div>
                <div class="ibox-content">
                    <?php include 'views/utama/depan_grafik_nilai.php'; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right"><?php echo $nama_bulan_panjang[$bulan_keg] .' '.$tahun_keg; ?></span>
                    <h5>Jumlah Kegiatan Menurut Bidang</h5>
                </div>
                <div class="ibox-content">
                    <?php include 'views/utama/depan_grafik_keg_bulan.php'; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right"></span>
                    <h5>Jumlah Kegiatan Perbulan Selama Tahun <?php echo $tahun_keg; ?></h5>
                </div>
                <div class="ibox-content">
                   <?php include 'views/utama/depan_grafik_keg_tahun.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>