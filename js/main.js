$(document).ready(function() {
    if ($('#uploadjs').length > 0) {

        $.post('/' + taal_id + '/register/ajax_get_fotos', {}, function(html) {
            $('#uploadjs').fineUploader({
                request: {
                    endpoint: '/' + taal_id + '/register/ajax_foto_upload'
                },
                multiple: false,
                text: {
                    uploadButton: taal['select_photo_title']
                },
                template: '<div style="margin-top:40px; margin-bottom:10px;" class="info_title"><p class="cursief"><strong>' +
                    taal['new_photo'] + '</strong></p></div><ul class="uploadimages first_new" id="uploadimages"><li class="qq-upload-button"><span>' +
                    taal['upload_title'] + '</span></li>' +
                    html.data.new + '</ul>' +
                    '<pre class="qq-upload-drop-area span12" style="display: none;"><span>{dragZoneText}</span></pre>' +
                    '<ul class="qq-upload-list" style="display: none; margin-top: 10px; text-align: center;"></ul></div>' + html.data.old
            }).on('complete', function(event, id, fileName, responseJSON) {
                $("#ajaxuploadloader").remove();
                $('.qq-upload-button').show();

                if (responseJSON['bericht'] !== '') {
                    jAlert(1, responseJSON['bericht']);
                } else {
                    $('<li><div style="height:190px; width:190px;  overflow: hidden;"><img class="delete" style="cursor:pointer; position: absolute; width: 32px; height: 32px; margin: 10px; margin-left:150px;" src="/images/remove.png" alt=""/><img class="model_photo" style=" height: auto; width: auto; min-height:190px; min-width:190px; " src="/' + responseJSON['url'] + '?url=' + new Date().getTime() + '" /></div></li>').insertAfter('.qq-upload-button');
                }
            }).on('progress', function(event, id, filename, uploadedBytes, totalBytes) {
                if (uploadedBytes == totalBytes) {
                    var percents = 99 + " Saving..";
                } else {
                    var percents = parseInt(uploadedBytes / totalBytes * 100);
                }
                $('.progress-bar').html('<p>Uploading ' + percents + '%</p>')
            }).on('upload', function(event, id, fileName) {
                $('.qq-upload-button').hide();
                $("#uploadimages.first_new").prepend('<li id="ajaxuploadloader"><img src="/images/ajax-loader.gif" alt="" /><div class="progress-bar" style="width: 55%; margin:auto; margin-top:20px; z-index:10000;"></div></li>');
            });
        }, "json");
    }

    $("input[name='modelcode'], input[name='vergetenemail']").focus(function() {
        var input = $(this);

        if (input.val() == input.data('container')) {
            input.val('');
        }
    }).blur(function() {
        var input = $(this);

        if (input.val() == '') {
            input.val(input.data('container'));
        }
        ;
    });

    $('body').on('change', 'input[name="where_known"]', function() {
        if ($(this).val() == 1) {
            $('.keywords-block').removeClass('dsp_none');
        } else {
            $('.keywords-block').addClass('dsp_none');
        }
    });


    $('.custom-select-js').customSelect({
        customClass: 'custom-select'
    });
    $('.custom-select-klein-js').customSelect({
        customClass: 'custom-select-klein'
    });
    $('.custom-select-medium-js').customSelect({
        customClass: 'custom-select-medium'
    });
    $('.custom-select-eigenschappen-js').customSelect({
        customClass: 'custom-select-eigenschappen'
    });

    $("img.delete").live('click', function(e) {
        e.preventDefault();
        var src = $(this).parent().find(".model_photo").attr('src');

        $.post('/' + taal_id + '/register/ajax_delete_foto', {
            img: src
        }, function(response) {
            window.location = '/' + taal_id + '/register/4';
        });
    });
});

