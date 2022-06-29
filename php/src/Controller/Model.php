<?php

class Controller_Model extends Controller_Page
{
    /**
     * @var int
     */
    private $modelId;

    /**
     * @param Core_Account $account
     * @param $id
     */
    public function __construct(Core_Account $account, $id)
    {
        parent::__construct($account);

        $this->modelId = $id;
    }

    /**
     * {@inheritdoc}
     */
    public function show(Http_Request $request)
    {
        $model = $this->getController()->getModel($this->modelId);

        if ($model) {
            $this->getSmarty()->assign('model', $model);
            $this->getSmarty()->assign('pageTitle', sprintf('%s ref. %s', $model['voornaam'], $model['model_id']));
        } else {
            Flight::notFound();
            exit();
        }

        if ($this->isLogged()) {
            $selections = $this->getController()->getUserSelections($_SESSION[SESSION_NAME_SITE_LOGIN]);

            if ($selections) {
                $this->getSmarty()->assign('selections', $selections);
            }
        } else {

            if (
                isset($_SESSION['SELECTIONS']) and
                !empty($_SESSION['SELECTIONS'])
            ) {
                $this->getSmarty()->assign('selections', $_SESSION['SELECTIONS']);
            }
        }

        $this->getSmarty()->assign('current_page', 'single_model_page');
        $this->getSmarty()->display('templates/site/model.tpl');
    }
}