<?php

$r_data=ranking_kabkota($bulan_keg,$tahun_keg);
if ($r_data["error"]==false) {
	$rank_total=$r_data["rank_total"];
	for ($i=1;$i<=$rank_total;$i++) {
		//echo $r_data["item"][$i]["rank_nama"].'<br />';
		$kabkota_grafik[]=$r_data["item"][$i]["rank_nama"];
		$nilai_grafik_rata[]=number_format($r_data["item"][$i]["rank_poin_rata"],4,".",",");
	}
	?>
	<script type="text/javascript">
$(function () {
    Highcharts.chart('grafiknilaikabkota', {
       chart: {
        type: 'bar'
    },
        title: {
            text: 'Nilai Bulan <?php echo $nama_bulan_panjang[$bulan_keg] .' '.$tahun_keg;?>',
            x: -20 //center
        },
        subtitle: {
            text: 'Keadaan : <?php echo tgljam_hari_ini(); ?>',
            x: -20
        },
        xAxis: {
            categories: [<?php echo '\''.ltrim(implode("','",$kabkota_grafik),"',").'\'';?>],
             title: {
            text: null
        	}
        },
        yAxis: {
        min: 0,
        title: {
            text: '',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ''
    },
     plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
        legend: {
             enabled: false
        },
        series: [{
            name: 'Poin',
            data: [<?php echo ltrim(implode (",",$nilai_grafik_rata),',');?>]
        }]
    });
}); 
		</script>
<?php
}
else {
	echo $r_data["pesan_error"];
}
?>

<div id="grafiknilaikabkota" style="min-width: 250px; min-height: 400px; margin: 0 auto"></div>
<p><a href="<?php echo $url; ?>/laporan/kabkota/" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Laporan Nilai BPS Kabupaten/Kota Selengkapnya"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Selengkapnya</a></p>