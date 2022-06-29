{literal}
<script src="/js/jquery.form.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/cms/cms-new.js"></script>
<link rel="stylesheet" type="text/css" href="/css/cms/modal.css">
<script type="text/javascript">

var isLoadedPreveously = true;
var stopLoading = false;
var randomModelImages = 3;
var modelsPerPage = 30;
var lastResultCount = 0;

function resetResults(){
  stopLoading = false;
  $('#modellen').empty();
  getModelsByAjax(0, modelsPerPage);
}

function noMoreModels() {
  $('#no-infscr-loading').toggle();
}

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
            function () {
                alert('Er is een technische fout opgetreden.');
            },
        success:function(json) {
            if (!json.error) {
                console.log('test');
                $('div[data-modelid=' + model_id + ']').remove();

                if ($('#map_poppup').length) {
                    showOnMap();
                }

                if (lastResultCount > 0) {
                    lastResultCount--;

                    $("#result_count").text(lastResultCount + ' resultaten gevonden');
                }
            } else {
                jAlert(1, json.message);
            }
        }
    });
}

function getModelsByAjax(from, to) {
    var search = $("input[name='zoeken']").val();
    var selection = $("#selection").attr('data-code');
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

    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            from: from,
            to:to, 
            sex: sex, 
            category: category, 
            length: length,  
            age: age, 
            cat: cat,
            sorted_by: sorted_by, 
            specific_cms: specific,
            bust: bust, 
            waist: waist,
            hips: hips, 
            jeans_size: jeans_size,    
            clothing_size: clothing_size, 
            shoe_size:shoe_size,   
            costum_size: costum_size, 
            cup_size:cup_size,
            skin_filter:skin_filter,
            hair_length_filter:hair_length_filter,  
            hair_color_filter:hair_color_filter,
            hair_filter:hair_filter,
            language_filter:language_filter,
            native_language_filter:nativeLanguageFilter,
            cms_search:search,
            talent_search:talent_search,
            selection:selection,
            lengte_start:lengte_start,
            lengte_end:lengte_end,
            weight_start:weight_start,
            weight_end:weight_end,
            age_start:age_start,
            age_end:age_end,
            shoe_size_start:shoe_size_start,
            shoe_size_end:shoe_size_end,
            bust_start:bust_start,
            bust_end:bust_end,
            waist_start:waist_start,
            waist_end:waist_end,
            hips_start:hips_start,
            hips_end:hips_end,
            cup_size_start:cup_size_start,
            cup_size_end:cup_size_end,
            cup_size_number_start:cup_size_number_start,
            cup_size_number_end:cup_size_number_end,
            clothing_size_start:clothing_size_start,
            clothing_size_end:clothing_size_end,
            costum_size_start:costum_size_start,
            costum_size_end:costum_size_end,
            jeans_size_start:jeans_size_start,
            jeans_size_end:jeans_size_end,
            kinder_start:kinder_start,
            kinder_end:kinder_end,
            int_maat:int_maat,
            begroeiing_filter:begroeiing_filter,
            versiering_filter:versiering_filter,
            kleur_ogen_filter:kleur_ogen_filter,
            lichaam_filter:lichaam_filter,
            country:country,
            id_start:id_start,
            id_end:id_end,
            accepted:1
        },    
          
        url: "/ajax/get_models",

    error:function () {
      alert('Er is een technische fout opgetreden.');
    },

    success:function(json) {
      createModelElements(json, from);
      $('#infscr-loading').css("display", "none");
    }
  });
}

function showResultsCount(results) {
  var search = $("#search").val();
  lastResultCount = results;

  if (results > 0 && search) {
    $("#result_count").text(results + ' resultaten gevonden voor “' + search + '“');
  } else if (results<1 && search) {
    $("#result_count").text('De zoekopdracht voor “' + search + '” heeft geen resultaten opgeleverd');
  }else{
    $("#result_count").text(results + ' resultaten gevonden');
  }
}

function createModelElements(json, from) {

    if (from == 0) {
        $('#modellen').empty();
    }

  if(json.data['1']===undefined){      
    noMoreModels();
    setTimeout('noMoreModels();', 1000);
    stopLoading=true;
  }

  showResultsCount(json.data.count[0]);
  var view_type=$("#view .active").attr('id');
  view_type=view_type.replace(/\D/g,'');
  var caption_type=$("#caption .active").attr('id');
  caption_type=caption_type.replace(/\D/g,'');

  if (view_type == '0') {
    el_style = 'style="display:none;"';
    table_style = '';
  } else {
    el_style = '';
    table_style = 'style="display:none;"';
  }

  if($('#models-view-normal').length < 1){
    $('#modellen').append($('<div id="models-view-normal" '+el_style+'></div>'));
  }

  if($('#models-view-table').length < 1){
    $('#modellen').append($('<div id="models-view-table" '+table_style+'><table id="cms-subscriptions" cellspacing="3" cellpadding="0" style="margin-top: 0px;"></div>'));
  }

 for (key in json.data) {

    if (key=='count') {
        continue;
    }

    var image='';

      if (json.data[key].hasOwnProperty('images')) {
          if (json.data[key].images[0].id == 'no_foto') {
              image='/models/no_foto.jpg'
          } else {
              image='/models/'+json.data[key].model_id + '/website/thumbs/' + json.data[key].images[0].id+'.jpg';
          }
      } else {
          image='/models/no_foto.jpg';
      }

     var selection = $('#selection').val();
     var delete_model;
     var inactive;

     if (selection) {
         delete_model ='<span class="icon delete_model_from_selection" id="delete_model_from_selection" style="position:absolute; top:10px;right:10px; width:32px; height:32px;z-index:1003;"><img style="width:32px; height:32px;" id="remove_model" src="/images/remove.png"></span>';
     } else {
         delete_model ='<a class="add_model_to_selection" ><img alt="" src="/images/add_to_selection_cms.png" style="width:42px; height:42px;"></a>';
     }

     if (json.data[key]['nieuw_actief'] == '0') {
         inactive = 'inactive';
     } else {
         inactive = '';
     }

    var element = '<div data-modelid="'+json.data[key]['model_id']+'" class=" ' + inactive + ' model size-'+view_type+' show-caption-'+caption_type+'">'+delete_model+'<img alt="" src="'+image+'"><div class="caption-1"><div class="code">'+json.data[key]['model_id']+'</div><div class="name">'+json.data[key]['naam']+'<br>'+json.data[key]['voornaam']+'</div><div class="clear"></div></div><div class="caption-2"><div class="basic-data"><div class="code">'+json.data[key]['model_id']+'</div><div class="name">'+json.data[key]['naam']+'<br>'+json.data[key]['voornaam']+'</div></div><div class="left"></div><div class="right"></div><div class="features"><div class="left-feature">Lengte</div><div class="right-feature">1m77 cm&nbsp;</div></div><div class="features"><div class="left-feature">Gewicht</div><div class="right-feature">'+json.data[key]['gewicht']+'kg&nbsp;</div></div><div class="features"><div class="left-feature">Borst</div><div class="right-feature">'+json.data[key]['maten_borst']+'&nbsp;</div></div><div class="features"><div class="left-feature">Taille</div><div class="right-feature">'+json.data[key]['maten_taille']+'&nbsp;</div></div><div class="features"><div class="left-feature">Heupen</div><div class="right-feature">'+json.data[key]['maten_heupen']+'&nbsp;</div></div><div class="features"><div class="left-feature">Cup</div><div class="right-feature">'+json.data[key]['maten_cup']+'&nbsp;</div></div><div class="features"><div class="left-feature">Kleding</div><div class="right-feature">'+json.data[key]['maten_kleding']+'&nbsp;</div></div><div class="features"><div class="left-feature">Jeans</div><div class="right-feature">'+json.data[key]['maten_jeans']+'&nbsp;</div></div><div class="features"><div class="left-feature">Schoen</div><div class="right-feature">'+json.data[key]['maten_schoenen']+'&nbsp;</div></div><div class="features"><div class="left-feature">Leeftijd</div><div class="right-feature">'+json.data[key]['geboortedatum']+'&nbsp;</div></div></div></div>';

     if (!$('div[data-modelid='+json.data[key]['model_id']+']').length) {
         $('#models-view-normal').append($(element));
     }

     var email = json.data[key]['email'];
     var table_element='<tr id="model_'+json.data[key]['model_id']+'"><td style="width: 200px;"><span class="icon-edit icon"></span><a href="/cms/models/models/aanpassen/?id='+json.data[key]['model_id']+'">'+json.data[key]['voornaam']+' '+json.data[key]['naam']+'</a></td><td style="width: 300px;">'+ email +'</td><td style="width: 100px;"><span class="icon-eye icon"></span><a data-function="preview('+json.data[key]['model_id']+', 1)" data-id="models-preview" class="popup" href="#">View</a></td><td style="width: 100px;"><span class="icon-envelope icon"></span><a data-function="messages('+json.data[key]['model_id']+')" data-id="models-message" class="popup" href="#">Message</a></td>';

      if(json.data[key]['declined']=='0'){
        table_element+='<td style="width: 100px;"><span class="icon-download icon"></span><a href="javascript:changeModel('+json.data[key]['model_id']+', 0)">Archive</a></td></tr>';
      }else{
         table_element+='<td style="width: 100px;"><span class="icon-download icon"></span><a href="javascript:changeModel('+json.data[key]['model_id']+', 1)">Accept</a></td></tr>';
      }

    $('#cms-subscriptions').append($(table_element));
 }
             
}

