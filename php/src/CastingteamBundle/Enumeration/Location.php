<?php

namespace CastingteamBundle\Enumeration;

class Location extends Enumeration
{
    const BE = 'BE';

    const NL = 'NL';

    /**
     * @return Location
     */
    public static function nl()
    {
        return new self(static::NL);
    }

    /**
     * @return Location
     */
    public static function be()
    {
        return new self(static::BE);
    }

    /**
     * @return bool
     */
    public function isNl()
    {
        return $this->value == static::NL;
    }

    /**
     * @return bool
     */
    public function isBe()
    {
        return $this->value == static::BE;
    }
}
