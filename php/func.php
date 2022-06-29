<?php

const DOMAIN_REDIRECT_MAP = [
    'www.castingteam.com' => 'castingteam.com',
    'www.castingteam.nl' => 'castingteam.nl',
    'www.castingteam.be' => 'castingteam.be',
    'www.bordermodels.com' => 'bordermodels.com',
];

const COUNTRY_MAP = [
    'default' => 'vlaanderen',
    'belgie' => 'belgie',
    'belgique' => 'belgique',
    'belgium' => 'belgium',
    'nederland' => 'nederland',
    'netherlands' => 'netherlands',

    'vlaanderen' => 'vlaanderen',
    'brussel' => 'brussel',
    'bruxelles' => 'bruxelles',
    'deutschland' => 'deutschland',
    'germany' => 'germany'
];

function random($aantal) {
    $r = "";

    for ($i = 0; $i <= ($aantal - 1); $i++) {
        $r0 = rand(0, 1);
        $r1 = rand(0, 2);
        if ($r0 == 0) {
            $r .= chr(rand(ord('A'), ord('Z')));
        } elseif ($r0 == 1) {
            $r .= rand(0, 9);
        }

        if ($r1 == 0) {
            $r = strtolower($r);
        }
    }

    return $r;
}

function titleCase($string, $delimiters = array(" ", "-", ".", "'", "O'", "Mc"), $exceptions = array("and", "to", "of", "das", "dos", "I", "II", "III", "IV", "V", "VI")) {
    $string = mb_convert_case($string, MB_CASE_TITLE, "UTF-8");

    foreach ($delimiters as $dlnr => $delimiter) {
        $words = explode($delimiter, $string);
        $newwords = array();

        foreach ($words as $wordnr => $word) {
            if (in_array(mb_strtoupper($word, "UTF-8"), $exceptions)) {
                $word = mb_strtoupper($word, "UTF-8");
            } elseif (in_array(mb_strtolower($word, "UTF-8"), $exceptions)) {
                $word = mb_strtolower($word, "UTF-8");
            } elseif (!in_array($word, $exceptions)) {
                $word = ucfirst($word);
            }

            array_push($newwords, $word);
        }

        $string = join($delimiter, $newwords);
    }

    return $string;
}

function randomNum($aantal) {
    $r = "";

    for ($i = 0; $i <= ($aantal - 1); $i++) {
        $r .= rand(0, 9);
    }

    return $r;
}

function getEigenschappen() {
    $return = [];

    $query = Flight::db()->query("SELECT * FROM category INNER JOIN order_meta AS group_table ON category_id=group_table.item_id WHERE subtype=group_table.item_group_name ORDER BY group_table.position ASC");
    while ($r = $query->fetch_array()) {
        $return[$r['subtype']][$r['category_id']] = $r['codename'];
    }
    $query = Flight::db()->query("SELECT * FROM category WHERE subtype<>'lichaam' ORDER BY codename");
    while ($r = $query->fetch_array()) {
        $return[$r['subtype']][$r['category_id']] = $r['codename'];
    }
    return $return;
}

function brdf_log($modelId, $bericht) {
    Flight::db()->query("
        INSERT INTO _log
        (id_model, timestamp, bericht)
        VALUES(" . $modelId . ",
               now(),
               '" . Flight::db()->real_escape_string($bericht) . "'
        )
    ");
}

function cms_model_video($model_id) {
    if (is_numeric($model_id)) {
        $videos = array();
        $query = Flight::db()->query("SELECT *, DATE_FORMAT(timestamp, '%d/%m/%Y') AS datum FROM model_videos WHERE model_id=" . $model_id);
        while ($r = $query->fetch_array()) {
            $videos[$r['id']]['code'] = $r['code'];
            $videos[$r['id']]['datum'] = $r['datum'];
            $videos[$r['id']]['active'] = $r['active'];
            $videos[$r['id']]['host'] = $r['host'];
            $videos[$r['id']]['source'] = $r['source'];
        }

        Flight::smarty()->assign('videos', $videos);

        return Flight::smarty()->fetch('cms/models/videos.html');
    }
}

function deleteDirectory($dirPath) {
    if (is_dir($dirPath)) {
        $objects = scandir($dirPath);

        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($dirPath . "/" . $object)) {
                    deleteDirectory($dirPath . "/" . $object);
                } else {
                    unlink($dirPath . "/" . $object);
                }
            }
        }

        reset($objects);
        rmdir($dirPath);
    }
}

function get_countries() {

    return [
        'belgie' => 'België',
        'belgique' => 'Belgique',
        'belgium' => 'Belgium',
        'nederland' => 'Nederland',
        'netherlands' => 'The Netherlands',

        'vlaanderen' => 'Vlaanderen',
        'brussel' => 'Brussel',
        'bruxelles' => 'Bruxelles',
        'deutschland' => 'Deutschland',
        'germany' => 'Germany'
    ];
}

function getDefaultLang($domain) {

    switch ($domain) {
        case 'www.castingteam.be':
            return 'nl';
            break;

        case 'www.castingteam.com':
            return 'nl';
            break;

        case 'www.castingteam.nl':
            return 'nl';
            break;

        case 'www.borderfield.be':
            return 'en';
            break;

        case 'www.borderfield.nl':
            return 'en';
            break;

        default:
            return 'nl';
            break;
    }
}

function getRandomHomePageVideo() {
    $videos = [
        [
            'ogv' => '/videos/castingteam_homepage_clip1.ogv',
            'webm' => '/videos/castingteam_homepage_clip1.webm',
            'mp4' => '/videos/castingteam_homepage_clip1.mp4'
        ],
        [
            'ogv' => '/videos/castingteam_homepage_clip2.ogv',
            'webm' => '/videos/castingteam_homepage_clip2.webm',
            'mp4' => '/videos/castingteam_homepage_clip2.mp4'
        ],
        [
            'ogv' => '/videos/castingteam_homepage_clip3.ogv',
            'webm' => '/videos/castingteam_homepage_clip3.webm',
            'mp4' => '/videos/castingteam_homepage_clip3.mp4'
        ]
    ];
    
    $index = rand(1, count($videos)) - 1;

    return $videos[$index];
}