$(document).ready(function() {

  setFilters();
  rewriteUrlWithFilters();
  var check=$("input[name='zoeken_lijst']").val();

  if (check === undefined) {
  
  } else {
   getModelsByAjax(0,20);
  }

  setInterval(loadMore, 500);

  $('body').on('click', '#delete_model_from_selection', function(e) {
    e.stopPropagation();
    var selection_id = $('#selection').val();
    var model_id = $(this).parent().attr('data-modelid');
    deleteModelFromSelection(selection_id, model_id);
  });


  $("#begin_load_button").click(function() {
    resetResults(true);
    rewriteUrlWithFilters();
  });

  $("select[name='selection_select']").change(function() {
    var selection_id=$(this).val();

    if (selection_id) {
          $("#button_selection_wrap").css('display','inline-block');
          $(".selection_wrap a").attr('href',"/nl/selection?selection=" + selection_id);
          $("select[name='selection_select']").attr('id','');
           $(this).attr('id','selection');
    } else {
         $("#button_selection_wrap").hide();
    }

        rewriteUrlWithFilters();
        resetResults();
    });


    $(".mail_to_selection").click(function(){
      $("input[name='send_message_id']").attr('value',$('#selection').val());
      $("#models-message-group").show();
      $("#popup-bg").show();
    });


}); 

