<?php

//REDIRECTS
if('casting.team' == $_SERVER['HTTP_HOST'])
{
    #echo '<pre>';
    #print_r($_SERVER);
    
    # Forward casting.team/xxxx to https://castingteam.com/nl/people/xxxx. 
    # For instance, casting.team/4616 should forward to to https://castingteam.com/nl/people/4616.
    $redirecturl = isset($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : null;
    if(!empty($redirecturl))
    {
        $newURL = 'https://castingteam.com/nl/people' . $redirecturl;

        header("HTTP/1.1 301 Moved Permanently");
        header('Location: '. $newURL);
        exit;
    }
}

use CastingteamBundle\App;
use CastingteamBundle\Interaction\Router\Router;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Cache\FilesystemCache;
use Victorybiz\GeoIPLocation\GeoIPLocation;

define('HTTPS', 'https');
//define('HTTPS', 'http');
define('EXTERNAL_IMAGES_SRC', 'https://photos.castingteam.com');

// Change session timeout value for a particular page load  - 1 month = ~2678400 seconds
#ini_set('session.cookie_lifetime', 2592000); 
#ini_set('session.gc_maxlifetime', 2592000);

// Change session timeout value for a particular page load  - 1 year = 31557600 seconds
$cookieLifeTime = strtotime('next year');
ini_set('session.cookie_lifetime', $cookieLifeTime);
ini_set('session.gc_maxlifetime', $cookieLifeTime);

session_start();

date_default_timezone_set('Europe/Brussels');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(1);

$loader = require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/php/core/config.php';
require_once __DIR__ . '/php/core/init.php';
require_once __DIR__ . '/php/func.php';
require_once __DIR__ . '/php/autoload.php';
require_once __DIR__ . '/php/DBController.class.php';
require_once __DIR__ . '/php/front/registreren.php';

if('181.188.132.118' == $_SERVER['REMOTE_ADDR']) {
    /* echo 'My server';
    $sess = $_SESSION;
    echo '<pre />';
    print_r($sess); */
}

/******************************
 * DOCTRINE
 *****************************/
$paths = [ __DIR__ . '/php/src/CastingteamBundle/Entity' ];
$isDevMode = true;
$dbParams = [
    'driver' => 'pdo_mysql',
    'host' => DATABASE_SERVER,
    'dbname' => DATABASE_DB,
    'user' => DATABASE_USER,
    'password' => DATABASE_WACHTWOORD,
];

$cache = new FilesystemCache('cache/' . ENVIRONMENT);
$config = Setup::createConfiguration($isDevMode, 'cache/proxy_' . ENVIRONMENT, $cache);

$driver = new AnnotationDriver(new AnnotationReader(), $paths);
AnnotationRegistry::registerLoader([$loader, 'loadClass']);
$config->setMetadataDriverImpl($driver);
$entityManager = EntityManager::create($dbParams, $config);

$json = json_decode(file_get_contents('php://input'), true);
$post = is_array($json) ? array_merge($json, $_POST) : $_POST;

$request = new Http_Request($_SESSION, $_REQUEST, $post, $_GET, $_SERVER, $_COOKIE);


/******************************
 * SMARTY
 *****************************/

Flight::register('smarty', 'Smarty', [], function ($smarty) {
	$smarty->setTemplateDir('templates/');
	$smarty->setCompileDir('templates/_compile/');
});

$DBController = DBController::getInstance();
$phones = $DBController->getFrontendPhones();
$country_emails = $DBController->getFrontendEmail();

Flight::smarty()->assign('all_langs', $DBController->getAllLangs());
Flight::smarty()->assign('countries', get_countries());
Flight::smarty()->assign('phones', $phones);
Flight::smarty()->assign('country_emails', $country_emails);
Flight::set('request', $request);
Flight::set('entityManager', $entityManager);

// if ($request->isHttps()) {
//     Flight::set('protocol', HTTPS);
// } else {
    Flight::set('protocol', 'http');
// }

Flight::map('notFound', function() {
    if (Flight::bg()->checkLoggedInCms()) {
        $account = new Account_Admin(new Core_SessionHandler());
    } else {
        $account = new Account_Vip(new Core_SessionHandler());
    }

	Controller_NotFound::create($account)->show(Flight::get('request'));
});

if (empty($_SESSION['country'])) {
	$_SESSION['country'] = COUNTRY_MAP['default'];
}

/******************************
 * MYSQLI
 *****************************/

Flight::register('db', 'mysqli', [DATABASE_SERVER, DATABASE_USER, DATABASE_WACHTWOORD, DATABASE_DB]);
$DBController->setEncoding();
$categories = $DBController->getMainCategories();
$groups = $DBController->getAllGroups();
Flight::smarty()->assign('groups', $groups);
Flight::smarty()->assign('categories', $categories);
$siteType = (new Router_HostResolver)->resolve($request->getServer()['HTTP_HOST']);

/******************************
 * AUTOLOAD CLASSES
 *****************************/

Flight::register('bg', 'Background');

/******************************
 * REDIRECT
 *****************************/

// if (ENVIRONMENT == Enum_Environment::PRODUCTION && !$request->isHttps() && Enum_Site::borderfield() != $siteType) {
//     header('HTTP/1.1 301 Moved Permanently');
//     header('Location: '.HTTPS.'://' . $request->getServer()['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
// }

// if ($request->isHttps() && Enum_Site::borderfield() == $siteType) {
//     header('HTTP/1.1 301 Moved Permanently');
//     header('Location: http://' . $request->getServer()['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
// }

if (array_key_exists($_SERVER['HTTP_HOST'], DOMAIN_REDIRECT_MAP)) {
	header('HTTP/1.1 301 Moved Permanently');

	// if (Flight::get('request')->isHttps()) {
	// 	$protocol = HTTPS;
	// } else {
		$protocol = 'http';
	// }

	header('Location: ' . $protocol . '://' . DOMAIN_REDIRECT_MAP[$_SERVER['HTTP_HOST']] . $_SERVER['REQUEST_URI']);
}

/******************************
 * TAAL INSTELLEN
 *****************************/

$url = Flight::request()->url;

Flight::smarty()->assign('request_url', preg_replace('/\/[a-z]{2}(\/)?/ui', '', $url));
$array = explode("/", $url);

if ((new Core_SessionHandler())->get('lang') === false) {
    $isLanguageSet = false;
} else {
    $isLanguageSet = true;
}

if (!empty($array[1]) && !is_null(Enum_Language::create($array[1])->getValue())) 
{
    $language = $array[1];

    if (!(new Core_SessionHandler())->get('lang') || (new Core_SessionHandler())->get('lang') != $language)
    {
        (new Core_SessionHandler())->set('lang', $language);

        if (Enum_Site::borderfield()->getValue() == $siteType->getValue())
        {
            if ($language == Enum_Language::BE) {
                $country = 'belgium';
            } elseif ($language == Enum_Language::NL) {
                $country = 'netherlands';
            } elseif ($language == Enum_Language::DE) {
                $country = 'germany';
            } elseif ($language == Enum_Language::EN) {
                $country = 'germany';
            } else {
                $country = 'belgium';
            }
        }
        else
        {
            if ($language == Enum_Language::FR) {
                $country = 'bruxelles';
            } else {
                $country = 'vlaanderen';
            }
        }

        (new Core_SessionHandler())->set('country', $country);
    }

} else {
    $language = (new Core_SessionHandler())->get('lang') ? (new Core_SessionHandler())->get('lang') : Enum_Language::create(Enum_Language::DEFAULT_LANGUAGE)->getValue();

    if (Enum_Site::borderfield()->getValue() == $siteType->getValue()) 
    {
        $language = Enum_Language::create(Enum_Language::BE)->getValue();
    }

    if (empty($array[1]) || (!in_array($array[1], ['cms', 'ajax', 'pdf', 'api']) && !is_numeric($array[1]))) 
    {
        header('HTTP/1.1 301 Moved Permanently');
        header("Location: /" . $language);
        exit();
    }
}

if(Enum_Site::borderfield() != $siteType)
{
    $localisation = Localization_Resolver::create()->resolve($language);
    Flight::set('taalContent', $localisation);
    Flight::smarty()->assign('taalContent', $localisation);
}

Flight::set('taal', $language);
Flight::smarty()->assign('isLanguageSet', $isLanguageSet);
Flight::smarty()->assign('taal', $language);
Flight::smarty()->assign('language', $language);

# @efabily
if (Enum_Site::borderfield()->getValue() == $siteType->getValue())
{
    if ($language == Enum_Language::BE) {
        Flight::smarty()->assign('languageContent', (new Localization_Borderfield_Be)->getContent());
    } elseif ($language == Enum_Language::NL) {
        Flight::smarty()->assign('languageContent', (new Localization_Borderfield_Nl)->getContent());
    } elseif ($language == Enum_Language::DE) {
        Flight::smarty()->assign('languageContent', (new Localization_Borderfield_De)->getContent());
    } elseif ($language == Enum_Language::EN) {
        Flight::smarty()->assign('languageContent', (new Localization_Borderfield_En)->getContent());
    } else {
        Flight::smarty()->assign('languageContent', (new Localization_Borderfield_Be)->getContent());
    }
}
else
{
    Flight::smarty()->assign('languageContent', (new Localization_Borderfield_En)->getContent());
}

if ((new Localization_HostMapper)->map($request->getServer()['HTTP_HOST'])) {
    $location = (new Localization_HostMapper)->map($request->getServer()['HTTP_HOST']);

    (new Core_SessionHandler())->set('country', $location);
}

$mail = ['castingteam.be' => 'info_be', 'castingteam.nl' => 'info_nl', 'castingteam.com' => 'info_com'];

if (array_key_exists($request->getServer()['HTTP_HOST'], $mail)) {
    Flight::smarty()->assign('mail_hook', $mail[$request->getServer()['HTTP_HOST']]);
} else {
    Flight::smarty()->assign('mail_hook', 'info_com');
}

setlocale(LC_ALL, 'nl_NL');

/******************************
 * IMAGES ROUTES
 *****************************/

Flight::route('/@lang:[a-z]{2}/images/@img', function ($lang, $img) {
	Flight::redirect('/images/site/' . $img);
});

Flight::route('/@lang:[a-z]{2}/@page/images/@img', function ($lang, $page, $img) {
	Flight::redirect('/images/site/' . $img);
});

Flight::route('/css/site/images/@img', function ($img) {
	Flight::redirect('/images/site/' . $img);
});

Flight::route('/css/images/@img', function ($img) {
	Flight::redirect('/images/site/' . $img);
});

Flight::route('/@id/middle/@img', function ($id, $img) {

    if (Flight::bg()->checkLoggedInCms()) {
        $account = new Account_Admin(new Core_SessionHandler());
    } else {
        $account = new Account_Vip(new Core_SessionHandler());
    }

    (new Api_Image($account))
        ->get(Flight::get('request'))
        ->send();
});


/******************************
 * PDF ROUTE
 *****************************/

Flight::route('/pdf/@method', function ($method) {
	$pdf = new Pdf();

	if (method_exists('Pdf', $method)) {
		$pdf->$method(Pdf::MODEL_TEMPLATE);
	} else {
        Flight::notFound();
	}
});

/******************************
 * AJAX ROUTE
 *****************************/

Flight::route('/ajax/@method', function ($method) {
    if (Flight::bg()->checkLoggedInCms()) {
        $account = new Account_Admin(new Core_SessionHandler());
    } else {
        $account = new Account_Vip(new Core_SessionHandler());
    }
	include_once ('php/ajax/ajax.php');
	$ajax = new Ajax($account);

	if (method_exists('Ajax', $method)) {
		$ajax->$method();
	} else {
        Flight::notFound();
    }
});

Flight::route('/api/@class/@method', function ($class, $method) {
    $className = 'Api_' . ucfirst($class);

    if (Flight::bg()->checkLoggedInCms()) {
        $account = new Account_Admin(new Core_SessionHandler());
    } else {
        $account = new Account_Vip(new Core_SessionHandler());
    }

    if (file_exists(__DIR__ . '/php/src/Api/' . ucfirst($class) . '.php')) {
        if (method_exists($className, $method)) {
            try {
                $api = new $className($account);
                #echo 1;exit;
                $api->$method(Flight::get('request'))->send();
            } catch (Core_Exception $e) {
                Logger_Error::create()->error(sprintf('%s: %s', get_class($e), $e->getMessage()), []);

                Http_ErrorResponse::create(
                    json_encode(
                        [
                            'error' => true,
                            'message' => $e->getMessage()
                        ]
                    )
                )->send();
            } catch (Exception $e) {
                Logger_Error::create()->error(sprintf('%s: %s', get_class($e), $e->getMessage()), []);

                Http_ErrorResponse::create(
                    json_encode(
                        [
                            'error' => true,
                            'message' => $e->getMessage()
                        ]
                    )
                )->send();
            }
        } else {
            Flight::notFound();
        }
    } else {
        Flight::notFound();
    }
});

/******************************
 * SITE PAGES ROUTES
 *****************************/


if (Enum_Site::borderfield() == $siteType) {
    Flight::route('/(@lang:[a-z]{2}(/@page(/@ref)))', function($lang, $page, $ref) {

        $country = (new Core_SessionHandler())->get('country');
        $lang = (new Core_SessionHandler())->get('lang');

        if(('germany' == $country) && ('de' == $lang || 'en' == $lang))
        {
            if(!isset($_SESSION['auth']))
            {
                $restricted = ["models-boys-men", "models-girls-women", "models-gentlemen", "models-ladies", "models-sports-athletes"];
                if(in_array($page, $restricted))
                {
                    $request = Flight::get('request');

                    $back = 'http://' . $request->getServer()['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                    $encoded = base64_encode($back);

                    $url = 'http://' . $request->getServer()['HTTP_HOST'] . "/auth?back=$encoded&lang=$lang&country=$country";
                    header('Location: '. $url );
                    exit;
                }
            }
        }

        try {
            $account = Flight::bg()->checkLoggedInCms()
                ? new Account_Admin(new Core_SessionHandler())
                : $account = new Account_Vip(new Core_SessionHandler());

            $router = (new Router(Config_PageController::CONFIG[Enum_Site::BORDERFIELD]));

            (new App($router, $account, new GeoIPLocation()))->run(Flight::get('request'));

        } catch (Exception $e) {
            Logger_Error::create()->error(sprintf('%s: %s', get_class($e), $e->getMessage()), []);

            Http_ErrorResponse::create(
                json_encode(
                    [
                        'error' => true,
                        'message' => $e->getMessage()
                    ]
                )
            )->send();
        }
    });
} else {
    Flight::route('/(@lang:[a-z]{2})', function () {
        $account = Flight::bg()->checkLoggedInCms()
            ? new Account_Admin(new Core_SessionHandler())
            : $account = new Account_Vip(new Core_SessionHandler());

        Controller_Homepage::create($account)->show(Flight::get('request'));
    }, true);


    Flight::route('/@lang:[a-z]{2}/@page/@ref:\d+', function ($lang, $page, $ref) {
        $account = Flight::bg()->checkLoggedInCms()
            ? new Account_Admin(new Core_SessionHandler())
            : $account = new Account_Vip(new Core_SessionHandler());

        if (in_array($page, Flight::get('taalContent')['navigation'])) {
            Flight::set('current_page', $page);
            Flight::smarty()->assign('model_id', $ref);
            $page = new Controller_Model($account, $ref);
            $page->show(Flight::get('request'));
        } elseif ($page == 'register') {
            if (is_numeric($ref)) {
                $method = "stap" . $ref;
            } else {
                $method = $ref;
            }

            $registreren = new Registreren($account);

            if (method_exists('Registreren', $method)) {
                $registreren->$method();
            } else {
                Flight::notFound();
            }
        } else {
            Flight::notFound();
        }
    }, true);

    Flight::route('/@lang:[a-z]{2}/@page', function ($lang, $page) {
        Flight::set('current_page', $page);

        $account = Flight::bg()->checkLoggedInCms()
            ? new Account_Admin(new Core_SessionHandler())
            : $account = new Account_Vip(new Core_SessionHandler());

        if (array_key_exists($page, Config_PageController::CONFIG[Enum_Site::CASTINGTEAM])) {
            $pageConfig = Config_PageController::CONFIG[Enum_Site::CASTINGTEAM][$page];
            $class = $pageConfig['class'];
            $page = new $class($account, $pageConfig);
            $page->show(Flight::get('request'));
        } elseif (file_exists(__DIR__ . '/php/src/Controller/' . ucfirst($page) . '.php')) {
            $class = 'Controller_' . ucfirst($page);
            $page = new $class($account);
            $page->show(Flight::get('request'));
        } elseif (in_array($page, Flight::get('taalContent')['navigation'])) {
            Controller_People::create($account)->show(Flight::get('request'));
        } elseif (array_key_exists($page, COUNTRY_MAP)) {
            $session = new Core_SessionHandler();
            $session->set('country', $page);
            // if (in_array(Enum_Language::getList(), $lang)) {
            if (in_array($lang, Enum_Language::getList())) {
                $session->set('lang', $lang);
            }

            header('Location: /');
            exit();
        } else {
            Flight::notFound();
        }
    });
}

/******************************
 * CMS ROUTE
 *****************************/

Flight::route('/cms', function () {
    $account = new Account_Admin(new Core_SessionHandler());

    if ($account->isLogged()) {
        Flight::smarty()->assign('admin', $account->get()->toArray());
        include_once ('php/cms/homepage.php');
		$cms = new Homepage($account);
		$cms->show();
	} else {
		include_once ('php/cms/login.php');
		$cms = new Login($account);
		$cms->show(Flight::get('request'));
	}
});

Flight::route('/cms/*', function () {
    $account = new Account_Admin(new Core_SessionHandler());

    if (!$account->isLogged()) {
		header('Location: /cms');
	} else {
		$urls = explode("/", Flight::request()->url);

		if (
		    isset($urls[2]) &&
            isset($urls[3]) &&
            isset($urls[4]) &&
            file_exists('php/cms/' . $urls[2] . '/' . $urls[3] . '.php')
        ) {
			include_once ('php/cms/' . $urls[2] . '/' . $urls[3] . '.php');
            Flight::smarty()->assign('admin', $account->get()->toArray());

            $cms = new $urls[3]($account);
			$method = preg_replace('/\?(.+)?/', '', $urls[4]);
			$cms->$method();
		} else {
            Flight::notFound();
		}
	}
});

/******************************
 * REGISTER
 *****************************/

Flight::route('/@lang:[a-z]+/register/@step', function ($lang, $step) {
	include_once ('php/front/registreren.php');
    $method = is_numeric($step) ? 'stap' . $step : $step;
    $account = Flight::bg()->checkLoggedInCms()
        ? new Account_Admin(new Core_SessionHandler())
        : $account = new Account_Vip(new Core_SessionHandler());

	if (method_exists('Registreren', $method)) {
        (new Registreren($account))->$method();
	} else {
        Flight::notFound();
	}
});

Flight::start();

