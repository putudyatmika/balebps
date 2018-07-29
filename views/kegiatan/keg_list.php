<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Kegiatan</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url;?>">Depan</a>
	</li>
	<li class="active">
		<strong>Kegiatan</strong>
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
<div class="row wrapper wrapper-content animated fadeInRightBig">
    <div class="row">
        <div class="col-lg-12 col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Kegiatan</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content tooltip-bps">
                    	<form class="form-inline" method="post">
                          <div class="form-group">
                            <label for="sdate">Pilih</label>
                            <select name="bln_pilih" class="form-control">
                                <option value="">Bulan</option>
                                <?php 
                                
                                for ($i=1;$i<=12;$i++) {
                                    if ($i==$bln_pilih) { $pilih_bln='selected="selected"'; }
                                    else { $pilih_bln=''; }
                                    echo '<option value="'.$i.'" '.$pilih_bln.'>'.$nama_bulan_panjang[$i].'</option>';
                                }
                                ?>
                            </select>
                             <select name="thn_pilih" class="form-control">
                                <option value="">Tahun</option>
                                <?php
                                $r_thn=list_tahun_kegiatan();
                                if ($r_thn["error"]==false) {
                                	$bnyk_thn=$r_thn["thn_total"];
                                	 for ($j=1;$j<=$bnyk_thn;$j++) {
	                                    if ($r_thn["item"][$j]["thn_keg"]==$thn_pilih) { $pilih_thn='selected="selected"'; }
	                                    else { $pilih_thn=''; }
	                                    echo '<option value="'.$r_thn["item"][$j]["thn_keg"].'" '.$pilih_thn.'>'.$r_thn["item"][$j]["thn_keg"].'</option>';

	                                }
                                }
                                else {
                                	$thn_skrg=date("Y");
	                                for ($j=($thn_skrg-2);$j<=$thn_skrg;$j++) {
	                                    if ($j==$thn_pilih) { $pilih_thn='selected="selected"'; }
	                                    else { $pilih_thn=''; }
	                                    echo '<option value="'.$j.'" '.$pilih_thn.'>'.$j.'</option>';

	                                }
                                }
                                
                                ?>
                            </select>
                          </div>
                          <button type="submit" name="view_harian" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View data sesuai bulan">View Data</button>
                        </form>
                    	 <div class="table-responsive">
                            <table class="table table-striped table-hover dataPegawaiPNS" >
                            <thead>
                            <tr class="bg-success p-md">
                                <th class="text-center" width="3%">No</th>
                                <th class="text-center">Kegiatan</th>
                                <th class="text-center">Unit Kerja</th>
                                <th class="text-center">Tipe</th>
                                <th class="text-center">Tanggal Berakhir</th>
                                <th class="text-center">Target</th>
                                <th class="text-center">Satuan</th>
                                <th class="text-center">SPJ</th>
                                <th class="text-center" width="5%">Progress Kirim</th>
                            <?php if ($_SESSION['sesi_level'] > 2) { ?><th width="5%">&nbsp;</th> <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $r_keg=list_kegiatan(0,false,false,$bln_pilih,$thn_pilih);
                            if ($r_keg["error"]==false) {
                            	$keg_total=$r_keg["keg_total"];
						        for ($i=1;$i<=$keg_total;$i++) {
                                    //progress bar 1 kegiatan
                                    $progress_kirim=0;
                                    $progress_terima=0;
                                    $r_jenis=progress_kegiatan($r_keg["item"][$i]["keg_id"]);
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
                                    $progress_kirim=($jumlah_kirim/$r_keg["item"][$i]["keg_total_target"])*100;
                                    $progress_terima=($jumlah_terima/$r_keg["item"][$i]["keg_total_target"])*100;
                                    $progress_kirim=number_format($progress_kirim,2,".",",");
                                    $progress_terima=number_format($progress_terima,2,".",",");
                                    //tipe kegiatan
                                    if ($r_keg["item"][$i]["keg_tipe"]==1) {
                                        //provinsi
                                        $kegiatan_tipe='<span class="label label-primary">'.$KegiatanTipe[$r_keg["item"][$i]["keg_tipe"]].'</span>';
                                    }
                                    else {
                                        $kegiatan_tipe='<span class="label label-danger">'.$KegiatanTipe[$r_keg["item"][$i]["keg_tipe"]].'</span>';
                                    }
                                    //batasnya
						            echo '
						            <tr>
						                <td class="text-center"><span class="label label-success">'.$i.'</span></td>
						                <td class="text-left"><a href="'.$url.'/kegiatan/view/'.$r_keg["item"][$i]["keg_id"].'">'.$r_keg["item"][$i]["keg_nama"].'</a></td>
                                        <td>'.$r_keg["item"][$i]["keg_unitnama"].'</td>
                                        <td>'.$kegiatan_tipe.'</td>
						                <td class="text-right">'.tgl_convert_bln(1,$r_keg["item"][$i]["keg_end"]).'</td>
						                <td class="text-right">'.$r_keg["item"][$i]["keg_total_target"].'</td>
						                <td>'.$r_keg["item"][$i]["keg_target_satuan"].'</td>
						                <td>'.$StatusSPJ[$r_keg["item"][$i]["keg_spj"]].'</td>
                                        <td class="bg-warning"> <div class="progress progress-striped active m-b-sm">
                                                <div style="width: '.$progress_kirim.'%;" class="progress-bar"></div>
                                            </div></td>';
                                            if ($_SESSION['sesi_level'] > 2) {
                                    echo '<td class="text-center"><div class="tooltip-bps"><a href="'.$url.'/'.$page.'/edit/'.$r_keg["item"][$i]["keg_id"].'" class="btn btn-warning btn-rounded btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Kegiatan"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="'.$url.'/'.$page.'/delete/'.$r_keg["item"][$i]["keg_id"].'" data-confirm="Apakah data ('.$r_keg["item"][$i]["keg_id"].') '.$r_keg["item"][$i]["keg_nama"].' ini akan di hapus?" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus Kegiatan"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div></td>'; }
						            echo '</tr>';
						        }
                            }
                            else {
                            	echo '
                            		<tr><td>'.$r_keg["pesan_error"].'</td></tr>
                            	';
                            }
                            ?> 
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Kegiatan</th>
                                <th class="text-center">Unit Kerja</th>
                                <th class="text-center">Tipe</th>
                                <th class="text-center">Tanggal Berakhir</th>
                                <th class="text-center">Target</th>
                                <th class="text-center">Satuan</th>
                                <th class="text-center">SPJ</th>
                                <th class="text-center">Progress Kirim</th>
                                <?php if ($_SESSION['sesi_level'] > 2) { ?><th width="5%">&nbsp;</th> <?php } ?>
                            </tr>
                            </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
        
    </div>
</div>