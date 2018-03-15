<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SMKO | Login</title>

    <link href="<?php echo $url; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo $url; ?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/style.css" rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo $url; ?>/img/bps.ico">
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <?php
            $loginku=false;
            $text_alert='';
            if (isset($_POST['submit'])) {
                $user_id=$_POST['user_id'];
                $user_passwd=$_POST['user_passwd'];
                $r_log=cek_users_login($user_id,$user_passwd);
                if ($r_log["error"]==false) {
                    $loginku=true;
                    $text_alert='<div class="alert alert-success text-center" role="alert">'.$r_log ["pesan_error"].'</div>';
                    $_SESSION['sesi_user_id']=$r_log["user_id"];
                    $_SESSION['sesi_user_no']=$r_log["user_no"];
                    $_SESSION['sesi_passwd_md5']=$r_log["user_passwd_md5"];
                    $_SESSION['sesi_passwd_ori']=$user_passwd;
                    $_SESSION['sesi_nama']=$r_log["user_nama"];
                    $_SESSION['sesi_level']=$r_log["user_level"];
                    $_SESSION['sesi_unitkerja']=$r_log["user_unitkerja"];
                    $_SESSION['sesi_nama_unitkerja']=get_nama_unit($r_log["user_unitkerja"]);
                    $_SESSION['sesi_provkab']=$r_log["user_provkab"];
                    $r_user=list_pegawai_user($r_log["user_no"],true);
                    if ($r_user["error"]==false) {
                        //ada user
                        $_SESSION['sesi_peg_id']=$r_user["item"][1]["peg_id"];
                        $_SESSION['sesi_peg_unitkerja']=$r_user["item"][1]["peg_unitkerja"];
                        $_SESSION['sesi_peg_jabatan']=$r_user["item"][1]["peg_jabatan"];
                        $_SESSION['sesi_peg_unitnama']=$r_user["item"][1]["unit_nama"];
                        $_SESSION['sesi_peg_unitparent']=$r_user["item"][1]["unit_parent"];
                        $_SESSION['sesi_peg_uniteselon']=$r_user["item"][1]["unit_eselon"];
                    }
                    else {
                        $_SESSION['sesi_peg_id']=0;
                        $_SESSION['sesi_peg_unitkerja']=0;
                        $_SESSION['sesi_peg_jabatan']=0;
                        $_SESSION['sesi_peg_unitnama']=0;
                        $_SESSION['sesi_peg_unitparent']=0;
                        $_SESSION['sesi_peg_uniteselon']=0;
                    }
                    print "<meta http-equiv=\"refresh\" content=\"2; URL=".$url."\">";
                }
                else {
                    $loginku=false;
                    $text_alert='<div class="alert alert-danger text-center" role="alert">'.$r_log["pesan_error"].'</div>';
                }
            }

            if ($loginku==false) {
            ?>

            <h3>Sistem Monitoring Kegiatan Online</h3>
            <p>BPS Provinsi Nusa Tenggara Barat</p>
			<p>Silakan login untuk menggunakan sistem ini</p>
            <form class="m-t" role="form" method="post" action="<?php echo $url; ?>/login/ceklogin">
                <div class="form-group">
                    <input type="text" name="user_id" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="user_passwd" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" name="submit" id="submit" class="btn btn-primary block full-width m-b">Login</button>

                <!--<a href="#"><small>Forgot password?</small></a>-->
            </form>
            <p class="m-t"> <small>Copyright &copy; 2017 - <?php echo date('Y');?> Bidang IPDS BPS Provinsi NTB</small> </p>
            <?php } ?>
            <div class="row">
                <?php if ($text_alert!="") { echo $text_alert; } ?>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo $url; ?>/js/jquery-2.1.1.js"></script>
    <script src="<?php echo $url; ?>/js/bootstrap.min.js"></script>

</body>

</html>
