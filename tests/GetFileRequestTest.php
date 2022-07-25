<?php

use PHPUnit\Framework\TestCase;

class GetFileRequestTest extends TestCase
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

    public function test_response_upload_csv()
    {
        $response = $this->http->request('POST', 'upload_file',
        [
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => fopen('./tests/source-1.csv', 'r')
                ]
            ]
        ]
        );

        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];
        $this->assertEquals("application/json; charset=UTF-8", $contentType);
    }

    public function test_response_upload_json()
    {
        $response = $this->http->request('POST', 'upload_file',
        [
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => fopen('./tests/source-2.json', 'r')
                ]
            ]
        ]
        );

        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];
        $this->assertEquals("application/json; charset=UTF-8", $contentType);
    }
}