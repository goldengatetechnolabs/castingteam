<?php

namespace CastingteamBundle\Operation\Model\Image\Cropped\Watermark\Service;

use CastingteamBundle\Internal\Dto\Request\InternalRequestInterface;
use CastingteamBundle\Operation\Model\Image\Cropped\Watermark\Dto\Request;
use CastingteamBundle\Operation\Model\Image\Cropped\Watermark\Dto\Response;
use Tapakan\Watermark\Watermark;
use CastingteamBundle\Service\ServiceInterface;

final class Service implements ServiceInterface
{
    const WATERMARK_IMAGE_PATH =  'images/watermark_logo.png';

    /**
     * @var Watermark
     */
    private $watermark;

    public function __construct()
    {
        $this->watermark = new Watermark(self::WATERMARK_IMAGE_PATH, Watermark::MIDDLE_CENTER);
    }


    /**
     * @param InternalRequestInterface|Request $request
     * @return mixed
     */
    public function behave(InternalRequestInterface $request)
    {
        $image = $this->copyImageToWatermarkDirectory($request->getImage()->getLinkBig());

        $this->watermark->add($image);

        return (new Response())->setWatermarkImage($request->getImage()->setLinkWatermark($image));
    }

    /**
     * @param string $imagePath
     * @return string
     */
    private function copyImageToWatermarkDirectory($imagePath)
    {
        $watermarkImagePath = preg_replace('/\.jpg/ui', '_watermark.jpg', $imagePath);
        copy($imagePath, $watermarkImagePath);

        return $watermarkImagePath;
    }
}
