<?php

class Controller_Registration extends Controller_Page
{
    const LAND_MAP = [
        'NL' => '68',
        'FR' => '155',
        'DE' => '156',
        'BE' => '200',
        'LUX' => '201'
    ];

    const PHONE_CODE = [
        'NL' => '31',
        'FR' => '33',
        'DE' => '49',
        'BE' => '32',
        'LUX' => '352',
    ];

    public function stepZero()
    {
    }

    public function stepOne()
    {
        
    }

    public function show(Http_Request $request)
    {
        // TODO: Implement show() method.
    }

    public function login()
    {
        $this->smarty->display('wachtwoord.html');
    }

    function stap0()
    {
        unset($_SESSION['registreren']);
        unset($_SESSION['model_id']);

        $this->smarty->display('registration/stap0.tpl');
    }

    public function stap1()
    {
        $_SESSION['registreren']['stap1_geweest'] = TRUE;

        if (isset($_SESSION['registreren']['stap_passed'])) {
            if ($_SESSION['registreren']['stap_passed'] < 1) {
                $_SESSION['registreren']['stap_passed'] = 1;
            }
        } else {
            $_SESSION['registreren']['stap_passed'] = 1;
        }

        $this->smarty->assign('stap_passed', $_SESSION['registreren']['stap_passed']);
        $this->smarty->assign('stapActief', 1);
        $this->smarty->display('registration/stap1.tpl');
    }

    public function stap2()
    {
        if (!isset($_SESSION['registreren']['stap1'])) {
            header('Location: /' . Flight::get('taal') . '/register/0');
        } else {
            $_SESSION['registreren']['stap2_geweest'] = TRUE;

            if (isset($_SESSION['registreren']['stap1']) && $_SESSION['registreren']['stap1'] == TRUE) {

                $leeftijd = $this->getAge();
                $this->smarty->assign('leeftijd', $leeftijd);
                $this->smarty->assign('eigenschappen', getEigenschappen());

                if (isset($_SESSION['registreren']['stap_passed'])) {
                    if ($_SESSION['registreren']['stap_passed'] < 2) {
                        $_SESSION['registreren']['stap_passed'] = 2;
                    }
                } else {
                    $_SESSION['registreren']['stap_passed'] = 2;
                }

                $this->smarty->assign('stap_passed', $_SESSION['registreren']['stap_passed']);
                $this->smarty->assign('stapActief', 2);
                $this->smarty->assign('countries', $this->getController()->getCountries());
                $this->smarty->display('registration/stap2.tpl');
            } else {
                header('Location: /' . Flight::get('taal'));
            }
        }
    }

    function stap3()
    {
        if (!isset($_SESSION['registreren']['stap2'])) {
            header('Location: /' . Flight::get('taal') . '/register/0');
        } else {
            $_SESSION['registreren']['stap3_geweest'] = TRUE;

            $this->smarty->assign('eigenschappen', getEigenschappen());

            if (isset($_SESSION['registreren']['stap_passed'])) {
                if ($_SESSION['registreren']['stap_passed'] < 3) {
                    $_SESSION['registreren']['stap_passed'] = 3;
                }
            } else {
                $_SESSION['registreren']['stap_passed'] = 3;
            }

            $this->smarty->assign('stap_passed', $_SESSION['registreren']['stap_passed']);
            $this->smarty->assign('stapActief', 3);
            $this->smarty->display('registration/stap3.tpl');
        }
    }

    public function stap4()
    {
        if (!isset($_SESSION['registreren']['stap3'])) {
            header('Location: /' . Flight::get('taal') . '/register/0');
        } else {
            $_SESSION['registreren']['stap4_geweest'] = TRUE;

            if (isset($_SESSION['registreren']['stap_passed'])) {
                if ($_SESSION['registreren']['stap_passed'] < 4) {
                    $_SESSION['registreren']['stap_passed'] = 4;
                }
            } else {
                $_SESSION['registreren']['stap_passed'] = 4;
            }

            $this->smarty->assign('stap_passed', $_SESSION['registreren']['stap_passed']);
            $this->smarty->assign('stapActief', 4);
            $this->smarty->display('registration/stap4.tpl');
        }
    }

    public function stap5()
    {
        if (!isset($_SESSION['registreren']['stap4'])) {
            header('Location: /' . Flight::get('taal') . '/register/0');
        } else {
            $_SESSION['registreren']['stap5_geweest'] = TRUE;

            if (isset($_SESSION['registreren']['stap_passed'])) {
                if ($_SESSION['registreren']['stap_passed'] < 5) {
                    $_SESSION['registreren']['stap_passed'] = 5;
                }
            } else {
                $_SESSION['registreren']['stap_passed'] = 5;
            }

            $this->smarty->assign('stap_passed', $_SESSION['registreren']['stap_passed']);

            $this->smarty->assign('stapActief', 5);
            $this->smarty->display('registration/stap5.tpl');
        }
    }

    function stap6()
    {
        if (isset($_SESSION['model_id']) && is_numeric($_SESSION['model_id'])) {
            $_SESSION['registreren']['stap6_geweest'] = TRUE;

            if (isset($_SESSION['registreren']['stap_passed'])) {
                if ($_SESSION['registreren']['stap_passed'] < 6) {
                    $_SESSION['registreren']['stap_passed'] = 6;
                }

            } else {
                $_SESSION['registreren']['stap_passed'] = 6;
            }

            $code = Flight::db()->query("SELECT code FROM model WHERE model_id=" . $_SESSION['model_id'])->fetch_array();
            $this->smarty->assign('code', $code['code']);
            $this->smarty->assign('stap_passed', $_SESSION['registreren']['stap_passed']);
            $this->smarty->assign('stapActief', 6);
            $this->smarty->display('registration/stap6.tpl');
        } else {
            header('Location: /' . Flight::get('taal') . '/register/0');
        }
    }

