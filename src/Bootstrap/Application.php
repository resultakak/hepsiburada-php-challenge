<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Bootstrap;

use Api\Core\Router;
use Api\Core\Session;
use Api\Http\Request;
use Api\Http\Response;

/**
 * Class Application
 *
 * @package Api\Bootstrap
 * @author  Resul Takak <resultakak@gmail.com>
 */
class Application
{
    /**
     * @var Application $app
     */
    public static Application $app;

    /**
     * @var mixed $controller
     */
    public $controller;

    /**
     * @var Router $router
     */
    public Router $router;

    /**
     * @var Request $request
     */
    public Request $request;

    /**
     * @var Session $session
     */
    public Session $session;

    /**
     * @var Response
     */
    public Response $response;

    public function __construct()
    {
        self::$app = $this;
        $this->session = new Session();
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    /**
     * @throws \Exception
     */
    public function run(): void
    {
        echo $this->router->resolve();
    }
}
