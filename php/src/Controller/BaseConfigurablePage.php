<?php

abstract class Controller_BaseConfigurablePage extends Controller_Page
{
    /**
     * @var string[]
     */
    protected $parameters;

    /**
     * @param Core_Account $account
     * @param string[] $parameters
     */
    public function __construct(Core_Account $account, array $parameters)
    {
        parent::__construct($account);

        $this->parameters = $parameters;
    }
}
