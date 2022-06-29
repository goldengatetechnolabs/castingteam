<?php

use CastingteamBundle\Operation\Model\Image\Cropped\Watermark\Service\Service as WatermarkService;
use CastingteamBundle\Operation\Model\Image\Cropped\Watermark\Dto\Request as WatermarkRequest;
use CastingteamBundle\Entity;

class Api_Image extends Core_Controller
{
    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_Security
     */
    public function order(Http_Request $request)
    {
        if ($this->isAdmin()) {
            $items = explode("&", $this->getValueOrThrowException($request->getPost(), 'items'));
            $group = (int) $this->getValueOrThrowException($request->getPost(), 'group');

            foreach ($items as $key => $item) {
                $imageId = preg_replace('/\D/', '', $item);
                $entityImage = $this->entityFactory->siteImage()->findOneById($imageId);
                /** @var Entity\SiteImage $entityImage  */

                if ($group > 0) {
                    $entityGroup = $this->entityFactory->group()->findOneById($group);

                    $entitySiteImageGroup = $this->entityFactory->siteImageGroup()->findOneByImageAndGroup($entityImage, $entityGroup);
                    /** @var Entity\SiteImageGroup $entitySiteImageGroup  */

                    if (!is_null($entitySiteImageGroup)) {
                        $entitySiteImageGroup->setPosition($key);
                    } else {
                        $entitySiteImageGroup = (new Entity\SiteImageGroup())
                            ->setPosition($key)
                            ->setOnline($entityImage->getOnline())
                            ->setPdf($entityImage->getPdf())
                            ->setSiteImage($entityImage)
                            ->setGroup($entityGroup)
                        ;

                        $this->entityManager->persist($entitySiteImageGroup);
                    }
                } else {
                    $entityImage->setOrder($key);
                }
            }

            $this->entityManager->flush();

            return
                new Http_JsonResponse(
                    [
                        'error' => false,
                        'message' => 'Order updated',
                    ]
                );
        }

        throw new Exception_Security();
    }

    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_Security
     * @throws Exception_DataNotFound
     */
    public function properties(Http_Request $request)
    {
        if ($this->isAdmin()) {
            $entityImage = $this->entityFactory->siteImage()->findOneById($this->getValueOrThrowException($request->getPost(), 'id'));
            /** @var Entity\SiteImage $entityImage */
            $pdf = $this->getValueOrThrowException($request->getPost(), 'pdf');
            $online = $this->getValueOrThrowException($request->getPost(), 'online');

            if (is_null($entityImage)) {
                throw new Exception_DataNotFound('Image with such id not found');
            }

            $group = $this->getValueOrThrowException($request->getPost(), 'group');

            if ($group > 0) {
                $entityGroup = $this->entityFactory->group()->findOneById($group);
                $entitySiteImageGroup = $this->entityFactory->siteImageGroup()->findOneByImageAndGroup($entityImage, $entityGroup);
                /** @var Entity\SiteImageGroup $entitySiteImageGroup  */

                if (!is_null($entitySiteImageGroup)) {
                    $entitySiteImageGroup->setPdf($pdf)->setOnline($online);
                } else {
                    $entitySiteImageGroup = (new Entity\SiteImageGroup())
                        ->setPdf($pdf)
                        ->setOnline($online)
                        ->setPosition($entityImage->getOrder())
                        ->setSiteImage($entityImage)
                        ->setGroup($entityGroup)
                    ;

                    $this->entityManager->persist($entitySiteImageGroup);
                }
            } else {
                $entityImage
                    ->setPdf($pdf)
                    ->setOnline($online)
                ;
            }

            $this->entityManager->flush();

            return
                new Http_JsonResponse(
                    [
                        'error' => false,
                        'message' => 'Properties updated',
                    ]
                );
        }

        throw new Exception_Security();
    }

    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_Security
     * @throws Exception_DataNotFound
     */
    public function remove(Http_Request $request)
    {
        if ($this->isAdmin()) {
            /** @var Entity\SiteImage $image */
            $image = $this->entityFactory->siteImage()->findOneById($this->getValueOrThrowException($request->getPost(), 'id'));

            if (is_null($image)) {
                throw new Exception_DataNotFound();
            }

            $this->removeByPath(__DIR__ . '/../../../models/{modelId}/website/big/{id}.jpg', $image->getModel()->getId(), $image->getId());
            $this->removeByPath(__DIR__ . '/../../../models/{modelId}/website/middle/{id}.jpg', $image->getModel()->getId(), $image->getId());
            $this->removeByPath(__DIR__ . '/../../../models/{modelId}/website/thumbs/{id}.jpg', $image->getModel()->getId(), $image->getId());

            $this->entityManager->remove($image);
            $this->entityManager->flush();

            return
                new Http_JsonResponse(
                    [
                        'error' => false,
                        'message' => 'Image removed',
                    ]
                );
        }

        throw new Exception_Security();
    }

    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_MissedParameter
     */
    public function get(Http_Request $request)
    {
        if (preg_match('/middle\/(\d+)\.jpg/ui', $request->getServer()['REQUEST_URI'], $match)) {
            $entityImage = (new Entity_Image($match[1]));
            $image = $this->isLogged()
                ? $entityImage->getLinkBig()
                : $entityImage->getLinkWatermark();

            if (!file_exists($image)) {
                $watermarkRequest = (new WatermarkRequest())->setImage($entityImage);
                $response = (new WatermarkService())->behave($watermarkRequest);
            }


            $fp = fopen($image, 'r');
            header("Content-Type: image/jpg");
            header("Content-Length: " . filesize($image));

            fpassthru($fp);
            exit();
        }

        throw new Exception_MissedParameter();
    }

    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_Security
     */
    public function rotate(Http_Request $request)
    {
        if ($this->isAdmin()) {

            return
                new Http_JsonResponse(
                    [
                        'error' => false,
                        'message' => 'Image was rotated',
                    ]
                );
        }

        throw new Exception_Security();
    }

    /**
     * @param string $path
     * @param string $modelId
     * @param string $imageId
     */
    private function removeByPath($path, $modelId, $imageId)
    {
        unlink(
            strtr(
                $path,
                [
                    '{modelId}' => $modelId,
                    '{id}' => $imageId,
                ]
            )
        );
    }
}
