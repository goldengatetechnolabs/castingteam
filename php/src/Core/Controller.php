<?php

use CastingteamBundle\Entity\Repository\FactoryInterface;
use CastingteamBundle\Entity\Repository\Factory as RepositoryFactory;
use Doctrine\ORM\EntityManagerInterface;

abstract class Core_Controller
{
    use Core_ParameterValidationTrait;

    /**
     * @var int
     */
    protected $access = Enum_Access::UNLOGGED;

    /**
     * @var DBController
     */
    protected $controller;

    /**
     * @var Smarty
     */
    protected $smarty;

    /**
     * @var Core_Account
     */
    protected $account;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var FactoryInterface
     */
    protected $entityFactory;

    /**
     * @param Core_Account $account
     */
    public function __construct(Core_Account $account)
    {
        if (Flight::bg()->checkLoggedInCms()) {
            $this->access += Enum_Access::ADMIN;
        }

        if (Flight::bg()->checkIsLogged()) {
            Flight::bg()->initSiteLogging();
            $this->access += Enum_Access::VIP;
        }

        $this->account = $account;
        $this->smarty = Flight::smarty();
        $this->controller = DBController::getInstance();
        $this->entityManager = Flight::get('entityManager');
        $this->entityFactory = new RepositoryFactory($this->entityManager);
    }

    /**
     * @param Core_Account $account
     * @return static
     */
    public static function create(Core_Account $account)
    {
        return new static($account);
    }

    /**
     * @return bool
     */
    protected function isLogged()
    {
        if ($this->access >= Enum_Access::VIP + Enum_Access::UNLOGGED) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    protected function isAdmin()
    {
        if ($this->access >= Enum_Access::ADMIN + Enum_Access::ADMIN) {
            return true;
        }

        return false;
    }

    /**
     * @return DBController
     */
    protected function getController()
    {
        if (!$this->controller) {
            $this->controller = DBController::getInstance();
        }

        return $this->controller;
    }

    /**
     * @return Smarty
     */
    protected function getSmarty()
    {
        if (!$this->smarty) {
            $this->smarty = Flight::smarty();
        }

        return $this->smarty;
    }

    /**
     * @param string[] $container
     * @param string $needle
     * @return string[]
     */
    protected function arrangeArrayFromContainer(array $container, $needle)
    {
        $array = [];

        foreach ($container as $key => $value) {
            if (preg_match(sprintf('/%s/ui', $needle), $key)) {
                $newKey = trim(preg_replace(sprintf('/%s/ui', $needle), '', $key), '_');
                $array[$newKey] = $value;
            }
        }

        return $array;
    }

    /**
     * @return void
     */
    protected function notFound()
    {
        Flight::notFound();

        exit();
    }
}
