var DialogWindow = (function() {
    'use strict';

    var templates = {
        'notification': '<div id="modal-bg"></div><div id="modal" class="alert"><div class="dialog-message-block">:message</div><div class="button-message-block"><div class="wrapper"><a id="close-dialog-button" class="button single-button">OK</a></div></div></div>',
        'updateField': '<div id="modal-bg"></div><div id="modal" class="alert"><div class="dialog-message-block"><label class="update-model-label"><input type="text" id="update-model-field" value=":message"></label></div><div class="button-message-block"><div class="wrapper"><a id="save-model-button" class="button">Save</a><a id="close-dialog-button" class="button">Close</a></div></div></div>',
        'addToSelection': '<div id="modal-bg"></div><div id="modal" class="alert"><div class="dialog-message-block"><label class="update-model-label"><input type="text" id="update-model-field" value=":message"></label></div><div class="button-message-block"><div class="wrapper"><a id="add-to-selection" class="button">Save</a><a id="close-dialog-button" class="button">Close</a></div></div></div>',
        'addFromEmail': '<div id="modal-bg"></div><div id="modal" class="alert"><div class="dialog-message-block"><label class="update-model-label"><input type="text" id="update-model-field" value=":message"></label></div><div class="button-message-block"><div class="wrapper"><a id="add-email-from" class="button">Save</a><a id="close-dialog-button" class="button">Close</a></div></div></div>'
    };

    function DialogWindow(options) {
        this.options = extend( {}, this.options );
        extend( this.options, options );
        this._init();
    }

    DialogWindow.prototype._init = function() {
        this.box = document.createElement("div");
        this.box.id = 'dialog-window';
        this.box.innerHTML = templates[this.options.type].replace(/:message/i, this.options.message);
        this.options.wrapper.appendChild(this.box);
        this._initEvents();
    };

    DialogWindow.prototype._initEvents = function() {
        var self = this;

        this.box.querySelector("#close-dialog-button").addEventListener('click', function() {
            self.dismiss();
        });

        switch (this.options.type) {
            case 'updateField':
                this.box.querySelector("#save-model-button").addEventListener('click', function() {
                    copyToClipboard(self.box.querySelector('#update-model-field'));
                });
                break;
            case 'addToSelection':
                this.box.querySelector("#add-to-selection").addEventListener('click', function() {
                    var parameters = {
                        'selection': self.options.selection,
                        'models': self.box.querySelector('#update-model-field').value
                    };

                    self.dispatch('/api/selection/addModels', parameters);
                });
                break;
            case 'addFromEmail':
                this.box.querySelector("#add-email-from").addEventListener('click', function() {
                    var parameters = {
                        'address': self.box.querySelector('#update-model-field').value
                    };

                    self.dispatch('/api/email/addFrom', parameters);
                });
                break;
        }
    };

    DialogWindow.prototype.show = function() {
        this.options.wrapper.appendChild(this.box);
    };

    DialogWindow.prototype.dismiss = function() {
        this.options.wrapper.removeChild(this.box);
    };

    DialogWindow.prototype.options = {
        wrapper: document.body,
        type: 'notification',
        message: 'Default message.',
        target: 'email'
    };

    DialogWindow.prototype.dispatch = function (url, parameters) {
        var self = this;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                resolveRemoteResponse(JSON.parse(xhr.responseText), self);
            }
        };

        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.send(JSON.stringify(parameters));
    };

    function extend(a, b) {
        for( var key in b ) {
            if( b.hasOwnProperty( key ) ) {
                a[key] = b[key];
            }
        }

        return a;
    }

    function resolveRemoteResponse(response, self) {
        if (response.error === false) {
            self.dismiss();
            successRefresh();
        } else {
            new DialogWindow(
                {
                    message: response.message,
                    type: 'notification',
                    wrapper: document.body
                }
            );
        }
    }

    return DialogWindow;

})();

