<?php



use Doctrine\ORM\EntityManagerInterface;

use CastingteamBundle\Entity\Repository\FactoryInterface;

use CastingteamBundle\Entity\Repository\Factory as RepositoryFactory;

use CastingteamBundle\Entity;



class Ajax

{

	/**

	 * @var DBController

	 */

	private $controller;



	/**

	 * @var Core_Account

	 */

	private $account;



	/**

	 * @var Smarty

	 */

	private $smarty;



	/**

	 * @var EntityManagerInterface

	 */

	protected $entityManager;



	/**

	 * @var FactoryInterface

	 */

	protected $entityFactory;



	/**

	 * @param Core_Account $account

	 */

	public function __construct(Core_Account $account)

	{

		$this->account = $account;

		$this->controller = DBController::getInstance();

		$this->smarty = Flight::smarty();

		$this->entityManager = Flight::get('entityManager');

		$this->entityFactory = new RepositoryFactory($this->entityManager);

	}



	public function get_model()

	{

		if (

			isset($_POST['model_id']) and

			!empty($_POST['model_id'])

		) {

			if (Flight::bg()->checkIsLogged()) {

				$access = 0;

			} else {

				$access = 1;

			}



			$model = $this->controller->getModelById($_POST['model_id'], $access);

			$model = ['data' => $model];



			if (Flight::bg()->checkIsLogged()) {

				$selections = $this->controller->getUserSelections($_SESSION[SESSION_NAME_SITE_LOGIN]);



				if ($selections) {

					$models_from_selctions = [];



					foreach ($selections as $key => $selection) {

						foreach ($selection['models'] as $value) {



							if ($value['id_model'] == $_POST['model_id']) {

								$model['data']['isSelected'] = true;

							}

						}

					}

				} else {

					$model['data']['isSelected'] = false;

				}

			} else {



				if (

					isset($_SESSION['SELECTIONS']) and

					!empty($_SESSION['SELECTIONS'])

				) {

					$selections = $_SESSION['SELECTIONS'];



					foreach ($selections as $selection) {

						$models = $this->controller->getModelsBySelection($selection['id']);



						foreach ($models as $key => $value) {

							if ($value['id_model'] == $_POST['model_id']) {

								$model['data']['isSelected'] = true;

							}

						}

					}

				} else {

					$model['data']['isSelected'] = false;

				}

			}



			if (!isset($model['data']['isSelected'])) {

				$model['data']['isSelected'] = false;

			}



			$model_ajax = json_encode($model);

			echo $model_ajax;

		}

	}



	public function get_models()

