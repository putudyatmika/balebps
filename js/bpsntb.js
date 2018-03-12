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

$('#tanggal_data input').datepicker({
    todayBtn: "linked",
    keyboardNavigation: false,
    forceParse: false,
    calendarWeeks: true,
     format: "yyyy-mm-dd",
   todayHighlight: true,
   autoclose: true

});

$(document).ready(function() {
    $('#formAddPegawaiAbsen').bootstrapValidator({
        message: 'Nilai tidak valid',
       feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            peg_id: {
                validators: {
                    notEmpty: {
                        message: 'Silakan isikan ID Pegawai di Mesin'
                    },
					numeric: {
						message: 'isian harus berupa angka'
					}
                }
            },
			peg_nama: {
                validators: {
                    notEmpty: {
                        message: 'Silakan isikan nama lengkap'
                    },
                    stringLength: {
                        min: 3,
                        max: 100,
                        message: 'minimal 3 huruf'
                    }
                }
            },
			peg_jk: {
                validators: {
                    notEmpty: {
                        message: 'Silakan pilih jenis kelamin'
                    }
                }
            },
            peg_unitkerja: {
                validators: {
                    notEmpty: {
                        message: 'Silakan pilih unit kerja'
                    }
                }
            },
            peg_jabatan: {
                validators: {
                    notEmpty: {
                        message: 'Silakan pilih jabatan'
                    }
                }
            },
            peg_status: {
            validators: {
                notEmpty: {
                    message: 'Silakan pilih status absen pegawai'
                      }
                  }
            }
        }
    });
});

$(document).ready(function() {
    $('#formUnitKerja').bootstrapValidator({
        message: 'Nilai tidak valid',
       feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            unit_kode: {
                validators: {
                    notEmpty: {
                        message: 'Silakan isikan kode'
                    },
                    numeric: {
                        message: 'isian harus berupa angka'
                    },
                    stringLength: {
                        min: 5,
                        max: 5,
                        message: 'harus lima digit angka'
                    }
                }
            },
            unit_nama: {
                validators: {
                    notEmpty: {
                        message: 'Silakan isikan nama unit'
                    },
                    stringLength: {
                        min: 10,
                        max: 100,
                        message: 'minimal 10 huruf'
                    }
                }
            },
            unit_jenis: {
                validators: {
                    notEmpty: {
                        message: 'Silakan pilih unit jenis'
                    }
                }
            },
            unit_eselon: {
                validators: {
                    notEmpty: {
                        message: 'Silakan pilih unit eselon'
                    }
                }
            }
        }
    });
});