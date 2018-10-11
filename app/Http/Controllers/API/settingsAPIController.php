<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesettingsAPIRequest;
use App\Http\Requests\API\UpdatesettingsAPIRequest;
use App\Models\settings;
use App\Repositories\settingsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class settingsController
 * @package App\Http\Controllers\API
 */

class settingsAPIController extends AppBaseController
{
    /** @var  settingsRepository */
    private $settingsRepository;

    public function __construct(settingsRepository $settingsRepo)
    {
        $this->settingsRepository = $settingsRepo;
    }

    /**
     * Display a listing of the settings.
     * GET|HEAD /settings
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->settingsRepository->pushCriteria(new RequestCriteria($request));
        $this->settingsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $settings = $this->settingsRepository->all();

        return $this->sendResponse($settings->toArray(), 'Settings retrieved successfully');
    }

    /**
     * Store a newly created settings in storage.
     * POST /settings
     *
     * @param CreatesettingsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatesettingsAPIRequest $request)
    {
        $input = $request->all();

        $settings = $this->settingsRepository->create($input);

        return $this->sendResponse($settings->toArray(), 'Settings saved successfully');
    }

    /**
     * Display the specified settings.
     * GET|HEAD /settings/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var settings $settings */
        $settings = $this->settingsRepository->findWithoutFail($id);

        if (empty($settings)) {
            return $this->sendError('Settings not found');
        }

        return $this->sendResponse($settings->toArray(), 'Settings retrieved successfully');
    }

    /**
     * Update the specified settings in storage.
     * PUT/PATCH /settings/{id}
     *
     * @param  int $id
     * @param UpdatesettingsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesettingsAPIRequest $request)
    {
        $input = $request->all();

        /** @var settings $settings */
        $settings = $this->settingsRepository->findWithoutFail($id);

        if (empty($settings)) {
            return $this->sendError('Settings not found');
        }

        $settings = $this->settingsRepository->update($input, $id);

        return $this->sendResponse($settings->toArray(), 'settings updated successfully');
    }

    /**
     * Remove the specified settings from storage.
     * DELETE /settings/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var settings $settings */
        $settings = $this->settingsRepository->findWithoutFail($id);

        if (empty($settings)) {
            return $this->sendError('Settings not found');
        }

        $settings->delete();

        return $this->sendResponse($id, 'Settings deleted successfully');
    }
}
