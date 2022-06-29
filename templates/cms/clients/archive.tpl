{literal} 
    <script src="/js/jquery.form.js" type="text/javascript"></script>
    <script type="text/javascript">

        $("body").on("click", ".edit-client", function() {
            var current = $(this);
            var client = current.attr("data-client");
            var loading = $("#infscr-loading");
            var no_data = $("#no-infscr-loading");
            if(client == undefined || client == "" || parseInt(client) == "NaN") {
                alert("invalid client");
                return false;
            }
            $.ajax({
                url: "/cms/clients/clients/get_client",
                data: {
                    id: client
                },
                beforeSend: function() {
                    loading.show();
                    no_data.hide();
                },
                success: function(res) {
                    var res = JSON.parse(res);
                    if(res.status) {

                        $("#ce_create_project").attr("href", "/cms/projects/projects/create_project?client="+res.client.id)
                        $("#ce_unarchive_client").attr("data-client", res.client.id);
                        $("#ce_edit_title").html(res.client.company_name);
                        $("#ce_client_id").val(res.client.id);
                        $("#ce_company_name").val(res.client.company_name);
                        $("#ce_type").val(res.client.client_type);
                        $("#ce_website").val(res.client.website);
                        $("#ce_street").val(res.client.street);
                        $("#ce_postal_code").val(res.client.postal_code);
                        $("#ce_city").val(res.client.city);
                        $("#ce_country").val(res.client.country);
                        $("#ce_vat_number").val(res.client.vat_number);
                        $("#ce_booker").val(res.client.booker);
                        if($("#ce-typeClient").val() == res.client.status) {
                            $("#ce-typeClient").iCheck('check');
                        }
                        if($("#ce-typeProspect").val() == res.client.status) {
                            $("#ce-typeProspect").iCheck('check');
                        }

                        var contact_html = ""
                        $.each(res.contacts, function(key, value) {
                            contact_html += `<div class="cms-row cms-includes-head pr-0">
                                <h2></h2>
                                <div class="cms-includes-head-radio item-radio-group">
                                    <div class="item-radio">
                                        <a href="javascript:;" class="remove-contact"><label><i class="far fa-trash-alt"></i>  Delete </label></a>
                                    </div>
                                    <div class="item-radio-group">
                                        <div class="item-radio">
                                            <input id="radioOptin${key}" type="radio" name="contact[${key}][contact_status]" value="Opt-in" ${(value.status == "Opt-in") ? "checked" : ""} />
                                            <label for="radioOptin${key}">Opt-in</label>
                                        </div>
                                        <div class="item-radio">
                                            <input id="radioUnsubscribe${key}" type="radio" name="contact[${key}][contact_status]" value="Unsubscribe" ${(value.status == "Unsubscribe") ? "checked" : ""} />
                                            <label for="radioUnsubscribe${key}">Unsubscribe</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cms-row">
                                <div class="cms-col-1-3">
                                    <div class="cms-input" data-input>
                                        <div class="cms-field">
                                            <label class="cms-field-label">First name</label>
                                            <input class="cms-field-value" name="contact[${key}][fname]" type="text" value="${value.fname}" data-input-value />
                                        </div>
                                    </div>
                                </div>
                                <div class="cms-col-1-3">
                                    <div class="cms-input" data-input>
                                        <div class="cms-field">
                                            <label class="cms-field-label">Last name</label>
                                            <input class="cms-field-value" name="contact[${key}][lname]" type="text" value="${value.lname}" data-input-value />
                                        </div>
                                    </div>
                                </div>
                                <div class="cms-col-1-3">
                                    <div class="cms-input" data-input>
                                        <div class="cms-field">
                                            <label class="cms-field-label">Email</label>
                                            <input class="cms-field-value" name="contact[${key}][email]" type="text" value="${value.email}" data-input-value />
                                        </div>
                                    </div>
                                </div>
                                <div class="cms-col-1-3">
                                    <div class="cms-input-phone">
                                        <div class="cms-select cms-input-phone-code" data-select>
                                            <div class="cms-form-icon cms-icon-phone">
                                                <i class="fas fa-mobile-alt"></i>
                                            </div>
                                            <div class="cms-field">
                                                <input class="cms-field-value" name="contact[${key}][phone_code]" type="text" value="${value.phone_code}" data-select-value readonly/>
                                            </div>
                                            <div class="cms-form-icon cms-select-arrow">
                                                <i class="fas fa-angle-down"></i>
                                            </div>
                                            <div class="cms-select-dropdown">
                                                <div class="cms-select-optional">+0</div>
                                                <div class="cms-select-optional">+1</div>
                                                <div class="cms-select-optional">+7</div>
                                                <div class="cms-select-optional">+20</div>
                                                <div class="cms-select-optional">+27</div>
                                                <div class="cms-select-optional">+30</div>
                                                <div class="cms-select-optional">+31</div>
                                                <div class="cms-select-optional">+32</div>
                                                <div class="cms-select-optional">+33</div>
                                                <div class="cms-select-optional">+34</div>
                                                <div class="cms-select-optional">+36</div>
                                                <div class="cms-select-optional">+39</div>
                                                <div class="cms-select-optional">+40</div>
                                                <div class="cms-select-optional">+41</div>
                                                <div class="cms-select-optional">+43</div>
                                                <div class="cms-select-optional">+44</div>
                                                <div class="cms-select-optional">+45</div>
                                                <div class="cms-select-optional">+46</div>
                                                <div class="cms-select-optional">+47</div>
                                                <div class="cms-select-optional">+48</div>
                                                <div class="cms-select-optional">+49</div>
                                                <div class="cms-select-optional">+51</div>
                                                <div class="cms-select-optional">+52</div>
                                                <div class="cms-select-optional">+53</div>
                                                <div class="cms-select-optional">+54</div>
                                                <div class="cms-select-optional">+55</div>
                                                <div class="cms-select-optional">+56</div>
                                                <div class="cms-select-optional">+57</div>
                                                <div class="cms-select-optional">+58</div>
                                                <div class="cms-select-optional">+60</div>
                                                <div class="cms-select-optional">+61</div>
                                                <div class="cms-select-optional">+62</div>
                                                <div class="cms-select-optional">+63</div>
                                                <div class="cms-select-optional">+64</div>
                                                <div class="cms-select-optional">+65</div>
                                                <div class="cms-select-optional">+66</div>
                                                <div class="cms-select-optional">+81</div>
                                                <div class="cms-select-optional">+82</div>
                                                <div class="cms-select-optional">+84</div>
                                                <div class="cms-select-optional">+86</div>
                                                <div class="cms-select-optional">+90</div>
                                                <div class="cms-select-optional">+91</div>
                                                <div class="cms-select-optional">+92</div>
                                                <div class="cms-select-optional">+93</div>
                                                <div class="cms-select-optional">+94</div>
                                                <div class="cms-select-optional">+95</div>
                                                <div class="cms-select-optional">+98</div>
                                                <div class="cms-select-optional">+211</div>
                                                <div class="cms-select-optional">+212</div>
                                                <div class="cms-select-optional">+213</div>
                                                <div class="cms-select-optional">+216</div>
                                                <div class="cms-select-optional">+218</div>
                                                <div class="cms-select-optional">+220</div>
                                                <div class="cms-select-optional">+221</div>
                                                <div class="cms-select-optional">+222</div>
                                                <div class="cms-select-optional">+223</div>
                                                <div class="cms-select-optional">+224</div>
                                                <div class="cms-select-optional">+225</div>
                                                <div class="cms-select-optional">+226</div>
                                                <div class="cms-select-optional">+227</div>
                                                <div class="cms-select-optional">+228</div>
                                                <div class="cms-select-optional">+229</div>
                                                <div class="cms-select-optional">+230</div>
                                                <div class="cms-select-optional">+231</div>
                                                <div class="cms-select-optional">+232</div>
                                                <div class="cms-select-optional">+233</div>
                                                <div class="cms-select-optional">+234</div>
                                                <div class="cms-select-optional">+235</div>
                                                <div class="cms-select-optional">+236</div>
                                                <div class="cms-select-optional">+237</div>
                                                <div class="cms-select-optional">+238</div>
                                                <div class="cms-select-optional">+239</div>
                                                <div class="cms-select-optional">+240</div>
                                                <div class="cms-select-optional">+241</div>
                                                <div class="cms-select-optional">+242</div>
                                                <div class="cms-select-optional">+243</div>
                                                <div class="cms-select-optional">+244</div>
                                                <div class="cms-select-optional">+245</div>
                                                <div class="cms-select-optional">+246</div>
                                                <div class="cms-select-optional">+247</div>
                                                <div class="cms-select-optional">+248</div>
                                                <div class="cms-select-optional">+249</div>
                                                <div class="cms-select-optional">+250</div>
                                                <div class="cms-select-optional">+251</div>
                                                <div class="cms-select-optional">+252</div>
                                                <div class="cms-select-optional">+253</div>
                                                <div class="cms-select-optional">+254</div>
                                                <div class="cms-select-optional">+255</div>
                                                <div class="cms-select-optional">+256</div>
                                                <div class="cms-select-optional">+257</div>
                                                <div class="cms-select-optional">+258</div>
                                                <div class="cms-select-optional">+260</div>
                                                <div class="cms-select-optional">+261</div>
                                                <div class="cms-select-optional">+262</div>
                                                <div class="cms-select-optional">+263</div>
                                                <div class="cms-select-optional">+264</div>
                                                <div class="cms-select-optional">+265</div>
                                                <div class="cms-select-optional">+266</div>
                                                <div class="cms-select-optional">+267</div>
                                                <div class="cms-select-optional">+268</div>
                                                <div class="cms-select-optional">+269</div>
                                                <div class="cms-select-optional">+290</div>
                                                <div class="cms-select-optional">+291</div>
                                                <div class="cms-select-optional">+297</div>
                                                <div class="cms-select-optional">+298</div>
                                                <div class="cms-select-optional">+299</div>
                                                <div class="cms-select-optional">+350</div>
                                                <div class="cms-select-optional">+351</div>
                                                <div class="cms-select-optional">+352</div>
                                                <div class="cms-select-optional">+353</div>
                                                <div class="cms-select-optional">+354</div>
                                                <div class="cms-select-optional">+355</div>
                                                <div class="cms-select-optional">+356</div>
                                                <div class="cms-select-optional">+357</div>
                                                <div class="cms-select-optional">+358</div>
                                                <div class="cms-select-optional">+359</div>
                                                <div class="cms-select-optional">+370</div>
                                                <div class="cms-select-optional">+371</div>
                                                <div class="cms-select-optional">+372</div>
                                                <div class="cms-select-optional">+373</div>
                                                <div class="cms-select-optional">+374</div>
                                                <div class="cms-select-optional">+375</div>
                                                <div class="cms-select-optional">+376</div>
                                                <div class="cms-select-optional">+377</div>
                                                <div class="cms-select-optional">+378</div>
                                                <div class="cms-select-optional">+379</div>
                                                <div class="cms-select-optional">+380</div>
                                                <div class="cms-select-optional">+381</div>
                                                <div class="cms-select-optional">+382</div>
                                                <div class="cms-select-optional">+385</div>
                                                <div class="cms-select-optional">+386</div>
                                                <div class="cms-select-optional">+387</div>
                                                <div class="cms-select-optional">+388</div>
                                                <div class="cms-select-optional">+389</div>
                                                <div class="cms-select-optional">+420</div>
                                                <div class="cms-select-optional">+421</div>
                                                <div class="cms-select-optional">+423</div>
                                                <div class="cms-select-optional">+500</div>
                                                <div class="cms-select-optional">+501</div>
                                                <div class="cms-select-optional">+502</div>
                                                <div class="cms-select-optional">+503</div>
                                                <div class="cms-select-optional">+504</div>
                                                <div class="cms-select-optional">+505</div>
                                                <div class="cms-select-optional">+506</div>
                                                <div class="cms-select-optional">+507</div>
                                                <div class="cms-select-optional">+508</div>
                                                <div class="cms-select-optional">+509</div>
                                                <div class="cms-select-optional">+590</div>
                                                <div class="cms-select-optional">+591</div>
                                                <div class="cms-select-optional">+592</div>
                                                <div class="cms-select-optional">+593</div>
                                                <div class="cms-select-optional">+594</div>
                                                <div class="cms-select-optional">+595</div>
                                                <div class="cms-select-optional">+596</div>
                                                <div class="cms-select-optional">+597</div>
                                                <div class="cms-select-optional">+598</div>
                                                <div class="cms-select-optional">+599</div>
                                                <div class="cms-select-optional">+670</div>
                                                <div class="cms-select-optional">+672</div>
                                                <div class="cms-select-optional">+673</div>
                                                <div class="cms-select-optional">+674</div>
                                                <div class="cms-select-optional">+675</div>
                                                <div class="cms-select-optional">+676</div>
                                                <div class="cms-select-optional">+677</div>
                                                <div class="cms-select-optional">+678</div>
                                                <div class="cms-select-optional">+679</div>
                                                <div class="cms-select-optional">+680</div>
                                                <div class="cms-select-optional">+681</div>
                                                <div class="cms-select-optional">+682</div>
                                                <div class="cms-select-optional">+683</div>
                                                <div class="cms-select-optional">+685</div>
                                                <div class="cms-select-optional">+686</div>
                                                <div class="cms-select-optional">+687</div>
                                                <div class="cms-select-optional">+688</div>
                                                <div class="cms-select-optional">+689</div>
                                                <div class="cms-select-optional">+690</div>
                                                <div class="cms-select-optional">+691</div>
                                                <div class="cms-select-optional">+692</div>
                                                <div class="cms-select-optional">+800</div>
                                                <div class="cms-select-optional">+808</div>
                                                <div class="cms-select-optional">+850</div>
                                                <div class="cms-select-optional">+852</div>
                                                <div class="cms-select-optional">+853</div>
                                                <div class="cms-select-optional">+855</div>
                                                <div class="cms-select-optional">+856</div>
                                                <div class="cms-select-optional">+870</div>
                                                <div class="cms-select-optional">+878</div>
                                                <div class="cms-select-optional">+880</div>
                                                <div class="cms-select-optional">+881</div>
                                                <div class="cms-select-optional">+882</div>
                                                <div class="cms-select-optional">+883</div>
                                                <div class="cms-select-optional">+886</div>
                                                <div class="cms-select-optional">+888</div>
                                                <div class="cms-select-optional">+960</div>
                                                <div class="cms-select-optional">+961</div>
                                                <div class="cms-select-optional">+962</div>
                                                <div class="cms-select-optional">+963</div>
                                                <div class="cms-select-optional">+964</div>
                                                <div class="cms-select-optional">+965</div>
                                                <div class="cms-select-optional">+966</div>
                                                <div class="cms-select-optional">+967</div>
                                                <div class="cms-select-optional">+968</div>
                                                <div class="cms-select-optional">+970</div>
                                                <div class="cms-select-optional">+971</div>
                                                <div class="cms-select-optional">+972</div>
                                                <div class="cms-select-optional">+973</div>
                                                <div class="cms-select-optional">+974</div>
                                                <div class="cms-select-optional">+975</div>
                                                <div class="cms-select-optional">+976</div>
                                                <div class="cms-select-optional">+977</div>
                                                <div class="cms-select-optional">+979</div>
                                                <div class="cms-select-optional">+991</div>
                                                <div class="cms-select-optional">+992</div>
                                                <div class="cms-select-optional">+993</div>
                                                <div class="cms-select-optional">+994</div>
                                                <div class="cms-select-optional">+995</div>
                                                <div class="cms-select-optional">+996</div>
                                                <div class="cms-select-optional">+998</div>
                                            </div>
                                        </div>
                                        <div class="cms-input" data-input>
                                            <div class="cms-field">
                                                <label class="cms-field-label">GSM number</label>
                                                <input class="cms-field-value" name="contact[${key}][phone_number]" type="text" value="${value.phone_number}" data-input-value />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cms-col-1-3">
                                    <div class="cms-input" data-input>
                                        <div class="cms-field">
                                            <label class="cms-field-label">Password</label>
                                            <input class="cms-field-value" name="contact[${key}][password]" type="text" value="${value.password}" data-input-value />
                                        </div>
                                    </div>
                                </div>
                                <div class="cms-col-1-3">
                                    <div class="cms-select" data-select>
                                        <div class="cms-field">
                                            <label class="cms-field-label">Language</label>
                                            <input class="cms-field-value" name="contact[${key}][language]" type="text" value="${value.language}" data-select-value readonly/>
                                        </div>
                                        <div class="cms-form-icon cms-select-arrow">
                                            <i class="fas fa-angle-down"></i>
                                        </div>
                                        <div class="cms-select-dropdown">
                                            <div class="cms-select-optional">Dutch / Flemish</div>
                                            <div class="cms-select-optional">French</div>
                                            <div class="cms-select-optional">English</div>
                                            <div class="cms-select-optional">German</div>
                                            <div class="cms-select-optional">Other</div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                        });

                        var project_html = ""
                        $.each(res.projects, function(key, project) {
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
                                                    <td colspan="2" class="toggle-td red">Selection: ${selection.creation_date} - ${selection.name}</td>
                                                    <td width="150">${selection.modal_count} Talents</td>
                                                </tr>`;
                                            });
                                        project_html += `</table>
                                    </td>
                                </tr>
                            `;
                        });

                        $("#projects").html(project_html);
                        $("#more-client-contacts").html(contact_html);
                        check_input_fields();
                        initICheck();

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

                        $("#response-msg").html("");
                        $("#clientEditModal").show();
                    } else {
                        no_data.find("span").html(res.error_msg);
                        no_data.show();
                    }
                },
                complete: function() {
                    loading.hide();
                }
            });

        });
        $("body").on("click", ".modal-content .close", function() {
            $(this).parent().parent().hide();
        });

        $("body").on("click", "#ce_unarchive_client", function() {
            var current = $(this);
            var client = current.attr("data-client");
            var loading = $("#infscr-loading");
            var no_data = $("#no-infscr-loading");
            if(client == undefined || client == "" || parseInt(client) == "NaN") {
                alert("invalid client");
                return false;
            }
            $.ajax({
                url: "/cms/clients/clients/unarchive_client",
                type: "post",
                data: {
                    id: client
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
                        location.reload();
                    }, 500);
                },
                complete: function() {
                    loading.hide();
                }
            });
        });

        $(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
            var response_msg = $("#response-msg");
            var loading = $("#infscr-loading");
            $('#update_client').ajaxForm({
                beforeSubmit: function() {
                    response_msg.html("");
                    loading.show();
                },
                success: function(res) { 
                    var res = JSON.parse(res);
                    //response_msg.html( ((res.status) ? `<p class="text-success">${res.msg}</p>` : `<p class="text-danger">${res.error_msg}</p>` ) );
                    alert(res.msg);
                },
                complete: function() {
                    loading.hide();
                }
            }); 
        }); 

        $("body").on("click", ".filterAlpha", function() {
            var current = $(this);
            $(".filterAlpha").removeClass("is-active");
            current.addClass("is-active");
            filterClients();
        });
        $("body").on("ifChecked", "#typeClient, #typeProspect", function() {
            filterClients();
        });
        function filterClients() {
            var status = $("input[name='status']:checked").val();
            var table = $("#clients tbody");
            $.ajax({
                url: "/cms/clients/clients/archive_filter_client",
                data: {
                    alpha: $(".filterAlpha.is-active").attr("data-value"),
                    status: ((status != undefined) ? status : "")
                },
                beforeSend: function() {
                    table.html(`<tr><td colspan="2" class="text-center">Loading...</td></tr>`);
                },
                success: function(res) {
                    var rows = "";
                    var data = JSON.parse(res);
                    if(data.length) {
                        $.each(data, function(key, value) {
                            rows += `<tr>
                                <td data-client="${ value.id }" class="clickable edit-client">${ value.company_name }</td>
                                <td class="clickable"><a href="/cms/projects/projects/create_project?client=${ value.id }"><i class="text-orange fa fa-calendar-check"></i> Create project</a></td>
                            </tr>`;
                        });
                        table.html(rows);
                    } else {
                        table.html(`<tr><td colspan="2" class="text-center">No records to show.</td></tr>`);
                    }
                }
            });

        }
    </script>
{/literal}
<link rel="stylesheet" type="text/css" href="/css/cms/registration.css">

