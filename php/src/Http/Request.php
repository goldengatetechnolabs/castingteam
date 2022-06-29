<?php

class Http_Request
{
    /**
     * @var array
     */
    private $session;

    /**
     * @var array
     */
    private $post;

    /**
     * @var array
     */
    private $get;

    /**
     * @var array
     */
    private $request;

    /**
     * @var array
     */
    private $server;

    /**
     * @var array
     */
    private $cookie;

    /**
     * @var string
     */
    private $protocol;

    /**
     * @var Enum_Site
     */
    private $siteType;

    /**
     * Http_Request constructor.
     * @param array $session
     * @param array $request
     * @param array $post
     * @param array $get
     * @param array $server
     * @param array $cookie
     */
    public function __construct(array $session, array $request, array $post, array $get, array $server, array $cookie)
    {
        $this->session = $session;
        $this->request = $request;
        $this->post = $post;
        $this->get = $get;
        $this->server = $server;
        $this->cookie = $cookie;
        $this->siteType = (new Router_HostResolver)->resolve($server['HTTP_HOST']);

        if ($this->isHttps()) {
            $this->protocol = 'https';
        } else {
            $this->protocol = 'http';
        }
    }

    /**
     * @return array
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @return array
     */
    public function getGet()
    {
        return $this->get;
    }

    /**
     * @return array
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return array
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @return array
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @return array
     */
    public function getCookie()
    {
        return $this->cookie;
    }

    /**
     * @return string
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @return bool
     */
    public function isHttps()
    {
        return
            !empty($_SERVER['REQUEST_SCHEME']) &&
            $_SERVER['REQUEST_SCHEME'] == 'https';
    }

    /**
     * @return Enum_Site
     */
    public function getSiteType()
    {
        return $this->siteType;
    }

    /**
     * @param Enum_Site $siteType
     * @return Http_Request
     */
    public function setSiteType($siteType)
    {
        $this->siteType = $siteType;
        return $this;
    }
}