$(document).ready(function() {

    $("body")
        .on("click", "a[data-id='models-message']", function() {
            var id = $(this).parent().parent().attr('id').replace(/\D/g, "");
            var user_type = $('#user_type').val();
            getLogByParams(id, user_type);
        })
        .on("click", "a[data-id='models-message']", function() {
            var id = $(this).parent().parent().attr('id').replace(/\D/g, "");
            var user_type = $('#user_type').val();
            getLogByParams(id, user_type);
        })
        .on("click", ".delete-mail", function() {
            removeEmail($(this).attr('data-id'));
        })
        .on("click", '#test-button', function() {
            testEmail($('#email_id').val());
        })
        .on('click','#map_poppup',function(e){
            if (e.target === this) {
                closePoppup();
            }
        })
        .on("submit",'#model_poppup form',function(){
            $.post($(this).attr('action'), $(this).serialize(), function(response) {
                if (response.bericht !== 'none') {
                    alert(response.bericht);
                }
            },'json');

            return false;
        })
        .on("click", '#submit-model-profile', function() {
            $('#formulier').submit();
        })
        .on("focus", ".model_message textarea[name='text'], .models-message textarea[name='text']", function() {
            $('.custom-select-new[name="bericht"], .custom-select-new[name="mail_id"]').each(
                function() {
                    $('.model_message .mail-id-block span, .models-message .mail-id-block span')
                        .each(function(){ $(this).text('XX') });
                    $(this).val('42');
                }
            );
        })
        .on("click", ".model-photos .photo-checkbox", function() {
            var $container = $(this).parent();

            if ($(this).hasClass('actief')) {
                $(this).removeClass('actief')
            } else {
                $(this).addClass('actief');
            }

            var pdf = $container.find('.pdf').hasClass('actief') ? 1 : 0;
            var online = $container.find('.online').hasClass('actief') ? 1 : 0;
            var group = $container.parent().parent().attr('data-id');
            var id = $container.parent().attr('data-image-id');

            photoCheck(id, pdf, online, group);
        })
        .delegate("#close_button", "click", function() {
            closePoppup();
        })
        .on('click', '.model', function() {
            var id = $(this).data('modelid');
            getModelTemplate(id);
        })
        .on('click', '.featherlight', function(e) {
            if (e.target == this) {
                closePoppup();
                e.preventDefault();
            }
        })
        .on('change', "#images",function() {
            $('#multiple_upload_form').ajaxForm({
                beforeSubmit:function(e){
                    $('#infscr-loading').show();
                },
                dataType: 'json',
                success:function(e){
                    $('#infscr-loading').hide();
                    alert(e.message);

                    if (e.page == 'single_page') {
                        window.location.reload();
                    } else {
                        var id = $('#model_poppup').attr('data-id');
                        getModelTemplate(id);
                    }
                },
                error:function(e){
                }
            }).submit();
        })
        .on('click', '#private_message_send', function() {
            var block = $(this).parent().parent().parent();
            var mail_id = block.find("select[name='bericht']").find(":selected").val();
            var model_id = block.find("input[name='send_message_id']").val();
            var mailFrom = block.find("select[name='mail_from']").find(":selected").val();
            var customMessage = block.find(".model_message textarea[name='text']").val();

            if (! model_id) {
                model_id = $("#model_poppup input[name='send_message_id']").val();
            }

            sendEmailToModel(mail_id, model_id, mailFrom, customMessage);
        })
        .on('mouseenter', '.model', function() {
            $(this).find('.add_model_to_selection').show();
        })
        .on('mouseleave', '.model', function() {
            $(this).find('.add_model_to_selection').hide();
        })
        .on('click', '.add_model_to_selection', function(e) {
            e.stopPropagation();
            var model_id = $(this).parent().attr('data-modelid');
            $("#save-single-selection").toggle();
            $("#popup-bg").toggle();
            $("#save-single-selection").find('input[name="model_id"]').val(model_id);
        })
        .delegate(".for_sel", "click", function() {
            var selection_id = $(this).parent().attr('data-id');
            deleteSelection(selection_id);
        })
        .on('click', '#search-submit-button', function(e) {
            window.location.href = '/cms/models/models/lijst?search=' + $(this).siblings('input').val();
        })
        .on('blur', '.capitalize', function(event) {
            capitalizeFirstLetters();
        })
        .on('click', '.new-keyword', function () {
            $('    <tr>\n' +
                '        <td colspan="2">\n' +
                '            <label for="template-keyword">Keyword: </label>\n' +
                '            <p class="input-new"><input type="text" name="keyword"/></p>\n' +
                '        </td>\n' +
                '        <td>\n' +
                '            <label for="template-content">Content: </label>\n' +
                '            <p class="input-new">\n' +
                '                <textarea class="niet-verplicht" name="template-content" style="height:100px;"></textarea>\n' +
                '            </p>\n' +
                '        </td>\n' +
                '        <td class="center button">\n' +
                '            <a href="#keyword-list" class="save-keyword" data-id="">Save</a>\n' +
                '        </td>\n' +
                '        <td class="center button">\n' +
                '            <a href="#keyword-list" class="delete-keyword" data-id="">Delete</a>\n' +
                '        </td>\n' +
                '    </tr>').insertAfter('.template-header');
        })
        .on('click', '.delete-keyword', function () {
            removeKeyword($(this).attr('data-id'));
            $(this).parent().parent().remove();
        })
        .on('click', '.save-keyword', function () {
            var keyword = $(this).parent().parent().find('input[name="keyword"]').val();
            var content = $(this).parent().parent().find('textarea[name="template-content"]').val();

            addKeyword($(this).attr('data-id'), keyword, content);
        })
        .on('click', '.delete-model', function () {
            if (confirm('Are you sure you want to delete this model?')) {
                deleteModelById($('input[name="id"]').val());
            }
        })
        .on('click', '#image-tabs a.tabs', function(e) {
            var tab = $(this);
            var id = tab.attr('href');

            e.preventDefault();
            $("#image-tabs a.tabs").addClass('inactief');
            tab.removeClass('inactief');

            $("#image-tabs .tab").hide();
            $(id).show();
        });

    $('#cms-search-block input').keypress(function(e) {
        if (e.keyCode == 13) {
            window.location.href = '/cms/models/models/lijst?search=' + $(this).val();
        }
    });

    initICheck();
    capitalizeFirstLetters();

    $('form.ajax').submit(function(e) {
        var ok = true;
        var ok_email = true;

        if (e.preventDefault) {
            e.preventDefault();
        } else {
            e.returnValue = false;
        }

        var form = $(this);
        var data = {};

        $("input, textarea, select", form).each(function() {
            var input = $(this);

            if (input.attr('id') == 'editor-inhoud') {
                data[input.attr('name')] = $("#editor-inhoud").val();
            } else {
                if (input.hasClass('editor')) {
                    data[input.attr('name')] = CKEDITOR.instances[input.attr('name')].getData();
                } else {
                    data[input.attr('name')] = input.val();
                }
            }
        });

        $("input[type='radio'], input[type='checkbox']").each(function() {
            if (this.checked) {
                if (this.value == 'on') {
                    data[this.name] = 1;
                } else {
                    data[this.name] = this.value;
                }
            } else {
                data[this.name] = 0;
            }
        });

        $('input, select', form).each(function() {

            var element = $(this);


            if (!element.hasClass('niet-verplicht') && element.attr('disabled') !== 'disabled') {
                if (element.val() == 0 || element.val() == '' || element.val() == element.data('container')) {
                    ok = false;
                    element.parent().removeClass('ok').addClass('error');
                } else {
                    element.parent().removeClass('error');

                    if (element.attr('name') == 'email' || element.attr('name') == 'email_opnieuw') {
                        if (!checkEmail(element.val())) {
                            ok_email = false;
                            element.parent().removeClass('ok').addClass('error');
                        }
                    }
                }
            }

        });

        $.ajax({
            type: "POST",
            dataType: 'json',
            data: data,
            url: form.attr('action'),
            error:
                    function(err) {
                        console.log(err);
                        alert('Er is een technische fout opgetreden. Contacteer <strong>Websiting!</strong> indien deze fout zich blijft voordoen.');
                        $("input[type='submit']").removeAttr('disabled');
                    },
            success:
                    function(json) {
                        if(json.new_selection != undefined) {
                            var single_selection = $("#single_selection")
                            var selection_title = $("input[name='selection_title']");
                            single_selection.val(json.new_selection.name)
                            single_selection.parent().parent().addClass("is-value");
                            $("#single_selection_id").val(json.new_selection.id);
                            $("#single_selection_options").prepend(`<div data-single-selection="${json.new_selection.id}" class="cms-select-optional">${json.new_selection.name}</div>`);
                            selection_title.val("");
                            selection_title.parent().parent().removeClass("is-value");
                        }
                        if (json['bericht'] != 'none') {
                            if (json['bericht']) {
                                if (json['redirect']) {
                                    alert(json['bericht']);
                                    window.location = json['redirect'];
                                } else {
                                    alert(json['bericht']);
                                }

                                if (json['function']) {
                                    eval(json['function']);
                                }
                            } else if (json['message']) {

                                alert(json['message']);

                                if (json['function']) {
                                    eval(json['function']);
                                }
                            } else if (json['redirect']) {
                                window.location = json['redirect'];
                            } else {
                                refreshPage();
                            }
                        } else if(json['function']) {
                            eval(json['function']);
                        }

                    }
        });
    });

    /************************
     * INPUT BLUR/FOCUS
     ***********************/
    $('input, textarea').each(function() {
        var input = $(this);

        if (input.data('container') !== '' && input.val() == '') {
            input.val(input.data('container'));
        }
    }).focus(function() {
        var input = $(this);

        if (input.data('container') !== '' && input.val() == input.data('container')) {
            input.val('');
        }
    }).blur(function() {
        var input = $(this);

        if (input.data('container') !== '' && input.val() == '') {
            input.val(input.data('container'));
        }
    });

    /************************
     * MODELGROEPEN
     ***********************/
    $("#model-groepen .model-tabs-checkbox input.created.text").live('blur', function() {
        var input = $(this);

        input.hide();
        $("span", input.parent()).html(input.val()).show()
        editGroup($(this).parent().attr('data-id'), $(this).val());
    });

    $("#model-groepen .model-tabs-checkbox input.new.text").live('blur', function() {
        var input = $(this);

        input.hide();
        $("span", input.parent()).html(input.val()).show()
        createGroup($(this).parent().parent().parent().attr('data-id'), $(this).val());
    });

    $("#model-groepen .model-tabs-checkbox span").live('click', function() {
        var span = $(this);

        span.hide();
        $("input.text", span.parent()).show().focus();
    });

    /************************
     * TABS
     ***********************/
    $("#model-tabs a.tabs").live('click',function(e) {
        var tab = $(this);
        var id = tab.attr('href');

        e.preventDefault();
        $("#model-tabs a.tabs").addClass('inactief');
        tab.removeClass('inactief');

        $("#model-tabs .tab").hide();
        $(id).show();
    });

    /************************
     * SORTEREN
     ***********************/
    onsiteSortable();

    /************************
     * CUSTOM SELECT DESIGN
     ***********************/
    $('.custom-select-js').customSelect({customClass: 'custom-select-cms'});
    $('.custom-select-js-dag').customSelect({customClass: 'custom-select-cms-dag'});
    $('.custom-select-js-jaar').customSelect({customClass: 'custom-select-cms-jaar'});
    $('.custom-select-js-eigenschap').customSelect({customClass: 'custom-select-cms-eigenschap'});
    $('.custom-select-new').customSelect({customClass: 'custom-select-new'});

    /************************
     * POPUPS
     ***********************/

    $("button.popup").live('click', function(e) {
        e.preventDefault();
        var link = $(this);

        $("#popup-bg").show();
        $("#" + link.data('id')).show();

        if (link.data('url')) {
            $.post(link.data('url'), {}, function(response) {
                $.each(response, function(key, value) {
                    $("input[name='" + key + "']", $("#" + link.data('id'))).val(value);
                    $("textarea[name='" + key + "']", $("#" + link.data('id'))).val(value);
                });
            }, 'json');
        }

        if (link.data('function')) {
            eval(link.data('function'));
        }
    });


    $("a.popup").live('click', function(e) {
        e.preventDefault();
        var link = $(this);

        $("#popup-bg").show();
        $("#" + link.data('id')).show();

        if (link.data('url')) {
            $.post(link.data('url'), {}, function(response) {
                $.each(response, function(key, value) {
                    $("input[name='" + key + "']", $("#" + link.data('id'))).val(value);
                    $("textarea[name='" + key + "']", $("#" + link.data('id'))).val(value);
                });
            }, 'json');
        }

        if (link.data('function')) {
            eval(link.data('function'));
        }
    });

    $("a.close").click(function(e) {
        e.preventDefault();
        //$("div.popup").hide();
        //$("#popup-bg").hide();
        $(this).parents('#popup-bg').hide();
        $(this).parents('.cms-popup-bg').hide();
    });

    /************************
     * RIJ VERWIJDEREN
     ***********************/
    $(".del-rij").click(function(e) {
        e.preventDefault();
        var link = $(this);

        if (confirm(link.data('bericht')) == true) {
            $.post(link.data('url'), {}, function(response) {
                if (response['success'] == 1) {
                    link.parent().parent().fadeOut();
                }
            }, 'json');
        }
    });

    /************************
     * FILTER
     ***********************/
    $("#filter a.geslacht").click(function(e) {
        e.preventDefault();

        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    });


    $("#filter div.groep").click(function() {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    });

    $(".model-delivered-photo").hover(function() {
        $(this).find('.rotate_image').show();

    }, function() {
        $(this).find('.rotate_image').hide();

    })



    $("select[name='addfilter']").change(function() {
        var value = $(this).val();
        var counter = $(this).data('counter');
        $(this).data('counter', counter + 1);

        if ($("#filter_" + value + ":visible").length > 0) {
            alert('Er bestaat reeds een filter met deze eigenschap');
        } else {
            if (value !== 'ADD') {
                $("#filter_" + value).show();
            }
        }
    });

    $("div.filter a.close").click(function(e) {
        $(this).parent().hide();

        $("select", $(this).parent()).val('');
        $('select', $(this).parent()).trigger('update');
    });

    /************************
     * MODEL
     ***********************/

});

