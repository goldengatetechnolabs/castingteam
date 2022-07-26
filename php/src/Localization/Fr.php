<?php

class Localization_Fr extends Localization_Language
{
    /**
     * @var string[]
     */
    protected $content = [
        'categories' =>
            [
                '201' => 'People',
                '202' => 'Modèles',
                '203' => 'Comédien(ne)s',
                '204' => 'Enfants & ados',
                '205' => 'Seniors',
                '206' => 'Tous',
            ],
        'title' =>
            [
                '201' => 'People',
                '202' => 'Modèles',
                '203' => 'Comédien(ne)s',
                '204' => 'Enfants et ados',
                '205' => 'Seniors',
                '206' => 'Tous',
                '207' => 'Têtes fraîches',
            ],
        'navigation' =>
            [
                'default' => 'people',
                'people' => 'people-modeles',
                'modellen' => 'modeles',
                'acteurs' => 'acteurs-et-actrices',
                'kids' => 'enfants-et-ados',
                'senioren' => 'seniors-modeles',
                'specials' => 'tous-modeles-et-people'
            ],
        'links' =>
            [
                'home' => 'Accueil',
                'homepage' => 'Accueil',
                'overcastingteam' => 'À propos de Castingteam',
                'mycastingteam'  => '@castingteam.be',
                'logout' => 'Déconnexion',
                'new_talents' => 'Têtes fraîches',
                'people_models' => 'Nos talents',
                'people_models_button' => 'Nos talents',
                'carousel_gallery' => 'Pubs avec nos talents',
                'talent_section' => 'À propos de Castingteam',
                'vip' => 'Devenir VIP',
                'casting' => 'Casting',
                'contact' => 'Contact',
                'registration' => 'Inscris-toi',
                'clips' => 'Clips (Youtube)',
                'profile' => 'Ou ajustez votre profil',
                'blog' => 'Blog',
                'bordermodels' => 'Bordermodels',
                'vlambaar_people' => 'Vlambaar People for Events'
            ],
        'messages' =>
            [
                'login' =>
                    [
                        'success' => 'Connexion réussie, bienvenue user_firstname !',
                        'fail' => 'Le mot de passe est incorrect. Veuillez réessayer ou contactez info@castingteam.com'
                    ],
                'loading' => 'Vous êtes arrivé à la fin de la liste.',
                'error' =>
                    [
                        'image_error' => 'Seuls les VIP peuvent visionner les photos grand format. Pour plus d’informations, consultez :',
                        'fields_empty' => 'Tous les champs obligatoires doivent être remplis',
                        'iternal' => 'Une erreur technique s’est produite.',
                        'codes_sending_error' => 'Cette adresse e-mail ne correspond à aucune personne enregistrée. N’hésitez pas à nous contacter.'
                    ],
                'info' =>
                    [
                        'registration' => 'Votre inscription en tant que VIP a été envoyée avec succès. Une fois approuvée, nous vous enverrons une confirmation. Merci pour l’intérêt que vous portez à Castingteam.',
                        'mail_sent' => 'Votre sélection a été envoyée',
                        'selection_added' => 'Ajouté à la sélection',
                        'codes_sent' => 'Votre(vos) code(s) Castingteam a/ont été envoyé(s) à cette adresse e-mail. Si vous ne les recevez pas, veuillez vérifier votre Courrier indésirable.'
                    ],
                'front' =>
                    [
                        'verplichte_velden' => 'Vous n\'avez pas rempli tous les champs obligatoires.',
                        'geen_geldige_email' => 'L\'adresse e-mail que vous avez saisie n\'est pas valide.',
                        'dezelfde_email' => 'Les adresses e-mail saisies ne correspondent pas.',
                        'algemene_voorwaarden' => 'Veuillez accepter les conditions générales.',
                        'niets_ingegeven' => 'Vous n\'avez rien rempli',
                        'geen_model' => 'Nous n\'avons pas trouvé de modèle correspondant à ce code.',
                        'geen_fotos' => 'Vous devez ajouter au minimum une photo.',
                        'vergeten_verstuurd' => 'Votre code personnel vous a été envoyé par e-mail.',
                        'vergeten_fout' => 'Nous n\'avons pas trouvé de modèle correspondant à cette adresse e-mail.',
                        'form_talent_warning' => 'Certain de ne pas vouloir en dire plus au sujet de vos hobbies ou talents ? Cela nous aide à avoir une meilleure image de vous et à vous offrir davantage de missions.',
                        'form_experience_warning' => 'Vous avez indiqué vos expériences mais n\'avez pas donné d\'explications ou mentionné des projets sur lesquels vous avez travaillé. Etes-vous certain de vouloir laisser ce champ vide ?',
                    ]
            ],
        'countries' =>
            [
                'belgium' => 'Belgique',
                'netherlands' => 'Pays-Bas',
                'france' => 'France',
                'germany' => 'Allemagne',
                'luxembourg' => 'Luxembourg',
                'uk' => 'Royaume-Uni',
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
                'length' => 'Taille',
                'burst' => 'Poitrine',
                'taille' => 'Tour de taille',
                'hips' => 'Hanches',
                'costum' => 'Confection',
                'jeans' => 'Taille de jeans',
                'shoes' => 'Pointure',
                'kinder' => 'Taille enfant',
                'int_size' => 'Taille int.',
                'cup_size' => 'Taille de bonnet',
                'country' => 'Pays',
                'skin_color' => 'Couleur de peau',
                'eyes' => 'Yeux',
                'hair_color' => 'Couleur de cheveux',
                'hair_type' => 'Style de cheveux',
                'hair_length' => 'Longueur de cheveux',
                'lichaam' => 'Corps',
                'experience' => 'Expérience d’acteur publicitaire'
            ],
        'filters' =>
            [
                'age' => 'Âge',
                'year' => 'année',
                'to' => 'jusque',
                'from' => 'de',
                'less_than' => 'Plus petit que',
                'vegetation' => 'Pilosité',
                'category' => 'Catégorie',
                'hair_color' => 'Couleur de cheveux',
                'hair' => 'Style de cheveux',
                'hair_length' => 'Longueur de cheveux',
                'feature' => 'Caractéristiques',
                'jeans' => 'Taille de jeans',
                'size' => 'Taille de vêtements',
                'shoes' => 'Pointure',
                'costume' => 'Taille de costume',
                'cup' => 'Taille de bonnet',
                'kinder' => 'Taille enfant',
                'int_size' => 'Taille int.',
                'eyes_color' => 'Couleur des yeux',
                'language' => 'Langue parlée',
                'length' => 'Tour de taille',
                'body' => 'Corps',
                'choose' => 'Choix',
                'hips' => 'Tour de hanches',
                'waist' => 'Tour de taille',
                'bust' => 'Tour de poitrine',
                'sizes' => 'Tailles',
                'cloth_sizes' => 'Tailles de vêtements',
                'refine' => 'AFFINER LA SÉLECTION',
                'man' => 'Hommes',
                'woman' => 'Femmes',
                'girl' => 'Filles',
                'boy' => 'Garçons',
                'skin' => 'Couleur de peau',
                'specific' => 'Spécifique',
                'decoration' => 'Ornements'
            ],
        'form' =>
            [
                'name' => 'Votre prénom',
                'surname' => 'Votre nom',
                'email' => 'Votre e-mail',
                'email_address' => 'Votre adresse e-mail',
                'email_address_reciever' => 'Adresse e-mail du destinataire',
                'comment' => 'Remarques',
                'telephone' => 'Numéro de téléphone',
                'company' => 'Nom de la société',
                'sector' => 'Votre secteur',
                'password' => 'Choisissez un mot de passe',
                'tooltip' => 'Champ obligatoire',
                'button' => 'Envoyé',
                'sector_option' =>
                    [
                        'empty' => 'Choix',
                        'option_1' => 'Photographie',
                        'option_2' => 'Film',
                        'option_3' => 'Publicité',
                        'option_4' => 'Directeur de casting',
                        'option_5' => 'Client final',
                        'option_6' => 'Photo ou film étudiant',
                        'option_7' => 'Autre'
                    ]
            ],
        'facebook' =>
            [
                'share' => 'Castingteam représente des milliers de talents, modèles, acteurs et actrices, enfants et ados, seniors ou autres personnes spéciales...en Belgique et aux Pays-Bas.'
            ],
        'header' =>
            [
                'title' => 'Castingteam',
                'description' => 'Castingteam, c’est une agence de casting et de modèles comptant des milliers de talents, modèles, acteurs et actrices, enfants et ados, seniors ou autres personnes spéciales.',
                'contact_mail' => 'info@castingteam.com',
                'close' => 'fermer',
                'login' =>
                    [
                        'welcome' => 'Bienvenue',
                        'mail_to' => 'Envoyez-nous un e-mail',
                        'registration' => 'Inscris-toi',
                        'registration_subtitle' => 'Ou ajustez votre profil',
                        'login' => 'Connexion VIP',
                        'email' => 'Adresse e-mail',
                        'password' => 'Mot de passe',
                        'submit' => 'Se connecter'
                    ],
                'tooltip' =>
                    [
                        'title' => 'Inscrivez-vous ici !',
                        'p' => 'Modèles, acteurs et actrices, silhouettes, enfants, ados et seniors'
                    ]
            ],
        'footer' =>
            [
                'link_instagram' => 'Castingteam sur Instagram',
                'link_youtube' => 'Pubs et vidéos sur YouTube',
                'link_facebook' => 'Castingteam sur Facebook',
                'policy' => 'Ce site utilise des cookies pour simplifier l’utilisation du site web. Consultez notre ',
                'policy_end' => 'pour obtenir plus d’informations sur l’utilisation des cookies et comment les bloquer.<br><br>Copyright Borderfield ',
                'policy_a' => 'politique en matière de cookies ici',
                'copyright' => 'Conditions générales',
                'disclaimer' => 'Clause de non-responsabilité',
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
                'field_1' => 'Faites une nouvelle sélection',
                'field_2' => 'Ou reprenez une sélection sauvegardée',
                'option' => 'Vos sélections sauvegardées',
                'button' => 'Envoyé',
                'tooltip' => 'Champ obligatoire',
                'p_1' => 'Pas encore VIP chez Castingteam ?',
                'a' => 'Inscrivez-vous ici',
                'p_2' => ' et sauvegardez autant de sélections que vous le désirez parmi un tas d’autres avantages. Si vous êtes déjà VIP, vous pouvez vous connecter en haut de page.'

            ],
        'homepage' =>
            [
                'h1' =>  'Castingteam is een casting -én modellenbureau; the best of both worlds.',
                'title' =>  'Une personnalité pour chaque <span>idée</span>',
                'grid_button' =>  'Montrez plus...',
                'section_about' =>
                    [
                        'title' => 'Chez Castingteam nous aimons le contact humain; notre passion est de chercher - et de trouver- des personnalités originales et de caractère.',
                        'text' => '<p><strong>Castingteam est une agence de casting et de mannequin- le meilleur de deux mondes.</strong></p>
                                <p>Nous sommes des directeurs de casting - nous recherchons activement les personnes adéquates pour chacune de vos idées - nous avons également notre propre base de données avec plus de 6 000 talents et un réseau de plus de 50.000 personnes.</p>
                                <p>Mannequins, comédien(ne)s, figurants, ados ou vieilles têtes de personnage; nouveaux talents et professionnels chevronnés.</p>'
                    ],
                'button_instagram' => 'Vers Instagram',
                'section_bordermodels' =>
                    [
                        'text' => 'Un département de modélisation séparé a été créé à partir de Castingteam; <a target="_blank" href="http://bordermodels.com/">bordermodels.com</a>, spécialisée dans les styles de vie et de mode professionnels et internationaux.',
                        'button' => 'Découvrez les modèles de bord'
                    ],
                'section_vlambaar' =>
                    [
                        'text' => 'Également provenir de Castingteam; <a target="_blank" href="http://vlambaar.com">Vlambaar.com</a>. Flamable fournit des hôtesses et des promoteurs, des acteurs et des actrices, des présentateurs et des présentateurs, des artistes et des modèles pour des événements et des campagnes d\'activation.',
                        'button' => 'Découverte inflammable'
                    ]
            ],
        'vip' =>
            [
                'title' => 'Castingteam<br/>pour les VIP',
                'subtitle' => 'Castingteam propose à ses clients un programme spécial VIP grâce auquel ces derniers bénéficient d’avantages, de fonctionnalités et de ristournes supplémentaires.',
                'p_1' => 'Ce programme est entièrement gratuit. Il est toutefois exclusivement destiné aux photographes, aux réalisateurs, aux agences publicitaires et aux maisons de production qui travaillent sur base professionnelle avec les talents, les modèles ou les acteurs et actrices.',
                'p_2' => 'En tant que VIP, vous...',
                'li_1' => '...bénéficiez de ristournes jusqu’à 15 % !',
                'li_2' => '...Conservez les sélections de talents et de modèles aussi longtemps que vous le souhaitez',
                'li_3' => '...visualisez les photos de nos talents en grand format',
                'li_4' => '...transférez les profils de modèles (PDF) sans mention de notre nom',
                'li_5' => '...bénéficiez d’une mise à disposition gratuite de talents, de modèles ou d’acteurs pour des shooting tests et des expériences créatives',
                'li_6' => '...êtes constamment informé de l’arrivée de nouveaux talents',
                'li_7' => '...bénéficiez de notre programme de référencement',
                'button_a' => 'Inscrivez-vous maintenant comme VIP',
                'subtitle_2' => 'INSCRIVEZ-VOUS COMME VIP',
                'subtitle_3' => 'Présentation des avantages...',
                'text_block_1' =>
                    [
                        'title' => 'Bénéficier de ristournes',
                        'p' => 'Nous récompensons les collaborations fréquentes en octroyant des ristournes. Attention, les ristournes sont bien entendu toujours déduites de notre commission, et non de celle des talents ou acteurs !'
                    ],
                'text_block_2' =>
                    [
                        'title' => 'Conserver les sélections de talents et de modèles aussi longtemps que vous le voulez',
                        'p' => 'En tout état de cause, vous pouvez établir et transférer des sélections via notre site web. Les VIP, quant à eux, peuvent conserver ces sélections aussi longtemps qu’ils le souhaitent, dans un aperçu pratique disponible sur leur page de profil.'
                    ],
                'text_block_3' =>
                    [
                        'title' => 'Visualiser les photos grand format de nos talents',
                        'p' => 'Les VIP peuvent cliquer sur les photos des talents ou modèles pour les consulter ou les télécharger et les envoyer (bientôt).'
                    ],
                'text_block_4' =>
                    [
                        'title' => 'Transférer les profils de modèles (PDF) sans mention de notre nom',
                        'p' => 'En tant que VIP, vous pouvez télécharger les profils sous forme de fiche normale ou \' vierge \' (fiches sans la mention \' Castingteam \').'
                    ],
                'text_block_5' =>
                    [
                        'title' => 'Bénéficier d’une mise à disposition gratuite de talents, de modèles ou d’acteurs pour des shooting tests et des expériences créatives',
                        'p' => 'Castingteam veut aider les photographes et les réalisateurs à trouver gratuitement des talents, modèles ou acteurs et actrices expérimentés pour des expériences créatives. Envoyez-nous les informations dont vous disposez sur votre projet et nous analyserons comment nous pouvons vous aider à trouver les talents adéquats. '
                    ],
                'text_block_6' =>
                    [
                        'title' => 'Soyez constamment informé de l’arrivée de nouveaux talents',
                        'p' => 'Si vous le souhaitez, nous vous envoyons une sélection de nouveaux talents, de nouveaux anonymes, de modèles, d’acteurs et actrices afin que vous puissiez être les premiers à collaborer avec eux.'
                    ],
                'text_block_7' =>
                    [
                        'title' => 'Bénéficier de notre programme de référencement',
                        'p' => 'En tant qu’agence de casting, nous nous situons au cœur d’un énorme réseau composé d’un côté des clients et de l’autre des professionnels. Nous les mettons volontiers en relation pour permettre à nos VIP d’obtenir de temps à autre des projets via nos contacts. '
                    ],
            ],
        'mycastingteam' =>
            [
                'title' => 'My Castingteam',
                'subtitle' => 'My Castingteam, c’est votre page de profil sur notre site. Vous pouvez y modifier vos données, explorer les sélections que vous avez sauvegardées, consulter nos tarifs... ',
                'selections' =>
                    [
                        'title' => 'Vos sélections sauvegardées',
                        'button' => 'Transférez',
                        'no_selections' => 'Vous n’avez encore sauvegardé aucune sélection'
                    ],
                'pdf' =>
                    [
                        'title' => 'Nos tarifs',
                        'p' => 'Téléchargez notre liste de tarifs. En règle générale, nous adaptons cette liste une fois par an et nous vous en informons. ',
                        'button' => 'Consulter les tarifs (PDF)'
                    ],
                'update' =>
                    [
                        'title' => 'Modifiez vos données'
                    ]
            ],
        'casting' =>
            [
                'title' => 'Casting(team)',
                'subtitle' => '\' The right face for any idea \' : telle était notre devise. Et à vrai dire, elle n’a pas changé : nous cherchons - et dénichons - le talent qui vous convient. Point final. ',
                'text_block' =>
                    [
                        'p_1' => 'Castingteam est plus qu’un bureau de casting et de modèles. Nous sommes des directeurs de casting, nous formons une équipe de jeunes professionnels passionnés du mondes de la publicité, de la scène et du théâtre.',
                        'p_2' => 'Castings',
                        'p_3' => 'Pour les missions de recherches difficiles, nous plongeons dans notre réseau ou nous descendons dans la rue. Nous organisons également des castings photos et vidéo pour nos clients au sein de notre studio ; nous convions tout un tas de personnes - en fonction des exemples fournis par le client – et réalisons des clips de casting conformes au concept proposé.',
                        'p_4' => 'Notre mode de fonctionnement',
                        'p_5' => 'Le client (agence publicitaire, photographe, réalisateur, producteur...) nous confie un concept de campagne publicitaire et des exemples illustrant ses attentes. Via divers canaux, nous recherchons des personnes correspondantes ; dans notre base de données, sur notre réseau (étendu), sur les médias sociaux ou en allant les dénicher dans la rue. <Br><br>Très rapidement, nous envoyons une première sélection à notre client, sur base de laquelle nous invitons une liste de candidats sélectionnés dans notre studio. Il n\'y a aucune restriction, nous invitons autant de personnes que le client le souhaite ou nécessite. Bien entendu, nous conseillons le client et l’assistons dans son choix. Nous organisons ensuite une ou plusieurs sessions de casting auxquelles le client peut assister s’il le souhaite. Nous réalisons un clip de casting court dans lequel les personnes se présentent et jouent une petite scène en fonction du script ou du concept. Nous encadrons également ces talents, car nous n’avons pas toujours affaire à des acteurs professionnels. Au contraire, notre tâche consiste souvent à faire émerger le talent de \"gens ordinaires\".<br><br>Ces clips de casting sont ensuite remis au client et ensemble, nous sélectionnons les candidats adéquats. Si vous le souhaitez, nous accompagnons et encadrons également les talents sélectionnés sur le plateau.',
                        'p_6' => 'Casting international',
                        'p_7' => 'Castingteam possède un réseau de directeurs de casting dans différents pays. Vous planifiez une production à Londres ou à Miami ? Nous pouvons vous mettre en contact ou en liaison avec les talents adéquats.'
                    ]
            ],
        'contact' =>
            [
                'title' => 'Contact',
                'text_block' =>
                    [
                        'p_1' => 'Castingteam Bruxelles',
                        'p_2' => 'Castingteam Flandre',
                        'p_3' => 'Castingteam Pays-Bas',
                        'p_4' => 'S’inscrire',
                        'p_5' => 'Nous sommes constamment à la recherche de personnes photogéniques, de modèles, d’acteurs et d’actrices, d’enfants et d’ados, de seniors... Vous pouvez vous inscrire via <span class="strong"><a href="/fr/register/0" class="black-underlined" target="_blank">inschrijven.castingteam.com</a></span>.',
                    ]
            ],
        'conditions' =>
            [
                'text_block_1' =>
                    [
                        'title' => 'Politique en matière de cookies',
                        'p' => '
                          Castingteam (BORDERFIELD BVBA) utilise des cookies.<br><br>
                          Les cookies sont de petits fichiers qui retiennent vos préférences de navigation et les enregistrent sur votre ordinateur. Un cookie ne stocke pas votre nom ou autre information, ils ne retiennent que vos préférences et vos intérêts en fonction de vos habitudes de navigation.<br><br>
                          Les cookies ne peuvent JAMAIS être utilisés pour lire des données privées sur votre ordinateur ou intercepter des mots de passe. En outre, ils ne peuvent pas infecter votre ordinateur par virus ou cheval de Troie. Ils sont complètement sûrs et sont utilisés depuis les années 90 sans incident sur presque tous les sites dans le monde. <br><br>
                          La plupart des navigateurs acceptent automatiquement les cookies. Vous pouvez configurer votre navigateur pour vous avertir avant d’accepter ou rejeter un cookie. Vous trouverez des informations supplémentaires sur les différentes manières de paramétrer votre navigateur dans la fonction d\'aide de votre navigateur. <br><br>
                          <span class=\'strong\'>Les fonctions de nos cookies :</span> <br><br>
                          # Maintenir la connexion à votre compte VIP<br>
                          # Maintenir les sélections de modèles sur plusieurs sessions<br>
                          # APIs des médias sociaux (Facebook, Twitter, Instagram, LinkedIn)<br>
                          # Analyser le nombre de visiteurs et l’usage<br>
                          # Retenir votre choix de langue'
                    ],
                'text_block_2' =>
                    [
                        'title' => 'Disclaimer',
                        'p' => '
                            Les conditions de ce disclaimer sont d’application sur les sites web www.castingteam.com / www.castingteam.be / www.castingteam.nl et www.borderfield.com. En visitant ces sites web et / ou en utilisant des informations fournies par ces sites, vous marquez votre accord avec l’application de ce disclaimer.<br><br>

                            <span class=\'strong\'>Utilisation du site web</span><br>
                            Les informations sur ce site web sont exclusivement considérées comme des informations générales. Il n’est pas possible de conférer des droits aux informations sur ce site web. Bien que Castingteam (BORDERFIELD SPRL) compile et entretient ce site web de façon consciencieuse en faisant appel à des sources réputées fiables, Castingteam (BORDERFIELD SPRL) ne peut en aucun cas être tenu responsable de l’exactitude, l’intégralité et l’actualité des informations fournies. Castingteam (BORDERFIELD SPRL) ne garantit pas un fonctionnement parfait et ininterrompu du site web. Castingteam (BORDERFIELD SPRL) réfute explicitement toute responsabilité concernant l’exactitude, l’intégralité et l’actualité des informations fournies et l’utilisation (ininterrompue) de ce site web.<br><br>

                            <span class=\'strong\'>Informations de tiers, produits et services</span><br>
                            Lorsque Castingteam (BORDERFIELD SPRL) utilise des liens vers des sites web de tierces parties, cela ne signifie en aucun cas que les produits et services proposés sur ce site web sont recommandés par Castingteam (BORDERFIELD SPRL). Castingteam (BORDERFIELD SPRL) réfute toute responsabilité pour le contenu, l’utilisation ou la disponibilité des sites web vers lesquels il réfère ou qui font référence au site web. L’utilisation de ces liens se fait aux risques de l’utilisateur. Les informations sur ces sites web n’ont pas été jugées au niveau de l’exactitude, de la rationalité, de l’actualité ou de l’intégralité par Castingteam (BORDERFIELD SPRL).<br><br>

                            <span class=\'strong\'>Utilisation des données</span><br>
                            Le propriétaire se réserve tous les droits de propriété intellectuelle ainsi que les autres droits sur les informations fournies sur ce site web (dont les textes, le matériel graphique, les photos et les logos). Il n’est pas permis de copier, de télécharger ou de rendre public de quelque façon que ce soit, de distribuer ou de reproduire des informations reprises sur ce site web sans l’autorisation écrite et préalable du propriétaire ou de l’autorisation légale de l’ayant droit.<br><br>

                            <span class=\'strong\'>Photos affichées sur le site web</span><br>
                            Les modèles, acteurs et actrices et toutes autres personnes qui nous fournissent des photos confirment posséder les droits d’auteur nécessaires afin d’autoriser Castingteam (BORDERFIELD SPRL) à placer ces photos sur Internet et de les distribuer de toutes les façons possibles, et au besoin d’adapter ces photos là où ce serait jugé nécessaire par Castingteam (BORDERFIELD SPRL), dont mais pas uniquement l’adaptation du format et le rognage de photos, ou la suppression du nom ou du logo du photographe.
                            Castingteam (BORDERFIELD SPRL) ne peut être tenu responsable en cas d’éventuelles créances émanant de droits d’auteur et les modèles, acteurs et actrices préservent intégralement Castingteam (BORDERFIELD SPRL) de ceux-ci.<br><br>

                            <span class=\'strong\'>Adaptations</span><br>
                            Castingteam (BORDERFIELD SPRL) se réserve le droit à tous temps de modifier les informations fournies sur ce site, à l’inclusion des textes de ce disclaimer, sans annonce préalable. Il est donc recommandable de périodiquement vérifier si les informations fournies sur ce site web, dont les textes du disclaimer, ont été adaptés.<br><br>

                            <span class=\'strong\'>Droit applicable</span><br>
                            Le droit belge est d’application sur ce site web et ce disclaimer. Tous les litiges concernant ce disclaimer relèvent exclusivement soumis des tribunaux compétents en Belgique.'
                    ],
                'text_block_3' =>
                    [
                        'title' => 'Conditions Générales',
                        'p' => '
                            Conditions Générales de Castingteam (Borderfield SPRL) - Broederminstraat 7, 2018 Antwerpen - BE0 888 388 950.
                            <br><br>
                            <span class=\'strong\'>1. Général</span><br>
                            Les présentes conditions font partie intégrante de toutes les offres, missions et contrats avec Castingteam (Borderfield SPRL). En faisant appel à Castingteam (Borderfield SPRL) pour une mission, vous marquez votre accord avec les présentes conditions. Les  présentes conditions générales ont la priorité sur les éventuelles conditions générales du donneur d’ordre. Les dérogations et exceptions aux présentes conditions sont uniquement valables en cas d’accord écrit conclu préalablement par les deux parties.

                            <br><br>
                            <span class=\'strong\'>2. Garanties</span><br>
                            Castingteam (Borderfield SPRL) s’engage à exécuter avec soin les missions qui lui ont été confiées. Castingteam (Borderfield SPRL) garantit la qualité de l’exécution des missions qui lui sont confiées.

                            <br><br>
                            <span class=\'strong\'>3. Bookings</span><br>
                            Les donneurs d’ordre font des bookings auprès de Castingteam (Borderfield SPRL) pour des modèles. Dans les présentes conditions générales, le terme « Modèle » signifie : modèles (photo), people, seniors, adolescents, enfants, acteur, actrices, spéciaux, visagistes et stylistes. Il est également possible de faire des bookings pour des prises de vue photo ou vidéo.<br><br>

                            Le booking est confirmé par une confirmation de booking rédigé par Castingteam (Borderfield SPRL). Celle-ci doit être signée pour accord par le donneur d’ordre et être en possession de Castingteam (Borderfield SPRL) avant le début du booking, moyennant une signature électronique sur le site web de Castingteam (Borderfield SPRL).<br><br>
                            Si des droits additionnels sont calculés sur le document de booking pour une mission réservée, ces droits sont irrévocables, même si le client n’utilise finalement pas ces images. Le choix de faire valoir des droits pour une mission se termine le jour prévu du shooting. En d’autres mots, le lendemain du shooting, ce choix est irrévocable et les tarifs de droits tels que prévus sur les documents de booking sont d\'application.

                            <br><br>
                            <span class=\'strong\'>4. Casting</span><br>
                            Lorsqu’un client demande à des modèles ou des acteurs de participer à un casting, seuls les frais de voyage des modèles ou des acteurs sont à couvrir, sauf arrangement contraire. Si cinq modèles ou plus sont demandés, des frais administratifs seront facturés au donneur d’ordre, par accord mutuel.

                            <br><br>
                            <span class=\'strong\'>5. Force majeure</span><br>
                            En cas de maladie ou d’autres circonstances de type privé empêchant un modèle / acteur d’être présent à l’heure convenue à l’endroit convenu, il s’agit de force majeure. Castingteam (Borderfield SPRL) fera alors de son mieux afin de pourvoir un remplacement approprié. Si, pour quelque raison que ce soit, ceci n’est pas possible, le booking sera ajourné. Dans ce cas, Castingteam (Borderfield SPRL) ne peut pas être tenu responsable des dommages encourus par le donneur d’ordre.<br><br>
                            Si plusieurs modèles ou acteurs de Castingteam (Borderfield SPRL) dépendent de la personne absente et si le shooting ne peut pas avoir lieu suite à l’absence du modèle, le client doit opérer un choix clair : soit il renvoie le(s) modèle(s) déjà présents, ce qui n’engendre aucun coût, soit il utilise le(s) modèle(s) à d’autres fins et accepte donc la rémunération classique de ce(s) modèle(s), sans pour autant bénéficier d’une réduction ou d’une compensation.

                            <br><br>
                            <span class=\'strong\'>6. Responsabilité</span><br>
                            Le donneur d’ordre préserve Castingteam (Borderfield SPRL) des revendications de tierces parties, en particulier des revendications du modèle suite à des dommages encourus par le modèle à l’endroit de l’exécution du contrat. Le terme « endroit » signifie le lieu où des photos sont prises, où une vidéo a été enregistrée ou où toute autre prise de vie a été effectuée. Cette clause de sauvegarde est également applicable pour les revendications du modèle ou des tiers concernant les droits de propriété intellectuelle et les droits à l’image.

                            <br><br>
                            <span class=\'strong\'>7. Paiements</span><br>
                            Castingteam (Borderfield SPRL) encaisse le montant dû par le donneur d’ordre au modèle. Les montants sont mentionnés sur la confirmation de booking. Tous les tarifs incluent la provision d’agence de Castingteam (Borderfield SPRL) et excluent la TVA selon le pourcentage légalement fixé.

                            <br><br>
                            <span class=\'strong\'>8. Tarifs spéciaux et Surcoûts</span><br>
                            En cas d’heures supplémentaires (travail en dehors des heures convenues), des tarifs particuliers sont d’application. Le donneur d’ordre demandera un aperçu des tarifs des heures supplémentaires en vigueur à Castingteam (Borderfield SPRL) avant le début de la mission.<br><br>
                            Pour des utilisations particulières (par exemple l’exclusivité, l’utilisation des enregistrements dans plus d’un pays ou l’utilisation d’un enregistrement pendant plus d’un an après l’enregistrement) ou pour des enregistrements particuliers (par exemple des enregistrements de film, de télévision et ou de vidéo ou de publicités vidéo) des surcoûts additionnels sont dus, après arrangement (voir la liste des Tarifs des droits).
                            Si un surcoût est dû par année calendrier, mois calendrier ou tout autre délai, le donneur d’ordre est tenu de s’acquitter de la totalité des surcoûts, même s’il n’a pas utilisé les images concernées du modèle/des modèles pendant la totalité du délai.

                            <br><br>
                            <span class=\'strong\'>9. Indemnités de frais de voyage</span><br>
                            Si la prise de vue a lieu en dehors du domicile du modèle, la totalité des frais de voyage en train sont facturés au donneur d’ordre. Si le modèle fait le voyage en voiture, le tarif maximal en vigueur par kilomètre pour les déplacements professionnels est pris en considération pour le calcul.<br><br>
                            Sauf arrangement contraire, les frais de stationnement sont facturés au donneur d’ordre.
                            Les frais de voyage pour les modèles étrangers sont déterminés de commun accord. Les frais de voyage pour les voyages à l’étranger doivent être payés par le donneur d’ordre avant le début du voyage. Dans le cas d’un booking d’un enfant jusqu’à 16 ans, les frais de voyage de l’enfant ainsi que d’un accompagnateur doivent être pris en charge.

                            <br><br>
                            <span class=\'strong\'>10. Annulations</span><br>
                            Lors d’un booking pour un jour, une demi-journée ou quelques heures : en cas d’annulation au minimum quarante-huit heures avant le début de la mission, aucun frais ne sera facturé. En cas d’annulation le jour même, les honoraires complets sont dus, sauf si l’annulation a lieu la matinée alors que le(s) modèle(s) est/sont réservé(s) pour l’après-midi, auquel cas seuls 50 % du tarif convenu est facturé. En cas de booking de plusieurs jours, le délai de préavis équivaut au nombre de journées réservées ; si ce délai n’est pas respecté, la totalité des honoraires est due.

                            <br><br>
                            <span class=\'strong\'>11. Annulations pour cause de mauvais temps</span><br>
                            Dans le cas d’une annulation d’un booking pour cause de mauvais temps, la première annulation n’engendre pas de coûts, à condition qu’elle soit notifiée un délai raisonnable avant la mission. Lors d’une deuxième annulation de ce type, 50 % des honoraires convenus sont dus. Pour les annulations suivantes : 100 % des honoraires convenus sont dus.

                            <br><br>
                            <span class=\'strong\'>12. Paiements</span><br>
                            Le donneur d’ordre reçoit une facture de la part de Castingteam (Borderfield SPRL) pour le montant dû. Le montant dû doit être payé endéans les 30 jours de la date d’émission de la facture sur le compte bancaire de Castingteam (Borderfield SPRL) mentionné sur la facture.<br><br>
                            Si un acompte doit être payé, la facture d’acompte doit être payée immédiatement. Si un acompte n’est pas payé (à temps), Castingteam (Borderfield SPRL) se réserve le droit de suspendre le booking convenu. Si le donneur d’ordre conteste la facture, il est tenu de le notifier à Castingteam (Borderfield SPRL) endéans les 8 jours après réception de la facture.

                            <br><br>
                            <span class=\'strong\'>13. Conséquences d’un paiement tardif</span><br>
                            Lorsque le délai de paiement est dépassé, le montant dû ou la partie restante du montant dû peut être majoré de plein droit et sans mise en demeure préalable d’un intérêt de 2 % par mois ou mois partiel. Le non-respect du délai de paiement peut en outre engendrer la suppression des droits concédés ainsi que des réductions et garanties concédées au donneur d’ordre.<br><br>
                            En outre, tous les frais judiciaires et extrajudiciaires portés par Castingteam (Borderfield SPRL) pour la perception d’une créance sont à la charge du donneur d’ordre. Les frais de sommation et de mise en demeure ainsi que les acomptes et les honoraires de la personne mandatée par Castingteam (Borderfield SPRL) pour le recouvrement sont compris dans les frais extrajudiciaires.
                            Les frais extrajudiciaires sont fixés à 15 % du montant principal, TVA comprise, et sont dus de plein droit et sans mise en demeure suite au simple non-respect du délai de paiement.

                            <br><br>
                            <span class=\'strong\'>14. Utilisation</span><br>
                            Après le paiement des tarifs convenus par écrit, le donneur d’ordre a le droit, au sein du domaine communiqué et pendant la période indiquée après la date de la prise de vue ou pendant une période particulière convenue par écrit, d’utiliser le matériel de la manière dont cela avait été convenu dans la confirmation de booking.
                            Tous les coûts portés par Castingteam (Borderfield SPRL) dans le but d’effectuer les droits du modèle et / ou de Castingteam (Borderfield SPRL) sont à la charge du donneur d’ordre. Dans le cadre d’une représentation responsable des intérêts des modèles de Castingteam (Borderfield SPRL), le client est tenu de faire parvenir le résultat final avec l’image du modèle concerné qui sera utilisée par le client ou son client à info@castingteam.com. De cette manière, Castingteam (Borderfield SPRL) garantit une utilisation déontologique de la prise de vue au modèle.<br><br>
                            En toutes circonstances, le donneur d’ordre est responsable d’une utilisation correcte de l’image, en respectant le droit à l’image du modèle.

                            <br><br>
                            <span class=\'strong\'>15. Litiges</span><br>
                            Seul le droit belge est d’application et tout litige éventuel relève de la compétence exclusive des tribunaux de Turnhout / Anvers.'
                    ]
            ],
        'partner-nederland' =>
            [
                'title' => 'Recherche de partenaires',
                'subtitle_1' => 'Castingteam ne cesse de croître. C’est pourquoi nous recherchons des partenaires pour le marché néerlandais.<br><br>Pour nos activités aux Pays-Bas, nous recherchons un...',
                'subtitle_2' => 'Agent d’artiste/partenaire (franchise) H/F',
                'subtitle_3' => 'À propos de vous...',
                'subtitle_4' => 'À propos de nous...',
                'subtitle_5' => 'Partenariat...',
                'text_block' =>
                    [
                        'li_1' => 'Vous disposez d’un réseau de professionnels de la publicité, des médias et du divertissement : photographes, maisons de production, régisseurs, agences publicitaires... Vous connaissez de nombreuses personnes dans le secteur, ou vous êtes un fonceur qui sait comment mettre en place un réseau.',
                        'li_2' => 'Vous êtes créatif, sociable, enthousiaste et vous êtes un passionné de publicité et de divertissement.',
                        'li_3' => 'Vous avez une expérience dans le secteur des castings et/ou du travail avec des directeurs de casting, maisons de production, producteurs...',
                        'li_4' => 'Vous avez l’œil pour le talent et vous êtes capable de le reconnaître et le diriger. Vous savez sélectionner et choisir les talents adéquats sur base d\'instructions du client.',
                        'li_5' => 'Vous êtes capable de travailler de manière indépendante et autonome. Vous êtes capable de faire preuve de persévérance.',
                        'li_6' => 'Vous avez le sens des affaires ainsi que des dispositions pour le commerce et la communication. ',
                    ],
                'text_block_2' =>
                    [
                        'li_1' => 'Nous n’existons que depuis peu sous le nom de Castingteam. Mais sous le nom de Borderfield Models & casting, cela fait plus de 10 ans que nous réalisons des bookings, principalement en Flandre. Au fil des ans, nous avons trouvé des contrats publicitaires pour des milliers de nos talents. Avec un nouveau nom et une nouvelle image, nous avons fait un grand pas en avant et nous sommes plus occupés que jamais. ',
                        'li_2' => 'Castingteam compte plus de 6.000 talents dans son fichier et bénéficie d\'un vaste réseau. ',
                        'li_3' => 'Notre tout nouveau site web et notre vaste système CMS sur mesure nous permettent de rechercher, trier, filtrer et contacter rapidement des talents. Nos agents d’artistes sont capables de faire des sélections très rapidement, les affiner et les transférer au client.  ',
                        'li_4' => 'En outre, nous disposons d’un module étendu de booking/client. ',
                    ],
                'p_1' => 'Le modèle de revenus est avantageux ; il s’agit d’une véritable opportunité pour le candidat adéquat.  Sur demande, nous vous ferons parvenir plus de détails sur cette opportunité et sur la manière dont nous vous guidons et soutenons.<br>Envoyez un e-mail à ',
                'p_2' => ' avec une brève lettre de motivation et quelques explications à votre sujet.',
            ],
        'not_found' =>
            [
                'title' => '404 - Page non trouvée',
                'subtitle' => 'Désolé, l’adresse du site que vous avez saisie n’existe pas.  <a href=\'/\'>Cliquez ici</a> pour revenir à la page d’accueil.',
            ],
        'server_error' =>
            [
                'title' => '500 - Internal Server Error',
                'subtitle' => '<a href=\'/\'>Cliquez ici</a> pour revenir à la page d’accueil.',
            ],
        'search' =>
            [
                'placeholder' => 'Nom ou no de réf.'
            ],
        'smart_search' =>
            [
                'placeholder' => 'Rechercher par exemple \'femme\' et \'entre 50 et 60 ans\' et \'cheveux roux\''
            ],
        'people' =>
            [
                'selection_count' => 'Votre sélection',
                'results_count' => 'résultats trouvés',
                'sort' => 'Trier par',
                'favorite' => 'Notre sélection',
                'new' => 'Modèles récents',
                'random' => 'Aléatoire',
                'vip' => 'Devenir VIP',
                'profile' => 'My Castingteam',
            ],
        'model' =>
            [
                'title' => 'AJOUTER CE MODÈLE À VOTRE SÉLECTION',
                'subtitle_1' => 'TAILLES',
                'subtitle_2' => 'DESCRIPTION',
                'subtitle_3' => 'EXPÉRIENCE',
                'subtitle_4' => 'VIDÉO\'S',
                'pdf_button' => 'Sedcard (PDF)',
                'selection_button' => 'Ajouter à la sélection',
                'facebook' => 'Partager sur Facebook'
            ],
        'selection' =>
            [
                'title' => 'VOTRE SÉLECTION',
                'title_two' => 'Vous n\'avez pas encore sauvegardé de sélection',
                'edit_button' => 'Adapter cette sélection',
                'send_button' => 'Envoyer votre sélection',
                'view' => ' Choisissez l’affichage :',
                'view_1' => 'L\'un en dessous de l\'autre',
                'view_2' => 'Aperçu sous forme de liste',
                'subtitle' => 'Votre sélection est encore vide...'
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
                        'language' => 'langue',
                        'submit' => 'Envoyer',
                        'voornaam' => 'Prénom',
                        'achternaam' => 'Nom',
                        'geboortedatum' => 'Date de naissance',
                        'adres' => 'Adresse (rue)',
                        'gemeente' => 'Ville',
                        'land' => 'Pays',
                        'email' => 'Adresse e-mail',
                        'telefoon' => 'Téléphone (GSM)',
                        'geslacht' => 'Sexe',
                        'huisnummer' => 'No de maison',
                        'postcode' => 'Code postal',
                        'spreektaal' => 'Langue parlée',
                        'herhaal_email' => 'Confirmation de l’adresse e-mail',
                        'telefoon2' => '2e no de téléphone',
                        'kies' => 'Choix',
                        'vrouw' => 'Femme',
                        'man' => 'Homme',
                        'family' => 'Famille',
                        'mannen' => 'Hommes',
                        'vrouwen' => 'Femmes',
                        'kinderen' => 'Enfants',
                        'vanaf_17_jaar' => 'À partir de 17 ans',
                        'year' => 'année',
                        'from' => 'de',
                        'since' => 'à partir de',
                        'tot_16_jaar' => 'De 0 à 16 ans',
                        'technische_fout' => 'Une erreur technique s’est produite. Contactez-nous si ce problème persiste.',
                        'email_adres_bestaat' => 'Il existe déjà un modèle avec cette adresse.',
                        'lengte' => 'Taille',
                        'gewicht' => 'Poids',
                        'borstomtrek' => 'Tour de poitrine',
                        'maat' => 'int.',
                        'int_maat' => 'Taille int.',
                        'taille' => 'Tour de taille',
                        'heupen' => 'Hanches',
                        'jeansmaat' => 'Taille de jeans',
                        'costume' => 'Costume ou veste',
                        'kinder_min' => 'Taille enfant (min.)',
                        'kinder_max' => 'Taille enfant (max.)',
                        'kostuummaat' => 'Taille de costume',
                        'schoenmaat' => 'Pointure',
                        'hemden' => 'Taille de chemise',
                        'kleedmaat' => 'Taille de robe',
                        'cupmaat' => 'Taille de bonnet',
                        'kindermaat_min' => 'Taille enfant (min.)',
                        'kindermaat_max' => 'Taille enfant (max.)',
                        'huidskleur' => 'Couleur de peau',
                        'europees' => 'Europe occidentale',
                        'afrikaans' => 'Afrique',
                        'noordafrikaans' => 'Afrique du Nord',
                        'aziatisch' => 'Asie de l\'Est',
                        'noord_afrikaans' => 'Afrique du Nord',
                        'zuid_aziatisch' => 'Asie du Sud et du Sud-est',
                        'noord_aziatisch' => 'Asie du Nord',
                        'scandinavisch' => 'Scandinavie',
                        'zuidaziatisch' => 'Asie du Sud et du Sud-est',
                        'arabisch' => 'Arabe',
                        'latin' => 'Latino/Méditerranéen',
                        'oost-europees' => 'Europe orientale',
                        'middle-asia' => 'Asie de l\'Ouest et du Nord',
                        'east-asia' => 'Asie de l\'Est',
                        'north-america' => 'Amérique du Nord/Australie',
                        'middle-america' => 'Amérique Centrale et Latine',
                        'antilliaans' => 'Antilles/Caraïbes',
                        'indians' => 'Indien',
                        'spaanslatin' => 'Latino',
                        'haarkleur' => 'Couleur de cheveux',
                        'blondhaar' => 'Blond',
                        'bruinhaar' => 'Brun',
                        'zwarthaar' => 'Noir',
                        'roodhaar' => 'Roux',
                        'speciaalhaar' => 'Spécial',
                        'grijshaar' => 'Gris',
                        'haarwit' => 'Blanc',
                        'haarstijl' => 'Style de cheveux',
                        'stijlhaar' => 'Cheveux lisses',
                        'krullenhaar' => 'Boucles',
                        'speciaalhaarstijl' => 'Spécial',
                        'piekjeshaar' => 'Appareil dentaire',
                        'haarlengte' => 'Longueur de cheveux',
                        'langhaar' => 'Long',
                        'korthaar' => 'Court',
                        'middenhaar' => 'Moyen',
                        'kaalhaar' => 'Chauve',
                        'begroeiing' => 'Type de pilosité',
                        'baard' => 'Barbe',
                        'snor' => 'Moustache',
                        'bakkebaard' => 'Favoris',
                        'begroeingspeciaal' => 'Spécial',
                        'versiering' => 'Ornements',
                        'tattoo' => 'Tatouages',
                        'piercing' => 'Piercing',
                        'piercings' => 'Piercing',
                        'andereversiering' => 'Autre',
                        'kleurogen' => 'Couleur des yeux',
                        'blauwogen' => 'Bleu',
                        'groenogen' => 'Vert',
                        'grijsogen' => 'Gris',
                        'bruinogen' => 'Brun',
                        'lichaam' => 'Corps',
                        'gespierd' => 'Musclé',
                        'handen' => 'Modèle mains',
                        'benen' => 'Modèle jambes',
                        'voeten' => 'Modèle pieds',
                        'test' => 'Rond/plus size',
                        'borsthaar' => 'Poils sur la poitrine',
                        'gebit' => 'Dentition parfaite',
                        'gebruind' => 'Basané',
                        'blokjes' => 'Appareil dentaire',
                        'fotoshoot' => 'Shootings photos',
                        'modellingcursus' => 'École de modèle',
                        'acteerervaring' => 'Acteur dans un film/TV',
                        'acteerervaringreclame' => 'Acteur dans une publicité',
                        'acterencursus' => 'École d’acteurs',
                        'toneel' => 'Scène, théâtre',
                        'catwalkervaring' => 'Catwalk/mannequin',
                        'promotiewerk' => 'Promotion',
                        'choreografie' => 'Chorégraphie/danse',
                        'presentatie' => 'Présentation/accueil',
                        'geenervaring' => 'Sans expérience',
                        'taalengels' => 'Anglais',
                        'taalfrans' => 'Français',
                        'taalnederlands' => 'Néerlandais',
                        'taalduits' => 'Allemand',
                        'taalitaliaans' => 'Italien',
                        'taalspaans' => 'Espagnol',
                        'engels' => 'Anglais',
                        'frans' => 'Français',
                        'nederlands' => 'Néerlandais',
                        'duits' => 'Allemand',
                        'italiaans' => 'Italien',
                        'spaans' => 'Espagnol',
                        'zuid-aziatisch' => 'Asie du Sud',
                        'oostaziatisch' => 'Asie de l\'Est',
                        'noordaziatisch' => 'Asie du Nord',
                        'haargrijs' => 'Gris',
                        'haarblond' => 'Blond',
                        'haarbruin' => 'Brun',
                        'haarzwart' => 'Noir',
                        'haarrood' => 'Roux',
                        'haarspeciaal' => 'Spécial',
                        'stijl' => 'Cheveux lisses',
                        'piekjes' => 'Appareil dentaire',
                        'krullen' => 'Boucles',
                        'langh' => 'Long',
                        'lang' => 'Long',
                        'kort' => 'Court',
                        'midden' => 'Moyen',
                        'kaal' => 'Chauve',
                        'dik' => 'Grande taille',
                        'speciaal' => 'Spécial',
                        'tattoos' => 'Tatouages',
                        'andere' => 'Autres',
                        'blauw' => 'Bleu',
                        'groen' => 'Vert',
                        'grijs' => 'Gris',
                        'bruin' => 'Brun',
                    ],
                'step_0' =>
                    [
                        'title' => '1. S’INSCRIRE',
                        'subtitle' => 'Merci de vouloir vous inscrire à Castingteam / Bordermodels.',
                        'p_1' => 'Nous avons besoin de vos données et photos. Qui vous êtes, à quoi vous ressemblez, quelles sont vos compétences, comment pouvons-nous collaborer...nous essayons de l’apprendre via ce formulaire.<br><br>

                            Prenez votre temps, lisez tout attentivement et remplissez tout de manière concise et précise. Cela vous prendra environ 10 minutes.<br><br>

                            L’inscription est libre et gratuite. Nous répondons généralement rapidement aux inscriptions, mais vous pouvez toujours nous envoyer un e-mail à <a href=\'mailto:info@castingteam.com\'><u><b>info@castingteam.com</b></u></a> si vous avez des questions.',
                        'registration_button' => 'Inscrivez-vous maintenant',
                        'title_2' => '2. OU METTRE À JOUR VOS DONNÉES ET VOS PHOTOS\'S',
                        'subtitle_2' => 'Si vous êtes déjà inscrit chez nous ou si vous avez déjà rempli un formulaire, vous pouvez modifier vos données ou vos photos.\'s aanpassen.',
                        'p_2' => 'Vous verrez les photos dont nous disposons déjà et pourrez en modifier certaines ou en ajouter d’autres. Pour poursuivre, saisissez votre code d\’inscription à 6 ou 10 chiffres ci-dessous.',
                        'login_button' => 'Connexion',
                        'code_forget' => 'Code perdu ou oublié ? ',
                        'code_forget_button' => 'Demandez votre code',
                        'li_1' => 'Si vous avez perdu ou oublié votre code d’inscription, saisissez votre adresse e-mail ici et il vous sera envoyé.',
                        'li_2' => 'Des questions ? Envoyez un e-mail à <a href=\'mailto:info@castingteam.com\'><u><b>info@castingteam.com</b></u></a>. Vous possédez plusieurs codes (ceux de vos enfants, par exemple) ? Ceux-ci seront rassemblés dans l’e-mail.'


                    ],
                'step_1' =>
                    [
                        'title' => 'ÉTAPE 1 : DONNÉES PERSONNELLES',
                        'subtitle' => 'Les données personnelles que nous demandons ne sont jamais divulguées à des tiers et restent privées.',
                        'text_block' =>
                            [
                                'title' => 'Comment nous avez-vous trouvé ?',
                                'li_1' => 'Via <a href=\'http://whatmatters.be\'>whatmatters.be</a>',
                                'li_2' => 'Recherche Google',
                                'li_3' => 'Via un(e) ami(e)',
                                'li_4' => 'Via les médias sociaux : Facebook, Twitter, Instagram…',
                                'li_5' => 'Accosté en rue par un dénicheur',
                                'li_6' => 'Je connais Castingteam depuis longtemps (à l’époque de Borderfield)',
                                'li_7' => 'Poster/affiche de Castingteam'
                            ],
                        'tooltip' => 'Champ obligatoire',
                        'submit' => 'Enregistrer et poursuivre',
                        'text_block_2' =>
                            [
                                'title' => 'CONSEILS',
                                'li_1' => 'Vos données personnelles nous sont absolument indispensables pour pouvoir vous contacter et vous inscrire. Ces données ne seront jamais partagées ou divulguées à d’autres personnes.',
                                'li_2' => 'Renseignez votre âge réel, mentir sur votre âge ne sert à rien.',
                                'li_3' => 'Soyez prudents en renseignant ces données, car elles ne sont pas modifiables ! ',
                            ],
                        'keywords_placeholder' => 'Op welk trefwoord heb je gezocht?',
                    ],
                'step_2' =>
                    [
                        'geen_idee' => 'Geen idee',
                        'nvt' => 'NVT',
                        'title' => 'ÉTAPE 2 : VOS TAILLES ET INSCRIPTION',
                        'subtitle' => 'Renseignez vos mesures ci-dessous. Essayez d’être précis ; il est inutile de vouloir embellir vos mesures...',
                        'text_block' =>
                            [
                                'title' => 'CONSEILS',
                                'li_1' => 'Par <strong>couleur de peau</strong>, il ne faut pas comprendre l’endroit dont vous êtes originaire ou votre lieu de résidence, mais votre origine ethnique, votre COULEUR de peau. Par exemple, si vos ancêtres sont italiens et que vous êtes typé italien, renseignez Latino, même si vous avez vécu toute votre vie en Belgique ou aux Pays-Bas.',
                                'li_2' => 'Modèle jambe, main ou pied : à renseigner UNIQUEMENT si vous en avez déjà fait l’expérience pour un contrat commercial. Si tel n’est pas le cas, mais que vous trouvez que cela vous correspond malgré tout, envoyez-nous quelques photos de vos jambes, mains ou pieds.',
                                'li_3' => 'Si ces données changent, faite-le-nous directement savoir... Seule une description correcte nous permet de vous présenter de la meilleure manière.',
                            ],
                        'tooltip' => 'Enregistrer et poursuivre',
                        'parameters' =>
                            [
                                'family' => 'Famille',
                                'men' => 'Mesures hommes',
                                'woman' => 'Mesures femmes',
                                'teen' => 'Adolescents',
                                'kids' => 'Enfants',
                            ],
                        'subtitle_2' => '<strong>Description</strong> - Remplissez autant que possible les rubriques qui vous concernent.',
                        'subtitle_3' => 'Couleur de peau/Ethnie',
                        'skin_color_block' =>
                            [
                                'title' => '<strong>ATTENTION</strong> : La couleur de peau ne correspond pas à votre lieu de résidence ou de naissance ; elle correspond à ce à quoi vous ressemblez, à votre apparence ethnique, à votre origine. Donc, si vos grands-parents étaient turcs et que vous êtes typé turc, mais que vous avez habité toute votre vie en Hollande, renseignez « Arabe » et non « Européen ». ',
                                'subtitle' => 'Si vous avez des doutes au sujet de votre origine ethnique, consultez cette liste : <a href="/files/People_origin.pdf" target="_blank"><span class="underlined_text">Liste des pays et des origines ethniques</span></a>',
                                'subtitle_2' => 'Quel est votre pays D’ORIGINE ? Donc ni votre lieu de naissance ni votre lieu de résidence, mais le lieu d’où vos (grands-) parents sont originaires.',
                                'country' => 'Pays d\'origine',
                                'europees' => 'Benelux, France, Allemagne, Royaume-Uni, Suisse, Autriche, République tchèque, Russie européenne, etc.',
                                'afrikaans' => 'Afrique noire.',
                                'noordafrikaans' => 'Afrique du Nord',
                                'aziatisch' => 'Chine, Taïwan, Corée, Japon, etc.',
                                'noord_afrikaans' => 'Maroc, Algérie, Tunisie, Libye, Soudan, Égypte, etc.',
                                'zuid_aziatisch' => 'Chine, Taïwan, Corée, Japon, Vietnam, etc.',
                                'noord_aziatisch' => 'Russie du Sud, Mongolie, Kazakhstan, Kirghizstan, Ouzbékistan, Tadjikistan, Turkménistan, Tibet, etc.',
                                'scandinavisch' => 'Danemark, Norvège, Suède, Islande, Finlande, etc.',
                                'zuidaziatisch' => 'Chine, Taiwan, Corée, Japon, Vietnam, etc.',
                                'arabisch' => 'Moyen-Orient, Turquie, Iran, Irak, Arabie Saoudite, Soudan, Égypte, Liban, Israël, etc.',
                                'oostaziatisch' => 'Inde, Pakistan, Bangladesh, Sri Lanka, Népal, Bhoutan, Maldives, Afghanistan, Thaïlande, Philippines, Laos, Cambodge, Malaisie, Singapour, Indonésie, etc.',
                                'noordaziatisch' => 'Sur de la Russie, Mongolie, Kazachstan, Kirghizistan, Ouzbékistan, Tadjikistan, Turkménistan, Tibet, etc.',
                                'latin' => 'Espagne, Italie, Grèce, Croatie, etc.',
                                'oost-europees' => 'Pologne, Slovaquie, Serbie, Roumanie, Ukraine, Estonie, etc.',
                                'middle-asia' => 'Russie du Sud, Mongolie, Kazakhstan, Kirghizstan, Ouzbékistan, Tadjikistan, Turkménistan, Tibet, etc.',
                                'east-asia' => 'Inde, Pakistan, Bangladesh, Sri Lanka, Népal, Bhoutan, Maldives, Afghanistan, Thaïlande, Philippines, Laos, Cambodge, Malaisie, Singapour, Indonésie, etc.',
                                'north-america' => 'États-Unis, Canada, Alaska, Australie, Nouvelle-Zélande (caucasien), etc.',
                                'middle-america' => 'Mexique, Guatemala, Venezuela, Colombie, Brésil, Argentine, etc.',
                                'antilliaans' => 'Aruba, Bonaire, Curaçao, Saba, Saint-Martin et Saint Eustache, Bahamas, Jamaïque, etc.',
                                'indians' => 'Peuples indigènes des Amériques, Inuit, etc.',
                            ],
                    ],
                'step_3' =>
                    [
                        'title' => 'ÉTAPE 3 : VOTRE EXPÉRIENCE',
                        'subtitle' => 'Indiquez votre expérience...ne renseignez que ce que vous avez déjà réalisé et nommez quelques projets ou campagnes.',
                        'p_1' => 'Vos domaines d’expérience...',
                        'p_2' => 'Quelles langues parlez-vous couramment ?',
                        'p_3' => 'Décrivez votre expérience et citez quelques projets ou campagnes réalisés',
                        'p_4' => 'Avez-vous des aptitudes particulières ? Sport, loisirs, talents, qualités uniques... Indiquez-les ici !',
                        'p_5' => 'Ci-dessous, saisissez les URLs de clips vidéo Youtube ans lesquels vous avez joué. Il peut s’agir de publicités, de clips de casting, ou autre...',
                        'p_6' => 'Attention, seul Youtube fonctionne. Utilisez uniquement des URLs tels que : <br><span style=\'color:#00ab84\'>https://www.youtube.com/watch?v=wZZ7oFKsKzY</span> of <span style=\'color:#00ab84\'>https://youtu.be/wZZ7oFKsKzY</span>',
                        'text_block' =>
                            [
                                'title' => 'CONSEILS',
                                'li_1' => 'ATTENTION : Si vous dites que vous avez déjà joué comme acteur dans un film/téléfilm ou une publicité, détaillez quelques exemples. ',
                                'li_2' => 'Essayez d’être aussi complet que possible en termes d’expérience et détaillez ce que vous avez déjà réalisé (pas tout, mais une partie). ',
                                'li_3' => 'Établissez une liste de vos capacités... Vous pouvez rouler en monocycle, faire du windsurf, jouer de la guitare, danser le ballet, vous tenir sur la tête... ? Indiquez-le !',
                                'li_4' => 'À l’heure actuelle, seules les vidéos Youtube peuvent être renseignées ; mettre des clips vidéo sur Youtube est simple et gratuit. ',
                            ],
                        'tooltip' => 'Enregistrer et poursuivre'

                    ],
                'step_4' =>
                    [
                        'title' => 'ÉTAPE 4 : AJOUTEZ DES PHOTOS',
                        'subtitle' => 'Ajoutez ici vos photos, professionnelles ou de loisir...',
                        'li_1' => 'Une inscription sans photo ne sert pas à grand-chose...</strong>Si vous ne disposez d’aucune photo numérique, nous vous conseillons de remettre provisoirement votre inscription à plus tard, lorsque vous en disposerez. Vous trouverez ci-dessous d’autres directives et conseils pour vos photos.',
                        'li_2' => 'Si vos photos ne sont pas suffisamment bonnes et claires, nous pouvons en réaliser pour vous à partir de 25-45 EUR (en fonction de la formule). Envoyez un e-mail à <a href=\'mailto:fotograaf@castingteam.com\' style=\'color:#000000; text-decoration: underline ; font-weight: bold;\'>fotograaf@castingteam.com</a> ou consultez <a href=\'http://fotos.castingteam.com\' target=\'_blank\' style=\'color:#000000; text-decoration:underline; font-weight : blank;\'>fotos.castingteam.com</a>.',
                        'text_block' =>
                            [
                                'li_1' => 'Si possible au moins 8 photos.',
                                'li_2' => 'Uniquement ajoutez des photos au format JPG, pas de fichiers zip.',
                                'li_3' => '8 Mo maximum par photo ! Attention, le chargement peut prendre un certain temps.',
                                'li_4' => 'Supprimez vos anciennes photos avant d’en charger de nouvelles (lors d’une mise à jour)',
                            ],
                        'p_1' => 'Mention du photographe',
                        'li_3' => 'Indiquez ici les noms des photographes ayant réalisé vos photos, nous les mentionnons en général sur<br>votre page de profil.',
                        'photograph' => 'Noms des photographes',
                        'submit' => 'Enregistrer et poursuivre',
                        'text_block_2' =>
                            [
                                'title' => 'CONSEILS',
                                'li_1' => '<strong>Diversité</strong> : Nous avons besoin d’un tas de photos variées, professionnelles, de préférence en couleur, éventuellement prises en intérieur (studio) et en extérieur...Il nous en faut 8 au minimum. Plus, c\'est encore mieux. ',
                                'li_2' => '<strong>Professionnalisme</strong> : Les photos de loisirs ou de vacances ne sont pas toujours utilisables. Les photos de loisirs sont souvent mal éclairées, de qualité généralement douteuse et ne vous présentent pas en tant que modèle dans un environnement artificiel (comme un studio). Elles peuvent bien entendu servir à vos présenter.',
                                'li_3' => '<strong>Photos normales</strong> : Nous avons besoin de photos sans composition ou pose bizarre... Également de photos qui ne sont pas trop en gros plan ou trop artistiques (pas de nu, pas de masque...). L’idéal, ce sont des photos couleur normales qui vous montrent tels que vous êtes.',
                                'li_4' => '<strong>Expression</strong> : Envoyez-nous des photos qui montrent que vous possédez une multitude d’expressions, des photos avec de l’émotion, des sentiments, du caractère...',
                                'li_5' => '<strong>Publicité</strong> : Également des photos de publicités à votre effigie ou de campagnes auxquelles vous avez collaboré. ',
                                'li_6' => '<strong>Mention du photographe</strong> : Nous n’affichons aucune mention du photographe, que ce soit le nom ou le logo, sur la photo même. Par conséquent, nous vous demandons de nous envoyer des photos dépourvues de ces mentions, ou de nous accorder l’autorisation de les supprimer (en accord avec le photographe). Vous pouvez renseigner les noms des photographes. Ils seront mentionnés au bas de votre page de profil. ',
                                'li_7' => 'En nous envoyant des photos conformes à ces directives, vous avez déjà une longueur d’avance et vous augmentez considérablement vos chances !',
                            ]
                    ],
                'step_5' =>
                    [
                        'title' => 'ÉTAPE 5 : CONDITIONS GÉNÉRALES',
                        'subtitle' => 'Vous trouverez ci-dessous les conditions générales d’inscription dans notre fichier. Elles se composent de définitions juridiques destinées à notre protection et à la vôtre.',
                        'span' => 'J’accepte les conditions générales',
                        'button' => 'Enregistrer et poursuivre'
                    ],
                'step_6' =>
                    [
                        'title' => 'ÉTAPE 6 : CONFIRMATION',
                        'subtitle' => 'Vous avez correctement rempli le formulaire d’inscription... et maintenant ?',
                        'subtitle_2' => 'Merci d\'avoir modifié vos données et/ou vos photos ! Si vous avez modifié vos photos, nous les examinerons le plus vite possible et en placerons une sélection en ligne.',
                        'text_block' =>
                            [
                                'li_1' => 'Votre code d’inscription/code modèle est ',
                                'li_1_2' => ' (conservez-le en sécurité).',
                                'li_2' => '<strong>Vous êtes inscrit mais vous n’êtes pas encore repris dans notre base de données...</strong> Nous allons à présent examiner et évaluer votre candidature...Pouvons-nous vous ajouter à notre fichier ?',
                                'li_3' => 'Nos agents d’artiste vont examiner votre inesciption et vos photos et vous recevrez bientôt une réponse, qu’elle soit positive ou négative. Cela peut prendre un peu de temps car nous recevons beaucoup de demandes.',
                                'li_4' => 'Votre code de modèle vous permet ensuite de modifier ou de mettre à jour vos données.',
                                'li_5' => 'Souhaitez-vous encore inscrire une autre personne ? Cliquez ici',
                            ]
                    ],
                'voorwaarden' =>
                    [
                        'content' => 'Ces conditions sont applicables à la relation entre le modèle qui s’inscrit sur le site web d’une part, et Castingteam (BORDERFIELD BVBA) d’autre part. L’inscription comme modèle sur ce site web implique l’acceptation inconditionnelle desdites conditions générales. Aussi longtemps qu’un modèle est mineur, ce consentement et acceptation sont confirmés par le parent et/ou le tuteur qui en est légalement responsable.
                            1. Castingteam (BORDERFIELD BVBA) offre au modèle l’opportunité d’intégrer le site web de Castingteam (BORDERFIELD BVBA) et de recevoir des offres de travail en tant que modèle de la part de tiers démarchés par Castingteam (BORDERFIELD BVBA). En aucun cas il n’existe une relation d\'autorité entre Castingteam (BORDERFIELD BVBA) et le modèle et toute association employeur - employé entre Castingteam (BORDERFIELD BVBA) et le modèle est explicitement exclue.
                            <br><br>
                            L’exécution du travail de modèle fait toujours l’objet d’une convention individuelle, soit avec Castingteam (BORDERFIELD BVBA), soit avec le client de Castingteam (BORDERFIELD BVBA), soit avec un bordereau de salaire - bureau, mais toujours sans intervention de Castingteam (BORDERFIELD BVBA) en qualité d’employeur.
                            <br><br>
                            Castingteam (BORDERFIELD BVBA) ne peut en aucun cas être tenue responsable d’accidents survenus lors de l\'exécution d\'une mission en tant que modèle, qu’ils se produisent sur le chemin du travail, sur le plateau ou ailleurs. Castingteam (BORDERFIELD BVBA) ne prend aucune assurance pour les accidents de travail ou autres.
                            <br><br>
                            2. Castingteam (BORDERFIELD BVBA) n’exige nullement qu\'un modèle exerce ses activités uniquement et exclusivement via Castingteam (BORDERFIELD BVBA). À l’inverse, Castingteam (BORDERFIELD BVBA) n’est pas responsable si un modèle ayant conclu un accord d’exclusivité avec un tiers s’inscrit auprès de Castingteam (BORDERFIELD BVBA). L’inscription sur le site web de Castingteam (BORDERFIELD BVBA) implique le consentement d’être intégré dans le fichier du site web, d’être publié en ligne, d’être transféré aux clients de Castingteam (BORDERFIELD BVBA) et d’être utilisé de toute autre manière quelconque pour la publicité de Castingteam (BORDERFIELD BVBA).
                            <br><br>
                            Le modèle peut demander à Castingteam (BORDERFIELD BVBA) de supprimer son profil ou de le mettre hors ligne, et ce par le biais d’une simple demande à Castingteam (BORDERFIELD BVBA).
                            <br><br>
                            3. Le modèle qui nous confie des photos confirme disposer de tous les droits d’auteurs nécessaires pour autoriser Castingteam (BORDERFIELD BVBA) à placer ces photos sur internet et les diffuser par tous les moyens possibles et, si nécessaire, à modifier ces photos de toutes les manières jugées utiles par Castingteam (BORDERFIELD BVBA), y compris mais non limitées au redimensionnement et recadrage de la photo et à la suppression du nom ou du logo du photographe.
                            <br><br>
                            Castingteam (BORDERFIELD BVBA) n’est pas responsable des éventuelles réclamations liées aux droits d’auteur et le modèle en préserve intégralement Castingteam (BORDERFIELD BVBA).
                            <br><br>
                            4. Les données que le modèle nous confie sont conservées par Castingteam (BORDERFIELD BVBA) uniquement aux fins de l’exécution de la convention établie entre le modèle et Castingteam (BORDERFIELD BVBA). Dans ce contexte, ces données peuvent être transmises à des tiers, parmi lesquels les clients de Castingteam (BORDERFIELD BVBA) tels que les agences de publicité, les photographes et les maisons de couture.
                            <br><br>
                            Par données conservées s’entendent le nom, la date de naissance, le sexe, l’adresse, les données de contact, la langue maternelle ainsi que diverses caractéristiques physiques, y compris mais non limitées à la couleur de la peau. Le modèle consent expressément au traitement de toutes ces données. Le modèle dispose du droit de nous interroger sans frais au sujet des données dont nous disposons sur lui-même et, le cas échéant, de demander la correction et la suppression de ces données sans frais, en nous contactant via les données de contact renseignées sur ce site web.
                            <br><br>
                            5. La convention établie entre le modèle et Castingteam (BORDERFIELD BVBA) est régie par le droit belge et tout litige relève exclusivement de la compétence des tribunaux de Turnhout.'
                    ],
                'sidebar' =>
                    [
                        'step_1' => '1. VOS DONNÉES',
                        'step_2' => '2. DESCRIPTION',
                        'step_3' => '3. EXPÉRIENCE',
                        'step_4' => '4. AJOUTEZ DES PHOTOS',
                        'step_5' => '5. CONDITIONS',
                        'step_6' => '6. CONFIRMATION',
                    ]
            ]
    ];

}
