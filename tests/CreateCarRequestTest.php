<?php

use PHPUnit\Framework\TestCase;

class CreateCarRequestTest extends TestCase
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

    public function test_response_create_car()
    {
        $response = $this->http->request('POST', 'create_single',
            array(
                "License plate"=>"PJ9273542",
                "Car km"=>30000,
                "Location"=>"Rønde",
                "Car year"=>2022,
                "Number of doors"=>5,
                "Number of seats"=>5,
                "Inside height"=>2.5,
                "Inside length"=>3,
                "Inside width"=>2.3,
                "Car Brand"=>"Fiat",
                "Car Model"=>"Panda",
                "Car Type"=>"Small car",
                "Fuel Type"=>"Petrol",
                "Transmission"=>"Manual"
            )
        );
        
        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];
        $this->assertEquals("application/json; charset=UTF-8", $contentType);
    }
}