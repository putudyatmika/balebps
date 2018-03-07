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
	<li>
        <a href="<?php echo $url; ?>/master/pegawai/">Pegawai</a>
    </li>
    <li class="active">
        <strong>Simpan data</strong>
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
                        <h5>Simpan data pegawai</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                      <?php
                        if ($_POST['submit_pegawai']) {

                            $peg_id =$_POST['peg_id'];
                            $peg_nip =$_POST['peg_nip'];
                            $peg_nip_lama =$_POST['peg_nip_lama'];
                            $peg_nama = $_POST['peg_nama'];
                            $peg_jk = $_POST['peg_jk'];
                            $peg_user_no = $_POST['peg_user_no'];
                            $peg_unitkerja = $_POST['peg_unitkerja'];
                            $peg_jabatan = $_POST['peg_jabatan'];
                            $peg_status = $_POST['peg_status'];
                            //$peg_nama= strtoupper(strtolower($peg_nama));
                            //$waktu_lokal=date("Y-m-d H:i:s");
                            $user_created=$_SESSION['sesi_user_id'];
                            if (cek_pegawai_absen($peg_id)!=false) {
                                echo 'Pegawai ID sudah tersedia';
                            }
                            else {
                                if ($peg_user_no!="") {
                                    //save_pegawai_absen($peg_id,$peg_nama,$peg_jk,$peg_user_no,$peg_unitkerja,$peg_status,$peg_jabatan,$user_created)
                                    $result_absen=save_pegawai_absen($peg_id,$peg_nama,$peg_jk,$peg_user_no,$peg_unitkerja,$peg_status,$peg_jabatan,$user_created,$peg_nip_lama,$peg_nip);
                                    if ($result_absen) {
                                        echo "Berhasil di simpan database absen pegawai";
                                    }
                                    else {
                                        echo 'Error menyimpan';
                                    }
                                    
                                }
                                else {
                                    //simpan tanpa peg_user_no
                                    $result_absen_dua=save_pegawai_absen($peg_id,$peg_nama,$peg_jk,0,$peg_unitkerja,$peg_status,$peg_jabatan,$user_created,$peg_nip_lama,$peg_nip);
                                    if ($result_absen_dua) {
                                        echo 'Berhasil di simpan database absen pegawai';
                                    }
                                    else {
                                        echo 'Error menyimpan II';
                                    }
                                }   

                            }
                        }
                        else {
                            echo 'ERORR';
                        }

                        ?>
                    </div>
                </div>
        </div>
        
    </div>
</div>
