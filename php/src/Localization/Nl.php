<?php

class Localization_Nl extends Localization_Language
{
    /**
     * @var string[]
     */
    protected $content = [
        'categories' =>
            [
                '201' => 'People',
                '202' => 'Modellen',
                '203' => 'Acteurs en Actrices',
                '204' => 'Kids & Teens',
                '205' => 'Senioren',
                '206' => 'Alle',
            ],
        'title' =>
            [
                '201' => 'People',
                '202' => 'Modellen',
                '203' => 'Acteurs en Actrices',
                '204' => 'Kids & Teens',
                '205' => 'Senioren',
                '206' => 'Alle',
                '207' => 'Nieuw talent',
            ],
        'navigation' =>
            [
                'default' => 'people',
                'people' => 'people-modellen',
                'modellen' => 'modellen',
                'acteurs' => 'acteurs-en-actrices',
                'kids' => 'kids-en-teens',
                'senioren' => 'senioren-modellen',
                'specials' => 'alle-modellen-en-people'
            ],
        'links' =>
            [
                'home' => 'Home',
                'homepage' => 'Homepage',
                'overcastingteam' => 'Over Castingteam',
                'mycastingteam'  => '@castingteam.be',
                'logout' => 'Uitloggen',
                'new_talents' => 'Nieuw talent',
                'people_models' => 'Onze mensen',
                'people_models_button' => 'Talent database',
                'carousel_gallery' => 'Pubs met onze mensen',
                'talent_section' => 'Over ons',
                'vip' => 'Word VIP',
                'casting' => 'Casting',
                'contact' => 'Contact',
                'registration' => 'Schrijf je in',
                'clips' => 'Clips (Youtube)',
                'profile' => 'Pas je profiel aan',
                'blog' => 'Blog',
                'bordermodels' => 'Bordermodels',
                'vlambaar_people' => 'Vlambaar People for Events'
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
                        'verplichte_velden' => 'U heeft niet alle verplichte velden ingevuld.',
                        'geen_geldige_email' => 'U heeft geen geldig e-mail adres ingegeven.',
                        'dezelfde_email' => 'U heeft niet twee dezelfde e-mail adressen ingegeven.',
                        'algemene_voorwaarden' => 'U dient akkoord te gaan met de algemene voorwaarden.',
                        'niets_ingegeven' => 'U heeft niets ingegeven',
                        'geen_model' => 'Geen model gevonden met deze code.',
                        'geen_fotos' => 'U moet minstens 1 foto toevoegen.',
                        'vergeten_verstuurd' => 'Uw persoonlijke code is via e-mail naar u verstuurd.',
                        'vergeten_fout' => 'Geen model gevonden met dit e-mail adres.',
                        'form_talent_warning' => 'Zeker dat je ons niets wil vertellen over je hobbies of talenten? Het helpt om een beter beeld van je te scheppen en breder te kunnen aanbieden voor opdrachten.',
                        'form_experience_warning' => 'Je hebt je ervaringen aangeduid, maar nog geen uitleg gegeven of enkele projecten opgesomd. Ben je zeker dat je dit veld wil leeg laten?',
                    ]
            ],
        'countries' =>
            [
                'belgium' => 'België',
                'netherlands' => 'Nederland',
                'france' => 'Frankrijk',
                'germany' => 'Duitsland',
                'luxembourg' => 'Luxembourg',
                'uk' => 'UK',
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
                'length' => 'Lengte',
                'burst' => 'Borst',
                'taille' => 'Taille',
                'hips' => 'Heupen',
                'costum' => 'Confectie',
                'jeans' => 'Jeansmaat',
                'shoes' => 'Schoenmaat',
                'kinder' => 'Kindermaat',
                'int_size' => 'Int. Maat',
                'cup_size' => 'Cupmaat',
                'country' => 'Land',
                'skin_color' => 'Huidskleur',
                'eyes' => 'Ogen',
                'hair_color' => 'Haarkleur',
                'hair_type' => 'Haarstijl',
                'hair_length' => 'Haarlengte',
                'lichaam' => 'Lichaam',
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
                'refine' => 'Verfijn selectie',
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
                'title' => 'Castingteam is een casting -en modellenbureau',
                'description' => 'Castingteam is een casting -en modellenbureau. Wij vertegenwoordigen duizenden getalenteerde people, modellen, acteurs en actrices, kids & teens, seniors… uit België en Nederland. Wij zijn casting directors uit Vlaanderen, Brussel en Nederland; een jong team van gedreven professionals die de juiste mensen zoeken - én vinden!',
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
                'link_instagram' => 'Castingteam op Instagram',
                'link_youtube' => 'Commercials en clips op YouTube',
                'link_facebook' => 'Castingteam op Facebook',
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
                'title' =>  'The right people for every <span>idea</span>',
                'grid_button' =>  'Toon meer...',
                'section_about' =>
                    [
                        'title' => 'Castingteam bestaat uit mensen die graag met mensen werken; onze passie Iigt in het zoeken - én vinden - van originele en karaktervolle persoonlijkheden.',
                        'text' => '<p><strong>Castingteam is een casting -én modellenbureau; the best of both worlds.</strong></p>
                                <p>Wij zijn Casting directors - dus wij gaan actief op zoek naar de right people for every idea - maar wij hebben tegelijk ook een eigen database met meer dan 6.000 talenten, én een netwerk van meer dan 50.000 mensen.</p>
                                <p>Modellen, acteurs en actrices, (edel-)ﬁguranten, jong geweld of ouwe knarren; fresh new talents and seasoned professionals.</p>'
                    ],
                'button_instagram' => 'Naar Instagram',
                'section_bordermodels' =>
                    [
                        'text' => 'Vanuit Castingteam is een aparte modellen-afdeling ontstaan; <a target="_blank" href="http://bordermodels.com/">bordermodels.com</a>, gespecialiseerd in professionele en internationale lifestyle & fashion modellen.',
                        'button' => 'Ontdek Bordermodels'
                    ],
                'section_vlambaar' =>
                    [
                        'text' => 'Eveneens ontstaan uit Castingteam; <a target="_blank" href="http://vlambaar.com">Vlambaar.com</a>. Vlambaar levert hostessen en promoteams, acteurs en actrices, presentatoren en presentatrices, artiesten en modellen, voor events en activatie campagnes.',
                        'button' => 'Ontdek Vlambaar'
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
                        'p_1' => 'Castingteam Vlaanderen',
                        'p_2' => 'Castingteam Brussel',
                        'p_3' => 'Castingteam Nederland',
                        'p_4' => 'Inschrijven',
                        'p_5' => 'We zijn voortdurend op zoek naar fotogenieke people, modellen, acteurs en actrices, kids & teens, senioren... inschrijven kan via <span class="strong"><a href="/nl/register/0" class="black-underlined" target="_blank">inschrijven.castingteam.com</a></span>.',
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
                'placeholder' => 'Zoek (Naam of refn°)'
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
                'title' => 'Voeg dit model toe aan je selectie',
                'subtitle_1' => 'Maten',
                'subtitle_2' => 'Beschrijving',
                'subtitle_3' => 'Ervaring',
                'subtitle_4' => 'Video\'s',
                'pdf_button' => 'Setcard (PDF)',
                'selection_button' => 'Voeg toe aan selectie',
                'vip' => 'Word VIP',
                'facebook' => 'Deel op Facebook'
            ],
        'selection' =>
            [
                'title' => 'Je selectie',
                'title_two' => 'Je hebt nog geen selecties bewaard',
                'edit_button' => 'Pas deze selectie aan',
                'send_button' => 'Send selection',
                'view' => ' Kies je view :',
                'view_1' => 'Toon selectie onder elkaar',
                'view_2' => 'Toon headshots',
                'subtitle' => 'Je selectie is momenteel nog leeg...'
            ],
        'registration' =>
            [
                'header' =>
                    [
                        'tooltip' => 'Reeds ingeschreven? Geef hier je modelcode:',
                        'button' => 'Go',
                        'click' => 'Klik hier',
                        'forgot_code' => 'Modelcode verloren?',
                    ],
                'fields' =>
                    [
                        'language' => 'taal',
                        'submit' => 'Submit',
                        'voornaam' => 'Voornaam',
                        'achternaam' => 'Achternaam',
                        'geboortedatum' => 'Geboortedatum',
                        'adres' => 'Adres (straat)',
                        'gemeente' => 'Gemeente',
                        'land' => 'Land',
                        'email' => 'E-mail adres',
                        'telefoon' => 'Telefoon (GSM)',
                        'geslacht' => 'Geslacht',
                        'huisnummer' => 'Huisnummer',
                        'postcode' => 'Postcode',
                        'spreektaal' => 'Spreektaal',
                        'herhaal_email' => 'Herhaal e-mail adres',
                        'telefoon2' => '2e telefoonnr.',
                        'kies' => 'Kies',
                        'vrouw' => 'Vrouw',
                        'man' => 'Man',
                        'family' => 'Gezin',
                        'mannen' => 'Mannen',
                        'vrouwen' => 'Vrouwen',
                        'kinderen' => 'Kinderen',
                        'vanaf_17_jaar' => 'Vanaf 17 jaar',
                        'year' => 'jaar',
                        'from' => 'van',
                        'since' => 'vanaf',
                        'tot_16_jaar' => 'Van 0 - 16 jaar',
                        'technische_fout' => 'Er is een technische fout opgetreden. Contacteer ons indien dit probleem zich blijft voordoen.',
                        'email_adres_bestaat' => 'Er bestaat reeds een model met dit e-mail adres.',
                        'lengte' => 'Lengte',
                        'gewicht' => 'Gewicht',
                        'borstomtrek' => 'Borstomtrek',
                        'maat' => 'Maat',
                        'int_maat' => 'Int. Maat',
                        'taille' => 'Taille',
                        'heupen' => 'Heupen',
                        'jeansmaat' => 'Jeansmaat',
                        'costume' => 'Kostuum of jas',
                        'kinder_min' => 'Kindermaat (min)',
                        'kinder_max' => 'Kindermaat (max)',
                        'kostuummaat' => 'Kostuummaat',
                        'schoenmaat' => 'Schoenmaat',
                        'hemden' => 'Hemden maat',
                        'kleedmaat' => 'Kleedmaat',
                        'cupmaat' => 'Cupmaat',
                        'kindermaat_min' => 'Kindermaat (min)',
                        'kindermaat_max' => 'Kindermaat (max)',
                        'huidskleur' => 'Huidskleur',
                        'europees' => 'West-Europees',
                        'afrikaans' => 'Afrikaans / Centraal en Zuid-Afrika',
                        'noordafrikaans' => 'Noord-Afrikaans',
                        'aziatisch' => 'Oost-Aziatisch',
                        'noord_afrikaans' => 'Noord-Afrikaans',
                        'zuid_aziatisch' => 'Zuid-Aziatisch / Zuidoost-Aziatisch',
                        'zuid-aziatisch' => 'Zuid-Aziatisch / Zuidoost-Aziatisch',
                        'noord_aziatisch' => 'Noord en Centraal-Aziatisch',
                        'scandinavisch' => 'Scandinavisch',
                        'zuidaziatisch' => 'Zuid-Aziatisch / Zuidoost-Aziatisch',
                        'arabisch' => 'Arabisch',
                        'oostaziatisch' => 'Oost-Aziatisch',
                        'noordaziatisch' => 'Noord en Centraal-Aziatisch',
                        'latin' => 'Latino / Mediterraan',
                        'oost-europees' => 'Oost-Europees',
                        'middle-asia' => 'Noord en Centraal-Aziatisch',
                        'east-asia' => 'Oost-Aziatisch',
                        'north-america' => 'Noord-Amerikaans / Australisch / Kaukasisch',
                        'middle-america' => 'Zuid en Midden-Amerikaans',
                        'antilliaans' => 'Antilliaans / Caraïbisch / Pacifisch',
                        'indians' => 'Indiaans',
                        'spaanslatin' => 'SpaansLatin',
                        'haarkleur' => 'Haarkleur',
                        'blondhaar' => 'Blond',
                        'bruinhaar' => 'Bruin',
                        'zwarthaar' => 'Zwart',
                        'roodhaar' => 'Rood',
                        'speciaalhaar' => 'Speciaal',
                        'haargrijs' => 'Grijs',
                        'haarblond' => 'Blond',
                        'haarbruin' => 'Bruin',
                        'haarzwart' => 'Zwart',
                        'haarrood' => 'Rood',
                        'haarspeciaal' => 'Speciaal',
                        'grijshaar' => 'Grijs',
                        'haarwit' => 'Wit',
                        'haarstijl' => 'Haarstijl',
                        'stijlhaar' => 'Stijl',
                        'stijl' => 'Stijl',
                        'piekjes' => 'Piekjes',
                        'krullen' => 'Krullen',
                        'krullenhaar' => 'Krullen',
                        'speciaalhaarstijl' => 'Speciaal',
                        'piekjeshaar' => 'Piekjes',
                        'haarlengte' => 'Haarlengte',
                        'langhaar' => 'Lang',
                        'korthaar' => 'Kort',
                        'middenhaar' => 'Midden',
                        'kaalhaar' => 'Kaal',
                        'langh' => 'Lang',
                        'lang' => 'Lang',
                        'kort' => 'Kort',
                        'midden' => 'Midden',
                        'kaal' => 'Kaal',
                        'dik' => 'Plus-Size',
                        'begroeiing' => 'Begroeiing',
                        'baard' => 'Baard',
                        'snor' => 'Snor',
                        'bakkebaard' => 'Bakkebaarden',
                        'begroeingspeciaal' => 'Speciaal',
                        'speciaal' => 'Speciaal',
                        'versiering' => 'Versiering',
                        'tattoo' => 'Tattoos',
                        'tattoos' => 'Tattoos',
                        'piercing' => 'Piercing',
                        'piercings' => 'Piercing',
                        'andere' => 'Andere',
                        'andereversiering' => 'Andere',
                        'kleurogen' => 'Kleur ogen',
                        'blauwogen' => 'Blauw',
                        'groenogen' => 'Groen',
                        'grijsogen' => 'Grijs',
                        'bruinogen' => 'Bruin',
                        'blauw' => 'Blauw',
                        'groen' => 'Groen',
                        'grijs' => 'Grijs',
                        'bruin' => 'Bruin',
                        'lichaam' => 'Lichaam',
                        'gespierd' => 'Gespierd',
                        'handen' => 'Handmodel',
                        'benen' => 'Benenmodel',
                        'voeten' => 'Voetmodel',
                        'test' => 'Mollig / plus size',
                        'borsthaar' => 'Borsthaar',
                        'gebit' => 'Perfect gebit',
                        'gebruind' => 'Gebruind',
                        'blokjes' => 'Blokjes',
                        'fotoshoot' => "Fotoshoots",
                        'modellingcursus' => "Modellingcursus",
                        'acteerervaring' => "Acteren voor film / tv",
                        'acteerervaringreclame' => "Acteren voor reclame",
                        'acterencursus' => "Acteercursus",
                        'toneel' => "Toneel, theater",
                        'catwalkervaring' => "Catwalk / mannequin",
                        'promotiewerk' => "Promotiewerk",
                        'choreografie' => "Choreografie / dansen",
                        'presentatie' => "Presentatie / hosting",
                        'geenervaring' => "Geen ervaring",
                        'taalengels' => 'Engels',
                        'taalfrans' => 'Frans',
                        'taalnederlands' => 'Nederlands',
                        'taalduits' => 'Duits',
                        'taalitaliaans' => 'Italiaans',
                        'taalspaans' => 'Spaans',
                        'engels' => 'Engels',
                        'frans' => 'Frans',
                        'nederlands' => 'Nederlands',
                        'duits' => 'Duits',
                        'italiaans' => 'Italiaans',
                        'spaans' => 'Spaans',
                    ],
                'step_0' =>
                    [
                        'title' => '1. SCHRIJF JE IN',
                        'subtitle' => 'Bedankt voor je interesse om je in te schrijven bij Castingteam of Bordermodels.',
                        'p_1' => 'Wij hebben gegevens en foto\'s van je nodig, wie ben je, hoe zie je eruit, wat kan je, wat kunnen wij met je... we proberen het te weten te komen via dit formulier.<br><br>
                            Neem er even de tijd voor, lees alles aandachtig en vul alles heel precies en correct in, dit zal een 10-tal minuutjes duren.<br><br>
                            Inschrijven is gratis en vrijblijvend. Normaal gezien krijg je snel antwoord ivm je inschrijving, maar je kan ons altijd mailen via <a href="mailto:info@castingteam.com"><u><b>info@castingteam.com</b></u></a> als je vragen hebt.',
                        'registration_button' => 'Schrijf je nu in',
                        'title_2' => '2. OF UPDATE JE GEGEVENS & FOTO\'S',
                        'subtitle_2' => 'Als je al bij ons ingeschreven bent of al een formulier hebt ingevuld, dan kan je via deze weg gegevens of foto\'s aanpassen.',
                        'p_2' => 'Je zal zien welke foto\'s we al van je hebben, daar kan je er gerust enkele van verwijderen en nieuwe aan toevoegen. Geef hieronder je 6 of 10-cijferige inschrijvingscode in en je kan verder.',
                        'login_button' => 'Log in',
                        'code_forget' => 'Code kwijt of vergeten? ',
                        'code_forget_button' => 'Vraag je code op',
                        'li_1' => 'Als je je inschrijvingscode verloren of vergeten bent, vul dan hier je email adres in en deze wordt je toegestuurd.',
                        'li_2' => 'Bij vragen, mail naar <a href="mailto:info@castingteam.com"><u><b>info@castingteam.com</b></u></a>. Als je meerdere codes hebt (bijvoorbeeld van je kinderen) dan worden die samen in de mail vermeld.'
                    ],
                'step_1' =>
                    [
                        'title' => 'STAP 1 : PERSOONLIJKE GEGEVENS',
                        'subtitle' => 'We vragen persoonlijke gegevens, maar deze zullen nooit aan iemand worden vrijgegeven, deze blijven privé.',
                        'text_block' =>
                            [
                                'title' => 'Hoe ben je bij ons terecht gekomen?',
                                'li_1' => 'Via <a href="http://whatmatters.be">whatmatters.be</a>',
                                'li_2' => 'Google search',
                                'li_3' => 'Via een vriend of vriendin',
                                'li_4' => 'Via social media : Facebook, Twitter, Instagram…',
                                'li_5' => 'Aangesproken op straat door een spotter',
                                'li_6' => 'Ik ken Castingteam al langer (Ten tijde van Borderfield)',
                                'li_7' => 'Poster / affiche van Castingteam'
                            ],
                        'tooltip' => 'Verplicht veld',
                        'submit' => 'Opslaan en verder',
                        'text_block_2' =>
                            [
                                'title' => 'TIPS',
                                'li_1' => 'We hebben uiteraard persoonlijke gegevens van je nodig, anders kunnen we je niet contacteren of inschrijven. Deze gegevens zullen nooit gedeeld worden met andere mensen of doorgestuurd.',
                                'li_2' => 'Geef je geboortedatum precies in, liegen over je leeftijd heeft geen zin.',
                                'li_3' => 'Denk eraan om deze gegevens aan te passen als ze ooit veranderen ! ',
                            ],
                        'keywords_placeholder' => 'Op welk trefwoord heb je gezocht?',
                    ],
                'step_2' =>
                    [
                        'geen_idee' => 'Geen idee',
                        'nvt' => 'NVT',
                        'title' => 'STAP 2 : JE MATEN EN OMSCHRIJVING',
                        'subtitle' => 'Geef hieronder je maten op. Probeer dit heel precies te doen; je maten beter voordoen dan ze zijn heeft geen zin...',
                        'text_block' =>
                            [
                                'title' => 'TIPS',
                                'li_1' => 'Qua <strong>Huidskleur</strong> gaat het niet om waar je woont of geboren bent, maar wat je oorspronkelijke etniciteit is, je huidsKLEUR. Bijvoorbeeld, als je voorouders uit Italië komen en jij ziet er italiaans uit, duid dan Latino aan, zelfs als je al heel je leven in België of Nederland woont.',
                                'li_2' => 'Benenmodel, handenmodel of voetmodel; duid deze ALLEEN aan als je hier al ervaring mee hebt of al hebt gedaan voor een commerciële opdracht. Zo niet, maar je vindt toch dat je daarvoor geschikt bent, mail ons dan enkele foto\'s van je benen, handen of voeten.',
                                'li_3' => 'Als deze gegevens veranderen, pas ze dan direct aan... alleen als we de juiste omschrijving hebben kunnen we je steeds correct voorstellen.',
                            ],
                        'tooltip' => 'Opslaan en verder',
                        'parameters' =>
                            [
                                'family' => 'Gezin',
                                'men' => 'Maten mannen',
                                'woman' => 'Maten vrouwen',
                                'teen' => 'Tieners',
                                'kids' => 'Kinderen',
                            ],
                        'subtitle_2' => '<strong>Omschrijving</strong> - Duid zoveel mogelijk aan, aan wat voor jou van toepassing is',
                        'subtitle_3' => 'Huidskleur / etniciteit',
                        'skin_color_block' =>
                            [
                                'title' => '<strong>LET OP</strong> : Huidskleur gaat niet over waar je WOONT of zelfs geboren bent; dit gaat over hoe je er uit ziet, wat je etnisch uiterlijk is, je oorsprong. Dus als je voorouders Turks waren en jij ziet er nog Turks uit, maar je woont al heel je leven in Nederland, duid dan toch ‘Arabisch’ aan, en niet ‘Europees’. ',
                                'subtitle' => 'Als je niet zeker bent wat je etniciteit is, kijk dan op deze lijst : <a href="/files/People_origin.pdf" target="_blank"><span class="underlined_text">Lijst met landen en etniciteit.</span></a>',
                                'subtitle_2' => 'Wat is je land van OORSPRONG? Dus niet waar je geboren bent of woont, maar waar je (voor)ouders oorspronkelijk vandaag komen.',
                                'country' => 'Land van oorsprong',
                                'europees' => 'Benelux, Frankrijk, Duitsland, GB, Zwitserland, Oostenrijk, Tsjechië, West-Rusland etc.',
                                'afrikaans' => 'Midden en Zuid-Afrika.',
                                'noordafrikaans' => 'Noord Afrikaans',
                                'aziatisch' => 'China, Taiwan, Korea, Japan, etc.',
                                'noord_afrikaans' => 'Marokko, Algerije, Tunesië, Libië, Soedan, Egypte, etc.',
                                'zuid_aziatisch' => 'India, Pakistan, Bangladesh, Indonesië, Filippijnen, Singapore, Vietnam, etc.',
                                'zuid-aziatisch' => 'India, Pakistan, Bangladesh, Indonesië, Filippijnen, Singapore, Vietnam, etc.',
                                'noord_aziatisch' => 'Zuid-Rusland, Mongolië, Kazachstan, Kirgizië, Oezbekistan, Tadzjikistan, Turkmenistan, Tibet, etc.',
                                'scandinavisch' => 'Denemarken, Noorwegen, Zweden, IJsland, Finland, etc.',
                                'zuidaziatisch' => 'China, Taiwan, Korea, Japan, Vietnam, etc.',
                                'arabisch' => 'Midden Oosten, Turkije, Iran, Irak, Saudi-Arabie, Sudan, Egypte, Libanon, Israel, etc.',
                                'oostaziatisch' => 'India, Pakistan, Bangladesh, Sri Lanka, Nepal, Bhutan, Malediven, Aghanistan, Thailand, Filipijnen, Laos, Cambodja, Maleisië, Singapore, Indonesië, etc.',
                                'noordaziatisch' => 'Zuid-Rusland, Mongolië, Kazachstan, Kirgizië, Oezbekistan, Tadzjikistan, Turkmenistan, Tibet, etc.',
                                'latin' => 'Spanje, Italië, Griekenland, Kroatië, etc.',
                                'oost-europees' => 'Polen, Slovakije, Servië, Roemenië, Oekraïne, Estonia, etc.',
                                'middle-asia' => 'Zuid-Rusland, Mongolië, Kazachstan, Kirgizië, Oezbekistan, Tadzjikistan, Turkmenistan, Tibet, etc.',
                                'east-asia' => 'India, Pakistan, Bangladesh, Sri Lanka, Nepal, Bhutan, Malediven, Aghanistan, Thailand, Filipijnen, Laos, Cambodja, Maleisië, Singapore, Indonesië, etc.',
                                'north-america' => 'USA, Canada, Alaska, Australië, New-Zeeland (Kaukasisch), etc.',
                                'middle-america' => 'Mexico, Guatemala, Venezuela, Colombia, Brazilië, Argentinië, etc.',
                                'antilliaans' => 'Aruba, Bonaire, Curaçao, Saba, Sint Maarten en Sint Eustatius, Bahamas, Jamaica, etc.',
                                'indians' => 'Inheemse volkeren van Amerika, Inuit, etc.',
                            ],
                    ],
                'step_3' =>
                    [
                        'title' => 'STAP 3 : JE ERVARING',
                        'subtitle' => 'Geef je ervaring op...duid aan wat je al gedaan hebt en noem enkele projecten of campagnes op.',
                        'p_1' => 'Je hebt ervaring met...',
                        'p_2' => 'Welke talen spreek je vloeiend?',
                        'p_3' => 'Geef wat uitleg ivm je ervaring en som enkele gedane projecten of campagnes op',
                        'p_4' => 'Heb je speciale vaardigheden? Sport, hobbies, talenten, unieke kwaliteiten... Vul dit zeker in!',
                        'p_5' => 'Geef hieronder URLs naar videoclips op YouTube, waar je in meedoet. Dat mogen commercials zijn, castingclips, eender wat...',
                        'p_6' => 'Let op, enkel YouTube werkt, dus gebruik enkel URLS zoals deze : <br><span style="color:#00ab84">https://www.youtube.com/watch?v=wZZ7oFKsKzY</span> of <span style="color:#00ab84">https://youtu.be/wZZ7oFKsKzY</span>',
                        'text_block' =>
                            [
                                'title' => 'TIPS',
                                'li_1' => 'LET OP : Als je aanvinkt dat je al geacteerd hebt voor Film / TV of Commercials, som dan enkele voorbeelden op. ',
                                'li_2' => 'Tracht zo volledig mogelijk te zijn qua ervaring en som op wat je al gedaan hebt (niet alles, maar een deel). ',
                                'li_3' => 'Geef een lijstje op van wat je kan... kan je op een éénwieler fietsen, windsurfen, gitaar spelen, ballet dansen, op je hoofd staan... vul het in !',
                                'li_4' => 'Momenteel kunnen alleen video\'s ingevuld worden die op YouTube staan; clips op YouTube zetten is eenvoudig en gratis. ',
                            ],
                        'tooltip' => 'Opslaan en verder'

                    ],
                'step_4' =>
                    [
                        'title' => 'STAP 4 : FOTO’s UPLOADEN',
                        'subtitle' => 'Upload hier foto\'s, professionele of vrijetijds...',
                        'li_1' => 'We kunnen weinig doen met je inschrijving zonder foto\'s...</strong> als je momenteel geen digitale foto\'s hebt is het misschien beter om de inschrijving voorlopig stop te zetten en opnieuw te doen als je ze wel hebt. Onderaan staan nog extra richtlijnen & tips voor je foto\'s...',
                        'li_2' => 'Als je niet voldoende goede en duidelijke foto’s hebt, wij kunnen foto’s voor je maken vanaf 25 a 45 euro (afhankelijk van pakket). Stuur een mailtje naar <a href="mailto:fotograaf@castingteam.com" style="color:#000000; text-decoration: underline ; font-weight: bold;">fotograaf@castingteam.com</a> of kijk op <a href="http://fotos.castingteam.com" target="_blank" style="color:#000000; text-decoration:underline; font-weight : blank;">fotos.castingteam.com</a>.',
                        'text_block' =>
                            [
                                'li_1' => 'Indien mogelijk, minstens 8 foto\'s (of meer)',
                                'li_2' => 'Upload enkel JPG\'s, geen zip files.',
                                'li_3' => 'Maximaal 8 mb per foto! Opgelet, het uploaden kan even duren.',
                                'li_4' => 'Verwijder steeds eerst oude foto\'s, voor je nieuwe upload (bij een update)',
                            ],
                        'p_1' => 'Vermelden van fotografen',
                        'li_3' => 'Geef hier de namen op van de fotografen die je foto’s hebben gemaakt, meestal gaan we deze vermelden op<br>je profielpagina.',
                        'photograph' => 'Namen fotografen',
                        'submit' => 'Opslaan en verder',
                        'text_block_2' =>
                            [
                                'title' => 'TIPS',
                                'li_1' => '<strong>Variatie</strong> : We hebben een hoop, gevarieerde, professionele fotos nodig, liefst in kleur, buiten en binnen (studio) opnamen eventueel... we hebben er minstens 8 goeie nodig, maar meer is beter. ',
                                'li_2' => '<strong>Professioneel</strong> : Vrijetijdsfoto\'s of vakantiefoto\'s zijn niet altijd bruikbaar; vrijetijdsfoto\'s zijn vaak slecht belicht, over het algemeen van bedenkelijke kwaliteit en ze tonen jou als model niet in een kunstmatige omgeving (zoals een studio). Uiteraard kunnen ze wel dienen om je aan ons voor te stellen.',
                                'li_3' => '<strong>Normale fotos</strong> : We hebben fotos nodig zonder rare composities of vreemde poses… Ook geen fotos die te hard zijn ingezoomed (heel close-up) of te artistiek (geen naakt, geen maskers...). Normale, kleurfotos die je tonen zoals je bent, zijn het beste.',
                                'li_4' => '<strong>Expressie</strong> : Stuur ons fotos die aantonen dat jij een veelzijdige range van expressies hebt, fotos met emotie, met gevoel, met karakter...',
                                'li_5' => '<strong>Pub</strong> : Graag ook fotos van advertenties met je beeltenis of campagnes waar je aan meegewerkt hebt. ',
                                'li_6' => '<strong>Vermelding fotograaf</strong> : Wij tonen geen vermeldingen van de fotografen, met naam of logo, op de fotos zelf. Dus bezorg ons fotos zonder die vermelding, of geef ons toestemming deze vermelding te verwijderen (in samenspraak met de fotograaf). Je kan de namen van de fotografen opgeven, deze zullen vermeld worden onderaan je profielpagina. ',
                                'li_7' => 'Als je ons fotos kan bezorgen die voldoen aan deze richtlijnen, heb je al direct een grote voorsprong en is de kans dat je aan de bak komt, een pak groter !',
                            ]
                    ],
                'step_5' =>
                    [
                        'title' => 'STAP 5 : ALGEMENE VOORWAARDEN',
                        'subtitle' => 'Hieronder vind je onze voorwaarden voor inschrijving in ons bestand. Dit zijn wettelijke omschrijvingen die dienen om ons, en jou, te beschermen.',
                        'span' => 'Ik ga akkoord met deze voorwaarden',
                        'button' => 'Opslaan en verder'
                    ],
                'step_6' =>
                    [
                        'title' => 'STAP 6 : BEVESTIGING',
                        'subtitle' => 'Je hebt je inschrijving correct ingevuld... en wat nu?',
                        'subtitle_2' => 'Bedankt om je gegevens en / of foto’s aan te passen! Als je je foto’s hebt veranderd, zullen we deze zo snel mogelijk bekijken en een selectie ervan online zetten.',
                        'text_block' =>
                            [
                                'li_1' => 'Je inschrijvingscode / modelcode is',
                                'li_1_2' => ' (hou deze goed bij).',
                                'li_2' => '<strong>Je bent ingeschreven maar nog niet opgenomen in ons modellenbestand...</strong> We gaan nu je inschrijving bekijken en evalueren... kunnen we je opnemen in ons bestand, of niet?',
                                'li_3' => 'Onze boeksters gaan je gegevens en foto\'s bekijken en binnenkort krijg je daar antwoord over, zowel positief als negatief. Dit kan wel even duren, we krijgen veel aanvragen binnen.',
                                'li_4' => 'Met je modelcode kan je later je inschrijving aanpassen of updaten.',
                                'li_5' => 'Wil je nog iemand inschrijven? Klik hier',
                            ]
                    ],
                'voorwaarden' =>
                    [
                        'content' => '        Deze voorwaarden zijn van toepassing op de relatie tussen het model dat zich inschrijft in deze website enerzijds en Castingteam (BORDERFIELD BVBA) anderzijds. Inschrijving op deze website als model impliceert een voorbehoudloze aanvaarding van deze algemene voorwaarden. Indien en zolang het model minderjarig is, wordt deze instemming en aanvaarding mede bevestigd door de wettelijk verantwoordelijke ouder en/of voogd.<br><br>
                            1. Castingteam (BORDERFIELD BVBA) biedt aan het model de mogelijkheid om opgenomen te worden op de website van Castingteam (BORDERFIELD BVBA) en om aanbiedingen te krijgen om als model te werken voor derden die Castingteam (BORDERFIELD BVBA) aanbrengt. Op geen enkele manier bestaat er een gezagsrelatie tussen Castingteam (BORDERFIELD BVBA) en het model en elk verband van werkgever - werknemer tussen Castingteam (BORDERFIELD BVBA) en het model wordt uitdrukkelijk uitgesloten.
                            <br><br>
                            Voor de uitvoering van modellenwerk wordt met het model telkens een afzonderlijke overeenkomst gesloten, hetzij met Castingteam (BORDERFIELD BVBA), hetzij met de klant van Castingteam (BORDERFIELD BVBA), hetzij via een payroll - kantoor, doch steeds zonder dat Castingteam (BORDERFIELD BVBA) als werkgever optreedt.
                            <br><br>
                            Castingteam (BORDERFIELD BVBA) is in geen geval verantwoordelijk voor ongevallen in uitvoering van een opdracht als model, hetzij onderweg, hetzij op de set of elders. Castingteam (BORDERFIELD BVBA) voorziet geen verzekering voor arbeids- of andere ongevallen.
                            <br><br>
                            2. Castingteam (BORDERFIELD BVBA) vereist niet dat een model exclusief en uitsluitend via Castingteam (BORDERFIELD BVBA) zijn of haar activiteiten uitoefent. Omgekeerd is Castingteam (BORDERFIELD BVBA) niet verantwoordelijk zo een model dat zich bij Castingteam (BORDERFIELD BVBA) inschrijft met een derde een vorm van exclusiviteit zou hebben afgesproken. Het inschrijven op de website van Castingteam (BORDERFIELD BVBA) impliceert de toestemming om opgenomen te worden in het bestand op de website, om online gepubliceerd te worden, naar klanten van Castingteam (BORDERFIELD BVBA) doorgestuurd te worden en op elke andere manier voor publiciteit van Castingteam (BORDERFIELD BVBA) gebruikt te worden.
                            <br><br>
                            Het model mag aan Castingteam (BORDERFIELD BVBA) vragen zijn of haar profiel te verwijderen of naar offline-status te brengen, en dit door een eenvoudig verzoek in die zin aan Castingteam (BORDERFIELD BVBA) te richten.
                            <br><br>
                            3. Het model dat ons foto\'s bezorgt bevestigt over alle nodige auteursrechten te beschikken om Castingteam (BORDERFIELD BVBA) toe te laten deze foto\'s op internet te plaatsen en te verspreiden op elke mogelijke wijze, en zo nodig aan deze foto\'s alle aanpassingen aan te brengen die Castingteam (BORDERFIELD BVBA) nodig acht, waaronder doch niet uitsluitend het aanpassen van het formaat en het bijsnijden van de foto\'s, en het weglaten van de naam of logo van de fotograaf.
                            <br><br>
                            Castingteam (BORDERFIELD BVBA) is zelf niet verantwoordelijk voor eventuele vorderingen in auteursrechtelijk verband en het model zal Castingteam (BORDERFIELD BVBA) daarvoor integraal vrijwaren.
                            <br><br>
                            4. De gegevens die het model ons bezorgt worden door Castingteam (BORDERFIELD BVBA) bewaard, uitsluitend met het oog op het uitvoeren van de overeenkomst tussen het model en Castingteam (BORDERFIELD BVBA). In het kader daarvan kunnen al deze gegevens worden doorgegeven aan derden, waaronder de klanten van Castingteam (BORDERFIELD BVBA) zoals reclamebureaus, fotografen en modehuizen.
                            <br><br>
                            Bij de bewaarde gegevens horen de naam, geboortedatum, geslacht, adres, contactgegevens, moedertaal en diverse uiterlijke kenmerken, waaronder doch niet uitsluitend de huidskleur. Het model geeft voor de verwerking van al deze gegevens uitdrukkelijk toestemming. Het model heeft het recht om ons kosteloos te vragen over welke persoonsgegevens wij beschikken en deze gegevens desgevallend kosteloos te laten corrigeren of te verwijderen, door ons te contacteren via de op deze website opgenomen contactgegevens.
							<br><br>
							5. Alle financiële afspraken tussen klanten en modellen of talents ingeschreven in de database van Castingteam (Borderfield BVBA), dienen in samenspraak met Castingteam (Borderfield BVBA) te gebeuren, vanaf dat Castingteam (Borderfield BVBA) hiervoor benaderd wordt.
							<br><br>
							Zodoende, wanneer een klant contact opneemt met Castingteam (Borderfield BVBA) via email, telefoon of andere weg, dienen alle financiële afspraken die betrekking hebben op de aanvraag die neergelegd werd bij Castingteam (Borderfield BVBA) via Castingteam (Borderfield BVBA) te gebeuren.
							<br><br>
							Indien de opdracht is volbracht en zelfs gefactureerd, maar er nog bijkomende of nieuwe opnames dienen te gebeuren in functie van dezelfde opdracht (zelfde campagne, zelfde merk..) dienen er nieuwe financiële afspraken gemaakt te worden met Castingteam (Borderfield BVBA). Het is klanten of modellen / talents niet toegestaan om rechtstreeks met elkaar afspraken te maken, zonder medezeggenschap of tussenkomst van Castingteam (Borderfield BVBA).
							<br><br>
							Klanten en modellen / talents kunnen in sommige gevallen rechtstreeks met elkaar communiceren, en klanten kunnen zelfs modellen / talents rechtstreeks vergoeden, maar alleen als deze afspraken in samenspraak en akkoord van Castingteam (Borderfield BVBA) zijn gemaakt, en Castingteam (Borderfield BVBA) vergoed wordt middels een casting-, agency- of boekingsfee.
                            <br><br>
                            6. Op de overeenkomst tussen het model en Castingteam (BORDERFIELD BVBA) is het Belgisch recht van toepassing en in geval van betwisting zijn enkel de rechtbanken te Turnhout bevoegd.'
                    ],
                'sidebar' =>
                    [
                        'step_1' => '1. JE GEGEVENS',
                        'step_2' => '2. OMSCHRIJVING',
                        'step_3' => '3. ERVARING',
                        'step_4' => '4. FOTO’S UPLOADEN',
                        'step_5' => '5. VOORWAARDEN',
                        'step_6' => '6. BEVESTIGING',
                    ]
            ]
    ];

}
