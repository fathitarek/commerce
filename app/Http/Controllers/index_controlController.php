<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createindex_controlRequest;
use App\Http\Requests\Updateindex_controlRequest;
use App\Repositories\index_controlRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class index_controlController extends AppBaseController
{
    /** @var  index_controlRepository */
    private $indexControlRepository;

    public function __construct(index_controlRepository $indexControlRepo)
    {
        $this->indexControlRepository = $indexControlRepo;
    }

    /**
     * Display a listing of the index_control.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->indexControlRepository->pushCriteria(new RequestCriteria($request));
        $indexControls = $this->indexControlRepository->all();

        return view('index_controls.index')
            ->with('indexControls', $indexControls);
    }

    /**
     * Show the form for creating a new index_control.
     *
     * @return Response
     */
    public function create()
    {
        return view('index_controls.create');
    }

    /**
     * Store a newly created index_control in storage.
     *
     * @param Createindex_controlRequest $request
     *
     * @return Response
     */
    public function store(Createindex_controlRequest $request)
    {
        $input = $request->all();

        $indexControl = $this->indexControlRepository->create($input);

        Flash::success('Index Control saved successfully.');

        return redirect(route('indexControls.index'));
    }

    /**
     * Display the specified index_control.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $indexControl = $this->indexControlRepository->findWithoutFail($id);

        if (empty($indexControl)) {
            Flash::error('Index Control not found');

            return redirect(route('indexControls.index'));
        }

        return view('index_controls.show')->with('indexControl', $indexControl);
    }

    /**
     * Show the form for editing the specified index_control.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $indexControl = $this->indexControlRepository->findWithoutFail($id);

        if (empty($indexControl)) {
            Flash::error('Index Control not found');

            return redirect(route('indexControls.index'));
        }

        return view('index_controls.edit')->with('indexControl', $indexControl);
    }

    /**
     * Update the specified index_control in storage.
     *
     * @param  int              $id
     * @param Updateindex_controlRequest $request
     *
     * @return Response
     */
    public function update($id, Updateindex_controlRequest $request)
    {
        $indexControl = $this->indexControlRepository->findWithoutFail($id);

        if (empty($indexControl)) {
            Flash::error('Index Control not found');

            return redirect(route('indexControls.index'));
        }

        $indexControl = $this->indexControlRepository->update($request->all(), $id);

        Flash::success('Index Control updated successfully.');

        return redirect(route('indexControls.index'));
    }

    /**
     * Remove the specified index_control from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $indexControl = $this->indexControlRepository->findWithoutFail($id);

        if (empty($indexControl)) {
            Flash::error('Index Control not found');

            return redirect(route('indexControls.index'));
        }

        $this->indexControlRepository->delete($id);

        Flash::success('Index Control deleted successfully.');

        return redirect(route('indexControls.index'));
    }
}
