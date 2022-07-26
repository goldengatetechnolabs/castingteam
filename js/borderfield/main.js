var lock = false;
var mobileWidth = 500;
var isLoadedPreveously = true;
var stopLoading = false;
var randomModelImages = 2;
var modelsPerPage = 30;
var modelStack = 0;
var actionList = {
    'show_model': getModel
};

var DialogWindow = (function() {
    'use strict';

    var templates = {
        'notification': '<div id="modal-bg"></div><div id="modal" class="alert"><div class="dialog-message-block">:message</div><div class="button-message-block"><div class="wrapper"><a id="close-dialog-button" class="button single-button">OK</a></div></div></div>',
        'updateField': '<div id="modal-bg"></div><div id="modal" class="alert"><div class="dialog-message-block"><label class="update-model-label"><input type="text" id="update-model-field" value=":message"></label></div><div class="button-message-block"><div class="wrapper"><a id="update-model-button" class="button">Save</a><a id="close-dialog-button" class="button">Close</a></div></div></div>'
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
        xhr.open("POST", url);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
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
        if (response.error == false) {
            self.dismiss();
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

$(document).ready(
    function () {
        getEmails();
        $( window ).resize(resizeHeader);
        $( window ).resize(resizeModelBlock);
        $( window ).resize(initSliders);

        if ($('.models').length > 0) {
            $('#loading').show();
            getModels(0, modelsPerPage);
            setInterval(loadMore, 50);
        }

        if ($('.selection_name .selection-title-input').length > 0) {
            $('.selection_name .selection-title-input')
                .val($('#selection').find(":selected").text())
                .attr('data-id', $('#selection').find(":selected").attr('data-id'))
                .each(resizeInput);
        }

        initSliders();
        resizeHeader();

        $(document)
            .on("mouseenter", ".models .model-thumb", function() {
               if (!isMobile()) {
                   $(this).find('.model-title').show();
               }
            })
            .on("mouseleave", ".models .model-thumb", function() {
                if(!isMobile()) {
                    $(this).find('.model-title').hide();
                }
            });

        $('.header-slider-block .image-section').slick({
            lazyLoad: 'ondemand',
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 7000
        });

        $('.publication-block .slick-image-section').slick({
            lazyLoad: 'ondemand',
            slidesToScroll: 1,
            infinite: false,
            variableWidth: true
        });

        $("#send_selection_submit").click(function() {
            sendSelectionByEmail();
        });

        $('body')
            .on('click', '.voeg_card', function(e) {
                $(".selections-single").toggle();
                $("#upward-triangle, .featherlight-content .upward-triangle").toggle();
                e.preventDefault();
            })
            .on('click', '#send_selection_button', function(e) {
                $("#send_selection_form_email").toggle();
                $(".upward-triangle").toggle();
                e.preventDefault();
            })
            .on( "click", "#close_button, .featherlight", function(e) {
                if (e.target == this) {
                    $("body .featherlight").remove();
                    $('body').css('overflow', 'none');
                    $('html').css('overflow-x', 'hidden');
                    history.back();
                }
            })
            .on("click", "#add_selection", function() {
                var selection_name = $('.selections-single #selection_name').val();
                var selection = $('#selection_select').val();
                var model_id = $(this).attr('data-id');

                if (selection || selection_name) {
                    addModelToSelection(model_id, selection_name, selection);
                }
            })
            .on("click", "#menu_image", function() {
                $('.slide-up-menu').slideToggle('slow')
            })
            .on('click', '.selection-name-editable .edit, .selection_name .edit:visible', function(e) {
                $(this)
                    .siblings("input")
                    .removeProp('readonly')
                    .removeProp('disabled')
                    .focus()
                    .css("background-color", "#EEE");
            })
            .on('focusout', '.selection-name-editable input, .selection_name input', function(e) {
                if (!$(this).prop("readonly")) {
                    $(this).prop("readonly", true).css("background-color", "#FFF");
                    editSelection($(this).attr('data-id'), $(this).val());
                    resizeInput();
                }
            })
            .on('click', '.model-thumb', function(e) {
                $('#loading').show();
                getModel($(this).attr('data-id'));
                e.preventDefault();
            });
        $(".specialties").on('mouseover', function (e) {
            let _this = $(this);
            _this.addClass('is-open');
            return false;
        }).on('mouseleave', function (e) {
            let _this = $(this);
            _this.removeClass('is-open');
            return false;
        }).on('click', '.specialties-title', function (e) {
            let _this = $(this).parents('.specialties');
            if (_this.hasClass('is-click')) _this.removeClass('is-click');
            else _this.addClass('is-click');
            return false;
        });

        $("select[class='filter']").change(function(e) {
            rewriteUrlWithFilters();
            resetResults();

            $('.selection_name .selection-title-input')
                .val($('#selection').find(":selected").text())
                .attr('data-id', $('#selection').find(":selected").attr('data-id'))
                .each(resizeInput);
        });

        $('.filter_top .filter_top_rht a.diff_view').click(function(e) {
            $(this).addClass('active').siblings('a.diff_view').removeClass('active');
            $('.close_icon,.top_contact').click(function(e) {
                $('.top_header').slideToggle();
                $('.index_page').toggleClass('open_drop');
            });
        });

        $('.list_view').click(function(e) {
            e.preventDefault();
            $('.models-list').show(500);
            $('.models').hide(500);
            $(this).parents('.content').addClass('no_pad_cont');
        });

        $('.grid_view').click(function(e) {
            e.preventDefault();
            $('.models').show(500,resizeModelBlock);
            $('.models-list').hide(500);
            $(this).parents('.content').removeClass('no_pad_cont');
        });

        doActions();
        
        var $grid = $('.grid').masonry({
            columnWidth: '.grid-sizer',
            itemSelector: '.grid-item',
            percentPosition: true
        });
        $('.grid').on( 'layoutComplete',
            function( event, laidOutItems ) {
                $('.grid-item').css('opacity', '1');
            }
        );
        setTimeout(function(){
            $('.grid').masonry( 'reloadItems' );
            $('.grid').masonry( 'layout' );
        }, 1000);

        $(window).on('resize', function () {
            setTimeout(function(){
                $('.grid').masonry( 'reloadItems' );
                $('.grid').masonry( 'layout' );
            }, 500);
        });

        $('.menu-mobile, .menu-off-canvas__close').click(function(e) {
            var offCanvas = $('.menu-off-canvas');
            offCanvas.hasClass('open') ? offCanvas.removeClass('open') : offCanvas.addClass('open');
        });

        $(document).mouseup(function(e) {
            var offCanvas = $('.menu-off-canvas');
            if (!offCanvas.is(e.target) && offCanvas.has(e.target).length === 0) {
                offCanvas.removeClass('open')
            }
        });
        
        $('.fancybox_image').fancybox({
            tpl: {
                next     : '<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span class="button-next"></span></a>',
                prev     : '<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span class="button-prev"></span></a>'
            },
            'nextEffect': 'none',
            'prevEffect': 'none',
            'transitionIn': 'none',
            'transitionOut': 'none',
            'titlePosition': 'over',
            'titleFormat': '<div>test</div>'
        });
    }
);

function noMoreModels() {
    $('#no-loading').toggle();
}

function resizeInput() {
    $(this).attr('size', $(this).val().length);
}

function resizeHeader() {
    if ($( window ).width()/2.4 > 700) {
        $('.header-slider-block').css('height', $(window).width() / 2.4);
    }
}

function isMobile() {
    return $( window ).width() < mobileWidth;
}

function resizeModelBlock() {
    $('.models .model-thumb').css('height', $('.models .model-thumb').width() * 1.5);
}

function doActions() {
    var params = getSearchParameters();

    if ('action' in params) {
        var funcName = actionList[params.action];
        funcName(params.id);
    }
}

function initSliders() {
    if (isMobile()) {
        $('.latest-models .slick-image-section').slick({
            lazyLoad: 'ondemand',
            slidesToScroll: 1
        });
    } else {
        $('.latest-models .slick-image-section').slick({
            lazyLoad: 'ondemand',
            slidesToScroll: 1,
            infinite: false,
            variableWidth: true
        });
    }
}

function getSearchParameters() {
    var prmstr = window.location.search.substr(1);
    return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
}

function transformToAssocArray( prmstr ) {
    var params = {};
    var prmarr = prmstr.split("&");
    for ( var i = 0; i < prmarr.length; i++) {
        var tmparr = prmarr[i].split("=");
        params[tmparr[0]] = tmparr[1];
    }
    return params;
}

function getModels(from, to) {
    if (!lock) {
        lock = true;

        if (from == 0) {
            $('.models').empty();
        }

        $.ajax({
            type: "POST",
            dataType: 'json',
            data: {
                from: from,
                to: to,
                group: $('#current_group').val(),
                selection: $('#selection').val()
            },
            url: "/api/model/get",
            error:
                function() {
                    lock = false;
                    new DialogWindow(
                        {
                            message: messages.error.internal,
                            type: 'notification',
                            wrapper: document.body,
                            target: 'email',
                            modelId: id
                        }
                    );
                },
            success: displayModels
        });
    }
}

function getPathFromUrl() {
    var current_url = parse_url(window.location);

    var scheme = current_url.scheme;
    var path = current_url.path;
    var new_path = path.substr(4);

    return new_path;
}

function getModel(id) {
    var path = getPathFromUrl();    
    
    if('selection' == path)
    {        
        window.history.pushState(null, '', currentGroupShortName + '/' + id);
    }
    else
    {     
        var las_word = path.substr(-1);        
        if('/' == las_word)
        {
            window.history.pushState(null, '', id);
        }
        else
        {
            window.history.pushState(null, '', path + '/' + id);
        }
    }

    // window.history.pushState(null, '', currentGroupShortName + '/' + id);

    $.ajax({
        type: "POST",
        data: {
            model_id: id,
            lang: taal,
            group: currentGroup
        },
        url: "/api/model/overview",
        error:
            function() {
                new DialogWindow(
                    {
                        message: messages.error.iternal,
                        type: 'notification',
                        wrapper: document.body,
                        target: 'email',
                        modelId: id
                    }
                );
            },
        success: createPoppupElement
    });
}

function editSelection(selectionId, selectionName) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            id: selectionId,
            name: selectionName

        },
        url: "/api/selection/edit",
        error: function() {
            new DialogWindow(
                {
                    message: messages.error.iternal,
                    type: 'notification',
                    wrapper: document.body
                }
            );
        },
        success: handleUpdateSelection
    });
}

