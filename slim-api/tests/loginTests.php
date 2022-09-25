<?php

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    public function testLogin()
    {
        $http = new GuzzleHttp\Client(["base_uri" => "http://localhost:8000"]);

        $testData = array(
            "phonenumber" => "070000000000000000000000",
            "password" => "nnnnnnnnnnnnnnnnnnnnnnnnnnn"
        );

        $response = $http->request("POST", "/login", ["json" => $testData]);
        // Test StatusCode
        $this->assertEquals(200, $response->getStatusCode());

        // Test payload
        $body = json_decode($response->getBody());
        $this->assertIsObject($body);
    }
}