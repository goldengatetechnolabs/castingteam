<?php

class Models extends Core_Controller
{
    /**
     * @param Account_Admin $account
     */
    public function __construct(Account_Admin $account)
    {
        parent::__construct($account);

        $this->smarty->assign('hoofdmenu_actief', 'inschrijvingen');
	}

	public function inactive()
    {
		$models = [];
		$query = Flight::db()->query("SELECT *, DATE_FORMAT(datum, '%d/%m/%Y') AS datum_tonen, DATE_FORMAT(updated, '%d/%m/%Y') AS updated_tonen FROM model WHERE nieuw_actief=0 AND declined=0 ORDER BY updated DESC");

		while ($r = $query->fetch_array()) {
			$images = $this->controller->getModelImagesById($r['model_id']);
            $model = $r;
            $this->smarty->assign('id', $r['model_id']);
            $model['email'] = $this->resolveEmail($model['email']);
            $models[$r['model_id']] = $model;

			if ($images) {
				$models[$r['model_id']]['images'] = $images;
			}
		}

		$this->smarty->assign('models', $models);
		$emails = [];
		$query = Flight::db()->query("SELECT * FROM emails ORDER BY titel");

		while ($r = $query->fetch_array()) {
			$emails[$r['id']] = $r;
		}

        $this->smarty->assign('emails', $emails);
		$archief = [];
		$query = Flight::db()->query("SELECT title, id, DATE_FORMAT(timestamp, '%d/%m/%Y') AS datum_tonen FROM model_mails ORDER BY timestamp DESC LIMIT 10");

		while ($r = $query->fetch_array()) {
			$archief[$r['id']] = $r;
		}

		$this->smarty->assign('archief', $archief);
        $this->smarty->assign('tab_active', 'inactive');
        $this->smarty->assign('include_tabs', 'cms/inschrijvingen/_tabs.html');
        $this->smarty->assign('include', 'cms/inschrijvingen/nieuw.tpl');
        $this->smarty->display('templates/cms/index.tpl');
	}

	public function nieuw() {
		$models = array();
		$query = Flight::db()->query("SELECT *, DATE_FORMAT(datum, '%d/%m/%Y') AS datum_tonen, DATE_FORMAT(updated, '%d/%m/%Y') AS updated_tonen FROM model WHERE accepted=0 AND is_update=0 AND declined=0 ORDER BY updated DESC");

		while ($r = $query->fetch_array()) {
            $model = $r;
            $this->smarty->assign('id', $r['model_id']);
            $model['email'] = $this->resolveEmail($model['email']);
            $models[$r['model_id']] = $model;
		}

        $this->smarty->assign('models', $models);
        $updated_models = array();
		$query = Flight::db()->query("SELECT *, DATE_FORMAT(datum, '%d/%m/%Y') AS datum_tonen, DATE_FORMAT(updated, '%d/%m/%Y') AS updated_tonen FROM model WHERE accepted=0 AND is_update=1 ORDER BY updated DESC");

        while ($r = $query->fetch_array()) {
            $model = $r;
            $this->smarty->assign('id', $r['model_id']);
            $model['email'] = $this->resolveEmail($model['email']);
            $updated_models[$r['model_id']] = $model;
		}

        $this->smarty->assign('updated_models', $updated_models);
		$emails = array();
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
        $this->smarty->assign('tab_active', 'nieuw');
        $this->smarty->assign('hoofdmenu_actief', 'nieuw');
        $this->smarty->assign('include_tabs', 'cms/inschrijvingen/_tabs.html');
        $this->smarty->assign('include', 'cms/inschrijvingen/nieuw.tpl');
        $this->smarty->display('templates/cms/index.tpl');
	}