function handleUpdateSelection(json) {
    if (!json.error) {
        window.location.reload();
    } else {
        new DialogWindow(
            {
                message: messages.error.iternal,
                type: 'notification',
                wrapper: document.body
            }
        );
    }
}

function displayModels(json) {
    lock = false;
    var modelElements = '';

    if ($('.models-list').length) {
        createModelElements(json);
    }

    if (json.data.length < 1) {
        noMoreModels();
        setTimeout('noMoreModels();', 3000);
        stopLoading = true;
    }

    for (var model in json.data) {
        modelElements = modelElements + '<div class="model-thumb" data-id="'
            + json.data[model].id +'"><img class="slick-image" alt="'
            + json.data[model].name + ' - '
            + json.data[model].id + '" src="/'
            + json.data[model].image + '">'
            + '<div class="model-title background-red-color">'
            + '<i class="fa fa-heart-o"></i> ' + json.data[model].name + ' - ' + json.data[model].id + '</div></div>';
    }

    $('.models').append(modelElements);
    resizeModelBlock();
    $('#loading').hide();
}

function createPoppupElement(data) {
    var $main_div = $("<div>", {class: 'featherlight fixwidth', style: 'display: block;'});
    var $content_div = $("<div>", {class: 'featherlight-content'});
    var $data_div = $("<div>", {class: 'modal_dtls_popup featherlight-inner', id: 'data1'});
    var $close_button = $('<img id="close_button" class="featherlight-close" src="/images/close_button.svg" style="position: absolute; right: 40px; top: 20px; width: 35px; cursor: pointer;">');

    $data_div.append(data);
    $content_div.append($close_button);
    $content_div.append($data_div);

    $main_div.append($content_div);
    $('body').append($main_div).css('overflow', 'hidden');
    $('html').css('overflow-x', 'none');
    $('#loading').hide();
}