<div class="cms-includes-head pr-0">
    <h1>Archived: Client list</h1>
    <div class="cms-includes-head-radio item-radio-group">
        <div class="item-radio">
            <label>Show</label>
        </div>
        <div class="item-radio">
            <input id="typeClient" type="radio" name="status" value="Client" checked/>
            <label for="typeClient">Client</label>
        </div>
        <div class="item-radio">
            <input id="typeProspect" type="radio" name="status" value="Prospect"/>
            <label for="typeProspect">Prospect</label>
        </div>
    </div>
</div>
<table id="clients" class="cms-table w-80">
    <thead>
        <tr>
            <th>Client</th>
            <th style="width: 200px;">Project</th>
        </tr>
    </thead>
    <tbody>
    {foreach from=$clients item=client}
        <tr>
            <td data-client="{$client["id"]}" class="clickable edit-client">{$client["company_name"]}</td>
            <td class="clickable"><a href="/cms/projects/projects/create_project?client={$client["id"]}"><i class="text-orange fa fa-calendar-check"></i> Create project</a></td>
        </tr>
    {/foreach}
    </tbody>
</table>
<!-- The Modal -->
<div id="clientEditModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">×</span>
    <div class="cms-container mx-auto">
        <form id="update_client" method="post" action="/cms/clients/clients/update_client" class="cms-form cms-form-create-clien">
            <input type="hidden" name="client_id" id="ce_client_id" value="" />
            <div class="cms-includes-head  align-items-center pr-0 mb-4">
                <h1 class="mb-0">Client: <span id="ce_edit_title"></span></h1>
                <div class="cms-includes-head-radio item-radio-group pt-0 align-items-center">
                    <div class="item-radio">
                        <a href="javascript:;" id="ce_unarchive_client" data-client=""><label> Unarchive </label></a>
                    </div>
                    <div class="item-radio">
                        <input id="ce-typeClient" type="radio" name="status" value="Client" checked/>
                        <label for="ce-typeClient">Client</label>
                    </div>
                    <div class="item-radio">
                        <input id="ce-typeProspect" type="radio" name="status" value="Prospect"/>
                        <label for="ce-typeProspect">Prospect</label>
                    </div>
                    <a href="" target="_blank" id="ce_create_project" class="btn cms-button-red clickble mx-2">Create Project</a>
                    <button class="btn cms-button-green clickble">Save</button>
                </div>    
            </div>
            <div id="response-msg"></div>
            <div class="cms-row">
                <div class="cms-col-1-3">
                    <div class="cms-input is-value" data-input>
                        <div class="cms-field">
                            <label class="cms-field-label">Company name</label>
                            <input class="cms-field-value" id="ce_company_name" name="company_name" type="text" value="" data-input-value />
                        </div>
                    </div>
                </div>
                <div class="cms-col-1-3">
                    <div class="cms-select is-value" data-select>
                        <div class="cms-field">
                            <label class="cms-field-label">Type of client</label>
                            <input class="cms-field-value" id="ce_type" name="type" type="text" value="" data-select-value readonly/>
                        </div>
                        <div class="cms-form-icon cms-select-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <div class="cms-select-dropdown">
                            <div class="cms-select-optional">Advertising agency</div>
                            <div class="cms-select-optional">Production company</div>
                            <div class="cms-select-optional">Photography</div>
                            <div class="cms-select-optional">Fashion company</div>
                            <div class="cms-select-optional">Filmmaker / director</div>
                            <div class="cms-select-optional">End customer / brand</div>
                            <div class="cms-select-optional">Magazine / media</div>
                            <div class="cms-select-optional">Events</div>
                        </div>
                    </div>
                </div>
                <div class="cms-col-1-3">
                    <div class="cms-input is-value" data-input>
                        <div class="cms-field">
                            <label class="cms-field-label">Website</label>
                            <input class="cms-field-value" id="ce_website" name="website" type="text" value="" data-input-value />
                        </div>
                    </div>
                </div>
                <div class="cms-col-1-3">
                    <div class="cms-input is-value" data-input>
                        <div class="cms-field">
                            <label class="cms-field-label">Street & number</label>
                            <input class="cms-field-value" id="ce_street" name="street" type="text" value="" data-input-value />
                        </div>
                    </div>
                </div>
                <div class="cms-col-1-3">
                    <div class="cms-input is-value" data-input>
                        <div class="cms-field">
                            <label class="cms-field-label">Postal code</label>
                            <input class="cms-field-value" id="ce_postal_code" name="postal_code" type="text" value="" data-input-value />
                        </div>
                    </div>
                </div>
                <div class="cms-col-1-3">
                    <div class="cms-input is-value" data-input>
                        <div class="cms-field">
                            <label class="cms-field-label">City / town</label>
                            <input class="cms-field-value" id="ce_city" name="city" type="text" value="" data-input-value />
                        </div>
                    </div>
                </div>
                <div class="cms-col-1-3">
                    <div class="cms-select is-value" data-select>
                        <div class="cms-field">
                            <label class="cms-field-label">Country</label>
                            <input class="cms-field-value" id="ce_country" name="country" type="text" value="" data-select-value readonly/>
                        </div>
                        <div class="cms-form-icon cms-select-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <div class="cms-select-dropdown">
                            <div class="cms-select-optional">Belgium</div>
                            <div class="cms-select-optional">Netherlands</div>
                            <div class="cms-select-optional">Afghanistan</div>
                            <div class="cms-select-optional">Åland Islands</div>
                            <div class="cms-select-optional">Albania</div>
                            <div class="cms-select-optional">Algeria</div>
                            <div class="cms-select-optional">American Samoa</div>
                            <div class="cms-select-optional">Andorra</div>
                            <div class="cms-select-optional">Angola</div>
                            <div class="cms-select-optional">Anguilla</div>
                            <div class="cms-select-optional">Antarctica</div>
                            <div class="cms-select-optional">Antigua and Barbuda</div>
                            <div class="cms-select-optional">Argentina</div>
                            <div class="cms-select-optional">Armenia</div>
                            <div class="cms-select-optional">Aruba</div>
                            <div class="cms-select-optional">Australia</div>
                            <div class="cms-select-optional">Austria</div>
                            <div class="cms-select-optional">Azerbaijan</div>
                            <div class="cms-select-optional">The Bahamas</div>
                            <div class="cms-select-optional">Bahrain</div>
                            <div class="cms-select-optional">Bangladesh</div>
                            <div class="cms-select-optional">Barbados</div>
                            <div class="cms-select-optional">Belarus</div>
                            <div class="cms-select-optional">Belize</div>
                            <div class="cms-select-optional">Benin</div>
                            <div class="cms-select-optional">Bermuda</div>
                            <div class="cms-select-optional">Bhutan</div>
                            <div class="cms-select-optional">Bolivia</div>
                            <div class="cms-select-optional">Bonaire</div>
                            <div class="cms-select-optional">Bosnia and Herzegovina</div>
                            <div class="cms-select-optional">Botswana</div>
                            <div class="cms-select-optional">Bouvet Island</div>
                            <div class="cms-select-optional">Brazil</div>
                            <div class="cms-select-optional">British Indian Ocean Territory</div>
                            <div class="cms-select-optional">United States Minor Outlying Islands</div>
                            <div class="cms-select-optional">Virgin Islands (British)</div>
                            <div class="cms-select-optional">Virgin Islands (U.S.)</div>
                            <div class="cms-select-optional">Brunei</div>
                            <div class="cms-select-optional">Bulgaria</div>
                            <div class="cms-select-optional">Burkina Faso</div>
                            <div class="cms-select-optional">Burundi</div>
                            <div class="cms-select-optional">Cambodia</div>
                            <div class="cms-select-optional">Cameroon</div>
                            <div class="cms-select-optional">Canada</div>
                            <div class="cms-select-optional">Cape Verde</div>
                            <div class="cms-select-optional">Cayman Islands</div>
                            <div class="cms-select-optional">Central African Republic</div>
                            <div class="cms-select-optional">Chad</div>
                            <div class="cms-select-optional">Chile</div>
                            <div class="cms-select-optional">China</div>
                            <div class="cms-select-optional">Christmas Island</div>
                            <div class="cms-select-optional">Cocos (Keeling) Islands</div>
                            <div class="cms-select-optional">Colombia</div>
                            <div class="cms-select-optional">Comoros</div>
                            <div class="cms-select-optional">Republic of the Congo</div>
                            <div class="cms-select-optional">Democratic Republic of the Congo</div>
                            <div class="cms-select-optional">Cook Islands</div>
                            <div class="cms-select-optional">Costa Rica</div>
                            <div class="cms-select-optional">Croatia</div>
                            <div class="cms-select-optional">Cuba</div>
                            <div class="cms-select-optional">Curaçao</div>
                            <div class="cms-select-optional">Cyprus</div>
                            <div class="cms-select-optional">Czech Republic</div>
                            <div class="cms-select-optional">Denmark</div>
                            <div class="cms-select-optional">Djibouti</div>
                            <div class="cms-select-optional">Dominica</div>
                            <div class="cms-select-optional">Dominican Republic</div>
                            <div class="cms-select-optional">Ecuador</div>
                            <div class="cms-select-optional">Egypt</div>
                            <div class="cms-select-optional">El Salvador</div>
                            <div class="cms-select-optional">Equatorial Guinea</div>
                            <div class="cms-select-optional">Eritrea</div>
                            <div class="cms-select-optional">Estonia</div>
                            <div class="cms-select-optional">Ethiopia</div>
                            <div class="cms-select-optional">Falkland Islands</div>
                            <div class="cms-select-optional">Faroe Islands</div>
                            <div class="cms-select-optional">Fiji</div>
                            <div class="cms-select-optional">Finland</div>
                            <div class="cms-select-optional">France</div>
                            <div class="cms-select-optional">French Guiana</div>
                            <div class="cms-select-optional">French Polynesia</div>
                            <div class="cms-select-optional">French Southern and Antarctic Lands</div>
                            <div class="cms-select-optional">Gabon</div>
                            <div class="cms-select-optional">The Gambia</div>
                            <div class="cms-select-optional">Georgia</div>
                            <div class="cms-select-optional">Germany</div>
                            <div class="cms-select-optional">Ghana</div>
                            <div class="cms-select-optional">Gibraltar</div>
                            <div class="cms-select-optional">Greece</div>
                            <div class="cms-select-optional">Greenland</div>
                            <div class="cms-select-optional">Grenada</div>
                            <div class="cms-select-optional">Guadeloupe</div>
                            <div class="cms-select-optional">Guam</div>
                            <div class="cms-select-optional">Guatemala</div>
                            <div class="cms-select-optional">Guernsey</div>
                            <div class="cms-select-optional">Guinea</div>
                            <div class="cms-select-optional">Guinea-Bissau</div>
                            <div class="cms-select-optional">Guyana</div>
                            <div class="cms-select-optional">Haiti</div>
                            <div class="cms-select-optional">Heard Island and McDonald Islands</div>
                            <div class="cms-select-optional">Holy See</div>
                            <div class="cms-select-optional">Honduras</div>
                            <div class="cms-select-optional">Hong Kong</div>
                            <div class="cms-select-optional">Hungary</div>
                            <div class="cms-select-optional">Iceland</div>
                            <div class="cms-select-optional">India</div>
                            <div class="cms-select-optional">Indonesia</div>
                            <div class="cms-select-optional">Ivory Coast</div>
                            <div class="cms-select-optional">Iran</div>
                            <div class="cms-select-optional">Iraq</div>
                            <div class="cms-select-optional">Republic of Ireland</div>
                            <div class="cms-select-optional">Isle of Man</div>
                            <div class="cms-select-optional">Israel</div>
                            <div class="cms-select-optional">Italy</div>
                            <div class="cms-select-optional">Jamaica</div>
                            <div class="cms-select-optional">Japan</div>
                            <div class="cms-select-optional">Jersey</div>
                            <div class="cms-select-optional">Jordan</div>
                            <div class="cms-select-optional">Kazakhstan</div>
                            <div class="cms-select-optional">Kenya</div>
                            <div class="cms-select-optional">Kiribati</div>
                            <div class="cms-select-optional">Kuwait</div>
                            <div class="cms-select-optional">Kyrgyzstan</div>
                            <div class="cms-select-optional">Laos</div>
                            <div class="cms-select-optional">Latvia</div>
                            <div class="cms-select-optional">Lebanon</div>
                            <div class="cms-select-optional">Lesotho</div>
                            <div class="cms-select-optional">Liberia</div>
                            <div class="cms-select-optional">Libya</div>
                            <div class="cms-select-optional">Liechtenstein</div>
                            <div class="cms-select-optional">Lithuania</div>
                            <div class="cms-select-optional">Luxembourg</div>
                            <div class="cms-select-optional">Macau</div>
                            <div class="cms-select-optional">Republic of Macedonia</div>
                            <div class="cms-select-optional">Madagascar</div>
                            <div class="cms-select-optional">Malawi</div>
                            <div class="cms-select-optional">Malaysia</div>
                            <div class="cms-select-optional">Maldives</div>
                            <div class="cms-select-optional">Mali</div>
                            <div class="cms-select-optional">Malta</div>
                            <div class="cms-select-optional">Marshall Islands</div>
                            <div class="cms-select-optional">Martinique</div>
                            <div class="cms-select-optional">Mauritania</div>
                            <div class="cms-select-optional">Mauritius</div>
                            <div class="cms-select-optional">Mayotte</div>
                            <div class="cms-select-optional">Mexico</div>
                            <div class="cms-select-optional">Federated States of Micronesia</div>
                            <div class="cms-select-optional">Moldova</div>
                            <div class="cms-select-optional">Monaco</div>
                            <div class="cms-select-optional">Mongolia</div>
                            <div class="cms-select-optional">Montenegro</div>
                            <div class="cms-select-optional">Montserrat</div>
                            <div class="cms-select-optional">Morocco</div>
                            <div class="cms-select-optional">Mozambique</div>
                            <div class="cms-select-optional">Myanmar</div>
                            <div class="cms-select-optional">Namibia</div>
                            <div class="cms-select-optional">Nauru</div>
                            <div class="cms-select-optional">Nepal</div>
                            <div class="cms-select-optional">New Caledonia</div>
                            <div class="cms-select-optional">New Zealand</div>
                            <div class="cms-select-optional">Nicaragua</div>
                            <div class="cms-select-optional">Niger</div>
                            <div class="cms-select-optional">Nigeria</div>
                            <div class="cms-select-optional">Niue</div>
                            <div class="cms-select-optional">Norfolk Island</div>
                            <div class="cms-select-optional">North Korea</div>
                            <div class="cms-select-optional">Northern Mariana Islands</div>
                            <div class="cms-select-optional">Norway</div>
                            <div class="cms-select-optional">Oman</div>
                            <div class="cms-select-optional">Pakistan</div>
                            <div class="cms-select-optional">Palau</div>
                            <div class="cms-select-optional">Palestine</div>
                            <div class="cms-select-optional">Panama</div>
                            <div class="cms-select-optional">Papua New Guinea</div>
                            <div class="cms-select-optional">Paraguay</div>
                            <div class="cms-select-optional">Peru</div>
                            <div class="cms-select-optional">Philippines</div>
                            <div class="cms-select-optional">Pitcairn Islands</div>
                            <div class="cms-select-optional">Poland</div>
                            <div class="cms-select-optional">Portugal</div>
                            <div class="cms-select-optional">Puerto Rico</div>
                            <div class="cms-select-optional">Qatar</div>
                            <div class="cms-select-optional">Republic of Kosovo</div>
                            <div class="cms-select-optional">Réunion</div>
                            <div class="cms-select-optional">Romania</div>
                            <div class="cms-select-optional">Russia</div>
                            <div class="cms-select-optional">Rwanda</div>
                            <div class="cms-select-optional">Saint Barthélemy</div>
                            <div class="cms-select-optional">Saint Helena</div>
                            <div class="cms-select-optional">Saint Kitts and Nevis</div>
                            <div class="cms-select-optional">Saint Lucia</div>
                            <div class="cms-select-optional">Saint Martin</div>
                            <div class="cms-select-optional">Saint Pierre and Miquelon</div>
                            <div class="cms-select-optional">Saint Vincent and the Grenadines</div>
                            <div class="cms-select-optional">Samoa</div>
                            <div class="cms-select-optional">San Marino</div>
                            <div class="cms-select-optional">São Tomé and Príncipe</div>
                            <div class="cms-select-optional">Saudi Arabia</div>
                            <div class="cms-select-optional">Senegal</div>
                            <div class="cms-select-optional">Serbia</div>
                            <div class="cms-select-optional">Seychelles</div>
                            <div class="cms-select-optional">Sierra Leone</div>
                            <div class="cms-select-optional">Singapore</div>
                            <div class="cms-select-optional">Sint Maarten</div>
                            <div class="cms-select-optional">Slovakia</div>
                            <div class="cms-select-optional">Slovenia</div>
                            <div class="cms-select-optional">Solomon Islands</div>
                            <div class="cms-select-optional">Somalia</div>
                            <div class="cms-select-optional">South Africa</div>
                            <div class="cms-select-optional">South Georgia</div>
                            <div class="cms-select-optional">South Korea</div>
                            <div class="cms-select-optional">South Sudan</div>
                            <div class="cms-select-optional">Spain</div>
                            <div class="cms-select-optional">Sri Lanka</div>
                            <div class="cms-select-optional">Sudan</div>
                            <div class="cms-select-optional">Suriname</div>
                            <div class="cms-select-optional">Svalbard and Jan Mayen</div>
                            <div class="cms-select-optional">Swaziland</div>
                            <div class="cms-select-optional">Sweden</div>
                            <div class="cms-select-optional">Switzerland</div>
                            <div class="cms-select-optional">Syria</div>
                            <div class="cms-select-optional">Taiwan</div>
                            <div class="cms-select-optional">Tajikistan</div>
                            <div class="cms-select-optional">Tanzania</div>
                            <div class="cms-select-optional">Thailand</div>
                            <div class="cms-select-optional">East Timor</div>
                            <div class="cms-select-optional">Togo</div>
                            <div class="cms-select-optional">Tokelau</div>
                            <div class="cms-select-optional">Tonga</div>
                            <div class="cms-select-optional">Trinidad and Tobago</div>
                            <div class="cms-select-optional">Tunisia</div>
                            <div class="cms-select-optional">Turkey</div>
                            <div class="cms-select-optional">Turkmenistan</div>
                            <div class="cms-select-optional">Turks and Caicos Islands</div>
                            <div class="cms-select-optional">Tuvalu</div>
                            <div class="cms-select-optional">Uganda</div>
                            <div class="cms-select-optional">Ukraine</div>
                            <div class="cms-select-optional">United Arab Emirates</div>
                            <div class="cms-select-optional">United Kingdom</div>
                            <div class="cms-select-optional">United States</div>
                            <div class="cms-select-optional">Uruguay</div>
                            <div class="cms-select-optional">Uzbekistan</div>
                            <div class="cms-select-optional">Vanuatu</div>
                            <div class="cms-select-optional">Venezuela</div>
                            <div class="cms-select-optional">Vietnam</div>
                            <div class="cms-select-optional">Wallis and Futuna</div>
                            <div class="cms-select-optional">Western Sahara</div>
                            <div class="cms-select-optional">Yemen</div>
                            <div class="cms-select-optional">Zambia</div>
                            <div class="cms-select-optional">Zimbabwe</div>
                        </div>
                    </div>
                </div>
                <div class="cms-col-1-3">
                    <div class="cms-input is-value" data-input>
                        <div class="cms-field">
                            <label class="cms-field-label">VAT number</label>
                            <input class="cms-field-value" id="ce_vat_number" name="vat_number" type="text" value="" data-input-value />
                        </div>
                    </div>
                </div>
                <div class="cms-col-1-3">
                    <div class="cms-select is-value" data-select>
                        <div class="cms-field">
                            <label class="cms-field-label">Booker</label>
                            <input class="cms-field-value" id="ce_booker" name="booker" type="text" value="" data-select-value readonly/>
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
            <div class="cms-row cms-includes-head pr-0">
                <h2>Contacts / accounts</h2>
            </div>
            <div id="more-client-contacts" class="mt-20px"></div>
            <div class="cms-row mt-20px">
                <a id="cms-add-client-contact" class="cms-button cms-button-text cms-button-add-contact" href="javascript:;"><i class="fas fa-plus-circle"></i> Add contact / accounts</a>
            </div>
        </form>
        <div class="cms-row cms-includes-head pr-0">
            <div class="cms-col-1-1">
                <h2>Projects</h2>
            </div>
        </div>
        <div class="cms-row cms-includes-head pr-0">
            <div class="cms-col-1-1">
                <table class="cms-table">
                    <thead>
                        <tr>
                            <th width="100">#</th>
                            <th>Project/Brand</th>
                            <th>Client</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="projects">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
{literal} 
    <script type="text/javascript">
        
    </script>
{/literal} 