function preview(id, code) {
    $("#preview-images").empty();

    if (typeof code == 'undefined') {
         $("#preview-images").css('overflow', 'auto');
        getVip(id);
    } else {
        $("#preview-images").css('height', '400px');
        $("#preview-images").css('overflow', 'auto');
        $.post('/ajax/get_model_logs', {model_id: id}, function(response) {
            var $main_div = $("<div>", {id: 'cms-eventlog', style: 'margin-top: 0px;'});
            var $content_ul = $("<ul>");

            if (typeof response.data.logs == 'undefined') {
                $content_ul.append('<li> No logs yet</li>');
            } else {
                $.each(response.data.logs, function(key, value) {
                    $content_ul.append('<li>' + value.timestamp + ' - <strong>' + response.data.model.voornaam + ' ' + response.data.model.naam + '</strong>: ' + value.bericht + '<a href="/cms/models/models/aanpassen/?id=' + value.id_model + '>View</a></li>');
                });
            }
            $main_div.append($content_ul);
            $("#preview-images").append($main_div);
            $("#models-preview").css('margin-top', '-303px');
            $("#models-preview").css('height', '400px');
        }, 'json');
    }
}

function onsiteSortable() {
    $(".onsite-images").sortable({
        stop: function(event, ui) {
            setImageOrder($(this));
        }
    });

    $(".onsite-images").disableSelection();
}

function setImageOrder($container) {
    var sorted = $container.sortable("serialize");
    var group = $container.attr("data-id");

    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            items: sorted,
            group: group
        },
        url: "/api/image/order",
        error:
            function() {
                alert('Er is een technische fout opgetreden.');
            },
        success:
            function(json) {
                if (json.error === true) {
                    alert(json.message);
                }
            }
    });
}

function checkEmail(email) {
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (reg.test(email) == false) {
        return false;
    } else {
        return true;
    }
}

function groepToevoegen() {
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: "/cms/models/models/ajax_groep_toevoegen/",
        error:
                function() {
                    alert('Er is een technische fout opgetreden.');
                },
        success:
                function(json) {
                    if (json['success'] == 0) {
                        alert(json['bericht']);
                    } else {
                        var html = '<div class="model-tabs-checkbox" data-id="' + json['id'] + '"><input type="checkbox" class="checkbox" name="groep_' + json['id'] + '" /><span id="groep_naam_' + json['id'] + '"></span><input type="text" class="text niet-verplicht" name="groep_naam_' + json['id'] + '" style="display: block;" /></div>';
                        $("#model-groepen").prepend(html);

                        $("input[name='groep_naam_" + json['id'] + "']").focus();

                        $("input[type='checkbox'], input[type='radio']").iCheck({
                            checkboxClass: 'icheckbox_square-green',
                            radioClass: 'iradio_square-green',
                            increaseArea: '20%'
                        });
                    }
                }
    });
}

function addNewGroup(id) {
    if (!$("#model-groepen .root-group[data-id=" + id + "] .new_group").length) {
        var html = '<div class="model-tabs-checkbox new_group" data-id="'
            + '' + '"><input type="checkbox" class="checkbox" name="groep_'
            + '' + '" /> <span id="groep_naam_'
            + '' + '"></span><input type="text" class="text niet-verplicht new" name="groep_naam_'
            + '' + '" style="display: block;" /></div>';

        $("#model-groepen .root-group[data-id=" + id + "] .root-groups").prepend(html);
    }

    $("#model-groepen .root-group[data-id=" + id + "] .root-groups .new_group input.text").focus();
}

function groepVerwijderen(id) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {id: id},
        url: "/cms/models/models/ajax_groep_verwijderen/",
        error:
                function() {
                    alert('Er is een technische fout opgetreden.');
                },
        success:
                function(json) {
                    if (json['success'] == 0) {
                        alert(json['bericht']);
                    } else {
                        $(".model-tabs-checkbox[data-id='" + id + "']").remove();
                    }
                }
    });
}

