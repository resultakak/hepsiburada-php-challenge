<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Tests;

use Api\Tests\Constants\Config;
use Api\Tests\Constants\Methods;
use Api\Tests\Constants\StatusCodes;
use PHPUnit\Framework\TestCase;

/**
 * Class NotFoundRouterTest
 *
 * @package Api\Tests
 * @author  Resul Takak <resultakak@gmail.com>
 */
class NotFoundRouterTest extends TestCase
{
    /**
     * @var \GuzzleHttp\Client|null
     */
    private $client;

    public function testPOST(): void
    {
        $this->expectException(\GuzzleHttp\Exception\ClientException::class);
        $response = $this->client->request(Methods::GET, Config::URL.'none_route');
        $this->assertEquals(StatusCodes::NOT_FOUND, $response->getStatusCode());
    }

    protected function setUp(): void
    {
        $this->client = new \GuzzleHttp\Client();
    }

    protected function tearDown(): void
    {
        $this->client = null;
    }
}
