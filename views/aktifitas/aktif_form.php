<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Aktivitas Harian Pegawai</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url; ?>">Depan</a>
	</li>
	<li>
        <a href="<?php echo $url; ?>/aktifitas/">Aktifitas</a>
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
        <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tambah Aktifitas Hari Ini</h5>
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
                            <label for="aktif_redaksi" class="col-sm-2 control-label">Judul Kegiatan</label>
                                <div class="col-lg-10 col-sm-10">
                                    <div class="input-group margin-bottom-sm">
                                        <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                        <select data-placeholder="pilih redaksi..." class="form-control chosen-select"  tabindex="2">
                                        <option value="">Pilih Redaksi</option>
                                        <option value="">--==Buat baru redaksi==--</option>
                                        <?php
                                        $r_red=list_redaksi(0,false);
                                        if ($r_red["error"]==false) {
                                            $total_red=$r_red["red_total"];
                                            for ($i=1;$i<=$total_red;$i++) {
                                                 echo '<option value="'.$r_red["item"][$i]["red_id"].'">'.$r_red["item"][$i]["red_nama"].'</option>';
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
                                        <select class="pilih_data" name="aktif_nama_keg" id="aktif_nama_keg" style="font-family:'FontAwesome', Arial;">
                                        <option value="">Pilih Kegiatan Sebelumnya</option>
                                        <option value="">--==Buat baru kegiatan==--</option>
                                        <?php
                                        $r_keg=list_master_aktifitas(0,false,true);
                                        if ($r_keg["error"]==false) {
                                            $i=1;
                                            $total_keg=$r_keg["m_total"];
                                            for ($i=1;$i<=$total_keg;$i++) {
                                                 echo '<option value="'.$r_keg["item"][$i]["m_id"].'">'.$r_keg["item"][$i]["m_judul"].'</option>';
                                            }
                                        }
                                        else {
                                            echo '<option value="">'.$r_keg["pesan_error"].'</option>';
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
                            <label for="aktif_mulai" class="col-sm-2 control-label">Jam Mulai</label>

                                <div class="col-lg-3 col-sm-3" id="jam_mulai" data-placement="top" data-align="bottom" data-autoclose="true">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-clock-o fa-fw"></i></span>
                                    <input type="text" name="aktif_mulai" class="form-control" placeholder="Jam Mulai" required="" />
                                </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="aktif_selesai" class="col-sm-2 control-label">Jam Selesai</label>

                                <div class="col-lg-3 col-sm-3" id="jam_selesai" data-placement="top" data-align="bottom" data-autoclose="true">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-clock-o fa-fw"></i></span>
                                    <input type="text" name="aktif_selesai" class="form-control" placeholder="Jam Selesai" required="" />
                                </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                              <button type="submit" id="submit_unit" name="submit_unit" value="save" class="btn btn-primary">SAVE</button>
                            </div>
                        </div>
                </fieldset>
                </form>
                    </div>
                </div>
        </div>
        <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Aktifitas Hari Ini</h5>
                        <div class="ibox-tools">
                            
                        </div>
                    </div>
                    <div class="ibox-content">
                        
                    </div>
                </div>
        </div>
    </div>
</div>