function veranderThumbs(soort) {
    $(".model-delivered-view a").removeClass('actief');
    $("#view_" + soort).addClass('actief');

    $(".model-delivered-photo img").attr('src', "/images/loader.gif");

    $(".model-delivered-photo img").each(function() {
        $(this).attr('src', src);
        var src = $(this).data('view' + soort);
        $(this).attr('src', src);
    });
}

function showCrop(id) {
    $("#crop-modal").show();
    $("#crop-modal iframe").attr('src', '/cms/models/models/crop/?img=' + id);
}

function closeCrop(id) {
    $("#crop-modal").hide();
    $("#crop-modal iframe").attr('src', '');

    if (id > 0) {
        getOnSitePhotos(id);
    }
}

function getOnSitePhotos(id) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {id: id},
        url: "/api/render/siteImages",
        error:
            function() {
                alert('Er is een technische fout opgetreden.');
            },
        success:
            function(json) {
                if (json.error === true) {
                    alert(json.message);
                } else {
                    $("#onsite-fotos").html($(json.data));

                    onsiteSortable();
                }
            }
    });
}

function photoCheck(id, pdf, online, group) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            id: id,
            pdf: pdf,
            online: online,
            group: group
        },
        url: "/api/image/properties",
        error:
            function() {
                alert('Er is een technische fout opgetreden.');
            },
        success:
            function(json) {
                if (json.error === true) {
                    alert(json.message);
                }
            }
    });
}

function deletePhoto(id) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {id: id},
        url: "/api/image/remove",
        error:
            function() {
                alert('Er is een technische fout opgetreden.');
            },
        success:
            function(json) {
                if (json.error === true) {
                    alert(json.message);
                } else {
                    $(".foto_list_" + id).remove();
                }
            }
    });
}

function modelVideo(id) {
    var code = $("input[name='video']").val();

    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {id: id, code: code},
        url: "/cms/models/models/ajax_video_toevoegen/",
        error:
                function() {
                    alert('Er is een technische fout opgetreden.');
                },
        success:
                function(json) {
                    if (json['success'] == 1) {
                        $("#videos").empty().load('/cms/models/models/ajax_videos/?id=' + id, function() {
                        });
                        $("input[name='video']").val('');
                    }
                }
    });
}

function veranderGeslacht(geslacht) {
    var geslacht = $("select[name='geslacht']").val();
    var datum = $("select[name='geboortedatum_jaar']").val() + '-' + $("select[name='geboortedatum_maand']").val() + '-' + $("select[name='geboortedatum_dag']").val();
    var leeftijd = getAge(datum);

    $(".cms-model").addClass('inactief');
    $(".cms-model select").attr('disabled', 'disabled');

    if (leeftijd > 16) {
        if (geslacht == 'M') {
            $(".cms-model.man").removeClass('inactief');
            $(".cms-model.man select").removeAttr('disabled');
        } else if (geslacht == 'V'){
            $(".cms-model.vrouw").removeClass('inactief');
            $(".cms-model.vrouw select").removeAttr('disabled');
        }
    } else {
        $(".cms-model.kind").removeClass('inactief');
        $(".cms-model.kind select").removeAttr('disabled');
    }
}

function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

function modelVerwijderen(id) {
    if (confirm('Weet u zeker dit u dit model wil verdwijderen?')) {
        $.ajax({
            type: "POST",
            dataType: 'json',
            data: {id: id},
            url: "/cms/models/models/ajax_model_verwijderen/",
            error:
                    function() {
                        alert('Er is een technische fout opgetreden.');
                    },
            success:
                    function(json) {
                        if (json['success'] == 1) {
                            alert('Het model is verwijderd!');
                            window.location = '/cms';
                        }
                    }
        });
    }
}

function email_view(id, language) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            id: id,
            language: language
        },
        url: "/api/email/get",
        error:
                function() {
                    alert('Er is een technische fout opgetreden.');
                },
        success:
                function(json) {
                    if (json.error == false) {
                        $("#emailview").html(json.data.content);
                        $("#email_id").val(id);
                    }
                }
    });
}

function changeModel(id, status) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {id: id, status: status},
        url: "/api/model/status",
        error:
                function() {
                    alert('Er is een technische fout opgetreden.');
                },
        success:
                function(json) {
                    if (! $("#model-details-buttons").length) {
                        $("#model_" + id).fadeOut();
                        $("#archieve_model").fadeOut();

                        if ($("#model_" + id).parent().children().length < 3) {
                            $("#model_" + id).parent().parent().remove();
                        } else {
                            $("#model_" + id).remove();
                        }
                    } else {
                        location.href = '/cms/inschrijvingen/models/updates';
                        //jAlert(1, json.message);
                    }
                }
    });
}

function model_caption(id) {
    $("#caption a").removeClass('active');
    $("#button_caption_" + id).addClass('active');
    $(".model").removeClass('show-caption-0');
    $(".model").removeClass('show-caption-1');
    $(".model").removeClass('show-caption-2');
    $(".model").addClass('show-caption-' + id);
}

function model_view(id) {

    if (id === 1) {

        $('.delete_model_from_selection').hide();
    } else {
        $('.delete_model_from_selection').show();

    }
    $("#view a").removeClass('active');
    $("#button_view_" + id).addClass('active');

    if (id === 0) {
        $("#models-view-normal").hide();
        $("#models-view-table").show();
    } else {
        $("#models-view-normal").show();
        $("#models-view-table").hide();
        $(".model").show();
        $(".model").removeClass('size-1');
        $(".model").removeClass('size-2');
        $(".model").removeClass('size-3');
        $(".model").addClass('size-' + id);
    }
}

var xhr;

function reset_filter() {

}



function rotateImageSuccess(json) {
    if (!json.error) {
        location.reload();
    }
}

function messages(id) {
    $("input[name='model_id']").val(id);
}

function close_popup() {
    location.reload();
}

function closePoppupSelection() {
    $("#save-single-selection").hide();
    $("#popup-bg").hide();
}

function email_preview() {
    window.open('/cms/communicatie/emails/preview/?id=' + $("select[name='mail_id']").val());
}

function email_group_preview() {
    window.open('/cms/communicatie/emails/preview/?id=' + $('#models-message-group').find("select[name='bericht']").val());
}

function add_selection() {
    $("input[name='selection_models']").val(JSON.stringify(getFilterParameters()));
}

function refreshSelections(json) {
    location.reload();
}

function refreshOnNewId(json) {
    if (!json.error) {
        location.href = '/cms/models/models/aanpassen/?id=' + json.new_id;
    }
}

function displaySuccessEmail(json) {
    alert('mail have been sent');
    $("#models-message-group").hide();
    $("#popup-bg").hide();
}

function successRefresh(json) {
    location.reload();
}

function displayLogs(json) {
    $('#email_logs').empty();

    for (var log in json.data) {
        $('#email_logs').append('<p><a href="/cms/communicatie/emails/preview/?log_id=' + json.data[log].id + '" target="_blank"><strong>' + json.data[log].timestamp + '</strong>: ' + json.data[log].title + '</a></p>');
    }
}

