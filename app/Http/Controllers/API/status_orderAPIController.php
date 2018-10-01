<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createstatus_orderAPIRequest;
use App\Http\Requests\API\Updatestatus_orderAPIRequest;
use App\Models\status_order;
use App\Repositories\status_orderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class status_orderController
 * @package App\Http\Controllers\API
 */

class status_orderAPIController extends AppBaseController
{
    /** @var  status_orderRepository */
    private $statusOrderRepository;

    public function __construct(status_orderRepository $statusOrderRepo)
    {
        $this->statusOrderRepository = $statusOrderRepo;
    }

    /**
     * Display a listing of the status_order.
     * GET|HEAD /statusOrders
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->statusOrderRepository->pushCriteria(new RequestCriteria($request));
        $this->statusOrderRepository->pushCriteria(new LimitOffsetCriteria($request));
        $statusOrders = $this->statusOrderRepository->all();

        return $this->sendResponse($statusOrders->toArray(), 'Status Orders retrieved successfully');
    }

    /**
     * Store a newly created status_order in storage.
     * POST /statusOrders
     *
     * @param Createstatus_orderAPIRequest $request
     *
     * @return Response
     */
    public function store(Createstatus_orderAPIRequest $request)
    {
        $input = $request->all();

        $statusOrders = $this->statusOrderRepository->create($input);

        return $this->sendResponse($statusOrders->toArray(), 'Status Order saved successfully');
    }

    /**
     * Display the specified status_order.
     * GET|HEAD /statusOrders/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var status_order $statusOrder */
        $statusOrder = $this->statusOrderRepository->findWithoutFail($id);

        if (empty($statusOrder)) {
            return $this->sendError('Status Order not found');
        }

        return $this->sendResponse($statusOrder->toArray(), 'Status Order retrieved successfully');
    }

    /**
     * Update the specified status_order in storage.
     * PUT/PATCH /statusOrders/{id}
     *
     * @param  int $id
     * @param Updatestatus_orderAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatestatus_orderAPIRequest $request)
    {
        $input = $request->all();

        /** @var status_order $statusOrder */
        $statusOrder = $this->statusOrderRepository->findWithoutFail($id);

        if (empty($statusOrder)) {
            return $this->sendError('Status Order not found');
        }

        $statusOrder = $this->statusOrderRepository->update($input, $id);

        return $this->sendResponse($statusOrder->toArray(), 'status_order updated successfully');
    }

    /**
     * Remove the specified status_order from storage.
     * DELETE /statusOrders/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var status_order $statusOrder */
        $statusOrder = $this->statusOrderRepository->findWithoutFail($id);

        if (empty($statusOrder)) {
            return $this->sendError('Status Order not found');
        }

        $statusOrder->delete();

        return $this->sendResponse($id, 'Status Order deleted successfully');
    }
}