function addModelToSelection(model_id, selection_title, selection_id) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            'model_id': model_id,
            'selection_title': selection_title,
            'selection_id': selection_id

        },
        url: "/api/selection/add",
        error:
            function() {
                new DialogWindow(
                    {
                        message: messages.error.iternal,
                        type: 'notification',
                        wrapper: document.body
                    });
            },
        success: function(json) {
            if (json.error == true) {
                new DialogWindow(
                    {
                        message: json.message,
                        type: 'notification',
                        wrapper: document.body
                    });
            }
            if (json.data.length > 0) {
                if (selection_title) {
                    var title = selection_title;
                } else {
                    for (var selection in json.data) {
                        if (json.data[selection].id == selection_id) {
                            var title = json.data[selection].name;
                        }
                    }
                }

                $('.saved-selection-number').html(json.count);

                $(".selections-single")
                    .empty()
                    .append($('<h3 style="font-size: 30px;font-weight: normal;line-height: 38px;margin: 0 0 30px;padding-bottom: 15px;padding-left: 0 !important;padding-right: 0;padding-top: 0;position: relative;">Model was added to "' + title + '"</h3>'));
            }
        }
    });
}

function loadMore() {
    if (!stopLoading) {
        if ($(window).scrollTop() + $(window).height() > $(document).height() - 900) {
            if (isLoadedPreveously === true) {
                isLoadedPreveously = false;
                var itemLoaded = $('.model-thumb').length;
                var from = itemLoaded;
                var to = modelsPerPage;

                if (from != modelStack && Math.abs(from - modelStack) > 3) {
                    modelStack = from;
                } else {
                    from += modelsPerPage;
                    to = modelsPerPage * 2;
                }

                if (itemLoaded != 0) {
                    $('#loading').show();
                    getModels(from, to);
                }

                setTimeout('isLoadedPreveously=true;', 500);
            }
        }
    }
}

