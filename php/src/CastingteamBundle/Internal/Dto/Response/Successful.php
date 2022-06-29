<?php

namespace CastingteamBundle\Internal\Dto\Response;

use CastingteamBundle\Enumeration\ResponseType;

trait Successful
{
    /**
     * @return ResponseType
     */
    public function getType()
    {
        return ResponseType::successful();
    }
}