    function ajax_naar_stap_2()
    {
        $return = [];
        $sql_extra = '';

        if (isset($_SESSION['model_id']) && is_numeric($_SESSION['model_id'])) {
            $sql_extra .= ' AND model_id<>' . Flight::db()->real_escape_string($_SESSION['model_id']);
        }

        $_SESSION['registreren']['voornaam'] = $_POST['voornaam'];
        $_SESSION['registreren']['achternaam'] = $_POST['achternaam'];
        $_SESSION['registreren']['adres'] = $_POST['adres'];
        $_SESSION['registreren']['huisnummer'] = $_POST['huisnummer'];
        $_SESSION['registreren']['postcode'] = $_POST['postcode'];
        $_SESSION['registreren']['gemeente'] = $_POST['gemeente'];
        $_SESSION['registreren']['land'] = $_POST['land'];
        $_SESSION['registreren']['geboortedatum_dag'] = $_POST['geboortedatum_dag'];
        $_SESSION['registreren']['geboortedatum_maand'] = $_POST['geboortedatum_maand'];
        $_SESSION['registreren']['geboortedatum_jaar'] = $_POST['geboortedatum_jaar'];
        $_SESSION['registreren']['geslacht'] = $_POST['geslacht'];
        $_SESSION['registreren']['spreektaal'] = $_POST['spreektaal'];
        $_SESSION['registreren']['email'] = $_POST['email'];
        $_SESSION['registreren']['telefoon'] = preg_replace('/^0/ui', '', preg_replace('/\D/ui', '', $_POST['telefoon']));
        $_SESSION['registreren']['telefoon2'] = preg_replace('/\D/ui', '', $_POST['telefoon2']);

        if (isset($_POST['where_known']) && !empty($_POST['where_known'])) {
            $_SESSION['registreren']['where_known'] = $_POST['where_known'];
        }

        if ($_SESSION['registreren']['geslacht'] == 'F') {
            $return['success'] = 2;
            $_SESSION['registreren']['stap1'] = TRUE;
            $_SESSION['registreren']['stap2'] = TRUE;
            $_SESSION['registreren']['lengte'] = 'nvt';
            $_SESSION['registreren']['gewicht'] = 'nvt';
            $_SESSION['registreren']['kind_maat_min'] = 'nvt';
            $_SESSION['registreren']['kind_maat_max'] = 'nvt';
            $_SESSION['registreren']['schoenmaat'] = 'nvt';
            $_SESSION['registreren']['borst'] = 'nvt';
            $_SESSION['registreren']['taille'] = 'nvt';
            $_SESSION['registreren']['heupen'] = 'nvt';
            $_SESSION['registreren']['hemden'] = 'nvt';
            $_SESSION['registreren']['jeans'] = 'nvt';
            $_SESSION['registreren']['kleed'] = 'nvt';
            $_SESSION['registreren']['int_maat'] = 'nvt';
            $_SESSION['registreren']['kind_maat_min'] = 0;
            $_SESSION['registreren']['kind_maat_max'] = 0;
        } else {
            $return['success'] = 1;
            $_SESSION['registreren']['stap1'] = TRUE;
        }

        if (isset($_SESSION['model_id']) && is_numeric($_SESSION['model_id'])) {
            if (strlen($_POST['geboortedatum_dag'] == 1)) {
                $data['geboortedatum_dag'] = "0" . $_POST['geboortedatum_dag'];
            }

            if (strlen($_POST['geboortedatum_maand'] == 1)) {
                $data['geboortedatum_dag'] = "0" . $_POST['geboortedatum_maand'];
            }

            $query = Flight::db()->query("
                    UPDATE model
                    SET voornaam='" . Flight::db()->real_escape_string(titleCase($_POST['voornaam'])) . "',
                        naam='" . Flight::db()->real_escape_string(titleCase($_POST['achternaam'])) . "',
                        straat='" . Flight::db()->real_escape_string($_POST['adres']) . "',
                        nummer='" . Flight::db()->real_escape_string($_POST['huisnummer']) . "',
                        gemeente='" . Flight::db()->real_escape_string($_POST['gemeente']) . "',
                        postcode='" . Flight::db()->real_escape_string($_POST['postcode']) . "',
                        land='" . Flight::db()->real_escape_string($_POST['land']) . "',
                        geboortedatum='" . Flight::db()->real_escape_string($_POST['geboortedatum_jaar']) . '-' . Flight::db()->real_escape_string($_POST['geboortedatum_maand']) . '-' . Flight::db()->real_escape_string($_POST['geboortedatum_dag']) . "',
                        geslacht='" . Flight::db()->real_escape_string($_POST['geslacht']) . "',
                        moedertaal='" . Flight::db()->real_escape_string($_POST['spreektaal']) . "',
                        email='" . Flight::db()->real_escape_string($_POST['email']) . "',
                        telefoon='" . Flight::db()->real_escape_string(Registreren::PHONE_CODE[$_POST['land']] . preg_replace('/^0/ui', '', preg_replace('/\D/ui', '', $_POST['telefoon']))) . "',
                        nieuw_telefoon2='" . Flight::db()->real_escape_string(preg_replace('/\D/ui', '', $_POST['telefoon2'])) . "',
                        where_known='" . Flight::db()->real_escape_string($_POST['where_known']) . "',
                        updated=now(),
                        declined=0,
                        is_update=1
                    WHERE model_id=" . Flight::db()->real_escape_string($_SESSION['model_id'])
            );

            if (
                ENVIRONMENT == Enum_Environment::PRODUCTION &&
                $_SESSION['model_id'] < 100000
            ) {
                (new Synchronizer_Composite())->synchronize("
                    UPDATE model
                    SET voornaam='" . Flight::db()->real_escape_string(titleCase($_POST['voornaam'])) . "',
                        naam='" . Flight::db()->real_escape_string(titleCase($_POST['achternaam'])) . "',
                        geboortedatum='" . Flight::db()->real_escape_string($_POST['geboortedatum_jaar']) . '-' . Flight::db()->real_escape_string($_POST['geboortedatum_maand']) . '-' . Flight::db()->real_escape_string($_POST['geboortedatum_dag']) . "',
                        geslacht='" . Flight::db()->real_escape_string($_POST['geslacht']) . "',
                        email='" . Flight::db()->real_escape_string($_POST['email']) . "',
                        telefoon='" . Flight::db()->real_escape_string(Registreren::PHONE_CODE[$_POST['land']] . substr(preg_replace('/\D/ui', '', $_POST['telefoon']), 1)) . "',
                        updated=now(),
                        straat='" . Flight::db()->real_escape_string($_POST['adres']) . "',
                        nummer='" . Flight::db()->real_escape_string($_POST['huisnummer']) . "',
                        gemeente='" . Flight::db()->real_escape_string($_POST['gemeente']) . "',
                        postcode='" . Flight::db()->real_escape_string($_POST['postcode']) . "',
                        land='" . Flight::db()->real_escape_string($_POST['land']) . "'
                    WHERE model_id=" . Flight::db()->real_escape_string($_SESSION['model_id'])
                );
            }

            if (array_key_exists($_POST['land'], Registreren::LAND_MAP)) {
                $controller = DBController::getInstance();

                foreach (Registreren::LAND_MAP as $key => $group) {
                    $controller->removeModelFromGroup($group, $_SESSION['model_id']);
                }

                $controller->addModelToGroup(Registreren::LAND_MAP[$_POST['land']], $_SESSION['model_id']);
            }

            brdf_log($_SESSION['model_id'], 'Model heeft basisgegevens (stap1) aangepast.');

            echo Flight::db()->error;
        }

        echo json_encode($return);
    }

