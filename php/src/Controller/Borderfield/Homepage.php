<?php

class Controller_Borderfield_Homepage extends Controller_Borderfield_BaseController
{
    /**
     * {@inheritdoc}
     */
    public function show(Http_Request $request)
    {
        $groups = (new Repository_Group())->findAllBorderfield();
        $entityModels = (new Repository_Model())->findByGroupsWithLimit($groups, 0, 12);

        $this->getSmarty()->assign('models', $entityModels);
        $this->init($request);
    }
}
