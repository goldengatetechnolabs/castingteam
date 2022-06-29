<?php

namespace CastingteamBundle\Enumeration\Map;

use CastingteamBundle\Enumeration\Location;

final class LocationToPhone extends BaseMapper
{
    /**
     * @var string[]
     */
    protected $map = [
        Location::BE => '+32 (0) 3 303 72 11',
        Location::NL => '+31 (0)85 130 18 12',
        self::DEFAULT_VALUE => '+32 (0) 3 303 72 11',
    ];
}