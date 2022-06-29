<?php

class Controller_Borderfield_Selection extends Controller_Borderfield_BaseController
{
    /**
     * {@inheritdoc}
     */
    public function show(Http_Request $request)
    {
        $selections = [];

        if ($this->isLogged()) {
            $selections = (new Repository_Selection())->findAllByUser(new Entity_User($_SESSION[SESSION_NAME_SITE_LOGIN]));
        } elseif (!empty($_SESSION['SELECTIONS'])) {
            foreach ($_SESSION['SELECTIONS'] as $selection) {
                $selections[] = new Entity_Selection($selection['id']);
            }
        }

        if (array_key_exists('selection', $request->getGet())) {
            $currentSelection = (new Repository_Selection())->findOneByCode($request->getGet()['selection']);
            $isUserSelection = $this->isSelectionInSession($currentSelection->getId());
        } else {
            $currentSelection = !empty($selections) ? $selections[0] : null;
            $isUserSelection = true;
        }

        $this->getSmarty()->assign('modelView', !empty($request->getGet()['model_view']) ? $request->getGet()['model_view'] : 'list');
        $this->getSmarty()->assign('currentSelection', $currentSelection);
        $this->getSmarty()->assign('isUserSelection', $isUserSelection);

        $this->init($request);
    }

    /**
     * @param int $selectionId
     * @return int
     */
    private function isSelectionInSession($selectionId)
    {
        foreach ($_SESSION['SELECTIONS'] as $selection) {
            if ($selection['id'] == $selectionId) {
                return true;
            }
        }

        return false;
    }
}
