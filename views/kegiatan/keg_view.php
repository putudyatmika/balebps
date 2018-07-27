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
		<strong>View Data</strong>
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
     <?php
        $keg_id=$lvl3;
        $r_keg=list_kegiatan($keg_id,true,false,0,0);
        if ($r_keg["error"]==false) {
            $keg_total=$r_keg["keg_total"]; 
            //kegiatan info lanjutan
            if ($_SESSION['sesi_level'] > 2 ) {
                if ($_SESSION['sesi_level'] > 3 ) {
                    if ($r_keg["item"][1]["keg_info"]=="") {
                        $keg_info='- <br /> ';
                        $add_info='<p><a href="'.$url.'/'.$page.'/addinfo/" class="btn btn-success btn-rounded btn-xs" data-toggle="tooltip" data-placement="top" title="Tambah info lanjutan" data-addinfo="'.$r_keg["item"][1]["keg_id"].';'.$r_keg["item"][1]["keg_nama"].';'.$r_keg["item"][1]["keg_unitkerja"].';'.$r_keg["item"][1]["keg_unitnama"].';'.tgl_convert(1,$r_keg["item"][1]["keg_end"]).';'.$r_keg["item"][1]["keg_total_target"].' '. $r_keg["item"][1]["keg_target_satuan"].'"><i class="fa fa-plus" aria-hidden="true"></i></a></p>';
                     }
                     else {
                        $keg_info=$r_keg["item"][1]["keg_info"];
                        $add_info='<p>&nbsp; <a href="'.$url.'/'.$page.'/addinfo/" class="btn btn-success btn-rounded btn-xs" data-toggle="tooltip" data-placement="top" title="edit info lanjutan" data-editinfo="'.$r_keg["item"][1]["keg_id"].';'.$r_keg["item"][1]["keg_nama"].';'.$r_keg["item"][1]["keg_unitkerja"].';'.$r_keg["item"][1]["keg_unitnama"].';'.tgl_convert(1,$r_keg["item"][1]["keg_end"]).';'.$r_keg["item"][1]["keg_total_target"].' '. $r_keg["item"][1]["keg_target_satuan"].';'.html_entity_decode($keg_info).'"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                        <a href="'.$url.'/'.$page.'/deleteinfo/'.$r_keg["item"][1]["keg_id"].'" data-confirm="Apakah info lanjutan ('.$r_keg["item"][1]["keg_id"].') '.$r_keg["item"][1]["keg_nama"].' ini akan di hapus?" class="btn btn-danger btn-rounded btn-xs" data-toggle="tooltip" data-placement="top" title="hapus info lanjutan"><i class="fa fa-trash" aria-hidden="true"></i></a></p>';
                     } 
                     $tr_keg_info='<tr>
                         <td rowspan="2"><strong>Info Lanjutan</strong></td>
                         <td>'.html_entity_decode($keg_info).'</td>
                            </tr>
                            <tr>
                             <td>'.$add_info.'</td>
                         </tr>';       
                }
                else {
                    //level operator prov
                    if (($_SESSION['sesi_unitkerja']==$r_keg["item"][1]["keg_unitkerja"]) or ($_SESSION['sesi_unitkerja']==$r_keg["item"][1]["keg_unitparent"])) {
                        if ($r_keg["item"][1]["keg_info"]=="") {
                            $keg_info='- <br /> ';
                            $add_info='<p><a href="'.$url.'/'.$page.'/addinfo/" class="btn btn-success btn-rounded btn-xs" data-toggle="tooltip" data-placement="top" title="Tambah info lanjutan" data-addinfo="'.$r_keg["item"][1]["keg_id"].';'.$r_keg["item"][1]["keg_nama"].';'.$r_keg["item"][1]["keg_unitkerja"].';'.$r_keg["item"][1]["keg_unitnama"].';'.tgl_convert(1,$r_keg["item"][1]["keg_end"]).';'.$r_keg["item"][1]["keg_total_target"].' '. $r_keg["item"][1]["keg_target_satuan"].'"><i class="fa fa-plus" aria-hidden="true"></i></a></p>';
                         }
                         else {
                            $keg_info=$r_keg["item"][1]["keg_info"];
                            $add_info='<p>&nbsp; <a href="'.$url.'/'.$page.'/addinfo/" class="btn btn-success btn-rounded btn-xs" data-toggle="tooltip" data-placement="top" title="edit info lanjutan" data-editinfo="'.$r_keg["item"][1]["keg_id"].';'.$r_keg["item"][1]["keg_nama"].';'.$r_keg["item"][1]["keg_unitkerja"].';'.$r_keg["item"][1]["keg_unitnama"].';'.tgl_convert(1,$r_keg["item"][1]["keg_end"]).';'.$r_keg["item"][1]["keg_total_target"].' '. $r_keg["item"][1]["keg_target_satuan"].';'.html_entity_decode($keg_info).'"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                            <a href="'.$url.'/'.$page.'/deleteinfo/'.$r_keg["item"][1]["keg_id"].'" data-confirm="Apakah info lanjutan ('.$r_keg["item"][1]["keg_id"].') '.$r_keg["item"][1]["keg_nama"].' ini akan di hapus?" class="btn btn-danger btn-rounded btn-xs" data-toggle="tooltip" data-placement="top" title="hapus info lanjutan"><i class="fa fa-trash" aria-hidden="true"></i></a></p>';
                         }
                         $tr_keg_info='<tr>
                         <td rowspan="2"><strong>Info Lanjutan</strong></td>
                         <td>'.html_entity_decode($keg_info).'</td>
                            </tr>
                            <tr>
                             <td>'.$add_info.'</td>
                         </tr>';       
                    }
                    else {
                        //level operator prov lain bidang/seksi
                        if ($r_keg["item"][1]["keg_info"]=="") {
                            $keg_info='- <br /> ';
                            $add_info='';
                         }
                         else {
                            $keg_info=$r_keg["item"][1]["keg_info"];
                            $add_info='';
                         } 
                         //satu baris saja
                         $tr_keg_info='<tr>
                         <td><strong>Info Lanjutan</strong></td>
                         <td>'.html_entity_decode($keg_info).'</td>
                     </tr>';  
                    }
                }                     
            }
            else {
                //level pemantau dan operator kab
                if ($r_keg["item"][1]["keg_info"]=="") {
                    $keg_info='- <br /> ';
                    $add_info='';
                 }
                 else {
                    $keg_info=$r_keg["item"][1]["keg_info"];
                    $add_info='';
                 } 
                 $tr_keg_info='<tr>
                 <td><strong>Info Lanjutan</strong></td>
                 <td>'.html_entity_decode($keg_info).'</td>
             </tr>';  
            }
            
            
            ?>
            
            <div class="row">
        <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>View Kegiatan</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <?php echo  '<h2><strong>'.$r_keg["item"][1]["keg_nama"].'</strong></h2>'; ?>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-condensed">
                            <tr>
                                <td class="col-lg-2 col-xs-3"><strong>Bidang/Bagian</strong></td>
                                <td class="col-lg-10 col-xs-9"><?php echo '['.$r_keg["item"][1]["keg_unitparent"].'] '.get_nama_unit($r_keg["item"][1]["keg_unitparent"]); ?></td>
                            </tr>
                            <tr>
                                <td class="col-lg-2 col-xs-3"><strong>Seksi Unit kerja</strong></td>
                                <td class="col-lg-10 col-xs-9"><?php echo '['.$r_keg["item"][1]["keg_unitkerja"].'] '.$r_keg["item"][1]["keg_unitnama"]; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Tipe Kegiatan</strong></td>
                                <td><?php echo $KegiatanTipe[$r_keg["item"][1]["keg_tipe"]]; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Jenis Kegiatan</strong></td>
                                <td><?php echo $JenisKegiatan[$r_keg["item"][1]["keg_jenis"]]; ?></td>
                            </tr>
                             <tr>
                                <td><strong>Total Target</strong></td>
                                <td><?php echo $r_keg["item"][1]["keg_total_target"] .' '.$r_keg["item"][1]["keg_target_satuan"]; ?></td>
                            </tr>
                             <tr>
                                <td><strong>Tanggal Mulai</strong></td>
                                <td><?php echo tgl_convert(1,$r_keg["item"][1]["keg_start"]); ?></td>
                            </tr>
                             <tr>
                                <td><strong>Tanggal Berakhir</strong></td>
                                <td><?php echo tgl_convert(1,$r_keg["item"][1]["keg_end"]); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Tagihan SPJ</strong></td>
                                <td><?php echo $StatusSPJ[$r_keg["item"][1]["keg_spj"]]; ?></td>
                            </tr>
                            <?php
                            //tampilan info lanjutan
                            echo  $tr_keg_info;
                            $r_jenis=progress_kegiatan($keg_id);
                            if ($r_jenis["error"]==false) {
                                if ($r_jenis["jenis_total"]==1) {
                                    if ($r_jenis["item"][1]["jenis_id"]==1) {
                                        $jumlah_kirim=$r_jenis["item"][1]["jenis_jumlah"];
                                        $jumlah_terima=0;
                                    }
                                    else {
                                        $jumlah_kirim=0;
                                        $jumlah_terima=$r_jenis["item"][1]["jenis_jumlah"];
                                    }
                                }
                                else {
                                    $jumlah_kirim=$r_jenis["item"][1]["jenis_jumlah"];
                                    $jumlah_terima=$r_jenis["item"][2]["jenis_jumlah"];
                                }
                                
                            }
                            else {
                                $jumlah_kirim=0;
                                $jumlah_terima=0;
                            }
                            $progress_kirim=($jumlah_kirim/$r_keg["item"][1]["keg_total_target"])*100;
                            $progress_terima=($jumlah_terima/$r_keg["item"][1]["keg_total_target"])*100;
                            $progress_kirim=number_format($progress_kirim,2,".",",");
                            $progress_terima=number_format($progress_terima,2,".",",");
                            //bar kirim
                            if ($progress_kirim<3) {
                                $bar_kirim=3;
                                $bar_color='class="progress-bar progress-bar-danger"';
                            }
                            elseif ($progress_kirim<70) {
                                $bar_kirim=$progress_kirim;
                                $bar_color='class="progress-bar progress-bar-danger"';
                            }
                            elseif ($progress_kirim<90) {
                                $bar_kirim=$progress_kirim;
                                $bar_color='class="progress-bar progress-bar-warning"';
                            }
                            elseif ($progress_kirim<=100) {
                                $bar_kirim=$progress_kirim;
                                $bar_color='class="progress-bar progress-bar-primary"';
                            }
                            else {
                                //lebih dari 100
                                $bar_kirim=100;
                                $bar_color='class="progress-bar progress-bar-primary"';
                            }

                            //bar terima
                            if ($progress_terima<3) {
                                $bar_terima=3;
                                $bar_color_terima='class="progress-bar progress-bar-danger"';
                            }
                            elseif ($progress_terima<70) {
                                $bar_terima=$progress_terima;
                                $bar_color_terima='class="progress-bar progress-bar-danger"';
                            }
                            elseif ($progress_terima<90) {
                                $bar_terima=$progress_terima;
                                $bar_color_terima='class="progress-bar progress-bar-warning"';
                            }
                            elseif ($progress_terima<=100) {
                                $bar_terima=$progress_terima;
                                $bar_color_terima='class="progress-bar progress-bar-primary"';
                            }
                            else {
                                //lebih dari 100
                                $bar_terima=100;
                                $bar_color_terima='class="progress-bar progress-bar-primary"';
                            }
                            ?>
                            <tr>
                                <td rowspan="2"><strong>Progress</strong></td>
                                <td><h5>Pengiriman</h5>
                                    <div class="progress progress-striped active m-b-sm">
                                                <div style="width: <?php echo $bar_kirim;?>%;" role="progressbar" aria-valuenow="<?php echo $bar_kirim;?>" <?php echo $bar_color;?> aria-valuemax="100"><?php echo $progress_kirim;?>%</div>
                                            </div></td>
                            </tr>
                            <tr>
                                <td><h5>Penerimaan</h5>
                                    <div class="progress progress-striped active">
                                                <div style="width: <?php echo $bar_terima;?>%;" <?php echo $bar_color_terima;?> aria-valuemax="100" aria-valuemin="<?php echo $progress_terima;?>" role="progressbar" class="progress-bar progress-bar-danger"><?php echo $progress_terima;?>%</div>
                                            </div></td>
                            </tr>
                            <?php
                                if ($_SESSION['sesi_level'] > 3) {
                                  echo '
                                  <tr>
                                        <td><strong>Dibuat oleh</strong></td>
                                        <td>'.$r_keg["item"][1]["keg_dibuat_oleh"].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Dibuat tanggal</strong></td>
                                        <td>'.tgl_convert(1,$r_keg["item"][1]["keg_dibuat_waktu"]).'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Diupdate oleh</strong></td>
                                        <td>'.$r_keg["item"][1]["keg_diupdate_oleh"].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Diupdate tanggal</strong></td>
                                        <td>'.tgl_convert(1,$r_keg["item"][1]["keg_diupdate_waktu"]).'</td>
                                    </tr>'; }
                                  if ($_SESSION['sesi_level'] > 2 ) {
                                    if ($_SESSION['sesi_level']==3) {
                                        if (($_SESSION['sesi_unitkerja']==$r_keg["item"][1]["keg_unitkerja"]) or ($_SESSION['sesi_unitkerja']==$r_keg["item"][1]["keg_unitparent"])) {
                                            echo '<tr>
                                            <td></td>
                                            <td><a href="'.$url.'/'.$page.'/edit/'.$r_keg["item"][1]["keg_id"].'" class="btn btn-success btn-rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Edit kegiatan"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                             <a href="'.$url.'/'.$page.'/delete/'.$r_keg["item"][1]["keg_id"].'" class="btn btn-danger btn-rounded btn-sm" data-confirm="Apakah data ('.$r_keg["item"][1]["keg_id"].') '.$r_keg["item"][1]["keg_nama"].' ini akan di hapus?" data-toggle="tooltip" data-placement="top" title="Hapus kegiatan ini"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>
    
                                            </td>
                                        </tr>';
                                        }
                                        
                                    }
                                    else {
                                    echo '<tr>
                                        <td></td>
                                        <td><a href="'.$url.'/'.$page.'/edit/'.$r_keg["item"][1]["keg_id"].'" class="btn btn-success btn-rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Edit kegiatan"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                         <a href="'.$url.'/'.$page.'/delete/'.$r_keg["item"][1]["keg_id"].'" class="btn btn-danger btn-rounded btn-sm" data-confirm="Apakah data ('.$r_keg["item"][1]["keg_id"].') '.$r_keg["item"][1]["keg_nama"].' ini akan di hapus?" data-toggle="tooltip" data-placement="top" title="Hapus kegiatan ini"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>

                                        </td>
                                    </tr>';
                                    }
                                }
                            ?>
                        </table>
                    </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Rekap BPS Kabupaten/Kota</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                       <div class="table-responsive">
                            <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="text-center" rowspan="2">No</th>
                                <th class="text-center" rowspan="2">Unit Kerja</th>
                                <th class="text-center" rowspan="2">Target</th>
                                <th class="text-center bg-info" colspan="4">Pengiriman</th>
                                <th class="text-center bg-primary" colspan="4">Penerimaan</th>
                                <th class="text-center" rowspan="2">Nilai</th>
                            </tr>
                            <tr>
                                <th class="text-center bg-info">Rincian</th>
                                <th class="text-center bg-info">Jml</th>
                                <th class="text-center bg-info">%</th>
                                <th class="text-center bg-info">&nbsp;</th>
                                <th class="text-center bg-primary">Rincian</th>
                                <th class="text-center bg-primary">Jml</th>
                                <th class="text-center bg-primary">%</th>
                                <th class="text-center bg-primary">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $r_target=list_target_keg_kabkota($keg_id,0,false);
                            if ($r_target["error"]==false) {
                                $total_target=$r_target["target_total"];
                                $t_total=0;
                                for ($i=1;$i<=$total_target;$i++) {
                                    //detil pengiriman
                                    $r_detil_kirim=list_keg_detil_kabkota($keg_id,$r_target["item"][$i]["target_unitkerja"],1,true);
                                    if ($r_detil_kirim["error"]==false) {
                                        $detil_kirim='';
                                        $jml_kirim=$r_detil_kirim["detil_total"];
                                        $detil_target=0;
                                        for ($k=1;$k<=$jml_kirim;$k++) {
                                            if ($_SESSION['sesi_level']==2) {
                                                if ($_SESSION['sesi_unitkerja']==$r_detil_kirim["item"][$k]["detil_unitkerja"]) {
                                                    $detil_kirim .= '<p><span class="label label-success" data-toggle="tooltip" data-placement="top" title="dikirim via : '.$r_detil_kirim["item"][$k]["detil_ket"].'">'.tgl_convert_pendek_bulan(1,$r_detil_kirim["item"][$k]["detil_tanggal"]).'</span> | <span class="badge badge-info" data-toggle="tooltip" data-placement="top" title="Jumlah yg dikirim">'.$r_detil_kirim["item"][$k]["detil_jumlah"].'</span> | <a href="'.$url.'/'.$page.'/updatekirim/" data-toggle="tooltip" data-placement="top" title="Edit Pengiriman" class="btn btn-primary btn-rounded btn-xs" 
                                                    data-editkirim="'.$r_keg["item"][1]["keg_id"].';'.$r_keg["item"][1]["keg_nama"].';'.$r_target["item"][$i]["target_unitkerja"].';'.$r_target["item"][$i]["target_unitnama"].';'.tgl_convert(1,$r_keg["item"][1]["keg_end"]).';'.$r_target["item"][$i]["target_jumlah"].';'.$r_detil_kirim["item"][$k]["detil_id"].';'.$r_detil_kirim["item"][$k]["detil_jumlah"].';'.$r_detil_kirim["item"][$k]["detil_tanggal"].';'.$r_detil_kirim["item"][$k]["detil_ket"].';'.$r_detil_kirim["item"][$k]["detil_link_laci"].'">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="'.$url.'/'.$page.'/deletedetil/'.$r_detil_kirim["item"][$k]["keg_id"].'/'.$r_detil_kirim["item"][$k]["detil_id"].'" data-confirm="Apakah data ('.$r_detil_kirim["item"][$k]["detil_id"].') ini akan di hapus?" data-toggle="tooltip" data-placement="top" title="Hapus Pengiriman" class="btn btn-danger btn-rounded btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></a></p>';
                                                }
                                                else {
                                                    //selain operator kabkota yg lain hanya jumlah dan tanggal
                                                    $detil_kirim .= '<p><span class="label label-success" data-toggle="tooltip" data-placement="top" title="dikirim via : '.$r_detil_kirim["item"][$k]["detil_ket"].'">'.tgl_convert_pendek_bulan(1,$r_detil_kirim["item"][$k]["detil_tanggal"]).'</span> | <span class="badge badge-info" data-toggle="tooltip" data-placement="top" title="Jumlah yg dikirim">'.$r_detil_kirim["item"][$k]["detil_jumlah"].'</span>';
                                                }
                                            }
                                            else {
                                                if ($_SESSION['sesi_level'] > 3) {
                                                    //admin dan superadmin
                                                    $detil_kirim .= '<p><span class="label label-success" data-toggle="tooltip" data-placement="top" title="dikirim via : '.$r_detil_kirim["item"][$k]["detil_ket"].'">'.tgl_convert_pendek_bulan(1,$r_detil_kirim["item"][$k]["detil_tanggal"]).'</span> | <span class="badge badge-info" data-toggle="tooltip" data-placement="top" title="Jumlah yg dikirim">'.$r_detil_kirim["item"][$k]["detil_jumlah"].'</span> | <a href="'.$url.'/'.$page.'/updatekirim/" data-toggle="tooltip" data-placement="top" title="Edit Pengiriman" class="btn btn-primary btn-rounded btn-xs" 
                                            data-editkirim="'.$r_keg["item"][1]["keg_id"].';'.$r_keg["item"][1]["keg_nama"].';'.$r_target["item"][$i]["target_unitkerja"].';'.$r_target["item"][$i]["target_unitnama"].';'.tgl_convert(1,$r_keg["item"][1]["keg_end"]).';'.$r_target["item"][$i]["target_jumlah"].';'.$r_detil_kirim["item"][$k]["detil_id"].';'.$r_detil_kirim["item"][$k]["detil_jumlah"].';'.$r_detil_kirim["item"][$k]["detil_tanggal"].';'.$r_detil_kirim["item"][$k]["detil_ket"].';'.$r_detil_kirim["item"][$k]["detil_link_laci"].'">
                                            <i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="'.$url.'/'.$page.'/deletedetil/'.$r_detil_kirim["item"][$k]["keg_id"].'/'.$r_detil_kirim["item"][$k]["detil_id"].'" data-confirm="Apakah data ('.$r_detil_kirim["item"][$k]["detil_id"].') ini akan di hapus?" data-toggle="tooltip" data-placement="top" title="Hapus Pengiriman" class="btn btn-danger btn-rounded btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></a></p>';
                                                }
                                                else {
                                                    $detil_kirim .= '<p><span class="label label-success" data-toggle="tooltip" data-placement="top" title="dikirim via : '.$r_detil_kirim["item"][$k]["detil_ket"].'">'.tgl_convert_pendek_bulan(1,$r_detil_kirim["item"][$k]["detil_tanggal"]).'</span> | <span class="badge badge-info" data-toggle="tooltip" data-placement="top" title="Jumlah yg dikirim">'.$r_detil_kirim["item"][$k]["detil_jumlah"].'</span>';
                                                }
                                            }
                                           
                                            
                                            $detil_target+=$r_detil_kirim["item"][$k]["detil_jumlah"];
                                        }
                                        //label persentase rincian
                                        $d_k_persen=($detil_target/$r_target["item"][$i]["target_jumlah"])*100;
                                        if ($d_k_persen > 85) { $k_persen='<span class="label label-primary">'.number_format($d_k_persen,2,".",",").' %</span>'; }
                                        elseif ($d_k_persen > 75) { $k_persen='<span class="label label-warning">'.number_format($d_k_persen,2,".",",").' %</span>'; }
                                        else { $k_persen='<span class="label label-danger">'.number_format($d_k_persen,2,".",",").' %</span>'; }
                                    }
                                    else {
                                        $detil_kirim='';
                                        $d_k_persen=0;
                                        $detil_target=0;
                                        $k_persen='<span class="label label-danger">'.number_format($d_k_persen,2,".",",").' %</span>';
                                    }

                                    //detil penerimaan
                                    $r_detil_terima=list_keg_detil_kabkota($keg_id,$r_target["item"][$i]["target_unitkerja"],2,true);
                                    if ($r_detil_terima["error"]==false) {
                                        $detil_terima='';
                                        $jml_terima=$r_detil_terima["detil_total"];
                                        $detil_target_terima=0;
                                        for ($t=1;$t<=$jml_terima;$t++) {
                                            $detil_terima .= '<p><span class="label label-warning" data-toggle="tooltip" data-placement="top" title="diterima oleh : '.$r_detil_terima["item"][$t]["detil_ket"].'">'.tgl_convert_pendek_bulan(1,$r_detil_terima["item"][$t]["detil_tanggal"]).'</span> | <span class="badge badge-success" data-toggle="tooltip" data-placement="top" title="Jumlah yg diterima">'.$r_detil_terima["item"][$t]["detil_jumlah"].'</span> | <a href="'.$url.'/'.$page.'/updateterima/" data-toggle="tooltip" data-placement="top" title="Edit Penerimaan" class="btn btn-success btn-rounded btn-xs" data-editterima="'.$r_keg["item"][1]["keg_id"].';'.$r_keg["item"][1]["keg_nama"].';'.$r_target["item"][$i]["target_unitkerja"].';'.$r_target["item"][$i]["target_unitnama"].';'.tgl_convert(1,$r_keg["item"][1]["keg_end"]).';'.$r_target["item"][$i]["target_jumlah"].';'.$r_detil_terima["item"][$t]["detil_id"].';'.$r_detil_terima["item"][$t]["detil_jumlah"].';'.$r_detil_terima["item"][$t]["detil_tanggal"].'"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="'.$url.'/'.$page.'/deletedetil/'.$r_detil_terima["item"][$t]["keg_id"].'/'.$r_detil_terima["item"][$t]["detil_id"].'" data-confirm="Apakah data ('.$r_detil_terima["item"][$t]["detil_id"].') ini akan di hapus?" data-toggle="tooltip" data-placement="top" title="Hapus Penerimaan" class="btn btn-danger btn-rounded btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></a></p>';
                                            $detil_target_terima+=$r_detil_terima["item"][$t]["detil_jumlah"];
                                        }
                                        //label persentase rincian
                                        $d_t_persen=($detil_target_terima/$r_target["item"][$i]["target_jumlah"])*100;
                                        if ($d_t_persen > 85) { $t_persen='<span class="label label-primary">'.number_format($d_t_persen,2,".",",").' %</span>'; }
                                        elseif ($d_t_persen > 70) { $t_persen='<span class="label label-warning">'.number_format($d_t_persen,2,".",",").' %</span>'; }
                                        else { $t_persen='<span class="label label-danger">'.number_format($d_t_persen,2,".",",").' %</span>'; }
                                    }
                                    else {
                                        $detil_terima='';
                                        $d_t_persen=0;
                                        $detil_target_terima=0;
                                        $t_persen='<span class="label label-danger">'.number_format($d_t_persen,2,".",",").' %</span>';
                                    }
                                    //link pengiriman dan penerimaan
                                    if (($_SESSION['sesi_level'] > 1) && ($r_keg["item"][1]["keg_start"] <= $tanggal_hari_ini)) {
                                        if ($_SESSION['sesi_level']>3) {
                                            $link_tambah_pengiriman='<a href="'.$url.'/'.$page.'/savekirim/" class="btn btn-info btn-rounded btn-xs" data-toggle="tooltip" data-placement="top" title="Tambah Pengiriman" data-kirim="'.$r_keg["item"][1]["keg_id"].';'.$r_keg["item"][1]["keg_nama"].';'.$r_target["item"][$i]["target_unitkerja"].';'.$r_target["item"][$i]["target_unitnama"].';'.tgl_convert(1,$r_keg["item"][1]["keg_end"]).';'.$r_target["item"][$i]["target_jumlah"].';'. $detil_target.'"><i class="fa fa-plus" aria-hidden="true"></i></a>';
                                            $link_tambah_penerimaan='<a href="'.$url.'/'.$page.'/saveterima/" class="btn btn-primary btn-rounded btn-xs" data-toggle="tooltip" data-placement="top" title="Tambah Penerimaan" data-terima="'.$r_keg["item"][1]["keg_id"].';'.$r_keg["item"][1]["keg_nama"].';'.$r_target["item"][$i]["target_unitkerja"].';'.$r_target["item"][$i]["target_unitnama"].';'.tgl_convert(1,$r_keg["item"][1]["keg_end"]).';'.$r_target["item"][$i]["target_jumlah"].';'. $detil_target_terima.'"><i class="fa fa-plus" aria-hidden="true"></i></a>';
                                        }
                                        elseif ($_SESSION['sesi_level']==2) {
                                            if ($_SESSION['sesi_unitkerja']==$r_target["item"][$i]["target_unitkerja"]) {
                                                $link_tambah_pengiriman='<a href="'.$url.'/'.$page.'/savekirim/" class="btn btn-info btn-rounded btn-xs" data-toggle="tooltip" data-placement="top" title="Tambah Pengiriman" data-kirim="'.$r_keg["item"][1]["keg_id"].';'.$r_keg["item"][1]["keg_nama"].';'.$r_target["item"][$i]["target_unitkerja"].';'.$r_target["item"][$i]["target_unitnama"].';'.tgl_convert(1,$r_keg["item"][1]["keg_end"]).';'.$r_target["item"][$i]["target_jumlah"].';'. $detil_target.'"><i class="fa fa-plus" aria-hidden="true"></i></a>';
                                            }
                                            else {
                                                $link_tambah_pengiriman='';
                                            }
                                            $link_tambah_penerimaan='';
                                        }
                                        else {
                                            //operator provinsi 
                                            if (($_SESSION['sesi_unitkerja']==$r_keg["item"][1]["keg_unitkerja"]) or ($_SESSION['sesi_unitkerja']==$r_keg["item"][1]["keg_unitparent"])) {
                                                $link_tambah_pengiriman='';
                                                $link_tambah_penerimaan='<a href="'.$url.'/'.$page.'/saveterima/" class="btn btn-primary btn-rounded btn-xs" data-toggle="tooltip" data-placement="top" title="Tambah Penerimaan" data-terima="'.$r_keg["item"][1]["keg_id"].';'.$r_keg["item"][1]["keg_nama"].';'.$r_target["item"][$i]["target_unitkerja"].';'.$r_target["item"][$i]["target_unitnama"].';'.tgl_convert(1,$r_keg["item"][1]["keg_end"]).';'.$r_target["item"][$i]["target_jumlah"].';'. $detil_target_terima.'"><i class="fa fa-plus" aria-hidden="true"></i></a>';    
                                            }
                                            else {
                                                $link_tambah_pengiriman='';
                                                $link_tambah_penerimaan='';
                                            }
                                            
                                        }
                                        
                                    }
                                    else {
                                        $link_tambah_pengiriman='';
                                        $link_tambah_penerimaan='';
                                    }
                                    echo '
                                        <tr>
                                            <td>'.$i.'</td>
                                            <td>'.$r_target["item"][$i]["target_unitnama"].'</td>
                                            <td class="text-right">'.$r_target["item"][$i]["target_jumlah"].'</td>
                                            <td class="text-right">'.$detil_kirim.'</td>
                                            <td class="text-right">'.$detil_target.'</td>
                                            <td class="text-right">'.$k_persen.'</td>
                                            <td class="text-center">'.$link_tambah_pengiriman.'</td>
                                            <td class="text-right">'.$detil_terima.'</td>
                                            <td class="text-right">'.$detil_target_terima.'</td>
                                            <td class="text-right">'.$t_persen.'</td>
                                            <td class="text-center">'.$link_tambah_penerimaan.'</td>
                                            <td class="text-right">'.$r_target["item"][$i]["target_poin_total"].'</td>
                                        </tr>
                                    ';
                                    $t_total+=$r_target["item"][$i]["target_jumlah"];
                                }
                                $pro_kirim=0;
                                if ($progress_kirim > 85) { $pro_kirim='<span class="label label-primary">'.number_format($progress_kirim,2,".",",").' %</span>'; }
                                elseif ($progress_kirim > 70) { $pro_kirim='<span class="label label-warning">'.number_format($progress_kirim,2,".",",").' %</span>'; }
                                else { $pro_kirim='<span class="label label-danger">'.number_format($progress_kirim,2,".",",").' %</span>'; }

                                $pro_terima=0;
                                if ($progress_terima > 85) { $pro_terima='<span class="label label-primary">'.number_format($progress_terima,2,".",",").' %</span>'; }
                                elseif ($progress_terima > 70) { $pro_terima='<span class="label label-warning">'.number_format($progress_terima,2,".",",").' %</span>'; }
                                else { $pro_terima='<span class="label label-danger">'.number_format($progress_terima,2,".",",").' %</span>'; }
                                echo '
                                        <tr>
                                            <td colspan="2" class="text-center">Total</td>
                                            <td class="text-right">'.$t_total.'</td>
                                            <td></td>
                                            <td class="text-right">'.$jumlah_kirim.'</td>
                                            <td class="text-right">'.$pro_kirim.'</td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right">'.$jumlah_terima.'</td>
                                            <td class="text-right">'.$pro_terima.'</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    ';
                            }
                            else {
                                echo '
                                    <tr>
                                        <td colspan="10">'.$r_target["pesan_error"].'</td>
                                    </tr>
                                ';
                            }
                            ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <?php
    if ($r_keg["item"][1]["keg_spj"]==1) {
    ?>
    <div class="row">
        <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Rekap SPJ BPS Kabupaten/Kota</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                       <div class="table-responsive">
                            <table class="table table-striped table-hover" >
                            <thead>
                            <tr>
                                <th class="text-center" rowspan="2">No</th>
                                <th class="text-center" rowspan="2">Unit Kerja</th>
                                <th class="text-center" rowspan="2">Target</th>
                                <th class="text-center" colspan="3">Pengiriman</th>
                                <th class="text-center" colspan="3">Penerimaan</th>
                                <th class="text-center" rowspan="2">Nilai</th>
                            </tr>
                            <tr>
                                <th class="text-center">Rincian</th>
                                <th class="text-center">%</th>
                                <th class="text-center">&nbsp;</th>
                                <th class="text-center">Rincian</th>
                                <th class="text-center">%</th>
                                <th class="text-center">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $r_spj=list_target_spj_kabkota($keg_id,0,false);
                            if ($r_spj["error"]==false) {
                                //pengulangan unitkerja
                                $total_target_spj=0;
                                $rekap_spj_kirim=0;
                                $rekap_spj_terima=0;
                                $bnyk_unit_spj=$r_spj["spj_total"];
                                for ($s=1;$s<=$bnyk_unit_spj;$s++) {
                                    //ngulang unit kerja satu2
                                    //pengiriman
                                    $r_spj_kirim=list_spj_detil_kabkota($keg_id,$r_spj["item"][$s]["spj_unitkerja"],1,true);
                                    if ($r_spj_kirim["error"]==false) {
                                        //spj detil kirim ada isian
                                        $total_r_kirim=$r_spj_kirim["spj_bnyk"]; //banyak record pengiriman
                                        $total_kirim_spj=0;
                                        $link_kirim_spj='';
                                        for ($k=1;$k<=$total_r_kirim;$k++) {
                                            $link_kirim_spj .= tgl_convert_pendek_bulan(1,$r_spj_kirim["item"][$k]["spj_tanggal"]).' | '.$r_spj_kirim["item"][$k]["spj_jumlah"];
                                            $total_kirim_spj += $r_spj_kirim["item"][$k]["spj_jumlah"];
                                        }
                                        //progress spj per kabkota
                                        $progress_spj_kirim=($total_kirim_spj/$r_spj["item"][$s]["spj_jumlah"])*100;
                                    }
                                    else {
                                        //bila spj detil kirim kosong / belum dikirim
                                        $total_kirim_spj=0;
                                        $link_kirim_spj='';
                                        $progress_spj_kirim=0;
                                    }
                                    

                                    //penerimaan
                                    $r_spj_terima=list_spj_detil_kabkota($keg_id,$r_spj["item"][$s]["spj_unitkerja"],2,true);
                                    if ($r_spj_terima["error"]==false) {
                                        //spj detil kirim ada isian
                                        $total_r_terima=$r_spj_terima["spj_bnyk"]; //banyak record pengiriman
                                        $total_terima_spj=0;
                                        $link_terima_spj='';
                                        for ($t=1;$t<=$total_r_terima;$t++) {
                                            $link_terima_spj .= tgl_convert_pendek_bulan(1,$r_spj_terima["item"][$t]["spj_tanggal"]).' | '.$r_spj_terima["item"][$t]["spj_jumlah"];
                                            $total_terima_spj += $r_spj_terima["item"][$t]["spj_jumlah"];
                                        }
                                        //progress spj per kabkota
                                        $progress_spj_terima=($total_terima_spj/$r_spj["item"][$s]["spj_jumlah"])*100;
                                    }
                                    else {
                                        //bila spj detil kirim kosong / belum dikirim
                                        $total_terima_spj=0;
                                        $link_terima_spj='';
                                        $progress_spj_terima=0;
                                    }


                                    //tampilan pengiriman dan penerimaan
                                    echo '
                                        <tr>
                                            <td>'.$s.'</td>
                                            <td>'.$r_spj["item"][$s]["spj_unitnama"].'</td>
                                            <td class="text-right">'.$r_spj["item"][$s]["spj_jumlah"].'</td>
                                            <td class="text-right">'.$link_kirim_spj.'</td>
                                            <td class="text-right">'.$progress_spj_kirim.'</td>
                                            <td class="text-center"><a href="#" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Tambah Pengiriman"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
                                            <td class="text-right">'.$link_terima_spj.'</td>
                                            <td class="text-right">'.$progress_spj_terima.'</td>
                                            <td class="text-center"><a href="#" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Tambah Penerimaan"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
                                            <td class="text-right">'.$r_spj["item"][$s]["spj_poin_total"].'</td>
                                        </tr>
                                    ';
                                    //batasnya
                                    $total_target_spj += $r_spj["item"][$s]["spj_jumlah"];
                                    $rekap_spj_kirim += $total_kirim_spj; //rekap realisasi pengiriman spj
                                    $rekap_spj_terima += $total_terima_spj; //rekap realisasi penerimaan spj

                                }
                                $pro_rekap_kirim=($rekap_spj_kirim/$total_target_spj)*100;
                                $pro_rekap_terima=($rekap_spj_terima/$total_target_spj)*100;

                                //warna-warni untuk pengiriman
                                $pro_kirim=''; //inisiasi dulu
                                if ($pro_rekap_kirim > 85) { $pro_kirim='<span class="label label-primary">'.number_format($pro_rekap_kirim,2,".",",").' %</span>'; }
                                elseif ($pro_rekap_kirim > 70) { $pro_kirim='<span class="label label-warning">'.number_format($pro_rekap_kirim,2,".",",").' %</span>'; }
                                else { $pro_kirim='<span class="label label-danger">'.number_format($pro_rekap_kirim,2,".",",").' %</span>'; }

                                 //warna-warni untuk penerimaan
                                $pro_terima=''; //inisiasi dulu
                                if ($pro_rekap_terima > 85) { $pro_terima='<span class="label label-primary">'.number_format($pro_rekap_terima,2,".",",").' %</span>'; }
                                elseif ($pro_rekap_terima > 70) { $pro_terima='<span class="label label-warning">'.number_format($pro_rekap_terima,2,".",",").' %</span>'; }
                                else { $pro_terima='<span class="label label-danger">'.number_format($pro_rekap_terima,2,".",",").' %</span>'; }
                                
                                echo 
                                    '<tr>
                                        <td colspan="2" class="text-center">Total</td>
                                        <td class="text-right">'.$total_target_spj.'</td>
                                        <td class="text-right">'.$rekap_spj_kirim.'</td>
                                        <td class="text-right">'.$pro_kirim.'</td>
                                        <td></td>
                                        <td class="text-right">'.$rekap_spj_terima.'</td>
                                        <td class="text-right">'.$pro_terima.'</td>
                                        <td></td>
                                        <td></td>
                                    </tr>';
                            }
                            else {
                                echo '
                                    <tr>
                                        <td colspan="10">'.$r_spj["pesan_error"].'</td>
                                    </tr>
                                ';
                            }
                            ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
        <?php
    }
        }
        else {
            echo '<span class="alert alert-danger">'.$r_keg["pesan_error"].'</span>';
        }
    ?>
    
</div>