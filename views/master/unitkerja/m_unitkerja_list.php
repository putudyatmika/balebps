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
	<li class="active">
        <strong>Unit Kerja</strong>
    </li>
	</ol>
	</div>
	<div class="col-lg-2">
         <div class="title-action">
              <a href="<?php echo $url; ?>/master/unitkerja/add/" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        </div>
        
	</div>
</div>
<div class="row wrapper wrapper-content animated fadeInRight">
	 <div class="row">
        <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Unit Kerja Provinsi</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                      <div class="table-responsive">
                    <table class="table table-striped table-hover dataPegawaiPNS" >
                    <thead>
                    <tr>
                        <th class="text-center">Kode</th>
                        <th class="text-center">Nama Unit</th>
                        <th class="text-center">Parent</th>
                        <th class="text-center">Jenis</th>
                        <th class="text-center">Eselon</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $r_prov=list_unitkerja(0,false,false,false,0);
                    if ($r_prov["error"]==false) {
                        $i=1;
                        $max_unit=$r_prov["unit_total"];
                        for ($i=1;$i<=$max_unit;$i++) {
                            echo '
                                <tr>
                                    <td>'.$r_prov["item"][$i]["unit_kode"].'</td>
                                    <td>'.$r_prov["item"][$i]["unit_nama"].'</td>
                                    <td>'.$r_prov["item"][$i]["parent_nama"].'</td>
                                    <td>'.$JenisUnit[$r_prov["item"][$i]["unit_jenis"]].'</td>
                                    <td>'.$unit_eselon[$r_prov["item"][$i]["unit_eselon"]].'</td>
                                    <td><a href="'.$url.'/'.$page.'/'.$act.'/view/'.$r_prov["item"][$i]["unit_kode"].'"><i class="fa fa-search text-success" aria-hidden="true"></i></a> <a href="'.$url.'/'.$page.'/'.$act.'/edit/'.$r_prov["item"][$i]["unit_kode"].'"><i class="fa fa-pencil-square text-info" aria-hidden="true"></i></a> <a href="'.$url.'/'.$page.'/'.$act.'/delete/'.$r_prov["item"][$i]["unit_kode"].'" data-confirm="Apakah data ('.$r_prov["item"][$i]["unit_kode"].') '.$r_prov["item"][$i]["unit_nama"].' ini akan di hapus?"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a></td>
                                </tr>
                            ';
                        }
                    }
                    else {
                        echo '<tr>
                            <td colspan="7">Data masing kosong</td>
                        </tr>';
                    }
                    ?>    
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="text-center">Kode</th>
                        <th class="text-center">Nama Unit</th>
                        <th class="text-center">Parent</th>
                        <th class="text-center">Jenis</th>
                        <th class="text-center">Eselon</th>
                        <th class="text-center">Status</th>
                        <th>&nbsp;</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Unit Kerja Kabupaten</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <div class="table-responsive">
                    <table class="table table-striped table-hover dataPegawaiPNS" >
                    <thead>
                    <tr>
                        <th class="text-center">Kode</th>
                        <th class="text-center">Nama Unit</th>
                        <th class="text-center">Parent</th>
                        <th class="text-center">Jenis</th>
                        <th class="text-center">Eselon</th>
                        <th class="text-center">Status</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                    $r_prov=list_unitkerja(0,false,true,false,0);
                    if ($r_prov["error"]==false) {
                        $i=1;
                        $max_unit=$r_prov["unit_total"];
                        for ($i=1;$i<=$max_unit;$i++) {
                            echo '
                                <tr>
                                    <td>'.$r_prov["item"][$i]["unit_kode"].'</td>
                                    <td>'.$r_prov["item"][$i]["unit_nama"].'</td>
                                    <td>'.$r_prov["item"][$i]["parent_nama"].'</td>
                                    <td>'.$JenisUnit[$r_prov["item"][$i]["unit_jenis"]].'</td>
                                    <td>'.$unit_eselon[$r_prov["item"][$i]["unit_eselon"]].'</td>
                                    <td><a href="'.$url.'/'.$page.'/'.$act.'/view/'.$r_prov["item"][$i]["unit_kode"].'"><i class="fa fa-search text-success" aria-hidden="true"></i></a> <a href="'.$url.'/'.$page.'/'.$act.'/edit/'.$r_prov["item"][$i]["unit_kode"].'"><i class="fa fa-pencil-square text-info" aria-hidden="true"></i></a> <a href="'.$url.'/'.$page.'/'.$act.'/delete/'.$r_prov["item"][$i]["unit_kode"].'" data-confirm="Apakah data ('.$r_prov["item"][$i]["unit_kode"].') '.$r_prov["item"][$i]["unit_nama"].' ini akan di hapus?"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a></td>
                                </tr>
                            ';
                        }
                    }
                    else {
                        echo '<tr>
                            <td colspan="7">Data masing kosong</td>
                        </tr>';
                    }
                    ?>        
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="text-center">Kode</th>
                        <th class="text-center">Nama Unit</th>
                        <th class="text-center">Parent</th>
                        <th class="text-center">Jenis</th>
                        <th class="text-center">Eselon</th>
                        <th class="text-center">Status</th>
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
