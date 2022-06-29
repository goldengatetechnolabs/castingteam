<nav class="pushmenu pushmenu-open">
    <div class="side_top_links">
        <ul>
            <li>{if $stap_passed > 1}<i class="fa fa-check"></i>{/if}<a  {if $stap_passed < 1}style="color:rgba(255,255,255,0.3)"{else}href="1"{/if}>{$taalContent.registration.sidebar.step_1}</a>{if $stapActief eq 1}<i style="margin-left:10px;" class="fa fa-chevron-right"></i>{/if}</li>
            <li>{if $stap_passed > 2}<i class="fa fa-check"></i>{/if}<a  {if $stap_passed < 2}style="color:rgba(255,255,255,0.3)"{else}href="2"{/if}>{$taalContent.registration.sidebar.step_2}</a>{if $stapActief eq 2}<i style="margin-left:10px;" class="fa fa-chevron-right"></i>{/if}</li>
            <li>{if $stap_passed > 3}<i class="fa fa-check"></i>{/if}<a  {if $stap_passed < 3}style="color:rgba(255,255,255,0.3)"{else}href="3"{/if}>{$taalContent.registration.sidebar.step_3}</a>{if $stapActief eq 3}<i style="margin-left:10px;" class="fa fa-chevron-right"></i>{/if}</li>
            <li>{if $stap_passed > 4}<i class="fa fa-check"></i>{/if}<a  {if $stap_passed < 4}style="color:rgba(255,255,255,0.3)"{else}href="4"{/if}>{$taalContent.registration.sidebar.step_4}</a>{if $stapActief eq 4}<i style="margin-left:10px;" class="fa fa-chevron-right"></i>{/if}</li>
            <li>{if $stap_passed > 5}<i class="fa fa-check"></i>{/if}<a  {if $stap_passed < 5}style="color:rgba(255,255,255,0.3)"{else}href="5"{/if}>{$taalContent.registration.sidebar.step_5}</a>{if $stapActief eq 5}<i style="margin-left:10px;" class="fa fa-chevron-right"></i>{/if}</li>
            <li>{if $stap_passed > 6}<i class="fa fa-check"></i>{/if}<a   {if $stap_passed < 6}style="color:rgba(255,255,255,0.3)"{else}href="6"{/if}>{$taalContent.registration.sidebar.step_6}</a>{if $stapActief eq 6}<i style="margin-left:10px;" class="fa fa-chevron-right"></i>{/if}</li>
        </ul>
        {include file='registration/search_code_block.tpl'}
    </div>
    {include file='registration/language_block.tpl'}
</nav>
