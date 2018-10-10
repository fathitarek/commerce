<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatestoriesRequest;
use App\Http\Requests\UpdatestoriesRequest;
use App\Repositories\storiesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class storiesController extends AppBaseController
{
    /** @var  storiesRepository */
    private $storiesRepository;

    public function __construct(storiesRepository $storiesRepo)
    {
        $this->storiesRepository = $storiesRepo;
                                $this->middleware('auth');

    }

    /**
     * Display a listing of the stories.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->storiesRepository->pushCriteria(new RequestCriteria($request));
        $stories = $this->storiesRepository->all();

        return view('stories.index')
            ->with('stories', $stories);
    }

    /**
     * Show the form for creating a new stories.
     *
     * @return Response
     */
    public function create()
    {
        return view('stories.create');
    }

    /**
     * Store a newly created stories in storage.
     *
     * @param CreatestoriesRequest $request
     *
     * @return Response
     */
    public function store(CreatestoriesRequest $request)
    {
        $input = $request->all();

        $stories = $this->storiesRepository->create($input);

        Flash::success('Stories saved successfully.');

        return redirect(route('stories.index'));
    }

    /**
     * Display the specified stories.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stories = $this->storiesRepository->findWithoutFail($id);

        if (empty($stories)) {
            Flash::error('Stories not found');

            return redirect(route('stories.index'));
        }

        return view('stories.show')->with('stories', $stories);
    }

    /**
     * Show the form for editing the specified stories.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stories = $this->storiesRepository->findWithoutFail($id);

        if (empty($stories)) {
            Flash::error('Stories not found');

            return redirect(route('stories.index'));
        }

        return view('stories.edit')->with('stories', $stories);
    }

    /**
     * Update the specified stories in storage.
     *
     * @param  int              $id
     * @param UpdatestoriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatestoriesRequest $request)
    {
        $stories = $this->storiesRepository->findWithoutFail($id);

        if (empty($stories)) {
            Flash::error('Stories not found');

            return redirect(route('stories.index'));
        }

        $stories = $this->storiesRepository->update($request->all(), $id);

        Flash::success('Stories updated successfully.');

        return redirect(route('stories.index'));
    }

    /**
     * Remove the specified stories from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stories = $this->storiesRepository->findWithoutFail($id);

        if (empty($stories)) {
            Flash::error('Stories not found');

            return redirect(route('stories.index'));
        }

        $this->storiesRepository->delete($id);

        Flash::success('Stories deleted successfully.');

        return redirect(route('stories.index'));
    }
}