// 

    $("body").on("click", "#add_selection_button", function() {
        new Promise(function(resolve, reject) {
            resolve(get_clients());
        }).then(function() {
            $("#save_selection_modal").show();
        });
    });
    $("body").on("click", ".add_model_to_selection", function() {
        new Promise(function(resolve, reject) {
            resolve(get_clients());
        }).then(function() {
            $("#save-single-selection").show();
        });
    });
    $("body").on("click", ".modal-content .close", function() {
        $(this).parent().parent().hide();
    });

    $("body").on("click", "[data-client]", function() {
        $("#project_id").val("");
        $("#client_id").val($(this).attr("data-client")).trigger("change");
        $("#single_client_id").val($(this).attr("data-client"));
    });

    // $("body").on("click", "[data-single-client]", function() {
    //     $("#single_project_id").val("");
    //     $("#single_client_id").val($(this).attr("data-single-client")).trigger("change");
    // });

    $("body").on("change", "#single_client", function() {
        $("#single_project_id").val("").trigger("change");
        $("#single_client_id").val($(this).attr("data-single-client")).trigger("change");
    });

    $("body").on("click", "[data-project]", function() {
        $("#project_id").val($(this).attr("data-project")).trigger("change");
    });

    $("body").on("click", "[data-single-project]", function() {
        $("#single_project_id").val($(this).attr("data-single-project")).trigger("change");
    });

    $("body").on("click", "[data-selection]", function() {
        $("#selection_id").val($(this).attr("data-selection")).trigger("change");
    });

    $("body").on("click", "[data-single-selection]", function() {
        $("#single_selection_id").val($(this).attr("data-single-selection")).trigger("change");
    });

    $("body").on("change", "#client_id", function() {
        get_projects("#client_id");
    });

    $("body").on("change", "#single_client_id", function() {
        get_projects("#single_client_id");
    });

    $("body").on("change", "#project_id", function() {
        get_selections("#project_id", "#client_id");
    });

    $("body").on("change", "#single_project_id", function() {
        get_selections("#single_project_id", "#single_client_id");
    });

    function get_clients() {
        // client_options
        var loading = $("#infscr-loading");
        var no_data = $("#no-infscr-loading");
        if($("#single_client_id").val() == "") {
            return $.ajax({
                url: "/cms/clients/clients/clients_ajax",
                beforeSend: function() {
                    loading.show();
                    no_data.hide();
                    reset_client();
                },
                success: function(res) {
                    var rows = "";
                    var single_rows = "";
                    var data = JSON.parse(res);
                    $.each(data, function(key, value) {
                        // rows += `<div data-client="${ value.id }" class="cms-select-optional">${ value.company_name }</div>`;
                        rows += `<option value="${ value.id }">${ value.company_name }</option>`;
                        // single_rows += `<div data-single-client="${ value.id }" class="cms-select-optional">${ value.company_name }</div>`;
                        single_rows += `<option value="${ value.id }">${ value.company_name }</option>`;
                        
                    });
                    // $("#client_options").html(rows);
                    $("#client_id").html(rows);
                    // $("#single_client_options").html(single_rows);
                    $("#single_client_id").html(single_rows);

                    initSelect2("#client_id", "#cms-select-client");
                    initSelect2("#single_client_id", "#cms-select-single-client");

                },
                complete: function() {
                    loading.hide();
                    reset_project();
                    reset_selection();
                    check_input_fields();
                }
            });
        }
        return true;
    }

    function get_projects(client_element = "#client_id") {
        // project_options
        var loading = $("#infscr-loading");
        var no_data = $("#no-infscr-loading");
        if($("#single_project_id").val() == "") {
            return $.ajax({
                url: "/cms/projects/projects/projects_ajax",
                data: {
                    client_id: $(client_element).val()
                },
                beforeSend: function() {
                    loading.show();
                    no_data.hide();
                    reset_project();
                },
                success: function(res) {
                    var rows = "";
                    var single_rows = "";
                    var data = JSON.parse(res);
                    $.each(data, function(key, value) {
                        rows += `<div data-project="${ value.id }" class="cms-select-optional">${ value.title }</div>`;
                        single_rows += `<div data-single-project="${ value.id }" class="cms-select-optional">${ value.title }</div>`;
                    });
                    $("#project_options").html(rows);
                    $("#single_project_options").html(single_rows);
                },
                complete: function() {
                    loading.hide();
                    reset_selection();
                    check_input_fields();
                }
            });
        }
        return true;
    }

    function get_selections($project = "#project_id", $client = "#client_id") {
        // selection_options
        var loading = $("#infscr-loading");
        var no_data = $("#no-infscr-loading");
        var single_project_id = $("#single_project_id").val();
        return $.ajax({
            url: "/cms/models/models/selection_ajax",
            data: {
                project_id: $($project).val(),
                client_id: $($client).val()
            },
            beforeSend: function() {
                loading.show();
                no_data.hide();
                reset_selection();
            },
            success: function(res) {
                var rows = "";
                var single_rows = "";
                var data = JSON.parse(res);
                $.each(data, function(key, value) {
                    rows += `<div data-selection="${ value.id }" class="cms-select-optional">${ value.name }</div>`;
                    single_rows += `<div data-single-selection="${ value.id }" class="cms-select-optional">${ value.name }</div>`;
                });
                $("#selection_options").html(rows);
                $("#single_selection_options").html(single_rows);
            },
            complete: function() {
                loading.hide();
                check_input_fields();
            }
        });
    }

    function reset_client() {
        $("#client_options").html("");
        $("#client_id").val("");
        $("#client").val("");

        $("#single_client_options").html("");
        $("#single_client_id").val("");
        $("#single_client").val("");
    }
    function reset_project() {
        $("#project_options").html("");
        $("#project_id").val("");
        $("#project").val("");

        $("#single_project_options").html("");
        $("#single_project_id").val("");
        $("#single_project").val("");
    }
    function reset_selection() {
        $("#selection_options").html("");
        $("#selection_id").val("");
        $("#selection").val("");

        $("#single_selection_options").html("");
        $("#single_selection_id").val("");
        $("#single_selection").val("");
    }
    //
</script>
{/literal}
{if isset($smarty.get.search)}
<h1>Zoeken: {$smarty.get.search}</h1>
{else}
<h1>Modellenbestand</h1>
{/if}


{if isset($is_selection) && $is_selection == 1}
 <div class="selection_block">
     <div class="selection-wrapper">
         <h2 class="selection_group_header">EIGEN SELECTIES</h2>
         <div class="selection_content">
             <section class="cast_team_cont_sel" id="selections">
                 {foreach from=$selecties item=selection}
                 <div class="sel_row" data-id="{$selection['id']}" >
                    <div class="fr_sel eigen-selection"><a href="/cms/models/models/selecties?selection={$selection['code']}">{$selection['creation_date']} - {$selection['name']}</a></div>
                    <a href="#selections" class="for_sel"><i class="fa fa-close"></i> </a>
                </div>
                 {/foreach}
             </section>
         </div>
     </div>
     <div class="selection-wrapper">
         <h2 class="selection_group_header">KLANT SELECTIES</h2>
         <div class="selection_content">
             <section class="cast_team_cont_sel" id="selections">
                 {foreach from=$user_selecties item=selection}
                 <div class="sel_row" data-id="{$selection['id']}" >
                     <div class="fr_sel klant-selection"><a href="/cms/models/models/selecties?selection={$selection['code']}">{$selection['creation_date']} - {$selection['name']}</a></div>
                     <div class="sec_sel"> {$selection['user']['name']}</div>
                     <a href="#selections" class="for_sel"><i class="fa fa-close"></i> </a>
                 </div>
                 {/foreach}
             </section>
         </div>
     </div>
</div>
<div class="selections_block" style="display: none;">
    <div class="selection_wrap">
        <label class="label">
            <input id="selection" data-code="{$currentSelection['code']}" data-id="{$currentSelection['id']}" value="{$currentSelection['id']}">
        </label>
    </div>
</div>
{else}
<div class="lijn gn-margin" style="margin-bottom: 50px;"></div>
{/if}

