<?php

class Enum_SpryngResponse extends Core_Enum
{
    const SUCCESS = 1;

    const MISSING_PARAMETER = 100;

    const USERNAME_SHORT = 101;

    const USERNAME_LONG = 102;

    const PASSWORD_SHORT = 103;

    const PASSWORD_LONG = 104;

    const DESTINATION_SHORT = 105;

    const DESTINATION_LONG = 106;

    const SENDER_LONG = 107;

    const SENDER_SHORT = 108;

    const BODY_SHORT = 109;

    const BODY_LONG = 110;

    const SECURITY_ERROR = 200;

    const UNKNOWN_ROUTE = 201;

    const ROUTE_VIOLATION = 202;

    const INSUFFICIENT_CREDIT = 203;

    const TECHNICAL_ERROR = 800;


    protected static $labels = [
        Enum_SpryngResponse::SUCCESS => 'SMS successfully sent',
        Enum_SpryngResponse::MISSING_PARAMETER => 'Error - Missing	Parameter',
        Enum_SpryngResponse::USERNAME_SHORT => 'Error - Username too short',
        Enum_SpryngResponse::USERNAME_LONG => 'Error - Username too long',
        Enum_SpryngResponse::PASSWORD_SHORT => 'Error - password too short',
        Enum_SpryngResponse::PASSWORD_LONG => 'Error - password too long',
        Enum_SpryngResponse::DESTINATION_SHORT => 'Error - destination too short',
        Enum_SpryngResponse::DESTINATION_LONG => 'Error - destination too long',
        Enum_SpryngResponse::SENDER_LONG => 'Error - sender too long',
        Enum_SpryngResponse::SENDER_SHORT => 'Error - sender too short',
        Enum_SpryngResponse::BODY_SHORT => 'Error - body too short',
        Enum_SpryngResponse::BODY_LONG => 'Error - body too long',
        Enum_SpryngResponse::SECURITY_ERROR => 'Error - Security error',
        Enum_SpryngResponse::UNKNOWN_ROUTE => 'Error - Unknown route',
        Enum_SpryngResponse::ROUTE_VIOLATION => 'Error - Route access violation',
        Enum_SpryngResponse::INSUFFICIENT_CREDIT => 'Error - Insufficient credits',
        Enum_SpryngResponse::TECHNICAL_ERROR => 'Technical Error'
    ];
}