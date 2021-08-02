<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Http;

/**
 * Interface ResponseInterface
 *
 * @category ResponseInterface
 * @package  Api\Http
 * @method sendStatus()
 */
interface ResponseInterface extends HttpInterface
{
    /**
     * @param int $code
     * @return $this
     */
    public function setStatusCode(int $code): self;
}