{if !isset($smarty.get.search) && !isset($is_selection)}
<div id="filter">
    <div class="left">
    <ul id='sex'>
      <li>
        <label>
          <input type="checkbox" name='sex' value='M'>
          <span class="lbl padding-8">Mannen</span> 
        </label>
      </li>
      <li>
        <label>
          <input type="checkbox" name='sex' value='V'>
            <span class="lbl padding-8">Vrouwen</span> 
        </label>
      </li>
    </ul>
    </div>
    
    <div class="right">
        <div id="model-groepen">
            {foreach from=$groepen item=group key=groupId}
                <div data-id="{$groupId}" class="root-group">
                    <p class="root-group-title">{$group.name}</p>
                    <div class="root-groups">
                        {foreach from=$group.child_group item=r key=id}
                            <div class="model-tabs-checkbox" data-id="{$id}">
                                <input  type="checkbox" name="specific"  value="{$id}">
                                <span id="groep_naam_{$id}">{$r.naam}</span>
                                <input type="text" class="text niet-verplicht created" name="groep_naam_{$id}" value="{$r.naam}" />
                            </div>
                        {/foreach}
                    </div>
                </div>
            {/foreach}
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <h4 class="filter_header">Filters</h4>
        <div id="filters">
            <!-- Native language -->
            <div class="filter" id="filter_language">
                <a href="#" class="close"><span class="icon-cross icon"></span></a>
                <div class="filter_data">
                    <strong>Language</strong>
                    <div class='m-collapse' id='content-22'>
                        <span class="custom_filter">
                            <span class="custom_filter_sub">
                                <label>
                                    <input  type="checkbox" name="native_language_filter" value="nl">
                                    <span class="lbl padding-8">Nederlands</span>
                                </label>
                            </span>
                            <span class="custom_filter_sub">
                                <label>
                                    <input  type="checkbox" name="native_language_filter" value="fr">
                                    <span class="lbl padding-8">Français</span>
                                </label>
                            </span>
                            <span class="custom_filter_sub">
                                <label>
                                    <input  type="checkbox" name="native_language_filter" value="en">
                                    <span class="lbl padding-8">English</span>
                                </label>
                            </span>
                            <span class="custom_filter_sub">
                                <label>
                                    <input  type="checkbox" name="native_language_filter" value="de">
                                    <span class="lbl padding-8">Deutsch</span>
                                </label>
                            </span>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Reference number -->
            <div class="filter input-filter" id="filter_reference_id">
                <a href="#" class="close"><span class="icon-cross icon"></span></a>
                <div class="filter_data">
                    <strong><label for="id_start">Reference Id</label></strong> tussen
                    <input id="id_start" name="id_start" type="number" value="{$filter['id_start']}"/>
                    en
                    <input id="id_end" name="id_end" type="number" value="{$filter['id_end']}"/>
                </div>
            </div>

            <!-- Country -->
            <div class="filter" id="filter_country">
                <a href="#" class="close"><span class="icon-cross icon"></span></a>
                <div class="filter_data">
                    <strong><label for="filter-country-select">Country</label></strong>
                    <div class='m-collapse' id='content-17' style="display: {if $filters['skin_filter']['active'] eq true} block{else}none{/if};">
                        <span class="custom_filter">
                            <label class="label" style="width: 200px;">
                                <select id="filter-country-select" name="country" class="filter">
                                    <option value="">Kies</option>
                                    {foreach from=$countries item=country key=id}
                                        <option value="{$country.id}">{$country.country_name}</option>
                                    {/foreach}
                                </select>
                            </label>
                        </span>
                    </div>
                </div>
            </div>

             <!-- Huidskleur -->
            <div class="filter" id="filter_huidskleur">
                <a href="#" class="close"><span class="icon-cross icon"></span></a>
                <div class="filter_data">
                    <strong>Huidskleur</strong><div class='m-collapse' id='content-9' style="display: {if $filters['skin_filter']['active'] eq true} block{else}none{/if};"><span class="custom_filter">
                    {foreach from=$skin_filter item=filter}
                    <span class="custom_filter_sub">
                        <label><input  type="checkbox" name="skin_filter"  value="{$filter['category_id']}"> <span class="lbl padding-8">{$filter['name']|replace:'#':''}</span></label></span>
                    {/foreach}
                </span>
                </div>
                </div>
            </div>

              <!-- Huidskleur -->
            <div class="filter" id="filter_spreektaal">
              <a href="#" class="close"><span class="icon-cross icon"></span></a>
              <div class="filter_data">
                <strong>Spreektaal</strong>
                <div class='m-collapse' id='content-8' style="display: {if $filters['language_filter']['active'] eq true} block{else}none{/if};">
                  <span class="custom_filter"> 
                  {foreach from=$language_filter item=filter}
                    <span class="custom_filter_sub">
                      <label>
                        <input  type="checkbox" name="language_filter"  value="{$filter['category_id']}"> 
                        <span class="lbl padding-8">{$filter['name']|replace:'#':''}</span>
                      </label>
                    </span>
                  {/foreach} 
                  </span>
                </div>
              </div>
            </div>

              <!-- Haarlengte -->
            <div class="filter" id="filter_haarlengte">
                <a href="#" class="close"><span class="icon-cross icon"></span></a>
                <div class="filter_data">
                    <strong>Haarlengte</strong>
              <div class='m-collapse' id='content-11' style="display: {if $filters['hair_length_filter']['active'] eq true} block{else}none{/if};"><span class="custom_filter"> 
              {foreach from=$hair_length_filter item=filter}
                   <span class="custom_filter_sub">
               <label><input  type="checkbox" name="hair_length_filter"  value="{$filter['category_id']}"> <span class="lbl padding-8">{$filter['name']|replace:'#':''}</span></label></span>
              {/foreach} 
                </span>
              </div>
                </div>
            </div>

              <!-- Haarstijl -->
            <div class="filter" id="filter_haarstijl">
                <a href="#" class="close"><span class="icon-cross icon"></span></a>
                <div class="filter_data">
                    <strong>Haarstijl</strong>
                    <div class='m-collapse' id='content-12' style="display:{if $filters['hair_filter']['active'] eq true} block{else}none{/if};"  ><span class="custom_filter">
                        {foreach from=$hair_filter item=filter}
                        <span class="custom_filter_sub">
                            <label>
                                <input  type="checkbox" name="hair_filter"  value="{$filter['category_id']}"> <span class="lbl padding-8">{$filter['name']|replace:'#':''}</span>
                            </label>
                        </span>
                        {/foreach}
                    </span>
                    </div>
                </div>
            </div>

            <!-- HAARKLEUR -->
            <div class="filter" id="filter_haarkleur">
                <a href="#" class="close"><span class="icon-cross icon"></span></a>
                <div class="filter_data">
                    <strong>Haarkleur</strong><div class='m-collapse' id='content-10' ><span class="custom_filter"> 
              {foreach from=$hair_color_filter item=filter}
                <span class="custom_filter_sub">
               <label><input  type="checkbox" name="hair_color_filter"  value="{$filter['category_id']}"> <span class="lbl padding-8">{$filter['name']|replace:'#':''|replace:'Haar':''}</span></label></span>
              {/foreach} 
                </span>
              </div>
                </div>
            </div>
            
             <!-- Begroeiing -->
            <div class="filter" id="filter_begroeiing">
              <a href="#" class="close"><span class="icon-cross icon"></span></a>
              <div class="filter_data">
                <strong>Begroeiing</strong>
                <div class='m-collapse'>
                  <span class="custom_filter"> 
                    {foreach from=$begroeiing_filter item=filter}
                    <span class="custom_filter_sub">
                      <label>
                        <input  type="checkbox" name="begroeiing_filter"  value="{$filter['category_id']}">
                        <span class="lbl padding-8">{$filter['name']|replace:'#':''|replace:'begroeing':''}</span>
                      </label>
                    </span>
                    {/foreach} 
                  </span>
                </div>
              </div>
            </div>

            <!-- Versiering -->
            <div class="filter" id="filter_versiering">
              <a href="#" class="close"><span class="icon-cross icon"></span></a>
              <div class="filter_data">
                <strong>Versiering</strong>
                <div class='m-collapse'>
                  <span class="custom_filter"> 
                    {foreach from=$versiering_filter item=filter}
                    <span class="custom_filter_sub">
                      <label>
                        <input  type="checkbox" name="versiering_filter"  value="{$filter['category_id']}">
                        <span class="lbl padding-8">{$filter['name']|replace:'#':''|replace:'versiering':''}</span>
                      </label>
                    </span>
                    {/foreach} 
                  </span>
                </div>
              </div>
            </div>

            <!-- Kleur ogen -->
            <div class="filter" id="filter_kleur_ogen">
              <a href="#" class="close"><span class="icon-cross icon"></span></a>
              <div class="filter_data">
                <strong>Kleur ogen</strong>
                <div class='m-collapse'>
                  <span class="custom_filter"> 
                    {foreach from=$kleur_ogen_filter item=filter}
                    <span class="custom_filter_sub">
                      <label>
                        <input  type="checkbox" name="kleur_ogen_filter"  value="{$filter['category_id']}">
                        <span class="lbl padding-8">{$filter['name']|replace:'#':''|replace:'Ogen':''}</span>
                      </label>
                    </span>
                    {/foreach} 
                  </span>
                </div>
              </div>
            </div>

            <!-- Lichaam -->
            <div class="filter" id="filter_lichaam">
              <a href="#" class="close"><span class="icon-cross icon"></span></a>
              <div class="filter_data">
                <strong>Lichaam</strong>
                <div class='m-collapse'>
                  <span class="custom_filter"> 
                    {foreach from=$lichaam_filter item=filter}
                    <span class="custom_filter_sub">
                      <label>
                        <input  type="checkbox" name="lichaam_filter"  value="{$filter['category_id']}">
                        <span class="lbl padding-8">{$filter['name']|replace:'#':''|replace:'lichaam':''}</span>
                      </label>
                    </span>
                    {/foreach} 
                  </span>
                </div>
              </div>
            </div>

            <!-- LEEFTIJD -->
            <div class="filter" id="filter_leeftijd">
                <a href="#" class="close"><span class="icon-cross icon"></span></a>
                <div class="filter_data">
                    <strong>Leeftijd</strong> tussen 
                     <label class="label">
                    <select id="select_filter" name="leeftijd_start" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {for $foo=0 to 120}
                        <option value="{$foo}">{$foo}</option>
                        {/for}
                    </select> 
                    </label>
                    en 
                     <label class="label">
                    <select id="select_filter" name="leeftijd_end" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {for $foo=0 to 120}
                        <option value="{$foo}">{$foo}</option>
                        {/for}
                    </select>
                    </label>
                </div>
            </div>
            
            <!-- LENGTE -->
            <div class="filter" id="filter_lengte">
                <a href="#" class="close"><span class="icon-cross icon"></span></a>
                <div class="filter_data">
                    <strong>Lengte</strong> tussen 
                     <label class="label">
                    <select id="select_filter" name="lengte_start" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {section name=centimer start=60 loop=250} 
                            <option value="{$smarty.section.centimer.index}">{$smarty.section.centimer.index}cm</option>
                        {/section}
                    </select> 
                    </label>
                    en 
                     <label class="label">
                    <select id="select_filter" name="lengte_end" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {section name=centimer start=60 loop=250} 
                            <option value="{$smarty.section.centimer.index}">{$smarty.section.centimer.index}cm</option>
                        {/section}
                    </select>
                    </label>
                </div>
            </div> 
            
            <!-- GEWICHT -->
            <div class="filter" id="filter_gewicht">
                <a href="#" class="close"><span class="icon-cross icon"></span></a>
                <div class="filter_data">
                    <strong>Gewicht</strong> tussen 
                     <label class="label">
                    <select id="select_filter" name="gewicht_start" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {section name=kg start=1 loop=200} 
                            <option value="{$smarty.section.kg.index}">{$smarty.section.kg.index}kg</option>
                        {/section} 
                    </select> 
                    </label>
                    en 
                     <label class="label">
                    <select id="select_filter" name="gewicht_end" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {section name=kg start=1 loop=200} 
                            <option value="{$smarty.section.kg.index}">{$smarty.section.kg.index}kg</option>
                        {/section} 
                    </select>
                    </label>
                </div>
            </div>  
            
            <!-- SCHOENMAAT -->
            <div class="filter" id="filter_schoenmaat">
                <a href="#" class="close"><span class="icon-cross icon"></span></a>
                <div class="filter_data">
                    <strong>Schoenmaat</strong> tussen 
                     <label class="label">
                    <select id="select_filter" name="schoenmaat_start" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {section name=centimer start=5 loop=51} 
                            <option value="{$smarty.section.centimer.index}">{$smarty.section.centimer.index}</option>
                        {/section}  
                    </select> 
                    </label>
                    en 
                     <label class="label">
                    <select id="select_filter" name="schoenmaat_end" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {section name=centimer start=5 loop=51} 
                            <option value="{$smarty.section.centimer.index}">{$smarty.section.centimer.index}</option>
                        {/section}  
                    </select>
                    </label>
                </div>
            </div>
            
            <!-- BORST -->
            <div class="filter" id="filter_borst">
                <a href="#" class="close"><span class="icon-cross icon"></span></a>            
                <div class="filter_data">
                    <strong>Borstomtrek</strong> tussen 
                     <label class="label">
                    <select id="select_filter" name="borst_start" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {section name=centimer start=50 loop=121} 
                            <option value="{$smarty.section.centimer.index}">{$smarty.section.centimer.index}cm</option>
                        {/section}  
                    </select> 
                    </label>
                    en 
                     <label class="label">
                    <select id="select_filter" name="borst_end" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {section name=centimer start=50 loop=121} 
                            <option value="{$smarty.section.centimer.index}">{$smarty.section.centimer.index}cm</option>
                        {/section}    
                    </select>
                    </label>
                </div>
            </div> 
            
            <!-- TAILLE -->
            <div class="filter" id="filter_taille">
                <a href="#" class="close"><span class="icon-cross icon"></span></a>
                <div class="filter_data">
                    <strong>Taille</strong> tussen 
                     <label class="label">
                    <select id="select_filter" name="taille_start" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {section name=centimer start=40 loop=131} 
                            <option value="{$smarty.section.centimer.index}">{$smarty.section.centimer.index}cm</option>
                        {/section}  
                    </select> 
                    </label>
                    en 
                    <label class="label">
                    <select id="select_filter" name="taille_end" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {section name=centimer start=40 loop=131} 
                            <option value="{$smarty.section.centimer.index}">{$smarty.section.centimer.index}cm</option>
                        {/section}    
                    </select>
                    </label>
                </div>
            </div>   
            
            <!-- HEUPEN -->
            <div class="filter" id="filter_heupen">
                <a href="#" class="close"><span class="icon-cross icon"></span></a>
                <div class="filter_data">
                    <strong>Heupen</strong> tussen 
                     <label class="label">
                    <select id="select_filter" name="heupen_start" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {section name=centimer start=50 loop=131} 
                            <option value="{$smarty.section.centimer.index}">{$smarty.section.centimer.index}cm</option>
                        {/section}   
                    </select> 
                    </label>
                    en 
                     <label class="label">
                    <select id="select_filter" name="heupen_end" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {section name=centimer start=50 loop=131} 
                            <option value="{$smarty.section.centimer.index}">{$smarty.section.centimer.index}cm</option>
                        {/section}     
                    </select>
                    </label>
                </div>
            </div>
            
            <!-- CUP -->
            <div class="filter" id="filter_cup">
                <a href="#" class="close"><span class="icon-cross icon"></span></a>
                <div class="filter_data">
                    <strong>Cup</strong> tussen 
                     <label class="label">
                    <select id="select_filter" name="cup_start" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        <option value="AA">AA</option>                
                        <option value="A">A</option>                
                        <option value="B">B</option>                
                        <option value="C">C</option>                
                        <option value="D">D</option>                
                        <option value="DD">DD</option>                
                        <option value="E">E</option>                
                        <option value="F">F</option>                
                        <option value="G">G</option>    
                    </select> 
                    </label>
                    en 
                     <label class="label">
                    <select id="select_filter" name="cup_end" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        <option value="AA">AA</option>                
                        <option value="A">A</option>                
                        <option value="B">B</option>                
                        <option value="C">C</option>                
                        <option value="D">D</option>                
                        <option value="DD">DD</option>                
                        <option value="E">E</option>                
                        <option value="F">F</option>                
                        <option value="G">G</option>    
                    </select>
                     </label>
                </div>
            </div>

            <div class="filter" id="filter_cup_number">
                <a href="#" class="close"><span class="icon-cross icon"></span></a>
                <div class="filter_data">
                    <strong>Cup number</strong> tussen
                    <label class="label">
                        <select id="select_filter" name="cup_number_start" class="filter" style="width: 80px; float: none; display: inline-block;">
                            <option value="">Kies</option>
                            {section name=centimer step=5 start=60 loop=131}
                                <option value="{$smarty.section.centimer.index}">{$smarty.section.centimer.index}</option>
                            {/section}
                        </select>
                    </label>
                    en
                    <label class="label">
                        <select id="select_filter" name="cup_number_end" class="filter" style="width: 80px; float: none; display: inline-block;">
                            <option value="">Kies</option>
                            {section name=centimer step=5 start=60 loop=131}
                                <option value="{$smarty.section.centimer.index}">{$smarty.section.centimer.index}</option>
                            {/section}
                        </select>
                    </label>
                </div>
            </div>
            
            <!-- KLEDING -->
            <div class="filter" id="filter_kleding">
                <a href="#" class="close"><span class="icon-cross icon"></span></a>
                <div class="filter_data">
                    <strong>Kledingmaat</strong> tussen 
                     <label class="label">
                    <select id="select_filter" name="kleding_start" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {section name=centimer step=2 start=30 loop=61}
                            <option value="{$smarty.section.centimer.index}">{$smarty.section.centimer.index}</option>
                        {/section}   
                    </select> 
                    </label>
                    en 
                     <label class="label">
                    <select id="select_filter" name="kleding_end" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {section name=centimer step=2 start=38 loop=71} 
                            <option value="{$smarty.section.centimer.index}">{$smarty.section.centimer.index}</option>
                        {/section}    
                    </select>
                    </label>
                </div>
            </div>  
            
            <!-- KOSTUUM -->
            <div class="filter" id="filter_kostuum">
                <a href="#" class="close"><span class="icon-cross icon"></span></a>            
                <div class="filter_data">
                    <strong>Kostuummaat</strong> tussen
                     <label class="label"> 
                    <select id="select_filter" name="kostuum_start" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {section name=centimer step=2 start=30 loop=61} 
                            <option value="{$smarty.section.centimer.index}">{$smarty.section.centimer.index}</option>
                        {/section}   
                    </select> 
                    </label>
                    en 
                     <label class="label">
                    <select id="select_filter" name="kostuum_end" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {section name=centimer step=2 start=30 loop=61} 
                            <option value="{$smarty.section.centimer.index}">{$smarty.section.centimer.index}</option>
                        {/section}    
                    </select>
                    </label>
                </div>
            </div> 

            <!-- INT MAAT -->
            <div class="filter" id="filter_int_maat">
              <a href="#" class="close"><span class="icon-cross icon"></span></a>            
              <div class="filter_data">
                <strong>Int. maat</strong> 
                <label class="label"> 
                  <select id="select_filter" name="int_maat" class="filter" style="width: 80px; float: none; display: inline-block;">
                    <option value="">Kies</option>
                    <option value="XXS">XSS</option>
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                    <option value="3XL">3XL</option>
                    <option value="4XL">4XL</option>
                    <option value="5XL">5XL</option>
                  </select> 
                </label>
              </div>
            </div> 
            
            <!-- JEANS -->
            <div class="filter" id="filter_jeans">
                <a href="#" class="close"><span class="icon-cross icon"></span></a>
                <div class="filter_data">
                    <strong>Jeansmaat</strong> tussen
                     <label class="label"> 
                    <select id="select_filter" name="jeans_start" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {section name=centimer step=2 start=22 loop=43} 
                            <option value="{$smarty.section.centimer.index}">{$smarty.section.centimer.index}</option>
                        {/section}    
                    </select>
                    </label> 
                    en 
                    <label class="label">
                    <select id="select_filter" name="jeans_end" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {section name=centimer step=2 start=22 loop=43} 
                            <option value="{$smarty.section.centimer.index}">{$smarty.section.centimer.index}</option>
                        {/section}  
                    </select>
                    </label>
                </div>
            </div>
            
            <!-- KINDERMAAT -->
            <div class="filter" id="filter_kinder">
                <a href="#" class="close"><span class="icon-cross icon"></span></a>
                <div class="filter_data">
                    <strong>Kindermaat</strong> tussen 
                    <label class="label">
                    <select id="select_filter" name="kinder_start" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {section name=centimer step=6 start=50 loop=189} 
                            <option value="{$smarty.section.centimer.index}">{$smarty.section.centimer.index}</option>
                        {/section}     
                    </select> 
                    </label>
                    en 
                    <label class="label">
                    <select id="select_filter" name="kinder_end" class="filter" style="width: 80px; float: none; display: inline-block;">
                        <option value="">Kies</option>
                        {section name=centimer step=6 start=50 loop=189} 
                            <option value="{$smarty.section.centimer.index}">{$smarty.section.centimer.index}</option>
                        {/section}
                    </select>
                    </label>
                </div>
            </div>                                                                                                                            

            <label class="label">
                <select class="filter" name='addfilter' >
                    <option value="ADD">Voeg een filter toe</option>
                    <option value="huidskleur">Huidskleur</option>
                    <option value="spreektaal">Spreektaal</option>
                    <option value="haarlengte">Haarlengte</option>
                    <option value="haarstijl">Haarstijl</option>
                    <option value="haarkleur">Haarkleur</option>
                    <option value="leeftijd">Leeftijd</option>
                    <option value="lengte">Lengte</option>
                    <option value="gewicht">Gewicht</option>
                    <option value="schoenmaat">Schoenmaat</option>
                    <option value="borst">Borstomtrek</option>
                    <option value="taille">Taille</option>
                    <option value="heupen">Heupen</option>
                    <option value="cup">Cup</option>
                    <option value="cup_number">Cup number</option>
                    <option value="kleding">Kledingmaat</option>
                    <option value="kostuum">Kostuummaat</option>
                    <option value="int_maat">Int. Maat</option>
                    <option value="jeans">Jeansmaat</option>
                    <option value="kinder">Kindermaat</option>
                    <option value="begroeiing">Begroeiing</option>
                    <option value="versiering">Versiering</option>
                    <option value="kleur_ogen">Kleur ogen</option>
                    <option value="lichaam">Lichaam</option>
                    <option value="country">Country</option>
                    <option value="reference_id">Reference Id</option>
                    <option value="language">Language</option>
                </select>
            </label>
            <div class="clear"></div>
            <label class="search_label">
                <input type="text" id="talent_search" value="" placeholder="ZOEK ERVARING OF TALENT" name="talent_search" style="width:200px;">
            </label>
            <div class="clear"></div>
        </div>
        <div class="field_wrap_inp">
            <button id="begin_load_button" class="button new " >Bekijk</button>
            <button id="add_selection_button" class="popup button new " data-function="add_selection()" data-id="save-selection">Bewaar selectie</button>
            <button id="show_map" class="popup button new " onclick="showOnMap()">Toon op kaart</button>
        </div>
    </div>
