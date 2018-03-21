<div class="table-responsive">
    <table class="table table-striped table-hover" >
    <thead>
    <tr>
        <th class="text-center" width="5%">No</th>
        <th class="text-center">Kegiatan</th>
        <th class="text-center">Target</th>
        <th class="text-center">Batas Waktu</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $r_keg=list_kegiatan(0,false,true,0,0);
    if ($r_keg["error"]==false) {
        $keg_total=$r_keg["keg_total"];
        for ($i=1;$i<=$keg_total;$i++) {
            echo '
            <tr>
                <td class="text-center"><span class="label label-success">'.$i.'</span></td>
                <td class="text-left"><a href="'.$url.'/kegiatan/view/'.$r_keg["item"][$i]["keg_id"].'">'.$r_keg["item"][$i]["keg_nama"].'</a></td>
                <td class="text-right">'.$r_keg["item"][$i]["keg_total_target"].' '.$r_keg["item"][$i]["keg_target_satuan"].'</td>
                <td class="text-right"><span class="label label-primary">'.tgl_convert_pendek_bulan(1,$r_keg["item"][$i]["keg_end"]).'</span></td>
            </tr>
            ';
        }

    }
    else {
        echo '<tr><td colspan="4">'.$r_keg["pesan_error"].'</td></tr>';
    }

    ?>
    </tbody>
    </table>
</div>
<p><a href="<?php echo $url; ?>/kegiatan/" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Kegiatan Selengkapnya"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Selengkapnya</a></p>