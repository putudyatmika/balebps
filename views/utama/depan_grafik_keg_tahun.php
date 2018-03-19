<?php
$r_tahun=jumlah_kegiatan_tahunan($tahun_keg,true);
if ($r_tahun["error"]==false) {
	$total_bulan=$r_tahun["keg_bln_total"];
	for ($i=1;$i<=$total_bulan;$i++) {
		$data[]=$r_tahun["item"][$i]["keg_jumlah"];

	}
?>
	<script type="text/javascript">
$(function () {
    Highcharts.chart('grafiktahunan', {
    	chart: {
        type: 'column'
    },
        title: {
            text: 'Grafik Jumlah Kegiatan Perbulan Tahun <?php echo $tahun_keg;?>',
            x: -20 //center
        },
        subtitle: {
            text: 'Keadaan : <?php echo tgljam_hari_ini(); ?>',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
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
            data: [<?php echo join($data, ',')?>]
        }]
    });
});
</script>
<?php
}
else {
	echo $r_tahun['pesan_error'];
}
?>
<div id="grafiktahunan" style="min-width: 250px; min-height: 300px; margin: 0 auto"></div>
<a href="<?php echo $url; ?>/kegiatan/" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Kegiatan Tahunan Selengkapnya"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Selengkapnya</a>