	{

		if (isset($_POST['cms']) and !empty($_POST['cms'])) {

			$data['cms'] = $_POST['cms'];

		}



		if (isset($_POST['sex']) and !empty($_POST['sex'])) {

			$data['sex'] = $_POST['sex'];

		}



		if (isset($_POST['age_exactly']) and !empty($_POST['age_exactly'])) {

			$data['age_exactly'] = $_POST['age_exactly'];

		}



		if (isset($_POST['lengte_exactly']) and !empty($_POST['lengte_exactly'])) {

			$data['lengte_exactly'] = $_POST['lengte_exactly'];

		}



		if (isset($_POST['int_maat']) and !empty($_POST['int_maat'])) {

			$data['int_maat'] = $_POST['int_maat'];

		}



		if (isset($_POST['accepted']) and !empty($_POST['accepted'])) {

			$data['accepted'] = $_POST['accepted'];

		}



		if (isset($_POST['cat']) and !empty($_POST['cat'])) {

			$data['cat'] = $_POST['cat'];

		}



		if (isset($_POST['length']) and !empty($_POST['length'])) {

			$data['length'] = $_POST['length'];

		}



		if (isset($_POST['from']) and !empty($_POST['from'])) {

			$data['from'] = $_POST['from'];

		} else {

			$data['from'] = 0;

		}



		if (isset($_POST['to']) and !empty($_POST['to'])) {

			$data['to'] = $_POST['to'];

		} else {

			$data['to'] = 20;

		}



		if (isset($_POST['age']) and !empty($_POST['age'])) {

			$data['age'] = $_POST['age'];

		}



		if (isset($_POST['sorted_by']) and !empty($_POST['sorted_by'])) {

			$data['sorted_by'] = $_POST['sorted_by'];

		} else {

			$data['sorted_by'] = 'new';

		}



		if (isset($_POST['category']) and !empty($_POST['category'])) {

			$data['category'] = $_POST['category'];

		}



		if (isset($_POST['bust']) and !empty($_POST['bust'])) {

			$data['bust'] = $_POST['bust'];

		}



		if (isset($_POST['waist']) and !empty($_POST['waist'])) {

			$data['waist'] = $_POST['waist'];

		}



		if (isset($_POST['hips']) and !empty($_POST['hips'])) {

			$data['hips'] = $_POST['hips'];

		}



		if (isset($_POST['jeans_size']) and !empty($_POST['jeans_size'])) {

			$data['jeans_size'] = $_POST['jeans_size'];

		}



		if (isset($_POST['clothing_size']) and !empty($_POST['clothing_size'])) {

			$data['clothing_size'] = $_POST['clothing_size'];

		}



		if (isset($_POST['shoe_size']) and !empty($_POST['shoe_size'])) {

			$data['shoe_size'] = $_POST['shoe_size'];

		}



		if (isset($_POST['costum_size']) and !empty($_POST['costum_size'])) {

			$data['costum_size'] = $_POST['costum_size'];

		}



		if (isset($_POST['cup_size']) and !empty($_POST['cup_size'])) {

			$data['cup_size'] = $_POST['cup_size'];

		}



		if (isset($_POST['specific']) and !empty($_POST['specific'])) {

			$data['specific'] = $_POST['specific'];

		}



		if (isset($_POST['specific_cms']) and !empty($_POST['specific_cms'])) {

			$data['specific_cms'] = $_POST['specific_cms'];

		}



		if (isset($_POST['skin_filter']) and !empty($_POST['skin_filter'])) {

			$data['skin_filter'] = $_POST['skin_filter'];

		}



		if (isset($_POST['hair_filter']) and !empty($_POST['hair_filter'])) {

			$data['hair_filter'] = $_POST['hair_filter'];

		}



		if (isset($_POST['lichaam_filter']) and !empty($_POST['lichaam_filter'])) {

			$data['lichaam_filter'] = $_POST['lichaam_filter'];

		}



		if (isset($_POST['versiering_filter']) and !empty($_POST['versiering_filter'])) {

			$data['versiering_filter'] = $_POST['versiering_filter'];

		}



		if (isset($_POST['begroeiing_filter']) and !empty($_POST['begroeiing_filter'])) {

			$data['begroeiing_filter'] = $_POST['begroeiing_filter'];

		}



		if (isset($_POST['kleur_ogen_filter']) and !empty($_POST['kleur_ogen_filter'])) {

			$data['kleur_ogen_filter'] = $_POST['kleur_ogen_filter'];

		}



		if (isset($_POST['hair_color_filter']) and !empty($_POST['hair_color_filter'])) {

			$data['hair_color_filter'] = $_POST['hair_color_filter'];

		}



		if (isset($_POST['hair_length_filter']) and !empty($_POST['hair_length_filter'])) {

			$data['hair_length_filter'] = $_POST['hair_length_filter'];

		}



		if (isset($_POST['language_filter']) and !empty($_POST['language_filter'])) {

			$data['language_filter'] = $_POST['language_filter'];

		}



		if (!empty($_POST['native_language_filter'])) {

			$data['native_language'] = $_POST['native_language_filter'];

		}



		if (isset($_POST['selection']) and !empty($_POST['selection'])) {

			$data['selection'] = $_POST['selection'];

		}



		if (isset($_POST['selection_cms']) and !empty($_POST['selection_cms'])) {

			$data['selection_cms'] = $_POST['selection_cms'];

		}



		if (isset($_POST['search']) and !empty($_POST['search'])) {

			$data['search'] = trim($_POST['search'], ' /#$%^&*()?!@');

		}



		if (isset($_POST['basic_search']) and !empty($_POST['basic_search'])) {

			$data['basic_search'] = trim($_POST['basic_search'], ' /#$%^&*()?!@');

		}



		if (isset($_POST['cms_search']) and !empty($_POST['cms_search'])) {

			$data['cms_search'] = trim($_POST['cms_search'], ' /#$%^&*()?!@');

		}



		if (isset($_POST['talent_search']) and !empty($_POST['talent_search'])) {

			$data['talent_search'] = trim($_POST['talent_search'], ' /#$%^&*()?!@');

		}



		if (isset($_POST['age_end']) and !empty($_POST['age_end'])) {

			$data['age_end'] = $_POST['age_end'];

		}



		if (isset($_POST['age_start']) and !empty($_POST['age_start'])) {

			$data['age_start'] = $_POST['age_start'];

		}



		if (isset($_POST['bust_end']) and !empty($_POST['bust_end'])) {

			$data['bust_end'] = $_POST['bust_end'];

		}



		if (isset($_POST['bust_start']) and !empty($_POST['bust_start'])) {

			$data['bust_start'] = $_POST['bust_start'];

		}



		if (isset($_POST['clothing_size_end']) and !empty($_POST['clothing_size_end'])) {

			$data['clothing_size_end'] = $_POST['clothing_size_end'];

		}



		if (isset($_POST['clothing_size_start']) and !empty($_POST['clothing_size_start'])) {

			$data['clothing_size_start'] = $_POST['clothing_size_start'];

		}



		if (isset($_POST['costum_size_end']) and !empty($_POST['costum_size_end'])) {

			$data['costum_size_end'] = $_POST['costum_size_end'];

		}



		if (isset($_POST['cup_size_start']) and !empty($_POST['cup_size_start'])) {

			$data['cup_size_start'] = $_POST['cup_size_start'];

		}



		if (isset($_POST['cup_size_end']) and !empty($_POST['cup_size_end'])) {

			$data['cup_size_end'] = $_POST['cup_size_end'];

		}



		if (!empty($_POST['cup_size_number_start'])) {

			$data['cup_size_number_start'] = $_POST['cup_size_number_start'];

		}



		if (!empty($_POST['cup_size_number_end'])) {

			$data['cup_size_number_end'] = $_POST['cup_size_number_end'];

		}



		if (isset($_POST['cup_letter']) and !empty($_POST['cup_letter'])) {

			$data['cup_letter'] = $_POST['cup_letter'];

		}



		if (isset($_POST['hips_end']) and !empty($_POST['hips_end'])) {

			$data['hips_end'] = $_POST['hips_end'];

		}



		if (isset($_POST['hips_start']) and !empty($_POST['hips_start'])) {

			$data['hips_start'] = $_POST['hips_start'];

		}



		if (isset($_POST['jeans_size_end']) and !empty($_POST['jeans_size_end'])) {

			$data['jeans_size_end'] = $_POST['jeans_size_end'];

		}



		if (isset($_POST['jeans_size_start']) and !empty($_POST['jeans_size_start'])) {

			$data['jeans_size_start'] = $_POST['jeans_size_start'];

		}



		if (isset($_POST['kinder_end']) and !empty($_POST['kinder_end'])) {

			$data['kinder_end'] = $_POST['kinder_end'];

		}



		if (isset($_POST['group_id']) and !empty($_POST['group_id'])) {

			$data['group_id'] = $_POST['group_id'];

		}



		if (isset($_POST['kinder_start']) and !empty($_POST['kinder_start'])) {

			$data['kinder_start'] = $_POST['kinder_start'];

		}



		if (isset($_POST['lengte_end']) and !empty($_POST['lengte_end'])) {

			$data['lengte_end'] = $_POST['lengte_end'];

		}



		if (isset($_POST['lengte_start']) and !empty($_POST['lengte_start'])) {

			$data['lengte_start'] = $_POST['lengte_start'];

		}



		if (isset($_POST['shoe_size_end']) and !empty($_POST['shoe_size_end'])) {

			$data['shoe_size_end'] = $_POST['shoe_size_end'];

		}



		if (isset($_POST['shoe_size_start']) and !empty($_POST['shoe_size_start'])) {

			$data['shoe_size_start'] = $_POST['shoe_size_start'];

		}



		if (isset($_POST['waist_end']) and !empty($_POST['waist_end'])) {

			$data['waist_end'] = $_POST['waist_end'];

		}



		if (isset($_POST['waist_start']) and !empty($_POST['waist_start'])) {

			$data['waist_start'] = $_POST['waist_start'];

		}



		if (isset($_POST['weight_end']) and !empty($_POST['weight_end'])) {

			$data['weight_end'] = $_POST['weight_end'];

		}



		if (isset($_POST['weight_start']) and !empty($_POST['weight_start'])) {

			$data['weight_start'] = $_POST['weight_start'];

		}



		if (!empty($_POST['id_end'])) {

			$data['id_end'] = $_POST['id_end'];

		}



		if (!empty($_POST['id_start'])) {

			$data['id_start'] = $_POST['id_start'];

		}



		if (!empty($_POST['country'])) {

			$data['country'] = $_POST['country'];

		}



		$models = $this->controller->getModelsWithFilters($data);

		$models = array_map(

			function ($model) {

				$this->smarty->assign('id', $model['model_id']);

				$model['email'] = $this->resolveEmail(array_key_exists('email', $model) ? $model['email'] : '');



				return $model;

			},

			$models

		);



		$models = ['data' => $models];

		$models_ajax = json_encode($models);

		echo $models_ajax;

	}



	public function add_selection_group()

	{

		if (!empty($_POST['selection_models'])) {

			$filters = json_decode($_POST['selection_models']);

			$data['from'] = 0;

			$data['to'] = 100000;



			foreach ($filters as $key => $filter) {

				if (!empty($filter)) {

					$data[$key] = $filter;

				}

			}



			if (!empty($data['nativeLanguageFilter'])) {

				$data['native_language'] = $data['nativeLanguageFilter'];

				unset($data['nativeLanguageFilter']);

			}



			$models = $this->controller->getModelsWithFilters($data);



			if (empty($_POST['naam']) && !empty($_POST['selection_id'])) {

				$selectionId = $_POST['selection_id'];

			} elseif (!empty($_POST['naam'])) {

				$selectionId = $this->controller->createSelection([

					'selection_type' => 'cms_selection',

					'name' => Flight::db()->real_escape_string($_POST['naam'])

				]);



				$this->assign_client_and_project(

					Flight::db()->real_escape_string($_POST['client_id']),

					Flight::db()->real_escape_string($_POST['project_id']),

					$selectionId

				);

			} else {

				if (!isset($_POST['naam']) || empty($_POST['naam'])) {

					$json['bericht'] = "U heeft geen naam ingegeven";

				} else {

					$json['bericht'] = "Deze selectie bevat geen modellen";

				}

			}



			if (isset($selectionId)) {

				foreach ($models as $model) {

					if (array_key_exists('model_id', $model)) {

						try {

							$this->controller->addModelToSelection([

								'model_id' => $model['model_id'],

								'selection_id' => $selectionId

							]);



							$this->assign_client_and_project(

								Flight::db()->real_escape_string($_POST['client_id']),

								Flight::db()->real_escape_string($_POST['project_id']),

								$selectionId

							);

						} catch (Exception $e) {

							Logger_Error::create()->error(sprintf('%s: %s', get_class($e), $e->getMessage()), []);



							continue;

						}

					}

				}



				$json['success'] = 1;

				$json['bericht'] = 'none';

				$json['function'] = 'close_popup()';

			} else {

				$json['success'] = 0;

			}



			echo json_encode($json);

		}

	}



	public function assign_client_and_project($client_id, $project_id, $selection_id)

