<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class index_controlApiTest extends TestCase
{
    use Makeindex_controlTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateindex_control()
    {
        $indexControl = $this->fakeindex_controlData();
        $this->json('POST', '/api/v1/indexControls', $indexControl);

        $this->assertApiResponse($indexControl);
    }

    /**
     * @test
     */
    public function testReadindex_control()
    {
        $indexControl = $this->makeindex_control();
        $this->json('GET', '/api/v1/indexControls/'.$indexControl->id);

        $this->assertApiResponse($indexControl->toArray());
    }

    /**
     * @test
     */
    public function testUpdateindex_control()
    {
        $indexControl = $this->makeindex_control();
        $editedindex_control = $this->fakeindex_controlData();

        $this->json('PUT', '/api/v1/indexControls/'.$indexControl->id, $editedindex_control);

        $this->assertApiResponse($editedindex_control);
    }

    /**
     * @test
     */
    public function testDeleteindex_control()
    {
        $indexControl = $this->makeindex_control();
        $this->json('DELETE', '/api/v1/indexControls/'.$indexControl->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/indexControls/'.$indexControl->id);

        $this->assertResponseStatus(404);
    }
}
