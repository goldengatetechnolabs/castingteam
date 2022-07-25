<?php

use CastingteamBundle\Entity;

class Models extends Core_Controller
{
	const LAND_MAP = [
        'NL' => '68',
        'FR' => '155',
        'DE' => '156',
		'BE' => '200',
		'LUX' => '201'
    ];

    /**
     * @param Account_Admin $account
     */
    public function __construct(Account_Admin $account)
    {
        parent::__construct($account);

        $this->smarty->assign('hoofdmenu_actief', 'modellen');
    }

    /**
     * @return void
     */
    public function filters()
    {
		$filters = $this->controller->getAllFilters();
		$categories = $this->controller->getMainCategoriesWithFilters();

        $this->smarty->assign('filters', $filters);
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('include_tabs', 'cms/models/_tabs2.tpl');
        $this->smarty->assign('tab_active', 'filters');
        $this->smarty->assign('include', 'cms/models/filters.tpl');
        $this->smarty->display('templates/cms/index.tpl');

	}

	public function groups()
    {
		$groups = $this->controller->getAllGroups();

        $this->smarty->assign('groepen', $groups);
        $this->smarty->assign('include_tabs', 'cms/models/_tabs2.tpl');
        $this->smarty->assign('tab_active', 'groups');
        $this->smarty->assign('include', 'cms/models/groups.tpl');
        $this->smarty->display('templates/cms/index.tpl');
	}

	public function lijst()
    {
		$emails = [];
		$query = Flight::db()->query("SELECT * FROM emails ORDER BY titel");

		while ($r = $query->fetch_array()) {
			$emails[$r['id']] = $r;
		}

        $this->smarty->assign('emails', $emails);

		$archief = array();
		$query = Flight::db()->query("SELECT title, id, DATE_FORMAT(timestamp, '%d/%m/%Y') AS datum_tonen FROM model_mails ORDER BY timestamp DESC LIMIT 10");

		while ($r = $query->fetch_array()) {
			$archief[$r['id']] = $r;
		}

        $this->smarty->assign('archief', $archief);
		$selecties = [];
		$query = Flight::db()->query("SELECT * FROM selecties WHERE NOT id IN ( SELECT id FROM selecties WHERE selection_type='user_selection' ) OR selection_type='cms_selection' ORDER BY creation_date DESC");

        while ($r = $query->fetch_array()) {
			$selecties[$r['id']] = $r['name'];
		}

        $this->smarty->assign('selecties', $selecties);

		$user_selecties = $this->controller->getSelectionsByType('user_selection');
		$selections = [];

		foreach ($user_selecties as $user_selectie) {
			$selection = $user_selectie;
			$data['selection_id'] = $user_selectie['id'];
			$selection['user'] = $this->controller->getUserBySelection($data);
			$selections[] = $selection;
		}

        $this->smarty->assign('user_selecties', $selections);
        $groups = $this->controller->getRootGroups();

		$filters = $this->controller->getFiltersByCategoryId();
        $this->smarty->assign('filters', $filters);

		if (
		    isset($_POST['search']) &&
            !empty($_POST['search'])
        ) {
			$search = $_POST['search'];
            $this->smarty->assign('search', $search);
		}

		$skin_filter = $this->controller->getCategoryBySubType('huidskleur');
		$hair_color_filter = $this->controller->getCategoryBySubType('haarkleur');
		$hair_length_filter = $this->controller->getCategoryBySubType('haarlengte');
		$hair_filter = $this->controller->getCategoryBySubType('haar');
		$begroeiing_filter = $this->controller->getCategoryBySubType('begroeing');
		$versiering_filter = $this->controller->getCategoryBySubType('versiering');
		$kleur_ogen_filter = $this->controller->getCategoryBySubType('ogen');
		$lichaam_filter = $this->controller->getCategoryBySubType('lichaam');
		$language_filter = $this->controller->getCategoryBySubType('talenkennis');

        $this->smarty->assign('skin_filter', $skin_filter);
        $this->smarty->assign('hair_color_filter', $hair_color_filter);
        $this->smarty->assign('hair_length_filter', $hair_length_filter);
        $this->smarty->assign('hair_filter', $hair_filter);
        $this->smarty->assign('begroeiing_filter', $begroeiing_filter);
        $this->smarty->assign('versiering_filter', $versiering_filter);
        $this->smarty->assign('kleur_ogen_filter', $kleur_ogen_filter);
        $this->smarty->assign('lichaam_filter', $lichaam_filter);
        $this->smarty->assign('language_filter', $language_filter);
        $this->smarty->assign('countries', $this->controller->getCountries());
        $this->smarty->assign('groepen', $groups);
        $this->smarty->assign('emailsFrom', $this->entityFactory->fromEmail()->findAllAsArray());
        $this->smarty->assign('include_tabs', 'cms/models/_tabs2.tpl');
		$this->smarty->assign('tab_active', 'models');
        $this->smarty->assign('hoofdmenu_actief', 'models');
        $this->smarty->assign('include', 'cms/models/lijst.tpl');
        $this->smarty->display('templates/cms/index.tpl');
	}