function displayPoppupUserInfo(json) {
    $("#models-preview").css('height', '730px');
    $("#models-preview").css('position', 'fixed');
    $("#models-preview").css('top', '150px');
    $("#models-preview").css('width', '700px');
    $("#models-preview #registration").remove();
    $("#models-preview #result_registration").remove();

    var select = '<select  name="sector" id="sector">';
    if (json.data.sector == 'Photographer') {
        select += '<option selected="">Photographer</option>';
    } else {
        select += '<option>Photographer</option>';
    }

    if (json.data.sector == 'Advertising') {
        select += '<option selected="">Advertising</option>';
    } else {
        select += '<option>Advertising</option>';
    }

    if (json.data.sector == 'End user') {
        select += '<option selected="">End user</option>';
    } else {
        select += '<option>End user</option>';
    }

    if (json.data.sector == 'Student') {
        select += '<option selected="">Student</option>';
    } else {
        select += '<option>Student</option>';
    }

    if (json.data.sector == 'Other') {
        select += '<option selected="">Other</option>';
    } else {
        select += '<option>Other</option>';
    }
    select += '</select>';

    $("#models-preview").append('<div id="result_registration" style="margin-top: 20px;" class="lijn gn-margin" style="margin-bottom: 40px;"></div><div id="registration" ><div class="field_wrap"><label>Je naam</label><div class="field_wrap_inp required"><input type="text"  name="name" id="name" value="' + json.data.name + '" placeholder = "name" maxlength="50"/></div></div><div class="field_wrap"><label>Je voornaam</label><div class="field_wrap_inp required"><input type="text"  name="surname" id="surname" value="' + json.data.surname + '" placeholder = "surname" maxlength="50"/></div></div><div class="field_wrap"><label>Je email adres</label><div class="field_wrap_inp required"><input type="email" name="email" id="email" value="' + json.data.email + '" placeholder = "email"  maxlength="50"/></div></div><div class="field_wrap"><label>Address</label><div class="field_wrap_inp"><input type="text" name="address" id="address" value="' + json.data.street + '" placeholder = "address"  maxlength="50"/></div></div><div class="field_wrap"><label>Postal code</label><div class="field_wrap_inp"><input type="text" name="postal" id="postal" value="' + json.data['postal_code'] + '" placeholder = "postal code"  maxlength="50"/></div></div><div class="field_wrap"><label>City</label><div class="field_wrap_inp"><input type="text" name="city" id="city" value="' + json.data.city + '" placeholder = "city"  maxlength="50"/></div></div><div class="field_wrap"><label>Country</label><div class="field_wrap_inp"><input type="text" name="country" id="country" value="' + json.data.country + '" placeholder = "country"  maxlength="50"/></div></div><div class="field_wrap"><label>Telefoonnummer</label><div class="field_wrap_inp required"><input type="tel"  name="phone" id="phone" value="' + json.data.phone + '" placeholder = "phone number"  maxlength="50"/></div></div><div class="field_wrap"><label>Bedrijfsnaam</label><div class="field_wrap_inp required"><input type="text"  name="company" id="company" value="' + json.data.company + '" placeholder = "company"  maxlength="50"/></div></div><div class="field_wrap"><label>Je sector</label><div class="field_wrap_inp required"><div class="field_wrap_inp_sel">' + select + '</div></div></div><div class="field_wrap"><label>Remark</label><div class="field_wrap_inp"><input type="text"  name="remark" id="remark" value="' + json.data.remark + '" placeholder = "remark" maxlength="250"/></div></div><div class="field_wrap"><label>Wachtwoord</label><div class="field_wrap_inp"><input type="password"  name="password" id="password" placeholder="******" value=""/></div></div><div class="field_wrap"><label></label><div class="field_wrap_inp required"><button data_id="' + json.data.id + '" id="submit_update_button">Verzend</button><span>Verplicht veld</span></div></div></div>');

}


function displaySuccessMessage(json) {
    $("#save-single-selection").toggle();
    $("#popup-bg").toggle();
}

/************************
 * FILTERS
 ***********************/

function setFilters() {
    var query_string = {};
    var query = window.location.search.substring(1);
    var vars = query.split("&");

    for (var i = 0;i < vars.length;i++) {
        var pair = vars[i].split("=");

        if (typeof query_string[pair[0]] === "undefined") {
            query_string[pair[0]] = decodeURIComponent(pair[1]);
        } else if (typeof query_string[pair[0]] === "string") {
            var arr = [ query_string[pair[0]],decodeURIComponent(pair[1]) ];
            query_string[pair[0]] = arr;
        } else {
            query_string[pair[0]].push(decodeURIComponent(pair[1]));
        }
    } 
   
    for(var item in query_string) {
        if (
            item == 'sorted_by' ||
            item == 'cat' ||
            item == 'sex' ||
            item == 'int_maat' ||
            item == 'age' ||
            item == 'length' ||
            item == 'specific' ||
            item == 'skin_filter' ||
            item == 'hair_filter' ||
            item == 'hair_length_filter' ||
            item == 'hair_color_filter' ||
            item == 'language_filter' ||
            item == 'native_language_filter' ||
            item == 'lichaam_filter' ||
            item == 'kleur_ogen_filter' ||
            item == 'versiering_filter' ||
            item == 'begroeiing_filter'
        ) {
            if (query_string[item].indexOf(",") > -1) {
                param_array=query_string[item].split(',');

                for (param in param_array) {
                    $("input[name='" + item + "'][value='" + param_array[param] + "']").prop( "checked", true );
                }
            } else {
                $("input[name='" + item + "'][value='" + query_string[item] + "']").prop( "checked", true );
            }

            $("input[name='" + item + "']").parents('.filter').css('display','block');

            } else {
                $("#" + item).val(query_string[item]);
                $("select[name='" + item + "']").val(query_string[item]);
                $("select[name='" + item + "']").parents('.filter').css('display','block');

                if (item == 'selection') {
                    $('#selection').attr('value',$('#selection').attr('data-id'));
                }
            }
        }

    if (query.length>0) {
      getModelsByAjax(0,modelsPerPage);
    }
  }

