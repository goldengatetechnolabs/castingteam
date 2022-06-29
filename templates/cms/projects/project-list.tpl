{literal} 
    <script src="/js/jquery.form.js" type="text/javascript"></script>
    <script type="text/javascript">
    $("body").on("click", "[data-toggle-subtable]", function() {
        var btn = $(this)
        if(btn.find(".disabled").length == 0) {
            $(btn.attr("data-toggle-subtable")).slideToggle(0);
            btn.toggleClass("show");
        }        
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
                        <td>${project.project_no}</td>
                        <td data-project="${project.id}" class="clickable edit-project">${project.title}</td>
                        <td class="clickable edit-client" data-client="${project.client_id}">${project.company_name}</td>
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
                        <td class="clickable" style="padding: 0" data-toggle-subtable="#hidden_row${key}">
                            <div class="cms-form-icon cms-select-arrow ${((project.selections.length) == 0) ? "disabled" : ""}">
                                <i class="fas fa-angle-down"></i>
                            </div>
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



    //


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
                        $("#ce_archive_client").attr("data-client", res.client.id);
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
                        initSelect2("#ce_country", "#ce_country_cms_select");
                        var contact_html = ""
                        var contact_list = [];
                        $.each(res.contacts, function(key, value) {
                            contact_list.push({
                                element: "#ccc"+key,
                                parent_element: "#cms-input-phone-codec_"+key,
                            })
                            contact_html += `<div class="cms-row cms-includes-head pr-0">
                                <h2>Contacts / accounts</h2>
                                <div class="cms-includes-head-radio item-radio-group">
                                    <div class="item-radio">
                                        <a href="javascript:;" class="remove-contact hand"><label><i class="far fa-trash-alt mr-1"></i>Delete </label></a>
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
                                    <div class="cms-select cms-input-phone-code" id="cms-input-phone-codec_${key}" data-select>
                                        <div class="cms-form-icon cms-icon-phone">
                                            <i class="fas fa-mobile-alt"></i>
                                        </div>
                                        <div class="cms-field">
                                            <select class="cc" id="ccc${key}" name="contact[${key}][phone_code]" data-select-value readonly>
                                                <option ${(value.phone_code == "+0" ? "selected" : "")}>+0</option>
                                                <option ${(value.phone_code == "+1" ? "selected" : "")}>+1</option>
                                                <option ${(value.phone_code == "+7" ? "selected" : "")}>+7</option>
                                                <option ${(value.phone_code == "+20" ? "selected" : "")}>+20</option>
                                                <option ${(value.phone_code == "+27" ? "selected" : "")}>+27</option>
                                                <option ${(value.phone_code == "+30" ? "selected" : "")}>+30</option>
                                                <option ${(value.phone_code == "+31" ? "selected" : "")}>+31</option>
                                                <option ${(value.phone_code == "+32" ? "selected" : "")}>+32</option>
                                                <option ${(value.phone_code == "+33" ? "selected" : "")}>+33</option>
                                                <option ${(value.phone_code == "+34" ? "selected" : "")}>+34</option>
                                                <option ${(value.phone_code == "+36" ? "selected" : "")}>+36</option>
                                                <option ${(value.phone_code == "+39" ? "selected" : "")}>+39</option>
                                                <option ${(value.phone_code == "+40" ? "selected" : "")}>+40</option>
                                                <option ${(value.phone_code == "+41" ? "selected" : "")}>+41</option>
                                                <option ${(value.phone_code == "+43" ? "selected" : "")}>+43</option>
                                                <option ${(value.phone_code == "+44" ? "selected" : "")}>+44</option>
                                                <option ${(value.phone_code == "+45" ? "selected" : "")}>+45</option>
                                                <option ${(value.phone_code == "+46" ? "selected" : "")}>+46</option>
                                                <option ${(value.phone_code == "+47" ? "selected" : "")}>+47</option>
                                                <option ${(value.phone_code == "+48" ? "selected" : "")}>+48</option>
                                                <option ${(value.phone_code == "+49" ? "selected" : "")}>+49</option>
                                                <option ${(value.phone_code == "+51" ? "selected" : "")}>+51</option>
                                                <option ${(value.phone_code == "+52" ? "selected" : "")}>+52</option>
                                                <option ${(value.phone_code == "+53" ? "selected" : "")}>+53</option>
                                                <option ${(value.phone_code == "+54" ? "selected" : "")}>+54</option>
                                                <option ${(value.phone_code == "+55" ? "selected" : "")}>+55</option>
                                                <option ${(value.phone_code == "+56" ? "selected" : "")}>+56</option>
                                                <option ${(value.phone_code == "+57" ? "selected" : "")}>+57</option>
                                                <option ${(value.phone_code == "+58" ? "selected" : "")}>+58</option>
                                                <option ${(value.phone_code == "+60" ? "selected" : "")}>+60</option>
                                                <option ${(value.phone_code == "+61" ? "selected" : "")}>+61</option>
                                                <option ${(value.phone_code == "+62" ? "selected" : "")}>+62</option>
                                                <option ${(value.phone_code == "+63" ? "selected" : "")}>+63</option>
                                                <option ${(value.phone_code == "+64" ? "selected" : "")}>+64</option>
                                                <option ${(value.phone_code == "+65" ? "selected" : "")}>+65</option>
                                                <option ${(value.phone_code == "+66" ? "selected" : "")}>+66</option>
                                                <option ${(value.phone_code == "+81" ? "selected" : "")}>+81</option>
                                                <option ${(value.phone_code == "+82" ? "selected" : "")}>+82</option>
                                                <option ${(value.phone_code == "+84" ? "selected" : "")}>+84</option>
                                                <option ${(value.phone_code == "+86" ? "selected" : "")}>+86</option>
                                                <option ${(value.phone_code == "+90" ? "selected" : "")}>+90</option>
                                                <option ${(value.phone_code == "+91" ? "selected" : "")}>+91</option>
                                                <option ${(value.phone_code == "+92" ? "selected" : "")}>+92</option>
                                                <option ${(value.phone_code == "+93" ? "selected" : "")}>+93</option>
                                                <option ${(value.phone_code == "+94" ? "selected" : "")}>+94</option>
                                                <option ${(value.phone_code == "+95" ? "selected" : "")}>+95</option>
                                                <option ${(value.phone_code == "+98" ? "selected" : "")}>+98</option>
                                                <option ${(value.phone_code == "+211" ? "selected" : "")}>+211</option>
                                                <option ${(value.phone_code == "+212" ? "selected" : "")}>+212</option>
                                                <option ${(value.phone_code == "+213" ? "selected" : "")}>+213</option>
                                                <option ${(value.phone_code == "+216" ? "selected" : "")}>+216</option>
                                                <option ${(value.phone_code == "+218" ? "selected" : "")}>+218</option>
                                                <option ${(value.phone_code == "+220" ? "selected" : "")}>+220</option>
                                                <option ${(value.phone_code == "+221" ? "selected" : "")}>+221</option>
                                                <option ${(value.phone_code == "+222" ? "selected" : "")}>+222</option>
                                                <option ${(value.phone_code == "+223" ? "selected" : "")}>+223</option>
                                                <option ${(value.phone_code == "+224" ? "selected" : "")}>+224</option>
                                                <option ${(value.phone_code == "+225" ? "selected" : "")}>+225</option>
                                                <option ${(value.phone_code == "+226" ? "selected" : "")}>+226</option>
                                                <option ${(value.phone_code == "+227" ? "selected" : "")}>+227</option>
                                                <option ${(value.phone_code == "+228" ? "selected" : "")}>+228</option>
                                                <option ${(value.phone_code == "+229" ? "selected" : "")}>+229</option>
                                                <option ${(value.phone_code == "+230" ? "selected" : "")}>+230</option>
                                                <option ${(value.phone_code == "+231" ? "selected" : "")}>+231</option>
                                                <option ${(value.phone_code == "+232" ? "selected" : "")}>+232</option>
                                                <option ${(value.phone_code == "+233" ? "selected" : "")}>+233</option>
                                                <option ${(value.phone_code == "+234" ? "selected" : "")}>+234</option>
                                                <option ${(value.phone_code == "+235" ? "selected" : "")}>+235</option>
                                                <option ${(value.phone_code == "+236" ? "selected" : "")}>+236</option>
                                                <option ${(value.phone_code == "+237" ? "selected" : "")}>+237</option>
                                                <option ${(value.phone_code == "+238" ? "selected" : "")}>+238</option>
                                                <option ${(value.phone_code == "+239" ? "selected" : "")}>+239</option>
                                                <option ${(value.phone_code == "+240" ? "selected" : "")}>+240</option>
                                                <option ${(value.phone_code == "+241" ? "selected" : "")}>+241</option>
                                                <option ${(value.phone_code == "+242" ? "selected" : "")}>+242</option>
                                                <option ${(value.phone_code == "+243" ? "selected" : "")}>+243</option>
                                                <option ${(value.phone_code == "+244" ? "selected" : "")}>+244</option>
                                                <option ${(value.phone_code == "+245" ? "selected" : "")}>+245</option>
                                                <option ${(value.phone_code == "+246" ? "selected" : "")}>+246</option>
                                                <option ${(value.phone_code == "+247" ? "selected" : "")}>+247</option>
                                                <option ${(value.phone_code == "+248" ? "selected" : "")}>+248</option>
                                                <option ${(value.phone_code == "+249" ? "selected" : "")}>+249</option>
                                                <option ${(value.phone_code == "+250" ? "selected" : "")}>+250</option>
                                                <option ${(value.phone_code == "+251" ? "selected" : "")}>+251</option>
                                                <option ${(value.phone_code == "+252" ? "selected" : "")}>+252</option>
                                                <option ${(value.phone_code == "+253" ? "selected" : "")}>+253</option>
                                                <option ${(value.phone_code == "+254" ? "selected" : "")}>+254</option>
                                                <option ${(value.phone_code == "+255" ? "selected" : "")}>+255</option>
                                                <option ${(value.phone_code == "+256" ? "selected" : "")}>+256</option>
                                                <option ${(value.phone_code == "+257" ? "selected" : "")}>+257</option>
                                                <option ${(value.phone_code == "+258" ? "selected" : "")}>+258</option>
                                                <option ${(value.phone_code == "+260" ? "selected" : "")}>+260</option>
                                                <option ${(value.phone_code == "+261" ? "selected" : "")}>+261</option>
                                                <option ${(value.phone_code == "+262" ? "selected" : "")}>+262</option>
                                                <option ${(value.phone_code == "+263" ? "selected" : "")}>+263</option>
                                                <option ${(value.phone_code == "+264" ? "selected" : "")}>+264</option>
                                                <option ${(value.phone_code == "+265" ? "selected" : "")}>+265</option>
                                                <option ${(value.phone_code == "+266" ? "selected" : "")}>+266</option>
                                                <option ${(value.phone_code == "+267" ? "selected" : "")}>+267</option>
                                                <option ${(value.phone_code == "+268" ? "selected" : "")}>+268</option>
                                                <option ${(value.phone_code == "+269" ? "selected" : "")}>+269</option>
                                                <option ${(value.phone_code == "+290" ? "selected" : "")}>+290</option>
                                                <option ${(value.phone_code == "+291" ? "selected" : "")}>+291</option>
                                                <option ${(value.phone_code == "+297" ? "selected" : "")}>+297</option>
                                                <option ${(value.phone_code == "+298" ? "selected" : "")}>+298</option>
                                                <option ${(value.phone_code == "+299" ? "selected" : "")}>+299</option>
                                                <option ${(value.phone_code == "+350" ? "selected" : "")}>+350</option>
                                                <option ${(value.phone_code == "+351" ? "selected" : "")}>+351</option>
                                                <option ${(value.phone_code == "+352" ? "selected" : "")}>+352</option>
                                                <option ${(value.phone_code == "+353" ? "selected" : "")}>+353</option>
                                                <option ${(value.phone_code == "+354" ? "selected" : "")}>+354</option>
                                                <option ${(value.phone_code == "+355" ? "selected" : "")}>+355</option>
                                                <option ${(value.phone_code == "+356" ? "selected" : "")}>+356</option>
                                                <option ${(value.phone_code == "+357" ? "selected" : "")}>+357</option>
                                                <option ${(value.phone_code == "+358" ? "selected" : "")}>+358</option>
                                                <option ${(value.phone_code == "+359" ? "selected" : "")}>+359</option>
                                                <option ${(value.phone_code == "+370" ? "selected" : "")}>+370</option>
                                                <option ${(value.phone_code == "+371" ? "selected" : "")}>+371</option>
                                                <option ${(value.phone_code == "+372" ? "selected" : "")}>+372</option>
                                                <option ${(value.phone_code == "+373" ? "selected" : "")}>+373</option>
                                                <option ${(value.phone_code == "+374" ? "selected" : "")}>+374</option>
                                                <option ${(value.phone_code == "+375" ? "selected" : "")}>+375</option>
                                                <option ${(value.phone_code == "+376" ? "selected" : "")}>+376</option>
                                                <option ${(value.phone_code == "+377" ? "selected" : "")}>+377</option>
                                                <option ${(value.phone_code == "+378" ? "selected" : "")}>+378</option>
                                                <option ${(value.phone_code == "+379" ? "selected" : "")}>+379</option>
                                                <option ${(value.phone_code == "+380" ? "selected" : "")}>+380</option>
                                                <option ${(value.phone_code == "+381" ? "selected" : "")}>+381</option>
                                                <option ${(value.phone_code == "+382" ? "selected" : "")}>+382</option>
                                                <option ${(value.phone_code == "+385" ? "selected" : "")}>+385</option>
                                                <option ${(value.phone_code == "+386" ? "selected" : "")}>+386</option>
                                                <option ${(value.phone_code == "+387" ? "selected" : "")}>+387</option>
                                                <option ${(value.phone_code == "+388" ? "selected" : "")}>+388</option>
                                                <option ${(value.phone_code == "+389" ? "selected" : "")}>+389</option>
                                                <option ${(value.phone_code == "+420" ? "selected" : "")}>+420</option>
                                                <option ${(value.phone_code == "+421" ? "selected" : "")}>+421</option>
                                                <option ${(value.phone_code == "+423" ? "selected" : "")}>+423</option>
                                                <option ${(value.phone_code == "+500" ? "selected" : "")}>+500</option>
                                                <option ${(value.phone_code == "+501" ? "selected" : "")}>+501</option>
                                                <option ${(value.phone_code == "+502" ? "selected" : "")}>+502</option>
                                                <option ${(value.phone_code == "+503" ? "selected" : "")}>+503</option>
                                                <option ${(value.phone_code == "+504" ? "selected" : "")}>+504</option>
                                                <option ${(value.phone_code == "+505" ? "selected" : "")}>+505</option>
                                                <option ${(value.phone_code == "+506" ? "selected" : "")}>+506</option>
                                                <option ${(value.phone_code == "+507" ? "selected" : "")}>+507</option>
                                                <option ${(value.phone_code == "+508" ? "selected" : "")}>+508</option>
                                                <option ${(value.phone_code == "+509" ? "selected" : "")}>+509</option>
                                                <option ${(value.phone_code == "+590" ? "selected" : "")}>+590</option>
                                                <option ${(value.phone_code == "+591" ? "selected" : "")}>+591</option>
                                                <option ${(value.phone_code == "+592" ? "selected" : "")}>+592</option>
                                                <option ${(value.phone_code == "+593" ? "selected" : "")}>+593</option>
                                                <option ${(value.phone_code == "+594" ? "selected" : "")}>+594</option>
                                                <option ${(value.phone_code == "+595" ? "selected" : "")}>+595</option>
                                                <option ${(value.phone_code == "+596" ? "selected" : "")}>+596</option>
                                                <option ${(value.phone_code == "+597" ? "selected" : "")}>+597</option>
                                                <option ${(value.phone_code == "+598" ? "selected" : "")}>+598</option>
                                                <option ${(value.phone_code == "+599" ? "selected" : "")}>+599</option>
                                                <option ${(value.phone_code == "+670" ? "selected" : "")}>+670</option>
                                                <option ${(value.phone_code == "+672" ? "selected" : "")}>+672</option>
                                                <option ${(value.phone_code == "+673" ? "selected" : "")}>+673</option>
                                                <option ${(value.phone_code == "+674" ? "selected" : "")}>+674</option>
                                                <option ${(value.phone_code == "+675" ? "selected" : "")}>+675</option>
                                                <option ${(value.phone_code == "+676" ? "selected" : "")}>+676</option>
                                                <option ${(value.phone_code == "+677" ? "selected" : "")}>+677</option>
                                                <option ${(value.phone_code == "+678" ? "selected" : "")}>+678</option>
                                                <option ${(value.phone_code == "+679" ? "selected" : "")}>+679</option>
                                                <option ${(value.phone_code == "+680" ? "selected" : "")}>+680</option>
                                                <option ${(value.phone_code == "+681" ? "selected" : "")}>+681</option>
                                                <option ${(value.phone_code == "+682" ? "selected" : "")}>+682</option>
                                                <option ${(value.phone_code == "+683" ? "selected" : "")}>+683</option>
                                                <option ${(value.phone_code == "+685" ? "selected" : "")}>+685</option>
                                                <option ${(value.phone_code == "+686" ? "selected" : "")}>+686</option>
                                                <option ${(value.phone_code == "+687" ? "selected" : "")}>+687</option>
                                                <option ${(value.phone_code == "+688" ? "selected" : "")}>+688</option>
                                                <option ${(value.phone_code == "+689" ? "selected" : "")}>+689</option>
                                                <option ${(value.phone_code == "+690" ? "selected" : "")}>+690</option>
                                                <option ${(value.phone_code == "+691" ? "selected" : "")}>+691</option>
                                                <option ${(value.phone_code == "+692" ? "selected" : "")}>+692</option>
                                                <option ${(value.phone_code == "+800" ? "selected" : "")}>+800</option>
                                                <option ${(value.phone_code == "+808" ? "selected" : "")}>+808</option>
                                                <option ${(value.phone_code == "+850" ? "selected" : "")}>+850</option>
                                                <option ${(value.phone_code == "+852" ? "selected" : "")}>+852</option>
                                                <option ${(value.phone_code == "+853" ? "selected" : "")}>+853</option>
                                                <option ${(value.phone_code == "+855" ? "selected" : "")}>+855</option>
                                                <option ${(value.phone_code == "+856" ? "selected" : "")}>+856</option>
                                                <option ${(value.phone_code == "+870" ? "selected" : "")}>+870</option>
                                                <option ${(value.phone_code == "+878" ? "selected" : "")}>+878</option>
                                                <option ${(value.phone_code == "+880" ? "selected" : "")}>+880</option>
                                                <option ${(value.phone_code == "+881" ? "selected" : "")}>+881</option>
                                                <option ${(value.phone_code == "+882" ? "selected" : "")}>+882</option>
                                                <option ${(value.phone_code == "+883" ? "selected" : "")}>+883</option>
                                                <option ${(value.phone_code == "+886" ? "selected" : "")}>+886</option>
                                                <option ${(value.phone_code == "+888" ? "selected" : "")}>+888</option>
                                                <option ${(value.phone_code == "+960" ? "selected" : "")}>+960</option>
                                                <option ${(value.phone_code == "+961" ? "selected" : "")}>+961</option>
                                                <option ${(value.phone_code == "+962" ? "selected" : "")}>+962</option>
                                                <option ${(value.phone_code == "+963" ? "selected" : "")}>+963</option>
                                                <option ${(value.phone_code == "+964" ? "selected" : "")}>+964</option>
                                                <option ${(value.phone_code == "+965" ? "selected" : "")}>+965</option>
                                                <option ${(value.phone_code == "+966" ? "selected" : "")}>+966</option>
                                                <option ${(value.phone_code == "+967" ? "selected" : "")}>+967</option>
                                                <option ${(value.phone_code == "+968" ? "selected" : "")}>+968</option>
                                                <option ${(value.phone_code == "+970" ? "selected" : "")}>+970</option>
                                                <option ${(value.phone_code == "+971" ? "selected" : "")}>+971</option>
                                                <option ${(value.phone_code == "+972" ? "selected" : "")}>+972</option>
                                                <option ${(value.phone_code == "+973" ? "selected" : "")}>+973</option>
                                                <option ${(value.phone_code == "+974" ? "selected" : "")}>+974</option>
                                                <option ${(value.phone_code == "+975" ? "selected" : "")}>+975</option>
                                                <option ${(value.phone_code == "+976" ? "selected" : "")}>+976</option>
                                                <option ${(value.phone_code == "+977" ? "selected" : "")}>+977</option>
                                                <option ${(value.phone_code == "+979" ? "selected" : "")}>+979</option>
                                                <option ${(value.phone_code == "+991" ? "selected" : "")}>+991</option>
                                                <option ${(value.phone_code == "+992" ? "selected" : "")}>+992</option>
                                                <option ${(value.phone_code == "+993" ? "selected" : "")}>+993</option>
                                                <option ${(value.phone_code == "+994" ? "selected" : "")}>+994</option>
                                                <option ${(value.phone_code == "+995" ? "selected" : "")}>+995</option>
                                                <option ${(value.phone_code == "+996" ? "selected" : "")}>+996</option>
                                                <option ${(value.phone_code == "+998" ? "selected" : "")}>+998</option>
                                            </select>
                                        </div>
                                        <div class="cms-form-icon cms-select-arrow">
                                            <i class="fas fa-angle-down"></i>
                                        </div>
                                    </div>
                                    <div class="cms-input" data-input>
                                        <div class="cms-field">
                                            <label class="cms-field-label">GSM number</label>
                                            <input class="cms-field-value" name="contact[${key}][phone_number]" type="text" value="${value.phone_number}" data-input-value />
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
                                            <select name="contact[${key}][language]" class="custom-select">
                                                <option selected="">Language</option>
                                                <option ${(value.language == "Dutch / Flemish" ? "selected" : "")}>Dutch / Flemish</option>
                                                <option ${(value.language == "French" ? "selected" : "")}>French</option>
                                                <option ${(value.language == "English" ? "selected" : "")}>English</option>
                                                <option ${(value.language == "German" ? "selected" : "")}>German</option>
                                                <option ${(value.language == "Other" ? "selected" : "")}>Other</option>
                                            </select> 
                                        </div>
                                        <div class="cms-form-icon cms-select-arrow">
                                            <i class="fas fa-angle-down"></i>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>`;
                        });

                        var project_html = ""
                        $.each(res.projects, function(key, project) {
                            project_html += `
                                <tr ${ ((project.status == 'Booked, awaiting confirmation') ? "class='alert-teal'" : "") } ${ ((project.status == 'Negative, no booking') ? "class='alert-danger'" : "") } >
                                    <td>${project.project_no}</td>
                                    <td class="clickable"><a href="/cms/projects/projects/edit_project?project=${project.id}">${project.title}</a></td>
                                    <td class="clickable">${project.company_name}</td>
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
                                    <td class="clickable" style="padding: 0" data-toggle-subtable="#hidden_row${key}">
                                        <div class="cms-form-icon cms-select-arrow ${((project.selections.length) == 0) ? "disabled" : ""}">
                                            <i class="fas fa-angle-down"></i>
                                        </div>
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

                        $("#edit_client_projects").html(project_html);
                        $("#more-client-contacts").html(contact_html);
                        check_input_fields();
                        initICheck();
                        $.each(contact_list, function(key, value) {
                            initSelect2(value.element, value.parent_element);
                        });

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
                        $("html").addClass("modal-open");
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
            $("html").removeClass("modal-open");
        });
        $("body").on("click", ".remove-contact", function() {
            var element = $(this);
            if(confirm("Are you sure you want to delete this contact?")) {
                var current = element.parent().parent().parent()
                $(current).next().remove();
                current.remove();
            }
        });

        $('body').on("click", "#cms-add-client-contact", function() {
            var index = new Date().getTime();
            $("#more-client-contacts").append(`
                <div class="cms-row cms-includes-head pr-0">
                    <h2></h2>
                    <div class="cms-includes-head-radio item-radio-group">
                        <div class="item-radio">
                            <a href="javascript:;" class="remove-contact hand"><label><i class="far fa-trash-alt mr-1"></i>Delete </label></a>
                        </div>
                        <div class="item-radio-group">
                            <div class="item-radio">
                                <input id="radioOptin${index}" type="radio" name="contact[${index}][contact_status]" value="Opt-in" checked/>
                                <label for="radioOptin${index}">Opt-in</label>
                            </div>
                            <div class="item-radio">
                                <input id="radioUnsubscribe${index}" type="radio" name="contact[${index}][contact_status]" value="Unsubscribe"/>
                                <label for="radioUnsubscribe${index}">Unsubscribe</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cms-row">
                    <div class="cms-col-1-3">
                        <div class="cms-input" data-input>
                            <div class="cms-field">
                                <label class="cms-field-label">First name</label>
                                <input class="cms-field-value" name="contact[${index}][fname]" type="text" value="" data-input-value />
                            </div>
                        </div>
                    </div>
                    <div class="cms-col-1-3">
                        <div class="cms-input" data-input>
                            <div class="cms-field">
                                <label class="cms-field-label">Last name</label>
                                <input class="cms-field-value" name="contact[${index}][lname]" type="text" value="" data-input-value />
                            </div>
                        </div>
                    </div>
                    <div class="cms-col-1-3">
                        <div class="cms-input" data-input>
                            <div class="cms-field">
                                <label class="cms-field-label">Email</label>
                                <input class="cms-field-value" name="contact[${index}][email]" type="text" value="" data-input-value />
                            </div>
                        </div>
                    </div>
                    <div class="cms-col-1-3">
                        <div class="cms-input-phone">
                            <div class="cms-select cms-input-phone-code" id="cms-input-phone-code-${index}" data-select>
                                <div class="cms-form-icon cms-icon-phone">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <div class="cms-field">
                                    <select class="cc" id="cc${index}" name="contact[${index}][phone_code]" data-select-value readonly>
                                        <option>+32</option>
                                        <option>+31</option>
                                        <option>+0</option>
                                        <option>+1</option>
                                        <option>+7</option>
                                        <option>+20</option>
                                        <option>+27</option>
                                        <option>+30</option>
                                        <option>+33</option>
                                        <option>+34</option>
                                        <option>+36</option>
                                        <option>+39</option>
                                        <option>+40</option>
                                        <option>+41</option>
                                        <option>+43</option>
                                        <option>+44</option>
                                        <option>+45</option>
                                        <option>+46</option>
                                        <option>+47</option>
                                        <option>+48</option>
                                        <option>+49</option>
                                        <option>+51</option>
                                        <option>+52</option>
                                        <option>+53</option>
                                        <option>+54</option>
                                        <option>+55</option>
                                        <option>+56</option>
                                        <option>+57</option>
                                        <option>+58</option>
                                        <option>+60</option>
                                        <option>+61</option>
                                        <option>+62</option>
                                        <option>+63</option>
                                        <option>+64</option>
                                        <option>+65</option>
                                        <option>+66</option>
                                        <option>+81</option>
                                        <option>+82</option>
                                        <option>+84</option>
                                        <option>+86</option>
                                        <option>+90</option>
                                        <option>+91</option>
                                        <option>+92</option>
                                        <option>+93</option>
                                        <option>+94</option>
                                        <option>+95</option>
                                        <option>+98</option>
                                        <option>+211</option>
                                        <option>+212</option>
                                        <option>+213</option>
                                        <option>+216</option>
                                        <option>+218</option>
                                        <option>+220</option>
                                        <option>+221</option>
                                        <option>+222</option>
                                        <option>+223</option>
                                        <option>+224</option>
                                        <option>+225</option>
                                        <option>+226</option>
                                        <option>+227</option>
                                        <option>+228</option>
                                        <option>+229</option>
                                        <option>+230</option>
                                        <option>+231</option>
                                        <option>+232</option>
                                        <option>+233</option>
                                        <option>+234</option>
                                        <option>+235</option>
                                        <option>+236</option>
                                        <option>+237</option>
                                        <option>+238</option>
                                        <option>+239</option>
                                        <option>+240</option>
                                        <option>+241</option>
                                        <option>+242</option>
                                        <option>+243</option>
                                        <option>+244</option>
                                        <option>+245</option>
                                        <option>+246</option>
                                        <option>+247</option>
                                        <option>+248</option>
                                        <option>+249</option>
                                        <option>+250</option>
                                        <option>+251</option>
                                        <option>+252</option>
                                        <option>+253</option>
                                        <option>+254</option>
                                        <option>+255</option>
                                        <option>+256</option>
                                        <option>+257</option>
                                        <option>+258</option>
                                        <option>+260</option>
                                        <option>+261</option>
                                        <option>+262</option>
                                        <option>+263</option>
                                        <option>+264</option>
                                        <option>+265</option>
                                        <option>+266</option>
                                        <option>+267</option>
                                        <option>+268</option>
                                        <option>+269</option>
                                        <option>+290</option>
                                        <option>+291</option>
                                        <option>+297</option>
                                        <option>+298</option>
                                        <option>+299</option>
                                        <option>+350</option>
                                        <option>+351</option>
                                        <option>+352</option>
                                        <option>+353</option>
                                        <option>+354</option>
                                        <option>+355</option>
                                        <option>+356</option>
                                        <option>+357</option>
                                        <option>+358</option>
                                        <option>+359</option>
                                        <option>+370</option>
                                        <option>+371</option>
                                        <option>+372</option>
                                        <option>+373</option>
                                        <option>+374</option>
                                        <option>+375</option>
                                        <option>+376</option>
                                        <option>+377</option>
                                        <option>+378</option>
                                        <option>+379</option>
                                        <option>+380</option>
                                        <option>+381</option>
                                        <option>+382</option>
                                        <option>+385</option>
                                        <option>+386</option>
                                        <option>+387</option>
                                        <option>+388</option>
                                        <option>+389</option>
                                        <option>+420</option>
                                        <option>+421</option>
                                        <option>+423</option>
                                        <option>+500</option>
                                        <option>+501</option>
                                        <option>+502</option>
                                        <option>+503</option>
                                        <option>+504</option>
                                        <option>+505</option>
                                        <option>+506</option>
                                        <option>+507</option>
                                        <option>+508</option>
                                        <option>+509</option>
                                        <option>+590</option>
                                        <option>+591</option>
                                        <option>+592</option>
                                        <option>+593</option>
                                        <option>+594</option>
                                        <option>+595</option>
                                        <option>+596</option>
                                        <option>+597</option>
                                        <option>+598</option>
                                        <option>+599</option>
                                        <option>+670</option>
                                        <option>+672</option>
                                        <option>+673</option>
                                        <option>+674</option>
                                        <option>+675</option>
                                        <option>+676</option>
                                        <option>+677</option>
                                        <option>+678</option>
                                        <option>+679</option>
                                        <option>+680</option>
                                        <option>+681</option>
                                        <option>+682</option>
                                        <option>+683</option>
                                        <option>+685</option>
                                        <option>+686</option>
                                        <option>+687</option>
                                        <option>+688</option>
                                        <option>+689</option>
                                        <option>+690</option>
                                        <option>+691</option>
                                        <option>+692</option>
                                        <option>+800</option>
                                        <option>+808</option>
                                        <option>+850</option>
                                        <option>+852</option>
                                        <option>+853</option>
                                        <option>+855</option>
                                        <option>+856</option>
                                        <option>+870</option>
                                        <option>+878</option>
                                        <option>+880</option>
                                        <option>+881</option>
                                        <option>+882</option>
                                        <option>+883</option>
                                        <option>+886</option>
                                        <option>+888</option>
                                        <option>+960</option>
                                        <option>+961</option>
                                        <option>+962</option>
                                        <option>+963</option>
                                        <option>+964</option>
                                        <option>+965</option>
                                        <option>+966</option>
                                        <option>+967</option>
                                        <option>+968</option>
                                        <option>+970</option>
                                        <option>+971</option>
                                        <option>+972</option>
                                        <option>+973</option>
                                        <option>+974</option>
                                        <option>+975</option>
                                        <option>+976</option>
                                        <option>+977</option>
                                        <option>+979</option>
                                        <option>+991</option>
                                        <option>+992</option>
                                        <option>+993</option>
                                        <option>+994</option>
                                        <option>+995</option>
                                        <option>+996</option>
                                        <option>+998</option>
                                    </select>
                                </div>
                                <div class="cms-form-icon cms-select-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </div>
                            <div class="cms-input" data-input>
                                <div class="cms-field">
                                    <label class="cms-field-label">GSM number</label>
                                    <input class="cms-field-value" name="contact[${index}][phone_number]" type="text" value="" data-input-value />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cms-col-1-3">
                        <div class="cms-input" data-input>
                            <div class="cms-field">
                                <label class="cms-field-label">Password</label>
                                <input class="cms-field-value" name="contact[${index}][password]" type="text" value="" data-input-value />
                            </div>
                        </div>
                    </div>
                    <div class="cms-col-1-3">
                        <div class="cms-select" data-select>
                            <div class="cms-field">
                                <select name="contact[${index}][language]" class="custom-select">
                                    <option selected="">Language</option>
                                    <option>Dutch / Flemish</option>
                                    <option>French</option>
                                    <option>English</option>
                                    <option>German</option>
                                    <option>Other</option>
                                </select> 
                            </div>
                            <div class="cms-form-icon cms-select-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
            `);
            check_input_fields();
            initICheck();
            initSelect2('#cc'+index, '#cms-input-phone-code-'+index);
        });



        $("body").on("click", ".edit-project", function() {

            var current = $(this);
            var project = current.attr("data-project");
            var loading = $("#infscr-loading");
            var no_data = $("#no-infscr-loading");
            if(project == undefined || project == "" || parseInt(project) == "NaN") {
                alert("invalid client");
                return false;
            }
            $.ajax({
                url: "/cms/projects/projects/edit_project_ajax",
                data: {
                    project
                },
                beforeSend: function() {
                    loading.show();
                    no_data.hide();
                },
                success: function(res) {
                    var res = JSON.parse(res);
                    console.log(res);
                    if(res.status) {
                        
                        $("#ep_project_id").val(res.project.id);
                        $("#ep_b_project_id").val(res.project.id);
                        $("#ep_archive-project").attr("data-project_id", res.project.id);
                        $("#ep_title").val(res.project.title);
                        $("#ep_display_title").html(res.project.title);
                        $("#ep_start_date").val(res.project.start_date);
                        $("#ep_status").val(res.project.status);
                        $("#ep_description").val(res.project.description);
                        $("#ep_right_and_usage").val(res.project.right_and_usage);
                        $("#ep_right_and_usage_extension").val(res.project.right_and_usage_extension);
                        $("#ep_extension_start_date").val(res.project.extension_start_date);

                        var clients_html = "<option value=''>Client</option>";
                        $.each(res.clients, function(key, value) {
                            clients_html += `<option value="${value.id}" ${((value.id == res.current_client_id) ? "selected" : "")}>${value.company_name}</option>`;
                        });
                        $("#ep_client_id").html(clients_html);

                        var contacts_html = "<option value=''>Contact</option>";
                        $.each(res.contacts, function(key, value) {
                            contacts_html += `<option value="${value.id}" ${((value.id == res.current_contact_id) ? "selected" : "")}>${value.fname} ${value.lname}</option>`;
                        });
                        $("#ep_contact_id").html(contacts_html);

                        var selections_html = "";
                        $.each(res.selections, function(key, value) {
                            selections_html += `
                            <tr>
                                <td class="toggle-td red">Selection: ${value.creation_date} - ${value.name}</td>
                                <td width="150">${value.modal_count} Talents</td>
                            </tr>`
                        });
                        $("#ep_selections").html(selections_html);

                        var budget_html = "";

                        if(res.budget.length) {

                            $.each(res.budget, function(key, value) {
                                budget_html += `
                                <tr>
                                    <td>
                                        <div class="cms-input" data-input>
                                            <div class="cms-field">
                                                <label class="cms-field-label pr-0">Talent</label>
                                                <input class="cms-field-value p-0" name="budget[${key}][talent]" type="text" value="${value.talent}" data-input-value />
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cms-input" data-input>
                                            <div class="cms-field">
                                                <input class="cms-field-value p-0 text-center currency-masked client-rate" name="budget[${key}][day_fee]" type="text" value="${value.day_fee}" data-input-value />
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cms-input" data-input>
                                            <div class="cms-field">
                                                <input class="cms-field-value p-0 text-center currency-masked client-rate" name="budget[${key}][client_rights]" type="text" value="${value.client_rights}" data-input-value />
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cms-input" data-input>
                                            <div class="cms-field">
                                                <input class="cms-field-value p-0 text-center currency-masked client-rate" name="budget[${key}][client_travel]" type="text" value="${value.client_travel}" data-input-value />
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cms-input" data-input>
                                            <div class="cms-field">
                                                <input class="cms-field-value p-0 text-center currency-masked client-rate" name="budget[${key}][client_agency]" type="text" value="${value.client_agency}" data-input-value />
                                            </div>
                                        </div>
                                    </td>
                                    <td class="bg-danger-light client-row-total">€ ${parseInt(value.day_fee) + parseInt(value.client_rights) + parseInt(value.client_travel) + parseInt(value.client_agency)}</td>
                                    <td>
                                        <div class="cms-input" data-input>
                                            <div class="cms-field">
                                                <input class="cms-field-value p-0 text-center currency-masked talent-rate" name="budget[${key}][talent_fees]" type="text" value="${value.talent_fees}" data-input-value />
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cms-input" data-input>
                                            <div class="cms-field">
                                                <input class="cms-field-value p-0 text-center currency-masked talent-rate" name="budget[${key}][talent_rights]" type="text" value="${value.talent_rights}" data-input-value />
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cms-input" data-input>
                                            <div class="cms-field">
                                                <input class="cms-field-value p-0 text-center currency-masked talent-rate" name="budget[${key}][talent_travel]" type="text" value="${value.talent_travel}" data-input-value />
                                            </div>
                                        </div>
                                    </td>
                                    <td class="bg-danger-light talent-row-total">€ ${parseInt(value.talent_fees) + parseInt(value.talent_rights) + parseInt(value.talent_travel)}</td>
                                </tr>`;
                            });

                        } else {
                            budget_html += `
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
                            </tr>`;
                        }

                        $("#budget-table-body").html(budget_html);
                        $("#client-total").html("€ " + res.total_client);
                        $("#talent-total").html("€ " + res.total_talent);
                        $("#total-reminder").html("€ " + (parseInt(res.total_client) - parseInt(res.total_talent)));
                        
                        check_input_fields();
                        initICheck();
                        init_mask();
                        $("#projectEditModal").show();
                    }
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

    
    </script>
{/literal}
<link rel="stylesheet" type="text/css" href="/css/cms/registration.css">
<!-- Project Edit -->
<div class="cms-project-edit">
    <h1>Project list</h1>
    <form id="filter_projects" action="/cms/projects/projects/filter_projects">
        <div class="cms-row mb-4">
            <div class="cms-col-1-1">
                <h4 class="title-font">Sort / Filter:</h4>
            </div>
            <div class="cms-col-1-3">
                <div class="cms-select" data-select>
                    <div class="cms-field">
                        <label class="cms-field-label">Status</label>
                        <input class="cms-field-value submit-onchange" name="status" type="text" value="All" data-select-value readonly/>
                    </div>
                    <div class="cms-form-icon cms-select-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                    <div class="cms-select-dropdown">
                        <div class="cms-select-optional">All</div>
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
                        <input class="cms-field-value submit-onchange" name="booker" type="text" value="All" data-select-value readonly/>
                    </div>
                    <div class="cms-form-icon cms-select-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                    <div class="cms-select-dropdown">
                        <div class="cms-select-optional">All</div>
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
                        <th style="padding:0; width: 46px;" ></th>
                    </tr>
                </thead>
                <tbody id="projects">
                {foreach from=$projects key=k item=project}
                    <tr {if $project["status"] == 'Booked, awaiting confirmation'} class="alert-teal" {/if} {if $project["status"] == 'Negative, no booking'} class="alert-danger" {/if}>
                        <td>{$project["project_no"]}</td>
                        <td data-project="{$project["id"]}" class="clickable edit-project">{$project["title"]}</td>
                        <td data-client="{$project["client_id"]}" class="clickable edit-client" >{$project["company_name"]}</td>
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
                        <td class="clickable " style="padding: 0" data-toggle-subtable="#hidden_row{$k}">
                            <div class="cms-form-icon cms-select-arrow {(count($project["selections"]) == 0) ? "disabled" : ""}">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </td>
                    </tr>
                    <tr id="hidden_row{$k}" class="hidden_row">
                        <td colspan="5" class="p-0">
                            <table class="cms-table" style="background: #f6f2f0;">
                                {foreach from=$project["selections"] item=selection}
                                    <tr>
                                        <td class="bg-transparent" width="100"></td>
                                        <td colspan="2" class="toggle-td red">Selection: {$selection["creation_date"]} - {$selection["name"]}</td>
                                        <td width="150">{$selection["modal_count"]} Talents</td>
                                    </tr>
                                {/foreach}
                            </table>
                        </td>
                    </tr>
                {/foreach}

                    {* <tr>
                        <td class="clickable" data-toggle-subtable="#hidden_row1">1001</td>
                        <td class="clickable" data-toggle-subtable="#hidden_row1">JBC Babies</td>
                        <td class="clickable" data-toggle-subtable="#hidden_row1">Uncle Bob</td>
                        <td class="p-0">
                            <form>
                                <div class="cms-select" data-select>
                                    <div class="cms-field">
                                        <input class="cms-field-value" name="" type="text" value="New project" data-select-value readonly/>
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
                    <tr id="hidden_row1" class="hidden_row">
                        <td colspan="4" class="p-0">
                            <table class="cms-table" style="background: #f6f2f0;">
                                <tr>
                                    <td class="bg-transparent" width="100"></td>
                                    <td colspan="2" class="toggle-td red">
                                        Person-1 is 24 years old and he is a computer programmer 
                                    </td>
                                    <td width="150">12 Talents</td>
                                    
                                </tr>
                                <tr>
                                    <td class="bg-transparent" width="100"></td>
                                    <td colspan="2" class="toggle-td blue">
                                        Person-1 is 24 years old and he is a computer programmer 
                                    </td>
                                    <td width="150">12 Talents</td>
                                    
                                </tr>
                                <tr>
                                    <td class="bg-transparent" width="100"></td>
                                    <td colspan="2" class="toggle-td red">
                                        Person-1 is 24 years old and he is a computer programmer 
                                    </td>
                                    <td width="150">12 Talents</td>
                                    
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr class="alert-teal">
                        <td class="clickable" data-toggle-subtable="#hidden_row2">1001</td>
                        <td class="clickable" data-toggle-subtable="#hidden_row2">JBC Babies</td>
                        <td class="clickable" data-toggle-subtable="#hidden_row2">Uncle Bob</td>
                        <td class="p-0">
                            <form>
                                <div class="cms-select" data-select>
                                    <div class="cms-field">
                                        <input class="cms-field-value" name="" type="text" value="New project" data-select-value readonly/>
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
                    <tr id="hidden_row2" class="hidden_row">
                        <td colspan="4" class="p-0">
                            <table class="cms-table" style=" background: #f6f2f0;">
                                <tr>
                                    <td class="bg-transparent" width="100"></td>
                                    <td colspan="2" class="toggle-td blue">
                                        Person-1 is 24 years old and he is a computer programmer 
                                    </td>
                                    <td width="150">12 Talents</td>
                                    
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr class="alert-light">
                        <td class="clickable" data-toggle-subtable="#hidden_row3">1001</td>
                        <td class="clickable" data-toggle-subtable="#hidden_row3">JBC Babies</td>
                        <td class="clickable" data-toggle-subtable="#hidden_row3">Uncle Bob</td>
                        <td class="p-0">
                            <form>
                                <div class="cms-select" data-select>
                                    <div class="cms-field">
                                        <input class="cms-field-value" name="" type="text" value="New project" data-select-value readonly/>
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
                    <tr id="hidden_row3" class="hidden_row">
                        <td colspan="4" class="p-0">
                            <table class="cms-table" style=" background: #f6f2f0;">
                                <tr>
                                    <td class="bg-transparent" width="100"></td>
                                    <td colspan="2" class="toggle-td blue">
                                        Person-1 is 24 years old and he is a computer programmer 
                                    </td>
                                    <td width="150">12 Talents</td>
                                    
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr class="alert-danger">
                        <td class="clickable" data-toggle-subtable="#hidden_row4">1001</td>
                        <td class="clickable" data-toggle-subtable="#hidden_row4">JBC Babies</td>
                        <td class="clickable" data-toggle-subtable="#hidden_row4">Uncle Bob</td>
                        <td class="p-0">
                            <form>
                                <div class="cms-select" data-select>
                                    <div class="cms-field">
                                        <input class="cms-field-value" name="" type="text" value="New project" data-select-value readonly/>
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
                    <tr id="hidden_row4" class="hidden_row">
                        <td colspan="4" class="p-0">
                            <table class="cms-table" style=" background: #f6f2f0;">
                                <tr>
                                    <td class="bg-transparent" width="100"></td>
                                    <td colspan="2" class="toggle-td blue">
                                        Person-1 is 24 years old and he is a computer programmer 
                                    </td>
                                    <td width="150">12 Talents</td>
                                </tr>
                            </table>
                        </td>
                    </tr> *}
                </tbody>
            </table>
        </div>
    </div>
</div>
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
                        <a href="javascript:;" class="hand" id="ce_archive_client" data-client=""><label><i class="far fa-trash-alt mr-1"></i>Archive </label></a>
                    </div>
                    <div class="item-radio">
                        <input id="ce-typeClient" type="radio" name="status" value="Client" checked/>
                        <label for="ce-typeClient">Client</label>
                    </div>
                    <div class="item-radio">
                        <input id="ce-typeProspect" type="radio" name="status" value="Prospect"/>
                        <label for="ce-typeProspect">Prospect</label>
                    </div>
                    <a href="" target="_blank" id="ce_create_project" class="btn cms-button-red clickbl ml-4 mr-2">Create Project</a>
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
                    <div class="cms-select" data-select>
                        <div class="cms-field">
                            <select id="ce_type" name="type" class="custom-select">
                                <option selected="">Type of client</option>
                                <option>Advertising agency</option>
                                <option>Production company</option>
                                <option>Photography</option>
                                <option>Fashion company</option>
                                <option>Filmmaker / director</option>
                                <option>End customer / brand</option>
                                <option>Magazine / media</option>
                                <option>Events</option>
                            </select> 
                        </div>
                        <div class="cms-form-icon cms-select-arrow">
                            <i class="fas fa-angle-down"></i>
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
                    <div class="cms-select" id="ce_country_cms_select" data-select>
                        <div class="cms-field">
                            <label class="cms-field-label">Country</label> 
                            <select id="ce_country" name="country" class="select2">
                                <option selected="">Country</option>
                                <option>Belgium</option>
                                <option>Netherlands</option>
                                <option>Afghanistan</option>
                                <option>Åland Islands</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                                <option>American Samoa</option>
                                <option>Andorra</option>
                                <option>Angola</option>
                                <option>Anguilla</option>
                                <option>Antarctica</option>
                                <option>Antigua and Barbuda</option>
                                <option>Argentina</option>
                                <option>Armenia</option>
                                <option>Aruba</option>
                                <option>Australia</option>
                                <option>Austria</option>
                                <option>Azerbaijan</option>
                                <option>The Bahamas</option>
                                <option>Bahrain</option>
                                <option>Bangladesh</option>
                                <option>Barbados</option>
                                <option>Belarus</option>
                                <option>Belize</option>
                                <option>Benin</option>
                                <option>Bermuda</option>
                                <option>Bhutan</option>
                                <option>Bolivia</option>
                                <option>Bonaire</option>
                                <option>Bosnia and Herzegovina</option>
                                <option>Botswana</option>
                                <option>Bouvet Island</option>
                                <option>Brazil</option>
                                <option>British Indian Ocean Territory</option>
                                <option>United States Minor Outlying Islands</option>
                                <option>Virgin Islands (British)</option>
                                <option>Virgin Islands (U.S.)</option>
                                <option>Brunei</option>
                                <option>Bulgaria</option>
                                <option>Burkina Faso</option>
                                <option>Burundi</option>
                                <option>Cambodia</option>
                                <option>Cameroon</option>
                                <option>Canada</option>
                                <option>Cape Verde</option>
                                <option>Cayman Islands</option>
                                <option>Central African Republic</option>
                                <option>Chad</option>
                                <option>Chile</option>
                                <option>China</option>
                                <option>Christmas Island</option>
                                <option>Cocos (Keeling) Islands</option>
                                <option>Colombia</option>
                                <option>Comoros</option>
                                <option>Republic of the Congo</option>
                                <option>Democratic Republic of the Congo</option>
                                <option>Cook Islands</option>
                                <option>Costa Rica</option>
                                <option>Croatia</option>
                                <option>Cuba</option>
                                <option>Curaçao</option>
                                <option>Cyprus</option>
                                <option>Czech Republic</option>
                                <option>Denmark</option>
                                <option>Djibouti</option>
                                <option>Dominica</option>
                                <option>Dominican Republic</option>
                                <option>Ecuador</option>
                                <option>Egypt</option>
                                <option>El Salvador</option>
                                <option>Equatorial Guinea</option>
                                <option>Eritrea</option>
                                <option>Estonia</option>
                                <option>Ethiopia</option>
                                <option>Falkland Islands</option>
                                <option>Faroe Islands</option>
                                <option>Fiji</option>
                                <option>Finland</option>
                                <option>France</option>
                                <option>French Guiana</option>
                                <option>French Polynesia</option>
                                <option>French Southern and Antarctic Lands</option>
                                <option>Gabon</option>
                                <option>The Gambia</option>
                                <option>Georgia</option>
                                <option>Germany</option>
                                <option>Ghana</option>
                                <option>Gibraltar</option>
                                <option>Greece</option>
                                <option>Greenland</option>
                                <option>Grenada</option>
                                <option>Guadeloupe</option>
                                <option>Guam</option>
                                <option>Guatemala</option>
                                <option>Guernsey</option>
                                <option>Guinea</option>
                                <option>Guinea-Bissau</option>
                                <option>Guyana</option>
                                <option>Haiti</option>
                                <option>Heard Island and McDonald Islands</option>
                                <option>Holy See</option>
                                <option>Honduras</option>
                                <option>Hong Kong</option>
                                <option>Hungary</option>
                                <option>Iceland</option>
                                <option>India</option>
                                <option>Indonesia</option>
                                <option>Ivory Coast</option>
                                <option>Iran</option>
                                <option>Iraq</option>
                                <option>Republic of Ireland</option>
                                <option>Isle of Man</option>
                                <option>Israel</option>
                                <option>Italy</option>
                                <option>Jamaica</option>
                                <option>Japan</option>
                                <option>Jersey</option>
                                <option>Jordan</option>
                                <option>Kazakhstan</option>
                                <option>Kenya</option>
                                <option>Kiribati</option>
                                <option>Kuwait</option>
                                <option>Kyrgyzstan</option>
                                <option>Laos</option>
                                <option>Latvia</option>
                                <option>Lebanon</option>
                                <option>Lesotho</option>
                                <option>Liberia</option>
                                <option>Libya</option>
                                <option>Liechtenstein</option>
                                <option>Lithuania</option>
                                <option>Luxembourg</option>
                                <option>Macau</option>
                                <option>Republic of Macedonia</option>
                                <option>Madagascar</option>
                                <option>Malawi</option>
                                <option>Malaysia</option>
                                <option>Maloptiones</option>
                                <option>Mali</option>
                                <option>Malta</option>
                                <option>Marshall Islands</option>
                                <option>Martinique</option>
                                <option>Mauritania</option>
                                <option>Mauritius</option>
                                <option>Mayotte</option>
                                <option>Mexico</option>
                                <option>Federated States of Micronesia</option>
                                <option>Moldova</option>
                                <option>Monaco</option>
                                <option>Mongolia</option>
                                <option>Montenegro</option>
                                <option>Montserrat</option>
                                <option>Morocco</option>
                                <option>Mozambique</option>
                                <option>Myanmar</option>
                                <option>Namibia</option>
                                <option>Nauru</option>
                                <option>Nepal</option>
                                <option>New Caledonia</option>
                                <option>New Zealand</option>
                                <option>Nicaragua</option>
                                <option>Niger</option>
                                <option>Nigeria</option>
                                <option>Niue</option>
                                <option>Norfolk Island</option>
                                <option>North Korea</option>
                                <option>Northern Mariana Islands</option>
                                <option>Norway</option>
                                <option>Oman</option>
                                <option>Pakistan</option>
                                <option>Palau</option>
                                <option>Palestine</option>
                                <option>Panama</option>
                                <option>Papua New Guinea</option>
                                <option>Paraguay</option>
                                <option>Peru</option>
                                <option>Philippines</option>
                                <option>Pitcairn Islands</option>
                                <option>Poland</option>
                                <option>Portugal</option>
                                <option>Puerto Rico</option>
                                <option>Qatar</option>
                                <option>Republic of Kosovo</option>
                                <option>Réunion</option>
                                <option>Romania</option>
                                <option>Russia</option>
                                <option>Rwanda</option>
                                <option>Saint Barthélemy</option>
                                <option>Saint Helena</option>
                                <option>Saint Kitts and Nevis</option>
                                <option>Saint Lucia</option>
                                <option>Saint Martin</option>
                                <option>Saint Pierre and Miquelon</option>
                                <option>Saint Vincent and the Grenadines</option>
                                <option>Samoa</option>
                                <option>San Marino</option>
                                <option>São Tomé and Príncipe</option>
                                <option>Saudi Arabia</option>
                                <option>Senegal</option>
                                <option>Serbia</option>
                                <option>Seychelles</option>
                                <option>Sierra Leone</option>
                                <option>Singapore</option>
                                <option>Sint Maarten</option>
                                <option>Slovakia</option>
                                <option>Slovenia</option>
                                <option>Solomon Islands</option>
                                <option>Somalia</option>
                                <option>South Africa</option>
                                <option>South Georgia</option>
                                <option>South Korea</option>
                                <option>South Sudan</option>
                                <option>Spain</option>
                                <option>Sri Lanka</option>
                                <option>Sudan</option>
                                <option>Suriname</option>
                                <option>Svalbard and Jan Mayen</option>
                                <option>Swaziland</option>
                                <option>Sweden</option>
                                <option>Switzerland</option>
                                <option>Syria</option>
                                <option>Taiwan</option>
                                <option>Tajikistan</option>
                                <option>Tanzania</option>
                                <option>Thailand</option>
                                <option>East Timor</option>
                                <option>Togo</option>
                                <option>Tokelau</option>
                                <option>Tonga</option>
                                <option>Trinidad and Tobago</option>
                                <option>Tunisia</option>
                                <option>Turkey</option>
                                <option>Turkmenistan</option>
                                <option>Turks and Caicos Islands</option>
                                <option>Tuvalu</option>
                                <option>Uganda</option>
                                <option>Ukraine</option>
                                <option>United Arab Emirates</option>
                                <option>United Kingdom</option>
                                <option>United States</option>
                                <option>Uruguay</option>
                                <option>Uzbekistan</option>
                                <option>Vanuatu</option>
                                <option>Venezuela</option>
                                <option>Vietnam</option>
                                <option>Wallis and Futuna</option>
                                <option>Western Sahara</option>
                                <option>Yemen</option>
                                <option>Zambia</option>
                                <option>Zimbabwe</option>
                            </select>
                        </div>
                        <div class="cms-form-icon cms-select-arrow">
                            <i class="fas fa-angle-down"></i>
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
                    <div class="cms-select" data-select>
                        <div class="cms-field">
                            <select id="ce_booker" name="booker" class="custom-select">
                                <option selected="">Booker</option>
                                <option>Ans Brugmans</option>
                                <option>Vincent Tjon</option>
                                <option>David Van Ammel</option>
                            </select> 
                        </div>
                        <div class="cms-form-icon cms-select-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </div>
                </div>
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
                            <th style="padding:0; width: 46px;" ></th>
                        </tr>
                    </thead>
                    <tbody id="edit_client_projects">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>

<div id="projectEditModal" class="modal">
    <div class="modal-content">
        <span class="close">×</span>
        <div class="cms-container mx-auto">
            <h1>Projects: <span id="ep_display_title"></span></h1>
            <form id="update_project" method="post" action="/cms/projects/projects/update_project" class="cms-form cms-form-create-clien">
                <input name="project_id" id="ep_project_id" type="hidden" value="" />
                <div class="cms-row">
                    <div class="cms-col-4-5" style="display: block;">
                        <div class="cms-row">
                            <div class="cms-col-1-1">
                                <div class="cms-input" data-input>
                                    <div class="cms-field">
                                        <label class="cms-field-label">Project Title</label>
                                        <input class="cms-field-value" id="ep_title" name="title" type="text" data-input-value />
                                    </div>
                                </div>
                            </div>
                            <div class="cms-col-1-2">
                                <div class="cms-select" id="cms-select" data-select>
                                    <div class="cms-field">
                                        <label class="cms-field-label">Client</label> 
                                        <select id="ep_client_id" name="client_id" class="select2">
                                            <option selected="">Client</option>
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
                                        <select id="ep_contact_id" name="contact_id" class="custom-select">
                                            <option selected="">Contact</option>
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
                                        <input class="cms-field-value no-placeholder" id="ep_start_date" name="start_date" type="date" data-input-value/>
                                    </div>
                                </div>
                            </div>
                            <div class="cms-col-1-2">
                                <div class="cms-select" data-select>
                                    <div class="cms-field">
                                        <select id="ep_status" name="status" class="custom-select">
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
                        <div class="cms-row mb-4 pb-5">
                            <div class="cms-col-1-1">
                                <div class="cms-input textarea-input" data-textarea>
                                    <div class="cms-field">
                                        <textarea class="cms-field-value" placeholder="Project Description (copy paste initial request)" id="ep_description" name="description" type="text" data-textarea-value></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="cms-col-1-1">
                                <div class="cms-input textarea-input" data-textarea>
                                    <div class="cms-field">
                                        <textarea class="cms-field-value" placeholder="Right & usage" id="ep_right_and_usage" name="right_and_usage" type="text" data-textarea-value></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="cms-col-2-3">
                            <div class="cms-input textarea-input" data-textarea>
                                <div class="cms-field">
                                    <textarea class="cms-field-value" placeholder="Rights & usage extension" id="ep_rights_and_usage_extension" name="rights_and_usage_extension" type="text" data-textarea-value></textarea>
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
                                    <input class="cms-field-value no-placeholder" id="ep_extension_start_date" name="extension_start_date" type="text" data-input-value/>
                                </div>
                            </div>
                        </div>
                            <div class="cms-col-1-1">
                                <div id="edit-project-response-msg" class="mt-20px"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cms-col-1-5 pl-4" style="display: block;">
                        <button class="cms-button cms-grid-day cms-button-green clickble mb-2">Save</button>
                        <a href="javascript:;" class="cms-button cms-grid-day Ok clickble mb-2">Book!</a>
                        <a href="javascript:;" data-project_id="" id="ep_archive-project" class="cms-button cms-grid-day cms-button-light-green mb-2"><i class="far fa-trash-alt"></i>&nbsp;  Archive</a>
                    </div>
                </div>
            </form>
            <div class="cms-row mb-5 pb-5">
                <h2 class="tt">Selections</h2>
                <table id="ep_selections" class="cms-table"></table>
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
                        <input id="ep_b_project_id" name="project_id" type="hidden" value="" />
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
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th align="left">
                                        <a id="add-budget-row" class="cms-button cms-button-text justify-content-start" href="javascript:;"><i class="fas fa-plus-circle"></i> Add Row</a>
                                    </th>
                                    <th colspan="4" align="right">Total client:</th>
                                    <td id="client-total" class="bg-danger"></td>
                                    <th colspan="3" align="right">Total talents:</th>
                                    <td id="talent-total" class="bg-danger"></td>
                                </tr>
                                <tr>
                                    <td class="bg-transparent" colspan="8"></td>
                                    <th class="bg-transparent">Total reminder</th>
                                    <td id="total-reminder" class="cms-grid-day Ok" style="width: auto;"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div>
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
        $('body').on("click", "#ep_archive-project", function() {
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
    input.forEach(function(e){
      (e.value == '') ? e.type = 'text' : e.type = 'date' ;
    });

    var response_msg = $("#edit-project-response-msg");
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