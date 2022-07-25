<?php

use PHPUnit\Framework\TestCase;

class GetCarRequestTest extends TestCase
{
    private $http;

    public function setUp(): void
    {
        $this->http = new GuzzleHttp\Client(['base_uri' => 'http://localhost/OscarAPI/api/v1/']);
    }

    public function tearDown(): void
    {
        $this->http = null;
    }

    public function test_response_get_cars()
    {
        $response = $this->http->request('GET', 'get_cars');

        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];
        $this->assertEquals("application/json; charset=UTF-8", $contentType);

        //$userAgent = json_decode($response->getBody())->{"user-agent"};
        //$this->assertRegexp('/Guzzle/', $userAgent);
    }
}