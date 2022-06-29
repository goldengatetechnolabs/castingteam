<?php

use CastingteamBundle\Enumeration\Map\LocationToPhone;

abstract class Controller_Borderfield_BaseController extends Controller_BaseConfigurablePage
{
    /**
     * @param Http_Request $request
     * @return void
     */
    protected function init(Http_Request $request)
    {
        $entityGroups = $this->entityFactory->group()->findAllBorderfield();
        $selections = [];

        if ($this->isLogged()) {
            $selections = (new Repository_Selection())->findAllByUser(new Entity_User($request->getSession()[SESSION_NAME_SITE_LOGIN]));
        } elseif (!empty($request->getSession()['SELECTIONS'])) {
            foreach ($request->getSession()['SELECTIONS'] as $selection) {
                $selections[] = new Entity_Selection($selection['id']);
            }
        }

        if (!empty($this->parameters['url_params'][0])) {
            $group = $this->entityFactory->group()->findOneByShortName($this->parameters['url_params'][0]);

            if (!$group) {
                $group = '';
            }
        } elseif (isset($request->getGet()['group'])) {
            $group = $this->entityFactory->group()->findOneById($request->getGet()['group']);
        } else {
            $group = '';
        }

        $this->getSmarty()->assign('contactPhone', (new LocationToPhone())->resolve(Flight::get('location')));
        $this->getSmarty()->assign('currentGroup', $group);
        $this->getSmarty()->assign('selectionCount', count((new Repository_Model())->findAllBySelections($selections)));
        $this->getSmarty()->assign('selections', $selections);
        $this->getSmarty()->assign('pageTitle', $this->parameters['title']);
        $this->getSmarty()->assign('specialties', $this->entityFactory->group()->findAllBorderfieldSpecialties());
        $this->getSmarty()->assign('groups', $entityGroups);
        $this->getSmarty()->display($this->parameters['template']);
    }
}
