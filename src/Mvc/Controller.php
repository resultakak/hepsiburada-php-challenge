<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Mvc;

use Api\Bootstrap\Application;
use Api\Core\Session;
use Api\Http\RequestInterface;
use Api\Http\ResponseInterface;
use Api\Traits\InstanceTrait;

/**
 * Class Controller
 *
 * @package Api\Mvc
 * @author  Resul Takak <resultakak@gmail.com>
 */
abstract class Controller implements ControllerInterface
{
    use InstanceTrait;

    /**
     * @var string $action
     */
    public string $action;

    /**
     * @var Application $app
     */
    public Application $app;

    /**
     * @var RequestInterface $request
     */
    public RequestInterface $request;

    /**
     * @var ResponseInterface $response
     */
    public ResponseInterface $response;

    public Session $session;

    public function __construct()
    {
        $this->app = $this->getInstance();
        $this->request = $this->app->request;
        $this->response = $this->app->response;
        $this->session = $this->app->session;
    }

    /**
     * @param string $json
     * @return string
     */
    public function response(string $json): string
    {
        return $this->getInstance()->router->render($json);
    }

    /**
     * @return array<mixed>
     */
    public function get(): array
    {
        return $this->getInstance()->request->getBody();
    }

    /**
     * @return array<mixed>
     */
    public function post(): array
    {
        return $this->getInstance()->request->getBody();
    }
}
