{include file='site/header.tpl'}
<!-- SET: MAIN CONTENT -->
<div class="layout-wrapper">
    <main class="layout-main clearfix">

        <div class="grid">
          <div class="grid-sizer"></div>
        </div>

        <div class="grid-more">
          <span class="button">{$taalContent['homepage']['grid_button']}</span>
        </div>

        <section class="about clearfix" id="about">
            <div class="about__about">
              <i class="about__arrow fas fa-angle-double-down"></i>
              {$taalContent['homepage']['section_about']['text']}
              <a href="/{$taal}/{$taalContent.navigation.specials}" class="about__discover discover button button--white">{$taalContent.links.people_models_button}</a>
            </div>
            <div class="slider about-slider about__slider">
              <iframe src="https://www.youtube.com/embed/fcuiB9rcCwg?rel=0&autoplay=1&loop=1&showinfo=0&controls=0&playlist=fcuiB9rcCwg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
            <div class="about__tagline fadein fadein--slide-left">
              <p>{$taalContent['homepage']['section_about']['title']}</p>
            </div>
        </section>

        <section class="social-media">
            <div class="social-media__header">
              <img class="social-media__insta-logo logo social-media__insta-logo" src="/images/site/new-design/ig_glyph.png" alt="">
              <span class="social-media__title">#castingteam</span>
              <h1 style="display: none;">{$taalContent.homepage.h1}</h1>
            </div>
            <div class="social-media__instagram instagram">
              <div class="instagram__right instagram__feed">
                <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                <div class="elfsight-app-1ba258f3-746b-4262-a6bc-19fc2ba5d77e"></div>
              </div>
            </div>
            <div class="social-media__links">
              <a target="_blank" href="https://www.youtube.com/channel/UCKCd9ic0t94AcO1K7z2EjBw" class="social-media__discover button"><i class="fas fa-youtube"></i>YouTube</a>
              <a target="_blank" href="https://www.instagram.com/castingteam" class="social-media__discover button">{$taalContent.homepage.button_instagram}</a>
            </div>
        </section>

        <!-- <section class="bordermodels" id="bordermodels">
            <div class="bordermodels__left">
              <img class="bordermodels__img" src="/images/site/new-design/bordermodel.jpg" alt="">
            </div>
            <div class="bordermodels__right">
              <img class="bordermodels__logo" src="/images/site/new-design/bordermodels-logo.png" alt="">
              <p class="bordermodels__description">{$taalContent['homepage']['section_bordermodels']['text']}</p>
              <a target="_blank" href="http://bordermodels.com/" class="bordermodels__discover discover button button--black">{$taalContent['homepage']['section_bordermodels']['button']}</a>
            </div>
        </section>

        <section class="vlambaar" id="vlambaar">
            <div class="vlambaar__left">
              <img class="vlambaar__logo" src="/images/site/new-design/vlambaar-logo.png" alt="">
              <p class="vlambaar__description">{$taalContent['homepage']['section_vlambaar']['text']}</p>
              <a target="_blank" href="http://vlambaar.com/" class="vlambaar__discover discover button button--black">{$taalContent['homepage']['section_vlambaar']['button']}</a>
            </div>
            <div class="vlambaar__right">
              <img class="vlambaar__img" src="/images/site/new-design/vlambaar.jpg" alt="">
            </div>
        </section> -->

        <div class="container"></div>

    </main>

<!-- END: MAIN CONTENT --> 

{include file='site/footer.tpl'}