function naarStap2() {
    var formulier = {};
    var ok = true;
    var ok_email = true;

    $('#form-stap1 input, #form-stap1 select').each(function() {
        var element = $(this);

        if (element.hasClass('niet-verplicht')) {
            formulier[element.attr('name')] = element.val();
        } else {
            if (element.val() == 0 || element.val() == '') {
                ok = false;
                element.parent().removeClass('ok').addClass('error');
            } else {
                element.parent().removeClass('error').addClass('ok');
                formulier[element.attr('name')] = element.val();

                if (element.attr('name') == 'email' || element.attr('name') == 'email_opnieuw') {
                    if (!checkEmail(element.val())) {
                        ok_email = false;
                        element.parent().removeClass('ok').addClass('error');
                    }
                }
            }
        }
    });

    formulier['where_known'] = $("input[name='where_known']:checked").val();

    if (ok == true && ok_email == true) {
        $.post('/' + taal_id + '/register/ajax_naar_stap_2', formulier, function(ajax_return) {
            if (ajax_return['success'] == 1) {
                window.location = '/' + taal_id + '/register/2';
            } else if (ajax_return['success'] == 2) {
                window.location = '/' + taal_id + '/register/3';
            } else {
                jAlert(1, ajax_return['bericht']);
            }
        }, 'json');
    } else {
        var alert = '';

        if (ok == false) {
            alert += taal['verplichte_velden'] + '<br/>';
        }

        if (ok_email == false) {
            alert += taal['geen_geldige_email'];
        }

        jAlert(1, alert);
    }
}

function naarStap3() {
    var formulier = {};
    var ok = true;

    $('#form-stap2 select:not(:disabled)').each(function() {
        var element = $(this);

        if (element.val() == 0) {
            ok = false;
            element.parent().removeClass('ok').addClass('error');
        } else {
            formulier[element.attr('name')] = element.val();
            element.parent().removeClass('error').addClass('ok');
        }
    });

    var ethnic = $('.ethnic-input:checked');

    if (!ethnic.length) {
        ok = false;

        $('.ethnic-input').each(function() {
            var element = $(this);

            if (!element.isChecked) {
                element.removeClass('ok').addClass('error-checkbox');
            } else {
                element.removeClass('error-checkbox').addClass('ok');
            }
        });
    }

    if (ok === false) {
        jAlert(1, taal['verplichte_velden']);
    } else {
        $("#checkboxes-stap2 input[type='checkbox']").each(function() {
            var element = $(this);

            if (element.is(':checked')) {
                formulier[element.attr('name')] = 1;
            } else {
                formulier[element.attr('name')] = 0;
            }
        });

        $.post('/' + taal_id + '/register/ajax_naar_stap_3', formulier, function(ajax_return) {
            window.location = '/' + taal_id + '/register/3';
        });
    }
}


function naarStap4(debug) {
    var formulier = {};
    var checked = false;

    $("#form-stap3 input[type='checkbox']").each(function() {
        var element = $(this);

        if (element.is(':checked')) {
            formulier[element.attr('name')] = 1;
            checked = true;
        } else {
            formulier[element.attr('name')] = 0;
        }
    });

    formulier['ervaring_uitleg'] = $("textarea[name='ervaring_uitleg']").val();
    formulier['talenten_uitleg'] = $("textarea[name='talenten_uitleg']").val();

    if (checked && !formulier['ervaring_uitleg'] && !debug) {
        jAlert(1, taal['form_experience_warning']);
    } else if (!formulier['talenten_uitleg'] && !debug) {
        jAlert(1, taal['form_talent_warning']);
    } else {
        formulier['video_code_1'] = $("#video_code_1").val();
        formulier['video_code_2'] = $("#video_code_2").val();
        formulier['video_code_3'] = $("#video_code_3").val();
        formulier['video_code_4'] = $("#video_code_4").val();
        formulier['video_code_5'] = $("#video_code_5").val();
        formulier['video_code_6'] = $("#video_code_6").val();
        $.post('/' + taal_id + '/register/ajax_naar_stap_4', formulier, function(ajax_return) {
            window.location = '/' + taal_id + '/register/4';
        });
    }
}

