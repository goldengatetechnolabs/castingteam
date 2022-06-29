{include file='site/header.tpl'}
<!-- SET: MAIN CONTENT -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#become_vip").click(function() {
            $("#registration_block").toggle();
        });

        $('#submit_registration_button').click(function(e) {
            validateRegistration();
            e.preventDefault();
        });
    });



</script>
{include file='site/mobile_menu.tpl'}
<section class="main_content inner_content">
    <div class="pushmenu-push pushmenu-push-toright model_over_main">
        {include file='site/sidebar.tpl'}
        <div class="grid_content model_over_cont">
            <section class="buttonset model_overview_btn">
                <div id="nav_list"> <span></span> </div>
            </section>
            <section class="content my_team">
                {if isset($registration_result)}
                    <header class="page_title mar39"><h1>{$registration_result}</h1> </header>
                        {else}
                    <header class="page_title mar39">
                        <h1>{$taalContent['vip']['title']}</h1>
                    </header>
                    <section class="content_sec_1 pad_none">
                        <p class="sub_header max-width-800">{$taalContent['vip']['subtitle']}<br><br></p>

                        <p class="max-width-800 paragraph-text">{$taalContent['vip']['p_1']}<br><br></p>


                        <p class="sub_header_inner">{$taalContent['vip']['p_2']}</p>
                        <ul>
                            <li>{$taalContent['vip']['li_1']}</li>
                            <li>{$taalContent['vip']['li_2']}</li>
                            <li>{$taalContent['vip']['li_3']}</li>
                            <li>{$taalContent['vip']['li_4']}</li>
                            <li>{$taalContent['vip']['li_5']}</li>
                            <li>{$taalContent['vip']['li_6']}</li>
                            <li>{$taalContent['vip']['li_7']}</li>

                        </ul>
                        <div class="clearfix"></div> 
                        {if !isset($user)}
                            <a href="#registration_block" id="become_vip" class="meld_btn">{$taalContent['vip']['button_a']}</a>
                        {/if}

                        <div class="cast_team_cont_btm vips" id="registration_block">
                            <h2>{$taalContent['vip']['subtitle_2']}</h2>
                            {include file='site/user_registration.tpl'}
                        </div>
                    </section>
                    <section class="content_sec_2 max-width-800">
                        <h3>{$taalContent['vip']['subtitle_3']}</h3>
                        <p class="sub_header_inner_small">{$taalContent['vip']['text_block_1']['title']}</p>
                        <p class="paragraph-text">{$taalContent['vip']['text_block_1']['p']}<br><br></p>
                        <p class="sub_header_inner_small">{$taalContent['vip']['text_block_2']['title']}</p>
                        <p class="paragraph-text">{$taalContent['vip']['text_block_2']['p']}<br><br></p>
                        <p class="sub_header_inner_small">{$taalContent['vip']['text_block_3']['title']}</p>
                        <p class="paragraph-text">{$taalContent['vip']['text_block_3']['p']}<br><br></p>
                        <p class="sub_header_inner_small">{$taalContent['vip']['text_block_4']['title']}</p>
                        <p class="paragraph-text">{$taalContent['vip']['text_block_4']['p']}<br><br></p>
                        <p class="sub_header_inner_small">{$taalContent['vip']['text_block_5']['title']}</p>
                        <p class="paragraph-text">{$taalContent['vip']['text_block_5']['p']}<br><br></p>
                        <p class="sub_header_inner_small">{$taalContent['vip']['text_block_6']['title']}</p>
                        <p class="paragraph-text">{$taalContent['vip']['text_block_6']['p']}<br><br></p>
                        <p class="sub_header_inner_small">{$taalContent['vip']['text_block_7']['title']}</p>
                        <p class="paragraph-text">{$taalContent['vip']['text_block_7']['p']}</p>
                        <div class="clearfix"></div>
                    </section>
                {/if}
            </section>
            <!-- End Content --> 
        </div>
        <!-- End Container --> 
    </div>
</section>
<!-- END: MAIN CONTENT --> 

{include file='site/footer.tpl'}