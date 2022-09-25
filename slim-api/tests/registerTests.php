<?php

use PHPUnit\Framework\TestCase;

class RegisterTest extends TestCase
{
    public function testRegister()
    {
        $http = new GuzzleHttp\Client(["base_uri" => "http://localhost:8000"]);

        $randomPhoneNumber = substr(str_shuffle("0123456789"), 0, 9);

        $testData = array(
            "phonenumber" => "0711".$randomPhoneNumber,
            "password" => "nnnnnnnnnnnnnnnnnnnnnnnnnnn",
            "firstname" => "test",
            "lastname" => "test",
        );

        $response = $http->request("POST", "/register", ["json" => $testData]);
        // Test StatusCode
        $this->assertEquals(201, $response->getStatusCode());

        // Test payload
        $body = json_decode($response->getBody());
        $this->assertIsObject($body);
    }
}