<?php

use App\Models\stories;
use App\Repositories\storiesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class storiesRepositoryTest extends TestCase
{
    use MakestoriesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var storiesRepository
     */
    protected $storiesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->storiesRepo = App::make(storiesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatestories()
    {
        $stories = $this->fakestoriesData();
        $createdstories = $this->storiesRepo->create($stories);
        $createdstories = $createdstories->toArray();
        $this->assertArrayHasKey('id', $createdstories);
        $this->assertNotNull($createdstories['id'], 'Created stories must have id specified');
        $this->assertNotNull(stories::find($createdstories['id']), 'stories with given id must be in DB');
        $this->assertModelData($stories, $createdstories);
    }

    /**
     * @test read
     */
    public function testReadstories()
    {
        $stories = $this->makestories();
        $dbstories = $this->storiesRepo->find($stories->id);
        $dbstories = $dbstories->toArray();
        $this->assertModelData($stories->toArray(), $dbstories);
    }

    /**
     * @test update
     */
    public function testUpdatestories()
    {
        $stories = $this->makestories();
        $fakestories = $this->fakestoriesData();
        $updatedstories = $this->storiesRepo->update($fakestories, $stories->id);
        $this->assertModelData($fakestories, $updatedstories->toArray());
        $dbstories = $this->storiesRepo->find($stories->id);
        $this->assertModelData($fakestories, $dbstories->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletestories()
    {
        $stories = $this->makestories();
        $resp = $this->storiesRepo->delete($stories->id);
        $this->assertTrue($resp);
        $this->assertNull(stories::find($stories->id), 'stories should not exist in DB');
    }
}
