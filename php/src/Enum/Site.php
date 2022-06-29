<?php

class Enum_Site extends Core_Enum
{
    const CASTINGTEAM = 'castingteam';

    const BORDERFIELD = 'borderfield';

    const CMS = 'cms';

    /**
     * @return Enum_Site
     */
    public static function castingteam()
    {
        return self::create(static::CASTINGTEAM);
    }

    /**
     * @return Enum_Site
     */
    public static function borderfield()
    {
        return self::create(static::BORDERFIELD);
    }

    /**
     * @return Enum_Site
     */
    public static function cms()
    {
        return self::create(static::CMS);
    }
}