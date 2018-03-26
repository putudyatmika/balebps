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
                    required: "silakan isi",
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
                    required: "silakan isi",
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