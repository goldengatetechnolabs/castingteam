{literal} 
    <script src="/js/jquery.form.js" type="text/javascript"></script>
    <script type="text/javascript">
    $("body").on("click", "[data-toggle-subtable]", function() {
        var btn = $(this)
        $(btn.attr("data-toggle-subtable")).slideToggle();
        btn.toggleClass("show");
    });

    $("body").on("change", ".submit-onchange", function() {
        $("#filter_projects").trigger("submit");
    });

    $("body").on("change", ".update_status", function() {
        var current = $(this);
        var class_name = "";
        switch(current.val()) {
            case "Booked, awaiting confirmation":
                class_name = "alert-teal";
                break;
            case "Negative, no booking":
                class_name = "alert-danger";
                break;
        }
        $($(current).parentsUntil("tr").parent()[0]).removeClass().addClass(class_name);
        current.closest("form").trigger("submit");
    });

    $("body").on("change", ".submit-onchange", function() {
        $("#filter_projects").trigger("submit");
    });

    $('#filter_projects').ajaxForm({
        beforeSubmit: function() {
            $("#infscr-loading").show();
            $("#no-infscr-loading").hide();
        },
        success: function(res) { 
            var res = JSON.parse(res);
            var project_html = ""
            $.each(res, function(key, project) {
                project_html += `
                    <tr ${ ((project.status == 'Booked, awaiting confirmation') ? "class='alert-teal'" : "") } ${ ((project.status == 'Negative, no booking') ? "class='alert-danger'" : "") } >
                        <td class="clickable" data-toggle-subtable="#hidden_row${key}">${project.project_no}</td>
                        <td class="clickable"><a href="/cms/projects/projects/edit_project?project=${project.id}">${project.title}</a></td>
                        <td class="clickable" data-toggle-subtable="#hidden_row${key}">${project.company_name}</td>
                        <td class="p-0">
                            <form class="update_project_status" method="post" action="/cms/projects/projects/update_project_status">
                                <input type="hidden" name="project_id" value="${project.id}" />
                                <div class="cms-select" data-select>
                                    <div class="cms-field">
                                        <input class="cms-field-value update_status" name="status" type="text" value="${project.status}" data-select-value readonly/>
                                    </div>
                                    <div class="cms-form-icon cms-select-arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                    <div class="cms-select-dropdown">
                                        <div class="cms-select-optional">New project</div>
                                        <div class="cms-select-optional">Quote or selection sent - follow up</div>
                                        <div class="cms-select-optional">Create & send selections</div>
                                        <div class="cms-select-optional">Create & send inquiries</div>
                                        <div class="cms-select-optional">Booked, awaiting confirmation</div>
                                        <div class="cms-select-optional">Negative, no booking</div>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <tr id="hidden_row${key}" class="hidden_row">
                        <td colspan="4" class="p-0">
                            <table class="cms-table" style="background: #f6f2f0;">`;
                                $.each(project.selections, function(k, selection) {
                                    project_html += `<tr>
                                        <td class="bg-transparent" width="100"></td>
                                        <td colspan="2" class="toggle-td red">${selection.name}</td>
                                        <td width="150">${selection.modal_count} Talents</td>
                                    </tr>`;
                                });
                            project_html += `</table>
                        </td>
                    </tr>
                `;
            });
            $("#projects").html(project_html);
            init_update_project_status_form();
        },
        complete: function() {
            $("#infscr-loading").hide();
        }
    });

    function init_update_project_status_form() {
        $('.update_project_status').ajaxForm({
            beforeSubmit: function() {
                $("#infscr-loading").show();
                $("#no-infscr-loading").hide();
            },
            success: function(res) { 
                var res = JSON.parse(res);
                var no_loading = $("#no-infscr-loading");
                no_loading.find("span").html(((res.status) ? `<p class="text-success">${res.msg}</p>` : `<p class="text-danger">${res.error_msg}</p>` ));
                no_loading.show();
                setTimeout(function() {
                    no_loading.hide();
                }, 500);
            },
            complete: function() {
                $("#infscr-loading").hide();
            }
        });
    }

    init_update_project_status_form();
    
    </script>
{/literal}
<link rel="stylesheet" type="text/css" href="/css/cms/registration.css">
<!-- Project Edit -->
<div class="cms-project-edit">
    <h1>Archived: Project list</h1>
    <form id="filter_projects" action="/cms/projects/projects/archive_filter_projects">
        <div class="cms-row mb-4">
            <div class="cms-col-1-1">
                <h4>Sort / Filter:</h4>
            </div>
            <div class="cms-col-1-3">
                <div class="cms-select" data-select>
                    <div class="cms-field">
                        <label class="cms-field-label">Status</label>
                        <input class="cms-field-value submit-onchange" name="status" type="text" value="New project" data-select-value readonly/>
                    </div>
                    <div class="cms-form-icon cms-select-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                    <div class="cms-select-dropdown">
                        <div class="cms-select-optional">New project</div>
                        <div class="cms-select-optional">Quote or selection sent - follow up</div>
                        <div class="cms-select-optional">Create & send selections</div>
                        <div class="cms-select-optional">Create & send inquiries</div>
                        <div class="cms-select-optional">Booked, awaiting confirmation</div>
                        <div class="cms-select-optional">Negative, no booking</div>
                    </div>
                </div>
            </div>
            <div class="cms-col-1-3">
                <div class="cms-select" data-select>
                    <div class="cms-field">
                        <label class="cms-field-label">Booker</label>
                        <input class="cms-field-value submit-onchange" name="booker" type="text" value="Ans Brugmans" data-select-value readonly/>
                    </div>
                    <div class="cms-form-icon cms-select-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                    <div class="cms-select-dropdown">
                        <div class="cms-select-optional">Ans Brugmans</div>
                        <div class="cms-select-optional">Vincent Tjon</div>
                        <div class="cms-select-optional">David Van Ammel</div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="cms-row cms-includes-head pr-0">
        <div class="cms-col-1-1">
            <table class="cms-table">
                <thead>
                    <tr>
                        <th width="100">#</th>
                        <th>Project/Brand</th>
                        <th>Client</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <tbody id="projects">
                {foreach from=$projects key=k item=project}
                    <tr {if $project["status"] == 'Booked, awaiting confirmation'} class="alert-teal" {/if} {if $project["status"] == 'Negative, no booking'} class="alert-danger" {/if}>
                        <td class="clickable" data-toggle-subtable="#hidden_row{$k}">{$project["project_no"]}</td>
                        <td class="clickable"><a href="/cms/projects/projects/edit_project?project={$project["id"]}">{$project["title"]}</a></td>
                        <td class="clickable" data-toggle-subtable="#hidden_row{$k}">{$project["company_name"]}</td>
                        <td class="p-0">
                            <form class="update_project_status" method="post" action="/cms/projects/projects/update_project_status">
                                <input type="hidden" name="project_id" value="{$project["id"]}" />
                                <div class="cms-select" data-select>
                                    <div class="cms-field">
                                        <input class="cms-field-value update_status" name="status" type="text" value="{$project["status"]}" data-select-value readonly/>
                                    </div>
                                    <div class="cms-form-icon cms-select-arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                    <div class="cms-select-dropdown">
                                        <div class="cms-select-optional">New project</div>
                                        <div class="cms-select-optional">Quote or selection sent - follow up</div>
                                        <div class="cms-select-optional">Create & send selections</div>
                                        <div class="cms-select-optional">Create & send inquiries</div>
                                        <div class="cms-select-optional">Booked, awaiting confirmation</div>
                                        <div class="cms-select-optional">Negative, no booking</div>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <tr id="hidden_row{$k}" class="hidden_row">
                        <td colspan="4" class="p-0">
                            <table class="cms-table" style="background: #f6f2f0;">
                                {foreach from=$project["selections"] item=selection}
                                    <tr>
                                        <td class="bg-transparent" width="100"></td>
                                        <td colspan="2" class="toggle-td red">{$selection["name"]}</td>
                                        <td width="150">{$selection["modal_count"]} Talents</td>
                                    </tr>
                                {/foreach}
                            </table>
                        </td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
    </div>
</div>