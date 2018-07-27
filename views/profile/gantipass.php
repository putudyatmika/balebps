<?php
    $error=false;
    if (isset($_POST['submit_gantipasswd'])) {
        $passwd_lama=$_POST['passwd_lama'];
        $passwd_baru=$_POST['passwd_baru'];
        $passwd_baru2=$_POST['passwd_baru2'];
        $error=true;
        if ($passwd_lama=='' or $passwd_baru=='' or $passwd_baru2=='') {
            $pesan_error='<div class="alert alert-danger">Isian tidak boleh kosong</div>';
        }
        elseif ($passwd_baru != $passwd_baru2) {
            $pesan_error='<div class="alert alert-danger">Password baru tidak sama dengan konfirmasi password baru</div>';
        }
        else {
            //ganti password
            $r_gantipasswd=ganti_password($passwd_lama,$passwd_baru);
            if ($r_gantipasswd["error"]==true) {
                $pesan_error='<div class="alert alert-danger">'.$r_gantipasswd["pesan_error"].'</div>';
            }
            else {
                $pesan_error='<div class="alert alert-success">'.$r_gantipasswd["pesan_error"].'</div>';
            }
            $passwd_lama='';
            $passwd_baru='';
            
        }
        
    }
?>
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Ganti Password</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url; ?>">Depan</a>
	</li>
	<li class="active">
		<strong>Ganti Password</strong>
	</li>
	</ol>
	</div>
	<div class="col-lg-2">
         <div class="title-action">
              
        </div>
	</div>
</div>
<div class="row wrapper wrapper-content animated fadeInRight">
	 <div class="row">
                <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Ganti Password</h5>
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
                    <?php 
                        if ($error==true) {
                            echo  $pesan_error;
                        }
                    ?>
                    
                    <form id="GantiPassword" name="GantiPassword" action="<?php echo $url.'/'.$page;?>/"  method="post" class="form-horizontal" role="form">
                        <fieldset>
                        <div class="form-group">
                            <label for="passwd_lama" class="col-sm-3 control-label">Password Lama</label>
                            <div class="col-lg-5 col-sm-5">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="password" name="passwd_lama" id="passwd_lama" class="form-control" placeholder="password lama"/>
                                 </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="passwd_baru" class="col-sm-3 control-label">Password</label>
                            <div class="col-lg-5 col-sm-5">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="password" name="passwd_baru" id="passwd_baru" class="form-control" placeholder="password baru" />
                                 </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="passwd_baru2" class="col-sm-3 control-label">Konfirmasi Password</label>
                            <div class="col-lg-5 col-sm-5">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="password" name="passwd_baru2" id="passwd_baru2" class="form-control" placeholder="konfirmasi password baru" />
                                 </div>
                                </div>

                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                              <button type="submit" id="submit_gantipasswd" name="submit_gantipasswd" value="save" class="btn btn-primary">GANTI PASSWORD</button>
                            </div>
                        </div>
                </fieldset>
                </form>

                    </div>
                </div>
        </div>
        
    </div>
</div>
