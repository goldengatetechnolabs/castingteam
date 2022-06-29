<?php

class Controller_Selection extends Controller_Page
{
    /**
     * {@inheritdoc}
     */
    public function show(Http_Request $request)
    {
        if ($this->isLogged()) {
            $selections = $this->getController()->getUserSelections($_SESSION[SESSION_NAME_SITE_LOGIN]);

            if ($selections) {
                $this->getSmarty()->assign('selections', $selections);
            }
        } elseif (!empty($_SESSION['SELECTIONS'])) {
            $selections = [];

            foreach ($_SESSION['SELECTIONS'] as $selection) {
                $selections[] = $this->getController()->getSelectionById($selection['id'])[0];
            }

            $this->getSmarty()->assign('selections', $selections);
        }

        if (!empty($_GET['category'])) {
            $current_category = $this->getController()->getMainCategoryById($_GET['category']);
            $filters = $this->getController()->getFiltersByCategoryId($_GET['category']);

            if ($current_category) {
                $title = trim($current_category['name'],'#');
            } else {
                $title = 'People';
            }
        } elseif (!empty($_GET['search'])) {
            $title = 'Search';
            $search = $_GET['search'];
            $filters = $this->getController()->getFiltersByCategoryId();
            $this->getSmarty()->assign('search', $search);
        } else {
            $filters = $this->getController()->getFiltersByCategoryId();
            $title = 'People';
        }

        $this->getSmarty()->assign('current_group', $this->getValueOrElse($request->getGet(), 'group', 'none'));
        $this->getSmarty()->assign('current_category', $this->getValueOrElse($request->getGet(), 'category', 'none'));
        $this->getSmarty()->assign('model_view', $this->getValueOrElse($request->getGet(), 'view', 'list'));

        $skin_filter = $this->getController()->getCategoryBySubType('huidskleur');
        $hair_color_filter = $this->getController()->getCategoryBySubType('haarkleur');
        $hair_length_filter = $this->getController()->getCategoryBySubType('haarlengte');
        $hair_filter = $this->getController()->getCategoryBySubType('haar');
        $language_filter = $this->getController()->getCategoryBySubType('talenkennis');
        $begroeiing_filter = $this->getController()->getCategoryBySubType('begroeing');
        $versiering_filter = $this->getController()->getCategoryBySubType('versiering');
        $kleur_ogen_filter = $this->getController()->getCategoryBySubType('ogen');
        $lichaam_filter = $this->getController()->getCategoryBySubType('lichaam');

        if (!empty($_SESSION['SELECTIONS'])) {
            $this->getSmarty()->assign('selection_count', count($_SESSION['SELECTIONS']));
        }

        $this->getSmarty()->assign('begroeiing_filter', $begroeiing_filter);
        $this->getSmarty()->assign('versiering_filter', $versiering_filter);
        $this->getSmarty()->assign('kleur_ogen_filter', $kleur_ogen_filter);
        $this->getSmarty()->assign('lichaam_filter', $lichaam_filter);
        $this->getSmarty()->assign('skin_filter', $skin_filter);
        $this->getSmarty()->assign('hair_color_filter', $hair_color_filter);
        $this->getSmarty()->assign('hair_length_filter', $hair_length_filter);
        $this->getSmarty()->assign('hair_filter', $hair_filter);
        $this->getSmarty()->assign('language_filter', $language_filter);
        $this->getSmarty()->assign('filters', $filters);
        $this->getSmarty()->assign('title', $title);

        if (array_key_exists('selection', $request->getGet())) {
            $currentSelection = $this->getController()->getSelectionByCode($_GET['selection'])[0];
        } elseif ($this->isLogged()) {
            $currentSelection = $this->getController()->getUserSelections($_SESSION[SESSION_NAME_SITE_LOGIN])[0];
        } elseif (!empty($_SESSION['SELECTIONS'][0])) {
            $currentSelection = $this->getController()->getSelectionById($_SESSION['SELECTIONS'][0]['id'])[0];
        } else {
            $currentSelection['selections'] = [];
        }

        if (isset($currentSelection)) {
            if ($this->isLogged()) {
                $data['selection_id'] = $currentSelection['code'];
                $data['user_id'] = $_SESSION[SESSION_NAME_SITE_LOGIN];
                $isUserSelection = $this->getController()->checkIsUserSelectionByCode($data);
            } else {
                $isUserSelection = $this->isSelectionInSession($currentSelection['id']);
            }

            $this->getSmarty()->assign('is_user_selection', $isUserSelection);
            $this->getSmarty()->assign('current_selection', $currentSelection['selections']);
        }

        $this->getSmarty()->assign('pageTitle', 'Selections');
        $this->getSmarty()->assign('current_page', 'innerpage');
        $this->getSmarty()->display('templates/site/selection.tpl');
    }

    /**
     * @param int $selectionId
     * @return int
     */
    private function isSelectionInSession($selectionId)
    {
        foreach ($_SESSION['SELECTIONS'] as $selection) {
            if ($selection['id'] == $selectionId) {
                return 1;
            }
        }

        return 0;
    }
}
