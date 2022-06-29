<?php

class Enum_UserType extends Core_Enum
{
    const ADMIN = 5;

    const UPDATER = 4;

    const BOOKER = 3;

    const MODEL = 2;

    const USER = 1;

    const NON_USER = 0;

    protected static $labels = [
        Enum_UserType::ADMIN => 'admin',
        Enum_UserType::UPDATER => 'updater',
        Enum_UserType::BOOKER => 'booker',
        Enum_UserType::MODEL => 'model',
        Enum_UserType::USER => 'user',
        Enum_UserType::NON_USER => 'nonuser',
    ];
}