    function ajax_naar_stap_3()
    {
        $return = [];

        $leeftijd = $this->getAge();

        if ($leeftijd > 16) {
            if ($_SESSION['registreren']['geslacht'] == 'M') {
                $_SESSION['registreren']['lengte'] = $_POST['man_lengte'];
                $_SESSION['registreren']['gewicht'] = $_POST['man_gewicht'];
                $_SESSION['registreren']['borst'] = $_POST['man_borst'];
                $_SESSION['registreren']['taille'] = $_POST['man_taille'];
                $_SESSION['registreren']['heupen'] = $_POST['man_heupen'];
                $_SESSION['registreren']['jeans'] = $_POST['man_jeans'];
                $_SESSION['registreren']['cup'] = '';
                $_SESSION['registreren']['cup_letter'] = '';
                $_SESSION['registreren']['kostuum'] = $_POST['man_kostuum'];
                $_SESSION['registreren']['int_maat'] = $_POST['man_int_maat'];
                $_SESSION['registreren']['hemden'] = $_POST['man_hemden'];
                $_SESSION['registreren']['kleed'] = '';
                $_SESSION['registreren']['schoenmaat'] = $_POST['man_schoen'];
            } elseif ($_SESSION['registreren']['geslacht'] == 'V') {
                $_SESSION['registreren']['lengte'] = $_POST['vrouw_lengte'];
                $_SESSION['registreren']['gewicht'] = $_POST['vrouw_gewicht'];
                $_SESSION['registreren']['borst'] = $_POST['vrouw_borst'];
                $_SESSION['registreren']['taille'] = $_POST['vrouw_taille'];
                $_SESSION['registreren']['heupen'] = $_POST['vrouw_heupen'];
                $_SESSION['registreren']['jeans'] = $_POST['vrouw_jeans'];
                $_SESSION['registreren']['cup'] = $_POST['vrouw_cup'];
                $_SESSION['registreren']['cup_letter'] = $_POST['vrouw_cup_letter'];
                $_SESSION['registreren']['kleed'] = $_POST['vrouw_kleed'];
                $_SESSION['registreren']['schoenmaat'] = $_POST['vrouw_schoen'];
                $_SESSION['registreren']['int_maat'] = $_POST['vrouw_int_maat'];
                $_SESSION['registreren']['kostuum'] = '';
                $_SESSION['registreren']['hemden'] = 0;
            } else {
                $_SESSION['registreren']['lengte'] = 'nvt';
                $_SESSION['registreren']['gewicht'] = 'nvt';
                $_SESSION['registreren']['borst'] = 'nvt';
                $_SESSION['registreren']['taille'] = 'nvt';
                $_SESSION['registreren']['heupen'] = 'nvt';
                $_SESSION['registreren']['jeans'] = 'nvt';
                $_SESSION['registreren']['cup'] = 'nvt';
                $_SESSION['registreren']['cup_letter'] = 'nvt';
                $_SESSION['registreren']['kleed'] = 'nvt';
                $_SESSION['registreren']['schoenmaat'] = 'nvt';
                $_SESSION['registreren']['int_maat'] = 'nvt';
                $_SESSION['registreren']['kostuum'] = 'nvt';
                $_SESSION['registreren']['hemden'] = 'nvt';
            }

            $_SESSION['registreren']['kind_maat_min'] = 0;
            $_SESSION['registreren']['kind_maat_max'] = 0;
        } else {
            if ($_SESSION['registreren']['geslacht'] != 'F') {
                $_SESSION['registreren']['lengte'] = $_POST['kind_lengte'];
                $_SESSION['registreren']['gewicht'] = $_POST['kind_gewicht'];
                $_SESSION['registreren']['kind_maat_min'] = $_POST['kind_maat_min'];
                $_SESSION['registreren']['kind_maat_max'] = $_POST['kind_maat_max'];
                $_SESSION['registreren']['schoenmaat'] = $_POST['kind_schoen'];
                $_SESSION['registreren']['borst'] = 0;
                $_SESSION['registreren']['taille'] = 0;
                $_SESSION['registreren']['heupen'] = 0;

                if (isset($_POST['kind_jeans']) && !empty($_POST['kind_jeans'])) {
                    $_SESSION['registreren']['jeans'] = $_POST['kind_jeans'];
                } else {
                    $_SESSION['registreren']['jeans'] = 0;
                }

                if (isset($_POST['kind_hemden']) && !empty($_POST['kind_hemden'])) {
                    $_SESSION['registreren']['hemden'] = $_POST['kind_hemden'];
                } else {
                    $_SESSION['registreren']['hemden'] = 0;
                }

                if (isset($_POST['kind_kleed']) && !empty($_POST['kind_kleed'])) {
                    $_SESSION['registreren']['kleed'] = $_POST['kind_kleed'];
                } else {
                    $_SESSION['registreren']['kleed'] = 0;
                }

                if (isset($_POST['kind_int_maat']) && !empty($_POST['kind_int_maat'])) {
                    $_SESSION['registreren']['int_maat'] = $_POST['kind_int_maat'];
                } else {
                    $_SESSION['registreren']['int_maat'] = '';
                }

                $_SESSION['registreren']['kostuum'] = 0;
                $_SESSION['registreren']['cup'] = 0;
            } else {
                $_SESSION['registreren']['lengte'] = 'nvt';
                $_SESSION['registreren']['gewicht'] = 'nvt';
                $_SESSION['registreren']['kind_maat_min'] = 'nvt';
                $_SESSION['registreren']['kind_maat_max'] = 'nvt';
                $_SESSION['registreren']['schoenmaat'] = 'nvt';
                $_SESSION['registreren']['borst'] = 'nvt';
                $_SESSION['registreren']['taille'] = 'nvt';
                $_SESSION['registreren']['heupen'] = 'nvt';
                $_SESSION['registreren']['hemden'] = 'nvt';
                $_SESSION['registreren']['jeans'] = 'nvt';
                $_SESSION['registreren']['kleed'] = 'nvt';
                $_SESSION['registreren']['int_maat'] = 'nvt';
            }
        }

        foreach ($_POST AS $naam => $waarde) {
            if (substr($naam, 0, 11) == 'eigenschap_') {
                $naamSession = str_replace('eigenschap_', '', $naam);
                if ($waarde == 1) {
                    $_SESSION['registreren']['eigenschappen'][$naamSession] = $waarde;
                } else {
                    unset($_SESSION['registreren']['eigenschappen'][$naamSession]);
                }
            }
        }

        $_SESSION['registreren']['country'] = $_POST['country'];
        $_SESSION['registreren']['stap2'] = TRUE;

        if (isset($_SESSION['model_id']) && is_numeric($_SESSION['model_id'])) {
            $query = Flight::db()->query("
                UPDATE model
                SET lengte='" . Flight::db()->real_escape_string($_SESSION['registreren']['lengte']) . "',
                    gewicht='" . Flight::db()->real_escape_string($_SESSION['registreren']['gewicht']) . "',
                    nieuw_kind_maat_min='" . Flight::db()->real_escape_string($_SESSION['registreren']['kind_maat_min']) . "',
                    nieuw_kind_maat_max='" . Flight::db()->real_escape_string($_SESSION['registreren']['kind_maat_max']) . "',
                    maten_schoenen='" . Flight::db()->real_escape_string($_SESSION['registreren']['schoenmaat']) . "',
                    maten_borst='" . Flight::db()->real_escape_string($_SESSION['registreren']['borst']) . "',
                    maten_taille='" . Flight::db()->real_escape_string($_SESSION['registreren']['taille']) . "',
                    maten_heupen='" . Flight::db()->real_escape_string($_SESSION['registreren']['heupen']) . "',
                    maten_kostuum='" . Flight::db()->real_escape_string($_SESSION['registreren']['kostuum']) . "',
                    maten_kleding='" . Flight::db()->real_escape_string($_SESSION['registreren']['kleed']) . "',
                    maten_jeans='" . Flight::db()->real_escape_string($_SESSION['registreren']['jeans']) . "',
                    maten_cup='" . Flight::db()->real_escape_string($_SESSION['registreren']['cup']) . "',
                    maten_cup_letter='" . Flight::db()->real_escape_string($_SESSION['registreren']['cup_letter']) . "',
                    int_maat='" . Flight::db()->real_escape_string($_SESSION['registreren']['int_maat']) . "',
                    hemden_maat='" . Flight::db()->real_escape_string($_SESSION['registreren']['hemden']) . "',
                    country_origin_id='" . Flight::db()->real_escape_string($_SESSION['registreren']['country']) . "',
                    updated=now(),
                    declined=0,
                    is_update=1
                WHERE model_id=" . Flight::db()->real_escape_string($_SESSION['model_id'])
            );

            echo Flight::db()->error;

            $controller = DBController::getInstance();

            foreach ($_POST AS $naam => $waarde) {
                if (substr($naam, 0, 11) == 'eigenschap_') {
                    $id = str_replace('eigenschap_', '', $naam);

                    $controller->deleteModelFromCategory(
                        [
                            'model_id' => Flight::db()->real_escape_string($_SESSION['model_id']),
                            'category_id' => $id
                        ]
                    );

                    if ($waarde == 1) {
                        $controller->addModelToCategory(
                            [
                                'model_id' => Flight::db()->real_escape_string($_SESSION['model_id']),
                                'category_id' => $id
                            ]
                        );
                    }
                }
            }

            brdf_log($_SESSION['model_id'], 'Model heeft maten en/of eigenschappen (stap2) aangepast.');
        }

        echo json_encode($return);
    }

