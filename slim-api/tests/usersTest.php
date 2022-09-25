<?php

use PHPUnit\Framework\TestCase;

class UsersTest extends TestCase
{
    public function testHome()
    {
        $http = new GuzzleHttp\Client(["base_uri" => "http://localhost:8000"]);

        $response = $http->request("GET", "/users");
        // Test StatusCode
        $this->assertEquals(200, $response->getStatusCode());

        // Test payload
        $body = json_decode($response->getBody());
        $this->assertIsArray($body);
    }
}
