<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatestoriesAPIRequest;
use App\Http\Requests\API\UpdatestoriesAPIRequest;
use App\Models\stories;
use App\Repositories\storiesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class storiesController
 * @package App\Http\Controllers\API
 */

class storiesAPIController extends AppBaseController
{
    /** @var  storiesRepository */
    private $storiesRepository;

    public function __construct(storiesRepository $storiesRepo)
    {
        $this->storiesRepository = $storiesRepo;
    }

    /**
     * Display a listing of the stories.
     * GET|HEAD /stories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->storiesRepository->pushCriteria(new RequestCriteria($request));
        $this->storiesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $stories = $this->storiesRepository->all();

        return $this->sendResponse($stories->toArray(), 'Stories retrieved successfully');
    }

    /**
     * Store a newly created stories in storage.
     * POST /stories
     *
     * @param CreatestoriesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatestoriesAPIRequest $request)
    {
        $input = $request->all();

        $stories = $this->storiesRepository->create($input);

        return $this->sendResponse($stories->toArray(), 'Stories saved successfully');
    }

    /**
     * Display the specified stories.
     * GET|HEAD /stories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var stories $stories */
        $stories = $this->storiesRepository->findWithoutFail($id);

        if (empty($stories)) {
            return $this->sendError('Stories not found');
        }

        return $this->sendResponse($stories->toArray(), 'Stories retrieved successfully');
    }

    /**
     * Update the specified stories in storage.
     * PUT/PATCH /stories/{id}
     *
     * @param  int $id
     * @param UpdatestoriesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatestoriesAPIRequest $request)
    {
        $input = $request->all();

        /** @var stories $stories */
        $stories = $this->storiesRepository->findWithoutFail($id);

        if (empty($stories)) {
            return $this->sendError('Stories not found');
        }

        $stories = $this->storiesRepository->update($input, $id);

        return $this->sendResponse($stories->toArray(), 'stories updated successfully');
    }

    /**
     * Remove the specified stories from storage.
     * DELETE /stories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var stories $stories */
        $stories = $this->storiesRepository->findWithoutFail($id);

        if (empty($stories)) {
            return $this->sendError('Stories not found');
        }

        $stories->delete();

        return $this->sendResponse($id, 'Stories deleted successfully');
    }
}
