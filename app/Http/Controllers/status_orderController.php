<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createstatus_orderRequest;
use App\Http\Requests\Updatestatus_orderRequest;
use App\Repositories\status_orderRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class status_orderController extends AppBaseController
{
    /** @var  status_orderRepository */
    private $statusOrderRepository;

    public function __construct(status_orderRepository $statusOrderRepo)
    {
        $this->statusOrderRepository = $statusOrderRepo;
                        $this->middleware('auth');

    }

    /**
     * Display a listing of the status_order.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->statusOrderRepository->pushCriteria(new RequestCriteria($request));
        $statusOrders = $this->statusOrderRepository->all();

        return view('status_orders.index')
            ->with('statusOrders', $statusOrders);
    }

    /**
     * Show the form for creating a new status_order.
     *
     * @return Response
     */
    public function create()
    {
        return view('status_orders.create');
    }

    /**
     * Store a newly created status_order in storage.
     *
     * @param Createstatus_orderRequest $request
     *
     * @return Response
     */
    public function store(Createstatus_orderRequest $request)
    {
        $input = $request->all();

        $statusOrder = $this->statusOrderRepository->create($input);

        Flash::success('Status Order saved successfully.');

        return redirect(route('statusOrders.index'));
    }

    /**
     * Display the specified status_order.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $statusOrder = $this->statusOrderRepository->findWithoutFail($id);

        if (empty($statusOrder)) {
            Flash::error('Status Order not found');

            return redirect(route('statusOrders.index'));
        }

        return view('status_orders.show')->with('statusOrder', $statusOrder);
    }

    /**
     * Show the form for editing the specified status_order.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $statusOrder = $this->statusOrderRepository->findWithoutFail($id);

        if (empty($statusOrder)) {
            Flash::error('Status Order not found');

            return redirect(route('statusOrders.index'));
        }

        return view('status_orders.edit')->with('statusOrder', $statusOrder);
    }

    /**
     * Update the specified status_order in storage.
     *
     * @param  int              $id
     * @param Updatestatus_orderRequest $request
     *
     * @return Response
     */
    public function update($id, Updatestatus_orderRequest $request)
    {
        $statusOrder = $this->statusOrderRepository->findWithoutFail($id);

        if (empty($statusOrder)) {
            Flash::error('Status Order not found');

            return redirect(route('statusOrders.index'));
        }

        $statusOrder = $this->statusOrderRepository->update($request->all(), $id);

        Flash::success('Status Order updated successfully.');

        return redirect(route('statusOrders.index'));
    }

    /**
     * Remove the specified status_order from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $statusOrder = $this->statusOrderRepository->findWithoutFail($id);

        if (empty($statusOrder)) {
            Flash::error('Status Order not found');

            return redirect(route('statusOrders.index'));
        }

        $this->statusOrderRepository->delete($id);

        Flash::success('Status Order deleted successfully.');

        return redirect(route('statusOrders.index'));
    }
}
