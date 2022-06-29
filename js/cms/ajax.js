

function rotateImage(image_id, model_id) {

    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            image_id: image_id,
            model_id: model_id
        },
        url: "/ajax/rotate_image",
        error: function() {
            jAlert(1, 'Er is een technische fout opgetreden.');
        },
        success: rotateImageSuccess


    });

}

function createGroup(rootId, name) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            root_id: rootId,
            name: name
        },
        url: "/api/group/add",
        error: function() {
            jAlert(1, 'Er is een technische fout opgetreden.');
        },
        success: updateNewGroup
    });
}

function editGroup(groupId, name) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            group_id: groupId,
            name: name
        },
        url: "/api/group/edit",
        error: function() {
            jAlert(1, 'Er is een technische fout opgetreden.');
        },
        success: updateNewGroup
    });
}


function getLogByParams(user_id, user_type) {

    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            user_id: user_id,
            user_type: user_type
        },
        url: "/ajax/get_logs",
        error: function() {
            jAlert(1, 'Er is een technische fout opgetreden.');
        },
        success: displayLogs


    });

}


function addModelToSelection(model_id, selection_title, selection_id) {


    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            model_id: model_id,
            selection_title: selection_title,
            selection_id: selection_id,
            selection_type: 'cms_selection'

        },
        url: "/ajax/add_model_to_selection",
        error:
                function() {
                    jAlert(1, 'Er is een technische fout opgetreden.');
                },
        success: displaySuccessMessage

    });

}


function deleteSelection(selection_id) {



    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            'selection_id': selection_id

        },
        url: "/ajax/delete_selection",
        error:
                function() {
                    jAlert(1, 'Er is een technische fout opgetreden.');
                },
        success: successRefresh
    });
}

function deleteVideo(video_id, model_id) {



    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            'video_id': video_id,
            'model_id': model_id

        },
        url: "/ajax/delete_video_from_model",
        error:
                function() {
                    jAlert(1, 'Er is een technische fout opgetreden.');
                },
        success: successRefresh
    });
}


function approveModel(model_id) {

    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            model_id: model_id

        },
        url: "/ajax/approve_model",
        error:
                function() {
                    jAlert(1, 'Er is een technische fout opgetreden.');
                },
        success: refreshOnNewId
    });

}



function getUsers(approved) {

    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            approved: approved
        },
        url: "/ajax/get_vip_users",
        error:
                function() {
                    jAlert(1, 'Er is een technische fout opgetreden.');
                },
        success: createUsersFromData

    });
}

function getUser(user_id) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            user_id: user_id

        },
        url: "/ajax/get_model_by_id",
        error:
                function() {
                    jAlert(1, 'Er is een technische fout opgetreden.');
                },
        success: displayPoppupUserInfo

    });

}
function getVip(user_id) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            user_id: user_id

        },
        url: "/ajax/get_user_by_id",
        error:
                function() {
                    jAlert(1, 'Er is een technische fout opgetreden.');
                },
        success: displayPoppupUserInfo
    });
}

function sendEmailToSelection(selection_id) {

    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            selection_id: selection_id

        },
        url: "/ajax/send_email_to_selection",
        error:
                function() {
                    jAlert(1, 'Er is een technische fout opgetreden.');
                },
        success: displaySuccessEmail

    });

}

function sendEmailToModel(mail_id, model_id, mailFrom, customMessage) {

    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            mail_id: mail_id,
            model_id: model_id,
            mail_from: mailFrom,
            text: customMessage

        },
        url: "/api/email/send",
        error:
                function() {
                    jAlert(1, 'Er is een technische fout opgetreden.');
                },
        success: displaySuccessEmail

    });

}

function changeModelVideoState(video_id, state) {

    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            video_id: video_id,
            state: state
        },
        url: "/ajax/set_model_video_state",
        error:
                function() {
                    jAlert(1, 'Er is een technische fout opgetreden.');
                },
        success: successRefresh

    });

}

function getModelById(id) {

    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            model_id: id
        },
        url: "/ajax/get_model",
        error:
            function() {
                jAlert(1, 'Er is een technische fout opgetreden.');
            },
        success:createPoppupElement
    });
}

function getModelTemplateById(id) {

    $.ajax({
        type: "POST",
        data: {
            model_id: id
        },
        url: "/ajax/get_model_template_by_id",
        error:
            function() {
                jAlert(1, 'Er is een technische fout opgetreden.');
            },
        success:createPoppupElement
    });
}

function deleteModelById(id) {

    $.ajax({
        type: "POST",
        data: {
            id: id
        },
        url: "/api/model/delete",
        error:
            function() {
                jAlert(1, 'Er is een technische fout opgetreden.');
            },
        success: refreshPage
    });
}

function getModelLocations(selectionId, models) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            selection_id: selectionId,
            models: models
        },
        url: "/ajax/get_model_locations",
        error:
            function() {
                jAlert(1, 'Er is een technische fout opgetreden.');
            },
        success:createMap
    });
}

function getModelIdWithFilters(to, from, parameters, options) {
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
            specific_cms: parameters.specific,
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
            cms_search: parameters.search,
            talent_search: parameters.talent_search,
            selection: parameters.selection,
            lengte_start: parameters.lengte_start,
            lengte_end: parameters.lengte_end,
            weight_start: parameters.weight_start,
            weight_end: parameters.weight_end,
            age_start: parameters.age_start,
            age_end: parameters.age_end,
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
            options: options,
            accepted: 1
        },

        url: "/ajax/get_models",

        error:function () {
            jAlert('Er is een technische fout opgetreden.');
        },

        success:function(json) {
            createModelElements(json, from);
        }
    });
}


function getEmail(id) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            id: id
        },
        url: "/api/email/get",
        error:
            function() {
                jAlert(1, 'Er is een technische fout opgetreden.');
            },
        success:showEmailTemplate
    });
}

function removeEmail(id) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            id: id
        },
        url: "/api/email/remove",
        error:
            function() {
                jAlert(1, 'Er is een technische fout opgetreden.');
            },
        success: refreshPage
    });
}

function testEmail(id) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            id: id
        },
        url: "/api/email/test",
        error:
            function() {
                jAlert(1, 'Er is een technische fout opgetreden.');
            },
        success: refreshPage
    });
}

function addKeyword(id, keyword, content) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            id: id,
            keyword: keyword,
            content: content
        },
        url: "/api/template/add",
        error:
            function() {
                jAlert(1, 'Er is een technische fout opgetreden.');
            },
        success: refreshPage
    });
}

function removeKeyword(id) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            id: id
        },
        url: "/api/template/remove",
        error:
            function() {
                jAlert(1, 'Er is een technische fout opgetreden.');
            },
        success: refreshPage
    });
}