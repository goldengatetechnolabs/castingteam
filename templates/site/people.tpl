{include file='site/header.tpl'}
<!-- SET: MAIN CONTENT -->
{literal}
    <script>
        var isLoadedPreveously = true;
        var stopLoading = false;
        var randomModelImages = 2;
        var modelsPerPage = 20;
        var previousCount = modelsPerPage;
        var modelStack = 0;
        var lock = false;

        function getSelections() {

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                },
                url: "/ajax/get_selections",
                error:
                        function() {
                            jAlert(1, messages.error.iternal);
                        },
                success:
                        function(json) {
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
            });
        }

        function resetResults() {
            stopLoading = false;
            $('.masonry').empty();
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
                    basic_search: parameters.search,
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
                    age_start: parameters.age_start,
                    age_end: parameters.age_end,
                    age_exactly: parameters.age_exactly,
                    lengte_start: parameters.lengte_start,
                    lengte_end: parameters.lengte_end,
                    lengte_exactly: parameters.lengte_exactly,
                    accepted: 1
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

                            var size = 0;

                            for (var model in json.data) {
                                size++;
                            }
                            if (json.data['1'] === undefined || (previousCount < modelsPerPage && size < modelsPerPage) || json.data.count[0] == $('.masonry-item').length) {
                                noMoreModels();
                                setTimeout('noMoreModels();', 3000);
                                stopLoading = true;
                            }

                            previousCount = size;
                            if ((json.data.count[0] < 15) && from == 0 && (json.data.count[0] > 0) && search) {
                                //updateFilters(json);
                            }
                            //$("#result_count").text(json.data.count[0]+' resultaten gevonden');
                            showResultsCount(json.data.count[0]);
                            var $ul = $("<ul>");
                            for (var model in json.data) {

                                if (model == 'count') {
                                    continue;
                                }
                                if ($("#" + json.data[model].model_id).length > 0) {
                                    continue;
                                }
                                if ($ul.find("#" + json.data[model].model_id).length > 0) {
                                    continue;
                                }
                                var model_link = '{/literal}/{$taal}/people/{literal}' + json.data[model].model_id;
                                var $li = $("<li>", {class: "masonry-item", id: json.data[model].model_id});
                                var $a = $("<a>", {id: json.data[model].model_id, href: '#' + json.data[model].model_id});
                                var image = '';
                                if (json.data[model].hasOwnProperty('images')) {
                                    if (json.data[model].images[0].id == 'no_foto') {
                                        image = '/models/no_foto.jpg'
                                    } else {

                                        if (json.data[model].images.length > 1) {
                                            index = Math.floor(Math.random() * randomModelImages);
                                        } else {
                                            index = 0;
                                        }

                                        if (json.data[model].images[index] !== undefined) {
                                            image = json.data[model].images[index].src_domain + '/models/' + json.data[model].model_id + '/website/thumbs/' + json.data[model].images[index].id + '.jpg';
                                        } else {
                                            image = json.data[model].images[0].src_domain + '/models/' + json.data[model].model_id + '/website/thumbs/' + json.data[model].images[0].id + '.jpg';
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
                                        }
                                );

                                var $span = $("<span>", {class: 'grid_title clearfix'});
                                var $span_child1 = $("<span>").html('<i class="fa fa-heart-o"></i>' + json.data[model].voornaam + ' - ' + json.data[model].model_id);
                                //var $span_child2 = $("<span>").text('Ref.'+json.data[model].model_id);

                                $span.append($span_child1);
                                // $span.append($span_child2);
                                $a.append($img);
                                $a.append($span);
                                $li.append($a);
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

        function checkFiltersOpacity() {
            $("label").has("input").css("opacity", 1);
            $("label").has("input:disabled").css("opacity", 0.3);
        }

        function showResultsCount(results) {
            var search = $("#search").val();

            if (results > 0 && search) {
                $("#result_count").show();
                $("#result_count").text(results + ' resultaten gevonden voor "' + search + '"');
            } else if (results < 1 && search) {
                $("#result_count").show();
                $("#result_count").text('De zoekopdracht voor "' + search + '" heeft geen resultaten opgeleverd');
            } else {
                $("#result_count").hide();
                $("#result_count").text(results + ' resultaten gevonden');
            }
        }



        $(document).ready(function() {
            checkInexistentFilters();
            setFilters();
            // rewriteUrlWithFilters();
            getModelsByAjax(0, modelsPerPage);
            setInterval(loadMore, 50);

            $("input[name='sex']").click(function() {
                if ($("input[name='sex']:checked").val()) {
                    $("input[name='sex']").prop('checked', false);
                    $(this).prop('checked', true);
                }
            });

            $('.masonry').on('click', 'li', function(e) {
                getModelById(this.id);
                e.preventDefault();
            });

            $('body').on('click', '.featherlight', function(e) {
                if (e.target == this) {
                    $('div.featherlight').remove();
                    history.back();
                    e.preventDefault();
                }
            });

            $("input[type='checkbox']").click(function() {
                checkFiltersOpacity();
                rewriteUrlWithFilters();
                resetResults();
            });
            $("input[type='radio']").click(function() {
                rewriteUrlWithFilters();
                resetResults();
            });

            $("select[class='filter']").change(function() {
                rewriteUrlWithFilters();
                resetResults();
            });

            $("#toTop").click(function() {
                $("html, body").animate({scrollTop: 0}, 1000);
            });

            $("body").delegate(".featherlight", "click", function() {
                $('body').css('overflow', 'none');
                $('html').css('overflow-x', 'hidden');
            });

        });

    </script>
{/literal}
{include file='site/mobile_menu.tpl'}
<section class="main_content inner_content">
    <div class="pushmenu-push pushmenu-push-toright model_over_main">
        {include file='site/sidebar.tpl'}
        <div class="grid_content model_over_cont">
            <div class="hidden-filters dsp_none"></div>
            <section class="buttonset model_overview_btn">
                <div id="nav_list"> <span></span> </div>
            </section>
            <section class="content">
                <div class="overview-buttons">
                    {if isset($user)}
                        <a href="/{$taal}/mycastingteam" class="reting_items profile-button"> <i class="fa fa-user-circle" aria-hidden="true"></i> {$taalContent['people']['profile']}</a>
                    {/if}
                    <a href="/{$taal}/selection" class="reting_items"> <i class="fa fa-heart"></i> {$taalContent['people']['selection_count']} (<span id="current-selection-count">{if isset($selection_count)}{$selection_count}{else}0{/if}</span>) </a>
                    {if !isset($user)}
                        <div class="link_block">
                            <a href="/{$taal}/vip" class="link_to_vip"> <i class="fa fa-shield">&nbsp;&nbsp;</i>{$taalContent['people']['vip']}</a>
                        </div>
                    {/if}
                </div>
                <div class="model_title1 clearfix">
                    <header class="page_title">
                        <h1>{$title}</h1>
                    </header>
                </div>
                    {*<section class="filter_btm" id='sorted_by'><span id="result_count" class="sort_title result-count">{$taalContent['people']['results_count']}</span><span class="sort_title">{$taalContent['people']['sort']}</span>*}
                        {*<label>*}
                            {*<input type="radio" name="sorted_by" id='new' value="new" checked>*}
                            {*<span class="lbl padding-4">{$taalContent['people']['new']}</span>*}
                        {*</label>*}
                        {*<label>*}
                            {*<input type="radio" name="sorted_by" id='favorite' value="favorite">*}
                            {*<span class="lbl padding-4">{$taalContent['people']['favorite']}</span>*}
                        {*</label>*}
                        {*<label>*}
                            {*<input type="radio" name="sorted_by" id='rand' value="rand">*}
                            {*<span class="lbl padding-4">{$taalContent['people']['random']}</span>*}
                        {*</label>*}
                    {*</section>*}
                    <section class="main1 clearfix">
                        <input type="hidden" id="current_selection"/>
                        <a href="javascript:;" class="go-top" onclick="gotop()"><i class="fa fa-4x fa-angle-up"></i></a>
                        <ul class="masonry" id="got-gridbox">
                        </ul>
                        <ul class="pagination">
                            <li><a class="next" href=""></a></li>
                        </ul>
                        {include file='site/loading.tpl'}
                    </section>
                    <span id='load'></span>
                    <!-- End Content --> 
            </div>
            <!-- End Container --> 
        </div>
    </section>
    <!-- END: MAIN CONTENT --> 
</div></div></section>
{include file='site/footer.tpl'}
