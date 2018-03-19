<?php
$r_kegbulan=jumlah_kegiatan($bulan_keg,$tahun_keg);
if ($r_kegbulan["error"]==false) {
	$total_keg=$r_kegbulan["keg_bulan_total"];
	for ($i=1;$i<=$total_keg;$i++) {
		$data_bidang[]=$r_kegbulan["item"][$i]["keg_bulan_unitnama"];
		if ($r_kegbulan["item"][$i]["keg_bulan_jumlah"]=='') {
			$data_bulanan[]=0;
		}
		else {
		$data_bulanan[]=$r_kegbulan["item"][$i]["keg_bulan_jumlah"];
	}
	}
?>
<script type="text/javascript">
$(function () {
    Highcharts.chart('grafikbulanan', {
    	chart: {
        type: 'column'
    },
        title: {
            text: 'Grafik Jumlah Kegiatan Menurut Bidang',
            x: -20 //center
        },
        subtitle: {
            text: 'Bulan : <?php echo $nama_bulan_panjang[$bulan_keg] .' '.$tahun_keg; ?>',
            x: -20
        },
        xAxis: {
            categories: [<?php echo '\''.ltrim(implode("','",$data_bidang),"',").'\'';?>]
        },
        yAxis: {
            title: {
                text: ''
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        legend: {
             enabled: false
        },
        plotOptions: {
            column: {
                pointPadding: 0.1,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Jumlah Kegiatan',
            data: [<?php echo join($data_bulanan, ',')?>]
        }]
    });
});
</script>
<?php }
else {
	echo $r_kegbulan["pesan_error"];
}

?>
<div id="grafikbulanan" style="min-width: 250px; min-height: 300px; margin: 0 auto"></div>
<a href="<?php echo $url; ?>/kegiatan/bidang/" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Kegiatan Menurut Bidang/Bagian Selengkapnya"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Selengkapnya</a>