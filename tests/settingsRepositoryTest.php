<?php

use App\Models\settings;
use App\Repositories\settingsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class settingsRepositoryTest extends TestCase
{
    use MakesettingsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var settingsRepository
     */
    protected $settingsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->settingsRepo = App::make(settingsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatesettings()
    {
        $settings = $this->fakesettingsData();
        $createdsettings = $this->settingsRepo->create($settings);
        $createdsettings = $createdsettings->toArray();
        $this->assertArrayHasKey('id', $createdsettings);
        $this->assertNotNull($createdsettings['id'], 'Created settings must have id specified');
        $this->assertNotNull(settings::find($createdsettings['id']), 'settings with given id must be in DB');
        $this->assertModelData($settings, $createdsettings);
    }

    /**
     * @test read
     */
    public function testReadsettings()
    {
        $settings = $this->makesettings();
        $dbsettings = $this->settingsRepo->find($settings->id);
        $dbsettings = $dbsettings->toArray();
        $this->assertModelData($settings->toArray(), $dbsettings);
    }

    /**
     * @test update
     */
    public function testUpdatesettings()
    {
        $settings = $this->makesettings();
        $fakesettings = $this->fakesettingsData();
        $updatedsettings = $this->settingsRepo->update($fakesettings, $settings->id);
        $this->assertModelData($fakesettings, $updatedsettings->toArray());
        $dbsettings = $this->settingsRepo->find($settings->id);
        $this->assertModelData($fakesettings, $dbsettings->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletesettings()
    {
        $settings = $this->makesettings();
        $resp = $this->settingsRepo->delete($settings->id);
        $this->assertTrue($resp);
        $this->assertNull(settings::find($settings->id), 'settings should not exist in DB');
    }
}