	public function updates()
    {
		$models_accepted = array();
		$query = Flight::db()->query("SELECT *, DATE_FORMAT(datum, '%d/%m/%Y') AS datum_tonen, DATE_FORMAT(updated, '%d/%m/%Y') AS updated_tonen FROM model WHERE accepted=1 AND is_update=1 ORDER BY updated DESC");

		while ($r = $query->fetch_array()) {
            $model = $r;
            $this->smarty->assign('id', $r['model_id']);
            $model['email'] = $this->resolveEmail($model['email']);
            $models_accepted[$r['model_id']] = $model;
		}

        $this->smarty->assign('models_accepted', $models_accepted);
		$emails = array();
		$query = Flight::db()->query("SELECT * FROM emails ORDER BY titel");

		while ($r = $query->fetch_array()) {
			$emails[$r['id']] = $r;
		}

        $this->smarty->assign('emails', $emails);
        $archief = array();
		$query = Flight::db()->query("SELECT title, id, DATE_FORMAT(timestamp, '%d/%m/%Y') AS datum_tonen FROM model_mails ORDER BY timestamp DESC LIMIT 9");

		while ($r = $query->fetch_array()) {
			$archief[$r['id']] = $r;
		}

        $this->smarty->assign('archief', $archief);
        $this->smarty->assign('tab_active', 'updates');
        $this->smarty->assign('hoofdmenu_actief', 'updates');
        $this->smarty->assign('include_tabs', 'cms/inschrijvingen/_tabs.html');
        $this->smarty->assign('include', 'cms/inschrijvingen/nieuw.tpl');
        $this->smarty->display('templates/cms/index.tpl');
	}

	public function archief()
    {
		$models = [];
		$query = Flight::db()->query("SELECT *, DATE_FORMAT(datum, '%d/%m/%Y') AS datum_tonen, DATE_FORMAT(updated, '%d/%m/%Y') AS updated_tonen FROM model WHERE declined=1 ORDER BY updated DESC");

		while ($r = $query->fetch_array()) {
            $model = $r;
            $this->smarty->assign('id', $r['model_id']);
            $model['email'] = $this->resolveEmail($model['email']);
            $models[$r['model_id']] = $model;
		}

        $this->smarty->assign('models', $models);
        $emails = array();
		$query = Flight::db()->query("SELECT * FROM emails ORDER BY titel");

		while ($r = $query->fetch_array()) {
			$emails[$r['id']] = $r;
		}

        $this->smarty->assign('emails', $emails);
        $this->smarty->assign('tab_active', 'archief');
        $this->smarty->assign('include_tabs', 'cms/inschrijvingen/_tabs.html');
        $this->smarty->assign('include', 'cms/inschrijvingen/nieuw.tpl');
        $this->smarty->display('templates/cms/index.tpl');
	}

    public function pending()
    {
        $models = [];
        $query = Flight::db()->query("SELECT *, DATE_FORMAT(datum, '%d/%m/%Y') AS datum_tonen, DATE_FORMAT(updated, '%d/%m/%Y') AS updated_tonen FROM model WHERE declined=2 ORDER BY updated DESC");

        while ($r = $query->fetch_array()) {
            $model = $r;
            $this->smarty->assign('id', $r['model_id']);
            $model['email'] = $this->resolveEmail($model['email']);
            $models[$r['model_id']] = $model;
        }

        $this->smarty->assign('models', $models);
        $emails = array();
        $query = Flight::db()->query("SELECT * FROM emails ORDER BY titel");

        while ($r = $query->fetch_array()) {
            $emails[$r['id']] = $r;
        }

        $this->smarty->assign('emails', $emails);
        $this->smarty->assign('tab_active', 'pending');
        $this->smarty->assign('include_tabs', 'cms/inschrijvingen/_tabs.html');
        $this->smarty->assign('include', 'cms/inschrijvingen/nieuw.tpl');
        $this->smarty->display('templates/cms/index.tpl');
    }

    /**
     * @param string $email
     * @return string
     */
    private function resolveEmail($email)
    {
        if ($this->account->get()->getType()->getValue() == Enum_UserType::BOOKER) {
            return $this->smarty->fetch('cms/elements/get_email_button.tpl');
        } elseif ($this->account->get()->getType()->getValue() == Enum_UserType::ADMIN) {
            return $email;
        }

        return  '-';
    }
}
