<?php

namespace CastingteamBundle\Operation\Model\Image\Original\Rotate\Dto;

use CastingteamBundle\Entity\Image;
use CastingteamBundle\Internal\Dto\Request\InternalRequestInterface;

class Request implements InternalRequestInterface
{
    /**
     * @var Image
     */
    private $image;

    /**
     * @return Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param Image $image
     * @return Request
     */
    public function setImage(Image $image)
    {
        $this->image = $image;
        return $this;
    }
}