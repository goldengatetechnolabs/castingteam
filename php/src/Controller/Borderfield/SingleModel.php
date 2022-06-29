<?php

class Controller_Borderfield_SingleModel extends Controller_Borderfield_BaseController
{
    /**
     * {@inheritdoc}
     */
    public function show(Http_Request $request)
    {
        $modelId = $this->parameters['url_params'][1];

        if (!$modelId) {
            throw new Exception_MissedParameter();
        }

        $modelEntity = $this->entityFactory->model()->findOneById($modelId);
        $model = $this->getController()->getModel($modelId);

        if (!empty($this->parameters['url_params'][0])) {
            $group = $this->entityFactory->group()->findOneByShortName($this->parameters['url_params'][0]);

            if (!$group) {
                $group = 0;
            }
        } elseif (isset($request->getGet()['group'])) {
            $group = $this->entityFactory->group()->findOneById($request->getGet()['group']);
        }

        $currentGroupId = isset($group) && is_object($group) ? $group->getId() : 0;

        if ($currentGroupId > 0) {
            $groupEntity = $this->entityFactory->group()->findOneById($currentGroupId);
            $siteImages = $this->entityFactory->siteImage()->findAllActiveByGroupAndModelAsArray($modelEntity, $groupEntity);
        } else {
            $siteImages = $this->entityFactory->siteImage()->findAllActiveByModelAsArray($modelEntity);
        }

        $siteImages = $this->filterBigImages($siteImages, $modelId);

        if (!$model) {
            $this->notFound();
        }

        $this->getSmarty()->assign('modelEntity', new Entity_Model($modelId));
        $this->getSmarty()->assign('siteImages', $siteImages);
        $this->getSmarty()->assign('model', $model);

        $this->init($request);
    }

    /**
     * @param array $images
     * @param string $modelId
     * @return array
     */
    private function filterBigImages(array $images, $modelId)
    {
        $filtered = [];

        foreach ($images as $image) {
            if (file_exists(sprintf('models/%s/website/middle/%s.jpg', $modelId, $image['id']))) {
                $filtered[] = $image;
            }
        }

        return $filtered;
    }
}