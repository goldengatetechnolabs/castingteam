
var counter = (function () {
    var counter = 0;

    return function () {return counter += 1;}
})();

var filterCheckboxes = [
    'sex',
    'cat',
    'age',
    'length',
    'specific',
    'skin_filter',
    'hair_filter',
    'hair_color_filter',
    'hair_length_filter',
    'language_filter',
    'begroeiing_filter',
    'versiering_filter',
    'kleur_ogen_filter',
    'lichaam_filter',
    'sorted_by'
];

var filterSelects = {
    bust_start: 'maten_borst',
    waist_start: 'maten_taille',
    hips_start: 'maten_heupen',
    jeans_size_start: 'maten_jeans',
    clothing_size_start: 'maten_kleding',
    shoe_size_start: 'maten_schoenen',
    costum_size_start: 'maten_kostuum',
    cup_size_start: 'maten_cup',
    bust_end: 'maten_borst',
    waist_end: 'maten_taille',
    hips_end: 'maten_heupen',
    jeans_size_end: 'maten_jeans',
    clothing_size_end: 'maten_kleding',
    shoe_size_end: 'maten_schoenen',
    costum_size_end: 'maten_kostuum',
    cup_size_end: 'maten_cup'
};

$(document).ready(function() {
    $('#edit_selection_button').click(function(){
        var selection = $('#selection').find(":selected").val();

        recreateSelectionFromExisted(selection);
    });

    $('body')
        .on('focusout', '.selection-name-editable input, #selection_name input', function(e) {
            if (!$(this).prop("readonly")) {
                $(this).prop("readonly", true).css("background-color", "#FFF");
                editSelection($(this).attr('data-id'), $(this).val());
                resizeInput();
            }
        })
        .on('keypress', '.selection-name-editable input, #selection_name input', function(e) {
            if (!$(this).prop("readonly")) {
                if (e.keyCode == 13) {
                    $(this).prop("readonly", true).prop("disabled", true).css("background-color", "#FFF");
                    editSelection($(this).attr('data-id'), $(this).val());
                    resizeInput();
                }
            }
        })
        .on('click', '.selection-name-editable .edit, #selection_name .edit', function(e) {
            $(this).siblings("input").removeProp('readonly').removeProp('disabled').focus().css("background-color", "#EEE");
        })
        .on('contextmenu', '.fancybox-skin', function(e) {
            return false;
        });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('.go-top').fadeIn(200);
        } else {
            $('.go-top').fadeOut(200);
        }
    });
});

function gotop() {
    $('html, body').animate({scrollTop: 0}, 500);
}

function fbShare(url, title, descr, winWidth, winHeight) {
  var winTop = (screen.height / 2) - (winHeight / 2);
  var winLeft = (screen.width / 2) - (winWidth / 2);
  window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&u=' + url , 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
}

function resizeInput() {
    $(this).attr('size', $(this).val().length);
}

function displayEmails(json) {
	if (!json.error) {
		 for (var key in json.data) {
		 	$("."+key).attr('href','mailto:'+json.data[key]).text(json.data[key]);

		 	if (key != 'info_com') {
		 		$("#footer ."+key).text(json.data[key]);
		 	}
		}
	}
}

function displayNotifyMessage() {
    if ($('#notify-message-poppup').length) {
        jAlert(1, $('#notify-message-poppup').val());
    }
}

function lightUpHeaderElement() {
    if ($(".menu").is(":visible")) {
        $('#header .menu_right ul .light-up-element').css('opacity', '0.15');
        $(this).css('opacity', '1');
    } else {
        $('#header .menu_right ul .light-up-element').css('opacity', '1');
    }
}