function rewriteUrlWithFilters() {
    var selection = $("#selection").attr('data-code');
    var query_string = '';

    if (selection) {
        query_string = addInQueryString(query_string,'selection', selection);
        window.history.pushState(null,'selecties',query_string);
    } else {
        var search = $("input[name='zoeken_lijst']").val();
        var talent_search = $("#talent_search").val();
        var category = $(".side_top_links ul li[class='current']").attr('data-id');
        var sorted_by = $("input[name='sorted_by']:checked").val();
        var sex = $("input[name='sex']:checked").val();
        var cat = [];

        $("input[name='cat']:checked").each(function() {
            cat.push($(this).val());
        });

        var age = [];

        $("input[name='age']:checked").each(function() {
            age.push($(this).val());
        });

        var length = [];

        $("input[name='length']:checked").each(function() {
            length.push($(this).val());
        });

        var specific = [];

        $("input[name='specific']:checked").each(function() {
            specific.push($(this).val());
        });

        var skin_filter = [];

        $("input[name='skin_filter']:checked").each(function() {
            skin_filter.push($(this).val());
        });
    
        var hair_filter = [];

        $("input[name='hair_filter']:checked").each(function() {
            hair_filter.push($(this).val());
        });

        var hair_color_filter = [];

        $("input[name='hair_color_filter']:checked").each(function() {
            hair_color_filter.push($(this).val());
        });

        var hair_length_filter = [];

        $("input[name='hair_length_filter']:checked").each(function() {
            hair_length_filter.push($(this).val());
        });

        var language_filter = [];

        $("input[name='language_filter']:checked").each(function() {
            language_filter.push($(this).val());
        });

        var begroeiing_filter = [];

        $("input[name='begroeiing_filter']:checked").each(function() {
            begroeiing_filter.push($(this).val());
        });

        var versiering_filter = [];

        $("input[name='versiering_filter']:checked").each(function() {
            versiering_filter.push($(this).val());
        });

        var kleur_ogen_filter = [];

        $("input[name='kleur_ogen_filter']:checked").each(function() {
            kleur_ogen_filter.push($(this).val());
        });

        var lichaam_filter = [];

        $("input[name='lichaam_filter']:checked").each(function() {
            lichaam_filter.push($(this).val());
        });

        var nativeLanguageFilter = [];

        $("input[name='native_language_filter']:checked").each(function() {
            nativeLanguageFilter.push($(this).val());
        });

        var bust = $('#bust').find(":selected").val();
        var waist = $('#waist').find(":selected").val();
        var hips = $('#hips').find(":selected").val();
        var jeans_size = $('#jeans_size').find(":selected").val();
        var clothing_size = $('#clothing_size').find(":selected").val();
        var shoe_size = $('#shoe_size').find(":selected").val();
        var costum_size = $('#costum_size').find(":selected").val();
        var cup_size = $('#cup_size').find(":selected").val();
        var lengte_start = $('select[name="lengte_start"]').find(":selected").val();
        var lengte_end = $('select[name="lengte_end"]').find(":selected").val();
        var weight_start = $('select[name="gewicht_start"]').find(":selected").val();
        var weight_end = $('select[name="gewicht_end"]').find(":selected").val();
        var age_start = $("select[name='leeftijd_start']").find(":selected").val();
        var age_end = $("select[name='leeftijd_end']").find(":selected").val();
        var shoe_size_start = $("select[name='schoenmaat_start']").find(":selected").val();
        var shoe_size_end = $("select[name='schoenmaat_end']").find(":selected").val();  
        var bust_start = $("select[name='borst_start']").find(":selected").val();
        var bust_end = $("select[name='borst_end']").find(":selected").val();    
        var waist_start = $("select[name='taille_start']").find(":selected").val();
        var waist_end = $("select[name='taille_end']").find(":selected").val();                          
        var hips_start = $("select[name='heupen_start']").find(":selected").val();
        var hips_end = $("select[name='heupen_end']").find(":selected").val();     
        var cup_size_start = $("select[name='cup_start']").find(":selected").val();
        var cup_size_end = $("select[name='cup_end']").find(":selected").val();
        var cup_size_number_start = $("select[name='cup_number_start']").find(":selected").val();
        var cup_size_number_end = $("select[name='cup_number_end']").find(":selected").val();
        var clothing_size_start = $("select[name='kleding_start']").find(":selected").val();
        var clothing_size_end = $("select[name='kleding_end']").find(":selected").val(); 
        var costum_size_start = $("select[name='kostuum_start']").find(":selected").val();
        var costum_size_end = $("select[name='kostuum_end']").find(":selected").val();    
        var jeans_size_start = $("select[name='jeans_start']").find(":selected").val();
        var jeans_size_end = $("select[name='jeans_end']").find(":selected").val();  
        var kinder_start = $("select[name='kinder_start']").find(":selected").val();
        var kinder_end = $("select[name='kinder_end']").find(":selected").val();             
        var int_maat = $("select[name='int_maat']").find(":selected").val();
        var country = $("#filter-country-select").find(":selected").val();
        var id_start = $("input[name='id_start']").val();
        var id_end = $("input[name='id_end']").val();

        query_string = addInQueryString(query_string,'search',search);
        query_string = addInQueryString(query_string,'talent_search',talent_search);
        query_string = addInQueryString(query_string,'category',category);
        query_string = addInQueryString(query_string,'sorted_by',sorted_by);
        query_string = addInQueryString(query_string,'sex',sex);
        query_string = addInQueryString(query_string,'cat',cat);
        query_string = addInQueryString(query_string,'age',age);
        query_string = addInQueryString(query_string,'length',length);
        query_string = addInQueryString(query_string,'specific',specific);
        query_string = addInQueryString(query_string,'skin_filter',skin_filter);
        query_string = addInQueryString(query_string,'hair_filter',hair_filter);
        query_string = addInQueryString(query_string,'hair_color_filter',hair_color_filter);
        query_string = addInQueryString(query_string,'hair_length_filter',hair_length_filter);
        query_string = addInQueryString(query_string,'language_filter',language_filter);
        query_string = addInQueryString(query_string,'native_language_filter', nativeLanguageFilter);
        query_string = addInQueryString(query_string,'bust',bust);
        query_string = addInQueryString(query_string,'waist',waist);
        query_string = addInQueryString(query_string,'hips',hips);
        query_string = addInQueryString(query_string,'jeans_size',jeans_size);
        query_string = addInQueryString(query_string,'clothing_size',clothing_size);
        query_string = addInQueryString(query_string,'shoe_size',shoe_size);
        query_string = addInQueryString(query_string,'costum_size',costum_size);
        query_string = addInQueryString(query_string,'cup_size',cup_size);
        query_string = addInQueryString(query_string,'lengte_start',lengte_start);
        query_string = addInQueryString(query_string,'lengte_end',lengte_end);
        query_string = addInQueryString(query_string,'gewicht_start',weight_start);
        query_string = addInQueryString(query_string,'gewicht_end',weight_end);
        query_string = addInQueryString(query_string,'leeftijd_start',age_start);
        query_string = addInQueryString(query_string,'leeftijd_end',age_end);
        query_string = addInQueryString(query_string,'schoenmaat_start',shoe_size_start);
        query_string = addInQueryString(query_string,'schoenmaat_end',shoe_size_end);
        query_string = addInQueryString(query_string,'borst_start',bust_start);
        query_string = addInQueryString(query_string,'borst_end',bust_end);
        query_string = addInQueryString(query_string,'taille_start',waist_start);
        query_string = addInQueryString(query_string,'taille_end',waist_end);
        query_string = addInQueryString(query_string,'heupen_start',hips_start);
        query_string = addInQueryString(query_string,'heupen_end',hips_end);
        query_string = addInQueryString(query_string,'cup_start', cup_size_start);
        query_string = addInQueryString(query_string,'cup_end', cup_size_end);
        query_string = addInQueryString(query_string,'cup_number_start', cup_size_number_start);
        query_string = addInQueryString(query_string,'cup_number_end', cup_size_number_end);
        query_string = addInQueryString(query_string,'kleding_start', clothing_size_start);
        query_string = addInQueryString(query_string,'kleding_end', clothing_size_end);
        query_string = addInQueryString(query_string,'kostuum_start', costum_size_start);
        query_string = addInQueryString(query_string,'kostuum_end', costum_size_end);
        query_string = addInQueryString(query_string,'jeans_start', jeans_size_start);
        query_string = addInQueryString(query_string,'jeans_end', jeans_size_end);
        query_string = addInQueryString(query_string,'kinder_start', kinder_start);
        query_string = addInQueryString(query_string,'kinder_end', kinder_end);
        query_string = addInQueryString(query_string,'int_maat', int_maat);
        query_string = addInQueryString(query_string,'begroeiing_filter', begroeiing_filter);
        query_string = addInQueryString(query_string,'versiering_filter', versiering_filter);
        query_string = addInQueryString(query_string,'kleur_ogen_filter', kleur_ogen_filter);
        query_string = addInQueryString(query_string,'lichaam_filter', lichaam_filter);
        query_string = addInQueryString(query_string,'id_start', id_start);
        query_string = addInQueryString(query_string,'id_end', id_end);
        query_string = addInQueryString(query_string,'country', country);

        window.history.pushState(null,'people',query_string);
    }
}

