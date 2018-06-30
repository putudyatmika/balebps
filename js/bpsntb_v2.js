$(document).ready(function(){
$('#tanggal_data input').datepicker({
    todayBtn: "linked",
    keyboardNavigation: false,
    forceParse: false,
    calendarWeeks: true,
     format: "yyyy-mm-dd",
   todayHighlight: true,
   autoclose: true
    });
});
$(document).on("click", ".modal-body",function(){
    $('#tanggal_modal').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
         format: "yyyy-mm-dd",
       todayHighlight: true,
       autoclose: true
        });
    });
$(document).on("click", ".modal-body",function(){
        $('#tanggal_modal_terima').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
             format: "yyyy-mm-dd",
           todayHighlight: true,
           autoclose: true
            });
        });
$(document).on("click", ".modal-body",function(){
    $('#tanggal_modal_editkirim').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
            format: "yyyy-mm-dd",
        todayHighlight: true,
        autoclose: true
        });
    });
$(document).ready(function() {
    $('a[data-confirm]').click(function(ev) {
        var href = $(this).attr('href');
        if (!$('#dataConfirmModal').length) {
            $('body').append('<div id="dataConfirmModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataConfirmModal" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Konfirmasi</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn btn-success" data-dismiss="modal" aria-hidden="true">close</button><a class="btn btn-primary" id="dataConfirmOK"><span class="glyphicon glyphicon-ok"></span> ok</a></div></div></div></div>');
        }
        $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
        $('#dataConfirmOK').attr('href', href);
        $('#dataConfirmModal').modal({show:true});
        return false;
    });
});