function toggleMenu(isColorChange) {
    if ($(".menu").is(":visible")) {
        $(".menu div, #country-list, #header-login-block, #loginform").hide();
        $(".display_menu span i").removeClass('fa-angle-up');
        $(".display_menu span i").addClass('fa-angle-down');

        if (isColorChange) {
            $("#header").css("color","#000");
            $("#menu_image").attr("src","/images/menu_image_black.png");
            $("#logo, .mobile_logo li img").attr("src","/images/logo-new-black.png");

            $(".display_menu").each(function() {
                $(this).css("color","#000");
            });
        } else {
            $("#menu_image").attr("src","/images/menu_image.png");
        }

    } else {
        $("#tooltip-block").hide();
        $(".menu div").hide();
        $(".display_menu span i").addClass('fa-angle-up');
        $(".display_menu span i").removeClass('fa-angle-down');

        if (isColorChange) {
            $("#header").css("color","#fff");
            $("#menu_image").attr("src","/images/menu_image_arrow.png");
            $("#logo,.mobile_logo li img").attr("src","/images/logo-new.png");

            $(".display_menu").each(function() {
                $(this).css("color","#fff");
            });
        } else {
            $("#menu_image").attr("src","/images/menu_image_arrow.png");
        }
    }

    $(".menu").slideToggle( 400, function() {
        if ($(".menu").is(":visible")) {
            $("#country-list, #header-login-block, #loginform").fadeIn(300);
        } else {
            $('#header .menu_right ul li').css('opacity', '1');
            $("#country-list, #header-login-block, #loginform").hide();
        }

        $(".menu div").fadeIn( 300, function() {
            if (!$(".menu").is(":visible")) {
                $("#tooltip-block").fadeIn(200);
            } else {
                $("#tooltip-block").hide();
            }
        });
    });
}

function validateRegistration() {
    var name = $('#name').val();
    var email =$('#email').val();
    var phone = $('#phone').val();
    var password = $('#registration .field_wrap_inp #password').val();
    var company = $('#company').val();

    if (
        name == null ||
        name == "" ||
        email == null ||
        email == "" ||
        phone == null ||
        phone == "" ||
        company == null ||
        company == "" ||
        password == null ||
        password == ""
    ) {
        jAlert(1, messages.error.fieldEmpty);
    } else {
      var sector = $('#sector').val();
      var surname = $('#surname').val();
      registerUser(name, email, phone, company, sector, password, surname);
    }
}

function validateForm() {
    var name = $('#name').val();
    var email =$('#email').val();
    var phone = $('#phone').val();
    var password = $('.field_wrap_inp #password').val();
    var company = $('#company').val();
    var surname = $('#surname').val();

    if (
        name == null ||
        name == "" ||
        email == null ||
        email == "" ||
        phone == null ||
        phone == "" ||
        company == null ||
        company == ""
    ) {
        jAlert(1, messages.error.fieldEmpty);
        return false;
    }
}

function showRegistrationResponse(json) {
  if (json.data.message !== 'undefined') {
    if (json.error) {
         jAlert(1, json.data.message);
    } else {
      if (json.data.message == 'success') {
        $('#registration_block').empty();
        $('#registration_block').append($('<p style="padding-bottom: 0px; width:60%;"><i>' + messages.notice.registration + '</i></p>'));
      }
    }
  }
}


function displaySelections(json){
  $(".cast_team_cont_sel").empty();
  for (var key in json.data) {
    $(".cast_team_cont_sel").append($(
        '<div class="sel_row" data-id="'
        + json.data[key].id
        + '" id="selections"><div class="fr_sel">27 mei 2015</div><div class="sec_sel" style="min-width:200px;">'
        +'<span><span class="selection-name-editable"><input type="text" class="selection-title-input" data-id="'
        + json.data[key].id
        + '" readonly disabled value="'
        + json.data[key].name
        + '"><i class="edit fa fa-pencil-square-o" aria-hidden="true"></i></span>'
        +' ('
        + json.data[key]['models'].length
        + ')</span></div><a href="selection/?selection='
        + json.data[key].code
        +'&form=1" class="tr_sel">Stuur door</a><a href="#selections" class="for_sel"><i class="fa fa-close"></i> </a></div>'));
  }
}

