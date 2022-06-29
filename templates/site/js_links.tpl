<!-- SET: SCRIPTS --> 

<script type="text/javascript">var taal = '{$taal}'</script>
<script type="text/javascript" src="/js/site/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/js/site/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="/js/site/jquery.fancybox-buttons.js"></script>
<script type="text/javascript" src="/js/site/jquery.fancybox-media.js"></script>
<script type="text/javascript" src="/js/site/jquery.fancybox-thumbs.js"></script>
<script type="text/javascript" src="/js/site/slick.min.js"></script>
<script type="text/javascript" src="/js/functions.js"></script> 
<script type="text/javascript" src="/js/site/main.js"></script> 
<script type="text/javascript" src="/js/site/ajax.js"></script>

<script type="text/javascript" src="/js/parse_url.js"></script>

<script type="text/javascript" src="/js/site/new-design/custom.js"></script>

{if $current_page eq 'homepage'}

<script type="text/javascript" src="/js/site/new-design/build.js"></script>
<script type="text/javascript" src="/js/site/new-design/styles.js"></script>
<script type="text/javascript" src="/js/site/new-design/vendors.js"></script>
<script type="text/javascript" src="/js/site/new-design/main.js"></script>
<script type="text/javascript" src="/js/site/new-design/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="/js/site/jquery.fancybox.min.js"></script>

{else}

<script src='/js/site/jquery.minimalist.collapse.js'></script> 
<script src="/js/site/imagesloaded.pkgd.min.js"></script>
<script src="/js/site/jquery.infinitescroll.min.js"></script> 
<script src="/js/site/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="/js/site/fontsmoothie.min.js" async></script> 

{literal}
<script type="text/javascript"> 
  
$(document).ready(function () {

  var defaults__ = {
    closeTrigger:   'click',               /* Event that triggers the closing of the lightbox */
    closeOnClick:   'anywhere',          /* Close lightbox on click ('background', 'anywhere', or false) */
    closeOnEsc:     true,                  /* Close lightbox when pressing esc */
    closeIcon:      '&#10005;'            /* Close icon */
  }

  $.featherlight.defaults = defaults__;


  $('.fancybox_image').fancybox({
    tpl: {
      next     : '<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span class="button-next"></span></a>',
      prev     : '<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span class="button-prev"></span></a>'
    },
    'nextEffect': 'none',
    'prevEffect': 'none'
  });

  $('.modal_dtls_popup .top_links_pop a.voeg_card').click(function(e) {
    e.preventDefault();
    $(this).toggleClass('active');
    $('.add_model_sel').slideToggle();
  });

  $('body').on('click', '.voeg_card', function(e) {
    $(".selections-single").toggle();
    e.preventDefault();
  });

  $("body").delegate("#close_button", "click", function() {
    $("body .featherlight").remove();
    $('body').css('overflow', 'none');
    $('html').css('overflow-x', 'hidden');
    window.history.back();
  });

  $("body").delegate("#add_selection", "click", function() {
    var selection_name = $('.selections-single #selection_name').val();
    var selection = $('#selection_select').val();
    var model_id = $(this).attr('data-id');

    if (selection || selection_name) {
      addModelToSelection(model_id, selection_name, selection);
    }
  });

  $('body').on('click', '.image_alert', function() {
    if (counter() < 2) {
      jAlert(1, messages.error.imageNotAvailable);
    }
  });

  $('.close_icon,.top_contact').click(function(e) {
    $('.top_header').slideToggle(300);
    $('.index_page').toggleClass('open_drop');
  });

    $menuLeft = $('.pushmenu-left');
    $nav_list = $('#nav_list');

    $nav_list.click(function() {
      $(this).toggleClass('active');
      $('.pushmenu-push').toggleClass('pushmenu-push-toright');
      $menuLeft.toggleClass('pushmenu-open');
    });
    
  $('.minimalist-collapse').mcollapse();

    
  $('.filter_top .filter_top_rht a.diff_view').click(function(e) {
    $(this).addClass('active').siblings('a.diff_view').removeClass('active');
    $('.close_icon,.top_contact').click(function(e) {
      $('.top_header').slideToggle();
      $('.index_page').toggleClass('open_drop');
    });
  });
    
  $('.list_view').click(function(e) {
    e.preventDefault();
    $('.main2').show(500);
    $('.main1').hide(500);
    $(this).parents('.content').addClass('no_pad_cont');    
  });

  $('.grid_view').click(function(e) {
    e.preventDefault();  
    $('.main1').show(500);
    $('.main2').hide(500);
    $(this).parents('.content').removeClass('no_pad_cont');  
  });
    
});
        
$(window).load(function() {
  $('.main_content.inner_content').delay(800).animate({
    "opacity": 1
  });
});

</script>
{/literal}
{/if}

<!-- END: SCRIPTS -->