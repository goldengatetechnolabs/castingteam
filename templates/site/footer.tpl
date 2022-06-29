<!-- SET: FOOTER -->
    <footer class="footer">
      <div class="footer__content layout-centered l-grid">
        <div class="footer__section footer__left l-grid l-grid-70">
          <div class="l-element l-grid-33">
            <h4>{$taalContent['links']['people_models']}:</h4>
            <ul class="nobullets">
                <li><a class="no-dec" href="/{$taal}/{$taalContent.navigation.people}">{$taalContent.title.201}</a></li>
                <li><a class="no-dec" href="/{$taal}/{$taalContent.navigation.modellen}">{$taalContent.title.202}</a></li>
                <li><a class="no-dec" href="/{$taal}/{$taalContent.navigation.acteurs}">{$taalContent.title.203}</a></li>
                <li><a class="no-dec" href="/{$taal}/{$taalContent.navigation.kids}">{$taalContent.title.204}</a></li>
                <li><a class="no-dec" href="/{$taal}/{$taalContent.navigation.senioren}">{$taalContent.title.205}</a></li>
                <li><a class="no-dec" href="/{$taal}/{$taalContent.navigation.default}">{$taalContent.title.207}</a></li>
                <li><a class="no-dec" href="/{$taal}/{$taalContent.navigation.specials}">{$taalContent.title.206}</a></li>
            </ul>
          </div>
          <div class="l-element l-grid-33">
            <div class="l-mb50">
              <ul class="nobullets nomargin">
                <li><a href="/{$taal}" class="no-dec">{$taalContent['links']['homepage']}</a></li>
                <li><a href="#about" class="no-dec">{$taalContent['links']['overcastingteam']}</a></li>
              </ul>
            </div>
            <div>
              <ul class="nobullets">
                <li><a href="http://inschrijven.castingteam.com" target="_blank" class="no-dec">{$taalContent['links']['registration']}</a></li>
                <!-- <li><a href="#" class="no-dec">{$taalContent['links']['blog']}</a></li>
                <li><a href="#bordermodels" class="no-dec">{$taalContent['links']['bordermodels']}</a></li>
                <li><a href="#vlambaar" class="no-dec">{$taalContent['links']['vlambaar_people']}</a></li> -->
              </ul>
            </div>
          </div>
          <div class="l-element l-grid-33 social-links">
            <ul class="nobullets nomargin social-links__list">
              <li class="social-links__list-item">
                <a class="no-dec social-links__link" target="_blank" href="https://www.instagram.com/castingteam">
                  <i class="social-links__icon fas fa-instagram"></i>
                  <p class="social-links__description">{$taalContent.footer.link_instagram}</p>
                </a>
              </li>
              <li class="social-links__list-item">
                <a class="no-dec social-links__link" target="_blank" href="https://www.youtube.com/channel/UCKCd9ic0t94AcO1K7z2EjBw">
                  <i class="social-links__icon fas fa-youtube"></i>
                  <p class="social-links__description">{$taalContent.footer.link_youtube}</p>
                </a>
              </li>
              <li class="social-links__list-item">
                <a class="no-dec social-links__link" target="_blank" href="https://www.facebook.com/mycastingteam">
                  <i class="social-links__icon fas fa-facebook"></i>
                  <p class="social-links__description">{$taalContent.footer.link_facebook}</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="footer__section footer__right l-grid-30 l-element castingteam-contact">
          <p class="castingteam-contact__contact">
            <span class="castingteam-contact__title">{$taalContent.footer.contacts.vlaanderen_title}</span><br />
            {$taalContent.footer.contacts.vlaanderen_address}<br />
            <a href="mailto:info@castingteam.be">info@castingteam.be</a> <span class="phone">+32 (0) 3 773 52 00</span>
          </p>
          <p class="castingteam-contact__contact">
            <span class="castingteam-contact__title">{$taalContent.footer.contacts.bruxelles_title}</span><br />
            <a href="mailto:bxl@castingteam.be">bxl@castingteam.com</a> <span class="phone">+32 (0) 2 793 02 27</span>
          </p>
          <p class="castingteam-contact__contact">
            <span class="castingteam-contact__title">{$taalContent.footer.contacts.nederland_title}</span><br />
            <a href="mailto:info@castingteam.nl">info@castingteam.nl</a> <span class="phone">+31 (0) 85 130 18 12</span>
          </p>
        </div>
      </div>
    </footer>
<!-- END: FOOTER -->
  </div>
</div>
<!-- END: WRAPPER -->

</body>
</html>