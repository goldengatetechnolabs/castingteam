{literal}
<script src="/js/jquery.form.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function() {
            initSelect2('#client_id', '#cms-select');
            initSelect2('#contact_id', '#cms-select_contact_id');
        });        
</script>
{/literal}
<link rel="stylesheet" type="text/css" href="/css/cms/registration.css">
<div class="cms-project-edit">
    <h1>Projects: {$project["title"]}</h1>
    <form id="update_project" method="post" action="/cms/projects/projects/update_project" class="cms-form cms-form-create-clien">
        <input name="project_id" type="hidden" value="{$project["id"]}" />
        <div class="cms-row">
            <div class="cms-col-4-5" style="display: block;">
                <div class="cms-row">
                    <div class="cms-col-1-1">
                        <div class="cms-input" data-input>
                            <div class="cms-field">
                                <label class="cms-field-label">Project Title</label>
                                <input class="cms-field-value" name="title" type="text" value="{$project["title"]}" data-input-value />
                            </div>
                        </div>
                    </div>
                    <div class="cms-col-1-2">
                        <div class="cms-select" id="cms-select" data-select>
                            <div class="cms-field">
                                <label class="cms-field-label">Client</label> 
                                <select id="client_id" name="client_id" class="select2">
                                    <option selected="">Client</option>
                                    {foreach from=$clients item=client}
                                        <option value="{$client["id"]}" {($current_client_id == $client["id"]) ? "selected" : ""} class="cms-select-optional">{$client["company_name"]}</option>
                                    {/foreach}
                                </select>
                            </div>
                            <div class="cms-form-icon cms-select-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="cms-col-1-2">
                        <div class="cms-select" id="cms-select_contact_id" data-select>
                            <div class="cms-field">
                                <label class="cms-field-label">Contact</label> 
                                <select id="contact_id" name="contact_id" class="custom-select">
                                    <option selected="">Contact</option>
                                    {foreach from=$contacts item=contact}
                                        <option value="{$contact["id"]}" {($contact["id"] == $current_contact_id) ? "selected" : ""} class="cms-select-optional">{$contact["fname"]} {$contact["lname"]}</option>
                                    {/foreach}
                                </select>
                            </div>
                            <div class="cms-form-icon cms-select-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="cms-col-1-2">
                        <div class="cms-input" data-input>
                            <div class="cms-form-icon">
                                <i class="far fa-calendar-alt"></i>
                            </div>
                            <div class="cms-field">
                                <label class="cms-field-label">Project Start Date</label>
                                <input class="cms-field-value" name="start_date" type="date" value="{$project["start_date"]}" data-input-value/>
                            </div>
                        </div>
                    </div>
                    <div class="cms-col-1-2">
                        <div class="cms-select" data-select>
                            <div class="cms-field">
                                <select id="status" name="status" class="custom-select">
                                    <option selected="">Status</option>
                                    <option {($project["status"] == "New project") ? "selected" : ""}>New project</option>
                                    <option {($project["status"] == "Quote or selection sent - follow up") ? "selected" : ""}>Quote or selection sent - follow up</option>
                                    <option {($project["status"] == "Create & send selections") ? "selected" : ""}>Create & send selections</option>
                                    <option {($project["status"] == "Create & send inquiries") ? "selected" : ""}>Create & send inquiries</option>
                                    <option {($project["status"] == "Booked, awaiting confirmation") ? "selected" : ""}>Booked, awaiting confirmation</option>
                                    <option {($project["status"] == "Negative, no booking") ? "selected" : ""}>Negative, no booking</option> 
                                </select> 
                            </div>
                            <div class="cms-form-icon cms-select-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cms-row mb-4 pb-5">
                    <div class="cms-col-1-1">
                        <div class="cms-input textarea-input" data-textarea>
                            <div class="cms-field">
                                {* <label class="cms-field-label">Project Description (copy paste initial request)</label> *}
                                <textarea class="cms-field-value" placeholder="Project Description (copy paste initial request)" name="description" type="text" data-textarea-value>{$project["description"]}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="cms-col-1-1">
                        <div class="cms-input textarea-input" data-textarea>
                            <div class="cms-field">
                                {* <label class="cms-field-label">Right & usage</label> *}
                                <textarea class="cms-field-value" placeholder="Right & usage" name="right_and_usage" type="text" data-textarea-value>{$project["right_and_usage"]}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="cms-col-2-3">
                    <div class="cms-input textarea-input" data-textarea>
                        <div class="cms-field">
                            <textarea class="cms-field-value" placeholder="Rights & usage extension" name="rights_and_usage_extension" type="text" data-textarea-value>{$project["rights_and_usage_extension"]}</textarea>
                        </div>
                    </div>
                </div>
                <div class="cms-col-1-3">
                    <div class="cms-input" data-input>
                        <div class="cms-form-icon">
                            <i class="far fa-calendar-alt"></i>
                        </div>
                        <div class="cms-field">
                            <label class="cms-field-label">Extension start date</label>
                            <input class="cms-field-value no-placeholder" name="extension_start_date" type="text"  value="{$project["extension_start_date"]}" data-input-value/>
                        </div>
                    </div>
                </div>
                    <div class="cms-col-1-1">
                        <div id="response-msg" class="mt-20px"></div>
                    </div>
                </div>
            </div>
            <div class="cms-col-1-5 pl-4" style="display: block;">
                <button class="cms-button cms-grid-day cms-button-green clickble mb-2">Save</button>
                <a href="" class="cms-button cms-grid-day Ok clickble mb-2">Book!</a>
                <a href="javascript:;" data-project_id="{$current_project_id}" id="archive-project" class="cms-button cms-grid-day cms-button-light-green mb-2"><i class="far fa-trash-alt"></i>&nbsp;  Archive</a>
            </div>
        </div>
    </form>
    <div class="cms-row mb-5 pb-5">
        <h2 class="tt">Selections</h2>
        <table class="cms-table">
            {foreach from=$selections item=selection}
                <tr>
                    <td class="toggle-td red">Selection: {$selection["creation_date"]} - {$selection["name"]}</td>
                    <td width="150">{$selection["modal_count"]} Talents</td>
                </tr>
            {/foreach}
        </table>
    </div>
    <div class="cms-row mb-5 pb-5">
        <h2 class="tt">Inquiries</h2>
        <table class="cms-table">
            <tr>
                <td class="toggle-td blue">
                    Person-1 is 24 years old and he is a computer programmer 
                </td>
                <td width="150">12 Talents</td>
                
            </tr>
            <tr>
                <td class="toggle-td blue">
                    Person-1 is 24 years old and he is a computer programmer 
                </td>
                <td width="150">12 Talents</td>
                
            </tr>
            <tr>
                <td class="toggle-td blue">
                    Person-1 is 24 years old and he is a computer programmer 
                </td>
                <td width="150">12 Talents</td>
                
            </tr>
        </table>
    </div>
    <div class="cms-row">
        <h2 class="tt">Basic calculation</h2>
    </div>
    <div class="cms-row calc">
        <div class="cms-col-1-1" style="display: block;">
            <form id="update_project_budget" method="post" action="/cms/projects/projects/update_project_budget">
                <input name="project_id" type="hidden" value="{$current_project_id}" />
                <table class="cms-table">
                    <tr>
                        <td class="bg-transparent"></td>
                        <td colspan="5" class="bg-transparent">
                            <div class="cms-navigation-title">
                            <span class="text-black">Client</span>
                            </div>
                        </td>
                        <td colspan="4" class="bg-transparent">
                            <div class="cms-navigation-title">
                            <span class="text-black">Talent</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Talent description</th>
                        <th>Day fee</th>
                        <th>Rights</th>
                        <th>Travel or Expenses</th>
                        <th>Agency</th>
                        <th class="text-black">Total client</th>
                        <th>Fees</th>
                        <th>Rights</th>
                        <th>Travel or Expenses</th>
                        <th>Total telent</th>
                    </tr>
                    <tbody id="budget-table-body">
                        {if count($budget) == 0}
                            <tr>
                                <td>
                                    <div class="cms-input" data-input>
                                        <div class="cms-field">
                                            <label class="cms-field-label pr-0">Talent</label>
                                            <input class="cms-field-value p-0" name="budget[0][talent]" type="text" value="" data-input-value />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="cms-input" data-input>
                                        <div class="cms-field">
                                            <input class="cms-field-value p-0 text-center currency-masked client-rate" name="budget[0][day_fee]" type="text" value="0" data-input-value />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="cms-input" data-input>
                                        <div class="cms-field">
                                            <input class="cms-field-value p-0 text-center currency-masked client-rate" name="budget[0][client_rights]" type="text" value="0" data-input-value />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="cms-input" data-input>
                                        <div class="cms-field">
                                            <input class="cms-field-value p-0 text-center currency-masked client-rate" name="budget[0][client_travel]" type="text" value="0" data-input-value />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="cms-input" data-input>
                                        <div class="cms-field">
                                            <input class="cms-field-value p-0 text-center currency-masked client-rate" name="budget[0][client_agency]" type="text" value="0" data-input-value />
                                        </div>
                                    </div>
                                </td>
                                <td class="bg-danger-light client-row-total">€ 0</td>
                                <td>
                                    <div class="cms-input" data-input>
                                        <div class="cms-field">
                                            <input class="cms-field-value p-0 text-center currency-masked talent-rate" name="budget[0][talent_fees]" type="text" value="0" data-input-value />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="cms-input" data-input>
                                        <div class="cms-field">
                                            <input class="cms-field-value p-0 text-center currency-masked talent-rate" name="budget[0][talent_rights]" type="text" value="0" data-input-value />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="cms-input" data-input>
                                        <div class="cms-field">
                                            <input class="cms-field-value p-0 text-center currency-masked talent-rate" name="budget[0][talent_travel]" type="text" value="0" data-input-value />
                                        </div>
                                    </div>
                                </td>
                                <td class="bg-danger-light talent-row-total">€ 0</td>
                            </tr>
                        {else}
                            {foreach from=$budget key=k item=b}
                                <tr>
                                    <td>
                                        <div class="cms-input" data-input>
                                            <div class="cms-field">
                                                <label class="cms-field-label pr-0">Talent</label>
                                                <input class="cms-field-value p-0" name="budget[{$k}][talent]" type="text" value="{$b->talent}" data-input-value />
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cms-input" data-input>
                                            <div class="cms-field">
                                                <input class="cms-field-value p-0 text-center currency-masked client-rate" name="budget[{$k}][day_fee]" type="text" value="{$b->day_fee}" data-input-value />
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cms-input" data-input>
                                            <div class="cms-field">
                                                <input class="cms-field-value p-0 text-center currency-masked client-rate" name="budget[{$k}][client_rights]" type="text" value="{$b->client_rights}" data-input-value />
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cms-input" data-input>
                                            <div class="cms-field">
                                                <input class="cms-field-value p-0 text-center currency-masked client-rate" name="budget[{$k}][client_travel]" type="text" value="{$b->client_travel}" data-input-value />
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cms-input" data-input>
                                            <div class="cms-field">
                                                <input class="cms-field-value p-0 text-center currency-masked client-rate" name="budget[{$k}][client_agency]" type="text" value="{$b->client_agency}" data-input-value />
                                            </div>
                                        </div>
                                    </td>
                                    <td class="bg-danger-light client-row-total">€ {$b->day_fee + $b->client_rights + $b->client_travel + $b->client_agency}</td>
                                    <td>
                                        <div class="cms-input" data-input>
                                            <div class="cms-field">
                                                <input class="cms-field-value p-0 text-center currency-masked talent-rate" name="budget[{$k}][talent_fees]" type="text" value="{$b->talent_fees}" data-input-value />
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cms-input" data-input>
                                            <div class="cms-field">
                                                <input class="cms-field-value p-0 text-center currency-masked talent-rate" name="budget[{$k}][talent_rights]" type="text" value="{$b->talent_rights}" data-input-value />
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cms-input" data-input>
                                            <div class="cms-field">
                                                <input class="cms-field-value p-0 text-center currency-masked talent-rate" name="budget[{$k}][talent_travel]" type="text" value="{$b->talent_travel}" data-input-value />
                                            </div>
                                        </div>
                                    </td>
                                    <td class="bg-danger-light talent-row-total">€ {$b->talent_fees + $b->talent_rights + $b->talent_travel}</td>
                                </tr>
                            {/foreach}
                        {/if}
                    </tbody>
                    <tfoot>
                        <tr>
                            <th align="left">
                                <a id="add-budget-row" class="cms-button cms-button-text justify-content-start" href="javascript:;"><i class="fas fa-plus-circle"></i> Add Row</a>
                            </th>
                            <th colspan="4" align="right">Total client:</th>
                            <td id="client-total" class="bg-danger">€ {$total_client}</td>
                            <th colspan="3" align="right">Total talents:</th>
                            <td id="talent-total" class="bg-danger">€ {$total_talent}</td>
                        </tr>
                        <tr>
                            <td class="bg-transparent" colspan="8"></td>
                            <th class="bg-transparent">Total reminder</th>
                            <td id="total-reminder" class="cms-grid-day Ok" style="width: auto;">€ {$total_client - $total_talent}</td>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div>
