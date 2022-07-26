<?php

class Localization_De extends Localization_Language
{
    /**
     * @var string[]
     */
    protected $content = [
        'categories' =>
            [
                '201' => 'Menschen',
                '202' => 'Modelle',
                '203' => 'Schauspieler und Schauspielerinnen',
                '204' => 'Kinder & Jugendliche',
                '205' => 'Senioren',
                '206' => 'Alles',
            ],
        'title' =>
            [
                '201' => 'Menschen',
                '202' => 'Modelle',
                '203' => 'Schauspieler und Schauspielerinnen',
                '204' => 'Kinder & Jugendliche',
                '205' => 'Senioren',
                '206' => 'Alles',
                '207' => 'Neues Talent',
            ],
        'navigation' =>
            [
                'default' => 'people',
                'people' => 'people-models',
                'modellen' => 'models',
                'acteurs' => 'actors-and-actresses',
                'kids' => 'kids-and-teens',
                'senioren' => 'senior-models',
                'specials' => 'all-models-and-people'
            ],
        'links' =>
            [
                'home' => 'Startseite',
                'homepage' => 'Startseite',
                'overcastingteam' => 'Über Castingteam',
                'mycastingteam'  => '@castingteam.be',
                'logout' => 'Ausloggen',
                'new_talents' => 'Neues Talent',
                'people_models' => 'Unsere Leute',
                'people_models_button' => 'Talent-Datenbank',
                'carousel_gallery' => 'Pubs mit unseren Leuten',
                'talent_section' => 'Über uns',
                'vip' => 'VIP werden',
                'casting' => 'Casting',
                'contact' => 'Kontakt',
                'registration' => 'Anmelden!',
                'clips' => 'Clips (Youtube)',
                'profile' => 'bearbeite dein Profil',
                'blog' => 'Blog',
                'bordermodels' => 'Bordermodels',
                'vlambaar_people' => 'Vlambaar People für Events'
            ],
        'messages' =>
            [
                'login' =>
                    [
                        'success' => 'Inloggen is gelukt, welkom user_firstname!',
                        'fail' => 'Wachtwoord is niet correct, probeer opnieuw of contacteer info@castingteam.com'
                    ],
                'loading' => 'Je hebt het einde van de lijst bereikt.',
                'error' =>
                    [
                        'image_error' => 'Alleen VIPs kunnen grotere foto’s bekijken. Kijk hier voor meer info :',
                        'fields_empty' => 'All required fields must be filled out',
                        'iternal' => 'Er is een technische fout opgetreden.',
                        'codes_sending_error' => 'Er is niemand geregistreerd met dit email adres, neem gerust contact op met ons indien nodig.'
                    ],
                'info' =>
                    [
                        'registration' => 'Je registratie als VIP is succesvol verstuurd. Bij goedkeuring sturen we je zo snel mogelijk een bevestiging, alvast bedankt voor je interesse in Castingteam.',
                        'mail_sent' => 'Je selectie werd verstuurd',
                        'selection_added' => 'Toegevoegd aan selectie',
                        'codes_sent' => 'Je Castingteam code (of codes) werd verstuurd naar dit email adres. Als je geen email aankrijgt, check dan je spamfolder.',
                        'selection_added_text' => 'Model werd toegevoegd aan je selectie'
                    ],
                'front' =>
                    [
                        'verplichte_velden' => 'You have not filled in all the required form fields.',
                        'geen_geldige_email' => 'You have not provided a valid email address.',
                        'dezelfde_email' => 'The second email address entry was not the same as the first.',
                        'algemene_voorwaarden' => 'Agreeing with the Terms and Conditions is required.',
                        'niets_ingegeven' => 'You have not entered anything.',
                        'geen_model' => 'There was no model / actor found with this code.',
                        'geen_fotos' => 'You are required to upload at least 1 photo.',
                        'vergeten_verstuurd' => 'You personal code has been sent to you via email.',
                        'vergeten_fout' => 'This email address does not exist in our database.',
                        'form_talent_warning' => 'Are you sure you don\'t want to tell us something about your hobbies or talents? It will help us to create a better profile of you.',
                        'form_experience_warning' => 'You have listed experiences, but have not provided us with more information or listed any projects. Are you sure you wish to keep this field empty?',
                    ]
            ],
        'countries' =>
            [
                'belgium' => 'Belgien',
                'netherlands' => 'Niederlande',
                'france' => 'Frankreich',
                'germany' => 'Deutschland',
                'luxembourg' => 'Luxemburg',
                'uk' => 'Vereinigtes-Königreich',
            ],
        'languages' =>
            [
                'dutch' => 'Nederlands',
                'french' => 'Français',
                'english' => 'English',
                'german' => 'Deutsch'
            ],
        'parameters' =>
            [
                'length' => 'Height',
                'burst' => 'Chest',
                'taille' => 'Weist',
                'hips' => 'Hips',
                'costum' => 'shirt',
                'jeans' => 'Jeans',
                'shoes' => 'Shoe size',
                'kinder' => 'Kids size',
                'int_size' => 'Int. size',
                'cup_size' => 'Cup size',
                'country' => 'Country',
                'skin_color' => 'Skin color',
                'eyes' => 'Eyes',
                'hair_color' => 'Hair color',
                'hair_type' => 'Hair style',
                'hair_length' => 'Hair length',
                'lichaam' => 'Body',
                'experience' => 'Acteerervaring reklame'
            ],
        'filters' =>
            [
                'age' => 'Leeftijd',
                'year' => 'jaar',
                'to' => 'tot',
                'from' => 'van',
                'less_than' => 'Kleiner dan',
                'vegetation' => 'Begroeiing',
                'category' => 'Categorie',
                'hair_color' => 'Haarkleur',
                'hair' => 'Haarstijl',
                'hair_length' => 'Haarlengte',
                'feature' => 'Kenmerken',
                'jeans' => 'Jeans size',
                'size' => 'Kledingmaat',
                'shoes' => 'Schoenmaat',
                'costume' => 'Kostuummaat',
                'cup' => 'Cupmaat',
                'kinder' => 'Kindermaat',
                'int_size' => 'Int. Maat',
                'eyes_color' => 'Kleur ogen',
                'language' => 'Spreektaal',
                'length' => 'Lengte',
                'body' => 'Lichaam',
                'choose' => 'Kies',
                'hips' => 'Heupomtrek',
                'waist' => 'Taille',
                'bust' => 'Borstomtrek',
                'sizes' => 'Maten',
                'cloth_sizes' => 'Kledingmaten',
                'refine' => 'VERFIJN SELECTIE',
                'man' => 'Mannen',
                'woman' => 'Vrouwen',
                'girl' => 'Meisjes',
                'boy' => 'Jongens',
                'skin' => 'Huidskleur',
                'specific' => 'Specifiek',
                'decoration' => 'Versiering'
            ],
        'form' =>
            [
                'name' => 'Je voornaam',
                'surname' => 'Je naam',
                'email' => 'Je email',
                'email_address' => 'Je email adres',
                'email_address_reciever' => 'Email adres ontvanger',
                'comment' => 'Opmerkingen',
                'telephone' => 'Telefoonnummer',
                'company' => 'Bedrijfsnaam',
                'sector' => 'Je sector',
                'password' => 'Kies een wachtwoord',
                'tooltip' => 'Verplicht veld',
                'button' => 'Verzend',
                'sector_option' =>
                    [
                        'empty' => 'Kies',
                        'option_1' => 'Fotografie',
                        'option_2' => 'Film',
                        'option_3' => 'Reclame',
                        'option_4' => 'Casting director',
                        'option_5' => 'Eindklant',
                        'option_6' => 'Student foto of film',
                        'option_7' => 'Andere'
                    ]
            ],
        'facebook' =>
            [
                'share' => 'Castingteam vertegenwoordigd duizenden getalenteerde people, modellen, acteurs en actrices, kids & teens, seniors, specials... ult België en Nederland'
            ],
        'header' =>
            [
                'title' => 'Castingteam',
                'description' => 'Castingteam is een casting -en modellenbureau met duizenden getalenteerde people, modellen, acteurs en actrices, kids & teens, seniors en specials.',
                'contact_mail' => 'info@castingteam.com',
                'close' => 'close',
                'login' =>
                    [
                        'welcome' => 'Welkom',
                        'mail_to' => 'mail ons',
                        'registration' => 'Schrijf je in',
                        'registration_subtitle' => 'Of pas je profiel aan',
                        'login' => 'VIP login',
                        'email' => 'Email adres',
                        'password' => 'Wachtwoord',
                        'submit' => 'Meld je aan'
                    ],
                'tooltip' =>
                    [
                        'title' => 'Schrijf je hier in!',
                        'p' => 'Modellen, acteurs en actrices, edelfiguranten, kids, teens en senioren'
                    ]
            ],
        'footer' =>
            [
                'link_instagram' => 'Castingteam auf Instagram',
                'link_youtube' => 'Werbespots und Clips auf YouTube',
                'link_facebook' => 'Castingteam auf Facebook',
                'policy' => 'Deze site gebruikt cookies om het gebruik van de website te vereenvoudigen. Raadplaag onze ',
                'policy_end' => 'voor meer informatie over het gebruik van cookies en hoe u deze kan blokkeren.<br><br>Copyright Borderfield ',
                'policy_a' => 'cookie policy hier',
                'copyright' => 'Algemene voorwaarden',
                'disclaimer' => 'Disclaimer',
                'contacts' =>
                    [
                        'vlaanderen_title' => 'Castingteam Vlaanderen',
                        'vlaanderen_address' => 'Broederminstraat 7, 2018 Antwerpen',
                        'bruxelles_title' => 'Castingteam Bruxelles',
                        'nederland_title' => 'Castingteam Nederland'
                    ]
             ],
        'add_selection' =>
            [
                'field_1' => 'Maak een nieuwe selectie',
                'field_2' => 'Of neem een bewaarde selectie',
                'option' => 'Je bewaarde selecties',
                'button' => 'Verzend',
                'tooltip' => 'Verplicht veld',
                'p_1' => 'Nog geen Castingteam VIP?',
                'a' => 'Registreer je hier',
                'p_2' => ' en bewaar zoveel selecties als je wil, samen met tal van andere voordelen.'

            ],
        'homepage' =>
            [
                'h1' =>  'Castingteam is een casting -én modellenbureau; the best of both worlds.',
                'title' =>  'Für jede Idee die richtigen <span>Leute</span>',
                'grid_button' =>  'Toon meer...',
                'section_about' =>
                    [
                        'title' => 'Castingteam besteht aus Leuten, die gerne mit Menschen arbeiten; unsere leidenschaft liegt im suchen und finden von originellen und charaktervollen persönlichkeiten.',
                        'text' => '<p><strong>Castingteam ist eine Casting- und Modeling-Agentur. das Beste aus beiden Welten.</strong></p>
                                <p>Wir sind Casting-Direktoren - also suchen wir aktiv nach den richtigen Leuten für jede Idee. Gleichzeitig haben wir aber auch eine eigene Datenbank mit mehr als 6.000 Talenten und ein Netzwerk von mehr als 50.000 Mitarbeitern.</p>
                                <p>Models, Schauspieler und Schauspielerinnen, (noble) Figuren, junge Gewalt oder alte Grunts; frische neue Talente und erfahrene Profis.</p>'
                    ],
                'button_instagram' => 'Zu Instagram',
                'section_bordermodels' =>
                    [
                        'text' => 'Aus Castingteam wurde eine eigene Modellierungsabteilung erstellt; <a target="_blank" href="http://bordermodels.com/">bordermodels.com</a>, spezialisiert auf professionelle und internationale lifestyle- und modemodelle.',
                        'button' => 'Entdecken Sie Bordermodels'
                    ],
                'section_vlambaar' =>
                    [
                        'text' => 'Komme auch aus Castingteam; <a target="_blank" href="http://vlambaar.com">Vlambaar.com</a>. Vlambaar liefert Hostessen und Promoter, Schauspieler und Schauspielerinnen, Moderatoren und Moderatoren, Künstler und Models für Events und Aktivierungskampagnen.',
                        'button' => 'Entdecken Sie Vlambaar'
                    ]
            ],
        'vip' =>
            [
                'title' => 'Castingteam<br/>voor VIPs',
                'subtitle' => 'Castingteam heeft een speciaal VIP programma voor haar klanten, waarmee zij kunnen genieten van extra voordelen, extra functionaliteiten en kortingen.',
                'p_1' => 'Dit programma is volledig gratis, maar is alleen bedoeld voor fotografen, filmmakers, reclamebureau\'s en productiehuizen, die op professionele basis met people, modellen of acteurs en actrices werken.',
                'p_2' => 'Als VIP kan je...',
                'li_1' => '... genieten van kortingen, tot wel 15 %!',
                'li_2' => '... selecties van people en modellen zolang je wil bewaren',
                'li_3' => '... grotere foto’s van onze mensen bekijken',
                'li_4' => '... profielen (PDFs) doorsturen zonder onze naam op',
                'li_5' => '... gratis people, modellen of acteurs inzetten voor testshoots en creatieve experimenten',
                'li_6' => '... steeds op de hoogte blijven van nieuwe mensen',
                'li_7' => '... profiteren van ons doorverwijzingsprogramma',
                'button_a' => 'Meld je nu aan als VIP',
                'subtitle_2' => 'MELD JE AAN ALS VIP',
                'subtitle_3' => 'Even alle voordelen op een rijtje...',
                'text_block_1' =>
                    [
                        'title' => 'Genieten van kortingen',
                        'p' => 'Wij belonen graag mensen die vaak met ons werken en delen daarom graag kortingen uit. Let op, kortingen gaan steeds af van onze fee, niét van die van de people of acteurs, uiteraard!'
                    ],
                'text_block_2' =>
                    [
                        'title' => 'Selecties van people en modellen zolang je wil bewaren',
                        'p' => 'Je kan sowieso op onze site selecties maken en doorsturen, maar VIPS kunnen deze selecties zolang ze willen bewaren, in een handig overzicht op hun profielpagina.'
                    ],
                'text_block_3' =>
                    [
                        'title' => 'Grotere foto’s van onze mensen bekijken',
                        'p' => 'VIPS kunnen op foto\'s van de people of modellen klikken en een nog grotere versie bekijken of downloaden en doorsturen (Binnenkort).'
                    ],
                'text_block_4' =>
                    [
                        'title' => 'Profielen (PDFs) doorsturen zonder onze naam op',
                        'p' => 'Als VIP kan je PDFs van profielen downloaden en kiezen tussen gewone of \'blanco\' fiches (fiches zonder \'Castingteam\' op).'
                    ],
                'text_block_5' =>
                    [
                        'title' => 'Gratis people, modellen of acteurs inzetten voor testshoots en creatieve experimenten',
                        'p' => 'Castingteam wil fotografen of filmmakers gratis aan ervaren people, modellen of acteurs en actrices helpen voor creatieve experimenten. Stuur ons even wat info over je plannen en we gaan kijken hoe we je kunnen helpen aan de juiste mensen. '
                    ],
                'text_block_6' =>
                    [
                        'title' => 'Steeds op de hoogte blijven van nieuwe mensen',
                        'p' => 'Indien gewenst sturen we je graag een selectie van vers talent, nieuwe nog onontdekte people, modellen, acteurs en actrices, zodat je er als eerste mee kan werken.'
                    ],
                'text_block_7' =>
                    [
                        'title' => 'Profiteren van ons doorverwijzingsprogramma',
                        'p' => 'Als castingbureau zitten we in het midden van een groot netwerk van klanten aan één kant en professionals aan de andere kant. Wij brengen graag de ene met de andere in contact waardoor onze VIPs af en toe via onze contacten projecten kunnen boeken. '
                    ],
            ],
        'mycastingteam' =>
            [
                'title' => 'My Castingteam',
                'subtitle' => 'My Castingteam is jouw profiel pagina op onze website. Hier kan je je gegevens aanpassen, bewaarde selecties bekijken, onze tarieven raadplegen... ',
                'selections' =>
                    [
                        'title' => 'Je bewaarde selecties',
                        'button' => 'Stuur door',
                        'no_selections' => 'Je hebt nog geen selecties bewaard'
                    ],
                'pdf' =>
                    [
                        'title' => 'Onze tarieven',
                        'p' => 'Download hier onze tarieven lijst. Deze lijst wordt doorgaans één keer per jaar aangepast, daar wordt je van op de hoogte gebracht. ',
                        'button' => 'Bekijk tarieven (PDF)'
                    ],
                'update' =>
                    [
                        'title' => 'Pas je gegevens aan'
                    ]
            ],
        'casting' =>
            [
                'title' => 'Casting(team)',
                'subtitle' => 'Ons motto was vroeger “The right face for any idea” en eigenlijk is dat nog altijd zo; wij zoeken - én vinden - de juiste mensen. Punt. ',
                'text_block' =>
                    [
                        'p_1' => 'Castingteam is meer dan een casting-en modellenbureau, wij zijn casting directors; wij zijn een jong team van gedreven professionals uit de reclame-, toneel- of theaterwereld.',
                        'p_2' => 'Castings',
                        'p_3' => 'Bij moeilijke zoekopdrachten duiken we ons netwerk in of gaan we de straat op. We organiseren voor onze klanten ook video en-fotocastings bij ons in de studio; we nodigen een hoop mensen uit - naar de voorbeelden van de klant - en we maken castingclips volgens het vooropgestelde concept.',
                        'p_4' => 'Hoe wij werken',
                        'p_5' => 'De klant (reclamebureau, fotograaf, regisseur, producer…) bezorgt ons een concept van de reclamecampagne en voorbeelden van wat ze zoeken. Via verschillende kanalen gaan we de juiste mensen zoeken; via ons bestand, ons (uitgebreid) netwerk, social media of we gaan de straat op en spotten. <br><br>We sturen snel een eerste selectie naar de klant en basis daarvan gaan we een shortlist uitnodigen in onze studio. Hier staan geen beperkingen op, we nodigen zoveel mensen uit als de klant wil of nodig is. Uiteraard adviseren we de klant en gaan we helpen een keuze te maken. Daarna organiseren we één of meerdere castingmomenten, die de klant indien gewenst kan bijwonen (eigen keuze).We filmen een korte castingclip, waarbij de mensen zich even voorstellen en een stukje spelen volgens het script of concept. We begeleiden deze mensen ook, want we hebben niet altijd te maken met professionele acteurs, integendeel, vaak is het onze taak om bij \'gewone mensen’ verrassende talenten boven te halen.<br><br>Deze castingclips worden aan de klant bezorgd en samen vinden we de juiste kandidaten. Indien gewenst komen wij mee op set en gaan we de geselecteerde mensen mee begeleiden.',
                        'p_6' => 'Internationale casting',
                        'p_7' => 'Castingteam heeft een netwerk van casting directors in verschillende landen. Plan je een productie in London of Miami? Wij kunnen je in contact brengen met lokaal talent of koppelen aan de juiste mensen.'
                    ]
            ],
        'contact' =>
            [
                'title' => 'Contact',
                'text_block' =>
                    [
                        'p_1' => 'Castingteam België',
                        'p_2' => 'Castingteam Nederland',
                        'p_3' => 'Inschrijven',
                        'p_4' => 'We zijn voortdurend op zoek naar fotogenieke people, modellen, acteurs en actrices, kids & teens, senioren... inschrijven kan via',
                    ]
            ],
        'conditions' =>
            [
                'text_block_1' =>
                    [
                        'title' => 'Cookie policy',
                        'p' => ' 
              Castingteam (BORDERFIELD BVBA) maakt gebruik van cookies.<br><br>
              Cookies zijn kleine bestanden die je voorkeuren tijdens het surfen onthouden en opslaan op je eigen computer. Een cookie slaat je naam of andere gegevens niet op, ze onthouden alleen je voorkeuren en je interesses op basis van je surfgedrag.<br><br>
              Cookies kunnen NOOIT gebruikt worden om privegegevens van je computer uit te lezen of wachtwoorden te onderscheppen. Ook kunnen ze je computer niet infecteren met een virus of trojan. ze zijn dus volkomen veilig en worden al sinds de jaren 90 zonder incident gebruikt op bijna ALLE websites in de wereld. <br><br>
              De meeste browsers aanvaarden automatisch cookies. Je kan je browser zo instellen dat je gewaarschuwd wordt vooraleer een cookie wordt geplaatst of zodat cookies geweigerd worden. Meer informatie over hoe je je browser kan instellen, vindt je via de Help-functie van je browser. <br><br>
              <span class="strong">Functies van onze cookies :</span> <br><br>
              # Je ingelogd houden in je VIP account<br>
              # Selecties van modellen kunnen bewaren over verschillende sessies<br>
              # Social media API’s (Facebook, Twitter, Instagram, LinkedIn)<br>
              # Bezoekersaantallen en gebruik analyseren<br>
              # Taalkeuze onthouden'
                    ],
                'text_block_2' =>
                    [
                        'title' => 'Disclaimer',
                        'p' => ' 
              De voorwaarden van deze disclaimer zijn van toepassing op de websites www.castingteam.com / www.castingteam.be / www.castingteam.nl en www.borderfield.com. Door deze website te bezoeken en / of de op of via deze website aangeboden informatie te gebruiken, verklaart u zich akkoord met de toepasselijkheid van deze disclaimer.<br><br>
              <span class="strong">Gebruik van de website</span><br>
              De informatie op deze website is uitsluitend bedoeld als algemene informatie. Er kunnen geen rechten aan de informatie op deze website worden ontleend. Hoewel Castingteam (BORDERFIELD BVBA) zorgvuldigheid in acht neemt bij het samenstellen en onderhouden van deze website en daarbij gebruik maakt van bronnen die betrouwbaar geacht worden, kan Castingteam (BORDERFIELD BVBA) niet instaan voor de juistheid, volledigheid en actualiteit van de geboden informatie. Castingteam (BORDERFIELD BVBA) garandeert evenmin dat de website foutloos of ononderbroken zal functioneren. Castingteam (BORDERFIELD BVBA) wijst iedere aansprakelijkheid ten aanzien van de juistheid, volledigheid, actualiteit van de geboden informatie en het (ongestoord) gebruik van deze website uitdrukkelijk van de hand.<br><br>
              <span class="strong">Informatie van derden, producten en diensten</span><br>
              Wanneer Castingteam (BORDERFIELD BVBA) links naar websites van derden weergeeft, betekent dit niet dat de op of via deze websites aangeboden producten of diensten door hen worden aanbevolen. Castingteam (BORDERFIELD BVBA) aanvaardt geen aansprakelijkheid en geen enkele verantwoordelijkheid voor de inhoud, het gebruik of de beschikbaarheid van websites waarnaar wordt verwezen of die verwijzen naar deze website. Het gebruik van dergelijke links is voor eigen risico. De informatie op dergelijke websites is door Castingteam (BORDERFIELD BVBA) niet nader beoordeeld op juistheid, redelijkheid, actualiteit of volledigheid.<br><br>
              <span class="strong">Informatie gebruiken</span><br>
              De eigenaar behoudt zich alle intellectuele eigendomsrechten en andere rechten voor met betrekking tot alle op of via deze website aangeboden informatie (waaronder alle teksten, grafisch materiaal, foto’s en logo’s). Het is niet toegestaan informatie op deze website te kopiëren, te downloaden of op enigerlei wijze openbaar te maken, te verspreiden of te verveelvoudigen zonder voorafgaande schriftelijke toestemming van de eigenaar of de rechtmatige toestemming van de rechthebbende.<br><br>
              <span class="strong">Tonen van foto’s op deze website</span><br>
              Modellen, acteurs en actrices of alle andere personen die ons foto\'s bezorgen bevestigen over alle nodige auteursrechten te beschikken om Castingteam (BORDERFIELD BVBA) toe te laten deze foto\'s op internet te plaatsen en te verspreiden op elke mogelijke wijze, en zo nodig aan deze foto\'s alle aanpassingen aan te brengen die Castingteam (BORDERFIELD BVBA) nodig acht, waaronder doch niet uitsluitend het aanpassen van het formaat en het bijsnijden van de foto\'s, en het weglaten van de naam of logo van de fotograaf. <br><br>
              Castingteam (BORDERFIELD BVBA) is zelf niet verantwoordelijk voor eventuele vorderingen in auteursrechtelijk verband en model of acteurs en actrices zullen Castingteam (BORDERFIELD BVBA) daarvoor integraal vrijwaren. <br><br>
              <span class="strong">Wijzigingen</span><br>
              Castingteam (BORDERFIELD BVBA) behoudt zich het recht voor de op of via deze website aangeboden informatie, met inbegrip van de tekst van deze disclaimer, te allen tijde te wijzigen zonder hiervan nadere aankondiging te doen. Het verdient aanbeveling periodiek na te gaan of de op of via deze website aangeboden informatie, met inbegrip van de tekst van deze disclaimer, is gewijzigd.<br><br>
              <span class="strong">Toepasselijk recht</span><br>
              Op deze website en de disclaimer is het Belgisch recht van toepassing. Alle geschillen in verband met deze disclaimer zullen bij uitsluiting worden voorgelegd aan de bevoegde rechter in België.'
                    ],
                'text_block_3' =>
                    [
                        'title' => 'Algemene voorwaarden',
                        'p' => '
              Algemene Voorwaarden van Castingteam (Borderfield BVBA) Bvba - Broederminstraat 7, 2018 Antwerpen - BE0 888 388 950.<br><br>
              <span class="strong">1. Algemeen</span><br>
              Deze voorwaarden maken integraal onderdeel uit van alle aanbiedingen van, opdrachten aan en overeenkomsten met Castingteam (Borderfield BVBA). Verstrekking van een opdracht aan Castingteam (Borderfield BVBA) houdt aanvaarding in van deze voorwaarden. Deze algemene voorwaarden hebben voorrang op eventueel door opdrachtgevers gehanteerde algemene voorwaarden. Afwijkingen van en uitzonderingen op deze voorwaarden zijn slechts geldig indien schriftelijk door partijen overeengekomen.<br><br>
              <span class="strong">2. Garanties</span><br>
              Castingteam (Borderfield BVBA) verbindt zich tot het met zorg uitvoeren van de aan haar verstrekte opdracht(en). Castingteam (Borderfield BVBA) staat in voor de kwaliteit van de uitvoering van aan haar verstrekte opdrachten.<br><br>
              <span class="strong">3. Boekingen</span><br>
              Opdrachtgevers doen boekingen bij Castingteam (Borderfield BVBA) voor modellen. Onder modellen wordt in het kader van deze voorwaarden verstaan: (foto)modellen, people, senioren, tieners, kinderen, acteurs, actrices, specials, visagisten en stylisten. Boekingen kunnen onder andere worden gedaan voor foto- en/of filmopnamen.<br><br>
              De boeking wordt bevestigd door een opgestelde boekingsbevestiging van Castingteam (Borderfield BVBA). Deze dient voor aanvang van het tijdstip van de boeking voor akkoord getekend door de opdrachtgever in het bezit te zijn van Castingteam (Borderfield BVBA), middels elektronische ondertekening op de website van Castingteam (Borderfield BVBA).<br><br>
              Indien rechten worden bijberekend voor een geboekte opdracht op het boekingsdocument, kunnen deze rechten niet herroepen worden, indien de klant deze beelden uiteindelijk niet gebruikt. De keuze om rechten al dan niet te doen gelden voor een opdracht loopt af op de dag van de vooropgestelde shoot. Met andere woorden, de dag na de opnames kan deze keuze niet meer herroepen worden en gelden de rechtentarieven zoals voorzien op de boekingsdocumenten. <br><br>
              <span class="strong">4. Casting</span><br>
              Wanneer modellen of acteurs worden gevraagd om op een casting te verschijnen zijn daaraan slechts de reiskosten van de modellen of acteurs verbonden, tenzij vooraf anders afgesproken. Tenzij meer dan vijf modellen of acteurs worden gevraagd. In dat geval kunnen administratiekosten aan opdrachtgever in rekening gebracht, in onderling overleg. <br><br>
              <span class="strong">5. Overmacht</span><br>
              In geval van ziekte of andere omstandigheden van privé-aard waardoor een model / acteur niet op de afgesproken tijd op de afgesproken locatie aanwezig is, is dit overmacht. Castingteam (Borderfield BVBA) zal zich in dit geval inspannen om adequate vervanging te regelen. Is dit om welke reden dan ook niet mogelijk dan zal de boeking verzet worden. In dat geval is Castingteam (Borderfield BVBA) niet aansprakelijk voor schade geleden door opdrachtgever.<br><br>
              Indien meerdere modellen of acteurs van Castingteam (Borderfield BVBA) afhangen van de afwezige en de shoot niet kan doorgaan door het ontbreken van dat model, dient de klant een duidelijke keuze te maken : Ofwel stuurt deze het (de) reeds aanwezige model(len) terug, waarbij er geen kosten worden aangerekend, ofwel zet de klant dit (deze) model(len) op dat tijdstip en locatie in voor andere doeleinden waarbij de klant de normale vergoeding van dat (die) model(len) aanvaardt en dient te vereffenen, zonder aanspraak op korting of tegemoetkoming. <br><br>
              <span class="strong">6. Aansprakelijkheid</span><br>
              Opdrachtgever vrijwaart Castingteam (Borderfield BVBA) tegen aanspraken van derden, in het bijzonder tegen aanspraken van het model wegens schade geleden door het model op de locatie waar uitvoering gegeven wordt aan de opdracht. Onder locatie wordt voor deze bepaling bedoeld de plaats waar wordt gefotografeerd, gefilmd of anderszins opnamen gemaakt. Deze vrijwaring geldt eveneens voor aanspraken van het model of derden betreffende intellectuele eigendomsrechten en recht op afbeelding.<br><br>
              <span class="strong">7. Betalingen</span><br>
              Castingteam (Borderfield BVBA) int namens het model de door opdrachtgever aan het model verschuldigde betaling. De betalingen staan vermeld op de boekingsbevestiging. Tarieven zijn steeds inclusief agentschap-provisie Castingteam (Borderfield BVBA) en exclusief BTW volgens het wettelijk vastgestelde percentage.<br><br>
              <span class="strong">8. Bijzondere tarieven en Toeslagen</span><br>
              In geval van overwerk (werk buiten de overeengekomen tijd) gelden bijzondere tarieven. Opdrachtgever zal voor aanvang van het overwerk de alsdan geldende tarieven voor overwerk bij Castingteam (Borderfield BVBA) opvragen.<br><br>
              Voor bijzonder gebruik (bijvoorbeeld exclusiviteit, gebruik van de opname(n) in meer dan één land of gebruik van de opname(n) voor een periode van langer dan één jaar na datum van opname) of bijzondere opnamen (bijvoorbeeld film-, televisie- en/of video-opnamen,of commercials ) zijn nader overeen te komen toeslagen verschuldigd (zie Rechtentarievenlijst).<br><br>
              Indien enigerlei toeslag per kalenderjaar, maand of andere termijn verschuldigd is, dient de opdrachtgever de gehele daarvoor geldende toeslag te voldoen, ook al wordt niet de gehele termijn van de betreffende afbeelding(en) van het model/ de modellen gebruik gemaakt.<br><br>
              <span class="strong">9. Reiskostenvergoeding</span><br>
              Indien de werkzaamheden van het model buiten haar plaats van woonst plaatsvinden worden de volledige reiskosten per trein aan opdrachtgever doorberekend. Indien door modellen met de auto wordt gereisd, wordt per kilometer het tarief berekend dat op dat moment maximaal is toegestaan voor zakelijk gereden kilometers.<br><br>
              Tenzij anders overeengekomen worden parkeerkosten aan de opdrachtgever doorberekend.<br><br>
              Reiskosten voor buitenlandse modellen worden in overleg vastgesteld. Reiskosten voor buitenlandse reizen dienen voor aanvang van de reis door opdrachtgever te worden voldaan. In geval van een boeking van een kind tot 16 jaar dienen de reiskosten van zowel het kind als één begeleider te worden vergoed.<br><br>
              <span class="strong">10. Annuleringen</span><br>
              Bij boekingen voor een dag, halve dag of enkele uren: indien geannuleerd wordt minimaal achtenveertig uur voor het tijdstip waarvoor is geboekt, zullen geen kosten in rekening worden gebracht. Indien geannuleerd wordt op de geboekte dag zelf is het gehele overeengekomen honorarium verschuldigd, tenzij de annulatie geschied in de voormiddag terwijl het (de) model(len) geboekt is (zijn) in de namiddag, waarbij slechts 50% van het overeengekomen tarief wordt aangerekend. Bij meerdaagse boekingen is de opzegtermijn gelijk aan het aantal geboekte dagen; wordt die termijn niet aangehouden dan is het volledige honorarium verschuldigd.<br><br>
              <span class="strong">11. Annulering in geval van mooi weer boekingen</span><br>
              In het geval van een zogenaamde ”mooi weer boeking” (een boeking die expliciet afhankelijk is van een bepaalde weerstoestand), geldt bij de eerste annulering vanwege voor de boeking ongewenst weer, mits deze annulering binnen redelijk tijdsbestek gedaan wordt: geen kosten. Bij een tweede annulering: 50% van het overeengekomen honorarium. Volgende annulering(en): 100% van het overeengekomen honorarium.<br><br>
              <span class="strong">12. Betalingen</span><br>
              Opdrachtgever ontvangt een factuur van Castingteam (Borderfield BVBA) voor het door de opdrachtgever verschuldigde bedrag.Het verschuldigde bedrag dient binnen 30 dagen na factuurdatum te worden voldaan op het Castingteam (Borderfield BVBA) rekeningnummer vermeld op het factuur.<br><br>
              Indien een voorschot betaald moet worden dient de voorschotnota per omgaande voldaan te worden. In het geval het voorschot niet (tijdig) is voldaan behoudt Castingteam (Borderfield BVBA) zich het recht voor de overeengekomen boeking op te schorten. Indien de opdrachtgever het niet eens is met de factuur kan opdrachtgever dit enkel binnen 8 dagen na ontvangst van de factuur schriftelijk kenbaar maken aan Castingteam (Borderfield BVBA).<br><br>
              <span class="strong">13. Gevolgen van niet (tijdig) betalen</span><br>
              Bij verstrijken van genoemde betalingstermijn kan het verschuldigde bedrag dan wel resterende deel van het verschuldigde bedrag van rechtswege en zonder ingebrekestelling vermeerderd worden met een rente van 2% per maand of gedeelte van een maand. Niet (tijdig) betalen kan voorts tot gevolg hebben dat aan opdrachtgever toegekende rechten, met opdrachtgever overeengekomen kortingen en garanties worden opgeschort c.q. komen te vervallen.<br><br>
              Voorts komen alle gerechtelijke en buitengerechtelijke kosten, die Castingteam (Borderfield BVBA) maakt voor de inning van een vordering voor rekening van de opdrachtgever. Onder buitengerechtelijke kosten worden begrepen alle kosten van sommatie en ingebrekestelling naast de verschotten en het honorarium van degene die voor Castingteam (Borderfield BVBA) met invordering is belast. De buitengerechtelijke kosten worden gesteld op 15% van de hoofdsom, BTW inbegrepen, en zijn verschuldigd van rechtswege en zonder ingebrekestelling, door de loutere overschrijding van de betalingstermijn.<br><br>
              <span class="strong">14. Gebruik</span><br>
              Eerst na betaling van de schriftelijk overeengekomen tarieven verkrijgt de opdrachtgever het recht om binnen het opgegeven gebied gedurende de aangeduide periode na opnamedatum dan wel gedurende een nader schriftelijk overeen te komen periode vanaf opnamedatum gebruik te maken van het materiaal op een wijze zoals nader in de opdrachtbevestiging vastgelegd.<br><br>
              Alle kosten welke door Castingteam (Borderfield BVBA) worden gemaakt ter effectuering van de rechten van het model en/of van Castingteam (Borderfield BVBA) komen voor rekening van opdrachtgever. In het kader van een verantwoorde belangenbehartiging van onze modellen, dient u steeds het eindresultaat met de afbeelding van het betreffende model dat zal gebruikt worden door u of uw klant, te verzenden naar info@Castingteam (Borderfield BVBA).com . Zo garanderen wij het model een deontologisch verantwoord gebruik van hun/haar afbeelding. <br><br>
              De opdrachtgever blijft onder alle omstandigheden aansprakelijk voor een correct gebruik van de afbeelding, met respect voor het recht op afbeelding van het model.<br><br>
              <span class="strong">15. Geschillen</span><br>
            Enkel het Belgisch recht is van toepassing en geschillen worden voorgelegd aan de bevoegde rechter te Turnhout / Antwerpen.'
                    ]
            ],
        'partner-nederland' =>
            [
                'title' => 'Partners gezocht',
                'subtitle_1' => 'Castingteam groeit voortdurend en dus zijn we op zoek naar partners voor de Nederlandse markt.<br><br>Voor onze activiteiten in Nederland zoeken we een...',
                'subtitle_2' => 'M/V boeker / partner (franchise)',
                'subtitle_3' => 'Over jou...',
                'subtitle_4' => 'Over ons...',
                'subtitle_5' => 'Partnership...',
                'text_block' =>
                    [
                        'li_1' => 'Je hebt een netwerk van professionals in de reclame, media en entertainment: fotografen, productiehuizen, regisseurs, reclamebureaus… Je kent veel mensen in de sector, of je bent een go-getter die weet hoe je een netwerk moet uitbouwen.',
                        'li_2' => 'Je bent creatief, sociaal, gedreven, je hebt een passie voor reclame en entertainment.',
                        'li_3' => 'Je hebt ervaring in de casting sector en / of het werken met casting directors, productiehuizen, producers…',
                        'li_4' => 'Je hebt oog voor talent, je kan het herkennen en in goede banen leiden. Je hebt oog voor het selecteren en uitkiezen van de juiste mensen op basis van de aanwijzingen van de klant.',
                        'li_5' => 'Je kan zelfstandig en autonoom werken. Je kan je ergens in vast bijten.',
                        'li_6' => 'Je hebt een fijne neus voor zaken en bent commercieel en communicatief aangelegd. ',
                    ],
                'text_block_2' =>
                    [
                        'li_1' => 'Castingteam bestaat nog niet zo lang onder onze nieuwe naam, maar als Borderfield Models & Casting doen wij al meer dan 10 jaar boekingen, vooral in Vlaanderen. Doorheen de jaren hebben we voor duizenden mensen opdrachten gevonden in de reclame. Met onze nieuwe naam en nieuw imago hebben we een grote stap voorwaarts gezet en we hebben het drukker dan ooit. ',
                        'li_2' => 'Castingteam heeft meer dan 4.000 mensen in bestand en daarnaast een uitgebreid netwerk. ',
                        'li_3' => 'We hebben een gloednieuwe website en een uitgebreid op maakt gemaakt CMS systeem, om snel mensen te kunnen zoeken, sorteren, filteren én contacteren. Onze boekers kunnen heel snel selecties maken en verfijnen, en doorsturen naar de klant.  ',
                        'li_4' => 'Daarnaast hebben we een uitgebreide boekings -en klantenmodule. ',
                    ],
                'p_1' => 'Er is een goed verdienmodel voorzien; dit is een echte opportuniteit voor de juiste kandidaat.  Op aanvraag bezorgen we je meer bijzonderheden over deze kans en hoe wij je begeleiden en ondersteunen.<br>Stuur een mailtje naar ',
                'p_2' => ' met een korte motivatie en wat uitleg over jezelf.',
            ],
        'not_found' =>
            [
                'title' => '404 - Pagina niet gevonden',
                'subtitle' => 'Het spijt ons, het door jou ingegeven website-adres bestaat niet.  <a href="/">Klik hier</a> om naar de homepage te gaan.',
            ],
        'server_error' =>
            [
                'title' => '500 - Internal Server Error',
                'subtitle' => '<a href="/">Klik hier</a> om naar de homepage te gaan.',
            ],
        'search' =>
            [
                'placeholder' => 'Naam of refn°'
            ],
        'smart_search' =>
            [
                'placeholder' => 'Zoek bijvoorbeeld op \'vrouw\' en \'tussen 50 en 60 jaar\' en \'rood haar\''
            ],
        'people' =>
            [
                'selection_count' => 'Je selectie',
                'results_count' => 'resultaten gevonden',
                'sort' => 'Sorteer op',
                'favorite' => 'Onze selectie',
                'new' => 'Nieuwste modellen',
                'random' => 'Random',
                'vip' => 'Word VIP',
                'profile' => 'My Castingteam',
            ],
        'model' =>
            [
                'title' => 'VOEG DIT MODEL TOE AAN JE SELECTIE',
                'subtitle_1' => 'MATEN',
                'subtitle_2' => 'BESCHRIJVING',
                'subtitle_3' => 'ERVARING',
                'subtitle_4' => 'VIDEO\'S',
                'pdf_button' => 'Setcard (PDF)',
                'selection_button' => 'Voeg toe aan selectie',
                'vip' => 'Word VIP',
                'facebook' => 'Deel op Facebook'
            ],
        'selection' =>
            [
                'title' => 'JE SELECTIE',
                'title_two' => 'Je hebt nog geen selecties bewaard',
                'edit_button' => 'Pas deze selectie aan',
                'send_button' => 'Verzend je selectie',
                'view' => ' Kies je view :',
                'view_1' => 'Onder elkaar',
                'view_2' => 'Lijst overzicht',
                'subtitle' => 'Je selectie is momenteel nog leeg...'
            ],
        'registration' =>
            [
                'header' =>
                    [
                        'tooltip' => 'Already registered? Enter your model code here:',
                        'button' => 'Go',
                        'click' => 'Click here',
                        'forgot_code' => 'Forgot modelcode?',
                    ],
                'fields' =>
                    [
                        'language' => 'language',
                        'submit' => 'Submit',
                        'voornaam' => 'First name',
                        'achternaam' => 'Last name',
                        'geboortedatum' => 'Date of birth',
                        'adres' => 'Streetname',
                        'gemeente' => 'City',
                        'land' => 'Country',
                        'email' => 'Email address',
                        'telefoon' => 'Phone (CELL)',
                        'geslacht' => 'Sex',
                        'huisnummer' => 'Number',
                        'postcode' => 'Postal code',
                        'spreektaal' => 'Language',
                        'herhaal_email' => 'Repeat email address',
                        'telefoon2' => '2nd phonenr.',
                        'kies' => 'Choose',
                        'vrouw' => 'Woman',
                        'man' => 'Man',
                        'family' => 'Family',
                        'mannen' => 'Men',
                        'vrouwen' => 'Women',
                        'kinderen' => 'Kids',
                        'vanaf_17_jaar' => 'Older then 17yr',
                        'year' => 'year',
                        'from' => 'from',
                        'since' => 'from',
                        'tot_16_jaar' => 'from 0 - 16yr',
                        'technische_fout' => 'There has been an error, please contact us if this problem persists.',
                        'email_adres_bestaat' => 'This email address has already been registerred.',
                        'lengte' => 'Height',
                        'gewicht' => 'Weight',
                        'borstomtrek' => 'Chest',
                        'maat' => 'Size',
                        'int_maat' => 'Int. Size',
                        'taille' => 'Waist',
                        'heupen' => 'Hips',
                        'jeansmaat' => 'Jeans',
                        'costume' => 'Suit or jacket',
                        'kinder_min' => 'Kids size (min)',
                        'kinder_max' => 'Kids size (max)',
                        'kostuummaat' => 'Suit size',
                        'schoenmaat' => 'Shoe size',
                        'hemden' => 'Shirt size',
                        'kleedmaat' => 'Dress size',
                        'cupmaat' => 'Cup size',
                        'kindermaat_min' => 'Kids size (min)',
                        'kindermaat_max' => 'Kids size (max)',
                        'huidskleur' => 'Skin color',
                        'europees' => 'Western European',
                        'afrikaans' => 'African / Central and South African',
                        'noordafrikaans' => 'North African',
                        'aziatisch' => 'East Asian',
                        'noord_afrikaans' => 'North African',
                        'zuid_aziatisch' => 'South Asian / South East Asian',
                        'zuid-aziatisch' => 'South Asian / South East Asian',
                        'noord_aziatisch' => 'Northern and Central Asian',
                        'scandinavisch' => 'Scandinavian',
                        'zuidaziatisch' => 'South Asian / South East Asian',
                        'arabisch' => 'Arabic',
                        'oostaziatisch' => 'East Asian',
                        'noordaziatisch' => 'Northern and Central Asian',
                        'latin' => 'Latino / Mediterranean',
                        'oost-europees' => 'Eastern European',
                        'middle-asia' => 'Northern and Central Asian',
                        'east-asia' => 'East Asian',
                        'north-america' => 'North American / Australian / Caucasian',
                        'middle-america' => 'South and Central American',
                        'antilliaans' => 'Antillean / Caribbean / Pacific',
                        'indians' => 'Indian',
                        'spaanslatin' => 'Latino / Mediterranean',
                        'haarkleur' => 'Hair color',
                        'blondhaar' => 'Blond',
                        'bruinhaar' => 'Brown',
                        'zwarthaar' => 'Black',
                        'roodhaar' => 'Red',
                        'speciaalhaar' => 'Special',
                        'haargrijs' => 'Grey',
                        'haarblond' => 'Blond',
                        'haarbruin' => 'Brown',
                        'haarzwart' => 'Black',
                        'haarrood' => 'Red',
                        'haarspeciaal' => 'Special',
                        'grijshaar' => 'Grey',
                        'haarwit' => 'White',
                        'haarstijl' => 'Hair style',
                        'stijlhaar' => 'Hair style',
                        'stijl' => 'Straight',
                        'piekjes' => 'Spikes',
                        'krullen' => 'Curls',
                        'krullenhaar' => 'Curls',
                        'speciaalhaarstijl' => 'Special',
                        'piekjeshaar' => 'Spikes',
                        'haarlengte' => 'Hair length',
                        'langhaar' => 'Long',
                        'korthaar' => 'Short',
                        'middenhaar' => 'Middle',
                        'kaalhaar' => 'Bald',
                        'langh' => 'Long',
                        'lang' => 'Long',
                        'kort' => 'Short',
                        'midden' => 'Middle',
                        'kaal' => 'Bald',
                        'dik' => 'Plus-Size',
                        'begroeiing' => 'Facial hair',
                        'baard' => 'Beard',
                        'snor' => 'Moustache',
                        'bakkebaard' => 'Side burns',
                        'begroeingspeciaal' => 'Special',
                        'speciaal' => 'Special',
                        'versiering' => 'Decoration',
                        'tattoo' => 'Tattoos',
                        'tattoos' => 'Tattoos',
                        'piercing' => 'Piercing',
                        'piercings' => 'Piercing',
                        'andere' => 'Other',
                        'andereversiering' => 'Other',
                        'kleurogen' => 'Color eyes',
                        'blauwogen' => 'Blue',
                        'groenogen' => 'Green',
                        'grijsogen' => 'Grey',
                        'bruinogen' => 'Brown',
                        'blauw' => 'Blue',
                        'groen' => 'Gren',
                        'grijs' => 'Grey',
                        'bruin' => 'Brown',
                        'lichaam' => 'Body',
                        'gespierd' => 'Muscular',
                        'handen' => 'Hand model',
                        'benen' => 'Leg model',
                        'voeten' => 'Foot model',
                        'test' => 'Plus size',
                        'borsthaar' => 'Chest hair',
                        'gebit' => 'Perfect teeth',
                        'gebruind' => 'Tan',
                        'blokjes' => 'Sixpack',
                        'fotoshoot' => "Photoshoots",
                        'modellingcursus' => "Modeling course",
                        'acteerervaring' => "Acting for movies / tv",
                        'acteerervaringreclame' => "Acting for commercials",
                        'acterencursus' => "Acting course",
                        'toneel' => "Stage, theatre",
                        'catwalkervaring' => "Catwalk / mannequin",
                        'promotiewerk' => "Promotional",
                        'choreografie' => "Choreography / dancing",
                        'presentatie' => "Presentation / hosting",
                        'geenervaring' => "No experience",
                        'taalengels' => 'English',
                        'taalfrans' => 'French',
                        'taalnederlands' => 'Dutch',
                        'taalduits' => 'German',
                        'taalitaliaans' => 'Italian',
                        'taalspaans' => 'Spanish',
                        'engels' => 'English',
                        'frans' => 'French',
                        'nederlands' => 'Dutch',
                        'duits' => 'German',
                        'italiaans' => 'Italian',
                        'spaans' => 'Spanish',
                    ],
                'step_0' =>
                    [
                        'title' => '1. SIGN UP',
                        'subtitle' => 'Thank you for your interest in signing up for <b>Bordermodels</b> or <b>Castingteam</b>.',
                        'p_1' => 'We need some information and photo\'s from you; who you are, what do you look like, what kind of skills or talents you have, what can we do with you… we try to find out with this form. <br><br>

                            Take your time, read everything carefully and fill out the form precisely and accurately. This should only take about 10 minutes. <br><br>

                            Signing up is free and every step will be explained along the way. You will always receive an answer (positive or negative); if you’ve not heard from us after a few weeks or if you have questions, contact us via <a href="mailto:info@castingteam.com"><u><b>info@castingteam.com</b></u></a> or <a href="mailto:info@bordermodels.com"><u><b>info@bordermodels.com</b></u></a>.',
                        'registration_button' => 'Sign up now',
                        'title_2' => '2. Or update your information & photo\'s',
                        'subtitle_2' => 'If you\'re already signed up with us or if you have already filled out a form, you can edit your information or photo\'s this way.',
                        'p_2' => 'Enter your 6 or 10-digit sign up-code below. You will be able to edit / update photo’s (remove or add) or update your information.',
                        'login_button' => 'Log in',
                        'code_forget' => 'Lost signup-code?',
                        'code_forget_button' => 'Send me my sign-up code',
                        'li_1' => 'If you have lost your sign up-code, please enter your email address below and we will instantly email it to you.',
                        'li_2' => 'If you have questions, mail us at <a href="mailto:info@castingteam.com"><u><b>info@castingteam.com</b></u></a>. If you have multiple codes (for instance because you have mutiple children signed up with us) they all will be listed in the email.'

                    ],
                'step_1' =>
                    [
                        'title' => 'Step 1: Personal information',
                        'subtitle' => 'We need some personal information, but this will never be shared with anyone else, your information will remain absolutely private.',
                        'text_block' =>
                            [
                                'title' => 'How did you find us? (Not required)',
                                'li_1' => 'Via a promotion / action / contest',
                                'li_2' => 'Google search',
                                'li_3' => 'Via a friend',
                                'li_4' => 'Via social media; Facebook, Twitter, Instagram',
                                'li_5' => 'I was approached by a spotter / scout or I was handed a flyer',
                                'li_6' => 'I know Castingteam / Bordermodels from earlier',
                                'li_7' => 'Castingteam / Bordermodels poster'
                            ],
                        'tooltip' => 'Mandatory field',
                        'submit' => 'Save and continue',
                        'text_block_2' =>
                            [
                                'title' => 'TIPS',
                                'li_1' => 'Naturally, we need some personal information, but these will never be shared with anyone else, your information will remain absolutely private.',
                                'li_2' => 'Provide an accurate birth date, lying about your age is useless. ',
                                'li_3' => 'Remember to update this information should it change! When you move or change your phone number or email address; please update the form.',
                            ],
                        'keywords_placeholder' => 'Op welk trefwoord heb je gezocht?',
                    ],
                'step_2' =>
                    [
                        'geen_idee' => 'Geen idee',
                        'nvt' => 'NVT',
                        'title' => 'Step 2: Your measurements and description',
                        'subtitle' => 'Please provide us with your measurements and description here. Try to do this very accurately; making your measurements \'better\' than they really are has no use and could become a problem for future assignments.',
                        'text_block' =>
                            [
                                'title' => 'TIPS',
                                'li_1' => 'ATTENTION: Skin color is not so much about where you live or even where you were born, but rather what your \'ethnic skin color\' is; where your ancestors originally come from OR what you look like. In other words, if your parents where Turkish and you still look Turkish - even though you have perhaps lived in Holland all your life - you should check \'Arabic\', instead of Western European.',
                                'li_2' => 'Leg model, hand model, foot model; only mark these if you have actual experience with this.',
                                'li_3' => 'If one or more of these details change, please update them as quickly as possible. Only if we have the correct measurements can we properly represent you.',
                            ],
                        'tooltip' => 'Save and continue',
                        'parameters' =>
                            [
                                'family' => 'Gezin',
                                'men' => 'Maten mannen',
                                'woman' => 'Maten vrouwen',
                                'teen' => 'Tieners',
                                'kids' => 'Kids',
                            ],
                        'subtitle_2' => '<strong>Omschrijving</strong> - Duid zoveel mogelijk aan, aan wat voor jou van toepassing is',
                        'subtitle_3' => 'Huidskleur / etniciteit',
                        'skin_color_block' =>
                            [
                                'title' => 'ATTENTION: Skin color is not so much about where you live or even where you were born, but rather what your \'ethnic skin color\' is; where your ancestors originally come from OR what you look like. In other words, if your parents where Turkish and you still look Turkish - even though you have perhaps lived in Holland all your life - you should check \'Arabic\', instead of Western European.',
                                'subtitle' => 'If you are not a 100% certain what your ethnicity is, please check this list : <a href="/files/People_origin.pdf" target="_blank"><span class="underlined_text">List of countries and ethnicities.</span></a>',
                                'subtitle_2' => 'What is the country you (or your parents or grand parents) originate from? So not where you currently live perhaps, but where your family originally comes from.',
                                'country' => 'Land of origin:',
                                'europees' => 'Benelux, France, Germany, UK, Swiss, Austria, Czech Republic, Western Russian, etc. ',
                                'afrikaans' => 'African / Central and South African',
                                'noordafrikaans' => 'North African',
                                'aziatisch' => 'China, Taiwan, Korea, Japan, etc.',
                                'noord_afrikaans' => 'Morocco, Algeria, Tunisia, Egypt, etc. ',
                                'zuid_aziatisch' => 'India, Pakistan, Bangladesh, Indonesia, Philippines, Singapore, Vietnam, etc.',
                                'zuid-aziatisch' => 'India, Pakistan, Bangladesh, Indonesia, Philippines, Singapore, Vietnam, etc.' ,
                                'noord_aziatisch' => 'South Russia, Mongolia, Kazachstan, Kyrgyzstan, Uzbekistan, Tajikistan, Turkmenistan, Tibet, etc.',
                                'scandinavisch' => 'Denmark, Norway, Sweden, Iceland, Finland, Etc.',
                                'zuidaziatisch' => 'China, Taiwan, Korea, Japan, Vietnam, etc.',
                                'arabisch' => 'Middle East, Turkey, Iran, Irak, Saudi-Arabia, Sudan, Egypt, Libanon, Israel, etc. ',
                                'oostaziatisch' => 'China, Taiwan, Korea, Japan, etc.',
                                'noordaziatisch' => 'South Russia, Mongolia, Kazachstan, Kyrgyzstan, Uzbekistan, Tajikistan, Turkmenistan, Tibet, etc.',
                                'latin' => 'Spain, Italy, Greece, Croatia, etc.',
                                'oost-europees' => 'Poland, Slovakia, Serbia, Romania, Ukraine, Estonia, Etc.',
                                'middle-asia' => 'South Russia, Mongolia, Kazachstan, Kyrgyzstan, Uzbekistan, Tajikistan, Turkmenistan, Tibet, etc.',
                                'east-asia' => 'China, Taiwan, Korea, Japan, etc.',
                                'north-america' => 'USA, Canada, Alaska, Australia, New Zealand (Caucasian), etc.',
                                'middle-america' => 'Mexico, Guatemala, Venezuela, Colombia, Brasil, Argentine, etc.',
                                'antilliaans' => 'Aruba, Bonair, Curaçao, Saba, Saint Martin, Bahamas, Jamaica, etc. ',
                                'indians' => 'Indigenous people of the Americas, Inuit, etc.',
                            ],
                    ],
                'step_3' =>
                    [
                        'title' => 'Step 3: Your experience',
                        'subtitle' => 'Tell us a little about your experience… List what sort of work you have done in the past and list a few projects or campaigns you were involved with. ',
                        'p_1' => 'You have experience with...',
                        'p_2' => 'Which languages do you speak fluently?',
                        'p_3' => 'Tell us a bit about your experience and list some projects you have done.',
                        'p_4' => 'Do you have special skills or talents? Sports, hobbies, unique qualities... be sure to list them here!',
                        'p_5' => 'Please provide some URLs to commercials or clips of you from YouTube or Vimeo, if you have them...',
                        'p_6' => 'Only YouTube and Vimeo works, so only use URLs like this : <br><span style="color:#00ab84">https://www.youtube.com/watch?v=wZZ7oFKsKzY</span> of <span style="color:#00ab84">https://vimeo.com/191853421</span>',
                        'text_block' =>
                            [
                                'title' => 'TIPS',
                                'li_1' => 'If you checked that you have acted for movies or TV or Commercials, list some examples. ',
                                'li_2' => 'Try to be as complete as possible when listing your experiences. ',
                                'li_3' => 'Provide a list of things you can do... ride a unicylce, windsurfing, play the guitar, ballet dancing, standing on your head... list it!',
                                'li_4' => 'Currently only YouTube or Vimeo video\'s can be listed; adding clips to YouTube or Vimeo is free and easy. ',
                            ],
                        'tooltip' => 'Save and continue'

                    ],
                'step_4' =>
                    [
                        'title' => 'STAP 4 : Uploading Photo\s',
                        'subtitle' => 'Upload your photo\'s here, professional photo\'s or casual ones...',
                        'li_1' => 'We need photo\'s to properly examine your subscription...</strong> if you currently do not have several digital photo\'s, it might be better to postpone your subscription for now and try again when you do have sufficient photo\'s (clear, good quality...).',
                       // 'li_2' => 'Als je niet voldoende goede en duidelijke foto’s hebt, wij kunnen foto’s voor je maken vanaf 25 a 45 euro (afhankelijk van pakket). Stuur een mailtje naar <a href="mailto:fotograaf@castingteam.com" style="color:#000000; text-decoration: underline ; font-weight: bold;">fotograaf@castingteam.com</a> of kijk op <a href="http://fotos.castingteam.com" target="_blank" style="color:#000000; text-decoration:underline; font-weight : blank;">fotos.castingteam.com</a>.',
                        'text_block' =>
                            [
                                'li_1' => 'If possible, at least 10 photo\'s (or more)',
                                'li_2' => 'Only upload JPG\'s and PNG\'s, no zip files or PDFs.',
                                'li_3' => 'Maximum of 8 mb per photo! Uploading may take a while.',
                                'li_4' => 'If you are updating your profile, remove the old photo\'s that are no longer relevant first',
                            ],
                        'p_1' => 'List photographers',
                        'li_3' => 'Please list the names of photographers who attributed to your photo\'s.',
                        'photograph' => 'Photographers',
                        'submit' => 'Save and continue',
                        'text_block_2' =>
                            [
                                'title' => 'TIPS',
                                'li_1' => '<strong>Variation</strong> : We need a lot of good, varied, professional photo\'s, preferably in color, outside, studio shots... We need at least 2 clear frontal portrait photo\'s as well. Next to that you can add selfies or casual photo\'s. ',
                                'li_2' => '<strong>Professional</strong> : Casual or vacation photo\'s are not always usable. Often they have poor lighting, bad quality, unclear subject.. You can use these in addition to good casting photo\'s.',
                                'li_3' => '<strong>Normal photo\'s</strong> : We also need photo\'s without strange compilations, or too close-up, too artistic (no nudes, no masks, no bodypaint. We nee a few good neutral clear photo\'s.',
                                'li_4' => '<strong>Expression</strong> : It\'s always good to have photo\'s that are diverse in terms of expression, photo\'s that show your emotional acting range.',
                                'li_5' => '<strong>Publications</strong> : If possible, also provide ads or campaigns you\'ve contributed on. ',
                                'li_6' => '<strong>Vermelding fotograaf</strong> : We usually do not show names or watermarks of the photographers (unless they are not in the way and fit the composition).',
                                'li_7' => 'Having a good set of casting photo\'s is essential. It\'s very simple, the better your profile, the more chances you have to be booked. ',
                            ]
                    ],
                'step_5' =>
                    [
                        'title' => 'Step 6 : Conditions / Disclaimer',
                        'subtitle' => 'Below you can find the Terms and Conditions for acceptance into our database / agency. This is a legal agreement designed to protect both you, and us, during your time with Castingteam.',
                        'span' => 'I agree to the Terms and Conditions',
                        'button' => 'Save and continue'
                    ],
                'step_6' =>
                    [
                        'title' => 'Step 6 : Confirmation',
                        'subtitle' => 'You have filled in the subscription correctly... so now what? ',
                        'subtitle_2' => 'Thank you for updating your profile! If you have changed photo\'s, we will update them as soon as possible and place them (some or all) online. ',
                        'text_block' =>
                            [
                                'li_1' => 'Your subscription code is',
                                'li_1_2' => ' (be sure to keep this code where you can find it again).',
                                'li_2' => '<strong>You have made a subscription, but you are not yet accepted into our database...</strong> We will review and evaluate your subsripion as soon as possible.',
                                'li_3' => 'Our bookers will review your details and photo\'s and you will receive an answer to that in the near future (it may take a while as we get a lot of subscriptions).',
                                'li_4' => 'With your subscription code you can update your profile whenever you like.',
                                'li_5' => 'Would you like to scubscribe someone else? Click here',
                            ]
                    ],
                'voorwaarden' =>
                    [
                        'content' => 'These terms and conditions apply to the relationship between the model / actor that is enrolled on this website and Castingteam (BORDERFIELD BVBA). Subscription on the website as a model implies a unconditional acceptance of these terms and conditions. If and as long as the model / actor is underage, this consent and acceptance will be confirmed by the legally responsible parent and / or guardian.<br><br>
                            1. Casting team (BORDERFIELD BVBA) offers the model the opportunity to be included on Castingteam\'s website and to receive offers to work as a model or actor for third parties whereby Castingteam (BORDERFIELD BVBA) mediates. There is no authority in any way in the relationship between Casting team (BORDERFIELD BVBA) and the model / actor. A relationship such as employer and employee between Castingteam (BORDERFIELD BVBA) and the model / actor is explicitly excluded.
                            <br><br>
                            For the execution of modelling, acting or other assignments, the model / actor enters into a separate contract, either with Castingteam (BORDERFIELD BVBA), a client of Castingteam (BORDERFIELD BVBA), or a payroll office, but without Castingteam (BORDERFIELD BVBA) in the role of employer.
                            <br><br>
                            Castingteam (BORDERFIELD BVBA) is not in any way responsible for incidents which could occur during assignments, either on the road, on the set or elsewhere. Castingteam (BORDERFIELD BVBA) does not provide a working, incidents -or travel insurance.
                            <br><br>
                            2. Castingteam (BORDERFIELD BVBA) does not require that a model / actor exclusively work for Castingteam (BORDERFIELD BVBA). Conversely, Castingteam (BORDERFIELD BVBA) can not be held responsible for representing a model / actor, who has some form of exclusivity contract with a third party. Applying through the Castingteam website (BORDERFIELD BVBA) via the subscription form and agreeing with the Terms and Conditions implies permission to be included in the file on the website, to be published online, to be proposed to clients of Castingteam (BORDERFIELD BVBA), to be contacted (via email, telephone or other) and in any other way to be utilised for publicity of Castingteam (BORDERFIELD BVBA).
                            <br><br>
                            The model / actor may request Castingteam (BORDERFIELD BVBA) to delete his / her profile or change to ‘offline’ status at any time, by directing a simple request to Castingteam (BORDERFIELD BVBA), via email. 
                            <br><br>
                            3. The model / actor confirms to possess all the necessary copyrights to the photo’s he or she uploads to the Castingteam website. The model / actor expressly grants Castingteam (BORDERFIELD BVBA) the permission to place and distribute these photo’s on the internet in any manner and, if required, to make all the adjustments that Castingteam (BORDERFIELD BVBA) considers necessary including, but not limited to, the format and editing of the pictures, and the removal of the photographer\'s name or logo.
                            <br><br>
                            Castingteam (BORDERFIELD BVBA) can not be held responsible for any claims in copyright and the model acquits Castingteam (Borderfield BVBA) from legal prosecution entirely.
                            <br><br>
                            4. The data provided by the model / actor will be filed / kept by Castingteam (BORDERFIELD BVBA), solely for the purpose of representing the model / actor. As such, all this data may be passed on to third parties, including Castingteam clients (BORDERFIELD BVBA), such as advertising agencies, photographers and fashion houses, but solely in the execution of the arrangement between Castingteam (BORDERFIELD BVBA) and the model / actor. 
                            <br><br>
                            The stored / archived data includes the name, date of birth, gender, address, contact details, native language and various external features, including but not limited to the skin color / complexion. The model / actor explicitly acknowledges the processing of this data. The model / actor has the right to ask Castingteam (BORDERFIELD BVBA) for information regarding what specific personal data we have on file, and ask for it to be corrected or removed, free of charge, by contacting Castingteam (BORDERFIELD BVBA) through the contact details provided on the website.
                            <br><br>
                            5. The contract between the model / actor and Castingteam (BORDERFIELD BVBA) is governed by Belgian law and, in the case of a dispute, only the courts of Antwerp are authorised.'
                    ],
                'sidebar' =>
                    [
                        'step_1' => '1. Your information',
                        'step_2' => '2. Description',
                        'step_3' => '3. Experience',
                        'step_4' => '4. Upload photo\'s',
                        'step_5' => '5. Conditions',
                        'step_6' => '6. Confirmation',
                    ]
            ]
    ];

}
