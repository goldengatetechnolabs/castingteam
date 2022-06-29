{include file='site/header.tpl'}
<!-- SET: MAIN CONTENT -->
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
        {/if}
        </section>
        <!-- End Content --> 
      </div>
      <!-- End Container --> 
    </div>
  </section>
  <!-- END: MAIN CONTENT --> 

{include file='site/footer.tpl'}