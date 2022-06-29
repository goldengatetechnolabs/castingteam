<?php

namespace CastingteamBundle\Operation\Model\Image\Cropped\Watermark\Dto;

use CastingteamBundle\Internal\Dto\Response\InternalResponseInterface;
use CastingteamBundle\Internal\Dto\Response\Successful;
use Entity_Image;

class Response implements InternalResponseInterface
{
    use Successful;

    /**
     * @var Entity_Image
     */
    private $watermarkImage;

    /**
     * @return Entity_Image
     */
    public function getWatermarkImage()
    {
        return $this->watermarkImage;
    }

    /**
     * @param Entity_Image $watermarkImage
     * @return Response
     */
    public function setWatermarkImage($watermarkImage)
    {
        $this->watermarkImage = $watermarkImage;
        return $this;
    }
}