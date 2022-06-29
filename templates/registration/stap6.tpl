{include file='registration/header.tpl'}
<section class="main_content">
    <div class="pushmenu-push pushmenu-push-toright model_over_main">
        {include file='registration/sidebar.tpl'}
        <div class="grid_content model_over_cont">
            <section class="buttonset model_overview_btn">
                <div id="nav_list"> <span></span></div>
            </section>
            <section class="content">
                <div class="model_title clearfix">
                    <header class="page_title" style="padding-bottom: 10px; margin-bottom:30px;">
                        <h2 style="font-size:36px;">{$taalContent.registration.step_6.title}</h2>
                    </header>
                </div>
                <section class="sub_title">
                    <div>{if ! isset($smarty.session.registreren.update)}{$taalContent.registration.step_6.subtitle}{else}{$taalContent.registration.step_6.subtitle_2}{/if}</div>
                </section>
                {if ! isset($smarty.session.registreren.update)}
                <section class="sub_title">
                    <ul style="list-style-type:none; ">
                        <li>{$taalContent.registration.step_6.text_block.li_1}<span style="color:#23a1a1">{$code}</span>{$taalContent.registration.step_6.text_block.li_1_2}</li>
                        <li>{$taalContent.registration.step_6.text_block.li_2}</li>
                        <li>{$taalContent.registration.step_6.text_block.li_3}</li>
                        <li>{$taalContent.registration.step_6.text_block.li_4}</li>
                        <li><a href="/{$taal}/register/0" style="color:#000; text-decoration: underline ;">{$taalContent.registration.step_6.text_block.li_5}</a></li>
                    </ul>
                </section>
                {else}
                <section class="sub_title">
                    <ul style="list-style-type:none; ">
                        <li></li>
                    </ul>
                </section>
                {/if}
            </section>
        </div>
    </div>
</section>
{include file='registration/footer.tpl'}

