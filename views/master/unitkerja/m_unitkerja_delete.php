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
        <strong>Hapus data unit kerja</strong>
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
                        <h5>Delete data unit kerja</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                     <?php
                      $unit_kode=$lvl4;
                      if ($unit_kode=='52000') {
                        echo 'Data Unit utama tidak bisa dihapus';
                      }
                      else {
                        $db = new db();
                        $conn = $db -> connect();
                        $sql_unit= $conn -> query("select * from unitkerja where unit_kode='$unit_kode'");
                        $cek=$sql_unit -> num_rows;
                        if ($cek>0) {
                            $r=$sql_unit ->fetch_object();
                            $parent_unit=get_nama_unit($r->unit_parent);
                            $nama_unit ='('.$unit_kode.') '. $r->unit_nama .' '.$parent_unit;
                            $sql_delete=$conn->query("delete from unitkerja where unit_kode='$unit_kode'");
                            if ($sql_delete) echo '(SUCCESS) Data Unit : '.$nama_unit.' telah dihapus';
                            else echo '(ERROR) Data unit : '.$nama_unit.' tidak dihapus';
                        }
                        else {
                             echo 'ERROR : Kode Unit '.$unit_kode.' ('.$unit_nama.') tidak ada';
                        }
                        $conn -> close();
                    }
                    ?>
                    </div>
                </div>
        </div>
        
    </div>
</div>