    public function ajax_naar_stap_4()
    {
        $return = [];
        $controller = DBController::getInstance();

        foreach ($_POST AS $naam => $waarde) {
            if (substr($naam, 0, 11) == 'eigenschap_') {
                $naamSession = str_replace('eigenschap_', '', $naam);

                if ($waarde == 1) {
                    $_SESSION['registreren']['eigenschappen'][$naamSession] = $waarde;
                } else {
                    unset($_SESSION['registreren']['eigenschappen'][$naamSession]);
                }
            }
        }

        if (
            isset($_SESSION['model_id']) &&
            is_numeric($_SESSION['model_id'])
        ) {
            foreach ($_POST AS $naam => $waarde) {
                if (substr($naam, 0, 11) == 'eigenschap_') {
                    $id = str_replace('eigenschap_', '', $naam);

                    $controller->deleteModelFromCategory(
                        [
                            'model_id' => Flight::db()->real_escape_string($_SESSION['model_id']),
                            'category_id' => $id
                        ]
                    );

                    if ($waarde == 1) {
                        $controller->addModelToCategory(
                            [
                                'model_id' => Flight::db()->real_escape_string($_SESSION['model_id']),
                                'category_id' => $id
                            ]
                        );
                    }
                }
            }

            Flight::db()->query("
                UPDATE model
                SET nieuw_ervaring='" . Flight::db()->real_escape_string($_POST['ervaring_uitleg']) . "',
                    updated=now(),
                    declined=0,
                    is_update=1
                WHERE model_id=" . Flight::db()->real_escape_string($_SESSION['model_id'])
            );

            Flight::db()->query("
                UPDATE model
                SET talenten='" . Flight::db()->real_escape_string($_POST['talenten_uitleg']) . "',
                    updated=now(),
                    declined=0,
                    is_update=1
                WHERE model_id=" . Flight::db()->real_escape_string($_SESSION['model_id'])
            );

            brdf_log($_SESSION['model_id'], 'Model heeft ervaringen (stap3) aangepast.');
        }

        $_SESSION['registreren']['talenten'] = $_POST['talenten_uitleg'];
        $_SESSION['registreren']['ervaring'] = $_POST['ervaring_uitleg'];
        $_SESSION['registreren']['video_code'] = [];
        $videos = $controller->getModelVideosById($_SESSION['model_id']);

        for ($i = 1; $i < 7; $i++) {
            $videoCode = 'video_code_' . $i;

            if (
                isset($_POST[$videoCode]) &&
                !empty($_POST[$videoCode])
            ) {
                if (preg_match('/vimeo/ui', $_POST[$videoCode])) {
                    $source = 'vimeo';
                    $host = '//player.vimeo.com/video/';
                } elseif (preg_match('/youtu/ui', $_POST[$videoCode])) {
                    $source = 'youtube';
                    $host = 'https://www.youtube.com/embed/';
                } else {
                    $source = 'youtube';
                    $host = 'https://www.youtube.com/embed/';
                }

                $originalLink = Flight::db()->real_escape_string($_POST[$videoCode]);
                $code = $this->filterVideoCode($_POST[$videoCode]);

                $_SESSION['registreren']['video_code'][] = [
                    'code' => $code,
                    'host' => $host,
                    'source' => $source,
                    'original_link' => $originalLink
                ];

                if (!$controller->isVideoExist(['model_id' => $_SESSION['model_id'], 'video_id' => $code])) {
                    $controller->writeModelVideoById(
                        [
                            'code' => $code,
                            'host' => $host,
                            'source' => $source,
                            'original_link' => $originalLink
                        ],
                        $_SESSION['model_id']
                    );
                } elseif ($originalLink) {
                    Flight::db()->query("
		                UPDATE model_videos
		                SET original_link='" . $originalLink . "',
		                 host='" . $host . "',
		                 source='" . $source . "'
		                WHERE model_id=" . Flight::db()->real_escape_string($_SESSION['model_id']) . " AND code='" . $code . "'"
                    );
                }

                if ($videos) {
                    foreach ($videos as $key => $video) {
                        if ($video['code'] == $code) {
                            unset($videos[$key]);
                        }
                    }
                }
            }
        }

        if ($videos && count($videos)) {
            foreach ($videos as $key => $video) {
                $controller->deleteVideoByModelId(
                    [
                        'model_id' => $_SESSION['model_id'],
                        'video_id' => $video['code']
                    ]
                );
            }
        }

        $_SESSION['registreren']['stap3'] = TRUE;

        echo json_encode($return);
    }

