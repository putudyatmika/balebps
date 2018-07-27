<?php
$user_no=$_SESSION["sesi_user_no"];
$r_user=list_users($user_no,true);
?>
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Profile Saya</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url; ?>">Depan</a>
	</li>
	<li>
		<a href="<?php echo $url; ?>/profile/">Profile</a>
	</li>
    <li class="active">
        <strong>Edit profile</strong>
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
                        <h5>Edit profile saya</h5>
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
                        <form id="formEditUser" name="formEditUser" action="<?php echo $url.'/'.$page;?>/update/"  method="post" class="form-horizontal" role="form">
                        <fieldset>
                        
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
