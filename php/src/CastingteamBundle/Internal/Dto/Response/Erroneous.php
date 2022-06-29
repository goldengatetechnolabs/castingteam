<?php

namespace CastingteamBundle\Internal\Dto\Response;

use CastingteamBundle\Enumeration\ResponseType;

trait Erroneous
{
    /**
     * @return ResponseType
     */
    public function getType()
    {
        return ResponseType::erroneous();
    }
}