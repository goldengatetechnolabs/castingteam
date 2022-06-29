

function getEmails() {

    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            lang: taal
        },
        url: "/api/email/getContact",
        error: function() {
            jAlert(1, messages.error.iternal);
        },
        success: displayEmails
    });
}

function deleteSelection(selection_id){

  $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
           'selection_id':selection_id
                                                                                                                       
        },    
        url: "/ajax/delete_selection",
        error:
            function () {
                 jAlert(1, messages.error.iternal);
            },

        success: displaySelections


    });
  }



function registerUser(name,email,phone,company,sector,password,surname,city,country,remark,address,postal){

$.ajax({
        type: "POST",
        dataType: 'json',
        data: {
           name:name,
           email:email,
           phone:phone,
           company:company,
           sector:sector,
           city:city,
           country:country,
           remark:remark,
           address:address,
           postal:postal,
           password:password,
           surname:surname                                                                                                           
        },    
          
        url: "/ajax/add_vip_user",
        
        error:
            function () {
                
                 jAlert(1, messages.error.iternal);
            },

        success:showRegistrationResponse
    });
}


function sendModelCodeByEmail(email){

  $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
           'email':email
                                                                                                                       
        },    
        url: "/ajax/get_model_code_by_email",
        error:
            function () {
                 jAlert(1, messages.error.iternal);
            },

        success: messageSent


    });
  }

function recreateSelectionFromExisted(selectionCode) {

    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            'selection_code':selectionCode

        },
        url: "/api/selection/recreate",
        error:
            function () {
                jAlert(1, messages.error.iternal);
            },

        success: handleSelectionCreatingResult


    });
}

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
        success: displaySelectionsInSelect
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
                jAlert(1, messages.error.iternal);
            },
        success: handleUpdateSelection
    });
}

function getPathFromUrl() {
    var current_url = parse_url(window.location);

    var scheme = current_url.scheme;
    var path = current_url.path;
    var new_path = path.substr(4);

    return new_path;
}

function getModelById(id) {

    var path = getPathFromUrl();
    
    if('selection' == path)
    {
        window.history.pushState(null, 'people', "people-modellen/" + id);
    }
    else
    {
        var las_word = path.substr(-1);
        if('/' == las_word)
        {
            window.history.pushState(null, 'people', id);
        }
        else
        {
            window.history.pushState(null, 'people', path + '/' + id);
        }
    }

    $.ajax({
        type: "POST",
        data: {
            model_id: id,
            lang: taal
        },
        url: "/api/model/overview",
        error:
            function() {
                jAlert(1, messages.error.iternal);
            },
        success: createPoppupElement
    });
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
                jAlert(1, messages.error.iternal);
            },
        success: function(json) {
            console.log('json', json);

            // messages.notice.selectionAdded
            var new_msg = json.message;

            // $('.voeg_card').html('<i class="fa fa-star" style="margin-right:5px;"> </i> ' + new_msg);

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

                // var msgselectionAddedTest = messages.notice.selectionAddedTest;
                var msgselectionAddedTest = json.message;

                // $(".selections-single").empty();
                $(".delete-add-selection").empty();                
                // $(".selections-single").append($('<h3 style="color: #ffffff;font-family: "source_sans_problack";font-size: 30px;font-weight: normal;line-height: 38px;margin: 0 0 30px;padding-bottom: 15px;padding-left: 0 !important;padding-right: 0;padding-top: 0;position: relative;">' + msgselectionAddedTest + ' "' + title + '"</h3>'));
                $(".delete-add-selection").append('' + msgselectionAddedTest);
                $("#current-selection-count").html(json.count);
            }
        }
    });
}

