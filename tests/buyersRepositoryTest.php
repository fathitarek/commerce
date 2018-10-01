<?php

use App\Models\buyers;
use App\Repositories\buyersRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class buyersRepositoryTest extends TestCase
{
    use MakebuyersTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var buyersRepository
     */
    protected $buyersRepo;

    public function setUp()
    {
        parent::setUp();
        $this->buyersRepo = App::make(buyersRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatebuyers()
    {
        $buyers = $this->fakebuyersData();
        $createdbuyers = $this->buyersRepo->create($buyers);
        $createdbuyers = $createdbuyers->toArray();
        $this->assertArrayHasKey('id', $createdbuyers);
        $this->assertNotNull($createdbuyers['id'], 'Created buyers must have id specified');
        $this->assertNotNull(buyers::find($createdbuyers['id']), 'buyers with given id must be in DB');
        $this->assertModelData($buyers, $createdbuyers);
    }

    /**
     * @test read
     */
    public function testReadbuyers()
    {
        $buyers = $this->makebuyers();
        $dbbuyers = $this->buyersRepo->find($buyers->id);
        $dbbuyers = $dbbuyers->toArray();
        $this->assertModelData($buyers->toArray(), $dbbuyers);
    }

    /**
     * @test update
     */
    public function testUpdatebuyers()
    {
        $buyers = $this->makebuyers();
        $fakebuyers = $this->fakebuyersData();
        $updatedbuyers = $this->buyersRepo->update($fakebuyers, $buyers->id);
        $this->assertModelData($fakebuyers, $updatedbuyers->toArray());
        $dbbuyers = $this->buyersRepo->find($buyers->id);
        $this->assertModelData($fakebuyers, $dbbuyers->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletebuyers()
    {
        $buyers = $this->makebuyers();
        $resp = $this->buyersRepo->delete($buyers->id);
        $this->assertTrue($resp);
        $this->assertNull(buyers::find($buyers->id), 'buyers should not exist in DB');
    }
}
