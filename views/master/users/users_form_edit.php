<?php
$user_no=$lvl4;
$r_user=list_users($user_no,true);
?>
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Data Master Users</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url; ?>">Depan</a>
	</li>
	<li>
		<a href="<?php echo $url; ?>/master/">Master</a>
	</li>
	<li>
        <a href="<?php echo $url; ?>/master/users/">Users</a>
    </li>
    <li class="active">
        <strong>Edit data</strong>
    </li>
	</ol>
	</div>
	<div class="col-lg-2">

	</div>
</div>
<div class="row wrapper wrapper-content animated fadeInRight">
	 <div class="row">
                <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit data user</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <?php
                    if ($r_user["error"]==false) {
                    ?>
                        <form id="formEditUser" name="formEditUser" action="<?php echo $url.'/'.$page.'/'.$act;?>/update/"  method="post" class="form-horizontal" role="form">
                        <fieldset>
                        <div class="form-group">
                            <label for="user_id" class="col-sm-2 control-label">ID</label>
                                <div class="col-lg-4 col-sm-4">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="text" name="user_id" class="form-control" placeholder="user ID" value="<?php echo $r_user["item"][1]["user_id"]; ?>" />
                                 </div>
                                </div>
                        </div>
                    <div class="form-group">
                      <label for="user_nama" class="col-sm-2 control-label">Nama</label>
                        <div class="col-lg-4 col-sm-4">
                          <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                          <input type="text" name="user_nama" class="form-control" placeholder="Nama" value="<?php echo $r_user["item"][1]["user_nama"]; ?>" />
                         </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="user_email" class="col-sm-2 control-label">Email</label>
                        <div class="col-lg-4 col-sm-4">
                          <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                          <input type="text" name="user_email" class="form-control" placeholder="E-mail" value="<?php echo $r_user["item"][1]["user_email"]; ?>" />
                         </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="user_passwd" class="col-sm-2 control-label">Password</label>
                            <div class="col-lg-5 col-sm-5">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="password" name="user_passwd" class="form-control" placeholder="user password" />
                                 </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="user_passwd2" class="col-sm-2 control-label">Konfirmasi Password</label>
                            <div class="col-lg-5 col-sm-5">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="password" name="user_passwd2" class="form-control" placeholder="konfirmasi password" />
                                 </div>
                                </div>

                        </div>
                        <div class="form-group">
                            <label for="user_unitkerja" class="col-sm-2 control-label">Unit Kerja</label>
                                <div class="col-sm-9">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                        <select class="form-control" name="user_unitkerja" id="user_unitkerja">
                          <option value="">Pilih</option>
                          <?php
                          $db = new db();
                          $conn = $db -> connect();
                          $sql_unit = $conn->query("select * from unitkerja order by unit_jenis,unit_kode asc");
                          while ($r = $sql_unit ->fetch_object()) {
                            if ($r->unit_kode==$r_user["item"][1]["user_unitkerja"]) {
                                $pilih_unit='selected="selected"';
                            }
                            else {
                                $pilih_unit='';
                            }
                            echo '<option value="'.$r->unit_kode.'" '.$pilih_unit.'>['.$r->unit_kode.'] '.$r->unit_nama.'</option>'."\n";
                          } 
                          $conn->close();
                          ?>
                          </select>
                                    </div>
                                </div>
                        </div>
                    <div class="form-group">
                            <label for="user_level" class="col-sm-2 control-label">Level</label>
                                <div class="col-sm-4">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <select class="form-control" name="user_level" id="user_level">
                                        <option value="">Pilih Level</option>
                                        <?php

                                        for ($i=1;$i<=$_SESSION['sesi_level'];$i++) {
                                            if ($i==$r_user["item"][1]["user_level"]) {
                                                $pilih_level='selected="selected"';
                                            }
                                            else {
                                                   $pilih_level=''; 
                                            }
                                            echo '<option value="'.$i.'" '.$pilih_level.'>'.$lvl_user[$i].'</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="user_status" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-4">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <select class="form-control" name="user_status" id="user_status">
                                        <option value="">Pilih Status</option>
                                        <?php
                                        for ($i=0;$i<=1;$i++) {
                                            if ($i==$r_user["item"][1]["user_status"]) {
                                                $pilih_status='selected="selected"';
                                            }
                                            else {
                                                   $pilih_status=''; 
                                            }
                                            echo '<option value="'.$i.'" '.$pilih_status.'>'.$status_umum[$i].'</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                              <button type="submit" id="submit_update" name="submit_update" value="update" class="btn btn-primary">UPDATE</button>
                            </div>
                        </div>
                </fieldset>
                <input type="hidden" name="user_no" value="<?php echo $user_no;?>" />
                </form>
                <?php } 
                    else {
                        echo $r_user["pesan_error"];
                    } ?>
                    </div>
                </div>
        </div>
        
    </div>
</div>
