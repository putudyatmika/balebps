<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Data Master Pegawai</h2>
	<ol class="breadcrumb">
	<li>
		<a href="index.php">Depan</a>
	</li>
	<li>
		<a href="<?php echo $url; ?>/master/">Master</a>
	</li>
	<li class="active">
		<strong>Pegawai</strong>
	</li>
	</ol>
	</div>
	<div class="col-lg-2">
         <div class="title-action">
              <a href="<?php echo $url; ?>/master/pegawai/add/" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        </div>
	</div>
</div>
<div class="row wrapper wrapper-content animated fadeInRight">
	 <div class="row">
                <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Data Pegawai</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                           <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-hover dataPegawaiPNS" >
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Absen ID</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">Unit Kerja</th>
                        <th class="text-center">Status</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        //isi data pegawai
                        $r_peg=list_pegawai(0,false,true);

                        if ($r_peg["error"]==false) {
                            $i=1;
                            $max_peg=$r_peg["peg_total"];
                            for ($i=1;$i<=$max_peg;$i++) {
                                //link user id login monitoring
                                if ($r_peg["item"][$i]["user_no"]==0) {
                                    $user_no='';
                                }
                                else {
                                    $user_no='('.$r_peg["item"][$i]["user_no"].') '.$r_peg["item"][$i]["user_id"];
                                }
                                //unitkerja pegawai
                                if ($r_peg["item"][$i]["peg_unitkerja"]==0) {
                                    $peg_unitkerja='';
                                }
                                else {
                                    $peg_unitkerja=get_nama_unit($r_peg["item"][$i]["peg_unitkerja"]);
                                }
                                //jenis jabatan
                                if ($r_peg["item"][$i]["peg_jabatan"]==0) {
                                    $peg_jabatan='';
                                }
                                else {
                                    $peg_jabatan=$JenisJabatan[$r_peg["item"][$i]["peg_jabatan"]];
                                }
                                echo '
                                <tr>
                                <td>'.$i.'</td>
                                <td>'.$r_peg["item"][$i]["peg_id"].'</td>
                                <td>'.$r_peg["item"][$i]["peg_nama"].'</td>
                                <td>'.$JenisKelamin[$r_peg["item"][$i]["peg_jk"]].'</td>
                                 <td>'.$peg_jabatan.'</td>
                                <td>'.$peg_unitkerja.'</td>                               
                                <td>'.$status_umum[$r_peg["item"][$i]["peg_status"]].'</td>
                                <td><a href="'.$url.'/'.$page.'/'.$act.'/view/'.$r_peg["item"][$i]["peg_no"].'"><i class="fa fa-search text-success" aria-hidden="true"></i></a> <a href="'.$url.'/'.$page.'/'.$act.'/edit/'.$r_peg["item"][$i]["peg_no"].'"><i class="fa fa-pencil-square text-info" aria-hidden="true"></i></a> <a href="'.$url.'/'.$page.'/'.$act.'/delete/'.$r_peg["item"][$i]["peg_no"].'" data-confirm="Apakah data ('.$r_peg["item"][$i]["peg_id"].') '.$r_peg["item"][$i]["peg_nama"].' ini akan di hapus?"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a></td>

                                </tr>';

                            }
                        }
                        else {
                            echo '<tr>
                            <td colspan="8">Data masing kosong</td>
                            </tr>';
                        }
                        ?>           
                    </tbody>
                    <tfoot>
                     <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Absen ID</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">Unit Kerja</th>
                        <th class="text-center">Status</th>
                        <th>&nbsp;</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
        </div>
        <div class="col-lg-5">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Data Honor</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                           <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataPegawaiHonor" >
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Absen ID</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Status</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                    $r_peg=list_pegawai_honor(0,false);

                    if ($r_peg["error"]==false) {
                        $i=1;
                        $max_peg=$r_peg["peg_total"];
                        for ($i=1;$i<=$max_peg;$i++) {
                            //link user id login monitoring
                            if ($r_peg["item"][$i]["user_no"]==0) {
                                $user_no='';
                            }
                            else {
                                $user_no='('.$r_peg["item"][$i]["user_no"].') '.$r_peg["item"][$i]["user_id"];
                            }
                           
                            echo '
                            <tr>
                            <td>'.$i.'</td>
                            <td>'.$r_peg["item"][$i]["peg_id"].'</td>
                            <td>'.$r_peg["item"][$i]["peg_nama"].'</td>
                            <td>'.$JenisKelamin[$r_peg["item"][$i]["peg_jk"]].'</td>
                            <td>'.$status_umum[$r_peg["item"][$i]["peg_status"]].'</td>
                            <td><a href="'.$url.'/'.$page.'/'.$act.'/view/'.$r_peg["item"][$i]["peg_no"].'"><i class="fa fa-search text-success" aria-hidden="true"></i></a> <a href="'.$url.'/'.$page.'/'.$act.'/edit/'.$r_peg["item"][$i]["peg_no"].'"><i class="fa fa-pencil-square text-info" aria-hidden="true"></i></a> <a href="'.$url.'/'.$page.'/'.$act.'/delete/'.$r_peg["item"][$i]["peg_no"].'" data-confirm="Apakah data ('.$r_peg["item"][$i]["peg_id"].') '.$r_peg["item"][$i]["peg_nama"].' ini akan di hapus?"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a></td>
                            </tr>';

                        }
                    }
                    else {
                        echo '<tr>
                        <td colspan="6">Data masing kosong</td>
                        </tr>';
                    }
                    ?>         
                            
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Absen ID</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jenis Kelamin</th>
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
