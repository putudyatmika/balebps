<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Bli Mika - I Putu Dyatmika <pdyatmika@gmail.com>">
	<meta name="language" content="id,en" />
    <title><?php echo $prg_desc; ?> - BPS Provinsi Nusa Tenggara Barat</title>
    <link href="<?php echo $url; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/plugins/validator/bootstrapValidator.min.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/plugins/select2/select2.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo $url; ?>/img/bps.ico">
    <script src="<?php echo $url; ?>/js/jquery-3.1.1.min.js"></script>
    <style>
        .modal_tanggal {z-index:1600 !important;}
    </style>
</head>

<body>

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo $url; ?>/img/bps_profile.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo  $_SESSION['sesi_user_id']; ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo  $_SESSION['sesi_nama']; ?><b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="<?php echo $url; ?>/profile/">Profil</a></li>
                            <li><a href="<?php echo $url; ?>/gantipass/">Ganti Password</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $url; ?>/logout/">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        BPS
                    </div>
                </li>
                <?php
                 $link_aktif='class="active"';
                ?>
				 <li <?php if ($page=='') { echo $link_aktif; } ?>>
                    <a href="<?php echo $url; ?>"><i class="fa fa-home"></i> <span class="nav-label">Home</span></a>
                </li>
                <li <?php if ($page=='kegiatan') { echo $link_aktif; } ?>>
                    <a href="<?php echo $url; ?>/kegiatan/"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Kegiatan</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                    <?php if ($_SESSION['sesi_level'] > 2) { ?><li><a href="<?php echo $url; ?>/kegiatan/add/">Tambah Kegiatan</a></li> <?php } ?>
                        <li><a href="<?php echo $url; ?>/kegiatan/bidang/">Bidang/Bagian</a></li>
                        <li><a href="<?php echo $url; ?>/kegiatan/">Semua</a></li>
                    </ul>
                </li>
               
                <li <?php if ($page=='unitkerja') { echo $link_aktif; } ?>>
                    <a href="<?php echo $url; ?>/unitkerja/"><i class="fa fa-cubes"></i> <span class="nav-label">Unitkerja</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo $url; ?>/unitkerja/provinsi/">Bidang/Bagian</a></li>
                        <li><a href="<?php echo $url; ?>/unitkerja/kabkota/">Kabupaten/Kota</a></li>
                        <li><a href="<?php echo $url; ?>/unitkerja/">Semua</a></li>
                    </ul>
                </li>
                <li <?php if ($page=='laporan') { echo $link_aktif; } ?>>
                    <a href="<?php echo $url; ?>/laporan/"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Laporan</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo $url; ?>/laporan/kabkota/">by Kabupaten/Kota</a></li>
                        <li><a href="<?php echo $url; ?>/laporan/bidang/">by Bidang/Bagian</a></li>
                        <li><a href="<?php echo $url; ?>/laporan/">by Provinsi</a></li>
                    </ul>
                </li>
                <li <?php if ($page=='ranking') { echo $link_aktif; } ?>>
                    <a href="<?php echo $url; ?>/laporan/"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Ranking dan Nilai</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo $url; ?>/ranking/waktu/">by Waktu</a></li>
                        <li><a href="<?php echo $url; ?>/ranking/">by Bidang/Bagian</a></li>
                    </ul>
                </li>
                <?php 
                if ($_SESSION['sesi_level']>=4) { ?>
                <li <?php if ($page=='master') { echo $link_aktif; } ?>>
                    <a href="<?php echo $url; ?>/master/"><i class="fa fa-asterisk"></i> <span class="nav-label">Master</span></a>
                    <ul class="nav nav-second-level collapse">
                       
                        <li>
                            <a href="<?php echo $url; ?>/master/users/">Users <span class="fa arrow"></span></a> 
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="<?php echo $url; ?>/master/users/add/">Tambah data</a>
                                </li>
                                 <li>
                                    <a href="<?php echo $url; ?>/master/users/">List data</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo $url; ?>/master/unitkerja/">Unit Kerja <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="<?php echo $url; ?>/master/unitkerja/add/">Tambah data</a>
                                </li>
                                 <li>
                                    <a href="<?php echo $url; ?>/master/unitkerja/">List data</a>
                                </li>
                            </ul>
                        </li>
                       
                        <li><a href="<?php echo $url; ?>/master/">Semua</a></li>
                        
                    </ul>
                </li>
                <?php } ?>
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message"><?php echo $prg_desc; ?> - BPS Provinsi Nusa Tenggara Barat</span>
                </li>
                
                <li>
                    <a href="<?php echo $url; ?>/logout/">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
		 <!--main konten-->
        <?php
        require 'views/index.php';
        ?>
        <!--footer-->
            <div class="footer">
                <div class="pull-right">
                    <strong><?php echo $prg_name; ?> versi app : <?php echo $ver_app; ?> | versi db : <?php echo $ver_db; ?></strong>
                </div>
                <div>
                    <strong>Copyright</strong> Bidang IPDS &copy; 2017-<?php echo date('Y'); ?>
                </div>
            </div>

        </div>
        </div>


    <!-- Mainly scripts -->
    
    <script src="<?php echo $url; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $url; ?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo $url; ?>/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo $url; ?>/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    
    <script src="<?php echo $url; ?>/js/inspinia.js"></script>
    <script src="<?php echo $url; ?>/js/plugins/pace/pace.min.js"></script>

    <!-- Sweet alert -->
    <script src="<?php echo $url; ?>/js/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo $url; ?>/js/plugins/validator/bootstrapValidator.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo $url; ?>/js/plugins/select2/select2.full.min.js"></script>
       <!-- JSKnob -->
   <script src="<?php echo $url; ?>/js/plugins/jsKnob/jquery.knob.js"></script>

   <!-- Input Mask-->
    <script src="<?php echo $url; ?>/js/plugins/jasny/jasny-bootstrap.min.js"></script>

   <!-- Data picker -->
   <script src="<?php echo $url; ?>/js/plugins/datapicker/bootstrap-datepicker.js"></script>

   <!-- NouSlider -->
   <script src="<?php echo $url; ?>/js/plugins/nouslider/jquery.nouislider.min.js"></script>

   <!-- Switchery -->
   <script src="<?php echo $url; ?>/js/plugins/switchery/switchery.js"></script>

    <!-- IonRangeSlider -->
    <script src="<?php echo $url; ?>/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

    <!-- iCheck -->
    <script src="<?php echo $url; ?>/js/plugins/iCheck/icheck.min.js"></script>

    <!-- Clock picker -->
    <script src="<?php echo $url; ?>/js/plugins/clockpicker/clockpicker.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="<?php echo $url; ?>/js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="<?php echo $url; ?>/js/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- TouchSpin -->
    <script src="<?php echo $url; ?>/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <!-- Tags Input -->
    <script src="<?php echo $url; ?>/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- Chosen -->
    <script src="<?php echo $url; ?>/js/plugins/chosen/chosen.jquery.js"></script>

    <!-- Select2 -->
    <script src="<?php echo $url; ?>/js/plugins/select2/select2.full.min.js"></script>

    <!-- Highcharts -->
    <script src="<?php echo $url; ?>/js/plugins/highcharts/highcharts.js"></script>
    <script src="<?php echo $url; ?>/js/plugins/highcharts/exporting.js"></script>
    <!-- Jquery Validate -->
    <script src="<?php echo $url; ?>/js/plugins/validate/jquery.validate.min.js"></script>

      <!-- Page-Level Scripts -->
    <script src="<?php echo $url; ?>/js/bpsntb_v2.js"></script>
    <script>
        $(document).ready(function(){
            $('.dataPegawaiHonor').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

         $(document).ready(function(){
            $('.dataPegawaiPNS').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });
        

         $('.deletesaja').click(function () {
            swal({
                title: "Anda yakin hapus?",
                text: "Data ini akan dihapus",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete saja!",
                closeOnConfirm: false
            }, function () {
                swal("Terhapus!", "Data sudah terdelete.", "success");
            });
        });
        $('#jam_mulai').clockpicker({'default': '07:30'});
        $('#jam_selesai').clockpicker({'default': 'now'});
        $('.chosen-select').chosen({width: "100%"});
        $('#aktif_nama_keg').chosen({width: "100%"});
        

    </script>

</body>

</html>
