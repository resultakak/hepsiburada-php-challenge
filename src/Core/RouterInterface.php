<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */

namespace Api\Core;

use Closure;

/**
 * Interface RouterInterface
 *
 * @category RouterInterface
 * @package  Api\Core
 */
interface RouterInterface
{
    /**
     * @param string  $path
     * @param Closure|array<string, string> $callback
     */
    public function get(string $path, $callback): void;

    /**
     * @param string  $path
     * @param Closure|array<string, string> $callback
     */
    public function post(string $path, $callback): void;

    /**
     * @param string  $path
     * @param Closure|array<string, string> $callback
     */
    public function put(string $path, $callback): void;

    /**
     * @param string  $path
     * @param Closure|array<string, string> $callback
     */
    public function delete(string $path, $callback): void;

    /**
     * @param string  $path
     * @param Closure|array<string, string> $callback
     */
    public function options(string $path, $callback): void;

    /**
     * @param string  $path
     * @param Closure|array<string, string> $callback
     */
    public function head(string $path, $callback): void;

    /**
     * @return false|mixed|string
     */
    public function resolve();

    /**
     * @return mixed
     */
    public function render(string $response);
}