    public function ajax_naar_stap_5()
    {
        $return = array();
        if (isset($_POST['soort']) && !empty($_POST['soort'])) {
            $_SESSION['registreren']['soort_fotos'] = $_POST['soort'];
        } else {
            $_SESSION['registreren']['soort_fotos'] = 0;
        }

        $_SESSION['registreren']['informatie_aanvragen'] = $_POST['informatie'];
        $_SESSION['registreren']['fotografen'] = $_POST['fotografen'];
        $_SESSION['registreren']['stap4'] = TRUE;

        if (isset($_SESSION['model_id']) && is_numeric($_SESSION['model_id'])) {

            $query = Flight::db()->query("
                UPDATE model
                SET fotografen='" . Flight::db()->real_escape_string($_SESSION['registreren']['fotografen']) . "',
                    updated=now(),
                    declined=0,
                    is_update=1
                WHERE model_id=" . Flight::db()->real_escape_string($_SESSION['model_id'])
            );

            $query = Flight::db()->query("SELECT code FROM model WHERE model_id=" . $_SESSION['model_id'])->fetch_array();
            $code = $query['code'];

            mkdir('models/' . $_SESSION['model_id']);

            foreach ($_SESSION['registreren']['fotos'] AS $id => $val) {
                if (is_numeric($id)) {
                    Flight::db()->query("
                    INSERT INTO model_images
                    (id_model, timestamp)
                    VALUES(" . $_SESSION['model_id'] . ",
                           now()
                    )
                    ");

                    $foto_id = Flight::db()->insert_id;

                    rename('_tmp/' . $_SESSION['registreren']['fotos_code'] . '/' . $id . '.jpg', 'models/' . $_SESSION['model_id'] . '/original/' . $foto_id . '.jpg');
                    rename('_tmp/' . $_SESSION['registreren']['fotos_code'] . '/' . $id . '_thumb.jpg', 'models/' . $_SESSION['model_id'] . '/thumbs/' . $foto_id . '.jpg');
                }
            }

            if (count($_SESSION['registreren']['fotos']) > 0) {
                brdf_log($_SESSION['model_id'], "Model heeft foto's toegevoegd.");
            }

            @rmdir('_tmp/' . $_SESSION['registreren']['fotos_code']);

            unset($_SESSION['registreren']['fotos_code']);
            unset($_SESSION['registreren']['fotos']);

            $query = Flight::db()->query("
                UPDATE model
                SET nieuw_info_portfolio='" . Flight::db()->real_escape_string($_POST['informatie']) . "',
                    nieuw_soort_fotos='" . Flight::db()->real_escape_string($_POST['soort']) . "',
                    updated=now(),
                    declined=0,
                    is_update=1
                WHERE model_id=" . $_SESSION['model_id']
            );

            $return['success'] = 1;
        } else {
            if (isset($_SESSION['registreren']['fotos']) && count($_SESSION['registreren']['fotos']) > 0) {
                $return['success'] = 1;
            } else {
                $return['success'] = 0;
            }
        }

        echo json_encode($return);
    }

    public function ajax_naar_stap_6()
    {
        $return = array();

        $_SESSION['registreren']['stap5'] = TRUE;

        if (isset($_SESSION['model_id']) && is_numeric($_SESSION['model_id'])) {
            $return['success'] = 1;
        } elseif (
            !empty($_SESSION['registreren']['voornaam']) &&
            !empty($_SESSION['registreren']['email']) &&
            !empty($_SESSION['registreren']['telefoon'])
        ) {
            $data = $_SESSION['registreren'];

            if (strlen($data['geboortedatum_dag'] == 1)) {
                $data['geboortedatum_dag'] = "0" . $data['geboortedatum_dag'];
            }

            if (strlen($data['geboortedatum_maand'] == 1)) {
                $data['geboortedatum_dag'] = "0" . $data['geboortedatum_maand'];
            }

            $code = randomNum(10);
            $models = Flight::db()->query("SELECT * FROM model WHERE model_id=100001");

            if ($models->num_rows > 0) {
            } else {
                $model_id_lowest = 100001;
            }

            if (isset($model_id_lowest) && $model_id_lowest > 0) {
                $sql_variable_insert_model_id = "model_id,";
                $sql_value_insert_model_id = $model_id_lowest . ",";
            } else {
                $sql_variable_insert_model_id = "";
                $sql_value_insert_model_id = "";
            }

            $query = Flight::db()->query("
                INSERT INTO model
                (" . $sql_variable_insert_model_id . "naam, voornaam, geslacht, geboortedatum, lengte, gewicht, straat, nummer, gemeente,
                postcode, telefoon, nieuw_telefoon2, email, maten_schoenen, maten_borst,
                maten_taille, maten_heupen, maten_cup, maten_cup_letter, maten_kleding, maten_kostuum, maten_jeans, code, datum,
                updated, land, moedertaal, nieuw_actief, nieuw_ervaring, nieuw_kind_maat_min, nieuw_kind_maat_max, nieuw_soort_fotos, nieuw_info_portfolio,talenten,fotografen,int_maat,hemden_maat,where_known,country_origin_id)

                VALUES(" . $sql_value_insert_model_id . "
                        '" . Flight::db()->real_escape_string(titleCase(($data['achternaam']))) . "',
                       '" . Flight::db()->real_escape_string(titleCase(($data['voornaam']))) . "',
                       '" . Flight::db()->real_escape_string($data['geslacht']) . "',
                       '" . Flight::db()->real_escape_string($data['geboortedatum_jaar']) . '-' . Flight::db()->real_escape_string($data['geboortedatum_maand']) . '-' . Flight::db()->real_escape_string($data['geboortedatum_dag']) . "',
                       '" . Flight::db()->real_escape_string($data['lengte']) . "',
                       '" . Flight::db()->real_escape_string($data['gewicht']) . "',
                       '" . Flight::db()->real_escape_string($data['adres']) . "',
                       '" . Flight::db()->real_escape_string($data['huisnummer']) . "',
                       '" . Flight::db()->real_escape_string($data['gemeente']) . "',
                       '" . Flight::db()->real_escape_string($data['postcode']) . "',
                       '" . Flight::db()->real_escape_string(Registreren::PHONE_CODE[$data['land']] . $data['telefoon']) . "',
                       '" . Flight::db()->real_escape_string($data['telefoon2']) . "',
                       '" . Flight::db()->real_escape_string($data['email']) . "',
                       '" . Flight::db()->real_escape_string($data['schoenmaat']) . "',
                       '" . Flight::db()->real_escape_string($data['borst']) . "',
                       '" . Flight::db()->real_escape_string($data['taille']) . "',
                       '" . Flight::db()->real_escape_string($data['heupen']) . "',
                       '" . Flight::db()->real_escape_string($data['cup']) . "',
                       '" . Flight::db()->real_escape_string($data['cup_letter']) . "',
                       '" . Flight::db()->real_escape_string($data['kleed']) . "',
                       '" . Flight::db()->real_escape_string($data['kostuum']) . "',
                       '" . Flight::db()->real_escape_string($data['jeans']) . "',
                       '" . Flight::db()->real_escape_string($code) . "',
                       now(),
                       now(),
                       '" . Flight::db()->real_escape_string($data['land']) . "',
                       '" . Flight::db()->real_escape_string($data['spreektaal']) . "',
                       1,
                       '" . Flight::db()->real_escape_string($data['ervaring']) . "',
                       '" . Flight::db()->real_escape_string($data['kind_maat_min']) . "',
                       '" . Flight::db()->real_escape_string($data['kind_maat_max']) . "',
                       '" . Flight::db()->real_escape_string($data['soort_fotos']) . "',
                       '" . Flight::db()->real_escape_string($data['informatie_aanvragen']) . "',
                       '" . Flight::db()->real_escape_string($data['talenten']) . "',
                       '" . Flight::db()->real_escape_string($data['fotografen']) . "',
                       '" . Flight::db()->real_escape_string($data['int_maat']) . "',
                        '" . Flight::db()->real_escape_string($data['hemden']) . "',
                        '" . Flight::db()->real_escape_string($data['where_known']) . "',
                        '" . Flight::db()->real_escape_string($data['country']) . "'

                )
            ");

            if (!$query) {
                $lang = Flight::get('taalContent');
                $return['bericht'] = $lang['technische_fout'] . " " . Flight::db()->error;
            } else {
                $model_id = Flight::db()->insert_id;
                $_SESSION['model_id'] = $model_id;

                $controller = DBController::getInstance();
                if (count($_SESSION['registreren']['video_code'])) {
                    foreach ($_SESSION['registreren']['video_code'] as $key => $value) {
                        $controller->writeModelVideoById($value, $model_id);
                    }
                }

                if (array_key_exists(Flight::db()->real_escape_string($data['land']), Registreren::LAND_MAP)) {
                    foreach (LAND_MAP as $key => $group) {
                        $controller->removeModelFromGroup($group, $model_id);
                    }

                    $controller->addModelToGroup(Registreren::LAND_MAP[Flight::db()->real_escape_string($data['land'])], $model_id);
                }

                $user = new Entity_Model($model_id);
                $email = (new Repository_Email())->findByCode(Enum_EmailCode::MODEL_REGISTRATION);

                (new Mailer_LoggerProxy(new Mailer_Sender(Enum_Mail::COMMON_REPLY)))->send($user, $email, []);

                foreach ($data['eigenschappen'] AS $id => $val) {
                    $controller->addModelToCategory(
                        [
                            'model_id' => $model_id,
                            'category_id' => $id
                        ]
                    );
                }

                mkdir('models/' . $model_id);
                rename('_tmp/' . $data['fotos_code'], 'models/' . $model_id);

                foreach ($data['fotos'] AS $id => $val) {
                    if (is_numeric($id)) {
                        Flight::db()->query("
                        INSERT INTO model_images
                        (id_model, timestamp)
                        VALUES(" . $model_id . ",
                               now()
                        )
                        ");

                        $foto_id = Flight::db()->insert_id;

                        mkdir('models/' . $model_id . '/original');
                        mkdir('models/' . $model_id . '/thumbs');

                        rename('models/' . $model_id . '/' . $id . '.jpg', 'models/' . $model_id . '/original/' . $foto_id . '.jpg');
                        rename('models/' . $model_id . '/' . $id . '_thumb.jpg', 'models/' . $model_id . '/thumbs/' . $foto_id . '.jpg');
                    }
                }

                unset($_SESSION['registreren']['fotos_code']);
                unset($_SESSION['registreren']['fotos']);

                $return['success'] = 1;
            }
        } else {
            $_SESSION['registreren']['stap_passed'] = 1;
        }

        echo json_encode($return);
    }

    public function ajax_modelcode()
    {
        $json = array(
            'success' => 0,
            'bericht' => '',
        );

        if (isset($_POST['code'])) {
            $check = Flight::db()->query("
                SELECT *,
                       DATE_FORMAT(geboortedatum, '%e') AS geboortedatum_dag,
                       DATE_FORMAT(geboortedatum, '%c') AS geboortedatum_maand,
                       DATE_FORMAT(geboortedatum, '%Y') AS geboortedatum_jaar
                FROM model
                WHERE code='" . Flight::db()->real_escape_string(trim($_POST['code'])) . "'
            ");

            if ($check->num_rows > 0) {
                $json['success'] = 1;

                $_SESSION['registreren']['stap1_geweest'] = true;
                $_SESSION['registreren']['stap2_geweest'] = true;
                $_SESSION['registreren']['stap3_geweest'] = true;
                $_SESSION['registreren']['stap4_geweest'] = true;
                $_SESSION['registreren']['stap5_geweest'] = true;
                $_SESSION['registreren']['stap6_geweest'] = true;
                $_SESSION['registreren']['stap1'] = true;
                $_SESSION['registreren']['stap2'] = true;
                $_SESSION['registreren']['stap3'] = true;
                $_SESSION['registreren']['stap4'] = true;
                $_SESSION['registreren']['stap5'] = true;
                $_SESSION['registreren']['stap6'] = true;
                $model = $check->fetch_array();

                $_SESSION['model_id'] = $model['model_id'];
                $_SESSION['registreren']['voornaam'] = $model['voornaam'];
                $_SESSION['registreren']['achternaam'] = $model['naam'];
                $_SESSION['registreren']['adres'] = $model['straat'];
                $_SESSION['registreren']['huisnummer'] = $model['nummer'];
                $_SESSION['registreren']['postcode'] = $model['postcode'];
                $_SESSION['registreren']['gemeente'] = $model['gemeente'];
                $_SESSION['registreren']['land'] = $model['land'];
                $_SESSION['registreren']['geboortedatum_dag'] = $model['geboortedatum_dag'];
                $_SESSION['registreren']['geboortedatum_maand'] = $model['geboortedatum_maand'];
                $_SESSION['registreren']['geboortedatum_jaar'] = $model['geboortedatum_jaar'];
                $_SESSION['registreren']['code'] = $model['code'];
                $_SESSION['registreren']['spreektaal'] = $model['moedertaal'];
                $_SESSION['registreren']['email'] = $model['email'];
                $intPhone = preg_replace('/\D/', '', $model['telefoon']);

                if (strlen($intPhone) > 9) {
                    $_SESSION['registreren']['telefoon'] = substr($intPhone, strlen($intPhone) - 9);
                } else {
                    $_SESSION['registreren']['telefoon'] = $intPhone;
                }

                $_SESSION['registreren']['telefoon2'] = preg_replace('/\D/', '', $model['nieuw_telefoon2']);
                $_SESSION['registreren']['stap1'] = true;
                $_SESSION['registreren']['lengte'] = $model['lengte'];
                $_SESSION['registreren']['gewicht'] = $model['gewicht'];
                $_SESSION['registreren']['kind_maat_min'] = $model['nieuw_kind_maat_min'];
                $_SESSION['registreren']['kind_maat_max'] = $model['nieuw_kind_maat_max'];
                $_SESSION['registreren']['schoenmaat'] = $model['maten_schoenen'];
                $_SESSION['registreren']['borst'] = $model['maten_borst'];
                $_SESSION['registreren']['taille'] = $model['maten_taille'];
                $_SESSION['registreren']['heupen'] = $model['maten_heupen'];
                $_SESSION['registreren']['jeans'] = $model['maten_jeans'];
                $_SESSION['registreren']['kostuum'] = $model['maten_kostuum'];
                $_SESSION['registreren']['kleed'] = $model['maten_kleding'];
                $_SESSION['registreren']['cup'] = $model['maten_cup'];
                $_SESSION['registreren']['cup_letter'] = $model['maten_cup_letter'];
                $_SESSION['registreren']['int_maat'] = $model['int_maat'];
                $_SESSION['registreren']['hemden'] = $model['hemden_maat'];
                $_SESSION['registreren']['talenten'] = $model['talenten'];
                $_SESSION['registreren']['ervaring'] = $model['nieuw_ervaring'];
                $_SESSION['registreren']['where_known'] = $model['where_known'];
                $_SESSION['registreren']['fotografen'] = $model['fotografen'];
                $_SESSION['registreren']['geslacht'] = $model['geslacht'];
                $_SESSION['registreren']['country'] = $model['country_origin_id'];

                $controller = DBController::getInstance();
                $videos = $controller->getModelVideosById($_SESSION['model_id'], false);
                $_SESSION['registreren']['video_code'] = [];

                if ($videos) {
                    foreach ($videos as $key => $video) {
                        $_SESSION['registreren']['video_code'][] = $video;
                    }
                }

                $query = Flight::db()->query("SELECT * FROM modelcategory WHERE model_id=" . $model['model_id']);

                while ($r = $query->fetch_array()) {
                    $_SESSION['registreren']['eigenschappen'][$r['category_id']] = 1;
                }

                brdf_log($model['model_id'], 'Model heeft zich ingelogd in profiel.');
            }
        }

        $_SESSION['registreren']['stap_passed'] = 6;
        $_SESSION['registreren']['update'] = true;

        echo json_encode($json);
    }

    public function ajax_vergeten()
    {
        $json = array(
            "success" => 0,
        );

        $email = Flight::db()->real_escape_string($_POST['email']);

        $query = Flight::db()->query("SELECT code FROM model WHERE email='" . $email . "'");
        if ($query->num_rows > 0) {
            $array = $query->fetch_array();
            $code = $array['code'];
            $lang = Flight::get('taalContent');

            $headers = '';
            $headers .= "Reply-To: Borderfield <info@borderfield.com>\n";
            $headers .= "Return-Path: Borderfield <info@borderfield.com>\n";
            $headers .= "From: Borderfield <info@borderfield.com>\n";
            $headers .= "Organization: \n";
            $headers .= "MIME-Version: 1.0\n";
            $headers .= "Content-type: text/html; charset=utf-8\n";
            $headers .= "X-Priority: 3\n";
            $headers .= "X-Mailer: PHP" . phpversion() . "\n";

            $html_mail = "<p style=\"color:black; font-size: 12px; font-family: Arial, Verdana, Serif;\">";
            $html_mail = $lang['vergeten_email'] . '<br /><strong>' . $code . '</strong>';
            $html_mail .= "</p>";

            if (mail($email, $lang['vergeten_titel'], $html_mail, $headers)) {
                $json['success'] = 1;
            }
        }

        echo json_encode($json);
    }

    /**
     * @param string $code
     * @return mixed|string
     */
    private function filterVideoCode($code)
    {
        $code = preg_replace('/\&.+/ui', '', $code);
        $code = preg_replace('/.+v=/ui', '', $code);
        $code = preg_replace('/.+\//ui', '', $code);

        return $code;
    }

    private function getAge()
    {
        return date(
            "md",
            date("U", mktime(0, 0, 0, $_SESSION['registreren']['geboortedatum_maand'], $_SESSION['registreren']['geboortedatum_dag'], $_SESSION['registreren']['geboortedatum_jaar'])))
        > date("md")
            ? ((date("Y") - $_SESSION['registreren']['geboortedatum_jaar']) - 1)
            : (date("Y") - $_SESSION['registreren']['geboortedatum_jaar']
            );
    }
}