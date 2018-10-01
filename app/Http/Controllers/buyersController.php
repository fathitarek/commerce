<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatebuyersRequest;
use App\Http\Requests\UpdatebuyersRequest;
use App\Repositories\buyersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class buyersController extends AppBaseController
{
    /** @var  buyersRepository */
    private $buyersRepository;

    public function __construct(buyersRepository $buyersRepo)
    {
        $this->buyersRepository = $buyersRepo;
        $this->middleware('auth');

    }

    /**
     * Display a listing of the buyers.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->buyersRepository->pushCriteria(new RequestCriteria($request));
        $buyers = $this->buyersRepository->all();

        return view('buyers.index')
            ->with('buyers', $buyers);
    }

    /**
     * Show the form for creating a new buyers.
     *
     * @return Response
     */
    public function create()
    {
        return view('buyers.create');
    }

    /**
     * Store a newly created buyers in storage.
     *
     * @param CreatebuyersRequest $request
     *
     * @return Response
     */
    public function store(CreatebuyersRequest $request)
    {
        $input = $request->all();

        $buyers = $this->buyersRepository->create($input);

        Flash::success('Buyers saved successfully.');

        return redirect(route('buyers.index'));
    }

    /**
     * Display the specified buyers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $buyers = $this->buyersRepository->findWithoutFail($id);

        if (empty($buyers)) {
            Flash::error('Buyers not found');

            return redirect(route('buyers.index'));
        }

        return view('buyers.show')->with('buyers', $buyers);
    }

    /**
     * Show the form for editing the specified buyers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $buyers = $this->buyersRepository->findWithoutFail($id);

        if (empty($buyers)) {
            Flash::error('Buyers not found');

            return redirect(route('buyers.index'));
        }

        return view('buyers.edit')->with('buyers', $buyers);
    }

    /**
     * Update the specified buyers in storage.
     *
     * @param  int              $id
     * @param UpdatebuyersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebuyersRequest $request)
    {
        $buyers = $this->buyersRepository->findWithoutFail($id);

        if (empty($buyers)) {
            Flash::error('Buyers not found');

            return redirect(route('buyers.index'));
        }

        $buyers = $this->buyersRepository->update($request->all(), $id);

        Flash::success('Buyers updated successfully.');

        return redirect(route('buyers.index'));
    }

    /**
     * Remove the specified buyers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $buyers = $this->buyersRepository->findWithoutFail($id);

        if (empty($buyers)) {
            Flash::error('Buyers not found');

            return redirect(route('buyers.index'));
        }

        $this->buyersRepository->delete($id);

        Flash::success('Buyers deleted successfully.');

        return redirect(route('buyers.index'));
    }
}