<div class="lijn gn-margin" style="margin-bottom: 50px; margin-top:30px;"></div>
{/if}

<div id="views">
    {if !isset($is_selection) && $is_selection != 1}
    <div class="clear"></div>
    <div>
        <span id="result_count" class="sort_title" style="float:left; font-size:18px;"></span>
    </div>
    {else}
    <div class="buttons_block">
        <div id="button_selection_wrap" class="selection_wrap">
            <a href="/nl/selection?selection={$currentSelection['code']}"><button class="button new ">Toon op frontend</button></a>
        </div>
        <div id="button_selection_wrap" class="selection_wrap message_to_selections" >
            <a class="mail_to_selection" href="#">
                <button class="button new ">Message</button>
            </a>
        </div>
        <div id="button_selection_wrap" class="selection_wrap message_to_selections" >
            <a href="#">
                <button onclick="showOnMap()" class="button new ">Toon op kaart</button>
            </a>
        </div>
        <div id="button_selection_wrap" class="selection_wrap message_to_selections">
            <a href="#">
                <button class="button new" onclick="showAddToSelectionDialog()">Voeg ID’s toe</button>
            </a>
        </div>
    </div>
    {/if}

    <div id="caption">
        <span>Caption:</span>
        <a href="javascript:model_caption(0)" id="button_caption_0" data-function="model_caption(0)"><img src="/images/cms/caption_0.png" alt="" /></a>
        <a href="javascript:model_caption(1)" id="button_caption_1" data-function="model_caption(1)" class="active"><img src="/images/cms/caption_1.png" alt="" /></a>
        <a href="javascript:model_caption(2)" id="button_caption_2" data-function="model_caption(2)"><img src="/images/cms/caption_2.png" alt="" /></a>
        <div class="clear"></div>
    </div>
    
    <div id="view">
        <span>View:</span>
        <a href="javascript:model_view(0)" id="button_view_0" data-function="model_view(0)"><img src="/images/cms/view_0.png" alt="" /></a>
        <a href="javascript:model_view(1)" id="button_view_1" data-function="model_view(1)"><img src="/images/cms/view_1.png" alt="" /></a>
        <a href="javascript:model_view(2)" id="button_view_2" data-function="model_view(2)"><img src="/images/cms/view_2.png" alt="" /></a>
        <a href="javascript:model_view(3)" id="button_view_3" data-function="model_view(3)" class="active"><img src="/images/cms/view_3.png" alt="" /></a>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
{if isset($is_selection)}
<div class="result-count-block">
    <span id="result_count" class="sort_title" style="float:left; font-size:18px;"></span>
