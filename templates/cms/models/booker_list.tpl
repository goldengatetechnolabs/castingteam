{literal} 

<script type="text/javascript">



    var isLoadedPreveously = true;

    var stopLoading = false;

    var randomModelImages = 3;

    var modelsPerPage = 30;

    var lastResultCount = 0;

    window.selection_id = 0;



    $("body").on("click", "[data-client]", function() {

        $("#client_id").val($(this).attr("data-client")).trigger("change");

    });



    $("body").on("click", "[data-project]", function() {

        $("#project_id").val($(this).attr("data-project")).trigger("change");

    });



    $("body").on("click", "[data-selection]", function() {

        selection_id = $(this).attr("data-selection");



        $("#views").html(`

            <div class="buttons_block">

                <div id="button_selection_wrap" class="selection_wrap">

                    <a href="/nl/selection?selection=${selection_id}"><button class="button new ">Toon op frontend</button></a>

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

        `);



        getModelsByAjax(0, 20);

    });



    $("body").on("change", "#client_id", function() {

        get_projects("#client_id");

    });



    $("body").on("change", "#project_id", function() {

        get_selections();

    });



    function get_projects(client_element = "#client_id") {

        // project_options

        var loading = $("#infscr-loading");

        var no_data = $("#no-infscr-loading");

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

                var data = JSON.parse(res);

                $.each(data, function(key, value) {

                    rows += `<div data-project="${ value.id }" class="cms-select-optional">${ value.title }</div>`;

                });

                $("#project_options").html(rows);

            },

            complete: function() {

                loading.hide();

                reset_selection();

                check_input_fields();

            }

        });

    }



    function get_selections() {

        // selection_options

        var loading = $("#infscr-loading");

        var no_data = $("#no-infscr-loading");

        return $.ajax({

            url: "/cms/models/models/selection_by_project_ajax",

            data: {

                client_id: $("#client_id").val(),

                project_id: $("#project_id").val()

            },

            beforeSend: function() {

                loading.show();

                no_data.hide();

                reset_selection();

            },

            success: function(res) {

                var rows = "";

                var data = JSON.parse(res);

                $.each(data, function(k, selection) {

                    rows += `

                    <tr data-selection="${selection.code}">

                        <td colspan="2" class="toggle-td red">Selection: ${selection.creation_date} - ${selection.name}</td>

                        <td width="150">${selection.modal_count} Talents</td>

                    </tr>`;

                });

                $("#selection_rows").html(rows);

                $("#selection_div").show();

            },

            complete: function() {

                loading.hide();

                check_input_fields();

            }

        });

    }

    function reset_project() {

        $("#project_options").html("");

        $("#project_id").val("");

        $("#project").val("");

    }

    function reset_selection() {

        $("#selection_div").hide();

        $("#selection_rows").html("");

    }



    //



    function getModelsByAjax(from, to) {

        var selection = $("#selection").attr('data-code');

        $.ajax({

            type: "POST",

            dataType: 'json',

            data: {

                from: from,

                to:to, 

                selection: selection_id,

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



    



    function resetResults(){

    stopLoading = false;

    $('#modellen').empty();

    getModelsByAjax(0, modelsPerPage);

    }



    $(document).ready(function() {



        var check=$("input[name='zoeken_lijst']").val();



        if (check === undefined) {

        

        } else {

        getModelsByAjax(0,20);

        }



        $("#begin_load_button").click(function() {

            resetResults(true);

            rewriteUrlWithFilters();

        });





        });



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

  // var view_type=$("#view .active").attr('id');

  // view_type=view_type.replace(/\D/g,'');

  // var caption_type=$("#caption .active").attr('id');

  // caption_type=caption_type.replace(/\D/g,'');

// 

  // if (view_type == '0') {

  //   el_style = 'style="display:none;"';

  //   table_style = '';

  // } else {

  //   el_style = '';

  //   table_style = 'style="display:none;"';

  // }

  var el_style = 'style="display:block;"';

  var table_style = 'style="display: none"';

  var view_type = "3";

  var caption_type = "1";



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



function noMoreModels() {

  $('#no-infscr-loading').toggle();

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



</script>

{/literal}



<link rel="stylesheet" type="text/css" href="/css/cms/registration.css">



<div class="cms-project-edit">

    <h1>Selections</h1>

    <div class="cms-row mb-4">

        <div class="cms-col-1-3">

            <form class="w-100">

                <div class="cms-select" data-select>

                    <div class="cms-field">

                        <label class="cms-field-label">Clients</label>

                        <input class="cms-field-value" id="client" name="client" type="text" value="" data-select-value readonly/>

                        <input type="hidden" id="client_id" name="client_id" value="" />

                    </div>

                    <div class="cms-form-icon cms-select-arrow">

                        <i class="fas fa-angle-down"></i>

                    </div>

                    <div class="cms-select-dropdown">

                        {foreach from=$clients item=client}

                            <div data-client="{$client["id"]}" class="cms-select-optional">{$client["company_name"]}</div>

                        {/foreach}

                    </div>

                </div>

            </form>

        </div>

        <div class="cms-col-1-3">

            <form class="w-100">

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

            </form>

        </div>

        <div id="selection_div" style="display:none;" class="cms-col-1-1 mt-4">

            <form class="w-100">

                <div class="cms-row">

                    <h2>Selections</h2>

                    <table class="cms-table">

                        <tbody id="selection_rows">

                            

                        </tbody>

                    </table>

                </div>

            </form>

        </div>



        <div class="cms-col-1-1 mt-4">

        



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


        </div>

        <div id="modellen"></div>



        




    </div>

</div>

<div class="loading">

    <div id="infscr-loading" style="padding:15px 15px 8px 10px;">

        <img src="/images/loading.gif" alt="Loading..." width='50' height="50" >

    </div>

    <div id="no-infscr-loading" style="display: none; width:300px; margin:auto; padding:10px 20px;">

        <span></span>

    </div>

</div>

