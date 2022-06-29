<?php

require_once __DIR__ . '/../core/config.php';
require_once __DIR__ . '/../core/init.php';
require_once __DIR__ . '/../func.php';
require_once __DIR__ . '/../core/flight/Flight.php';
require_once __DIR__ . '/../core/smarty/Smarty.class.php';
require_once __DIR__ . '/../DBController.class.php';
require_once __DIR__ . '/../autoload.php';

date_default_timezone_set('Europe/London');

Flight::register('db', 'mysqli', array(DATABASE_SERVER, DATABASE_USER, DATABASE_WACHTWOORD, DATABASE_DB));
Flight::db()->query("SET CHARACTER SET utf8");