</div>
{literal}
    <script src="/js/cms/jquery.inputmask.min.js"></script>
    <script>
        function init_mask() {
            Inputmask({alias: 'numeric', digitsOptional: true, prefix: '€ ', defaultValue: '0', placeholder: '0'}).mask(document.getElementsByClassName("currency-masked"));
        }
        init_mask();
        $('body').on("click", "[data-client-id]", function() {
            var element = $("#client_id")
            element.val($(this).attr("data-client-id"));
            element.trigger("change");
        });
        $('body').on("click", "[data-contact-id]", function() {
            var element = $("#contact_id")
            element.val($(this).attr("data-contact-id"));
            element.trigger("change");
        });
        $('body').on("click", "#archive-project", function() {
            var loading = $("#infscr-loading");
            var no_data = $("#no-infscr-loading");
            $.ajax({
                    url: "/cms/projects/projects/archive_project",
                    method: 'post',
                    type: "post",
                    data: {
                        id: $(this).attr("data-project_id")
                    },
                    beforeSend: function() {
                        loading.show();
                        no_data.hide();
                    },
                    success: function(res) {
                        var res = JSON.parse(res);
                        no_data.find("span").html(((res.status) ? `<p class="text-success">${res.msg}</p>` : `<p class="text-danger">${res.error_msg}</p>` ));
                        no_data.show();
                        setTimeout(function() {
                            no_data.hide();
                        }, 500);
                    },
                    complete: function() {
                        loading.hide();
                    }
                });
        });
        $('body').on("change", "#client_id", function() {
                var loading = $("#infscr-loading");
                var no_data = $("#no-infscr-loading");
                var contact_options = $("#contact_options");
                var contact = $("#contact");
                var contact_id = $("#contact_id");
                $.ajax({
                    url: "/cms/clients/clients/get_contacts",
                    data: {
                        id: $(this).val()
                    },
                    beforeSend: function() {
                        loading.show();
                        no_data.hide();
                        contact_options.html();
                        contact.val("");
                        contact_id.val("");
                    },
                    success: function(res) {
                        var options = "";
                        var res = JSON.parse(res);
                        if(res.status) {
                            $.each(res.contacts, function(key, value) {
                                if(key == 0) {
                                    contact.val(value.fname + " " + value.lname);
                                    contact_id.val(value.id);
                                }
                                options += `<div data-contact-id="${ value.id }" class="cms-select-optional">${ value.fname } ${ value.lname }</div>`;
                            });
                        }
                        contact_options.html(options);
                    },
                    complete: function() {
                        loading.hide();
                    }
                });
            });
        $("body").on("click", "#add-budget-row", function() {
            var index = new Date().getTime();
            $("#budget-table-body").append(`
                <tr>
                    <td>
                        <div class="cms-input" data-input>
                            <div class="cms-field">
                                <label class="cms-field-label pr-0">Talent</label>
                                <input class="cms-field-value p-0" name="budget[${index}][talent]" type="text" value="" data-input-value />
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="cms-input" data-input>
                            <div class="cms-field">
                                <input class="cms-field-value p-0 text-center currency-masked client-rate" name="budget[${index}][day_fee]" type="text" value="0" data-input-value />
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="cms-input" data-input>
                            <div class="cms-field">
                                <input class="cms-field-value p-0 text-center currency-masked client-rate" name="budget[${index}][client_rights]" type="text" value="0" data-input-value />
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="cms-input" data-input>
                            <div class="cms-field">
                                <input class="cms-field-value p-0 text-center currency-masked client-rate" name="budget[${index}][client_travel]" type="text" value="0" data-input-value />
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="cms-input" data-input>
                            <div class="cms-field">
                                <input class="cms-field-value p-0 text-center currency-masked client-rate" name="budget[${index}][client_agency]" type="text" value="0" data-input-value />
                            </div>
                        </div>
                    </td>
                    <td class="bg-danger-light client-row-total">€ 0</td>
                    <td>
                        <div class="cms-input" data-input>
                            <div class="cms-field">
                                <input class="cms-field-value p-0 text-center currency-masked talent-rate" name="budget[${index}][talent_fees]" type="text" value="0" data-input-value />
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="cms-input" data-input>
                            <div class="cms-field">
                                <input class="cms-field-value p-0 text-center currency-masked talent-rate" name="budget[${index}][talent_rights]" type="text" value="0" data-input-value />
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="cms-input" data-input>
                            <div class="cms-field">
                                <input class="cms-field-value p-0 text-center currency-masked talent-rate" name="budget[${index}][talent_travel]" type="text" value="0" data-input-value />
                            </div>
                        </div>
                    </td>
                    <td class="bg-danger-light talent-row-total">€ 0</td>
                </tr>
            `);
            init_mask();
        });
        $("body").on("change", ".cms-field-value", function() {
            var current = $(this);
            var row = current.parent().parent().parent().parent();
            row.find(".client-row-total").html("€ " + calculate_unmaskedvalue(row.find(".client-rate")));
            row.find(".talent-row-total").html("€ " + calculate_unmaskedvalue(row.find(".talent-rate")));
            calculate_total();
            $.ajax({
                url: "/cms/projects/projects/update_project_budget",
                cache: false,
                processData: false,
                contentType: false,
                type: 'POST',
                data: new FormData($('#update_project_budget')[0]),
                success: function(res) { }
            });
        });
        function calculate_unmaskedvalue(element) {
            var total = 0;
            $.each(element, function(key, value) {
                var rate = parseInt($(value).inputmask('unmaskedvalue'));
                total += ((rate !== NaN) ? rate : 0);
            });
            return total;
        }
        function calculate_total() {
            var client_total = calculate_unmaskedvalue($("#budget-table-body .client-rate"));
            var talent_total = calculate_unmaskedvalue($("#budget-table-body .talent-rate"));
            $("#client-total").html("€ " + client_total);
            $("#talent-total").html("€ " + talent_total);
            $("#total-reminder").html("€ " + (client_total - talent_total));
        }
        $('#update_project_budget').ajaxForm({
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
    var response_msg = $("#response-msg");
    $('#update_project').ajaxForm({
        beforeSubmit: function() {
            response_msg.html("");
        },
        success: function(res) { 
            var res = JSON.parse(res);
            //response_msg.html( ((res.status) ? `<p class="text-success">${res.msg}</p>` : `<p class="text-danger">${res.error_msg}</p>` ) );
            alert(res.msg);
        }
    });
    </script>
{/literal}