<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class buyersApiTest extends TestCase
{
    use MakebuyersTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatebuyers()
    {
        $buyers = $this->fakebuyersData();
        $this->json('POST', '/api/v1/buyers', $buyers);

        $this->assertApiResponse($buyers);
    }

    /**
     * @test
     */
    public function testReadbuyers()
    {
        $buyers = $this->makebuyers();
        $this->json('GET', '/api/v1/buyers/'.$buyers->id);

        $this->assertApiResponse($buyers->toArray());
    }

    /**
     * @test
     */
    public function testUpdatebuyers()
    {
        $buyers = $this->makebuyers();
        $editedbuyers = $this->fakebuyersData();

        $this->json('PUT', '/api/v1/buyers/'.$buyers->id, $editedbuyers);

        $this->assertApiResponse($editedbuyers);
    }

    /**
     * @test
     */
    public function testDeletebuyers()
    {
        $buyers = $this->makebuyers();
        $this->json('DELETE', '/api/v1/buyers/'.$buyers->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/buyers/'.$buyers->id);

        $this->assertResponseStatus(404);
    }
}
