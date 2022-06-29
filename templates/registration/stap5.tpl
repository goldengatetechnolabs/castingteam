{include file='registration/header.tpl'}
{literal}
<script type="text/javascript">
    $( document ).ready(function() {
        $( "#stap_submit" ).click(function(){
            naarStap6();
        });
    });
</script>
{/literal}

<section class="main_content">
    <div class="pushmenu-push pushmenu-push-toright model_over_main">
        {include file='registration/sidebar.tpl'}
        <div class="grid_content model_over_cont">
            <section class="buttonset model_overview_btn">
                <div id="nav_list"> <span></span> </div>
            </section>
            <section class="content">
                <div class="model_title clearfix">
                    <header class="page_title" style="padding-bottom: 10px; margin-bottom:30px;">
                        <h2 style="font-size:36px;">{$taalContent.registration.step_5.title}</h2>
                    </header>
                </div>
                <section class="sub_title">
                    <div>{$taalContent.registration.step_5.subtitle}</div>
                </section>
                <div class="confirmation-document" style="">
                    {include file='registration/voorwaarden.tpl'}
                </div>
                <div id="checkboxes-stap2" class="team_data input-checkbox informatie" style="padding-left:42px; margin-top : 20px; background-color:#ffffff;">
                    <div ><span class="custom_filter">
                        <span class="custom_filter_sub">
                            <span class="custom_filter_sub" style="display:inline; padding-right:30px;">
                                <label style="padding-left:0px;"><input type="checkbox" name="voorwaarden"{if isset($smarty.session.model_id)} checked="checked"{/if} /> <span class="lbl padding-8" style="color:#5a5a5a; font-family:'source_sans_prosemibold'; ">{$taalContent.registration.step_5.span}</span></label>
                            </span>
                        </span>
                    </div>
                </div>
                <div class="team_data" style="padding-left:42px; display:block; background-color: #FFFFFF;">
                    <div class="field_wrap field_txt">
                        <div class="field_wrap_inp button-block">
                            <button id="stap_submit" style="margin-top: 20px; margin-bottom: 20px;">{$taalContent.registration.step_5.button}</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
{include file='registration/footer.tpl'}
