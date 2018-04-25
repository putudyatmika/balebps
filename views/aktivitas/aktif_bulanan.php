<?php
if (isset($_POST['bln_pilih'])) { $bln_pilih=$_POST['bln_pilih']; }
else { $bln_pilih=date("n"); }

if (isset($_POST['thn_pilih'])) { $thn_pilih=$_POST['thn_pilih']; }
else { $thn_pilih=date("Y"); }
?>
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Aktivitas Harian Pegawai</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url; ?>">Depan</a>
	</li>
	<li class="active">
		<strong>Aktivitas Harian</strong>
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
       <?php
        if ($_SESSION['sesi_peg_jabatan']==1) {
        ?>
        <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?php echo $_SESSION['sesi_peg_unitnama']; ?></h5>
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
                                $thn_skrg=date("Y");
                                for ($j=($thn_skrg-2);$j<=$thn_skrg;$j++) {
                                    if ($j==$thn_pilih) { $pilih_thn='selected="selected"'; }
                                    else { $pilih_thn=''; }
                                    echo '<option value="'.$j.'" '.$pilih_thn.'>'.$j.'</option>';

                                }
                                ?>
                            </select>
                          </div>
                          <button type="submit" name="view_harian" class="btn btn-primary">View Data</button>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover" >
                            <thead>
                            <tr>
                                <th class="text-center" width="15%">Nama</th>
                                <th class="text-center">Jabatan</th>
                                <th class="text-center" colspan="3">Kegiatan</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $unit_kode=$_SESSION['sesi_peg_unitkerja'];
                            $unit_eselon=$_SESSION['sesi_peg_uniteselon'];
                            if ($_SESSION['sesi_peg_jabatan']==1 and $_SESSION['sesi_peg_uniteselon']<=3) {
                                //kepala bidang/bps 
                                $r_peg=list_bawahan_pegawai($unit_kode,false,$unit_eselon);
                            }
                            else {
                                //untuk kasie
                                $r_peg=list_bawahan_pegawai($unit_kode,true,$unit_eselon);
                            }
                            $tgl_awalku = strtotime($thn_pilih.'-'.$bln_pilih.'-1');
                            $tgl_akhir = date("Y-m-t",$tgl_awalku);
                            $tgl_awal = date("Y-m-d",$tgl_awalku);
                            $tgl_n=date("d",strtotime($tgl_akhir));
                            //$peg_id=$_SESSION["sesi_peg_id"];
                            for ($j = 0; $j < $tgl_n; $j++) {
                                    //$timestamp = time();
                                    $timestamp = strtotime($tgl_akhir);
                                    $tm = 86400 * $j; // 60 * 60 * 24 = 86400 = 1 day in seconds
                                    $tm = $timestamp - $tm;
                                    $tgl_dipilih=date("Y-m-d", $tm);
                                    echo  '<tr><td colspan="5"><strong>'.tgl_convert(1,$tgl_dipilih).'</strong></td></tr>';
                                    
                            //cek tgl hari dulu
                                    if (cek_hari_kerja($tgl_dipilih)==true) {
                                         echo '<tr>
                                                <td colspan="5"><span class="label label-default">Hari Libur</span></td>
                                                </tr>';
                                    }
                                    else {
                                        //cek lagi apakah hari besar apa tidak
                                        $r_libur=cek_hari_libur($tgl_dipilih);
                                        if ($r_libur["error"]==false) {
                                            echo '<tr>
                                                <td colspan="5"><span class="label label-success">'.$r_libur["libur_ket"].'</span></td>
                                                </tr>';
                                        }
                                        else {
                                           //ada hari kerja dan kegiatan
                                            //check error bawahannya
                                            if ($r_peg["error"]==false) {
                                                $jml_peg=$r_peg["peg_total"];
                                                for ($p=1;$p<=$jml_peg;$p++) {
                                                    $r_keg_peg=list_aktivitas_harian(0,$tgl_dipilih,false,$r_peg["item"][$p]["peg_id"]);
                                                    if ($r_keg_peg["error"]==false) {
                                                        $total_keg=$r_keg_peg["aktif_total"];
                                                        if ($total_keg>1) {
                                                            //lebih dari 1 kegiatan
                                                             echo '<tr>
                                                            <td rowspan="'.$total_keg.'">'.$r_peg["item"][$p]["peg_nama"].'</td>
                                                            <td rowspan="'.$total_keg.'">'.$JenisJabatan[$r_peg["item"][$p]["peg_jabatan"]].' '.$r_peg["item"][$p]["unit_nama"].'</td>
                                                            <td width="9%">'.date("H:i",strtotime($r_keg_peg["item"][1]["aktif_awal"])).' - '.date("H:i",strtotime($r_keg_peg["item"][1]["aktif_akhir"])).'</td>
                                                            <td>'.$r_keg_peg["item"][1]["m_redaksi"].'</td>
                                                            <td>'.$r_keg_peg["item"][1]["aktif_target"].' '.$r_keg_peg["item"][1]["aktif_satuan"].'</td>
                                                            </tr>'; 
                                                            for ($k=2;$k<=$total_keg;$k++) {
                                                                echo '
                                                                    <tr>
                                                                        <td>'.date("H:i",strtotime($r_keg_peg["item"][$k]["aktif_awal"])).' - '.date("H:i",strtotime($r_keg_peg["item"][$k]["aktif_akhir"])).'</td>
                                                            <td>'.$r_keg_peg["item"][$k]["m_redaksi"].'</td>
                                                            <td width="10%">'.$r_keg_peg["item"][$k]["aktif_target"].' '.$r_keg_peg["item"][$k]["aktif_satuan"].'</td>
                                                                    </tr>
                                                                ';
                                                            }
                                                            //batas lebih dari 1 kegiatan
                                                        }
                                                        else {
                                                            //hanya 1 kegiatan
                                                             echo '<tr>
                                                            <td>'.$r_peg["item"][$p]["peg_nama"].'</td>
                                                            <td>'.$JenisJabatan[$r_peg["item"][$p]["peg_jabatan"]].' '.$r_peg["item"][$p]["unit_nama"].'</td>
                                                            <td>'.date("H:i",strtotime($r_keg_peg["item"][1]["aktif_awal"])).' - '.date("H:i",strtotime($r_keg_peg["item"][1]["aktif_akhir"])).'</td>
                                                            <td>'.$r_keg_peg["item"][1]["m_redaksi"].'</td>
                                                            <td>'.$r_keg_peg["item"][1]["aktif_target"].' '.$r_keg_peg["item"][1]["aktif_satuan"].'</td>
                                                            </tr>'; 
                                                        }
                                                       
                                                    }
                                                    else {
                                                       //kegiatan belum di entri
                                                        echo '<tr>
                                                        <td>'.$r_peg["item"][$p]["peg_nama"].'</td>
                                                        <td>'.$JenisJabatan[$r_peg["item"][$p]["peg_jabatan"]].' '.$r_peg["item"][$p]["unit_nama"].'</td>
                                                        <td colspan="3" class="text-center"><span class="label label-danger">'.$r_keg_peg["pesan_error"].'</span></td>
                                                        </tr>';  
                                                    }
                                                      
                                                }
                                                
                                            }
                                            else {
                                                //tidak ada bawahan
                                                echo '<tr>
                                                <td colspan="5" class="text-center"><span class="label label-danger text-center">'.$r_peg["pesan_error"].'</span></td>
                                                </tr>';
                                            }
                                            
                                        }
                                    }
                            }
                            ?>   
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
        <?php } ?>
    </div>
</div>