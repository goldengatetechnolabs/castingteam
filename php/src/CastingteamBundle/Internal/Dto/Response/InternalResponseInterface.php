<?php

namespace CastingteamBundle\Internal\Dto\Response;

use CastingteamBundle\Enumeration\ResponseType;

interface InternalResponseInterface
{
    /**
     * @return ResponseType
     */
    public function getType();
}