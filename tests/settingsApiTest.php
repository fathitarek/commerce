<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class settingsApiTest extends TestCase
{
    use MakesettingsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatesettings()
    {
        $settings = $this->fakesettingsData();
        $this->json('POST', '/api/v1/settings', $settings);

        $this->assertApiResponse($settings);
    }

    /**
     * @test
     */
    public function testReadsettings()
    {
        $settings = $this->makesettings();
        $this->json('GET', '/api/v1/settings/'.$settings->id);

        $this->assertApiResponse($settings->toArray());
    }

    /**
     * @test
     */
    public function testUpdatesettings()
    {
        $settings = $this->makesettings();
        $editedsettings = $this->fakesettingsData();

        $this->json('PUT', '/api/v1/settings/'.$settings->id, $editedsettings);

        $this->assertApiResponse($editedsettings);
    }

    /**
     * @test
     */
    public function testDeletesettings()
    {
        $settings = $this->makesettings();
        $this->json('DELETE', '/api/v1/settings/'.$settings->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/settings/'.$settings->id);

        $this->assertResponseStatus(404);
    }
}
