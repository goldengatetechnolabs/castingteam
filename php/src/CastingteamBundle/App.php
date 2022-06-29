<?php

namespace CastingteamBundle;

use CastingteamBundle\Interaction\Router\RouterInterface;
use Controller_NotFound;
use Core_Account;
use Flight;
use Http_Request;
use Victorybiz\GeoIPLocation\GeoIPLocation;

final class App
{
    /**
     * @var GeoIPLocation
     */
    private $geo;

    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var Core_Account
     */
    private $account;

    /**
     * @param RouterInterface $router
     * @param Core_Account $account
     * @param GeoIPLocation $geo
     */
    public function __construct(
        RouterInterface $router,
        Core_Account $account,
        GeoIPLocation $geo
    ) {
        $this->router = $router;
        $this->account = $account;
        $this->geo = $geo;
    }

    /**
     * @param Http_Request $request
     */
    public function run(\Http_Request $request)
    {
        $this->setUpLocation($request);
        $this->setGlobals();

        $this->execute($request);
    }

    /**
     * @param Http_Request $request
     * @return void
     */
    private function setUpLocation(\Http_Request $request)
    {
        $this->geo->setIP($request->getServer()['REMOTE_ADDR']);
    }

    /**
     * @return void
     */
    private function setGlobals()
    {
        Flight::set('location', $this->geo->getCountryCode());
    }

    /**
     * @param Http_Request $request
     */
    private function execute(Http_Request $request)
    {
        $url = explode('?', $request->getServer()['REQUEST_URI'], 2)[0];

        if (count($this->router->getRoute($url))) {
            $pageConfig = $this->router->getRoute($url);
            $class = $pageConfig['class'];

            $controller = new $class($this->account, $pageConfig);

            call_user_func([$controller, $pageConfig['method']], $request);
        } else {
            (new Controller_NotFound($this->account))->show($request);
        }
    }
}