function loadMore() {
    if (!stopLoading) {
        if ($(window).scrollTop() + $(window).height() > $(document).height() - $('#footer').height() - 900) {
            if (isLoadedPreveously === true) {
                isLoadedPreveously = false;
                itemLoaded = $('.masonry-item').length;
                var from = itemLoaded;
                var to = modelsPerPage;

                if (from != modelStack && Math.abs(from - modelStack) > 3) {
                  modelStack = from;
                } else {
                  from += modelsPerPage;
                  to = modelsPerPage * 2;
                }

                if (itemLoaded != 0) {
                    $('#infscr-loading').css("display", "block");
                    getModelsByAjax(from, to);
                }

                setTimeout('isLoadedPreveously=true;', 500);
            }
        }
    }
}

function noMoreModels() {
    $('#no-infscr-loading').toggle();
}

function checkInexistentFilters() {
    var queryString = getQueryString();

    for (var item in queryString) {
        if (!($("input[name='" + item + "']").length || $("select[name='" + item + "']").length)) {
            $('.hidden-filters').append('<input type="checkbox" value="' + queryString[item] + '" name="' + item + '">');
        } else if (item == 'specific' && !$("input[name='specific'][value='" + queryString[item] + "']").length) {
            $('.hidden-filters').append('<input type="checkbox" value="' + queryString[item] + '" name="' + item + '">');
        }
    }
}

function getQueryString() {
    var query_string = {};
    var query = window.location.search.substring(1);
    var vars = query.split("&");

    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");

        if (typeof query_string[pair[0]] === "undefined") {
            query_string[pair[0]] = decodeURIComponent(pair[1]);
        } else if (typeof query_string[pair[0]] === "string") {
            var arr = [query_string[pair[0]], decodeURIComponent(pair[1])];
            query_string[pair[0]] = arr;
        } else {
            query_string[pair[0]].push(decodeURIComponent(pair[1]));
        }
    }

    return query_string;
}

function setFilters() {
    var query_string = {};
    var query = window.location.search.substring(1);
    var vars = query.split("&");

    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");

        if (typeof query_string[pair[0]] === "undefined") {
            query_string[pair[0]] = decodeURIComponent(pair[1]);
        } else if (typeof query_string[pair[0]] === "string") {
            var arr = [query_string[pair[0]], decodeURIComponent(pair[1])];
            query_string[pair[0]] = arr;
        } else {
            query_string[pair[0]].push(decodeURIComponent(pair[1]));
        }
    }

    for (var item in query_string) {
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
            item == 'lichaam_filter' ||
            item == 'kleur_ogen_filter' ||
            item == 'versiering_filter' ||
            item == 'begroeiing_filter'
        ) {
            if (query_string[item].indexOf(",") > -1) {
                param_array = query_string[item].split(',');

                for (param in param_array) {
                    $("input[name='" + item + "'][value='" + param_array[param] + "']").prop("checked", true);
                }
            } else {
                 $("input[name='" + item + "'][value='" + query_string[item] + "']").prop("checked", true);
            }
        } else {
            $("#" + item).val(query_string[item]);
            $("select[name='" + item + "']").val(query_string[item]);
        }
    }
}

function createPoppupElement(data) {

    var $main_div = $("<div>", {class: 'featherlight fixwidth', style: 'display: block;'});
    var $content_div = $("<div>", {class: 'featherlight-content'});
    var $data_div = $("<div>", {class: 'modal_dtls_popup featherlight-inner', id: 'data1'});
    var $close_button = $('<img id="close_button" class="featherlight-close" src="/images/close_button.svg" style="position: absolute; right: 30px; top: 20px; cursor: pointer; z-index:1000;">');

    $data_div.append(data);
    $content_div.append($close_button);
    $content_div.append($data_div);

    $main_div.append($content_div);
    $('body').append($main_div);
    $('html').css('overflow-x', 'none');
    $('body').css('overflow', 'hidden');
    /*$('.fancybox_image').fancybox({
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
    });*/
}

