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
		<strong>Input Kegiatan</strong>
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
     <div class="row">
        <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Form Input Kegiatan</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form id="formKegBaru" name="formKegBaru" action="<?php echo $url.'/'.$page;?>/save/"  method="post" class="form-horizontal well" role="form">
                            <fieldset>
                            <div class="form-group">
                                <label for="keg_nama" class="col-sm-2 control-label">Nama Keg</label>
                                    <div class="col-lg-10 col-sm-10">
                                        <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                        <input type="text" name="keg_nama" id="keg_nama" class="form-control" placeholder="nama unit" />
                                     </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="keg_unitkerja" class="col-sm-2 control-label">Unit Kerja</label>
                                    <div class="col-lg-9 col-sm-9">
                                        <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                        <select class="form-control" name="keg_unitkerja" id="keg_unitkerja">
                                            <option value="">Pilih</option>
                                            <?php
                                            $r_bidang=list_unitkerja(0,false,false,false,4);
                                            if ($r_bidang["error"]==false) {
                                                $bnyk_unit=$r_bidang["unit_total"];
                                                for ($u=1;$u<=$bnyk_unit;$u++) {
                                                    echo '<option value="'.$r_bidang["item"][$u]["unit_kode"].'">'.$r_bidang["item"][$u]["unit_nama"].'</option>';
                                                }
                                            }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="keg_jenis" class="col-sm-2 control-label">Jenis Kegiatan</label>
                                    <div class="col-sm-5 col-lg-5">
                                        <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                        <select class="form-control" name="keg_jenis" id="keg_jenis">
                                            <option value="">Pilih</option>
                                            <?php
                                            $i=0;
                                            for ($i=1;$i<=6;$i++)
                                                {
                                                    echo '<option value="'.$i.'">'.$JenisKegiatan[$i].'</option>';
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="keg_tglmulai" class="col-sm-2 control-label">Tgl Mulai</label>
                                    <div class="col-sm-5" id="tanggal_data">
                                        <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="text" name="keg_tglmulai" id="keg_tglmulai" class="form-control" placeholder="Format : YYYY-MM-DD" />
                                    </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="keg_tglmulai" class="col-sm-2 control-label">Tgl Berakhir</label>
                                    <div class="col-sm-5" id="tanggal_data">
                                        <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="text" name="keg_tglakhir" id="keg_tglakhir" class="form-control" placeholder="Format : YYYY-MM-DD" />
                                    </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="keg_satuan" class="col-sm-2 control-label">Satuan</label>
                                    <div class="col-sm-6">
                                        <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="text" name="keg_satuan" id="keg_satuan" class="form-control" placeholder="Satuan Kegiatan" />
                                    </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="keg_target" class="col-sm-2 control-label">Total Target</label>
                                    <div class="col-sm-6">
                                        <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="text" name="keg_target" id="keg_target" class="form-control target_total" placeholder="Total Target" />
                                    </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="keg_spj" class="col-sm-2 control-label">Laporan SPJ</label>
                                    <div class="col-sm-6">
                                        <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <select class="form-control" name="keg_spj" id="keg_spj">
                                            <option value="">Pilih</option>
                                            <?php
                                            $i=0;
                                            for ($i=1;$i<=2;$i++)
                                                {
                                                    echo '<option value="'.$i.'">'.$StatusSPJ[$i].'</option>';
                                                }
                                            ?>
                                            </select>
                                    </div>
                                    </div>
                            </div>
                           
                            
                    
                    </div>
                </div>
        </div>
    
        <div class="col-lg-5">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Target BPS Kabupaten/Kota</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="alert alert-danger">Kegiatan yang target kosong diisikan angka 0 (nol)</div>
                        <div class="table-responsive">
                       <table class="table table-striped table-hover" >
                            <thead>
                            <tr class="bg-success p-md">
                                <th class="text-center col-xs-8">Nama Unit</th>
                                <th class="text-center col-xs-2">Kegiatan</th>
                                <th class="text-center col-xs-2">SPJ</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $r_bidang=list_unitkerja(0,false,true,false,0);
                                if ($r_bidang["error"]==false) {
                                    $bnyk_unit=$r_bidang["unit_total"];
                                    for ($u=1;$u<=$bnyk_unit;$u++) {
                                        echo '<tr>
                                            <td>'.$r_bidang["item"][$u]["unit_nama"].'</td>
                                            <td><input type="text" name="keg_kabkota['.$r_bidang["item"][$u]["unit_kode"].']" id="keg_kabkota['.$r_bidang["item"][$u]["unit_kode"].']" class="form-control input-sm" placeholder="....." /></td>
                                            <td><input type="text" name="spj_kabkota['.$r_bidang["item"][$u]["unit_kode"].']" id="spj_kabkota['.$r_bidang["item"][$u]["unit_kode"].']" class="form-control input-sm" placeholder="....." /></td>
                                        </tr>
                                        ';
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                        <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-8">
                                  <button type="submit" id="submit_keg" name="submit_keg" value="save" class="btn btn-primary">SAVE</button>
                                </div>
                        </div>
                         </fieldset>
                         </form>
                     </div>
                    </div>
                </div>
        </div>
       
    </div>    
</div>