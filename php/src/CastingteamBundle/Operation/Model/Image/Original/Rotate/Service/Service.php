<?php

namespace CastingteamBundle\Operation\Model\Image\Original\Rotate\Service;

use CastingteamBundle\Entity\Image;
use CastingteamBundle\Internal\Dto\Request\InternalRequestInterface;
use CastingteamBundle\Internal\Dto\Response\EmptyInternalErroneousResponse;
use CastingteamBundle\Internal\Dto\Response\EmptyInternalSuccessfulResponse;
use CastingteamBundle\Operation\Model\Image\Original\Rotate\Dto\Request;
use CastingteamBundle\Service\ServiceInterface;

final class Service implements ServiceInterface
{
    const TEMPLATES = [
        '{root}/models/{modelId}/original/{imageId}.jpg',
        '{root}/models/{modelId}/original/{imageId}.jpg'
    ];

    /**
     * @param InternalRequestInterface|Request $request
     * @return mixed
     */
    public function behave(InternalRequestInterface $request)
    {
        foreach (self::TEMPLATES as $template) {
            $result = $this->rotateImageByPath(
                $this->buildPath($request->getImage(), 90),
                $template
            );
        }

        return
            isset($result) && $result
                ? new EmptyInternalSuccessfulResponse()
                : new EmptyInternalErroneousResponse()
            ;
    }

    /**
     * @param string $path
     * @param int $angle
     * @return bool
     */
    private function rotateImageByPath($path, $angle)
    {
        $source = imagecreatefromjpeg($path);
        $rotate = imagerotate($source, $angle, 0);

        return imagejpeg($rotate, $path);
    }

    /**
     * @param Image $image
     * @param string $template
     * @return string
     */
    private function buildPath(Image $image, $template)
    {
        return
            strtr(
                $template,
                [
                    '{root}' => $_SERVER['DOCUMENT_ROOT'],
                    '{modelId}' => $image->getModel()->getId(),
                    '{imageId}' => $image->getId(),
                ]
            );
    }
}