{include file='site/header.tpl'}
{literal}
    <script>
        var isLoadedPreveously = true;
        var stopLoading = false;
        var randomModelImages = 2;
        var modelsPerPage = 80;
        var previousCount = modelsPerPage;
        var modelStack = 0;
        var lock = false;

        function deleteModelFromSelection(selection_id, model_id) {

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    selection_id: selection_id,
                    model_id: model_id
                },
                url: "/ajax/delete_model_from_selection",
                error:
                        function() {
                            jAlert(1, messages.error.iternal);
                        },
                success:
                        function(json) {

                            if (!json.error) {
                                resetResults();
                            } else {
                                jAlert(1, json.message);
                            }
                        }
            });
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
                            jAlert(1, messages.error.iternal);
                        },
                success:
                        function(json) {
                            var msg = 'Your selection has been sent';
                            $("#send_selection_form_email").empty();
                            $("#send_selection_form_email").html('<p><i>' + msg + '</i></p>');
                        }


            });

        }

        function resetResults() {
            stopLoading = false;
            $('.masonry').empty();
            $('.main2').empty();
            getModelsByAjax(0, 30);


        }

        function getModelsByAjax(from, to) {
            if (!lock) {
                var parameters = getFilterParameters();

                lock = true;

                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data: {
                        from: from,
                        to: to,
                        sex: parameters.sex,
                        category: parameters.category,
                        length: parameters.length,
                        age: parameters.age,
                        cat: parameters.cat,
                        sorted_by: parameters.sorted_by,
                        specific: parameters.specific,
                        bust: parameters.bust,
                        waist: parameters.waist,
                        hips: parameters.hips,
                        jeans_size: parameters.jeans_size,
                        clothing_size: parameters.clothing_size,
                        shoe_size: parameters.shoe_size,
                        costum_size: parameters.costum_size,
                        cup_size: parameters.cup_size,
                        skin_filter: parameters.skin_filter,
                        hair_length_filter: parameters.hair_length_filter,
                        hair_color_filter: parameters.hair_color_filter,
                        hair_filter: parameters.hair_filter,
                        language_filter: parameters.language_filter,
                        search: parameters.search,
                        selection: parameters.selection,
                        shoe_size_start: parameters.shoe_size_start,
                        shoe_size_end: parameters.shoe_size_end,
                        bust_start: parameters.bust_start,
                        bust_end: parameters.bust_end,
                        waist_start: parameters.waist_start,
                        waist_end: parameters.waist_end,
                        hips_start: parameters.hips_start,
                        hips_end: parameters.hips_end,
                        cup_size_start: parameters.cup_size_start,
                        cup_size_end: parameters.cup_size_end,
                        cup_letter: parameters.cup_letter,
                        clothing_size_start: parameters.clothing_size_start,
                        clothing_size_end: parameters.clothing_size_end,
                        costum_size_start: parameters.costum_size_start,
                        costum_size_end: parameters.costum_size_end,
                        jeans_size_start: parameters.jeans_size_start,
                        jeans_size_end: parameters.jeans_size_end,
                        kinder_start: parameters.kinder_start,
                        kinder_end: parameters.kinder_end,
                        int_maat: parameters.int_maat,
                        begroeiing_filter: parameters.begroeiing_filter,
                        versiering_filter: parameters.versiering_filter,
                        kleur_ogen_filter: parameters.kleur_ogen_filter,
                        lichaam_filter: parameters.lichaam_filter,
                        accepted:1
                    },
                    url: "/ajax/get_models",
                    error:
                            function() {
                                lock = false;
                                jAlert(1, messages.error.iternal);
                            },
                    success:
                            function(json) {
                                lock = false;

                                if (from == 0) {
                                    $('.masonry').empty();
                                }
                                if (json.data['1'] === undefined) {
                                    noMoreModels();
                                    setTimeout('noMoreModels();', 3000);
                                    stopLoading = true;
                                }

                                createModelElements(json);

                                if (
                                        (json.data.count[0] < 20) &&
                                        from == 0 &&
                                        (json.data.count[0] > 0) &&
                                        (search || selection)
                                ) {
                                    updateFilters(json);
                                } else {

                                    if (json.data[0] !== undefined) {

                                        $("input").prop('disabled', false);
                                        $("label").css('opacity', 1);
                                        $("option").show();

                                    }
                                }

                                $("#result_count").text(json.data.count[0] + ' resultaten gevonden');

                                var $ul = $("<ul>");
                                for (model in json.data) {
                                    if (model == 'count') {
                                        continue;
                                    }
                                    var model_link = '/' + taal + '/people/' + json.data[model].model_id;
                                    var $li = $("<li>", {class: "masonry-item", id: json.data[model].model_id});
                                    var $a = $("<a>", {id: json.data[model].model_id, href: '#' + json.data[model].model_id});
                                    var image = '';

                                    if (json.data[model].hasOwnProperty('images')) {

                                        if (json.data[model].images[0].id == 'no_foto') {
                                            image = '/models/no_foto.jpg'
                                        } else {
                                            if (json.data[model].images.length > (randomModelImages - 1)) {
                                                index = Math.floor(Math.random() * randomModelImages);
                                            } else {
                                                index = 0;
                                            }
                                            if (json.data[model].images[index] !== undefined) {
                                                image = '/models/' + json.data[model].model_id + '/website/thumbs/' + json.data[model].images[index].id + '.jpg';
                                            } else {
                                                image = '/models/' + json.data[model].model_id + '/website/thumbs/' + json.data[model].images[0].id + '.jpg';

                                            }
                                        }
                                    } else {
                                        image = '/models/no_foto.jpg';
                                    }

                                    var $img = $(
                                            "<img>",
                                            {
                                                src: image,
                                                width: '228',
                                                height: '350',
                                                class: 'animate fade-in',
                                                alt: json.data[model].voornaam + ' (' + json.data[model].model_id + ')'
                                            });

                                    var $span_child1 = $('<div>').html('<p style="font-size:15px;color:black;text-align:center; display:inline-block;font-family:\'source_sans_proSBdIt\';margin-top:3px;"><i class="fa fa-heart-o"></i>' + json.data[model].voornaam + ' - ' + json.data[model].model_id + "</p>");
                                    $a.append($img);
                                    $a.append($span_child1);
                                    $li.append($a);

                                    if ($('.label1 .reffered').length) {


                                    } else {
                                        var $deleteModel = $('<span class="icon" id="delete_model_from_selection" style="cursor:pointer; position:absolute; margin-left: 190px; margin-top: -375px; width:32px; height:32px;z-index:1003;"><img style="width:32px; height:32px;" id="remove_model" src="/images/remove.png"></span>');
                                        if (!$("option[value=" + $("#selection").val() + "]").hasClass("private_selection"))
                                            $li.append($deleteModel);

                                    }

                                    $ul.append($li);
                                }

                                newModels = $ul.html();
                                $newM = $(newModels);
                                $('.masonry').append($newM);
                                $('#infscr-loading').css("display", "none");

                            }
                    });
            }
        }

        function createModelElements(json) {

            for (key in json.data) {
                if (key == 'count') {
                    continue;
                }

                var model_element = '<article class="list_carousel">' +
                                        '<div class="list_carousel_lft" style="height: 350px;">' + 
                                            '<h4>' + json.data[key].voornaam + '</h4>' + 
                                            '<span class="ref"> Ref. ' + json.data[key].model_id + ' </span>' + 
                                            '<div class="carousel_links">' + 
                                                '<a id="' + json.data[key].model_id + '" href="javascript:;" class="user_link" onclick="showModelModel('
                                                    + json.data[key].model_id + ')"> <i class="fa fa-user"></i> Bekijk fiche </a>' + 
                                                '<a href="/api/pdf/get?id=' + json.data[key].model_id + '" class="file_link" target="_blank"> <i class="fa fa-file-pdf-o"></i> Setcard (PDF) </a>' + 
                                            '</div>' + 
                                        '</div>' + 
                                        '<div  class="list_carousel_sub">';

                var image = '';

                if (json.data[key].hasOwnProperty('images')) {
                    if (json.data[key].images[0].id == 'no_foto') {
                        model_element += '<div><img width="228" height="350" alt="'
                                + json.data[key].voornaam + ' (' + json.data[key].model_id + ')'
                                + '" src="/models/no_foto.jpg"></div>';
                    } else {
                        for (image in json.data[key].images) {
                            var copyright = $('.copyright').length ? 'title="copyright"' : '';
                            var magnifingGlass = json.data[key].images[image].big ? '<span class="zoom_pop"><i class="fa fa-search"></i></span>' : '';
                            var link = json.data[key].images[image].big ? 'class="fancybox_image" href="' + json.data[key].images[0].src_domain + '/models/' + json.data[key].model_id + '/website/middle/' + json.data[key].images[image].id + '.jpg" ' + copyright + ' rel="model_group_' + key + '"' : '';

                            model_element += '<div class="model-carousel"><a ' + link + ' >'
                                    + magnifingGlass + '<img width="228" height="350" alt="'
                                    + json.data[key].voornaam + ' (' + json.data[key].model_id + ')'
                                    + '" src="' + json.data[key].images[0].src_domain + '/models/' + json.data[key].model_id + '/website/thumbs/'
                                    + json.data[key].images[image].id + '.jpg' + '"></a></div>';
                        }
                    }
                } else {
                    model_element += '<div><img width="228" height="350" alt="' + json.data[key].voornaam + ' (' + json.data[key].model_id + ')' +
                    '" src="/models/no_foto.jpg"></div>';
                }

                model_element += '</div></article>';

                $('.main2').append($(model_element));

            }

            $('.list_carousel_sub').slick(slickElements());
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
                jAlert(1, "All required fields must be filled out");
                return false;
            } else {
                var comment = $('#comment').val();
                getSelectionByEmailAjax(name, mail_to, mail_from, selection, comment);
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
        function showModelModel(id) {
            getModelById(id);
        }

        $(document).ready(function() {
            setFilters();
            getModelsByAjax(0, modelsPerPage);
            setInterval(loadMore, 50);
            $('#selection_name .selection-title-input').val($('#selection').find(":selected").attr('data-name'));
            $('#selection_name .selection-title-input').attr('data-id', $('#selection').find(":selected").attr('data-id'));
            $('#selection_name .selection-title-input').each(resizeInput);

            $("input[name='sex']").click(function() {
                if ($("input[name='sex']:checked").val()) {
                    $("input[name='sex']").prop('checked', false);
                    $(this).prop('checked', true);
                }
            });

            $('.masonry').on('click', 'li', function(e) {
                if ($(e.target).attr('id') == 'remove_model') {
                    var selectionId = $('#selection').find(":selected").attr('data-id');
                    var model_id = $(this).attr('id');
                    deleteModelFromSelection(selectionId, model_id);
                    e.stopPropagation();
                } else {
                    getModelById(this.id);
                    e.preventDefault();

                }
            });

            $('body').on('click', '.featherlight', function(e) {
                if (e.target == this) {
                    $('div.featherlight').remove();
                    history.back();
                    e.preventDefault();
                }
            });

            $(".diff_view").click(function() {
                rewriteUrlWithFilters();
            });

            $("input[type='checkbox']").click(function() {
                rewriteUrlWithFilters();
                resetResults();
            });


            $("input[type='radio']").click(function() {
                rewriteUrlWithFilters();
                resetResults();
            });

            $("select[class='filter']").change(function(e) {
                if ($(this).id == $("#selection").id) {
                    clearFilters();
                }

                rewriteUrlWithFilters();
                resetResults();
                $('#selection_name .selection-title-input').val($('#selection').find(":selected").attr('data-name'));
                $('#selection_name .selection-title-input').attr('data-id', $('#selection').find(":selected").attr('data-id'));
                $('#selection_name .selection-title-input').attr('size', $('#selection_name .selection-title-input').val().length);
            });

            $("#selection").change(function() {

            });

            $('.masonry-item img').on('load', function() {
                $(this).fadeIn(250);
            }).each(function() {
                if (this.complete) {
                    $(this).load();
                }
            });

            $(".filter_top_lft #send_selection_button").click(function() {
                $("#send_selection_form_email").toggle();
                $("#send_selection_form_email").removeClass('dsp_block');
            });

            $("#send_selection_submit").click(function() {
                sendSelectionByEmail();
            });

            $("#toTop").click(function() {
                $("html, body").animate({scrollTop: 0}, 1000);
            });

            $("body").delegate("#close_button", "click", function() {
                $("body .featherlight").remove();
            }).delegate(".featherlight", "click", function() {
                $('body').css('overflow', 'none');
                $('html').css('overflow-x', 'hidden');
            });
        });

    </script>
{/literal}
<!-- SET: MAIN CONTENT -->
{include file='site/mobile_menu.tpl'}
<section class="main_content inner_content content-selection">
    <div class="pushmenu-push pushmenu-push-toright model_over_main">
        {include file='site/sidebar.tpl'}
        <div class="grid_content model_over_cont">
            <section class="buttonset model_overview_btn">
                <div id="nav_list"> <span></span> </div>
            </section>
            <section class="content">
                <div class="model_title clearfix">
                    <header class="page_title">
                        <h1>{if isset($selections) || !empty($current_selection)}{$taalContent['selection']['title']}{else}{$taalContent.selection.title_two}{/if}</h1>
                        {if isset($selections) || !empty($current_selection)}<span id="selection_name">( <input type="text" class="selection-title-input" data-id="{$selection['name']}" readonly disabled value="{$selection['name']}"> {if isset($is_user_selection) && $is_user_selection==1}<i class="edit fa fa-pencil-square-o" aria-hidden="true"></i>{/if})</span>{/if}

                        {if isset($selections)}
                            <label class="label1">
                                <select id="selection" class="filter">
                                    {if isset($is_user_selection)}
                                        {if $is_user_selection == false}
                                            <option class="private_selection" value="{$smarty.get.selection}">{$current_selection.name}</option>
                                        {/if}
                                    {/if}
                                    {foreach from=$selections item=selection}
                                        <option data-id="{$selection['id']}" data-name="{$selection['name']}" value="{$selection['code']}">{$selection['name']} ({$selection['cn_models']})</option>
                                    {/foreach}
                                </select>
                            </label>
                        {else}
                            <label class="label1">
                                <select id="selection" class="filter reffered">
                                    <option value="{$smarty.get.selection}">{$current_selection.name}</option>
                                </select>
                            </label>
                        {/if}
                        <div class="filter_top_lft">
                            <a id="send_selection_button" href="#send_selection_form_email" class="like_btn meld_btn">
                                <i class="fa fa-send"></i> 
                                {$taalContent['selection']['send_button']} ({if isset($selection_count)}{$selection_count}{else}0{/if})
                            </a>
                        </div>
                    </header>
                </div>
                {if isset($selections) or isset($smarty.get.selection)}
                    <section class="filter_top clearfix">
                        {if isset($smarty.get.edit)}
                            <div class="filter_top_lft">
                                <a id="edit_selection_button" href="#" class="like_btn meld_btn">
                                    <i class="fa fa-edit"></i> {$taalContent['selection']['edit_button']}
                                </a>
                            </div>
                        {/if}
                        <div class="filter_top_lft">
                        </div>
                        <div class="filter_top_rht">
                            {* <span class="head_cont"> {$taalContent['selection']['view']} </span> *}
                            <a href="#" class="list_view diff_view {if $model_view=='list'}active{/if}" data-value="list">
                                <span class="list_cont">{$taalContent['selection']['view_1']}</span>
                                <span class="list_view_img"></span>
                            </a>
                            <a href="#" class="grid_view diff_view {if $model_view=='grid'}active{/if}" data-value="grid">
                                <span class="list_cont">{$taalContent['selection']['view_2']}</span>
                                <span class="grid_view_img"></span>
                            </a>
                        </div>
                    </section>
                    {include file='site/form/send_selection_form.tpl'}
                    <section class="main1 clearfix" {if $model_view=='list'}style="display: none;"{/if}>
                        <a href="javascript:;" class="go-top" onclick="gotop()"><i class="fa fa-4x fa-angle-up"></i></a>
                        <ul class="masonry" id="got-gridbox">
                        </ul>
                        <ul class="pagination">
                        </ul>
                        {include file='site/loading.tpl'}
                    </section>
                    <section class="main2" {if $model_view=='grid'}style="display: none;"{/if}>
                    </section>
                {else}
                    <section class="selection-bottom"><h2>{$taalContent['selection']['subtitle']}</h2></section>
                {/if}
            </section>
            <!-- End Content -->
        </div>
        <!-- End Container -->
    </div>
</section>
<!-- END: MAIN CONTENT --> 
{include file='site/footer.tpl'}
