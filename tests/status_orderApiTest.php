<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class status_orderApiTest extends TestCase
{
    use Makestatus_orderTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatestatus_order()
    {
        $statusOrder = $this->fakestatus_orderData();
        $this->json('POST', '/api/v1/statusOrders', $statusOrder);

        $this->assertApiResponse($statusOrder);
    }

    /**
     * @test
     */
    public function testReadstatus_order()
    {
        $statusOrder = $this->makestatus_order();
        $this->json('GET', '/api/v1/statusOrders/'.$statusOrder->id);

        $this->assertApiResponse($statusOrder->toArray());
    }

    /**
     * @test
     */
    public function testUpdatestatus_order()
    {
        $statusOrder = $this->makestatus_order();
        $editedstatus_order = $this->fakestatus_orderData();

        $this->json('PUT', '/api/v1/statusOrders/'.$statusOrder->id, $editedstatus_order);

        $this->assertApiResponse($editedstatus_order);
    }

    /**
     * @test
     */
    public function testDeletestatus_order()
    {
        $statusOrder = $this->makestatus_order();
        $this->json('DELETE', '/api/v1/statusOrders/'.$statusOrder->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/statusOrders/'.$statusOrder->id);

        $this->assertResponseStatus(404);
    }
}
