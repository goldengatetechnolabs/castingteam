{literal}
    <script src="/js/jquery.form.js" type="text/javascript"></script>
    <script type="text/javascript">
    $('body').on("click", "#cms-add-client-contact", function() {
                var index = new Date().getTime();
                $("#more-client-contacts").append(`
                <div class="cms-row cms-includes-head pr-0">
                    <h2></h2>
                    <div class="cms-includes-head-radio item-radio-group">
                        <div class="item-radio">
                            
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
                            <div class="cms-select cms-input-phone-code" id="cms-input-phone-code_${index}" data-select>
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
                        <div class="cms-select" id="cms-select-language_${index}" data-select>
                            <div class="cms-field">
                                <select name="contact[${index}][language]" id="language${index}" class="custom-select">
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
                initSelect2('#cc'+index, '#cms-input-phone-code_'+index);
                initSelect2('#language'+index, '#cms-select-language_'+index);
            });
            $("body").on("click", ".remove-contact", function() {
                var element = $(this);
                var current = element.parent().parent().parent()
                $(current).next().remove();
                current.remove();
            });
            $(document).ready(function() { 
                // bind 'myForm' and provide a simple callback function 
                var response_msg = $("#response-msg");
                $('#create-client').ajaxForm({
                    beforeSubmit: function() {
                        response_msg.html("");
                    },
                    resetForm: true,
                    success: function(res) { 
                        var res = JSON.parse(res);
                        //response_msg.html( ((res.status) ? `<p class="text-success">${res.msg}</p>` : `<p class="text-danger">${res.error_msg}</p>` ) );
                        alert(res.msg);
                    }
                }); 

                initSelect2('#country', '#cms-select');
                initSelect2('#cc', '#cms-input-phone-code');
                initSelect2('#type-client', '#type-cms-select');
                initSelect2('#language', '#cms-select-language');
                initSelect2('#booker', '#cms-select-booker');

            });
    </script>
{/literal}
<link rel="stylesheet" type="text/css" href="/css/cms/registration.css">
<form id="create-client" action="/cms/clients/clients/store_client" method="post" class="cms-form cms-form-create-clien">
    <div class="cms-includes-head">
        <h1>Create client or prospect</h1>
        <div class="cms-includes-head-radio item-radio-group">
            <div class="item-radio">
                <input id="typeClient" type="radio" name="status" value="Client" checked/>
                <label for="typeClient">Client</label>
            </div>
            <div class="item-radio">
                <input id="typeProspect" type="radio" name="status" value="Prospect"/>
                <label for="typeProspect">Prospect</label>
            </div>
        </div>
        <button class="cms-button cms-button-green">Create</button>
    </div>
    <div class="cms-row">
        <div class="cms-col-1-3">
            <div class="cms-input" data-input>
                <div class="cms-field">
                    <label class="cms-field-label">Company name</label>
                    <input class="cms-field-value" name="company_name" type="text" value="" data-input-value />
                </div>
            </div>
        </div>
        <div class="cms-col-1-3">
            <div class="cms-select" id="type-cms-select" data-select>
                <div class="cms-field">
                    <select name="type" id="type-client" class="select2">
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
            <div class="cms-input" data-input>
                <div class="cms-field">
                    <label class="cms-field-label">Website</label>
                    <input class="cms-field-value" name="website" type="text" value="" data-input-value />
                </div>
            </div>
        </div>
        <div class="cms-col-1-3">
            <div class="cms-input" data-input>
                <div class="cms-field">
                    <label class="cms-field-label">Street & number</label>
                    <input class="cms-field-value" name="street" type="text" value="" data-input-value />
                </div>
            </div>
        </div>
        <div class="cms-col-1-3">
            <div class="cms-input" data-input>
                <div class="cms-field">
                    <label class="cms-field-label">Postal code</label>
                    <input class="cms-field-value" name="postal_code" type="text" value="" data-input-value />
                </div>
            </div>
        </div>
        <div class="cms-col-1-3">
            <div class="cms-input" data-input>
                <div class="cms-field">
                    <label class="cms-field-label">City / town</label>
                    <input class="cms-field-value" name="city" type="text" value="" data-input-value />
                </div>
            </div>
        </div>
        <div class="cms-col-1-3">
            <div class="cms-select" id="cms-select" data-select>
                <div class="cms-field">
                    <label class="cms-field-label">Country</label> 
                    <select id="country" name="country" class="select2">
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
            <div class="cms-input" data-input>
                <div class="cms-field">
                    <label class="cms-field-label">VAT number</label>
                    <input class="cms-field-value" name="vat-number" type="text" value="" data-input-value />
                </div>
            </div>
        </div>
        <div class="cms-col-1-3">
            <div class="cms-select" id="cms-select-booker" data-select>
                <div class="cms-field">
                    <select name="booker" id="booker" class="custom-select">
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
    <div class="cms-row cms-includes-head pr-0">
        <h2>Contacts / accounts</h2>
        <div class="cms-includes-head-radio item-radio-group">
            <div class="item-radio">
                
            </div>
            <div class="item-radio-group">
                <div class="item-radio">
                    <input id="radioOptin" type="radio" name="contact[0][contact_status]" value="Opt-in" checked/>
                    <label for="radioOptin">Opt-in</label>
                </div>
                <div class="item-radio">
                    <input id="radioUnsubscribe" type="radio" name="contact[0][contact_status]" value="Unsubscribe"/>
                    <label for="radioUnsubscribe">Unsubscribe</label>
                </div>
            </div>
        </div>
    </div>
    <div class="cms-row">
        <div class="cms-col-1-3">
            <div class="cms-input" data-input>
                <div class="cms-field">
                    <label class="cms-field-label">First name</label>
                    <input class="cms-field-value" name="contact[0][fname]" type="text" value="" data-input-value />
                </div>
            </div>
        </div>
        <div class="cms-col-1-3">
            <div class="cms-input" data-input>
                <div class="cms-field">
                    <label class="cms-field-label">Last name</label>
                    <input class="cms-field-value" name="contact[0][lname]" type="text" value="" data-input-value />
                </div>
            </div>
        </div>
        <div class="cms-col-1-3">
            <div class="cms-input" data-input>
                <div class="cms-field">
                    <label class="cms-field-label">Email</label>
                    <input class="cms-field-value" name="contact[0][email]" type="text" value="" data-input-value />
                </div>
            </div>
        </div>
        <div class="cms-col-1-3">
            <div class="cms-input-phone">
                <div class="cms-select cms-input-phone-code" id="cms-input-phone-code" data-select>
                    <div class="cms-form-icon cms-icon-phone">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <div class="cms-field">
                        <select class="cc" id="cc" name="contact[0][phone_code]" data-select-value readonly>
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
                        <input class="cms-field-value" name="contact[0][phone_number]" type="text" value="" data-input-value />
                    </div>
                </div>
            </div>
        </div>
        <div class="cms-col-1-3">
            <div class="cms-input" data-input>
                <div class="cms-field">
                    <label class="cms-field-label">Password</label>
                    <input class="cms-field-value" name="contact[0][password]" type="text" value="" data-input-value />
                </div>
            </div>
        </div>
        <div class="cms-col-1-3">
            <div class="cms-select" id="cms-select-language" data-select>
                <div class="cms-field">
                    <select name="contact[0][language]" id="language" class="custom-select">
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
    <div id="more-client-contacts" class="mt-20px"></div>
    <div class="cms-row mt-20px">
        <a id="cms-add-client-contact" class="cms-button cms-button-text cms-button-add-contact" href="javascript:;"><i class="fas fa-plus-circle"></i> Add contact / accounts</a>
    </div>
    <div id="response-msg" class="mt-20px"></div>
</form>