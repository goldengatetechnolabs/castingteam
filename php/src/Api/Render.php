<?php

use CastingteamBundle\Entity;

class Api_Render extends Core_Controller
{
    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_Security
     * @throws Exception_DataNotFound
     */
    public function siteImages(Http_Request $request)
    {
        if ($this->isAdmin()) {
            $id = $this->getValueOrThrowException($request->getPost(), 'id');

            /** @var Entity\Model  $model */
            $model = $this->entityFactory->model()->findOneById($id);

            if (is_null($model)) {
                throw new Exception_DataNotFound('Model with such id not found');
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

            $this->smarty->assign('groupOrderedImages', $groupOrderedImages);
            $this->smarty->assign('categoryGroups', $groups);
            $this->smarty->assign('siteImages', $images);
            $this->smarty->assign('id', $id);

            return
                new Http_JsonResponse(
                    [
                        'error' => false,
                        'data' => $this->smarty->fetch('cms/models/onsitefotos.tpl'),
                    ]
                );
        }

        throw new Exception_Security();
    }
}
