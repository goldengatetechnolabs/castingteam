<nav class="pushmenu pushmenu-open open">

  <div class="pushmenu-title">Talent database <i class="fa fa-angle-down"></i></div>

  <script type="text/javascript">
    $(document).ready(function() {
      if ( $(".main_content.inner_content").hasClass('content-selection')) $('.pushmenu').removeClass('open');
      $(".pushmenu .pushmenu-title").click(function() {
        var _this = $(this).parents('.pushmenu');
        if (_this.hasClass('open')) _this.removeClass('open'); else _this.addClass('open');
      });
    });
  </script>

  <div class="pushmenu-content">

    <div class="side_top_links">
      <ul>
        {foreach from=$categories key=k item=category}
          <li {if $current_category eq $category['category_id']}class="current"{/if} data-id="{$category['category_id']}">
            {if $current_category eq $category['category_id']}
              <i class="fa fa-check-circle"></i>
            {else}
              <i class="fa fa-circle-thin"></i>
            {/if}
            <a href="/{$taal}/{$taalContent['navigation'][$category['codename']]}/">{$taalContent['categories'][$category['category_id']]}</a>
          </li>
        {/foreach}
      </ul>
    </div>
    <div class="side_search">
     {include file='site/search.tpl'}
    </div>
    {if $current_page eq 'innerpage'}
    {include file='site/filters.tpl'}
    {/if}

  </div>

</nav>