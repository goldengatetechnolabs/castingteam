<?php

namespace CastingteamBundle\Operation\Model\Image\Cropped\Watermark\Dto;

use CastingteamBundle\Internal\Dto\Request\InternalRequestInterface;
use Entity_Image;

class Request implements InternalRequestInterface
{
    /**
     * @var Entity_Image
     */
    private $image;

    /**
     * @return Entity_Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param Entity_Image $image
     * @return Request
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

}