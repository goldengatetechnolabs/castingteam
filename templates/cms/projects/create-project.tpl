{literal}
    <script src="/js/jquery.form.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
            var response_msg = $("#response-msg");
            $('#create-project').ajaxForm({
                beforeSubmit: function() {
                    response_msg.html("");
                },
                success: function(res) { 
                    var res = JSON.parse(res);
                    //response_msg.html( ((res.status) ? `<p class="text-success">${res.msg}</p>` : `<p class="text-danger">${res.error_msg}</p>` ) );
                    alert(res.msg);
                    if(res.status) {
                        $("#create-project").resetForm();
                    }
                }
            });
            $('body').on("change", "#client_id", function() {
                var loading = $("#infscr-loading");
                var no_data = $("#no-infscr-loading");
                var contact_options = $("#contact_id");
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
                                options += `<option value="${ value.id }" >${ value.fname } ${ value.lname }</option>`;
                            });
                        }
                        contact_options.html(options);
                        $("#contact_id").select2("destroy").select2({
                            dropdownParent: $('#cms-select_contact_id')
                        });
                    },
                    complete: function() {
                        loading.hide();
                    }
                });
            });

            initSelect2('#client_id', '#cms-select');
            initSelect2('#contact_id', '#cms-select_contact_id');
        }); 
    </script>
{/literal}
<link rel="stylesheet" type="text/css" href="/css/cms/registration.css">
<form id="create-project" action="/cms/projects/projects/store_project" method="post" class="cms-form cms-form-create-clien">
    <div class="cms-row">
        <div class="cms-col-4-5">
            <div class="cms-includes-head w-100">
                <h1>Create a new project</h1>
                <button class="cms-button cms-button-green">Create</button>
            </div>
        </div>
    </div>
    <div class="cms-row">
        <div class="cms-col-4-5" style="display: block;">
            <div class="cms-row">
                <div class="cms-col-1-1">
                    <div class="cms-input" data-input>
                        <div class="cms-field">
                            <label class="cms-field-label">Project title</label>
                            <input class="cms-field-value" name="title" type="text" value="" data-input-value />
                        </div>
                    </div>
                </div>
                <div class="cms-col-1-2">
                    {* <div class="cms-select" data-select>
                        <div class="cms-field">
                            <label class="cms-field-label">Client</label>
                            <input class="cms-field-value" id="client" name="client" type="text" value="" data-select-value readonly/>
                            <input class="cms-field-value" id="client_id" name="client_id" type="hidden" value=""/>
                        </div>
                        <div class="cms-form-icon cms-select-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <div class="cms-select-dropdown">
                        {foreach from=$clients item=client}
                            <div data-client-id="{$client["id"]}" class="cms-select-optional">{$client["company_name"]}</div>
                        {/foreach}
                        </div>
                    </div> *}

                    <!-- Select 2 -->
                    <div class="cms-select" id="cms-select" data-select>
                        <div class="cms-field">
                            <label class="cms-field-label">Client</label> 
                            <select id="client_id" name="client_id" class="select2">
                                <option selected="">Client</option>
                                {foreach from=$clients item=client}
                                    <option value="{$client["id"]}" class="cms-select-optional">{$client["company_name"]}</option>
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
                                    <option value="{$contact["id"]}" class="cms-select-optional">{$contact["fname"]} {$contact["lname"]}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="cms-form-icon cms-select-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </div>
                    {* <div class="cms-select" data-select>
                        <div class="cms-field">
                            <label class="cms-field-label">Contact</label>
                            <input class="cms-field-value" id="contact" name="contact" type="text" value="" data-select-value readonly/>
                            <input class="cms-field-value" id="contact_id" name="contact_id" type="hidden" value="" />
                        </div>
                        <div class="cms-form-icon cms-select-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <div id="contact_options" class="cms-select-dropdown">
                        {foreach from=$contacts item=contact}
                            <div data-contact-id="{$contact["id"]}" class="cms-select-optional">{$contact["fname"]} {$contact["lname"]}</div>
                        {/foreach}
                        </div>
                    </div> *}
                </div>
                <div class="cms-col-1-2">
                    <div class="cms-input" data-input>
                        <div class="cms-form-icon">
                            <i class="far fa-calendar-alt"></i>
                        </div>
                        <div class="cms-field">
                            <label class="cms-field-label">Project start date</label>
                            <input class="cms-field-value no-placeholder" name="start_date" type="text"  value="" data-input-value/>
                        </div>
                    </div>
                </div>
                <div class="cms-col-1-2">
                    {* <div class="cms-select" data-select>
                        <div class="cms-field">
                            <label class="cms-field-label">Status</label>
                            <input class="cms-field-value" name="status" type="text" value="" data-select-value readonly/>
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
                    </div> *}

                    <div class="cms-select" data-select>
                        <div class="cms-field">
                            <select id="status" name="status" class="custom-select">
                                <option selected="">Status</option>
                                <option>New project</option>
                                <option>Quote or selection sent - follow up</option>
                                <option>Create & send selections</option>
                                <option>Create & send inquiries</option>
                                <option>Booked, awaiting confirmation</option>
                                <option>Negative, no booking</option> 
                            </select> 
                        </div>
                        <div class="cms-form-icon cms-select-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cms-row" style="align-items: flex-start;">
                <div class="cms-col-1-1">
                    <div class="cms-input textarea-input" data-textarea>
                        <div class="cms-field">
                            {* <label class="cms-field-label">Project Description (copy paste initial request)</label> *}
                            <textarea class="cms-field-value" placeholder="Project description (copy paste initial request)" name="description" type="text" data-textarea-value></textarea>
                        </div>
                    </div>
                </div>
                <div class="cms-col-1-1">
                    <div class="cms-input textarea-input" data-textarea>
                        <div class="cms-field">
                            {* <label class="cms-field-label">Right & usage</label> *}
                            <textarea class="cms-field-value" placeholder="Rights & usage" name="right_and_usage" type="text" data-textarea-value></textarea>
                        </div>
                    </div>
                </div>
                <div class="cms-col-2-3">
                    <div class="cms-input textarea-input" data-textarea>
                        <div class="cms-field">
                            <textarea class="cms-field-value" placeholder="Rights & usage extension" name="rights_and_usage_extension" type="text" data-textarea-value></textarea>
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
                            <input class="cms-field-value no-placeholder" name="extension_start_date" type="text"  value="" data-input-value/>
                        </div>
                    </div>
                </div>
                <div class="cms-col-1-1">
                    <div id="response-msg" class="mt-20px"></div>
                </div>
            </div>
        </div>
        <div class="cms-col-1-5 pl-4"></div>
    </div>
</form>
<div class="loading">
    <div id="infscr-loading" style="padding:15px 15px 8px 10px;">
        <img src="/images/loading.gif" alt="Loading..." width='50' height="50" >
    </div>
    <div id="no-infscr-loading" style="display: none; width:300px; margin:auto; padding:10px 20px;">
        <span></span>
    </div>
</div>

<script type="text/javascript">
    var input = document.querySelectorAll(".no-placeholder");

    input.forEach(function(e){
      e.addEventListener("focusin",function(ev){
        e.type = 'date';
      })
    });
    input.forEach(function(e){
      e.addEventListener("focusout",function(ev){
        e.type = 'text';
      })
    });
</script>