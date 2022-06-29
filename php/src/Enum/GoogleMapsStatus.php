<?php

class Enum_GoogleMapsStatus extends Core_Enum
{
    const SUCCESS = 'OK';

    const ZERO_RESULTS = 'ZERO_RESULTS';

    const QUERY_LIMIT = 'OVER_QUERY_LIMIT';

    const DENIED = 'REQUEST_DENIED';

    const INVALID_REQUEST = 'INVALID_REQUEST';

    const UNKNOWN_ERROR = 'UNKNOWN_ERROR';

    protected static $labels = [
        Enum_GoogleMapsStatus::SUCCESS => 'Success',
        Enum_GoogleMapsStatus::ZERO_RESULTS => 'Error - Zero results have returned on query',
        Enum_GoogleMapsStatus::QUERY_LIMIT => 'Error - Query limit',
        Enum_GoogleMapsStatus::DENIED => 'Error - Request denied',
        Enum_GoogleMapsStatus::INVALID_REQUEST => 'Error - Missed parameters',
        Enum_GoogleMapsStatus::UNKNOWN_ERROR => 'Error - Unknown error',
    ];
}