<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Http;

/**
 * Interface RequestInterface
 *
 * @category RequestInterface
 * @package  Api\Http
 */
interface RequestInterface extends HttpInterface
{
    /**
     * @return mixed
     */
    public function getPath();

    /**
     * @return string
     */
    public function getMethod(): string;

    /**
     * @return array<mixed>
     */
    public function getBody(): array;
}