	{



		$get_project_selection = Flight::db()->query("SELECT `id` FROM `project_selections` WHERE 

							`client_id` = " . $client_id . " AND 

							`project_id` = " . $project_id . " AND

							`selection_id` = " . $selection_id);

		$project_selection = $get_project_selection->fetch_assoc();

		if (empty($project_selection)) {

			return Flight::db()->query("INSERT INTO `project_selections`

					(

						`client_id`, 

						`project_id`, 

						`selection_id`

					) 

					VALUES 

					(

						" . $client_id . ",

						" . $project_id . ",

						" . $selection_id . "

					)");

		}

		return true;

	}



	public function add_model_to_selection()

	{

		if (isset($_POST['model_id']) and !empty($_POST['model_id'])) {

			if (isset($_POST['selection_type'])) {

				if ($_POST['selection_type'] == 'cms_selection') {

					if (isset($_POST['selection_id']) and !empty($_POST['selection_id'])) {

						$data['selection_id'] = $_POST['selection_id'];

						$data['model_id'] = $_POST['model_id'];

						$result = $this->controller->addModelToSelection($data);



						if (!$result) {

							$json = [

								'error' => true,

								'message' => 'cannot add model to selection',

								'function' => 'closePoppupSelection()',

							];



							echo json_encode($json);

						} else {



							$this->assign_client_and_project(

								Flight::db()->real_escape_string($_POST['client_id']),

								Flight::db()->real_escape_string($_POST['project_id']),

								$_POST['selection_id']

							);



							$json = [

								'error' => false,

								'message' => 'model have been added to selection',

								'bericht' => 'none',

								'function' => 'closePoppupSelection()',

							];



							echo json_encode($json);

						}

					} elseif (isset($_POST['selection_title']) and !empty($_POST['selection_title'])) {



						$data['name'] = $_POST['selection_title'];

						$data['model_id'] = $_POST['model_id'];

						$data['selection_type'] = $_POST['selection_type'];



						$result = $this->controller->createSelection($data);



						if (!$result) {



							$json = [

								'error' => true,

								'message' => 'cannot create selection',

							];



							echo json_encode($json);

						} else {



							$new_selection = [

								"id" => $result,

								"name" => $data['name']

							];



							$data['selection_id'] = $result;

							$result = $this->controller->addModelToSelection($data);

							$this->assign_client_and_project(

								Flight::db()->real_escape_string($_POST['client_id']),

								Flight::db()->real_escape_string($_POST['project_id']),

								$data['selection_id']

							);



							if (!$result) {



								$json = [

									'error' => true,

									'message' => 'cannot add model to selection',

									'function' => 'closePoppupSelection()',

								];



								echo json_encode($json);

							} else {



								$json = [

									'error' => false,

									'message' => 'model have been added to selection',

									'bericht' => 'none',

									'function' => 'closePoppupSelection()',

									'new_selection' => $new_selection,

								];



								echo json_encode($json);

							}

						}

					}

				}

			} else {



				if (Flight::bg()->checkIsLogged()) {



					if (

						isset($_POST['selection_id']) &&

						!empty($_POST['selection_id']) &&

						preg_replace('/\D/ui', '', $_POST['selection_id']) > 0

					) {

						$data['selection_id'] = $_POST['selection_id'];

						$data['model_id'] = $_POST['model_id'];

						$result = $this->controller->addModelToSelection($data);

						$this->assign_client_and_project(

							Flight::db()->real_escape_string($_POST['client_id']),

							Flight::db()->real_escape_string($_POST['project_id']),

							$data['selection_id']

						);



						if (!$result) {

							$json['data'] = array('error' => 'cannot add model to selection');

							echo json_encode($json);

						} else {

							$result = $this->controller->getUserSelections($_SESSION[SESSION_NAME_SITE_LOGIN]);

							$json['data'] = $result;

							$json['count'] = $this->getSelectionModelsCount();

							echo json_encode($json);

						}

					} elseif (isset($_POST['selection_title']) and !empty($_POST['selection_title'])) {



						$data['name'] = $_POST['selection_title'];

						$data['model_id'] = $_POST['model_id'];

						$result = $this->controller->createSelection($data);



						if (!$result) {

							$json['data'] = array('error' => 'cannot create selection');

							echo json_encode($json);

						} else {



							$this->assign_client_and_project(

								Flight::db()->real_escape_string($_POST['client_id']),

								Flight::db()->real_escape_string($_POST['project_id']),

								$result

							);



							$data['selection_id'] = $result;

							$data['user_id'] = $_SESSION[SESSION_NAME_SITE_LOGIN];

							$result = $this->controller->addModelToSelection($data);

							$result = $this->controller->addSelectionToUser($data);



							if (!$result) {

								$json['data'] = [

									'error' => true,

									'message' => 'cannot add model to selection'

								];

								echo json_encode($json);

							} else {

								$result = $this->controller->getUserSelections($_SESSION[SESSION_NAME_SITE_LOGIN]);

								$json['data'] = $result;

								$json['count'] = $this->getSelectionModelsCount();

								echo json_encode($json);

							}

						}

					}

				} else {



					if (isset($_POST['selection_id']) and !empty($_POST['selection_id'])) {

						$data['selection_id'] = $_POST['selection_id'];

						$data['model_id'] = $_POST['model_id'];

						$result = $this->controller->addModelToSelection($data);



						$this->assign_client_and_project(

							Flight::db()->real_escape_string($_POST['client_id']),

							Flight::db()->real_escape_string($_POST['project_id']),

							$_POST['selection_id']

						);



						if (!$result) {

							$json['data'] = array('error' => 'cannot add model to selection');

							echo json_encode($json);

						} else {

							$result = $_SESSION['SELECTIONS'];

							$json['data'] = $result;

							$json['count'] = $this->getSelectionModelsCount();

							echo json_encode($json);

						}

					} elseif (isset($_POST['selection_title']) and !empty($_POST['selection_title'])) {

						$data['name'] = $_POST['selection_title'];

						$data['model_id'] = $_POST['model_id'];

						$result = $this->controller->createSelection($data);



						if (!$result) {

							$json['data'] = array('error' => 'cannot create selection');

							echo json_encode($json);

						} else {

							$data['selection_id'] = $result;

							$result = $this->controller->addModelToSelection($data);



							$this->assign_client_and_project(

								Flight::db()->real_escape_string($_POST['client_id']),

								Flight::db()->real_escape_string($_POST['project_id']),

								$_POST['selection_id']

							);



							$_SESSION['SELECTIONS'][] = [

								'id' => $data['selection_id'],

								'name' => $data['name'],

								'creation_date' => strftime("%A %e %B %Y"),

							];



							if (!$result) {

								$json['data'] = array('error' => 'cannot add model to selection');

								echo json_encode($json);

							} else {

								$result = $_SESSION['SELECTIONS'];

								$json['data'] = $result;

								$json['count'] = $this->getSelectionModelsCount();

								echo json_encode($json);

							}

						}

					}

				}

			}

		}

	}



	public function delete_selection()

	{

		if (

			Flight::bg()->checkIsLogged() ||

			Flight::bg()->checkLoggedInCms()

		) {

			if (isset($_POST['selection_id']) and !empty($_POST['selection_id'])) {

				$data['selection_id'] = $_POST['selection_id'];



				if (isset($_SESSION[SESSION_NAME_SITE_LOGIN])) {

					$data['user_id'] = $_SESSION[SESSION_NAME_SITE_LOGIN];

				}



				$result = $this->controller->deleteSelection($data);



				if ($result && isset($data['user_id'])) {

					$result = $this->controller->deleteSelectionFromUser($data);



					if ($result) {



						$result = $this->controller->getUserSelections($_SESSION[SESSION_NAME_SITE_LOGIN]);



						$json['data'] = $result;



						echo json_encode($json);

					} else {



						$json['data'] = array('error' => 'cannot delete selection');



						echo json_encode($json);

					}

				} elseif ($result) {

					$json['data'] = ['message' => 'selection deleted'];



					echo json_encode($json);

				} else {



					$json['data'] = array('error' => 'cannot delete selection');



					echo json_encode($json);

				}

			}

		}

	}



	public function get_groups()

	{

		$groups = $this->controller->getAllGroups();

		$groups = ['data' => $groups];

		$groups_ajax = json_encode($groups);

		echo $groups_ajax;

	}



	public function add_group()

	{



		if (Flight::bg()->checkLoggedInCms()) {

			if (isset($_POST['name']) and !empty($_POST['name'])) {

				$name = trim($_POST['name'], ' !@#$%^&*()"?/');

				$result = $this->controller->createGroup(['name' => $name]);



				if ($result) {

					$json['data'] = array('error' => false, 'message' => 'success');

					echo json_encode($json);

				} else {

					$json['data'] = array('error' => true, 'message' => 'cannot add group');

					echo json_encode($json);

				}

			}

		}

	}



	public function delete_group()

	{



		if (Flight::bg()->checkLoggedInCms()) {



			if (isset($_POST['id']) and !empty($_POST['id'])) {

				$group_id = preg_replace('/\D/ui', '', $_POST['id']);

				$result = $this->controller->deleteGroupById($group_id);



				if ($result) {

					$json['data'] = array('error' => false, 'message' => 'success');

					echo json_encode($json);

				} else {

					$json['data'] = array('error' => true, 'message' => 'cannot remove group');

					echo json_encode($json);

				}

			}

		}

	}



	public function edit_group()

	{

		if (Flight::bg()->checkLoggedInCms()) {

			if (

				isset($_POST['id']) &&

				!empty($_POST['id']) &&

				isset($_POST['name']) &&

				!empty($_POST['name'])

			) {

				$name = trim($_POST['name'], ' !@#$%^&*()"?/');

				$group_id = preg_replace('/\D/ui', '', $_POST['id']);

				$result = $this->controller->updateGroup($group_id, array('name' => $name, 'id' => $group_id));



				if ($result) {

					$json['data'] = array('error' => false, 'message' => 'success');

					echo json_encode($json);

				} else {

					$json['data'] = array('error' => true, 'message' => 'cannot edit group');

					echo json_encode($json);

				}

			}

		}

	}



	public function get_model_template_by_id()

	{

		if (

			isset($_POST['model_id']) and

			!empty($_POST['model_id'])

		) {

			$id = Flight::db()->real_escape_string($_POST['model_id']);

			$model = Flight::db()->query(

				"

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


			$age = 0;
			if(!empty($model['geboortedatum'])){
				$dateOfBirth = $model['geboortedatum'];
				$today = date("Y-m-d");
			    $diff = date_diff(date_create($dateOfBirth), date_create($today));
			    //echo 'Age is '.$diff->format('%y');	 exit;
				$age = $diff->format('%y');
			}
			$model['age'] = $age;
			$this->smarty->assign('model', $model);

			$leeftijd = (date("md", date("U", mktime(0, 0, 0, $model['check_maand'], $model['check_dag'], $model['check_jaar']))) > date("md") ? ((date("Y") - $model['check_jaar']) - 1) : (date("Y") - $model['check_jaar']));

			$this->smarty->assign('leeftijd', $leeftijd);



			$groups = $this->controller->getRootGroups();

			$this->smarty->assign('groepen', $groups);



			$groepen_model = array();

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



			$nextModel = $this->controller->getNextModel(array('model_id' => $id));

			$previousModel = $this->controller->getPreviousModel(array('model_id' => $id));

			$isHomepageModel = $this->controller->isHomepageModel($id);



			if ($nextModel) {

				$this->smarty->assign('nextModel', $nextModel['model_id']);

			}



			if ($previousModel) {

				$this->smarty->assign('previousModel', $previousModel['model_id']);

			}



			$fotos = [];

			$query = Flight::db()->query("

                SELECT a.*,

                       DATE_FORMAT(timestamp, '%d/%m/%Y') AS datum

                FROM model_images AS a

                WHERE a.id_model = " . $id . "

                ORDER BY timestamp DESC

            ");



			while ($r = $query->fetch_array()) {

				//$fotos[$r['datum']][$r['id']] = 1;
                $fotos[$r['datum']][$r['id']] = $r['external'] ? EXTERNAL_IMAGES_SRC : '';;

			}



			$emails = [];

			$query = Flight::db()->query("SELECT * FROM emails ORDER BY titel");



			while ($r = $query->fetch_array()) {

				$emails[$r['id']] = $r;

			}



			$account = new Account_Admin(new Core_SessionHandler());



			/** @var Entity\Model $model */

			$model = $this->entityFactory->model()->findOneById($id);



			if (is_null($model)) {

				throw new Exception_DataNotFound();

			}



			$category = $this->entityFactory->category()->findOneByName('Bordermodels');

			$groups = $this->entityFactory->group()->findAllByModelAndCategory($category, $model);

			$images = $this->entityFactory->siteImage()->findAllByModel($model);



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

				$groupOrderedImages[$group->getId()] = $this->entityFactory->siteImage()->findAllByGroupAndModel($model, $group);

			}



			$this->smarty->assign('categoryGroups', $groups);

			$this->smarty->assign('siteImages', $images);

			$this->smarty->assign('groupOrderedImages', $groupOrderedImages);

			$this->smarty->assign('admin', $account->get()->toArray());

			$this->smarty->assign('countries', $this->controller->getCountries());

			$this->smarty->assign('pageType', 'poppup_page');

			$this->smarty->assign('isHomepageModel', $isHomepageModel);

			$this->smarty->assign('emails', $emails);

			$this->smarty->assign('fotos', $fotos);

			$this->smarty->assign('videohtml', cms_model_video($id));

			$this->smarty->assign('emailsFrom', $this->entityFactory->fromEmail()->findAllAsArray());

			$this->smarty->display('templates/cms/models/model_poppup.tpl');

		}

	}



	public function remove_model_from_group()

	{



		if (Flight::bg()->checkLoggedInCms()) {

			if (isset($_POST['group_id']) and !empty($_POST['group_id']) and isset($_POST['model_id']) and !empty($_POST['model_id'])) {

				$model_id = preg_replace('/\D/ui', '', $_POST['model_id']);

				$group_id = preg_replace('/\D/ui', '', $_POST['group_id']);

				$result = $this->controller->removeModelFromGroup($group_id, $model_id);



				if ($result) {

					$json['data'] = [

						'error' => false,

						'message' => 'success',

					];



					echo json_encode($json);

				} else {

					$json['data'] = [

						'error' => true,

						'message' => 'cannot edit group',

					];



					echo json_encode($json);

				}

			}

		}

	}



	public function add_filter_value_to_category()

	{



		if (Flight::bg()->checkLoggedInCms()) {



			if (isset($_POST['category_id']) and !empty($_POST['category_id']) and isset($_POST['filter_id']) and !empty($_POST['filter_id'])) {



				$data['category_id'] = $_POST['category_id'];

				$data['filter_id'] = $_POST['filter_id'];

				$data['value_id'] = $_POST['value_id'];

				$data['type'] = $_POST['type'];



				if (isset($_POST['active']) and !empty($_POST['active'])) {



					$data['active'] = $_POST['active'];

				} else {

					$data['active'] = 1;

				}



				$result = $this->controller->addValueToCategory($data);



				if ($result) {



					$json['data'] = array('message' => 'success');



					echo json_encode($json);

				} else {



					$json['data'] = array('error' => 'cannot add value');



					echo json_encode($json);

				}

			}

		}

	}



	public function delete_filter_value_from_category()

	{



		if (Flight::bg()->checkLoggedInCms()) {



			if (

				isset($_POST['category_id']) and

				!empty($_POST['category_id']) and

				isset($_POST['filter_id']) and

				!empty($_POST['filter_id'])

			) {



				$data['category_id'] = $_POST['category_id'];

				$data['filter_id'] = $_POST['filter_id'];

				$data['value_id'] = $_POST['value_id'];

				$data['type'] = $_POST['type'];

				$result = $this->controller->deleteValueFromCategory($data);



				if ($result) {

					$json['data'] = array('message' => 'success');

					echo json_encode($json);

				} else {

					$json['data'] = array('error' => 'cannot delete value');

					echo json_encode($json);

				}

			}

		}

	}



	public function get_main_categories_with_groups()

	{

		$result = $this->controller->getMainCategoriesWithGroups();

		$result = ['data' => $result];

		$result_ajax = json_encode($result);

		echo $result_ajax;

	}



	public function add_model_to_group()

	{

		if (Flight::bg()->checkLoggedInCms()) {

			if (isset($_POST['group_id']) and !empty($_POST['group_id']) and isset($_POST['model_id']) and !empty($_POST['model_id'])) {

				$model_id = preg_replace('/\D/ui', '', $_POST['model_id']);

				$group_id = preg_replace('/\D/ui', '', $_POST['group_id']);

				$result = $this->controller->addModelToGroup($group_id, $model_id);



				if ($result) {

					$json['data'] = ['message' => 'success'];

					echo json_encode($json);

				} else {

					$json['data'] = ['error' => 'cannot update group'];

					echo json_encode($json);

				}

			}

		}

	}



	public function add_filter_to_category()

	{



		if (Flight::bg()->checkLoggedInCms()) {



			if (

				isset($_POST['category_id']) and

				!empty($_POST['category_id']) and

				isset($_POST['filter_id']) and

				!empty($_POST['filter_id']) and

				isset($_POST['position']) and

				!empty($_POST['position'])

			) {

				$data['category_id'] = $_POST['category_id'];

				$data['filter_id'] = $_POST['filter_id'];

				$data['position'] = $_POST['position'];

				$data['active'] = $_POST['active'];

				$result = $this->controller->addFilterToCategory($data);



				if ($result) {

					$json['data'] = ['message' => 'success'];

					echo json_encode($json);

				} else {

					$json['data'] = ['error' => 'cannot bind filter with category'];

					echo json_encode($json);

				}

			} elseif (

				isset($_POST['category_id']) and

				!empty($_POST['category_id']) and

				isset($_POST['position']) and

				!empty($_POST['position'])

			) {

				$data['category_id'] = $_POST['category_id'];

				$data['position'] = $_POST['position'];

				$result = $this->controller->deleteFilterFromCategory($data);



				if ($result) {

					$json['data'] = ['message' => 'success'];

					echo json_encode($json);

				} else {

					$json['data'] = ['error' => 'cannot delete filter'];

					echo json_encode($json);

				}

			}

		}

	}



	public function add_vip_user()

	{



		if (

			!empty($_POST['name']) and

			!empty($_POST['email']) and

			!empty($_POST['company']) and

			!empty($_POST['sector']) and

			!empty($_POST['phone'])

		) {



			if (isset($_POST['name']) and !empty($_POST['name'])) {

				$data['name'] = htmlspecialchars($_POST['name']);

			}



			if (isset($_POST['email']) and !empty($_POST['email'])) {

				$data['email'] = htmlspecialchars($_POST['email']);

			}



			if (isset($_POST['surname']) and !empty($_POST['surname'])) {

				$data['surname'] = htmlspecialchars($_POST['surname']);

			}



			if (isset($_POST['password']) and !empty($_POST['password'])) {

				$data['password'] = md5(htmlspecialchars($_POST['password']));

				$data['approved'] = 0;

			} else {

				$data['approved'] = 1;

				$cms = true;

				$tempPassword = rand(1000, 9999);

				$data['password'] = md5(htmlspecialchars($tempPassword));

			}



			if (isset($_POST['company']) and !empty($_POST['company'])) {

				$data['company'] = htmlspecialchars($_POST['company']);

			}



			if (isset($_POST['sector']) and !empty($_POST['sector'])) {

				$data['sector'] = htmlspecialchars($_POST['sector']);

			}



			if (isset($_POST['phone']) and !empty($_POST['phone'])) {

				$data['phone'] = htmlspecialchars($_POST['phone']);

			}



			if (isset($_POST['city']) and !empty($_POST['city'])) {

				$data['city'] = htmlspecialchars($_POST['city']);

			}



			if (isset($_POST['country']) and !empty($_POST['country'])) {

				$data['country'] = htmlspecialchars($_POST['country']);

			}



			if (isset($_POST['postal']) and !empty($_POST['postal'])) {

				$data['postal'] = htmlspecialchars($_POST['postal']);

			}



			if (isset($_POST['remark']) and !empty($_POST['remark'])) {

				$data['remark'] = htmlspecialchars($_POST['remark']);

			}



			if (isset($_POST['address']) and !empty($_POST['address'])) {

				$data['address'] = htmlspecialchars($_POST['address']);

			}



			$data['access'] = 0;

			$result = $this->controller->registerUser($data);

			$id = Flight::db()->insert_id;



			if ($result) {

				if ($result === true) {

					$json['error'] = false;

					$json['data'] = array('message' => 'success');

				} else {

					$json['data'] = array('message' => $result);

					$json['error'] = true;

				}



				if (!isset($cms)) {

					$user = new Entity_User($id);

					$email = (new Repository_Email())->findByCode(Enum_EmailCode::VIP_REGISTRATION);



					(new Mailer_LoggerProxy(new Mailer_Sender(Enum_Mail::COMMON_REPLY)))->send($user, $email, []);

				} elseif (Flight::bg()->checkLoggedInCms()) {

					$user = new Entity_User($id);

					$email = (new Repository_Email())->findByCode(Enum_EmailCode::TEMP_PASSWORD);



					(new Mailer_LoggerProxy(new Mailer_Sender(Enum_Mail::COMMON_REPLY)))->send($user, $email, ['temp_password' => $tempPassword]);

				}



				echo json_encode($json);

			} else {

				$json['error'] = true;

				$json['data'] = array('message' => 'cannot add vip user');



				echo json_encode($json);

			}

		}

	}



	public function send_sms_to_selection()

	{

		if (Flight::bg()->checkLoggedInCms()) {

			if (

				!empty($_POST['send_message_id']) and

				!empty($_POST['text'])

			) {

				$selection_id = filter_var($_POST['send_message_id'], FILTER_VALIDATE_INT);

				$models = $this->controller->getActiveModelsBySelection($selection_id);



				foreach ($models as $model) {

					$model = $this->controller->getModelById($model['id_model']);



					if ($model) {

						$result = Proxy_SenderLogger::create(

							Sms::create(Config_Sms::CONFIG),

							new Logger_Sms()

						)->send($model['telefoon'], $_POST['text']);

					}

				}



				if (

					isset($result) &&

					!$result['error']

				) {

					$json = [

						'success' => 1,

						'bericht' => $result['message'],

						'function' => 'close_popup()'

					];

				} else {

					$json = [

						'success' => 0,

						'bericht' => $result['message']

					];

				}



				echo json_encode($json);

			}

		}

	}



	public function update_vip_user()

	{



		if (isset($_POST['id']) and !empty($_POST['id'])) {

			$data['id'] = $_POST['id'];



			if (isset($_POST['name']) and !empty($_POST['name'])) {

				$data['name'] = htmlspecialchars($_POST['name']);

			}



			if (isset($_POST['email']) and !empty($_POST['email'])) {

				$data['email'] = htmlspecialchars($_POST['email']);

			}



			if (isset($_POST['password']) and !empty($_POST['password'])) {

				$data['password'] = md5(htmlspecialchars($_POST['password']));

			}



			if (isset($_POST['company']) and !empty($_POST['company'])) {

				$data['company'] = htmlspecialchars($_POST['company']);

			}



			if (isset($_POST['sector']) and !empty($_POST['sector'])) {

				$data['sector'] = htmlspecialchars($_POST['sector']);

			}



			if (isset($_POST['phone']) and !empty($_POST['phone'])) {

				$data['phone'] = htmlspecialchars($_POST['phone']);

			}



			if (isset($_POST['city']) and !empty($_POST['city'])) {

				$data['city'] = htmlspecialchars($_POST['city']);

			}



			if (isset($_POST['country']) and !empty($_POST['country'])) {

				$data['country'] = htmlspecialchars($_POST['country']);

			}



			if (isset($_POST['postal']) and !empty($_POST['postal'])) {

				$data['postal'] = htmlspecialchars($_POST['postal']);

			}



			if (isset($_POST['remark']) and !empty($_POST['remark'])) {

				$data['remark'] = htmlspecialchars($_POST['remark']);

			}



			if (isset($_POST['address']) and !empty($_POST['address'])) {

				$data['address'] = htmlspecialchars($_POST['address']);

			}



			if (isset($_POST['surname']) and !empty($_POST['surname'])) {

				$data['surname'] = htmlspecialchars($_POST['surname']);

			}



			$data['access'] = 0;

			$result = $this->controller->updateUser($data);



			if ($result) {

				if ($result === true) {

					$json['data'] = ['message' => 'success'];

				} else {

					$json['data'] = ['message' => $result];

				}



				echo json_encode($json);

			} else {

				$json['data'] = ['error' => 'cannot update user info'];

				echo json_encode($json);

			}

		}

	}



	public function get_user_by_id()

	{

		if (isset($_POST['user_id']) and !empty($_POST['user_id'])) {

			$user_id = $_POST['user_id'];

			$result = $this->controller->getUserById($user_id);



			if ($result) {

				$result = array('data' => $result);

				$result_ajax = json_encode($result);

				echo $result_ajax;

			}

		}

	}



	public function get_model_by_id()

	{

		if (

			isset($_POST['user_id']) and

			!empty($_POST['user_id'])

		) {

			$user_id = $_POST['user_id'];

			$result = $this->controller->getModelById($user_id);



			if ($result) {

				$result = array('data' => $result);

				$result_ajax = json_encode($result);

				echo $result_ajax;

			}

		}

	}



	public function delete_vip_user()

	{



		if (Flight::bg()->checkLoggedInCms()) {

			if (

				isset($_POST['user_id']) and

				!empty($_POST['user_id'])

			) {

				$user_id = $_POST['user_id'];

				$result = $this->controller->deleteUser($user_id);



				if ($result) {

					$json['data'] = ['message' => 'success'];

					echo json_encode($json);

				} else {

					$json['data'] = ['error' => 'cannot delete user'];

					echo json_encode($json);

				}

			}

		}

	}



	public function delete_model_from_selection()

	{



		if (

			Flight::bg()->checkLoggedInCms() ||

			Flight::bg()->checkIsLogged() ||

			(isset($_SESSION['SELECTIONS']) and

				!empty($_SESSION['SELECTIONS']))

		) {



			if (

				isset($_POST['selection_id']) and

				!empty($_POST['selection_id']) and

				isset($_POST['model_id']) and

				!empty($_POST['model_id'])

			) {

				$data['selection_id'] = $_POST['selection_id'];

				$data['model_id'] = $_POST['model_id'];

				$result = $this->controller->deleteModelFromSelection($data);



				if ($result) {

					$json['data'] = ['message' => 'success'];

					$json['error'] = false;

				} else {

					$json['data'] = ['message' => 'cannot delete model from selection'];

					$json['error'] = true;

				}



				echo json_encode($json);

			}

		}

	}



	public function approve_vip_user()

	{



		if (Flight::bg()->checkLoggedInCms()) {



			if (

				isset($_POST['user_id']) and

				!empty($_POST['user_id'])

			) {

				$user_id = $_POST['user_id'];

				$result = $this->controller->approveUser($user_id);



				if ($result) {

					$user = new Entity_User($user_id);

					$email = (new Repository_Email())->findByCode(Enum_EmailCode::USER_ACCEPTED);



					(new Mailer_LoggerProxy(new Mailer_Sender(Enum_Mail::COMMON_REPLY)))->send($user, $email, []);





					if ($result) {

						$json['data'] = array('message' => 'success');

						echo json_encode($json);

					}

				} else {

					$json['data'] = array('error' => 'cannot approve user');

					echo json_encode($json);

				}

			}

		}

	}



	public function get_vip_users()

	{

		if (Flight::bg()->checkLoggedInCms()) {

			$data = [];



			if (isset($_POST['approved'])) {

				$data['approved'] = $_POST['approved'];

			}



			$result = $this->controller->getAllUsers($data);

			$result = ['data' => $result];

			$result_ajax = json_encode($result);

			echo $result_ajax;

		}

	}



	public function send_selection_by_email()

	{

		if (

			!empty($_POST['name']) &&

			!empty($_POST['email_to']) &&

			!empty($_POST['email_from']) &&

			!empty($_POST['selection'])

		) {



			$data['name'] = htmlspecialchars($_POST['name']);

			$data['email_to'] = htmlspecialchars($_POST['email_to']);

			$data['email_from'] = htmlspecialchars($_POST['email_from']);

			$data['selection'] = htmlspecialchars($_POST['selection']);



			if (isset($_POST['comment']) && !empty($_POST['comment'])) {

				$data['comment'] = htmlspecialchars($_POST['comment']);

			} else {

				$data['comment'] = '';

			}



			$dataMail['selection_link'] = 'https://' . $_SERVER['HTTP_HOST'] . '/nl/selection/?selection=' . $data['selection'] . '&edit';

			$dataMail['selection_name'] = $this->controller->getSelectionByCode($data['selection'])[0]['name'];

			$dataMail['selection_comment'] = $data['comment'];

			$dataMail['email_to'] = $data['email_to'];

			$dataMail['user_to'] = $data['email_to'];

			$dataMail['current_date'] = strftime("%A %e %B %Y");

			$dataMail['user_name'] = $data['name'];



			$user = new Entity_User();

			$user

				->setName($data['name'])

				->setEmail($data['email_to'])

				->setId(0);



			$email = (new Repository_Email())->findByCode(Enum_EmailCode::SEND_SELECTION_TO);

			(new Mailer_LoggerProxy(new Mailer_Sender(Enum_Mail::COMMON_REPLY)))->send($user->setEmail($data['email_to']), $email, $dataMail);



			$email = (new Repository_Email())->findByCode(Enum_EmailCode::SEND_SELECTION_FROM);

			(new Mailer_LoggerProxy(new Mailer_Sender(Enum_Mail::COMMON_REPLY)))->send($user->setEmail($data['email_from']), $email, $dataMail);



			$json['data'] = [

				'error' => false,

				'message' => 'success'

			];



			echo json_encode($json);

		}

	}



	public function get_selections()

	{



		if (Flight::bg()->checkIsLogged()) {

			$result = $this->controller->getUserSelections($_SESSION[SESSION_NAME_SITE_LOGIN]);



			if ($result) {

				$json['data'] = $result;

				echo json_encode($json);

			} else {

				$json['data'] = [

					'error' => 'cannot get user selections',

				];



				echo json_encode($json);

			}

		} else {



			if (

				isset($_SESSION['SELECTIONS']) and

				!empty($_SESSION['SELECTIONS'])

			) {

				$json['data'] = $_SESSION['SELECTIONS'];

				echo json_encode($json);

			} else {

				$json['data'] = array('error' => 'cannot get user selections');

				echo json_encode($json);

			}

		}

	}



	public function add_to_favorite()

	{

		if (Flight::bg()->checkLoggedInCms()) {



			if (

				isset($_POST['model_id']) and

				!empty($_POST['model_id']) and

				!empty($_POST['group_id']) and

				isset($_POST['group_id']) and

				isset($_POST['value'])

			) {



				$data['group_id'] = $_POST['group_id'];

				$data['model_id'] = $_POST['model_id'];

				$data['value'] = $_POST['value'];

				$result = $this->controller->addModelToFavorite($data);



				if ($result) {

					$json['data'] = array('message' => 'success');

					echo json_encode($json);

				} else {

					$json['data'] = array('error' => 'cannot add to favorite');

					echo json_encode($json);

				}

			}

		}

	}



	public function rotate_image()

	{



		if (

			isset($_POST['model_id']) and

			!empty($_POST['model_id']) and

			!empty($_POST['image_id']) and

			isset($_POST['image_id'])

		) {

			$filename = $_SERVER['DOCUMENT_ROOT'] . '/models/' . $_POST['model_id'] . '/original/' . $_POST['image_id'] . '.jpg';

			$filename_thumbs = $_SERVER['DOCUMENT_ROOT'] . '/models/' . $_POST['model_id'] . '/thumbs/' . $_POST['image_id'] . '.jpg';

			$source = imagecreatefromjpeg($filename);

			$rotate = imagerotate($source, -90, 0);

			imagejpeg($rotate, $filename);

			$source = imagecreatefromjpeg($filename_thumbs);

			$rotate = imagerotate($source, -90, 0);

			$result = imagejpeg($rotate, $filename_thumbs);



			if ($result) {

				$json['error'] = false;

				$json['data']['image_id'] = $_POST['image_id'];

				echo json_encode($json);

			} else {

				$json['error'] = true;

				$json['message'] = 'cannot rotate image' . $result;

				echo json_encode($json);

			}

		}

	}



	public function get_logs()

	{



		if (

			isset($_POST['user_id']) and

			!empty($_POST['user_id']) and

			!empty($_POST['user_type']) and

			isset($_POST['user_type'])

		) {

			$data['user_id'] = $_POST['user_id'];

			$data['user_type'] = $_POST['user_type'];

			$result = $this->controller->getLogs($data);



			if ($result) {

				$json['data'] = $result;

				$json['error'] = false;

				echo json_encode($json);

			} else {

				$json['message'] = 'cannot get logs';

				$json['error'] = true;

				echo json_encode($json);

			}

		}

	}



	public function get_model_logs()

	{

		if (Flight::bg()->checkLoggedInCms()) {



			if (

				isset($_POST['model_id']) and

				!empty($_POST['model_id'])

			) {



				$data['model_id'] = $_POST['model_id'];

				$result = $this->controller->getModelLogs($data);



				if ($result) {

					$json['data'] = $result;

					$json['error'] = false;

					echo json_encode($json);

				} else {

					$json['message'] = 'cannot get logs';

					$json['error'] = true;

					echo json_encode($json);

				}

			}

		}

	}



	public function delete_video_from_model()

	{



		if (Flight::bg()->checkLoggedInCms()) {



			if (

				isset($_POST['model_id']) and

				!empty($_POST['model_id']) and

				isset($_POST['video_id']) and

				!empty($_POST['video_id'])

			) {



				$data['video_id'] = $_POST['video_id'];

				$data['model_id'] = preg_replace('/\D/ui', '', $_POST['model_id']);

				$result = $this->controller->deleteVideoByModelId($data);



				if ($result) {

					$json = [

						'error' => false,

						'message' => 'success'

					];



					echo json_encode($json);

				} else {

					$json = [

						'error' => true,

						'message' => 'cannot remove video'

					];



					echo json_encode($json);

				}

			}

		}

	}



	public function set_model_video_state()

	{



		if (Flight::bg()->checkLoggedInCms()) {

			if (

				isset($_POST['video_id']) and

				!empty($_POST['video_id']) and

				isset($_POST['state'])

			) {



				$data['video_id'] = preg_replace('/\D/ui', '', $_POST['video_id']);

				$data['state'] = preg_replace('/\D/ui', '', $_POST['state']);

				$result = $this->controller->setModelVideoState($data);



				if ($result) {

					$json = [

						'error' => false,

						'message' => 'success',

					];



					echo json_encode($json);

				} else {

					$json = [

						'error' => true,

						'message' => 'cannot change video state',

					];



					echo json_encode($json);

				}

			}

		}

	}



	public function approve_model()

	{



		if (Flight::bg()->checkLoggedInCms()) {



			if (

				isset($_POST['model_id']) and

				!empty($_POST['model_id'])

			) {

				$data['model_id'] = preg_replace('/\D/ui', '', $_POST['model_id']);

				$result = $this->controller->approveModel($data);



				if ($result) {

					$json = [

						'error' => false,

						'new_id' => $result,

					];



					echo json_encode($json);

				} else {

					$json = [

						'error' => true,

						'message' => 'cannot remove video',

					];



					echo json_encode($json);

				}

			}

		}

	}



	public function smart_search()

	{



		if (

			isset($_GET['q']) and

			!empty($_GET['q'])

		) {

			$result = $this->controller->smartSearch($_GET['q']);



			if ($result) {

				$searchResults = '';

				foreach ($result as $key => $value) {

					$searchResults .= $value['voornaam'] . '|' . $value['model_id'] . PHP_EOL;

				}



				echo $searchResults;

			}

		}

	}



	public function params_smart_search()

	{

		if (

			isset($_GET['q']) and

			!empty($_GET['q'])

		) {

			echo $_GET['q'] . PHP_EOL . $_GET['q'];

		}

	}



	public function get_model_code_by_email()

	{



		if (

			isset($_POST['email']) and

			!empty($_POST['email'])

		) {

			$data['email'] = $_POST['email'];

			$result = $this->controller->getModelsByEmail($data);



			if ($result) {

				if (count($result) > 0) {

					$code = '';



					foreach ($result as $key => $value) {

						$code .= $value['voornaam'] . ' - ' . $value['code'] . '<br>';

					}



					$code = trim($code, ', ');

				} else {

					$code = $result[0]['code'];

				}



				$user = new Entity_Model($result[0]['model_id']);

				$email = (new Repository_Email())->findByCode(Enum_EmailCode::FORGOT_CODE);



				(new Mailer_LoggerProxy(new Mailer_Sender(Enum_Mail::COMMON_REPLY)))->send($user, $email, ['model_code' => $code]);



				$json = [

					'error' => false,

					'message' => 'Je Castingteam code (of codes) werd verstuurd naar dit email adres. Als je geen email aankrijgt, check dan je spamfolder.',

				];



				echo json_encode($json);

			} else {



				$json = [

					'error' => true,

					'message' => "Er is niemand geregistreerd met dit email adres, neem gerust contact op met ons indien nodig."

				];



				echo json_encode($json);

			}

		}

	}



	public function get_model_locations()

	{

		if (Flight::bg()->checkLoggedInCms()) {

			if (

				isset($_POST['selection_id']) and

				!empty($_POST['selection_id']) and

				filter_var($_POST['selection_id'], FILTER_VALIDATE_INT)

			) {

				$models = $this->controller->getModelsBySelection($_POST['selection_id']);

				$coordinates = [];



				foreach ($models as $key => $model) {

					$modelFull = $this->controller->getModelById($model['id_model']);

					$result = json_decode(LocaleCache::create(Config_LocaleCache::CONFIG)->get($model['id_model'], 'location'), 1);



					if (!is_array($result)) {

						$result = GeoLocation::create(Config_GoogleMaps::CONFIG)->getCoordinatesByAddress(sprintf('%s, %s, %s', $modelFull['gemeente'], $modelFull['straat'], $modelFull['nummer']));

					}



					if (!$result['error']) {

						LocaleCache::create(Config_LocaleCache::CONFIG)->add($model['id_model'], json_encode($result), 'location');



						$coordinates[] = [

							'id' => $modelFull['model_id'],

							'location' => $result['coordinates'],

							'name' => $modelFull['naam'],

							'surname' => $modelFull['voornaam'],

							'image' => 	$modelFull['images'][0]['id']

						];

					}

				}



				echo json_encode($coordinates);

			} elseif (

				isset($_POST['models']) and

				!empty($_POST['models'])

			) {

				$coordinates = [];



				foreach ($_POST['models'] as $key => $model) {

					if (filter_var($model, FILTER_VALIDATE_INT)) {

						$modelFull = $this->controller->getModelById($model);

						$result = json_decode(LocaleCache::create(Config_LocaleCache::CONFIG)->get($model, 'location'), 1);



						if (!is_array($result)) {

							$result = GeoLocation::create(Config_GoogleMaps::CONFIG)->getCoordinatesByAddress(sprintf('%s, %s, %s', $modelFull['gemeente'], $modelFull['straat'], $modelFull['nummer']));

						}



						if (!$result['error']) {

							LocaleCache::create(Config_LocaleCache::CONFIG)->add($model['id_model'], json_encode($result), 'location');



							$coordinates[] = [

								'id' => $modelFull['model_id'],

								'location' => $result['coordinates'],

								'name' => $modelFull['naam'],

								'surname' => $modelFull['voornaam'],

								'image' => $modelFull['images'][0]['id']

							];

						}

					}

				}



				echo json_encode($coordinates);

			}

		}

	}



	public function upload_model_photo()

	{

		if (

			Flight::bg()->checkLoggedInCms() &&

			isset($_POST['model_id'])

		) {

			$extentions = ['jpg', 'jpeg', 'png', 'bmp'];

			$limit = 250000000;

			$uploadDir = __DIR__ . '/../../models' . DIRECTORY_SEPARATOR . $_POST['model_id'];

			$originalDir = $uploadDir . DIRECTORY_SEPARATOR . 'original';

			$thumbDir = $uploadDir . DIRECTORY_SEPARATOR . 'thumbs';



			// // var_dump($uploadDir);

			// var_dump(str_replace(__DIR__ . '/../../', "", $originalDir)));

			// // var_dump($thumbDir);

			// exit;



			if (!is_dir($uploadDir)) {

				mkdir($uploadDir, 0777);

				chmod($uploadDir, 0777);

			}



			if (!is_dir($originalDir)) {

				mkdir($originalDir, 0777);

				chmod($originalDir, 0777);

			}



			if (!is_dir($thumbDir)) {

				mkdir($thumbDir, 0777);

				chmod($thumbDir, 0777);

			}



			foreach (UploadedFilesHandler::create()->getFiles() as $file) {

				$upload = new FileUploader($file, $extentions, $limit);

				$result = $upload->handleUpload($uploadDir);

				$imageId = $this->controller->addModelPhoto($_POST['model_id']);

				$upload = new Upload($uploadDir . DIRECTORY_SEPARATOR . $file->getName());



				if (

					isset($result['success']) &&

					intval($imageId) > 0

				) {

					if ($upload->uploaded) {

						$upload->file_new_name_body = $imageId;

						$upload->file_overwrite = true;

						$upload->image_convert = "jpg";

						$upload->jpeg_quality = 100;

						$upload->image_x = 149;

						$upload->image_y = 149;

						$upload->image_ratio_crop = true;

						$upload->image_resize = true;

						$upload->file_auto_rename = false;

						$upload->process($thumbDir);

						

						// 

						$this->moveToRemoteServer(str_replace(__DIR__ . '/../../', "", $thumbDir), $imageId . ".jpg");

						$remote_file = '/www/testimages/images/'.$file->getName();

						$file_upload = $uploadDir . DIRECTORY_SEPARATOR . $file->getName();

						// set up basic connection
						$conn_id = ftp_connect("ftp.stagecastingteamcom.webhosting.be");

						// login with username and password
						$login_result = ftp_login($conn_id, "stagecastingteamcom@stagecastingteamcom", "1rf8?rsZx457");

						// upload a file
						if (ftp_put($conn_id, $remote_file, $file_upload,  FTP_ASCII)) {
						echo "successfully uploaded $file\n";
						} else {
						echo "There was a problem while uploading $file\n";
						}

						// close the connection
						ftp_close($conn_id);
						echo "<h2>File Uploaded</h2>";
                           exit();


						if (!$upload->processed) {

							echo json_encode([

								'error' => true,

								'message' => "Er is een technisch probleem opgetreden tijdens het uploaden van de foto: " . $upload->error

							]);

						} else {



							$afmetingen = getimagesize($file->getPath());

							$breedte = $afmetingen[1];

							$upload->file_new_name_body = $imageId;

							$upload->file_overwrite = true;

							$upload->image_convert = "jpg";

							$upload->jpeg_quality = 100;

							$upload->process($originalDir);



							// 

							$this->moveToRemoteServer(str_replace(__DIR__ . '/../../', "", $originalDir), $imageId . ".jpg");

							if (!$upload->processed) {

								echo json_encode([

									'error' => true,

									'message' => "Er is een technisch probleem opgetreden tijdens het uploaden van de foto: " . $upload->error

								]);

							} else {

								unlink($uploadDir . DIRECTORY_SEPARATOR . $file->getName());

							}

						}

					}

				} else {

					echo json_encode([

						'error' => true,

						'message' => $result['error']

					]);

				}

			}



			echo json_encode([

				'error' => false,

				'message' => 'images have been uploaded',

				'bericht' => 'none',

				'page' => $_POST['page']

			]);

		}

	}



	/**

	 * upload file to remote file server

	 */

	public function moveToRemoteServer($path, $remote_filename)

	{



		/* FTP Account (Remote Server) */

		$ftp_host = 'ftp.stagecastingteamcom.webhosting.be'; /* host */

		$ftp_user_name = 'stagecastingteamcom@stagecastingteamcom'; /* username */

		$ftp_user_pass = '1rf8?rsZx457'; /* password */

		

		

		/* File and path to send to remote FTP server */

		$local_file = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . $remote_filename;

		

		/* Connect using basic FTP */

		$connect_it = ftp_connect( $ftp_host );

		

		

		/* Login to FTP */

		$login_result = ftp_login( $connect_it, $ftp_user_name, $ftp_user_pass );

		

		ftp_chdir($connect_it, '/www');

		foreach(explode(DIRECTORY_SEPARATOR, $path) as $folder) {

			if(!ftp_chdir($connect_it, $folder)) {

				ftp_mkdir($connect_it, $folder);

				ftp_chdir($connect_it, $folder);

			}

		}



		$putFile = ftp_put( $connect_it, $remote_filename, $local_file, FTP_BINARY );

		ftp_close( $connect_it );

		return $putFile;

	}



	/**

	 * @return integer

	 */

	private function getSelectionModelsCount()

	{

		$modelsFromSelections = [];



		if (Flight::bg()->checkIsLogged()) {

			$selections = $this->controller->getUserSelections($_SESSION[SESSION_NAME_SITE_LOGIN]);



			if ($selections) {

				foreach ($selections as $selection) {

					foreach ($selection['models'] as $value) {

						#if (!in_array($value['id_model'], $modelsFromSelections)) 

						{

							$modelsFromSelections[] = $value['id_model'];

						}

					}

				}

			}

		} elseif (isset($_SESSION['SELECTIONS']) and !empty($_SESSION['SELECTIONS'])) {

			$selections = $_SESSION['SELECTIONS'];



			foreach ($selections as $selection) {

				$models = $this->controller->getModelsBySelection($selection['id']);



				foreach ($models as $key => $value) {

					// if (!in_array($value['id_model'], $modelsFromSelections)) {

					{

						$modelsFromSelections[] = $value['id_model'];

					}

				}

			}

		}



		return count($modelsFromSelections);

	}



	/**

	 * @param string $email

	 * @return string

	 */

	private function resolveEmail($email)

	{

		if (!is_null($this->account->get())) {

			if ($this->account->get()->getType()->getValue() == Enum_UserType::BOOKER) {

				return $this->smarty->fetch('cms/elements/get_email_button.tpl');

			} elseif ($this->account->get()->getType()->getValue() == Enum_UserType::ADMIN) {

				return '<a class="mail" href="mailto:' . $email . '">' . $email . '</a>';

			}

		}



		return  '-';

	}

}

