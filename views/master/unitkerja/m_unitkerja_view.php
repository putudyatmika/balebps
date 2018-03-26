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
        <strong>View data</strong>
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
                        <h5>View data Unit Kerja</h5>
                        
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

                        $nama_unit=get_nama_unit($unit_parent);
                        $nama_user_buat=get_idnama_users($r_prov["item"][1]["unit_dibuat_oleh"]);
                        $nama_user_update=get_idnama_users($r_prov["item"][1]["unit_diupdate_oleh"]);
                        $dibuat_tgl=tgl_convert_waktu(1,$r_prov["item"][1]["unit_dibuat_waktu"]);
                        $diupdate_tgl=tgl_convert_waktu(1,$r_prov["item"][1]["unit_diupdate_waktu"]);
                    ?>
                    <div class="table-responsive">
                    <table class="table table-hover table-striped table-condensed">
                    <tr>
                        <td class="text-right"><strong>Unit Kode</strong></td>
                        <td><?php echo $unit_kode;?></td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>Nama Unit</strong></td>
                        <td><?php echo $unit_nama;?></td>
                    </tr>
                    <tr>    
                        <td class="text-right"><strong>Parent</strong></td>
                        <td><?php echo $nama_unit;?></td>
                    </tr>
                    <tr>    
                        <td class="text-right"><strong>Dibuat Oleh</strong></td>
                        <td><?php echo $nama_user_buat;?></td>
                    </tr>
                    <tr>    
                        <td class="text-right"><strong>Dibuat tanggal</strong></td>
                        <td><?php echo $dibuat_tgl;?></td>
                    </tr>
                    <tr>    
                        <td class="text-right"><strong>Diupdate Oleh</strong></td>
                        <td><?php echo $nama_user_update;?></td>
                    </tr>
                    <tr>    
                        <td class="text-right"><strong>Diupdate tanggal</strong></td>
                        <td><?php echo $diupdate_tgl;?></td>
                    </tr>
                    <tr>    
                        <td class="text-right"><strong>Jenis</strong></td>
                        <td><?php echo $JenisUnit[$unit_jenis];?></td>
                    </tr>
                    <tr>    
                        <td class="text-right"><strong>Eselon Unit</strong></td>
                        <td><?php echo $unit_eselon[$unit_eselon_data];?></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td>
                        <?php
                        echo '
                        <a href="'.$url.'/'.$page.'/'.$act.'/edit/'.$unit_kode.'" class="btn btn-success"><i class="fa fa-pencil fa-lg"></i></a>
                        <a href="'.$url.'/'.$page.'/'.$act.'/delete/'.$unit_kode.'" class="btn btn-danger" data-confirm="Apakah data ('.$unit_kode.') '.$unit_nama.' ini akan di hapus?"><i class="fa fa-trash fa-lg"></i></a>';
                        ?>
                    </td>
                    </tr>
                    </table>
                    </div>

                    <?php
                    }
                    else {
                        echo 'Data Unit Kerja tidak tersedia';
                    }
                    ?>
                    </div>
                </div>
        </div>
        
    </div>
</div>