	public function aanpassen()
    {
		// var_dump("hi");


		// $remote_file = '230364.jpg';

		
		// /* FTP Account (Remote Server) */
		// $ftp_host = 'ftp.stagecastingteamcom.webhosting.be'; /* host */
		// $ftp_user_name = 'stagecastingteamcom@stagecastingteamcom'; /* username */
		// $ftp_user_pass = '1rf8?rsZx457'; /* password */
		
		
		// /* File and path to send to remote FTP server */
		// $local_file = $_SERVER['DOCUMENT_ROOT'] . '/models/113774/thumbs/230364.jpg';
		
		// /* Connect using basic FTP */
		// $connect_it = ftp_connect( $ftp_host );
		
		
		// /* Login to FTP */
		// $login_result = ftp_login( $connect_it, $ftp_user_name, $ftp_user_pass );

		// ftp_chdir($connect_it, '/www');
		// var_dump(ftp_chdir($connect_it, 'gdfdf'));
		// // ftp_mkdir($connect_it, "model");

		// var_dump( ftp_put( $connect_it, $remote_file, $local_file, FTP_BINARY ) );
		// // var_dump(error_get_last());
		
		// ftp_close( $connect_it );

		// exit;
		if (
		    isset($_GET['id']) &&
            is_numeric($_GET['id'])
        ) {
			$id = Flight::db()->real_escape_string($_GET['id']);

			$model = Flight::db()->query("
            SELECT *,
                   DATE_FORMAT(datum, '%d') AS geboortedatum_dag,
                   DATE_FORMAT(datum, '%m') AS geboortedatum_maand,
                   DATE_FORMAT(datum, '%Y') AS geboortedatum_jaar,
                   DATE_FORMAT(geboortedatum, '%e') AS check_dag,
                   DATE_FORMAT(geboortedatum, '%c') AS check_maand,
                   DATE_FORMAT(geboortedatum, '%Y') AS check_jaar
            FROM model
            WHERE model_id=" . $id
			)->fetch_array();

            $this->smarty->assign('model', $model);

			$leeftijd = (date("md", date("U", mktime(0, 0, 0, $model['check_maand'], $model['check_dag'], $model['check_jaar']))) > date("md") ? ((date("Y") - $model['check_jaar']) - 1) : (date("Y") - $model['check_jaar']));
            $this->smarty->assign('leeftijd', $leeftijd);

            $groups = $this->controller->getRootGroups();
            $this->smarty->assign('groepen', $groups);

			$groepen_model = [];
			$query = Flight::db()->query("SELECT * FROM model_groepen WHERE id_model=" . $id);

			while ($r = $query->fetch_array()) {
				$groepen_model[$r['id_groep']] = 1;
			}

            $this->smarty->assign('groepen_model', $groepen_model);
            $this->smarty->assign('eigenschappen', getEigenschappen());
			$eigenschappen_model = [];
			$query = Flight::db()->query("SELECT * FROM modelcategory WHERE model_id=" . $id);

			while ($r = $query->fetch_array()) {
				$eigenschappen_model[$r['category_id']] = 1;
			}

            $this->smarty->assign('eigenschappen_model', $eigenschappen_model);

			$nextModel = $this->controller->getNextModel(['model_id' => $id]);
			$previousModel = $this->controller->getPreviousModel(['model_id' => $id]);
			$isHomepageModel = $this->controller->isHomepageModel($id);

			if ($nextModel) {
                $this->smarty->assign('nextModel', $nextModel['model_id']);
			}

			if ($previousModel) {
                $this->smarty->assign('previousModel', $previousModel['model_id']);
			}

			$fotos = array();
			$query = Flight::db()->query("
                SELECT a.*,
                       DATE_FORMAT(timestamp, '%d/%m/%Y') AS datum
                FROM model_images AS a
                WHERE a.id_model = " . $id . "
                ORDER BY timestamp DESC
            ");

			while ($r = $query->fetch_array()) {
				$fotos[$r['datum']][$r['id']] = $r['external'] ? EXTERNAL_IMAGES_SRC : '';
			}

			$emails = [];
			$query = Flight::db()->query("SELECT * FROM emails ORDER BY titel");

			while ($r = $query->fetch_array()) {
				$emails[$r['id']] = $r;
			}

			$entity = $this->entityFactory->model()->findOneById($id);

			if (!is_null($entity)) {
                /** @var Entity\Model $entity */
                $category = $this->entityFactory->category()->findOneByName('Bordermodels');
                $groups = $this->entityFactory->group()->findAllByModelAndCategory($category, $entity);
                $images = $this->entityFactory->siteImage()->findAllByModel($entity);

                foreach ($images as $image) {
                    foreach ($groups as $group) {
                        $entitySiteImageGroup = $this->entityFactory->siteImageGroup()->findOneByImageAndGroup($image, $group);
                        /** @var Entity\SiteImageGroup $entitySiteImageGroup */
                        /** @var Entity\SiteImage $image */

                        if (is_null($entitySiteImageGroup)) {
                            $entitySiteImageGroup = (new Entity\SiteImageGroup())
                                ->setPdf($image->getPdf())
                                ->setOnline($image->getOnline())
                                ->setPosition($image->getOrder())
                                ->setSiteImage($image)
                                ->setGroup($group);

                            $this->entityManager->persist($entitySiteImageGroup);
                        }
                    }
                }

                $this->entityManager->flush();

                $groupOrderedImages = [];

                foreach ($groups as $group) {
                    $groupOrderedImages[$group->getId()] = $this->entityFactory->siteImage()->findAllByGroupAndModel($entity, $group);
                }

                $this->smarty->assign('categoryGroups', $this->entityFactory->group()->findAllByModelAndCategory($category, $entity));
                $this->smarty->assign('countries', $this->controller->getCountries());
                $this->smarty->assign('pageType', 'single_page');
                $this->smarty->assign('isHomepageModel', $isHomepageModel);
                $this->smarty->assign('emails', $emails);
                $this->smarty->assign('fotos', $fotos);
                $this->smarty->assign('groupOrderedImages', $groupOrderedImages);
                $this->smarty->assign('siteImages', $images);
                $this->smarty->assign('videohtml', cms_model_video($id));
                $this->smarty->assign('emailsFrom', $this->entityFactory->fromEmail()->findAllAsArray());
                $this->smarty->assign('include', 'cms/models/formulier.tpl');
                $this->smarty->display('templates/cms/index.tpl');
            }
		}
	}

	public function crop()
    {
		if (isset($_GET['img']) && is_numeric($_GET['img'])) {
			$foto_id = $_GET['img'];
			$query = Flight::db()->query("
            SELECT a.id,
                    a.external,
                   b.code,
                   a.id_model

            FROM model_images AS a

            LEFT JOIN model AS b
            ON a.id_model = b.model_id

            WHERE a.id=" . $foto_id
			)->fetch_array();

			$code = $query['code'];
            $src_domain = $query['external'] ? EXTERNAL_IMAGES_SRC : '';
            $this->smarty->assign('code', $code);
            $this->smarty->assign('modelId', $query['id_model']);
            $this->smarty->assign('src_domain', $src_domain);
            $this->smarty->assign('foto', $foto_id);
            $this->smarty->display('templates/cms/models/crop.html');
		}
	}

	public function ajax_aanpassen()
    {
		$json = [
			'success' => 0,
			'bericht' => '',
		];

		if (
		    isset($_POST['id']) &&
            is_numeric($_POST['id'])
        ) {
			$id_model = $_POST['id'];

			if (strlen($_POST['geboortedatum_dag'] == 1)) {
				$_POST['geboortedatum_dag'] = "0" . $_POST['geboortedatum_dag'];
			}

			if (strlen($_POST['geboortedatum_maand'] == 1)) {
				$_POST['geboortedatum_dag'] = "0" . $_POST['geboortedatum_maand'];
			}

			$geboortedatum = Flight::db()->real_escape_string($_POST['geboortedatum_jaar']);
			$geboortedatum .= '-' . Flight::db()->real_escape_string($_POST['geboortedatum_maand']);
			$geboortedatum .= '-' . Flight::db()->real_escape_string($_POST['geboortedatum_dag']);
            $leeftijd = (date("md", date("U", mktime(0, 0, 0, $_POST['geboortedatum_maand'], $_POST['geboortedatum_dag'], $_POST['geboortedatum_jaar']))) > date("md") ? ((date("Y") - $_POST['geboortedatum_jaar']) - 1) : (date("Y") - $_POST['geboortedatum_jaar']));
            $country = Flight::db()->real_escape_string($_POST['country']);
            $skinColor = Flight::db()->real_escape_string($_POST['huidskleur']);

            if ($leeftijd > 17) {
				if ($_POST['geslacht'] == 'M') {
					$lengte = $_POST['man_lengte'];
					$gewicht = $_POST['man_gewicht'];
					$borst = $_POST['man_borst'];
					$taille = $_POST['man_taille'];
					$heupen = $_POST['man_heupen'];
					$jeans = $_POST['man_jeans'];
					$intMaat = $_POST['man_int_maat'];
					$hemden = $_POST['man_hemden_maat'];
					$cup = '';
					$kostuum = $_POST['man_kostuum'];
					$kleed = '';
					$schoen = $_POST['man_schoen'];
				} elseif ($_POST['geslacht'] == 'V') {
					$lengte = $_POST['vrouw_lengte'];
					$gewicht = $_POST['vrouw_gewicht'];
					$borst = $_POST['vrouw_borst'];
					$taille = $_POST['vrouw_taille'];
					$heupen = $_POST['vrouw_heupen'];
					$jeans = $_POST['vrouw_jeans'];
					$intMaat = $_POST['vrouw_int_maat'];
					$hemden = 0;
					$cup = $_POST['vrouw_cup'];
					$kleed = $_POST['vrouw_kleed'];
					$schoen = $_POST['vrouw_schoen'];
					$kostuum = 0;
				} else {
					$lengte = 'nvt';
					$gewicht = 'nvt';
					$borst = 'nvt';
					$taille = 'nvt';
					$heupen = 'nvt';
					$jeans = 'nvt';
					$intMaat = 'nvt';
					$hemden = 'nvt';
					$cup = '';
					$kleed = 'nvt';
					$schoen = 'nvt';
					$kostuum = 'nvt';
				}

				$kind_maat_min = 0;
				$kind_maat_max = 0;
			} elseif ($_POST['geslacht'] == 'F') {
				$lengte = 'nvt';
				$gewicht = 'nvt';
				$borst = 'nvt';
				$taille = 'nvt';
				$heupen = 'nvt';
				$jeans = 'nvt';
				$intMaat = 'nvt';
				$hemden = 'nvt';
				$cup = '';
				$kleed = 'nvt';
				$schoen = 'nvt';
				$kostuum = 'nvt';
			} elseif ($leeftijd > 12) {
				$lengte = $_POST['teen_lengte'];
				$gewicht = $_POST['teen_gewicht'];
				$kind_maat_min = $_POST['teen_maat_min'];
				$kind_maat_max = $_POST['teen_maat_max'];
				$schoen = $_POST['teen_schoen'];

				if (isset($_POST['teen_int_maat']) and !empty($_POST['teen_int_maat'])) {
					$intMaat = $_POST['teen_int_maat'];
				} else {
					$intMaat = '';
				}

				if (isset($_POST['teen_jeans']) and !empty($_POST['teen_jeans'])) {
					$jeans = $_POST['teen_jeans'];
				} else {
					$jeans = 0;
				}

				if (isset($_POST['teen_kleed']) and !empty($_POST['teen_kleed'])) {
					$kleed = $_POST['teen_kleed'];
				} else {
					$kleed = 0;
				}

				if (isset($_POST['teen_hemden_maat']) and !empty($_POST['teen_hemden_maat'])) {
					$hemden = $_POST['teen_hemden_maat'];
				} else {
					$hemden = 0;
				}

				$borst = 0;
				$taille = 0;
				$heupen = 0;
				$kostuum = 0;
				$cup = 0;
			} else {
				$lengte = $_POST['kind_lengte'];
				$gewicht = $_POST['kind_gewicht'];
				$kind_maat_min = $_POST['kind_maat_min'];
				$kind_maat_max = $_POST['kind_maat_max'];
				$schoen = $_POST['kind_schoen'];
				$intMaat = '';
				$kleed = 0;
				$hemden = 0;
				$borst = 0;
				$taille = 0;
				$heupen = 0;
				$jeans = 0;
				$kostuum = 0;
				$cup = 0;
			}

			$entity = new Entity_Model($_POST['id']);

			if (!empty($_POST['email'])) {
			    $email = $_POST['email'];
            } else {
                $email = $entity->getEmail();
            }

            if (!empty($_POST['telefoon'])) {
                $phone = $_POST['telefoon'];
            } else {
                $phone = $entity->getPhone();
            }

            if (!empty($_POST['nieuw_telefoon2'])) {
                $secondPhone = $_POST['nieuw_telefoon2'];
            } else {
                $secondPhone = $entity->getSecondPhone();
            }

			Flight::db()->query("
                UPDATE model
                SET voornaam='" . Flight::db()->real_escape_string($_POST['voornaam']) . "',
                    naam='" . Flight::db()->real_escape_string($_POST['naam']) . "',
                    straat='" . Flight::db()->real_escape_string($_POST['straat']) . "',
                    nummer='" . Flight::db()->real_escape_string($_POST['nummer']) . "',
                    postcode='" . Flight::db()->real_escape_string($_POST['postcode']) . "',
                    gemeente='" . Flight::db()->real_escape_string($_POST['gemeente']) . "',
                    land='" . Flight::db()->real_escape_string($_POST['land']) . "',
                    geboortedatum='" . $geboortedatum . "',
                    geslacht='" . Flight::db()->real_escape_string($_POST['geslacht']) . "',
                    moedertaal='" . Flight::db()->real_escape_string($_POST['moedertaal']) . "',
                    email='" . Flight::db()->real_escape_string($email) . "',
                    telefoon='" . Flight::db()->real_escape_string($phone) . "',
                    nieuw_telefoon2='" . Flight::db()->real_escape_string($secondPhone) . "',
                    nieuw_opmerking='" . Flight::db()->real_escape_string($_POST['nieuw_opmerking']) . "',
                    nieuw_ervaring='" . Flight::db()->real_escape_string($_POST['nieuw_ervaring']) . "',
                    talenten='" . Flight::db()->real_escape_string($_POST['talenten']) . "',
                    nieuw_actief=" . Flight::db()->real_escape_string($_POST['status']) . ",
                    maten_schoenen='" . Flight::db()->real_escape_string($schoen) . "',
                    maten_borst='" . Flight::db()->real_escape_string($borst) . "',
                    maten_taille='" . Flight::db()->real_escape_string($taille) . "',
                    maten_heupen='" . Flight::db()->real_escape_string($heupen) . "',
                    maten_cup='" . Flight::db()->real_escape_string($cup) . "',
                    maten_kleding='" . Flight::db()->real_escape_string($kleed) . "',
                    maten_kostuum='" . Flight::db()->real_escape_string($kostuum) . "',
                    maten_jeans='" . Flight::db()->real_escape_string($jeans) . "',
                    nieuw_kind_maat_min='" . Flight::db()->real_escape_string($kind_maat_min) . "',
                    nieuw_kind_maat_max='" . Flight::db()->real_escape_string($kind_maat_max) . "',
                    int_maat='" . Flight::db()->real_escape_string($intMaat) . "',
                    hemden_maat='" . Flight::db()->real_escape_string($hemden) . "',
                    lengte='" . Flight::db()->real_escape_string($lengte) . "',
                    gewicht='" . Flight::db()->real_escape_string($gewicht) . "',
                    country_origin_id='" . Flight::db()->real_escape_string($country) . "'
                WHERE model_id=" . $id_model
			);


			if (
				ENVIRONMENT == Enum_Environment::PRODUCTION &&
				$_POST['id'] < 100000
			) {
                (new Synchronizer_Composite())->synchronize("
                UPDATE model
                SET voornaam='" . Flight::db()->real_escape_string($_POST['voornaam']) . "',
                    naam='" . Flight::db()->real_escape_string($_POST['naam']) . "',
                    geboortedatum='" . $geboortedatum . "',
                    email='" . Flight::db()->real_escape_string($email) . "',
                    telefoon='" . Flight::db()->real_escape_string($phone) . "',
                    straat='" . Flight::db()->real_escape_string($_POST['straat']) . "',
                    nummer='" . Flight::db()->real_escape_string($_POST['nummer']) . "',
                    postcode='" . Flight::db()->real_escape_string($_POST['postcode']) . "',
                    gemeente='" . Flight::db()->real_escape_string($_POST['gemeente']) . "',
                    land='" . Flight::db()->real_escape_string($_POST['land']) . "'
                WHERE model_id=" . $id_model);
			}

			if (Flight::db()->error != '') {
				$json['bericht'] = Flight::db()->error;
			} else {
				Flight::db()->query("DELETE FROM model_groepen WHERE id_model=" . $id_model);

				foreach ($_POST AS $naam => $val) {
					if (substr($naam, 0, 6) == 'groep_') {
						$id = str_replace('groep_', '', $naam);

						if (is_numeric($id)) {
							$naam = $_POST['groep_naam_' . $id];

							if (empty($naam)) {
								Flight::db()->query("DELETE FROM groepen WHERE id=" . $id);
							} else {
								Flight::db()->query("UPDATE groepen SET naam='" . Flight::db()->real_escape_string($naam) . "' WHERE id=" . $id);

								if ($val == 1 || $val == 'on') {
									Flight::db()->query("INSERT INTO model_groepen (id_groep, id_model) VALUES(" . $id . ", " . $id_model . ")");
								}
							}
						}
					}
				}

				$position = $_POST['homepage_models'];

                if ($position == 'on') {
                    $position = 1;
                } elseif ($position == 'off') {
                    $position = 0;
                }

                $this->controller->setHomepageModel($id_model, $position);

				if (array_key_exists(Flight::db()->real_escape_string($_POST['land']), Models::LAND_MAP)) {
					foreach (Models::LAND_MAP as $key => $group) { 
						$this->controller->removeModelFromGroup($group, $id_model);
					}

					$this->controller->addModelToGroup(Models::LAND_MAP[Flight::db()->real_escape_string($_POST['land'])], $id_model);
				}

				if (!empty($_POST['id'])) {
                    $this->controller->deleteModelFromCategories(['model_id' => Flight::db()->real_escape_string($_POST['id'])]);

					foreach ($_POST AS $naam => $val) {
						if (substr($naam, 0, 11) == 'eigenschap_') {
							$id = str_replace('eigenschap_', '', $naam);

							if (is_numeric($id)) {
								if ($val == 1 || $val == 'on') {
									$this->controller->addModelToCategory(
				                   		[
				                   			'model_id' => $_POST['id'],
				                   			'category_id' => $id
				                   		]
				                   	);
								}
							}
						}
					}
				}
				
				if ($_POST['page'] == 'poppup_page') {
					$json['success'] = 1;
					$json['bericht'] = "Het model is aangepast.";
				} else {
					$json['success'] = 1;
					$json['bericht'] = "Het model is aangepast.";
					$json['redirect'] = "/cms/models/models/aanpassen/?id=" . $id_model;
				}
				
			}
		}

		echo json_encode($json);
	}

	public function ajax_groep_toevoegen() {
		$json = [
			'success' => 0,
			'redirect' => '',
			'bericht' => '',
			'id' => 0,
		];

		$query = Flight::db()->query("INSERT INTO groepen (naam) VALUES('')");
		if (!$query) {
			$json['bericht'] = Flight::db()->error;
		} else {
			$json['id'] = Flight::db()->insert_id;
			$json['success'] = 1;
		}

		echo json_encode($json);
	}

	public function ajax_groep_verwijderen() {
		$json = [
			'success' => 0,
			'redirect' => '',
			'bericht' => '',
		];

		if (isset($_POST['id']) && is_numeric($_POST['id'])) {
			Flight::db()->query("DELETE FROM groepen WHERE id=" . $_POST['id']);
			Flight::db()->query("DELETE FROM model_groepen WHERE id_groep=" . $_POST['id']);

			$json['success'] = 1;
		}

		echo json_encode($json);
	}

	public function ajax_model_crop() {
		ini_set('memory_limit', '-1');

		if (isset($_POST['id']) && is_numeric($_POST['id'])) {
			$id = $_POST['id'];
			$model_id = $_POST['model_id'];
            $src_domain = $_POST['src_domain'];
            $img = $src_domain ? (EXTERNAL_IMAGES_SRC . '/') : '';
			$img .= "models/" . $model_id . '/original/' . $id . '.jpg';
			$img_x = $_POST['img_x'];
			$img_y = $_POST['img_y'];

			$x = $_POST['x'];
			$y = $_POST['y'];

			$h = $_POST['h'];
			$w = $_POST['w'];

			$originele_afmetingen = getimagesize($img);

            if ($originele_afmetingen[0] > $img_x) {
				$ratio_vermenigvuldigen = $originele_afmetingen[0] / $img_x;
				$x = $x * $ratio_vermenigvuldigen;
				$y = $y * $ratio_vermenigvuldigen;
				$h = $h * $ratio_vermenigvuldigen;
				$w = $w * $ratio_vermenigvuldigen;
			}

			$img_r = imagecreatefromjpeg($img);
			$dst_r = ImageCreateTrueColor(228, 350);
			$dst_r_groot = ImageCreateTrueColor($w, $h);

			imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, 228, 350, $w, $h);
			imagecopyresampled($dst_r_groot, $img_r, 0, 0, $x, $y, $w, $h, $w, $h);

			if ($w > 456 && $h > 700) {
				$photoMiddle = ImageCreateTrueColor(456, 700);
				imagecopyresampled($photoMiddle, $img_r, 0, 0, $x, $y, 456, 700, $w, $h);
			}

			$imagePrev = (new Repository_Image())->findWithMaxOrder(new Entity_Model($model_id));

            if (!is_null($imagePrev)) {
                $order = $imagePrev->getOrder();
                $order++;
            } else {
                $order = 0;
            }

            $image = (new Entity_Image())
                ->setModel(new Entity_Model($model_id))
                ->setOrder($order)
                ->setOnline(1)
                ->setPdf(1)
            ;

            $image->create();
			@mkdir("models/" . $model_id . "/website/");
			@mkdir("models/" . $model_id . "/website/thumbs/");
			@mkdir("models/" . $model_id . "/website/middle/");
			@mkdir("models/" . $model_id . "/website/big/");

			imagejpeg($dst_r, "models/" . $model_id . "/website/thumbs/" . $image->getId() . ".jpg", 100);
			imagejpeg($dst_r_groot, "models/" . $model_id . "/website/big/" . $image->getId() . ".jpg", 100);

			if (isset($photoMiddle)) {
				imagejpeg($photoMiddle, "models/" . $model_id . "/website/middle/" . $image->getId() . ".jpg", 100);
			}

			echo ('<script type="text/javascript">parent.closeCrop(' . $model_id . ');</script>');
		} else {
			echo ("error");
		}
	}

	public function ajax_verander_foto() {
		$json = array(
			'success' => 0,
			'bericht' => '',
		);

		if (
			isset($_POST['id']) &&
			is_numeric($_POST['id']) &&
			isset($_POST['soort']) &&
			($_POST['soort'] == 'pdf' || $_POST['soort'] == 'online') &&
			isset($_POST['waarde']) &&
			($_POST['waarde'] == 0 || $_POST['waarde'] == 1)
		) {
			$id = $_POST['id'];
			$soort = $_POST['soort'];
			$waarde = $_POST['waarde'];

			$query = Flight::db()->query("
                UPDATE model_site_images
                SET " . $soort . "=" . $waarde . "
                WHERE id = " . $id
			);

			if (!$query) {
				$json['bericht'] = Flight::db()->error;
			} else {
				$json['success'] = 1;
			}
		}

		echo json_encode($json);
	}

	public function ajax_videos() {
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			echo cms_model_video($_GET['id']);
		}
	}