function resetResults() {
    stopLoading = false;
    $('.models').empty();
    $('.models-list').empty();
    getModels(0, modelsPerPage);
}

function rewriteUrlWithFilters() {
    var query_string = '';

    query_string = addInQueryString(query_string, 'selection', $('#selection').val());

    window.history.pushState(null, 'people', query_string);
}

function addInQueryString(query_string, parameter_name, parameter) {
    if (parameter != '' && typeof parameter !== 'undefined') {

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

function createModelElements(json) {

    if (json.data.length) {
        for (key in json.data) {
            var model_element = '<article class="list_carousel"><div class="list_carousel_lft background-red-color"><h4>'
                + json.data[key].name + '</h4><span class="ref"> (Ref. '
                + json.data[key].id + ') </span><ul><li> <span>Height :</span> <span>'
                + json.data[key].height + '</span> </li><li> <span>Chest :</span> <span>'
                + json.data[key].chest + '</span> </li><li> <span>Waist :</span> <span>'
                + json.data[key].waist + '</span> </li><li> <span>Hips :</span> <span>'
                + json.data[key].hips + '</span> </li><li> <span>Clothing Size :</span> <span>'
                + json.data[key].clothing_size + '</span> </li><li> <span>Jeans :</span> <span>'
                + json.data[key].jeans + '</span> </li><li> <span>Shoes :</span> <span>'
                + json.data[key].shoes + '</span> </li></ul></div><div  class="list_carousel_sub">';

            for (image in json.data[key].images) {
                model_element += '<div><img width="228" height="350" alt="'
                    + json.data[key].name + ' (' + json.data[key].id + ')'
                    + '" src="/' + json.data[key].images[image] + '"></div>';

            }

            $('.models-list').append($(model_element));
        }

        $('.list_carousel_sub').slick(slickElements());
    }
}

function slickElements() {

    return {
        lazyLoad: 'ondemand',
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: false,
        variableWidth: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    };
}

function sendSelectionByEmail() {
    var name = $('#name').val();
    var mail_to = $('#email_to').val();
    var mail_from = $('#email_from').val();
    var selection = $('#selection').find(":selected").val();

    if (
        name == null ||
        name == "" ||
        mail_to == null ||
        mail_to == "" ||
        mail_from == null ||
        mail_from == "" ||
        selection == null ||
        selection == ""
    ) {
        new DialogWindow(
            {
                message: "All required fields must be filled out",
                type: 'notification',
                wrapper: document.body
            });
        return false;
    } else {
        var comment = $('#comment').val();
        getSelectionByEmailAjax(name, mail_to, mail_from, selection, comment);
    }
}

function getSelectionByEmailAjax(name, mail_to, mail_from, selection, comment) {

    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            name: name,
            email_to: mail_to,
            email_from: mail_from,
            selection: selection,
            comment: comment

        },
        url: "/ajax/send_selection_by_email",
        error:
            function() {
                new DialogWindow(
                    {
                        message: messages.error.iternal,
                        type: 'notification',
                        wrapper: document.body
                    });
            },
        success:
            function(json) {
                $("#send_selection_form_email").empty().html('<p style="font-size: 24px; "><i>Your selection has been sent</i></p>');
            }


    });

}

function getEmails() {

    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            lang: taal
        },
        url: "/api/email/getContact",
        error: function() {
            jAlert(1, messages.error.internal);
        },
        success: displayEmails
    });
}

function displayEmails(json) {
    if (!json.error) {
        for (var key in json.data) {
            $("." + key).attr('href','mailto:' + json.data[key]).text(json.data[key]);

            if (key !== 'info_com') {
                $("footer ." + key).text(json.data[key]);
            }
        }
    }
}