$(document).ready(function() {
    $('a[data-kirim]').click(function(ev) {
        var href = $(this).attr('href');
        var dataKirim = $(this).attr('data-kirim');
        if (!$('#dataKirimModal').length) {
            $('body').append('<div id="dataKirimModal" class="modal inmodal" tabindex="-1" role="dialog" aria-labelledby="dataKirimModal" aria-hidden="true">\
                <div class="modal-dialog">\
                    <div class="modal-content animated bounceInRight">\
                        <div class="modal-header">\
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>\
                            <i class="fa fa-send modal-icon"></i>\
                            <h4 id="dataKirimLabel" class="modal-title">Konfirmasi Pengiriman</h4>\
                            <small class="font-bold">form pengiriman laporan kegiatan dari kabupaten ke provinsi</small>\
                        </div>\
                        <div class="modal-body">\
                        <form id="formKirimTarget" name="formKirimTarget" action="' + href + '"  method="post" class="form-horizontal" role="form">\
                        <div class="form-group">\
                            <label for="keg_nama" class="col-sm-3 control-label">Nama Kegiatan</label>\
                                <div class="col-lg-9 col-sm-9 keg_nama_value"></div>\
                        </div>\
                        <div class="form-group">\
                            <label for="keg_nama" class="col-sm-3 control-label">Batas Waktu</label>\
                                <div class="col-lg-9 col-sm-9 keg_waktu_value"></div>\
                        </div>\
                        <div class="form-group">\
                        <label for="keg_unitkerja" class="col-sm-3 control-label">Unit Kerja</label>\
                                <div class="col-sm-9 unit_kerja"></div>\
                        </div>\
                            <div class="form-group">\
                            <label for="keg_t_target" class="col-sm-3 control-label">Target</label>\
                                <div class="col-sm-5">\
                                <div class="input-group margin-bottom-sm">\
                            <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>\
                            <input type="text" class="form-control" id="keg_t_target_nilai" value="" disabled="" />\
                            </div>\
                            </div>\
                        </div>\
                        <div class="form-group">\
                            <label for="keg_t_target" class="col-sm-3 control-label">Sudah terkirim</label>\
                            <div class="col-sm-5">\
                                <div class="input-group margin-bottom-sm">\
                            <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>\
                            <input type="text" class="form-control"  id="keg_t_target_sudah" value="" disabled="" />\
                            </div>\
                            </div>\
                        </div>\
                        <div class="form-group">\
                            <label for="keg_d_tgl" class="col-sm-3 control-label">Tanggal pengiriman</label>\
                                <div class="col-lg-9 col-sm-9">\
                                    <div class="input-group margin-bottom-sm">\
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>\
                                <input type="text" name="keg_d_tgl" id="tanggal_modal" class="form-control modal_tanggal" autocomplete="off" placeholder="Format : YYYY-MM-DD" />\
                                </div>\
                                </div>\
                        </div>\
                        <div class="form-group">\
                            <label for="keg_d_jumlah" class="col-sm-3 control-label">Jumlah</label>\
                                <div class="col-lg-9 col-sm-9">\
                                    <div class="input-group margin-bottom-sm">\
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>\
                                <input type="text" name="keg_d_jumlah" class="form-control" placeholder="Jumlah Kirim" />\
                                </div>\
                                </div>\
                        </div>\
                        <div class="form-group">\
                            <label for="keg_d_ket" class="col-sm-3 control-label">Dikirim melalui</label>\
                                <div class="col-lg-9 col-sm-9">\
                                    <div class="input-group margin-bottom-sm">\
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>\
                                <input type="text" name="keg_d_ket" class="form-control" placeholder="Dikirim via apa?" />\
                                </div>\
                                </div>\
                        </div>\
                        <div class="form-group">\
                            <label for="keg_d_link" class="col-sm-3 control-label">Link Laci/Dropbox</label>\
                            <div class="col-sm-9 col-lg-9">\
                                <div class="input-group margin-bottom-sm">\
                            <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>\
                            <input type="text" name="keg_d_link" class="form-control" placeholder="Link LACI / DROPBOX" />\
                            </div>\
                            </div>\
                        </div>\
                        <input type="hidden" name="keg_id" id="keg_id" value="" />\
                        <input type="hidden" name="keg_d_unitkerja" id="keg_d_unitkerja" value="" />\
                        <input type="hidden" name="keg_d_target_sudah"  id="keg_d_target_sudah" value="" />\
                        <input type="hidden" name="keg_d_target" id="keg_d_target" value="" />\
                        <div class="form-group">\
                            <div class="col-sm-offset-3 col-sm-9">\
                            <button type="submit" id="submit_keg" name="submit_keg" value="kirim" class="btn btn-primary">KIRIM</button>\
                            </div>\
                        </div>\
                        </form>\
                        </div>\
                        <div class="modal-footer">\
                            <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">close</button>\
                        </div>\
                    </div>\
                </div>\
            </div>');
        }
        var dataKirimNilai = dataKirim.split(";");
        var kodeKegiatan = dataKirimNilai[0];
        var namaKegiatan = dataKirimNilai[1];
        var kodeUnitKerja = dataKirimNilai[2];
        var unitKegiatan = dataKirimNilai[3];
        var waktuKegiatan = dataKirimNilai[4];
        var targetKegiatan = dataKirimNilai[5];
        var targetSudahKirim = dataKirimNilai[6];
        $('#dataKirimModal').find('.keg_nama_value').text('['+kodeKegiatan+'] '+ namaKegiatan);
        $('#dataKirimModal').find('.keg_waktu_value').text(waktuKegiatan);
        $('#dataKirimModal').find('.unit_kerja').text('['+kodeUnitKerja+'] '+ unitKegiatan);
        $('#dataKirimModal').find('#keg_t_target_nilai').val(targetKegiatan);
        $('#dataKirimModal').find('#keg_t_target_sudah').val(targetSudahKirim);
        $('#dataKirimModal').find('#keg_id').val(kodeKegiatan);
        $('#dataKirimModal').find('#keg_d_unitkerja').val(kodeUnitKerja);
        $('#dataKirimModal').find('#keg_d_target').val(targetKegiatan);
        $('#dataKirimModal').find('#keg_d_target_sudah').val(targetSudahKirim);
        $('#dataKirimModal').modal({show:true});
        return false;
    });
});
$(document).ready(function() {
    $('a[data-editkirim]').click(function(ev) {
        var href = $(this).attr('href');
        var dataEditKirim = $(this).attr('data-editkirim');
        if (!$('#dataEditKirimModal').length) {
            $('body').append('<div id="dataEditKirimModal" class="modal inmodal" tabindex="-1" role="dialog" aria-labelledby="dataEditKirimModal" aria-hidden="true">\
                <div class="modal-dialog">\
                    <div class="modal-content animated bounceInRight">\
                        <div class="modal-header">\
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>\
                            <i class="fa fa-send modal-icon"></i>\
                            <h4 id="dataEditKirimLabel" class="modal-title">Edit Pengiriman</h4>\
                            <small class="font-bold">form edit laporan pengiriman kegiatan dari kabupaten ke provinsi</small>\
                        </div>\
                        <div class="modal-body">\
                        <form id="formKirimTarget" name="formKirimTarget" action="' + href + '"  method="post" class="form-horizontal" role="form">\
                        <div class="form-group">\
                            <label for="keg_nama" class="col-sm-3 control-label">Nama Kegiatan</label>\
                                <div class="col-lg-9 col-sm-9 keg_nama_value"></div>\
                        </div>\
                        <div class="form-group">\
                            <label for="keg_nama" class="col-sm-3 control-label">Batas Waktu</label>\
                                <div class="col-lg-9 col-sm-9 keg_waktu_value"></div>\
                        </div>\
                        <div class="form-group">\
                        <label for="keg_unitkerja" class="col-sm-3 control-label">Unit Kerja</label>\
                                <div class="col-sm-9 unit_kerja"></div>\
                        </div>\
                            <div class="form-group">\
                            <label for="keg_t_target" class="col-sm-3 control-label">Target</label>\
                                <div class="col-sm-5">\
                                <div class="input-group margin-bottom-sm">\
                            <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>\
                            <input type="text" class="form-control" id="keg_t_target_nilai" value="" disabled="" />\
                            </div>\
                            </div>\
                        </div>\
                        <div class="form-group">\
                            <label for="keg_d_tgl" class="col-sm-3 control-label">Tanggal pengiriman</label>\
                                <div class="col-lg-9 col-sm-9">\
                                    <div class="input-group margin-bottom-sm">\
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>\
                                <input type="text" name="keg_d_tgl" id="tanggal_modal_editkirim" class="form-control modal_tanggal" autocomplete="off" placeholder="Format : YYYY-MM-DD" />\
                                </div>\
                                </div>\
                        </div>\
                        <div class="form-group">\
                            <label for="keg_d_jumlah" class="col-sm-3 control-label">Jumlah</label>\
                                <div class="col-lg-9 col-sm-9">\
                                    <div class="input-group margin-bottom-sm">\
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>\
                                <input type="text" name="keg_d_jumlah" id="keg_d_jumlah" class="form-control" placeholder="Jumlah Kirim" />\
                                </div>\
                                </div>\
                        </div>\
                        <div class="form-group">\
                            <label for="keg_d_ket" class="col-sm-3 control-label">Dikirim melalui</label>\
                                <div class="col-lg-9 col-sm-9">\
                                    <div class="input-group margin-bottom-sm">\
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>\
                                <input type="text" name="keg_d_ket" id="keg_d_ket" class="form-control" placeholder="Dikirim via apa?" />\
                                </div>\
                                </div>\
                        </div>\
                        <div class="form-group">\
                            <label for="keg_d_link" class="col-sm-3 control-label">Link Laci/Dropbox</label>\
                            <div class="col-sm-9 col-lg-9">\
                                <div class="input-group margin-bottom-sm">\
                            <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>\
                            <input type="text" name="keg_d_link" id="keg_d_link" class="form-control" placeholder="Link LACI / DROPBOX" />\
                            </div>\
                            </div>\
                        </div>\
                        <input type="hidden" name="keg_id" id="keg_id" value="" />\
                        <input type="hidden" name="detil_id" id="detil_id" value="" />\
                        <input type="hidden" name="keg_d_unitkerja" id="keg_d_unitkerja" value="" />\
                        <input type="hidden" name="keg_d_target" id="keg_d_target" value="" />\
                        <div class="form-group">\
                            <div class="col-sm-offset-3 col-sm-9">\
                            <button type="submit" id="submit_keg" name="submit_keg" value="kirim" class="btn btn-primary">UPDATE KIRIM</button>\
                            </div>\
                        </div>\
                        </form>\
                        </div>\
                        <div class="modal-footer">\
                            <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">close</button>\
                        </div>\
                    </div>\
                </div>\
            </div>');
        }
        var dataEditKirimNilai = dataEditKirim.split(";");
        var kodeKegiatan = dataEditKirimNilai[0];
        var namaKegiatan = dataEditKirimNilai[1];
        var kodeUnitKerja = dataEditKirimNilai[2];
        var unitKegiatan = dataEditKirimNilai[3];
        var waktuKegiatan = dataEditKirimNilai[4];
        var targetKegiatan = dataEditKirimNilai[5];
        var detilID = dataEditKirimNilai[6];
        var detilJumlah = dataEditKirimNilai[7];
        var detilTanggal = dataEditKirimNilai[8];
        var detilKet = dataEditKirimNilai[9];
        var detilLink = dataEditKirimNilai[10];
        $('#dataEditKirimModal').find('.keg_nama_value').text('['+kodeKegiatan+'] '+ namaKegiatan);
        $('#dataEditKirimModal').find('.keg_waktu_value').text(waktuKegiatan);
        $('#dataEditKirimModal').find('.unit_kerja').text('['+kodeUnitKerja+'] '+ unitKegiatan);
        $('#dataEditKirimModal').find('#keg_t_target_nilai').val(targetKegiatan);
        $('#dataEditKirimModal').find('#keg_id').val(kodeKegiatan);
        $('#dataEditKirimModal').find('#keg_d_unitkerja').val(kodeUnitKerja);
        $('#dataEditKirimModal').find('#keg_d_target').val(targetKegiatan);
        $('#dataEditKirimModal').find('#tanggal_modal_editkirim').val(detilTanggal);
        $('#dataEditKirimModal').find('#keg_d_jumlah').val(detilJumlah);
        $('#dataEditKirimModal').find('#keg_d_ket').val(detilKet);
        $('#dataEditKirimModal').find('#keg_d_link').val(detilLink);
        $('#dataEditKirimModal').find('#detil_id').val(detilID);
        $('#dataEditKirimModal').modal({show:true});
        return false;
    });
});
$(document).ready(function() {
    $('a[data-terima]').click(function(ev) {
        var href = $(this).attr('href');
        var dataTerima = $(this).attr('data-terima');
        if (!$('#dataTerimaModal').length) {
            $('body').append('<div id="dataTerimaModal" class="modal inmodal" tabindex="-1" role="dialog" aria-labelledby="dataTerimaModal" aria-hidden="true">\
                <div class="modal-dialog">\
                    <div class="modal-content animated bounceInRight">\
                        <div class="modal-header">\
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>\
                            <i class="fa fa-television modal-icon"></i>\
                            <h4 id="dataKirimLabel" class="modal-title">Konfirmasi Penerimaan</h4>\
                            <small class="font-bold">form pengiriman laporan kegiatan dari kabupaten ke provinsi</small>\
                        </div>\
                        <div class="modal-body">\
                        <form id="formTerimaTarget" name="formTerimaTarget" action="' + href + '"  method="post" class="form-horizontal" role="form">\
                        <div class="form-group">\
                            <label for="keg_nama" class="col-sm-3 control-label">Nama Kegiatan</label>\
                                <div class="col-lg-9 col-sm-9 keg_nama_value"></div>\
                        </div>\
                        <div class="form-group">\
                            <label for="keg_nama" class="col-sm-3 control-label">Batas Waktu</label>\
                                <div class="col-lg-9 col-sm-9 keg_waktu_value"></div>\
                        </div>\
                        <div class="form-group">\
                        <label for="keg_unitkerja" class="col-sm-3 control-label">Unit Kerja</label>\
                                <div class="col-sm-9 unit_kerja"></div>\
                        </div>\
                            <div class="form-group">\
                            <label for="keg_t_target" class="col-sm-3 control-label">Target</label>\
                                <div class="col-sm-5">\
                                <div class="input-group margin-bottom-sm">\
                            <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>\
                            <input type="text" class="form-control" id="keg_t_target_nilai" value="" disabled="" />\
                            </div>\
                            </div>\
                        </div>\
                        <div class="form-group">\
                            <label for="keg_t_target" class="col-sm-3 control-label">Sudah diterima</label>\
                            <div class="col-sm-5">\
                                <div class="input-group margin-bottom-sm">\
                            <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>\
                            <input type="text" class="form-control"  id="keg_t_target_sudah" value="" disabled="" />\
                            </div>\
                            </div>\
                        </div>\
                        <div class="form-group">\
                            <label for="keg_d_tgl" class="col-sm-3 control-label">Tanggal penerimaan</label>\
                                <div class="col-lg-9 col-sm-9">\
                                    <div class="input-group margin-bottom-sm">\
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>\
                                <input type="text" name="keg_d_tgl" id="tanggal_modal_terima" class="form-control modal_tanggal" autocomplete="off" placeholder="Format : YYYY-MM-DD" />\
                                </div>\
                                </div>\
                        </div>\
                        <div class="form-group">\
                            <label for="keg_d_jumlah" class="col-sm-3 control-label">Jumlah</label>\
                                <div class="col-lg-9 col-sm-9">\
                                    <div class="input-group margin-bottom-sm">\
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>\
                                <input type="text" name="keg_d_jumlah" class="form-control" placeholder="Jumlah diterima" />\
                                </div>\
                                </div>\
                        </div>\
                        <input type="hidden" name="keg_id" id="keg_id" value="" />\
                        <input type="hidden" name="keg_d_unitkerja" id="keg_d_unitkerja" value="" />\
                        <input type="hidden" name="keg_d_target_sudah"  id="keg_d_target_sudah" value="" />\
                        <input type="hidden" name="keg_d_target" id="keg_d_target" value="" />\
                        <div class="form-group">\
                            <div class="col-sm-offset-3 col-sm-9">\
                            <button type="submit" id="submit_keg" name="submit_keg" value="terima" class="btn btn-primary">TERIMA</button>\
                            </div>\
                        </div>\
                        </form>\
                        </div>\
                        <div class="modal-footer">\
                            <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">close</button>\
                        </div>\
                    </div>\
                </div>\
            </div>');
        }
        var dataTerimaNilai = dataTerima.split(";");
        var kodeKegiatan = dataTerimaNilai[0];
        var namaKegiatan = dataTerimaNilai[1];
        var kodeUnitKerja = dataTerimaNilai[2];
        var unitKegiatan = dataTerimaNilai[3];
        var waktuKegiatan = dataTerimaNilai[4];
        var targetKegiatan = dataTerimaNilai[5];
        var targetSudahTerima = dataTerimaNilai[6];
        $('#dataTerimaModal').find('.keg_nama_value').text('['+kodeKegiatan+'] '+ namaKegiatan);
        $('#dataTerimaModal').find('.keg_waktu_value').text(waktuKegiatan);
        $('#dataTerimaModal').find('.unit_kerja').text('['+kodeUnitKerja+'] '+ unitKegiatan);
        $('#dataTerimaModal').find('#keg_t_target_nilai').val(targetKegiatan);
        $('#dataTerimaModal').find('#keg_t_target_sudah').val(targetSudahTerima);
        $('#dataTerimaModal').find('#keg_id').val(kodeKegiatan);
        $('#dataTerimaModal').find('#keg_d_unitkerja').val(kodeUnitKerja);
        $('#dataKirimModal').find('#keg_d_target').val(targetKegiatan);
        $('#dataKirimModal').find('#keg_d_target_sudah').val(targetSudahTerima);
        $('#dataTerimaModal').modal({show:true});
        return false;
    });
});
$(document).ready(function(){
     $("#formAddUser").validate({
         rules: {
             user_passwd: {
                 required: true,
                 minlength: 3
             },
             user_passwd2: {
                 required: true,
                 minlength: 3,
                 equalTo: "#user_passwd"
             },
             user_id: {
                 required: true,
                 minlength: 3
             },
             user_nama: {
                 required: true,
                 minlength: 3
             },
             user_email: {
                 required: true,
                 email: true
             },
             user_unitkerja: "required",
             user_level: "required",
             user_status: "required"
         },
         messages: {
                user_unitkerja: "Pilih salah satu",
                user_level: "Pilih salah satu",
                user_id: {
                    required: "silakan isi user id",
                    minlength: "minimal 3 karakter"
                },
                user_passwd: {
                    required: "silakan isi password",
                    minlength: "minimal 3 karakter"
                },
                user_passwd2: {
                    required: "silakan isi password",
                    minlength: "minimal 3 karakter",
                    equalTo: "silakan masukkan password yang sama dengan atas"
                },
                user_email: "Masukkan email yang valid",
                user_nama: {
                    required: "silakan isi nama",
                    minlength: "minimal 3 karakter"
                },
                user_status: "silakan pilih salah satu"
            }

     });
});
$(document).ready(function(){
     $("#formEditUser").validate({
         rules: {
             user_id: {
                 required: true,
                 minlength: 3
             },
             user_nama: {
                 required: true,
                 minlength: 3
             },
             user_email: {
                 required: true,
                 email: true
             },
             user_unitkerja: "required",
             user_level: "required",
             user_status: "required"
         },
         messages: {
                user_unitkerja: "Pilih salah satu",
                user_level: "Pilih salah satu",
                user_id: {
                    required: "silakan isikan user id",
                    minlength: "minimal 3 karakter"
                },
                user_email: "Masukkan email yang valid",
                user_nama: {
                    required: "silakan isikan nama",
                    minlength: "minimal 3 karakter"
                },
                user_status: "silakan pilih salah satu"
            }

     });
});
$(document).ready(function(){
     $("#formKegBaru").validate({
         rules: {
             keg_nama: {
                required: true,
                minlength: 10 },
             keg_unitkerja: "required",
             keg_jenis: "required",
             keg_tglmulai: "required",
             keg_tglakhir: "required",
             keg_satuan: "required",
             keg_target: {
                required: true,
                number: true
             },
             keg_spj: "required",
             keg_kabkota: "required",
             spj_kabkota: "required"
         },
         messages: {
                keg_nama: {
                    required: "Silakan isi nama kegiatan",
                    minlength: "Minimal 10 karakter" 
                },
                keg_target: {
                    required: "Silakan isi target kegiatan",
                    number: "isian harus berupa angka"
                },
                keg_unitkerja: "Silakan pilih salah satu",
                keg_jenis: "Silakan pilih salah satu",
                keg_tglmulai: "Silakan isi tanggal mulai",
                keg_tglakhir: "silakan isi tanggal selesai",
                keg_satuan: "Silakan isi satuan kegiatan",
                keg_spj: "Silakan pilih salah satu"

            }

     });
});