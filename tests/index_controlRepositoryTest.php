<?php

use App\Models\index_control;
use App\Repositories\index_controlRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class index_controlRepositoryTest extends TestCase
{
    use Makeindex_controlTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var index_controlRepository
     */
    protected $indexControlRepo;

    public function setUp()
    {
        parent::setUp();
        $this->indexControlRepo = App::make(index_controlRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateindex_control()
    {
        $indexControl = $this->fakeindex_controlData();
        $createdindex_control = $this->indexControlRepo->create($indexControl);
        $createdindex_control = $createdindex_control->toArray();
        $this->assertArrayHasKey('id', $createdindex_control);
        $this->assertNotNull($createdindex_control['id'], 'Created index_control must have id specified');
        $this->assertNotNull(index_control::find($createdindex_control['id']), 'index_control with given id must be in DB');
        $this->assertModelData($indexControl, $createdindex_control);
    }

    /**
     * @test read
     */
    public function testReadindex_control()
    {
        $indexControl = $this->makeindex_control();
        $dbindex_control = $this->indexControlRepo->find($indexControl->id);
        $dbindex_control = $dbindex_control->toArray();
        $this->assertModelData($indexControl->toArray(), $dbindex_control);
    }

    /**
     * @test update
     */
    public function testUpdateindex_control()
    {
        $indexControl = $this->makeindex_control();
        $fakeindex_control = $this->fakeindex_controlData();
        $updatedindex_control = $this->indexControlRepo->update($fakeindex_control, $indexControl->id);
        $this->assertModelData($fakeindex_control, $updatedindex_control->toArray());
        $dbindex_control = $this->indexControlRepo->find($indexControl->id);
        $this->assertModelData($fakeindex_control, $dbindex_control->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteindex_control()
    {
        $indexControl = $this->makeindex_control();
        $resp = $this->indexControlRepo->delete($indexControl->id);
        $this->assertTrue($resp);
        $this->assertNull(index_control::find($indexControl->id), 'index_control should not exist in DB');
    }
}
