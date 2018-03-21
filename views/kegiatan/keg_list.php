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
                    <div class="ibox-content">
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
                          <button type="submit" name="view_harian" class="btn btn-primary">View Data</button>
                        </form>
                    	 <div class="table-responsive">
                            <table class="table table-striped table-hover dataPegawaiPNS" >
                            <thead>
                            <tr>
                                <th class="text-center" width="3%">No</th>
                                <th class="text-center">Kegiatan</th>
                                <th class="text-center">Unit Kerja</th>
                                <th class="text-center">Tanggal Berakhir</th>
                                <th class="text-center">Target</th>
                                <th class="text-center">Satuan</th>
                                <th class="text-center">SPJ</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $r_keg=list_kegiatan(0,false,false,$bln_pilih,$thn_pilih);
                            if ($r_keg["error"]==false) {
                            	$keg_total=$r_keg["keg_total"];
						        for ($i=1;$i<=$keg_total;$i++) {
						            echo '
						            <tr>
						                <td class="text-center"><span class="label label-success">'.$i.'</span></td>
						                <td class="text-left"><a href="'.$url.'/kegiatan/view/'.$r_keg["item"][$i]["keg_id"].'">'.$r_keg["item"][$i]["keg_nama"].'</a></td>
						                <td>'.$r_keg["item"][$i]["keg_unitnama"].'</td>
						                <td class="text-right"><span class="label label-primary">'.tgl_convert_pendek_bulan(1,$r_keg["item"][$i]["keg_end"]).'</span></td>
						                <td class="text-right">'.$r_keg["item"][$i]["keg_total_target"].'</td>
						                <td>'.$r_keg["item"][$i]["keg_target_satuan"].'</td>
						                <td>'.$StatusSPJ[$r_keg["item"][$i]["keg_spj"]].'</td>
						                <td><a href="'.$url.'/'.$page.'/edit/'.$r_keg["item"][$i]["keg_id"].'"><i class="fa fa-pencil-square text-info" aria-hidden="true"></i></a> <a href="'.$url.'/'.$page.'/delete/'.$r_keg["item"][$i]["keg_id"].'" data-confirm="Apakah data ('.$r_keg["item"][$i]["keg_id"].') '.$r_keg["item"][$i]["keg_nama"].' ini akan di hapus?"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a></td>
						            </tr>
						            ';
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
                                <th class="text-center">Tanggal Berakhir</th>
                                <th class="text-center">Target</th>
                                <th class="text-center">Satuan</th>
                                <th class="text-center">SPJ</th>
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