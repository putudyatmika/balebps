<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Data Master Aktivitas</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url; ?>">Depan</a>
	</li>
	<li>
		<a href="<?php echo $url; ?>/master/">Master</a>
	</li>
	<li>
        <a href="<?php echo $url; ?>/master/aktivitas/">Aktivitas</a>
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
                        <h5>Tambah data redaksi</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form id="formAddRedaksi" name="formAddRedaksi" action="<?php echo $url.'/'.$page.'/'.$act;?>/save/"  method="post" class="form-horizontal" role="form">
       <fieldset>
        <div class="form-group">
            <label for="kata_redaksi" class="col-sm-3 control-label">Judul Redaksi</label>

                <div class="col-lg-7 col-sm-7">
                    <div class="input-group margin-bottom-sm">
                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                    <input type="text" name="kata_redaksi" class="form-control" placeholder="redaksi aktivitas" required="" />
                 </div>
                </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
              <button type="submit" id="submit_redaksi" name="submit_redaksi" value="save" class="btn btn-primary">SAVE</button>
            </div>
        </div>
</fieldset>
</form>
        </div>
        </div>
        </div>
        
    </div>
</div>
