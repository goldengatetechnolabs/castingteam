<div class="side_btm">
    {include file='site/filters/filter_sex.tpl'}
  <ul class='minimalist-collapse'>
    {foreach from=$filters key=index item=filter}
        {include file='site/filters/filter_'|cat:$index|cat:'.tpl'}
    {/foreach}  
  </ul>
</div>