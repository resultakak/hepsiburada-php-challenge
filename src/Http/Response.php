<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Http;

/**
 * Class Response
 *
 * @package Api\Http
 * @author  Resul Takak <resultakak@gmail.com>
 */
class Response implements ResponseInterface
{
    /**
     * @var array|string[] $statusCodes
     */
    protected array $statusCodes = [
        200 => 'OK',
        301 => 'Moved Permanently',
        302 => 'Found',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        403 => 'Forbidden',
        404 => 'Not Found',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
    ];

    public int $code;

    public function setStatusCode(int $code): self
    {
        http_response_code($code);
        return $this;
    }

    public function isInvalid(int $statusCode): bool
    {
        return $statusCode < 100 || $statusCode >= 600;
    }

    public function sendStatus($code)
    {
        if (!$this->isInvalid($code)) {
            $this->setHeader(sprintf('HTTP/1.1 ' . $code . ' %s', $this->getStatusCodeText($code)));
        }

        return $this;
    }

    public function getStatusCodeText(int $code): string
    {
        $this->setStatusCode($code);
        return (string) isset($this->statusCodes[$code]) ? $this->statusCodes[$code] : 'unknown status';
    }

    public function setHeader(String $header)
    {
        $this->headers[] = $header;
    }
    public function getHeader()
    {
        return $this->headers;
    }

    public function json($data)
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header('Content-Type: application/json; charset=UTF-8');
        $data['meta'] = [
            'timestamp' => date('c'),
            'hash' => sha1(session_id().time())
        ];
        echo json_encode($data);
    }
}