function addInQueryString(query_string,parameter_name,parameter) {
    if (parameter !='' && typeof parameter !== 'undefined') {
        if (query_string) {
            query_string += '&';
        } else {
          query_string += '?';
        }

        query_string += parameter_name + '=' + parameter;
        return query_string;
    } else {
        return query_string;
    }
}

function loadMore() {
    if (! stopLoading) {
        if ($(window).scrollTop() > $(document).height() - 1900) {
            if (isLoadedPreveously === true) {
                isLoadedPreveously = false;
                itemLoaded = $('#models-view-normal .model').length;

                var from = itemLoaded;
                var to=20;

                if (itemLoaded != 0) {
                    $('#infscr-loading').css("display", "block");
                    getModelsByAjax(from,to);
                }

                setTimeout('isLoadedPreveously=true;', 500);
            }
        }
    }
}

function createPoppupElement(data) {
    $('body')
        .append(data)
        .css('overflow', 'hidden')
        .css('overflow-y', 'hidden');

    $('html').css('overflow-x', 'none');
    $('#infscr-loading').hide();
    $('.featherlight-content .custom-select-new').customSelect({customClass: 'custom-select-new'});
    onsiteSortable();
    initICheck();
    capitalizeFirstLetters();
}

function closePoppup() {
    $("body .featherlight").remove();
    $('body')
        .css('overflow', 'none')
        .css('overflow-y', 'none');
    $('html').css('overflow-x', 'hidden');
    window.history.back();
}

function getModelTemplate(id) {
    if ($( "body .featherlight" ).length) {
        closePoppup();
    }
            
    getModelTemplateById(id);
    $('#infscr-loading').show();
    window.history.pushState(null, 'models', 'aanpassen?id=' + id);
}

function showOnMap(e) {
    $('#map_poppup').remove();
    var selectionId = $('#selection').val();
    var models = [];

    $("#models-view-normal .model").each(function() {
        models.push($(this).attr('data-modelid'));
    });

    getModelLocations(selectionId, models);
    $('#infscr-loading').show();


}

function jAlert(soort, tekst) {
    if (soort == 1) {
        $("body").prepend('<div id="modal-bg"></div><div id="modal" class="alert"><p>' + tekst + '</p><p style="margin-bottom: 0px;"><a href="javascript:jAlert(0, \'\')" class="button">OK</a></p></div>');
    } else {
        $("#modal-bg").remove();
        $("#modal").remove();
    }
}

function createMap(json) {
    $("#popup-bg").hide();

    if (json.length) {
        $('#infscr-loading').hide();
        $('body').append('<div id="map_poppup" class="featherlight fixwidth" style="display: block; width: auto;"><div class="featherlight-content" style="width: 90%; margin-top:0px;"><div id="map_canvas" style="width: 100%; height: 90%;"></div></div></div>')
        var map = new google.maps.Map(document.getElementById('map_canvas'), {
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();
        var marker;
        var bounds = new google.maps.LatLngBounds();
        var selection = $('#selection').val();

        if (selection) {
            var deleteTemplate = '<span class="icon delete_model_from_selection" id="delete_model_from_selection" style="position:absolute; top:10px;right:10px; width:32px; height:32px;z-index:1003;"><img style="width:32px; height:32px;" id="remove_model" src="/images/remove.png"></span>';
        } else {
            var deleteTemplate = '';
        }

        for (var i in json) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(json[i]['location']['lat'], json[i]['location']['lng']),
                map: map
            });

            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent('<div data-modelid="' + json[i]['id'] + '" class="model size-3 show-caption-1" style="margin: 0; padding: 0;">' +
                        deleteTemplate +
                        '<img alt="" src="/models/' + json[i]['id'] + '/website/thumbs/' + json[i]['image'] + '.jpg">' +
                        '<div class="caption-1">' +
                        '<div class="code">' + json[i]['id'] + '</div>' +
                        '<div class="name">' + json[i]['name'] + '<br>' + json[i]['surname'] + '</div>' +
                        '<div class="clear"></div>' +
                        '</div></div>');
                    infowindow.open(map, marker);
                }
            })(marker, i));

            google.maps.event.addListener(marker, 'mouseover', (function (marker, i) {
                return function () {
                    infowindow.setContent('<div data-modelid="' + json[i]['id'] + '" class="model size-3 show-caption-1" style="margin: 0; padding: 0;">' +
                        deleteTemplate +
                        '<img alt="" src="/models/' + json[i]['id'] + '/website/thumbs/' + json[i]['image'] + '.jpg">' +
                        '<div class="caption-1">' +
                        '<div class="code">' + json[i]['id'] + '</div>' +
                        '<div class="name">' + json[i]['name'] + '<br>' + json[i]['surname'] + '</div>' +
                        '<div class="clear"></div>' +
                        '</div></div>');
                    infowindow.open(map, marker);
                }
            })(marker, i));

            loc = new google.maps.LatLng(json[i]['location']['lat'], json[i]['location']['lng']);
            bounds.extend(loc);
        }

        map.fitBounds(bounds);
        map.panToBounds(bounds);
    } else {
        alert('No results');
    }
}

