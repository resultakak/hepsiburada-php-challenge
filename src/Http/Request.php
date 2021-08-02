<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Http;

use function filter_input;
use function parse_url;
use function htmlspecialchars;

/**
 * Class Request
 *
 * @package Api\Http
 * @author  Resul Takak <resultakak@gmail.com>
 */
class Request implements RequestInterface
{
    /**
     * @return false|mixed|string
     */
    public function getPath()
    {
        $path = urldecode(
            (string)parse_url(($_SERVER['REQUEST_URI'] ?? ""), PHP_URL_PATH)
        );

        $path = $path ?? '/';
        $position = strpos($path, '?');

        if (false === $position) {
            return $path;
        }

        return substr($path, 0, $position);
    }

    /**
     * @return array<mixed>
     */
    public function getBody(): array
    {
        $body = [];

        if ($this->isGet()) {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->isPost()) {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }

    /**
     * @return bool
     */
    public function isGet(): bool
    {
        return $this->getMethod() === 'get';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return strtolower(($_SERVER['REQUEST_METHOD'] ?? 'GET'));
    }

    /**
     * @return bool
     */
    public function isPost(): bool
    {
        return $this->getMethod() === 'post';
    }

    public function get(String $key = '')
    {
        if ($key != '') {
            return isset($_GET[$key]) ? $this->clean($_GET[$key]) : null;
        }

        return  $this->clean($_GET);
    }

    public function post(String $key = '')
    {
        if ($key != '') {
            return isset($_POST[$key]) ? $this->clean($_POST[$key]) : null;
        }

        return  $this->clean($_POST);
    }

    public function input(String $key = '')
    {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);

        if ($key != '') {
            return isset($request[$key]) ? $this->clean($request[$key]) : null;
        }

        return ($request);
    }

    private function clean($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                unset($data[$key]);
                $data[$this->clean($key)] = $this->clean($value);
            }
        } else {
            $data = isset($data)
                ? htmlspecialchars((string) $data, ENT_COMPAT, 'UTF-8')
                : (true === is_int($data) && $data >= 0 ? $data : null);
        }

        return $data;
    }
}
