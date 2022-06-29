{literal}
    <script type="text/javascript">

        var paginationPage = 1;
        var modelsPerPage = 100;
        var modelInGroup = new Array();
        var modelsTodelete = new Array();
        var models = new Array();
        var randomModelImages = 3;

        function redefinePaginationPages() {

            $('.pagination').empty();

            for (i = 1; i < 7; i++) {
                add = 3;

                if (paginationPage > 3) {
                    var page = (paginationPage - (7 - i)) + add;
                } else {
                    var page = i;
                }

                if (paginationPage == page) {

                    active = 'active';
                } else {
                    active = '';
                }

                $('.pagination').append($('<span class="page ' + active + '" data-page="' + page + '" value="' + (page * modelsPerPage - modelsPerPage) + '">' + page + '</span>'));

            }
        }



        function isModelInGroup(id) {

            if (modelInGroup) {
                for (model_id in modelInGroup) {
                    if (model_id == id) {
                        return true;
                    }
                }
            }

            if (models) {
                for (model_id in models) {
                    if (model_id == id) {
                        return true;
                    }
                }
            }

            return false;
        }

        function getGroups() {

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
            },
                url: "/ajax/get_groups",
                error:
                        function() {
                            alert('Er is een technische fout opgetreden.');
                        },
                success: createGroupsFromData

            });
        }


        function resetResults() {
            $('#modellen').empty();
            getModelsByAjax(0, 100);
        }

        function getModelsByAjax(from, to) {
            var search = $("input[name='zoeken_lijst']").val();
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
            $("#group_active").each(function() {
                if ($(this).attr('data-id') != '') {
                    specific.push($(this).attr('data-id'));
                }
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


            var group_id = $("#current_group").attr('data-id');



            var bust = $('#bust').find(":selected").val();
            var waist = $('#waist').find(":selected").val();
            var hips = $('#hips').find(":selected").val();
            var jeans_size = $('#jeans_size').find(":selected").val();
            var clothing_size = $('#clothing_size').find(":selected").val();
            var shoe_size = $('#shoe_size').find(":selected").val();
            var costum_size = $('#costum_size').find(":selected").val();
            var cup_size = $('#cup_size').find(":selected").val();
            var selection = $('#selection').find(":selected").val();
            var lengte_start = $('select[name="lengte_start"]').find(":selected").val();
            var lengte_end = $('select[name="lengte_end"]').find(":selected").val();
            var weight_start = $('select[name="gewicht_start"]').find(":selected").val();
            var weight_end = $('select[name="gewicht_end"]').find(":selected").val();


            // Leeftijd
            var age_start = $("select[name='leeftijd_start']").find(":selected").val();
            var age_end = $("select[name='leeftijd_end']").find(":selected").val();

            // Schoenmaat
            var shoe_size_start = $("select[name='schoenmaat_start']").find(":selected").val();
            var shoe_size_end = $("select[name='schoenmaat_end']").find(":selected").val();

            // Borstomtrek
            var bust_start = $("select[name='borst_start']").find(":selected").val();
            var bust_end = $("select[name='borst_end']").find(":selected").val();

            // Taille
            var waist_start = $("select[name='taille_start']").find(":selected").val();
            var waist_end = $("select[name='taille_end']").find(":selected").val();

            // Heupen
            var hips_start = $("select[name='heupen_start']").find(":selected").val();
            var hips_end = $("select[name='heupen_end']").find(":selected").val();

            // Cup
            var cup_size_start = $("select[name='cup_start']").find(":selected").val();
            var cup_size_end = $("select[name='cup_end']").find(":selected").val();

            // Kleding
            var clothing_size_start = $("select[name='kleding_start']").find(":selected").val();
            var clothing_size_end = $("select[name='kleding_end']").find(":selected").val();

            // Kleding
            var costum_size_start = $("select[name='kostuum_start']").find(":selected").val();
            var costum_size_end = $("select[name='kostuum_end']").find(":selected").val();

            // Jeans
            var jeans_size_start = $("select[name='jeans_start']").find(":selected").val();
            var jeans_size_end = $("select[name='jeans_end']").find(":selected").val();

            // Kindermaten
            var kinder_start = $("select[name='kinder_start']").find(":selected").val();
            var kinder_end = $("select[name='kinder_end']").find(":selected").val();

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    from: from,
                    to: to,
                    sex: sex,
                    category: category,
                    length: length,
                    age: age,
                    cat: cat,
                    sorted_by: sorted_by,
                    specific: specific,
                    bust: bust,
                    waist: waist,
                    hips: hips,
                    jeans_size: jeans_size,
                    clothing_size: clothing_size,
                    shoe_size: shoe_size,
                    costum_size: costum_size,
                    cup_size: cup_size,
                    skin_filter: skin_filter,
                    hair_length_filter: hair_length_filter,
                    hair_color_filter: hair_color_filter,
                    hair_filter: hair_filter,
                    language_filter: language_filter,
                    search: search,
                    selection: selection,
                    lengte_start: lengte_start,
                    lengte_end: lengte_end,
                    weight_start: weight_start,
                    weight_end: weight_end,
                    age_start: age_start,
                    age_end: age_end,
                    shoe_size_start: shoe_size_start,
                    shoe_size_end: shoe_size_end,
                    bust_start: bust_start,
                    bust_end: bust_end,
                    waist_start: waist_start,
                    waist_end: waist_end,
                    hips_start: hips_start,
                    hips_end: hips_end,
                    cup_size_start: cup_size_start,
                    cup_size_end: cup_size_end,
                    clothing_size_start: clothing_size_start,
                    clothing_size_end: clothing_size_end,
                    costum_size_start: costum_size_start,
                    costum_size_end: costum_size_end,
                    jeans_size_start: jeans_size_start,
                    jeans_size_end: jeans_size_end,
                    kinder_start: kinder_start,
                    kinder_end: kinder_end,
                    group_id: group_id,
                    accepted: 1
            },
                url: "/ajax/get_models",
                error:
                        function() {
                            alert('Er is een technische fout opgetreden.');
                        },
                success:
                        function(json) {
                            


                            createModelElements(json);

                        }

            });
        }

        function createModelElements(json) {
           
            if ($('#models-view-normal').length < 1) {
                $('#modellen').append($('<div id="models-view-normal" ></div>'));
            }

            if ($('#models-view-table').length < 1) {
                $('#modellen').append($('<div id="models-view-table" ><table id="cms-subscriptions" cellspacing="3" cellpadding="0" style="margin-top: 0px;"></div>'));
            }

            for (key in json.data) {
                if (key == 'count') {
                    continue;
                }

                var image = '';

                if (json.data[key].hasOwnProperty('images')) {
                    if (json.data[key].images[0].id == 'no_foto') {
                        image = '/models/no_foto.jpg';
                    } else {
                        image = '/models/' + json.data[key].model_id + '/website/thumbs/' + json.data[key].images[0].id + '.jpg';
                    }
                } else {
                    image = '/models/no_foto.jpg';
                }

                if (isModelInGroup(json.data[key]['model_id'])) {
                    selected = 'selected_model';
                } else {
                    selected = '';
                }

                if (json.data[key]['favorites'] == 1) {
                    var favorite = '<img src="/images/favorite_fill.png">';
                    var value = 0;


                } else {

                    var favorite = '<img src="/images/favorite.png">';
                    var value = 1;

                }


                var element = '<div data-modelid="' + json.data[key]['model_id'] + '" class="model_group size-3 show-caption-1 ' + selected + '"><div class="add_to_favorite" value="' + value + '">' + favorite + '</div><img alt="" src="' + image + '"><div class="caption-1"><div class="code">' + json.data[key]['model_id'] + '</div><div class="name">' + json.data[key]['naam'] + '<br>' + json.data[key]['voornaam'] + '</div><div class="clear"></div></div><div class="caption-2"><div class="basic-data"><div class="code">' + json.data[key]['model_id'] + '</div><div class="name">' + json.data[key]['naam'] + '<br>' + json.data[key]['voornaam'] + '</div></div><div class="left"></div><div class="right"></div><div class="features"><div class="left-feature">Lengte</div><div class="right-feature">1m77 cm&nbsp;</div></div><div class="features"><div class="left-feature">Gewicht</div><div class="right-feature">' + json.data[key]['gewicht'] + 'kg&nbsp;</div></div><div class="features"><div class="left-feature">Borst</div><div class="right-feature">' + json.data[key]['maten_borst'] + '&nbsp;</div></div><div class="features"><div class="left-feature">Taille</div><div class="right-feature">' + json.data[key]['maten_taille'] + '&nbsp;</div></div><div class="features"><div class="left-feature">Heupen</div><div class="right-feature">' + json.data[key]['maten_heupen'] + '&nbsp;</div></div><div class="features"><div class="left-feature">Cup</div><div class="right-feature">' + json.data[key]['maten_cup'] + '&nbsp;</div></div><div class="features"><div class="left-feature">Kleding</div><div class="right-feature">' + json.data[key]['maten_kleding'] + '&nbsp;</div></div><div class="features"><div class="left-feature">Jeans</div><div class="right-feature">' + json.data[key]['maten_jeans'] + '&nbsp;</div></div><div class="features"><div class="left-feature">Schoen</div><div class="right-feature">' + json.data[key]['maten_schoenen'] + '&nbsp;</div></div><div class="features"><div class="left-feature">Leeftijd</div><div class="right-feature">' + json.data[key]['geboortedatum'] + '&nbsp;</div></div></div></div>';

                $('#models-view-normal').append($(element));

            }

            window.location = '#pagination';

        }

        function addToFavorite(model_id, value, group_id) {

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    model_id: model_id,
                    value: value,
                    group_id: group_id

                },
                url: "/ajax/add_to_favorite",
                error:
                        function() {
                            alert('Er is een technische fout opgetreden.');
                        },
                success:
                        function(json) {



                        }


            });


        }



        function addGroup(group_name) {

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    name: group_name

                },
                url: "/ajax/add_group",
                error:
                        function() {
                            alert('Er is een technische fout opgetreden.');
                        },
                success:
                        function(json) {

                            getGroups();

                        }


            });
        }

        function editGroup(group_id, group_name) {

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    id: group_id,
                    name: group_name

            },
                url: "/ajax/edit_group",
                error:
                        function() {
                            alert('Er is een technische fout opgetreden.');
                        },
                success:
                        function(json) {

                            getGroups();

                        }


            });



        }

        function removeModelFromGroup(group_id, model_id) {


            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    group_id: group_id,
                    model_id: model_id

            },
                url: "/ajax/remove_model_from_group",
                error:
                        function() {
                            alert('Er is een technische fout opgetreden.');
                        },
                success:
                        function(json) {

                            getModelsByGroup(group_id);

                        }
            });
        }


        function addModelToGroup(group_id, model_id) {


            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    group_id: group_id,
                    model_id: model_id

                },
                url: "/ajax/add_model_to_group",
                error:
                        function() {
                            alert('Er is een technische fout opgetreden.');
                        },
                success:
                        function(json) {

                            getModelsByGroup(group_id);

                        }
            });
        }

        function deleteGroup(group_id) {


            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    id: group_id

            },
                url: "/ajax/delete_group",
                error:
                        function() {
                            alert('Er is een technische fout opgetreden.');
                        },
                success:
                        function(json) {

                            getGroups();

                        }


            });


        }

        function getModelsByGroup(group_id) {
            var groups = [group_id];

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    from: '0',
                    to: '100',
                    sorted_by: 'new',
                    specific: groups

            },
                url: "/ajax/get_models",
                error:
                        function() {
                            alert('Er is een technische fout opgetreden.');
                        },
                success:
                        function(json) {


                            createModelsFromData(json, group_id)


                        }


            });


        }

        function getModelsByGroupSave(group_id) {
           
            var groups = [group_id];

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    from: '0',
                    to: '1000',
                    sorted_by: 'new',
                    specific: groups,
                    accepted: 1

            },
                url: "/ajax/get_models",
                error:
                        function() {
                            alert('Er is een technische fout opgetreden.');
                        },
                success:
                        function(json) {


                            for (key in json.data) {

                                models[json.data[key]['model_id']] = json.data[key]['model_id'];

                            }
                            $('#modellen').empty();
                            getModelsByAjax(0, 100);


                        }


            });


        }


        function editGroupCategories(group_id) {


            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
            },
                url: "/ajax/get_main_categories_with_groups",
                error:
                        function() {
                            alert('Er is een technische fout opgetreden.');
                        },
                success:
                        function(json) {
                            createCategoriesElement(json, group_id);
                        }
            });
        }


        function addGroupToCategory(filter_id, category_id, value_id,type) {


            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    filter_id: filter_id,
                    category_id: category_id,
                    value_id: value_id,
                    type:type,
                    active: 1
            },
                url: "/ajax/add_filter_value_to_category",
                error:
                        function() {
                            alert('Er is een technische fout opgetreden.');
                        },
                success:
                        function(json) {



                        }
            });
        }


        function deleteGroupFromCategory(filter_id, category_id, value_id,type) {

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    filter_id: filter_id,
                    category_id: category_id,
                    value_id: value_id,
                    type:type
                },
                url: "/ajax/delete_filter_value_from_category",
                error:
                        function() {
                            alert('Er is een technische fout opgetreden.');
                        },
                success:
                        function(json) {


                        }
            });
        }




        function createCategoriesElement(json, group_id) {
            var cats={3: "specific",17:"kenmerken"};

            for (var cat in cats) {
                $div = $('<div data-filter="' + cat + '" class="' + cats[cat] + '" id="main_categories"><h3>' + cats[cat] + '</h3>');
            
                for (var key in json.data) {
                    var checked = '';
                    for (var group in json.data[key].groups) {
                        if (
                            json.data[key].groups[group]['value_id'] == group_id &&
                            json.data[key].groups[group]['filter_id'] == cat &&
                            json.data[key].groups[group]['type'] == cats[cat]
                        ) {
                            checked = 'checked=""';
                        }
                    }

                    category_string = '<span class="main_category"><label><input ' + checked + ' type="checkbox" value="' + json.data[key]['category_id'] + '" name="' + cats[cat] + '"> <span class="lbl padding-8">' + json.data[key].name + '</span></label></span>';
                    $category = $(category_string)
                    $div.append($category);
                }

                $('li[data-id=' + group_id + ']').append($div);
            }
        }


        function createGroupsFromData(json) {
            $('.groups').empty();

            for (var item = 0; item < json.data.length; item++) {

                var $li = $("<li>", {class: 'model-kenmerk groep', style: "list-style-type: none; margin:5px; background-color:" + " #FFF ;padding: 10px 15px; font-family: 'HelveticaNeueW02-57Cn'; font-size: 18px; width:300px;", 'data-id': json.data[item].id});
                var $span_title = $("<input>", {type: 'text', value: json.data[item].naam, class: 'group', 'data-id': json.data[item].id}).prop("readonly", true).prop("disabled", true);
                var $span_edit = $("<span>", {class: 'icon'});
                var $span_delete = $("<span>", {class: 'icon'});
                var $span_show = $("<span>", {class: 'icon'});
                var $span_edit_cats = $("<span>", {class: 'icon'});
                var $span_select_models = $("<span>", {class: 'icon'});
                var $img_delete = $("<img>", {id: 'delete', 'src': '/images/delete.png', 'data-id': json.data[item].id});
                var $img_edit = $("<img>", {id: 'edit', 'src': '/images/rename.png'});
                var $img_show = $("<img>", {id: 'show_model', 'src': '/images/show_model.png'});
                var $img_edit_cats = $("<img>", {id: 'edit_cats', 'src': '/images/edit_cats.png'});
                var $img_select_models = $("<img>", {id: 'select_models', 'src': '/images/select_models.png'});
                $span_delete.append($img_delete);
                $span_show.append($img_show);
                $span_edit.append($img_edit);
                $span_edit_cats.append($img_edit_cats);
                $span_select_models.append($img_select_models);
                $li.append($span_title);
                $li.append($span_edit_cats);
                $li.append($span_select_models);
                if (
                        !(
                                json.data[item].naam == 'Acteurs en actrices' ||
                                json.data[item].naam == 'Specials' ||
                                json.data[item].naam == 'People 1' ||
                                json.data[item].naam == 'People 2' ||
                                json.data[item].naam == 'Modellen 1' ||
                                json.data[item].naam == 'Modellen 2'
                        )
                ) {
                    $li.append($span_delete);
                    $li.append($span_show);
                    $li.append($span_edit);
                } else {
                    $li.append($span_show);
                }

                $('.groups').prepend($li);

            }
        }

        function createModelsFromData(json, group_id) {

            $('#model_list').empty();
            var elem = "<li class='cms-add-model' data-group-id='" + group_id + "' style='list-style-type: none;'>" + "<input id='input_model' name='zoeken' value='' type='text'>" + "<a id='submit_model'>" + "Add new model</a></li>";
            $('#model_list').append(elem);
            for (var item = 0; item < Object.keys(json.data).length - 1; item++) {
                if (item == 'count') {
                    continue;
                }
                var $li = $("<li>", {class: 'group_model', 'data-group-id': group_id, style: "list-style-type: none; margin:5px; background-color:" + " #FFF ;padding: 10px 15px; font-family: 'HelveticaNeueW02-57Cn'; font-size: 18px; ", 'data-id': json.data[item]['model_id']});
                var $span_title = $("<span>", {type: 'text', 'data-id': json.data[item]['model_id']}).text(json.data[item].naam + ' ' + json.data[item].voornaam + '  ref.' + json.data[item]['model_id']);
                var $span_delete = $("<span>", {class: 'icon'});
                var $img_delete = $("<img>", {id: 'remove_model', 'src': '/images/remove.png'});
                $span_delete.append($img_delete);
                $li.append($span_title);
                $li.append($span_delete);
                $('#model_list').append($li);
            }
        }

        $(document).ready(function() {

            getGroups();

            $("#submit_group").click(function() {
                var group_name = $('#input_group').val();
                $('#input_group').val('');
                addGroup(group_name);
            });

            $('#model_list').on('click', 'li #submit_model', function(e) {
                var model_id = $('#input_model').val();
                addModelToGroup($(this).parent().attr('data-group-id'), model_id);
                $('#input_model').val('');
            });

            $('#groups').on('click', 'li span #delete', function(e) {
                deleteGroup($(this).attr('data-id'));
            });

            $('#model_list').on('click', 'li span #remove_model', function(e) {
                removeModelFromGroup($(this).parent().parent().attr('data-group-id'), $(this).parent().parent().attr('data-id'));
            });

            $('#groups').on('click', 'li span #edit', function(e) {
                $(this).parent().siblings("input").removeProp('readonly').removeProp('disabled').focus().css("background-color", "#EEE");
            });

            $('#modellen').on('click', '#models-view-normal .model_group', function(e) {
                if ($(this).hasClass('selected_model')) {
                    $(this).removeClass('selected_model');
                    var model_id = $(this).attr('data-modelid');
                    if (modelInGroup[model_id] !== undefined) {
                        delete modelInGroup[model_id];
                    } else {
                        modelsTodelete[model_id] = [model_id];
                    }
                } else {
                    $(this).addClass('selected_model');
                    var model_id = $(this).attr('data-modelid');
                    modelInGroup[model_id] = [model_id];
                }
            });


            $('#modellen').on('click', '#models-view-normal .model_group .add_to_favorite', function(e) {
                e.stopPropagation();
                var group_id = $("#current_group").attr('data-id');
                var model_id = $(this).parent().attr('data-modelid');
                var value = $(this).attr('value');
                addToFavorite(model_id, value, group_id);

                if (value == 1) {
                    $(this).children('img').attr('src', '/images/favorite_fill.png');
                    $(this).attr('value', 0)
                } else {
                    $(this).children('img').attr('src', '/images/favorite.png');
                    $(this).attr('value', 1);
                }
            });

            $('#groups').on('click', 'li span #edit_cats', function(e) {
                if ($(this).parent().parent().children("#main_categories").length) {
                    $(this).parent().parent().children("#main_categories").remove();
                } else {
                    editGroupCategories($(this).parent().parent().attr('data-id'));
                }
            });

            $('#groups').on('focusout', 'li input', function(e) {
                if (!$(this).prop("readonly")) {
                    $(this).prop("readonly", true).css("background-color", "#FFF");
                    editGroup($(this).parent().attr('data-id'), $(this).val());
                }
            });

            $('#groups').on('keypress', 'li input', function(e) {
                if (!$(this).prop("readonly")) {
                    if (e.keyCode == 13) {
                        $(this).prop("readonly", true).prop("disabled", true).css("background-color", "#FFF");
                        editGroup($(this).parent().attr('data-id'), $(this).val());
                    }
                }
            });

            $('#groups').on('click', 'li span #show_model', function(e) {
                getModelsByGroup($(this).parent().parent().attr('data-id'));
            });

            $('#groups').on('click', 'li span #select_models', function(e) {
                var group_name = $(this).parent().parent().children('input').attr('value');
                var group_id = $(this).parent().parent().children('input').attr('data-id');

                $('.current_groups').each(function(index) {
                    $(this).text(group_name);
                    $(this). attr('data-id', group_id);
                });

                $('.model_group').removeClass('selected_model');
                modelInGroup = new Array();
                modelsTodelete = new Array();
                models = new Array();
                paginationPage = 1;
                $('#group_active').attr('data-id', '');
                $('#group_active').html('Toon enkel mensen in deze groep');
                getModelsByGroupSave(group_id);
                redefinePaginationPages();
                $(".model_selection_block").show();
            });

            $('.pagination').on('click', 'span', function(e) {

                var from = $(this).attr('value');
                var page = $(this).attr('data-page');
                $('.page').removeClass('active');
                paginationPage = page;

                $(this).addClass('active');
                redefinePaginationPages();
                $('#modellen').empty();
                getModelsByAjax(from, 100);

            });

            $('#pagination').on('click', '#group_active', function(e) {
                if ($(this).attr('data-id') == '') {

                    $(this).attr('data-id', $("#current_group").attr('data-id'));
                    $(this).html('Toon iedereen');
                } else {
                    $(this).attr('data-id', '');
                    $(this).html('Toon enkel mensen in deze groep');
                }
                getModelsByGroupSave($("#current_group").attr('data-id'));
                var from = $('.page.active').attr('value');
                //getModelsByAjax(from, 100);
            });

            $("#save_group_selection").click(function() {
                var group_id = $("#current_group").attr('data-id');

                if (modelInGroup) {
                    for (index in modelInGroup) {
                        addModelToGroup(group_id, index);
                    }
                }

                if (modelsTodelete) {
                    for (index in modelsTodelete) {
                        removeModelFromGroup(group_id, index);
                    }
                }

                $(".model_selection_block").hide();
                $('.model_group').removeClass('selected_model');
                modelInGroup = new Array();
                modelsTodelete = new Array();
                models = new Array();
                paginationPage = 1;
            });

            $('#groups').on('click', 'li div span label input', function(e) {
                var group_id = $(this).parent().parent().parent().parent().attr('data-id');
                var category_id = $(this).val();
                var type = $(this).parent().parent().parent().attr('class');
                var filter_id = $(this).parent().parent().parent().attr('data-filter');

                if (this.checked) {
                    addGroupToCategory(filter_id, category_id, group_id,type);
                } else {
                    deleteGroupFromCategory(filter_id, category_id, group_id,type)
                }
            });

        });

    </script>
{/literal}
<h1>Groepen</h1>
<div class="lijn gn-margin" style="margin-bottom: 40px;"></div>
<div class="cms-add-group"><input id='input_group' name="zoeken" value="" type="text"><a id='submit_group'>Add new group</a></div>
<ul class="groups" id='groups'>
</ul>
<ul id='model_list'>
</ul>
<div id='selection_anchor' class="clear"></div>
<div id="selection_block" class="model_selection_block" style="display:none;">
    <div id="pagination" class="pagination-block">
        <div class="field_wrap_inp" style="display:inline-block;">
            <span>Duid modellen aan voor de groep '<strong id="current_group" class='current_groups'></strong>'</span>
        </div>
        <div class="field_wrap_inp" style="display:inline-block; "><button style="margin-top:0px; margin-left:30px; float:none;" id="save_group_selection" class="button new " >Bewaar</button></div>
        <div  style="float:right; display:inline-block; ">
            <div class="field_wrap_inp" style="display:inline-block; ">
                <button style="margin-top:0px; margin-left:30px; float:none;" id="group_active" data-id="" class="button new" >Toon enkel mensen in deze groep</button>
            </div>
            <span>Vorige</span>
            <div class="pagination">
            </div>
            <span>Volgende</span>
        </div>
    </div>
    <div class="clear"></div>
    <div id="modellen"></div>
    <div class="pagination-block">
        <div class="field_wrap_inp" style="display:inline-block;">
            <span>Duid modellen aan voor de groep '<strong id="current_group" class='current_groups'></strong>'</span>
        </div>
        <div class="field_wrap_inp" style="display:inline-block; "><button style="margin-top:0px; margin-left:30px; float:none;" id="save_group_selection" class="button new " >Bewaar</button></div>
        <div  style="float:right; display:inline-block; ">
            <span>Vorige</span>
            <div class="pagination">
            </div>
            <span>Volgende</span>
        </div>
    </div>
</div>