	public function ajax_video_toevoegen() {
		$json = array(
			'success' => 0,
			'bericht' => '',
		);

		if (isset($_POST['id']) && is_numeric($_POST['id']) && isset($_POST['code'])) {
			$id = Flight::db()->real_escape_string($_POST['id']);
			$code = Flight::db()->real_escape_string($_POST['code']);
			if (preg_match('/vimeo/ui', $code)) {
				$source = 'vimeo';
				$host = '//player.vimeo.com/video/';
			} elseif (preg_match('/youtube/ui', $code)) {
				$source = 'youtube';
				$host = 'https://www.youtube.com/embed/';
			} else {
				$source = 'youtube';
				$host = 'https://www.youtube.com/embed/';
			}

			$origin = $code;
			$code = preg_replace('/.+v=/ui', '', $code);
			$code = preg_replace('/.+\//ui', '', $code);

			$query = Flight::db()->query("
                INSERT INTO model_videos
                (model_id, code, timestamp,host,source,original_link)
                VALUES(" . $id . ",
                       '" . $code . "',
                       now(),'" . $host . "','" . $source . "','" . $origin . "'
                )
            ");

			if (!$query) {
				$json['bericht'] = Flight::db()->error;
			} else {
				$json['success'] = 1;
			}
		}

		echo json_encode($json);
	}

	public function ajax_model_verwijderen() {
		if (isset($_POST['id']) && is_numeric($_POST['id'])) {
			$json = array(
				'success' => 1,
				'bericht' => '',
			);

			$id = $_POST['id'];

			$query = Flight::db()->query("SELECT code FROM model WHERE model_id=" . $id)->fetch_array();
			$code = $query['code'];

			if (!empty($code)) {
				Flight::db()->query("DELETE FROM model WHERE model_id=" . $id);
				Flight::db()->query("DELETE FROM model_groepen WHERE id_model=" . $id);
				Flight::db()->query("DELETE FROM model_images WHERE id_model=" . $id);
				Flight::db()->query("DELETE FROM model_site_images WHERE id_model=" . $id);
				Flight::db()->query("DELETE FROM model_videos WHERE model_id=" . $id);
				Flight::db()->query("DELETE FROM modelcategory WHERE model_id=" . $id);
				Flight::db()->query("DELETE FROM _log WHERE id_model=" . $id);

				deleteDirectory('models_onsite/' . $code);
				deleteDirectory('models/' . $code);
			}

			echo json_encode($json);
		}
	}

	public function selecties() {

		$emails = [];
		$query = Flight::db()->query("SELECT * FROM emails ORDER BY titel");

		while ($r = $query->fetch_array()) {
			$emails[$r['id']] = $r;
		}

        $this->smarty->assign('emails', $emails);

		$selecties = [];
		$query = Flight::db()->query("SELECT * FROM selecties WHERE NOT id IN ( SELECT id FROM selecties WHERE selection_type='user_selection' ) OR selection_type='cms_selection' ORDER BY creation_date DESC");

		while ($r = $query->fetch_array()) {
			$selecties[] = $r;
		}

        $this->smarty->assign('selecties', $selecties);

		if (!empty($_GET['selection'])) {
            $this->smarty->assign('currentSelection', $this->controller->getSelectionByCode($_GET['selection'])[0]);
		}

		$userSelections = $this->controller->getSelectionsByType('user_selection');
		$selections = [];

		foreach ($userSelections as $userSelection) {
			$selection = $userSelection;
			$selection['user'] = $this->controller->getUserBySelection(['selection_id' => $userSelection['id']]);
			$selections[] = $selection;
		}

        $this->smarty->assign('user_selecties', $selections);
        $this->smarty->assign('include_tabs', 'cms/models/_tabs.tpl');
        $this->smarty->assign('hoofdmenu_actief', 'selections');
        $this->smarty->assign('tab_active', 'selections');
        $this->smarty->assign('is_selection', '1');
        $this->smarty->assign('emailsFrom', $this->entityFactory->fromEmail()->findAllAsArray());
        $this->smarty->assign('include', 'cms/models/lijst.tpl');
        $this->smarty->display('templates/cms/index.tpl');
	}

	public function booker_list()
    {
		$clients = [];
        $client_query = Flight::db()->query("SELECT `id`, `company_name` FROM `clients` WHERE is_archive = 0 ORDER BY `company_name` ASC ");
        while ($row = $client_query->fetch_assoc()) {
            array_push($clients, $row);
        }
        $this->smarty->assign('include_tabs', 'cms/models/_tabs.tpl');
		$this->smarty->assign('hoofdmenu_actief', 'selections');
        $this->smarty->assign('tab_active', 'booker_list');
		$this->smarty->assign('clients', $clients);
        $this->smarty->assign('include', 'cms/models/booker_list.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }

	public function client_list()
    {	
        $this->smarty->assign('include_tabs', 'cms/models/_tabs.tpl');
        $this->smarty->assign('tab_active', 'client_list');
        $this->smarty->assign('include', 'cms/models/client_list.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }

	public function selection_ajax()
	{	
		$selection_ids = [];
		$selections = [];
        $selection_id_query = Flight::db()->query("SELECT `selection_id` FROM `project_selections` WHERE `client_id` = " . Flight::db()->real_escape_string($_GET['client_id']) . " AND `project_id` = " . Flight::db()->real_escape_string($_GET['project_id']) );
        while ($row = $selection_id_query->fetch_assoc()) {
            array_push($selection_ids, $row["selection_id"]);
        }
        $selection_query = Flight::db()->query("SELECT `id`, `name` FROM `selecties` WHERE id IN ( " . implode(",", $selection_ids) . " )");
        while ($row = $selection_query->fetch_assoc()) {
            array_push($selections, $row);
        }
        echo json_encode($selections);
	}

	public function selection_by_project_ajax()
	{
		$selection_ids = [];
		$selections = [];
        $selection_id_query = Flight::db()->query("SELECT `selection_id` FROM `project_selections` WHERE `client_id` = " . Flight::db()->real_escape_string($_GET['client_id']) . " AND `project_id` = " . Flight::db()->real_escape_string($_GET['project_id']) );
        while ($row = $selection_id_query->fetch_assoc()) {
            array_push($selection_ids, $row["selection_id"]);
        }
		$selection_query = Flight::db()->query("SELECT selecties.code, selecties.creation_date, selecties.id, selecties.name, (select COUNT(id_model) from selecties_models where selecties_models.id_selectie = selecties.id ) as modal_count FROM `selecties` WHERE id in (" . implode(",", $selection_ids) . ")");
        while ($row = $selection_query->fetch_assoc()) {
            array_push($selections, $row);
        }
        echo json_encode($selections);
	}
}