</div>
{/if}

 {if !isset($is_selection) && $is_selection != 1}<div class="clear"></div>

{* <div class="cms-popup-bg" id="save-selection">
    <div class="cms-popup selection">
        <a href="#" class="close"><span class="icon-cross icon"></span></a>
        <h3>Bewaar deze selectie</h3>
        <p class="intro">Voeg deze nieuwe selectie toe aan een bestaande selectie</p>
        
        <form method="post" action="/ajax/add_selection_group" class="ajax">
            <input type="hidden" name="selection_models" />
            
            <p><select name="selection" class="custom-select-new">
            {foreach from=$selecties item=name key=id}
                <option value="{$id}">{$name}</option>
            {/foreach}
            </select></p>
                
            <p style="clear: both;"><br /><input type="submit" class="button new" value="Bijvoegen" /></p>
        </form>    
        
        <div class="lijn gn-margin"></div>

        <p class="intro">Voeg deze nieuwe selectie toe aan een bestaande klant selectie</p>
        
        <form method="post" action="/ajax/add_selection_group" class="ajax">
            <input type="hidden" name="selection_models"/>
            <p>
                <select name="selection" class="custom-select-new">
                {foreach from=$user_selecties item=selection key=id}
                    <option value="{$selection['id']}">{$selection['name']}</option>
                {/foreach}
                </select>
            </p>
            <p style="clear: both;"><br /><input type="submit" class="button new" value="Bijvoegen" /></p>
        </form>
        <div class="lijn gn-margin"></div>
        <p class="intro">Of bewaar als een nieuwe selectie</p>
        <form method="post" action="/ajax/add_selection_group" class="ajax">
            <input type="hidden" name="selection_models"/>
            <p class="input-new"><input type="text" name="naam"/></p>
            <p><input type="submit" class="button new" value="Toevoegen"/></p>
        </form>
    </div>
</div> *}

