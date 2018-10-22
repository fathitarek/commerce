<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createindex_controlAPIRequest;
use App\Http\Requests\API\Updateindex_controlAPIRequest;
use App\Models\index_control;
use App\Repositories\index_controlRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class index_controlController
 * @package App\Http\Controllers\API
 */

class index_controlAPIController extends AppBaseController
{
    /** @var  index_controlRepository */
    private $indexControlRepository;

    public function __construct(index_controlRepository $indexControlRepo)
    {
        $this->indexControlRepository = $indexControlRepo;
    }

    /**
     * Display a listing of the index_control.
     * GET|HEAD /indexControls
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->indexControlRepository->pushCriteria(new RequestCriteria($request));
        $this->indexControlRepository->pushCriteria(new LimitOffsetCriteria($request));
        $indexControls = $this->indexControlRepository->all();

        return $this->sendResponse($indexControls->toArray(), 'Index Controls retrieved successfully');
    }

    /**
     * Store a newly created index_control in storage.
     * POST /indexControls
     *
     * @param Createindex_controlAPIRequest $request
     *
     * @return Response
     */
    public function store(Createindex_controlAPIRequest $request)
    {
        $input = $request->all();

        $indexControls = $this->indexControlRepository->create($input);

        return $this->sendResponse($indexControls->toArray(), 'Index Control saved successfully');
    }

    /**
     * Display the specified index_control.
     * GET|HEAD /indexControls/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var index_control $indexControl */
        $indexControl = $this->indexControlRepository->findWithoutFail($id);

        if (empty($indexControl)) {
            return $this->sendError('Index Control not found');
        }

        return $this->sendResponse($indexControl->toArray(), 'Index Control retrieved successfully');
    }

    /**
     * Update the specified index_control in storage.
     * PUT/PATCH /indexControls/{id}
     *
     * @param  int $id
     * @param Updateindex_controlAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateindex_controlAPIRequest $request)
    {
        $input = $request->all();

        /** @var index_control $indexControl */
        $indexControl = $this->indexControlRepository->findWithoutFail($id);

        if (empty($indexControl)) {
            return $this->sendError('Index Control not found');
        }

        $indexControl = $this->indexControlRepository->update($input, $id);

        return $this->sendResponse($indexControl->toArray(), 'index_control updated successfully');
    }

    /**
     * Remove the specified index_control from storage.
     * DELETE /indexControls/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var index_control $indexControl */
        $indexControl = $this->indexControlRepository->findWithoutFail($id);

        if (empty($indexControl)) {
            return $this->sendError('Index Control not found');
        }

        $indexControl->delete();

        return $this->sendResponse($id, 'Index Control deleted successfully');
    }
}
