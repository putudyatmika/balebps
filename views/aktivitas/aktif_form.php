<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Aktivitas Harian Pegawai</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url; ?>">Depan</a>
	</li>
	<li>
        <a href="<?php echo $url; ?>/aktivitas/">Aktifitas</a>
    </li>
    <li class="active">
        <strong>Tambah Data</strong>
    </li>

	</ol>
	</div>
	<div class="col-lg-2">

	</div>
</div>
<div class="row wrapper wrapper-content animated fadeInRightBig">
    <div class="row">
        <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tambah Aktivitas Harian</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form id="formAddAktifitas" name="formAddAktifitas" action="<?php echo $url.'/'.$page;?>/save/"  method="post" class="form-horizontal" role="form">
                        <fieldset>
                        <div class="form-group">
                            <label for="aktif_tanggal" class="col-sm-2 control-label">Tanggal</label>

                                <div class="col-lg-4 col-sm-4" id="tanggal_data">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                    <input type="text" name="aktif_tanggal" class="form-control" placeholder="Tanggal Aktif" required="" />
                                </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="aktif_mulai" class="col-sm-2 control-label">Jam Mulai</label>

                                <div class="col-lg-4 col-sm-4" id="jam_mulai" data-placement="top" data-align="bottom" data-autoclose="true">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-clock-o fa-fw"></i></span>
                                    <input type="text" name="aktif_mulai" class="form-control" placeholder="Jam Mulai" required="" />
                                </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="aktif_selesai" class="col-sm-2 control-label">Jam Selesai</label>

                                <div class="col-lg-4 col-sm-4" id="jam_selesai" data-placement="top" data-align="bottom" data-autoclose="true">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-clock-o fa-fw"></i></span>
                                    <input type="text" name="aktif_selesai" class="form-control" placeholder="Jam Selesai" required="" />
                                </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="aktif_redaksi" class="col-sm-2 control-label">Judul Kegiatan</label>
                                <div class="col-lg-10 col-sm-10">
                                    <div class="input-group margin-bottom-sm">
                                        <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                        <select name="m_redaksi" data-placeholder="pilih redaksi..." class="form-control chosen-select"  tabindex="2">
                                        <option value="">Pilih Redaksi</option>
                                        <option value="">--==Buat baru redaksi==--</option>
                                        <?php
                                        $r_red=list_redaksi(0,false);
                                        if ($r_red["error"]==false) {
                                            $total_red=$r_red["red_total"];
                                            for ($i=1;$i<=$total_red;$i++) {
                                                 echo '<option value="'.$r_red["item"][$i]["red_id"].';'.$r_red["item"][$i]["red_nama"].'">'.$r_red["item"][$i]["red_nama"].'</option>';
                                            }
                                        }
                                        else {
                                            echo '<option value="">'.$r_red["pesan_error"].'</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="aktif_nama_keg" class="col-sm-2 control-label">&nbsp;</label>
                                <div class="col-lg-10 col-sm-10">
                                    <div class="input-group margin-bottom-sm">
                                        <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                        <select class="form-control chosen-select" name="aktif_nama_keg" id="aktif_nama_keg" tabindex="3" >
                                        <option value="">Pilih Kegiatan Sebelumnya</option>
                                        <option value="">--==Buat baru kegiatan==--</option>
                                        <?php
                                        $r_keg=list_master_aktivitas(0,false,true);
                                        if ($r_keg["error"]==false) {
                                            $i=1;
                                            $total_keg=$r_keg["m_total"];
                                            for ($i=1;$i<=$total_keg;$i++) {
                                                 echo '<option value="'.$r_keg["item"][$i]["m_id"].';'.$r_keg["item"][$i]["m_judul"].'">'.$r_keg["item"][$i]["m_judul"].'</option>';
                                            }
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="aktif_nama_kegiatan" class="col-sm-2 control-label">&nbsp;</label>
                                <div class="col-lg-10 col-sm-10">                               
                                   <div class="input-group margin-bottom-sm">
                                         <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                        <input type="text" name="aktif_nama_kegiatan" class="form-control" placeholder="Input baru kegiatan / Menambahkan redaksi kegiatan" />
                                    </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="aktif_target" class="col-sm-2 control-label">Target</label>

                                <div class="col-lg-4 col-sm-4">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="text" name="aktif_target" class="form-control" placeholder="Target" required="" />
                                </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="aktif_satuan" class="col-sm-2 control-label">Satuan</label>

                                <div class="col-lg-4 col-sm-4">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="text" name="aktif_satuan" class="form-control" placeholder="Satuan" required="" />
                                </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                              <button type="submit" id="submit_redaksi" name="submit_redaksi" value="save" class="btn btn-primary">SAVE</button>
                            </div>
                        </div>
                </fieldset>
                </form>
                    </div>
                </div>
        </div>
        <div class="col-lg-5">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Aktivitas 3 Harian</h5>
                        <div class="ibox-tools">
                            
                        </div>
                    </div>
                    <div class="ibox-content">
                    <?php
                     $tgl_aktif=date("Y-m-d");
                     
                    ?>
                    <h3><?php echo tgl_convert(1,$tgl_aktif); ?></h3>
                    <?php
                    
                    $peg_id=$_SESSION["sesi_peg_id"];
                    $r_list=list_aktivitas_harian(0,$tgl_aktif,false,$peg_id);
                    ?>
                    <div class="table-responsive">
                    <table class="table table-striped table-hover" >
                    <thead>
                    <tr>
                        <th class="text-center" width="15%">Waktu</th>
                        <th class="text-center">Kegiatan</th>
                        <th class="text-center">Target</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (cek_hari_kerja($tgl_aktif)==true) {
                         echo '<tr>
                                <td colspan="4"><span class="label label-primary">Hari Libur</span></td>
                                </tr>';
                        }
                        else {
                            //cek lagi apakah hari besar apa tidak
                            $r_libur=cek_hari_libur($tgl_aktif);
                            if ($r_libur["error"]==false) {
                                echo '<tr>
                                    <td colspan="4"><span class="label label-success">'.$r_libur["libur_ket"].'</span></td>
                                    </tr>';
                            }
                        else {
                            if ($r_list["error"]==false) {
                                $max_data=$r_list["aktif_total"];
                                for ($i=1;$i<=$max_data;$i++) {
                                    echo '
                                        <tr>
                                            <td>'.date("H:i",strtotime($r_list["item"][$i]["aktif_awal"])).' - '.date("H:i",strtotime($r_list["item"][$i]["aktif_akhir"])).'</td>
                                            <td>'.$r_list["item"][$i]["m_redaksi"].'</td>
                                            <td>'.$r_list["item"][$i]["aktif_target"].' '.$r_list["item"][$i]["aktif_satuan"].'</td>
                                            <td><a href="'.$url.'/'.$page.'/edit/'.$r_list["item"][$i]["aktif_id"].'"><i class="fa fa-pencil-square text-info" aria-hidden="true"></i></a> <a href="'.$url.'/'.$page.'/delete/'.$r_list["item"][$i]["aktif_id"].'" data-confirm="Apakah data ('.$r_list["item"][$i]["aktif_id"].') '.$r_list["item"][$i]["m_redaksi"].' ini akan di hapus?"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a></td>
                                        </tr>
                                    ';
                                }
                            }
                            else {
                                echo '<tr>
                                <td colspan="4">Data tidak tersedia</td>
                                </tr>';
                            }
                        }
                    }
                        ?>     
                    </tbody>
                    </table>
                        </div>
                        <?php 
                    //hari sebelumnya (1 hari)
                    $tgl_kmrn=date("Y-m-d",strtotime('-1 day',strtotime($tgl_aktif)));
                    echo '<h3>'.tgl_convert(1,$tgl_kmrn).'</h3>';
                    
                    $peg_id=$_SESSION["sesi_peg_id"];
                    $r_list=list_aktivitas_harian(0,$tgl_kmrn,false,$peg_id);
                    ?>
                    <div class="table-responsive">
                    <table class="table table-striped table-hover" >
                    <thead>
                    <tr>
                        <th class="text-center" width="15%">Waktu</th>
                        <th class="text-center">Kegiatan</th>
                        <th class="text-center">Target</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (cek_hari_kerja($tgl_kmrn)==true) {
                         echo '<tr>
                                <td colspan="4"><span class="label label-primary">Hari Libur</span></td>
                                </tr>';
                    }
                    else {
                        //cek lagi apakah hari besar apa tidak
                        $r_libur=cek_hari_libur($tgl_kmrn);
                        if ($r_libur["error"]==false) {
                            echo '<tr>
                                <td colspan="4"><span class="label label-success">'.$r_libur["libur_ket"].'</span></td>
                                </tr>';
                        }
                        else {
                            if ($r_list["error"]==false) {
                                $max_data=$r_list["aktif_total"];
                                for ($i=1;$i<=$max_data;$i++) {
                                    echo '
                                        <tr>
                                            <td>'.date("H:i",strtotime($r_list["item"][$i]["aktif_awal"])).' - '.date("H:i",strtotime($r_list["item"][$i]["aktif_akhir"])).'</td>
                                            <td>'.$r_list["item"][$i]["m_redaksi"].'</td>
                                            <td>'.$r_list["item"][$i]["aktif_target"].' '.$r_list["item"][$i]["aktif_satuan"].'</td>
                                            <td><a href="'.$url.'/'.$page.'/edit/'.$r_list["item"][$i]["aktif_id"].'"><i class="fa fa-pencil-square text-info" aria-hidden="true"></i></a> <a href="'.$url.'/'.$page.'/delete/'.$r_list["item"][$i]["aktif_id"].'" data-confirm="Apakah data ('.$r_list["item"][$i]["aktif_id"].') '.$r_list["item"][$i]["m_redaksi"].' ini akan di hapus?"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a></td>
                                        </tr>
                                    ';
                                }
                            }
                            else {
                                echo '<tr>
                                <td colspan="4">Data tidak tersedia</td>
                                </tr>';
                            }
                        }
                    }
                    ?>     
                    </tbody>
                    </table>
                    </div>
                    <!--2 hari yang lalu-->
                        <h3><?php 
                    $tgl_lusa=date("Y-m-d",strtotime('-1 day',strtotime($tgl_kmrn)));
                    echo tgl_convert(1,$tgl_lusa); ?></h3>
                    <?php
                    //$tgl_aktif=date("Y-m-d");
                    $peg_id=$_SESSION["sesi_peg_id"];
                    $r_list=list_aktivitas_harian(0,$tgl_lusa,false,$peg_id);
                    ?>
                    <div class="table-responsive">
                    <table class="table table-striped table-hover" >
                    <thead>
                    <tr>
                        <th class="text-center" width="15%">Waktu</th>
                        <th class="text-center">Kegiatan</th>
                        <th class="text-center">Target</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (cek_hari_kerja($tgl_lusa)==true) {
                         echo '<tr>
                                <td colspan="4"><span class="label label-primary">Hari Libur</span></td>
                                </tr>';
                    }
                    else {
                        //cek lagi apakah hari besar apa tidak
                        $r_libur=cek_hari_libur($tgl_lusa);
                        if ($r_libur["error"]==false) {
                            echo '<tr>
                                <td colspan="4"><span class="label label-success">'.$r_libur["libur_ket"].'</span></td>
                                </tr>';
                        }
                        else {
                        if ($r_list["error"]==false) {
                            $max_data=$r_list["aktif_total"];
                            for ($i=1;$i<=$max_data;$i++) {
                                echo '
                                    <tr>
                                        <td>'.date("H:i",strtotime($r_list["item"][$i]["aktif_awal"])).' - '.date("H:i",strtotime($r_list["item"][$i]["aktif_akhir"])).'</td>
                                        <td>'.$r_list["item"][$i]["m_redaksi"].'</td>
                                        <td>'.$r_list["item"][$i]["aktif_target"].' '.$r_list["item"][$i]["aktif_satuan"].'</td>
                                        <td><a href="'.$url.'/'.$page.'/edit/'.$r_list["item"][$i]["aktif_id"].'"><i class="fa fa-pencil-square text-info" aria-hidden="true"></i></a> <a href="'.$url.'/'.$page.'/delete/'.$r_list["item"][$i]["aktif_id"].'" data-confirm="Apakah data ('.$r_list["item"][$i]["aktif_id"].') '.$r_list["item"][$i]["m_redaksi"].' ini akan di hapus?"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a></td>
                                    </tr>
                                ';
                            }
                        }
                        else {
                            echo '<tr>
                            <td colspan="4">Data tidak tersedia</td>
                            </tr>';
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
    </div>
</div>