<div id="save_selection_modal" class="modal modal-sm">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">×</span>
    <div class="cms-container mx-auto p-0">
        <form id="save_selection" method="post" action="/ajax/add_selection_group" class="ajax">
            <input type="hidden" name="selection_models" />
            <div class="cms-includes-head align-items-center pr-0 mb-4">
                <h1 class="mb-0">Save to Selections</h1>
            </div>
            <div id="response-msg"></div>
            <div class="cms-row">
                <div class="cms-col-1-1">
                    <div class="cms-select" id="cms-select-client" data-select>
                        <div class="cms-field">
                            <select id="client_id" name="client_id" class="select2">
                                <option value="">clients</option>
                            </select> 
                        </div>
                        <div class="cms-form-icon cms-select-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </div>
                </div>
                <div class="cms-col-1-1">
                    <div class="cms-select is-value" data-select>
                        <div class="cms-field">
                            <label class="cms-field-label">Project</label>
                            <input class="cms-field-value" id="project" name="project" type="text" value="" data-select-value readonly/>
                            <input id="project_id" name="project_id" type="hidden" value=""/>
                        </div>
                        <div class="cms-form-icon cms-select-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <div id="project_options" class="cms-select-dropdown"></div>
                    </div>
                </div>
                <div class="cms-col-1-1">
                    <div class="cms-select is-value" data-select>
                        <div class="cms-field">
                            <label class="cms-field-label">Selection</label>
                            <input class="cms-field-value" id="selection" name="selection" type="text" value="" data-select-value readonly/>
                            <input id="selection_id" name="selection_id" type="hidden" value="" />
                        </div>
                        <div class="cms-form-icon cms-select-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <div id="selection_options" class="cms-select-dropdown"></div>
                    </div>
                </div>
                <div class="cms-col-1-1">
                    <div class="cms-input is-value" data-input>
                        <div class="cms-field">
                            <label class="cms-field-label">Create new Selection</label>
                            <input class="cms-field-value" id="naam" name="naam" type="text" value="" data-input-value />
                        </div>
                    </div>
                </div>
            </div>
            <div class="cms-includes-head-radio item-radio-group pt-0 align-items-center justify-content-end">
                <button class="btn cms-button-green clickble">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>