function toggleCategory(list) {
    list.slideUp(300);
    list.stop(true, false, true).slideToggle(300);
    
    if ($('.category-active i').hasClass('fa-chevron-down')) {
        $('.category-active i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
    } else {
        $('.category-active i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
    }
}

function isAllowedParameter(param) {
    return param !== 'nvt' &&
        param !== 'geen' &&
        param !== 'nv' &&
        param !== 'ge' &&
        param !== '0' &&
        param
}

function handleSelectionCreatingResult(json) {
    if (!json.error) {
        window.location = '?selection=' + json.data.selection.code;
    } else {
        jAlert(1, json.message);
    }
}

function handleCreateSelection(json) {
    $('.voeg_card').html('<i class="fa fa-star" style="margin-right:5px;"> </i> ' + messages.notice.selectionAdded);

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

        $(".selections-single").empty();
        $(".selections-single").append($('<h3 style="color: #ffffff;font-family: "source_sans_problack";font-size: 30px;font-weight: normal;line-height: 38px;margin: 0 0 30px;padding-bottom: 15px;padding-left: 0 !important;padding-right: 0;padding-top: 0;position: relative;">' + messages.notice.selectionAddedTest + ' "' + title + '"</h3>'));

    }
}

function displaySelectionsInSelect(json) {
    $("#selection_select").parent().parent().parent().hide();

    if (json.data.length > 0) {
        $("#selection_select").parent().parent().parent().show();
        $("#selection_select").empty();
        $("#selection_select").append($('<option value="">Je bewaarde selecties</option>'));

        for (selection in json.data) {
            $("#selection_select").append($('<option value="' + json.data[selection].id + '">' + json.data[selection].name + '</option>'));
        }
    }
}

function handleUpdateSelection(json) {
    if (!json.error) {
        window.location.reload();
    } else {
        jAlert(1, json.message);
    }
}


function updateFilters(json) {

    var filterTypes = {
        sex: 'geslacht',
        cat: '',
        length: 'length'
    };

    for (var index in filterTypes) {
        var filter = $("input[name='" + index + "']").toArray();

        for (item in filter) {
            var enableFilter = false;

            for (model in json.data) {
                if (filter[item].value == json.data[model][filterTypes[index]]) {
                    enableFilter = true;
                }
            }

            if (!enableFilter) {
                $("input[name='" + index + "'][value=" + filter[item].value + "]").prop('disabled', true);
            } else {
                $("input[name='" + index + "'][value=" + filter[item].value + "]").prop('disabled', false);
            }
        }

        $active = $("input[name='" + filterTypes[index] + "']:enabled").toArray();

        if ($active.length < 2) {
            $("input[name='" + index + "'][value=" + json.data[0][filterTypes[index]] + "]:not(:checked)").prop('checked', true);
            $("input[name='" + index + "']:not(:checked)").prop('disabled', true);
        }
    }

    var filterCategoryTypes = {
        language_filter: 'talenkennis',
        skin_filter: 'huidskleur',
        hair_color_filter: 'haarkleur',
        hair_length_filter: 'haarlengte',
        hair_filter: 'haar'
    };

    for (var index in filterCategoryTypes) {
        var filter = $("input[name='" + index + "']").toArray();

        for (item in filter) {
            var enableFilter = false;

            for (model in json.data) {
                if (typeof json.data[model].info !== 'undefined') {
                    if (typeof json.data[model].info[filterCategoryTypes[index]] !== 'undefined') {
                        if (json.data[model]['info'][filterCategoryTypes[index]][0]['category_id'] == filter[item].value) {
                            enableFilter = true;
                        }
                    }
                }
            }

            if (!enableFilter) {
                $("input[name='" + index + "'][value=" + filter[item].value + "]").prop('disabled', true);
            } else {
                $("input[name='" + index + "'][value=" + filter[item].value + "]").prop('disabled', false);
            }
        }

        $active = $("input[name='" + index + "']:enabled").toArray();

        if ($active.length < 2) {
            if (json.data[0]['info'].hasOwnProperty(filterCategoryTypes[index])) {
                $("input[name='" + index + "'][value=" + json.data[0]['info'][filterCategoryTypes[index]][0]['category_id'] + "]:not(:checked)").prop('checked', true);
            }

            $("input[name='" + index + "']:not(:checked)").prop('disabled', true);
        }

    }

    //////////////////////////////////////////////////////////////////
    var filter = $("input[name='specific']").toArray();

    for (item in filter) {
        var enableFilter = false;

        for (model in json.data) {
            if (typeof json.data[model].groups !== 'undefined') {
                for (key in json.data[model]['groups']) {
                    if (json.data[model]['groups'][key]['id'] == filter[item].value) {
                        enableFilter = true;
                    }
                }
            }
        }

        if (!enableFilter) {
            $("input[name='specific'][value=" + filter[item].value + "]").prop('disabled', true);
        } else {
            $("input[name='specific'][value=" + filter[item].value + "]").prop('disabled', false);
        }

    }

    $active = $("input[name='specific']:enabled").toArray();

    if ($active.length < 2) {
        $("input[name='specific'][value=" + json.data[0]['groups'][0]['id'] + "]").prop('checked', true);
        $("input[name='specific']:not(:checked)").prop('disabled', true);
    }

    var filter = $("input[name='age']").toArray();

    for (item in filter) {
        var enableFilter = false;

        for (model in json.data) {
            if (typeof json.data[model].age !== 'undefined') {
                for (key in json.data[model]['age']) {
                    if (json.data[model]['age'][key] == filter[item].value) {
                        enableFilter = true;
                    }
                }
            }
        }

        if (!enableFilter) {
            $("input[name='age'][value=" + filter[item].value + "]").prop('disabled', true);
        } else {
            $("input[name='age'][value=" + filter[item].value + "]").prop('disabled', false);
        }
    }

    $active = $("input[name='age']:enabled").toArray();

    if ($active.length < 2) {
        $("input[name='age'][value=" + json.data[0]['age'][0] + "]").prop('checked', true);
        $("input[name='age']:not(:checked)").prop('disabled', true);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////

    var filtersStart = {
        bust_start: 'maten_borst',
        waist_start: 'maten_taille',
        hips_start: 'maten_heupen',
        jeans_size_start: 'maten_jeans',
        clothing_size_start: 'maten_kleding',
        shoe_size_start: 'maten_schoenen',
        costum_size_start: 'maten_kostuum',
        cup_size_start: 'maten_cup',
        bust_end: 'maten_borst',
        waist_end: 'maten_taille',
        hips_end: 'maten_heupen',
        jeans_size_end: 'maten_jeans',
        clothing_size_end: 'maten_kleding',
        shoe_size_end: 'maten_schoenen',
        costum_size_end: 'maten_kostuum',
        cup_size_end: 'maten_cup'
    };

    for (var index in filtersStart) {
        var minValue = '';
        var maxValue = '';

        for (model in json.data) {
            if (minValue == '') {
                minValue = json.data[model][filtersStart[index]];
            }

            if (maxValue == '') {
                maxValue = json.data[model][filtersStart[index]];
            }

            if (json.data[model][filtersStart[index]] < minValue) {
                minValue = json.data[model][filtersStart[index]];
            }

            if (json.data[model][filtersStart[index]] > maxValue) {
                maxValue = json.data[model][filtersStart[index]];
            }
        }

        for (var i = 0; i < 200; i++) {
            $("#" + index + " option[value='" + i + "']").show();
        }

        for (var i = 0; i < minValue; i++) {
            $("#" + index + " option[value='" + i + "']").hide();
        }

        for (var i = 200; i > maxValue; i--) {
            $("#" + index + " option[value='" + i + "']").hide();
        }
    }

    checkFiltersOpacity();
}

function checkFiltersOpacity() {
    $("label").has("input").css("opacity", 1);
    $("label").has("input:disabled").css("opacity", 0.3);
}


function getFilterParameters() {
    var parameters = new Object();
    parameters.search = $("#search").val();
    parameters.category = $(".side_top_links ul li[class='current']").attr('data-id');
    parameters.selection = $("#selection").val();
    parameters.sorted_by = $("input[name='sorted_by']:checked").val();
    parameters.sex = $("input[name='sex']:checked:not(:disabled)").val();
    parameters.age_start = $("input[name='age_start']").val();
    parameters.age_end = $("input[name='age_end']").val();
    parameters.age_exactly = $("input[name='age_exactly']").val();
    parameters.lengte_start = $("input[name='lengte_start']").val();
    parameters.lengte_end = $("input[name='lengte_end']").val();
    parameters.lengte_exactly = $("input[name='lengte_exactly']").val();
    parameters.bust = $("input[name='bust']").val();
    parameters.waist = $("input[name='waist']").val();
    parameters.hips = $("input[name='hips']").val();
    parameters.jeans_size = $("input[name='jeans_size']").val();
    parameters.clothing_size = $("input[name='clothing_size']").val();
    parameters.shoe_size = $("input[name='shoe_size']").val();
    parameters.costum_size = $("input[name='costum_size']").val();

    parameters.cat = [];
    $("input[name='cat']:checked:not(:disabled)").each(function() {
        parameters.cat.push($(this).val());
    });

    parameters.age = [];
    $("input[name='age']:checked:not(:disabled)").each(function() {
        parameters.age.push($(this).val());
    });

    parameters.length = [];
    $("input[name='length']:checked:not(:disabled)").each(function() {
        parameters.length.push($(this).val());
    });

    parameters.specific = [];
    $("input[name='specific']:checked:not(:disabled)").each(function() {
        parameters.specific.push($(this).val());
    });

    parameters.skin_filter = [];
    $("input[name='skin_filter']:checked:not(:disabled)").each(function() {
        parameters.skin_filter.push($(this).val());
    });

    parameters.hair_filter = [];
    $("input[name='hair_filter']:checked:not(:disabled)").each(function() {
        parameters.hair_filter.push($(this).val());
    });

    parameters.hair_color_filter = [];
    $("input[name='hair_color_filter']:checked:not(:disabled)").each(function() {
        parameters.hair_color_filter.push($(this).val());
    });

    parameters.hair_length_filter = [];
    $("input[name='hair_length_filter']:checked:not(:disabled)").each(function() {
        parameters.hair_length_filter.push($(this).val());
    });

    parameters.language_filter = [];
    $("input[name='language_filter']:checked:not(:disabled)").each(function() {
        parameters.language_filter.push($(this).val());
    });

    parameters.begroeiing_filter = [];
    $("input[name='begroeiing_filter']:checked:not(:disabled)").each(function() {
        parameters.begroeiing_filter.push($(this).val());
    });

    parameters.versiering_filter = [];
    $("input[name='versiering_filter']:checked:not(:disabled)").each(function() {
        parameters.versiering_filter.push($(this).val());
    });

    parameters.kleur_ogen_filter = []
    $("input[name='kleur_ogen_filter']:checked:not(:disabled)").each(function() {
        parameters.kleur_ogen_filter.push($(this).val());
    });

    parameters.lichaam_filter = [];
    $("input[name='lichaam_filter']:checked:not(:disabled)").each(function() {
        parameters.lichaam_filter.push($(this).val());
    });

    parameters.cup_size = $('#cup_size').find(":selected").val();
    parameters.weight_start = $('select[name="gewicht_start"]').find(":selected").val();
    parameters.weight_end = $('select[name="gewicht_end"]').find(":selected").val();
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
    parameters.view = $('.diff_view.active').attr('data-value');

    return parameters;
}

function clearFilters() {
    for (filter in filterCheckboxes) {
        $("input[name='" + filterCheckboxes[filter] + "']").each(function() {
           $(this).attr('checked', false);
        });
    }
}

function rewriteUrlWithFilters() {
    var parameters = getFilterParameters();
    var query_string = '';

    query_string = addInQueryString(query_string, 'search', parameters.search);
    query_string = addInQueryString(query_string, 'category', parameters.category);
    query_string = addInQueryString(query_string, 'sorted_by', parameters.sorted_by);
    query_string = addInQueryString(query_string, 'sex', parameters.sex);
    query_string = addInQueryString(query_string, 'cat', parameters.cat);
    query_string = addInQueryString(query_string, 'age', parameters.age);
    query_string = addInQueryString(query_string, 'length', parameters.length);
    query_string = addInQueryString(query_string, 'specific', parameters.specific);
    query_string = addInQueryString(query_string, 'skin_filter', parameters.skin_filter);
    query_string = addInQueryString(query_string, 'hair_filter', parameters.hair_filter);
    query_string = addInQueryString(query_string, 'hair_color_filter', parameters.hair_color_filter);
    query_string = addInQueryString(query_string, 'hair_length_filter', parameters.hair_length_filter);
    query_string = addInQueryString(query_string, 'language_filter', parameters.language_filter);
    query_string = addInQueryString(query_string, 'bust', parameters.bust);
    query_string = addInQueryString(query_string, 'waist', parameters.waist);
    query_string = addInQueryString(query_string, 'hips', parameters.hips);
    query_string = addInQueryString(query_string, 'jeans_size', parameters.jeans_size);
    query_string = addInQueryString(query_string, 'clothing_size', parameters.clothing_size);
    query_string = addInQueryString(query_string, 'shoe_size', parameters.shoe_size);
    query_string = addInQueryString(query_string, 'costum_size', parameters.costum_size);
    query_string = addInQueryString(query_string, 'cup_size', parameters.cup_size);
    query_string = addInQueryString(query_string, 'selection', parameters.selection);
    query_string = addInQueryString(query_string, 'gewicht_start', parameters.weight_start);
    query_string = addInQueryString(query_string, 'gewicht_end', parameters.weight_end);
    query_string = addInQueryString(query_string, 'leeftijd_start', parameters.age_start);
    query_string = addInQueryString(query_string, 'leeftijd_end', parameters.age_end);
    query_string = addInQueryString(query_string, 'schoenmaat_start', parameters.shoe_size_start);
    query_string = addInQueryString(query_string, 'schoenmaat_end', parameters.shoe_size_end);
    query_string = addInQueryString(query_string, 'borst_start', parameters.bust_start);
    query_string = addInQueryString(query_string, 'borst_end', parameters.bust_end);
    query_string = addInQueryString(query_string, 'taille_start', parameters.waist_start);
    query_string = addInQueryString(query_string, 'taille_end', parameters.waist_end);
    query_string = addInQueryString(query_string, 'heupen_start', parameters.hips_start);
    query_string = addInQueryString(query_string, 'heupen_end', parameters.hips_end);
    query_string = addInQueryString(query_string, 'cup_start', parameters.cup_size_start);
    query_string = addInQueryString(query_string, 'cup_end', parameters.cup_size_end);
    query_string = addInQueryString(query_string, 'cup_letter', parameters.cup_letter);
    query_string = addInQueryString(query_string, 'kleding_start', parameters.clothing_size_start);
    query_string = addInQueryString(query_string, 'kleding_end', parameters.clothing_size_end);
    query_string = addInQueryString(query_string, 'kostuum_start', parameters.costum_size_start);
    query_string = addInQueryString(query_string, 'kostuum_end', parameters.costum_size_end);
    query_string = addInQueryString(query_string, 'jeans_start', parameters.jeans_size_start);
    query_string = addInQueryString(query_string, 'jeans_end', parameters.jeans_size_end);
    query_string = addInQueryString(query_string, 'kinder_start', parameters.kinder_start);
    query_string = addInQueryString(query_string, 'kinder_end', parameters.kinder_end);
    query_string = addInQueryString(query_string, 'int_maat', parameters.int_maat);
    query_string = addInQueryString(query_string, 'begroeiing_filter', parameters.begroeiing_filter);
    query_string = addInQueryString(query_string, 'versiering_filter', parameters.versiering_filter);
    query_string = addInQueryString(query_string, 'kleur_ogen_filter', parameters.kleur_ogen_filter);
    query_string = addInQueryString(query_string, 'lichaam_filter', parameters.lichaam_filter);
    query_string = addInQueryString(query_string, 'age_start', parameters.age_start);
    query_string = addInQueryString(query_string, 'age_end', parameters.age_end);
    query_string = addInQueryString(query_string, 'age_exactly', parameters.age_exactly);
    query_string = addInQueryString(query_string, 'lengte_end', parameters.lengte_end);
    query_string = addInQueryString(query_string, 'lengte_start', parameters.lengte_start);
    query_string = addInQueryString(query_string, 'lengte_exactly', parameters.lengte_exactly);
    query_string = addInQueryString(query_string, 'view', parameters.view);

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
