<?php

class DBController
{

	const GROUP_MAP = [
		61 => '94',
		49 => '89',
		25 => '72',
		22 => '124',
		21 => '154_77',
		20 => '153_77',
		24 => '127',
		26 => '144_160',
	];

	const GROUP_MAP_TYPE_TWO = [
		46 => '88',
		47 => '137',
	];

	protected static $_instance;

	static function getInstance()
	{
		if (!self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	private function __construct()
	{

	}

	private function __clone() {

	}

	public function getAllLangs() {
		return array('nl', 'fr', 'en', 'de');
	}

	public function setEncoding() {
		Flight::db()->query("SET CHARACTER SET utf8");
	}

    public function getCountries() {
        $countries = Flight::db()->query("SELECT * FROM `countries`");
        if ($countries) {

            while ($country = $countries->fetch_assoc()) {
                $results[] = $country;
            }

            return $results;
        } else {
            return null;
        }
    }

    /**
     * @param int $countryId
     * @return array|null
     */
    public function getCountriesById($countryId) {
        $countries = Flight::db()->query("SELECT * FROM `countries` WHERE id=" . $countryId);

        if ($countries) {
            while ($country = $countries->fetch_assoc()) {
                $results[] = $country;
            }

            return $results;
        } else {
            return null;
        }
    }

###################EMAIL############################

    public function getEmailTemplateByNiceName($name) {
		$emails = Flight::db()->query("SELECT `id`, `titel`,`subject` ,`inhoud`, `nice_name` FROM `emails` WHERE `nice_name`='" . $name . "'");

		if ($emails) {

			while ($email = $emails->fetch_array()) {
				$results[] = $email;
			}

			return $results[0];
		} else {
			return null;
		}
	}

	public function getEmailTemplateById($id) {
		$emails = Flight::db()->query("SELECT `id`, `titel`,`subject` ,`inhoud`, `nice_name` FROM `emails` WHERE `id`='" . $id . "'");

		if ($emails) {
			while ($email = $emails->fetch_array()) {
				$results[] = $email;
			}

			return $results[0];
		} else {
			return null;
		}
	}

    public function addModelPhoto($model_id)
    {
        Flight::db()->query("INSERT INTO model_images (id_model, timestamp) VALUES(" . $model_id . ", now())");

        return Flight::db()->insert_id;
    }

###################STATS############################

	public function getStats() {
		for ($i = 1; $i < 8; $i++) {
			$models_count = Flight::db()->query(sprintf("SELECT count(*) FROM (SELECT * FROM model WHERE where_known=%s) src", $i));

			while ($count = $models_count->fetch_assoc()) {
				$results[$i] = $count['count(*)'];
			}
		}

		return $results;
	}

###################PHONE############################

    /**
     * @return string[]
     */
	public function getFrontendPhones() {
		return [
		    'nederland' => '+31 (0)85 130 18 12',
            'belgie' => '+32 (0) 3 773 52 00 of',
            'belgique' => '+32 (0) 2 79 30 227 of',

			'vlaanderen' => '03 773 52 00',
			'brussel' => '+32 (0)2 793 02 27',
			'bruxelles' => '+32 (0)2 793 02 27',
			'deutschland' => '03 773 52 00',
			'germany' => '03 773 52 00',
			
			'belgium' => '03 / 773 52 00',
			'netherlands' => '+31 (0) 20 244 01 42',
			'countdown' => '+31 (0) 20 244 01 42',
        ];
	}

###################EMAIL############################

    /**
     * @return string[]
     */
	public function getFrontendEmail() {
		return [
		    'nederland' => 'info@castingteam.nl',
            'belgie' => 'bxl@castingteam.com',
            'belgique' => 'bxl@castingteam.com',

			'vlaanderen' => 'info@castingteam.be',
			'brussel' => 'bxl@castingteam.com',
			'bruxelles' => 'bxl@castingteam.com',
			'deutschland' => 'info@castingteam.be',
			'germany' => 'info@castingteam.be',
        ];
	}

###################EMAIL_LOGS############################

	public function getLogs($data) {

		$select = '';

		if (isset($data['user_id'])) {
			$select .= ' id_model=' . $data['user_id'] . ' ';
		}

		if (isset($data['user_type'])) {
			if ($select) {
				$select .= ' AND ';
			}

			$select .= ' user_type_id=' . $data['user_type'] . ' ';
		}

		if ($select) {
			$select = ' WHERE ' . $select;
		}

		$logs = Flight::db()->query("SELECT * FROM `model_mails` " . $select . " ORDER BY timestamp DESC LIMIT 10");

		if ($logs) {
			while ($log = $logs->fetch_array()) {
				$results[] = $log;
			}

			return $results;
		} else {

			return null;
		}
	}

###################MODEL_LOGS############################

	public function getModelLogs($data) {

		$logs = Flight::db()->query("SELECT * FROM `_log` WHERE `id_model`=" . $data['model_id'] . " ORDER BY timestamp DESC");

		if ($logs) {

			while ($log = $logs->fetch_array()) {

				$results['logs'][] = $log;
			}

			$results['model'] = $this->getModelById($data['model_id']);
			return $results;
		} else {

			return null;
		}
	}

####################USER############################

	public function registerUser($data) {

		if (!$this->getUserByEmail($data['email'])) {

			if (isset($data['address'])) {

				$street = $data['address'];
			} else {
				$street = '';
			}

			if (isset($data['city'])) {

				$city = $data['city'];
			} else {
				$city = '';
			}

			if (isset($data['country'])) {

				$country = $data['country'];
			} else {
				$country = '';
			}

			if (isset($data['postal'])) {

				$postal = $data['postal'];
			} else {
				$postal = '';
			}

			if (isset($data['remark'])) {

				$remark = $data['remark'];
			} else {
				$remark = '';
			}

			if (isset($data['surname'])) {

				$surname = $data['surname'];
			} else {
				$surname = '';
			}

			if (!preg_replace('/\D/', '', $data['phone'])) {

				$phone = 0;
			} else {
				$phone = preg_replace('/\D/', '', $data['phone']);
			}

			$result = $this->query("INSERT INTO `user`( `access`, `name`, `password`, `email`, `phone`, `company`, `sector`, `street`, `postal_code`, `city`, `country`, `remark`,`approved`, `registration_date`, `update_date`,`surname`) VALUES ('" . $data['access'] . "','" . $data['name'] . "','" . $data['password'] . "','" . $data['email'] . "','" . $phone . "','" . $data['company'] . "','" . $data['sector'] . "','" . $street . "','" . $postal . "','" . $city . "','" . $country . "','" . $remark . "','" . $data['approved'] . "','" . date('Y-m-d') . "','" . date('Y-m-d') . "','" . $surname . "')");

			if ($result) {
				return true;
			} else {
				return false;
			}
		} else {

			return 'Dit email adres werd reeds geregistreerd.';
		}
	}

	public function approveUser($id) {

		$result = Flight::db()->query("UPDATE `user` SET `approved`=1,`update_date`='" . date('Y-m-d') . "' WHERE `id`=" . $id);

		if ($result) {

			return true;
		} else {

			return false;
		}
	}

	public function deleteUser($id) {

		$result = Flight::db()->query("DELETE FROM `user` WHERE `id`=" . $id);

		if ($result) {

			return true;
		} else {

			return false;
		}
	}

	public function updateUser($data) {

		if ($this->getUserByEmail($data['email'])) {

			if ($data['password'] != '') {
				$password_query = ",`password`='" . $data['password'] . "'";
			} else {
				$password_query = '';
			}

			$query = "UPDATE `user` SET `name`='" . $data['name'] . "'" . $password_query . ",`email`='" . $data['email'] . "',`phone`='" . $data['phone'] . "',`company`='" . $data['company'] . "',`sector`='" . $data['sector'] . "',`update_date`='" . date('Y-m-d') . "'";

			if (isset($data['address'])) {
				$query .= ",`street`='" . $data['address'] . "'";
			}

			if (isset($data['city'])) {
				$query .= ",`city`='" . $data['city'] . "'";
			}

			if (isset($data['country'])) {
				$query .= ",`country`='" . $data['country'] . "'";
			}

			if (isset($data['postal'])) {
				$query .= ",`postal_code`='" . $data['postal'] . "'";
			}

			if (isset($data['remark'])) {
				$query .= ",`remark`='" . $data['remark'] . "'";
			}

			if (isset($data['surname'])) {
				$query .= ",`surname`='" . $data['surname'] . "'";
			}

			$query .= " WHERE `id`=" . $data['id'];

			$result = Flight::db()->query($query);

			if ($result) {
				return true;
			} else {
				return false;
			}
		} else {

			return 'User not found';
		}
	}

	public function getUserByEmail($email) {

		$users = Flight::db()->query("SELECT * FROM user WHERE email=" . '"' . $email . '"');

		if ($users) {
			while ($user = $users->fetch_array()) {

				$results[] = $user;
			}

			return $results[0];
		} else {
			return null;
		}
	}

	public function getAllUsers($data) {

		if (isset($data['approved'])) {

			$approved = " WHERE approved=" . $data['approved'];
		} else {

			$approved = '';
		}

		$users = Flight::db()->query("SELECT * FROM user" . $approved);

		if ($users) {
			while ($user = $users->fetch_array()) {

				$results[] = $user;
			}

			return $results;
		} else {
			return null;
		}
	}

	public function getUserById($id) {

		$users = Flight::db()->query("SELECT * FROM user WHERE id=" . '"' . $id . '"');

		if ($users) {
			while ($user = $users->fetch_array()) {

				$results[] = $user;
			}

			return $results[0];
		} else {
			return null;
		}
	}

	public function getUserBySelection($data) {

		$users = Flight::db()->query("SELECT * FROM `user` WHERE `id` IN (SELECT `user_id` FROM `selecties_users` WHERE `selection_id`=" . $data['selection_id'] . ")");

		if ($users) {
			while ($user = $users->fetch_array()) {
				$results[] = $user;
			}

			return $results[0];
		} else {
			return null;
		}
	}

	public function getUsersByEmail($email) {
		$users = Flight::db()->query("SELECT * FROM user WHERE email=" . '"' . $email . '"');

		if ($users) {
			while ($user = $users->fetch_assoc()) {

				$results[] = [
					'user_id' => $user['id'],
					'user_type' => 1,
				];
			}
		}

		$users = Flight::db()->query("SELECT * FROM model WHERE email=" . '"' . $email . '"');

		if ($users) {
			while ($user = $users->fetch_assoc()) {

				$results[] = [
					'user_id' => $user['model_id'],
					'user_type' => 2,
				];
			}
		}

		if (
			isset($results) &&
			count($results)
		) {
			return $results;
		} else {
			return null;
		}
	}

	public function getUsersByParams($data) {

		foreach ($data as $key => $value) {
			if (isset($params)) {
				$params .= ' AND ';
			} else {
				$params = '';
			}

			$params .= sprintf("%s='%s'", $key, $value);
		}

		$users = Flight::db()->query("SELECT * FROM user WHERE " . $params);

		if ($users) {
			while ($user = $users->fetch_assoc()) {

				$results[] = [
					'user_id' => $user['id'],
					'user_type' => 1,
				];
			}
		}

		$users = Flight::db()->query("SELECT * FROM model WHERE  " . $params);

		if ($users) {
			while ($user = $users->fetch_assoc()) {

				$results[] = [
					'user_id' => $user['model_id'],
					'user_type' => 2,
				];
			}
		}

		if (
			isset($results) &&
			count($results)
		) {
			return $results;
		} else {
			return null;
		}
	}

##########################################################
	###################SELECTION##############################

	public function checkIsUserSelection($data) {

		$result = Flight::db()->query("SELECT `selection_id`, `user_id` FROM `selecties_users` WHERE `selection_id`='" . $data['selection_id'] . "' AND `user_id`=" . $data['user_id']);

		if ($result->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}

    public function checkIsUserSelectionByCode($data)
    {
        $result = Flight::db()->query("SELECT `selection_id`, `user_id` FROM `selecties_users` WHERE `selection_id` IN ( SELECT id FROM selecties WHERE `code`='" . $data['selection_id'] . "') AND `user_id`=" . $data['user_id']);

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

	public function createSelection($data) {

		if (isset($data['selection_type']) && !empty($data['selection_type'])) {
			$selection_type = $data['selection_type'];
		} else {
			$selection_type = 'user_selection';
		}

		$result = Flight::db()->query("INSERT INTO selecties(name,creation_date,selection_type,code) VALUES ('" . $this->escapeChars($data['name']) . "','" . date('Y-m-d') . "','" . $selection_type . "','" . substr(md5($data['name'] . strtotime("now")), 0, 8) . "')");

		if ($result) {
			return Flight::db()->insert_id;
		} else {
			return false;
		}
	}

	public function updateSelection($data) {

		$result = $this->query("UPDATE selecties SET name='" . $this->escapeChars($data['name']) . "' WHERE id=" . $data['id']);

		if ($result) {

			return true;
		} else {

			return false;
		}
	}

	public function deleteSelection($data) {

		$result = $this->query("DELETE FROM selecties WHERE id=" . $data['selection_id']);

		if ($result) {

			$result = $this->query("DELETE FROM selecties_models WHERE id_selectie=" . $data['selection_id']);

			if ($result) {
				return true;
			} else {
				return false;
			}
		} else {

			return false;
		}
	}

	public function addModelToSelection($data) {

		$result = $this->query("INSERT INTO selecties_models ( id_selectie, id_model) VALUES (" . $data['selection_id'] . "," . $data['model_id'] . ")");

		if ($result) {

			return true;
		} else {

			return false;
		}
	}

	public function deleteModelFromSelection($data) {

		$result = $this->query("DELETE FROM selecties_models WHERE id_selectie=" . $data['selection_id'] . " AND id_model=" . $data['model_id']);

		if ($result) {

			return true;
		} else {

			return false;
		}
	}

	public function getModelsBySelectionIdAndModelId($selectionId, $modelId) {

		$models = $this->query("SELECT id_model FROM selecties_models WHERE id_selectie = {$selectionId} AND id_model = {$modelId}");

		if ($models) {
			while ($model = $models->fetch_assoc()) {
				$results[] = $model;
			}
			return $results;
		} else {
			return false;
		}
	}

	public function getUserSelections($user_id) {
		$selections = $this->query("SELECT * FROM selecties WHERE id IN (SELECT selection_id FROM selecties_users WHERE user_id=" . $user_id . ")");

		if ($selections) {
			while ($selection = $selections->fetch_array()) {

				$item = $selection;
				$item['models'] = $this->getModelsBySelection($selection['id']);

				$results[] = $item;
			}

			return $results;
		} else {
			return null;
		}
	}

	public function getSelectionById($selection_id) {

		$selections = $this->query("SELECT * FROM selecties WHERE id=" . $selection_id);

		if ($selections) {
			while ($selection = $selections->fetch_array()) {

				$item = $selection;
				$item['selections'] = $item;

				$results[] = $item;
			}

			return $results;
		} else {
			return null;
		}
	}

    public function getSelectionByCode($selectionId)
    {

        $selections = $this->query("SELECT * FROM selecties WHERE code='" . $selectionId . "'");

        if ($selections) {
            while ($selection = $selections->fetch_assoc()) {

                $item = $selection;
                $item['selections'] = $item;

                $results[] = $item;
            }

            return $results;
        } else {
            return null;
        }
    }

	public function getSelectionsByType($selection_type) {

		$selections = $this->query("SELECT * FROM selecties WHERE selection_type='" . $selection_type . "' ORDER BY creation_date DESC");

		if ($selections) {
			while ($selection = $selections->fetch_array()) {

				$item = $selection;
				$item['selections'] = $item;

				$results[] = $item;
			}

			return $results;
		} else {
			return null;
		}
	}

	public function getModelsBySelection($selectionId) {

		$models = $this->query("SELECT id_model FROM selecties_models WHERE id_selectie=" . $selectionId);

		if ($models) {
			while ($model = $models->fetch_assoc()) {
				$results[] = $model;
			}

			return $results;
		} else {
			return null;
		}
	}

	public function getCnModelBySelection($selectionId) {

		$cn = 0;

		$models = $this->query("SELECT count(*) AS 'cn' FROM selecties_models WHERE id_selectie = {$selectionId}");

		if ($models) {
			while ($model = $models->fetch_assoc()) {
				$cn = $model['cn'];
			}
		}

		return $cn;
	}

    public function getActiveModelsBySelection($selectionId)
    {
        $results = [];
        $models = $this->query("SELECT id_model FROM selecties_models WHERE id_selectie=" . $selectionId . " AND id_model IN (SELECT model_id FROM model WHERE declined=0 AND nieuw_actief>0 AND accepted=1)");

        if ($models) {
            while ($model = $models->fetch_assoc()) {
                $results[] = $model;
            }
        }

        return $results;
    }

    /**
     * @param $data
     * @return bool
     */
    public function addSelectionToUser($data)
    {
		$result = $this->query("INSERT INTO selecties_users (selection_id, user_id) VALUES (" . $data['selection_id'] . "," . $data['user_id'] . ")");

		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function deleteSelectionFromUser($data) {

		$result = $this->query("DELETE FROM selecties_users WHERE selection_id=" . $data['selection_id'] . " AND user_id=" . $data['user_id']);

		if ($result) {

			$result = $this->deleteSelection($data);

			if ($result) {
				return true;
			} else {

				return false;
			}
		} else {

			return false;
		}
	}

##########################################################
	###################CATEGORIES#############################

	public function getMainCategories()
	{

		$categories = $this->query("SELECT * FROM category WHERE type='main'");

		if ($categories) {

			while ($category = $categories->fetch_array()) {

				$results[] = $category;
			}
		} else {

			return null;
		}

		return $results;
	}

	public function getCategoryByCodename($codename, $type)
	{
		$categories = $this->query("SELECT * FROM category WHERE codename='" . $codename ."' AND type='" . $type . "'");

		if ($categories) {
            $results = [];

            while ($category = $categories->fetch_assoc()) {
                $results[] = $category;
			}

            return count($results) ? $results[0] : [];
		} else {
			return null;
		}
	}

	public function getMainCategoriesWithFilters()
	{

		$categories = $this->query("SELECT * FROM category WHERE type='main'");

		if ($categories) {

			while ($category = $categories->fetch_array()) {

				$item = $category;

				$item['filters'] = $this->getCategoryFilters($category['category_id']);

				$results[] = $item;
			}
		} else {

			return null;
		}

		return $results;
	}

	public function getMainCategoriesWithGroups() {

		$categories = $this->query("SELECT * FROM category WHERE type='main'");

		if ($categories) {

			while ($category = $categories->fetch_array()) {

				$item = $category;

				$item['groups'] = $this->getCategoryGroups($category['category_id']);

				$results[] = $item;
			}
		} else {

			return null;
		}

		return $results;
	}

	public function getMainCategoryById($id) {

		$categories = $this->getMainCategories();

		foreach ($categories as $key => $value) {

			if ($value['category_id'] == $id) {

				return $value;
			}
		}

		return null;
	}

	public function getFilterById($id) {

		$filters = Flight::db()->query("SELECT * FROM filters WHERE id=" . '"' . $id . '"');

		if ($filters) {
			while ($filter = $filters->fetch_array()) {

				$results[] = $filter;
			}

			return $results[0];
		} else {
			return null;
		}
	}

	public function getFiltersByCategoryId($id = null) {

		$filters = $this->getCategoryFilters($id);

		if ($filters) {

			$result = array();

			foreach ($filters as $key => $value) {
				$options = '';
				$filter_name = $this->getFilterById($value['filter_id']);

				if ($filter_name) {

					if ($value['active'] == 0) {
						$active = false;
					} else {
						$active = true;
					}

					$filter_options = $this->getFilterOptions($id, $value['filter_id']);

					if (count($filter_options)) {

						foreach ($filter_options as $key => $option) {

							$options[$option['value_id']] = array('active' => $option['active'], 'value' => $option['value_id']);
						}
					} else {

						$options = 'all';
					}

					$result[$filter_name['name_id']] = array('filter_id' => $filter_name['name_id'], 'active' => $active, 'filter_options' => $options);
				}
			}

			return $result;
		} else {

			return
                [
                    'age' =>
                        [
                            'filter_id' => 'age',
                            'active' => true,
                            'filter_options' => [
                                '14' =>
                                    [
                                        'active' => true
                                    ],
                                '13' =>
                                    [
                                        'active' => true
                                    ],
                                '12' =>
                                    [
                                        'active' => true
                                    ],
                                '11' =>
                                    [
                                        'active' => true
                                    ],
                                '10' =>
                                    [
                                        'active' => true
                                    ],
                                '1' =>
                                    [
                                        'active' => true
                                    ],
                                '2' =>
                                    [
                                        'active' => true
                                    ],
                                '3' =>
                                    [
                                        'active' => true
                                    ],
                                '4' =>
                                    [
                                        'active' => true
                                    ]
                            ]
                        ],
                    'language_filter' =>
                        [
                            'filter_id' => 'language_filter',
                            'active' => true,
                            'filter_options' => 'all'
                        ],
                    'skin_filter' =>
                        [
                            'filter_id' => 'skin_filter',
                            'active' => true,
                            'filter_options' => 'all'
                        ],
                    'hair_color_filter' =>
                        [
                            'filter_id' => 'hair_color_filter',
                            'active' => true,
                            'filter_options' => 'all'
                        ],
                    'length' =>
                        [
                            'filter_id' => 'length',
                            'active' => true,
                            'filter_options' => 'all'
                        ],
                    'maten' =>
                        [
                            'filter_id' => 'maten',
                            'active' => true,
                            'filter_options' => 'all'
                        ],
                    'kledingmaten' =>
                        [
                            'filter_id' => 'kledingmaten',
                            'active' => true,
                            'filter_options' => 'all'
                        ],
                    'hair_length_filter' =>
                        [
                            'filter_id' => 'hair_length_filter',
                            'active' => true,
                            'filter_options' => 'all'
                        ],
                    'hair_filter' =>
                        [
                            'filter_id' => 'hair_filter',
                            'active' => true,
                            'filter_options' => 'all'
                        ]
                ];
		}
	}

	public function getAllCategories() {

		$groups = Flight::db()->query("SELECT * FROM category WHERE visible=1");
		if ($groups) {
			while ($group = $groups->fetch_array()) {

				$results[] = $group;
			}

			return $results;
		}
	}

	public function getAllFilters() {

		$filters = Flight::db()->query("SELECT * FROM filters");
		if ($filters) {
			while ($filter = $filters->fetch_array()) {

				$results[] = $filter;
			}

			return $results;
		}
	}

	public function addFilterToCategory($data) {

		$filters = Flight::db()->query("SELECT * FROM category_filter WHERE category_id=" . $data['category_id'] . " AND position=" . $data['position']);

		if ($filters->num_rows) {

			$result = Flight::db()->query("UPDATE `category_filter` SET `filter_id`=" . $data['filter_id'] . ",`active`=" . $data['active'] . " WHERE category_id=" . $data['category_id'] . " AND position=" . $data['position']);
		} else {

			$result = Flight::db()->query("INSERT INTO `category_filter`(`category_id`, `filter_id`, `active`, `position`, `options_id`) VALUES (" . $data['category_id'] . "," . $data['filter_id'] . "," . $data['active'] . "," . $data['position'] . ",0)");
		}

		if ($result) {

			return true;
		} else {

			return false;
		}
	}

	public function addValueToCategory($data) {

		$result = Flight::db()->query("INSERT INTO `filter_options`(`category_id`, `filter_id`, `active`, `value_id`,`type`) VALUES (" . $data['category_id'] . "," . $data['filter_id'] . "," . $data['active'] . "," . $data['value_id'] . ",'" . $data['type'] . "')");

		if ($result) {

			return true;
		} else {

			return false;
		}
	}

	public function deleteValueFromCategory($data) {

		$result = Flight::db()->query("DELETE FROM `filter_options` WHERE `category_id`=" . $data['category_id'] . " AND `value_id`=" . $data['value_id'] . " AND `filter_id`=" . $data['filter_id'] . " AND `type`='" . $data['type'] . "'");

		if ($result) {

			return true;
		} else {

			return false;
		}
	}

	public function getCategoryGroups($id) {

		$filters = Flight::db()->query("SELECT * FROM `filter_options` WHERE `category_id`=" . $id);

		if ($filters) {

			while ($filter = $filters->fetch_array()) {
				$results[] = $filter;
			}

			return $results;
		} else {

			return null;
		}
	}

	public function getFilterOptions($category_id, $filter_id) {

		$options = Flight::db()->query("SELECT * FROM filter_options WHERE category_id=" . $category_id . " AND filter_id=" . $filter_id);

		if ($options) {

			while ($option = $options->fetch_array()) {
				$results[] = $option;
			}

			return isset($results) ? $results : null;
		} else {

			return null;
		}
	}

	public function deleteFilterFromCategory($data) {

		$result = Flight::db()->query("DELETE FROM category_filter WHERE category_id=" . $data['category_id'] . " AND position=" . $data['position']);

		if ($result) {

			return true;
		} else {

			return false;
		}
	}

	public function getCategoryFilters($id) {

		$filters = Flight::db()->query("SELECT * FROM category_filter WHERE category_id=" . $id . " ORDER BY position");

		if ($filters) {

			while ($filter = $filters->fetch_array()) {

				$results[] = $filter;
			}

			return $results;
		} else {

			return null;
		}
	}

	public function getCategoryBySubType($subType) {

		$groups = Flight::db()->query("SELECT * FROM category WHERE subtype=" . '"' . $subType . '"');

		if ($groups) {
			while ($group = $groups->fetch_array()) {

				$results[] = $group;
			}

			return $results;
		}
	}

	public function getCategoryById($category_id) {

		$categories = Flight::db()->query("SELECT * FROM category WHERE category_id=" . $category_id);

		if ($categories) {
			while ($category = $categories->fetch_array()) {

				$results[] = $category;
			}

			return $results[0];
		} else {
			return null;
		}
	}

################################################################
	#########################GROUP##################################

	public function getAllGroups()
    {
        $groups = Flight::db()->query("SELECT * FROM groepen");
        $results = [];

		if ($groups) {
			while ($group = $groups->fetch_array()) {
				$results[] = $group;
			}
		}

        return $results;
	}

    /**
     * @return mixed|null
     */
    public function getRootGroups()
    {
        $rootGroups = Flight::db()->query("SELECT * FROM `category` WHERE type='root_group'");

        if ($rootGroups) {
            while ($group = $rootGroups->fetch_assoc()) {

                $results[$group['category_id']] = $group;
                $results[$group['category_id']]['child_group'] = $this->getChildGroups($group['category_id']);
            }

            return $results;
        } else {
            return null;
        }
    }

    /**
     * @param int $id
     * @return mixed|null
     */
    public function getChildGroups($id)
    {
        $rootGroups = Flight::db()->query("SELECT * FROM groepen where id IN (SELECT group_id FROM category_group WHERE category_id=" . $id . ") ORDER BY naam");

        if ($rootGroups) {
            while ($group = $rootGroups->fetch_assoc()) {

                $results[$group['id']] = $group;
            }

            return $results;
        } else {
            return null;
        }
    }

    /**
     * @param array $data
     */
    public function addGroupToRoot(array $data)
    {
        $this->query(
            sprintf(
                'INSERT INTO `category_group` (`category_id`,`group_id`) VALUES (%s,%s)',
                $this->getValueOrThrowException($data, 'category_id'),
                $this->getValueOrThrowException($data, 'group_id')
            )
        );
    }

	public function getGroupById($group_id) {

		$groups = Flight::db()->query("SELECT * FROM groepen WHERE id=" . $group_id);

		if ($groups) {
			while ($group = $groups->fetch_array()) {

				$results[] = $group;
			}

			return $results[0];
		} else {
			return null;
		}
	}

	public function getGroupByName($group_name) {

		$groups = Flight::db()->query("SELECT * FROM groepen WHERE naam='" . $group_name . "'");

		if ($groups) {
			while ($group = $groups->fetch_array()) {

				$results[] = $group;
			}

			return $results[0];
		} else {
			return null;
		}
	}

	public function deleteGroupById($group_id) {

		$result = Flight::db()->query("DELETE FROM groepen WHERE id=" . $group_id);

		if ($result) {

			$result = Flight::db()->query("DELETE FROM model_groepen WHERE id_groep=" . $group_id);

			if ($result) {
				return true;
			} else {
				return false;
			}
		} else {

			return false;
		}
	}

	public function updateGroup($group_id, $data) {

		$result = Flight::db()->query("UPDATE groepen SET naam='" . $data['name'] . "' WHERE id=" . $group_id);

		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function addModelToGroup($group_id, $model_id) {

		$result = Flight::db()->query("INSERT INTO model_groepen ( id_groep, id_model) VALUES (" . $group_id . "," . $model_id . ")");

		if ($result) {

			return true;
		} else {

			return false;
		}
	}

	public function removeModelFromGroup($group_id, $model_id) {

		$result = Flight::db()->query("DELETE FROM model_groepen WHERE id_groep=" . $group_id . " AND id_model=" . $model_id);

		if ($result) {

			return true;
		} else {

			return false;
		}
	}

	public function createGroup($data)
    {
        $result = $this->query(
            sprintf(
                'INSERT INTO groepen(naam) VALUES (\'%s\')',
                $this->getValueOrThrowException($data, 'name')
            )
        );

		if ($result) {
			return Flight::db()->insert_id;
		} else {
			return false;
		}
	}

####################################################################
	#########################MODELS#####################################

	public function deleteVideoByModelId($data)
    {
		$result = Flight::db()->query("DELETE FROM `model_videos` WHERE `model_id`=" . $data['model_id'] . " AND `code`='" . $data['video_id'] . "'");

		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function setModelField($data, $model_id)
    {
		foreach ($data as $key => $value) {
			Flight::db()->query(sprintf("UPDATE model SET %s=%s WHERE model_id=%s", $key, $value, $model_id));
		}
	}

    /**
     * @return array|bool
     */
	public function getHomepageModels()
    {
		$rows = Flight::db()->query("
            SELECT `model`.* FROM `model` 
            INNER JOIN `order_meta` ON `model`.`model_id` = `order_meta`.`item_id`
            WHERE (`order_meta`.`item_group_name`='homepage_model' OR `order_meta`.`item_group_name` IS NULL)
            AND `model`.`accepted`=1
            AND `model`.`nieuw_actief`=1 
            AND `model`.`declined`=0
            ORDER BY `model`.`model_id` DESC
            LIMIT 0,5
        ");

		if ($rows) {
            $results = [];

			while ($row = $rows->fetch_assoc()) {
                $row['images'] = $this->getModelImagesById($row['model_id'], true);

                $results[(int) $row['model_id']] = $row;
			}

            krsort($results);

			return $results;
		}

		return false;
	}

	public function setHomepageModel($model_id, $position)
    {
		Flight::db()->query(sprintf("DELETE FROM `order_meta` WHERE `item_id`=%s AND `item_group_name`='homepage_model'", $model_id));

		if ($position) {
            return Flight::db()->query(sprintf("INSERT INTO `order_meta` (`position`,`item_id`,`item_group_name`) VALUES (%s,%s,'homepage_model')", $position, $model_id));
		} else {
			return null;
		}
	}

	public function isHomepageModel($id) {
        $results = Flight::db()->query(sprintf("SELECT COUNT(*) as count FROM `order_meta` WHERE `item_id`=%s AND `item_group_name`='homepage_model'", $id));

        while ($result = $results->fetch_assoc()) {
            return (bool) $result['count'];
        }

    }

	public function isVideoExist($data)
	{
		$result = Flight::db()->query("SELECT * FROM `model_videos` WHERE `model_id`=" . $data['model_id'] . " AND `code`='" . $data['video_id'] . "'");

		if ($result->num_rows) {
			return true;
		} else {
			return false;
		}
	}

	public function approveModel($data)
	{

		if ($data['model_id'] > 100000) {
			$models = Flight::db()->query("SELECT MAX(model_id) + 1 AS nextID FROM model WHERE model_id < 100000;");

			if ($models) {
				while ($model = $models->fetch_array()) {
					$model_id_lowest = $model['nextID'];
				}
			}

			if (isset($model_id_lowest) && $data['model_id'] > 100000) {
				$query = Flight::db()->query("UPDATE model SET model_id =$model_id_lowest, accepted=1,declined=0 WHERE model_id=" . $data['model_id']);
			}

			if ($query && isset($model_id_lowest) && $data['model_id'] > 100000) {
                $query = Flight::db()->query("UPDATE modelcategory SET model_id =" . $model_id_lowest . " WHERE model_id=" . $data['model_id']);
                $query = Flight::db()->query("UPDATE model_groepen SET id_model=" . $model_id_lowest . " WHERE id_model=" . $data['model_id']);
                $query = Flight::db()->query("UPDATE model_images SET id_model=" . $model_id_lowest . " WHERE id_model=" . $data['model_id']);
                $query = Flight::db()->query("UPDATE model_site_images SET id_model=" . $model_id_lowest . " WHERE id_model=" . $data['model_id']);
                $query = Flight::db()->query("UPDATE selecties_models SET id_model=" . $model_id_lowest . " WHERE id_model=" . $data['model_id']);
                $query = Flight::db()->query("UPDATE model_videos SET model_id=" . $model_id_lowest . " WHERE model_id=" . $data['model_id']);
                $query = Flight::db()->query("UPDATE _log SET id_model=" . $model_id_lowest . " WHERE id_model=" . $data['model_id']);

                rename($_SERVER['DOCUMENT_ROOT'] . "/models/" . $data['model_id'], $_SERVER['DOCUMENT_ROOT'] . "/models/" . $model_id_lowest);
                $email = (new Repository_Email())->findByCode(Enum_EmailCode::MODEL_ACCEPTED);

                $user = new Entity_Model($model_id_lowest);
                (new Mailer_LoggerProxy(new Mailer_Sender(Enum_Mail::COMMON_REPLY)))->send($user, $email, []);

                if (ENVIRONMENT == Enum_Environment::PRODUCTION) {
                    (new Synchronizer_Composite())->synchronize(
                        sprintf("INSERT INTO `model`(`model_id`, `naam`, `voornaam`, `geslacht`, `geboortedatum`, `lengte`, `gewicht`, `straat`, `nummer`, `provincie`, `gemeente`, `postcode`, `beroep`, `studierichting`, `telefoon`, `gsm`, `email`, `homepage`, `ervaring_1`, `ervaring_2`, `ervaring_3`, `ervaring_4`, `ervaring_5`, `ervaring_6`, `ervaring_7`, `ervaring_8`, `maten_schoenen`, `maten_borst`, `maten_taille`, `maten_heupen`, `maten_cup`, `maten_kleding`, `maten_kostuum`, `maten_jeans`, `code`, `datum`, `updated`, `catmodel`, `land`) VALUES ('%s','%s','%s','%s','%s','','','','',0,'','','','','%s','%s','%s','','','','','','','','','','','','','','','','','','%s','%s','%s',0,'')",
                            $user->getId(),
                            $user->getSurname(),
                            $user->getName(),
                            $user->getAge(),
                            $user->getBornDate()->format('Y-m-d H:i:s'),
                            $user->getPhone(),
                            $user->getSecondPhone(),
                            $user->getEmail(),
                            $user->getPassword(),
                            $user->getRegistrationDate()->format('Y-m-d H:i:s'),
                            $user->getUpdatedDate()->format('Y-m-d H:i:s')
                        )
                    );
				}
            }

			if ($query) {
				return $model_id_lowest;
			} else {
				return false;
			}
		} else {
			$query = Flight::db()->query("UPDATE model SET accepted=1,declined=0 WHERE model_id=" . $data['model_id']);

			if ($query) {
				return $data['model_id'];
			} else {
				return false;
			}
		}
	}

	public function addModelToFavorite($data)
    {
		$result = Flight::db()->query("UPDATE model_groepen SET favorite=" . $data['value'] . " WHERE id_model=" . $data['model_id'] . " AND id_groep=" . $data['group_id']);

		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function addModelToCategory($data)
    {
		$result = Flight::db()->query(sprintf("INSERT INTO `modelcategory`(`model_id`, `category_id`) VALUES (%s,%s)", $data['model_id'], $data['category_id']));

		if (array_key_exists($data['category_id'], DBController::GROUP_MAP)) {
			if (!preg_match('/_/', DBController::GROUP_MAP[$data['category_id']])) {
				$this->addModelToGroup(DBController::GROUP_MAP[$data['category_id']], $data['model_id']);
			} else {
				$groups = explode('_', DBController::GROUP_MAP[$data['category_id']]);

				foreach ($groups as $key => $group) {
					$this->addModelToGroup($group, $data['model_id']);
				}
			}
		}

		$model = $this->getModelById($data['model_id']);

		if ($model && strtotime('20-05-2016') > strtotime($model['datum'])) {
			if (array_key_exists($data['category_id'], DBController::GROUP_MAP_TYPE_TWO)) {
				if (!preg_match('/_/', DBController::GROUP_MAP_TYPE_TWO[$data['category_id']])) {
					$this->addModelToGroup(DBController::GROUP_MAP_TYPE_TWO[$data['category_id']], $data['model_id']);
				} else {
					$groups = explode('_', DBController::GROUP_MAP_TYPE_TWO[$data['category_id']]);

					foreach ($groups as $key => $group) {
						$this->addModelToGroup($group, $data['model_id']);
					}
				}
			}
		}

		return $result;
	}

	public function deleteModelFromCategory($data)
    {

		$result = Flight::db()->query(sprintf("DELETE FROM modelcategory WHERE model_id=%s AND category_id=%s", $data['model_id'], $data['category_id']));

		if (array_key_exists($data['category_id'], DBController::GROUP_MAP)) {
			if (!preg_match('/_/', DBController::GROUP_MAP[$data['category_id']])) {
				$this->removeModelFromGroup(DBController::GROUP_MAP[$data['category_id']], $data['model_id']);
			} else {
				$groups = explode('_', DBController::GROUP_MAP[$data['category_id']]);

				foreach ($groups as $key => $group) {
					$this->removeModelFromGroup($group, $data['model_id']);
				}
			}
		}

		$model = $this->getModelById($data['model_id']);

		if ($model && strtotime('20-05-2016') > strtotime($model['datum'])) {
			if (array_key_exists($data['category_id'], DBController::GROUP_MAP_TYPE_TWO)) {
				if (!preg_match('/_/', DBController::GROUP_MAP_TYPE_TWO[$data['category_id']])) {
					$this->removeModelFromGroup(DBController::GROUP_MAP_TYPE_TWO[$data['category_id']], $data['model_id']);
				} else {
					$groups = explode('_', DBController::GROUP_MAP_TYPE_TWO[$data['category_id']]);

					foreach ($groups as $key => $group) {
						$this->removeModelFromGroup($group, $data['model_id']);
					}
				}
			}
		}

		return $result;
	}

	public function deleteModelFromCategories($data)
    {

		$result = Flight::db()->query(sprintf("DELETE FROM modelcategory WHERE model_id=%s", $data['model_id']));

		foreach (DBController::GROUP_MAP as $category_id => $group_id) {
			if (!preg_match('/_/', DBController::GROUP_MAP[$category_id])) {
				$this->removeModelFromGroup(DBController::GROUP_MAP[$category_id], $data['model_id']);
			} else {
				$groups = explode('_', DBController::GROUP_MAP[$category_id]);

				foreach ($groups as $key => $group) {
					$this->removeModelFromGroup($group, $data['model_id']);
				}
			}
		}

		$model = $this->getModelById($data['model_id']);

		if ($model && strtotime('20-05-2016') > strtotime($model['datum'])) {
			foreach (DBController::GROUP_MAP_TYPE_TWO as $category_id => $group_id) {
				if (!preg_match('/_/', DBController::GROUP_MAP_TYPE_TWO[$category_id])) {
					$this->removeModelFromGroup(DBController::GROUP_MAP_TYPE_TWO[$category_id], $data['model_id']);
				} else {
					$groups = explode('_', DBController::GROUP_MAP_TYPE_TWO[$category_id]);

					foreach ($groups as $key => $group) {
						$this->removeModelFromGroup($group, $data['model_id']);
					}
				}
			}
		}

		return $result;
	}

	public function getNextModel($data, $accepted = true)
    {

		if ($accepted) {
			$options = ' AND accepted=1 AND declined=0 AND nieuw_actief>0 ';
		} else {
			$options = '';
		}

		$rows = Flight::db()->query("SELECT * FROM model WHERE model_id>" . $data['model_id'] . $options . " ORDER BY model_id ASC LIMIT 1");

		if ($rows) {
			while ($row = $rows->fetch_array()) {
				$results[] = $row;
			}
			if (isset($results[0])) {
				return $results[0];
			} else {
				return null;
			}
		} else {
			return null;
		}
	}

	public function getPreviousModel($data, $accepted = true)
    {

		if ($accepted) {
			$options = ' AND accepted=1 AND declined=0 AND nieuw_actief>0 ';
		} else {
			$options = '';
		}

		$rows = Flight::db()->query("SELECT * FROM model WHERE model_id<" . $data['model_id'] . $options . " ORDER BY model_id DESC LIMIT 1");

		if ($rows) {
			while ($row = $rows->fetch_array()) {
				$results[] = $row;
			}
			if (isset($results[0])) {
				return $results[0];
			} else {
				return null;
			}
		} else {
			return null;
		}
	}

	public function getModelsByGroup($group_id) {

		$rows = Flight::db()->query("SELECT * FROM model_groepen WHERE id_groep=" . $group_id);
		if ($rows) {
			while ($row = $rows->fetch_array()) {
				$results[] = $this->getModelById($row['id_model']);
			}
			return $results;
		} else {
			return null;
		}
	}

	public function getModelByEmail($data) {

		$rows = Flight::db()->query("SELECT * FROM model WHERE email='" . $data['email'] . "'");
		if ($rows) {
			while ($row = $rows->fetch_array()) {
				$results[] = $row;
			}
			return $results[0];
		} else {
			return null;
		}
	}

	public function getModelsByEmail($data) {

		$rows = Flight::db()->query("SELECT * FROM model WHERE email='" . $data['email'] . "'");
		if ($rows) {
			while ($row = $rows->fetch_array()) {
				$results[] = $row;
			}
			return $results;
		} else {
			return null;
		}
	}

	public function getModelsByCategory($from, $to, $category_id) {

		$rows = Flight::db()->query("SELECT * FROM modelcategory WHERE category_id=" . $category_id . " LIMIT " . $from . "," . $to);
		if ($rows) {
			while ($row = $rows->fetch_array()) {
				$model = $this->getModelById($row['model_id']);
				if ($model) {
					$results[] = $model;
				}
			}
			return $results;
		} else {
			return null;
		}
	}

	public function getLastModels($quantity) {

		$models = Flight::db()->query("SELECT * FROM model WHERE accepted = 1 AND nieuw_actief=1 AND declined=0  ORDER BY model_id DESC LIMIT " . $quantity);

		if ($models) {
			if ($models->num_rows) {

				while ($model = $models->fetch_array()) {

					$item = $model;

					$images = Flight::db()->query("SELECT * FROM model_site_images WHERE id_model=" . $model['model_id'] . " ORDER BY volgorde ASC");
					if ($images) {
						while ($image = $images->fetch_array()) {

							if (file_exists("models/" . $model['model_id'] . "/website/thumbs/" . $image['id'] . ".jpg")) {

								$item['images'][] = $image;
							} else {
								$item['images'][] = array('id' => 'no_foto');
							}
						}
					} else {

						$item['images'][] = array('id' => 'no_foto');
					}

					$results[] = $item;
				}

				return $results;
			} else {
				return null;
			}
		} else {
			return null;
		}
	}

	public function getModels($from, $to) {

		$models = Flight::db()->query("SELECT * FROM model WHERE accepted = 1 AND nieuw_actief=1 AND declined=0 ORDER BY datum DESC LIMIT " . $from . "," . $to);

		if ($models) {
			if ($models->num_rows) {

				while ($model = $models->fetch_array()) {

					$item = $model;

					$images = Flight::db()->query("SELECT * FROM model_site_images WHERE id_model=" . $model['model_id'] . " ORDER BY volgorde ASC");
					if ($images) {
						while ($image = $images->fetch_array()) {

							if (file_exists("models/" . $model['model_id'] . "/website/thumbs/" . $image['id'] . ".jpg")) {

								$item['images'][] = $image;
							} else {
								$item['images'][] = array('id' => 'no_foto');
							}
						}
					} else {

						$item['images'][] = array('id' => 'no_foto');
					}

					$results[] = $item;
				}

				return $results;
			} else {
				return null;
			}
		} else {
			return null;
		}
	}

	public function getModelsWithFilters($data) {

		$join = '';

		if ($data['sorted_by'] == 'new') {

			$sorted_by = 'ORDER BY model_id DESC';
		} elseif ($data['sorted_by'] == 'old') {

			$sorted_by = 'ORDER BY model_id ASC';
		} elseif ($data['sorted_by'] == 'favorite') {

			$select = 'SELECT * FROM model_groepen WHERE ';
			$select_end = '';
			if (isset($data['specific'])) {

				foreach ($data['specific'] as $key => $value) {

					if ($key) {
						$select_end .= ' OR';
					}

					$select_end .= ' ( id_groep=' . $value . ' ) ';
				}
			}

			if (isset($data['category'])) {
				$category = $this->getMainCategoryById($data['category']);

				if ($category) {
					$subGroups = explode('_', $category['subtype']);

					if ($subGroups[0] == 'group') {
						foreach ($subGroups as $key => $group) {
							if (intval($group)) {
								if ($select_end != '') {
									$select_end .= ' OR ';
								}

								$select_end .= ' (id_groep=' . intval($group) . ') ';
							}
						}
					}
				}
			}

			if ($select_end == '') {
				$sorted_by = 'ORDER BY model_id DESC';
			} else {
				$select .= $select_end;
				$sorted_by = 'GROUP BY model_id ORDER BY group_table.favorite DESC,model_id DESC';
				$join = ' INNER JOIN (' . $select . ') AS group_table ON group_table.id_model=model.model_id ';
			}
		} elseif ($data['sorted_by'] == 'rand') {
			$sorted_by = 'ORDER BY RAND()';
		} else {
			$sorted_by = 'ORDER BY model_id DESC';
		}

		$filters = '';

		if (isset($data['search'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( (model_id="' . $data['search'] . '") OR  (voornaam LIKE "%' . $data['search'] . '%") OR  (nieuw_ervaring LIKE "%' . $data['search'] . '%") OR  (talenten LIKE "%' . $data['search'] . '%") OR (nieuw_opmerking LIKE "%' . $data['search'] . '%") ) ';
		}

		if (isset($data['basic_search'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( (model_id="' . $data['basic_search'] . '") OR  (voornaam LIKE "%' . $data['basic_search'] . '%") ) ';
		}

		if (isset($data['cms_search'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( (model_id="' . $data['cms_search'] . '") OR  (voornaam LIKE "%' . $data['cms_search'] . '%") OR  (naam LIKE "%' . $data['cms_search'] . '%")  OR  (email LIKE "%' . $data['cms_search'] . '%") ) ';
		}

		if (isset($data['talent_search'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( (nieuw_ervaring LIKE "%' . $data['talent_search'] . '%") OR  (talenten LIKE "%' . $data['talent_search'] . '%") OR (nieuw_opmerking LIKE "%' . $data['talent_search'] . '%") ) ';
		}

		if (isset($data['accepted'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			if (isset($data['cms_search']) || isset($data['talent_search'])) {
				$filters .= ' ( declined = 0 ) ';
			} else {
                if (isset($data['cms']) || isset($data['selection'])) {
                    $filters .= ' ( accepted=' . $data['accepted'] . ' AND declined = 0 AND nieuw_actief>0 ) ';
                } else {
                    $filters .= ' ( accepted=' . $data['accepted'] . ' AND declined = 0 AND nieuw_actief=1 ) ';
                }
			}
		}

		if (!isset($data['cms_search']) && !isset($data['talent_search'])) {
			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

            if (isset($data['cms']) || isset($data['selection'])) {
                $filters .= ' ( nieuw_actief>0 ) ';
            } else {
                $filters .= ' ( nieuw_actief=1 ) ';
            }
		}

        if (isset($data['country'])) {

            if ($filters != '') {
                $filters .= ' AND ';
            } else {
                $filters .= ' WHERE ';
            }

            $filters .= ' ( country_origin_id="' . $data['country'] . '") ';
        }

		if (isset($data['sex'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( geslacht="' . $data['sex'] . '") ';
		}

		if (isset($data['int_maat'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( int_maat="' . $data['int_maat'] . '") ';
		}

		if (isset($data['bust'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( maten_borst=' . $data['bust'] . ') ';
		}

		if (isset($data['cup_letter'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( maten_cup_letter="' . $data['cup_letter'] . '") ';
		}

		if (isset($data['waist'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( maten_taille=' . $data['waist'] . ') ';
		}

		if (isset($data['hips'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( maten_heupen=' . $data['hips'] . ') ';
		}

		if (isset($data['jeans_size'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( maten_jeans=' . $data['jeans_size'] . ') ';
		}

		if (isset($data['shoe_size'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( maten_schoenen="' . $data['shoe_size'] . '") ';
		}

		if (isset($data['clothing_size'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( maten_kleding="' . $data['clothing_size'] . '") ';
		}

		if (isset($data['costum_size'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( maten_kostuum="' . $data['costum_size'] . '") ';
		}

		if (isset($data['cup_size'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( maten_cup="' . $data['cup_size'] . '") ';
		}

		if (isset($data['cat']) && isset($data['category'])) {

			if ($data['category'] == 201 || $data['category'] == 202) {

				if ($filters != '') {
					$filters .= ' AND ';
				} else {
					$filters .= ' WHERE ';
				}

				foreach ($data['cat'] as $key => $value) {

					if (! isset($periods)) {
						$periods = '';
					}

					if ($key) {
						$periods .= ' OR';
					}
					if ($data['category'] == 201) {
						switch ($value) {
						case '0':

							$group = $this->getGroupByName('People 1');

							if ($group) {

								$period = ' ( model_id IN (SELECT id_model FROM model_groepen WHERE id_groep=' . $group['id'] . ')) ';
							}

							break;
						case '1':

							$group = $this->getGroupByName('People 2');

							if ($group) {

								$period = ' ( model_id IN (SELECT id_model FROM model_groepen WHERE id_groep=' . $group['id'] . ')) ';
							}

							break;
						default:
							# code...
							break;
						}
					} else {
						switch ($value) {
						case '0':
							$group = $this->getGroupByName('Modellen 1');

							if ($group) {

								$period = ' ( model_id IN (SELECT id_model FROM model_groepen WHERE id_groep=' . $group['id'] . ')) ';
							}
							break;
						case '1':
							$group = $this->getGroupByName('Modellen 2');

							if ($group) {

								$period = ' ( model_id IN (SELECT id_model FROM model_groepen WHERE id_groep=' . $group['id'] . ')) ';
							}
							break;
						default:
							# code...
							break;
						}
					}

					$periods .= $period;
				}

				$filters .= '(' . $periods . ')';
			}
		}

		foreach ($data as $filterKey => $filterValue) {
			if (preg_match('/filter/ui', $filterKey)) {
				if ($filters != '') {
					$filters .= ' AND ';
				} else {
					$filters .= ' WHERE ';
				}

				$periods = '';

				foreach ($filterValue as $key => $value) {
					if ($key) {
						$periods .= ' OR';
					}

					$period = ' ( model_id IN (SELECT model_id FROM modelcategory WHERE category_id=' . $value . ' )) ';
					$periods .= $period;
				}

				$filters .= '(' . $periods . ')';
			}
		}

		if (isset($data['category'])) {
			$category = $this->getMainCategoryById($data['category']);

			if ($category) {
				//$data['category']=$category['subtype'];
			}
			if ($category['subtype'] != 'all') {

				if ($filters != '') {
					$filters .= ' AND ';
				} else {
					$filters .= ' WHERE ';
				}

				if (preg_match('/age/ui', $category['subtype'])) {

					if (preg_match('/before/ui', $category['subtype'])) {

						$periods = ' (geboortedatum >="' . date('Y-m-d', strtotime("-" . preg_replace('/\D/ui', '', $category['subtype']) . " year", time())) . '") ';
					} else {

						$periods = ' (geboortedatum <="' . date('Y-m-d', strtotime("-" . preg_replace('/\D/ui', '', $category['subtype']) . " year", time())) . '") ';
					}

					$filters .= '(' . $periods . ')';
				} elseif (preg_match('/group/ui', $category['subtype'])) {
					if (preg_match('/_/', preg_replace('/group_/ui', '', $category['subtype']))) {

						$groups_cutted = explode('_', preg_replace('/group_/ui', '', $category['subtype']));
						$periods = '';
						foreach ($groups_cutted as $key => $value) {

							if ($periods != '') {
								$periods .= ' OR ';
							}

							$periods .= ' ( model_id IN (SELECT id_model FROM model_groepen WHERE id_groep=' . $value . ' )) ';
						}
					} else {
						$periods = ' ( model_id IN (SELECT id_model FROM model_groepen WHERE id_groep=' . preg_replace('/\D/ui', '', $category['subtype']) . ' )) ';
					}

					$filters .= '(' . $periods . ')';
				} else {

					$periods = '';

					if (preg_match('/_/', $category['subtype'])) {

						$categories = explode('_', $category['subtype']);

						foreach ($categories as $key => $value) {

							if ($key) {

								$periods .= ' OR';
							}

							$period = ' ( model_id IN (SELECT model_id FROM modelcategory WHERE category_id=' . $value . ' )) ';

							$periods .= $period;
						}
					} else {

						$periods = ' ( model_id IN (SELECT model_id FROM modelcategory WHERE category_id=' . $category['subtype'] . ' )) ';
					}

					$filters .= '(' . $periods . ')';
				}
			}
		}

		if (isset($data['age'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$periods = '';

			foreach ($data['age'] as $key => $value) {

				if ($key) {

					$periods .= ' OR';
				}

				switch ($value) {
				case '1':
					$period = ' (geboortedatum >="' . date('Y-m-d', strtotime("-25 year", time())) . '"' . ' AND geboortedatum <="' . date('Y-m-d', strtotime("-18 year", time())) . '") ';
					break;
				case '2':
					$period = ' (geboortedatum >="' . date('Y-m-d', strtotime("-35 year", time())) . '"' . ' AND geboortedatum <="' . date('Y-m-d', strtotime("-26 year", time())) . '") ';
					break;
				case '3':
					$period = ' (geboortedatum >="' . date('Y-m-d', strtotime("-55 year", time())) . '"' . ' AND geboortedatum <="' . date('Y-m-d', strtotime("-36 year", time())) . '") ';
					break;
				case '4':
					$period = ' (geboortedatum <="' . date('Y-m-d', strtotime("-55 year", time())) . '") ';
					break;
				case '5':
					$period = ' (geboortedatum >="' . date('Y-m-d', strtotime("-18 year", time())) . '"' . ' AND geboortedatum <="' . date('Y-m-d', strtotime("-12 year", time())) . '") ';
					break;
				case '6':
					$period = ' (geboortedatum >="' . date('Y-m-d', strtotime("-65 year", time())) . '"' . ' AND geboortedatum <="' . date('Y-m-d', strtotime("-55 year", time())) . '") ';
					break;
				case '7':
					$period = ' (geboortedatum >="' . date('Y-m-d', strtotime("-75 year", time())) . '"' . ' AND geboortedatum <="' . date('Y-m-d', strtotime("-65 year", time())) . '") ';
					break;
				case '8':
					$period = ' (geboortedatum >="' . date('Y-m-d', strtotime("-85 year", time())) . '"' . ' AND geboortedatum <="' . date('Y-m-d', strtotime("-75 year", time())) . '") ';
					break;
				case '9':
					$period = ' (geboortedatum <="' . date('Y-m-d', strtotime("-85 year", time())) . '") ';
					break;
				case '10':
					$period = ' (geboortedatum >="' . date('Y-m-d', strtotime("-14 year", time())) . '"' . ' AND geboortedatum <="' . date('Y-m-d', strtotime("-12 year", time())) . '") ';
					break;
				case '11':
					$period = ' (geboortedatum >="' . date('Y-m-d', strtotime("-18 year", time())) . '"' . ' AND geboortedatum <="' . date('Y-m-d', strtotime("-15 year", time())) . '") ';
					break;
				case '12':
					$period = ' (geboortedatum >="' . date('Y-m-d', strtotime("-12 year", time())) . '"' . ' AND geboortedatum <="' . date('Y-m-d', strtotime("-8 year", time())) . '") ';
					break;
				case '13':
					$period = ' (geboortedatum >="' . date('Y-m-d', strtotime("-8 year", time())) . '"' . ' AND geboortedatum <="' . date('Y-m-d', strtotime("-5 year", time())) . '") ';
					break;
				case '14':
					$period = ' (geboortedatum >="' . date('Y-m-d', strtotime("-5 year", time())) . '") ';
					break;
                case '15':
					$period = ' (geboortedatum >="' . date('Y-m-d', strtotime("-55 year", time())) . '"' . ' AND geboortedatum <="' . date('Y-m-d', strtotime("-45 year", time())) . '") ';
					break;
				case '16':
					$period = ' (geboortedatum >="' . date('Y-m-d', strtotime("-45 year", time())) . '"' . ' AND geboortedatum <="' . date('Y-m-d', strtotime("-35 year", time())) . '") ';
					break;
                default:
					break;
				}
				$periods .= $period;
			}
			$filters .= '(' . $periods . ')';
		}

		if (isset($data['category']) && $data['category'] == 203) {

            if ($filters != '') {
                $filters .= ' AND ';
            } else {
                $filters .= ' WHERE ';
            }

            $filters .= ' ( geboortedatum <="' . date('Y-m-d', strtotime("-8 year", time())) . '") ';
        }

		if (isset($data['length'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$periods = '';
			foreach ($data['length'] as $key => $value) {

				if ($key) {

					$periods .= ' OR';
				}

				switch ($value) {
				case '1':
					$period = ' (lengte <=174) ';
					break;
				case '2':
					$period = ' (lengte >=174 AND lengte <=180) ';
					break;
				case '3':
					$period = ' (lengte >=180) ';
					break;

				default:
					# code...
					break;
				}

				$periods .= $period;
			}

			$filters .= '(' . $periods . ')';
		}

        if (isset($data['native_language'])) {

            if ($filters != '') {
                $filters .= ' AND ';
            } else {
                $filters .= ' WHERE ';
            }

            $periods = '';

            foreach ($data['native_language'] as $key => $value) {
                if ($key) {
                    $periods .= ' OR';
                }

                $periods .= sprintf(" (moedertaal = '%s') ", $value);
            }

            $filters .= '(' . $periods . ')';
        }

		if (isset($data['specific'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$periods = '';
			foreach ($data['specific'] as $key => $value) {

				if ($key) {

					$periods .= ' OR';
				}

				$period = ' ( model_id IN (SELECT id_model FROM model_groepen WHERE id_groep=' . $value . ' )) ';

				$periods .= $period;
			}

			$filters .= '(' . $periods . ')';
		}

        if (isset($data['specific_cms'])) {

            if ($filters != '') {
                $filters .= ' AND ';
            } else {
                $filters .= ' WHERE ';
            }

            $periods = '';
            foreach ($data['specific_cms'] as $key => $value) {

                if ($key) {

                    $periods .= ' AND';
                }

                $period = ' ( model_id IN (SELECT id_model FROM model_groepen WHERE id_groep=' . $value . ' )) ';

                $periods .= $period;
            }

            $filters .= '(' . $periods . ')';
        }

		if (isset($data['selection'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$periods = ' ( model_id IN (SELECT selecties_models.id_model FROM selecties_models INNER JOIN selecties ON selecties_models.id_selectie=selecties.id  WHERE selecties.code=\'' . $data['selection'] . '\' )) ';

			$filters .= '(' . $periods . ')';
		}

        if (isset($data['selection_cms'])) {

            if ($filters != '') {
                $filters .= ' AND ';
            } else {
                $filters .= ' WHERE ';
            }

            $periods = ' ( model_id IN (SELECT id_model FROM selecties_models WHERE id_selectie=' . $data['selection_cms'] . ' )) ';

            $filters .= '(' . $periods . ')';
        }

		if (isset($data['lengte_start'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( CAST(lengte AS UNSIGNED) >=' . $data['lengte_start'] . ' AND lengte<>"") ';
		}

        if (isset($data['lengte_exactly'])) {

            if ($filters != '') {
                $filters .= ' AND ';
            } else {
                $filters .= ' WHERE ';
            }

            $filters .= ' ( CAST(lengte AS UNSIGNED) =' . $data['lengte_exactly'] . ' AND lengte<>"") ';
        }

		if (isset($data['lengte_end'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( CAST(lengte AS UNSIGNED) <=' . $data['lengte_end'] . ' AND lengte<>"") ';
		}

		if (isset($data['weight_start'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( CAST(gewicht AS UNSIGNED) >=' . $data['weight_start'] . ' AND gewicht<>"") ';
		}

		if (isset($data['weight_end'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( CAST(gewicht AS UNSIGNED) <=' . $data['weight_end'] . ' AND gewicht<>"") ';
		}

		if (isset($data['waist_start'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( CAST(maten_taille AS UNSIGNED) >=' . $data['waist_start'] . ' AND maten_taille<>"") ';
		}

		if (isset($data['waist_end'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( CAST(maten_taille AS UNSIGNED) <=' . $data['waist_end'] . ' AND maten_taille<>"") ';
		}

		if (isset($data['shoe_size_start'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( CAST(maten_schoenen AS UNSIGNED) >=' . $data['shoe_size_start'] . ' AND maten_schoenen<>"") ';
		}

		if (isset($data['shoe_size_end'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( CAST(maten_schoenen AS UNSIGNED) <=' . $data['shoe_size_end'] . ' AND maten_schoenen<>"") ';
		}

        if (isset($data['id_start'])) {

            if ($filters != '') {
                $filters .= ' AND ';
            } else {
                $filters .= ' WHERE ';
            }

            $filters .= ' ( model.model_id >=' . $data['id_start'] . ' ) ';
        }

        if (isset($data['id_end'])) {

            if ($filters != '') {
                $filters .= ' AND ';
            } else {
                $filters .= ' WHERE ';
            }

            $filters .= ' ( model.model_id <=' . $data['id_end'] . ' ) ';
        }

		if (isset($data['jeans_size_start'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( CAST(maten_jeans AS UNSIGNED) >=' . $data['jeans_size_start'] . ' AND maten_jeans<>"") ';
		}

		if (isset($data['jeans_size_end'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( CAST(maten_jeans AS UNSIGNED) <=' . $data['jeans_size_end'] . ' AND maten_jeans<>"") ';
		}

		if (isset($data['hips_start'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( CAST(maten_heupen AS UNSIGNED) >=' . $data['hips_start'] . ' AND maten_heupen<>"") ';
		}

		if (isset($data['hips_end'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( CAST(maten_heupen AS UNSIGNED) <=' . $data['hips_end'] . ' AND maten_heupen<>"") ';
		}

		if (!empty($data['cup_size_start']) || !empty($data['cup_size_end'])) {
            $list = ['AA', 'A', 'B', 'C', 'D', 'DD', 'E', 'F', 'G'];
            $isFound = false;

            if (empty($data['cup_size_start'])) {
                $data['cup_size_start'] = '';
                $isFound = true;
            }

            if (empty($data['cup_size_end'])) {
                $data['cup_size_end'] = '';
            }

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

            $cupFilter = '';

			foreach ($list as $element) {
			    if ($data['cup_size_start'] == $element || $isFound || $data['cup_size_end'] == $element) {
			        if (!empty($cupFilter)) {
			            $cupFilter .= ' OR ';
                    }

                    if ($data['cup_size_start'] == $element) {
                        $isFound = true;
                    }

                    if ($data['cup_size_end'] == $element) {
                        $isFound = false;
                    }

                    $cupFilter .= ' maten_cup_letter = "' . $element . '" ';
                }
            }

            $filters .= ' (' . $cupFilter . ') ';
        }

		if (isset($data['cup_size_number_start'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( CAST(maten_cup AS UNSIGNED) >=' . $data['cup_size_number_start'] . ' AND maten_cup<>"") ';
		}

		if (isset($data['cup_size_number_end'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( CAST(maten_cup AS UNSIGNED) <=' . $data['cup_size_number_end'] . ' AND maten_cup<>"") ';
		}

        if (isset($data['costum_size_start'])) {

            if ($filters != '') {
                $filters .= ' AND ';
            } else {
                $filters .= ' WHERE ';
            }

            $filters .= ' ( CAST(maten_kostuum AS UNSIGNED) >=' . $data['costum_size_start'] . ' AND maten_kostuum<>"") ';
        }

        if (isset($data['costum_size_end'])) {

            if ($filters != '') {
                $filters .= ' AND ';
            } else {
                $filters .= ' WHERE ';
            }

            $filters .= ' ( CAST(maten_kostuum AS UNSIGNED) <=' . $data['costum_size_end'] . ' AND maten_kostuum<>"") ';
        }

		if (isset($data['clothing_size_start'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( CAST(maten_kleding AS UNSIGNED) >=' . $data['clothing_size_start'] . ' AND maten_kleding<>"") ';
		}

		if (isset($data['clothing_size_end'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( CAST(maten_kleding AS UNSIGNED) <=' . $data['clothing_size_end'] . ' AND maten_kleding<>"") ';
		}

		if (isset($data['bust_start'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( CAST(maten_borst AS UNSIGNED) >=' . $data['bust_start'] . ' AND maten_borst<>"") ';
		}

		if (isset($data['bust_end'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' ( CAST(maten_borst AS UNSIGNED) <=' . $data['bust_end'] . ' AND maten_borst<>"") ';
		}

		if (isset($data['age_start'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' (geboortedatum <="' . date('Y-m-d', strtotime("-" . $data['age_start'] . " year", time())) . '") ';
		}

        if (isset($data['age_exactly'])) {

            if ($filters != '') {
                $filters .= ' AND ';
            } else {
                $filters .= ' WHERE ';
            }

            $filters .= ' (geboortedatum <= "' . date('Y-m-d', strtotime("-" . $data['age_exactly'] . " year", time())) . '"  AND geboortedatum >= "' . date('Y-m-d', strtotime("-" . $data['age_exactly'] - 1 . " year", time())) . '") ';
        }

		if (isset($data['age_end'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' (geboortedatum >="' . date('Y-m-d', strtotime("-" . $data['age_end'] . " year", time())) . '") ';
		}
		if (isset($data['kinder_start']) && isset($data['kinder_end'])) {

			if ($filters != '') {
				$filters .= ' AND ';
			} else {
				$filters .= ' WHERE ';
			}

			$filters .= ' (nieuw_kind_maat_min BETWEEN ' . $data['kinder_start'] . ' AND ' . $data['kinder_end'] . ' OR nieuw_kind_maat_max BETWEEN ' . $data['kinder_start'] . ' AND ' . $data['kinder_end'] . ')';
		} else {
			if (isset($data['kinder_start'])) {

				if ($filters != '') {
					$filters .= ' AND ';
				} else {
					$filters .= ' WHERE ';
				}

				$filters .= ' (nieuw_kind_maat_min >=' . $data['kinder_start'] . ' AND nieuw_kind_maat_min<> 0 AND nieuw_kind_maat_min<>"") ';
			}

			if (isset($data['kinder_end'])) {

				if ($filters != '') {
					$filters .= ' AND ';
				} else {
					$filters .= ' WHERE ';
				}

				$filters .= ' (nieuw_kind_maat_max <= ' . $data['kinder_end'] . ' AND nieuw_kind_maat_max<> 0 AND nieuw_kind_maat_max<>"") ';
			}
		}

		if (Flight::bg()->checkLoggedInCms()) {
			$addition = ' `email`, ';
		} else {
			$addition = '';
		}

		$models = Flight::db()->query("SELECT " . $addition . "`model_id`, `naam`, `voornaam`, `geslacht`, `geboortedatum`, `lengte`, `gewicht`, `gemeente`, `beroep`, `studierichting`, `maten_schoenen`, `maten_borst`, `maten_taille`, `maten_heupen`, `maten_cup`, `maten_kleding`, `maten_kostuum`, `maten_jeans`, `datum`, `updated`, `catmodel`, `land`, `moedertaal`, `nieuw_actief`, `nieuw_ervaring`, `nieuw_kind_maat_min`, `nieuw_kind_maat_max`, `nieuw_soort_fotos`, `nieuw_info_portfolio`, `nieuw_opmerking`, `accepted`, `is_update`, `declined`, `maten_cup_letter`, `maten_jeans_second`, `talenten`,`int_maat`,`maten_cup_letter`,`maten_cup`, `fotografen`,`nieuw_actief` FROM model " . $join . " " . $filters . " " . $sorted_by . " LIMIT " . $data['from'] . "," . $data['to']);

		if ($models) {

			$models_count = Flight::db()->query("SELECT count(*) FROM (SELECT * FROM model " . $filters . ") src");

			$count = 21;

			if ($models_count) {

				while ($count = $models_count->fetch_array()) {

					$count_result[] = $count;
				}

				$results['count'] = $count_result[0];
				$count = $count_result[0][0];
			}

			while ($model = $models->fetch_assoc()) {
				$item = $model;

				if (isset($data['group_id'])) {
					if (!preg_match('/,/ui', $data['group_id'])) {
						$model_favorite = Flight::db()->query("SELECT * FROM model_groepen WHERE id_model=" . $model['model_id'] . " AND id_groep=" . $data['group_id']);
						if ($model_favorite) {

							while ($favorite = $model_favorite->fetch_array()) {

								$item['favorites'] = $favorite['favorite'];
							}
						} else {

							$item['favorites'] = 0;
						}
					}
				}

				$item['images'] = $this->getModelImagesById($model['model_id'], true);

				if ($count < 20) {
					$item['info'] = $this->getModelAdditionInformation($model['model_id']);
					$item['groups'] = $this->getModelGroups($model['model_id']);
					$item['length'] = $this->getLengthId($model['lengte']);
					$item['age'] = $this->getAgeId($model['geboortedatum']);
				}
				$results[] = $item;
			}

			return $results;
		} else {

			return null;
		}
	}

	public function getModelById($id, $access = null) {
		if (! $access) {
			$select = '*';
            $addition = '';
		} else {
			$select = '`model_id`, `naam`, `voornaam`, `geslacht`, `geboortedatum`, `lengte`, `gewicht`, `gemeente`, `beroep`, `studierichting`, `maten_schoenen`, `maten_borst`, `maten_taille`, `maten_heupen`, `maten_cup`, `maten_kleding`, `maten_kostuum`, `maten_jeans`, `datum`, `updated`, `catmodel`, `land`, `moedertaal`, `nieuw_actief`, `nieuw_ervaring`, `nieuw_kind_maat_min`, `nieuw_kind_maat_max`, `nieuw_soort_fotos`, `nieuw_info_portfolio`, `nieuw_opmerking`, `accepted`, `is_update`, `declined`, `maten_cup_letter`, `maten_jeans_second`, `talenten`,`int_maat`,`maten_cup_letter`,`maten_cup`, `fotografen`,`nieuw_actief` ';
            $addition = ' AND nieuw_actief>0 ';
        }

		$models = Flight::db()->query("SELECT " . $select . " FROM model WHERE model_id=" . $id . $addition);

		if ($models) {
			while ($model = $models->fetch_assoc()) {
				$item = $model;
				$item['images'] = $this->getModelImagesById($id, true);
				$item['info'] = $this->getModelAdditionInformation($id);
				$item['videos'] = $this->getModelVideosById($id);
				$results[] = $item;
			}
			return $results[0];
		} else {
			return null;
		}
	}

    /**
     * @return int
     */
    public function getNextModelId()
    {
        $ids = $this->query("SELECT MIN(t1.model_id + 1) AS nextID FROM model t1 LEFT JOIN model t2 ON t1.model_id + 1 = t2.model_id WHERE t2.model_id IS NULL AND t1.model_id>3557");

        if ($ids) {
            while ($id = $ids->fetch_assoc()) {
                return $this->getValueOrThrowException($id,'nextID');
            }
        }
    }

    /**
     * @param string $status
     * @param int $id
     */
    public function updateModelStatus($status, $id)
    {
        $this->query(
            sprintf(
                'UPDATE model SET %s WHERE model_id=%s', $status, $id
            )
        );
    }

    /**
     * @param $key
     * @param $value
     * @return mixed[]
     */
    public function getModelsByParam($key, $value)
    {
        $models = $this->query("SELECT * FROM model WHERE {$key} LIKE '%{$value}%'");

        if ($models) {
            while ($model = $models->fetch_assoc()) {
                $results[] = $model;
            }

            return $results;
        }
    }

    public function getModel($id, $access = null)
    {
        if (!$access) {
            $select = '*';
        } else {
            $select = '`model_id`, `naam`, `voornaam`, `geslacht`, `geboortedatum`, `lengte`, `gewicht`, `gemeente`, `beroep`, `studierichting`, `maten_schoenen`, `maten_borst`, `maten_taille`, `maten_heupen`, `maten_cup`, `maten_kleding`, `maten_kostuum`, `maten_jeans`, `datum`, `updated`, `catmodel`, `land`, `moedertaal`, `nieuw_actief`, `nieuw_ervaring`, `nieuw_kind_maat_min`, `nieuw_kind_maat_max`, `nieuw_soort_fotos`, `nieuw_info_portfolio`, `nieuw_opmerking`, `accepted`, `is_update`, `declined`, `maten_cup_letter`, `maten_jeans_second`, `talenten`,`int_maat`,`maten_cup_letter`,`maten_cup`, `fotografen`,`nieuw_actief` ';
        }

        $models = Flight::db()->query("SELECT " . $select . " FROM model WHERE model_id=" . $id . ' AND nieuw_actief>0 ');

        if ($models) {
            while ($model = $models->fetch_assoc()) {
                $item = $model;
                $item['images'] = $this->getModelImagesById($id, true);
                $item['info'] = $this->getModelAdditionInformation($id);
                $item['videos'] = $this->getModelVideosById($id);
                $results[] = $item;
            }
            return $results[0];
        } else {
            return null;
        }
    }

	public function getModelImagesById($id, $online = false, $pdf = false) {

		$options = '';

		if ($online) {
			$options .= ' AND online=1 ';
		}

		if ($pdf) {
			$options .= ' AND pdf=1 ';
		}

		$images = Flight::db()->query("SELECT * FROM model_site_images WHERE id_model=" . $id . $options . " ORDER BY volgorde ASC");
		if ($images) {
			while ($image = $images->fetch_array()) {
                if ($image['external']) {
                    $image['big'] = true;
                    $image['available'] = true;
                    $image['src_domain'] = EXTERNAL_IMAGES_SRC;
                    $results[] = $image;
                }
				elseif (file_exists("models/" . $id . "/website/thumbs/" . $image['id'] . ".jpg")) {
                    $image['src_domain'] = '';
                    if (file_exists("models/" . $id . "/website/middle/" . $image['id'] . ".jpg")) {
                        $image['big'] = true;
                    }
                    if (Flight::bg()->checkIsLogged()) {
                        $image['available'] = true;
                    } else {
                        $image['available'] = false;
                    }

                    $results[] = $image;
				}
			}

			if (!count($results)) {
				$results[] = [
                    'id' => 'no_foto',
                    'big' => false
                ];
			}
		} else {
            $results[] = [
                'id' => 'no_foto',
                'big' => false
            ];
		}

		return $results;
	}

    /**
     * @param $id
     * @param bool $active
     * @return array
     */
	public function getModelVideosById($id, $active = true) {
		if ($active) {
			$options = " AND active = 1";
		} else {
			$options = "";
		}

		$videos = Flight::db()->query("SELECT * FROM model_videos WHERE model_id=" . $id . $options);

		if ($videos) {
            $results = [];

			while ($video = $videos->fetch_array()) {

				$results[] = $video;
			}

			return $results;
		} else {
			return [];
		}
	}

	public function setModelVideoState($data) {

		$result = Flight::db()->query("UPDATE model_videos SET active =" . $data['state'] . " WHERE id=" . $data['video_id']);

		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function writeModelVideoById($data, $id) {

		$videos = Flight::db()->query("INSERT INTO `model_videos`( `model_id`, `code`, `timestamp`,`active`,`host`,`source`,`original_link`) VALUES (" . $id . ",'" . $data['code'] . "',now(),0,'" . $data['host'] . "','" . $data['source'] . "','" . $data['original_link'] . "')");

		if ($videos) {
			return $videos;
		} else {
			return null;
		}
	}

	public function deleteModelVideos($id) {

		$videos = Flight::db()->query("DELETE FROM model_videos WHERE model_id=" . $id);
		if ($videos) {
			return $videos;
		} else {
			return null;
		}
	}

	public function getLengthId($length)
    {
		if ($length < '174') {
			return 1;
		} elseif ($length >= '174' && $length < '180') {
			return 2;
		} elseif ($length >= '180') {
			return 3;
		} else {
			return 4;
		}
	}

	public function getAgeId($date)
    {
		$age = date('Y', time()) - date('Y', strtotime($date));

		if ($age > 18 && $age < 25) {
			$ids[] = 1;
		}
		if ($age >= 25 && $age < 35) {

			$ids[] = 2;
		}
		if ($age >= 35 && $age < 55) {

			$ids[] = 3;
		}
		if ($age > 55) {

			$ids[] = 4;
		}
		if ($age >= 12 && $age < 18) {

			$ids[] = 5;
		}
		if ($age >= 55 && $age < 65) {

			$ids[] = 6;
		}
		if ($age >= 65 && $age < 75) {

			$ids[] = 7;
		}
		if ($age >= 75 && $age < 85) {

			$ids[] = 8;
		}
		if ($age > 85) {

			$ids[] = 9;
		}
		if ($age >= 12 && $age < 15) {

			$ids[] = 10;
		}
		if ($age >= 15 && $age < 17) {

			$ids[] = 11;
		}
		if ($age >= 8 && $age < 12) {

			$ids[] = 12;
		}
		if ($age >= 5 && $age < 8) {

			$ids[] = 13;
		}
		if ($age < 5) {
			$ids[] = 14;
		}
		if ($age < 55 && $age >= 45) {
			$ids[] = 15;
		}
		if ($age < 45 && $age >= 35) {
			$ids[] = 16;
		}

		if (!empty($ids)) {
			return $ids;
		} else {
			return null;
		}
	}

	public function getModelGroups($id) {

		$groups = Flight::db()->query("SELECT * FROM model_groepen WHERE id_model=" . $id);

		if ($groups) {

			while ($group = $groups->fetch_array()) {

				$results[] = $this->getGroupById($group['id_groep']);
			}

			return $results;
		} else {

			return null;
		}
	}

    /**
     * @param $id
     * @return array|null
     */
    public function getModelAdditionInformation($id)
    {
		$categories = $this->query("SELECT * FROM modelcategory WHERE model_id=" . $id);
		$info = [];

		if ($categories) {
			while ($category = $categories->fetch_array()) {
				$category_info = $this->query("SELECT * FROM category WHERE category_id=" . $category['category_id']);
				if ($category_info) {
					while ($category_info_field = $category_info->fetch_array()) {
						$info[$category_info_field['subtype']][] = $category_info_field;
					}
				}
			}

			return $info;
		} else {
			return null;
		}
	}

    /**
     * @param string $query
     * @return array|null
     */
    public function smartSearch($query)
    {
		$results = $this->query('SELECT voornaam,model_id FROM model WHERE ( (model_id="' . $query . '") OR  (voornaam LIKE "%' . $query . '%") )');

        if ($results) {
			while ($result = $results->fetch_assoc()) {
				$searchResults[] = $result;
			}

			return isset($searchResults) ? $searchResults : null;
		} else {
			return null;
		}
	}

    /**
     * @param string $text
     * @return string
     */
    private function escapeChars($text) {
        return mysqli_real_escape_string(Flight::db() ,$text);
	}

    /**
     * @param $statement
     * @return mixed
     * @throws Exception_DB
     */
    private function query($statement)
    {
        $result = Flight::db()->query($statement);

        if (! $result) {
            throw new Exception_DB(Flight::db()->error);
        }

        return $result;
    }

    /**
     * @param array $container
     * @param string $key
     * @param mixed $else
     * @return mixed
     */
    private function getValueOrElse(array $container, $key, $else)
    {
        if (array_key_exists($key, $container)) {
            return $container[$key];
        }

        return $else;
    }

    /**
     * @param array $container
     * @param $key
     * @return mixed
     * @throws Exception_MissedParameter
     */
    private function getValueOrThrowException(array $container, $key)
    {
        if (array_key_exists($key, $container)) {
            return $container[$key];
        }

        throw new Exception_MissedParameter(sprintf('Required parameter \'%s\' is missing', $key));
    }
}