<div id="save-single-selection" class="modal modal-sm">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">×</span>
    <div class="cms-container mx-auto p-0">
        <form method="post" action="/ajax/add_model_to_selection" class="ajax save_selection">
            <input type="hidden" name="model_id" />
            <input type="hidden" name="selection_type" value="cms_selection" />
            <div class="cms-includes-head align-items-center pr-0 mb-4">
                <h1 class="mb-0">Save to Selections</h1>
            </div>
            <div id="response-msg"></div>
            <div class="cms-row">
                <div class="cms-col-1-1">
                    <div class="cms-select" id="cms-select-single-client" data-select>
                        <div class="cms-field">
                            <select id="single_client_id" name="client_id" class="select2">
                                <option value="">clients</option>
                            </select> 
                        </div>
                        <div class="cms-form-icon cms-select-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </div>
                </div>
                <div class="cms-col-1-1">
                    <div class="cms-select is-value" data-select>
                        <div class="cms-field">
                            <label class="cms-field-label">Project</label>
                            <input class="cms-field-value" id="single_project" name="project" type="text" value="" data-select-value readonly/>
                            <input id="single_project_id" name="project_id" type="hidden" value=""/>
                        </div>
                        <div class="cms-form-icon cms-select-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <div id="single_project_options" class="cms-select-dropdown"></div>
                    </div>
                </div>
                <div class="cms-col-1-1">
                    <div class="cms-select is-value" data-select>
                        <div class="cms-field">
                            <label class="cms-field-label">Selection</label>
                            <input class="cms-field-value" id="single_selection" name="selection" type="text" value="" data-select-value readonly/>
                            <input id="single_selection_id" name="selection_id" type="hidden" value="" />
                        </div>
                        <div class="cms-form-icon cms-select-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <div id="single_selection_options" class="cms-select-dropdown"></div>
                    </div>
                </div>
                <div class="cms-col-1-1">
                    <div class="cms-input is-value" data-input>
                        <div class="cms-field">
                            <label class="cms-field-label">Create new Selection</label>
                            <input class="cms-field-value" id="selection_title" name="selection_title" type="text" value="" data-input-value />
                        </div>
                    </div>
                </div>
            </div>
            <div class="cms-includes-head-radio item-radio-group pt-0 align-items-center justify-content-end">
                <button class="btn cms-button-green clickble">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>

{* <div class="cms-popup-bg" id="save-single-selection">
    <div class="cms-popup selection">
        <a href="#" class="close"><span class="icon-cross icon"></span></a>
        <h3>Bewaar deze selectie</h3>
        <p class="intro">Voeg deze nieuwe selectie toe aan een bestaande selectie</p>
        
        <form method="post" action="/ajax/add_model_to_selection" class="ajax">
            <input type="hidden" name="model_id" />
            <input type="hidden" name="selection_type" value="cms_selection" />
            
            <p><select name="selection_id" class="custom-select-new">
            {foreach from=$selecties item=name key=id}
                <option value="{$id}">{$name}</option>
            {/foreach}
            </select></p>
                
            <p style="clear: both;"><br /><input type="submit" class="button new" value="Bijvoegen" /></p>
        </form>    
        
        <div class="lijn gn-margin"></div>
        
        <p class="intro">Voeg deze nieuwe selectie toe aan een bestaande klant selectie</p>
        
        <form method="post" action="/ajax/add_model_to_selection" class="ajax">
            <input type="hidden" name="model_id" />
            <input type="hidden" name="selection_type" value="cms_selection" />
            
            <p><select name="selection_id" class="custom-select-new">
            {foreach from=$user_selecties item=selection key=id}
                <option value="{$selection['id']}">{$selection['name']}</option>
            {/foreach}
            </select></p>
                
            <p style="clear: both;"><br /><input type="submit" class="button new" value="Bijvoegen" /></p>
        </form>    
        
        <div class="lijn gn-margin"></div>
        <p class="intro">Of bewaar als een nieuwe selectie</p>
        <form method="post" action="/ajax/add_model_to_selection" class="ajax">
            <input type="hidden" name="model_id" />
            <input type="hidden" name="selection_type" value="cms_selection" />
            
            <p class="input-new"><input type="text" name="selection_title" /></p>
            <p><input type="submit" class="button new" value="Toevoegen" /></p>
        </form>
    </div>
</div> *}
{/if}
<div id="modellen"></div>

{literal}
<script>
$(document).ready(function() { 
    // bind 'myForm' and provide a simple callback function 
    var response_msg = $("#response-msg");
    $('#save_selection').ajaxForm({
        beforeSubmit: function() {
            response_msg.html("");
            console.log(123);
        },
        resetForm: true,
        success: function(res) { 
            var res = JSON.parse(res);
            console.log(res);
        }
    }); 
});
</script>
{/literal}