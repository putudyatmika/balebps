<div class="wrapper wrapper-content">
    <div class="middle-box text-center animated fadeInRightBig">
        <h3 class="font-bold">Anda sudah logout dari sistem</h3>
       	<?php
	unset($_SESSION['sesi_user_id']);
	unset($_SESSION['sesi_user_no']);
	unset($_SESSION['sesi_passwd_md5']);
	unset($_SESSION['sesi_passwd_ori']);
	unset($_SESSION['sesi_nama']);
	unset($_SESSION['sesi_level']);
	unset($_SESSION['sesi_unitkerja']);
	unset($_SESSION['sesi_nama_unitkerja']);
	unset($_SESSION['sesi_provkab']);
	print "<meta http-equiv=\"refresh\" content=\"2; URL=".$url."\">";
?>
    </div>
</div>