function getFilterParameters() {
    var parameters = new Object();
    parameters.search = $("input[name='zoeken_lijst']").val();

    if (parameters.search === undefined) {
        parameters.search = $("input[name='zoeken']").val();
    }

    parameters.selection = $("#selection").val();
    parameters.talent_search = $("#talent_search").val();
    parameters.category = $(".side_top_links ul li[class='current']").attr('data-id');
    parameters.sorted_by = $("input[name='sorted_by']:checked").val();
    parameters.sex = $("input[name='sex']:checked").val();
    parameters.cat = [];

    $("input[name='cat']:checked").each(function() {
        parameters.cat.push($(this).val());
    });

    parameters.age = [];
    $("input[name='age']:checked").each(function() {
        parameters.age.push($(this).val());
    });

    parameters.length = [];
    $("input[name='length']:checked").each(function() {
        parameters.length.push($(this).val());
    });

    parameters.specific_cms = [];
    $("input[name='specific']:checked").each(function() {
        parameters.specific_cms.push($(this).val());
    });

    parameters.skin_filter = [];
    $("input[name='skin_filter']:checked").each(function() {
        parameters.skin_filter.push($(this).val());
    });

    $("input[name='hair_filter']:checked").each(function() {
        parameters.hair_filter.push($(this).val());
    });

    parameters.hair_color_filter = [];
    $("input[name='hair_color_filter']:checked").each(function() {
        parameters.hair_color_filter.push($(this).val());
    });

    parameters.hair_length_filter = [];
    $("input[name='hair_length_filter']:checked").each(function() {
        parameters.hair_length_filter.push($(this).val());
    });

    parameters.language_filter = [];
    $("input[name='language_filter']:checked").each(function() {
        parameters.language_filter.push($(this).val());
    });

    parameters.begroeiing_filter = [];
    $("input[name='begroeiing_filter']:checked").each(function() {
        parameters.begroeiing_filter.push($(this).val());
    });

    parameters.versiering_filter = [];
    $("input[name='versiering_filter']:checked").each(function() {
        parameters.versiering_filter.push($(this).val());
    });

    parameters.kleur_ogen_filter = []
    $("input[name='kleur_ogen_filter']:checked").each(function() {
        parameters.kleur_ogen_filter.push($(this).val());
    });

    parameters.lichaam_filter = [];
    $("input[name='lichaam_filter']:checked").each(function() {
        parameters.lichaam_filter.push($(this).val());
    });

    parameters.nativeLanguageFilter = [];

    $("input[name='native_language_filter']:checked").each(function() {
        parameters.nativeLanguageFilter.push($(this).val());
    });

    parameters.bust = $('#bust').find(":selected").val();
    parameters.waist = $('#waist').find(":selected").val();
    parameters.hips = $('#hips').find(":selected").val();
    parameters.jeans_size = $('#jeans_size').find(":selected").val();
    parameters.clothing_size = $('#clothing_size').find(":selected").val();
    parameters.shoe_size = $('#shoe_size').find(":selected").val();
    parameters.costum_size = $('#costum_size').find(":selected").val();
    parameters.cup_size = $('#cup_size').find(":selected").val();
    parameters.lengte_start = $('select[name="lengte_start"]').find(":selected").val();
    parameters.lengte_end = $('select[name="lengte_end"]').find(":selected").val();
    parameters.weight_start = $('select[name="gewicht_start"]').find(":selected").val();
    parameters.weight_end = $('select[name="gewicht_end"]').find(":selected").val();
    parameters.age_start = $("select[name='leeftijd_start']").find(":selected").val();
    parameters.age_end = $("select[name='leeftijd_end']").find(":selected").val();
    parameters.shoe_size_start = $("select[name='schoenmaat_start']").find(":selected").val();
    parameters.shoe_size_end = $("select[name='schoenmaat_end']").find(":selected").val();
    parameters.bust_start = $("select[name='borst_start']").find(":selected").val();
    parameters.bust_end = $("select[name='borst_end']").find(":selected").val();
    parameters.waist_start = $("select[name='taille_start']").find(":selected").val();
    parameters.waist_end = $("select[name='taille_end']").find(":selected").val();
    parameters.hips_start = $("select[name='heupen_start']").find(":selected").val();
    parameters.hips_end = $("select[name='heupen_end']").find(":selected").val();
    parameters.cup_size_start = $("select[name='cup_start']").find(":selected").val();
    parameters.cup_size_end = $("select[name='cup_end']").find(":selected").val();
    parameters.clothing_size_start = $("select[name='kleding_start']").find(":selected").val();
    parameters.clothing_size_end = $("select[name='kleding_end']").find(":selected").val();
    parameters.costum_size_start = $("select[name='kostuum_start']").find(":selected").val();
    parameters.costum_size_end = $("select[name='kostuum_end']").find(":selected").val();
    parameters.jeans_size_start = $("select[name='jeans_start']").find(":selected").val();
    parameters.jeans_size_end = $("select[name='jeans_end']").find(":selected").val();
    parameters.kinder_start = $("select[name='kinder_start']").find(":selected").val();
    parameters.kinder_end = $("select[name='kinder_end']").find(":selected").val();
    parameters.int_maat = $("select[name='int_maat']").find(":selected").val();
    parameters.country = $("#filter-country-select").find(":selected").val();
    parameters.id_start = $("input[name='id_start']").val();
    parameters.id_end = $("input[name='id_end']").val();
    parameters.cup_size_start = $("select[name='cup_start']").find(":selected").val();
    parameters.cup_size_end = $("select[name='cup_end']").find(":selected").val();
    parameters.cup_size_number_start = $("select[name='cup_number_start']").find(":selected").val();
    parameters.cup_size_number_end = $("select[name='cup_number_end']").find(":selected").val();

    return parameters;
}

function updateNewGroup(json) {
    if (json.error) {
        jAlert(1, json.message);
    } else {
        var group = $(".root-group[data-id=" + json.data.root_id + "] .new_group");
        group.removeClass('new_group').attr('data-id', json.data.group_id);
        group.find('input.checkbox').attr('name', 'groep_' + json.data.group_id);
        group.find('input.text').attr('name', 'groep_naam_' + json.data.group_id);
        group.find('span').attr('id', 'groep_naam_' + json.data.group_id)
    }
}

function initICheck() {
    $("input[type='checkbox'], input[type='radio']").iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
        increaseArea: '20%'
    });
}

function showEmailTemplate(json) {
    $('#email-edit input[name="title"]').val(json.data.title);
    $('#email-edit input[name="subject_nl"]').val(json.data.subject.nl);
    $('#email-edit textarea[name="content_nl"]').val(json.data.content.nl);

    $('#email-edit input[name="subject_fr"]').val(json.data.subject.fr);
    $('#email-edit textarea[name="content_fr"]').val(json.data.content.fr);

    $('#email-edit input[name="subject_en"]').val(json.data.subject.en);
    $('#email-edit textarea[name="content_en"]').val(json.data.content.en);
    $('#email-edit #email_id').val(json.data.id);
    $('#email-edit').show();
}

function refreshPage() {
    window.location.reload();
}

function getModelEmail(id) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            id: id
        },
        url: "/api/model/email",
        error:
            function() {
                alert('Er is een technische fout opgetreden.');
            },
        success:
            function(json) {
                if (json.error == false) {
                    new DialogWindow(
                        {
                            message: json.data.email,
                            type: 'updateField',
                            wrapper: document.body,
                            target: 'email',
                            modelId: id
                        }
                    );
                }
            }
    });
}

function getModelPhone(id) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            id: id
        },
        url: "/api/model/phone",
        error:
            function() {
                alert('Er is een technische fout opgetreden.');
            },
        success:
            function(json) {
                if (json.error == false) {
                    new DialogWindow(
                        {
                            message: json.data.phone,
                            type: 'updateField',
                            wrapper: document.body,
                            target: 'phone',
                            modelId: id
                        }
                    );
                }
            }
    });
}

function capitalizeFirstLetters() {
    $('.capitalize').each( function () {
        var $this = $(this);

        $this.val($this.val().charAt(0).toUpperCase() + $this.val().slice(1));
    });

}

function copyToClipboard(elem) {
    var targetId = "_hiddenCopyText_";
    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
    var origSelectionStart, origSelectionEnd;

    if (isInput) {
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
    } else {
        target = document.getElementById(targetId);
        if (!target) {
            var target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
    }

    var currentFocus = document.activeElement;
    target.focus();
    target.setSelectionRange(0, target.value.length);

    var succeed;

    try {
        succeed = document.execCommand("copy");
    } catch(e) {
        succeed = false;
    }

    if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
    }

    if (isInput) {
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    } else {
        target.textContent = "";
    }

    return succeed;
}

function showAddToSelectionDialog() {
    new DialogWindow(
        {
            message: '',
            type: 'addToSelection',
            wrapper: document.body,
            selection: $("#selection").val()
        }
    );

    $("#update-model-field").focus();
}

function showAddFromEmailForm() {
    new DialogWindow(
        {
            message: '',
            type: 'addFromEmail',
            wrapper: document.body
        }
    );

    $("#update-model-field").focus();
}