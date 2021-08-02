<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Constants;

/**
 * Class HttpCodes
 *
 * @package Api\Constants
 * @author  Resul Takak <resultakak@gmail.com>
 */
class HttpCodes
{
    public const OK                    = 200;

    public const CREATED               = 201;

    public const ACCEPTED              = 202;

    public const MOVED_PERMANENTLY     = 301;

    public const FOUND                 = 302;

    public const TEMPORARY_REDIRECT    = 307;

    public const PERMANENTLY_REDIRECT  = 308;

    public const BAD_REQUEST           = 400;

    public const UNAUTHORIZED          = 401;

    public const FORBIDDEN             = 403;

    public const NOT_FOUND             = 404;

    public const INTERNAL_SERVER_ERROR = 500;

    public const NOT_IMPLEMENTED       = 501;

    public const BAD_GATEWAY           = 502;

    public const $codes = [
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
}
