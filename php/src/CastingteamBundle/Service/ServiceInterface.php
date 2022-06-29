<?php

namespace CastingteamBundle\Service;

use CastingteamBundle\Internal\Dto\Request\InternalRequestInterface;

interface ServiceInterface
{
    /**
     * @param InternalRequestInterface $request
     * @return mixed
     */
    public function behave(InternalRequestInterface $request);
}