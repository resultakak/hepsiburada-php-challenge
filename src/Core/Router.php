<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Core;

use Api\Bootstrap\Application;
use Api\Controllers\NotFoundController;
use Api\Http\RequestInterface;
use Api\Http\ResponseInterface;
use Api\Traits\InstanceTrait;
use Closure;
use Exception;

/**
 * Class Router
 *
 * @package Api\Core
 * @author  Resul Takak <resultakak@gmail.com>
 */
class Router implements RouterInterface
{
    use InstanceTrait;

    /**
     * @var RequestInterface
     */
    public RequestInterface $request;

    /**
     * @var ResponseInterface
     */
    public ResponseInterface $response;

    /**
     * @var array<array> $routes
     */
    protected array $routes = [];

    public function __construct(RequestInterface $request, ResponseInterface $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @param string                        $path
     * @param Closure|array<string, string> $callback
     */
    public function get(string $path, $callback): void
    {
        $this->routes['get'][url_mach_helper($path)] = $callback;
    }

    /**
     * @param string                        $path
     * @param Closure|array<string, string> $callback
     */
    public function post(string $path, $callback): void
    {
        $this->routes['post'][url_mach_helper($path)] = $callback;
    }

    /**
     * @param string                        $path
     * @param Closure|array<string, string> $callback
     */
    public function put(string $path, $callback): void
    {
        $this->routes['put'][url_mach_helper($path)] = $callback;
    }

    /**
     * @param string                        $path
     * @param Closure|array<string, string> $callback
     */
    public function delete(string $path, $callback): void
    {
        $this->routes['delete'][url_mach_helper($path)] = $callback;
    }

    /**
     * @param string                        $path
     * @param Closure|array<string, string> $callback
     */
    public function options(string $path, $callback): void
    {
        $this->routes['options'][$path] = $callback;
    }

    /**
     * @param string                        $path
     * @param Closure|array<string, string> $callback
     */
    public function head(string $path, $callback): void
    {
        $this->routes['head'][$path] = $callback;
    }

    /**
     * @return false|mixed|string
     * @throws Exception
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if (false === $callback) {
            $callback = [NotFoundController::class, 'index'];
        }

        if (true === is_string($callback)) {
            return $this->render($callback);
        }

        if (is_array($callback)) {
            $controller = new $callback[0]();
            $controller->action = $callback[1];
            Application::$app->controller = $controller;
            $callback[0] = $controller;
        }

        return call_user_func($callback, $this->request, $this->response);
    }

    /**
     * @param string $response
     * @return string
     */
    public function render(string $response)
    {
        $this->response->setStatusCode(200);
        return $response;
    }
}
