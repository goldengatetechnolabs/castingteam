<?php

class Controller_People extends Controller_Page
{
    /**
     * @var
     */
    private $defaultTitle = '207';

    /**
     * {@inheritdoc}
     */
    public function show(Http_Request $request)
    {
        if (!empty($request->getGet()['category'])) {
            $currentCategory = $this->getController()->getMainCategoryById($request->getGet()['category']);
            $filters = $this->getController()->getFiltersByCategoryId($request->getGet()['category']);

            if ($currentCategory) {
                $title = trim($currentCategory['name'], '#');
            } else {
                $title = $this->defaultTitle;
            }
        } elseif (
            !empty($request->getGet()['search'])
        ) {
            $title = 'Search';
            $search = $request->getGet()['search'];
            $filters = $this->getController()->getFiltersByCategoryId();
            $this->getSmarty()->assign('search', $search);
        } elseif (in_array(Flight::get('current_page'), Flight::get('taalContent')['navigation'])) {
            $codename = array_search(Flight::get('current_page'), Flight::get('taalContent')['navigation']);
            $currentCategory = $this->getController()->getCategoryByCodename($codename, 'main');

            if (isset($currentCategory['category_id'])) {
                $filters = $this->getController()->getFiltersByCategoryId($currentCategory['category_id']);
            } else {
                $filters = $this->getController()->getFiltersByCategoryId();
            }

            if ($currentCategory) {
                $title = trim($currentCategory['name'], '#');
            } else {
                $title = $this->defaultTitle;
            }
        } else {
            $filters = $this->getController()->getFiltersByCategoryId();
            $title = $this->defaultTitle;
        }

        if (
            isset($request->getGet()['group']) &&
            !empty($request->getGet()['group'])
        ) {
            $this->getSmarty()->assign('current_group', $request->getGet()['group']);
        } else {
            $this->getSmarty()->assign('current_group', 'none');
        }

        if (
            isset($_GET['category']) and
            ! empty($_GET['category'])
        ) {
            $this->getSmarty()->assign('current_category', $_GET['category']);
        } elseif (in_array(Flight::get('current_page'), Flight::get('taalContent')['navigation'])) {
            $codename = array_search(Flight::get('current_page'), Flight::get('taalContent')['navigation']);
            $currentCategory = $this->getController()->getCategoryByCodename($codename, 'main');

            if (isset($currentCategory['category_id'])) {
                $this->getSmarty()->assign('current_category', $currentCategory['category_id']);
            } else {
                $this->getSmarty()->assign('current_category', 'none');
            }
        } else {
            $this->getSmarty()->assign('current_category', 'none');
        }

        $skin_filter = $this->getController()->getCategoryBySubType('huidskleur');
        $hair_color_filter = $this->getController()->getCategoryBySubType('haarkleur');
        $hair_length_filter = $this->getController()->getCategoryBySubType('haarlengte');
        $hair_filter = $this->getController()->getCategoryBySubType('haar');
        $language_filter = $this->getController()->getCategoryBySubType('talenkennis');
        $begroeiing_filter = $this->getController()->getCategoryBySubType('begroeing');
        $versiering_filter = $this->getController()->getCategoryBySubType('versiering');
        $kleur_ogen_filter = $this->getController()->getCategoryBySubType('ogen');
        $lichaam_filter = $this->getController()->getCategoryBySubType('lichaam');

        $categoryId = !empty($currentCategory) ? $currentCategory['category_id'] : $this->defaultTitle;

        $this->getSmarty()->assign('selection_count', $this->getSelectionModelsCount());
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
        $this->getSmarty()->assign('title', $this->getLocalizedTitle(($categoryId)));
        $this->getSmarty()->assign('pageTitle', $title);
        $this->getSmarty()->assign('current_page', 'innerpage');
        $this->getSmarty()->display('templates/site/people.tpl');
    }

    /**
     * @param $title
     * @return string
     */
    private function getLocalizedTitle($title)
    {
        return
            array_key_exists($title, $this->getLanguageContent()['title'])
                ? $this->getLanguageContent()['title'][$title]
                : $this->getLanguageContent()['title'][$this->defaultTitle];
    }

    /**
     * @return mixed|array
     */
    private function getLanguageContent()
    {
        return Flight::get('taalContent');
    }

    /**
     * @return integer
     */
    private function getSelectionModelsCount()
    {
        $modelsFromSelections = [];

        if ($this->isLogged()) {
            $selections = $this->getController()->getUserSelections($_SESSION[SESSION_NAME_SITE_LOGIN]);

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
                $models = $this->getController()->getModelsBySelection($selection['id']);

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
}