function naarStap5() {
    var soortFotos = $("input[name='soort_fotos']:checked").val();
    var informatie = 0;

    if ($("input[name='informatie']").is(':checked')) {
        informatie = 1;
    }
    var fotografen = $("input[name='fotografen']").val();
    $.post('/' + taal_id + '/register/ajax_naar_stap_5', {
        soort: soortFotos,
        informatie: informatie,
        fotografen: fotografen
    }, function(ajax_return) {
        if (ajax_return['success'] == 1) {
            window.location = '/' + taal_id + '/register/5';
        } else {
            jAlert(1, taal['geen_fotos']);
        }
    }, 'json');
}

function naarStap6() {
    if (!$("input[name='voorwaarden']").is(':checked')) {
        jAlert(1, taal['algemene_voorwaarden']);
    } else {
        $.post('/' + taal_id + '/register/ajax_naar_stap_6', {}, function(ajax_return) {
            if (ajax_return['success'] == 1) {
                window.location = '/' + taal_id + '/register/6';
            } else {
                jAlert(1, ajax_return['bericht']);
            }

        }, 'json');
    }
}

function checkEmail(email) {
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (reg.test(email) == false) {
        return false;
    } else {
        return true;
    }
}

/***********************
 * LOADER
 **********************/
function loader(soort) {
    if (soort == 1) {
        $("body").prepend('<div id="modal-bg"></div><div id="modal" class="loader"><img src="/images/loader.gif" alt="" /></div>');
    } else if (soort == 0) {
        setTimeout(function() {
            $("#modal-bg").remove();
            $("#modal").remove();
        }, 2000);
    } else if (soort == 2) {
        $("#modal-bg").remove();
        $("#modal").remove();
    }
}

/***********************
 * ALERT
 **********************/
function jAlert(soort, tekst) {
    if (soort == 1) {
        $("body").prepend('<div id="modal-bg"></div><div id="modal" class="alert"><p>' + tekst + '</p><p style="margin-bottom: 0px;"><a href="javascript:jAlert(0, \'\')" style="display: inline-block" class="button">OK</a></p></div>');
    } else {
        $("#modal-bg").remove();
        $("#modal").remove();
    }
}

function modelCode() {
    var modelCode = $("input[name='modelcode']").filter(function() {
        return this.value != '';
    }).val();

    if (
        modelCode == '' ||
        modelCode == $("input[name='modelcode']").data('container')
    ) {
        jAlert(1, taal['niets_ingegeven']);
    } else {
        $.post('/' + taal_id + '/register/ajax_modelcode', {
            code: modelCode
        }, function(ajax_return) {
            if (ajax_return['success'] == 1) {
                window.location = '/' + taal_id + '/register/1';
            } else {
                jAlert(1, taal['geen_model']);
            }

        }, 'json');
    }
}

function modelCodeByEmail() {
    var email = $("input[name='email_code']").val();
    sendModelCodeByEmail(email);
}

function messageSent(json) {
    jAlert(1, json.message)
}

function wachtwoordVergeten() {
    var email = $("input[name='vergetenemail']").val();

    if (email == '' || email == $("input[name='vergetenemail']").data('container')) {
        jAlert(1, taal['niets_ingegeven']);
    } else {
        if (!checkEmail(email)) {
            jAlert(1, taal['geen_geldige_email']);
        } else {
            $.post('/' + taal_id + '/register/ajax_vergeten', {
                email: email
            }, function(ajax_return) {
                if (ajax_return['success'] == 1) {
                    $("input[name='vergetenemail']").val($("input[name='vergetenemail']").data('container'));
                    jAlert(1, taal['vergeten_verstuurd']);
                } else {
                    jAlert(1, taal['vergeten_fout']);
                }

            }, 'json');
        }
    }
}
