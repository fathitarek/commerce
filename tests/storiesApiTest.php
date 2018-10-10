<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class storiesApiTest extends TestCase
{
    use MakestoriesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatestories()
    {
        $stories = $this->fakestoriesData();
        $this->json('POST', '/api/v1/stories', $stories);

        $this->assertApiResponse($stories);
    }

    /**
     * @test
     */
    public function testReadstories()
    {
        $stories = $this->makestories();
        $this->json('GET', '/api/v1/stories/'.$stories->id);

        $this->assertApiResponse($stories->toArray());
    }

    /**
     * @test
     */
    public function testUpdatestories()
    {
        $stories = $this->makestories();
        $editedstories = $this->fakestoriesData();

        $this->json('PUT', '/api/v1/stories/'.$stories->id, $editedstories);

        $this->assertApiResponse($editedstories);
    }

    /**
     * @test
     */
    public function testDeletestories()
    {
        $stories = $this->makestories();
        $this->json('DELETE', '/api/v1/stories/'.$stories->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/stories/'.$stories->id);

        $this->assertResponseStatus(404);
    }
}
