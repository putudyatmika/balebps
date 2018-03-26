<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Data Master Unit Kerja</h2>
	<ol class="breadcrumb">
	<li>
		<a href="index.php">Depan</a>
	</li>
	<li>
		<a href="<?php echo $url; ?>/master/">Master</a>
	</li>
	<li>
        <a href="<?php echo $url; ?>/master/unitkerja/">Unit Kerja</a>
    </li>
    <li class="active">
        <strong>Tambah data</strong>
    </li>
	</ol>
	</div>
	<div class="col-lg-2">

	</div>
</div>
<div class="row wrapper wrapper-content animated fadeInRight">
	 <div class="row">
                <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit data unit kerja</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <?php
                    $unit_kode=$lvl4;
                    $r_prov=list_unitkerja($unit_kode,true,false,false,0);
                    if ($r_prov["error"]==false) {
                        $unit_nama=$r_prov["item"][1]["unit_nama"];
                        $unit_parent=$r_prov["item"][1]["unit_parent"];
                        $unit_jenis=$r_prov["item"][1]["unit_jenis"];
                        $unit_eselon_data=$r_prov["item"][1]["unit_eselon"];
                        
                    ?>
                        <form id="formUnitKerja" name="formUnitKerja" action="<?php echo $url.'/'.$page.'/'.$act;?>/update/"  method="post" class="form-horizontal" role="form">
        <fieldset>
        <div class="form-group">
            <label for="unit_kode" class="col-sm-2 control-label">Kode Unit</label>

                <div class="col-lg-4 col-sm-4">
                    <div class="input-group margin-bottom-sm">
                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                    <input type="text" name="unit_kode" class="form-control" value="<?php echo $unit_kode; ?>" placeholder="cth : 52720 (BPS Kota Bima)" disabled />
                </div>
                </div>
        </div>
        <div class="form-group">
            <label for="unit_nama" class="col-sm-2 control-label">Nama Unit</label>

                <div class="col-lg-8 col-sm-8">
                    <div class="input-group margin-bottom-sm">
                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                    <input type="text" name="unit_nama" class="form-control" value="<?php echo $unit_nama; ?>" placeholder="nama unit" />
                 </div>
                </div>
        </div>
        <div class="form-group">
            <label for="unit_parent" class="col-sm-2 control-label">Parent Unit</label>
                <div class="col-sm-6">
                    <div class="input-group margin-bottom-sm">
                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                    <select class="form-control" name="unit_parent" id="unit_parent" style="font-family:'FontAwesome', Arial;">
                        <option value="">Pilih</option>
                        <?php
                        $db = new db();
                        $conn = $db -> connect();
                        $sql_unit = $conn->query("select * from unitkerja where SUBSTRING(unit_kode,5,1)=0 order by unit_jenis,unit_kode asc");
                        while ($r = $sql_unit ->fetch_object()) {
                            if ($unit_parent==$r->unit_kode) $pilih='selected="selected"';
                            else $pilih='';
                            echo '<option value="'.$r->unit_kode.'" '.$pilih.'>['.$r->unit_kode.'] '.$r->unit_nama.'</option>'."\n";

                        }   ?>
                        </select>
                    </div>
                </div>
        </div>
        <div class="form-group">
            <label for="unit_jenis" class="col-sm-2 control-label">Jenis Unit</label>
                <div class="col-sm-4">
                    <div class="input-group margin-bottom-sm">
                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                    <select class="form-control" name="unit_jenis" id="unit_jenis" style="font-family:'FontAwesome', Arial;">
                        <option value="">Pilih</option>
                        <?php
                        $i=0;
                        for ($i=1;$i<=2;$i++)
                            {
                               if ($unit_jenis==$i) {
                                    $pilih2='selected="selected"';
                                }
                                else {
                                    $pilih2='';
                                }
                                echo '<option value="'.$i.'" '.$pilih2.'>'.$JenisUnit[$i].'</option>';
                            }
                        ?>
                        </select>
                    </div>
                </div>
        </div>
        <div class="form-group">
            <label for="unit_eselon" class="col-sm-2 control-label">Eselon</label>
                <div class="col-sm-4">
                    <div class="input-group margin-bottom-sm">
                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                    <select class="form-control" name="unit_eselon" id="unit_eselon" style="font-family:'FontAwesome', Arial;">
                        <option value="">Pilih Unit Eselon</option>
                        <?php
                        $i=1;
                        for ($i=1;$i<=4;$i++)
                            {
                               if ($unit_eselon_data==$i) {
                                    $pilih3='selected="selected"';
                                }
                                else {
                                    $pilih3='';
                                }
                                echo '<option value="'.$i.'" '.$pilih3.'>'.$unit_eselon[$i].'</option>';
                            }
                        ?>
                        </select>
                    </div>
                </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
              <button type="submit" id="submit_unit" name="submit_unit" value="update" class="btn btn-primary">UPDATE</button>
            </div>
        </div>
        <input type="hidden" name="unit_kode" value="<?php echo $unit_kode;?>" />
</fieldset>
</form>
                    <?php }
                    else {
                        echo $r_prov["pesan_error"];
                    }
                    ?>
                    </div>
                </div>
        </div>
        
    </div>
</div>
