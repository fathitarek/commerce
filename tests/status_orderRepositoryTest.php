<?php

use App\Models\status_order;
use App\Repositories\status_orderRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class status_orderRepositoryTest extends TestCase
{
    use Makestatus_orderTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var status_orderRepository
     */
    protected $statusOrderRepo;

    public function setUp()
    {
        parent::setUp();
        $this->statusOrderRepo = App::make(status_orderRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatestatus_order()
    {
        $statusOrder = $this->fakestatus_orderData();
        $createdstatus_order = $this->statusOrderRepo->create($statusOrder);
        $createdstatus_order = $createdstatus_order->toArray();
        $this->assertArrayHasKey('id', $createdstatus_order);
        $this->assertNotNull($createdstatus_order['id'], 'Created status_order must have id specified');
        $this->assertNotNull(status_order::find($createdstatus_order['id']), 'status_order with given id must be in DB');
        $this->assertModelData($statusOrder, $createdstatus_order);
    }

    /**
     * @test read
     */
    public function testReadstatus_order()
    {
        $statusOrder = $this->makestatus_order();
        $dbstatus_order = $this->statusOrderRepo->find($statusOrder->id);
        $dbstatus_order = $dbstatus_order->toArray();
        $this->assertModelData($statusOrder->toArray(), $dbstatus_order);
    }

    /**
     * @test update
     */
    public function testUpdatestatus_order()
    {
        $statusOrder = $this->makestatus_order();
        $fakestatus_order = $this->fakestatus_orderData();
        $updatedstatus_order = $this->statusOrderRepo->update($fakestatus_order, $statusOrder->id);
        $this->assertModelData($fakestatus_order, $updatedstatus_order->toArray());
        $dbstatus_order = $this->statusOrderRepo->find($statusOrder->id);
        $this->assertModelData($fakestatus_order, $dbstatus_order->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletestatus_order()
    {
        $statusOrder = $this->makestatus_order();
        $resp = $this->statusOrderRepo->delete($statusOrder->id);
        $this->assertTrue($resp);
        $this->assertNull(status_order::find($statusOrder->id), 'status_order should not exist in DB');
    }
}
